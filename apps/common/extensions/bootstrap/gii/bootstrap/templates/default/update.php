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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(	
	array('label'=>t('labels','Create <?php echo $this->modelClass; ?>'),'url'=>array('create')),
	array('label'=>t('labels','View <?php echo $this->modelClass; ?>'),'url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>t('labels',''Update <?php echo $this->modelClass; ?>'),'url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'active'=>true),
	array('label'=>t('labels',''Manage <?php echo $this->modelClass; ?>(s)'),'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo t('labels','Update'); ?>"; ?>  <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>