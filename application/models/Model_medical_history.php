<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_medical_history extends CI_Model{
    function __construct() {
      	$this->clinical_history = $this->load->database('clinical_history',TRUE);
	 }

   public function getPieChat($data1,$data2,$centro,$medico)
    {
	 $condition = "h_c_enfermedad_actual.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select('sexo,count(sexo) as total');
$this->clinical_history->from('patients_appointments');
 $this->clinical_history->join('h_c_enfermedad_actual', 'h_c_enfermedad_actual.historial_id= patients_appointments.id_p_a');
 $this->clinical_history->where($condition);
 if($centro==""){
$this->clinical_history->where('user_id',$medico);
 }else{
$this->clinical_history->where('h_c_enfermedad_actual.centro_medico',$centro);
 }
$this->clinical_history->group_by('sexo');
$query = $this->clinical_history->get();
  return $query->result();
    }

	  public function getBarCha1($data1,$data2,$centro,$medico)
    {
	 $condition = "h_c_enfermedad_actual.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select('count(historial_id) as Paciente, user_id as idMed');
$this->clinical_history->from('h_c_enfermedad_actual');
 //$this->clinical_history->join('users', 'users.id_user= h_c_enfermedad_actual.user_id');
 $this->clinical_history->where($condition);
 if($centro==""){
$this->clinical_history->where('user_id',$medico);
 }else{
$this->clinical_history->where('centro_medico',$centro);
 }
$this->clinical_history->group_by('user_id');
$this->clinical_history->order_by('Paciente','desc');
$query = $this->clinical_history->get();
  return $query->result();
    }


  public function getBarChart2($data1,$data2,$centro,$medico)
    {
	 $condition = "insert_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select('count(diagno_def) as Diagnostico, code as Cod, description as Descrip');
$this->clinical_history->from('h_c_diagno_def_link');
 $this->clinical_history->join('cied', 'cied.idd= h_c_diagno_def_link.diagno_def');
$this->clinical_history->where($condition);
 if($centro==""){
$this->clinical_history->where('user_id',$medico);
 }else{
$this->clinical_history->where('h_c_diagno_def_link.centro_medico',$centro);
 }
$this->clinical_history->group_by('diagno_def');
$this->clinical_history->order_by('Diagnostico','desc');
$this->clinical_history->limit(20);
$query = $this->clinical_history->get();
  return $query->result();
    }




  public function getBarChart2Otros($data1,$data2,$centro,$medico)
    {
	 $condition = "insert_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select('count(diagno_def) as Diagnostico, code as Cod, description as Descrip');
$this->clinical_history->from('h_c_diagno_def_link');
 $this->clinical_history->join('cied', 'cied.idd= h_c_diagno_def_link.diagno_def');
$this->clinical_history->where($condition);
 if($centro==""){
$this->clinical_history->where('user_id',$medico);
 }else{
$this->clinical_history->where('h_c_diagno_def_link.centro_medico',$centro);
 }
$this->clinical_history->group_by('diagno_def');
$query = $this->clinical_history->get();
  return $query->result();
    }







  public function getBarChart3($data1,$data2,$centro,$medico)
    {
	 $condition = "inserted_time  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select('count(otros_diagnos) as OtroD, otros_diagnos as OtroDiagnostico');
$this->clinical_history->from('h_c_conclusion_diagno');
$this->clinical_history->where($condition);
$this->clinical_history->where('otros_diagnos !=','');
 if($centro==""){
$this->clinical_history->where('id_user',$medico);
 }else{
$this->clinical_history->where('centro_medico',$centro);
 }
$this->clinical_history->group_by('otros_diagnos');
$this->clinical_history->order_by('OtroD','desc');
$this->clinical_history->limit(20);
$query = $this->clinical_history->get();
  return $query->result();
    }


	  public function getBarChart3Otros($data1,$data2,$centro,$medico)
    {
	 $condition = "inserted_time  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select('count(otros_diagnos) as OtroD, otros_diagnos as OtroDiagnostico');
$this->clinical_history->from('h_c_conclusion_diagno');
$this->clinical_history->where($condition);
$this->clinical_history->where('otros_diagnos !=','');
 if($centro==""){
$this->clinical_history->where('id_user',$medico);
 }else{
$this->clinical_history->where('centro_medico',$centro);
 }
$this->clinical_history->group_by('otros_diagnos');
$this->clinical_history->order_by('OtroD','desc');
$query = $this->clinical_history->get();
  return $query->result();
    }



	  public function getBarChart4($data1,$data2,$centro,$medico)
    {
$condition = "h_c_enfermedad_actual.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select('count(historial_id) as Total, historial_id as Paciente');
$this->clinical_history->from('h_c_enfermedad_actual');
$this->clinical_history->join('patients_appointments', 'h_c_enfermedad_actual.historial_id= patients_appointments.id_p_a');
$this->clinical_history->where($condition);
 if($centro==""){
$this->clinical_history->where('user_id',$medico);

 }else{
$this->clinical_history->where('h_c_enfermedad_actual.centro_medico',$centro);
 }
$this->clinical_history->group_by('provincia');
$this->clinical_history->order_by('Total','desc');
//$this->clinical_history->limit(20);
$query = $this->clinical_history->get();
  return $query->result();
    }




	  public function getBarChart5($data1,$data2,$centro,$medico)
    {
	 $condition = "patients_appointments.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select('count(nacionalidad) as Total, nacionalidad as Nacionalidad');
$this->clinical_history->from('patients_appointments');
$this->clinical_history->join('rendez_vous', 'rendez_vous.id_apoint= patients_appointments.id_p_a');
$this->clinical_history->where($condition);
if($centro==""){
$this->clinical_history->where('doctor',$medico);
 }else{
$this->clinical_history->where('centro',$centro);
 }
$this->clinical_history->group_by('nacionalidad');
$this->clinical_history->order_by('Total','desc');
//$this->clinical_history->limit(20);
$query = $this->clinical_history->get();
  return $query->result();
    }


	  public function getBarChartAge($data1,$data2,$centro,$medico)
    {
$condition = "h_c_enfermedad_actual.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->clinical_history->select("CASE WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_nacer_format, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_nacer_format, '00-%m-%d'))) < 1 THEN '< 1 año'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_nacer_format, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_nacer_format, '00-%m-%d'))) <= 4 THEN '1-4 año'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_nacer_format, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_nacer_format, '00-%m-%d'))) <= 14 THEN '5-14 año'
     WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_nacer_format, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_nacer_format, '00-%m-%d'))) <= 49 THEN '15-49 año'
	 WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_nacer_format, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_nacer_format, '00-%m-%d'))) <= 69 THEN '50-69 año'
	 WHEN (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(date_nacer_format, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(date_nacer_format, '00-%m-%d'))) >= 70 THEN '70 y mas'
	 END AS age,
COUNT(*) total");
$this->clinical_history->from('patients_appointments');
$this->clinical_history->join('h_c_enfermedad_actual', 'h_c_enfermedad_actual.historial_id= patients_appointments.id_p_a');
$this->clinical_history->where($condition);
 if($centro==""){
$this->clinical_history->where('user_id',$medico);

 }else{
$this->clinical_history->where('h_c_enfermedad_actual.centro_medico',$centro);
 }
$this->clinical_history->group_by('age');
$this->clinical_history->order_by('total','desc');
//$this->clinical_history->limit(20);
$query = $this->clinical_history->get();
  return $query->result();
    }








public function set_cita_to_confirm_patient($id,$data){
$this->clinical_history->where('id_p_a', $id);
$this->clinical_history->update('patients_appointments', $data);
}
public function set_cita_to_confirm_rendez_vous($id,$data1){
	$this->clinical_history->where('id_patient', $id);
$this->clinical_history->update('rendez_vous', $data1);
}
public function saveUpdatePatient($idp,$save){
$this->clinical_history->where('id_p_a', $idp);
$this->clinical_history->update('patients_appointments', $save);
}

