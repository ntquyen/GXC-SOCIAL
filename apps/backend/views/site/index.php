<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>


<?php $this->endWidget(); ?>

<table class="table table-striped">
	<tr>
		<td width="200" class="td_right">Server IP :</td>
		<td><?php echo $formData['fserverip']; ?></td>
	</tr>	
	<tr>
		<td class="td_right">Server Name :</td>
		<td><?php echo $formData['fserver']; ?></td>
	</tr>
	<tr>
		<td class="td_right">PHP Version :</td>
		<td><?php echo $formData['fphp']; ?></td>
	</tr>
	
	<tr>
		<td class="td_right">Server Time :</td>
		<td><?php echo date('d/M/y H:i:s',time()); ?></td>
	</tr>
</table>

