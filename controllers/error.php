<?php
/**
* Class for Error
*
* @package Nova
*/
class Error extends Controller {

/**
* Constructor
*/
	function __construct() {
		parent::__construct();
	}

/**
* Error page
*/	
	function index() {
		$this->view->msg = 'Du har kommit vilse, försök igen!';
		$this->view->render('error/index');
	}

}
