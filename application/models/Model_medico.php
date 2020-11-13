<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_medico extends CI_Model{

function getMedicoCentro($iduser)
    {
   $this->db->select('*'); 
  $this->db->from('doctor_agenda_test');
  $this->db->join('medical_centers', 'medical_centers.id_m_c = doctor_agenda_test.id_centro');
  $this->db->where('id_doctor',$iduser);
   $this->db->group_by('id_centro');
  $query = $this->db->get();
        return $query->result();
 }
 
 function getMedicoAp($iduser)
    {
 $this->db->select('*'); 
  $this->db->from('rendez_vous');
$this->db->where('confirmada',0);
$this->db->where('fecha_propuesta',date("d-m-Y"));
$this->db->where('doctor',$iduser);
 $this->db->where('cancelar',0);
$this->db->order_by('id_apoint', 'DESC');
 $query = $this->db->get();
return $query->result();
 }
 
 
  function getMedicoApHoy($iduser,$limit, $start)
    {
 $this->db->select('*'); 
  $this->db->from('rendez_vous');
$this->db->where('confirmada',0);
$this->db->where('fecha_propuesta',date("d-m-Y"));
$this->db->where('doctor',$iduser);
 $this->db->where('cancelar',0);
$this->db->order_by('id_apoint', 'DESC');
  $this->db->limit($limit, $start);
 $query = $this->db->get();
return $query->result();
 }
 
 
 
 
 
 
function getPatientsMedico($iduser)
    {
 $this->db->select('id_p_a,nombre,photo,frecuencia,nec1,id_patient,centro,doctor'); 
  $this->db->from('patients_appointments');
  $this->db->join('rendez_vous', 'rendez_vous.id_patient= patients_appointments.id_p_a');
$this->db->where('doctor',$iduser);
$this->db->group_by('id_patient');
$this->db->order_by('id_p_a','desc');
 $query = $this->db->get();
return $query->result();
 }
 

  function getPatientsAsisMedico($iduser)
    {
 $this->db->select('id_patient,centro,doctor');
  $this->db->from('doctor_centro_medico');
  $this->db->join('rendez_vous', 'rendez_vous.centro= doctor_centro_medico.centro_medico');
 $this->db->where('id_doctor',$iduser);
 $this->db->group_by('id_patient');
 $this->db->order_by('id_patient','desc');
$query = $this->db->get();
return $query->result();
 }

 
 
  function getPatientSolicitudeAsisMedico($iduser)
    {
 $this->db->select('id_apoint');
  $this->db->from('rendez_vous');
  $this->db->join('doctor_centro_medico', 'rendez_vous.centro= doctor_centro_medico.centro_medico');
   $this->db->where('confirmada',1);
 $this->db->where('id_doctor',$iduser);
$query = $this->db->get();
return $query->result();
 }
 

 function getAsMedicoAp($iduser)
    {
 $this->db->select('*'); 
  $this->db->from('rendez_vous');
  //$this->db->join('rendez_vous', 'rendez_vous.centro= doctor_centro_medico.centro_medico');
$this->db->where('confirmada',0);
$this->db->where('fecha_propuesta',date("d-m-Y"));
$this->db->where('doctor',$iduser);
 $this->db->where('cancelar',0);
$this->db->order_by('id_apoint', 'DESC');
$query = $this->db->get();
return $query->result();
 } 
 
 
  function getAsMedicoApHoy($iduser,$limit, $start)
    {
 $this->db->select('*'); 
  $this->db->from('rendez_vous');
  //$this->db->join('rendez_vous', 'rendez_vous.centro= doctor_centro_medico.centro_medico');
$this->db->where('confirmada',0);
$this->db->where('fecha_propuesta',date("d-m-Y"));
$this->db->where('doctor',$iduser);
 $this->db->where('cancelar',0);
$this->db->order_by('id_apoint', 'DESC');
  $this->db->limit($limit, $start);
$query = $this->db->get();
return $query->result();
 } 
 
 
 
 
 
 
 
 
 function getAsMedicoApRdv($data)
    {
 $this->db->select('*'); 
  $this->db->from('rendez_vous');
$this->db->where('confirmada',0);
$this->db->where('id_patient',$data['id_patient']);
$this->db->where('doctor',$data['doctor']);
//$this->db->where('centro',$data['centro']);
 $this->db->order_by('id_apoint', 'desc'); 
$query = $this->db->get();
return $query->result();
 }  
 
 
 

public function get_centro_medico($val){
$this->db->select("*");
  $this->db->from('rendez_vous');
 $this->db->where('centro', $val['centro']);
  $this->db->where('doctor', $val['doctor']);
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

public function  get_centro_medico_datepicker_as($data){
$condition = "filter_date BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
$this->db->select('*');
$this->db->from('rendez_vous');
$this->db->where($condition);
$this->db->where('doctor', $data['doctor']);
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



public function get_centro_medico_datepicker($data) {
$condition = "filter_date BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
$this->db->select('*');
$this->db->from('rendez_vous');
$this->db->where($condition);
$this->db->where('centro', $data['centro']);
if($data['perfil']=="Medico"){
$this->db->where('doctor', $data['doctor']);
}
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


public function get_centro_medico_rdv($centro) {
$this->db->select('*');
$this->db->from('rendez_vous');
$this->db->where('centro', $centro);
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







//historial medical

public function historial_medical($id){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->where('id_p_a',$id);
  $query = $this->db->get();
  return $query->result();
}


public function GetAntePeFaPa($historial_id){
  $this->db->select('*'); 
  $this->db->from('ante_per_fam_pat');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}


function antec_count($historial_id){

    $this->db->select('historial_id')->from('ante_per_fam_pat')->where('historial_id', $historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}


public function GetAntAlReMed($historial_id){
  $this->db->select('*'); 
  $this->db->from('ante_al_re_med');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}

function CountAntAlReMed($historial_id){

    $this->db->select('historial_id')->from('ante_al_re_med')->where('historial_id', $historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}
public function GetAntOtros($historial_id){
  $this->db->select('*'); 
  $this->db->from('ante_otros');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}
function CountAntOtros($historial_id){

    $this->db->select('historial_id')->from('ante_otros')->where('historial_id', $historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}

public function GetHabitos($historial_id){
  $this->db->select('*'); 
  $this->db->from('habitos_toxicos');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}

function CountHabitos($historial_id){

    $this->db->select('historial_id')->from('habitos_toxicos')->where('historial_id', $historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}
function CountEnfermedad($historial_id){

    $this->db->select('historial_id')->from('enfermedad')->where('historial_id', $historial_id);
    $q = $this->db->get();
    return $q->num_rows();
}

function Enfermedad($historial_id)
    {
	$this->db->select('*');
$this->db->from('enfermedad');
$this->db->where('historial_id',$historial_id);
$query = $this->db->get();
 return $query->result();
   }

function count_examenes($historial_id){
   $this->db->select('id_ex')->from('examenes');
	$this -> db -> where('historial_id',$historial_id);
    $q = $this->db->get();
    return $q->num_rows();
	}

public function Examenes($historial_id){
  $this->db->select('*'); 
  $this->db->from('examenes');
  $this->db->where('historial_id',$historial_id);
 $query = $this->db->get();
 return $query->result();
}
	
}