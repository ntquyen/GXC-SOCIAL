<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'taxonomy-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'guid',array('maxlength'=>23)); ?>

	<?php echo $form->textFieldRow($model,'lang',array()); ?>

	<?php echo $form->textFieldRow($model,'name',array('maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'description',array('maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'type',array()); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
