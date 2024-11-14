<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_patient_padron extends CI_Model{
    
    function __construct() {
        // Set table name
		 $this->padron_database = $this->load->database('padron',TRUE);
        $this->table = 'padron';
        // Set orderable column fields
        $this->column_order = array(null, null,'nombres','apellido1','apellido2','Cedula');
        // Set searchable column fields
        $this->column_search = array('nombres','apellido1','apellido2', 'Cedula');
        // Set default order
        $this->order = array('nombres' => 'asc');
		
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->padron_database->limit($postData['length'], $postData['start']);
        }
		
        $query = $this->padron_database->get();
        return $query->result();
    }
    
    /*
     * Count all records
     */
    public function countAll(){
        $this->padron_database->from($this->table);
		
        return $this->padron_database->count_all_results();
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->padron_database->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData){
         
        $this->padron_database->from($this->table);
 $this->padron_database->where('nombres',$postData['nombres']);
 if($postData['apellidos'] !=""){
$this->padron_database->like('apellido1',$postData['apellidos']);
}

if($postData['apellidos2'] !=""){
$this->padron_database->like('apellido2',$postData['apellidos2']);
}
 
 
 
        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->padron_database->group_start();
                    $this->padron_database->like($item, $postData['search']['value']);
                }else{
                    $this->padron_database->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->padron_database->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->padron_database->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->padron_database->order_by(key($order), $order[key($order)]);
        }
    }

}