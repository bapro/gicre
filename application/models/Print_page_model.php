<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Print_page_model extends CI_Model{
    function __construct() {
      $this->PERFIL = $this->session->userdata('user_perfil');
	  $this->ID_USER=$this->session->userdata('user_id');
	   $this->clinical_history = $this->load->database('clinical_history',TRUE);
	 }

   public function get_factura_reporte_general($desde,$hasta,$moneda,$doctor, $centro)
    {
		
		if($this->PERFIL=="Medico"){
			$where_doc = "&& medico2=$this->ID_USER";
		}elseif($doctor){
			$where_doc = "&& medico2=$doctor";
		}else{
		$where_doc = "";	
		}
		
		 $query = $this->db->query("SELECT *, factura.filter AS factura_fecha FROM factura INNER JOIN factura_modalidad_pago
	   ON factura.id2=factura_modalidad_pago.id_factura
	   WHERE filter BETWEEN '$desde' AND '$hasta'  && center_id=$centro && money_device='$moneda' $where_doc && factura.canceled=0 && factura_modalidad_pago.canceled=0");
        return $query;
	}
	
	
	
	public function patient_invoice_report($data) {
$condition = "filter BETWEEN " . "'" . $data['desde'] . "'" . " AND " . "'" . $data['hasta'] . "'";
$this->db->select('*');
$this->db->from('factura');
$this->db->where($condition);
$this->db->where("center_id",$data['centro']);
$this->db->where("seguro",$data['seguro']);
$this->db->order_by('pat_id','desc');
$query = $this->db->get();
return $query->result();
}


	public function print_indicaciones($id,$col,$table){
  $this->clinical_history->select('*');
  $this->clinical_history->from($table);
  $this->clinical_history->where($col,1);
    $this->clinical_history->where('historial_id',$id);
	//$this->db->limit(6);
 // $this->db->order_by('id_i_m', 'asc');
 $query = $this->clinical_history->get();
 return $query->result();
}



public function print_estudio($id)  {
  $this->clinical_history->select('*');
 $this->clinical_history->from('h_c_indicaciones_estudio');
 $this->clinical_history->where('id_i_e',$id);
  $query = $this->clinical_history->get();
  return $query->result();
}


	
}