<?php

class Login_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $username
    * @param string $password
    * @return void
    */

    /*Check Login*/
   	function validate($username, $password)
	{   $this->db->select("*");
	    $this->db->from('users');
		$this->db->where('status',1);
		$this->db->where('password', $password);
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->result();	
	}

	/*Get Session values */
		
	function get_id($username, $password)
	{
		$this->db->select("*");
	    $this->db->from('users');
		$this->db->where('password', $password);
		$this->db->where('username', $username);	
		return $this->db->get()->result();
				
	}
	
	
	
public function is_user_login($id,$data){
	$this->db->where('id_user', $id);
$this->db->update('users', $data);
}


public function user_logout($id,$data){
	$this->db->where('id_user', $id);
$this->db->update('users', $data);
}




 public function user_login_twice($data) {
        $this->db->insert('user_login_twice', $data);
	
     }


	 
	  public function user_login_twice_remove($val) {
	$this -> db -> where('user_id',$val);
	$this -> db -> delete('user_login_twice');

	 }
	 

		
}