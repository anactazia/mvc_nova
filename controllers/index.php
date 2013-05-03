<?php
/**
* Class for Index
*
* @package Nova
*/
class Index extends Controller {

/**
* Constructor
*/
	function __construct() {
		parent::__construct();
	}

/**
* Index page
*/	
	function index() {
		$this->view->render('index/index');
		
	}
	
/**
* Show image 1
*/	
	function image1() {
		$this->view->render('index/image1');
		
	}

/**
* Show image 2
*/	
	function image2() {
		$this->view->render('index/image2');
		
	}

/**
* Show image 3
*/	
	function image3() {
		$this->view->render('index/image3');
		
	}

/**
* Show info page about Admin page
*/	
	function pageadmin() {
		$this->view->render('index/pageadmin');
		
	}	
	
/**
* Show info page about Blog and Guestbook page
*/	
	function pageguestblog() {
		$this->view->render('index/pageguestblog');
		
	}

/**
* Show info page about Admin page
*/	
	function pagethemes() {
		$this->view->render('index/pagethemes');
		
	}	
	
}
