<?php

class CollectPropertie extends Propertie {

	public $id;
	public $name;
	public $description;
	public $struct;
	public $linkType;
	public $linlId;

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, description', 'isPropertieParams'),
			array('struct', 'isPropertieStructureParams'),
			array('linkType, linlId', 'isLinksParams'),
		);
	}

	public function isPropertieParams($attribute, $params) {
		//if(FALSE){$this->addError('attributeName','MessageError.');}
	}

	public function isPropertieStructureParams($attribute, $params) {
		//if(FALSE){$this->addError('attributeName','MessageError.');}
	}

	public function isLinksParams($attribute, $params) {
		//if(FALSE){$this->addError('attributeName','MessageError.');}
	}

	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	public function save() {
		$isSavePropertie = parent::save();
		if ($isSavePropertie) {
			$this->struct->type = (int) $this->struct->type;
			$this->struct->parentId = 0;
			$this->struct->propertieId = $this->id;
			return $this->struct->save();
		} else {
			return FALSE;
		}
	}

	public function findByPk($propertieId) {
		$propertie = parent::findByPk($propertieId);
		$propertie->struct = PropertieStructure::model()->find('propertieId=:propertieId AND parentId=:parentId', array(':propertieId' => $propertieId, ':parentId' => 0));
		return $propertie;
	}

	public function delete() {
		$isDeleteStruct = $this->struct->delete();
		$isDeletePropertie = parent::delete();

		return ($isDeleteStruct && $isDeletePropertie) ? TRUE : FALSE;
	}

}