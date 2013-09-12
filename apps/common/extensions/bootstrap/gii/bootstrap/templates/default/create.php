<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php 
breadcrumbs(array(t('labels','Create')));
?>";
?>


<h1><?php echo "<?php echo t('labels','Create ".$this->modelClass."'); ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
