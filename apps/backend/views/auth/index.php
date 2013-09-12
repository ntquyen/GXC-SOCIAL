<?php
$this->breadcrumbs=array(
	'Permission'=>array('index'),
	'Manage',
);

$this->menu=array(		
	array('label'=>t('labels','Roles'),'url'=>array('index','type'=>CAuthItem::TYPE_ROLE),'active'=> ($type==CAuthItem::TYPE_ROLE) ? true : false ),
	array('label'=>t('labels','Operations'),'url'=>array('index','type'=>CAuthItem::TYPE_OPERATION), 'active'=> ($type==CAuthItem::TYPE_OPERATION) ? true : false),
);

?>

<h1><?php echo t('labels','Manage '.$this->authLabels($type).'s'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>t('labels','Create '.$this->authLabels($type)),
    'type'=>'primary',
    'size'=>'small', 
    'url'=>array('create','type'=>$type)

)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'type' => 'bordered striped',
	'id'=>'auth-item',
	'dataProvider'=>$dataProvider,	
	'columns'=>array(		
		array(
            'name' => t('labels','Name'),
            'value' => '$data->name',
        ),					
        array(
            'name' => t('labels','Description'),
            'value' => '$data->description',
        ),		
        array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'viewButtonLabel' => t('labels', 'View'),
			'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('type'=>$type,'name'=>\$data->name))",
			'updateButtonLabel' => t('labels', 'Edit'),
			'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('type'=>$type,'name'=>\$data->name))",
			'deleteButtonLabel' => t('labels', 'Delete'),
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('type'=>$type,'name'=>\$data->name))",
			'deleteConfirmation' => t('labels', 'Are you sure you want to delete this item?'),
		),		
	),
)); ?>