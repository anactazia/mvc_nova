<?php
/**
* Class for Config
*
* @package Nova
*/
class Config extends Controller {
	
	
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
* Config page - index
*/	
	public function index() {
		$role = Session::get('role');
		if($role == 'admin'){
		$this->view->render('config/index');
		}else{$this->view->render('user/restricted');}		
		
	}
	
/**
* Config page - config
*/	
	public function config() {
		$id = '1';
		$role = Session::get('role');
		if($role == 'admin'){
		$this->view->config = $this->model->viewconfig($id);
		$this->view->render('config/config');
		}else{$this->view->render('user/restricted');}
		
	}
		
	
/**
* Config page - configadmin
*/	
	public function configadmin() {
		$id = '1';
		$role = Session::get('role');
		if($role == 'admin'){
		$this->view->admin = $this->model->viewadmin($id);
		$this->view->render('config/configadmin');
		}else{$this->view->render('user/restricted');}		
		
	}

/**
* Config page - configdatabase
*/	
	public function configdatabase() {
		$id = '1';
		$role = Session::get('role');
		if($role == 'admin'){
		$this->view->database = $this->model->viewdatabase($id);
		$this->view->render('config/configdatabase');
		}else{$this->view->render('user/restricted');}		
		
	}	

/**
* Config page - init database - index
*/	
	public function init() {
		$id = '1';
		$role = Session::get('role');
		if($role == 'admin'){
		$this->view->render('config/init');
		}else{$this->view->render('user/restricted');}
		
	}
	

/**
* Config page - edited
*/	
	public function edited() {

		$this->view->render('config/edited');

		
	}	
	
/**
* Init table nova_users
*/	
	public function initusers() {
		$this->model->inittableusers();
		$this->view->render('config/inited_users');

		
	}
	

	
/**
* Init table nova_guestbook
*/	
	public function initguestbook() {
		$this->model->inittableguestbook();
		$this->view->render('config/inited_guestbook');

		
	}

/**
* Init table nova_posts
*/	
	public function initposts() {
		$this->model->inittableposts();
		$this->view->render('config/inited_posts');

		
	}

/**
* Init table nova_config
*/	
	public function initconfig() {
		$this->model->inittableconfig();
		$this->view->render('config/inited_config');

		
	}	

	public function saveconfig($id)
	{
		$data = array();
		$data['id'] = $id;
		$data['title_show'] 	= $_POST['title_show'];
		$data['title'] 		= $_POST['title'];
		$data['logo'] 		= $_POST['logo'];
		$data['logo_show'] 	= $_POST['logo_show'];
		$data['navmenu'] 	= $_POST['navmenu'];
		$data['footer'] 	= $_POST['footer'];
		$data['footer_show'] 	= $_POST['footer_show'];
		$data['theme'] 		= $_POST['theme'];
		$data['title_show'] 	= $_POST['title_show'];
		$data['base_url'] 	= $_POST['base_url'];
		$data['email'] 		= $_POST['email'];
		$data['index_name']	= $_POST['index_name'];
		$data['index_show'] 	= $_POST['index_show'];
		$data['guestbook'] 	= $_POST['guestbook'];
		$data['guestbook_show'] = $_POST['guestbook_show'];
		$data['blog'] 		= $_POST['blog'];
		$data['blog_show'] 	= $_POST['blog_show'];
		$data['articles'] 	= $_POST['articles'];
		$data['articles_show'] 	= $_POST['articles_show'];
		$data['contact'] 	= $_POST['contact'];
		$data['contact_show'] 	= $_POST['contact_show'];
		$data['page'] 		= $_POST['page'];
		$data['page_show'] 	= $_POST['page_show'];
		$data['post'] 		= $_POST['post'];
		$data['post_show'] 	= $_POST['post_show'];
		$data['trashcan'] 	= $_POST['trashcan'];
		$data['trashcan_show'] 	= $_POST['trashcan_show'];
		$data['gravatar_show'] 	= $_POST['gravatar_show'];
		$data['admin'] 		= $_POST['admin'];
		$data['profile'] 	= $_POST['profile'];
		$data['login'] 		= $_POST['login'];
		$data['logout'] 	= $_POST['logout'];
		
		$this->model->saveconfig($data);
		$this->view->render('config/edited');
	}
	
/**
* Save configuration
*/		
	public function saveadmin($id)
	{
		$data = array();
		$data['id'] = $id;
		$data['nickname'] = $_POST['nickname'];
		$data['password'] = md5($_POST['password']);
		$data['role'] = $_POST['role'];
		
		$this->model->saveadmin($data);
		$this->reload();
	}
	
	public function reload(){
		$this->view->render('config/edited');
	}
 		
  }	
