<?php
/**
* Class for Contact
*
* @package Nova
*/
class Contact extends Controller {

/**
* Constructor
*/
	function __construct() {
		parent::__construct();
	}

/**
* Help page
*/	
	function index() {
		$this->view->render('contact/index');	
	}
	
/**
* Sent message
*/	
	function message_sent() {
		$this->view->render('contact/message_sent');	
	}
	
/**
* Contact form
*/	
	public function sendmail() 
	{	
		
		$data = array();
		$data['subject'] = $_POST['subject'];
		$data['message'] = $_POST['message'];
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];

		
		
		
$to      = EMAIL;
$subject = $data['subject'];
$message = $data['message']; 
          
$headers = 'From:' . $data['name'] . '"\r\n"'; 
$headers .= 'Email:' . $data['email'] . '"\r\n"'; 
mail($to, $subject, $message, $headers); 

		$this->view->render('contact/message_sent');		

	}
}	
