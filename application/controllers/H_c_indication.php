<?php
	class H_c_indication extends CI_Controller {
    public function __construct() {
        parent::__construct();
     $this->ID_USER =$this->session->userdata('user_id');
	  $this->PERFIL_USER =$this->session->userdata('user_perfil');
	 $this->load->library("load_history_resume");
	
    }
	
	
	function showIndicationsByDateClick(){
		$data['date']= $this->input->post('date');
		$data['table']= $this->input->post('table');
		$data['historial_id']= $this->input->post('id_patient');
		$data['id_opertor']= $this->input->post('id_opertor');
		$data['centro_medico']= $this->input->post('id_centro');
		$folder= $this->input->post('folder');
		$data['id_current_user']= $this->ID_USER;
		
		$update = array(
	'printing' => 0,
	);

	$this->clinical_history->where('operator', $this->ID_USER);
	$this->clinical_history->where('historial_id', $this->input->post('id_patient'));
	$this->clinical_history->update($this->input->post('table'),$update);
		if($folder=='receipt'){
	  $this->load->view("clinical-history/indications/receipt/indication-result-drugs", $data);	
		}elseif($folder=='study'){
		 $this->load->view('clinical-history/indications/study/indication-result-study', $data);	
		}else{
			 $this->load->view('clinical-history/indications/laboratory/indication-result-labs', $data);
		}
	}
	
	
			
	 function checkOneIndication()
    {
       
        $id = $this ->input->post('id');
		$id_colm = $this ->input->post('id_colm');
		$table = $this ->input->post('table');
		 $checked = array(
            'printing' => $this->input->post('print')
        );
		
			$this->clinical_history->where($id_colm, $id);
		   $this->clinical_history->update($table, $checked);
		   
		
    }
	
	
	
	
	
		 function checkAllIndications()
    {
        $table = $this ->input->post('table');
        $date = $this ->input->post('date');
		$id_patient = $this ->input->post('id_patient');
		 $checked = array(
            'printing' => $this->input->post('print')
        );
		
			$this->clinical_history->like('insert_time', $date);
			$this->clinical_history->where('historial_id', $id_patient);
			$this->clinical_history->where('operator', $this->ID_USER);
		   $this->clinical_history->update($table, $checked);
		
    }
	
	
	function eliminate_duplicated_indications(){
		$id_patient=$this->input->post('id_patient');
		$table=$this->input->post('table');
		$date = date("Y-m-d");
	$this->clinical_history->query("DELETE FROM $table WHERE operator=$this->ID_USER AND historial_id=$id_patient AND DATE(insert_time)='$date'");	
	}
	
	

	
	}