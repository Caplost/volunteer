<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css" rel="stylesheet" type="text/css">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/xtree.css" rel="stylesheet" type="text/css">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/userLogin.css" rel="stylesheet" type="text/css">
                    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" rel="stylesheet" type="text/css">

                        <title>巾帼志愿者注册信息表</title>

                        </head>
                        <body id=userlogin_body>
                            <div id="regis">
                                <div>

                                    <?php include_once '_navigation.php'; ?>

                                </div>
                            </div>

                            <?php echo $content; ?>

                            <div id="footer">
                                <?php echo Yii::app()->params['Allrights']; ?>
                            </div>
                        </body>
                        </html>
