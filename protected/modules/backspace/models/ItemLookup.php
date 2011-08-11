<?php

/**
 * This is the model class for table "volunteer.vol_item_lookup".
 *
 * The followings are the available columns in table 'volunteer.vol_item_lookup':
 * @property integer $item_id
 * @property string $item_name
 * @property string $item_content
 */
class ItemLookup extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return ItemLookup the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'volunteer.vol_item_lookup';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('item_name, item_content', 'required'),
            array('item_name', 'length', 'max' => 50),
            array('item_content', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('item_id, item_name, item_content', 'safe', 'on' => 'search'),
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
            'item_id' => 'Item',
            'item_name' => 'Item Name',
            'item_content' => 'Item Content',
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

        $criteria->compare('item_id', $this->item_id);

        $criteria->compare('item_name', $this->item_name, true);

        $criteria->compare('item_content', $this->item_content, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    /**
     *
     *   
     * 返回要查找相同的字段的所有内容,如果没有则返回空
     * 
     * @param type $itemName 要查找的字段
     * @param type $getNull 默认返回的值中在数组开头加元素：请选择,值为true时返回数组类型array('value'=>'value')不加元素‘请选择’
     * @param type $need 默认返回值数组开头不加空值‘请选择’
     * @return array() 形如：array('id'=>'value');
     * @author 王寅能 <337855696@qq.com>
     */
    public function getItem($itemName, $getNull=TRUE, $need=TRUE) {
        $array = array();
        $model = ItemLookup::model()->findAll(array('condition' => 'item_name=:name', 'params' => array(':name' => $itemName)));
        if ($model) {
            if ($getNull) {
                if ($need) {                                                                   
                    foreach ($model as $key => $value) {
                        $array[$value->item_id] = $value->item_content;
                    }
                } else {
                    $array[NULL] = '请选择';
                    foreach ($model as $key => $value) {
                        $array[$value->item_id] = $value->item_content;
                    }
                }
            } else {
                if ($need) {
                    foreach ($model as $key => $value) {
                        $array[$value->item_content] = $value->item_content;
                    }
                }else{
                    $array[NULL]='请选择';
                    foreach ($model as $key => $value) {
                    $array[$value->item_content] = $value->item_content;
                }
                }
                
            }
            return $array;
        }
        return NULL;
    }

}