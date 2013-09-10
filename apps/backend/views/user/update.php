<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(	
	array('label'=>t('labels','Create User'),'url'=>array('create')),
	array('label'=>t('labels','View User'),'url'=>array('view','id'=>$model->id)),
	array('label'=>t('labels','Update User'),'url'=>array('update','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Manage User(s)'),'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>