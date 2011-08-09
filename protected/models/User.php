<?php

/**
 * This is the model class for table "vol_user".
 *
 * The followings are the available columns in table 'vol_user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_sex
 * @property string $user_birthdate
 * @property string $user_nation
 * @property integer $user_education_background
 * @property string $user_occupation
 * @property string $user_job
 * @property string $user_unit
 * @property string $user_phone
 * @property string $user_email
 * @property integer $user_address
 * @property integer $user_certificate
 * @property string $user_certificate_number
 * @property string $user_profession
 * @property string $user_professional_qualification
 * @property string $user_team
 * @property integer $user_category
 * @property string $user_service_purpose
 * @property integer $user_service_time
 * @property string $user_hobby_speciality
 * @property string $user_service_experience
 * @property string $user_service_honour
 * @property integer $user_work_time
 * @property string $user_work_item
 * @property integer $user_work_service_team
 */
class User extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return User the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'vol_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_name, user_sex, user_birthdate, user_nation,user_certificate, user_certificate_number,user_service_purpose,user_service_time,user_team,user_category,user_occupation,user_education_background', 'required', 'message' => '该项不能为空'),
            array('user_certificate_number', 'length', 'min' => 6, 'max' => 18, 'message' => '证件号长度不符（8~18）'),
            array('user_certificate_number', 'unique', 'message' => '该证件已经被注册'),
            array('user_certificate_number', 'match', 'pattern' => '/[0-9A-Za-z]\w+/', 'message' => '只能是数字和字母的组合'),
            array('user_phone', 'match', 'pattern' => '/^[0-9-]*$/', 'message' => '只能包含数字和"-"的组合'),
            array('user_education_background, user_certificate, user_category,  user_work_time', 'numerical'),
            array('user_name, user_job, user_certificate_number', 'length', 'max' => 50, 'message' => '长度超出范围（0~25字）'),
            array('user_sex', 'length', 'max' => 10, 'message' => '长度超出范围'),
            array('user_nation', 'length', 'max' => 10, 'message' => '长度超出范围'),
            array('user_address', 'length', 'max' => 500, 'message' => '长度超出范围（0~250字）'),
            array('user_occupation, user_unit', 'length', 'max' => 200, 'message' => '长度超出范围（0~100字）'),
            array('user_phone, user_email', 'length', 'max' => 30, 'message' => '长度超出范围（0~15字符）'),
            array('user_email', 'email', 'message' => '这不是个有效的邮箱'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, user_name, user_sex, user_birthdate, user_nation, user_education_background, user_occupation, user_job, user_unit, user_phone, user_email, user_address, user_certificate, user_certificate_number, user_profession, user_professional_qualification, user_team, user_category, user_service_purpose, user_service_time, user_hobby_speciality, user_service_experience, user_service_honour, user_work_time, user_work_item, user_work_service_team', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => '序号',
            'user_name' => '姓名',
            'user_sex' => '性别',
            'user_birthdate' => '出生日期',
            'user_nation' => '民族',
            'user_education_background' => '学历',
            'user_occupation' => '职业',
            'user_job' => '职务',
            'user_unit' => '单位',
            'user_phone' => '联系电话',
            'user_email' => 'E-mail',
            'user_address' => '家庭住址',
            'user_certificate' => '证件',
            'user_certificate_number' => '证件号',
            'user_profession' => '专业',
            'user_professional_qualification' => '专业资格',
            'user_team' => '服务队名称',
            'user_category' => '街道名称',
            'user_service_purpose' => '志愿服务意向',
            'user_service_time' => '服务时间',
            'user_hobby_speciality' => '爱好特长',
            'user_service_experience' => '注意志愿或服务经历',
            'user_service_honour' => '受表彰情况',
            'user_work_time' => '服务总时间',
            'user_work_item' => '服务内容',
            'user_work_service_team' => '工作服务队',
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

        $criteria->compare('user_id', $this->user_id);

        $criteria->compare('user_name', $this->user_name, true);

        $criteria->compare('user_sex', $this->user_sex, true);

        $criteria->compare('user_birthdate', $this->user_birthdate, true);

        $criteria->compare('user_nation', $this->user_nation, true);

        $criteria->compare('user_education_background', $this->user_education_background);

        $criteria->compare('user_occupation', $this->user_occupation, true);

        $criteria->compare('user_job', $this->user_job, true);

        $criteria->compare('user_unit', $this->user_unit, true);

        $criteria->compare('user_phone', $this->user_phone, true);

        $criteria->compare('user_email', $this->user_email, true);

        $criteria->compare('user_address', $this->user_address);

        $criteria->compare('user_certificate', $this->user_certificate);

        $criteria->compare('user_certificate_number', $this->user_certificate_number, true);

        $criteria->compare('user_profession', $this->user_profession, true);

        $criteria->compare('user_professional_qualification', $this->user_professional_qualification, true);

        $criteria->compare('user_team', $this->user_team, true);

        $criteria->compare('user_category', $this->user_category);

        $criteria->compare('user_service_purpose', $this->user_service_purpose, true);

        $criteria->compare('user_service_time', $this->user_service_time);

        $criteria->compare('user_hobby_speciality', $this->user_hobby_speciality, true);

        $criteria->compare('user_service_experience', $this->user_service_experience, true);

        $criteria->compare('user_service_honour', $this->user_service_honour, true);

        $criteria->compare('user_work_time', $this->user_work_time);

        $criteria->compare('user_work_item', $this->user_work_item, true);

        $criteria->compare('user_work_service_team', $this->user_work_service_team);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}