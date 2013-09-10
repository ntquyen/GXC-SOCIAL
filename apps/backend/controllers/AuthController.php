<?php
/**
 * AuthController.php
 *
 * @author: Tuan Nguyen - nganhtuan63@gmail.com
 */
class AuthController extends BeController {

	/* Open on startup */
	public function actionIndex() {	
		
		$this->render('index',array());
	}

}