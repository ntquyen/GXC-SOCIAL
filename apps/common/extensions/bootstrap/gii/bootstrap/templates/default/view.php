<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(		
	array('label'=>t('labels','View <?php echo $this->modelClass; ?>'),'url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'active'=>true),
	array('label'=>t('labels','Update <?php echo $this->modelClass; ?>'),'url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>t('labels','Delete <?php echo $this->modelClass; ?>'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>t('labels','Manage <?php echo $this->modelClass; ?>(s)'),'url'=>array('admin')),
	array('label'=>t('labels','Create <?php echo $this->modelClass; ?>'),'url'=>array('create')),
);
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
