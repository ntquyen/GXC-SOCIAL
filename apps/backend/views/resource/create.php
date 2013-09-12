<?php 
breadcrumbs(array(t('labels','Create')));
?>

<h1><?php echo t('labels','Create Resource'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>