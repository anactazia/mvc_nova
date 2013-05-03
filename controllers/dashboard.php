<?php
/**
* Class for Dashboard
*
* @package Nova
*/
class Dashboard extends Controller {

/**
* Constructor
*/
	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$email = Session::get('email');
		$user = Session::get('nickname');
		$id = Session::get('id');

		if ($logged == false) {
			Session::destroy();
			header('location: ../user/restricted');
			exit;
		}
	
		
	}

/**
* Show Index page after logged in
*/	
	function index() 
	{	
		$role = Session::get('role');
		if($role == 'admin') {$this->view->render('dashboard/adminindex');}
		else {$this->view->render('dashboard/userindex');}
	}

/**
* Log out
*/	
	function logout()
	{
		Session::destroy();
		$this->view->render('dashboard/logout');
		exit;
	}
	
	
	

}
