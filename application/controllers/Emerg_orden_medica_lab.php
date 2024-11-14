<?php
class Emerg_orden_medica_lab extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
	 $this->ID_CENTRO =$this->session->userdata('id_centro');
	$this->load->model("model_clinical_hist");
    $this->load->library("user_register_info");
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);

}



function save_indication_lab()
    {
        
      $save = array(
            'laboratory' =>$this->input->post('lab'),
            'operator' =>$this->ID_USER,
            'historial_id' =>$this->ID_PATIENT, 
            'centro' =>$this->ID_CENTRO,
			'id_register'=>$this->input->post('id_register'),
            'insert_time' => date("Y-m-d H:i:s") ,
            'updated_by' =>$this->ID_USER,
            'updated_time' => date("Y-m-d H:i:s") ,
            'printing' => 1,
            'user_id' =>$this->ID_USER
        );
        $this->hospitalization_emgergency->insert('emerg_orden_medcia_lab',$save);
	echo $this->input->post('lab');
    }

 function remove_this_selected_lab()
    {
		$table = $this->input->post('table');
        $labCheckded = $this->input->post('lab');
       // this is for remove every previous checked lab for this patient by this user
        $where = array(
          'laboratory' => $labCheckded,
          'historial_id' =>$this->ID_PATIENT,
          'operator' =>$this->ID_USER
        );
       
        $this->hospitalization_emgergency->where($where);
        $this->hospitalization_emgergency->delete($table, $where);
   
    }

    function patient_laboratories()
    {
 $ordenMedInsertedId=$this->input->post('id_register');
$sql ="SELECT * FROM emerg_orden_medcia_lab WHERE id_register=$ordenMedInsertedId  AND historial_id=$this->ID_PATIENT AND canceled=0 ORDER BY id DESC";
$query=$this->hospitalization_emgergency->query($sql);
$data['query']=$query;
$data['num_rows']= ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query->num_rows().' registro(s)</span> '; 
$data['user_id']=$this->ID_USER;
$this->load->view('emergency/clinical-history/medical-order/lab/table', $data);
	
    }


}