<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Seguro_medico extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
	    $this->ID_USER =$this->session->userdata('user_id');
	    $this->USER_PERFIL = $this->session->userdata('user_perfil');
	
		
	}

public function save_s_m1(){
//if($this->input->post('submitSeguro')){
$field_id  = $this->input->post('field_id');
$title  = $this->input->post('title');
$query = $this->db->get_where('seguro_medico',array('title'=>$title));
	if($query->num_rows() > 0 )
	{
$msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>seguro_medico : <span style='color:green'>$seguro_medico</span> ya existe .</div>";
$this->session->set_flashdata('success_msg', $msg);
redirect('admin/health_insurances');
}
else{
if(isset($_FILES["picture"]['name']))
{
$imgSize = $_FILES['picture']['size'];
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/seguros_medicos/' . $logo;
if(in_array($imgExt, $valid_extensions) && $imgSize < 5000000)
{
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

}
else {
	$msg = "<div id='deletesuccess' style='text-align:center;color:green'>Este tipo de archivo no está permitido, la inserción falla.</div>";
	$this->session->set_flashdata('success_msg', $msg);
redirect('admin/health_insurances');
}
}

//Prepare array of user data
$save = array(
'title'  => $title,
'logo' => $logo,
'rnc' => $this->input->post('rnc'),
'tel' => $this->input->post('tel'),
'email' => $this->input->post('email'),
'direccion' =>$this->input->post('direccion'),
'inserted_time' =>date("Y-m-d H:i:s"),
'inserted_by' =>$this->ID_USER,
'updated_by' =>$this->ID_USER,
'updated_time' =>date("Y-m-d H:i:s")
);

//Pass user data to model
$insertUserData = $this->model_admin->save_s_m($save);

foreach ($field_id as $key=>$id_f) {
   $saveS= array(
	'medical_insurance_id' =>$insertUserData,
	'field_id' => $id_f

	);

	$this->model_admin->saveSeguroField($saveS);
}
//Storing insertion status message.
if($insertUserData){
	$msg = "<div id='deletesuccess' style='text-align:center;color:green'>El seguro medico se guada con exito.</div>";
	$this->session->set_flashdata('success_msg', $msg);
}else{
$msger="Hubo algunos problemas, por favor intente de nuevo.";
$this->session->set_flashdata('error_msg', $msger);
}
redirect('admin/health_insurance');
}
//}
//Form for adding user data


}


public function updateSeguroField(){
//if($this->input->post('submitSeguro')){
$id_seguro  = $this->input->post('id_seguro');
$title  = $this->input->post('title');
$field_id  = $this->input->post('field_id');

if($_FILES['picture']['tmp_name'] != '')
{
$imgSize = $_FILES['picture']['size'];
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/seguros_medicos/' . $logo;
if(in_array($imgExt, $valid_extensions) && $imgSize < 5000000)
{
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

}
else {
	$msg = "<div id='deletesuccess' style='text-align:center'>Este tipo de archivo no está permitido, la inserción falla.</div>";
	$this->session->set_flashdata('success_msg', $msg);
redirect('admin/health_insurance');
}
}
else {
	$old_logo=$this->db->select('logo')->where('id_sm',$id_seguro)->get('seguro_medico')->row('logo');
$logo = $old_logo;

	}
//Check whether user upload picture

//Prepare array of user data
$save = array(
'title'  => $this->input->post('title'),
'logo' => $logo,
'rnc' => $this->input->post('rnc'),
'tel' => $this->input->post('tel'),
'email' => $this->input->post('email'),
'direccion' =>$this->input->post('direccion'),
'updated_by' =>$this->ID_USER,
'updated_time' =>date("Y-m-d H:i:s")
);

//Pass user data to model
$insertUserData = $this->model_admin->updateSeguro($id_seguro,$save);
//---------------------------------seguro_field
$this->model_admin->deleteSeguroField($id_seguro);
$this->model_admin->deleteSeguroFieldInPatient($id_seguro);
foreach ($field_id as $key=>$id_f) {
   $saveS= array(
	'medical_insurance_id' =>$id_seguro,
	'field_id' => $id_f

	);

	$this->model_admin->saveSeguroField($saveS);
}
//Storing insertion status message.
if($insertUserData){
$msgs="seguro medico se guada con exito.";
$this->session->set_flashdata('success_msg',$msgs);
}else{
$msger="Hubo algunos problemas, por favor intente de nuevo.";
$this->session->set_flashdata('error_msg', $msger);
}
//redirect('admin/health_insurances');
redirect('admin/health_insurance');
//}
//Form for adding user data


}





 public function healthInsuranceTable(){
	 $this->load->view('admin/health_insurances/data');
 }
  public function healthInsuranceTableData(){
		
    $draw=intval($this->input->get("draw"));
    $start=intval($this->input->get("start"));
    $length=intval($this->input->get("length"));
    $query=$this->db->query("SELECT * FROM  areas  ORDER BY title_area ASC");
	
	$all_seguro_medico = $this->model_admin->display_all_seguro_medico();
$ALL_FIELDS = $this->model_admin->all_fields();
	
	 $data= [];
    foreach($all_seguro_medico as $row) {
$img= '<img width="50" height="50" class="img-thumbnail" src="'.base_url().'/assets/img/seguros_medicos/'.$row->logo.'"  />';

$button_update ='<a href="'.base_url().'admin/EditSeguroMedico/'.$row->id_sm.'"  class="dropdown-item update-this-seguro text-primary"><i class="bi bi-pencil"></i> Editar</a>';
			
$button_delete ='<a href="#"   id="'.$row->id_sm.'" class="dropdown-item text-danger cancel-this-cita"><i class="bi bi-file-x "></i> Eliminar</a>';
		
$actions = "<div class='btn-group dropstart' >
	  <button type='button' class='btn btn-outline-primary btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'></button>
  <ul class='dropdown-menu' >
	  <li>$button_update</li>
		</ul>
		
		</div>";


   $sub_array = array();
   $sub_array[] = $row->id_sm;
	 $sub_array[] = $row->title;
         $sub_array[] = $img;	
    $sub_array[] = $row->rnc; 
        $sub_array[] = $actions; 
     $data[] = $sub_array; 
}

    $result=array(
             "draw"=>$draw,
               "recordsTotal"=>count($all_seguro_medico),
               "recordsFiltered"=>count($all_seguro_medico),
               "data"=>$data
          );
    echo json_encode($result);
    exit();

 } 



}