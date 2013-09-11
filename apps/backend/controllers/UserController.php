<?php
/**
 * UserController.php
 *
 * @author: Tuan Nguyen - nganhtuan63@gmail.com
 */
class UserController extends BeController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
		$model=new UserForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserForm']))
		{
			$model->attributes=$_POST['UserForm'];
			if($model->validate()){
				    //Create a new User Model
				    $new_user = new User;
                    $new_user->scenario='create';
                    $new_user->username=$model->username;
                    $new_user->email=$model->email;
                    $new_user->display_name=$model->display_name;                    
                                    
                    if($new_user->save()){
                    	
                    	//Create a new User Login Model
                    	$new_login = new UserLogin;
                    	$new_login->user_id = $new_user->id;
                    	$new_login->pass_hash = $model->password;
                    	$new_login->activation_key = md5(rand().rand().rand());
                    	$new_login->recent_login = time();

                    	//Create a new User Profile Model
                    	$new_profile = new UserProfile;
                    	$new_profile->user_id = $new_user->id;
                    	

                    	if($new_login->save() && $new_profile->save()){
                    		user()->setFlash('success',t('message','Create new user successfully!'));
                    	} else {
                    		$new_user->delete();
                    		throw new CHttpException(400,t('message','Error while processing.'));
                    	}                    	

                    } else {
                    	throw new CHttpException(400,t('message','Error while processing.'));
                    }
 
                    $model= new UserForm;
                    $this->redirect(array('view','id'=>$new_user->id));
			}		
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

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
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
			throw new CHttpException(400,t('message','Invalid request. Please do not repeat this request again.'));
	}

	public function actionBatchDelete()
    {        
        $request = Yii::app()->getRequest();
        if($request->getIsPostRequest()){
            if(isset($_POST['ids'])){
                $ids = $_POST['ids'];
            }
            if (empty($ids)) {
                echo CJSON::encode(array('status' => 'failure', 'msg' => t('message','Please choose at least one item')));
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
            throw new CHttpException(400,t('message','Invalid request. Please do not repeat this request again.'));
        }
    }


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,t('message','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
