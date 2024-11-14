<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('navigation/account_demand_model');
		$this->load->library("search_patient_photo");
		$this->load->model('model_general');
		$this->load->model('model_admin');
		 $this->load->library('form_validation'); 
		 $this->load->library("create_patient_form_lib");
		 $this->ID_USER=$this->session->userdata['user_id'];
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		
	}



public function check_if_cedula_exist()
{
	$keyword = $this->input->post('keyword');
	$field=$this->input->post('field');
	$table=$this->input->post('table');
      
$query = $this->db->get_where($table,array($field=>$keyword));
	if($query->num_rows() > 0 )
	{
		echo "<span class='text-danger'><em>$keyword</em> existe ya  !</span>";
		echo "<script>$('.disabled-btn-duplicate-cedula').prop('disabled', true);</script>";

	} else {
echo "<script>$('.disabled-btn-duplicate-cedula').prop('disabled', false);</script>";
	}

}



public function savePatientData(){
 $query = $this->db->get_where('patients_appointments',array('nombre'=>$this->input->post('nombre'),'date_nacer'=>$this->input->post('date_nacer'),'tel_cel'=>$this->input->post('tel_cel')));
if($query->num_rows() > 0){
$ret = $query->row();
$this->session->set_flashdata('flash-patient-info',"<div class='alert alert-warning' role='alert'><i class='fa fa-warning text-danger'></i> El paciente no se ha creado por que ya lo tiene creado.
</div>");
redirect($this->USER_CONTROLLER."/patient/".encrypt_url($ret->id_p_a)."/0/0");
} else {	

 $rules = array(
 array(
                'field' => 'nombre',
                'label' => 'nombre',
                'rules' => 'required',
				
            ),
                 
            array(
                'field' => 'date_nacer',
                'label' => 'Fecha de nacimiento',
                'rules' => 'required'
            ),
			 array(
                'field' => 'seguro_medico', 
                'label' => 'seguro médico',
                'rules' => 'required'
            ),
			  array(
                'field' => 'tel_cel',
                'label' => 'Telefono celular',
                'rules' => 'required'
            ),
			  array(
                'field' => 'sexo',
                'label' => 'sexo',
                'rules' => 'required'
            ),
			 
			  array(
                'field' => 'nacionalidad',
                'label' => 'Nacionalidad',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);
		     $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
		if ($this->form_validation->run() == FALSE) {
			$msg='<h3 style="color:red">El formulario no se ha guadado, favor revisar llene los campos obligatorios</h3>';
			$this->session->set_flashdata('error_messages', $msg);
     // $this->createNewPatientForm();		
	 $this->load->view('header');
 echo $this->create_patient_form_lib->create_patient_form();

			
		} else{
			
					
if($this->input->post('seguro_medico')==11){
	$plan=0;
}else{
	if($this->input->post('plan')){
$plan=$this->input->post('plan');
	}else{
		$plan==0;
	}

}		

$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
	
if($_FILES["picture"]['tmp_name'] != '')
{
$extension = explode('.', $_FILES['picture']['name']);
$patient_image = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $patient_image;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
 }else{
	$patient_image=""; 
 }

			

$save = array(
  'nombre'  => $this->input->post('nombre'),
  'apodo'=> $this->input->post('apodo'),
  'photo'  =>$patient_image,
  'cedula' => $this->input->post('cedula'),
  'date_nacer' => $this->input->post('date_nacer'),
    'date_nacer_format' => $this->input->post('date_nacer_format'),
   'edad' => $this->input->post('age'),
  'frecuencia'=> $this->input->post('frecuencia'),
 'tel_resi'  => $this->input->post('tel_resi'),
  'tel_cel'=> $this->input->post('tel_cel'),
  'email' => $this->input->post('email'),
  'sexo' => $this->input->post('sexo'),
   'estado_civil' => $this->input->post('estado_civil'),
  'nacionalidad'=> $this->input->post('nacionalidad'),
 'seguro_medico'  => $this->input->post('seguro_medico'),
 'afiliado'  => $this->input->post('afiliado'),
 'plan'  => $plan,
  'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
  'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
 'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
   'responsable_legal' => $this->input->post('responsable_legal'),
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'inserted_by' =>$this->input->post('created_by'),
  'updated_by' =>$this->input->post('updated_by'),
 'insert_date' => $this->input->post('created_time'),
  'update_date' => $this->input->post('updated_time'),
  'filter_date' => date('Y-m-d')
  );

	  
$id_patient=$this->model_admin->save_patient($save);

$this->session->set_userdata('sessionIdPatient',$id_patient);
 $saveN = array(
'nec1'  => "NEC-$id_patient"
);

$this->model_admin->insert_nec($id_patient,$saveN);
//------------------------------------------------------------
if($this->input->post('seguro_medico') !=11){
for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$id_patient,
	'input_name' => $inp,
	'inputf' => $inf,
	'seguro_id' =>$this->input->post('seguro_medico')//when remove a seguro field we remove it in patient seguro field as well with this id
	);

	$this->model_admin->saveInput($saveInputs);
}
}

$id_p_a=encrypt_url($id_patient);
redirect($this->USER_CONTROLLER."/patient/".$id_p_a."/0/0");

}
}
 }
 
  public function updatePatientData(){
$id_patient=$this->input->post('id_patient');

 
 $rules = array(
 array(
                'field' => 'nombre',
                'label' => 'nombre',
                'rules' => 'required',
				
            ),
                 
            array(
                'field' => 'date_nacer',
                'label' => 'Fecha de nacimiento',
                'rules' => 'required'
            ),
			 array(
                'field' => 'seguro_medico', 
                'label' => 'seguro médico',
                'rules' => 'required'
            ),
			  array(
                'field' => 'tel_cel',
                'label' => 'Telefono celular',
                'rules' => 'required'
            ),
			  array(
                'field' => 'sexo',
                'label' => 'sexo',
                'rules' => 'required'
            ),
			 
			  array(
                'field' => 'nacionalidad',
                'label' => 'Nacionalidad',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);
		     $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
		if ($this->form_validation->run() == FALSE) {
			$msg='<h3 style="color:red">El formulario no se ha guadado, favor revisar llene los campos obligatorios</h3>';
			$this->session->set_flashdata('error_messages', $msg);
     // $this->createNewPatientForm();		
	 $this->load->view('header');
 echo $this->create_patient_form_lib->create_patient_form();

			
		} else{
			
					
if($this->input->post('seguro_medico')==11){
	$plan=0;
}else{
	if($this->input->post('plan')){
$plan=$this->input->post('plan');
	}else{
		$plan==0;
	}

}		

$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
	
if($_FILES["picture"]['tmp_name'] != '')
{
$extension = explode('.', $_FILES['picture']['name']);
$patient_image = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $patient_image;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
 }

else {
$old_image=$this->db->select('photo')->where('id_p_a',$id_patient)->get('patients_appointments')->row('photo');
$patient_image = $old_image;

	}			
	
			

$save = array(
  'nombre'  => $this->input->post('nombre'),
  'apodo'=> $this->input->post('apodo'),
  'photo'  =>$patient_image,
  'cedula' => $this->input->post('cedula'),
  'date_nacer' => $this->input->post('date_nacer'),
    'date_nacer_format' => $this->input->post('date_nacer_format'),
   'edad' => $this->input->post('age'),
  'frecuencia'=> $this->input->post('frecuencia'),
 'tel_resi'  => $this->input->post('tel_resi'),
  'tel_cel'=> $this->input->post('tel_cel'),
  'email' => $this->input->post('email'),
  'sexo' => $this->input->post('sexo'),
   'estado_civil' => $this->input->post('estado_civil'),
  'nacionalidad'=> $this->input->post('nacionalidad'),
 'seguro_medico'  => $this->input->post('seguro_medico'),
 'afiliado'  => $this->input->post('afiliado'),
 'plan'  => $plan,
  'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
  'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
 'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
   'responsable_legal' => $this->input->post('responsable_legal'),
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'updated_by' =>$this->input->post('updated_by'),
  'update_date' => $this->input->post('updated_time'),
  );

	  $this->model_admin->saveUpdatePatient($id_patient,$save);
	  
	  if($this->input->post('seguro_medico')==11){
 $this->db->query("DELETE FROM saveinput WHERE patient_id=$id_patient");	
} else{
for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
 $this->db->query("DELETE FROM saveinput WHERE patient_id=$id_patient");
	 $inf = $inputf[$i];
	  $inp = $inputname[$i];
   $saveInputs= array(
	'patient_id' =>$id_patient,
	'input_name' => $inp,
	'inputf' => $inf
	);
  $this->db->insert("saveinput",$saveInputs);
 }

}
	  
redirect($_SERVER['HTTP_REFERER']);

//------ADD NEW CAUSA IF NOT EXIST----------------------------------------------------------------


}
 }
 function listFolders()  
{
$data['from']=$this->input->post('from');	
$id_patient=$this->input->post('id_patient');
$data['id_patient']=$id_patient;
$table=$this->input->post('table_name');
$data['folder_name']=$this->input->post('folder_name');
$data['table_name']=$table;
$sql ="SELECT * FROM  $table WHERE id_p_a=$id_patient ORDER BY id DESC";
$query= $this->db->query($sql);
$data['query']=$query;
$this->load->view('patient/folders/data',$data);
	
}
 
