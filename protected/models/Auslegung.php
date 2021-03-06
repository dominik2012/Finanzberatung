<?php

/**
 * This is the model class for table "auslegung".
 *
 * The followings are the available columns in table 'auslegung':
 * @property string $id
 * @property string $name
 * @property string $beschreibung
 */
class Auslegung extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Auslegung the static model class
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
		return 'auslegung';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, beschreibung', 'required'),
			array('name', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, beschreibung', 'safe', 'on'=>'search'),
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
			'gesetze' => array(self::MANY_MANY, 'Gesetz', 'nm_auslegung_gesetz(a_id,g_id)'),
			'business_rules' => array(self::MANY_MANY, 'BusinessRule', 'nm_auslegung_business_rule(a_id,br_id)'),
                        'funktionen' => array(self::MANY_MANY, 'Funktion', 'nm_auslegung_business_rule(a_id,br_id)', 'through' => 'business_rules'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'beschreibung' => 'Beschreibung',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('beschreibung',$this->beschreibung,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}