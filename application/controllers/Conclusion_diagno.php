<?php
    class Conclusion_diagno extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('model_conclusion_diagno');
    $this->ID_PATIENT = $this->session->userdata('id_patient');
            $this->ID_USER = $this->session->userdata('user_id');
            $this->ID_CENTRO = $this->session->userdata('id_centro');
            $this->clinical_history = $this->load->database('clinical_history',TRUE);
        }


        public function form()
        {
            $this->load->library("user_register_info");
            $page = $this->input->get('page');
            $id_patient = $this->input->get('id_patient');
            $data['conclusion_data'] = $this->input->get('signo');
            $data['show_con_by_id'] = $this->model_conclusion_diagno->show_con_by_id($page);
            $data['page'] = $page;

            $this->load->view('clinical-history/conclusion-diag/form', $data);
           echo "<script> $('.spinner-border').hide()</script>";
        }


        function searchCie10()
        {

            if (!empty($this->input->post('keyword'))) {
                $keyword = $this->input->post('keyword');
                $data['id_con_diag'] = $this->input->post('id_con_diag');
                $sql = "SELECT * FROM cied  WHERE description LIKE '%" . $keyword . "%' 	OR code LIKE '%" . $keyword . "%' ORDER BY description ASC";
                $data['query'] = $this->clinical_history->query($sql);
                $data['keyword'] = $this->input->post('keyword');
                $this->load->view('clinical-history/conclusion-diag/cie10', $data);
            }
        }


  function listPatientCie10()
        {
		$list_cie10 = '';	
		 $idCondDiag = $this->input->post('idCondDiag');
  $this->clinical_history->query("DELETE FROM h_c_diagno_def_link WHERE id_linkd=$idCondDiag");	
					
			
$idPatConDiag=$this->input->post('idPatConDiag');
$query = $this->clinical_history->query("SELECT id_linkd, diagno_def FROM h_c_diagno_def_link WHERE con_id_link=$idPatConDiag");
			$result = $query->result();
foreach($result as $rowcie10) {
	$descriptionCie10=$this->clinical_history->select('description, code')->where('idd',$rowcie10->diagno_def)->get('cied')->row_array();
	 $list_cie10 .=  "<li class='list-group-item list-group-item-success d-flex justify-content-between align-items-start'>
    <div class='ms-2 me-auto'>
      <div class='fw-bold'>".$descriptionCie10['code']."</div>
      
	  ". $descriptionCie10['description']."
	  
	  
    </div>
    <span class='badge bg-danger rounded-pill delete-this-patient-con-diag' style='cursor:pointer' id=".$rowcie10->id_linkd."><i class='bi bi-trash3-fill'></i></span>
  </li>";
	
	
}


	echo  "<ol class='list-group list-group-flush list-group-numbered'>
	". $list_cie10."
	</ol>";
        }



        function searchProcedimientos()
        {

            if (!empty($this->input->post('keyword'))) {
                $keyword = $this->input->post('keyword');
                $data['id_con_diag'] = $this->input->post('id_con_diag');
                $sql = "SELECT * FROM procedimientos  WHERE description LIKE '" . $keyword . "%' LIMIT 0,10 ";
                $data['query'] = $this->clinical_history->query($sql);
                $data['keyword'] = $this->input->post('keyword');
                $this->load->view('clinical-history/conclusion-diag/procedimientos', $data);
            }
        }

		public function updateConDiag()
		{
		//if(empty($this->input->post('floatingDiagOtros')) && empty($this->input->post('floatingDiagPrDef'))) {
		//$response['message'] = $this->input->post('cie10Id');
		//$response['status']  = 3;
		//}
		if(empty($this->input->post('isPlanEmpry'))) {
		$response['message'] = "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El plan es obligatorio.";
		$response['status']  = 4;
		}
		else {
		$data = array(
		'otros_diagnos' => $this->input->post('floatingDiagOtros'),
		'plan' => $this->input->post('con_dia_plan'),
		'procedimiento' => $this->input->post('floatingProcedimiento'),
		'updated_time' => date("Y-m-d H:i:s"),
		'updated_by' =>$this->ID_USER
		);
		$this->clinical_history->where('id', $this->input->post('id'));
		$this->clinical_history->update('h_c_conclusion_diagno', $data);

		$id_con_diag = $this->input->post('id');
		$cie10Ids=$this->input->post('cie10Id');
		 if($cie10Ids){
			
			//$this->clinical_history->query("DELETE FROM h_c_diagno_def_link WHERE con_id_link=$id_con_diag");
		$cie10Array =  array(); 		
		for ($i = 0; $i < count($cie10Ids); ++$i ) {
		$cie10Id = $cie10Ids[$i];
		$cie10Array[] = array(
		'con_id_link'=>$id_con_diag,
		'p_id'=>$this->ID_PATIENT,
		'user_id'=>$this->ID_USER,
		'centro_medico'=>$this->ID_CENTRO,
		'insert_date'=>date('Y-m-d H:i:s'),				
		'diagno_def'=>$cie10Id  
		); 
		} 
		$this->clinical_history->insert_batch('h_c_diagno_def_link', $cie10Array);
		 }
		$response['message'] = "<i class='bi bi-check'></i> guardado";
		$response['status']  = 0;
		}
		echo json_encode($response);
		}
		
		
		
		}
