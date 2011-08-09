<?php

/**
 * RegisterController class file
 * 
 * @author 王寅能 <337855696@qq.com>
 * 
 */
class RegisterController extends Controller {

    public $rootCategory;
    public $subCategory;
    public $subCategoryArray = array();
    public $thCategory;
    public $thCategoryArray = array();
    public $isDirect;
    public $workTest;

    public function actionIndex() {
        $this->layout = 'column3';
        $this->render('index');
    }

    //录入志愿者注册信息表



    public function actionSet() {
        $this->layout = 'column3';

        $model = new User;

        if ($_GET['category']) {
            $this->rootCategory = $_GET['category'];
            $this->subCategoryArray = Category::getCategory(1, $this->rootCategory);
            if ($_GET['subCategory']) {
                $this->subCategory = $_GET['subCategory'];
                $this->thCategoryArray = Category::getCategory(2, $this->subCategory);
                if ($_GET['thCategory']) {
                    $this->thCategory = $_GET['thCategory'];
                }
            }
        }


        if (isset($_POST['ajax']) && $_POST['ajax'] === 'set-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->user_service_experience = $_POST['User']['user_service_experience'];
            $model->user_hobby_speciality = $_POST['User']['user_hobby_speciality'];
            $model->user_service_honour = $_POST['User']['user_service_honour'];
            if ($model->validate()) {
                $model->user_service_purpose = implode(',', $model->user_service_purpose);
                $model->user_service_time = implode(',', $model->user_service_time);
                if ($model->save()) {
                    $newTeam = Team::model()->findByAttributes(array('team_name' => $model->user_team));
                    if (!$newTeam) {
                        $team = new Team;
                        $team->team_name = $model->user_team;
                        $team->team_category = $model->user_category;
                        if ($team->save()) {
                            $model->user_work_service_team = $team->team_id;
                            if ($model->save()) {
                                Yii::app()->user->setFlash('newTeam', '新的的志愿者团队创建成功！');
                                Yii::app()->user->setFlash('registerSuccess', '恭喜！志愿者信息注册成功！');
                            }
                        }
                    } else {                                                               //未添加导致相同团队的用户不能添加团队
                        $model->user_work_service_team = $newTeam->team_id;
                        if ($model->save()) {
                            Yii::app()->user->setFlash('newTeam', '新的的志愿者团队创建成功！');
                            Yii::app()->user->setFlash('registerSuccess', '恭喜！志愿者信息注册成功！');
                        }
                    }

                    $member = new Member;
                    $member->member_name = $model->user_certificate_number;
                    $member->member_pwd = Member::setPwd(substr($model->user_certificate_number, -6));
                    if ($member->save()) {
                        Yii::app()->user->setFlash('saveSuccess', '系统为你成功添加会员账号!');
                        $this->render('success', array('model' => $model, 'member' => $member, 'pwd' => substr($model->user_certificate_number, -6)));
                        Yii::app()->end();
                    }
                }
            }
        }
        $this->render('set', array('model' => $model));
    }

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