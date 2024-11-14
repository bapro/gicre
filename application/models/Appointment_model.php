<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment_model extends CI_Model{
    
    function __construct() {
        // Set table name
			$this->PERFIL =$this->session->userdata('user_perfil');
		 $this->ID_USER=$this->session->userdata('user_id');
       $this->table = 'patients_appointments';
        // Set orderable column fields
        $this->column_order = array(null, 'patients_appointments.id_p_a','patients_appointments.nombre', null, 'medical_centers.name', 'users.name', 'rendez_vous.filter_date', null);
        // Set searchable column fields
        $this->column_search = array('patients_appointments.id_p_a','patients_appointments.nombre', 'medical_centers.name', 'users.name', 'rendez_vous.filter_date');
        // Set default order
        $this->order = array('patients_appointments.id_p_a' => 'DESC');
		
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
         $query =$this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
		
       $query = $this->db->get();
        return $query->result();
    }
    
    /*
     * Count all records
     */
    public function countAll(){
        $this->db->from($this->table);
		
        return 10;
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
         $query =$this->_get_datatables_query($postData);
		  $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData){
		$from="2023-06-06";
		$tod="2023-06-07";
		$condition = "rendez_vous.filter_date BETWEEN " . "'" .$from. "'" . " AND " . "'" .$tod. "'";
   
 $this->db->select('*, rendez_vous.filter_date AS cita_fecha, medical_centers.name AS centro_name, medical_centers.type AS centro_type,
 patients_appointments.cedula AS patient_cedula, users.name AS doctor_name');
$this->db->from('rendez_vous');
$this->db->where($condition);
//$this->db->where('doctor', $this->ID_USER);
  $this->db->where('cancelar', 0);
    $this->db->where('perfil', 'Medico');
$this->db->join('patients_appointments', 'rendez_vous.id_patient= patients_appointments.id_p_a');
 $this->db->join('medical_centers', 'rendez_vous.centro= medical_centers.id_m_c');
$this->db->join('users', 'rendez_vous.doctor= users.id_user', 'left');
 
 
 
 

      $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}