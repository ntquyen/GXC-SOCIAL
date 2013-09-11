<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	$model->name,
);

$this->menu=array(		
	array('label'=>t('labels','View Object'),'url'=>array('view','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Update Object'),'url'=>array('update','id'=>$model->id)),
	array('label'=>t('labels','Delete Object'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>t('labels','Manage Object(s)'),'url'=>array('admin')),
	array('label'=>t('labels','Create Object'),'url'=>array('create')),
);
?>

<h1><?php echo t('labels','View Object'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'guid',
		'lang',
		'user_id',
		'type',
		'name',
		'description',
		'content',
		'slug',
		'thumb',
		'date_published',
		'date_created',
		'date_modified',
		'status',
	),
)); ?>
