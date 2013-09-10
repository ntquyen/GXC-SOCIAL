<?php
$this->breadcrumbs=array(
	'Terms'=>array('index'),
	$model->name,
);

$this->menu=array(		
	array('label'=>t('labels','View Term'),'url'=>array('view','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Update Term'),'url'=>array('update','id'=>$model->id)),
	array('label'=>t('labels','Delete Term'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>t('labels','Manage Term(s)'),'url'=>array('admin')),
	array('label'=>t('labels','Create Term'),'url'=>array('create')),
);
?>

<h1><?php echo t('labels','View'); ?>  Term #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'taxonomy_id',
		'name',
		'description',
		'slug',
		'parent',
		'order',
	),
)); ?>
