<?php
/**
* Class for Posts
*
* @package Nova
*/
class Posts extends Controller {

/**
* Constructor
*/
	public function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$userid = Session::get('id');
		}

/**
* Create Post page
*/		
	public function createpost() {
		$logged = Session::get('loggedIn');
		if($logged == 'loggedIn'){
		$this->view->postsList = $this->model->postsList();
		$this->view->render('posts/create');
		}else{$this->view->render('user/restricted');}
	}
	
/**
* Blog page
*/		
	public function blog() 
	{	
		$this->view->postsList = $this->model->postsList();
		$this->view->render('posts/blog');
	}

/**
* Articles page
*/		
	public function articles() 
	{	
		$this->view->postsList = $this->model->postsList();
		$this->view->render('posts/articles');
	}	
	
/**
* Articles page
*/		
	public function viewarticle($link) 
	{	
		$this->view->posts = $this->model->articleSingleList($link);
		$this->view->render('posts/viewarticle');
	
	}	

/**
* Create a post
*/	
	public function create() 
	{

		
		$data = array();
		$data['title'] = $_POST['title'];
		$data['text'] = $_POST['text'];
		$data['author'] = $_POST['author'];
		$data['type'] = $_POST['type'];
		$data['link'] = strtolower(str_replace(' ', '', $_POST['title']));
		$data['userid'] = $_POST['userid'];
		$data['useremail'] = $_POST['useremail'];
		$data['showemail'] = $_POST['showemail'];
		$data['image'] = $_POST['image'];
		$data['readers'] = $_POST['readers'];

		
		
		$this->model->create($data);
		if($_POST['type'] == 'post')
			{$this->view->render('posts/createdblog');}
		else{$this->view->render('posts/createdarticle');}

	}

/**
* Edit a post
*/	
	public function edit($id) 
	{	
		$this->view->posts = $this->model->postsSingleList($id);
		$this->view->render('posts/edit');
	
	}

/**
* Save after editing a post
*/	
	public function editSave($id)
	{	

		$data = array();
		$data['id'] = $id;
		$data['title'] = $_POST['title'];
		$data['text'] = $_POST['text'];
		$data['author'] = $_POST['author'];
		$data['type'] = $_POST['type'];
		$data['edited'] = $_POST['edited'];
		$data['useremail'] = $_POST['useremail'];
		$data['showemail'] = $_POST['showemail'];
		$data['image'] = $_POST['image'];
		$data['readers'] = $_POST['readers'];
		$data['link'] = strtolower(str_replace(' ', '', $_POST['title']));
		
		
		
		
		$this->model->editSave($data);

		if($_POST['type'] == 'post')
			{$this->view->render('posts/editedblog');}
		else{$this->view->render('posts/editedarticle');}		
		
	}
		

/**
* Move a post to trash
*/	
	public function trashcan() 
	{	$logged = Session::get('loggedIn');
		if($logged=='loggedIn'){
		$this->view->guestbookList = $this->model->guestbookList();
		$this->view->postsList = $this->model->postsList();
		$this->view->render('posts/trashcan');
		}else{$this->view->render('user/restricted');}		
	}	
	
/**
* Move a post to trashcan
*/
	public function trashblog($id)
	{ 	
		$data = array();
		$data['id'] = $id;
		$data['deleted'] = date ("Y-m-d H:i:s");		
		
		$this->model->trash($data);

		$this->view->render('posts/trashblog');
	}
	
/**
* Move a post to trashcan
*/
	public function trasharticle($id)
	{ 	
		$data = array();
		$data['id'] = $id;
		$data['deleted'] = date ("Y-m-d H:i:s");		
		
		$this->model->trash($data);
		$this->view->render('posts/trasharticle');
	}	
	
/**
* Move a post from trashcan to blog/articles
*/
	public function restore($id)
	{ 	
		$data = array();
		$data['id'] = $id;
		$data['deleted'] = '0000-00-00 00:00:00';		
		
		$this->model->trash($data);

		$this->view->render('posts/restored');
	}	
	
/**
* Delete a message in the Guestbook
*/
	public function delete($id)
	{
		$this->model->delete($id);
		$this->view->render('posts/deleted');
	}
}
