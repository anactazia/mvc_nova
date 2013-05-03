<?php
/**
* Class for Post Model
*
* @package Nova
*/
class Posts_Model extends Model {
	
/**
* Constructor
*/	
	public function __construct()
	{
		parent::__construct();

	}

/**
* List of posts
*/
	public function postsList()
	{
		$sth = $this->db->prepare('SELECT id, title, text, author, type, userid, 
			created, edited, deleted, image, useremail, showemail, 
			link, readers FROM nova_posts');
		$sth->execute();
		return $sth->fetchAll();
	}
	
/**
* Show a post
*/
	public function postsSingleList($id)
	{
		$sth = $this->db->prepare('SELECT id, title, text, author, type, userid, 
			created, edited, deleted, image, useremail, showemail, 
			link, readers FROM nova_posts WHERE id = :id');
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}
	
/**
* Show an article
*/
	public function articleSingleList($link)
	{
		$sth = $this->db->prepare('SELECT id, title, text, author, type, userid, 
			created, edited, deleted, image, useremail, showemail, 
			link, readers FROM nova_posts WHERE link = :link');
		$sth->execute(array(':link' => $link));
		return $sth->fetch();
	}	
	

	
/**
* Create a post
*/
	public function create($data)
	{

		$sth = $this->db->prepare('INSERT INTO nova_posts
			(`title`, `text`, `author`,`userid`, `type`,`image`,
			`link`, `useremail`, `showemail`,`readers`)  
			VALUES (:title, :text, :author, :userid, :type, :image, 
			:link, :useremail, :showemail, :readers)
			');
		
		$sth->execute(array(
			':title' => $data['title'],
			':text' => $data['text'],
			':author' => $data['author'],
			':userid' => $data['userid'],
			':useremail' => $data['useremail'],
			':showemail' => $data['showemail'],
			':type' => $data['type'],
			':image' => $data['image'],
			':link' => $data['link'],
			':readers' => $data['readers']
			
		));
	}

/**
* Edit a post
*/	
	public function editSave($data)
	{
		$sth = $this->db->prepare('UPDATE nova_posts
			SET `title` = :title, `text` = :text, `edited` = :edited, `image` = :image, `type` = :type,
			`useremail` = :useremail,`showemail` = :showemail,`readers` = :readers,`link` = :link
			WHERE id = :id
			');
		
		$sth->execute(array(
			':id' => $data['id'],
			':title' => $data['title'],
			':text' => $data['text'],
			':edited' => $data['edited'],
			':image' => $data['image'],
			':type' => $data['type'],			
			':useremail' => $data['useremail'],
			':showemail' => $data['showemail'],
			':link' => $data['link'],
			':readers' => $data['readers'],
			
			
		));
	}
	
/**
* Send a post to the trashcan
*/	
	public function trash($data)
	{
		$sth = $this->db->prepare('UPDATE nova_posts
			SET `deleted` = :deleted
			WHERE id = :id
			');
		
		$sth->execute(array(
			':id' => $data['id'],
			':deleted' => $data['deleted'],
			
		));
	}	
	
/**
* Delete a post
*/
	public function delete($id)
	{
		$sth = $this->db->prepare('DELETE FROM nova_posts WHERE id = :id');
		$sth->execute(array(
			':id' => $id
		));
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
	
}