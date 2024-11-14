<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_admin extends CI_Model{
    function __construct() {
       // $this->userTbl = 'users';
	   	$this->clinical_history = $this->load->database('clinical_history',TRUE);
	 }

   public function getPieChat($data1,$data2,$centro,$medico)
    {
	 $condition = "h_c_sinopsis.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->db->select('sexo,count(sexo) as total');
$this->db->from('patients_appointments');
 $this->db->join('h_c_sinopsis', 'h_c_sinopsis.historial_id= patients_appointments.id_p_a');
 $this->db->where($condition);
 if($centro==""){
$this->db->where('user_id',$medico);
 }else{
$this->db->where('h_c_sinopsis.centro_medico',$centro);
 }
$this->db->group_by('sexo');
$query = $this->db->get();
  return $query->result();
    }

	





public function set_cita_to_confirm_patient($id,$data){
$this->db->where('id_p_a', $id);
$this->db->update('patients_appointments', $data);
}
public function set_cita_to_confirm_rendez_vous($id,$data1){
	$this->db->where('id_patient', $id);
$this->db->update('rendez_vous', $data1);
}
public function saveUpdatePatient($idp,$save){
$this->db->where('id_p_a', $idp);
$this->db->update('patients_appointments', $save);
}

public function display_centro_medico($data){
$this->db->select("*");
  $this->db->from('medical_centers');
  $this->db->where('id_m_c',$data);
  $query = $this->db->get();
  return $query->result();
}

public function current_login(){
$this->db->select("perfil,name,login_time,id_user,area");
  $this->db->from('users');
  $this->db->where('is_log_in',1);
  $this->db->where('id_user !=',1);
 $this->db->like('login_time',date("Y-m-d"));
  $query = $this->db->get();
  return $query->result();
}




public function ver_cita_confirmada($id){
$this->db->select("*");
  $this->db->from('patients_appointments');
  // $this->db->join('medical_centers', 'patients_appointments.centro_medico= medical_centers.name');
   // $this->db->join('type_reasons', 'patients_appointments.causa= type_reasons.id');
	//$this->db->join('areas', 'patients_appointments.especialidad= areas.id_ar');
	//$this->db->join('doctors', 'patients_appointments.doctor= doctors.id');
  $this->db->where('id_p_a',$id);
  $query = $this->db->get();
  return $query->result();
}

public function editUser($id){
$this->db->select("*");
  $this->db->from('users');
 $this->db->where('id_user',$id);
  $query = $this->db->get();
  return $query->result();
}
//$sql="select doctor_agenda from doctor_agenda  where agenda=$id_diary";=id_doctor

public function diary_doctors($id_diary){
$this->db->select("*");
  $this->db->from('doctor_agenda');
  $this->db->where('agenda',$id_diary);
  $query = $this->db->get();
return $query->result();
}

public function ver_area($id){
$this->db->select("*");
  $this->db->from('areas');
  $this->db->where('id_ar',$id);
  $query = $this->db->get();
  return $query->result();
}


public function get_centro($id){
$this->db->select("centro_medico");
  $this->db->from('patients_appointments');
  $this->db->where('id_p_a',$id);
  $query = $this->db->get();
  return $query->result();
}
public function RendezVous($id){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('id_patient',$id);
  $this->db->order_by('id', 'desc');
  $query = $this->db->get();
  return $query->result();
}



public function RendezVousByCentro($id,$id2){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('id_patient',$id);
  $this->db->where('centro',$id2);
  $this->db->order_by('id_apoint', 'desc');
  $query = $this->db->get();
  return $query->result();
}



public function RendezVousBySearch($id){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('id_patient',$id);
 $this->db->order_by('id_apoint', 'desc');
  $query = $this->db->get();
  return $query->result();
}




public function Search_factura($val){
  $this->db->select("*");
  $this->db->from('rendez_vous');
  if($val['doctor'] !=0){
  $this->db->where('doctor',$val['doctor']);
  }else{
	   $this->db->where('centro',$val['centro_medico']);
  }
  $this->db->where('id_patient',$val['id_patient']);
  $this->db->order_by('id_apoint', 'desc');
  $query = $this->db->get();
  return $query->result();
}

public function facturaSinCita($val){
$this->db->select("*");
  $this->db->from('factura2');
   $this->db->where('id_rdv','fac');
   if($val['doctor'] !=0){
  $this->db->where('medico',$val['doctor']);
   }else{
	$this->db->where('centro_medico',$val['centro_medico']);   
   }
  $this->db->where('paciente',$val['id_patient']);
  $this->db->order_by('idfacc', 'desc');
  $query = $this->db->get();
  return $query->result();
}

public function RendezVousDoc($val){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('doctor',$val['doctor']);
  $this->db->where('id_patient',$val['id_patient']);
  $this->db->where('cancelar',0);
  $this->db->order_by('id_apoint', 'desc');
  $query = $this->db->get();
  return $query->result();
}


public function RendezVousDocUser($doc){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('id_patient',$doc['id_patient']);
  $this->db->where('doctor',$doc['doctor']);
   $this->db->where('centro',$doc['centro']);
  $this->db->order_by('id_apoint', 'desc');
  $query = $this->db->get();
  return $query->result();
}

public function get_patient_for_billing($id){
$this->db->select("centro,area,id_patient,doctor");
  $this->db->from('rendez_vous');
// $this->db->join('patients_appointments', 'rendez_vous.id= patients_appointments.id_p_a');
  $this->db->where('id_apoint',$id);
  $query = $this->db->get();
  return $query->result();
}


public function getConfirmSolicitudByDoc($doc){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('confirmada',0);
   $this->db->where('fecha_propuesta',date("d-m-Y"));
   $this->db->where('doctor',$doc);
  $this->db->where('cancelar',0);
  $this->db->order_by('id_apoint', 'desc');
  $query = $this->db->get();
  return $query->result();
}


public function getConfirmSolicitud(){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('confirmada',0);
   $this->db->where('fecha_propuesta',date("d-m-Y"));
  $this->db->where('cancelar',0);
  $this->db->order_by('id_apoint', 'desc');
  $query = $this->db->get();
  return $query->result();
}

public function getPatients(){
$this->db->select("*");
  $this->db->from('patients_appointments');
  $this->db->where('confirmada1',0);
  $this->db->order_by('id_p_a', 'desc');
  $query = $this->db->get();
  return $query->result();
}

public function getPatientsDoc($id){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('doctor',$id);
  $this->db->group_by('id_patient');
  $this->db->order_by('id_patient', 'desc');
  $query = $this->db->get();
  return $query->result();
}



public function historial_medical($id){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->where('id_p_a',$id);
  $query = $this->db->get();
  return $query->result();
}

public function get_centro_medico($centro_medico){
$this->db->select("*");
  $this->db->from('rendez_vous');
 $this->db->where('centro', $centro_medico);
  $query = $this->db->get();
  $data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}



public function date_range_appointments_query($data) {
$condition = "filter_date BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
$this->db->select('*');
$this->db->from('rendez_vous');
$this->db->where($condition);
$this->db->where('centro', $data['centro']);
if($data['perfil']=="Medico"){
$this->db->where('doctor', $data['doctor']);
}
//if($data['perfil']=='Asistente Medico'){
 //$this->db->join('doctor_centro_medico', 'rendez_vous.doctor= doctor_centro_medico.id_doctor');
//$this->db->group_by('centro'); 
//}
$query = $this->db->get();
return $query;
}

 function getCountries()
    {
        $query = $this->db->query('SELECT  short_name FROM countries');
        return $query->result();

    }

	function getCausa()
    {
        $query = $this->db->query('SELECT  * FROM type_reasons');
        return $query->result();

    }
	//province link
	function getProvinces(){
		$this->db->select('id,title');
		$this->db->from('provinces');
		$this->db->order_by('title', 'desc');
		$query=$this->db->get();
		return $query->result();
	}
	function messageToDoc($id_area){
		$this->db->select('idsm,message,insert_time');
		$this->db->from('sendmessage');
		$this->db->where('id_area',$id_area);
		$query=$this->db->get();
		return $query->result();
	}

	function getData($loadType,$loadId){
		if($loadType=="municipio"){
			$fieldList='id_town,title_town as name';
			$table='townships';
			$fieldName='province_id_town';
			$orderByField='title_town';
		}

		$this->db->select($fieldList);
		$this->db->from($table);
		$this->db->where($fieldName, $loadId);
		$this->db->order_by($orderByField, 'asc');
		$query=$this->db->get();
		return $query;
	}

	//especialidad y doctors links

	function getEspecialidades(){
		$this->db->select('id_ar,title_area');
		$this->db->from('areas');
		$this->db->order_by('title_area', 'asc');
		$query=$this->db->get();
		return $query->result();

	}




public function get_input($seguro_medico)  {
  $this->db->select('name AS seguro_campo');
  $this->db->from('fields');
  $this->db->join('medical_insurances_fields', 'fields.id= medical_insurances_fields.field_id');
  $this->db->where('medical_insurance_id',$seguro_medico);
  $query = $this->db->get();
  return $query->result();
}
public function GET_NAMEF($idpatient)  {
 $this->db->select('input_name AS seguro_camp_numero ,inputf AS seguro_campo');
  $this->db->from('saveinput');
  $this->db->where('patient_id',$idpatient);
  $query = $this->db->get();
  return $query->result();
}




public function getPatientPhoto($val)  {
$this->db->select('photo,nombre');
$this->db->from('patients_appointments');
$this->db->where('id_p_a',$val);
 $query = $this->db->get();
 return $query->result();

}


public function getPatientNameOnSelectAdm($patient_nombres)  {
$this->db->select('*');
$this->db->from('patients_appointments');
$this->db->like('nombre',$patient_nombres);
 //$this->db->where('apellido',$patient_apellido);
 $query = $this->db->get();
 return $query->result();

}

 public function save_patient($data) {
        $this->db->insert('patients_appointments', $data);
		 $insert_id = $this->db->insert_id();
        return  $insert_id;
     }

	 public function save_rendevous($data) {
        $this->db->insert('rendez_vous', $data);
		$insert_id = $this->db->insert_id();
        return  $insert_id;
    }

	 public function saveInput($data) {
        $this->db->insert('saveinput', $data);

    }

public function get_seguro_name($seguro_name)  {
$result = $this->db->query("SELECT title from seguro_medico where id_sm= $seguro_name")->row_array();
return $result['title'];

}

public function get_provincia_name($provincia_id)  {
$result = $this->db->query("SELECT title from provinces where id= $provincia_id")->row_array();
return $result['title'];

}

//public function get_municipio_name($municipio_id)  {
//$result = $this->db->query("SELECT title_town from townships where id_town= $municipio_id")->row_array();
//return $result['title_town'];

//}

/*public function get_doctor_name($doctor_id)  {
$result = $this->db->query("SELECT first_name, last_name from doctors where id= $doctor_id")->row_array();
return $result['first_name'] . '' . $result['last_name'];

}*/

public function get_especialidad_name($especialidad_id)  {
$result = $this->db->query("SELECT title_area from areas where id_ar= $especialidad_id")->row_array();
return $result['title_area'];

}




 public function save_seguro_medico($data) {
        // Inserting into your table
        $this->db->insert('medical_centers', $data);
        // Return the id of inserted row
        return $id = $this->db->insert_id();
    }

 public function saveMedicalCenterWithEspAndSeg($data) {
        // Inserting into your table
        $this->db->insert('medial_center_with_esp_seg', $data);
        // Return the id of inserted row
        return $id= $this->db->insert_id();
    }

 function display_all_medical_centers()
    {
	$this->db->select('*');
$this->db->from('medical_centers');
$this->db->where('activate',0);
$this->db->order_by('id_m_c', 'DESC');
$query = $this->db->get();
 return $query->result();
   }

	public function display_centro_medical_esp($id_medical_center)
	{
$this->db->select('*');
    $this->db->from('medial_center_esp');
    $this->db->join('areas', ' medial_center_esp.especialidad= areas.id_ar');
	$this->db->where('id_medical_center',$id_medical_center);
    $query = $this->db->get();
  $data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}
	public function display_centro_medical_seguro($id_medical_center)
	{
$this->db->select('*');
    $this->db->from('seguro_medico');
    $this->db->join('medical_centro_seguro', 'seguro_medico.id_sm = medical_centro_seguro.seguro_id');
	$this->db->where('id_medical_center',$id_medical_center);
	$this->db->where('activate',0);
    $query = $this->db->get();
  $data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}

 function getDiaries()
    {
        $query = $this->db->query('SELECT  * FROM diaries');
        return $query->result();

    }

	/* public function save_doctor($data) {
        $this->db->insert('doctors', $data);
    }*/


 	public function get_doctor($id_medical_center)
	{

$this->db->select('*');
    $this->db->from('doctor_agenda_test');
    $this->db->join('users', 'users.id_user = doctor_agenda_test.id_doctor');
	$this->db->where('id_centro',$id_medical_center);
	$this->db->group_by('id_doctor');
    $query = $this->db->get();
  $data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}


 	public function get_asistente_doctor($id_centro)
	{

$this->db->select('id_user,name,correo');
    $this->db->from('doctor_centro_medico');
    $this->db->join('users', 'users.id_user = doctor_centro_medico.id_doctor');
	$this->db->where('centro_medico',$id_centro);
	$this->db->group_by('id_doctor');
    $query = $this->db->get();
  $data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}








public function edit_centro_medico($edit_id){
$this->db->select("*");
  $this->db->from('medical_centers');
 $this->db->where('id_m_c',$edit_id);
  $query = $this->db->get();
  return $query->result();
}

	public function get_especialidad($edit_id){
$this->db->select("especialidad");
  $this->db->from('medial_center_with_esp_seg');
 $this->db->where('id_medical_center',$edit_id);
  $query = $this->db->get();
  return $query->result();
}

public function edit_area($id,$data){
$this->db->where('id_ar', $id);
$this->db->update('areas', $data);
}

public function edit_causa($id,$data){
$this->db->where('id', $id);
$this->db->update('type_reasons', $data);
}
function display_all_areas()
    {
	$this->db->select('*');
$this->db->from('areas');
$this->db->order_by('id_ar', 'DESC');
$query = $this->db->get();
 return $query->result();
   }

   function display_all_reasons()
    {
	$this->db->select('*');
$this->db->from('type_reasons');
$this->db->order_by('id', 'DESC');
$query = $this->db->get();
 return $query->result();
   }

    public function save_area($data) {
        // Inserting into your table
        $this->db->insert('areas', $data);
        // Return the id of inserted row
     }


	 public function save_new_causa($data) {
        $this->db->insert('type_reasons', $data);

     }




	    public function save_disease($data) {
        // Inserting into your table
        $this->db->insert('type_reasons', $data);
        // Return the id of inserted row
     }






 public function delete_input($id){
  $this -> db -> where('patient_id', $id);
  $this -> db -> delete('saveinput');
}





	public function delete_area($id){
  $this -> db -> where('id_ar', $id);
  $this -> db -> delete('areas');
}


public function delete_causa($id){
  $this -> db -> where('id', $id);
  $this -> db -> delete('type_reasons');
}



public function delete_doctor_agenda($id_doc){
  $this -> db -> where('id_doctor', $id_doc);
  $this -> db -> delete('doctor_agenda');
}

	public function delete_doctor_centro($id_doc){
  $this -> db -> where('id_doctor', $id_doc);
  $this -> db -> delete('doctor_centro_medico');
}
	public function delete_doctor_centro2($id_cd){
  $this -> db -> where('id_cd', $id_cd);
  $this -> db -> delete('doctor_centro_medico');
}


public function delete_seguro_centro($id){
  $this -> db -> where('id_mcs', $id);
  $this -> db -> delete('medical_centro_seguro');
}

	public function delete_doctor_seguro($id_doc){
  $this -> db -> where('id_doctor', $id_doc);
  $this -> db -> delete('doctor_seguro');
}


	public function delete_centro_medico($id,$data){
  $this -> db -> where('id_m_c', $id);
 $this->db->update('medical_centers', $data);
}

	public function delete_centro_medico_doc($id){
  $this -> db -> where('centro_medico', $id);
  $this -> db -> delete('doctor_centro_medico');
}


public function delete_seguro_medico($id,$data){
 $this->db->where('id_sm', $id);
$this->db->update('seguro_medico', $data);
}

	public function delete_field($id){
  $this -> db -> where('id', $id);
  $this -> db -> delete('fields');
}

	public function delete_field_link($id){
  $this -> db -> where('field_id', $id);
  $this -> db -> delete('medical_insurances_fields');
}



	public function delete_seguro_medico_field($id_seguro){
  $this -> db -> where('medical_insurance_id', $id_seguro);
  $this -> db -> delete('medical_insurances_fields');
}

	public function DeleteDiaryDoctor($id){
  $this -> db -> where('id_d_ag', $id);
  $this -> db -> delete('doctor_agenda');
}

function display_all_seguro_medico()
    {
	$this->db->select('*');
$this->db->from('seguro_medico');
$this->db->order_by('id_sm');
$this->db->where('activate',0);
$query = $this->db->get();
 return $query->result();
   }

function all_seguro_tarif($val)
    {
	$this->db->select('*');
$this->db->from('seguro_medico');
 $this->db->join(' tarifarios_test', 'seguro_medico.id_sm =  tarifarios_test.id_seguro');
 $this->db->where('procedimiento',$val);
 $this->db->group_by('id_seguro');
$this->db->order_by('title');
$query = $this->db->get();
 return $query->result();
   }

   function all_provinces()
    {
	$this->db->select('*');
$this->db->from('provinces');
$this->db->order_by('id', 'DESC');
$query = $this->db->get();
 return $query->result();
   }

    function all_municipio()
    {
	$this->db->select('*');
$this->db->from('townships');
 $this->db->join('provinces', 'townships.province_id_town = provinces.id');
$this->db->order_by('id_town', 'DESC');
$query = $this->db->get();
 return $query->result();
   }

   public function edit_seguro_medico($id,$data){
$this->db->where('id_sm', $id);
$this->db->update('seguro_medico', $data);
}




  public function save_s_m($data) {
        // Inserting into your table
        $this->db->insert('seguro_medico', $data);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();


    }

	 public function saveDoctorCentroMedico($data) {
        // Inserting into your table
        $this->db->insert('doctor_centro_medico', $data);
        // Return the id of inserted row
        return $id= $this->db->insert_id();
    }



public function saveDoctorAgenda($data) {
        // Inserting into your table
        $this->db->insert('doctor_agenda_test', $data);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();
}

   function agend_result($id)
    {
	$this->db->select('*');
$this->db->from('doctor_agenda');
$this->db->where('id_doctor', $id);
  $this->db->order_by('day', 'asc');
$this->db->group_by('day');
$query = $this->db->get();
 return $query->result();
   }

public function update_doc_agenda($id,$save){
$this->db->where('id_d_ag', $id);
$this->db->update('doctor_agenda_test', $save);
}



public function update_doc_agenda_area($id,$save){
$this->db->where('id_doctor', $id);
$this->db->update('doctor_agenda', $save);
}
/*public function saveDoctorAgenda($data)
{
if (isset($data['agenda']) && is_array($data['agenda'])):
    foreach ( $data['agenda'] as $key=>$value ):
        $this->db->insert('doctor_agenda', array(
           'id_doctor'=>$data['iduser'],
		   'id_centro'=>$data['centro_medico'][$key],
           'agenda'=>$data['agenda'][$key],
		   'day'=>$data['day'][$key],
           'citas'=>$data['manana_citas'][$key] // assuming this are the same for all rows?
        ));
    endforeach;
endif;

 //$this -> db -> where('day', '');
  //$this -> db -> delete('doctor_agenda');
}*/











	public function SaveField($data) {
        $this->db->insert('fields', $data);
}



	public function saveDoctorSeguro($data) {
        // Inserting into your table
        $this->db->insert('doctor_seguro', $data);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();


    }

	public function sendMessageToMedico($id)
	{
	$this->db->select("id_user, name, title_area");
	$this->db->from('users');
	 $this->db->join('areas', 'areas.id_ar = users.area');
	$this->db->where('perfil','Medico');
	$this->db->where('id_user !=', $id);
	$this->db->order_by('title_area','asc');
	$query = $this->db->get();
	return $query->result();
	}


 public  function allMessReceived($id)
 {
$this->db->select("*");
  $this->db->from("chat_medico");
  $this->db->where('message_to', $id);
   $this->db->group_by('message_to');
   $this->db->order_by('stime', 'DESC');
  return $this->db->get();
 }


  public  function countMessReceived($id)
 {
 $this->db->select('id')->from('chat_medico')->where('message_to',$id)->where('seen',0);
    $q = $this->db->get();
    return $q->num_rows();
}




  public  function search_fetch_medico_chat($query,$id)
 {
  $this->db->select("id_user, name, title_area, is_log_in, perfil");
  $this->db->from("users");
  $this->db->join('areas', 'areas.id_ar = users.area', 'left');
  $this->db->where('id_user !=', $id);
  $this->db->where('perfil !=', 'Auditoria Medica');
  if($query != '')
  {
   $this->db->like('name', $query);
   $this->db->or_like('title_area', $query);
   $this->db->where('id_user !=', $id);
   $this->db->where('perfil !=', 'Auditoria Medica');
  }
  $this->db->order_by('is_log_in', 'DESC');
  return $this->db->get();
 }


 public function searchPlazo($query){
  $this->db->select('id_user, name, perfil, plazo');
  $this->db->from('users');
   $this->db->where('perfil !=', 'Admin');
    if($query != '')
  {
   $this->db->like('name', $query);
  }
   $this->db->order_by('plazo', 'desc');
 $query = $this->db->get();
 return $query->result();
}



public function get_doc_esp_tarif($id_esp)
	{
	$this->db->select("id_user, name");
	$this->db->from('users');
	$this->db->join('doctor_agenda_test', 'doctor_agenda_test.id_doctor = users.id_user');
	$this->db->where('area',$id_esp);
	$this->db->group_by('id_doctor');
	$query = $this->db->get();
	return $query->result();
	}


	public function get_doc_esp($id_esp,$id_centro)
	{
	$this->db->select("id_user, name");
	$this->db->from('users');
	$this->db->join('doctor_agenda_test', 'doctor_agenda_test.id_doctor = users.id_user');
	$this->db->where('id_centro',$id_centro);
	$this->db->where('active',0);
	$this->db->group_by('id_doctor');
	$query = $this->db->get();
	return $query->result();
	}


	public function get_doc_esp_($id_centro,$id_user)
	{
	$this->db->select("id_user, name");
	$this->db->from('users');
	$this->db->join('doctor_agenda_test', 'doctor_agenda_test.id_doctor = users.id_user');
	$this->db->where('id_user',$id_user);
	$this->db->where('id_centro',$id_centro);
	$this->db->where('active',0);
	$this->db->group_by('id_doctor');
	$query = $this->db->get();
	return $query->result();
	}








public function view_doctor($id_doctor)
	{

$this->db->select("*");
  $this->db->from('users');
$this->db->where('id_user',$id_doctor);
  $query = $this->db->get();
  return $query->result();
}





public function view_field($id_field)
	{

$this->db->select("*");
  $this->db->from('fields');
  $this->db->where('id',$id_field);
  $query = $this->db->get();
  return $query->result();
}


public function view_field_seguro($id_field)
	{

$this->db->select('medical_insurance_id');
  $this->db->from('medical_insurances_fields');
  $this->db->where('field_id',$id_field);
  $query = $this->db->get();
  return $query->result();
}
public function edit_field_seguro($id_field)
	{

$this->db->select('medical_insurance_id');
  $this->db->from('medical_insurances_fields');
  $this->db->where('field_id',$id_field);
  $query = $this->db->get();
  return $query->result();
}
public function all_fields()
	{

$this->db->select("*");
  $this->db->from('fields');
  $query = $this->db->get();
  return $query->result();
}
public function view_municipio($id)
	{
		$this->db->select('*');
$this->db->from('townships');
 $this->db->join('provinces', 'townships.province_id_town = provinces.id');
$this->db->where('id_town',$id);
$this->db->order_by('id_town', 'desc');
$query = $this->db->get();
 return $query->result();

}
public function view_doctor_agenda($id_doctor)
	{

$this->db->select("*");
  $this->db->from('doctor_agenda');
  $this->db->where('id_doctor',$id_doctor);
  $this->db->order_by('agenda', 'asc');
  $query = $this->db->get();
  return $query->result();
}



 public function AddDiaryDoctor($data) {
        // Inserting into your table
        $this->db->insert('doctor_agenda', $data);
        // Return the id of inserted row
        return $id = $this->db->insert_id();


    }



public function view_doctor_seguro($id_doctor)
	{

$this->db->select("*");
  $this->db->from('doctor_seguro');
  $this->db->join('seguro_medico', 'doctor_seguro.seguro_medico = seguro_medico.id_sm');
  $this->db->where('id_doctor',$id_doctor);
  $query = $this->db->get();
  return $query->result();
}

public function diary($id_diary)
	{

$this->db->select("*");
  $this->db->from('diaries');
  $this->db->where('id',$id_diary);
  $query = $this->db->get();
  return $query->result();
}





public function view_doctor_centro($id_doctor)
	{
   $this->db->select("id_doctor,name,id_m_c");
  $this->db->from('doctor_agenda_test');
  $this->db->join('medical_centers', 'doctor_agenda_test.id_centro = medical_centers.id_m_c');
  $this->db->where('id_doctor',$id_doctor);
  $this->db->where('active',0);
  //$this->db->where('type','privado');
   $this->db->order_by('name','asc');
  $this->db->group_by('id_centro');
  $query = $this->db->get();
  return $query->result();
}


public function view_doctor_centro_cita($id_doctor)
	{
   $this->db->select("id_doctor,name,id_m_c");
  $this->db->from('doctor_agenda_test');
  $this->db->join('medical_centers', 'doctor_agenda_test.id_centro = medical_centers.id_m_c');
  $this->db->where('id_doctor',$id_doctor);
  $this->db->where('active',0);
   $this->db->order_by('name','asc');
  $this->db->group_by('id_centro');
  $query = $this->db->get();
  return $query->result();
}





public function view_doctor_seguro_as($id)
	{

$this->db->select("id_sm,title");
  $this->db->from('seguro_medico');
  $this->db->join('medical_centro_seguro', 'medical_centro_seguro.seguro_id = seguro_medico.id_sm');
  $this->db->where('id_medical_center',$id);
  $query = $this->db->get();
  return $query->result();
}







public function view_doctor_solicitud($id_doctor)
	{

$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->join('patients_appointments', 'rendez_vous.id_patient = patients_appointments.id_p_a');
  $this->db->where('doctor',$id_doctor);
  $query = $this->db->get();
  return $query->result();
}

public function getNec()
	{

$this->db->select("nec,id_p_a");
  $this->db->from('patients_appointments');
  $this->db->join('rendez_vous', 'rendez_vous.id_patient = patients_appointments.id_p_a');
  $this->db->order_by('id', 'desc');
  $query = $this->db->get();
  return $query->result();
}


public function view_provincia($id)
	{

$this->db->select("*");
  $this->db->from('provinces');
 // $this->db->join('townships', 'provinces.id = townships.province_id_town');
  //$this->db->limit(1);
  $this->db->where('id',$id);
  $query = $this->db->get();
  return $query->result();
}


public function view_provincia_direcion($id)
	{

$this->db->select("*");
  $this->db->from('directions');
   $this->db->join('provinces', 'directions.province_id = provinces.id');
    $this->db->join('townships', 'directions.township_id = townships.id_town');
  $this->db->where('province_id',$id);
  $query = $this->db->get();
  return $query->result();
}



public function get_municipio_direcion($id)
	{

$this->db->select("*");
  $this->db->from('directions');
   $this->db->join('townships', 'directions.township_id = townships.id_town');
  $this->db->where('township_id',$id);
  $query = $this->db->get();
  return $query->result();
}



public function view_provincia_centro($id)
	{

$this->db->select("*");
  $this->db->from('medical_centers');
  $this->db->where('provincia',$id);
  $query = $this->db->get();
  return $query->result();
}


public function view_muncipio_centro($id)
	{

$this->db->select("*");
  $this->db->from('medical_centers');
  $this->db->where('municipio',$id);
  $query = $this->db->get();
  return $query->result();
}
 public function display_all_doctors()
    {
	$this->db->select("*");
  $this->db->from('users');
   $this->db->where('perfil', 'Medico');
  $this->db->order_by('id_user', 'desc');
  $query = $this->db->get();
  return $query->result();
   }


	function GetSeguroLink($id_field)
    {
   $this->db->select('id_sm,title,codigo');
  $this->db->from('medical_insurances_fields');
  $this->db->join('seguro_medico', 'medical_insurances_fields.medical_insurance_id = seguro_medico.id_sm');
  $this->db->where('field_id',$id_field);
  $query = $this->db->get();
        return $query->result();

    }

	function RelatedCentro($id)
    {
   $this->db->select('*');
  $this->db->from('medical_centro_seguro');
  $this->db->join('medical_centers', 'medical_centro_seguro.id_medical_center = medical_centers.id_m_c');
  $this->db->where('seguro_id',$id);
  //$this->db->where('id_medical_center !=',$id['id_medical_center']);
  $query = $this->db->get();
if($query->num_rows()>0)
{
return $query->result();
}
else
{
return null;
}
 }

 	function relatedDoctor($id_area)
    {
   $this->db->select('id_user, name, cell_phone, correo');
  $this->db->from('users');
   $this->db->where('area',$id_area);
  $query = $this->db->get();
        return $query->result();
   }

	function EditSeguroMedico($id_seguro)
    {
   $this->db->select('*');
  $this->db->from('seguro_medico');
  $this->db->where('id_sm',$id_seguro);
  $query = $this->db->get();
        return $query->result();

    }


	public function updateField($id_field,$data){
$this->db->where('id', $id_field);
$this->db->update('fields', $data);
}

public function updateSeguro($id_seguro,$data){
$this->db->where('id_sm', $id_seguro);
$this->db->update('seguro_medico', $data);
}


	public function saveSeguroField($data) {
        $this->db->insert('medical_insurances_fields', $data);

}

	public function deleteSeguroField($id_seguro){
  $this -> db -> where('medical_insurance_id', $id_seguro);
  $this -> db -> delete('medical_insurances_fields');
}

	public function deleteField($id_field){
  $this -> db -> where('field_id', $id_field);
  $this -> db -> delete('medical_insurances_fields');
}

public function deleteProvinceDirection($id){
  $this -> db -> where('id_prov', $id);
  $this -> db -> delete('directions');
}
public function deleteDoctorAgenda($id){
  $this -> db -> where('id_d_ag', $id);
  $this -> db -> delete('doctor_agenda');
}
public function Agendas(){
 $this->db->select('*');
  $this->db->from('diaries');
   $query = $this->db->get();
        return $query->result();
}
public function deleteProvinceCentro($id,$data){
 $this->db->where('id_m_c', $id);
$this->db->update('medical_centers', $data);
}

public function deleteMunicipioCentro($id,$data){
 $this->db->where('id_m_c', $id);
$this->db->update('medical_centers', $data);
}


public function getTownships(){
  $this->db->select('*');
  $this->db->from('townships');
 $query = $this->db->get();
 return $query->result();
}


	public function SaveUpdateCentroMedico($id_m_c,$data){
$this->db->where('id_m_c', $id_m_c);
$this->db->update('medical_centers', $data);
}



public function deleteCentroDoc($id_m_c){
  $this -> db -> where('centro_medico', $id_m_c);
  $this -> db -> delete('doctor_centro_medico');
}

public function deleteDocCentro($id_doc){
  $this -> db -> where('id_doctor', $id_doc);
  $this -> db -> delete('doctor_centro_medico');
}

public function SaveCentroDoc($saveC) {
        // Inserting into your table
        $this->db->insert('doctor_centro_medico', $saveC);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();
    }


public function SaveCentroEsp($saveE) {
        // Inserting into your table
        $this->db->insert('medial_center_esp', $saveE);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();
    }



	public function deleteCentroEsp($id_m_c){
  $this -> db -> where('id_medical_center', $id_m_c);
  $this -> db -> delete('medial_center_esp');
}


	public function deleteCentroSeguro($id_m_c){
  $this -> db -> where('id_medical_center', $id_m_c);
  $this -> db -> delete('medical_centro_seguro');
}

public function SaveCentroSeg($saveSe) {
        // Inserting into your table
        $this->db->insert('medical_centro_seguro', $saveSe);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();
    }



		public function deleteAgendaDoctor($id_doctor){
  $this -> db -> where('id_doctor', $id_doctor);
  $this -> db -> delete('doctor_agenda');
}


public function SaveAgendaDoctor($saveAD) {
        // Inserting into your table
        $this->db->insert('doctor_agenda', $saveAD);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();
    }


	public function DeleteDoctorCentro($id_cd){
  $this -> db -> where('id_cd', $id_cd);
  $this -> db -> delete('doctor_centro_medico');
}

public function DeleteDoctorSeguro($id_d_s){
  $this -> db -> where('id_d_s', $id_d_s);
  $this -> db -> delete('doctor_seguro');
}


function getDoctorForUpdate($edit_id)
    {
	$this->db->select('*');
$this->db->from('users');
$this->db->where('id_user',$edit_id);
$query = $this->db->get();
 return $query->result();
   }


   	public function deleteDocSeg($id_doc){
  $this -> db -> where('id_doctor', $id_doc);
  $this -> db -> delete('doctor_seguro');
}


  	public function deleteDocAgenda($id_doc){
  $this -> db -> where('id_doctor', $id_doc);
  $this -> db -> delete('doctor_agenda');
}

public function SaveDocSeg($saveSe) {
        // Inserting into your table
        $this->db->insert('doctor_seguro', $saveSe);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();
    }

	public function SaveDocAgenda($saveSe) {
        // Inserting into your table
        $this->db->insert('doctor_agenda', $saveSe);
        // Return the id of inserted row
        return $id_cita = $this->db->insert_id();
    }

	 public function CreateUser($data) {
        // Inserting into your table
        $this->db->insert('users', $data);
        // Return the id of inserted row
        return $id = $this->db->insert_id();
    }


	 public function SaveAsistenteCentro($data) {
        // Inserting into your table
        $this->db->insert('asistent_medico_centro', $data);
        // Return the id of inserted row
        return $id = $this->db->insert_id();
    }

 public function SaveMessage($save) {
        // Inserting into your table
        $this->db->insert('sendmessage', $save);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    }



public function docSendMessageDoc($save) {
$this->db->insert('chat_medico', $save);
$insert_id = $this->db->insert_id();
return  $insert_id;
}






public function DeleteMessage($idm){
  $this -> db -> where('id', $idm);
  $this -> db -> delete('chat_medico');
}

public function DeleteMessageSent($idm){
  $this -> db -> where('id_msg', $idm);
  $this -> db -> delete('doctors_message_view');
}




function medicamentos()
    {
	$this->db->select('*');
$this->db->from('medicaments');
 $this->db->order_by('id', 'desc');
$query = $this->db->get();
 return $query->result();
   }


   function search_medic($val)
    {
	$this->db->select('*');
$this->db->from('medicaments');
$this->db->like('name',$val);
 $this->db->order_by('id', 'desc');
$query = $this->db->get();
 return $query->result();
   }



   function Presentacion()
    {
	$this->db->select('*');
$this->db->from('presentacion');
 $this->db->order_by('id_pres', 'desc');
$query = $this->db->get();
 return $query->result();

   }

   function frecuencia()
    {
	$this->db->select('*');
$this->db->from('medical_frecuencies');
$query = $this->db->get();
 return $query->result();
   }

     function via()
    {
	$this->db->select('*');
$this->db->from('medical_via');
$query = $this->db->get();
 return $query->result();
   }

     function farmacia()
    {
	$this->db->select('id,noma');
$this->db->from('drug_stores');
$query = $this->db->get();
 return $query->result();
   }

     function branches()
    {
	$this->db->select('id, drug_store_id, branch_name');
$this->db->from('drug_store_branches');
$query = $this->db->get();
 return $query->result();
   }

      function estudios()
    {
	$this->db->select('id,name');
$this->db->from('type_studies');
$query = $this->db->get();
 return $query->result();
   }

       function cuerpo()
    {
	$this->db->select('id,name');
$this->db->from('type_body_parts');
$query = $this->db->get();
 return $query->result();
   }

  /* function farmaciaName($farmacia_id)
    {
$result = $this->db->query("SELECT drug_store_name from drug_stores where id= $farmacia_id")->row_array();
return $result['drug_store_name'];

   }

    function branchName($farmacia_id)
    {
$result = $this->db->query("SELECT branch_name from drug_store_branches where drug_store_id= $farmacia_id")->row_array();
return $result['branch_name'];

   }
   */
   public function SaveFormIndicaciones($save) {
        $this->db->insert('h_c_indicaciones_medicales', $save);
				$insert_id = $this->db->insert_id();
        return  $insert_id;

    }

	public function IndicacionesPrevias($historial_id,$centro){
  $this->db->select('*');
  $this->db->from('h_c_indicaciones_medicales');
  $this->db->where('historial_id',$historial_id);
    $this->db->where('centro',$centro);
  $this->db->order_by('id_i_m', 'asc');
 $query = $this->db->get();
 return $query->result();
}

	public function ordMedRecetas($historial_id,$operator){
  $this->db->select('*');
  $this->db->from('orden_medica_recetas');
  $this->db->where('historial_id',$historial_id);
   $this->db->where('operator',$operator);
  $this->db->order_by('id_i_m', 'asc');
 $query = $this->db->get();
 return $query->result();
}





public function patient_med_audit($historial_id){
$this->db->select('*,count(medica) as Total');
$this->db->from('h_c_indicaciones_medicales');
 $this->db->where('historial_id',$historial_id);
$this->db->group_by('medica');
$query = $this->db->get();
 return $query->result();
}

	public function print_recetas($id,$col){
  $this->db->select('*');
  $this->db->from('h_c_indicaciones_medicales');
  $this->db->where($col,1);
    $this->db->where('historial_id',$id);
	$this->db->limit(6);
  $this->db->order_by('id_i_m', 'asc');
 $query = $this->db->get();
 return $query->result();
}









public function print_recetas_for_patient($id){
$this->db->select('*');
$this->db->from('h_c_indicaciones_medicales');
$this->db->where('encrypt_recetas',$id);
$query = $this->db->get();
return $query->result();
}






	public function print_recetas_ord_med($id){
  $this->db->select('*');
  $this->db->from('orden_medica_recetas');
  $this->db->where('singular_id',1);
    $this->db->where('historial_id',$id);
	$this->db->limit(6);
  $this->db->order_by('id_i_m', 'asc');
 $query = $this->db->get();
 return $query->result();
}

	public function print_recetas_email_patient($id){
  $this->db->select('*');
  $this->db->from('h_c_indicaciones_medicales');
  $this->db->like('insert_date',date('Y-m-d'));
    $this->db->where('historial_id',$id);
	$this->db->limit(6);
  $this->db->order_by('id_i_m', 'asc');
 $query = $this->db->get();
 return $query->result();
}


     function Printlaboratorios_email_patient($id)
    {
	$this->db->select('laboratory');
$this->db->from('h_c_indications_labs');
 $this->db->like('insert_time',date('Y-m-d'));
  $this->db->where('historial_id',$id);
 $this->db->order_by('id_lab','asc');
$query = $this->db->get();
 return $query->result();
   }


	public function Recetas1($id){
  $this->db->select('*');
  $this->db->from('h_c_indicaciones_medicales');
  $this->db->where('id_i_m',$id);
 $query = $this->db->get();
 return $query->result();
}


function Countsingular(){

    $this->db->select('historial_id')->from('h_c_indicaciones_medicales')->where('singular_id',1);
    $q = $this->db->get();
    return $q->num_rows();
}
	public function UpdateSingularId($id,$value){
$this->db->where('historial_id',$id);
$this->db->update('h_c_indicaciones_medicales',$value);
}
public function GetAnte1($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_marque_positivo');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}

public function showAnte($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_marque_positivo');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}
public function showDrug($historial_id){
  $this->db->select('name');
  $this->db->from('h_c_droga');
  $this->db->where('id_patient',$historial_id);
 $query = $this->db->get();
 return $query->result();
}


public function showDesarollo($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_desarollo');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}
public function GetAntOtros($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_ante_otros');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}

public function GetHabitos($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_habitos_toxicos');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}





function hist_count($historial_id){

    $this->db->select('historial_id')->from('h_c_indicaciones_medicales')->where('historial_id', $historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}


function hist_count_recetas($historial_id,$centro){

    $this->db->select('historial_id')->from('h_c_indicaciones_medicales')->where('historial_id', $historial_id)->where('centro',$centro);
    $q = $this->db->get();
    return $q->num_rows();
}




function CountHabitos($historial_id){

    $this->db->select('historial_id')->from('h_c_habitos_toxicos')->where('historial_id', $historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}




 public function SaveFormIndicacionesEstudios($save) {
        $this->db->insert('h_c_indicaciones_estudio', $save);

    }

public function IndicacionesPreviasEs($historial_id){
$this->db->select('*');
$this->db->from('h_c_indicaciones_estudio');
$this->db->where('historial_id',$historial_id);
$this->db->order_by('id_i_e', 'asc');
$query = $this->db->get();
return $query->result();
}


public function patEstudios($historial_id,$id){
$this->db->select('*');
$this->db->from('h_c_indicaciones_estudio');
$this->db->where('historial_id',$historial_id);
$this->db->where('emergency',$id);
$this->db->order_by('id_i_e', 'desc');
$query = $this->db->get();
return $query->result();
}






function hist_count_es($historial_id){

    $this->db->select('id_i_e')->from('h_c_indicaciones_estudio');
	 $this->db->where('historial_id',$historial_id);
   $q = $this->db->get();
    return $q->num_rows();
}



     function IndicacionesLab($historial_id)
    {
	$this->db->select('id_lab, laboratory, operator, insert_time, updated_by,updated_time,printing');
$this->db->from('h_c_indications_labs');
 $this->db->where('historial_id',$historial_id);
 $this->db->order_by('id_lab','asc');
$query = $this->db->get();
 return $query->result();
   }



     function patLab($historial_id,$id_em,$centro)
    {
	$this->db->select('id_lab, laboratory, operator, insert_time, updated_by,updated_time,printing');
$this->db->from('h_c_indications_labs');
 $this->db->where('historial_id',$historial_id);
 $this->db->where('centro',$centro);
  $this->db->where('emergency',$id_em);
 $this->db->order_by('id_lab','DESC');
$query = $this->db->get();
 return $query->result();
   }

    function patLabAjax($historial_id,$id_em, $limit, $start, $search, $count)
    {
	$this->db->select('id_lab, laboratory, operator, insert_time, updated_time,printing, h_c_indications_labs.updated_by as updated_by');
$this->db->from('h_c_indications_labs');
$this->db->join('users', 'users.id_user = h_c_indications_labs.operator');
		
 $this->db->where('historial_id',$historial_id);
  $this->db->where('emergency',$id_em);
if($search){
			$keyword = $search['keyword'];
			if($keyword){
				$this->db->where("name LIKE '%$keyword%'");
			}
		}
		
		if($count){
			return $this->db->count_all_results();
		}
		
else{
 $this->db->order_by('id_lab','DESC');
    $this->db->limit($limit, $start);
$query = $this->db->get();
 return $query->result();
}
   }




       function Printlaboratorios($print)
    {
	$this->db->select('id_lab, laboratory, operator, insert_time, updated_by,updated_time,user_id');
$this->db->from('h_c_indications_labs');
 $this->db->where('historial_id',$print['historial_id']);
  $this->db->where('printing',$print['print']);
  $this->db->where('user_id',$print['user_id']);
 $this->db->order_by('id_lab','asc');
$query = $this->db->get();
 return $query->result();
   }


        function PrintlaboratoriosAdmin($print)
    {
	$this->db->select('id_lab, laboratory, operator, insert_time, updated_by,updated_time,user_id');
$this->db->from('h_c_indications_labs');
 $this->db->where('historial_id',$print['historial_id']);
  $this->db->where('printing',$print['print']);
 $this->db->order_by('id_lab','asc');
$query = $this->db->get();
 return $query->result();
   }





    function get_lab_name($data1)
    {
$this->db->select('insert_time,operator');
$this->db->from('h_c_indications_labs');
 $this->db->where('historial_id',$data1['id_patient']);
 $this->db->where('laboratory',$data1['lab_id']);
$query = $this->db->get();
 return $query->result();
	}

   function get_med_name($data1)
    {
$this->db->select('*');
$this->db->from('h_c_indicaciones_medicales');
 $this->db->where('historial_id',$data1['id_patient']);
$this->db->where('medica',$data1['med_name']);
$query = $this->db->get();
 return $query->result();
	}

   function patient_lab_audit($historial_id)
  {
$this->db->select('insert_time,laboratory,count(laboratory) as Total');
$this->db->from('h_c_indications_labs');
 $this->db->where('historial_id',$historial_id);
$this->db->group_by('laboratory');
$query = $this->db->get();
 return $query->result();
   }

  function hist_count_lab($historial_id){

    $this->db->select('id_lab')->from('h_c_indications_labs');
	 $this->db->where('historial_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}

  function laboratories()
    {
	$this->db->select('id,name');
$this->db->from('laboratories');
$query = $this->db->get();
 return $query->result();
   }



   function LabAjax($limit, $start, $search, $count)
    {
	$this->db->select('id,name');
$this->db->from('laboratories');
if($search){
			$keyword = $search['keyword'];
			if($keyword){
				$this->db->where("name LIKE '%$keyword%'");
			}
		}
		
		if($count){
			return $this->db->count_all_results();
		}
		
else{
 $this->db->order_by('name','DESC');
    $this->db->limit($limit, $start);
$query = $this->db->get();
 return $query->result();
}
   }




function Enfermedad($historial_id)
    {
$this->db->select('*');
$this->db->from('h_c_sinopsis');
$this->db->where('historial_id',$historial_id);
$this->db->where('id_triaje',0);
$this->db->group_by('filter_date');
$this->db->order_by('id_enf', 'DESC');
$query = $this->db->get();
 return $query->result();
   }


   function get_serv_fac2($id_user,$perfil)
    {
$this->db->select('area');
$this->db->from('factura2');
 if($perfil=="Asistente Medico"){
$this->db->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->db->where('id_doctor',$id_user);
 } else {
 $this->db->where('medico',$id_user);
 }
$this->db->group_by('area');
$query = $this->db->get();
 return $query->result();
}



 function get_serv_fac2_doc($id)
    {
$this->db->select('area');
$this->db->from('factura2');
$this->db->where('medico',$id);
$this->db->group_by('area');
$query = $this->db->get();
 return $query->result();
}

function tarif_by_area($id)
{
$this->db->select('id_tarif,codigo,simon,procedimiento,title_area,id_categoria');
$this->db->from('tarifarios_test');
$this->db->join('areas', 'tarifarios_test.id_categoria= areas.id_ar');
$this->db->where('id_tarif',$id);
$query = $this->db->get();
return $query->result();
}


function tarifarios_test_by_seguros($id)
{
$this->db->select('id_tarif,codigo,simon,procedimiento,id_seguro,monto');
$this->db->from('tarifarios_test');
 $this->db->join('seguro_medico', 'tarifarios_test.id_seguro = seguro_medico.id_sm');
$this->db->where('procedimiento',$id);
$this->db->group_by('id_seguro');
$query = $this->db->get();
return $query->result();
}

function get_tarifario($id)
{
$this->db->select('monto,codigo,simon');
$this->db->from('tarifarios_test');
$this->db->where('id_tarif',$id);
$query = $this->db->get();
return $query->result();
}





	 public function SaveFormIndicacionesLab($save) {
        $this->db->insert('h_c_indications_labs', $save);
		$insert_id = $this->db->insert_id();
        return  $insert_id;

    }

//--------------------------------------------------------------

 function count_ht($historial_id){

    $this->db->select('id')->from('h_c_habitos_toxicos');
	$this -> db -> where('historial_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}

 public function saveHabitosToxicos($save4) {
 $this->db->insert('h_c_habitos_toxicos', $save4);
          $insert_id = $this->db->insert_id();
        return  $insert_id;
  }

public function habitosToxicos($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_habitos_toxicos');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}

//---------------------------------------------------------
 function countAnte1($historial_id){

    $this->db->select('idmar')->from('h_c_marque_positivo');
	$this -> db -> where('historial_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}

 function countHabitosToxicos($historial_id){

    $this->db->select('id')->from('h_c_habitos_toxicos');
	$this -> db -> where('historial_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}

 function countAntOtros($historial_id){
$this->db->select('id_ao')->from('h_c_ante_otros');
$this -> db -> where('historial_id',$historial_id);
$q = $this->db->get();
return $q->num_rows();
}

 public function DeleteAntOtros($id){
$this->db->where('id_ao',$id);
$this->db->delete('h_c_ante_otros');
}



 public function DeleteEmptyHabitosToxicos($id){
$this->db->where('id',$id);
$this->db->delete('h_c_habitos_toxicos');
}


 function countSSR($historial_id){

    $this->db->select('idssr')->from('h_c_ant_ssr');
	$this -> db -> where('hist_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}


public function getSSR($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_ant_ssr');
  $this->db->where('hist_id',$historial_id);
  $this->db->order_by('idssr', 'DESC');
 $query = $this->db->get();
 return $query->result();
}

//------------------------------------------------------------
public function saveAntssr($save1) {
 $this->db->insert('h_c_ant_ssr', $save1);
 }

 public function DeleteEmptySSR($historial_id){
  $this->db->where('optradio', '');
   $this->db->where('edad', '');
    $this->db->where('sexual', '');
$this->db->where('califica', '');
$this->db->where('califica_text', '');
	$this->db->where('hist_id', $historial_id);
	 $this->db->delete('h_c_ant_ssr');
}
//------------------------------------------------------------


  public function DeleteDuplicateMarqueP($id){
 $this->db->where('idmar', $id);
$this->db->delete('h_c_marque_positivo');
}

  public function marquePositivo($save) {
$this->db->insert('h_c_marque_positivo', $save);
$insert_id = $this->db->insert_id();
return  $insert_id;
}

  public function DesantAl($save2) {
$this->db->insert('h_c_desarollo', $save2);
$insert_id = $this->db->insert_id();
return  $insert_id;
}

	function countDesarollo($historial_id){
   $this->db->select('id_desa')->from('h_c_desarollo');
	$this -> db -> where('historial_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}

 public function DeleteEmptyDesarollo($id){
$this->db->where('id_desa', $id);
$this->db->delete('h_c_desarollo');
}

//--------------------------------------------------------------
public function saveAnteOtros($save3) {
$this->db->insert('h_c_ante_otros', $save3);
$insert_id = $this->db->insert_id();
return  $insert_id;
}



//--------------------------------------------------------------

	 public function saveEnfermedad($saveEnf) {
        $this->db->insert('h_c_sinopsis', $saveEnf);
		$insert_id = $this->db->insert_id();
         return  $insert_id;

    }

	public function updateIndicacionesLab($updt,$id){
$this->db->where('historial_id ', $id);
$this->db->update('h_c_indications_labs', $updt);
}


	public function check_lab($checked,$id){
$this->db->where('id_lab', $id);
$this->db->update('h_c_indications_labs', $checked);
}



	public function check_recetas($checked,$id){
$this->db->where('id_i_m', $id);
$this->db->update('h_c_indicaciones_medicales', $checked);
}





	public function SaveUpEnfermedad($id_con,$s1){
$this->db->where('id_enf', $id_con);
$this->db->update('h_c_sinopsis', $s1);
}

	function count_ante_enf($historial_id){
   $this->db->select('id_enf')->from('h_c_sinopsis');
	$this -> db -> where('historial_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}


//------------------------------------------------------------------

	 public function saveExamenFisico($data) {
        $this->db->insert('h_c_examen_fisico', $data);
		$insert_id = $this->db->insert_id();
        return  $insert_id;

    }



	public function DeleteEmptyExamFis($id){
$this -> db -> where('id_sig', $id);
$this -> db -> delete('h_c_examen_fisico');
}





//------------------------------------------------------------------

	 public function saveUpExamenFisico($id,$save) {
		 $this->db->where('id_sig', $id);
        $this->db->update('h_c_examen_fisico', $save);

    }




public function ExamFisico($historial_id){
$this->db->select('*');
$this->db->from('h_c_examen_fisico');
$this->db->where('historial_id',$historial_id);
//$this->db->where('id_triaje',0);
$this->db->order_by('id_sig', 'DESC');
$query = $this->db->get();
return $query->result();
}


public function ExamFisById($id){
$this->db->select('*');
$this->db->from('h_c_examen_fisico');
$this->db->where('id_sig',$id);
$query = $this->db->get();
return $query->result();
}


//------------------------------------------------------------
	 public function saveExameneSistema($saveExamSis) {
        $this->db->insert('h_c_examen_sistema', $saveExamSis);

    }


public function DeleteEmptyExameneSistema($historial_id){
  $this -> db -> where('sisneuro', '');
   $this -> db -> where('neurologico', '');
    $this -> db -> where('siscardio', '');
	 $this -> db -> where('cardiova', '');
   $this -> db -> where('sist_uro', '');
    $this -> db -> where('urogenital', '');
	 $this -> db -> where('sis_mu_e', '');
   $this -> db -> where('musculoes', '');
    $this -> db -> where('sist_resp', '');
	  $this -> db -> where('nervioso', '');
   $this -> db -> where('linfatico', '');
    $this -> db -> where('digestivo', '');
	  $this -> db -> where('respiratorio', '');
   $this -> db -> where('genitourinario', '');
    $this -> db -> where('sist_diges', '');
	 $this -> db -> where('sist_endo', '');
   $this -> db -> where('endocrino', '');
    $this -> db -> where('sist_rela', '');
	 $this -> db -> where('otros_ex_sis', '');
    $this -> db -> where('dorsales', '');
	$this -> db -> where('historial_id', $historial_id);
 $this -> db -> delete('h_c_examen_sistema');
}

	public function saveUpExameneSistema($id_con,$s1){
$this->db->where('id_exs', $id_con);
$this->db->update('h_c_examen_sistema', $s1);
}





	function count_examenes_sis($historial_id){
   $this->db->select('id_exs')->from('h_c_examen_sistema');
	$this -> db -> where('historial_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}


		public function Examensis($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_examen_sistema');
  $this->db->where('historial_id',$historial_id);
  $this->db->order_by('id_exs', 'DESC');
 $query = $this->db->get();
 return $query->result();
}


	public function show_examsis_by_id($id_enf){
  $this->db->select('*');
  $this->db->from('h_c_examen_sistema');
  $this->db->where('id_exs',$id_enf);
 $query = $this->db->get();
 return $query->result();
}
//public function modifExamenesSis($historial_id,$saveExamSis){
//$this->db->where('historial_id', $historial_id);
//$this->db->update('examen_sistema', $saveExamSis);
//}



//-----------------------------------------------------------
	public function concluciones($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_conclusion_diagno');
 $this->db->where('historial_id',$historial_id);
$this->db->group_by('current_day');
  $this->db->order_by('id_cdia', 'desc');
 $query = $this->db->get();
 return $query->result();
}

public function saveConclucionDiag($saveConDia) {
	$this->db->insert('h_c_conclusion_diagno', $saveConDia);
	 $insert_id = $this->db->insert_id();
      return  $insert_id;
}

public function saveUpConclucionDiag($id_con,$s1){
$this->db->where('id_cdia', $id_con);
$this->db->update('h_c_conclusion_diagno', $s1);
}


//----------------------------------------------------------------
public function DeleteHistLab($id_lab){
  $this -> db -> where('id_lab', $id_lab);
  $this -> db -> delete('h_c_indications_labs');
}


public function DeleteHistLab2($val){
  $this -> db -> where('laboratory', $val['laboratory']);
  $this -> db -> where('user_id', $val['user_id']);
  $this -> db -> where('historial_id', $val['historial_id']);
  $this -> db -> where('printing2',1);
  $this -> db -> delete('h_c_indications_labs');
}




public function DeleteHistLabEmpty(){
  $this -> db -> where('laboratory',0);
  $this -> db -> delete('h_c_indications_labs');
}

//----------------------------------------------------------------
		public function DeleteRecetas($id_lab){
  $this -> db -> where('id_i_m', $id_lab);
  $this -> db -> delete('h_c_indicaciones_medicales');
}

//---------------------------------------------------------------
		public function delete_tutor($id){
  $this -> db -> where('id', $id);
  $this -> db -> delete('tutor');
}
//----------------------------------------------------------------
		public function DeleteEsudios($id_lab){
  $this -> db -> where('id_i_e', $id_lab);
  $this -> db -> delete('h_c_indicaciones_estudio');
}


public function show_enfermedad($id_enf)  {
  $this->db->select('*');
  $this->db->from('h_c_sinopsis');
  $this->db->where('id_enf',$id_enf);
   $query = $this->db->get();
  return $query->result();
}

public function print_enf_act($id)  {
  $this->db->select('*');
  $this->db->from('h_c_sinopsis');
  $this->db->where('historial_id',$id);
  $query = $this->db->get();
  return $query->result();
}



public function Diag_pres($val)  {
  $this->db->select('idd,description');
  $this->db->from('cied');
   $this->db->like('description',$val);
     $this->db->limit(10);
 $query = $this->db->get();
  return $query->result();
}



public function Diag_pro($val)  {
  $this->db->select('*');
  $this->db->from('type_diagnostic_procedures');
  $this->db->like('name',$val);
  $query = $this->db->get();
  return $query->result();
}





 public function saveProc($save) {
 $this->db->insert('type_diagnostic_procedures', $save);
 }


 public function SaveBillNum($data) {
      $this->db->insert('factura_num', $data);
	 $insert_id = $this->db->insert_id();
      return  $insert_id;
 }






public function deleteConPro($id_con){
$this -> db -> where('cond_id_link', $id_con);
$this -> db -> delete('h_c_diagno_def_proc');
}


	 public function SaveConPro($savecp) {
        $this->db->insert('h_c_diagno_def_proc', $savecp);

    }

public function show_con_by_id($id_con,$origine){
  $this->db->select('*');
  $this->db->from('h_c_conclusion_diagno');
  $this->db->where('id_cdia',$id_con);
  $this->db->where('origine',$origine);
 $query = $this->db->get();
 return $query->result();
}



public function print_cond($id){
  $this->db->select('*');
  $this->db->from('h_c_conclusion_diagno');
  $this->db->where('historial_id',$id);
 $query = $this->db->get();
 return $query->result();
}


public function show_diagno_def($id_con,$origine){
  $this->clinical_history->select('diagno_def');
  $this->clinical_history->from('h_c_diagno_def_link');
  $this->clinical_history->where('con_id_link',$id_con);
  $this->clinical_history->where('origine',$origine);
  $this->clinical_history->group_by('diagno_def');
 $query = $this->clinical_history->get();
 return $query->result();
}

public function show_diagno_pro1($id_con){
  $this->db->select('procedimiento');
  $this->db->from('h_c_diagno_def_proc');
  $this->db->where('cond_id_link',$id_con);
 $query = $this->db->get();
 return $query->result();
}

public function show_diagno_pro(){
  $this->db->select('*');
  $this->db->from('type_diagnostic_procedures');
 $query = $this->db->get();
 return $query->result();
}


public function Users(){
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('id_user !=',1);
   $this->db->order_by('is_log_in', 'desc');
 $query = $this->db->get();
 return $query->result();
}

public function DeactivarUser($id,$data){
$this->db->where('id_user', $id);
$this->db->update('users', $data);
}

public function DelAsistenteCentro($id){
  $this -> db -> where('iduser', $id);
  $this -> db -> delete('asistent_medico_centro');
}




public function print_estudio_patient_search($id)  {
  $this->db->select('*');
 $this->db->from('h_c_indicaciones_estudio');
 $this->db->where('encrypt_estudio',$id);
  $query = $this->db->get();
  return $query->result();
}



   public function getCitas(){
  $this->db->select("*");
  $this->db->from('rendez_vous');
 $this->db->where('confirmada',1);
  $this->db->order_by('id_apoint', 'desc');
  $query = $this->db->get();
  return $query->result();
 }

 public function VerSolicitud($id_sol){
  $this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->where('id_p_a',$id_sol);
  $query = $this->db->get();
  return $query->result();
 }

public function deleteSeguroFieldInPatient($idp){
$this -> db -> where('seguro_id', $idp);
$this -> db -> delete('saveinput');
}


public function deleteInput($idp){
$this -> db -> where('patient_id', $idp);
$this -> db -> delete('saveinput');
}


 public function selectOne(){
$this->db->select("name");
  $this->db->from('violencia_intraf_one');
   $query = $this->db->get();
  return $query->result();
}

 public function selectTwo(){
$this->db->select("name");
  $this->db->from('violencia_intraf_two');
   $query = $this->db->get();
  return $query->result();
}


 public function GinecOb(){
$this->db->select("name");
  $this->db->from('gineco_obstetricos');
   $query = $this->db->get();
  return $query->result();
}




 public function Cuello(){
$this->db->select("name");
  $this->db->from('cuello');
   $query = $this->db->get();
  return $query->result();
}


 public function saveAntePenatalMedicamento($save) {
        $this->db->insert('ante_prenatal_medicamento', $save);

    }


	 public function saveRehabilidad($save) {
        $this->db->insert('h_c_rehabilitacion', $save);

    }


	 public function DeleteEmptyRehab($historial_id){
$this->db->where('marcha_inicio', '');
$this->db->where('long_mov_der', '');
$this->db->where('long_mov_izq', '');
$this->db->where('long_simetria', '');
$this->db->where('long_fluidez', '');
$this->db->where('long_traject', '');
$this->db->where('long_tronco', '');
$this->db->where('long_postura', '');
$this->db->where('equi_sentado', '');
$this->db->where('equi_levantarse', '');
$this->db->where('equi_intentos', '');
$this->db->where('equi_biped1', '');
$this->db->where('equi_biped2', '');
$this->db->where('equi_emp', '');
$this->db->where('equi_ojos', '');
$this->db->where('equi_vuelta', '');
$this->db->where('equi_sentarse', '');
$this->db->where('eval_balsys', '');
$this->db->where('eval_movim', '');
$this->db->where('eval_monop', '');
$this->db->where('criteria_intens', '');
$this->db->where('criteria_cuidado1', '');
$this->db->where('levantar_peso', '');
$this->db->where('criteria_caminar', '');
$this->db->where('criteria_estar_sent', '');
$this->db->where('criteria_dormir', '');
$this->db->where('criteria_sexual', '');
$this->db->where('criteria_vida', '');
$this->db->where('id_historial', $historial_id);
$this->db->delete('h_c_rehabilitacion');
}



	function IfReabFound($historial_id){
   $this->db->select('id_rehab')->from('h_c_rehabilitacion');
	$this -> db -> where('id_historial',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}



	 public function showRehabilidad($historial_id){
$this->db->select("*");
  $this->db->from('h_c_rehabilitacion');
  $this->db->where('id_historial',$historial_id);
  $query = $this->db->get();
  return $query->result();
}

 public function saveOftalmologia($save) {
        $this->db->insert('h_c_oftalmologia', $save);

    }


		 public function showOftalmologia($historial_id){
$this->db->select("*");
  $this->db->from('h_c_oftalmologia');
  $this->db->where('id_historial',$historial_id);
  $query = $this->db->get();
  return $query->result();
}



function IfOftalFound($historial_id){
   $this->db->select('id_oftal')->from('h_c_oftalmologia');
	$this -> db -> where('id_historial',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}



public function Rehab($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_rehabilitacion');
  $this->db->where('id_historial',$historial_id);
  $this->db->order_by('id_rehab', 'DESC');
 $query = $this->db->get();
 return $query->result();
}

public function Oftal($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_oftalmologia');
  $this->db->where('id_historial',$historial_id);
  $this->db->order_by('id_oftal', 'DESC');
 $query = $this->db->get();
 return $query->result();
}
function countRehab($historial_id){
   $this->db->select('id_rehab')->from('h_c_rehabilitacion');
	$this -> db -> where('id_historial',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}



public function showRehabById($id){
  $this->db->select('*');
  $this->db->from('h_c_rehabilitacion');
  $this->db->where('id_rehab',$id);
 $query = $this->db->get();
 return $query->result();
}


public function showOftalById($id){
  $this->db->select('*');
  $this->db->from('h_c_oftalmologia');
  $this->db->where('id_oftal',$id);
 $query = $this->db->get();
 return $query->result();
}



public function SaveUpOftala($id,$data){
	$this->db->where('id_oftal', $id);
$this->db->update('h_c_oftalmologia', $data);
}


public function SaveUpConPrenatales1($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal1', $data);
}


public function SaveUpConPrenatales2($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal2', $data);
}


public function SaveUpConPrenatales3($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal3', $data);
}


public function SaveUpConPrenatales4($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal4', $data);
}


public function SaveUpConPrenatales5($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal5', $data);
}


public function SaveUpConPrenatales6($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal6', $data);
}


public function SaveUpConPrenatales7($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal7', $data);
}





public function SaveUpConPrenatales8($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal8', $data);
}


public function SaveUpConPrenatales9($id,$data){
	$this->db->where('id_c1', $id);
$this->db->update('h_c_control_prenatal9', $data);
}




 public function SaveConPrenatales2($save2) {
        $this->db->insert('h_c_control_prenatal2', $save2);
 }
 public function SaveConPrenatales($save) {
        $this->db->insert('h_c_control_prenatal1', $save);
 }
  public function SaveConPrenatales3($save3) {
        $this->db->insert('h_c_control_prenatal3', $save3);
 }

  public function SaveConPrenatales4($save4) {
        $this->db->insert('h_c_control_prenatal4', $save4);
 }

   public function SaveConPrenatales5($save5) {
        $this->db->insert('h_c_control_prenatal5', $save5);
 }


    public function SaveConPrenatales6($save6) {
        $this->db->insert('h_c_control_prenatal6', $save6);
 }

    public function SaveConPrenatales7($save7) {
        $this->db->insert('h_c_control_prenatal7', $save7);
 }
     public function SaveConPrenatales8($save8) {
        $this->db->insert('h_c_control_prenatal8', $save8);
 }

    public function SaveConPrenatales9($save9) {
        $this->db->insert('h_c_control_prenatal9', $save9);
 }

 function CountControPrenal($historial_id){

    $this->db->select('historial_id')->from('h_c_control_prenatal1')->where('historial_id', $historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}

function ControPrenal($historial_id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal1');
$this->db->where('historial_id',$historial_id);
$this->db->order_by('id_c1', 'asc');
$query = $this->db->get();
 return $query->result();
   }


   function showSelectContP1($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal1');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }

    function showSelectContP2($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal2');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }

    function showSelectContP3($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal3');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }

    function showSelectContP4($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal4');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }



    function showSelectContP5($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal5');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }


    function showSelectContP6($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal6');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }


    function showSelectContP7($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal7');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }

    function showSelectContP8($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal8');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }

    function showSelectContP9($id)
    {
	$this->db->select('*');
$this->db->from('h_c_control_prenatal9');
$this->db->where('id_c1',$id);
$query = $this->db->get();
 return $query->result();
   }


     public function DeleteEmptyControlPrenatal1(){
  $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  //$this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal1');
  }


  public function DeleteEmptyControlPrenatal2(){
  $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  $this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal2');
  }

  public function DeleteEmptyControlPrenatal3(){
  $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  $this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal3');
  }

    public function DeleteEmptyControlPrenatal4(){
   $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  $this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal4');
  }

    public function DeleteEmptyControlPrenatal5(){
  $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  $this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal5');
  }

    public function DeleteEmptyControlPrenatal6(){
  $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  $this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal6');
  }

    public function DeleteEmptyControlPrenatal7(){
  $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  $this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal7');
  }

    public function DeleteEmptyControlPrenatal8(){
  $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  $this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal8');
  }

    public function DeleteEmptyControlPrenatal9(){
  $this -> db -> where('fecha', '');
  $this -> db -> where('semana', '');
  $this -> db -> where('peso', '');
  $this -> db -> where('tension', '');
  $this -> db -> where('alt', '');
  $this -> db -> where('fetal', '');
  $this -> db -> where('edema', '');
  $this -> db -> where('otros', '');
  $this -> db -> where('evolucion', '');
  $this -> db -> where('tension11', '');
  $this -> db -> where('alt11', '');
  $this -> db -> where('alt111', '');
  $this -> db -> where('fetal11', '');
  $this -> db -> where('edema11', '');
  $this -> db -> delete('h_c_control_prenatal9');
  }

  public function getPatientInfo($patient_cedula){
$this->db->select("*");
  $this->db->from('patients_appointments');
$this->db->where('cedula',$patient_cedula);
  $query = $this->db->get();
  return $query->result();
}

public function getPatientCedulaAd($patient_cedula)  {
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->where('cedula',$patient_cedula);
  $query = $this->db->get();
  $data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}


public function getPatientId($patient_id){
$this->db->select("*");
  $this->db->from('rendez_vous');
$this->db->where('id_patient',$patient_id);
  $query = $this->db->get();
  return $query->result();
}



public function getMuncipio($id_mun)
	{
$this->db->select('*');
$this->db->from('townships');
$this->db->where('province_id_town',$id_mun);
$this->db->order_by('id_town', 'desc');
$query = $this->db->get();
 return $query->result();
}

public function FindCita($id){
$this->db->select("*");
  $this->db->from('rendez_vous');
 $this->db->where('id_apoint',$id);
  $query = $this->db->get();
  return $query->result();
}

public function saveUpdateCita($id,$data){
	$this->db->where('id_apoint', $id);
$this->db->update('rendez_vous', $data);
}



public function saveUpRehabilidad($id,$data){
	$this->db->where('id_rehab', $id);
$this->db->update('h_c_rehabilitacion', $data);
}









public function sistemaMusculo()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location',4);
  $query = $this->db->get();
  return $query->result();
}
public function sistemaDigest()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 19);
  $query = $this->db->get();
  return $query->result();
}
public function examenExtinf()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 18);
  $query = $this->db->get();
  return $query->result();
}
public function examenGenitalf()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 16);
  $query = $this->db->get();
  return $query->result();
}
public function droga()
{
	$this->db->select("id,name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 25);
  $query = $this->db->get();
  return $query->result();
}
public function examenInspeccion_vulvar()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 24);
  $query = $this->db->get();
  return $query->result();
}

public function examenRectal()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 14);
  $query = $this->db->get();
  return $query->result();
}
public function examenVagina()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 17);
  $query = $this->db->get();
  return $query->result();
}


public function examenGenitalm()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 15);
  $query = $this->db->get();
  return $query->result();
}
public function examenAxilar()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 12);
  $query = $this->db->get();
  return $query->result();
}
public function examenMama()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 11);
  $query = $this->db->get();
  return $query->result();
}
public function examenTorax()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 23);
  $query = $this->db->get();
  return $query->result();
}
public function examenCuello()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 9);
  $query = $this->db->get();
  return $query->result();
}

public function sistemaUrogenial()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 3);
  $query = $this->db->get();
  return $query->result();
}

public function dermaTipo()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 30);
  $query = $this->db->get();
  return $query->result();
}


public function dermaMorfo()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 31);
  $query = $this->db->get();
  return $query->result();
}


public function dermaIntero()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 32);
  $query = $this->db->get();
  return $query->result();
}




public function sistemaNeuro()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 1);
  $query = $this->db->get();
  return $query->result();
}

public function sistemaCardiov()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 2);
  $query = $this->db->get();
  return $query->result();
}

public function sistemaResp()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 7);
  $query = $this->db->get();
  return $query->result();
}
public function sistemaEndo()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 21);
  $query = $this->db->get();
  return $query->result();
}

