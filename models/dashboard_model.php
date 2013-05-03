<?php
/**
* Class for Dashboard Model
*
* @package Nova
*/
class Dashboard_Model extends Model {

/**
* Constructor
*/	
	public function __construct() {
		parent::__construct();
	}

/**
* Show User information from the database
*/	
	public function userSingleList($id)
	{
		$sth = $this->db->prepare('SELECT id, nickname, password, role, name, email FROM nova_users WHERE id = :id');
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}

}