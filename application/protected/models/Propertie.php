<?php

/**
 * This is the model class for table "properties".
 *
 * The followings are the available columns in table 'properties':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property integer $substanceId
 *
 * The followings are the available model relations:
 * @property Substances $substance
 */
class Propertie extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Propertie the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'properties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, type', 'required'),
			array('substanceId', 'numerical', 'integerOnly' => true),
			array('name', 'length', 'max' => 255),
			array('description', 'length', 'max' => 511),
			array('type', 'length', 'max' => 64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, type, substanceId', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'substance' => array(self::BELONGS_TO, 'Substances', 'substanceId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'type' => 'Type',
			'substanceId' => 'Substance',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('type', $this->type, true);
		$criteria->compare('substanceId', $this->substanceId);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

	public function getTypesList() {
		return array(
			"all" => array("null", "required"),
			"string" => array("maxLength", "minLength", "pattern"),
			"numeric" => array("max", "min"),
			"enum" => array(),
			"object" => array("properties", "maxProperties", "minProperties", "additionalProperties"),
			"array" => array("items", "maxItems", "minItems", "uniqueItems", "additionalItems"),
		);
	}

}