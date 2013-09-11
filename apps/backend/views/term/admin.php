<?php
$this->breadcrumbs=array(
	'Terms'=>array('index'),
	'Manage',
);

$this->menu=array(	
	array('label'=>t('labels','Create Term'),'url'=>array('create')),
	array('label'=>t('labels','Manage Term(s)'),'url'=>array('view'),'active'=>'true'),
);

?>

<h1><?php echo t('labels','Manage Terms'); ?></h1>

<script type="text/javascript">var term_grid_batch_delete_url='<?php echo Yii::app()->controller->createUrl(Yii::app()->controller->id.'/batchdelete',array()); ?>';</script>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'type' => 'bordered striped',
	'id'=>'term-grid',
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
			                url: term_grid_batch_delete_url,
			                data: {"ids":ids},
			                dataType:"json",
			                success: function(resp){			                				                    
			                    if(resp.status == "success"){
			                       $.fn.yiiGridView.update("term-grid");
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
		'taxonomy_id',
		'name',
		'description',
		'slug',
		'parent',
		/*
		'order',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
