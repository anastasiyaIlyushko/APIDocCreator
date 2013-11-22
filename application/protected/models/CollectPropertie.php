<?php

class CollectPropertie extends Propertie {

	public $id;
	public $name;
	public $description;
	public $struct;
	public $linkType;
	public $type;
	public $structureArray = array();

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('name, description', 'required'),
			array('name', 'length', 'max' => 255),
			array('description', 'safe'),
			array('id, name, description, struct', 'safe', 'on' => 'search'),
			array('struct', 'safe'),
		);
	}

	public function relations() {
		return array(
			'substanceLink' => array(self::HAS_ONE, 'SubstancePropertiesLink', 'propertieId'),
			'substance' => array(self::HAS_ONE, 'Substance', array('substanceId' => 'id'), 'through' => 'substanceLink'),
			'response' => array(self::HAS_ONE, 'MethodResponse', 'propertieId'),
			'method' => array(self::HAS_ONE, 'Method', array('methodId' => 'id'), 'through' => 'response'),
			'structure' => array(self::HAS_ONE, 'PropertieStructure', 'propertieId'),
		);
	}

	public function beforeDelete() {
		$isDelete = parent::beforeDelete();
		if ($this->linkType == 'substance') {
			$isDeleteAssign = SubstancePropertiesLink::deleteAssignments($this->substance->id, $this->id);
		} else {
			$isDeleteAssign = $this->response->delete();
		}
		return ($isDelete && $isDeleteAssign) ? TRUE : FALSE;
	}

	public function delete() {
		PropertieStructure::model()->deleteAll(array(
			'condition' => 'propertieId=:propertieId',
			'params' => array(
				':propertieId' => $this->id
			)
		));
		parent::delete();
		return ($this->hasErrors()) ? FALSE : TRUE;
	}

	public function save() {
		if (!parent::validate(null, false)) {
			$this->addErrors($this->errors);
			return FALSE;
		}
		$isSavePropertie = parent::save(false);
		if ($isSavePropertie) {
			PropertieStructure::model()->deleteAll(array(
				'condition' => 'propertieId=:propertieId',
				'params' => array(
					':propertieId' => $this->id
				)
			));
			$this->saveStructure($this->struct, 0, $this->id);
		}
		return ($this->hasErrors()) ? FALSE : TRUE;
	}

	public function afterSave() {
		parent::afterSave();
		if ($this->linkType == 'substance') {
			SubstancePropertiesLink::updateAssignments($this->substance->id, $this->id);
		} else {
			$this->response->propertieId = $this->id;
			$this->response->save();
		}
	}

	protected function saveStructure(PropertieStructure $struct, $parentId, $propertieId) {
		$struct->parentId = $parentId;
		$struct->propertieId = $propertieId;
		$struct->options = json_encode($struct->options);
		if (!$struct->validate(null, false)) {
			$this->addErrors($struct->errors);
		}
		$struct->save(false);
		unset($parentId);
		$parentId = $struct->id;

		if (!is_null($struct->item)) {
			$childStruct = new PropertieStructure;
			$childStruct->attributes = $struct->item;
			$this->saveStructure($childStruct, $parentId, $propertieId);
		}
	}

	protected function getStructure($parentId) {
		if (isset($this->structureArray[$parentId])) {
			$child = $this->structureArray[$parentId];
			$child['item'] = $this->getStructure($child['id']);
		}
		return $child;
	}

	public function findByPk($propertieId) {
		$propertie = parent::findByPk($propertieId);

		if ($propertie === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}

		if ($propertie->substance !== NULL) {
			$propertie->linkType = 'substance';
		} elseif ($propertie->method !== NULL) {
			$propertie->linkType = 'method';
		}

		$structureArray = PropertieStructure::model()->findAll(array(
			'condition' => 'propertieId=:propertieId',
			'params' => array(
				':propertieId' => $propertieId
			)
				));

		foreach ($structureArray as $structure) {
			foreach ($structure as $key => $value) {
				$this->structureArray[$structure->parentId][$key] = $value;
			}
		}

		$propertie->struct = new PropertieStructure;
		$propertie->struct->attributes = $this->structureArray[0];
		$propertie->struct->item = $this->getStructure($propertie->struct->id);
		return $propertie;
	}

}