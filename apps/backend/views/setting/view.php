<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id,
);

$this->menu=array(		
	array('label'=>t('labels','View Setting'),'url'=>array('view','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Update Setting'),'url'=>array('update','id'=>$model->id)),
	array('label'=>t('labels','Delete Setting'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>t('labels','Manage Setting(s)'),'url'=>array('admin')),
	array('label'=>t('labels','Create Setting'),'url'=>array('create')),
);
?>

<h1><?php echo t('labels','View'); ?>  Setting #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'key',
		'value',
		'group',
	),
)); ?>
