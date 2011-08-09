<?php

/**
 * This is the model class for table "volunteer.vol_team".
 *
 * The followings are the available columns in table 'volunteer.vol_team':
 * @property integer $team_id
 * @property string $team_name
 * @property integer $team_sub
 * @property integer $team_category
 * @property integer $team_total_time
 */
class Team extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Team the static model class
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
		return 'volunteer.vol_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' team_name, team_category ', 'required'),
			array('team_id, team_sub, team_category, team_total_time', 'numerical', 'integerOnly'=>true),
			array('team_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('team_id, team_name, team_sub, team_category, team_total_time', 'safe', 'on'=>'search'),
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
			'team_sub' => 'Team Sub',
			'team_category' => 'Team Category',
			'team_total_time' => 'Team Total Time',
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

		$criteria->compare('team_sub',$this->team_sub);

		$criteria->compare('team_category',$this->team_category);

		$criteria->compare('team_total_time',$this->team_total_time);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}