<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_general extends CI_Controller{
	
	function  __construct(){
		parent::__construct();
		$this->load->model('report_model');
		$this->load->library("header_user");
		$this->load->library("create_forms");
		$this->ID_USER=$this->session->userdata('user_id');
		$this->load->model("model_general");
		$this->load->model("model_conclusion_diagno");
		$this->PERFIL=$this->session->userdata('user_perfil');
		$this->clinical_history = $this->load->database('clinical_history',TRUE);
		if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			redirect('login');
		}

	}
	
	
	
	
	
function index(){
	if($this->PERFIL=='Admin'){
		$this->header_user->headerAdmin($this->ID_USER);
	}else{
$this->header_user->headerMedico($this->ID_USER);
	}
	 [$result_centro_medicos_cita]= $this->create_forms->getCentroMedicoForCita(0);
    $data['result_centro_medicos_cita'] = $result_centro_medicos_cita;
	
[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors] = $this->create_forms->getCentroAndSeguroByPerfil(0);
$data['result_doctors'] = $result_doctors;
$data['PERFIL']=$this->PERFIL;
	$this ->load->view('report-general/index', $data);
}



 function getDateRanch()
    {
		 $direction = $this->input->post('direction');
		$centro = $this->input->post('centro');
		$medico = $this->input->post('medico');


if($centro !="" AND $medico !=""){
	$clause = "inserted_by=$medico AND centro_medico=$centro";
}elseif($centro !=""){
	$clause = "centro_medico =$centro";
}else{
	$clause = "inserted_by=$medico";
}
		
   if ($direction == 'DESC')
        {
            $order_by = "ORDER BY inserted_time DESC";
        }
        else
        {
            $order_by = "ORDER BY inserted_time ASC";
        }
        
       
         $sql = "SELECT inserted_time FROM h_c_enfermedad_actual WHERE $clause GROUP BY DATE(inserted_time) $order_by";
        $query = $this->clinical_history->query($sql);
		
		
		
		
		

        echo "<option value=''></option>";
        foreach ($query->result() as $dr)
        {
            $dates = date("d-m-Y", strtotime($dr->inserted_time));
            echo '<option value="' . $dr->inserted_time . '">' . $dates . '</option>';
        }
    }





 function attendedPatients()
    {
		/*if($this->PERFIL=='Admin'){
		$this->header_user->headerAdmin($this->ID_USER);
	}else{
$this->header_user->headerMedico($this->ID_USER);
	}*/
		 $centro = $this->input->post('centro');
		 $medico = $this->input->post('medico');
		  $desde = $this->input->post('desde');
		   $hasta = $this->input->post('hasta');
		   
if($centro !="" AND $medico !=""){
	$clause = "inserted_by=$medico AND centro_medico=$centro";
}elseif($centro !=""){
	$clause = "centro_medico =$centro";
}else{
	$clause = "inserted_by=$medico";
}

		$condition = "DATE(inserted_time) BETWEEN " . "'" . date('Y-m-d', strtotime($desde)) . "'" . " AND " . "'" . date('Y-m-d', strtotime($hasta)) . "'";
	 $sql = "SELECT inserted_time, inserted_by, historial_id, enf_motivo FROM h_c_enfermedad_actual WHERE $condition AND $clause";
        $query =$this->clinical_history->query($sql);
		$data['query'] = $query;
		$data['centro'] = $centro;
		$data['medico'] = $medico;
		$data['sql'] = $sql;
		$data['hasta'] = date("d-m-Y", strtotime($hasta));
		$data['desde'] = date("d-m-Y", strtotime($desde));
		$data['rows_total'] = $query->num_rows();
	$this ->load->view('report-general/patients-attended/index', $data);		
	}


function canceledInvoices()
    {
	if($this->PERFIL=='Admin'){
		$this->header_user->headerAdmin($this->ID_USER);
	}else{
$this->header_user->headerMedico($this->ID_USER);
	}	
		 $centro = $this->input->get('centro-search-can');
		 $medico = $this->input->get('medico-rg-can');
		  $desde = $this->input->get('desde-search-can');
		   $hasta = $this->input->get('hasta-search-can');
		   
if($centro !="" AND $medico !=""){
	$clause = "inserted_by=$medico AND centro_medico=$centro";
}elseif($centro !=""){
	$clause = "centro_medico =$centro";
}else{
	$clause = "medico=$medico";
}

		$condition = "DATE(canceled_time) BETWEEN " . "'" . $desde. "'" . " AND " . "'" . $hasta . "'";
	 $sql = "SELECT * FROM table_cancelation_info
	 INNER JOIN factura  ON table_cancelation_info.id_table_canceled=factura.id2
	 
	 INNER JOIN factura2  ON table_cancelation_info.id_table_canceled=factura2.idfacc
	 
      WHERE $condition AND $clause AND table_name='factura2'";
        $query =$this->db->query($sql);
		$data['query'] = $query;
		$data['centro'] = $centro;
		$data['medico'] = $medico;
		$data['hasta'] = date("d-m-Y", strtotime($hasta));
		$data['desde'] = date("d-m-Y", strtotime($desde));
		$data['rows_total'] = $query->num_rows();
	$this ->load->view('factura/reporte-de-facturas/ver-facturas-anuladas', $data);		
	}







 function patientState()
    {
		
		 $centro = $this->input->get('centro');
		 $medico = $this->input->get('medico');
		  $estado = $this->input->get('estado');

 $sql = "SELECT created_time, centro, medico, patient_state FROM rendez_vous WHERE centro =$centro AND doctor=$medico AND patient_state='$estado'";
        $query =$this->db->query($sql);
		$data['query'] = $query;
		$data['centro'] = $centro;
		$data['medico'] = $medico;
		
	
		$data['rows_total'] = $query->num_rows();
	$this ->load->view('report-general/patients-state', $data);		
	}

	//-------------------------------------------------------------------------------------------------------------------------------------------------------
}