<?php
$this->breadcrumbs=array(
	'Taxonomies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>t('labels','Create Taxonomy'),'url'=>array('create'),'active'=>true),
	array('label'=>t('labels','Manage Taxonomy(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Create'); ?> Taxonomy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>