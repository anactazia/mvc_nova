<?php
/**
* Class for Login
*
* @package Nova
*/
class Login extends Controller {

/**
* Constructor
*/
	function __construct() {
		parent::__construct();	
	}
	
/**
* Show Loginpage
*/
	function index() 
	{	
		$this->view->render('login/index');
	}
	
/**
* Submit form
*/	
	function run()
	{
		$this->model->run();
	}
	
/**
* Signup
*/	
	function signup()
	{
		$this->view->render('login/signup');
	}	
	
/**
* Submit form
*/	
	function verify()
	{
		$this->view->render('login/verify');
	}
	
/**
* Error
*/	
	function error()
	{
		$this->view->render('login/error');
	}

/**
* Error - account not activated
*/	
	function notactive()
	{
		$this->view->render('login/notactive');
	}		

}
