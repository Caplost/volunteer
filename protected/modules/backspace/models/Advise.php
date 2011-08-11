<?php

/**
 * This is the model class for table "volunteer.vol_advise".
 *
 * The followings are the available columns in table 'volunteer.vol_advise':
 * @property integer $advise_id
 * @property string $advise_name
 * @property string $advise_content
 * @property integer $advise_category
 * @property integer $advise_sub
 * @property string $advise_user_name
 * @property string $advise_time
 * @property integer $advise_manager
 * @property integer $advise_detele
 */
class Advise extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Advise the static model class
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
		return 'volunteer.vol_advise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('advise_name, advise_content, advise_category, advise_sub, advise_user_name, advise_time', 'required'),
			array('advise_category, advise_sub, advise_manager, advise_detele', 'numerical', 'integerOnly'=>true),
			array('advise_name', 'length', 'max'=>500),
			array('advise_user_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('advise_id, advise_name, advise_content, advise_category, advise_sub, advise_user_name, advise_time, advise_manager, advise_detele', 'safe', 'on'=>'search'),
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
			'advise_id' => 'Advise',
			'advise_name' => 'Advise Name',
			'advise_content' => 'Advise Content',
			'advise_category' => 'Advise Category',
			'advise_sub' => 'Advise Sub',
			'advise_user_name' => 'Advise User Name',
			'advise_time' => 'Advise Time',
			'advise_manager' => 'Advise Manager',
			'advise_detele' => 'Advise Detele',
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

		$criteria->compare('advise_id',$this->advise_id);

		$criteria->compare('advise_name',$this->advise_name,true);

		$criteria->compare('advise_content',$this->advise_content,true);

		$criteria->compare('advise_category',$this->advise_category);

		$criteria->compare('advise_sub',$this->advise_sub);

		$criteria->compare('advise_user_name',$this->advise_user_name,true);

		$criteria->compare('advise_time',$this->advise_time,true);

		$criteria->compare('advise_manager',$this->advise_manager);

		$criteria->compare('advise_detele',$this->advise_detele);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}