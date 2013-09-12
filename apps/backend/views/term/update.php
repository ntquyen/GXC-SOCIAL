<php breadcrumbs(array($model->id=>array('view','id'=>$model->id),t('labels','Update')));
menu(array(
		array('label'=>t('labels','View Term'),'url'=>array('view','id'=>$model->id)),
		array('label'=>t('labels','Update Term'),'url'=>array('update','id'=>$model->id),'active'=>true),
		array('label'=>t('labels','Delete Term'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>t('labels','Are you sure you want to delete this item?'))),
	)
);
?>
<h1><?php echo t('labels','Update Term <?php echo $model->id; ?>'); ?> </h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>