public function sistemaRelat()
{
	$this->db->select("name");
  $this->db->from('historial_dropdown');
  $this->db->where('location', 22);
  $query = $this->db->get();
  return $query->result();
}

public function PatientMed($historial_id)
{
	$this->db->select("medicine");
  $this->db->from('h_c_patient_medicine');
  $this->db->where('id_patient',$historial_id);
  $this->db->order_by('medicine', 'desc');
  $query = $this->db->get();
  return $query->result();
}

public function Dermatologo($historial_id)
{
	$this->db->select("*");
  $this->db->from('h_c_dermatologo');
  $this->db->where('historial_id',$historial_id);
  $this->db->order_by('id_derma', 'asc');
  $query = $this->db->get();
  return $query->result();
}


public function Ant_alergia($historial_id)
{
	$this->db->select("*");
  $this->db->from('h_c_ant_alergista');
  $this->db->where('historial_id',$historial_id);
  $this->db->order_by('id', 'asc');
  $query = $this->db->get();
  return $query->result();
}



public function show_derma_by_id($id)
{
	$this->db->select("*");
  $this->db->from('h_c_dermatologo');
  $this->db->where('id_derma',$id);
  $query = $this->db->get();
  return $query->result();
}

public function showAlegicos($historial_id)
{
	$this->db->select("alimentos,medicamentos,otros");
  $this->db->from('h_c_desarollo');
  $this->db->where('historial_id',$historial_id);
  $this->db->order_by('id_desa', 'asc');
  $query = $this->db->get();
  return $query->result();
}


