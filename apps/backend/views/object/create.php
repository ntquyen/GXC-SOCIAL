<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>t('labels','Create Object'),'url'=>array('create'),'active'=>true),
	array('label'=>t('labels','Manage Object(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Create Object'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>