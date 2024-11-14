<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SesionFotos extends CI_Controller {
public function __construct()
{
parent::__construct();


}

function listSesionPhotos()
 {
$pos_num=$this->input->post('pos_num');

$data['pos_num']=$pos_num;
$data['aside']=$this->input->post('aside');
$photo=$this->db->select('name,id')->where('patient',$this->input->post('patient'))
->where('id_doc',$this->input->post('user_id'))
->where('pos_num',$pos_num)
->where('position',$this->input->post('position'))
->get('h_c_cirugia_plas_sesion_foto')->row_array();
if($photo){
$data['photo']=$photo;
$this->load->view('admin/historial-medical1/cirugia-plastica/sesion-foto/list-photo',$data);
}
 }
 

 
 
 function delSesionFoto1()
 {
	 
$photo=$this->db->select('name')->where('id',$this->input->post('id'))->get('h_c_cirugia_plas_sesion_foto')->row('name');	
unlink("assets/img/sesion-fotos/".$photo);	 
	 
$where = array(
'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('h_c_cirugia_plas_sesion_foto');
 }

 

	


function uploadPhotoSesionLeft()
 {

$config['upload_path']="./assets/img/sesion-fotos";
$config['allowed_types']='gif|jpg|png';
$config['encrypt_name'] = TRUE;
$aside=$this->input->post('aside');	
$this->load->library('upload',$config);
if(!$this->upload->do_upload("image_file"))  
{  
$error =  $this->upload->display_errors(); 
$response['status'] =  1;
$response['message'] = $error; 
	
}  
else{

$patient=$this->input->post('patient');
$user_id=$this->input->post('user_id');
$pos_num=$this->input->post('pos_num');
$position=$this->input->post('position');

$data = $this->upload->data();

//Resize and Compress Image
$config['image_library']='gd2';
$config['source_image']='./assets/img/sesion-fotos/'.$data['file_name'];
$config['create_thumb']= FALSE;
$config['maintain_ratio']= FALSE;
$config['quality']= '60%';
$config['width']= 400;
$config['height']= 400;
$config['new_image']= './assets/img/sesion-fotos/'.$data['file_name'];
$this->load->library('image_lib', $config);
$this->image_lib->resize();
$save = array(
'patient'=>$patient,
'id_doc'=>$user_id,
'name'=>$data['file_name'],
'date'=>date("Y-m-d H:i:s"),
'pos_num'=>$pos_num,
'position'=>$position
);
$this->db->insert("h_c_cirugia_plas_sesion_foto",$save);
if($this->db->affected_rows() > 0){
$response['status'] =  2;
$response['message'] = 'ok'; 
}else{
	$response['status'] =  3;
$response['message'] = 'error';
}
echo json_encode($response);      

}	 

}

function uploadPhotoSesionRight()
 {

$config['upload_path']="./assets/img/sesion-fotos";
$config['allowed_types']='gif|jpg|png';
$config['encrypt_name'] = TRUE;
$aside=$this->input->post('aside');	
$this->load->library('upload',$config);
if(!$this->upload->do_upload("_image_file"))  
{  
$error =  $this->upload->display_errors(); 
$response['status'] =  1;
$response['message'] = $error; 
	
}  
else{

$patient=$this->input->post('_patient');
$user_id=$this->input->post('_user_id');
$pos_num=$this->input->post('_pos_num');
$position=$this->input->post('_position');

$data = $this->upload->data();

//Resize and Compress Image
$config['image_library']='gd2';
$config['source_image']='./assets/img/sesion-fotos/'.$data['file_name'];
$config['create_thumb']= FALSE;
$config['maintain_ratio']= FALSE;
$config['quality']= '60%';
$config['width']= 400;
$config['height']= 400;
$config['new_image']= './assets/img/sesion-fotos/'.$data['file_name'];
$this->load->library('image_lib', $config);
$this->image_lib->resize();
$save = array(
'patient'=>$patient,
'id_doc'=>$user_id,
'name'=>$data['file_name'],
'date'=>date("Y-m-d H:i:s"),
'pos_num'=>$pos_num,
'position'=>$position
);
$this->db->insert("h_c_cirugia_plas_sesion_foto",$save);
if($this->db->affected_rows() > 0){
$response['status'] =  2;
$response['message'] = 'ok'; 
}else{
	$response['status'] =  3;
$response['message'] = 'error';
}
echo json_encode($response);      

}	 

}


 
 }