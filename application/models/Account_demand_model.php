<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 Class Account_demand_model extends CI_Model {
	  function __construct() {
        $this->userTbl = 'account_demand';
    }

 public function saveDemande($data)
 {
  {
    $this->db->insert('account_demand', $data);
    $id_acd = $this->db->insert_id();
  }
  
  return $id_acd;
 }
 
  public function save_rendevous($data) {
        // Inserting into your table
        $this->db->insert('rendez_vous', $data);
    }
 
  public function saveCita($data) {
        // Inserting into your table
        $this->db->insert('patients_appointments', $data);
    }
 
 
public function findPatientByNombre($val1){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->like('nombre',$val1);
 $query = $this->db->get();
  return $query->result();
}
 
  public function getDemands(){
  $this->db->select("*");
  $this->db->from('account_demand');
  $query = $this->db->get();
  return $query->result();
 }
 
 
 function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}
		}
        
        if(array_key_exists("id_acd",$params)){
            $this->db->where('id_acd',$params['id_acd']);
			$query = $this->db->get();
			$result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
				$result = $query->num_rows();
			}elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
				$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
			}else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
	
	
	
	 function getSeguroMedico()
    {
        $query = $this->db->query('SELECT * FROM seguro_medico ORDER BY FIELD(title, "PRIVADO") DESC, title');
        return $query->result();

    }
	 function getCentroMedico()
    {
        $query = $this->db->query('SELECT id_m_c, name FROM medical_centers');
        return $query->result();

    }
	
	function getCausa()
    {
        $query = $this->db->query('SELECT  * FROM type_reasons');
        return $query->result();

    }
	 function getEspecialidad()
    {
      		$this->db->select('id_ar,title_area');
		$this->db->from('areas');
		$this->db->order_by('title_area', 'asc'); 
		$query=$this->db->get();
		return $query->result(); 

    }
	
	 function getDoctor()
    {
        $query = $this->db->query('SELECT id, first_name, last_name FROM users where perfil="Medico"');
        return $query->result();

    }
	
	
	public function get_input($seguro_medico)  {
  $this->db->select('name');
  $this->db->from('fields');
  $this->db->join('medical_insurances_fields', 'fields.id= medical_insurances_fields.field_id');
  $this->db->where('medical_insurance_id',$seguro_medico);
  $query = $this->db->get();
  return $query->result();
}
	public function get_doc_esp($id_esp)
	{
	$this->db->select("id_user, name");
  $this->db->from('users');
$this->db->where('area',$id_esp);
  $query = $this->db->get();
  return $query->result();
}

 public function saveInput($data) {
        $this->db->insert('saveinput', $data);
        
    }


public function getTownships(){
  $this->db->select('*'); 
  $this->db->from('townships');
 $query = $this->db->get();
 return $query->result();
}

 function getCountries()
    {
        $query = $this->db->query('SELECT  short_name FROM countries');
        return $query->result();

    }
	function getProvinces(){
		$this->db->select('id,title');
		$this->db->from('provinces');
		$this->db->order_by('title', 'desc'); 
		$query=$this->db->get();
		return $query->result(); 
	}




public function municipio_dropdown($id)  {
  $this->db->select('id_town,title_town');
  $this->db->from('townships');
  $this->db->where('province_id_town',$id);
  $query = $this->db->get();
  return $query->result();
}



public function getConfirmSolicitud(){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('confirmada',0);
  $this->db->where('user',1);
  $this->db->order_by('id_apoint', 'desc'); 
  $query = $this->db->get();
  return $query->result();
}




 public function save_patient($data) {
        // Inserting into your table
        $this->db->insert('patients_appointments', $data);
     }	
 }