<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_admin extends CI_Model{
    function __construct() {
       // $this->userTbl = 'users';
	   $this->userTbl = 'account_demand';
	   $otherdb = $this->load->database('padrondominicano', TRUE);
	   
    }
    /*
     * get rows from the users table
     */
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
    
    /*
     * Insert user information
     */
    public function insert($data = array()) {
        //add created and modified data if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
	
	
public function set_cita_to_confirm($id,$data){
$this->db->where('id_cita', $id);
$this->db->update('citas', $data);
}

	
public function display_centro_medico($data){
$this->db->select("*");
  $this->db->from('medical_centers');
  $this->db->where('name',$data);
  $query = $this->db->get();
  return $query->result();
}

public function getConfirmSolicitud(){
$this->db->select("*");
  $this->db->from('citas');
 $this->db->where('confirmada',1);
  $query = $this->db->get();
  return $query->result();
}

public function get_centro_medico($nombre){
$this->db->select("*");
  $this->db->from('citas');
 $this->db->where('centro_medico', $nombre);
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
$condition = "fecha_filter BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
$this->db->select('*');
$this->db->from('citas');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}


 function getCountries()
    {
        $query = $this->db->query('SELECT  short_name FROM countries');
        return $query->result();

    }
	function getProvinces(){
		$this->db->select('id,title');
		$this->db->from('provinces');
		$this->db->order_by('title', 'asc'); 
		$query=$this->db->get();
		return $query->result(); 
	}
	
	function getData($loadType,$loadId){
		if($loadType=="municipio"){
			$fieldList='id,title as name';
			$table='townships';
			$fieldName='province_id';
			$orderByField='title';						
		}
		
		$this->db->select($fieldList);
		$this->db->from($table);
		$this->db->where($fieldName, $loadId);
		$this->db->order_by($orderByField, 'asc');
		$query=$this->db->get();
		return $query; 
	}
	
	
	
	
	public function get_cedula($nec_cedula)  {

}

}