function url_count_files()  
{
$id_patient=$this->input->post('id_patient');
$table=$this->input->post('table_name');

$sql ="SELECT * FROM  $table WHERE id_p_a=$id_patient";
$query= $this->db->query($sql);
echo "(".$query->num_rows().")";

	
}


public function downloadDoc($id){
        $this->load->helper('download');
        $fileName = $this->db->select('folder')->where('id',$id)->get('patients_folders')->row('folder'); 
        $file = './assets/img/patients-folder/'.$fileName;
        force_download($file, NULL);
	}

public function downloadDocEmp($id){
        $this->load->helper('download');
        $fileName = $this->db->select('folder')->where('id',$id)->get('employee_folders')->row('folder'); 
        $file = './assets/img/employee-folder/'.$fileName;
        force_download($file, NULL);
	}

public function downloadDocDescQ($id){
        $this->load->helper('download');
        $fileName = $this->db->select('folder')->where('id',$id)->get('hc_quirurgica_patient_images')->row('folder'); 
        $file = './assets_new/img/description-surgery/'.$fileName;
        force_download($file, NULL);
	}

function uploadDocumento()  
{ 
$countfiles = count($_FILES['files']['name']);
  
      for($i=0;$i<$countfiles;$i++){
  
        if(!empty($_FILES['files']['name'][$i])){
  
        // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
          // Set preference
          $config['upload_path'] = "./".$this->input->post('folder_name');
        $config['allowed_types'] = '*';
          $config['max_size'] = '4000'; // max_size in kb
          $config['file_name'] = $_FILES['files']['name'][$i];
  
          //Load upload library
          $this->load->library('upload',$config); 
          $arr = array('msg' => 'something went wrong', 'success' => false);
          // File upload
		  
          if($this->upload->do_upload('file')){
           
         $data = $this->upload->data(); 
           //$insert['name'] = $data['file_name'];
           //$this->db->insert('images',$insert);
           //$get = $this->db->insert_id();
		   
		   $imageExtention = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			$type=$_FILES[ 'file' ][ 'type' ];     
			$extensions=array( 'image/jpeg', 'image/png', 'image/gif' );
			if( in_array( $type, $extensions )){
			$imageType='img';
			}else{
			$imageType='doc';	
			}
			$save = array(
			'folder'  =>$data['file_name'],
			//'complete_folder_name' =>  $_FILES['file']['name'],
			'id_p_a' => $this->input->post('id_p_a'),
			'inserted_date' =>date("Y-m-d H:i:s"),
			'inserted_by' => $this->ID_USER,
			'file_type' => $imageType,
			'file_ext' => $imageExtention,
			'file_size' =>$_FILES['file']['size']

			);

$this->db->insert($this->input->post('table_name'),$save);
$get = $this->db->insert_id();		   
   $arr = array('msg' => 'Subido correctamente.', 'success' => true);
 
          }
        }
  
      }
      echo json_encode($arr);


}


 

 function show_patient_image()
{
$id = $this->input->post("id");
$folder_name = $this->input->post("folder_name");
$imag=$this->db->select('folder, file_type')->where('id',$id)->get($this->input->post("table"))->row_array();
$image = $imag['folder'];
$show_image= "./$folder_name/$image";
$show_image2= "./assets/update/$image";
if($imag['file_type']){
$img= '<img oncontextmenu="return false" style="width:100%" src="'.base_url().$show_image.'"  />';
}else{

	$img= '<img oncontextmenu="return false" style="width:100%" src="'.base_url().$show_image2.'"  />';
}
echo $img;
}


 function delPatDoc()
 {
	 
$folder=$this->db->select('folder, file_type')->where('id',$this->input->post('id'))->get($this->input->post('table_name'))->row_array();	
if($folder['file_type']){
unlink( "./".$this->input->post('folder_name').$folder['folder']);	 
}else{
unlink( "./assets/update/".$folder['folder']);
}	
$where = array(
'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete($this->input->post('table_name'));

$query_files=$this->db->select('id_p_a')->where('id_p_a',$this->input->post('id_patient'))->get($this->input->post('table_name'));
echo "(".$query_files->num_rows().")";

 }





	function updatePatientDataPersonal(){
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$idp=$this->input->post('id_patient');

if($this->input->post('nombre') ==""
 || $this->input->post('date_nacer') ==""
 || $this->input->post('tel_cel') ==""  
  || $this->input->post('sexo') =="" 
 
 || $this->input->post('provincia') ==""

 || $this->input->post('nacionalidad') ==""
 || $this->input->post('seguro_medico')==""){

$response['message'] = "Los campos con * son obligatorios!".
$response['status'] = 1;
}else{

$up_emp = array(
  'birth_date'  => date("Y-m-d", strtotime($this->input->post('date_nacer'))),
    'national_id'  => $this->input->post('cedula')
	);

$this->db->where('id_p_a', $idp);
$this->db->update("employees", $up_emp);	
		
	
if($_FILES["picture"]['tmp_name'] != '')
{
$extension = explode('.', $_FILES['picture']['name']);
$patient_image = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $patient_image;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
 }

else {
$old_image=$this->db->select('photo')->where('id_p_a',$idp)->get('patients_appointments')->row('photo');
$patient_image = $old_image;

	}	
	
	

$modify_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
$save = array(
  'nombre'  => $this->input->post('nombre'),
    'apodo'  => $this->input->post('apodo'),
 'photo'  => $patient_image,
  'cedula' => $this->input->post('cedula'),
 'date_nacer' => $this->input->post('date_nacer'),
  'date_nacer_format' => $this->input->post('date_nacer_format'),
   'edad' => $this->input->post('age'),
  'frecuencia'=> $this->input->post('frecuencia'),
 'tel_resi'  => $this->input->post('tel_resi'),
  'tel_cel'=> $this->input->post('tel_cel'),
  'email' => $this->input->post('email'),
  'sexo' => $this->input->post('sexo'),
   'estado_civil' => $this->input->post('estado_civil'),
  'nacionalidad'=> $this->input->post('nacionalidad'),
 'seguro_medico'  => $this->input->post('seguro_medico'),
  'afiliado'  => $this->input->post('afiliado'),
  'plan'  => $this->input->post('plan'),
  'provincia'=> $this->input->post('provincia'),
  'update_date' => $modify_date,
  'updated_by' => $this->input->post('updated_by'),

  );
$this->model_admin->saveUpdatePatient($idp,$save);



if($this->input->post('seguro_medico')==11){
 $this->db->query("DELETE FROM saveinput WHERE patient_id=$idp");	
} else{
for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
 $this->db->query("DELETE FROM saveinput WHERE patient_id=$idp");
	 $inf = $inputf[$i];
	  $inp = $inputname[$i];
   $saveInputs= array(
	'patient_id' =>$idp,
	'input_name' => $inp,
	'inputf' => $inf
	);
  $this->db->insert("saveinput",$saveInputs);
 }

}

$response['message'] = "Datos guardados con exitos!"; 
$response['status'] = 0;

}	
echo json_encode($response);
}

	

	function updatePatientDataOptional(){
	$idp=$this->input->post('id_patient');
$modify_date=date("Y-m-d H:i:s");
$save = array(
    'apodo'  => $this->input->post('apodo'),
 'tel_resi'  => $this->input->post('tel_resi'),
'email' => $this->input->post('email'),
'estado_civil' => $this->input->post('estado_civil'),
  'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
   'responsable_legal' => $this->input->post('responsable_legal'),
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'update_date' => $modify_date,
  'updated_by' => $this->input->post('updated_by'),

  );
$this->model_admin->saveUpdatePatient($idp,$save);


$response['message'] = "Datos guardados con exitos! $idp". $this->input->post('estado_civil'); 
$response['status'] = 0;

	
echo json_encode($response);
}

 
function loadPatientPhoto(){
$array_values_for_photo = array(
'id_p_a' =>$this->input->post('id_p_a'),
'cedula' =>$this->input->post('cedula'),
'image_class' => "img-fluid",
'style'=>"with:80%"

);
echo $this->search_patient_photo->search_patient($array_values_for_photo);



}	



 
}