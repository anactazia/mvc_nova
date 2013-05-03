<?php
/**
* Class for User Model
*
* @package Nova
*/
class User_Model extends Model {
	
/**
* Constructor
*/	
	public function __construct()
	{
		parent::__construct();
	}

/**
* List of users
*/		
	public function userList()
	{
		$sth = $this->db->prepare('SELECT id, nickname, password, role, name, email, hash, active FROM nova_users');
		$sth->execute();
		return $sth->fetchAll();
	}

/**
* Show a user
*/		
	public function userSingleList($id)
	{
		$sth = $this->db->prepare('SELECT id, nickname, password, role, name, email, hash, active FROM nova_users WHERE id = :id');
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}
	
/**
* When logged in as Administrator, Create a new User Account
*/		
	public function create($data)
	{	$sth = $this->db->prepare('SELECT id, nickname, password, role, name, email FROM nova_temp_users');
		$sth = $this->db->prepare('INSERT INTO nova_users
			(`nickname`, `password`, `role`, `email`) 
			VALUES (:nickname, :password, :role, :email)
			');
		
		$sth->execute(array(
			':nickname' => $data['nickname'],
			':password' => $data['password'],
			':role' => $data['role'],
			':email' => $data['email']
			
		));
	}

/**
* Create a new User Account
*/		
	public function ucreate($data)
	{
		$sth = $this->db->prepare('INSERT INTO nova_users
			(`nickname`, `password`, `role`, `email`, `hash`, `active`) 
			VALUES (:nickname, :password, :role, :email, :hash, :active)
			');
		
		$sth->execute(array(
		':nickname' => $data['nickname'],
		':password' => $data['password'],
		':role' => $data['role'],
		':email' => $data['email'],
		':hash' => $data['hash'],
		':active' => $data['active']
			
			
		));
	}

/**
* Edit User Account
*/		
	public function editSave($data)
	{
		$sth = $this->db->prepare('UPDATE nova_users
			SET `nickname` = :nickname, `password` = :password, `role` = :role, `name` = :name, `email` = :email
			WHERE id = :id
			');
		
		$sth->execute(array(
			':id' => $data['id'],
			':nickname' => $data['nickname'],
			':password' => $data['password'],
			':role' => $data['role'],
			':name' => $data['name'],
			':email' => $data['email']
		));
			Session::init();
			Session::set('role', $data['role']);
			Session::set('loggedIn', true);
			Session::set('id', $data['id']);
			Session::set('nickname', $data['nickname']);
			Session::set('email', $data['email']);
	}
	
/**
* Edit User Account when logged in as admin
*/		
	public function admineditSave($data)
	{
		$sth = $this->db->prepare('UPDATE nova_users
			SET `nickname` = :nickname, `role` = :role, `name` = :name, `email` = :email
			WHERE id = :id
			');
		
		$sth->execute(array(
			':id' => $data['id'],
			':nickname' => $data['nickname'],
			':role' => $data['role'],
			':name' => $data['name'],
			':email' => $data['email']
		));
	
	}	

/**
* Delete a User Account
*/		
	public function delete($id)
	{
		$sth = $this->db->prepare('DELETE FROM nova_users WHERE id = :id');
		$sth->execute(array(
			':id' => $id
		));
	}

}