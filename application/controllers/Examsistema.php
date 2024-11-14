<?php
	class Examsistema extends CI_Controller {
    public function __construct() {
        parent::__construct();
       $this->ID_USER =$this->session->userdata('id_user');
	   $this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	
	
	public function form() {
		$this->load->library("user_register_info");
		$page= $this->input->get('page');
		$data['sis_data'] = $this->input->get('signo');
	$query_sis=$this->clinical_history->query("SELECT * FROM  h_c_examen_sistema WHERE id=$page");
	$data['query_sis']= $query_sis->result();
	$this->load->view('clinical-history/examen-sistema/form', $data);
			 echo "<script> $('.spinner-border').hide()</script>";
		
	}
	

	
	
	public function saveUpExamSisddd(){
		 
        $data = array(
	'sisneuro'=> $this->input->post('sisneuro'),
'neurologico'=> $this->input->post('neurologico'),
'siscardio'=> $this->input->post('siscardio'),
'cardiova'=> $this->input->post('cardiova'),
'sist_uro'=> $this->input->post('sist_uro'),
'urogenital'=> $this->input->post('urogenital'),
'sis_mu_e'=> $this->input->post('sis_mu_e'),
'musculoes'=> $this->input->post('musculoes'),
'sist_resp'=> $this->input->post('sist_resp'),
'nervioso'=> $this->input->post('nervioso'),
'nerviosostext'=> $this->input->post('nerviosostext'),
'linfatico'=> $this->input->post('linfatico'), 
'linfaticotext'=> $this->input->post('linfaticotext'), 
'digestivo'=> $this->input->post('digestivo'),
'respiratorio'=> $this->input->post('respiratorio'),
'genitourinario'=> $this->input->post('genitourinario'),
'genitourinariotext'=> $this->input->post('genitourinariostext'),
'sist_diges'=> $this->input->post('sist_diges'),
'sist_endo'=> $this->input->post('sist_endo'),
'endocrino'=> $this->input->post('endocrino'),
'sist_rela'=> $this->input->post('sist_rela'),
'otros_ex_sis'=> $this->input->post('otros_ex_sis'),
'cardiova'=> $this->input->post('cardiova'),
'dorsales'=> $this->input->post('dorsales'), 
'dorsalestext'=> $this->input->post('dorsalesstext'),
  'updated_by' => $this->ID_USER,
		'updated_time' =>date("Y-m-d H:i:s")
		);
        $where = array('id' => $this->input->post('id'));
        $this->db->where($where);
		
        $result = $this->db->update("h_c_examen_sistema", $data);
        if ($result) {
            $response['status'] = 1;
            $response['message'] = '<i class="bi bi-check-lg text-success fs-4"></i>';
        } else {
            $response['status'] = 0;
            $response['message'] = '<i class="bi bi-check-lg text-danger fs-4"></i>!';
        }
        echo json_encode($response);
	}
	
	
	
	
	}