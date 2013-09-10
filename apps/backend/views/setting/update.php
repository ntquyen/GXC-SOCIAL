<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(	
	array('label'=>t('labels','Create Setting'),'url'=>array('create')),
	array('label'=>t('labels','View Setting'),'url'=>array('view','id'=>$model->id)),
	array('label'=>t('labels',''Update Setting'),'url'=>array('update','id'=>$model->id),'active'=>true),
	array('label'=>t('labels',''Manage Setting(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Update'); ?>  Setting <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>