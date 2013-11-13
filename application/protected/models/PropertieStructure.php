<?php

/**
 * This is the model class for table "propertiesStructure".
 *
 * The followings are the available columns in table 'propertiesStructure':
 * @property integer $id
 * @property integer $parentId
 * @property integer $type
 * @property string $options
 * @property integer $propertieId
 */
class PropertieStructure extends CActiveRecord
{
    public $item = NULL;
	public $id;
	public $parentId;
	public $type;
	public $options = NULL;
	public $propertieId;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PropertieStructure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'propertiesStructure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, type, item, options, parentId, propertieId', 'safe'),
			array('parentId, type, propertieId', 'required'),
			array('parentId, type, propertieId', 'numerical', 'integerOnly'=>true),
			array('options', 'length', 'max'=>255),
			array('id, parentId, type, options, propertieId', 'safe', 'on'=>'search'),
			
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parentId' => 'Parent',
			'type' => 'Type',
			'options' => 'Options',
			'propertieId' => 'Propertie',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('parentId',$this->parentId);
		$criteria->compare('type',$this->type);
		$criteria->compare('options',$this->options,true);
		$criteria->compare('propertieId',$this->propertieId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getTypesList(){
	    return array('string', 'numeric', 'object', 'array');
	}

}