<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'object-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'guid',array('maxlength'=>23)); ?>

	<?php echo $form->textFieldRow($model,'lang',array()); ?>

	<?php echo $form->textFieldRow($model,'user_id',array()); ?>

	<?php echo $form->textAreaRow($model,'type',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'name',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'slug',array('maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'thumb',array('maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'date_created',array()); ?>

	<?php echo $form->textFieldRow($model,'date_modified',array()); ?>

	<?php echo $form->textFieldRow($model,'status',array()); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
