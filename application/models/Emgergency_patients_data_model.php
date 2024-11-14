<?php
class Emgergency_patients_data_model extends CI_Model
{
	
	   function __construct() {
       // $this->userTbl = 'users';
	   $this->load->library("search_patient_photo");
	   	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
		  $this->PERFIL =$this->session->userdata('user_perfil');
		   $this->ID_USER =$this->session->userdata('user_id');
		  $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		  $this->load->library('emergency_lib');
		  
		   if($this->session->userdata('admin_position_centro')==''){
			  $this->where_centro_administrativo = "";
		 }else{
			 	$id_centro_administrativo=$this->db->select('id_centro')->where('id_user',$this->session->userdata('user_id'))->get('user_centro_administrativo')->row('id_centro'); 
			   $this->where_centro_administrativo = "&& centro=$id_centro_administrativo";
		 }
	 }


 function make_query($centro, $origine, $patient)
 {
	  
 // $query = " SELECT * FROM rendez_vous WHERE filter_date='$fecha'";
   if($this->PERFIL == "Asistente Medico"){
		$query = "SELECT * FROM emergency_data WHERE alta =$origine && canceled= 0";	
		}else{
			$query = "SELECT * FROM emergency_data WHERE alta =$origine && canceled= 0 $this->where_centro_administrativo";
		}
		
if ($this->PERFIL == "Medico" && $centro=='') {
	$centroDoc=$this->db->select('id_centro')->where('id_doctor',$this->ID_USER)->get('doctor_agenda_test')->row('id_centro'); 
	$query .= "
    AND centro ='".$centroDoc."'
   ";
  }elseif($this->PERFIL == "Medico" && $centro !=''){
	$query .= "
    AND centro ='".$centro."'
   ";  
  }

  if($centro)
  {
   $query .= "
    AND centro ='".$centro."'
   ";
  }

if($patient)
  {
   $query .= "
    AND id_patient ='".$patient."'
   ";
  }


$query .= " ORDER BY id DESC ";
  return $query;
 }

 function count_all($centro, $origine, $patient)
 {
  $query = $this->make_query($centro, $origine, $patient);
  $data = $this->hospitalization_emgergency->query($query);
  return $data->num_rows();
 }








