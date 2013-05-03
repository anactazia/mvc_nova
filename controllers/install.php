<?php
/**
* Class for Config
*
* @package Nova
*/
class Install extends Controller {
	
/**
* Constructor
*/
	public function __construct() {
		parent::__construct();
		Session::init();

		$logged = Session::get('loggedIn');
		$role = Session::get('role');
		$id = Session::get('id');
		$user = Session::get('nickname');
		$email = Session::get('email');	
				
	}

/**
* Index
*/	
	public function index() {

		$this->view->clean('install/index');
		
	}
	
/**
* Install 1
*/	
	public function install_step1() {
		$this->view->clean('install/install_step1');
	}
	
/**
* Install 2
*/	
	public function install_step2() {
		$id = '1';
		$this->view->install = $this->model->viewadmin($id);
		$this->model->createtables();
		$this->view->clean('install/install_step2');
	}	
	
/**
* Install success
*/	
	public function install_success() {
		$id='1';
		$config = array();
		$data['id'] = $id;		
		$data['nickname'] = $_POST['nickname'];
		$data['password'] = md5($_POST['password']);
		
		$this->model->saveadmin($data);
		$this->view->clean('install/install_success');
	}	


 		
  }	
