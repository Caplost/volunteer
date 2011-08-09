
<style type="text/css">
    body{
        font-size:12px;
        margin:0 auto;
    }
    a, a:link, a:visited{
        color:#ffffff;
        text-decoration:none;
    }
    a:hover{
        color:orange;
        text-decoration:underline;
    }
    #regis{
        background:url(/images/bg3.jpg) no-repeat scroll center transparent;
        width:927px;
        margin:0 auto;
        height:130px;
        text-align:center;
    }
    #globallink{
        height:30px;
        bottom:0;
        width:927px;
        padding:100px 0 0 0;	
    }
    #regis ul{
        margin:0;
        padding:0;
        list-style:none;


    }
    #regis ul li{
        float:left;
        padding:5px 10px;	
    }
    .first{
        margin:0 0 0 20px;
    }
    .errorMessage{width:140px;float:right; color:red;}
</style>

<?php Yii::app()->clientScript->registerCssFile('/css/calendar.css'); ?>


<table width="910"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="55" align="center">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr align="center" bgcolor="#F3F1F2">
                    <td width="82%" align="center" valign="top" bgcolor="#FFFFFF">

                        <br>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'set-form',
                                    'enableAjaxValidation' => true,
                                ));
                        ?>

                        <table width="90%" border="0" cellpadding="2" cellspacing="1"  bgcolor="#006699">
                            <tr bgcolor="#e1f5ff">
                                <td colspan="6" style="text-align:center; font-size:14px; padding:10px 0;"><strong>巾帼志愿者注册信息表</strong></td>
                            </tr>

                            <tr bgcolor="#e1f5ff">
                                <td colspan="6" style="color:red;"><strong>注册志愿者信息（请尽量完整填写以下信息以便您完成注册志愿者的申请, * 为必填项目）</strong></td>
                            </tr>

                            <tr bgcolor="#FFFFFF">
                                <td rowspan="2" bgcolor="#E1F5FF">注册机构</td>
                                <td width="50%" bgcolor="#E1F5FF">隶属地区<span style="color:red">*</span></td>
                                <td colspan="3" align="left">
                                    <?php
                                    echo CHtml::dropDownList('root', $this->rootCategory, Category::getCategory(), array('id' => 'rootCategory','style'=>"width: 100px;"));
                                    if ($this->rootCategory) {
                                        echo CHtml::dropDownList('subCategory', $this->subCategory, $this->subCategoryArray, array('id' => 'subCategory','style'=>"width: 100px;"));
                                        if ($this->subCategory) {
                                            echo CHtml::dropDownList('thCategory', $this->thCategory, $this->thCategoryArray, array('id' => 'thCategory','style'=>"width: 100px;"));
                                        }else{
                                            echo  CHtml::dropDownList('thCategory',' ',array(''=>'请选择'),array('style'=>"width: 100px"));
                                        }
                                    }else{
                                        echo  CHtml::dropDownList('subCategory',' ',array(''=>'请选择'),array('style'=>"width: 100px"));
                                        echo  CHtml::dropDownList('thCategory',' ',array(''=>'请选择'),array('style'=>"width: 100px"));
                                    }
                                    echo $form->hiddenField($model, 'user_category', array('id' => 'userCategory'));
                                    echo $form->error($model, 'user_category');
                                    ?>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF" >服务队名称<span style="color:red">*</span></td>
                                <td colspan="3" align="left"><?php echo $form->textField($model, 'user_team', array('id' => 'userTeam', 'style' => "width:200px; border: none; border-bottom: 1px solid #000;")); ?> (<span style="color:red">注意</span>:请填写巾帼志愿服务队全称)<?php echo $form->error($model, 'user_team'); ?></td>
                            </tr>

                            <tr bgcolor="#FFFFFF">

                                <td width="5" rowspan="8" bgcolor="#E1F5FF">个人基本信息</td>
                                <td bgcolor="#E1F5FF" class="required" width="62">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名<span style=color:red>*</span></td>
                                <td align="left" width="400"><?php echo $form->textField($model, 'user_name'); ?>  <?php echo $form->error($model, 'user_name'); ?>  </td>
                                <td width="62" bgcolor="#E1F5FF" class="required">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别<span style=color:red>*</span></td>
                                <td width="400" align="left">
                                    <?php echo $form->radioButtonList($model, 'user_sex', array('男' => '男', '女' => '女')); ?>
                                    <?php echo $form->error($model, 'user_sex'); ?> 
                            </tr>

                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">出生日期<span style=color:red>*</span></td>
                                <td align="left"><?php echo $form->textField($model, 'user_birthdate', array('id' => 'EntTime', 'onclick' => "return showCalendar('EntTime', 'y-mm-dd');")); ?><span >(<span style="color:green">按住箭头选择</span>)</span> <?php echo $form->error($model, 'user_birthdate'); ?>  </td>
                                <td bgcolor="#E1F5FF">民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族<span style=color:red>*</span></td>
                                <td align="left"><?php echo $form->dropDownList($model, 'user_nation', ItemLookup::getItem('nation', FALSE)); ?> <?php echo $form->error($model, 'user_nation'); ?></td>                                
                            </tr>

                            <?php ItemLookup::getItem('education'); ?>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历&nbsp;&nbsp;<span style=color:red>*</span></td>
                                <td align="left"><?php echo $form->dropDownList($model, 'user_education_background', ItemLookup::getItem('education', true, false)); ?>  <?php echo $form->error($model, 'user_education_background'); ?>
                                <td bgcolor="#E1F5FF">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业<span style=color:red>*</span></td>
                                <td align="left"><?php echo $form->dropDownList($model, 'user_occupation', ItemLookup::getItem('occupation', false, false), array('style' => 'width: 134px;')); ?><?php echo $form->error($model, 'user_occupation'); ?></td>                                
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">学校/工作单位</td>
                                <td align="left"><?php echo $form->textField($model, 'user_unit'); ?><?php echo $form->error($model, 'user_unit'); ?> </td>
                                <td bgcolor="#E1F5FF">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务</td>
                                <td align="left"><?php echo $form->textField($model, 'user_job'); ?><?php echo $form->error($model, 'user_job'); ?></td>                                
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">联系电话&nbsp;</td>
                                <td align="left"><?php echo $form->textField($model, 'user_phone'); ?><?php echo $form->error($model, 'user_phone'); ?> </td>
                                <td bgcolor="#E1F5FF">E-mail</td>
                                <td align="left"><?php echo $form->textField($model, 'user_email'); ?><?php echo $form->error($model, 'user_email'); ?> </td>                                
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">家庭住址&nbsp;</td>
                                <td colspan="3" align="left"><?php echo $form->textField($model, 'user_address', array('style' => 'width:436px')); ?><?php echo $form->error($model, 'user_address'); ?> </td>

                            </tr>

                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">证&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件<span style=color:red>*</span></td>
                                <td width="19%" align="left"><?php echo $form->dropDownList($model, 'user_certificate', ItemLookup::getItem('certificate')); ?> <?php echo $form->error($model, 'user_certificate'); ?>
                                <td bgcolor="#E1F5FF">证件号码<span style=color:red>*</span></td>
                                <td align="left"><?php echo $form->textField($model, 'user_certificate_number'); ?><?php echo $form->error($model, 'user_certificate_number'); ?> </td>                                
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">专&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业</td>
                                <td align="left"><?php echo $form->textField($model, 'user_profession'); ?><?php echo $form->error($model, 'user_profession'); ?></td>
                                <td bgcolor="#E1F5FF">专业资格</td>
                                <td align="left"><?php echo $form->textField($model, 'user_professional_qualification'); ?><?php echo $form->error($model, 'user_professional_qualification'); ?></td>                                
                            </tr>


                            <tr bgcolor="#FFFFFF">
                                <td rowspan="4" bgcolor="#E1F5FF">志愿服务信息</td>
                                <td bgcolor="#E1F5FF" class="required">志愿服务意向<span style=color:red>*</span></td>

                                <td align="left" valign="top">
                                    <?php echo $form->checkBoxList($model, 'user_service_purpose', ItemLookup::getItem('purpose', FALSE)); ?>
                                    <?php echo $form->error($model, 'user_service_purpose'); ?>
                                </td>

                                <td bgcolor="#E1F5FF" class="required">服务时间<span style=color:red>*</span></td>
                                <td align="left" valign="top">
                                    <?php echo $form->checkBoxList($model, 'user_service_time', ItemLookup::getItem('time', FALSE)); ?>
                                    <?php echo $form->error($model, 'user_service_time'); ?>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF" class="required">爱好、特长</td>
                                <td colspan="3" align="left"><?php echo $form->textArea($model, 'user_hobby_speciality', array('style' => 'width: 780px; height: 88px;')); ?> <?php echo $form->error($model, 'user_hobby_speciality'); ?></td>

                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">主要志愿服务<br>经历</td>
                                <td colspan="3" align="left"><?php echo $form->textArea($model, 'user_service_experience', array('style' => 'width: 780px; height: 88px;')); ?> <?php echo $form->error($model, 'user_service_experience'); ?></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td bgcolor="#E1F5FF">受表彰情况</td>

                                <td colspan="3" align="left"><?php echo $form->textArea($model, 'user_service_honour', array('style' => 'width: 780px; height: 88px;')); ?> <?php echo $form->error($model, 'user_service_honour'); ?></td>
                            </tr>
                        </table>
                        <table width="98%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                                <td align="center">
                                    <input type="submit" value="确定" >

                                    <input type="button" onclick="" value="返回">
                                </td>
                            </tr>
                        </table>

                        <?php $this->endWidget(); ?>
                    </td>
                </tr>
            </table>
        </td>

    </tr>
