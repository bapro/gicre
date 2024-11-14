<?php
	class Description_surgery extends CI_Controller {
    public function __construct() {
        parent::__construct();
     $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
	  $this->load->library("user_register_info");
	   $this->load->library("create_forms");
	   $this->load->helper('form'); 
	   $this->load->library("get_table_data_by_id");
	   $this->clinical_history = $this->load->database('clinical_history',TRUE);
	   
	    $this->load->library('medico_see_all_pat_hist');
			  $this->WHERE_ID_USER =  $this->medico_see_all_pat_hist->index();
			  
	   if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login/backTologin');
}
    }
	
	
	public function pagination() {
	$id_patient=$this->input->post("id_patient");
	 $this->session->set_userdata('id_patient', $id_patient);
     $query= $this->clinical_history->query("SELECT * FROM hc_quirurgica WHERE id_patient=$id_patient $this->WHERE_ID_USER ORDER BY id DESC");
     $data['num_rows']= $query->num_rows();
     $data['rows']=$query;
    $this->load->view('clinical-history/description-surgery/pagination', $data);
	}
	
	
	 function getIdPatient(){
		 $id_patient =$this->session->userdata('id_patient');
		 return $id_patient;
	 }
	
	
	
	
	public function listImages(){
		$data['from']=$this->input->post('from');	
$id_patient=$this->input->post('id_patient');
$data['id_patient']=$id_patient;

$data['folder_name']="assets_new/img/description-surgery/";
$data['table_name']="hc_quirurgica_patient_images";
$sql ="SELECT * FROM  hc_quirurgica_patient_images WHERE id_p_a=$id_patient ORDER BY id DESC";
$query= $this->clinical_history->query($sql);
$data['query']=$query;
//$this->load->view('clinical-history/description-surgery/patient-images',$data);
$this->load->view('clinical-history/description-surgery/patient-images/data',$data);
	}	
	
	
	function uploadImages(){
		if(isset($_FILES["document_file"]["name"]))  
{ 
$type5=$_FILES['document_file']['type']; 
 $new_name  = time()."-".$_FILES["document_file"]['name'];
$config = array(
'upload_path' => "./assets_new/img/description-surgery/",
'allowed_types' => "*",
'file_name' => $_FILES["document_file"]['name'],
'max_size' => "4024", // Can be set to particular file size , here it is 1 MB(2048 Kb)
);
$this->load->library('upload', $config);  
if(!$this->upload->do_upload('document_file'))  
{  
$error =  $this->upload->display_errors(); 
echo json_encode(array(
'failed_saved' => "<div class='alert alert-warning'>$error $type5</div>",
 'success' => false
 ));
}  
else 
{  
$imageExtention = pathinfo($_FILES["document_file"]["name"], PATHINFO_EXTENSION);
$type=$_FILES[ 'document_file' ][ 'type' ];     
$extensions=array( 'image/jpeg', 'image/png', 'image/gif' );
if( in_array( $type, $extensions )){
$imageType='img';
}else{
$imageType='doc';	
}


$data = $this->upload->data(); 
$save = array(
'folder'  => $data['file_name'],
'id_p_a' => $this->input->post('id_patient_to_load'),
'inserted_date' =>date("Y-m-d H:i:s"),
'inserted_by' => $this->ID_USER,
'file_type' => $imageType,
'file_ext' => $imageExtention,
'file_size' =>$_FILES['document_file']['size']
);

$this->clinical_history->insert("hc_quirurgica_patient_images",$save);
if($this->clinical_history->affected_rows() > 0){  
$arr = array(
'success_saved' => '<div class="alert alert-success">Foto guardado</div>'
);
}else{
$arr = array(
'failed_saved' => '<div class="alert alert-danger">Grabacion fallo</div>'
);
}
echo json_encode($arr);
} 

} 
	}
	
	
	public function downloadDocDescQ($id){
        $this->load->helper('download');
        $fileName = $this->clinical_history->select('folder')->where('id',$id)->get('hc_quirurgica_patient_images')->row('folder'); 
        $file = './assets_new/img/description-surgery/'.$fileName;
        force_download($file, NULL);
	}
	
	
	public function form() {
		
		$page= $this->input->get('page');
		  $data['idpatient']=$this->getIdPatient();
    $data['id_user']=$this->ID_USER;
    $data['id_centro']=$this->ID_CENTRO ;
		$data['desc_surgery_data'] = $this->input->get('signo');
	$query=$this->clinical_history->query("SELECT * FROM   hc_quirurgica WHERE id=$page");
	$data['query_des_surg']= $query->result();
	 [$result_centro_medicos]= $this->create_forms->getCentroAndSeguroByPerfil(0);
	$data['result_centro_medicos']=$result_centro_medicos;
	$this->load->view('clinical-history/description-surgery/form', $data);
			 echo "
			 <script> 
			 $('.spinner-border').hide();
			$('.form-select3').select2({
			theme: 'bootstrap-5',
			width: '100%'
			});
			 </script>"; 
		
	}
	
	
	
