<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'resource-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'path',array('maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'type',array('maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'date_created',array()); ?>

	<?php echo $form->textFieldRow($model,'date_modified',array()); ?>

	<?php echo $form->textFieldRow($model,'uid',array()); ?>

	<?php echo $form->textFieldRow($model,'storage',array('maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