public function SaveMedicine($data) {
// Inserting into your table
$this->db->insert('h_c_patient_medicine', $data);
}

public function DeleteEmptyMedPed($val){
$this -> db -> where('medicine',$val['medicine']);
$this -> db -> where('id_patient',$val['id_patient']);
$this -> db -> where('part',$val['part']);
$this -> db -> where('user_id',$val['user_id']);
$this -> db -> delete('h_c_patient_medicine_clown');

}



public function DeleteEmptyMedPedTrueTable($val){
$this -> db -> where('medicine',$val['medicine']);
$this -> db -> where('id_patient',$val['id_patient']);
$this -> db -> where('part',$val['part']);
$this -> db -> where('user_id',$val['user_id']);
$this -> db -> delete('h_c_patient_medicine');

}







public function saveDermatologia($data) {
// Inserting into your table
$this->db->insert('h_c_dermatologo', $data);
}



public function SaveDrug($data) {
// Inserting into your table
$this->db->insert('h_c_droga', $data);
}
public function saveName($data) {
// Inserting into your table
$this->db->insert('historial_dropdown', $data);
}

public function Drugstores(){
  $this->db->select('*');
  $this->db->from('drug_stores');
  $this->db->order_by('id', 'desc');
 $query = $this->db->get();
 return $query->result();
}

