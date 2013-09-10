<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>t('labels','Create Setting'),'url'=>array('create'),'active'=>true),
	array('label'=>t('labels','Manage Setting(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Create'); ?> Setting</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>