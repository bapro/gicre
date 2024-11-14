<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct()
{
parent::__construct();

$this->load->model('login_model'); 
$this->load->library('session');
$this->session->set_userdata('redirect_to_previous_page',0);


}
/*
*Showing  Login page here 
*/
function index()
{
$array_items = array(
'user_name', 
'admin_password',
'admin_perfil',
'admin_id',
'is_logged_in',
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();	
	
	
$dat=$this->db->select('dateo')->where('dateo',date("Y-m-d"))->get('user_login_twice')->row('dateo');
if($dat==""){
$this->db->empty_table('ci_sessions'); 
$this->db->empty_table('user_login_twice');
$this->db->empty_table('current_user_info');
$updateData = array(
'is_log_in'  =>0,
'login_time' =>'');
$this->db->update("users",$updateData); 			
}
$this->load->view('index');  
// $this->load->view('index'); 
}


/**
* check the username and the password with the database
* @return void
*/

function validate()
{  
$this->load->library('user_agent');

$username = $this->input->post('username');
$password = md5($this->input->post('password'));

$id_us=$this->db->select('id_user')->where('password',$password)->where('username',$username)->get('users')->row('id_user');
$this->session->set_userdata('id_us',$id_us);


$is_valid = $this->login_model->validate($username, $password);


if($is_valid)/*If valid username and password set */
{
$get_id = $this->login_model->get_id($username, $password);                

foreach($get_id as $val)
{
//$getloc = json_decode(file_get_contents("http://ipinfo.io/"));
$save = array(
'ip'  =>$this->input->ip_address(),
//'location'  =>$getloc,
'OpeSys'  =>$this->agent->platform(),
'Browser'  =>$this->agent->browser(),
'user_id'  =>$val->id_user,
'browser_v'  =>$this->agent->version(),
'date_time'  =>date("Y-m-d H:i:s")
);
$this->db->insert("current_user_info",$save);


$id=$val->id_user;
$name = $val->name; 
$last_name = $val->last_name;
$perfil=$val->perfil;
$hide_patient_history=$val->hide_patient_history;
if($perfil=='Admin')
{
$admin_position_centro=$this->db->select('id_centro')->where('id_user',$id)->get('user_centro_administrativo')->row('id_centro');

$data = array(
'user_id'=>$id,
'user_name' =>$name,
'user_perfil'=>$perfil,
'admin_position_centro'=>$admin_position_centro,
'is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the Admin datas in session */


$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
); 


$this->login_model->is_user_login($id,$dataLogIn);


$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 



$this->login_model->user_login_twice($save);

$last_page_visited=$this->db->select('last_page_visited')->where('id_user',$id)->get('users')->row('last_page_visited');

//if($last_page_visited==0){
redirect('admin/appointments');
//}else{
//redirect($last_page_visited);	
//}

}


if($perfil=='Medico'  || $perfil=='Asistente Medico')
{

$data = array(
'user_id'=>$id,
'user_name' =>$name,
'user_perfil'=>$perfil,
'hide_patient_history'=>$hide_patient_history,
'admin_position_centro'=>"",
'is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */


$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 
$this->login_model->user_login_twice($save);

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$last_page_visited=$this->db->select('last_page_visited')->where('id_user',$id)->get('users')->row('last_page_visited');


//if(strpos($last_page_visited, "http") !== false){
//redirect($last_page_visited);

//}else{
redirect('medico/appointments');
//}
}


if($perfil=='Enfermera' || $perfil=='Auditoria Medico')
{

$data = array(
'user_id'=>$id,
'user_name' =>$name,
'user_perfil'=>$perfil,
'admin_position_centro'=>"",
'is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */


$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 
$this->login_model->user_login_twice($save);

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$id=encrypt_url(0);
redirect("hospitalization/patients_record/$id");

}



if($perfil=='Farmacia Interna')
{

$data = array(
'user_id'=>$id,
'user_name' =>$name,
'user_perfil'=>$perfil,
'admin_position_centro'=>"",
'is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */


$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 
$this->login_model->user_login_twice($save);

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$id=encrypt_url(0);
redirect("internal_pharmacy/index");

}












if($perfil=='Farmacia Interna')
{

$data = array(
'farm_int_id'=>$id,
'farm_int_name' =>$name,
'farm_int_perfil'=>$perfil,
'farm_int_is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the Admin datas in session */


$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
); 


$this->login_model->is_user_login($id,$dataLogIn);


$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 



$this->login_model->user_login_twice($save);

redirect('internal_drugstore_user');
}




if($perfil=='Farmacia')
{

$data = array(
'farmacia_id'=>$id,
'farmacia_name' =>$name,
'farmacia_perfil'=>$perfil,
'farmacia_is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 
$this->login_model->user_login_twice($save);
redirect('farmacia');
} 


if($perfil=='Técnico de lentes')
{

$data = array(
'tec_lent_id'=>$id,
'tec_lent_name' =>$name,
'tec_lent_perfil'=>$perfil,
'tec_lent_is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 
$this->login_model->user_login_twice($save);
redirect('tecLente');
} 



if($perfil=='Auditoria Medica')
{

$data = array(
'auditoria_id'=>$id,
'auditoria_name' =>$name,
'auditoria_perfil'=>$perfil,
'auditoria_is_logged_in' => true
);

$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 


$this->login_model->user_login_twice($save);
redirect('auditoria_medica');
}


if($perfil=='Vendedor')
{

$data = array(
'vendedor_id'=>$id,
'vendedor_name' =>$name,
'vendedor_perfil'=>$perfil,
'vendedor_is_logged_in' => true
);

$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 


$this->login_model->user_login_twice($save);
redirect('vendedor');
}


if($perfil=='Estudios')
{

$data = array(
'estudios_id'=>$id,
'estudios_name' =>$name,
'estudios_perfil'=>$perfil,
'estudios_is_logged_in' => true
);

$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 


$this->login_model->user_login_twice($save);
redirect('estudios');
}


if($perfil=='Laboratorios')
{

$data = array(
'laboratorios_id'=>$id,
'laboratorios_name' =>$name,
'laboratorios_perfil'=>$perfil,
'laboratorios_is_logged_in' => true
);

$this->session->set_userdata($data); /*Here  setting the  staff datas values in session */

$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
);

$this->login_model->is_user_login($id,$dataLogIn);
$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 


$this->login_model->user_login_twice($save);
redirect('laboratorios');
}

if($perfil=='Paciente')
{
redirect('patient/login');
}



}       


}
else // incorrect username or password
{

$mes=' <span style="color:red">¡ Usuario o contraseña incorrectos !</span>';
$this->session->set_flashdata('msg_pass_ac', $mes);
redirect('login');
}

}

//---------------------------------------------------------------------------------------------------------

function validate_patient()
{  
$this->load->library('user_agent');

$username = $this->input->post('username');
$password = md5($this->input->post('password'));

$id_us=$this->db->select('id_user')->where('password',$password)->where('username',$username)->get('users')->row('id_user');
$this->session->set_userdata('id_us',$id_us);


$is_valid = $this->login_model->validate($username, $password);


if($is_valid)/*If valid username and password set */
{
$get_id = $this->login_model->get_id($username, $password);                

foreach($get_id as $val)
{
//$getloc = json_decode(file_get_contents("http://ipinfo.io/"));
$save = array(
'ip'  =>$this->input->ip_address(),
//'location'  =>$getloc,
'OpeSys'  =>$this->agent->platform(),
'Browser'  =>$this->agent->browser(),
'user_id'  =>$val->id_user,
'browser_v'  =>$this->agent->version(),
'date_time'  =>date("Y-m-d H:i:s")
);
$this->db->insert("current_user_info",$save);


$id=$val->id_user;
$name = $val->name; 
$last_name = $val->last_name;
$perfil=$val->perfil;


if($perfil=='Paciente')
{

$data = array(
'patient_id'=>$id,
'patient_name' =>$name,
'patient_perfil'=>$perfil,
'is_logged_in' => true
);
$this->session->set_userdata($data); /*Here  setting the Admin datas in session */


$dataLogIn = array(
'is_log_in'=>1,
'login_time'=>date("Y-m-d H:i:s"),
'last_login_time'=>date("Y-m-d H:i:s")
); 


$this->login_model->is_user_login($id,$dataLogIn);


$save = array(
'user_id'=>$id,'login_time'=>date("Y-m-d H:i:s"),'dateo'=>date("Y-m-d")
); 



$this->login_model->user_login_twice($save);

redirect('patient');
}
else{
redirect('patient/login');	
}
}

}

else // incorrect username or password
{

$mes=' <span style="text-danger text-center">Usuario o contraseña incorrectos !</span>';
$this->session->set_flashdata('msg_pass_ac', $mes);
redirect('patient/login');
}
}





public function admin_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');


$array_items = array(
'user_name', 
'admin_password',
'admin_perfil',
'admin_id',
'is_logged_in',
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();

//$this->db->like('data', $this->session->userdata['id_us']);
// $this->db->delete('ci_sessions');
redirect('login');


}




public function medico_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'user_name',
'medico_password' ,
'medico_perfil',
'medico_id',
'medico_is_logged_in'
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}



public function auditoria_medica_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   
'auditoria_name',
'auditoria_password' ,
'auditoria_perfil',
'auditoria_id',
'auditoria_is_logged_in'
);
$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}





public function vendedor_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'vendedor_name',
'vendedor_password' ,
'vendedor_perfil',
'vendedor_id',
'vendedor_is_logged_in'
);



$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}




