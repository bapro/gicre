<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Serversidetable extends CI_Model{
 protected $table = 'rendez_vous';
   
	   function __construct() {
       // $this->userTbl = 'users';
	   $this->load->library("search_patient_photo");
	   	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
			  $this->PERFIL =$this->session->userdata('user_perfil');
		   $this->ID_USER =$this->session->userdata('user_id');
		  $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		  $this->load->library('hospitalization_lib');
		 if($this->session->userdata('admin_position_centro')==''){
			  $this->where_centro_administrativo = "";
		 }else{
			 	$id_centro_administrativo=$this->db->select('id_centro')->where('id_user',$this->session->userdata('user_id'))->get('user_centro_administrativo')->row('id_centro'); 
			   $this->where_centro_administrativo = "&& centro=$id_centro_administrativo";
		 }
		  
	 }

    public function get_count() {
            return $this->db->count_all($this->table);
        }

       function make_query($centro, $origine, $patient)
 {
	  
 // $query = " SELECT * FROM rendez_vous WHERE filter_date='$fecha'";
   
			$query = "SELECT * FROM hospitalization_data WHERE alta =$origine && canceled= 0 ";
		
		

	$centroDoc=$this->db->select('id_centro')->where('id_doctor',$this->ID_USER)->get('doctor_agenda_test')->row('id_centro'); 
	$query .= "
    AND centro ='".$centroDoc."'
   ";



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
	

   $output .= '
    <tr style="font-size:12px">
     <td>'. $row->id_patient .'</td>
   <td >'. $row->centro .'</td>
      <td  > '. $row->causa .' '.$this->ID_USER.'  - '.$origine.'</td>
       <td  > </td>
     <td  > </td>
	 <td  >  </td>
	  <td  >   </td>
	
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