public function save(){
if($this->input->post("desc_proced")==""){
	$response['status'] = 2;
            $response['message'] = 'El Campo Descripción del Procedimiento es obligatorio!';
}else{
$data= array(
		"id_patient" => $this->getIdPatient(),
		'inserted_by'=> $this->input->post('desc_qui_in_by'),
		'updated_by'=> $this->input->post('desc_qui_up_by'),
		'inserted_time'=> $this->input->post('desc_qui_in_time'), 
		'updated_time'=>$this->input->post('desc_qui_up_time'),
		"diag_pre_qui" => trim($this->input->post("diag_pre_qui")),
		"pro_post" => trim($this->input->post("pro_post")),
		"diag_post_qui" => trim($this->input->post("diag_post_qui")),
		"anestesia" => trim($this->input->post("anestesia")),
		"incision" => trim($this->input->post("incision")),
		"cirugia_programada" => trim($this->input->post("cirugia_programada")),
		"cirugia_realizada" => trim($this->input->post("cirugia_realizada")),
		"hallasgo" => trim($this->input->post("hallasgo")),
		"desc_proced" => trim($this->input->post("desc_proced")),
		"perdida_sanguinea" => trim($this->input->post("perdida_sanguinea")),
		"compresa" => trim($this->input->post("compresa")),
		"gasas" => trim($this->input->post("gasas")),
		"drenes" => trim($this->input->post("drenes")),
		"transfusion" => trim($this->input->post("transfusion")),
		"unids_transfusion" => trim($this->input->post("unids_transfusion")),
		"condicion_paciente" => trim($this->input->post("condicion_paciente")),
		"traslado" => trim($this->input->post("traslado")),
		"hora_ini" => trim($this->input->post("hora_ini")),
		"hora_fin" => trim($this->input->post("hora_fin")),
		"tiempo_quirurgico" => trim($this->input->post("tiempo_quirurgico")),
		"cirujano" => trim($this->input->post("cirujano")),
		"ajudante" => trim($this->input->post("ajudante")),
		"ajudante_enf" => trim($this->input->post("ajudante_enf")),
		"muestras_patologia" => trim($this->input->post("muestras_patologia")),
		"histopatologico" => trim($this->input->post("histopatologico")),
		"centro" =>$this->input->post("centro_med_q_save"),
		"am_pm_hora_init" =>$this->input->post("am_pm_hora_init"),
		"am_pm_hora_fini" =>$this->input->post("am_pm_hora_fini"),

);
if($this->input->post('id_desc_quir')==0){
  $result = $this->clinical_history->insert("hc_quirurgica", $data);
  $insert_id = $this->clinical_history->insert_id();
            $print = '
           <div class="btn-group dropend ">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-printer"></i> <span class="visually-hidden">Toggle Dropdown</span>
  </button>
	 <ul class="dropdown-menu"  >

       <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/print_quirurgica/'.$this->getIdPatient().'/'.$insert_id.'/1/'.$this->input->post("centro_med_q_save").'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/print_quirurgica/'.$this->getIdPatient().'/'.$insert_id.'/0/'.$this->input->post("centro_med_q_save").'" target="_blank">sin la foto</a>
       </li>
      
  </ul>
  </div>
	';
}else{
$where = array(
'id' =>$this->input->post('id_desc_quir')
);
$this->clinical_history->where($where);
 $result =$this->clinical_history->update("hc_quirurgica",$data);
$print = '';
}
 if ($result) {
            $response['status'] = 1;
            $response['message'] = $print;
        } else {
            $response['status'] = 0;
            $response['message'] = '<i class="bi bi-check-lg text-danger fs-4"></i>!';
        }
}
 echo json_encode($response);
}
	
	



 function show_patient_image($id)
{


$imag=$this->clinical_history->select('folder, file_type')->where('id',$id)->get('hc_quirurgica_patient_images')->row_array();
$image = $imag['folder'];
$show_image= "./assets_new/img/description-surgery/$image";

$img= '<div style="text-align:center"><img oncontextmenu="return false" style="width:40%" src="'.base_url().$show_image.'"  /></div>';

echo $img;
}





function delPatDoc()
 {
	 
$folder=$this->clinical_history->select('folder')->where('id',$this->input->post('id'))->get('hc_quirurgica_patient_images')->row('folder');	

unlink( "./assets_new/img/description-surgery/".$folder);	
$where = array(
'id' =>$this->input->post('id')
);

$this->clinical_history->where($where);
$this->clinical_history->delete('hc_quirurgica_patient_images');

//$query_files=$this->$db->select('id_p_a')->where('id_p_a',$this->input->post('id_patient'))->get($this->input->post('table_name'));
//echo "(".$query_files->num_rows().")";

 }







	
	
	}