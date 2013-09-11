<?php
$this->breadcrumbs=array(
	'Terms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(	
	array('label'=>t('labels','Create Term'),'url'=>array('create')),
	array('label'=>t('labels','View Term'),'url'=>array('view','id'=>$model->id)),
	array('label'=>t('labels','Update Term'),'url'=>array('update','id'=>$model->id),'active'=>true),
	array('label'=>t('labels','Manage Term(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo t('labels','Update Term <?php echo $model->id; ?>'); ?> </h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>