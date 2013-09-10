<?php $this->renderPartial('application.views.layouts.header'); ?>
<body>
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'fluid'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),            
        ),
    ),
    'type'=>'inverse'
)); ?>

<div class="container-fluid" id="page">


	<?php echo $content; ?>

	<div class="clear"></div>
	
</div><!-- page -->

</body>
</html>
