<php breadcrumbs(array($model->id=>array('view','id'=>$model->id),t('labels','Update')));
menu(array(
		array('label'=>t('labels','View Resource'),'url'=>array('view','id'=>$model->id)),
		array('label'=>t('labels','Update Resource'),'url'=>array('update','id'=>$model->id),'active'=>true),
		array('label'=>t('labels','Delete Resource'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>t('labels','Are you sure you want to delete this item?'))),
	)
);
?>
<h1><?php echo t('labels','Update Resource <?php echo $model->id; ?>'); ?> </h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>