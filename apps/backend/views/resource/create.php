<?php
$this->breadcrumbs=array(
	'Resources'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>t('labels','Create Resource'),'url'=>array('create'),'active'=>true),
	array('label'=>t('labels','Manage Resource(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Create Resource'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>