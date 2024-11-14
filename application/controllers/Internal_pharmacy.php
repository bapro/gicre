<?php
class Internal_pharmacy extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("user_register_info");
		$this->load->helper('form');
		$this->load->library("search_patient_photo");
		$this->load->library("get_table_data_by_id");
		$this->ID_USER = $this->session->userdata('user_id');
		$this->load->library("create_forms");
		$this->load->library('form_validation');
		$this->load->library('show_pages');
		$this->load->library("header_user");
		$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
		$this->ID_CENTRO=$this->db->select('centro_medico')->where('id_doctor',$this->ID_USER)->get('doctor_centro_medico')->row('centro_medico');
		if($this->ID_CENTRO){
      [$get_centro_info_by_id, $centro_adress] = $this->get_table_data_by_id->getCentroInfo($this->ID_CENTRO);
	  $this->CENTRO_INFO=$get_centro_info_by_id;
	  $this->session->set_userdata('CENTRO_INFO', $get_centro_info_by_id);
		}else{
		 $this->session->set_userdata('CENTRO_INFO', 0);	
		 $this->CENTRO_INFO=0;
		}
$this->load->library('auto_complete_input');
		//$this->load->library("pagination");
		if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			redirect('login');
		}
	}


	
 /*public function index($action=0)
{
$this->header_user->headerInternalDrug($this->ID_USER, $this->CENTRO_INFO);
if($action==0){
$this->load->view('internal-pharma/index');
}else{
$this->load->view('internal-pharma/index-emerg');	
}
}*/


public function index($action=0)
{
$this->header_user->headerInternalDrug($this->ID_USER, $this->CENTRO_INFO);	
$data['action'] =$action;


$this->load->view('internal-pharma/index-emerg', $data);

}

function listOfPatients(){
if($this->input->get('origine')==0){
$table_patient="hospitalization_data";
}else{
$table_patient="emergency_data";	
}	
		
$sql ="SELECT id_patient FROM $table_patient  WHERE  centro=$this->ID_CENTRO GROUP BY id_patient";

$query=$this->hospitalization_emgergency->query($sql);

echo "<option value=''></option>";

foreach($query->result() as $row2) { 
$patient_name2= $this->db->select('nombre')->where('id_p_a', $row2->id_patient)->get('patients_appointments')->row('nombre');	
echo '<option value="' . $row2->id_patient .'" >' . $patient_name2 . '</option>';
} 


}

	

  public function perfil()
	{
		$this->show_pages->medical_assistent($this->ID_USER);
	}	


public function searchPatientRecord()
{
$this->index(0);
$data['id_user']='';
$data['isFromDrug']="display:none";

$data['userName'] ='';

$patient=$this->hospitalization_emgergency->select('historial_id, id_register')->where('historial_id',$this->input->get('keyword'))->where('centro',$this->ID_CENTRO)->get('hosp_orden_medica_recetas')->row_array();
if($patient){
$id_patient=$patient['historial_id'];
$id_hosp = $this->hospitalization_emgergency->select('id_hosp')->where("id", $patient['id_register'])->get('hosp_orden_medica')->row('id_hosp');
$data['id_patient'] =$patient['historial_id'];
$data['id_centro'] =$this->ID_CENTRO;
$data['id_hosp'] =$id_hosp;
$sql ="SELECT * FROM hospitalization_data  WHERE id_patient=$id_patient  AND centro=$this->ID_CENTRO";
$data['query'] = $this->hospitalization_emgergency->query($sql);
$this->load->view('internal-pharma/patient-data',$data);
$this->querySearchResult(0, $id_patient, 0);
$this->querySearchResult(1, $id_patient, 0);
}else{
	echo "<em>No se ha encontrado en kardex</em>";
}

}






public function searchPatientRecordEmergency()
{
$id_patient=$this->input->get('keyword');
$val=$this->input->get('val');
if($val==1){
$table_recetas = "emerg_orden_medica_recetas";	
$patient_table="emergency_data";
}else{
$table_recetas = "hosp_orden_medica_recetas";
$patient_table="hospitalization_data";	
}
$patient=$this->hospitalization_emgergency->select('historial_id, id_register')->where('historial_id',$id_patient)->where('centro',$this->ID_CENTRO)->get($table_recetas)->row_array();
if($patient){
$data['isFromDrug']=$val;
$data['id_patient'] =$id_patient;
$data['id_centro'] =$this->ID_CENTRO;
$data['id_hosp'] =$patient['id_register'];
$sql ="SELECT * FROM $patient_table  WHERE id_patient=$id_patient AND centro=$this->ID_CENTRO";
$data['query'] = $this->hospitalization_emgergency->query($sql);
$this->load->view('internal-pharma/patient-data-emergency',$data);
	$this->session->set_userdata('CURRENT_PATIENT_IN_USE', $_SERVER['REQUEST_URI']);
		$this->session->set_userdata('CURRENT_PATIENT_IN_USE_ID', $id_patient);
$this->querySearchResult(0, $id_patient, $val);
$this->querySearchResult(1, $id_patient, $val);
}else{
	echo "<div class='alert alert-danger text-center'>No se ha encontrado</div>";
}

}

function querySearchResult($is_print, $id_patient, $origine){
	$data['origine'] =$origine;
	if($origine==0){
$data['orden_medica_table']='hosp_orden_medica';	
$table_recetas="hosp_orden_medica_recetas";
$table_petition="hosp_peticion";
}else{
$table_recetas="emerg_orden_medica_recetas";	
$data['orden_medica_table']='emerg_orden_medica';	
$table_petition="emerg_peticion";	
}
$data['table_recetas']=$table_recetas;	
$data['table_petition']=$table_petition;	
$sql2="SELECT id, medica, cantidad, new_cant, dosis, via, updated_time, updated_by, drug_is_dispatched, centro, id_register, operator, is_print
FROM  $table_recetas WHERE  historial_id=$id_patient && kardex=1 && centro=$this->ID_CENTRO && is_print=$is_print ORDER BY id DESC";

$data['query2'] = $this->hospitalization_emgergency->query($sql2);

$sql3="SELECT id, insumo, updated_time, cantidad, drug_is_dispatched, updated_by, centro, idemp, is_print
 FROM  $table_petition WHERE id_patient=$id_patient  AND centro=$this->ID_CENTRO && is_print=$is_print ORDER BY id DESC";

$data['query3'] = $this->hospitalization_emgergency->query($sql3);	
$data['is_print'] =$is_print;

$this->load->view('internal-pharma/kardex-list',$data);	
}



   function dispatchThisDrug()
     {
		 $table= $this->input->post('table');
         $where = array(
             'id' => $this->input->post('drug_id'),
          );
		  
		  if($this->input->post('print')==1){
			$user_dispatcher=$this->ID_USER;  
			$dispatch_time=date('Y-m-d H:i:s');
		  }else{
			$user_dispatcher=0; 
         $dispatch_time=NULL;			
		  }
         $update = array(
            'drug_is_dispatched' => $this->input->post('print'),
			'drug_dispatched_user'=>$user_dispatcher,
			'drug_dispatched_time'=>$dispatch_time
         );
         $this->hospitalization_emgergency->where($where);
         $this->hospitalization_emgergency->update($table, $update);
         
     }	
	
}
