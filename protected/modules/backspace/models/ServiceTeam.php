<?php

/**
 * This is the model class for table "volunteer.vol_service_team".
 *
 * The followings are the available columns in table 'volunteer.vol_service_team':
 * @property integer $team_id
 * @property string $team_name
 * @property string $team_leader
 * @property string $team_content
 * @property integer $team_long
 * @property string $team_people
 * @property string $team_service_time
 * @property integer $team_category
 */
class ServiceTeam extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ServiceTeam the static model class
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
		return 'volunteer.vol_service_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('team_name, team_leader, team_content, team_long, team_people, team_service_time, team_category', 'required'),
			array('team_long, team_category', 'numerical', 'integerOnly'=>true),
			array('team_name', 'length', 'max'=>200),
			array('team_leader', 'length', 'max'=>50),
			array('team_content', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('team_id, team_name, team_leader, team_content, team_long, team_people, team_service_time, team_category', 'safe', 'on'=>'search'),
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
			'team_id' => 'Team',
			'team_name' => 'Team Name',
			'team_leader' => 'Team Leader',
			'team_content' => 'Team Content',
			'team_long' => 'Team Long',
			'team_people' => 'Team People',
			'team_service_time' => 'Team Service Time',
			'team_category' => 'Team Category',
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

		$criteria->compare('team_id',$this->team_id);

		$criteria->compare('team_name',$this->team_name,true);

		$criteria->compare('team_leader',$this->team_leader,true);

		$criteria->compare('team_content',$this->team_content,true);

		$criteria->compare('team_long',$this->team_long);

		$criteria->compare('team_people',$this->team_people,true);

		$criteria->compare('team_service_time',$this->team_service_time,true);

		$criteria->compare('team_category',$this->team_category);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}