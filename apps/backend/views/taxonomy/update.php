<?php
$this->breadcrumbs=array(
	'Taxonomies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(	
	array('label'=>t('labels','Create Taxonomy'),'url'=>array('create')),
	array('label'=>t('labels','View Taxonomy'),'url'=>array('view','id'=>$model->id)),
	array('label'=>t('labels',''Update Taxonomy'),'url'=>array('update','id'=>$model->id),'active'=>true),
	array('label'=>t('labels',''Manage Taxonomy(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Update'); ?>  Taxonomy <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>