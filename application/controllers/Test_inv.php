<?php
class Test_inv extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('model_medico');
		$this->load->model('model_enfermedad_actual');
		$this->load->model('model_conclusion_diagno');
		$this->load->model('model_alergy');
		$this->load->model('model_signo_vital');
		$this->load->model('model_general');
		$this->load->library("user_register_info");
		$this->load->helper('form');
		$this->load->library("search_patient_photo");
		$this->load->library("get_table_data_by_id");
		$this->load->library("hospitalization_lib");
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
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

public function index()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$this->create_forms->create_invoice_ncf_form_test();
	}
	
	
	
	
	function get_fac_ars1()
    {
        
        $desde = $this
            ->input
            ->get('desde');
        $hasta = $this
            ->input
            ->get('hasta');
        $areas = $this
            ->input
            ->get('areas');
        $medico = $this
            ->input
            ->get('medico');
        $centro = $this
            ->input
            ->get('centro');
        $patient = $this
            ->input
            ->get('patient');
        $checktype = $this
            ->input
            ->get('checktype');
        if ($patient != "")
        {
            $data['patient'] = $patient;
        }
        else
        {
            $data['patient'] = 0;
        }
        $seguro_medico = $this
            ->input
            ->get('ars');
        $data['desde'] = $desde;
        $data['hasta'] = $hasta;
        $data['area'] = $areas;
        $data['centro'] = $centro;
        $data['seguro_medico'] = $seguro_medico;
        if ($checktype == 'privado')
        {
            if ($patient == "" && $areas == "" && $medico != "")
            {
                $data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND  seguro_medico= $seguro_medico AND centro_medico= $centro AND medico=$medico";
                $data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND center_id = $centro AND medico=$medico AND seguro_medico=$seguro_medico";
            }
            elseif ($patient == "" && $areas != "" && $medico != "")
            {
                $data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND centro_medico = $centro AND seguro_medico= $seguro_medico AND area=$areas AND  medico=$medico";
                $data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND center_id = $centro AND area_id=$areas AND seguro_medico=$seguro_medico";
            }
            else
            {
                $data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND centro_medico = $centro AND seguro_medico= $seguro_medico AND area=$areas AND medico=$medico AND paciente = $patient";
                $data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND center_id = $centro AND area_id=$areas AND seguro_medico=$seguro_medico AND medico=$medico AND paciente = $patient";
            }
        }
        else
        {
            $data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND seguro_medico=$seguro_medico AND centro_medico= $centro";
            $data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND seguro_medico=$seguro_medico AND center_id= $centro";
        }
       
        $this
            ->load
            ->view('factura-con-ncf/show-report-test', $data);
    }
	
	}