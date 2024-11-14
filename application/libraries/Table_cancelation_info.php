<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_cancelation_info {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				$this->ID_USER =$this->CI->session->userdata('user_id');
        }





        public function save($table, $id_facc)
        {
		$save= array(
		'canceled_by' =>$this->ID_USER,
		'canceled_time' =>date("Y-m-d H:i:s"),
		'table_name' =>$table,
        'id_table_canceled' =>$id_facc
		);
		$this->CI->db->insert('table_cancelation_info', $save);	
			
        }
		
		
		
		
		
		
}


				
