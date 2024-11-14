<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_search extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load member model
        $this->load->model('search_patient_padron');
		$this->load->model('search_patient_gicre');
		$this->load->library('search_patient_photo');
		$this->ID_USER =$this->session->userdata('user_id');
		 $this->USER_CONTROLLER = $this->session->userdata('USER_CONTROLLER');
    }
    
 /*  
    
function autoCompleteInputNames()
{
 $this->padron_database = $this->load->database('padron',TRUE);
$keyword=$this->input->post('keyword');
if(!empty($keyword)) {
//$sql ="SELECT nombres, apellido1, apellido2 FROM padron WHERE nombres LIKE '" . $keyword . "' OR apellido1 LIKE '" . $keyword . "'  GROUP BY nombres LIMIT 0,10";
$sql ="SELECT nombres, apellido1, apellido2 FROM padron WHERE (nombres LIKE '" . $keyword . "' OR apellido1 LIKE '" . $keyword . "%') GROUP BY nombres LIMIT 0,10";
$data['query']=$this->padron_database->query($sql); 
$this->load->view('patient/search/auto-complete-names', $data);
  }


}*/
	
	
 function search_patient_by_cedula()
{
$this->padron_database = $this->load->database('padron',TRUE);

$seach_content = $this->uri->segment(3);
$databaseGicre=$this->db->select('cedula, id_p_a, photo')->where('cedula',$seach_content)->get('patients_appointments')->row_array();
// IF CEDULA FOUND IN GICRE REDIRECT	
if($databaseGicre){
	$id_patient=encrypt_url($databaseGicre['id_p_a']);
	redirect($this->USER_CONTROLLER."/patient/".$id_patient.'/0/0');
}else{
$databasePadron=$this->padron_database->select('Cedula, nombres, apellido1, apellido2, FechaNacimiento, IdNacionalidad, IdSexo')->where('Cedula',$seach_content)->get('padron')->row_array();

// IF CEDULA NOT FOUND IF GICRE SEARCH IT IN PADRON
// IF ADD PATIENT TO GICRE TABLE
if($databasePadron){
	$nationality=$this->padron_database->select('Descripcion')->where('ID',$databasePadron['IdNacionalidad'])->get('nacionalidad')->row('Descripcion');
	
	$patient_sexo = ($databasePadron['IdSexo']=='M') ? 'Masculino' : 'Femenina'; 
	
	
			$save = array(
			'nombre'  => $databasePadron['nombres']. " ".$databasePadron['apellido1']. " ".$databasePadron['apellido2'],
			'photo'  => "padron",
			'cedula' => $databasePadron['Cedula'],
			'date_nacer' => date("Y-m-d", strtotime($databasePadron['FechaNacimiento'])),
			'sexo'=>$patient_sexo,
			'nacionalidad'=>$nationality,
			'inserted_by' =>$this->ID_USER ,
			'seguro_medico'=>11,
			'insert_date' => date('Y-m-d H:i:s'),
			'update_date' => date('Y-m-d H:i:s'),
			'updated_by' => $this->ID_USER 

			);
			$new_id_patient = $this->model_admin->save_patient($save);
			$new_id_patient=encrypt_url($new_id_patient);
			redirect($this->USER_CONTROLLER."/patient/".$new_id_patient.'/0/0');
}else{
	redirect($this->USER_CONTROLLER."/create_patient");
}


}

}	
	
	
	
	 function searchPatientInGicre(){
	
	
        $data =  array();
        
        // Fetch member's records
        $patientData = $this->search_patient_gicre->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($patientData as $patient){
            $i++;
      $array_values_for_photo = array(
						'id_p_a' =>$patient->id_p_a,
						'cedula' =>$patient->cedula,
						'image_class' => "img-fluid img-thumbnail",
						'style'=>'width=85'

						);
						$photoPat = $this->search_patient_photo->search_patient($array_values_for_photo);
					$go_to_patient_data ='<a  href="'.site_url().''.$this->USER_CONTROLLER.'/patient/'.encrypt_url($patient->id_p_a).'/0/0" >'.strtoupper($patient->nombre).'</a>';
					$data[] = array($i, $photoPat, $go_to_patient_data, $patient->cedula, $patient->id_p_a);
					
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" =>  $this->search_patient_gicre->countFiltered($_POST),
            "recordsFiltered" => $this->search_patient_gicre->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
	
	
}
	
	
	
	
	
 function searchPatientInPadron(){
	
	$this->padron_database = $this->load->database('padron',TRUE);
        $data = $row = array();
        
        // Fetch member's records
        $patientData = $this->search_patient_padron->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($patientData as $patient){
            $i++;
         $photo=$this->padron_database->select('Imagen')->where('Cedula',$patient->Cedula)->get('padron_photos')->row('Imagen');
	  if($photo){
	  $photoPat= '<img loading="lazy" class="img-fluid img-thumbnail"   width="70" src="data:image/gif;base64,'. base64_encode(pack("H*",$photo)) .'" />';
	  }else{
		 $photoPat= '<img  class="img-fluid img-thumbnail" width="70" src="'.base_url().'/assets_new/img/user-d.jpg"  />';  
	  }
	  $go_to_patient_data ='<a  href="'.site_url().'patient_search/search_patient_by_cedula/'.$patient->Cedula.'/0/0" >'.$patient->nombres.'</a>';
            $data[] = array($i, $photoPat, $go_to_patient_data, $patient->apellido1, $patient->apellido2, $patient->Cedula);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            //"recordsTotal" => $this->search_patient_padron->countAll(),
			 "recordsTotal" => $this->search_patient_padron->countFiltered($_POST),
            "recordsFiltered" => $this->search_patient_padron->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
	
	
}
    
}