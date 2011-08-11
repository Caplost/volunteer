<?php

/**
 * This is the model class for table "volunteer.vol_rank".
 *
 * The followings are the available columns in table 'volunteer.vol_rank':
 * @property integer $rank_id
 * @property string $rank_name
 * @property string $rank_condition
 * @property string $rank_auth
 * @property string $rank_time
 */
class Rank extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rank the static model class
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
		return 'volunteer.vol_rank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rank_name, rank_condition, rank_auth, rank_time', 'required'),
			array('rank_name, rank_condition, rank_auth', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rank_id, rank_name, rank_condition, rank_auth, rank_time', 'safe', 'on'=>'search'),
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
			'rank_id' => 'Rank',
			'rank_name' => 'Rank Name',
			'rank_condition' => 'Rank Condition',
			'rank_auth' => 'Rank Auth',
			'rank_time' => 'Rank Time',
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

		$criteria->compare('rank_id',$this->rank_id);

		$criteria->compare('rank_name',$this->rank_name,true);

		$criteria->compare('rank_condition',$this->rank_condition,true);

		$criteria->compare('rank_auth',$this->rank_auth,true);

		$criteria->compare('rank_time',$this->rank_time,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}