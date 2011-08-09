<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css" rel="stylesheet" type="text/css">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/xtree.css" rel="stylesheet" type="text/css">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/userLogin.css" rel="stylesheet" type="text/css">
                    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
                    <style type="text/css">
                        body{
                            font-size:12px;
                            margin:0 auto;
                            color:#ffffff;
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
                            background:url(../images/bg3.jpg) no-repeat scroll center transparent;
                            width:916px;
                            margin:0 auto;
                            height:130px;
                            text-align:center;
                        }
                        #globallink{
                            height:30px;
                            bottom:0;
                            width:906px;
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
                    </style>
                    </head>



                    <body id=userlogin_body>

                        <div id="regis">
                                <?php include_once '_navigation.php' ; ?>

                        </div>

                        <DIV style="height:60px;"></DIV>

                        <?php echo $content; ?>

                        <!-- footer -->
                        <table width="1007"  border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr class="style1">
                                <td height="55" align="center"><?php echo Yii::app()->params['Allrights']; ?> </td>
                            </tr>
                        </table>
                    </body>
                    </html>
















