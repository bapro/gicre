<?php
class Nurse extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("user_register_info");
		$this->load->helper('form');
		$this->load->library("search_patient_photo");
		$this->load->library("get_table_data_by_id");
		$this->ID_USER = $this->session->userdata('user_id');
		$this->load->library("create_forms");
		$this->load->library('form_validation');
		$this->load->library('show_pages');
		$this->load->library("header_user");
		$this->clinical_history = $this->load->database('clinical_history', TRUE);
		$this->USER_CONTROLLER = $this->session->set_userdata('USER_CONTROLLER', 'medico');
$this->load->library('auto_complete_input');
		//$this->load->library("pagination");
		if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			redirect('login');
		}
	}
	
	
}