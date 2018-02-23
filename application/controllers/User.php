<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
        function __construct(){
                parent::__construct();
                // Load the URL helper
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->library('session');
        }
        //checks there is a username found then displays messages, otherwise display error
        public function view ($name = null){
                $this->load->model('Messages_model');

                if($name == null){
                        $data = $this->Messages_model->getMessagesByPoster();
                }else{
                        $data = $this->Messages_model->getMessagesByPoster($name);
                }
                if(count($data) == 0){
                        echo "No messages found.";
                        return;
                }
                $viewData = array("results" => $data);
                $this->load->view('ViewMessages', $viewData);
        }


	// Logs the user in.
	public function login() {
		$this->load->view('Login');
	}

	// Loads the Users_model, calls checkLogin() passing POSTed user/pass & either re-displays
	// Login view with error message, or redirects to the user/view/{username} controller to view their messages.
	// If login is successful, a session variable containing the username is set.
	public function doLogin() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(isset($_POST['username']) && isset($_POST['password'])) {
		//asigns the values from POST to variables
			$username = strtolower($_POST['username']);
			$password = $_POST['password'];

		//load Users_model
			$this->load->model('Users_model');
		//calls checkLogin in Users_model, returns true if information is valid
		// assigns it to a variable called $check

			$check = $this->Users_model->checkLogin($username,$password);
		}else{
			echo "Please enter your username and password.";
		}

		//if $check is true
		if($check){
			// Username and Password are correct logs the user in and redirects to the user's messages.
			$_SESSION['user'] = $username;
			$_SESSION['valid'] = true;
			redirect("user/view/$username");

		}else{
		//user is not logged in redirects user to login page global var is false, so prints out error in view.
			$_SESSION['valid'] = false;
			$this->load->view('Login');
			echo "Please enter your username and password correctly.";
		}
	}

	// Function to log the user out.
	public function logout() {
		session_destroy();
		redirect('/User/Login');
	}
}
