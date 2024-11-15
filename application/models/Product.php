<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model{
	
	function __construct() {
        $this->proTable   = 'products';
		$this->transTable = 'payments';
    }
	
	/*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */
	public function getRows($id = ''){
		$this->db->select('*');
		$this->db->from($this->proTable);
		$this->db->where('status', '1');
		if($id){
			$this->db->where('id', $id);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('name', 'asc');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		
		// return fetched data
		return !empty($result)?$result:false;
	}
	
	/*
     * Insert data in the database
     * @param data array
     */
	public function insertTransaction($data){
		$insert = $this->db->insert($this->transTable,$data);
		return $insert?true:false;
	}
	
	
	public function getConfirmSolicitudTestSpeed($limit, $start, $centro){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('confirmada',0);
   $this->db->where('fecha_propuesta',date("d-m-Y"));
   if($centro){
	$this->db->where('centro',$centro);  
  }
  $this->db->where('cancelar',0);
  $this->db->order_by('id_apoint', 'desc');
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query->result();
}
	




public function getdata($limit, $start){	

	$this->db->select('id_patient, centro, doctor, created_time');
	$this->db->from('rendez_vous'); // this is first table name
	//$this->db->join('saveinput', 'saveinput.patient_id = rendez_vous.id_patient'); // this is second table name with both table ids
	$this->db->where('created_time >=', '2021-09-10');
$this->db->where('created_time <', '2022-05-17');
  $this->db->order_by('created_time', 'DESC');
	  $this->db->limit($limit, $start);
	$query = $this->db->get();
	return $query->result();

	}






	
	
}