public function DrugstoreUser($perfil){
  $this->db->select('name,id_user');
  $this->db->from('users');
  $this->db->where('perfil', $perfil);
 $query = $this->db->get();
 return $query->result();
}

public function DrugstoresUserL($id){
  $this->db->select('*');
  $this->db->from('user_farmacia');
  $this->db->where('id_user',$id);
 $query = $this->db->get();
 return $query->result();
}








public function Drugstore($id){
  $this->db->select('*');
  $this->db->from('drug_stores');
 $this->db->where('id',$id);
 $query = $this->db->get();
 return $query->result();
}

public function saveFarmacia($save) {
// Inserting into your table
$this->db->insert('drug_stores', $save);
}


     function branches1($id_esp)
    {
	$this->db->select('id, drug_store_id, branch_name');
$this->db->from('drug_store_branches');
 $this->db->where('drug_store_id',$id_esp);
$query = $this->db->get();
 return $query->result();
   }

	public function drugStoreMedica($id){
  $this->db->select('*');
  $this->db->from('h_c_indicaciones_medicales');
  $this->db->where('farmacia',$id);
  $this->db->order_by('historial_id', 'asc');
 $query = $this->db->get();
 return $query->result();
}


public function farmaPatient($id){
$this->db->select("distinct(historial_id),id_p_a,nombre,causa,centro,area,doctor,fecha_propuesta,nec,farmacia");
  $this->db->from('h_c_indicaciones_medicales');
 $this->db->join('patients_appointments', 'h_c_indicaciones_medicales.historial_id= patients_appointments.id_p_a');
  $this->db->join('rendez_vous', 'h_c_indicaciones_medicales.historial_id= rendez_vous.id_patient');
 $this->db->where('farmacia',$id);
  $query = $this->db->get();
  return $query->result();
}

