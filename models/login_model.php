<?php
/**
* Class for Login Model
*
* @package Nova
*/
class Login_Model extends Model {
	
/**
* Constructor
*/	
	public function __construct()
	{
		parent::__construct();
	}

/**
* Submit login form
*/	
	public function run()
	{
		$sth = $this->db->prepare("SELECT id, role, nickname, email, active FROM nova_users WHERE 
				nickname = :nickname AND password = MD5(:password) AND active='yes'");
		$sth->execute(array(
			':nickname' => $_POST['nickname'],
			':password' => $_POST['password']
		));
		
		$data = $sth->fetch();
		
		$count =  $sth->rowCount();
		if ($count > 0) {
			// login
			Session::init();
			Session::set('role', $data['role']);
			Session::set('loggedIn', true);
			Session::set('id', $data['id']);
			Session::set('nickname', $data['nickname']);
			Session::set('email', $data['email']);
			header('location: ../dashboard');
		} else {
			$sth = $this->db->prepare("SELECT id, role, nickname, email, active FROM nova_users WHERE 
				nickname = :nickname AND password = MD5(:password)");
			$sth->execute(array(
			':nickname' => $_POST['nickname'],
			':password' => $_POST['password']
			));
		
			$data = $sth->fetch();
		
			$count =  $sth->rowCount();
					
			if ($count > 0){
			header('location: ../login/notactive');
			} else {
			header('location: ../login/error');}	
		}
		
	}
	
	

}
