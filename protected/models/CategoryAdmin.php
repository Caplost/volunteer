<?php

/**
 * This is the model class for table "volunteer.vol_category_admin".
 *
 * The followings are the available columns in table 'volunteer.vol_category_admin':
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $admin_pwd
 * @property integer $admin_sub
 * @property integer $admin_level
 * @property string $admin_question1
 * @property string $admin_answer1
 * @property string $admin_question2
 * @property string $admin_answer2
 * @property string $admin_question3
 * @property string $admin_answer3
 * @property integer $admin_category
 */
class CategoryAdmin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CategoryAdmin the static model class
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
		return 'volunteer.vol_category_admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('admin_name, admin_pwd, admin_sub, admin_level, admin_question1, admin_answer1, admin_question3, admin_answer3, admin_category', 'required'),
			array('admin_sub, admin_level, admin_category', 'numerical', 'integerOnly'=>true),
			array('admin_name', 'length', 'max'=>50),
			array('admin_pwd', 'length', 'max'=>100),
			array('admin_question1, admin_answer1, admin_question2, admin_answer2, admin_question3, admin_answer3', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('admin_id, admin_name, admin_pwd, admin_sub, admin_level, admin_question1, admin_answer1, admin_question2, admin_answer2, admin_question3, admin_answer3, admin_category', 'safe', 'on'=>'search'),
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
			'admin_id' => 'Admin',
			'admin_name' => 'Admin Name',
			'admin_pwd' => 'Admin Pwd',
			'admin_sub' => 'Admin Sub',
			'admin_level' => 'Admin Level',
			'admin_question1' => 'Admin Question1',
			'admin_answer1' => 'Admin Answer1',
			'admin_question2' => 'Admin Question2',
			'admin_answer2' => 'Admin Answer2',
			'admin_question3' => 'Admin Question3',
			'admin_answer3' => 'Admin Answer3',
			'admin_category' => 'Admin Category',
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

		$criteria->compare('admin_id',$this->admin_id);

		$criteria->compare('admin_name',$this->admin_name,true);

		$criteria->compare('admin_pwd',$this->admin_pwd,true);

		$criteria->compare('admin_sub',$this->admin_sub);

		$criteria->compare('admin_level',$this->admin_level);

		$criteria->compare('admin_question1',$this->admin_question1,true);

		$criteria->compare('admin_answer1',$this->admin_answer1,true);

		$criteria->compare('admin_question2',$this->admin_question2,true);

		$criteria->compare('admin_answer2',$this->admin_answer2,true);

		$criteria->compare('admin_question3',$this->admin_question3,true);

		$criteria->compare('admin_answer3',$this->admin_answer3,true);

		$criteria->compare('admin_category',$this->admin_category);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}