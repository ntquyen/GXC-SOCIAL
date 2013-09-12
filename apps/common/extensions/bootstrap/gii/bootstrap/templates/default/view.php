<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php

echo "<php breadcrumbs(array(\$model->name);
menu(array(
		array('label'=>t('labels','View ".$this->modelClass."'),'url'=>array('view','id'=>\$model->id),'active'=>true),
		array('label'=>t('labels','Update ".$this->modelClass."'),'url'=>array('update','id'=>\$model->id)),
		array('label'=>t('labels','Delete ".$this->modelClass."'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>\$model->id),'confirm'=>t('labels','Are you sure you want to delete this item?'))),
	)
);
?>";

?>

<h1><?php echo "<?php echo t('labels','View ".$this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"."'); ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
