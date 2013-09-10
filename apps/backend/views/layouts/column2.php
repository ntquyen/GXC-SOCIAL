<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">    
    <div class="span2">
        <?php $this->renderPartial('application.views.layouts.nav'); ?>       
    </div>
    <div class="span10" id="container">
        <div id="content">
        	<?php $this->widget('bootstrap.widgets.TbMenu', array(
			    	'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
			    	//'stacked'=>false, // whether this is a stacked menu
			    	'items'=>$this->menu,			    
			)); ?>
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>