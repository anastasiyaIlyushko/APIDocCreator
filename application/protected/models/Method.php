<?php

/**
 * This is the model class for table "methods".
 *
 * The followings are the available columns in table 'methods':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $uri
 * @property integer $projectId
 */
class Method extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Method the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'methods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, uri, type', 'required'),
			array('projectId', 'numerical', 'integerOnly' => true),
			array('name, uri, type', 'length', 'max' => 255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, uri, projectId, type', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'project' => array(self::BELONGS_TO, 'Project', 'projectId'),
			'responses' => array(self::HAS_MANY, 'MethodResponse', 'methodId'),
			'properties' => array(self::HAS_MANY, 'CollectPropertie', array('propertieId'=>'id'),'through'=>'responses'),
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
			'uri' => 'Uri',
			'projectId' => 'Project',
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
		$criteria->compare('uri', $this->uri, true);
		$criteria->compare('projectId', $this->projectId);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

}