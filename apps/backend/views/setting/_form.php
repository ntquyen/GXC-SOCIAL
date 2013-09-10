<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'key',array('maxlength'=>64)); ?>

	<?php echo $form->textAreaRow($model,'value',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'group',array('maxlength'=>64)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
