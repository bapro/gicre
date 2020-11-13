<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 Class Insert_user extends CI_Model {

 public function saveUser($data1)
 {
  {
    $this->db->insert('user_login', $data1);
    $id_acd = $this->db->insert_id();
  }
  
  return $id_acd;
 }
 
 //get all 
 
 
 function update_client_password($id,$data){
$this->db->where('id_acd', $id);
$this->db->update('account_demand', $data);
}

}