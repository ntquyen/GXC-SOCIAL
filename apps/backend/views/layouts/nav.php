   <?php $this->widget('bootstrap.widgets.TbMenu', array(
        'type'=>'list',
        'items'=>array(

            //Start HOME ITEMS
            array('label'=>'HOME','icon'=>'home',),

            array('label'=>'Dashboard',  'url'=>array('/site/index'),'active'=> ((Yii::app()->controller->id=='site') && (in_array(Yii::app()->controller->action->id,array('index'))) ? true : false)),            

            array('label'=>'Profile',  'url'=>array('/profile/index'),'active'=> ((Yii::app()->controller->id=='profile') && (in_array(Yii::app()->controller->action->id,array('index'))) ? true : false)),    

            //Start USER ITEMS
            array('label'=>'USER','icon'=>'user'),            

            array('label'=>'Create user',  'url'=>array('/user/create'),'active'=> ((Yii::app()->controller->id=='user') && (in_array(Yii::app()->controller->action->id,array('create'))) ? true : false)),   

            array('label'=>'Manage users',  'url'=>array('/user/admin'),'active'=> ((Yii::app()->controller->id=='user') && (in_array(Yii::app()->controller->action->id,array('update','admin'))) ? true : false)),   

            array('label'=>'Permissions',  'url'=>array('/auth/assignment'),'active'=>in_array(Yii::app()->controller->id,array('assignment','authitem','operation','role','task')) ?true:false),  
                        
            //Start OBJECT ITEMS
            array('label'=>'Object','icon'=>'file'),            
            
            array('label'=>'Create object',  'url'=>array('/object/create'),'active'=> ((Yii::app()->controller->id=='object') && (in_array(Yii::app()->controller->action->id,array('create'))) ? true : false)),   

            array('label'=>'Manage objects',  'url'=>array('/object/admin'),'active'=> ((Yii::app()->controller->id=='object') && (in_array(Yii::app()->controller->action->id,array('update','admin'))) ? true : false)),   


            //Start TAXONOMY ITEMS
            array('label'=>'Taxonomy','icon'=>'tags'),

            array('label'=>'Create term',  'url'=>array('/term/create'),'active'=> ((Yii::app()->controller->id=='term') && (in_array(Yii::app()->controller->action->id,array('create'))) ? true : false)),   

            array('label'=>'Manage terms',  'url'=>array('/term/admin'),'active'=> ((Yii::app()->controller->id=='term') && (in_array(Yii::app()->controller->action->id,array('update','admin'))) ? true : false)),   

            array('label'=>'Create taxonomy',  'url'=>array('/taxonomy/create'),'active'=> ((Yii::app()->controller->id=='taxonomy') && (in_array(Yii::app()->controller->action->id,array('create'))) ? true : false)),   

            array('label'=>'Manage taxonomy',  'url'=>array('/resource/admin'),'active'=> ((Yii::app()->controller->id=='taxonomy') && (in_array(Yii::app()->controller->action->id,array('update','admin'))) ? true : false)),   

            //Start RESOURCE ITEMS
            array('label'=>'Resource','icon'=>'picture'),            

            array('label'=>'Create resource',  'url'=>array('/resource/create'),'active'=> ((Yii::app()->controller->id=='resource') && (in_array(Yii::app()->controller->action->id,array('create'))) ? true : false)),   

            array('label'=>'Manage resources',  'url'=>array('/resource/admin'),'active'=> ((Yii::app()->controller->id=='resource') && (in_array(Yii::app()->controller->action->id,array('update','admin'))) ? true : false)),   
            
            //Start SYSTEM ITEMS
            array('label'=>'System','icon'=>'cog',),
            
            array('label'=>'Settings',  'url'=>array('/system/setting'),'active'=> ((Yii::app()->controller->id=='system') && (in_array(Yii::app()->controller->action->id,array('setting'))) ? true : false)),           
        ),
        'htmlOptions'=>array('class'=>'well')
    )); ?>