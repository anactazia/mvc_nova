<?php
/**
* Class for Guestbook
*
* @package Nova
*/

class Guestbook extends Controller {

/**
* Constructor
*/
	public function __construct() {
		parent::__construct();
		Session::init();
		$id = Session::get('id');
		$logged = Session::get('loggedIn');
		$role = Session::get('role');
		}

/**
* Guestbook page
*/		
	public function index() 
	{		
		$logged = Session::get('loggedIn');
		$role = Session::get('role');
		$this->view->guestbookList = $this->model->guestbookList();
		if($logged == 'loggedIn'){
		   if($role == 'admin') {$this->view->render('guestbook/admin');}
		else  {$this->view->render('guestbook/users');}}
		else {$this->view->render('guestbook/index');}
		
	}
	

/**
* Create a message in the Guestbook
*/	
	public function create() 
	{	$data = array();
		$data['topic'] = $_POST['topic'];
		$data['text'] = $_POST['text'];
		$data['author'] = $_POST['author'];
		$data['userid'] = $_POST['userid'];
		$data['useremail'] = $_POST['useremail'];
		$data['showemail'] = $_POST['showemail'];
		$data['readers'] = $_POST['readers'];

		
		
		$this->model->create($data);
		$this->view->render('guestbook/createdguestbook');
	}

/**
* Edit a message in the Guestbook
*/	
	public function edit($id) {
		$logged = Session::get('loggedIn');
		if($logged == 'loggedIn'){
		$this->view->guestbook = $this->model->guestbookSingleList($id);
		$this->view->render('guestbook/edit');
		} else {$this->view->render('user/restricted');}
	}

/**
* Save after Editing a message in the Guestbook
*/	
	public function editSave($id){
		$data = array();
		$data['id'] = $id;
		$data['topic'] = $_POST['topic'];
		$data['text'] = $_POST['text'];
		$data['author'] = $_POST['author'];
		$data['edited'] = $_POST['edited'];
		$data['useremail'] = $_POST['useremail'];
		$data['showemail'] = $_POST['showemail'];
		$data['readers'] = $_POST['readers'];		
		
		
		
		$this->model->editSave($data);
		$this->view->render('guestbook/editedguestbook');
	}

/**
* Move a item from guestbook to trash
*/	
	public function trashcan() 
	{	$logged = Session::get('loggedIn');
		if($logged=='loggedIn'){
		$this->view->guestbookList = $this->model->guestbookList();
		$this->view->render('guestbook/trashcan');
		}else{$this->view->render('user/restricted');}
		
	}	
	
/**
* Move a item from guestbook to trashcan
*/
	public function trash($id)
	{ 	
		$data = array();
		$data['id'] = $id;
		$data['deleted'] = date ("Y-m-d H:i:s");		
		
		$this->model->trash($data);
		$this->view->render('guestbook/trashguestbook');
	}
	
/**
* Move a item from trashcan to guestbook
*/
	public function restore($id)
	{ 	
		$data = array();
		$data['id'] = $id;
		$data['deleted'] = '0000-00-00 00:00:00';		
		
		$this->model->trash($data);
		$this->view->render('guestbook/restoredguestbook');
	}	
	
/**
* Delete a message in the Guestbook
*/
	public function delete($id)
	{
		$this->model->delete($id);
		$this->view->render('guestbook/deletedguestbook');
	}
}
