<?php

/**
 * This is the model class for table "methodResponses".
 *
 * The followings are the available columns in table 'methodResponses':
 * @property integer $id
 * @property string $description
 * @property integer $status
 * @property integer $methodId
 * @property integer $propertieId
 */
class MethodResponse extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MethodResponse the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'methodResponses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, methodId, propertieId', 'numerical', 'integerOnly' => true),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, status, methodId, propertieId', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'method' => array(self::BELONGS_TO, 'Method', 'methodId'),
			'propertie' => array(self::BELONGS_TO, 'Propertie', 'propertieId'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'status' => 'Status',
			'methodId' => 'Method',
			'propertieId' => 'Propertie',
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
		$criteria->compare('description', $this->description, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('methodId', $this->methodId);
		$criteria->compare('propertieId', $this->propertieId);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

}