<?php
$this->breadcrumbs = array(
    'login',
);
?>
<DIV id=user_login>
    <DL>
        <DD id=user_top>
            <UL>
                <LI class=user_top_l></LI>
                <LI class=user_top_c></LI>
                <LI class=user_top_r></LI></UL>
        <DD id=user_main>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'login-form',
                        'enableAjaxValidation' => true,
                    ));
            ?>
            <UL>
                <LI class=user_main_l></LI>
                <LI class=user_main_c>         
                    <DIV class=user_main_box>

                        <ul>
                            <div style="height:34px;">
                                <li class=user_main_text>用户名： </li>
                                <li class=user_main_input> <?php echo $form->textField($model, 'username', array('class' => 'TxtUserNameCssClass')); ?></li>
                            </div>
                            <div style="color:red;padding:0 0 0 60px; "> <?php echo $form->error($model, 'username'); ?></div>
                        </ul>

                        <ul>
                            <div  style="height:34px;">
                                <li class=user_main_text>密 码： </li>
                                <li class=user_main_input><?php echo $form->passwordField($model, 'password', array('class' => 'TxtPasswordCssClass')); ?></li>
                            </div>
                            <div style="color:red;padding:0 0 0 60px;"> <?php echo $form->error($model, 'password'); ?></div>
                        </ul>




                    </DIV>
                </LI>

                <LI class=user_main_r>
                    <INPUT class=IbtnEnterCssClass  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" type=image src="../images/user_botton.gif" >
                </LI>

            </UL>
            <?php $this->endWidget(); ?>



        <DD id=user_bottom>
            <UL>
                <LI class=user_bottom_l></LI>
                <LI class=user_bottom_c><SPAN style="MARGIN-TOP: 40px"></LI>
                <LI class=user_bottom_r></LI></UL></DD>
    </DL>
</DIV>

<SPAN id=ValrUserName style="DISPLAY: none; COLOR: red"></SPAN><SPAN id=ValrPassword style="DISPLAY: none; COLOR: red"></SPAN><SPAN id=ValrValidateCode  style="DISPLAY: none; COLOR: red"></SPAN>
<DIV id=ValidationSummary1 style="DISPLAY: none; COLOR: red"></DIV>

<DIV></DIV>

</FORM>