public function patMedica($id){
  $this->db->select('*');
  $this->db->from('h_c_indicaciones_medicales');
  $this->db->where('historial_id',$id);
  $this->db->order_by('id_i_m', 'asc');
 $query = $this->db->get();
 return $query->result();
}


public function updateHabitosToxicos($id_patient,$save){
$this->db->where('historial_id', $id_patient);
$this->db->update('h_c_habitos_toxicos', $save);
}


 public function SaveUpDermatologia($id,$save){
$this->db->where('id_derma', $id);
$this->db->update('h_c_dermatologo', $save);
}





public function saveFarmaciaUp($id,$save){
$this->db->where('id', $id);
$this->db->update('drug_stores', $save);
}








public function updateDesarollo($id_patient,$save){
$this->db->where('historial_id', $id_patient);
$this->db->update('h_c_desarollo', $save);
}



public function deleteMedNinguno(){
  $this -> db -> where('medicine', 'ninguno');
  $this -> db -> delete('h_c_patient_medicine');
}

public function deleteDrug($id_patient){
  $this -> db -> where('id_patient', $id_patient);
  $this -> db -> delete('h_c_droga');
}


public function updateAntAl($id_patient,$save){
$this->db->where('historial_id', $id_patient);
$this->db->update('h_c_desarollo', $save);
}



public function updateAnteOtros($id_patient,$save){
$this->db->where('historial_id', $id_patient);
$this->db->update('h_c_ante_otros', $save);
}


public function updateViolencia($id_patient,$save){
$this->db->where('historial_id', $id_patient);
$this->db->update('h_c_ante_otros', $save);
}

public function UpdateMarquePositivo($id_patient,$save){
$this->db->where('historial_id', $id_patient);
$this->db->update('h_c_marque_positivo', $save);
}

