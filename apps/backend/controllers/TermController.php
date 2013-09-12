<?php

class TermController extends BeController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	protected function beforeAction(){		
		//Prepare Breadcrumbs
		$this->breadcrumbs=array(
			'Term'=>array('admin'),		
		);	
		//Prepare Menu
		$this->menu=array(					
			array('label'=>t('labels','Create Term'),'url'=>array('create'),'active'=>$this->action->id=='create' ? true : false),
			array('label'=>t('labels','Manage Terms'),'url'=>array('admin'),'active'=>$this->action->id=='admin' ? true : false),
			
		);		
		return true;
	}


	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Term;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Term']))
		{
			$model->attributes=$_POST['Term'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Term']))
		{
			$model->attributes=$_POST['Term'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionBatchDelete()
    {        
        $request = Yii::app()->getRequest();
        if($request->getIsPostRequest()){
            if(isset($_POST['ids'])){
                $ids = $_POST['ids'];
            }
            if (empty($ids)) {
                echo CJSON::encode(array('status' => 'failure', 'msg' => 'Please choose at least one item'));
                die();
            }                    
            $successCount = $failureCount = 0;
            foreach ($ids as $id) {
                $model = $this->loadModel($id);
                ($model->delete() == true) ? $successCount++ : $failureCount++;
            }
            echo CJSON::encode(array('status' => 'success',
                'data' => array(
                    'successCount' => $successCount,
                    'failureCount' => $failureCount,
                )));
            die();
        }else{
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
    }


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Term('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Term']))
			$model->attributes=$_GET['Term'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Term::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='term-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
