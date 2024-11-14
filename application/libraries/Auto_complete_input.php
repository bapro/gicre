<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_complete_input {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				
						$this->CI->clinical_history = $this->CI->load->database('clinical_history',TRUE);
						//$this->CI->hospitalization_emgergency = $this->CI->load->database('hospitalization_emgergency',TRUE);
						if($this->CI->session->userdata('is_logged_in')=='')
						{
						$this->CI->session->set_flashdata('msg','Please Login to Continue');
						redirect('login');
						}
        }



 public function getData($field, $table, $db)
        {
			
		$query= $this->CI->$db->query("SELECT $field AS name FROM $table GROUP BY $field ORDER BY $field ASC");
        $query_result = $query->result();
			
		$result='';
	
		foreach($query_result as $row) {
		$result .= '<option value="' . $row->name .'" >' . $row->name . '</option>';
		}
		return $result;
	
	}
		


}
				
