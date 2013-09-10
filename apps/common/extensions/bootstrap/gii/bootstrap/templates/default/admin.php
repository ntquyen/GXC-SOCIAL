<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(	
	array('label'=>'Create <?php echo $this->modelClass; ?>','url'=>array('create')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>(s)','url'=>array('view'),'active'=>'true'),
);

?>

<h1>Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<script type="text/javascript">var <?php echo $this->class2id($this->modelClass).'_grid_batch_delete_url'; ?>=<?php echo "'<?php echo Yii::app()->controller->createUrl(Yii::app()->controller->id.'/batchdelete',array()); ?>';"; ?></script>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'type' => 'bordered striped',
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
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
						if(!confirm("<?php echo t("message","Are you sure you want to delete these items?"); ?>")) return false;
						 var ids= [];
					     checked.each(function(){					     	
					         ids.push($(this).val());
					     }); 
						 $.ajax({
			                type: "POST",
			                url: <?php echo $this->class2id($this->modelClass); ?>_grid_batch_delete_url,
			                data: {"ids":ids},
			                dataType:"json",
			                success: function(resp){			                				                    
			                    if(resp.status == "success"){
			                       $.fn.yiiGridView.update("<?php echo $this->class2id($this->modelClass); ?>-grid");
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
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>