<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_search_in_padron extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load member model
        $this->load->model('search_patient_padron');
    }
    
    function index(){
        // Load the member list view
        $this->load->view('patient/search/test-result');
    }
    
    function getLists(){
		$this->padron_database = $this->load->database('padron',TRUE);
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->search_patient_padron->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
         $photo=$this->padron_database->select('Imagen')->where('Cedula',$member->Cedula)->get('padron_photos')->row('Imagen');
	  if($photo){
	  $photoPat= '<img loading="lazy" class="img-fluid img-thumbnail"   width="70" src="data:image/gif;base64,'. base64_encode(pack("H*",$photo)) .'" />';
	  }else{
		 $photoPat= '<img  class="img-fluid img-thumbnail" width="70" src="'.base_url().'/assets_new/img/user-d.jpg"  />';  
	  }
            $data[] = array($i, $photoPat, $member->nombres, $member->apellido1, $member->apellido2, $member->Cedula);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->search_patient_padron->countAll(),
            "recordsFiltered" => $this->search_patient_padron->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    
}