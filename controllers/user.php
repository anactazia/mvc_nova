<?php
/**
* Class for User
*
* @package Nova
*/
class User extends Controller {
	
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
* Index page when logged in as Admin
*/	
	public function adminindex() {
		$role = Session::get('role');
		if($role == 'admin'){
		$this->view->userList = $this->model->userList();
		$this->view->render('user/adminindex');
		}else{$this->view->render('user/restricted');}
	}
	
/**
* Index page when logged in as User
*/	
	public function userindex() {
		$role = Session::get('role');
		if($role == 'user'){
		$this->view->userList = $this->model->userList();
		$this->view->render('user/userindex');
		}else{$this->view->render('user/restricted');}
	}
	
/**
* Admin panel for managing User Accounts
*/		
	public function admin() {
		$role = Session::get('role');
		if($role == 'admin'){
		$this->view->userList = $this->model->userList();
		$this->view->render('user/admin');
		}else{$this->view->render('user/restricted');}
	}
	
/**
* Page for creating a User account
*/
	public function usercreate() 
	{	
		$this->view->render('user/usercreate');
	}
	
/**
* Create a User account and show a success message
*/	
	public function ucreate() 
	{	
		$data = array();
		$data['nickname'] = $_POST['nickname'];
		$data['password'] = md5($_POST['password']);
		$data['email'] = $_POST['email'];
		$data['hash'] = $_POST['hash'];
		$data['active'] = $_POST['active'];
		$data['role'] = $_POST['role'];

$nickname= $data['nickname'];		
$email   = $data['email'];
$to      = $email;
$subject = 'Bekräfta ditt konto'; 
$message = ' 
 
Välkommen till NOVA! 
Ditt konto har blivit skapat, du kan logga in med ditt användarnamn och lösenord efter att du aktiverat ditt konto genom att klicka på länken här nedan. 
 
------------------------ 
Username: '.$nickname.' 
------------------------ 
 
Klicka på länken för att aktivera ditt konto: 
 
' . BASE_URL . '/login/verify?email='.$email.'&hash='.$data['hash'].' 

'; // Our message above including the link  
                      
$headers = 'From:' . EMAIL . "\r\n"; 
mail($to, $subject, $message, $headers); 

		$role = Session::get('role');
		$this->model->ucreate($data);
		$this->view->render('login/created');		

	}
	
/**
* Create a User account when logged in as admin and show a success message
*/	
	public function acreate() 
	{
		$data = array();
		$data['nickname'] = $_POST['nickname'];
		$data['password'] = md5($_POST['password']);
		$data['role'] = $_POST['role'];
		$data['email'] = $_POST['email'];
		
		$role = Session::get('role');
		$this->model->create($data);
		header('location: ' . BASE_URL . 'user/admin');

	}	
	
/**
* When logged in as Admin, Edit a User Account
*/	
	public function edit($id) 
	{	Session::init();
		$role = Session::get('role');
		if($role == 'admin'){
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('user/adminedit');
		}else{$this->view->render('user/restricted');}

	}

/**
* When logged in, Edit your own User Account
*/		
      public function useredit() {
      	        $logged = Session::get('loggedIn');
		if($logged == 'loggedIn'){
		$id = Session::get('id');
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('user/useredit');	
		}else{$this->view->render('user/restricted');}

	}
	
/**
* Save changes made after Admin has Edited a User Account
*/		
	public function admineditSave($id)
	{
		$data = array();
		$data['id'] = $id;
		$data['nickname'] = $_POST['nickname'];
		$data['role'] = $_POST['role'];
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		
		// @TODO: Do your error checking!
		
		$this->model->admineditSave($data);
		$this->view->render('user/adminedited');
	}
	
/**
* Save changes made after User has Edited his/her own User Account
*/	
	public function usereditSave($id)
	{
		$data = array();
		$data['id'] = $id;
		$data['nickname'] = $_POST['nickname'];
		$data['password'] = md5($_POST['password']);
		$data['role'] = $_POST['role'];
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		
		// @TODO: Do your error checking!
		
		$this->model->editSave($data);
		header('location: ' . BASE_URL . 'user/useredit');
	}
	
/**
* When logged in as Admin, Delete a User Account
*/	
	public function delete($id)
	{
		$this->model->delete($id);
		header('location: ' . BASE_URL . 'user/admin');
	}
	
/**
* When logged in, Delete your own User Account
*/	
	public function userdelete($id)
	{
		$this->model->delete($id);
		Session::destroy();
		$this->view->render('dashboard/deleted');
	}
	
	
/**
* Restricted page
*/	
	public function restricted()
	{
		$this->view->render('user/restricted');
	}

 		
  }	


