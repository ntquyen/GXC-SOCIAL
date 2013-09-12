<php breadcrumbs(array($model->id=>array('view','id'=>$model->id),t('labels','Update')));
menu(array(
		array('label'=>t('labels','View Taxonomy'),'url'=>array('view','id'=>$model->id)),
		array('label'=>t('labels','Update Taxonomy'),'url'=>array('update','id'=>$model->id),'active'=>true),
		array('label'=>t('labels','Delete Taxonomy'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>t('labels','Are you sure you want to delete this item?'))),
	)
);
?>
<h1><?php echo t('labels','Update Taxonomy <?php echo $model->id; ?>'); ?> </h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>