<?php
$this->breadcrumbs=array(
	'Permission'=>array('index'),
	'Manage',
);

$this->menu=array(	
	array('label'=>t('labels','Roles'),'url'=>array('role')),
	array('label'=>t('labels','Operations'),'url'=>array('operation')),
);

?>

<h1>Manage Permissions</h1>