<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

// Initialise the controller.
public function __construct() {
	parent::__construct();
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('session');
}

// If the user is logged in, opens the page for them to post a new message, otherwise it opens the login page.
public function index() {
	if(isset($_SESSION['valid']) && $_SESSION['valid']) {
		$this->load->view('Post');
	} else {
		redirect("user/Login");
	}
}

// Function to post messages.
	public function doPost() {
	if(!isset($_SESSION)){
				session_start();
			}
			//if the session is not valid, then redirect to login page
			if($_SESSION['valid'] == false){
				redirect("user/Login");		}
			//if is valid, then get the string using POST
			$this->load->model('Messages_model');
			$username = $_SESSION['user'];
			$string = $_POST['message'];
			// and call the insertMessage function
			$this->Messages_model->insertMessage($username,$string);

			//fetches all messages by the loggedin user
			$data['query'] = $this->Messages_model->getMessagesByPoster($username);

		//loads the users messages
		$this->load->view('ViewMessages',$data);
	}
}
?>
