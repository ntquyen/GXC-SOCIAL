<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(	
	array('label'=>t('labels','Create Object'),'url'=>array('create')),
	array('label'=>t('labels','View Object'),'url'=>array('view','id'=>$model->id)),
	array('label'=>t('labels',''Update Object'),'url'=>array('update','id'=>$model->id),'active'=>true),
	array('label'=>t('labels',''Manage Object(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Update Object'); ?>  <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>