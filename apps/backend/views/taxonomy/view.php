<?php
$this->breadcrumbs=array(
	'Taxonomies'=>array('index'),
	$model->name,
);

$this->menu=array(		
	array('label'=>t('labels','View Taxonomy'),'url'=>array('view','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Update Taxonomy'),'url'=>array('update','id'=>$model->id)),
	array('label'=>t('labels','Delete Taxonomy'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>t('labels','Manage Taxonomy(s)'),'url'=>array('admin')),
	array('label'=>t('labels','Create Taxonomy'),'url'=>array('create')),
);
?>

<h1><?php echo t('labels','View'); ?>  Taxonomy #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'guid',
		'lang',
		'name',
		'description',
		'type',
	),
)); ?>
