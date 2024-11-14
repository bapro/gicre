<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Administrativo_functions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_admin');
		$this->ID_USER =$this->session->userdata('user_id');
    }

    public function createPasswordForAd()
    {
        $id_centro = $this->input->post('id_centro');
        $email = $this->input->post('email');
        $pass1 = $this->input->post('pass1');
        $pass2 = $this->input->post('pass2');
        $ad_names = $this->input->post('ad_names');
      // IF ID USER IS NUMERIC MEANS IT EXISTS, JUST CHANGE TO ADMIN
        if (is_numeric($ad_names)) {
            $where = array(
                'id_user' => $ad_names
            );
            $update = array(
                'perfil' => "Admin",
                'inserted_by' => $this->ID_USER,
                'updated_by' => date("Y-m-d H:i:s")
            );
            $this->db->where($where);
            $this->db->update("users", $update);
//----------ADD IT TO THE TABLE ADMINISTRATIVO
            $this->createUserAdministrativo($ad_names, $id_centro);

            $response['status'] = 1;
            $response['message'] = 'Usuario creado con exito, se le mando un correo para loguearse!';
            echo json_encode($response);
        } else {
			//--THE USER ADMINISTRATIVO IS NEW CREATE USER FROM ZERO
            $this->savePasswordForAd($email, $pass1, $pass2, $ad_names, $id_centro);
        }
    }



    public function savePasswordForAd($email, $pass1, $pass2, $ad_names, $id_centro)
    {

        if ($ad_names == '' || $email == '' || $pass1 == '' || $pass2 == '') {
            $response['status'] = 0;
            $response['message'] = 'Los tres campos son obligatorios!';
        } elseif ($pass1 != $pass2) {
            $response['status'] = 2;
            $response['message'] = 'la contraseña no coincide!';
        } else {
            $date = date("Y-m-d H:i:s");
              $seen_passord =$pass1; 
            $save = array(
                'name'  => $ad_names,
                'perfil' => "Admin",
                'username' => $email,
                'password' => md5($pass1),
                'correo' => $email,
                'inserted_by' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
                'insert_date' => $date,
                'update_date' => $date,
                'status' => 1
            );
            $id_user = $this->model_admin->CreateUser($save);

            $this->createUserAdministrativo($id_user, $id_centro);

            $response['status'] = 1;
            $response['message'] = 'Usuario creado con exito, se le mando un correo para loguearse!';

			$this->session->set_userdata('seen_passord', $seen_passord);
            
            $this->newUserNotification($id_user);


        }
        echo json_encode($response);
    }



    public function createUserAdministrativo($id_user, $id_centro)
    {
        $save_centro = array(
            'id_user' => $id_user,
            'id_centro' => $id_centro,
            'inserted_time' => date("Y-m-d H:i:s"),
            'is_active' => 0
        );

        $this->db->insert("user_centro_administrativo", $save_centro);
    }



    public function centroUsers()
    {
        $id_centro = $this->input->post('id_centro');
        $sql = "SElECT users.id_user AS id, name, id AS id_user_ad, perfil, is_active FROM user_centro_administrativo INNER JOIN users 
ON user_centro_administrativo.id_user = users.id_user WHERE id_centro = $id_centro  ORDER BY user_centro_administrativo.id DESC";
        $data['query'] = $this->db->query($sql);
        $this->load->view('administrativo/list', $data);
    }


    public function revokeThisUser(){
        $is_active=$this->db->select('is_active')->where('id',$this->input->post('id'))->get('user_centro_administrativo')->row('is_active');
        if($is_active==0){
            $val = 1;
        }else{
            $val = 0;
        }
        
        
        $data = array(
            'is_active'=> $val
          );
        $where = array(
          'id'=> $this->input->post('id')
        );
        
        $this->db->where($where);
        $this->db->update('user_centro_administrativo', $data);
        
        
        }
		
		
		
		
		public function newUserNotification($id_user){

 $user=$this->db->select('name,correo')->where('id_user',$id_user)->get('users')->row_array();
$user_name= $user['name'];
$correo= $user['correo'];
$seen_passord_=$this->session->userdata['seen_passord'];
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;color:red'>
Usted tiene un perfil administrativo en el sistema de GICRE <br/>
Sus credenciales son: <br/>
<strong>Username : $correo</strong><br/>
<strong>Password: $seen_passord_</strong>
<br>

</body>
</html>";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to("$correo");// change it to yours
$this->email->subject("$user_name tiene un perfil en GICRE");
$this->email->message($msg);
$this->email->send();
}
}
