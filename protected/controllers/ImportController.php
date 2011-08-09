<?php

class ImportController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionUpLoad() {
        $this->layout = 'column3';
        if (isset($_POST['submit']) && isset($_FILES['uploadFile'])) {
            $file = CUploadedFile::getInstanceByName('uploadFile');
            if ($file->extensionName == 'xls') {
                $fileName = 'upload/domain/' . date('Y-m-d') . '.' . $file->extensionName;
                $file->saveAs($fileName);
                Yii::import('ext.*');
                $phpExcelPath = Yii::getPathOfAlias('ext.phpexcel');
                spl_autoload_unregister(array('YiiBase', 'autoload'));
                require_once('PHPExcel/PHPExcel/IOFactory.php');
                include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
                spl_autoload_register(array('YiiBase', 'autoload'));
                $xls = PHPExcel_IOFactory::createReader('Excel5');
                $xls->setReadDataOnly(true);
                $xls = $xls->load($fileName);
                if ($xls) {
                    $data = $xls->getSheet(0)->toArray();
                    foreach ($data as $key => $value) {
                        if (!empty($value)) {
                            $this->getCategory($value[0], $value[1], $value[2]);
                        }
                    }
                }
            } else {
                Yii::app()->user->setFlash('upLoadError', '文件名必须以.xls结尾');
            }
        }
        $this->render('up');
    }

    /**
     *
     * 风别传入所在区，所在街道（镇），社区如果没有表中无记录则创建
     * 
     * @param type $rootCategory
     * @param type $subCategory
     * @param type $thCategory
     * @return type NULL
     * @author Yinneng Wang <337855696@qq.com>
     */
    public function getCategory($rootCategory, $subCategory, $thCategory) {

        $root = Category::model()->findByAttributes(array('category_name' => $rootCategory));
        $sub = Category::model()->findByAttributes(array('category_name' => $subCategory));
        if (!$root) {
            $root = new Category;
            $root->category_name = $rootCategory;
            $root->category_sub = 0;
            $root->category_parent_id = 0;
            if ($root->validate() && $root->save()) {
                Yii::app()->user->setFlash('upLoadSuccess', '保存成功');
            }
        }
        if (!$sub &&$root) {
            $sub = new Category;
            $sub->category_name = $subCategory;
            $sub->category_sub = 1;
            $sub->category_parent_id = $root->category_id;
            if ($sub->validate() && $sub->save()) {
                Yii::app()->user->setFlash('upLoadSuccess','保存成功');
            }
        }
        if($sub && $thCategory){
            $arrayCategory =explode('、', $thCategory);
            foreach($arrayCategory as $key => $value){
                $th = Category::model()->findByAttributes(array('category_name'=>$value,'category_parent_id'=>$sub->category_id));
                if($th){
                    continue;
                }
                $category=new Category;
                $category->category_name=$value;
                $category->category_sub=2;
                $category->category_parent_id=$sub->category_id ;
                if($category->validate()&&$category->save()){
                    Yii::app()->user->setFlash('upLoadSuccess','保存成功');
                }
            }
        }
        return NULL;
        
    }
    
//     public function filters()
//    {
//        return array(
//            'accessControl',
//        );
//    }
//
//    public function accessRules()
//    {
//        return array(
//            array('deny',
//                'users' => array('*'),
//                'message' => 'Access Denied.',
//            ),
//        );
//    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}