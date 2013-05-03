<?php
/**
* Class for Page
*
* @package Nova
*/
class Page extends Controller {

/**
* Constructor
*/
	function __construct() {
		parent::__construct();
	}

/**
* Page
*/	
	function index() {
		$this->view->render('page/index');	
	}

}	
