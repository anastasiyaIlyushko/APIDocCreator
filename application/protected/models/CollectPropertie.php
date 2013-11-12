<?php

class CollectPropertie extends Propertie {

	public $id;
	public $name;
	public $description;
	public $struct;
	public $linkType;
	public $linkId;
	public $structureArray = array();

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('name', 'length', 'max' => 255),
			array('description', 'safe'),
			array('id, name, description, struct', 'safe', 'on' => 'search'),
			array('struct', 'safe'),
			
		);
	}

	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	public function save() {
		if (!parent::validate(null, false)) {
			$this->addErrors($this->errors);
			return FALSE;
		}
		$isSavePropertie = parent::save(false);
		if ($isSavePropertie) {
			$this->saveStructure($this->struct, 0, $this->id);
		}
		return ($this->hasErrors()) ? FALSE : TRUE;
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

		$propertie->struct = $this->structureArray[0];
		$propertie->struct['item'] = $this->getStructure($propertie->struct['id']);
		return $propertie;
	}

	public function delete() {
		$isDeleteStruct = $this->struct->delete();
		$isDeletePropertie = parent::delete();

		return ($isDeleteStruct && $isDeletePropertie) ? TRUE : FALSE;
	}

}