public function farmacia_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'farmacia_name',
'farmacia_password' ,
'farmacia_perfil',
'farmacia_id',
'farmacia_is_logged_in'
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}


public function estudios_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'estudios_name',
'estudios_password' ,
'estudios_perfil',
'estudios_id',
'estudios_is_logged_in'
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}

public function tec_lentes_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'tec_lent_name',
'tec_lent_password' ,
'ltec_lent_perfil',
'tec_lent_id',
'tec_lent_is_logged_in'
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}
 

public function optometrist_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'tec_lent_name',
'tec_lent_password' ,
'ltec_lent_perfil',
'tec_lent_id',
'tec_lent_is_logged_in'
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}


public function patient_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('patient/login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'patient_name',
'patient_password' ,
'patient_perfil',
'patient_id',
'is_logged_in'
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('patient/login');

}




public function farma_int_logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   

'farm_int_name',
'farm_int_perfil',
'farm_int_id',
'farm_int_is_logged_in'
);

$this->session->unset_userdata($array_items);
//$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}



public function logout()
{
	 if($this->session->userdata('id_us')=='')
    {
     redirect('login');
	}
$dataLogOut = array(
'is_log_in'=>0,
'login_time'=>"",
'last_login_time'=>date("Y-m-d H:i:s")
);
$this->login_model->user_logout($this->session->userdata['id_us'],$dataLogOut);
$this->login_model->user_login_twice_remove($this->session->userdata['id_us']); 

$where = array(
'user_id' =>$this->session->userdata['id_us']
);

$this->db->where($where);
$this->db->delete('current_user_info');

$array_items = array(   
'user_id',
'user_name',
'user_perfil',
'is_logged_in'
);

$this->session->unset_userdata($array_items);
$this->session->sess_destroy();
$this->session->set_flashdata('msg', 'Medico Signed Out Now!');
redirect('login');

}


}    