function count_ssr($historial_id){
   $this->db->select('idssr')->from('h_c_ant_ssr');
	$this -> db -> where('hist_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}


public function data_ssr_by_id($id){
  $this->db->select('*');
  $this->db->from('h_c_ant_ssr');
  $this->db->where('idssr',$id);
 $query = $this->db->get();
 return $query->result();
}


public function saveEditAntssr($idssr,$save2){
$this->db->where('idssr', $idssr);
$this->db->update('h_c_ant_ssr', $save2);
}

//-------------------------------------------------------------------------------------------
public function saveObstetrico1($save) {
// Inserting into your table
$this->db->insert('h_c_ante_obs1', $save);
}

 public function DeleteEmptyObs1($historial_id){
  $this->db->where('dia1', '');
   $this->db->where('tbc1', '');
    $this->db->where('hip1', '');
$this->db->where('pelv', '');
$this->db->where('infert', '');
$this->db->where('otros1', '');

  $this->db->where('dia2', '');
   $this->db->where('tbc2', '');
    $this->db->where('hip2', '');
$this->db->where('gem', '');
$this->db->where('otros2', '');
$this->db->where('hist_id', $historial_id);
	 $this->db->delete('h_c_ante_obs1');
}

public function upObstetrico1($up,$idobs){
$this->db->where('idobs', $idobs);
$this->db->update('h_c_ante_obs1', $up);
}

public function saveObstetrico2($save1) {
// Inserting into your table
$this->db->insert('h_c_ant_obs2', $save1);
}

public function upObstetrico2($up1,$idobs){
$this->db->where('idobs2', $idobs);
$this->db->update('h_c_ant_obs2', $up1);
}


public function saveObstetrico3($save2) {
// Inserting into your table
$this->db->insert('h_c_ant_obs3', $save2);
}



public function upObstetrico3($up2,$idobs){
$this->db->where('id_obs3', $idobs);
$this->db->update('h_c_ant_obs3', $up2);
}

public function saveObstetrico4($save3) {
// Inserting into your table
$this->db->insert('h_c_ant_puerperio', $save3);
}


public function upObstetrico4($up3,$idobs){
$this->db->where('idpuerp', $idobs);
$this->db->update('h_c_ant_puerperio', $up3);
}

//-------------------------------------------------------------------------------------------------






function countObs($historial_id){
   $this->db->select('idobs')->from('h_c_ante_obs1');
	$this -> db -> where('hist_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}


	public function getObs($id){
  $this->db->select('*');
  $this->db->from('h_c_ante_obs1');
  $this->db->where('idobs',$id);
  $query = $this->db->get();
 return $query->result();
}


public function getObs2($id){
  $this->db->select('*');
  $this->db->from('h_c_ant_obs2');
  $this->db->where('idobs2',$id);
  $query = $this->db->get();
 return $query->result();
}

public function getObs3($id){
  $this->db->select('*');
  $this->db->from('h_c_ant_obs3');
  $this->db->where('id_obs3',$id);
  $query = $this->db->get();
 return $query->result();
}

public function getObs4($id){
  $this->db->select('*');
  $this->db->from('h_c_ant_puerperio');
  $this->db->where('idpuerp',$id);
  $query = $this->db->get();
 return $query->result();
}

public function sObs($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_ante_obs1');
  $this->db->where('hist_id',$historial_id);
    $this->db->order_by('idobs', 'DESC');
  $query = $this->db->get();
 return $query->result();
}

public function sObs2($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_ant_obs2');
  $this->db->where('hist_id',$historial_id);
  $query = $this->db->get();
 return $query->result();
}

public function sObs3($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_ant_obs3');
  $this->db->where('hist_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}

public function sObs4($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_ant_puerperio');
  $this->db->where('hist_id',$historial_id);
$query = $this->db->get();
 return $query->result();
}


public function savePedia($save) {
$this->db->insert('h_c_ant_pedia', $save);
 }

  public function DeleteEmptyPedia($historial_id){
  $this->db->where('edad_gest', '');
$this->db->where('hist_id', $historial_id);
	 $this->db->delete('h_c_ant_pedia');
}



 function countant_pedia($historial_id){
 $this->db->select('id')->from('h_c_ant_pedia');
	$this -> db -> where('hist_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}

public function saveVacuna($save2) {
$this->db->insert('h_c_vacunacion', $save2);
 }

public function SaveMedPed($save) {
$this->db->insert('h_c_pedia_med', $save);
 }

 public function Getpedia($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_ant_pedia');
  $this->db->where('hist_id',$historial_id);
  $this->db->order_by('id', 'asc');
 $query = $this->db->get();
 return $query->result();
}


public function Getvacuna($historial_id){
  $this->db->select('*');
  $this->db->from('h_c_vacunacion');
  $this->db->where('hist_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}


 public function getVacunaData($id){
  $this->db->select('*');
  $this->db->from('h_c_vacunacion');
  $this->db->join('patients_appointments', 'h_c_vacunacion.hist_id= patients_appointments.id_p_a');
 $this->db->where('hist_id',$id);
 $query = $this->db->get();
 return $query->result();
}


 public function getPediaId($id){
  $this->db->select('*');
  $this->db->from('h_c_ant_pedia');
  $this->db->where('id',$id);
 $query = $this->db->get();
 return $query->result();
}

public function deleteAllMedPed($id){
  $this -> db -> where('id_pedia', $id);
  $this -> db -> delete('h_c_pedia_med');
}


public function saveUpdatePedia($id,$save3){
$this->db->where('id', $id);
$this->db->update('h_c_ant_pedia', $save3);
}

public function saveUpdateVacuna($id,$save4){
$this->db->where('idvac', $id);
$this->db->update('h_c_vacunacion', $save4);
}

 function countAntPedia2($historial_id){
    $this->db->select('id')->from('h_c_ant_pedia');
	$this -> db -> where('hist_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}


 function countPatMed($historial_id){

    $this->db->select('id')->from('h_c_patient_medicine');
	$this -> db -> where('id_patient',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}



function search_patient_tutor($search){

$query = $this
->db
->select('id_p_a,nombre,cedula,ced1,ced2,ced3,photo')
->from('patients_appointments')
->where('nec1',$search)
//->or_like('description',$search)
->get();

if($query->num_rows()>0)
{
return $query->result();
}
else
{
return null;
}

}

public function check_if_tutor_exist($del){
$this->db->select("id");
  $this->db->from('tutor');
$this -> db -> where('id_tutor',$del['id_tutor']);
$this -> db -> where('id_nino',$del['id_nino']);
  $query = $this->db->get();
   return $query->num_rows();
}

public function delete_duplicate_tutor($dup){
	$this -> db -> where('id_tutor',$dup['id_tutor']);
$this -> db -> where('id_nino',$dup['id_nino']);
$this -> db -> where('relacion',$dup['relacion']);
$this -> db -> delete('tutor');
}



public function savePreTutor($data) {
$this->db->insert('tutor', $data);
}




public function getPreTutor($historial_id){
$this->db->select("relacion,id_tutor,name_tutor,id_nino,id");
  $this->db->from('tutor');
 $this->db->where('id_nino',$historial_id);
  $this->db->order_by('id','desc');
  $query = $this->db->get();
  return $query->result();
}








public function saveTutor($data) {
$this->db->insert('tutor', $data);
}

public function getTutor($historial_id){
$this->db->select("relacion,id_tutor,name_tutor,id_nino,id");
  $this->db->from('tutor');
 $this->db->where('id_nino',$historial_id);
  $this->db->order_by('id','desc');
  $query = $this->db->get();
  return $query->result();
}
function CountTutor($historial_id){
$this->db->select("relacion,id_tutor,name_tutor");
  $this->db->from('tutor');
  $this->db->where('id_nino',$historial_id);
  $q = $this->db->get();
    return $q->num_rows();
}

function NecPatient($nec){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->where('nec1',$nec);
 $query = $this->db->get();
  return $query->result();
}




function NecPatientSearch($nec){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->where('id_p_a',$nec);
 $query = $this->db->get();
  return $query->result();
}







function findPatientByNombre($val1,$val2,$val3){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->like('nombre',$val1);
$this->db->like('nombre',$val2);
if($val3 !=""){
$this->db->like('nombre',$val3);
}
 $this->db->order_by('nombre','ASC');
 $query = $this->db->get();
  return $query->result();
}



function NombresPatientFac($search){

$query = $this
->db
->select('id_p_a,nombre,cedula,photo,afiliado,tel_cel,tel_resi,calle,barrio,email,ced1,ced2,ced3,centro,doctor')
->from('rendez_vous')
->join('patients_appointments', 'rendez_vous.id_patient= patients_appointments.id_p_a')
->where('id_p_a',$search)
->get();

if($query->num_rows()>0)
{
return $query->result();
}
else
{
return null;
}

}





function CedulaPatientFac($search){

$query = $this
->db
->select('id_p_a,nombre,cedula,photo,afiliado,tel_cel,tel_resi,calle,barrio,email,ced1,ced2,ced3')
->from('patients_appointments')
->where('cedula',$search)
->get();

if($query->num_rows()>0)
{
return $query->result();
}
else
{
return null;
}

}





function NecPatientFac($search){

$query = $this
->db
->select('id_p_a,nombre,cedula,photo,afiliado,tel_cel,tel_resi,calle,barrio,email,ced1,ced2,ced3')
->from('patients_appointments')
->where('nec1',$search)
->get();

if($query->num_rows()>0)
{
return $query->result();
}
else
{
return null;
}

}




public function tarif_cat(){
$this->db->select("*");
  $this->db->from('categoria_tarifario');
 $query = $this->db->get();
  return $query->result();
}
public function SaveBill2($save2) {
$this->db->insert('factura2', $save2);
	$insert_id = $this->db->insert_id();
    return  $insert_id;
}
public function SaveBill($save) {
$this->db->insert('factura', $save);
}
public function DeleteEmptyBill(){
$this -> db -> where('service', '');
$this -> db -> delete('factura');
}

public function DeleteMedP($v){
$this -> db -> where('medica', $v);
$this -> db -> delete('h_c_pedia_med');
}

public function showBilling1($id){
$this->db->select("*");
  $this->db->from('factura2');
$this->db->where('idfacc',$id);
$query = $this->db->get();
return $query->result();
}

public function updateBillTable($id){
$this->db->select("*");
  $this->db->from('factura');
$this->db->where('idfac',$id);
$query = $this->db->get();
return $query->result();
}






public function showBilling2($id){
$this->db->select("*");
  $this->db->from('factura');
  $this->db->where('id2',$id);
 $query = $this->db->get();
  return $query->result();
}



public function saveMss1($save) {
$this->db->insert('mssn1', $save);
}
public function Serviciomssm($doc_seg){
$this->db->select("id_tarif,procedimiento");
  $this->db->from('tarifarios_temporal');
  $this->db->where('id_doctor', $doc_seg['id_doctor']);
    $this->db->where('id_seguro', $doc_seg['id_seguro']);
	$this->db->where('plan', $doc_seg['plan']);
$this->db->group_by('procedimiento');
  //$this->db->order_by('insumservicio','desc');
 $query = $this->db->get();
  return $query->result();
}




 function count_medico_seguro_publico_tariff($doc_seg){

    $this->db->select('id_tarif')->from('tarifarios_temporal');
  $this->db->where('id_doctor', $doc_seg['id_doctor']);
    $this->db->where('id_seguro', $doc_seg['id_seguro']);
	$this->db->where('plan', $doc_seg['plan']);
$this->db->group_by('procedimiento');
    $q = $this->db->get();
    return $q->num_rows();
}









 function count_medico_seguro_privado_tariff($doc_seg){

    $this->db->select('id_tarif')->from('tarifarios_temporal');
  $this->db->where('id_doctor', $doc_seg['id_doctor']);
    $this->db->where('id_seguro', $doc_seg['id_seguro']);
	 $this->db->where('plan', $doc_seg['id_cm']);
$this->db->group_by('procedimiento');
    $q = $this->db->get();
    return $q->num_rows();
}




public function ServiciomssmPrivado($doc_seg){
$this->db->select("id_tarif, procedimiento, monto, id_seguro, plan, id_doctor, id_centro");
  $this->db->from('tarifarios_temporal');
  $this->db->where('id_doctor', $doc_seg['id_doctor']);
    $this->db->where('id_seguro', $doc_seg['id_seguro']);
	 $this->db->where('plan', $doc_seg['id_cm']);
$this->db->group_by('procedimiento');
  //$this->db->order_by('insumservicio','desc');
 $query = $this->db->get();
  return $query->result();
}




 function count_centro_tariff($id1,$id2){

    $this->db->select('id_c_taf')->from('centros_tarifarios_test');
	  $this->db->where('centro_id', $id1);
    $this->db->where('seguro_id', $id2);
    $this->db->group_by('sub_groupo');
    $q = $this->db->get();
    return $q->num_rows();
}





public function Service_centro($id_cm,$seg){
$this->db->select("id_tarif,procedimiento");
  $this->db->from('tarifarios_temporal');
  $this->db->where('id_centro', $id_cm);
    $this->db->where('id_seguro', $seg);
$this->db->group_by('procedimiento');
  $query = $this->db->get();
  return $query->result();
}




public function DeletePreTutor($id){
  $this->db->where('id_nino',$id);
  $this->db->delete('pre_tutor');
}

public function delete_factura2($id){
  $this->db->where('idfacc',$id);
  $this->db->delete('factura2');
}
/*
public function getCatName($cat){
$this->db->select("id,doctorid,insumservicio");
  $this->db->from('mssn1');
  $this->db->where('categoria',$cat);
    $this->db->group_by('insumservicio');
 $query = $this->db->get();
  return $query->result();
}
*/
public function getCatName($cat){
$this->db->select("id_tarif,procedimiento,id_categoria");
  $this->db->from('tarifarios_test');
  $this->db->where('id_categoria',$cat);
 $query = $this->db->get();
  return $query->result();
}
public function ViewFact2($id){
$this->db->select("*");
  $this->db->from('factura2');
 $this->db->where('idfacc',$id);
 $this->db->where('canceled',0);
  $query = $this->db->get();
  return $query->result();
}

public function EditProcedTarif($get){
$this->db->select("id_tarif,procedimiento");
  $this->db->from('tarifarios_test');
 	$this->db->where('id_seguro',$get['id_seguro']);
	$this->db->where('id_doctor',$get['id_doctor']);
  $query = $this->db->get();
  return $query->result();
}
public function ViewFact($id){
$this->db->select("*");
  $this->db->from('factura');
 $this->db->where('id2',$id);
 $this->db->where('canceled',0);
 $this->db->order_by('idfac','desc');
  $query = $this->db->get();
  return $query->result();
}

public function Billings(){
$this->db->select("*");
  $this->db->from('factura');
  $this->db->join('factura2', 'factura2.idfacc = factura.id2');
  $this->db->where('factura2.block',0);
 $this->db->order_by('idfac','desc');
  $query = $this->db->get();
  return $query->result();
}


public function BillingsDoc($id){
$this->db->select("*");
  $this->db->from('factura');
  $this->db->join('factura2', 'factura2.idfacc = factura.id2');
  $this->db->where('medico',$id);
  $this->db->where('factura2.block',0);
  $this->db->order_by('idfacc','desc');
  $query = $this->db->get();
  return $query->result();
}


public function display_all_medical_centers_docs($id,$perfil){
$this->db->select("*");
  $this->db->from('medical_centers');
  if($perfil=="Medico"){
  $this->db->join('doctor_agenda_test', 'doctor_agenda_test.id_centro = medical_centers.id_m_c');
  } else {
	$this->db->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c');
  }
  $this->db->where('id_doctor',$id);
  $this->db->where('activate',0);
    if($perfil=="Medico"){
  $this->db->group_by('id_centro');
  } else {
$this->db->group_by('centro_medico');
  }
  $this->db->order_by('id_m_c','desc');
  $query = $this->db->get();
  return $query->result();
}


public function display_all_medical_insurances_docs($id){
$this->db->select("*");
  $this->db->from('seguro_medico');
  $this->db->join('doctor_seguro', 'doctor_seguro.seguro_medico = seguro_medico.id_sm');
  $this->db->where('id_doctor',$id);
  $this->db->where('activate',0);
  $this->db->order_by('id_sm','desc');
  $query = $this->db->get();
  return $query->result();
}




public function UpdateBill1($id,$save){
$this->db->where('idfac', $id);
$this->db->update('factura', $save);
}






public function UpdateBill2($id,$save2){
$this->db->where('idfacc', $id);
$this->db->update('factura2', $save2);
}



public function insert_nec($id,$data){
$this->db->where('id_p_a', $id);
$this->db->update('patients_appointments', $data);
}



  public function delete_empty_oftal(){
  $this->db->where('od_sin_con','');
  $this->db->delete('h_c_oftalmologia');
}

  public function delete_empty_derma(){
  $this->db->where('derma_tipo','');
  $this->db->delete('h_c_dermatologo');
}



  public function delete_factura($id){
  $this -> db -> where('id2', $id);
  $this -> db -> delete('factura');
}

  public function block_factura1($id,$data){
  $this -> db -> where('id2', $id);
  $this -> db -> update('factura',$data);
}

function CountFactura2Blocked(){

    $this->db->select('block')->from('factura2')->where('block', 1);
    $q = $this->db->get();
    return $q->num_rows();
}

function CountFactura2UnBlocked(){

    $this->db->select('block')->from('factura2')->where('block', 0);
    $q = $this->db->get();
    return $q->num_rows();
}



function CountFactura2BlockedDoc($id){

    $this->db->select('block')->from('factura2')->where('block', 1)->where('medico', $id);
    $q = $this->db->get();
    return $q->num_rows();
}

function CountFactura2UnBlockedDoc($id){

    $this->db->select('block')->from('factura2')->where('block', 0)->where('medico', $id);
    $q = $this->db->get();
    return $q->num_rows();
}







public function block_factura2($id,$data){
  $this->db->where('idfacc',$id);
  $this->db->update('factura2',$data);
}


public function Ars()  {
  $this->db->select('seguro_medico');
  $this->db->from('factura2');
  $this->db->group_by('seguro_medico');
  $query = $this->db->get();
  return $query->result();
}

public function ArsDoc($id,$perfil)  {
  $this->db->select('seguro_medico');
  $this->db->from('factura2');
   if($perfil=="Asistente Medico"){
$this->db->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->db->where('id_doctor',$id);
 } else {
   $this->db->where('medico',$id);
 }
  $this->db->group_by('seguro_medico');
  $query = $this->db->get();
  return $query->result();
}




public function invoicePaciente()  {
  $this->db->select('paciente');
  $this->db->from('factura2');
  $this->db->group_by('paciente');
  $query = $this->db->get();
  return $query->result();
}


public function invoicePacienteDoc($id,$perfil)  {
  $this->db->select('paciente');
  $this->db->from('factura2');
     if($perfil=="Asistente Medico"){
$this->db->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->db->where('id_doctor',$id);
 } else {
  $this->db->where('medico',$id);
 }
  $this->db->group_by('paciente');
  $query = $this->db->get();
  return $query->result();
}



public function date_range1()  {
  $this->db->select('filter_date as filter');
  $this->db->from('factura2');
 $this->db->where("seguro_medico !=",11);
  $this->db->group_by('filter_date');
  $query = $this->db->get();
  return $query->result();
}


public function exportCSVbill(){

    $response = array();

    // Select record
    $this->db->select('*');
    $q = $this->db->get('users');
    $response = $q->result_array();

    return $response;

}





public function date_range_doctor($id,$perfil)  {
  $this->db->select('*,filter_date as filter');
  $this->db->from('factura2');
  if($perfil=="Medico"){
  $this->db->where('medico',$id);
  }else{
$this->db->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->db->where('id_doctor',$id);
  }
  $this->db->group_by('filter_date');
  $query = $this->db->get();
  return $query->result();
}






public function get_fac_ars($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->join('factura2', 'factura.id2=factura2.idfacc');
$this->db->where($condition);
$this->db->where('area',$data['area']);
$this->db->where('seguro',$data['seguro_medico']);
/*if($data['centro'] !=""){
$this->db->where('centro_medico',$data['centro']);
}*/
$this->db->order_by('id2','desc');
$query = $this->db->get();
  return $query->result();
}






public function get_fac_ars_by_patient_adm($patient,$desde,$hasta) {
$condition = "filter BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->where($condition);
$this->db->where('pat_id',$patient);
$query = $this->db->get();
$data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}



public function get_fac_ars_by_patient($val1,$val2,$val3) {
$this->db->select('*');
$this->db->from('factura2');
   if($val3=="Asistente Medico"){
$this->db->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->db->where('id_doctor',$val2);
 } else {
$this->db->where('medico',$val2);
 }
$this->db->where('paciente',$val1);
$query = $this->db->get();
$data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}



public function saveInvoiceArsClaim($data) {
 $this->db->insert('invoice_ars_claims', $data);
}


public function doctors_message_view($data) {
 $this->db->insert('doctors_message_view', $data);
}




public function ncf($data) {
 $this->db->insert('ncf', $data);
 		 $insert_id = $this->db->insert_id();
        return  $insert_id;
}


public function getNewinvoice($id)  {
  //$this->db->select('*');
 $this->db->select('*,sum(tsubtotal) as t1, sum(totpagseg) as t2, sum(totpagpa) as t3');
  $this->db->from('invoice_ars_claims');
  $this->db->where('ncf_id',$id);
    $this->db->group_by('numauto');
  $this->db->order_by('fecha','desc');
  $query = $this->db->get();
  return $query->result();
}


public function print_ars_fac_report($id_ncf,$seguro)  {
 $this->db->select('*,sum(tsubtotal) as t1, sum(totpagseg) as t2, sum(totpagpa) as t3');
  $this->db->from('invoice_ars_claims');
  $this->db->where('seguro_medico',$seguro);
  $this->db->group_by('numauto');
  $this->db->order_by('fecha','desc');
  $query = $this->db->get();
  return $query->result();
}

public function print_ars_fac_found($id_ncf, $desde, $hasta)  {
	$condition="fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "'";
 $this->db->select('*,sum(tsubtotal) as t1, sum(totpagseg) as t2, sum(totpagpa) as t3');
  $this->db->from('invoice_ars_claims');
  //if($id_patient !=0){
  //$this->db->where('paciente',$id_patient);
  //}
  $this->db->where($condition);
  $this->db->where('ncf_id',$id_ncf);
  $this->db->group_by('numauto');
  $this->db->order_by('fecha','asc');
  $query = $this->db->get();
  return $query->result();
}



public function print_ars_fac_found_pat($val)  {
 $this->db->select('*');
  $this->db->from('invoice_ars_claims');
 $this->db->where('paciente',$val['patient']);
  $this->db->where('medico',$val['medico']);
  $query = $this->db->get();
  return $query->result();
}



public function invoice_ars_claim()  {
  $this->db->select('*');
  $this->db->from('invoice_ars_claims');
  $this->db->order_by('id','desc');
  $query = $this->db->get();
  return $query->result();
}

public function doc_invoice_ars_claim($id)  {
  $this->db->select('*');
  $this->db->from('invoice_ars_claims');
   $this->db->where('medico',$id);
  $this->db->order_by('id','desc');
  $query = $this->db->get();
  return $query->result();
}





public function getNcf($id)  {
  $this->db->select('*');
  $this->db->from('ncf');
  $this->db->where('id_ncf',$id);
  $query = $this->db->get();
  return $query->result();
}

public function get_numero_contrado($id){
$this->db->select("*");
  $this->db->from('factura2');
   $this->db->join('users', 'users.id_user=factura2.medico');
 $this->db->where('codigoprestado',$id);
  $query = $this->db->get();
  return $query->result();
}

public function all_codigo_prestador(){
$this->db->select("codigoprestado");
  $this->db->from('factura2');
  $this->db->group_by('codigoprestado');
  $this->db->where('seguro_medico !=',11);
 $query = $this->db->get();
  return $query->result();
}




public function medicos_facturar(){
$this->db->select("name,medico");
  $this->db->from('users');
 $this->db->join('factura2', 'users.id_user=factura2.medico');
  $this->db->group_by('medico');
  $this->db->where('seguro_medico !=',11);
$query = $this->db->get();
  return $query->result();
}



public function get_nombre_medico($id){
$this->db->select("*");
  $this->db->from('users');
 $this->db->join('factura2', 'users.id_user=factura2.medico');
 $this->db->where('id_user',$id);
$query = $this->db->get();
  return $query->result();
}

public function get_nombre_medico_date_filter($id){
$this->db->select("filter");
  $this->db->from('factura');
 $this->db->join('users', 'users.id_user=factura.medico2');
 $this->db->where('medico2',$id);
  $this->db->where('seguro !=',11);
  $this->db->group_by('filter');
$query = $this->db->get();
  return $query->result();
}


public function get_exequatur_medico($id){
$this->db->select("*");
 $this->db->from('users');
 $this->db->join('factura2', 'users.id_user=factura2.medico');
$this->db->where('exequatur',$id);
$query = $this->db->get();
  return $query->result();
}

public function exequatur_medico_factura(){
$this->db->select("exequatur");
 $this->db->from('factura2');
 $this->db->join('users', 'users.id_user=factura2.medico');
 $this->db->where('seguro_medico !=',11);
  $this->db->group_by('medico');
$query = $this->db->get();
  return $query->result();
}





public function cedula_medico_factura(){
$this->db->select("medico");
 $this->db->from('factura2');
 $this->db->where('seguro_medico !=',11);
 $this->db->group_by('medico');
$query = $this->db->get();
  return $query->result();
}






public function get_exequatur_medico_date_filter($id){
$this->db->select("filter");
 $this->db->from('users');
  $this->db->join('factura', 'users.id_user=factura.medico2');
$this->db->where('exequatur',$id);
 $this->db->where('seguro !=',11);
 $this->db->group_by('filter');
$query = $this->db->get();
  return $query->result();
}


public function get_rnc_medico($id){
$this->db->select("*");
 $this->db->from('factura2');
    $this->db->join('users', 'users.id_user=factura2.medico');
$this->db->where('rnc',$id);
$query = $this->db->get();
  return $query->result();
}


public function get_cedula_medico($id){
$this->db->select("*");
 $this->db->from('users');
  $this->db->join('factura2', 'users.id_user=factura2.medico');
$this->db->where('cedula',$id);
$query = $this->db->get();
  return $query->result();
}

public function get_cedula_medico_date_filter($id){
$this->db->select("filter");
 $this->db->from('users');
  $this->db->join('factura', 'users.id_user=factura.medico2');
$this->db->where('cedula',$id);
$this->db->where('seguro !=',11);
 $this->db->group_by('filter');
$query = $this->db->get();
  return $query->result();
}




public function get_numero_contrado_date_filter($id){
$this->db->select("filter");
  $this->db->from('factura2');
  $this->db->join('factura', 'factura.id2=factura2.idfacc');
 $this->db->where('codigoprestado',$id);
 $this->db->where('seguro_medico !=',11);
 $this->db->group_by('filter');
$query = $this->db->get();
  return $query->result();
}




public function patient_num_contrato_data($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
 $this->db->join('factura2', 'factura.id2=factura2.idfacc');
$this->db->where($condition);
$this->db->where("medico2",$data['medico']);
$this->db->where('seguro !=',11);
$query = $this->db->get();
$data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}

public function count_patient_num_contrato($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->where($condition);
$this->db->where("medico2",$data['medico']);
$this->db->where('seguro !=',11);
$query = $this->db->get();
$data = array();  // <--- here
     if($query->num_rows()>0)
      {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
       return $data;
     }
}







public function show_diagno_pat($con_id_link){
$this->clinical_history->select('code,description');
  $this->clinical_history->from('h_c_diagno_def_link');
 $this->clinical_history->join('cied', 'h_c_diagno_def_link.diagno_def=cied.idd');
 $this->clinical_history->where('con_id_link',$con_id_link);
 $query = $this->clinical_history->get();
 return $query->result();

}




public function show_diagno_pat_audit($id1,$id2,$id3){
$this->clinical_history->select('code,description');
  $this->clinical_history->from('h_c_diagno_def_link');
 $this->clinical_history->join('cied', 'h_c_diagno_def_link.diagno_def=cied.idd');
 $this->clinical_history->where('p_id',$id1);
  $this->clinical_history->where('user_id',$id2);
  $this->clinical_history->where('centro_medico',$id3);
 $query = $this->clinical_history->get();
 return $query->result();

}


public function show_diagno_pat_admin($id1,$id2,$date){
$this->clinical_history->select('code,description');
  $this->clinical_history->from('h_c_diagno_def_link');
 $this->clinical_history->join('cied', 'h_c_diagno_def_link.diagno_def=cied.idd');
 $this->clinical_history->where('p_id',$id1);
 $this->clinical_history->where('centro_medico',$id2);
 $this->clinical_history->like('insert_date',$date);
 $query = $this->clinical_history->get();
 return $query->result();

}




public function show_diagno_pat_print($id){

	 $this->clinical_history->join('cied', 'h_c_diagno_def_link.diagno_def=cied.idd');
   $this->clinical_history->where('p_id',$id);
  $query = $this->clinical_history->get('h_c_diagno_def_link');
  return $query;


}

public function show_diagno_pro_pat_print($id){

$this->db->join('type_diagnostic_procedures', 'h_c_diagno_def_proc.procedimiento=type_diagnostic_procedures.id');
  $this->db->where('p_id',$id);
  $query = $this->db->get('h_c_diagno_def_proc');
  return $query;
}



public function show_diagno_pro_pat($id){

  $this->db->select('*');
  $this->db->from('h_c_diagno_def_proc');
   $this->db->join('type_diagnostic_procedures', 'h_c_diagno_def_proc.procedimiento=type_diagnostic_procedures.id');
  $this->db->where('p_id',$id);
 $query = $this->db->get();
 return $query->result();
}




 public function show_patient_arc_report($data) {
$this->db->select('*');
$this->db->from('factura');
$this->db->join('factura2', 'factura2.idfacc=factura.id2');
$this->db->where("filter >=",$data['desde']);
$this->db->where("filter <=",$data['hasta']);
$this->db->where("medico2",$data['medico']);
//$this->db->where("patient",$data['id_patient']);
$this->db->where("validate",1);
 $query = $this->db->get();
 return $query->result();
}

  public function rates_view($id)
    {
	$this->db->select("*");
  $this->db->from('tarifarios_test');
  $this->db->where('id_tarif', $id);
  $this->db->order_by('procedimiento', 'desc');
  $query = $this->db->get();
  return $query->result();
   }



   	function addDoctTarif($data)
	{
		$this->db->insert('tarif_seg_doc', $data);
	}


public function delete_doctor_tarif($delete){
  $this -> db -> where('id_cat', $delete['id_cat']);
  $this -> db -> where('id_doct', $delete['id_doct']);
  $this -> db -> delete('tarif_seg_doc');
}




public function tarif_seg_doc($save) {
$this->db->insert('tarif_seg_doc', $save);

}




function tarifarios_test_grouped()
	{
	$this->db->select('id_user,name');
	$this->db->from('tarifarios_test');
	$this->db->join('users', 'tarifarios_test.id_doctor=users.id_user');
	$this->db->group_by('id_doctor');
	$query = $this->db->get();
	return $query->result();
	}


	function tarifarios_test_grouped_seguro()
	{
	$this->db->select('id_sm,title');
	$this->db->from('tarifarios_test');
	$this->db->join('seguro_medico', 'tarifarios_test.id_seguro=seguro_medico.id_sm');
	$this->db->group_by('id_seguro');
	$query = $this->db->get();
	return $query->result();
	}




public function save_edit_tarif($id,$data){
$this->db->where('id_tarif', $id);
$this->db->update('tarifarios_test', $data);
}

public function save_edit_tarifario_centro($id,$data){
$this->db->where('id_c_taf', $id);
$this->db->update('centros_tarifarios_test', $data);
}

	function display_tarif_seguro($id)
	{
	$this->db->select('*');
	$this->db->from('tarifarios_test');
	$this->db->where('id_seguro',$id);
	$this->db->order_by('id_tarif','desc');
	$query = $this->db->get();
	return $query->result();
	}

	function display_tarif_doc($id)
	{
	$this->db->select('*');
	$this->db->from('tarifarios_test');
	$this->db->where('id_doctor',$id);
	$query = $this->db->get();
	return $query->result();
	}

	function display_tarif_doc_($id1,$id2)
	{
	$this->db->select('*');
	$this->db->from('tarifarios_test');
	$this->db->where('id_doctor',$id1);
	$this->db->where('id_seguro',$id2);
	$query = $this->db->get();
	return $query->result();
	}

		function display_tarif_seguro_doc($taf)
	{
	$this->db->select('*');
	$this->db->from('tarifarios_test');
	$this->db->where('id_doctor',$taf['id_doctor']);
	$this->db->where('id_seguro',$taf['id_seguro']);
	$this->db->order_by('id_tarif','desc');
	$query = $this->db->get();
	return $query->result();
	}









		function seguro_header($id)
	{
	$this->db->select('*');
	$this->db->from('tarifarios_test');
	$this->db->where('id_seguro',$id);
	$query = $this->db->get();
	return $query->result();
	}

		function other_seguro_tarif($val)
	{
	$this->db->select('*');
	$this->db->from('tarifarios_test');
	$this->db->where('id_seguro',$val['id_seguro']);
	$this->db->where('id_doctor',$val['id_doctor']);

	$this->db->where('plan',$val['id_plan']);

	$this->db->order_by('id_tarif', 'desc');
	$query = $this->db->get();
	return $query->result();
	}

	function edit_tarifario($id)
	{
	$this->db->select('*');
	$this->db->from('tarifarios_test');
	$this->db->where('id_tarif',$id);
	$query = $this->db->get();
	return $query->result();
	}

	function edit_tarifario_centro($id)
	{
	$this->db->select('*');
	$this->db->from('centros_tarifarios_test');
	$this->db->where('id_c_taf',$id);
	$query = $this->db->get();
	return $query->result();
	}


	function tarifario_centro_bill($id)
	{
	$this->db->select('*');
	$this->db->from('centros_tarifarios_test');
	$this->db->where('centro_id',$id);
	$query = $this->db->get();
	return $query->result();
	}



		function all_centro_medicos_tarifs()
	{
	$this->db->select('id_m_c,name');
	$this->db->from('medical_centers');
	$this->db->join('centros_tarifarios_test', 'medical_centers.id_m_c=centros_tarifarios_test.centro_id');
	$this->db->group_by('centro_id');
	$query = $this->db->get();
	return $query->result();
	}

		function agendaDocCentro($id)
	{
	$this->db->select('id_centro,name');
	$this->db->from('doctor_agenda_test');
	$this->db->join('medical_centers', 'medical_centers.id_m_c=doctor_agenda_test.id_centro');
	$this->db->where('id_doctor', $id);
	$this->db->group_by('id_centro');
	$query = $this->db->get();
	return $query->result();
	}

		function doct_es_tarif($id_user)
	{
	$this->db->select('id_ar,title_area');
	$this->db->from('areas');
	$this->db->join('tarifarios_test', 'areas.id_ar=tarifarios_test.id_categoria');
	$this->db->where('id_doctor',$id_user);
	$this->db->group_by('id_categoria');
	$query = $this->db->get();
	return $query->result();
	}



function display_tarif_centro_categoria($id1,$id2)
	{
	$this->db->select('groupo,centro_id,seguro_id');
	$this->db->from('centros_tarifarios_test');
	$this->db->where('centro_id',$id1);
	$this->db->where('seguro_id',$id2);
	$this->db->where('groupo !=',"");
	$this->db->group_by('groupo');
	$this->db->order_by('id_c_taf','desc');
	$query = $this->db->get();
	return $query->result();
	}

	public function seguro_doc_tarif_grouped($id)  {
  $this->db->select('*');
  $this->db->from('tarifarios_test');
 $this->db->join('seguro_medico', 'seguro_medico.id_sm= tarifarios_test.id_seguro');
  $this->db->where("id_doctor",$id);
  $this->db->group_by('id_seguro');
  $query = $this->db->get();
  return $query->result();
}


	public function seguro_doc_tarif_grouped_med($id,$id2)  {
  $this->db->select('*');
  $this->db->from('tarifarios_test');
 $this->db->join('seguro_medico', 'seguro_medico.id_sm= tarifarios_test.id_seguro');
  $this->db->where("id_doctor",$id);
  $this->db->where("id_seguro",$id2);
  $this->db->group_by('id_seguro');
  $query = $this->db->get();
  return $query->result();
}








	public function seguro_doc_tarif_grouped1($id)  {
  $this->db->select('*');
  $this->db->from('tarifarios_test');
 $this->db->where("id_seguro",$id);
  $this->db->group_by('id_doctor');
  $query = $this->db->get();
  return $query->result();
}


	function centro_categoria_servicios($val)
	{
	$this->db->select('*');
	$this->db->from('centros_tarifarios_test');
	$this->db->where('groupo',$val['categoria']);
	$this->db->where('centro_id',$val['id_centro']);
	$this->db->where('seguro_id',$val['id_seguro']);
	$this->db->order_by('id_c_taf','desc');
	$query = $this->db->get();
	return $query->result();
	}



	 public function save_codigo_contrato($data) {
        // Inserting into your table
        $this->db->insert('codigo_contrato', $data);
     }

	 public function saveNewTarifMedico($data) {
        $this->db->insert('tarifarios_test', $data);
     }

	function check_if_doc_has_tarifarios_test_for_this_seguro($get)
	{
	$this->db->select('*');
	$this->db->from('tarifarios_test');
	$this->db->where('id_seguro',$get['id_seguro']);
	$this->db->where('id_doctor',$get['id_doctor']);
	$query = $this->db->get();
	 return $query->num_rows();
	}

		function check_if_centro_medico_has_tarifarios_test_already($id1,$id2)
	{
	$this->db->select('*');
	$this->db->from('codigo_contrato');
	$this->db->where('id_centro',$id1);
	$this->db->where('id_seguro',$id2);
	$query = $this->db->get();
	 return $query->num_rows();
	}

	public function save_edit_codigo_prestador($id,$data2){
$this->db->where('id', $id);
$this->db->update('codigo_contrato', $data2);
}




public function delete_doctor_centro_medico2(){
$this -> db -> where('centro_medico',0);
$this -> db -> delete('doctor_centro_medico');
}

public function delete_doctor_agenda2(){
$this -> db -> where('agenda', 0);
$this -> db -> delete('doctor_agenda');
}

public function delete_doctor_seguro2(){
$this -> db -> where('seguro_medico',0);
$this -> db -> delete('doctor_seguro');
}


	public function delete_tarifarios_centro($id){
  $this -> db -> where('id_c_taf', $id);
  $this -> db -> delete('centros_tarifarios_test');
}

	public function saveNewTarifCentro($data){
 $this->db->insert('centros_tarifarios_test', $data);
}





	public function delete_tarifarios($id){
  $this -> db -> where('id_tarif', $id);
  $this -> db -> delete('tarifarios_test');
}



	public function delete_all_tarifarios_test($del){
  $this -> db -> where('id_seguro', $del['id_seguro']);
   $this -> db -> where('id_doctor', $del['id_doctor']);
  $this -> db -> delete('tarifarios_test');
}


	public function delete_all_tarifarios_test_codigo($del){
  $this -> db -> where('id_seguro', $del['id_seguro']);
   $this -> db -> where('id_doctor', $del['id_doctor']);
  $this -> db -> delete('codigo_contrato');
}


public function row_validation_after_validate($id,$data){
$this->db->where('idfac', $id);
$this->db->update('factura', $data);
}


public function report_bill_by_desde_privado($id,$perfil){
$this->db->select("filter_date");
$this->db->from('factura2');
if($perfil=="Medico"){
$this->db->where('medico',$id);
}
$this->db->where("seguro_medico=",11);
$this->db->group_by('filter_date');
$this->db->order_by('filter_date','asc');
$query = $this->db->get();
return $query->result();
}


public function report_bill_by_desde_general($id,$perfil){
$this->db->select("filter_date");
$this->db->from('factura2');
if($perfil=="Medico"){
$this->db->where('medico',$id);
}
$this->db->where("seguro_medico !=",11);
$this->db->group_by('filter_date');
$this->db->order_by('filter_date','asc');
$query = $this->db->get();
return $query->result();
}




public function report_bill_by_hasta_privado($id,$perfil){
$this->db->select("filter_date");
$this->db->from('factura2');
if($perfil=="Medico"){
$this->db->where('medico',$id);
}
$this->db->where("seguro_medico =",11);
$this->db->group_by('filter_date');
$this->db->order_by('filter_date','desc');
$query = $this->db->get();
return $query->result();
}


public function report_bill_by_hasta_general($id,$perfil){
$this->db->select("filter_date");
$this->db->from('factura2');
if($perfil=="Medico"){
$this->db->where('medico',$id);
}
$this->db->where("seguro_medico !=",11);
$this->db->group_by('filter_date');
$this->db->order_by('filter_date','desc');
$query = $this->db->get();
return $query->result();
}




public function report_bill_by_date_centro($id,$perfil){
$this->db->select("centro_medico");
$this->db->from('factura2');
$this->db->join('medical_centers', 'factura2.centro_medico = medical_centers.id_m_c');
if($perfil=="Medico"){
$this->db->where('medico',$id);
}
$this->db->group_by('centro_medico');
$query = $this->db->get();
return $query->result();
}



public function report_bill_by_date_centro_linked($id) {
$this->db->select("id_centro AS centro_medico");
$this->db->from('medico_citas_linked_centers');
$this->db->join('doctor_agenda_test', 'doctor_agenda_test.id_doctor = medico_citas_linked_centers.current_doctor');

$this->db->where('id_doctor',$id);

$this->db->group_by('id_centro');
$query = $this->db->get();
return $query->result();
}




public function billCentroAdministrativo($id){
$this->db->select("centro_medico");
$this->db->from('factura2');
$this->db->join('medical_centers', 'factura2.centro_medico = medical_centers.id_m_c');

$this->db->where('centro_medico',$id);

$this->db->group_by('centro_medico');
$query = $this->db->get();
return $query->result();
}

public function report_bill_by_date_centro_fac($id,$perfil,$type, $admin_type_centro){
$this->db->select("centro_medico");
$this->db->from('factura2');
$this->db->join('medical_centers', 'factura2.centro_medico = medical_centers.id_m_c');
if($perfil=="Medico"){
$this->db->where('medico',$id);
}else{
if($admin_type_centro){
	$this->db->where('centro_medico',$admin_type_centro);
}	
}
$this->db->where('type',$type);
$this->db->group_by('centro_medico');
$query = $this->db->get();
return $query->result();
}







public function view_as_doctor_centro($id_doctor)
	{

$this->db->select("*");
  $this->db->from('doctor_centro_medico');
  $this->db->join('medical_centers', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c');
    $this->db->where('id_doctor',$id_doctor);
	 $this->db->where('activate',0);
  $query = $this->db->get();
  return $query->result();
}

public function view_as_doctor_centro_fac($id_doctor,$type)
	{

$this->db->select("*");
  $this->db->from('doctor_centro_medico');
  $this->db->join('medical_centers', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c');
    $this->db->where('id_doctor',$id_doctor);
  $this->db->where('type',$type);
  $query = $this->db->get();
  return $query->result();
}




public function as_medico_report_bill_desde($id_doctor,$check)
  {

$this->db->select("*");
  $this->db->from('doctor_centro_medico');
  $this->db->join('factura2', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
  $this->db->where('id_doctor',$id_doctor);
  if($check=="privado"){
  $this->db->where("seguro_medico=",11);
  } else{
    $this->db->where("seguro_medico !=",11);
  }
  $this->db->group_by('filter_date');
$this->db->order_by('filter_date','asc');
  $query = $this->db->get();
  return $query->result();
}


public function as_medico_report_bill_hasta($id_doctor,$check)
  {

$this->db->select("*");
  $this->db->from('doctor_centro_medico');
  $this->db->join('factura2', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
  $this->db->where('id_doctor',$id_doctor);
   if($check=="privado"){
  $this->db->where("seguro_medico =",11);
  } else{
    $this->db->where("seguro_medico !=",11);
  }
  $this->db->group_by('filter_date');
$this->db->order_by('filter_date','desc');
  $query = $this->db->get();
  return $query->result();
}


public function get_fac_date_report_general($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->where($condition);
$this->db->where("center_id",$data['centro']);
//$this->db->where("seguro !=",11);
if($data['perfil'] =="Medico"){
$this->db->where("medico2",$data['id_user']);
}
$this->db->group_by('inserted_time');
$this->db->order_by('seguro','desc');
$query = $this->db->get();
return $query->result();
}














public function get_fac_date_report_privado($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->where($condition);
$this->db->where("center_id",$data['centro']);
$this->db->where("seguro",11);
if($data['perfil'] =="Medico"){
$this->db->where("medico2",$data['id_user']);
}
$this->db->group_by('inserted_time');
$this->db->order_by('seguro','desc');
$query = $this->db->get();
return $query->result();
}

public function get_fac_date_report_centro_privado($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->where($condition);
$this->db->where("medico2",$data['doctor']);
$this->db->where("center_id",$data['centro']);
$this->db->where("seguro",11);
$this->db->group_by('inserted_time');
$this->db->order_by('seguro','desc');
$query = $this->db->get();
return $query->result();
}

public function get_fac_date_report_general_centro_privado($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->where($condition);
$this->db->where("medico2",$data['doctor']);
$this->db->where("center_id",$data['centro']);
//$this->db->where("seguro !=",11);
//$this->db->group_by('inserted_time');
$this->db->order_by('seguro','desc');
$query = $this->db->get();
return $query->result();
}

public function search_patients_factura(){
$this->db->select("id_p_a,cedula,nec1,nombre");
  $this->db->from('patients_appointments');
$query = $this->db->get();
  return $query->result();
}


public function search_patients_facturaDoc($id,$perfil){
$this->db->select("id_p_a,cedula,nec1,nombre");
  $this->db->from('patients_appointments');

$query = $this->db->get();
return $query->result();
}





public function search_date_range_seguro_factura($id,$perfil){
$this->db->select("seguro_medico");
  $this->db->from('factura2');
if($perfil=="Asistente Medico"){
$this->db->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
} else if($perfil='Medico') {
$this->db->where('medico',$id);
}
$this->db->where('seguro_medico !=',11);
$this->db->group_by('seguro_medico');
$query = $this->db->get();
return $query->result();
}




public function search_date_range_seguro_factura_adm(){
$this->db->select("seguro_medico");
$this->db->from('factura2');
$this->db->where('seguro_medico !=',11);
$this->db->group_by('seguro_medico');
$query = $this->db->get();
return $query->result();
}


function tarifarios_test_by_seguros_doc($get)
{
$this->db->select('id_tarif,codigo,simon,procedimiento,id_seguro,monto');
$this->db->from('tarifarios_test');
 $this->db->join('seguro_medico', 'tarifarios_test.id_seguro = seguro_medico.id_sm');
$this->db->where('procedimiento',$get['procedimiento']);
$this->db->where('id_doctor',$get['id_user']);
$this->db->group_by('id_seguro');
$query = $this->db->get();
return $query->result();
}

function tarifarios_test_grouped_seguro_doc($id_user)
	{
	$this->db->select('id_sm,title');
	$this->db->from('tarifarios_test');
	$this->db->join('seguro_medico', 'tarifarios_test.id_seguro=seguro_medico.id_sm');
	$this->db->where('id_doctor',$id_user);
	$this->db->group_by('id_seguro');
	$query = $this->db->get();
	return $query->result();
	}




public function deleteNingunoDroga(){
  $this -> db -> where('name', 'ninguno');
  $this -> db -> delete('h_c_droga');
}



public function DeletePatCied($id){
  $this ->clinical_history -> where('diagno_def', $id);
  $this ->clinical_history -> delete('h_c_diagno_def_link');
}


	public function UpdateFormIndicaciones($data,$id){
$this->db->where('id_i_m',$id);
$this->db->update('h_c_indicaciones_medicales',$data);
}


public function UpdateFormIndEst($data,$id){
	$this->db->where('id_i_e', $id);
$this->db->update('h_c_indicaciones_estudio', $data);
}


	public function edit_tutor($id){
  $this->db->select('id, name_tutor, relacion');
  $this->db->from('tutor');
  $this->db->where('id',$id);
 $query = $this->db->get();
 return $query->result();
}




public function UpdatePatientTutor($data,$id){
	$this->db->where('id', $id);
$this->db->update('tutor', $data);
}


public function save_new_historial_dropdown($data) {
// Inserting into your table
$this->db->insert('historial_dropdown', $data);
}



 public function save_new_medicaments($data) {
        // Inserting into your table
        $this->db->insert('medicaments', $data);
     }



	 public function save_new_presentacion($data) {
        // Inserting into your table
        $this->db->insert('presentacion', $data);
     }




public function Neuro(){
  $this->db->select('name');
  $this->db->from('historial_dropdown');
  $this->db->where('location',26);
 $query = $this->db->get();
 return $query->result();
}



public function Cabeza(){
  $this->db->select('name');
  $this->db->from('historial_dropdown');
  $this->db->where('location',27);
 $query = $this->db->get();
 return $query->result();
}


public function AbmInsForma(){
  $this->db->select('name');
  $this->db->from('historial_dropdown');
  $this->db->where('location',28);
 $query = $this->db->get();
 return $query->result();
}



public function Cervix(){
  $this->db->select('name');
  $this->db->from('historial_dropdown');
  $this->db->where('location',29);
 $query = $this->db->get();
 return $query->result();
}


 public function SaveConDef($savecd) {
        $this->clinical_history->insert('h_c_diagno_def_link', $savecd);
         $insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
    }


public function delete_empty_historial_dropdown(){
  $this -> db -> where('name',"");
  $this -> db -> delete('historial_dropdown');
}

  public function delete_factura3($id){
  $this -> db -> where('idfac', $id);
  $this -> db -> delete('factura');
}


public function was_me($val){
$this -> db -> where('user_id',$val);
$this -> db -> delete('user_login_twice');

}



function RedirectPatientResult($val){
  $this->db->select('id_p_a');
  $this->db->from('patients_appointments');
  $this->db->where('ced1',$val['ced1']);
  $this->db->where('ced2',$val['ced2']);
  $this->db->where('ced3',$val['ced3']);
 $query = $this->db->get();
 return $query->result();
}



	public function messageViewed($id,$value){
$this->db->where('id_doc',$id);
$this->db->update('doctors_message_view',$value);
}



public function MessageSeen($where1,$data){
$this->db->where('message_from',274);
$this->db->update('chat_medico', $data);
}

public function agendaDoc($id1,$id2)
	{
   $this->db->select("id,title,day");
  $this->db->from('diaries');
  $this->db->join('doctor_agenda_test', 'diaries.id = doctor_agenda_test.day');
  $this->db->where('id_doctor',$id1);
  $this->db->group_by('id_centro',$id2);
  $query = $this->db->get();
  return $query->result();
}



	public function deleteDocCentroAgenda($id1,$id2){
  $this -> db -> where('id_doctor', $id1);
  $this -> db -> where('id_centro', $id2);
  $this -> db -> delete('doctor_agenda_test');
}



public function getRecetaForFarmacia($limit, $start,$id_farma)  {
$this->db->select('id_i_m, historial_id,branch,despachada');
$this->db->from('h_c_indicaciones_medicales');
$this->db->where('farma',$id_farma);
//$this->db->group_by('encrypt_recetas');
$this->db->order_by('id_i_m','desc');
$this->db->limit($limit, $start);
$query = $this->db->get();
 return $query->result();

}

public function getDespachadasEst($limit, $start,$estudio_cat)  {
$this->db->select('id_i_e, historial_id,despachada,updated_time,operator,centro');
$this->db->from('h_c_indicaciones_estudio');
$this->db->where('estudio_cat',$estudio_cat);
//$this->db->group_by('encrypt_recetas');
$this->db->order_by('id_i_e','desc');
$this->db->limit($limit, $start);
$query = $this->db->get();
 return $query->result();

}



  	public function countTotalCitaDoc($id_centro){
$this->db->select('doctor, count(doctor) as Total');
  $this->db->from('rendez_vous');
  if($id_centro){
   $this->db->where('centro',$id_centro);
  }
  $this->db->where('confirmada',0);
   $this->db->where('fecha_propuesta',date("d-m-Y"));
  $this->db->where('cancelar',0);
 $this->db->group_by('doctor');
  $this->db->order_by('Total', 'desc');
  $query = $this->db->get();
  return $query->result();
}

 public function h_c_of_refracion($data) {
        $this->db->insert('h_c_of_refracion', $data);
		 $insert_id = $this->db->insert_id();
        return  $insert_id;
     }

 public function laboratory_lentes($data) {
        $this->db->insert('laboratory_lentes', $data);
		 $insert_id = $this->db->insert_id();
        return  $insert_id;
     }
//---------------------NEVER DELETE DE BRACKET BELOW----------------------------------------

}
