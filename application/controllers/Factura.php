<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Factura extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_admin');
        $this->load->model('navigation/account_demand_model');
    }
  
  
  
  
  public function factura_list(){
    $perfil="Admin";
    $draw=intval($this->input->get("draw"));
    $start=intval($this->input->get("start"));
    $length=intval($this->input->get("length"));
    $query=$this->db->query("SELECT * from tpfacturado LIMIT 20");
    $data= [];
    foreach($query->result() as $row) {
       //$go_to_hist =' <a class="dropdown-item"  href="'.base_url().'medico/clinical_history'.$this->NEC_PRO.'/'.$row->id_i_e.'/'.$zero.'/horiz/'.$this->ID_CENTRO.'" target="_blank">con la foto</a>';
       $go_to_hist =' <a class="dropdown-item"  href="'.base_url().'medico/clinical_history'.$row->NEC_PRO.'" ><span class="material-symbols-outlined">
update
</span></a>';

      $one=1;
        $zero=0;
      

    $sub_array = array();  
         $sub_array[] = $row->Tipo;  
         $sub_array[] = $row->Turno;  
         $sub_array[] = $row->NOMBRE; 
         $sub_array[] = $row->NEC_PRO; 
         $sub_array[] = $row->Cedula;
        $sub_array[] = $row->ARS; 
        $sub_array[] = $row->CENTRO; 
        $sub_array[] = $row->DOCTOR; 
         $sub_array[] = $row->Status;  
		 $sub_array[] = $row->Atendido;  
		  $sub_array[] = $go_to_hist; 
		  
           $data[] = $sub_array; 
}

    $rowesult=array(
             "draw"=>$draw,
               "recordsTotal"=>$query->num_rows(),
               "recordsFiltered"=>$query->num_rows(),
               "data"=>$data
          );
    echo json_encode($rowesult);
    exit();

 }
  
  
  
  
  
  
  
  
}
