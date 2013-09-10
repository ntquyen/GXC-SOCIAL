<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username,
);

$this->menu=array(		
	array('label'=>t('labels','View User'),'url'=>array('view','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Update User'),'url'=>array('update','id'=>$model->id)),
	array('label'=>t('labels','Delete User'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>t('labels','Manage User(s)'),'url'=>array('admin')),
	array('label'=>t('labels','Create User'),'url'=>array('create')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'display_name',
		'email',
		'thumb',		
	),
)); ?>