</table>
<?php Yii::app()->clientScript->registerScriptFile('/js/calendar.js', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile('/js/calendar-zh.js', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile('/js/calendar-setup.js', CClientScript::POS_END); ?>

<script type="text/javascript">
    $('#rootCategory').change(function(){
        var rootCategory;
        rootCategory=$(this).val();
        location.href='/register/set/statue/'+rootCategory;
    }); 
    $('#subCategory').change(function(){
        var subCategory;
        var rootCategory;
        subCategory = $(this).val();
        rootCategory = document.getElementById('rootCategory').value; 
        location.href='/register/set/statue/'+rootCategory+'/sub/'+subCategory;
    });
    $('#thCategory').change(function(){
        var subCategory;
        var rootCategory;
        var thCategory;
        thCategory = $(this).val();
        subCategory = document.getElementById('subCategory').value;
        rootCategory = document.getElementById('rootCategory').value; 
        location.href='/register/set/statue/'+rootCategory+'/sub/'+subCategory+'/category/'+thCategory;
    });
    $('#userTeam').click(function(){
        var subCategory;
        var thCategory;
        subCategory= document.getElementById('subCategory').value;
        thCategory = document.getElementById('thCategory').value;
        if(thCategory){
            document.getElementById('userCategory').value=thCategory;
        }else if(subCategory){
            document.getElementById('userCategory').value=subCategory;   
        }
               
    });
    $('#userTeam').change(function(){
        var subCategory;
        var thCategory;
        subCategory= document.getElementById('subCategory').value;
        thCategory = document.getElementById('thCategory').value;
        if(thCategory){
            document.getElementById('userCategory').value=thCategory;
        }else if(subCategory){
            document.getElementById('userCategory').value=subCategory;   
        }        
    });
     
</script>
