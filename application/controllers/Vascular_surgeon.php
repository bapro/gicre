<?php
    class Vascular_surgeon extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->ID_USER = $this->session->userdata('user_id');
            $this->ID_CENTRO = $this->session->userdata('id_centro');
			$this->ID_PATIENT = $this->session->userdata('id_patient');
            $this->load->library("user_register_info");
			$this->clinical_history = $this->load->database('clinical_history',TRUE);
        }


        public function form()
        {

            $page = $this->input->get('page');
            $data['enfermedad_data'] = $this->input->get('signo');
            $emfermedades = $this->clinical_history->query("SELECT * FROM  h_c_cirujano_vascular WHERE id=$page");
            $data['emfermedades'] = $emfermedades->result();
			 $enf_hist_q = $this->clinical_history->query("SELECT * from  h_c_enfermedad_actual WHERE historial_id=$this->ID_PATIENT ORDER BY id DESC");
			$enf_hist_result= $enf_hist_q->result();
			$data['enf_hist_result']=$enf_hist_result;
			$data['enf_hist_total'] = count($enf_hist_result);
            $this->load->view('clinical-history/vascular-surgeon/enfermedad-actuales/form', $data);
			 
            echo "<script> $('.spinner-border').hide()</script>";
        }




        public function saveUpVasSurg()
        {
			 if(empty($this->input->post('is_historia_empty'))) {
                $response['message'] = "<strong>Enfemedad Actual</strong><br/> * la historia de consulta es obligatorio.". $this->input->post('is_historia_empty');
                $response['status']  = 1;
            }else{
			$id=$this->input->post('id');
          
            $cir_vas_dol = $this
                ->input
                ->post('cir_vas_dol');
            $cir_vas_dol1 = (isset($cir_vas_dol)) ? 1 : 0;
            $cir_vas_edema = $this
                ->input
                ->post('cir_vas_edema');
            $cir_vas_edema1 = (isset($cir_vas_edema)) ? 1 : 0;
            $cir_vas_pesadez = $this
                ->input
                ->post('cir_vas_pesadez');
            $cir_vas_pesadez1 = (isset($cir_vas_pesadez)) ? 1 : 0;
            $cir_vas_cansancio = $this
                ->input
                ->post('cir_vas_cansancio');
            $cir_vas_cansancio1 = (isset($cir_vas_cansancio)) ? 1 : 0;
            $cir_vas_quemazo = $this
                ->input
                ->post('cir_vas_quemazo');
            $cir_vas_quemazo1 = (isset($cir_vas_quemazo)) ? 1 : 0;
            $cir_vas_calambred = $this
                ->input
                ->post('cir_vas_calambred');
            $cir_vas_calambred1 = (isset($cir_vas_calambred)) ? 1 : 0;
            $cir_vas_purito = $this
                ->input
                ->post('cir_vas_purito');
            $cir_vas_purito1 = (isset($cir_vas_purito)) ? 1 : 0;
            $cir_vas_hiper = $this
                ->input
                ->post('cir_vas_hiper');
            $cir_vas_hiper1 = (isset($cir_vas_hiper)) ? 1 : 0;
            $cir_vas_ulceras = $this
                ->input
                ->post('cir_vas_ulceras');
            $cir_vas_ulceras1 = (isset($cir_vas_ulceras)) ? 1 : 0;
            $cir_vas_pares = $this
                ->input
                ->post('cir_vas_pares');
            $cir_vas_pares1 = (isset($cir_vas_pares)) ? 1 : 0;
            $cir_vas_claud = $this
                ->input
                ->post('cir_vas_claud');
            $cir_vas_claud1 = (isset($cir_vas_claud)) ? 1 : 0;
            $cir_vas_necrosis = $this
                ->input
                ->post('cir_vas_necrosis');
            $cir_vas_necrosis1 = (isset($cir_vas_necrosis)) ? 1 : 0;
            $cir_vas_necrosis = $this
                ->input
                ->post('cir_vas_necrosis');
            $cir_vas_necrosis1 = (isset($cir_vas_necrosis)) ? 1 : 0;
            $data = array(
                'cir_vas_dol' => $cir_vas_dol1,
                'cir_vas_edema' => $cir_vas_edema1,
                'cir_vas_pesadez' => $cir_vas_pesadez1,
                'cir_vas_cansancio' => $cir_vas_cansancio1,
                'cir_vas_quemazo' => $cir_vas_quemazo1,
                'cir_vas_calambred' => $cir_vas_calambred1,
                'cir_vas_purito' => $cir_vas_purito1,
                'cir_vas_hiper' => $cir_vas_hiper1,
                'cir_vas_ulceras' => $cir_vas_ulceras1,
                'cir_vas_pares' => $cir_vas_pares1,
                'cir_vas_claud' => $cir_vas_claud1,
                'cir_vas_necrosis' => $cir_vas_necrosis1,
                'cir_vas_otros' => $this->input->post('cir_vas_otros'),
               'cir_vas_historial' => $this->input->post('enf_historia'),
                'updated_by' => $this->ID_USER,
				'centro_medico'=>$this->ID_CENTRO,
                'updated_time' => date("Y-m-d H:i:s"),
               //'diagrama_cirugia_vascular' => "diagrama-" . time() . ".png"
            );
            $where = array('id' => $id);
            $this->clinical_history->where($where);

            $result = $this->clinical_history->update("h_c_cirujano_vascular", $data);
            if ($result) {
                $response['status'] = 1;
                $response['message'] = '<i class="bi bi-check-lg text-success fs-4"></i>';
            } else {
                $response['status'] = 0;
                $response['message'] = '<i class="bi bi-check-lg text-danger fs-4"></i>!';
            }
        }
		
		 echo json_encode($response);
        }
		
		
		
		
	
		
		
		
		
		
		
		
		
		
    }
