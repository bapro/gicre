<?php
	class Refraction extends CI_Controller {
 	
	public function __construct() {
    parent::__construct();
    $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
	$this->load->library("get_table_data_by_id");
$this->clinical_history = $this->load->database('clinical_history',TRUE);
    $this->load->library("user_register_info");
 
}
	

	
	public function pagination() {
     $query= $this->clinical_history->query("SELECT * FROM h_c_of_refracion WHERE id_hist=$this->ID_PATIENT ORDER BY id DESC");
     $data['num_rows']= $query->num_rows();
     $data['rows']=$query;
    $this->load->view('clinical-history/ophtalmology/refraction/pagination', $data);
	}
	
	
	
	
	
	public function form() {
		
		$page= $this->input->get('page');
		  $data['id_patient']=$this->ID_PATIENT;
    $data['id_user']=$this->ID_USER;
    $data['id_centro']=$this->ID_CENTRO ;
		$data['data_refraccion'] = $this->input->get('signo');
	$query_ref=$this->clinical_history->query("SELECT * FROM   h_c_of_refracion WHERE id=$page");
	$data['query_ref']= $query_ref->result();
	
	$this->load->view('clinical-history/ophtalmology/refraction/form', $data);
		 echo "<script>$('.spinner-border').hide();</script>";
		
	}
	
	
	
	public function saveUpOfatalRef(){
$vision_sencilla= $this->input->post('vision_sencilla');
$vision_sencilla1 = (isset($vision_sencilla)) ? 1 : 0;

$flat_top= $this->input->post('flat_top');
$flat_top1 = (isset($flat_top)) ? 1 : 0;

$invisibles= $this->input->post('invisibles');
$invisibles1 = (isset($invisibles)) ? 1 : 0;

$progresivos= $this->input->post('progresivos');
$progresivos1 = (isset($progresivos)) ? 1 : 0;

$antirreflejos= $this->input->post('antirreflejos');
$antirreflejos1 = (isset($antirreflejos)) ? 1 : 0;

$policarbonatos= $this->input->post('policarbonatos');
$policarbonatos1 = (isset($policarbonatos)) ? 1 : 0;

$transitions= $this->input->post('transitions');
$transitions1 = (isset($transitions)) ? 1 : 0;

$foto_croma= $this->input->post('foto_croma');
$foto_croma1 = (isset($foto_croma)) ? 1 : 0;

$data= array(
'od_espera_r'=> $this->input->post('od_espera_r'),
 'od_espera'=> $this->input->post('od_espera'),
'od_cilindro'=> $this->input->post('od_cilindro'),
'od_cilindro_r'=> $this->input->post('od_cilindro_r'),
'eje_od'=> $this->input->post('eje_od'),
'add_od'=> $this->input->post('add_od'),
'espera_os'=> $this->input->post('espera_os'),
'os_espera_r'=> $this->input->post('os_espera_r'),
'cilindro_os'=> $this->input->post('cilindro_os'),
'os_cilindro_r'=> $this->input->post('os_cilindro_r'),
'eje_os'=> $this->input->post('eje_os'),
'add_os'=> $this->input->post('add_os'),
'vision_sencilla'=> $vision_sencilla1,
'flat_top'=> $flat_top1,
'invisibles'=> $invisibles1,
'progresivos'=> $progresivos1,
'antirreflejos'=> $antirreflejos1,
'policarbonatos'=> $policarbonatos1,
'transitions'=> $transitions1,
'foto_croma'=> $foto_croma1,
'd_prf'=> $this->input->post('d_prf'),
'altura_mm'=> $this->input->post('altura_mm'),
'ref_observaciones'=> $this->input->post('refr_nota'),
'id_hist'=> $this->input->post('id_patient'),
'inserted_by'=>$this->session->userdata('refra_g_in_by'),
'updated_by'=> $this->session->userdata('refra_g_up_by'),
'inserted_time'=> $this->session->userdata('refra_g_in_time'), 
'updated_time'=>$this->session->userdata('refra_g_up_time'),
'id_centro'=>$this->input->post('id_centro')
);
if($this->input->post('id_refraction')==0){
  $result = $this->clinical_history->insert("h_c_of_refracion", $data);
  $insert_id = $this->clinical_history->insert_id();
  
  $refraction=$this->clinical_history->select('id_hist, id_centro')->where('id',$insert_id)->get('h_c_of_refracion')->row_array();
           // $print = '
                   //  <a class="btn btn-primary btn-sm m-1"  href="' . base_url() . 'printings/print_if_foto_/'.$insert_id.'/0/0/ofal_ref_/" target="_blank"><i class="fa fa-print"></i> </span> Vert.</a>
                  //  <a class="btn btn-primary btn-sm m-1"  href="' . base_url() . 'printings/print_if_foto_/'.$insert_id.'/0/0/ofal_ref_h/" target="_blank"><i class="fa fa-print" ></i> </span> Horiz.</a>
                   //  ';
				   
				   

  $print = '
       <div class="btn-group dropend ">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-printer"></i> <span class="visually-hidden">Toggle Dropdown</span>
  </button>
	 <ul class="dropdown-menu"  >
   <li>
      <a class="dropdown-item">FORMATO VERTICAL</a> 
    </li>
       <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/refraction/'.$refraction['id_hist'].'/'.$insert_id.'/1/vert/'.$refraction['id_centro'].'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/refraction/'.$refraction['id_hist'].'/'.$insert_id.'/0/vert/'.$refraction['id_centro'].'" target="_blank">con la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/refraction/'.$refraction['id_hist'].'/'.$insert_id.'/1/horiz/'.$refraction['id_centro'].'" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/refraction/'.$refraction['id_hist'].'/'.$insert_id.'/0/horiz/'.$refraction['id_centro'].'" target="_blank">con la foto</a>
       </li>
  </ul>
  </div>
';
				   
				   
				   
				   
				   
				   
}else{
$where = array(
'id' =>$this->input->post('id_refraction')
);
$this->clinical_history->where($where);
 $result =$this->clinical_history->update("h_c_of_refracion",$data);
$print = '';
}
 if ($result) {
            $response['status'] = 1;
            $response['message'] = $print;
        } else {
            $response['status'] = 0;
            $response['message'] = '<i class="bi bi-check-lg text-danger fs-4"></i>!';
        }
 echo json_encode($response);
}
	
	
	
	
	}