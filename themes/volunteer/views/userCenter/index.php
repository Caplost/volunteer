<?php
$this->breadcrumbs=array(
	'User Center',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
        <?php echo Yii::app()->user->id; ?>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