public function display_centro_medico($data){
$this->clinical_history->select("*");
  $this->clinical_history->from('medical_centers');
  $this->clinical_history->where('id_m_c',$data);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function current_login(){
$this->clinical_history->select("perfil,name,login_time,id_user,area");
  $this->clinical_history->from('users');
  $this->clinical_history->where('is_log_in',1);
  $this->clinical_history->where('id_user !=',1);
 $this->clinical_history->like('login_time',date("Y-m-d"));
  $query = $this->clinical_history->get();
  return $query->result();
}




public function ver_cita_confirmada($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
  // $this->clinical_history->join('medical_centers', 'patients_appointments.centro_medico= medical_centers.name');
   // $this->clinical_history->join('type_reasons', 'patients_appointments.causa= type_reasons.id');
	//$this->clinical_history->join('areas', 'patients_appointments.especialidad= areas.id_ar');
	//$this->clinical_history->join('doctors', 'patients_appointments.doctor= doctors.id');
  $this->clinical_history->where('id_p_a',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function editUser($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('users');
 $this->clinical_history->where('id_user',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}
//$sql="select doctor_agenda from doctor_agenda  where agenda=$id_diary";=id_doctor

public function diary_doctors($id_diary){
$this->clinical_history->select("*");
  $this->clinical_history->from('doctor_agenda');
  $this->clinical_history->where('agenda',$id_diary);
  $query = $this->clinical_history->get();
return $query->result();
}

public function ver_area($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('areas');
  $this->clinical_history->where('id_ar',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function get_centro($id){
$this->clinical_history->select("centro_medico");
  $this->clinical_history->from('patients_appointments');
  $this->clinical_history->where('id_p_a',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function RendezVous($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->where('id_patient',$id);
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}



public function RendezVousByCentro($id,$id2){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->where('id_patient',$id);
  $this->clinical_history->where('centro',$id2);
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}



public function RendezVousBySearch($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->where('id_patient',$id);
 $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}




public function Search_factura($val){
  $this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  if($val['doctor'] !=0){
  $this->clinical_history->where('doctor',$val['doctor']);
  }else{
	   $this->clinical_history->where('centro',$val['centro_medico']);
  }
  $this->clinical_history->where('id_patient',$val['id_patient']);
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function facturaSinCita($val){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura2');
   $this->clinical_history->where('id_rdv','fac');
   if($val['doctor'] !=0){
  $this->clinical_history->where('medico',$val['doctor']);
   }else{
	$this->clinical_history->where('centro_medico',$val['centro_medico']);   
   }
  $this->clinical_history->where('paciente',$val['id_patient']);
  $this->clinical_history->order_by('idfacc', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function RendezVousDoc($val){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->where('doctor',$val['doctor']);
  $this->clinical_history->where('id_patient',$val['id_patient']);
  $this->clinical_history->where('cancelar',0);
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function RendezVousDocUser($doc){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->where('id_patient',$doc['id_patient']);
  $this->clinical_history->where('doctor',$doc['doctor']);
   $this->clinical_history->where('centro',$doc['centro']);
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function get_patient_for_billing($id){
$this->clinical_history->select("centro,area,id_patient,doctor");
  $this->clinical_history->from('rendez_vous');
// $this->clinical_history->join('patients_appointments', 'rendez_vous.id_apoint= patients_appointments.id_p_a');
  $this->clinical_history->where('id_apoint',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function getConfirmSolicitudByDoc($doc){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->where('confirmada',0);
   $this->clinical_history->where('fecha_propuesta',date("d-m-Y"));
   $this->clinical_history->where('doctor',$doc);
  $this->clinical_history->where('cancelar',0);
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function getConfirmSolicitud(){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->where('confirmada',0);
   $this->clinical_history->where('fecha_propuesta',date("d-m-Y"));
  $this->clinical_history->where('cancelar',0);
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function getPatients(){
$this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
  $this->clinical_history->where('confirmada1',0);
  $this->clinical_history->order_by('id_p_a', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function getPatientsDoc($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->where('doctor',$id);
  $this->clinical_history->group_by('id_patient');
  $this->clinical_history->order_by('id_patient', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}



public function historial_medical($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
 $this->clinical_history->where('id_p_a',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function get_centro_medico($centro_medico){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
 $this->clinical_history->where('centro', $centro_medico);
  $query = $this->clinical_history->get();
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


public function get_centro_medico_datepicker($data) {
$condition = "filter_date  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
$this->clinical_history->select('*');
$this->clinical_history->from('rendez_vous');
$this->clinical_history->where($condition);
$this->clinical_history->where('centro', $data['centro']);
$query = $this->clinical_history->get();
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


 function getCountries()
    {
        $query = $this->clinical_history->query('SELECT  short_name FROM countries');
        return $query->result();

    }

	function getCausa()
    {
        $query = $this->clinical_history->query('SELECT  * FROM type_reasons');
        return $query->result();

    }
	//province link
	function getProvinces(){
		$this->clinical_history->select('id,title');
		$this->clinical_history->from('provinces');
		$this->clinical_history->order_by('title', 'desc');
		$query=$this->clinical_history->get();
		return $query->result();
	}
	function messageToDoc($id_area){
		$this->clinical_history->select('idsm,message,insert_time');
		$this->clinical_history->from('sendmessage');
		$this->clinical_history->where('id_area',$id_area);
		$query=$this->clinical_history->get();
		return $query->result();
	}

	function getData($loadType,$loadId){
		if($loadType=="municipio"){
			$fieldList='id_town,title_town as name';
			$table='townships';
			$fieldName='province_id_town';
			$orderByField='title_town';
		}

		$this->clinical_history->select($fieldList);
		$this->clinical_history->from($table);
		$this->clinical_history->where($fieldName, $loadId);
		$this->clinical_history->order_by($orderByField, 'asc');
		$query=$this->clinical_history->get();
		return $query;
	}

	//especialidad y doctors links

	function getEspecialidades(){
		$this->clinical_history->select('id_ar,title_area');
		$this->clinical_history->from('areas');
		$this->clinical_history->order_by('title_area', 'asc');
		$query=$this->clinical_history->get();
		return $query->result();

	}




public function get_input($seguro_medico)  {
  $this->clinical_history->select('name');
  $this->clinical_history->from('fields');
  $this->clinical_history->join('medical_insurances_fields', 'fields.id= medical_insurances_fields.field_id');
  $this->clinical_history->where('medical_insurance_id',$seguro_medico);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function GET_NAMEF($idpatient)  {
 $this->clinical_history->select('input_name,inputf');
  $this->clinical_history->from('saveinput');
  $this->clinical_history->where('patient_id',$idpatient);
  $query = $this->clinical_history->get();
  return $query->result();
}




public function getPatientPhoto($val)  {
$this->clinical_history->select('photo,nombre');
$this->clinical_history->from('patients_appointments');
$this->clinical_history->where('id_p_a',$val);
 $query = $this->clinical_history->get();
 return $query->result();

}


public function getPatientNameOnSelectAdm($patient_nombres)  {
$this->clinical_history->select('*');
$this->clinical_history->from('patients_appointments');
$this->clinical_history->like('nombre',$patient_nombres);
 //$this->clinical_history->where('apellido',$patient_apellido);
 $query = $this->clinical_history->get();
 return $query->result();

}

 public function save_patient($data) {
        $this->clinical_history->insert('patients_appointments', $data);
		 $insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
     }

	 public function save_rendevous($data) {
        $this->clinical_history->insert('rendez_vous', $data);
		$insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
    }

	 public function saveInput($data) {
        $this->clinical_history->insert('saveinput', $data);

    }

public function get_seguro_name($seguro_name)  {
$result = $this->clinical_history->query("SELECT title from seguro_medico where id_sm= $seguro_name")->row_array();
return $result['title'];

}

public function get_provincia_name($provincia_id)  {
$result = $this->clinical_history->query("SELECT title from provinces where id= $provincia_id")->row_array();
return $result['title'];

}

//public function get_municipio_name($municipio_id)  {
//$result = $this->clinical_history->query("SELECT title_town from townships where id_town= $municipio_id")->row_array();
//return $result['title_town'];

//}

/*public function get_doctor_name($doctor_id)  {
$result = $this->clinical_history->query("SELECT first_name, last_name from doctors where id= $doctor_id")->row_array();
return $result['first_name'] . '' . $result['last_name'];

}*/

public function get_especialidad_name($especialidad_id)  {
$result = $this->clinical_history->query("SELECT title_area from areas where id_ar= $especialidad_id")->row_array();
return $result['title_area'];

}




 public function save_seguro_medico($data) {
        // Inserting into your table
        $this->clinical_history->insert('medical_centers', $data);
        // Return the id of inserted row
        return $id = $this->clinical_history->insert_id();
    }

 public function saveMedicalCenterWithEspAndSeg($data) {
        // Inserting into your table
        $this->clinical_history->insert('medial_center_with_esp_seg', $data);
        // Return the id of inserted row
        return $id= $this->clinical_history->insert_id();
    }

 function display_all_medical_centers()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('medical_centers');
$this->clinical_history->where('activate',0);
$this->clinical_history->order_by('id_m_c', 'DESC');
$query = $this->clinical_history->get();
 return $query->result();
   }

	public function display_centro_medical_esp($id_medical_center)
	{
$this->clinical_history->select('*');
    $this->clinical_history->from('medial_center_esp');
    $this->clinical_history->join('areas', ' medial_center_esp.especialidad= areas.id_ar');
	$this->clinical_history->where('id_medical_center',$id_medical_center);
    $query = $this->clinical_history->get();
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
$this->clinical_history->select('*');
    $this->clinical_history->from('seguro_medico');
    $this->clinical_history->join('medical_centro_seguro', 'seguro_medico.id_sm = medical_centro_seguro.seguro_id');
	$this->clinical_history->where('id_medical_center',$id_medical_center);
	$this->clinical_history->where('activate',0);
    $query = $this->clinical_history->get();
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
        $query = $this->clinical_history->query('SELECT  * FROM diaries');
        return $query->result();

    }

	/* public function save_doctor($data) {
        $this->clinical_history->insert('doctors', $data);
    }*/


 	public function get_doctor($id_medical_center)
	{

$this->clinical_history->select('*');
    $this->clinical_history->from('doctor_agenda_test');
    $this->clinical_history->join('users', 'users.id_user = doctor_agenda_test.id_doctor');
	$this->clinical_history->where('id_centro',$id_medical_center);
	$this->clinical_history->group_by('id_doctor');
    $query = $this->clinical_history->get();
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

$this->clinical_history->select('id_user,name,correo');
    $this->clinical_history->from('doctor_centro_medico');
    $this->clinical_history->join('users', 'users.id_user = doctor_centro_medico.id_doctor');
	$this->clinical_history->where('centro_medico',$id_centro);
	$this->clinical_history->group_by('id_doctor');
    $query = $this->clinical_history->get();
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
$this->clinical_history->select("*");
  $this->clinical_history->from('medical_centers');
 $this->clinical_history->where('id_m_c',$edit_id);
  $query = $this->clinical_history->get();
  return $query->result();
}

	public function get_especialidad($edit_id){
$this->clinical_history->select("especialidad");
  $this->clinical_history->from('medial_center_with_esp_seg');
 $this->clinical_history->where('id_medical_center',$edit_id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function edit_area($id,$data){
$this->clinical_history->where('id_ar', $id);
$this->clinical_history->update('areas', $data);
}

public function edit_causa($id,$data){
$this->clinical_history->where('id', $id);
$this->clinical_history->update('type_reasons', $data);
}
function display_all_areas()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('areas');
$this->clinical_history->order_by('id_ar', 'DESC');
$query = $this->clinical_history->get();
 return $query->result();
   }

   function display_all_reasons()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('type_reasons');
$this->clinical_history->order_by('id', 'DESC');
$query = $this->clinical_history->get();
 return $query->result();
   }

    public function save_area($data) {
        // Inserting into your table
        $this->clinical_history->insert('areas', $data);
        // Return the id of inserted row
     }


	 public function save_new_causa($data) {
        $this->clinical_history->insert('type_reasons', $data);

     }




	    public function save_disease($data) {
        // Inserting into your table
        $this->clinical_history->insert('type_reasons', $data);
        // Return the id of inserted row
     }






 public function delete_input($id){
  $this->clinical_history->where('patient_id', $id);
  $this->clinical_history->delete('saveinput');
}





	public function delete_area($id){
  $this->clinical_history->where('id_ar', $id);
  $this->clinical_history->delete('areas');
}


public function delete_causa($id){
  $this->clinical_history->where('id', $id);
  $this->clinical_history->delete('type_reasons');
}



public function delete_doctor_agenda($id_doc){
  $this->clinical_history->where('id_doctor', $id_doc);
  $this->clinical_history->delete('doctor_agenda');
}

	public function delete_doctor_centro($id_doc){
  $this->clinical_history->where('id_doctor', $id_doc);
  $this->clinical_history->delete('doctor_centro_medico');
}
	public function delete_doctor_centro2($id_cd){
  $this->clinical_history->where('id_cd', $id_cd);
  $this->clinical_history->delete('doctor_centro_medico');
}


public function delete_seguro_centro($id){
  $this->clinical_history->where('id_mcs', $id);
  $this->clinical_history->delete('medical_centro_seguro');
}

	public function delete_doctor_seguro($id_doc){
  $this->clinical_history->where('id_doctor', $id_doc);
  $this->clinical_history->delete('doctor_seguro');
}


	public function delete_centro_medico($id,$data){
  $this->clinical_history->where('id_m_c', $id);
 $this->clinical_history->update('medical_centers', $data);
}

	public function delete_centro_medico_doc($id){
  $this->clinical_history->where('centro_medico', $id);
  $this->clinical_history->delete('doctor_centro_medico');
}


public function delete_seguro_medico($id,$data){
 $this->clinical_history->where('id_sm', $id);
$this->clinical_history->update('seguro_medico', $data);
}

	public function delete_field($id){
  $this->clinical_history->where('id', $id);
  $this->clinical_history->delete('fields');
}

	public function delete_field_link($id){
  $this->clinical_history->where('field_id', $id);
  $this->clinical_history->delete('medical_insurances_fields');
}



	public function delete_seguro_medico_field($id_seguro){
  $this->clinical_history->where('medical_insurance_id', $id_seguro);
  $this->clinical_history->delete('medical_insurances_fields');
}

	public function DeleteDiaryDoctor($id){
  $this->clinical_history->where('id_d_ag', $id);
  $this->clinical_history->delete('doctor_agenda');
}

function display_all_seguro_medico()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('seguro_medico');
$this->clinical_history->order_by('id_sm');
$this->clinical_history->where('activate',0);
$query = $this->clinical_history->get();
 return $query->result();
   }

function all_seguro_tarif($val)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('seguro_medico');
 $this->clinical_history->join(' tarifarios', 'seguro_medico.id_sm =  tarifarios.id_seguro');
 $this->clinical_history->where('procedimiento',$val);
 $this->clinical_history->group_by('id_seguro');
$this->clinical_history->order_by('title');
$query = $this->clinical_history->get();
 return $query->result();
   }

   function all_provinces()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('provinces');
$this->clinical_history->order_by('id', 'DESC');
$query = $this->clinical_history->get();
 return $query->result();
   }

    function all_municipio()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('townships');
 $this->clinical_history->join('provinces', 'townships.province_id_town = provinces.id');
$this->clinical_history->order_by('id_town', 'DESC');
$query = $this->clinical_history->get();
 return $query->result();
   }

   public function edit_seguro_medico($id,$data){
$this->clinical_history->where('id_sm', $id);
$this->clinical_history->update('seguro_medico', $data);
}




  public function save_s_m($data) {
        // Inserting into your table
        $this->clinical_history->insert('seguro_medico', $data);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();


    }

	 public function saveDoctorCentroMedico($data) {
        // Inserting into your table
        $this->clinical_history->insert('doctor_centro_medico', $data);
        // Return the id of inserted row
        return $id= $this->clinical_history->insert_id();
    }



public function saveDoctorAgenda($data) {
        // Inserting into your table
        $this->clinical_history->insert('doctor_agenda_test', $data);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();
}

   function agend_result($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('doctor_agenda');
$this->clinical_history->where('id_doctor', $id);
  $this->clinical_history->order_by('day', 'asc');
$this->clinical_history->group_by('day');
$query = $this->clinical_history->get();
 return $query->result();
   }

public function update_doc_agenda($id,$save){
$this->clinical_history->where('id_d_ag', $id);
$this->clinical_history->update('doctor_agenda_test', $save);
}



public function update_doc_agenda_area($id,$save){
$this->clinical_history->where('id_doctor', $id);
$this->clinical_history->update('doctor_agenda', $save);
}
/*public function saveDoctorAgenda($data)
{
if (isset($data['agenda']) && is_array($data['agenda'])):
    foreach ( $data['agenda'] as $key=>$value ):
        $this->clinical_history->insert('doctor_agenda', array(
           'id_doctor'=>$data['iduser'],
		   'id_centro'=>$data['centro_medico'][$key],
           'agenda'=>$data['agenda'][$key],
		   'day'=>$data['day'][$key],
           'citas'=>$data['manana_citas'][$key] // assuming this are the same for all rows?
        ));
    endforeach;
endif;

 //$this->clinical_history->where('day', '');
  //$this->clinical_history->delete('doctor_agenda');
}*/











	public function SaveField($data) {
        $this->clinical_history->insert('fields', $data);
}



	public function saveDoctorSeguro($data) {
        // Inserting into your table
        $this->clinical_history->insert('doctor_seguro', $data);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();


    }

	public function sendMessageToMedico($id)
	{
	$this->clinical_history->select("id_user, name, title_area");
	$this->clinical_history->from('users');
	 $this->clinical_history->join('areas', 'areas.id_ar = users.area');
	$this->clinical_history->where('perfil','Medico');
	$this->clinical_history->where('id_user !=', $id);
	$this->clinical_history->order_by('title_area','asc');
	$query = $this->clinical_history->get();
	return $query->result();
	}


 public  function allMessReceived($id)
 {
$this->clinical_history->select("*");
  $this->clinical_history->from("chat_medico");
  $this->clinical_history->where('message_to', $id);
   $this->clinical_history->group_by('message_to');
   $this->clinical_history->order_by('stime', 'DESC');
  return $this->clinical_history->get();
 }


  public  function countMessReceived($id)
 {
 $this->clinical_history->select('id')->from('chat_medico')->where('message_to',$id)->where('seen',0);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}




  public  function search_fetch_medico_chat($query,$id)
 {
  $this->clinical_history->select("id_user, name, title_area, is_log_in, perfil");
  $this->clinical_history->from("users");
  $this->clinical_history->join('areas', 'areas.id_ar = users.area', 'left');
  $this->clinical_history->where('id_user !=', $id);
  $this->clinical_history->where('perfil !=', 'Auditoria Medica');
  if($query != '')
  {
   $this->clinical_history->like('name', $query);
   $this->clinical_history->or_like('title_area', $query);
   $this->clinical_history->where('id_user !=', $id);
   $this->clinical_history->where('perfil !=', 'Auditoria Medica');
  }
  $this->clinical_history->order_by('is_log_in', 'DESC');
  return $this->clinical_history->get();
 }


 public function searchPlazo($query){
  $this->clinical_history->select('id_user, name, perfil, plazo');
  $this->clinical_history->from('users');
   $this->clinical_history->where('perfil !=', 'Admin');
    if($query != '')
  {
   $this->clinical_history->like('name', $query);
  }
   $this->clinical_history->order_by('plazo', 'desc');
 $query = $this->clinical_history->get();
 return $query->result();
}



public function get_doc_esp_tarif($id_esp)
	{
	$this->clinical_history->select("id_user, name");
	$this->clinical_history->from('users');
	$this->clinical_history->join('doctor_agenda_test', 'doctor_agenda_test.id_doctor = users.id_user');
	$this->clinical_history->where('area',$id_esp);
	$this->clinical_history->group_by('id_doctor');
	$query = $this->clinical_history->get();
	return $query->result();
	}


	public function get_doc_esp($id_esp,$id_centro)
	{
	$this->clinical_history->select("id_user, name");
	$this->clinical_history->from('users');
	$this->clinical_history->join('doctor_agenda_test', 'doctor_agenda_test.id_doctor = users.id_user');
	$this->clinical_history->where('area',$id_esp);
	$this->clinical_history->where('id_centro',$id_centro);
	$this->clinical_history->where('active',0);
	$this->clinical_history->group_by('id_doctor');
	$query = $this->clinical_history->get();
	return $query->result();
	}


	public function get_doc_esp_($id_centro,$id_user)
	{
	$this->clinical_history->select("id_user, name");
	$this->clinical_history->from('users');
	$this->clinical_history->join('doctor_agenda_test', 'doctor_agenda_test.id_doctor = users.id_user');
	$this->clinical_history->where('id_user',$id_user);
	$this->clinical_history->where('id_centro',$id_centro);
	$this->clinical_history->where('active',0);
	$this->clinical_history->group_by('id_doctor');
	$query = $this->clinical_history->get();
	return $query->result();
	}








public function view_doctor($id_doctor)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('users');
$this->clinical_history->where('id_user',$id_doctor);
  $query = $this->clinical_history->get();
  return $query->result();
}





public function view_field($id_field)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('fields');
  $this->clinical_history->where('id',$id_field);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function view_field_seguro($id_field)
	{

$this->clinical_history->select('medical_insurance_id');
  $this->clinical_history->from('medical_insurances_fields');
  $this->clinical_history->where('field_id',$id_field);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function edit_field_seguro($id_field)
	{

$this->clinical_history->select('medical_insurance_id');
  $this->clinical_history->from('medical_insurances_fields');
  $this->clinical_history->where('field_id',$id_field);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function all_fields()
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('fields');
  $query = $this->clinical_history->get();
  return $query->result();
}
public function view_municipio($id)
	{
		$this->clinical_history->select('*');
$this->clinical_history->from('townships');
 $this->clinical_history->join('provinces', 'townships.province_id_town = provinces.id');
$this->clinical_history->where('id_town',$id);
$this->clinical_history->order_by('id_town', 'desc');
$query = $this->clinical_history->get();
 return $query->result();

}
public function view_doctor_agenda($id_doctor)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('doctor_agenda');
  $this->clinical_history->where('id_doctor',$id_doctor);
  $this->clinical_history->order_by('agenda', 'asc');
  $query = $this->clinical_history->get();
  return $query->result();
}



 public function AddDiaryDoctor($data) {
        // Inserting into your table
        $this->clinical_history->insert('doctor_agenda', $data);
        // Return the id of inserted row
        return $id = $this->clinical_history->insert_id();


    }



public function view_doctor_seguro($id_doctor)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('doctor_seguro');
  $this->clinical_history->join('seguro_medico', 'doctor_seguro.seguro_medico = seguro_medico.id_sm');
  $this->clinical_history->where('id_doctor',$id_doctor);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function diary($id_diary)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('diaries');
  $this->clinical_history->where('id',$id_diary);
  $query = $this->clinical_history->get();
  return $query->result();
}





public function view_doctor_centro($id_doctor)
	{
   $this->clinical_history->select("id_doctor,name,id_m_c");
  $this->clinical_history->from('doctor_agenda_test');
  $this->clinical_history->join('medical_centers', 'doctor_agenda_test.id_centro = medical_centers.id_m_c');
  $this->clinical_history->where('id_doctor',$id_doctor);
  $this->clinical_history->where('active',0);
  $this->clinical_history->group_by('id_centro');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function view_doctor_seguro_as($id)
	{

$this->clinical_history->select("id_sm,title");
  $this->clinical_history->from('seguro_medico');
  $this->clinical_history->join('medical_centro_seguro', 'medical_centro_seguro.seguro_id = seguro_medico.id_sm');
  $this->clinical_history->where('id_medical_center',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}







public function view_doctor_solicitud($id_doctor)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
  $this->clinical_history->join('patients_appointments', 'rendez_vous.id_patient = patients_appointments.id_p_a');
  $this->clinical_history->where('doctor',$id_doctor);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function getNec()
	{

$this->clinical_history->select("nec,id_p_a");
  $this->clinical_history->from('patients_appointments');
  $this->clinical_history->join('rendez_vous', 'rendez_vous.id_patient = patients_appointments.id_p_a');
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function view_provincia($id)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('provinces');
 // $this->clinical_history->join('townships', 'provinces.id = townships.province_id_town');
  //$this->clinical_history->limit(1);
  $this->clinical_history->where('id',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function view_provincia_direcion($id)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('directions');
   $this->clinical_history->join('provinces', 'directions.province_id = provinces.id');
    $this->clinical_history->join('townships', 'directions.township_id = townships.id_town');
  $this->clinical_history->where('province_id',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}



public function get_municipio_direcion($id)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('directions');
   $this->clinical_history->join('townships', 'directions.township_id = townships.id_town');
  $this->clinical_history->where('township_id',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}



public function view_provincia_centro($id)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('medical_centers');
  $this->clinical_history->where('provincia',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function view_muncipio_centro($id)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('medical_centers');
  $this->clinical_history->where('municipio',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}
 public function display_all_doctors()
    {
	$this->clinical_history->select("*");
  $this->clinical_history->from('users');
   $this->clinical_history->where('perfil', 'Medico');
  $this->clinical_history->order_by('id_user', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
   }


	function GetSeguroLink($id_field)
    {
   $this->clinical_history->select('id_sm,title,codigo');
  $this->clinical_history->from('medical_insurances_fields');
  $this->clinical_history->join('seguro_medico', 'medical_insurances_fields.medical_insurance_id = seguro_medico.id_sm');
  $this->clinical_history->where('field_id',$id_field);
  $query = $this->clinical_history->get();
        return $query->result();

    }

	function RelatedCentro($id)
    {
   $this->clinical_history->select('*');
  $this->clinical_history->from('medical_centro_seguro');
  $this->clinical_history->join('medical_centers', 'medical_centro_seguro.id_medical_center = medical_centers.id_m_c');
  $this->clinical_history->where('seguro_id',$id);
  //$this->clinical_history->where('id_medical_center !=',$id['id_medical_center']);
  $query = $this->clinical_history->get();
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
   $this->clinical_history->select('id_user, name, cell_phone, correo');
  $this->clinical_history->from('users');
   $this->clinical_history->where('area',$id_area);
  $query = $this->clinical_history->get();
        return $query->result();
   }

	function EditSeguroMedico($id_seguro)
    {
   $this->clinical_history->select('*');
  $this->clinical_history->from('seguro_medico');
  $this->clinical_history->where('id_sm',$id_seguro);
  $query = $this->clinical_history->get();
        return $query->result();

    }


	public function updateField($id_field,$data){
$this->clinical_history->where('id', $id_field);
$this->clinical_history->update('fields', $data);
}

public function updateSeguro($id_seguro,$data){
$this->clinical_history->where('id_sm', $id_seguro);
$this->clinical_history->update('seguro_medico', $data);
}


	public function saveSeguroField($data) {
        $this->clinical_history->insert('medical_insurances_fields', $data);

}

	public function deleteSeguroField($id_seguro){
  $this->clinical_history->where('medical_insurance_id', $id_seguro);
  $this->clinical_history->delete('medical_insurances_fields');
}

	public function deleteField($id_field){
  $this->clinical_history->where('field_id', $id_field);
  $this->clinical_history->delete('medical_insurances_fields');
}

public function deleteProvinceDirection($id){
  $this->clinical_history->where('id_prov', $id);
  $this->clinical_history->delete('directions');
}
public function deleteDoctorAgenda($id){
  $this->clinical_history->where('id_d_ag', $id);
  $this->clinical_history->delete('doctor_agenda');
}
public function Agendas(){
 $this->clinical_history->select('*');
  $this->clinical_history->from('diaries');
   $query = $this->clinical_history->get();
        return $query->result();
}
public function deleteProvinceCentro($id,$data){
 $this->clinical_history->where('id_m_c', $id);
$this->clinical_history->update('medical_centers', $data);
}

public function deleteMunicipioCentro($id,$data){
 $this->clinical_history->where('id_m_c', $id);
$this->clinical_history->update('medical_centers', $data);
}


public function getTownships(){
  $this->clinical_history->select('*');
  $this->clinical_history->from('townships');
 $query = $this->clinical_history->get();
 return $query->result();
}


	public function SaveUpdateCentroMedico($id_m_c,$data){
$this->clinical_history->where('id_m_c', $id_m_c);
$this->clinical_history->update('medical_centers', $data);
}



public function deleteCentroDoc($id_m_c){
  $this->clinical_history->where('centro_medico', $id_m_c);
  $this->clinical_history->delete('doctor_centro_medico');
}

public function deleteDocCentro($id_doc){
  $this->clinical_history->where('id_doctor', $id_doc);
  $this->clinical_history->delete('doctor_centro_medico');
}

public function SaveCentroDoc($saveC) {
        // Inserting into your table
        $this->clinical_history->insert('doctor_centro_medico', $saveC);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();
    }


public function SaveCentroEsp($saveE) {
        // Inserting into your table
        $this->clinical_history->insert('medial_center_esp', $saveE);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();
    }



	public function deleteCentroEsp($id_m_c){
  $this->clinical_history->where('id_medical_center', $id_m_c);
  $this->clinical_history->delete('medial_center_esp');
}


	public function deleteCentroSeguro($id_m_c){
  $this->clinical_history->where('id_medical_center', $id_m_c);
  $this->clinical_history->delete('medical_centro_seguro');
}

public function SaveCentroSeg($saveSe) {
        // Inserting into your table
        $this->clinical_history->insert('medical_centro_seguro', $saveSe);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();
    }



		public function deleteAgendaDoctor($id_doctor){
  $this->clinical_history->where('id_doctor', $id_doctor);
  $this->clinical_history->delete('doctor_agenda');
}


public function SaveAgendaDoctor($saveAD) {
        // Inserting into your table
        $this->clinical_history->insert('doctor_agenda', $saveAD);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();
    }


	public function DeleteDoctorCentro($id_cd){
  $this->clinical_history->where('id_cd', $id_cd);
  $this->clinical_history->delete('doctor_centro_medico');
}

public function DeleteDoctorSeguro($id_d_s){
  $this->clinical_history->where('id_d_s', $id_d_s);
  $this->clinical_history->delete('doctor_seguro');
}


function getDoctorForUpdate($edit_id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('users');
$this->clinical_history->where('id_user',$edit_id);
$query = $this->clinical_history->get();
 return $query->result();
   }


   	public function deleteDocSeg($id_doc){
  $this->clinical_history->where('id_doctor', $id_doc);
  $this->clinical_history->delete('doctor_seguro');
}


  	public function deleteDocAgenda($id_doc){
  $this->clinical_history->where('id_doctor', $id_doc);
  $this->clinical_history->delete('doctor_agenda');
}

public function SaveDocSeg($saveSe) {
        // Inserting into your table
        $this->clinical_history->insert('doctor_seguro', $saveSe);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();
    }

	public function SaveDocAgenda($saveSe) {
        // Inserting into your table
        $this->clinical_history->insert('doctor_agenda', $saveSe);
        // Return the id of inserted row
        return $id_cita = $this->clinical_history->insert_id();
    }

	 public function CreateUser($data) {
        // Inserting into your table
        $this->clinical_history->insert('users', $data);
        // Return the id of inserted row
        return $id = $this->clinical_history->insert_id();
    }


	 public function SaveAsistenteCentro($data) {
        // Inserting into your table
        $this->clinical_history->insert('asistent_medico_centro', $data);
        // Return the id of inserted row
        return $id = $this->clinical_history->insert_id();
    }

 public function SaveMessage($save) {
        // Inserting into your table
        $this->clinical_history->insert('sendmessage', $save);
		$insert_id = $this->clinical_history->insert_id();
		return  $insert_id;
    }



public function docSendMessageDoc($save) {
$this->clinical_history->insert('chat_medico', $save);
$insert_id = $this->clinical_history->insert_id();
return  $insert_id;
}






public function DeleteMessage($idm){
  $this->clinical_history->where('id', $idm);
  $this->clinical_history->delete('chat_medico');
}

public function DeleteMessageSent($idm){
  $this->clinical_history->where('id_msg', $idm);
  $this->clinical_history->delete('doctors_message_view');
}




function medicamentos()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('medicaments');
 $this->clinical_history->order_by('id', 'desc');
$query = $this->clinical_history->get();
 return $query->result();
   }


   function search_medic($val)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('medicaments');
$this->clinical_history->like('name',$val);
 $this->clinical_history->order_by('id', 'desc');
$query = $this->clinical_history->get();
 return $query->result();
   }



   function Presentacion()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('presentacion');
 $this->clinical_history->order_by('id_pres', 'desc');
$query = $this->clinical_history->get();
 return $query->result();

   }

   function frecuencia()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('medical_frecuencies');
$query = $this->clinical_history->get();
 return $query->result();
   }

     function via()
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('medical_via');
$query = $this->clinical_history->get();
 return $query->result();
   }

     function farmacia()
    {
	$this->clinical_history->select('id,noma');
$this->clinical_history->from('drug_stores');
$query = $this->clinical_history->get();
 return $query->result();
   }

     function branches()
    {
	$this->clinical_history->select('id, drug_store_id, branch_name');
$this->clinical_history->from('drug_store_branches');
$query = $this->clinical_history->get();
 return $query->result();
   }

      function estudios()
    {
	$this->clinical_history->select('id,name');
$this->clinical_history->from('type_studies');
$query = $this->clinical_history->get();
 return $query->result();
   }

       function cuerpo()
    {
	$this->clinical_history->select('id,name');
$this->clinical_history->from('type_body_parts');
$query = $this->clinical_history->get();
 return $query->result();
   }

  /* function farmaciaName($farmacia_id)
    {
$result = $this->clinical_history->query("SELECT drug_store_name from drug_stores where id= $farmacia_id")->row_array();
return $result['drug_store_name'];

   }

    function branchName($farmacia_id)
    {
$result = $this->clinical_history->query("SELECT branch_name from drug_store_branches where drug_store_id= $farmacia_id")->row_array();
return $result['branch_name'];

   }
   */
   public function SaveFormIndicaciones($save) {
        $this->clinical_history->insert('h_c_indicaciones_medicales', $save);
				$insert_id = $this->clinical_history->insert_id();
        return  $insert_id;

    }

	public function IndicacionesPrevias($historial_id,$centro){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_indicaciones_medicales');
  $this->clinical_history->where('historial_id',$historial_id);
    $this->clinical_history->where('centro',$centro);
  $this->clinical_history->order_by('id_i_m', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}

	public function ordMedRecetas($historial_id,$operator){
  $this->clinical_history->select('*');
  $this->clinical_history->from('orden_medica_recetas');
  $this->clinical_history->where('historial_id',$historial_id);
   $this->clinical_history->where('operator',$operator);
  $this->clinical_history->order_by('id_i_m', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}





public function patient_med_audit($historial_id){
$this->clinical_history->select('*,count(medica) as Total');
$this->clinical_history->from('h_c_indicaciones_medicales');
 $this->clinical_history->where('historial_id',$historial_id);
$this->clinical_history->group_by('medica');
$query = $this->clinical_history->get();
 return $query->result();
}

	public function print_recetas($id,$col){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_indicaciones_medicales');
  $this->clinical_history->where($col,1);
    $this->clinical_history->where('historial_id',$id);
	$this->clinical_history->limit(6);
  $this->clinical_history->order_by('id_i_m', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}



	public function print_indicaciones($id,$col,$table){
  $this->clinical_history->select('*');
  $this->clinical_history->from($table);
  $this->clinical_history->where($col,1);
    $this->clinical_history->where('historial_id',$id);
	//$this->clinical_history->limit(6);
 // $this->clinical_history->order_by('id_i_m', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}





public function print_recetas_for_patient($id){
$this->clinical_history->select('*');
$this->clinical_history->from('h_c_indicaciones_medicales');
$this->clinical_history->where('encrypt_recetas',$id);
$query = $this->clinical_history->get();
return $query->result();
}






	public function print_recetas_ord_med($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('orden_medica_recetas');
  $this->clinical_history->where('singular_id',1);
    $this->clinical_history->where('historial_id',$id);
	$this->clinical_history->limit(6);
  $this->clinical_history->order_by('id_i_m', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}

	public function print_recetas_email_patient($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_indicaciones_medicales');
  $this->clinical_history->like('insert_date',date('Y-m-d'));
    $this->clinical_history->where('historial_id',$id);
	$this->clinical_history->limit(6);
  $this->clinical_history->order_by('id_i_m', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}


     function Printlaboratorios_email_patient($id)
    {
	$this->clinical_history->select('laboratory');
$this->clinical_history->from('h_c_indications_labs');
 $this->clinical_history->like('insert_time',date('Y-m-d'));
  $this->clinical_history->where('historial_id',$id);
 $this->clinical_history->order_by('id_lab','asc');
$query = $this->clinical_history->get();
 return $query->result();
   }


	public function Recetas1($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_indicaciones_medicales');
  $this->clinical_history->where('id_i_m',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}


function Countsingular(){

    $this->clinical_history->select('historial_id')->from('h_c_indicaciones_medicales')->where('singular_id',1);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}
	public function UpdateSingularId($id,$value){
$this->clinical_history->where('historial_id',$id);
$this->clinical_history->update('h_c_indicaciones_medicales',$value);
}
public function GetAnte1($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_marque_positivo');
  $this->clinical_history->where('historial_id',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}

public function showAnte($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_marque_positivo');
  $this->clinical_history->where('historial_id',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}
public function showDrug($historial_id){
  $this->clinical_history->select('name');
  $this->clinical_history->from('h_c_droga');
  $this->clinical_history->where('id_patient',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}


public function showDesarollo($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_desarollo');
  $this->clinical_history->where('historial_id',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}
public function GetAntOtros($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ante_otros');
  $this->clinical_history->where('historial_id',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}

public function GetHabitos($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_habitos_toxicos');
  $this->clinical_history->where('historial_id',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}





function hist_count($historial_id){

    $this->clinical_history->select('historial_id')->from('h_c_indicaciones_medicales')->where('historial_id', $historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}


function hist_count_recetas($historial_id,$centro){

    $this->clinical_history->select('historial_id')->from('h_c_indicaciones_medicales')->where('historial_id', $historial_id)->where('centro',$centro);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}




function CountHabitos($historial_id){

    $this->clinical_history->select('historial_id')->from('h_c_habitos_toxicos')->where('historial_id', $historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}




 public function SaveFormIndicacionesEstudios($save) {
        $this->clinical_history->insert('h_c_indicaciones_estudio', $save);

    }

public function IndicacionesPreviasEs($historial_id){
$this->clinical_history->select('*');
$this->clinical_history->from('h_c_indicaciones_estudio');
$this->clinical_history->where('historial_id',$historial_id);
$this->clinical_history->order_by('id_i_e', 'asc');
$query = $this->clinical_history->get();
return $query->result();
}


public function patEstudios($historial_id,$id){
$this->clinical_history->select('*');
$this->clinical_history->from('h_c_indicaciones_estudio');
$this->clinical_history->where('historial_id',$historial_id);
$this->clinical_history->where('emergency',$id);
$this->clinical_history->order_by('id_i_e', 'desc');
$query = $this->clinical_history->get();
return $query->result();
}






function hist_count_es($historial_id){

    $this->clinical_history->select('id_i_e')->from('h_c_indicaciones_estudio');
	 $this->clinical_history->where('historial_id',$historial_id);
   $q = $this->clinical_history->get();
    return $q->num_rows();
}



     function IndicacionesLab($historial_id)
    {
	$this->clinical_history->select('id_lab, laboratory, operator, insert_time, updated_by,updated_time,printing');
$this->clinical_history->from('h_c_indications_labs');
 $this->clinical_history->where('historial_id',$historial_id);
 $this->clinical_history->order_by('id_lab','asc');
$query = $this->clinical_history->get();
 return $query->result();
   }



     function patLab($historial_id,$id_em,$centro)
    {
	$this->clinical_history->select('id_lab, laboratory, operator, insert_time, updated_by,updated_time,printing');
$this->clinical_history->from('h_c_indications_labs');
 $this->clinical_history->where('historial_id',$historial_id);
 $this->clinical_history->where('centro',$centro);
  $this->clinical_history->where('emergency',$id_em);
 $this->clinical_history->order_by('id_lab','DESC');
$query = $this->clinical_history->get();
 return $query->result();
   }

    function patLabAjax($historial_id,$id_em, $limit, $start, $search, $count)
    {
	$this->clinical_history->select('id_lab, laboratory, operator, insert_time, updated_time,printing, h_c_indications_labs.updated_by as updated_by');
$this->clinical_history->from('h_c_indications_labs');
$this->clinical_history->join('users', 'users.id_user = h_c_indications_labs.operator');
		
 $this->clinical_history->where('historial_id',$historial_id);
  $this->clinical_history->where('emergency',$id_em);
if($search){
			$keyword = $search['keyword'];
			if($keyword){
				$this->clinical_history->where("name LIKE '%$keyword%'");
			}
		}
		
		if($count){
			return $this->clinical_history->count_all_results();
		}
		
else{
 $this->clinical_history->order_by('id_lab','DESC');
    $this->clinical_history->limit($limit, $start);
$query = $this->clinical_history->get();
 return $query->result();
}
   }




       function Printlaboratorios($print)
    {
	$this->clinical_history->select('id_lab, laboratory, operator, insert_time, updated_by,updated_time,user_id');
$this->clinical_history->from('h_c_indications_labs');
 $this->clinical_history->where('historial_id',$print['historial_id']);
  $this->clinical_history->where('printing',$print['print']);
  $this->clinical_history->where('user_id',$print['user_id']);
 $this->clinical_history->order_by('id_lab','asc');
$query = $this->clinical_history->get();
 return $query->result();
   }


        function PrintlaboratoriosAdmin($print)
    {
	$this->clinical_history->select('id_lab, laboratory, operator, insert_time, updated_by,updated_time,user_id');
$this->clinical_history->from('h_c_indications_labs');
 $this->clinical_history->where('historial_id',$print['historial_id']);
  $this->clinical_history->where('printing',$print['print']);
 $this->clinical_history->order_by('id_lab','asc');
$query = $this->clinical_history->get();
 return $query->result();
   }





    function get_lab_name($data1)
    {
$this->clinical_history->select('insert_time,operator');
$this->clinical_history->from('h_c_indications_labs');
 $this->clinical_history->where('historial_id',$data1['id_patient']);
 $this->clinical_history->where('laboratory',$data1['lab_id']);
$query = $this->clinical_history->get();
 return $query->result();
	}

   function get_med_name($data1)
    {
$this->clinical_history->select('*');
$this->clinical_history->from('h_c_indicaciones_medicales');
 $this->clinical_history->where('historial_id',$data1['id_patient']);
$this->clinical_history->where('medica',$data1['med_name']);
$query = $this->clinical_history->get();
 return $query->result();
	}

   function patient_lab_audit($historial_id)
  {
$this->clinical_history->select('insert_time,laboratory,count(laboratory) as Total');
$this->clinical_history->from('h_c_indications_labs');
 $this->clinical_history->where('historial_id',$historial_id);
$this->clinical_history->group_by('laboratory');
$query = $this->clinical_history->get();
 return $query->result();
   }

  function hist_count_lab($historial_id){

    $this->clinical_history->select('id_lab')->from('h_c_indications_labs');
	 $this->clinical_history->where('historial_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}

  function laboratories()
    {
	$this->clinical_history->select('id,name');
$this->clinical_history->from('laboratories');
$query = $this->clinical_history->get();
 return $query->result();
   }



   function LabAjax($limit, $start, $search, $count)
    {
	$this->clinical_history->select('id,name');
$this->clinical_history->from('laboratories');
if($search){
			$keyword = $search['keyword'];
			if($keyword){
				$this->clinical_history->where("name LIKE '%$keyword%'");
			}
		}
		
		if($count){
			return $this->clinical_history->count_all_results();
		}
		
else{
 $this->clinical_history->order_by('name','DESC');
    $this->clinical_history->limit($limit, $start);
$query = $this->clinical_history->get();
 return $query->result();
}
   }




function Enfermedad($historial_id)
    {
$this->clinical_history->select('*');
$this->clinical_history->from('h_c_enfermedad_actual');
$this->clinical_history->where('historial_id',$historial_id);
$this->clinical_history->where('id_triaje',0);
$this->clinical_history->group_by('filter_date');
$this->clinical_history->order_by('id_enf', 'DESC');
$query = $this->clinical_history->get();
 return $query->result();
   }


   function get_serv_fac2($id_user,$perfil)
    {
$this->clinical_history->select('area');
$this->clinical_history->from('factura2');
 if($perfil=="Asistente Medico"){
$this->clinical_history->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->clinical_history->where('id_doctor',$id_user);
 } else {
 $this->clinical_history->where('medico',$id_user);
 }
$this->clinical_history->group_by('area');
$query = $this->clinical_history->get();
 return $query->result();
}



 function get_serv_fac2_doc($id)
    {
$this->clinical_history->select('area');
$this->clinical_history->from('factura2');
$this->clinical_history->where('medico',$id);
$this->clinical_history->group_by('area');
$query = $this->clinical_history->get();
 return $query->result();
}

function tarif_by_area($id)
{
$this->clinical_history->select('id_tarif,codigo,simon,procedimiento,title_area,id_categoria');
$this->clinical_history->from('tarifarios');
$this->clinical_history->join('areas', 'tarifarios.id_categoria= areas.id_ar');
$this->clinical_history->where('id_tarif',$id);
$query = $this->clinical_history->get();
return $query->result();
}


function tarifarios_by_seguros($id)
{
$this->clinical_history->select('id_tarif,codigo,simon,procedimiento,id_seguro,monto');
$this->clinical_history->from('tarifarios');
 $this->clinical_history->join('seguro_medico', 'tarifarios.id_seguro = seguro_medico.id_sm');
$this->clinical_history->where('procedimiento',$id);
$this->clinical_history->group_by('id_seguro');
$query = $this->clinical_history->get();
return $query->result();
}

function get_tarifario($id)
{
$this->clinical_history->select('monto,codigo,simon');
$this->clinical_history->from('tarifarios');
$this->clinical_history->where('id_tarif',$id);
$query = $this->clinical_history->get();
return $query->result();
}





	 public function SaveFormIndicacionesLab($save) {
        $this->clinical_history->insert('h_c_indications_labs', $save);
		$insert_id = $this->clinical_history->insert_id();
        return  $insert_id;

    }

//--------------------------------------------------------------

 function count_ht($historial_id){

    $this->clinical_history->select('id')->from('h_c_habitos_toxicos');
	$this->clinical_history->where('historial_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}

 public function saveHabitosToxicos($save4) {
 $this->clinical_history->insert('h_c_habitos_toxicos', $save4);
          $insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
  }

public function habitosToxicos($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_habitos_toxicos');
  $this->clinical_history->where('historial_id',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}

//---------------------------------------------------------
 function countAnte1($historial_id){

    $this->clinical_history->select('id')->from('h_c_marque_positivo');
	$this->clinical_history->where('historial_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}

 function countHabitosToxicos($historial_id){

    $this->clinical_history->select('id')->from('h_c_habitos_toxicos');
	$this ->clinical_history->where('historial_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}


 function countPediatry($historial_id){

    $this->clinical_history->select('id')->from('h_c_ant_pedia');
	$this ->clinical_history->where('hist_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}


 function countVacunation($historial_id){

    $this->clinical_history->select('id')->from('h_c_vacunation_new');
	$this ->clinical_history->where('hist_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}

 function countAntOtros($historial_id){
$this->clinical_history->select('id')->from('h_c_ante_otros');
$this ->clinical_history->where('historial_id',$historial_id);
$q = $this->clinical_history->get();
return $q->num_rows();
}

 public function DeleteAntOtros($id){
$this->clinical_history->where('id',$id);
$this->clinical_history->delete('h_c_ante_otros');
}



 public function DeleteEmptyHabitosToxicos($id){
$this->clinical_history->where('id',$id);
$this->clinical_history->delete('h_c_habitos_toxicos');
}


 function countSSR($historial_id){

    $this->clinical_history->select('idssr')->from('h_c_ant_ssr');
	$this->clinical_history->where('hist_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}


public function getSSR($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_ssr');
  $this->clinical_history->where('hist_id',$historial_id);
  $this->clinical_history->order_by('idssr', 'DESC');
 $query = $this->clinical_history->get();
 return $query->result();
}

//------------------------------------------------------------
public function saveAntssr($save1) {
 $this->clinical_history->insert('h_c_ant_ssr', $save1);
 }

 public function DeleteEmptySSR($historial_id){
  $this->clinical_history->where('optradio', '');
   $this->clinical_history->where('edad', '');
    $this->clinical_history->where('sexual', '');
$this->clinical_history->where('califica', '');
$this->clinical_history->where('califica_text', '');
	$this->clinical_history->where('hist_id', $historial_id);
	 $this->clinical_history->delete('h_c_ant_ssr');
}
//------------------------------------------------------------


  public function DeleteDuplicateMarqueP($id){
 $this->clinical_history->where('id', $id);
$this->clinical_history->delete('h_c_marque_positivo');
}

  public function marquePositivo($save) {
$this->clinical_history->insert('h_c_marque_positivo', $save);
$insert_id = $this->clinical_history->insert_id();
return  $insert_id;
}

  public function saveAbuseSuspition($save2) {
$this->clinical_history->insert('h_c_abuse_suspition', $save2);
$insert_id = $this->clinical_history->insert_id();
return  $insert_id;
}

	function countAbuseSuspition($historial_id){
   $this->clinical_history->select('id')->from('h_c_abuse_suspition');
	$this->clinical_history->where('historial_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
	}

 public function deleteEmptyAbuseSuspition($id){
$this->clinical_history->where('id', $id);
$this->clinical_history->delete('h_c_abuse_suspition');
}

//--------------------------------------------------------------
public function saveAnteOtros($save3) {
$this->clinical_history->insert('h_c_ante_otros', $save3);
$insert_id = $this->clinical_history->insert_id();
return  $insert_id;
}



//--------------------------------------------------------------

	 public function saveEnfermedad($saveEnf) {
        $this->clinical_history->insert('h_c_enfermedad_actual', $saveEnf);
		$insert_id = $this->clinical_history->insert_id();
         return  $insert_id;

    }

	public function updateIndicacionesLab($updt,$id){
$this->clinical_history->where('historial_id ', $id);
$this->clinical_history->update('h_c_indications_labs', $updt);
}


	public function check_lab($checked,$id){
$this->clinical_history->where('id_lab', $id);
$this->clinical_history->update('h_c_indications_labs', $checked);
}



	public function check_recetas($checked,$id){
$this->clinical_history->where('id_i_m', $id);
$this->clinical_history->update('h_c_indicaciones_medicales', $checked);
}





	public function SaveUpEnfermedad($id_con,$s1){
$this->clinical_history->where('id', $id_con);
$this->clinical_history->update('h_c_enfermedad_actual', $s1);
}

	function count_ante_enf($historial_id){
   $this->clinical_history->select('id')->from('h_c_enfermedad_actual');
	$this ->clinical_history->where('historial_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
	}


//------------------------------------------------------------------

	 public function saveExamenFisico($data) {
        $this->clinical_history->insert('h_c_examen_fisico', $data);
		$insert_id = $this->clinical_history->insert_id();
        return  $insert_id;

    }



//------------------------------------------------------------------

	 public function saveUpExamenFisico($id,$save) {
		 $this->clinical_history->where('id_sig', $id);
        $this->clinical_history->update('h_c_examen_fisico', $save);

    }




public function ExamFisico($historial_id){
$this->clinical_history->select('*');
$this->clinical_history->from('h_c_examen_fisico');
$this->clinical_history->where('historial_id',$historial_id);
//$this->clinical_history->where('id_triaje',0);
$this->clinical_history->order_by('id_sig', 'DESC');
$query = $this->clinical_history->get();
return $query->result();
}


public function ExamFisById($id){
$this->clinical_history->select('*');
$this->clinical_history->from('h_c_examen_fisico');
$this->clinical_history->where('id_sig',$id);
$query = $this->clinical_history->get();
return $query->result();
}


//------------------------------------------------------------
	 public function saveExameneSistema($saveExamSis) {
        $this->clinical_history->insert('h_c_examen_sistema', $saveExamSis);

    }



	public function saveUpExameneSistema($id_con,$s1){
$this->clinical_history->where('id_exs', $id_con);
$this->clinical_history->update('h_c_examen_sistema', $s1);
}





	function count_examenes_sis($historial_id){
   $this->clinical_history->select('id_exs')->from('h_c_examen_sistema');
	$this ->clinical_history->where('historial_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
	}


		public function Examensis($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_examen_sistema');
  $this->clinical_history->where('historial_id',$historial_id);
  $this->clinical_history->order_by('id_exs', 'DESC');
 $query = $this->clinical_history->get();
 return $query->result();
}


	public function show_examsis_by_id($id_enf){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_examen_sistema');
  $this->clinical_history->where('id_exs',$id_enf);
 $query = $this->clinical_history->get();
 return $query->result();
}
//public function modifExamenesSis($historial_id,$saveExamSis){
//$this->clinical_history->where('historial_id', $historial_id);
//$this->clinical_history->update('examen_sistema', $saveExamSis);
//}



//-----------------------------------------------------------
	public function concluciones($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_conclusion_diagno');
 $this->clinical_history->where('historial_id',$historial_id);
$this->clinical_history->group_by('current_day');
  $this->clinical_history->order_by('id_cdia', 'desc');
 $query = $this->clinical_history->get();
 return $query->result();
}

public function saveConclucionDiag($saveConDia) {
	$this->clinical_history->insert('h_c_conclusion_diagno', $saveConDia);
	 $insert_id = $this->clinical_history->insert_id();
      return  $insert_id;
}

public function saveUpConclucionDiag($id_con,$s1){
$this->clinical_history->where('id_cdia', $id_con);
$this->clinical_history->update('h_c_conclusion_diagno', $s1);
}


//----------------------------------------------------------------
public function DeleteHistLab($id_lab){
  $this->clinical_history->where('id_lab', $id_lab);
  $this->clinical_history->delete('h_c_indications_labs');
}


public function DeleteHistLab2($val){
  $this->clinical_history->where('laboratory', $val['laboratory']);
  $this->clinical_history->where('user_id', $val['user_id']);
  $this->clinical_history->where('historial_id', $val['historial_id']);
  $this->clinical_history->where('printing2',1);
  $this->clinical_history->delete('h_c_indications_labs');
}




public function DeleteHistLabEmpty(){
  $this->clinical_history->where('laboratory',0);
  $this->clinical_history->delete('h_c_indications_labs');
}

//----------------------------------------------------------------
		public function DeleteRecetas($id_lab){
  $this->clinical_history->where('id_i_m', $id_lab);
  $this->clinical_history->delete('h_c_indicaciones_medicales');
}

//---------------------------------------------------------------
		public function delete_tutor($id){
  $this->clinical_history->where('id', $id);
  $this->clinical_history->delete('tutor');
}
//----------------------------------------------------------------
		public function DeleteEsudios($id_lab){
  $this->clinical_history->where('id_i_e', $id_lab);
  $this->clinical_history->delete('h_c_indicaciones_estudio');
}


public function show_enfermedad($id_enf)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_enfermedad_actual');
  $this->clinical_history->where('id',$id_enf);
   $query = $this->clinical_history->get();
  return $query->result();
}

public function print_enf_act($id)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_enfermedad_actual');
  $this->clinical_history->where('historial_id',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}



public function Diag_pres($val)  {
  $this->clinical_history->select('idd,description');
  $this->clinical_history->from('cied');
   $this->clinical_history->like('description',$val);
     $this->clinical_history->limit(10);
 $query = $this->clinical_history->get();
  return $query->result();
}



public function Diag_pro($val)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('type_diagnostic_procedures');
  $this->clinical_history->like('name',$val);
  $query = $this->clinical_history->get();
  return $query->result();
}





 public function saveProc($save) {
 $this->clinical_history->insert('type_diagnostic_procedures', $save);
 }


 public function SaveBillNum($data) {
      $this->clinical_history->insert('factura_num', $data);
	 $insert_id = $this->clinical_history->insert_id();
      return  $insert_id;
 }



public function deleteCondef($id_con){
$this->clinical_history->where('con_id_link', $id_con);
$this->clinical_history->delete('h_c_diagno_def_link_clown');
}



public function deleteCondef2(){
$this->clinical_history->where('diagno_def',0);
$this->clinical_history->delete('h_c_diagno_def_link_clown');
}


public function deleteConPro($id_con){
$this->clinical_history->where('cond_id_link', $id_con);
$this->clinical_history->delete('h_c_diagno_def_proc');
}


	 public function SaveConPro($savecp) {
        $this->clinical_history->insert('h_c_diagno_def_proc', $savecp);

    }

public function show_con_by_id($id_con,$origine){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_conclusion_diagno');
  $this->clinical_history->where('id_cdia',$id_con);
  $this->clinical_history->where('origine',$origine);
 $query = $this->clinical_history->get();
 return $query->result();
}



public function print_cond($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_conclusion_diagno');
  $this->clinical_history->where('historial_id',$id);
 $query = $this->clinical_history->get();
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
  $this->clinical_history->select('procedimiento');
  $this->clinical_history->from('h_c_diagno_def_proc');
  $this->clinical_history->where('cond_id_link',$id_con);
 $query = $this->clinical_history->get();
 return $query->result();
}

public function show_diagno_pro(){
  $this->clinical_history->select('*');
  $this->clinical_history->from('type_diagnostic_procedures');
 $query = $this->clinical_history->get();
 return $query->result();
}


public function Users(){
  $this->clinical_history->select('*');
  $this->clinical_history->from('users');
  $this->clinical_history->where('id_user !=',1);
   $this->clinical_history->order_by('is_log_in', 'desc');
 $query = $this->clinical_history->get();
 return $query->result();
}

public function DeactivarUser($id,$data){
$this->clinical_history->where('id_user', $id);
$this->clinical_history->update('users', $data);
}

public function DelAsistenteCentro($id){
  $this->clinical_history->where('iduser', $id);
  $this->clinical_history->delete('asistent_medico_centro');
}


public function print_estudio($id)  {
  $this->clinical_history->select('*');
 $this->clinical_history->from('h_c_indicaciones_estudio');
 $this->clinical_history->where('id_i_e',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function print_estudio_patient_search($id)  {
  $this->clinical_history->select('*');
 $this->clinical_history->from('h_c_indicaciones_estudio');
 $this->clinical_history->where('encrypt_estudio',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}



   public function getCitas(){
  $this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
 $this->clinical_history->where('confirmada',1);
  $this->clinical_history->order_by('id_apoint', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
 }

 public function VerSolicitud($id_sol){
  $this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
 $this->clinical_history->where('id_p_a',$id_sol);
  $query = $this->clinical_history->get();
  return $query->result();
 }

public function deleteSeguroFieldInPatient($idp){
$this->clinical_history->where('seguro_id', $idp);
$this->clinical_history->delete('saveinput');
}


public function deleteInput($idp){
$this->clinical_history->where('patient_id', $idp);
$this->clinical_history->delete('saveinput');
}


 public function selectOne(){
$this->clinical_history->select("name");
  $this->clinical_history->from('violencia_intraf_one');
   $query = $this->clinical_history->get();
  return $query->result();
}

 public function selectTwo(){
$this->clinical_history->select("name");
  $this->clinical_history->from('violencia_intraf_two');
   $query = $this->clinical_history->get();
  return $query->result();
}


 public function GinecOb(){
$this->clinical_history->select("name");
  $this->clinical_history->from('gineco_obstetricos');
   $query = $this->clinical_history->get();
  return $query->result();
}




 public function Cuello(){
$this->clinical_history->select("name");
  $this->clinical_history->from('cuello');
   $query = $this->clinical_history->get();
  return $query->result();
}


 public function saveAntePenatalMedicamento($save) {
        $this->clinical_history->insert('ante_prenatal_medicamento', $save);

    }


	 public function saveRehabilidad($save) {
        $this->clinical_history->insert('h_c_rehabilitacion', $save);

    }


	 public function DeleteEmptyRehab($historial_id){
$this->clinical_history->where('marcha_inicio', '');
$this->clinical_history->where('long_mov_der', '');
$this->clinical_history->where('long_mov_izq', '');
$this->clinical_history->where('long_simetria', '');
$this->clinical_history->where('long_fluidez', '');
$this->clinical_history->where('long_traject', '');
$this->clinical_history->where('long_tronco', '');
$this->clinical_history->where('long_postura', '');
$this->clinical_history->where('equi_sentado', '');
$this->clinical_history->where('equi_levantarse', '');
$this->clinical_history->where('equi_intentos', '');
$this->clinical_history->where('equi_biped1', '');
$this->clinical_history->where('equi_biped2', '');
$this->clinical_history->where('equi_emp', '');
$this->clinical_history->where('equi_ojos', '');
$this->clinical_history->where('equi_vuelta', '');
$this->clinical_history->where('equi_sentarse', '');
$this->clinical_history->where('eval_balsys', '');
$this->clinical_history->where('eval_movim', '');
$this->clinical_history->where('eval_monop', '');
$this->clinical_history->where('criteria_intens', '');
$this->clinical_history->where('criteria_cuidado1', '');
$this->clinical_history->where('levantar_peso', '');
$this->clinical_history->where('criteria_caminar', '');
$this->clinical_history->where('criteria_estar_sent', '');
$this->clinical_history->where('criteria_dormir', '');
$this->clinical_history->where('criteria_sexual', '');
$this->clinical_history->where('criteria_vida', '');
$this->clinical_history->where('id_historial', $historial_id);
$this->clinical_history->delete('h_c_rehabilitacion');
}



	function IfReabFound($historial_id){
   $this->clinical_history->select('id_rehab')->from('h_c_rehabilitacion');
	$this->clinical_history->where('id_historial',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
	}



	 public function showRehabilidad($historial_id){
$this->clinical_history->select("*");
  $this->clinical_history->from('h_c_rehabilitacion');
  $this->clinical_history->where('id_historial',$historial_id);
  $query = $this->clinical_history->get();
  return $query->result();
}

 public function saveOftalmologia($save) {
        $this->clinical_history->insert('h_c_oftalmologia', $save);

    }


		 public function showOftalmologia($historial_id){
$this->clinical_history->select("*");
  $this->clinical_history->from('h_c_oftalmologia');
  $this->clinical_history->where('id_historial',$historial_id);
  $query = $this->clinical_history->get();
  return $query->result();
}



function IfOftalFound($historial_id){
   $this->clinical_history->select('id_oftal')->from('h_c_oftalmologia');
	$this->clinical_history->where('id_historial',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
	}



public function Rehab($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_rehabilitacion');
  $this->clinical_history->where('id_historial',$historial_id);
  $this->clinical_history->order_by('id_rehab', 'DESC');
 $query = $this->clinical_history->get();
 return $query->result();
}

public function Oftal($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_oftalmologia');
  $this->clinical_history->where('id_historial',$historial_id);
  $this->clinical_history->order_by('id_oftal', 'DESC');
 $query = $this->clinical_history->get();
 return $query->result();
}
function countRehab($historial_id){
   $this->clinical_history->select('id_rehab')->from('h_c_rehabilitacion');
	$this->clinical_history->where('id_historial',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
	}



public function showRehabById($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_rehabilitacion');
  $this->clinical_history->where('id_rehab',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}


public function showOftalById($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_oftalmologia');
  $this->clinical_history->where('id_oftal',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}



public function SaveUpOftala($id,$data){
	$this->clinical_history->where('id_oftal', $id);
$this->clinical_history->update('h_c_oftalmologia', $data);
}


public function SaveUpConPrenatales1($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal1', $data);
}


public function SaveUpConPrenatales2($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal2', $data);
}


public function SaveUpConPrenatales3($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal3', $data);
}


public function SaveUpConPrenatales4($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal4', $data);
}


public function SaveUpConPrenatales5($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal5', $data);
}


public function SaveUpConPrenatales6($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal6', $data);
}


public function SaveUpConPrenatales7($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal7', $data);
}





public function SaveUpConPrenatales8($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal8', $data);
}


public function SaveUpConPrenatales9($id,$data){
	$this->clinical_history->where('id_c1', $id);
$this->clinical_history->update('h_c_control_prenatal9', $data);
}




 public function SaveConPrenatales2($save2) {
        $this->clinical_history->insert('h_c_control_prenatal2', $save2);
 }
 public function SaveConPrenatales($save) {
        $this->clinical_history->insert('h_c_control_prenatal1', $save);
 }
  public function SaveConPrenatales3($save3) {
        $this->clinical_history->insert('h_c_control_prenatal3', $save3);
 }

  public function SaveConPrenatales4($save4) {
        $this->clinical_history->insert('h_c_control_prenatal4', $save4);
 }

   public function SaveConPrenatales5($save5) {
        $this->clinical_history->insert('h_c_control_prenatal5', $save5);
 }


    public function SaveConPrenatales6($save6) {
        $this->clinical_history->insert('h_c_control_prenatal6', $save6);
 }

    public function SaveConPrenatales7($save7) {
        $this->clinical_history->insert('h_c_control_prenatal7', $save7);
 }
     public function SaveConPrenatales8($save8) {
        $this->clinical_history->insert('h_c_control_prenatal8', $save8);
 }

    public function SaveConPrenatales9($save9) {
        $this->clinical_history->insert('h_c_control_prenatal9', $save9);
 }

 function CountControPrenal($historial_id){

    $this->clinical_history->select('historial_id')->from('h_c_control_prenatal1')->where('historial_id', $historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}

function ControPrenal($historial_id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal1');
$this->clinical_history->where('historial_id',$historial_id);
$this->clinical_history->order_by('id_c1', 'asc');
$query = $this->clinical_history->get();
 return $query->result();
   }


   function showSelectContP1($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal1');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }

    function showSelectContP2($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal2');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }

    function showSelectContP3($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal3');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }

    function showSelectContP4($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal4');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }



    function showSelectContP5($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal5');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }


    function showSelectContP6($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal6');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }


    function showSelectContP7($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal7');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }

    function showSelectContP8($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal8');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }

    function showSelectContP9($id)
    {
	$this->clinical_history->select('*');
$this->clinical_history->from('h_c_control_prenatal9');
$this->clinical_history->where('id_c1',$id);
$query = $this->clinical_history->get();
 return $query->result();
   }


     public function DeleteEmptyControlPrenatal1(){
  $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  //$this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal1');
  }


  public function DeleteEmptyControlPrenatal2(){
  $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  $this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal2');
  }

  public function DeleteEmptyControlPrenatal3(){
  $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  $this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal3');
  }

    public function DeleteEmptyControlPrenatal4(){
   $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  $this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal4');
  }

    public function DeleteEmptyControlPrenatal5(){
  $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  $this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal5');
  }

    public function DeleteEmptyControlPrenatal6(){
  $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  $this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal6');
  }

    public function DeleteEmptyControlPrenatal7(){
  $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  $this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal7');
  }

    public function DeleteEmptyControlPrenatal8(){
  $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  $this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal8');
  }

    public function DeleteEmptyControlPrenatal9(){
  $this->clinical_history->where('fecha', '');
  $this->clinical_history->where('semana', '');
  $this->clinical_history->where('peso', '');
  $this->clinical_history->where('tension', '');
  $this->clinical_history->where('alt', '');
  $this->clinical_history->where('fetal', '');
  $this->clinical_history->where('edema', '');
  $this->clinical_history->where('otros', '');
  $this->clinical_history->where('evolucion', '');
  $this->clinical_history->where('tension11', '');
  $this->clinical_history->where('alt11', '');
  $this->clinical_history->where('alt111', '');
  $this->clinical_history->where('fetal11', '');
  $this->clinical_history->where('edema11', '');
  $this->clinical_history->delete('h_c_control_prenatal9');
  }

  public function getPatientInfo($patient_cedula){
$this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
$this->clinical_history->where('cedula',$patient_cedula);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function getPatientCedulaAd($patient_cedula)  {
$this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
 $this->clinical_history->where('cedula',$patient_cedula);
  $query = $this->clinical_history->get();
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
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
$this->clinical_history->where('id_patient',$patient_id);
  $query = $this->clinical_history->get();
  return $query->result();
}



public function getMuncipio($id_mun)
	{
$this->clinical_history->select('*');
$this->clinical_history->from('townships');
$this->clinical_history->where('province_id_town',$id_mun);
$this->clinical_history->order_by('id_town', 'desc');
$query = $this->clinical_history->get();
 return $query->result();
}

public function FindCita($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('rendez_vous');
 $this->clinical_history->where('id_apoint',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function saveUpdateCita($id,$data){
	$this->clinical_history->where('id_apoint', $id);
$this->clinical_history->update('rendez_vous', $data);
}



public function saveUpRehabilidad($id,$data){
	$this->clinical_history->where('id_rehab', $id);
$this->clinical_history->update('h_c_rehabilitacion', $data);
}









public function sistemaMusculo()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location',4);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function sistemaDigest()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 19);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function examenExtinf()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 18);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function examenGenitalf()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 16);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function droga()
{
	$this->clinical_history->select("id,name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 25);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function examenInspeccion_vulvar()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 24);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function examenRectal()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 14);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function examenVagina()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 17);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function examenGenitalm()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 15);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function examenAxilar()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 12);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function examenMama()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 11);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function examenTorax()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 23);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function examenCuello()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 9);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function sistemaUrogenial()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 3);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function dermaTipo()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 30);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function dermaMorfo()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 31);
  $query = $this->clinical_history->get();
  return $query->result();
}


public function dermaIntero()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 32);
  $query = $this->clinical_history->get();
  return $query->result();
}




public function sistemaNeuro()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 1);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function sistemaCardiov()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 2);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function sistemaResp()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 7);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function sistemaEndo()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 21);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function sistemaRelat()
{
	$this->clinical_history->select("name");
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location', 22);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function PatientMed($historial_id)
{
	$this->clinical_history->select("medicine");
  $this->clinical_history->from('h_c_patient_medicine');
  $this->clinical_history->where('id_patient',$historial_id);
  $this->clinical_history->order_by('medicine', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function Dermatologo($historial_id)
{
	$this->clinical_history->select("*");
  $this->clinical_history->from('h_c_dermatologo');
  $this->clinical_history->where('historial_id',$historial_id);
  $this->clinical_history->order_by('id_derma', 'asc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function Ant_alergia($historial_id)
{
	$this->clinical_history->select("*");
  $this->clinical_history->from('h_c_ant_alergista');
  $this->clinical_history->where('historial_id',$historial_id);
  $this->clinical_history->order_by('id', 'asc');
  $query = $this->clinical_history->get();
  return $query->result();
}



public function show_derma_by_id($id)
{
	$this->clinical_history->select("*");
  $this->clinical_history->from('h_c_dermatologo');
  $this->clinical_history->where('id_derma',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function showAlegicos($historial_id)
{
	$this->clinical_history->select("alimentos,medicamentos,otros");
  $this->clinical_history->from('h_c_desarollo');
  $this->clinical_history->where('historial_id',$historial_id);
  $this->clinical_history->order_by('id_desa', 'asc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function SaveMedicine($data) {
// Inserting into your table
$this->clinical_history->insert('h_c_patient_medicine', $data);
}

public function DeleteEmptyMedPed($val){
$this->clinical_history->where('medicine',$val['medicine']);
$this->clinical_history->where('id_patient',$val['id_patient']);
$this->clinical_history->where('part',$val['part']);
$this->clinical_history->where('user_id',$val['user_id']);
$this->clinical_history->delete('h_c_patient_medicine_clown');

}



public function DeleteEmptyMedPedTrueTable($val){
$this->clinical_history->where('medicine',$val['medicine']);
$this->clinical_history->where('id_patient',$val['id_patient']);
$this->clinical_history->where('part',$val['part']);
$this->clinical_history->where('user_id',$val['user_id']);
$this->clinical_history->delete('h_c_patient_medicine');

}







public function saveDermatologia($data) {
// Inserting into your table
$this->clinical_history->insert('h_c_dermatologo', $data);
}



public function SaveDrug($data) {
// Inserting into your table
$this->clinical_history->insert('h_c_droga', $data);
}
public function saveName($data) {
// Inserting into your table
$this->clinical_history->insert('historial_dropdown', $data);
}

public function Drugstores(){
  $this->clinical_history->select('*');
  $this->clinical_history->from('drug_stores');
  $this->clinical_history->order_by('id', 'desc');
 $query = $this->clinical_history->get();
 return $query->result();
}

public function DrugstoreUser($perfil){
  $this->clinical_history->select('name,id_user');
  $this->clinical_history->from('users');
  $this->clinical_history->where('perfil', $perfil);
 $query = $this->clinical_history->get();
 return $query->result();
}

public function DrugstoresUserL($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('user_farmacia');
  $this->clinical_history->where('id_user',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}








public function Drugstore($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('drug_stores');
 $this->clinical_history->where('id',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}

public function saveFarmacia($save) {
// Inserting into your table
$this->clinical_history->insert('drug_stores', $save);
}


     function branches1($id_esp)
    {
	$this->clinical_history->select('id, drug_store_id, branch_name');
$this->clinical_history->from('drug_store_branches');
 $this->clinical_history->where('drug_store_id',$id_esp);
$query = $this->clinical_history->get();
 return $query->result();
   }

	public function drugStoreMedica($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_indicaciones_medicales');
  $this->clinical_history->where('farmacia',$id);
  $this->clinical_history->order_by('historial_id', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}


public function farmaPatient($id){
$this->clinical_history->select("distinct(historial_id),id_p_a,nombre,causa,centro,area,doctor,fecha_propuesta,nec,farmacia");
  $this->clinical_history->from('h_c_indicaciones_medicales');
 $this->clinical_history->join('patients_appointments', 'h_c_indicaciones_medicales.historial_id= patients_appointments.id_p_a');
  $this->clinical_history->join('rendez_vous', 'h_c_indicaciones_medicales.historial_id= rendez_vous.id_patient');
 $this->clinical_history->where('farmacia',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function patMedica($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_indicaciones_medicales');
  $this->clinical_history->where('historial_id',$id);
  $this->clinical_history->order_by('id_i_m', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}


public function updateHabitosToxicos($id_patient,$save){
$this->clinical_history->where('historial_id', $id_patient);
$this->clinical_history->update('h_c_habitos_toxicos', $save);
}


 public function SaveUpDermatologia($id,$save){
$this->clinical_history->where('id_derma', $id);
$this->clinical_history->update('h_c_dermatologo', $save);
}





public function saveFarmaciaUp($id,$save){
$this->clinical_history->where('id', $id);
$this->clinical_history->update('drug_stores', $save);
}








public function updateDesarollo($id_patient,$save){
$this->clinical_history->where('historial_id', $id_patient);
$this->clinical_history->update('h_c_desarollo', $save);
}



public function deleteMedNinguno(){
  $this->clinical_history->where('medicine', 'ninguno');
  $this->clinical_history->delete('h_c_patient_medicine');
}

public function deleteDrug($id_patient){
  $this->clinical_history->where('id_patient', $id_patient);
  $this->clinical_history->delete('h_c_droga');
}


public function updateAntAl($id_patient,$save){
$this->clinical_history->where('historial_id', $id_patient);
$this->clinical_history->update('h_c_desarollo', $save);
}



public function updateAnteOtros($id_patient,$save){
$this->clinical_history->where('historial_id', $id_patient);
$this->clinical_history->update('h_c_ante_otros', $save);
}


public function updateViolencia($id_patient,$save){
$this->clinical_history->where('historial_id', $id_patient);
$this->clinical_history->update('h_c_ante_otros', $save);
}

public function updateMarquePositivo($id,$save){
$this->clinical_history->where('id', $id);
$this->clinical_history->update('h_c_marque_positivo', $save);
}

function count_ssr($historial_id){
   $this->clinical_history->select('idssr')->from('h_c_ant_ssr');
	$this->clinical_history->where('hist_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
	}


public function data_ssr_by_id($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_ssr');
  $this->clinical_history->where('idssr',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}


public function saveEditAntssr($idssr,$save2){
$this->clinical_history->where('idssr', $idssr);
$this->clinical_history->update('h_c_ant_ssr', $save2);
}

//-------------------------------------------------------------------------------------------
public function saveObstetrico($save) {
// Inserting into your table
$insert_id=$this->clinical_history->insert('h_c_ante_obs', $save);
 return  $insert_id;
}



public function upObstetrico($up,$idobs){
$this->clinical_history->where('id', $idobs);
$this->clinical_history->update('h_c_ante_obs', $up);
}

public function saveObstetrico2($save1) {
// Inserting into your table
$this->clinical_history->insert('h_c_ant_obs2', $save1);
}

public function upObstetrico2($up1,$idobs){
$this->clinical_history->where('idobs2', $idobs);
$this->clinical_history->update('h_c_ant_obs2', $up1);
}


public function saveObstetrico3($save2) {
// Inserting into your table
$this->clinical_history->insert('h_c_ant_obs3', $save2);
}



public function upObstetrico3($up2,$idobs){
$this->clinical_history->where('id_obs3', $idobs);
$this->clinical_history->update('h_c_ant_obs3', $up2);
}

public function saveObstetrico4($save3) {
// Inserting into your table
$this->clinical_history->insert('h_c_ant_puerperio', $save3);
}


public function upObstetrico4($up3,$idobs){
$this->clinical_history->where('idpuerp', $idobs);
$this->clinical_history->update('h_c_ant_puerperio', $up3);
}

//-------------------------------------------------------------------------------------------------






function countObs($historial_id){
   $this->clinical_history->select('idobs')->from('h_c_ante_obs1');
	$this->clinical_history->where('hist_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
	}


	public function getObs($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ante_obs1');
  $this->clinical_history->where('idobs',$id);
  $query = $this->clinical_history->get();
 return $query->result();
}


public function getObs2($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_obs2');
  $this->clinical_history->where('idobs2',$id);
  $query = $this->clinical_history->get();
 return $query->result();
}

public function getObs3($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_obs3');
  $this->clinical_history->where('id_obs3',$id);
  $query = $this->clinical_history->get();
 return $query->result();
}

public function getObs4($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_puerperio');
  $this->clinical_history->where('idpuerp',$id);
  $query = $this->clinical_history->get();
 return $query->result();
}

public function sObs($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ante_obs1');
  $this->clinical_history->where('hist_id',$historial_id);
    $this->clinical_history->order_by('idobs', 'DESC');
  $query = $this->clinical_history->get();
 return $query->result();
}

public function sObs2($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_obs2');
  $this->clinical_history->where('hist_id',$historial_id);
  $query = $this->clinical_history->get();
 return $query->result();
}

public function sObs3($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_obs3');
  $this->clinical_history->where('hist_id',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}

public function sObs4($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_puerperio');
  $this->clinical_history->where('hist_id',$historial_id);
$query = $this->clinical_history->get();
 return $query->result();
}


public function savePedia($save) {
$this->clinical_history->insert('h_c_ant_pedia', $save);
 $insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
 }

  public function DeleteEmptyPedia($historial_id){
  $this->clinical_history->where('edad_gest', '');
$this->clinical_history->where('hist_id', $historial_id);
	 $this->clinical_history->delete('h_c_ant_pedia');
}



 function countant_pedia($historial_id){
 $this->clinical_history->select('id')->from('h_c_ant_pedia');
	$this->clinical_history->where('hist_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}

public function saveVacuna($save2) {
$this->clinical_history->insert('h_c_vacunacion', $save2);
 }

public function SaveMedPed($save) {
$this->clinical_history->insert('h_c_pedia_med', $save);
 }

 public function Getpedia($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_pedia');
  $this->clinical_history->where('hist_id',$historial_id);
  $this->clinical_history->order_by('id', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}


public function Getvacuna($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_vacunacion');
  $this->clinical_history->where('hist_id',$historial_id);
 $query = $this->clinical_history->get();
 return $query->result();
}


 public function getVacunaData($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_vacunacion');
  $this->clinical_history->join('patients_appointments', 'h_c_vacunacion.hist_id= patients_appointments.id_p_a');
 $this->clinical_history->where('hist_id',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}


 public function getPediaId($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_ant_pedia');
  $this->clinical_history->where('id',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}

public function deleteAllMedPed($id){
  $this->clinical_history->where('id_pedia', $id);
  $this->clinical_history->delete('h_c_pedia_med');
}


public function saveUpdatePedia($id,$save3){
$this->clinical_history->where('id', $id);
$this->clinical_history->update('h_c_ant_pedia', $save3);
}

public function saveUpdateVacuna($id,$save4){
$this->clinical_history->where('idvac', $id);
$this->clinical_history->update('h_c_vacunacion', $save4);
}

 function countAntPedia2($historial_id){
    $this->clinical_history->select('id')->from('h_c_ant_pedia');
	$this->clinical_history->where('hist_id',$historial_id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}


 function countPatMed($historial_id){

    $this->clinical_history->select('id')->from('h_c_patient_medicine');
	$this->clinical_history->where('id_patient',$historial_id);
    $q = $this->clinical_history->get();
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
$this->clinical_history->select("id");
  $this->clinical_history->from('tutor');
$this->clinical_history->where('id_tutor',$del['id_tutor']);
$this->clinical_history->where('id_nino',$del['id_nino']);
  $query = $this->clinical_history->get();
   return $query->num_rows();
}

public function delete_duplicate_tutor($dup){
	$this->clinical_history->where('id_tutor',$dup['id_tutor']);
$this->clinical_history->where('id_nino',$dup['id_nino']);
$this->clinical_history->where('relacion',$dup['relacion']);
$this->clinical_history->delete('tutor');
}



public function savePreTutor($data) {
$this->clinical_history->insert('tutor', $data);
}




public function getPreTutor($historial_id){
$this->clinical_history->select("relacion,id_tutor,name_tutor,id_nino,id");
  $this->clinical_history->from('tutor');
 $this->clinical_history->where('id_nino',$historial_id);
  $this->clinical_history->order_by('id','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}








public function saveTutor($data) {
$this->clinical_history->insert('tutor', $data);
}

public function getTutor($historial_id){
$this->clinical_history->select("relacion,id_tutor,name_tutor,id_nino,id");
  $this->clinical_history->from('tutor');
 $this->clinical_history->where('id_nino',$historial_id);
  $this->clinical_history->order_by('id','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}
function CountTutor($historial_id){
$this->clinical_history->select("relacion,id_tutor,name_tutor");
  $this->clinical_history->from('tutor');
  $this->clinical_history->where('id_nino',$historial_id);
  $q = $this->clinical_history->get();
    return $q->num_rows();
}

function NecPatient($nec){
$this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
 $this->clinical_history->where('nec1',$nec);
 $query = $this->clinical_history->get();
  return $query->result();
}




function NecPatientSearch($nec){
$this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
 $this->clinical_history->where('id_p_a',$nec);
 $query = $this->clinical_history->get();
  return $query->result();
}







function findPatientByNombre($val1,$val2,$val3){
$this->clinical_history->select("*");
  $this->clinical_history->from('patients_appointments');
 $this->clinical_history->like('nombre',$val1);
$this->clinical_history->like('nombre',$val2);
if($val3 !=""){
$this->clinical_history->like('nombre',$val3);
}
 $this->clinical_history->order_by('nombre','ASC');
 $query = $this->clinical_history->get();
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
$this->clinical_history->select("*");
  $this->clinical_history->from('categoria_tarifario');
 $query = $this->clinical_history->get();
  return $query->result();
}
public function SaveBill2($save2) {
$this->clinical_history->insert('factura2', $save2);
	$insert_id = $this->clinical_history->insert_id();
    return  $insert_id;
}
public function SaveBill($save) {
$this->clinical_history->insert('factura', $save);
}
public function DeleteEmptyBill(){
$this->clinical_history->where('service', '');
$this->clinical_history->delete('factura');
}

public function DeleteMedP($v){
$this->clinical_history->where('medica', $v);
$this->clinical_history->delete('h_c_pedia_med');
}

public function showBilling1($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura2');
$this->clinical_history->where('idfacc',$id);
$query = $this->clinical_history->get();
return $query->result();
}

public function updateBillTable($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura');
$this->clinical_history->where('idfac',$id);
$query = $this->clinical_history->get();
return $query->result();
}






public function showBilling2($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura');
  $this->clinical_history->where('id2',$id);
 $query = $this->clinical_history->get();
  return $query->result();
}



public function saveMss1($save) {
$this->clinical_history->insert('mssn1', $save);
}
public function Serviciomssm($doc_seg){
$this->clinical_history->select("id_tarif,procedimiento");
  $this->clinical_history->from('tarifarios');
  $this->clinical_history->where('id_doctor', $doc_seg['id_doctor']);
    $this->clinical_history->where('id_seguro', $doc_seg['id_seguro']);
	$this->clinical_history->where('plan', $doc_seg['plan']);
$this->clinical_history->group_by('procedimiento');
  //$this->clinical_history->order_by('insumservicio','desc');
 $query = $this->clinical_history->get();
  return $query->result();
}




public function ServiciomssmPrivado($doc_seg){
$this->clinical_history->select("id_tarif,procedimiento");
  $this->clinical_history->from('tarifarios');
  $this->clinical_history->where('id_doctor', $doc_seg['id_doctor']);
    $this->clinical_history->where('id_seguro', $doc_seg['id_seguro']);
	 $this->clinical_history->where('plan', $doc_seg['id_cm']);
$this->clinical_history->group_by('procedimiento');
  //$this->clinical_history->order_by('insumservicio','desc');
 $query = $this->clinical_history->get();
  return $query->result();
}










public function Service_centro($id1,$id2){
$this->clinical_history->select("id_c_taf,sub_groupo,groupo");
  $this->clinical_history->from('centros_tarifarios');
  $this->clinical_history->where('centro_id', $id1);
  $this->clinical_history->where('seguro_id', $id2);
$this->clinical_history->group_by('sub_groupo');
  $query = $this->clinical_history->get();
  return $query->result();
}




public function DeletePreTutor($id){
  $this->clinical_history->where('id_nino',$id);
  $this->clinical_history->delete('pre_tutor');
}

public function delete_factura2($id){
  $this->clinical_history->where('idfacc',$id);
  $this->clinical_history->delete('factura2');
}
/*
public function getCatName($cat){
$this->clinical_history->select("id,doctorid,insumservicio");
  $this->clinical_history->from('mssn1');
  $this->clinical_history->where('categoria',$cat);
    $this->clinical_history->group_by('insumservicio');
 $query = $this->clinical_history->get();
  return $query->result();
}
*/
public function getCatName($cat){
$this->clinical_history->select("id_tarif,procedimiento,id_categoria");
  $this->clinical_history->from('tarifarios');
  $this->clinical_history->where('id_categoria',$cat);
 $query = $this->clinical_history->get();
  return $query->result();
}
public function ViewFact2($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura2');
 $this->clinical_history->where('idfacc',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function EditProcedTarif($get){
$this->clinical_history->select("id_tarif,procedimiento");
  $this->clinical_history->from('tarifarios');
 	$this->clinical_history->where('id_seguro',$get['id_seguro']);
	$this->clinical_history->where('id_doctor',$get['id_doctor']);
  $query = $this->clinical_history->get();
  return $query->result();
}
public function ViewFact($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura');
 $this->clinical_history->where('id2',$id);
 $this->clinical_history->order_by('idfac','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function Billings(){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura');
  $this->clinical_history->join('factura2', 'factura2.idfacc = factura.id2');
  $this->clinical_history->where('factura2.block',0);
 $this->clinical_history->order_by('idfac','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function BillingsDoc($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura');
  $this->clinical_history->join('factura2', 'factura2.idfacc = factura.id2');
  $this->clinical_history->where('medico',$id);
  $this->clinical_history->where('factura2.block',0);
  $this->clinical_history->order_by('idfacc','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function display_all_medical_centers_docs($id,$perfil){
$this->clinical_history->select("*");
  $this->clinical_history->from('medical_centers');
  if($perfil=="Medico"){
  $this->clinical_history->join('doctor_agenda_test', 'doctor_agenda_test.id_centro = medical_centers.id_m_c');
  } else {
	$this->clinical_history->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c');
  }
  $this->clinical_history->where('id_doctor',$id);
  $this->clinical_history->where('activate',0);
    if($perfil=="Medico"){
  $this->clinical_history->group_by('id_centro');
  } else {
$this->clinical_history->group_by('centro_medico');
  }
  $this->clinical_history->order_by('id_m_c','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function display_all_medical_insurances_docs($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('seguro_medico');
  $this->clinical_history->join('doctor_seguro', 'doctor_seguro.seguro_medico = seguro_medico.id_sm');
  $this->clinical_history->where('id_doctor',$id);
  $this->clinical_history->where('activate',0);
  $this->clinical_history->order_by('id_sm','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}




public function UpdateBill1($id,$save){
$this->clinical_history->where('idfac', $id);
$this->clinical_history->update('factura', $save);
}






public function UpdateBill2($id,$save2){
$this->clinical_history->where('idfacc', $id);
$this->clinical_history->update('factura2', $save2);
}



public function insert_nec($id,$data){
$this->clinical_history->where('id_p_a', $id);
$this->clinical_history->update('patients_appointments', $data);
}



  public function delete_empty_oftal(){
  $this->clinical_history->where('od_sin_con','');
  $this->clinical_history->delete('h_c_oftalmologia');
}

  public function delete_empty_derma(){
  $this->clinical_history->where('derma_tipo','');
  $this->clinical_history->delete('h_c_dermatologo');
}



  public function delete_factura($id){
  $this->clinical_history->where('id2', $id);
  $this->clinical_history->delete('factura');
}

  public function block_factura1($id,$data){
  $this->clinical_history->where('id2', $id);
  $this->clinical_history->update('factura',$data);
}

function CountFactura2Blocked(){

    $this->clinical_history->select('block')->from('factura2')->where('block', 1);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}

function CountFactura2UnBlocked(){

    $this->clinical_history->select('block')->from('factura2')->where('block', 0);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}



function CountFactura2BlockedDoc($id){

    $this->clinical_history->select('block')->from('factura2')->where('block', 1)->where('medico', $id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}

function CountFactura2UnBlockedDoc($id){

    $this->clinical_history->select('block')->from('factura2')->where('block', 0)->where('medico', $id);
    $q = $this->clinical_history->get();
    return $q->num_rows();
}







public function block_factura2($id,$data){
  $this->clinical_history->where('idfacc',$id);
  $this->clinical_history->update('factura2',$data);
}


public function Ars()  {
  $this->clinical_history->select('seguro_medico');
  $this->clinical_history->from('factura2');
  $this->clinical_history->group_by('seguro_medico');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function ArsDoc($id,$perfil)  {
  $this->clinical_history->select('seguro_medico');
  $this->clinical_history->from('factura2');
   if($perfil=="Asistente Medico"){
$this->clinical_history->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->clinical_history->where('id_doctor',$id);
 } else {
   $this->clinical_history->where('medico',$id);
 }
  $this->clinical_history->group_by('seguro_medico');
  $query = $this->clinical_history->get();
  return $query->result();
}




public function invoicePaciente()  {
  $this->clinical_history->select('paciente');
  $this->clinical_history->from('factura2');
  $this->clinical_history->group_by('paciente');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function invoicePacienteDoc($id,$perfil)  {
  $this->clinical_history->select('paciente');
  $this->clinical_history->from('factura2');
     if($perfil=="Asistente Medico"){
$this->clinical_history->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->clinical_history->where('id_doctor',$id);
 } else {
  $this->clinical_history->where('medico',$id);
 }
  $this->clinical_history->group_by('paciente');
  $query = $this->clinical_history->get();
  return $query->result();
}



public function date_range1()  {
  $this->clinical_history->select('filter_date as filter');
  $this->clinical_history->from('factura2');
 $this->clinical_history->where("seguro_medico !=",11);
  $this->clinical_history->group_by('filter_date');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function exportCSVbill(){

    $response = array();

    // Select record
    $this->clinical_history->select('*');
    $q = $this->clinical_history->get('users');
    $response = $q->result_array();

    return $response;

}





public function date_range_doctor($id,$perfil)  {
  $this->clinical_history->select('*,filter_date as filter');
  $this->clinical_history->from('factura2');
  if($perfil=="Medico"){
  $this->clinical_history->where('medico',$id);
  }else{
$this->clinical_history->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->clinical_history->where('id_doctor',$id);
  }
  $this->clinical_history->group_by('filter_date');
  $query = $this->clinical_history->get();
  return $query->result();
}






public function get_fac_ars($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->join('factura2', 'factura.id2=factura2.idfacc');
$this->clinical_history->where($condition);
$this->clinical_history->where('area',$data['area']);
$this->clinical_history->where('seguro',$data['seguro_medico']);
/*if($data['centro'] !=""){
$this->clinical_history->where('centro_medico',$data['centro']);
}*/
$this->clinical_history->order_by('id2','desc');
$query = $this->clinical_history->get();
  return $query->result();
}






public function get_fac_ars_by_patient_adm($patient,$desde,$hasta) {
$condition = "filter BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "'";
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->where($condition);
$this->clinical_history->where('pat_id',$patient);
$query = $this->clinical_history->get();
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
$this->clinical_history->select('*');
$this->clinical_history->from('factura2');
   if($val3=="Asistente Medico"){
$this->clinical_history->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
$this->clinical_history->where('id_doctor',$val2);
 } else {
$this->clinical_history->where('medico',$val2);
 }
$this->clinical_history->where('paciente',$val1);
$query = $this->clinical_history->get();
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
 $this->clinical_history->insert('invoice_ars_claims', $data);
}


public function doctors_message_view($data) {
 $this->clinical_history->insert('doctors_message_view', $data);
}




public function ncf($data) {
 $this->clinical_history->insert('ncf', $data);
 		 $insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
}


public function getNewinvoice($id)  {
  //$this->clinical_history->select('*');
 $this->clinical_history->select('*,sum(tsubtotal) as t1, sum(totpagseg) as t2, sum(totpagpa) as t3');
  $this->clinical_history->from('invoice_ars_claims');
  $this->clinical_history->where('ncf_id',$id);
    $this->clinical_history->group_by('numauto');
  $this->clinical_history->order_by('fecha','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function print_ars_fac_report($id_ncf,$seguro)  {
 $this->clinical_history->select('*,sum(tsubtotal) as t1, sum(totpagseg) as t2, sum(totpagpa) as t3');
  $this->clinical_history->from('invoice_ars_claims');
  $this->clinical_history->where('seguro_medico',$seguro);
  $this->clinical_history->group_by('numauto');
  $this->clinical_history->order_by('fecha','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function print_ars_fac_found($id_ncf,$id_patient)  {
 $this->clinical_history->select('*,sum(tsubtotal) as t1, sum(totpagseg) as t2, sum(totpagpa) as t3');
  $this->clinical_history->from('invoice_ars_claims');
  if($id_patient !=0){
  $this->clinical_history->where('paciente',$id_patient);
  }
  $this->clinical_history->where('ncf_id',$id_ncf);
  $this->clinical_history->group_by('numauto');
  $this->clinical_history->order_by('fecha','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}



public function print_ars_fac_found_pat($val)  {
 $this->clinical_history->select('*');
  $this->clinical_history->from('invoice_ars_claims');
 $this->clinical_history->where('paciente',$val['patient']);
  $this->clinical_history->where('medico',$val['medico']);
  $query = $this->clinical_history->get();
  return $query->result();
}



public function invoice_ars_claim()  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('invoice_ars_claims');
  $this->clinical_history->order_by('id','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

public function doc_invoice_ars_claim($id)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('invoice_ars_claims');
   $this->clinical_history->where('medico',$id);
  $this->clinical_history->order_by('id','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}





public function getNcf($id)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('ncf');
  $this->clinical_history->where('id_ncf',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function get_numero_contrado($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('factura2');
   $this->clinical_history->join('users', 'users.id_user=factura2.medico');
 $this->clinical_history->where('codigoprestado',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function all_codigo_prestador(){
$this->clinical_history->select("codigoprestado");
  $this->clinical_history->from('factura2');
  $this->clinical_history->group_by('codigoprestado');
  $this->clinical_history->where('seguro_medico !=',11);
 $query = $this->clinical_history->get();
  return $query->result();
}




public function medicos_facturar(){
$this->clinical_history->select("name,medico");
  $this->clinical_history->from('users');
 $this->clinical_history->join('factura2', 'users.id_user=factura2.medico');
  $this->clinical_history->group_by('medico');
  $this->clinical_history->where('seguro_medico !=',11);
$query = $this->clinical_history->get();
  return $query->result();
}



public function get_nombre_medico($id){
$this->clinical_history->select("*");
  $this->clinical_history->from('users');
 $this->clinical_history->join('factura2', 'users.id_user=factura2.medico');
 $this->clinical_history->where('id_user',$id);
$query = $this->clinical_history->get();
  return $query->result();
}

public function get_nombre_medico_date_filter($id){
$this->clinical_history->select("filter");
  $this->clinical_history->from('factura');
 $this->clinical_history->join('users', 'users.id_user=factura.medico2');
 $this->clinical_history->where('medico2',$id);
  $this->clinical_history->where('seguro !=',11);
  $this->clinical_history->group_by('filter');
$query = $this->clinical_history->get();
  return $query->result();
}


public function get_exequatur_medico($id){
$this->clinical_history->select("*");
 $this->clinical_history->from('users');
 $this->clinical_history->join('factura2', 'users.id_user=factura2.medico');
$this->clinical_history->where('exequatur',$id);
$query = $this->clinical_history->get();
  return $query->result();
}

public function exequatur_medico_factura(){
$this->clinical_history->select("exequatur");
 $this->clinical_history->from('factura2');
 $this->clinical_history->join('users', 'users.id_user=factura2.medico');
 $this->clinical_history->where('seguro_medico !=',11);
  $this->clinical_history->group_by('medico');
$query = $this->clinical_history->get();
  return $query->result();
}





public function cedula_medico_factura(){
$this->clinical_history->select("medico");
 $this->clinical_history->from('factura2');
 $this->clinical_history->where('seguro_medico !=',11);
 $this->clinical_history->group_by('medico');
$query = $this->clinical_history->get();
  return $query->result();
}






public function get_exequatur_medico_date_filter($id){
$this->clinical_history->select("filter");
 $this->clinical_history->from('users');
  $this->clinical_history->join('factura', 'users.id_user=factura.medico2');
$this->clinical_history->where('exequatur',$id);
 $this->clinical_history->where('seguro !=',11);
 $this->clinical_history->group_by('filter');
$query = $this->clinical_history->get();
  return $query->result();
}


public function get_rnc_medico($id){
$this->clinical_history->select("*");
 $this->clinical_history->from('factura2');
    $this->clinical_history->join('users', 'users.id_user=factura2.medico');
$this->clinical_history->where('rnc',$id);
$query = $this->clinical_history->get();
  return $query->result();
}


public function get_cedula_medico($id){
$this->clinical_history->select("*");
 $this->clinical_history->from('users');
  $this->clinical_history->join('factura2', 'users.id_user=factura2.medico');
$this->clinical_history->where('cedula',$id);
$query = $this->clinical_history->get();
  return $query->result();
}

public function get_cedula_medico_date_filter($id){
$this->clinical_history->select("filter");
 $this->clinical_history->from('users');
  $this->clinical_history->join('factura', 'users.id_user=factura.medico2');
$this->clinical_history->where('cedula',$id);
$this->clinical_history->where('seguro !=',11);
 $this->clinical_history->group_by('filter');
$query = $this->clinical_history->get();
  return $query->result();
}




public function get_numero_contrado_date_filter($id){
$this->clinical_history->select("filter");
  $this->clinical_history->from('factura2');
  $this->clinical_history->join('factura', 'factura.id2=factura2.idfacc');
 $this->clinical_history->where('codigoprestado',$id);
 $this->clinical_history->where('seguro_medico !=',11);
 $this->clinical_history->group_by('filter');
$query = $this->clinical_history->get();
  return $query->result();
}




public function patient_num_contrato_data($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
 $this->clinical_history->join('factura2', 'factura.id2=factura2.idfacc');
$this->clinical_history->where($condition);
$this->clinical_history->where("medico2",$data['medico']);
$this->clinical_history->where('seguro !=',11);
$query = $this->clinical_history->get();
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
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->where($condition);
$this->clinical_history->where("medico2",$data['medico']);
$this->clinical_history->where('seguro !=',11);
$query = $this->clinical_history->get();
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


public function get_patient_historial($desde,$hasta,$medico,$pat,$cent)  {
$condition = "filter_date BETWEEN " . "'" .$desde. "'" . " AND " . "'" .$hasta. "'";
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_enfermedad_actual');
  // $this->clinical_history->join('h_c_diagno_def_link', 'h_c_diagno_def_link.p_id=h_c_enfermedad_actual.historial_id');
  $this->clinical_history->where('historial_id',$pat);
 $this->clinical_history->where('user_id',$medico);
  $this->clinical_history->where('centro_medico',$cent);
 $this->clinical_history->where($condition);
  $query = $this->clinical_history->get();
  return $query->result();
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

$this->clinical_history->join('type_diagnostic_procedures', 'h_c_diagno_def_proc.procedimiento=type_diagnostic_procedures.id');
  $this->clinical_history->where('p_id',$id);
  $query = $this->clinical_history->get('h_c_diagno_def_proc');
  return $query;
}



public function show_diagno_pro_pat($id){

  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_diagno_def_proc');
   $this->clinical_history->join('type_diagnostic_procedures', 'h_c_diagno_def_proc.procedimiento=type_diagnostic_procedures.id');
  $this->clinical_history->where('p_id',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}




 public function show_patient_arc_report($data) {
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->join('factura2', 'factura2.idfacc=factura.id2');
$this->clinical_history->where("filter >=",$data['desde']);
$this->clinical_history->where("filter <=",$data['hasta']);
$this->clinical_history->where("medico2",$data['medico']);
//$this->clinical_history->where("patient",$data['id_patient']);
$this->clinical_history->where("validate",1);
 $query = $this->clinical_history->get();
 return $query->result();
}

  public function rates_view($id)
    {
	$this->clinical_history->select("*");
  $this->clinical_history->from('tarifarios');
  $this->clinical_history->where('id_tarif', $id);
  $this->clinical_history->order_by('procedimiento', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
   }



   	function addDoctTarif($data)
	{
		$this->clinical_history->insert('tarif_seg_doc', $data);
	}


public function delete_doctor_tarif($delete){
  $this->clinical_history->where('id_cat', $delete['id_cat']);
  $this->clinical_history->where('id_doct', $delete['id_doct']);
  $this->clinical_history->delete('tarif_seg_doc');
}




public function tarif_seg_doc($save) {
$this->clinical_history->insert('tarif_seg_doc', $save);

}




function tarifarios_grouped()
	{
	$this->clinical_history->select('id_user,name');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->join('users', 'tarifarios.id_doctor=users.id_user');
	$this->clinical_history->group_by('id_doctor');
	$query = $this->clinical_history->get();
	return $query->result();
	}


	function tarifarios_grouped_seguro()
	{
	$this->clinical_history->select('id_sm,title');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->join('seguro_medico', 'tarifarios.id_seguro=seguro_medico.id_sm');
	$this->clinical_history->group_by('id_seguro');
	$query = $this->clinical_history->get();
	return $query->result();
	}




public function save_edit_tarif($id,$data){
$this->clinical_history->where('id_tarif', $id);
$this->clinical_history->update('tarifarios', $data);
}

public function save_edit_tarifario_centro($id,$data){
$this->clinical_history->where('id_c_taf', $id);
$this->clinical_history->update('centros_tarifarios', $data);
}

	function display_tarif_seguro($id)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->where('id_seguro',$id);
	$this->clinical_history->order_by('id_tarif','desc');
	$query = $this->clinical_history->get();
	return $query->result();
	}

	function display_tarif_doc($id)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->where('id_doctor',$id);
	$query = $this->clinical_history->get();
	return $query->result();
	}

	function display_tarif_doc_($id1,$id2)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->where('id_doctor',$id1);
	$this->clinical_history->where('id_seguro',$id2);
	$query = $this->clinical_history->get();
	return $query->result();
	}

		function display_tarif_seguro_doc($taf)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->where('id_doctor',$taf['id_doctor']);
	$this->clinical_history->where('id_seguro',$taf['id_seguro']);
	$this->clinical_history->order_by('id_tarif','desc');
	$query = $this->clinical_history->get();
	return $query->result();
	}









		function seguro_header($id)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->where('id_seguro',$id);
	$query = $this->clinical_history->get();
	return $query->result();
	}

		function other_seguro_tarif($val)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->where('id_seguro',$val['id_seguro']);
	$this->clinical_history->where('id_doctor',$val['id_doctor']);

	$this->clinical_history->where('plan',$val['id_plan']);

	$this->clinical_history->order_by('id_tarif', 'desc');
	$query = $this->clinical_history->get();
	return $query->result();
	}

	function edit_tarifario($id)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->where('id_tarif',$id);
	$query = $this->clinical_history->get();
	return $query->result();
	}

	function edit_tarifario_centro($id)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('centros_tarifarios');
	$this->clinical_history->where('id_c_taf',$id);
	$query = $this->clinical_history->get();
	return $query->result();
	}


	function tarifario_centro_bill($id)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('centros_tarifarios');
	$this->clinical_history->where('centro_id',$id);
	$query = $this->clinical_history->get();
	return $query->result();
	}



		function all_centro_medicos_tarifs()
	{
	$this->clinical_history->select('id_m_c,name');
	$this->clinical_history->from('medical_centers');
	$this->clinical_history->join('centros_tarifarios', 'medical_centers.id_m_c=centros_tarifarios.centro_id');
	$this->clinical_history->group_by('centro_id');
	$query = $this->clinical_history->get();
	return $query->result();
	}

		function agendaDocCentro($id)
	{
	$this->clinical_history->select('id_centro,name');
	$this->clinical_history->from('doctor_agenda_test');
	$this->clinical_history->join('medical_centers', 'medical_centers.id_m_c=doctor_agenda_test.id_centro');
	$this->clinical_history->where('id_doctor', $id);
	$this->clinical_history->group_by('id_centro');
	$query = $this->clinical_history->get();
	return $query->result();
	}

		function doct_es_tarif($id_user)
	{
	$this->clinical_history->select('id_ar,title_area');
	$this->clinical_history->from('areas');
	$this->clinical_history->join('tarifarios', 'areas.id_ar=tarifarios.id_categoria');
	$this->clinical_history->where('id_doctor',$id_user);
	$this->clinical_history->group_by('id_categoria');
	$query = $this->clinical_history->get();
	return $query->result();
	}



function display_tarif_centro_categoria($id1,$id2)
	{
	$this->clinical_history->select('groupo,centro_id,seguro_id');
	$this->clinical_history->from('centros_tarifarios');
	$this->clinical_history->where('centro_id',$id1);
	$this->clinical_history->where('seguro_id',$id2);
	$this->clinical_history->where('groupo !=',"");
	$this->clinical_history->group_by('groupo');
	$this->clinical_history->order_by('id_c_taf','desc');
	$query = $this->clinical_history->get();
	return $query->result();
	}

	public function seguro_doc_tarif_grouped($id)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('tarifarios');
 $this->clinical_history->join('seguro_medico', 'seguro_medico.id_sm= tarifarios.id_seguro');
  $this->clinical_history->where("id_doctor",$id);
  $this->clinical_history->group_by('id_seguro');
  $query = $this->clinical_history->get();
  return $query->result();
}


	public function seguro_doc_tarif_grouped_med($id,$id2)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('tarifarios');
 $this->clinical_history->join('seguro_medico', 'seguro_medico.id_sm= tarifarios.id_seguro');
  $this->clinical_history->where("id_doctor",$id);
  $this->clinical_history->where("id_seguro",$id2);
  $this->clinical_history->group_by('id_seguro');
  $query = $this->clinical_history->get();
  return $query->result();
}








	public function seguro_doc_tarif_grouped1($id)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('tarifarios');
 $this->clinical_history->where("id_seguro",$id);
  $this->clinical_history->group_by('id_doctor');
  $query = $this->clinical_history->get();
  return $query->result();
}


	function centro_categoria_servicios($val)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('centros_tarifarios');
	$this->clinical_history->where('groupo',$val['categoria']);
	$this->clinical_history->where('centro_id',$val['id_centro']);
	$this->clinical_history->where('seguro_id',$val['id_seguro']);
	$this->clinical_history->order_by('id_c_taf','desc');
	$query = $this->clinical_history->get();
	return $query->result();
	}



	 public function save_codigo_contrato($data) {
        // Inserting into your table
        $this->clinical_history->insert('codigo_contrato', $data);
     }

	 public function saveNewTarifMedico($data) {
        $this->clinical_history->insert('tarifarios', $data);
     }

	function check_if_doc_has_tarifarios_for_this_seguro($get)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->where('id_seguro',$get['id_seguro']);
	$this->clinical_history->where('id_doctor',$get['id_doctor']);
	$query = $this->clinical_history->get();
	 return $query->num_rows();
	}

		function check_if_centro_medico_has_tarifarios_already($id1,$id2)
	{
	$this->clinical_history->select('*');
	$this->clinical_history->from('codigo_contrato');
	$this->clinical_history->where('id_centro',$id1);
	$this->clinical_history->where('id_seguro',$id2);
	$query = $this->clinical_history->get();
	 return $query->num_rows();
	}

	public function save_edit_codigo_prestador($id,$data2){
$this->clinical_history->where('id', $id);
$this->clinical_history->update('codigo_contrato', $data2);
}




public function delete_doctor_centro_medico2(){
$this->clinical_history->where('centro_medico',0);
$this->clinical_history->delete('doctor_centro_medico');
}

public function delete_doctor_agenda2(){
$this->clinical_history->where('agenda', 0);
$this->clinical_history->delete('doctor_agenda');
}

public function delete_doctor_seguro2(){
$this->clinical_history->where('seguro_medico',0);
$this->clinical_history->delete('doctor_seguro');
}


	public function delete_tarifarios_centro($id){
  $this->clinical_history->where('id_c_taf', $id);
  $this->clinical_history->delete('centros_tarifarios');
}

	public function saveNewTarifCentro($data){
 $this->clinical_history->insert('centros_tarifarios', $data);
}





	public function delete_tarifarios($id){
  $this->clinical_history->where('id_tarif', $id);
  $this->clinical_history->delete('tarifarios');
}



	public function delete_all_tarifarios($del){
  $this->clinical_history->where('id_seguro', $del['id_seguro']);
   $this->clinical_history->where('id_doctor', $del['id_doctor']);
  $this->clinical_history->delete('tarifarios');
}


	public function delete_all_tarifarios_codigo($del){
  $this->clinical_history->where('id_seguro', $del['id_seguro']);
   $this->clinical_history->where('id_doctor', $del['id_doctor']);
  $this->clinical_history->delete('codigo_contrato');
}


public function row_validation_after_validate($id,$data){
$this->clinical_history->where('idfac', $id);
$this->clinical_history->update('factura', $data);
}


public function report_bill_by_desde_privado($id,$perfil){
$this->clinical_history->select("filter_date");
$this->clinical_history->from('factura2');
if($perfil=="Medico"){
$this->clinical_history->where('medico',$id);
}
$this->clinical_history->where("seguro_medico=",11);
$this->clinical_history->group_by('filter_date');
$this->clinical_history->order_by('filter_date','asc');
$query = $this->clinical_history->get();
return $query->result();
}


public function report_bill_by_desde_general($id,$perfil){
$this->clinical_history->select("filter_date");
$this->clinical_history->from('factura2');
if($perfil=="Medico"){
$this->clinical_history->where('medico',$id);
}
$this->clinical_history->where("seguro_medico !=",11);
$this->clinical_history->group_by('filter_date');
$this->clinical_history->order_by('filter_date','asc');
$query = $this->clinical_history->get();
return $query->result();
}




public function report_bill_by_hasta_privado($id,$perfil){
$this->clinical_history->select("filter_date");
$this->clinical_history->from('factura2');
if($perfil=="Medico"){
$this->clinical_history->where('medico',$id);
}
$this->clinical_history->where("seguro_medico =",11);
$this->clinical_history->group_by('filter_date');
$this->clinical_history->order_by('filter_date','desc');
$query = $this->clinical_history->get();
return $query->result();
}


public function report_bill_by_hasta_general($id,$perfil){
$this->clinical_history->select("filter_date");
$this->clinical_history->from('factura2');
if($perfil=="Medico"){
$this->clinical_history->where('medico',$id);
}
$this->clinical_history->where("seguro_medico !=",11);
$this->clinical_history->group_by('filter_date');
$this->clinical_history->order_by('filter_date','desc');
$query = $this->clinical_history->get();
return $query->result();
}




public function report_bill_by_date_centro($id,$perfil){
$this->clinical_history->select("centro_medico");
$this->clinical_history->from('factura2');
$this->clinical_history->join('medical_centers', 'factura2.centro_medico = medical_centers.id_m_c');
if($perfil=="Medico"){
$this->clinical_history->where('medico',$id);
}
$this->clinical_history->group_by('centro_medico');
$query = $this->clinical_history->get();
return $query->result();
}



public function report_bill_by_date_centro_linked($id) {
$this->clinical_history->select("id_centro AS centro_medico");
$this->clinical_history->from('medico_citas_linked_centers');
$this->clinical_history->join('doctor_agenda_test', 'doctor_agenda_test.id_doctor = medico_citas_linked_centers.current_doctor');

$this->clinical_history->where('id_doctor',$id);

$this->clinical_history->group_by('id_centro');
$query = $this->clinical_history->get();
return $query->result();
}




public function billCentroAdministrativo($id){
$this->clinical_history->select("centro_medico");
$this->clinical_history->from('factura2');
$this->clinical_history->join('medical_centers', 'factura2.centro_medico = medical_centers.id_m_c');

$this->clinical_history->where('centro_medico',$id);

$this->clinical_history->group_by('centro_medico');
$query = $this->clinical_history->get();
return $query->result();
}

public function report_bill_by_date_centro_fac($id,$perfil,$type, $admin_type_centro){
$this->clinical_history->select("centro_medico");
$this->clinical_history->from('factura2');
$this->clinical_history->join('medical_centers', 'factura2.centro_medico = medical_centers.id_m_c');
if($perfil=="Medico"){
$this->clinical_history->where('medico',$id);
}else{
if($admin_type_centro){
	$this->clinical_history->where('centro_medico',$admin_type_centro);
}	
}
$this->clinical_history->where('type',$type);
$this->clinical_history->group_by('centro_medico');
$query = $this->clinical_history->get();
return $query->result();
}







public function view_as_doctor_centro($id_doctor)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('doctor_centro_medico');
  $this->clinical_history->join('medical_centers', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c');
    $this->clinical_history->where('id_doctor',$id_doctor);
  $query = $this->clinical_history->get();
  return $query->result();
}

public function view_as_doctor_centro_fac($id_doctor,$type)
	{

$this->clinical_history->select("*");
  $this->clinical_history->from('doctor_centro_medico');
  $this->clinical_history->join('medical_centers', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c');
    $this->clinical_history->where('id_doctor',$id_doctor);
  $this->clinical_history->where('type',$type);
  $query = $this->clinical_history->get();
  return $query->result();
}




public function as_medico_report_bill_desde($id_doctor,$check)
  {

$this->clinical_history->select("*");
  $this->clinical_history->from('doctor_centro_medico');
  $this->clinical_history->join('factura2', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
  $this->clinical_history->where('id_doctor',$id_doctor);
  if($check=="privado"){
  $this->clinical_history->where("seguro_medico=",11);
  } else{
    $this->clinical_history->where("seguro_medico !=",11);
  }
  $this->clinical_history->group_by('filter_date');
$this->clinical_history->order_by('filter_date','asc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function as_medico_report_bill_hasta($id_doctor,$check)
  {

$this->clinical_history->select("*");
  $this->clinical_history->from('doctor_centro_medico');
  $this->clinical_history->join('factura2', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
  $this->clinical_history->where('id_doctor',$id_doctor);
   if($check=="privado"){
  $this->clinical_history->where("seguro_medico =",11);
  } else{
    $this->clinical_history->where("seguro_medico !=",11);
  }
  $this->clinical_history->group_by('filter_date');
$this->clinical_history->order_by('filter_date','desc');
  $query = $this->clinical_history->get();
  return $query->result();
}


public function get_fac_date_report_general($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->where($condition);
$this->clinical_history->where("center_id",$data['centro']);
//$this->clinical_history->where("seguro !=",11);
if($data['perfil'] =="Medico"){
$this->clinical_history->where("medico2",$data['id_user']);
}
$this->clinical_history->group_by('inserted_time');
$this->clinical_history->order_by('seguro','desc');
$query = $this->clinical_history->get();
return $query->result();
}




public function get_seguro_date_range($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->where($condition);
$this->clinical_history->where("center_id",$data['centro']);
$this->clinical_history->where("seguro",$data['seguro']);
$this->clinical_history->order_by('pat_id','desc');
$query = $this->clinical_history->get();
return $query->result();
}









public function get_fac_date_report_privado($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->where($condition);
$this->clinical_history->where("center_id",$data['centro']);
$this->clinical_history->where("seguro",11);
if($data['perfil'] =="Medico"){
$this->clinical_history->where("medico2",$data['id_user']);
}
$this->clinical_history->group_by('inserted_time');
$this->clinical_history->order_by('seguro','desc');
$query = $this->clinical_history->get();
return $query->result();
}

public function get_fac_date_report_centro_privado($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->where($condition);
$this->clinical_history->where("medico2",$data['doctor']);
$this->clinical_history->where("center_id",$data['centro']);
$this->clinical_history->where("seguro",11);
$this->clinical_history->group_by('inserted_time');
$this->clinical_history->order_by('seguro','desc');
$query = $this->clinical_history->get();
return $query->result();
}

public function get_fac_date_report_general_centro_privado($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->clinical_history->select('*');
$this->clinical_history->from('factura');
$this->clinical_history->where($condition);
$this->clinical_history->where("medico2",$data['doctor']);
$this->clinical_history->where("center_id",$data['centro']);
//$this->clinical_history->where("seguro !=",11);
$this->clinical_history->group_by('inserted_time');
$this->clinical_history->order_by('seguro','desc');
$query = $this->clinical_history->get();
return $query->result();
}

public function search_patients_factura(){
$this->clinical_history->select("id_p_a,cedula,nec1,nombre");
  $this->clinical_history->from('patients_appointments');
$query = $this->clinical_history->get();
  return $query->result();
}


public function search_patients_facturaDoc($id,$perfil){
$this->clinical_history->select("id_p_a,cedula,nec1,nombre");
  $this->clinical_history->from('patients_appointments');

$query = $this->clinical_history->get();
return $query->result();
}





public function search_date_range_seguro_factura($id,$perfil){
$this->clinical_history->select("seguro_medico");
  $this->clinical_history->from('factura2');
if($perfil=="Asistente Medico"){
$this->clinical_history->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = factura2.centro_medico');
} else if($perfil='Medico') {
$this->clinical_history->where('medico',$id);
}
$this->clinical_history->where('seguro_medico !=',11);
$this->clinical_history->group_by('seguro_medico');
$query = $this->clinical_history->get();
return $query->result();
}




public function search_date_range_seguro_factura_adm(){
$this->clinical_history->select("seguro_medico");
$this->clinical_history->from('factura2');
$this->clinical_history->where('seguro_medico !=',11);
$this->clinical_history->group_by('seguro_medico');
$query = $this->clinical_history->get();
return $query->result();
}


function tarifarios_by_seguros_doc($get)
{
$this->clinical_history->select('id_tarif,codigo,simon,procedimiento,id_seguro,monto');
$this->clinical_history->from('tarifarios');
 $this->clinical_history->join('seguro_medico', 'tarifarios.id_seguro = seguro_medico.id_sm');
$this->clinical_history->where('procedimiento',$get['procedimiento']);
$this->clinical_history->where('id_doctor',$get['id_user']);
$this->clinical_history->group_by('id_seguro');
$query = $this->clinical_history->get();
return $query->result();
}

function tarifarios_grouped_seguro_doc($id_user)
	{
	$this->clinical_history->select('id_sm,title');
	$this->clinical_history->from('tarifarios');
	$this->clinical_history->join('seguro_medico', 'tarifarios.id_seguro=seguro_medico.id_sm');
	$this->clinical_history->where('id_doctor',$id_user);
	$this->clinical_history->group_by('id_seguro');
	$query = $this->clinical_history->get();
	return $query->result();
	}




public function deleteNingunoDroga(){
  $this->clinical_history->where('name', 'ninguno');
  $this->clinical_history->delete('h_c_droga');
}



public function DeletePatCied($id){
  $this->clinical_history->where('diagno_def', $id);
  $this->clinical_history->delete('h_c_diagno_def_link');
}


	public function UpdateFormIndicaciones($data,$id){
$this->clinical_history->where('id_i_m',$id);
$this->clinical_history->update('h_c_indicaciones_medicales',$data);
}


public function UpdateFormIndEst($data,$id){
	$this->clinical_history->where('id_i_e', $id);
$this->clinical_history->update('h_c_indicaciones_estudio', $data);
}


	public function edit_tutor($id){
  $this->clinical_history->select('id, name_tutor, relacion');
  $this->clinical_history->from('tutor');
  $this->clinical_history->where('id',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}




public function UpdatePatientTutor($data,$id){
	$this->clinical_history->where('id', $id);
$this->clinical_history->update('tutor', $data);
}


public function save_new_historial_dropdown($data) {
// Inserting into your table
$this->clinical_history->insert('historial_dropdown', $data);
}



 public function save_new_medicaments($data) {
        // Inserting into your table
        $this->clinical_history->insert('medicaments', $data);
     }



	 public function save_new_presentacion($data) {
        // Inserting into your table
        $this->clinical_history->insert('presentacion', $data);
     }




public function Neuro(){
  $this->clinical_history->select('name');
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location',26);
 $query = $this->clinical_history->get();
 return $query->result();
}



public function Cabeza(){
  $this->clinical_history->select('name');
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location',27);
 $query = $this->clinical_history->get();
 return $query->result();
}


public function AbmInsForma(){
  $this->clinical_history->select('name');
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location',28);
 $query = $this->clinical_history->get();
 return $query->result();
}



public function Cervix(){
  $this->clinical_history->select('name');
  $this->clinical_history->from('historial_dropdown');
  $this->clinical_history->where('location',29);
 $query = $this->clinical_history->get();
 return $query->result();
}


 public function SaveConDef($savecd) {
        $this->clinical_history->insert('h_c_diagno_def_link', $savecd);
         $insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
    }


public function delete_empty_historial_dropdown(){
  $this->clinical_history->where('name',"");
  $this->clinical_history->delete('historial_dropdown');
}

  public function delete_factura3($id){
  $this->clinical_history->where('idfac', $id);
  $this->clinical_history->delete('factura');
}


public function was_me($val){
$this->clinical_history->where('user_id',$val);
$this->clinical_history->delete('user_login_twice');

}



function RedirectPatientResult($val){
  $this->clinical_history->select('id_p_a');
  $this->clinical_history->from('patients_appointments');
  $this->clinical_history->where('ced1',$val['ced1']);
  $this->clinical_history->where('ced2',$val['ced2']);
  $this->clinical_history->where('ced3',$val['ced3']);
 $query = $this->clinical_history->get();
 return $query->result();
}



	public function messageViewed($id,$value){
$this->clinical_history->where('id_doc',$id);
$this->clinical_history->update('doctors_message_view',$value);
}



public function MessageSeen($where1,$data){
$this->clinical_history->where('message_from',274);
$this->clinical_history->update('chat_medico', $data);
}

public function agendaDoc($id1,$id2)
	{
   $this->clinical_history->select("id,title,day");
  $this->clinical_history->from('diaries');
  $this->clinical_history->join('doctor_agenda_test', 'diaries.id = doctor_agenda_test.day');
  $this->clinical_history->where('id_doctor',$id1);
  $this->clinical_history->group_by('id_centro',$id2);
  $query = $this->clinical_history->get();
  return $query->result();
}



	public function deleteDocCentroAgenda($id1,$id2){
  $this->clinical_history->where('id_doctor', $id1);
  $this->clinical_history->where('id_centro', $id2);
  $this->clinical_history->delete('doctor_agenda_test');
}



public function getRecetaForFarmacia($limit, $start,$id_farma)  {
$this->clinical_history->select('id_i_m, historial_id,branch,despachada');
$this->clinical_history->from('h_c_indicaciones_medicales');
$this->clinical_history->where('farma',$id_farma);
//$this->clinical_history->group_by('encrypt_recetas');
$this->clinical_history->order_by('id_i_m','desc');
$this->clinical_history->limit($limit, $start);
$query = $this->clinical_history->get();
 return $query->result();

}

public function getDespachadasEst($limit, $start,$estudio_cat)  {
$this->clinical_history->select('id_i_e, historial_id,despachada,updated_time,operator,centro');
$this->clinical_history->from('h_c_indicaciones_estudio');
$this->clinical_history->where('estudio_cat',$estudio_cat);
//$this->clinical_history->group_by('encrypt_recetas');
$this->clinical_history->order_by('id_i_e','desc');
$this->clinical_history->limit($limit, $start);
$query = $this->clinical_history->get();
 return $query->result();

}



  	public function countTotalCitaDoc($id_centro){
$this->clinical_history->select('doctor, count(doctor) as Total');
  $this->clinical_history->from('rendez_vous');
  if($id_centro){
   $this->clinical_history->where('centro',$id_centro);
  }
  $this->clinical_history->where('confirmada',0);
   $this->clinical_history->where('fecha_propuesta',date("d-m-Y"));
  $this->clinical_history->where('cancelar',0);
 $this->clinical_history->group_by('doctor');
  $this->clinical_history->order_by('Total', 'desc');
  $query = $this->clinical_history->get();
  return $query->result();
}

 public function h_c_of_refracion($data) {
        $this->clinical_history->insert('h_c_of_refracion', $data);
		 $insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
     }

 public function laboratory_lentes($data) {
        $this->clinical_history->insert('laboratory_lentes', $data);
		 $insert_id = $this->clinical_history->insert_id();
        return  $insert_id;
     }
//---------------------NEVER DELETE DE BRACKET BELOW----------------------------------------

}
