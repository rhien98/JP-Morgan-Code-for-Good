<?php
class Users_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	public function checkLogin($username,$pass){
		// Returns TRUE if a user exists in the database
		// with the specified username and password,
		// and FALSE if not
		$hashedpass = sha1($pass);
		// Passwords in the database are SHA1
		// hashed so has supplied Passwords
		// before searching the database.
		$sql = "SELECT * FROM Users WHERE username = ? AND password = ? LIMIT 1";
		$data = array ($username, $hashedpass);
		$query = $this->db->query($sql,$data);
		//if there is a result (number of rows is greater than 0)
		if($query->num_rows()>0){
			return TRUE;
		} else {
		return FALSE;
	}
}

public function isFollowing($follower, $followed){
	$sql = "SELECT * FROM User_Follows WHERE follower_username = ? AND followed_username = ?";
	$data = array($follower, $followed);
	$query = $this->db->query($sql, $data);

	if($query->num_rows() == 1){
		return TRUE;
	} else {
		return FALSE;
	}
}

// Inserts a row into the Following table indicating that the logged-in user follows $followed.
public function follow($followed){
	// Start a session if the session hasn't been started.
	if(!isset($_SESSION)){
		session_start();
	}
	$follower = $_SESSION['user'];
	$sql = "INSERT INTO User_Follows VALUES (?,?)";
	$data = array($follower, $followed);
	$query = $this->db->query($sql, $data);
	}


}
