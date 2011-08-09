<table width="906"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="55" align="center">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr align="center" bgcolor="#F3F1F2">
                    <td width="82%" align="center" valign="top" bgcolor="#FFFFFF">

                        <br>


                        <table width="90%" border="0" cellpadding="2" cellspacing="1"  bgcolor="#006699" style="margin-bottom: 30px;">
                            <tr bgcolor="#e1f5ff">
                                <td colspan="6" style="text-align:center; font-size:14px; padding:10px 0; "><strong>管辖地区导入</strong></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">

                                <td colspan="6" align="left"> 
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                                'id' => 'upload-form',
                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                            ));
                                    ?>

                                    <div style="text-align:center; margin-top: 30px;color: red;" ><?php echo Yii::app()->user->getFlash('upLoadError'); ?></div>
                                    <div style="text-align:center; margin-top: 30px;color: green;" ><?php echo Yii::app()->user->getFlash('upLoadSuccess'); ?></div>

                                    <div style="text-align:center;margin-top: 30px; " >
                                        <span style="color: red">注意：</span><span>上传的格式只能是以.xls结尾的文件</span><br>

                                        <?php
                                        echo CHtml::fileField('uploadFile');
                                        echo CHtml::submitButton('上传', array('name' => 'submit'));
                                        ?>
                                    </div>

                                    <br>
                                    <div>
                                    </div>

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