<?php

/**
 * This is the model class for table "vol_member".
 *
 * The followings are the available columns in table 'vol_member':
 * @property integer $member_id
 * @property string $member_name
 * @property string $member_pwd
 * @property integer $member_sub
 * @property integer $member_level
 * @property string $member_question1
 * @property string $member_answer1
 * @property string $member_question2
 * @property string $member_answer2
 * @property string $member_question3
 * @property string $member_answer3
 */
class Member extends CActiveRecord
{
    
 
	/**
	 * Returns the static model of the specified AR class.
	 * @return Member the static model class
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
		return 'vol_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_name, member_pwd', 'required'),
			array('member_sub, member_level', 'numerical', 'integerOnly'=>true),
			array('member_name', 'length', 'max'=>50),
			array('member_pwd', 'length', 'max'=>100),
			array('member_question1, member_answer1, member_question2, member_answer2, member_question3, member_answer3', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, member_name, member_pwd, member_sub, member_level, member_question1, member_answer1, member_question2, member_answer2, member_question3, member_answer3', 'safe', 'on'=>'search'),
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
			'member_id' => 'Member',
			'member_name' => 'Member Name',
			'member_pwd' => 'Member Pwd',
			'member_sub' => 'Member Sub',
			'member_level' => 'Member Level',
			'member_question1' => 'Member Question1',
			'member_answer1' => 'Member Answer1',
			'member_question2' => 'Member Question2',
			'member_answer2' => 'Member Answer2',
			'member_question3' => 'Member Question3',
			'member_answer3' => 'Member Answer3',
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

		$criteria->compare('member_id',$this->member_id);

		$criteria->compare('member_name',$this->member_name,true);

		$criteria->compare('member_pwd',$this->member_pwd,true);

		$criteria->compare('member_sub',$this->member_sub);

		$criteria->compare('member_level',$this->member_level);

		$criteria->compare('member_question1',$this->member_question1,true);

		$criteria->compare('member_answer1',$this->member_answer1,true);

		$criteria->compare('member_question2',$this->member_question2,true);

		$criteria->compare('member_answer2',$this->member_answer2,true);

		$criteria->compare('member_question3',$this->member_question3,true);

		$criteria->compare('member_answer3',$this->member_answer3,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        /**
         *
         * 为志愿者设置密码
         * 
         * @param type $pwd
         * @return type 
         */
        public function setPwd($pwd){
            return md5('FangShan'.$pwd);
        }
        
        
        
}