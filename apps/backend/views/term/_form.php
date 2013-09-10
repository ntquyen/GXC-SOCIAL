<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'term-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'taxonomy_id',array('maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'name',array('maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'slug',array('maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'parent',array()); ?>

	<?php echo $form->textFieldRow($model,'order',array()); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
