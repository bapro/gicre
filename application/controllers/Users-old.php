<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
		$this->load->model('model_admin');
		$this->load->model('navigation/account_demand_model');
		$this->ID_USER =$this->session->userdata('user_id');
    }
    
    /*
     * User account information
     */
    public function account(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->user->getRows(array('id_acd'=>$this->session->userdata('userId')));
            //load the view
            //$this->load->view('users/admin_page', $data);
			$this->load->view('admin/index', $data);
        }else{
            redirect('welcome');
        }
    }
    
    /*
     * User login
     */
    public function login(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true)
				{
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id_acd']);
                   redirect('users/account/');
				  
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
        //load the view
       // $this->load->view('users/login', $data);
		$this->load->view('users/login_form', $data);
    }
    
    
    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('welcome');
    }
    
    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
	
	
function newPassword(){
$pass1=$this->input->post('pass1');
$pass2=$this->input->post('pass2');
$id_user=$this->input->post('id_user');

if($pass1=='' || $pass2==''){
 $response['status'] =0;
$response['message'] = 'los dos campos son obligatorios!'; 
} elseif($pass1 != $pass2){
 $response['status'] =2;
$response['message'] = 'las contraseñas no coinciden!'; 	
}
else{
	$data = array(
  'password' => md5($pass1),
  'updated_by' => $id_user,
  'update_date' => date("Y-m-d H:i:s")
  );

$where= array(
  'id_user' =>$id_user
);

$this->db->where($where);
$this->db->update("users",$data);

$response['status'] =1;
$response['message'] =$this->db->affected_rows(); 	

}
echo json_encode($response);
}


 function check_codigo()
{
 $codigo_securidad = md5($this->input->post('codigo_securidad'));
$row=$this->db->select('id_user')->where('codigo_seguriad',$codigo_securidad)->get('users')->row('id_user');
//$found=$row->num_rows();
echo json_encode($row);

}




public function updateUserAccount(){
$id_user  = $this->input->post('id_user');

$data3 = array(
'name' =>$this->input->post('userName'),
'correo' =>$this->input->post('userEmail'),
 'cedula' =>$this->input->post('userCedula'),
'cell_phone' => $this->input->post('userPhone'),
'update_date' => date("Y-m-d H:i:s"),
'updated_by' => $this->ID_USER
  );

$this->model_admin->DeactivarUser($id_user,$data3);
//-------------------------------------------------------


//-----------------------SAVE SELLO--------------------------------

  $config['upload_path']="./assets/update";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("selloimage")){
            $data = $this->upload->data();
 
            //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/update/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 250;
            $config['height']= 250;
            $config['new_image']= './assets/update/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$save = array(
			'sello'=>$data['file_name'],
			'doc'=>$id_user
			);
			$this->db->insert("doctor_sello",$save);

		}
//-----------------------SAVE LOGO TIPO-----------------------------------------------------------

 if($this->upload->do_upload("logo-tipo")){
            $data = $this->upload->data();
 
            //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/update/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 250;
            $config['height']= 250;
            $config['new_image']= './assets/update/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$save = array(
			'sello'=>$data['file_name'],
			'doc'=>$id_user,
			'dist'=>1
			);
			$this->db->insert("doctor_sello",$save);

		}

$msg = "<h4 id='deletesuccess'  style='text-align:center;color:green'>Usuario se edita con exito.</h4>";
$this->session->set_flashdata('success_msg', $msg);

redirect($_SERVER['HTTP_REFERER']);

}	
	
	
	Public function removeSello(){
$answerid=$this->input->post('answerid');
$id=$this->input->post('id');
if($answerid !=2){
$sello=$this->db->select('sello')->where('doc',$id)->where('dist',$answerid)->get('doctor_sello')->row('sello');	
unlink("assets/update/".$sello);	
		
$where = array(
'doc'=>$this->input->post('id'),
'dist'=>$answerid
);

$this->db->where($where);
$this->db->delete('doctor_sello');
}else{
$upload_dir = './assets/update/';
$file2 = $upload_dir ."278-1.png";
unlink($file2);	
}
}






public function saveNewPassword(){
$pass1=$this->input->post('pass1');
$pass2=$this->input->post('pass2');
$id_user=$this->ID_USER;
$id_table=$this->input->post('id_table');

if($pass1=='' || $pass2==''){
 $response['status'] =0;
$response['message'] = 'los dos campos son obligatorios!'; 
} elseif($pass1 != $pass2){
 $response['status'] =2;
$response['message'] = 'la contraseña no coincide!'; 	
}
else{		
$data = array(
  'password' => md5($pass1),
  'updated_by' => $id_user,
  'update_date' => date("Y-m-d H:i:s")
  );
$this->model_admin->DeactivarUser($id_table,$data);
 $response['status'] =1;
$response['message'] = 'Cambiada con éxito!<br/>Logueate ne nuevo.'; 
$where = array(
'user_id' =>$id_user
);

$this->db->where($where);
$this->db->delete('current_user_info');


$this->db->like('data', $id_user);
$this->db->delete('ci_sessions');
}
echo json_encode($response);
}











	
}