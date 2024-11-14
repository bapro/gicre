<?php
	class Examfisico extends CI_Controller {
    public function __construct() {
        parent::__construct();
       $this->ID_USER =$this->session->userdata('id_user');
	     	$this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	
	
	public function form() {
		$this->load->library("user_register_info");
		$page= $this->input->get('page');
		$data['ex_fis_data'] = $this->input->get('signo');
		 $data['hide_ex_fis_mamas'] ="";
		 $data['data_eva_cardio'] =0;
	$query_ex_uro=$this->clinical_history->query("SELECT * FROM  h_c_examen_fisico WHERE id=$page");
	$data['query_ex_fis']= $query_ex_uro->result();
	$this->load->view('clinical-history/examen-fisico/forms', $data);
			echo "<script> $('.spinner-border').hide()</script>";
		
	}
	

	
	
	public function saveUpExamenFisico(){
		 
        $data = array(
		'neuro_s'=> $this->input->post('neuro_s'),
  'neuro_text'=> $this->input->post('neuro_text'),
  'cabeza'=> $this->input->post('cabeza'),
  'cabeza_text'=> $this->input->post('cabeza_text'),
  'cuello'=> $this->input->post('cuello'),
  'cuello_text'=> $this->input->post('cuello_text'),
  'abd_insp'=> $this->input->post('abd_insp'),
  'abd_inspext'=> $this->input->post('abd_inspext'),
  'ext_sup_text'=> $this->input->post('ext_sup_text'),
  'ext_sup'=> $this->input->post('ext_sup'),
  'torax'=> $this->input->post('torax'),
  'torax_text'=> $this->input->post('torax_text'),
  'ext_inf'=> $this->input->post('ext_inf'),
  'ext_inft'=> $this->input->post('ext_inft'),
//------------------------examen fisico2--------------------
 'cuad_inf_ext1'=> $this->input->post('cuad_inf_ext1'),
  'mama_izq1'=> $this->input->post('mama_izq1'),
  'cuad_sup_ext1'=> $this->input->post('cuad_sup_ext1'),
  'cuad_inf_ext11'=> $this->input->post('cuad_inf_ext11'),
  'region_retro1'=> $this->input->post('region_retro1'),
  'region_areola_pezon1'=> $this->input->post('region_areola_pezon1'),
   'region_ax1'=> $this->input->post('region_ax1'),
  'cuad_inf_ext2'=> $this->input->post('cuad_inf_ext2'),
  'mama_izq2'=> $this->input->post('mama_izq2'),
  'cuad_sup_ext2'=> $this->input->post('cuad_sup_ext2'),
  'cuad_inf_ext22'=> $this->input->post('cuad_inf_ext22'),
  'region_retro2'=> $this->input->post('region_retro2'),
  'region_areola_pezon2'=> $this->input->post('region_areola_pezon2'),
   'region_ax2'=> $this->input->post('region_ax2'),
//-----------------------examen fisico3-----------------------------------
 'especuloscopia'=> $this->input->post('especuloscopia'),
  'tacto_bima'=> $this->input->post('tacto_bima'),
  'cervix'=> $this->input->post('cervix'),
  'cervix_text'=> $this->input->post('cervix_text'),
  'utero'=> $this->input->post('utero'),
  'utero_text'=> $this->input->post('utero_text'),
   'anexo_derecho'=> $this->input->post('anexo_derecho'),
   'anexo_izquierdo'=> $this->input->post('anexo_izquierdo'),
  'anexo_derecho_text'=> $this->input->post('anexo_derecho_text'),
  'anexo_iz_text'=> $this->input->post('anexo_iz_text'),
  'inspection_vulval'=> $this->input->post('inspection_vulval'),
  'inspection_vulval_text'=> $this->input->post('inspection_vulval_text'),
  'rectal_text'=> $this->input->post('rectal_text'),
  'rectal'=> $this->input->post('rectal'),
   'genitalm'=> $this->input->post('genitalm'),
  'genitalm_text'=> $this->input->post('genitalm_text'),
  'genitalf_text'=> $this->input->post('genitalf_text'),
   'genitalf'=> $this->input->post('genitalf'),
   'vagina'=> $this->input->post('vagina'),
   'vagina_text'=> $this->input->post('vagina_text'),
   'updated_by' => $this->ID_USER,
		'updated_time' =>date("Y-m-d H:i:s")
		);
        $where = array('id' => $this->input->post('id'));
        $this->db->where($where);
		
        $result = $this->db->update("h_c_examen_fisico", $data);
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