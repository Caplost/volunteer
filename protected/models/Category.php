<?php

/**
 * This is the model class for table "volunteer.vol_category".
 *
 * The followings are the available columns in table 'volunteer.vol_category':
 * @property integer $category_id
 * @property string $category_name
 * @property integer $category_sub
 * @property integer $category_parent_id
 * @property string $category_time
 * @property integer $category_admin
 */
class Category extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Category the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'volunteer.vol_category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_name, category_sub, category_parent_id', 'required'),
            array('category_sub, category_parent_id, category_admin', 'numerical', 'integerOnly' => true),
            array('category_name', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('category_id, category_name, category_sub, category_parent_id, category_time, category_admin', 'safe', 'on' => 'search'),
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
            'category_id' => 'Category',
            'category_name' => 'Category Name',
            'category_sub' => 'Category Sub',
            'category_parent_id' => 'Category Parent',
            'category_time' => 'Category Time',
            'category_admin' => 'Category Admin',
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

        $criteria->compare('category_id', $this->category_id);

        $criteria->compare('category_name', $this->category_name, true);

        $criteria->compare('category_sub', $this->category_sub);

        $criteria->compare('category_parent_id', $this->category_parent_id);

        $criteria->compare('category_time', $this->category_time, true);

        $criteria->compare('category_admin', $this->category_admin);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    
    
    public function getCategory($sub=0, $parentID=0) {
        $array = array('' => '请选择');
        $model = Category::model()->findAll(array(
                    'condition' => 'category_sub=:sub && category_parent_id = :parent',
                    'params' => array(':sub' => $sub, ':parent' => $parentID),
                ));
        if ($model) {
            foreach ($model as $key => $value) {
                $array[$value->category_id] = $value->category_name;
            }
            return $array;
        }
        return $array;
    }

    
    /**
     *
     * 返回所在地区详细地址
     * 
     * @param type $teamId
     * @return string 
     */
    public function getAllAddress($teamId) {
        $section = '';
        if ($teamId) {
            $modelTh = Category::model()->findByAttributes(array('category_id' => $teamId));
            if ($modelTh) {
                $model = Category::model()->findByAttributes(array('category_id' => $modelTh->category_parent_id));
                if ($model) {
                    $modelRoot = Category::model()->findByAttributes(array('category_id' => $model->category_parent_id));
                    if ($modelRoot) {
                        $section = $modelRoot->category_name .' '.$model->category_name.' '.$modelTh->category_name;
                    }else{
                        $section = $model->category_name.' '.$modelTh->category_name;
                    }
                }
            } 
        }
        return $section;
    }

}