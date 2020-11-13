<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Padron_model extends CI_Model
{
 var $table = 'rendez_vous';

 var $column_search = array("id_patient");  
     var $column_order = array(null, "id_patient");
    // $this->order = array('FECHA_NAC' => 'asc');
	
  private $padron_database;
  function __construct()
  {
 parent::__construct();
    $this->padron_database = $this->load->database('padron',TRUE);
  }
  
  //-------------------------------------------------------------------------------------------------------------------------------
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
    public function countAll($postData){
        $this->padron_database->from($this->table);
		 $this->padron_database->where('id_patient',6);
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
 $this->padron_database->where('id_patient',6);
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
//----------------------------------------------------------------------------------------------------------------------------------


 public function test($id){
$this->padron_database->select("*");
  $this->padron_database->from('padron');
 $this->padron_database->where('MUN_CED',$id);
  $query = $this->padron_database->get();
  return $query->result();
}
function test2(){

     $query ="select * from padron WHERE  SEQ_CED DESC limit 1";

     $res = $this->padron_database->query($query);
      return $res->result();
    }


public function getPatientCedulaPad($data)  {
$this->padron_database->select('MUN_CED,SEQ_CED,VER_CED,FECHA_NAC,NOMBRES,APELLIDO1,APELLIDO2,CALLE,EST_CIVIL,SEXO,TELEFONO,COD_CIUDAD,COD_MUNICIPIO,LUGAR_NAC,COD_SECTOR');
  $this->padron_database->from('padron');
 $this->padron_database->where('MUN_CED',$data['MUN_CED']);
 $this->padron_database->where('SEQ_CED',$data['SEQ_CED']);
$this->padron_database->where('VER_CED',$data['VER_CED']);
  $query = $this->padron_database->get();
 return $query->result();
}

 public function getPhoto($data)  {
  $this->padron_database->select('IMAGEN');
  $this->padron_database->from('fotos');
 $this->padron_database->where('MUN_CED',$data['MUN_CED']);
 $this->padron_database->where('SEQ_CED',$data['SEQ_CED']);
$this->padron_database->where('VER_CED',$data['VER_CED']);
  $query = $this->padron_database->get();
 return $query->result();
}

public function getPatientNameOnSelectPadCount($val)  {
$this->padron_database->select('MUN_CED,SEQ_CED,VER_CED,FECHA_NAC,NOMBRES,APELLIDO1,APELLIDO2,CALLE,EST_CIVIL,SEXO,TELEFONO,COD_CIUDAD,COD_MUNICIPIO,LUGAR_NAC,COD_SECTOR');
$this->padron_database->from('padron');
$this->padron_database->where('NOMBRES',$val['patient_nombres']);
$this->padron_database->where('APELLIDO1',$val['patient_apellido']);
if($val['patient_apellido2'] !=""){
$this->padron_database->where('APELLIDO2',$val['patient_apellido2']);
}
$query = $this->padron_database->get();
return $query->num_rows();


}



public function getPatientNameOnSelectPad($val,$limit, $start)  {
$this->padron_database->select('MUN_CED,SEQ_CED,VER_CED,FECHA_NAC,NOMBRES,APELLIDO1,APELLIDO2,CALLE,EST_CIVIL,SEXO,TELEFONO,COD_CIUDAD,COD_MUNICIPIO,LUGAR_NAC,COD_SECTOR');
$this->padron_database->from('padron');
$this->padron_database->where('NOMBRES',$val['patient_nombres']);
$this->padron_database->where('APELLIDO1',$val['patient_apellido']);
if($val['patient_apellido2'] !=""){
$this->padron_database->where('APELLIDO2',$val['patient_apellido2']);
}
$this->padron_database->order_by('FECHA_NAC','desc');
$this->padron_database->limit($limit, $start);
$query = $this->padron_database->get();
 return $query->result();

}


	public function getCoordonadores($postData=null){

     $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (nombres like '%".$searchValue."%' or cedula like '%".$searchValue."%' or
		mesa like'%".$searchValue."%' or sector like'%".$searchValue."%' or recinto like'%".$searchValue."%') ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');
     $records = $this->db->get('soto_coordinador')->result();
     //$totalRecords = $records[0]->allcount;
     $totalRecords = 10;
     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get('soto_coordinador')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     ## Fetch records
     $this->db->select('*');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('soto_coordinador')->result();

     $data = array();
     foreach($records as $record ){
		 

		$vced1 = substr($record->cedula, 0, 3);
		$vced2 = substr($record->cedula, 3, 7);
		$vced3 = substr($record->cedula, -1);

		if($record->photo=="padron"){
		/*$photo=$this->padron_database->select('IMAGEN')
		->where('MUN_CED',$vced1)
		->where('SEQ_CED',$vced2)
		->where('VER_CED',$vced3)
		->get('fotos')->row('IMAGEN');*/
		$photo=$this->padron_database->select('MUN_CED')
		->where('MUN_CED',$vced1)
		->where('SEQ_CED',$vced2)
		->where('VER_CED',$vced3)
		->get('fotos')->row('MUN_CED');
		 $imgpat='<img  style="display:inline-block;width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
		} 
		else{

		$imgpat='<img  style="display:inline-block; width:70%;"" src="'.base_url().'/assets/img/user.png/"  />';


		}

        $data[] = array( 
           "photo"=>$photo,
           "nombres"=>$record->nombres,
           "cedula"=>$record->cedula,
           "telefono"=>$record->telefono,
           "mesa"=>$record->mesa,
		    "sector"=>$record->sector,
			 "recinto"=>$record->recinto
        ); 
     }

     ## Response
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );

     return $response; 
   } 

}