 function fetch_data($limit, $start, $centro, $origine, $patient)
 {
  $count_all = $this->count_all($centro, $origine, $patient);
 $query = $this->make_query($centro, $origine, $patient);
  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->hospitalization_emgergency->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
	     $paciente=$this->db->select('nombre,photo,ced1,ced2,ced3,date_nacer,nec1,seguro_medico,plan,afiliado')->where('id_p_a',$row->id_patient)->get('patients_appointments')->row_array(); 
		 $timeinserted=date("d-m-Y H:i:s", strtotime($row->timeinserted));
		
	$seguro_medico=$this->db->select('title')->where('id_sm',$paciente['seguro_medico'])
 ->get('seguro_medico')->row('title');
//$id_seg=$paciente['seguro_medico'];


  $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
	
	$centro=$this->db->select('name')->where('id_m_c',$row->centro )
->get('medical_centers')->row('name');
	
	
   
   $go_to_hist ='<a  class="dropdown-item"  href="'.site_url()."emergency/clinic_history/".encrypt_url($row->id).'/'.encrypt_url($row->id_patient).'/'.encrypt_url($row->centro).'/'.encrypt_url($row->doc).'/0" title="Historia clinica"><i class="bi bi-hospital"></i> Historia clinica</a>';
		
   $go_to_patient_data ='<a class="p-3"  href="'.site_url().''.$this->USER_CONTROLLER.'/patient/'.encrypt_url($row->id_patient).'/'.encrypt_url($row->id).'/'.encrypt_url($row->centro).'" >VER PACIENTE</a>';
	
	
	if($origine==1){
   
		$fecha_alta=date("d-m-Y H:i:s", strtotime($row->fecha_alta));
		$fecha_egreso = "<em class='text-success' >$fecha_alta</em>";	
	$show_causa=$this->hospitalization_emgergency->select('diag_alta_diag1')->where('id_hosp',$row->id)->get('emerg_conclusion_ingreso')->row('diag_alta_diag1'); 
	}else{
		$show_causa=$row->causa;
		$fecha_egreso ='';
	}
   $menu=$this->emergency_lib->menu_mas_admitted_patients($row->id, $row->id_patient, $row->centro, $row->doc, $origine);
  
  		$actions = "<div class='btn-group btn-group-sm' >
		<ul class='nav navbar-nav'>
	<li class='dropdown' >

 <button type='button' class='btn btn-primary btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'></button>
<ul class='dropdown-menu z-index-20'>
     $menu
		</ul>
		</div>
		
		";
	
		// if($this->PERFIL == "Asistente Medico"){
	  // $actions='';
  // }else{
	  //$actions=$actions; 
  // }
	   $printing ='<a target="_blank" class="p-2" href="'.site_url().'print_page_emergency/emergency_data/'.$row->id.'/'.$row->id_patient.'/'.$paciente['seguro_medico'].'/'.$row->doc.'/'.$row->centro.'" ><i class="bi bi-printer-fill"></i></a>';
   



$nombres='
<ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:12px">
            '.strtoupper($paciente['nombre']).'
          </button>
          <ul class="dropdown-menu" style="font-size:12px">
           <li>'.$go_to_patient_data.'</li>
            <li><a class="dropdown-item" href="#"><strong>FECHA NACIMIENTO:</strong> '.date("d-m-Y", strtotime($paciente['date_nacer'])).'</a></li>
            <li><a class="dropdown-item" href="#"># '.$row->id_patient.'</a></li>
          </ul>
        </li>
      </ul>
';
//$short_causa = substr($show_causa, 0, 25);
$causa='
<ul class="navbar-nav" >
        <li class="nav-item dropdown dropdown-center">
          <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:12px">
            '.$show_causa.'
          </button>
          <ul class="dropdown-menu">
           <li><a class="dropdown-item" href="#"><strong>CAUSA:'.$row->id.' </strong>'.$show_causa.'</a></li>
            <li><a class="dropdown-item" href="#"><strong>VIA: </strong>'.$row->via.'</a></li>
         </ul>
        </li>
      </ul>
';


if($seguro_medico =="PRIVADO"){
	$seguroInfo="$seguro_medico";
	
}else{
	if($paciente['afiliado']){
		$afiliado = $paciente['afiliado'];
	}else{
	$afiliado = '';	
	}
	
	
	 $nss=$this->db->select('input_name,inputf')->where('patient_id',$row->id_patient)
 ->get('saveinput')->row_array();
		if($nss){
		$input_name=$nss['input_name'];	
		$inputf=$nss['inputf'];	
		}else{
			$input_name='';	
			$inputf='';	
		}
	
	$seguroInfo="$afiliado - $plan <br/> $inputf# $input_name" ;
}

$showSeguroInfo='
<ul class="navbar-nav" >
        <li class="nav-item dropdown" >
          <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:12px">
            '.$seguro_medico.'
          </button>
          <ul class="dropdown-menu">
           
            <li style="font-size:12px"><a class="dropdown-item" href="#" > '.$seguroInfo.'</a></li>
           
          </ul>
        </li>
      </ul>
';

   $output .= '
    <tr style="font-size:12px">
     <td>'. $nombres .'</td>
   <td >'. $timeinserted .'</td>
      <td  > '. $fecha_egreso .' </td>
       <td  >  '.$showSeguroInfo.'</td>
     <td  > '. $centro .' </td>
	 <td  > '. $causa.' </td>
	 <td  > '. $row->refered_by.' </td>
	  <td  >  '.$printing.' '. $actions .'  </td>
	
    </tr>
    ';
   }
    $output .= '<tr><th colspan="8" style="text-align:center"><em>'.$count_all.' registro(s)</em></th></tr>';
  }
  else
  {
   $output = '<h3 style="text-align:center">No Hay Registros</h3>';
  }
  return $output;
 }
 
 
 
 
}

?>