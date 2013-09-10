<?php
/**
 * BeController.php
 *
 */
class BeController extends CController {

	public $breadcrumbs = array();
	public $menu = array();
	public $layout='column2';

	public function filters()
	{
		  return array(
		   		'accessControl'
		  );
	}

}