<?php
$this->breadcrumbs=array(
	'Terms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>t('labels','Create Term'),'url'=>array('create'),'active'=>true),
	array('label'=>t('labels','Manage Term(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Create Term'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>