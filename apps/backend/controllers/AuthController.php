<?php
/**
 * AuthController.php
 *
 * @author: Tuan Nguyen - nganhtuan63@gmail.com
 */
class AuthController extends BeController {

	/* This is for Auth Item Action */
	public function actionIndex() {					
		
		$type=$this->getType();
		$dataProvider = $this->getDataProvider($type);		
		$this->render('index', array(
			'type'=>$type,
			'dataProvider' => $dataProvider,
		));

	}

	public function actionView() {

	}

	public function actionCreate() {
		$type=$this->getType();
	}

	/* Get The Type of The Request */
	public function getType(){
		//Set default type is role
		$type=isset($_GET['type']) ? (int)($_GET['type']) : 2;		
		if($type===null || !in_array($type,array(CAuthItem::TYPE_OPERATION,CAuthItem::TYPE_ROLE,CAuthItem::TYPE_TASK),true)){						
			throw new CHttpException(400,t('message','Invalid request. Please do not repeat this request again.'));
		}
		return $type;
	}

	/* Get The Type of The Request */
	public function getDataProvider($type) {
		$dataProvider = new AuthItemDataProvider();
		$dataProvider->type = $type;		
		return $dataProvider;
	}

	public function authLabels($type=false){
		$items = array(
			CAuthItem::TYPE_OPERATION=>t('labels','Operation'),
			CAuthItem::TYPE_ROLE=>t('labels','Role'),
			CAuthItem::TYPE_TASK=>t('labels','Task')
		);

		if($type!==null){
			return $items[$type];
		}

		return $items;

	}

}