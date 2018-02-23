<?php
class Messages_model extends CI_Model {
  public function __construct() { $this->load->database(); }

  public function getMessagesByPoster($name) {
    $sql = "SELECT user_username, text, posted_at FROM Messages WHERE user_username = '$name' ORDER BY posted_at DESC;";
    $query = $this->db->query($sql);
    return $query->result_array();
	}


	public function searchMessages($string){
    $this->db->select('user_username, text, posted_at');
    $this->db->from('Messages');
    $this->db->like('text', $string);
    $this->db->order_by('posted_at', 'desc');
    $query = $this->db->get();
    return $query->result_array();
	}

    // public function insertMessage($poster, $string) {
    //   /* Inserts message into database*/
    //   $date = date('Y/m/d G:i:s');
    //   $query = "INSERT INTO Messages(user_username, text, posted_at) VALUES (?,?,?)";
    //   $query = $this->db->query($query, array($poster, $string, $date));
    // }

    public function insertMessage($poster,$string){
		$date = date('Y/m/d G:i:s');
		$data = array (
			'user_username' => $poster,
			'text' => $string,
			'posted_at' => $date,
			);
		$this->db->insert('Messages',$data);
	}

  // Returns all of the messages from all of those followed by the specified user, most recent first.
  public function getFollowedMessages($name){
    $sql = "SELECT Messages.user_username, Messages.text, Messages.posted_at
    FROM Messages INNER JOIN User_Follows ON User_Follows.follower_username=?
    AND Messages.user_username=User_Follows.followed_username ORDER BY Messages.posted_at DESC";
    $query = $this->db->query($sql, $name);
    return $query;
  }
}
