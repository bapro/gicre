<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citas_list_model extends CI_Model {
   function __construct() {
       // $this->userTbl = 'users';
	   $this->load->library("search_patient_photo");
	   	  $this->clinical_history = $this->load->database('clinical_history', TRUE);
		  $this->PERFIL =$this->session->userdata('user_perfil');
		  $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
	 }
   function getEmployees($postData=null){

     $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (patient like '%".$searchValue."%' or doctor like '%".$searchValue."%' or fecha like'%".$searchValue."%' ) ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');
	 
    $records = $this->db->get('rendez_vous')->result();
     $totalRecords = $records[0]->allcount;



     ## Total number of record with filtering
	 
	 
	 
	 

     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get('rendez_vous')->result();
     $totalRecordwithFilter = $records[0]->allcount;






     ## Fetch records
     $this->db->select('*, patients_appointments.nombre as patient_name, patients_appointments.id_p_a as id_p_a, patients_appointments.cedula as cedula,medical_centers.name as centro_name, users.name as doctor_name');
	 	  $this->db->join('patients_appointments', 'patients_appointments.id_p_a=rendez_vous.id_patient');
	   $this->db->join('medical_centers', 'medical_centers.id_m_c=rendez_vous.centro');
	    $this->db->join('users', 'users.id_user=rendez_vous.doctor');
     //if($searchQuery != '')
        //$this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('rendez_vous')->result();

     $data = array();

     foreach($records as $record ){
$array_values_for_photo = array(
						'id_p_a' =>$record->id_p_a,
						'cedula' =>$record->cedula,
						'image_class' => "img-fluid img-thumbnail lazy-img",
						'style'=>'width=85'

						);
						$img = $this->search_patient_photo->search_patient($array_values_for_photo);
        $data[] = array( 
		""=>$img,
           "patient"=>$record->patient_name,
           "doctor"=>$record->doctor_name,
           "centro"=>$record->centro_name,
           "fecha"=>$record->fecha_propuesta
        ); 
     }

     ## Response
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );

     return $response; 
   }

}