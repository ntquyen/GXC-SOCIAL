<?php
$this->breadcrumbs=array(
	'Objects'=>array('index'),
	'Manage',
);

$this->menu=array(	
	array('label'=>t('labels','Create Object'),'url'=>array('create')),
	array('label'=>t('labels','Manage Object(s)'),'url'=>array('view'),'active'=>'true'),
);

?>

<h1><?php echo t('labels','Manage'); ?> Objects</h1>

<script type="text/javascript">var object_grid_batch_delete_url='<?php echo Yii::app()->controller->createUrl(Yii::app()->controller->id.'/batchdelete',array()); ?>';</script>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'type' => 'bordered striped',
	'id'=>'object-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'bulkActions' => array(
		'actionButtons' => array(
			array(
					'buttonType' => 'button',
					'type' => 'primary',
					'size' => 'small',
					'label' => t('labels','Process Delete'),
					'click' => 'js:function(checked){
						if(!confirm("Are you sure you want to delete these items?")) return false;
						 var ids= [];
					     checked.each(function(){					     	
					         ids.push($(this).val());
					     }); 
						 $.ajax({
			                type: "POST",
			                url: object_grid_batch_delete_url,
			                data: {"ids":ids},
			                dataType:"json",
			                success: function(resp){			                				                    
			                    if(resp.status == "success"){
			                       $.fn.yiiGridView.update("object-grid");
			                    }else{
			                        alert(resp.msg);
			                    }
			                }
			            });

					}',
					'id' => 'process_delete',				
				)
			),
			// if grid doesn't have a checkbox column type, it will attach
			// one and this configuration will be part of it
			'checkBoxColumnConfig' => array(
			    'name' => 'id'
			),
	),
	'columns'=>array(
		'id',
		'guid',
		'lang',
		'user_id',
		'type',
		'name',
		/*
		'description',
		'content',
		'slug',
		'thumb',
		'date_published',
		'date_created',
		'date_modified',
		'status',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
