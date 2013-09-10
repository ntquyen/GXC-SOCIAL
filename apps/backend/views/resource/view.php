<?php
$this->breadcrumbs=array(
	'Resources'=>array('index'),
	$model->name,
);

$this->menu=array(		
	array('label'=>t('labels','View Resource'),'url'=>array('view','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Update Resource'),'url'=>array('update','id'=>$model->id)),
	array('label'=>t('labels','Delete Resource'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>t('labels','Manage Resource(s)'),'url'=>array('admin')),
	array('label'=>t('labels','Create Resource'),'url'=>array('create')),
);
?>

<h1><?php echo t('labels','View'); ?>  Resource #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'body',
		'path',
		'type',
		'date_created',
		'date_modified',
		'uid',
		'storage',
	),
)); ?>
