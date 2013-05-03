<?php
/**
* Class for Guestbook Model
*
* @package Nova
*/
class Guestbook_Model extends Model {
	
/**
* Constructor
*/	
	public function __construct()
	{
		parent::__construct();
	}

/**
* List of guestbook items
*/
	public function guestbookList()
	{
		$sth = $this->db->prepare('SELECT id, topic, text, author, userid, 
			created, edited, deleted, useremail, showemail, readers FROM nova_guestbook');
		$sth->execute();
		return $sth->fetchAll();
	}
	
/**
* Show a guestbook item
*/
	public function guestbookSingleList($id)
	{
		$sth = $this->db->prepare('SELECT id, topic, text, author, userid, 
			created, edited, deleted, useremail, showemail, readers FROM nova_guestbook WHERE id = :id');
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}
	
/**
* Create a guestbook item
*/
	public function create($data)
	{

		$sth = $this->db->prepare('INSERT INTO nova_guestbook
			(`topic`, `text`, `author`,`userid`, `useremail`,`showemail`, `readers`)  
			VALUES (:topic, :text, :author, :userid, :useremail, :showemail, :readers) 
			');
		
		$sth->execute(array(
			':topic' => $data['topic'],
			':text' => $data['text'],
			':author' => $data['author'],
			':userid' => $data['userid'],
			':useremail' => $data['useremail'],
			':showemail' => $data['showemail'],
			':readers' => $data['readers']
			
		));
	}

/**
* Edit a guestbook item
*/	
	public function editSave($data)
	{
		$sth = $this->db->prepare('UPDATE nova_guestbook
			SET `topic` = :topic, `text` = :text, `edited` = :edited,
			`useremail` = :useremail, `showemail` = :showemail, `readers` = :readers
			WHERE id = :id
			');
		
		$sth->execute(array(
			':id' => $data['id'],
			':topic' => $data['topic'],
			':text' => $data['text'],
			':edited' => $data['edited'],
			':useremail' => $data['useremail'],
			':showemail' => $data['showemail'],
			':readers' => $data['readers'],
			
		));
	}
	
/**
* Move a guestbook item to trashcan
*/	
	public function trash($data)
	{
		$sth = $this->db->prepare('UPDATE nova_guestbook
			SET `deleted` = :deleted
			WHERE id = :id
			');
		
		$sth->execute(array(
			':id' => $data['id'],
			':deleted' => $data['deleted'],
			
		));
	}	
	
/**
* Delete a guestbook item
*/
	public function delete($id)
	{
		$sth = $this->db->prepare('DELETE FROM nova_guestbook WHERE id = :id');
		$sth->execute(array(
			':id' => $id
		));
	}
}