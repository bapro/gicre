<?php
	class Auto_complete_input extends CI_Controller {
    public function __construct() {
        parent::__construct();
      $this->load->model('model_conclusion_diagno');
      $this->ID_CENTRO =$this->session->userdata('id_centro');
      $this->ID_PATIENT =$this->session->userdata('id_patient');
      $this->ID_USER =$this->session->userdata('id_user');
	   $this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	
	
	
	
	function autoCompleteInput()
{
$keyword=$this->input->post('keyword');
if(!empty($keyword)) {
$table= $this->input->post('table');
$data['table']= $table;
$field_name_in_table= $this->input->post('field_name_in_table');
$data['field_name_in_table']= $field_name_in_table;
$data['input_name']=  $this->input->post('input_name');
$data['div_result']=  $this->input->post('div_result');
$data['keyword']=$keyword;
if($this->input->post('div_result')=='suggestion-lab-list'){
	$center_to_take_into_consideration='id_centro_to_save';
}else{
$center_to_take_into_consideration='ordenMedCentroMedId';	
}
$data['center_to_take_into_consideration']= $center_to_take_into_consideration;	
if($table=='h_c_groupo_lab'){
 //$sql ="SELECT $field_name_in_table FROM h_c_groupo_lab  WHERE  groupo LIKE '" . $keyword . "%' && rmvd=0  && id_doc=$this->ID_USER GROUP BY groupo ";
 $sql ="SELECT $field_name_in_table FROM h_c_groupo_lab  WHERE  groupo LIKE '" . $keyword . "%' && rmvd=0  GROUP BY groupo ";
 $data['query']=$this->clinical_history->query($sql); 
$this->load->view('clinical-history/indications/laboratory/search-lab-by-group', $data);
}elseif($table=='laboratories'){
    $sql ="SELECT *  FROM laboratories WHERE name LIKE '" . $keyword . "%' GROUP BY name LIMIT 10";
    $data['query']=$this->clinical_history->query($sql); 
   $this->load->view('clinical-history/indications/laboratory/search-lab-by-name', $data);  
}else {

$sql ="SELECT * FROM $table  WHERE $field_name_in_table LIKE '" . $keyword . "%' GROUP BY $field_name_in_table  LIMIT 0,10 ";
$data['query']=$this->clinical_history->query($sql); 
$this->load->view('clinical-history/auto-complete-field-results', $data);
}

    }


}
	
	
	
function autoCompleteSelectWithId()
{
$keyword=$this->input->post('keyword');
$table= $this->input->post('table');
$field_name_in_table= $this->input->post('field_name_in_table');
$data['field_name_in_table']= $field_name_in_table;
$data['input_name']=  $this->input->post('input_name');
$data['input_name_id']=  $this->input->post('input_name_id');
$data['div_result']=  $this->input->post('div_result');
if(!empty($keyword)) {
$array = json_decode($field_name_in_table, true);

$name=$array['name'];
$id=$array['id'];

$sql ="SELECT $name AS name, $id AS id FROM $table  WHERE $name LIKE '" . $keyword . "%' GROUP BY $name  LIMIT 0,10 ";
$data['query']=$this->clinical_history->query($sql); 
$this->load->view('auto-complete-select-results', $data);


    }


}

	
	
	
	
	}