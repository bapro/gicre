<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_auditoria_medica extends CI_Model{
    function __construct() {
       // $this->userTbl = 'users';
	 }
	 
	

public function get_numero_contrado_ars($id1,$id2){
$this->db->select("*");
  $this->db->from('factura2');
   $this->db->join('users', 'users.id_user=factura2.medico');
 $this->db->where('codigoprestado',$id1);
  $this->db->where('seguro_medico',$id2);
  $query = $this->db->get();
  return $query->result();
}



public function count_patient_num_contrato_ars($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->join('factura2', 'factura.id2=factura2.idfacc');
$this->db->where($condition);
$this->db->where("medico2",$data['medico']);
$this->db->where("seguro",$data['seguro_medico']);
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



public function get_nombre_medico_ars($id1,$id2){
$this->db->select("name,id_user,codigoprestado,paciente,seguro_medico,centro_medico,area,rnc");
  $this->db->from('factura2');
 $this->db->join('users', 'users.id_user=factura2.medico');
 $this->db->where('medico',$id1);
  $this->db->where('seguro_medico',$id2);
$query = $this->db->get();
  return $query->result();
}


public function get_exequatur_medico_ars($id1,$id2){
$this->db->select("*");
 $this->db->from('users');
 $this->db->join('factura2', 'users.id_user=factura2.medico');
$this->db->where('exequatur',$id1);
 $this->db->where('seguro_medico',$id2);
$query = $this->db->get();
  return $query->result();
}




public function get_date_filter_ars($id1,$id2){
$this->db->select("filter");
 $this->db->from('factura');
$this->db->where('medico2',$id1);
 $this->db->where('seguro',$id2);
$this->db->group_by('filter');
$query = $this->db->get();
  return $query->result();
}



public function get_data_medico_ars($id1,$id2){
$this->db->select("*");
 $this->db->from('users');
 $this->db->join('factura2', 'users.id_user=factura2.medico');
$this->db->where('id_user',$id1);
 $this->db->where('seguro_medico',$id2);
$query = $this->db->get();
  return $query->result();
}











	
public function ars_codigo_prestador($id){
$this->db->select("distinct(codigoprestado)");
  $this->db->from('factura2');
  $this->db->where('seguro_medico',$id);
 $query = $this->db->get();
  return $query->result();
}
	 
	 
	 
public function ars_medicos_facturar($id){
$this->db->select("distinct(name),medico");
  $this->db->from('users');
 $this->db->join('factura2', 'users.id_user=factura2.medico');
 $this->db->where('seguro_medico',$id);
$query = $this->db->get();
  return $query->result();
}



public function ars_exequatur_medico_factura($id){
$this->db->select("distinct(exequatur)");
 $this->db->from('factura2');
 $this->db->join('users', 'users.id_user=factura2.medico');
  $this->db->where('seguro_medico',$id);
$query = $this->db->get();
  return $query->result();
}





public function ars_cedula_medico_factura($id){
$this->db->select("distinct(medico)");
 $this->db->from('factura2');
 $this->db->where('seguro_medico',$id);
$query = $this->db->get();
  return $query->result();
}	 
	 
	 
	 
 public function show_patient_arc_report_ars($data) {
$this->db->select('*');
$this->db->from('factura');
$this->db->join('factura2', 'factura2.idfacc=factura.id2');
$this->db->where("filter >=",$data['desde']);
$this->db->where("filter <=",$data['hasta']);
$this->db->where("medico2",$data['medico']);
$this->db->where("seguro",$data['id_seguro']);
$this->db->where("validate",1);
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
	 
	 
	 
	 
	 
	 
	 }