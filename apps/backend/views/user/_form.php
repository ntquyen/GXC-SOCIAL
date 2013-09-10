<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'email',array('maxlength'=>255)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'username',array('maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'display_name',array('maxlength'=>255)); ?>	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Create',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">    
    CopyString('#UserForm_email','#UserForm_username','email');
    CopyString('#UserForm_email','#UserForm_display_name','email');
</script>
