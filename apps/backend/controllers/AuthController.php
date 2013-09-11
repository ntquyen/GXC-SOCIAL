<?php
/**
 * AuthController.php
 *
 * @author: Tuan Nguyen - nganhtuan63@gmail.com
 */
class AuthController extends BeController {

	/* This is for Role Action */
	public function actionIndex() {					
		
		$dataProvider = $this->getDataProvider(CAuthItem::TYPE_ROLE);		
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));

	}

	public function getDataProvider($type) {
		$dataProvider = new AuthItemDataProvider();
		$dataProvider->type = $type;
		return $dataProvider;
	}

}