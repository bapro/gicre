<?php
	class Alergy extends CI_Controller {
    public function __construct() {
        parent::__construct();
       $this->load->model('model_alergy');
	    $this->ID_PATIENT = $this->session->userdata('id_patient');
         $this->ID_USER = $this->session->userdata('id_user');
		 $this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	
	public function saveAlergy() {
		$table = $this->input->post('table');
		$model = $this->input->post('model');
		$column = $this->input->post('column');
	 if ($this->input->post('alergy_input') != "") {
            $response['message'] = "";
            $response['status']  = 0;
			
			  $save1 = array(
                $column => $this->input->post('alergy_input'),
                'id_patient' => $this->ID_PATIENT,
                'id_doctor' => $this->ID_USER,
                'inserted_time' => date("Y-m-d H:i:s"),
				'updated_time' => date("Y-m-d H:i:s"),
				'updated_by' =>$this->ID_USER,
				'alergy_type' =>$this->input->post('alergy_type')
            );
			
			$this->clinical_history->insert($table, $save1);
			$count=$this->model_alergy->$model($this->ID_PATIENT);
			$response['count']  = $count;
        }else{
		$response['message'] = "";
            $response['status']  = 1;	
		}
		  echo json_encode($response);
		
	}
	public function listAlergy() {
		$id_patient=$this->ID_PATIENT;
		$table=$this->input->post('table');
		$column=$this->input->post('column');
		$sql ="SELECT id, alergy, is_kept, alergy_type FROM $table WHERE id_patient=$id_patient ORDER BY id DESC";
    $data['query']= $this->clinical_history->query($sql);
	$data['table']  = $table;
    $this->load->view('clinical-history/food-drug-alergy/food-alergy-list', $data);
	}		

	
	public function stopBeingAlergic() {
		$data = array(
	  'updated_by' => $this->ID_USER,
       'is_kept' => $this->input->post('is_continued'),
	   'line_through' => $this->input->post('line_through'),
	   'updated_time' => date("Y-m-d H:i:s")
           );
		   $this->clinical_history->where('id', $this->input->post('id'));
		   $this->clinical_history->update($this->input->post('table'), $data);
	}
	
	
	}