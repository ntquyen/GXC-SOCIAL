<?php
$this->breadcrumbs=array(
	'Resources'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(	
	array('label'=>t('labels','Create Resource'),'url'=>array('create')),
	array('label'=>t('labels','View Resource'),'url'=>array('view','id'=>$model->id)),
	array('label'=>t('labels','Update Resource'),'url'=>array('update','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Manage Resource(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Update'); ?>  Resource <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>