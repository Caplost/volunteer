<?php

/**
 * This is the model class for table "volunteer.vol_exercise".
 *
 * The followings are the available columns in table 'volunteer.vol_exercise':
 * @property integer $exercise_id
 * @property string $exercise_name
 * @property string $exercise_leader
 * @property string $exercise_content
 * @property string $exercise_member
 * @property integer $exercise_long
 * @property string $exercise_create_time
 * @property integer $exercise_number_people
 * @property string $exercise_category
 */
class Exercise extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Exercise the static model class
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
		return 'volunteer.vol_exercise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('exercise_name, exercise_leader, exercise_content, exercise_member, exercise_long, exercise_create_time, exercise_number_people, exercise_category', 'required'),
			array('exercise_long, exercise_number_people', 'numerical', 'integerOnly'=>true),
			array('exercise_name, exercise_category', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('exercise_id, exercise_name, exercise_leader, exercise_content, exercise_member, exercise_long, exercise_create_time, exercise_number_people, exercise_category', 'safe', 'on'=>'search'),
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
			'exercise_id' => 'Exercise',
			'exercise_name' => 'Exercise Name',
			'exercise_leader' => 'Exercise Leader',
			'exercise_content' => 'Exercise Content',
			'exercise_member' => 'Exercise Member',
			'exercise_long' => 'Exercise Long',
			'exercise_create_time' => 'Exercise Create Time',
			'exercise_number_people' => 'Exercise Number People',
			'exercise_category' => 'Exercise Category',
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

		$criteria->compare('exercise_id',$this->exercise_id);

		$criteria->compare('exercise_name',$this->exercise_name,true);

		$criteria->compare('exercise_leader',$this->exercise_leader,true);

		$criteria->compare('exercise_content',$this->exercise_content,true);

		$criteria->compare('exercise_member',$this->exercise_member,true);

		$criteria->compare('exercise_long',$this->exercise_long);

		$criteria->compare('exercise_create_time',$this->exercise_create_time,true);

		$criteria->compare('exercise_number_people',$this->exercise_number_people);

		$criteria->compare('exercise_category',$this->exercise_category,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}