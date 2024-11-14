<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TecLente extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model('navigation/account_demand_model');
$this->load->model('user');
$this->load->model('model_admin');
$this->padron_database = $this->load->database('padron',TRUE);
$this->load->model("padron_model");
$this->perPage = 3;
    $this->load->library("pagination");

  /*session checks */ 

    if($this->session->userdata('tec_lent_is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
}


 public function index()
{
	
$where = array(
'new' =>0
);
$update = array(
'new'  =>1
);
$this->db->where($where);
$this->db->update("laboratory_lentes",$update);	
		
$this->load->view('optica/tecnico-de-lentes/header');	
$id_usr=$this->session->userdata['tec_lent_id'];
$data['user_id']=$id_usr; 

$id_tecnico_lentes=$this->db->select('id_tecnico_lentes')->where('id_user',$id_usr)->get('user_tecnico_lentes')->row('id_tecnico_lentes');

$sql ="SELECT * FROM laboratory_lentes WHERE id_lab_lente=$id_tecnico_lentes && enviado=0  ORDER BY id DESC";

$query= $this->db->query($sql);
$data['query']=$query;

$this->load->view('optica/tecnico-de-lentes/index',$data);

}



public function newEntry()
{
$message= $this->db->select('id')->where('enviado',0)->where('new',0)->get('laboratory_lentes');
$data['result']=$message->num_rows();
$this->load->view('optica/tecnico-de-lentes/newEntry', $data);
}








 public function account()
{
$this->load->view('optica/tecnico-de-lentes/header');	
$id_usr=$this->session->userdata['tec_lent_id'];
$data['id_doc']=$id_usr; 
$data['id_cu_us']=$id_usr; 
$sql ="SELECT * FROM users WHERE  id_user=$id_usr";

$query= $this->db->query($sql);
$data['query']=$query->result();

$this->load->view('optica/tecnico-de-lentes/account',$data);

}






 public function search_patient()
{
	$this->session->set_userdata('id',$this->input->post('id'));
	$this->session->set_userdata('display',$this->input->post('display'));
	$this->session->set_userdata('display2',$this->input->post('display2'));

redirect("tecLente/lentes_entregados_/");
}


 public function lentes_entregados_()
{
$this->load->view('optica/tecnico-de-lentes/header');
	$id=$this->session->userdata['id'];
	$display=$this->session->userdata['display'];
	$display2=$this->session->userdata['display2'];
$sql ="SELECT *,laboratory_lentes.id AS idlente FROM h_c_of_refracion JOIN laboratory_lentes ON h_c_of_refracion.id= laboratory_lentes.id_refraccion WHERE  laboratory_lentes.id=$id  ";
$query= $this->db->query($sql);
$data['query']=$query;
$data['display']=$display;
$data['display2']=$display2;
if($display2=='none'){
$enviado=1;	
$title="LENTES PROPUESTOS A REALIZAR";
}else{
$enviado=2;	
$title="LENTES ENTREGADOS";
}
$data['enviado']=$enviado;
$data['title']=$title;
$data['links']='';
$this->load->view('optica/tecnico-de-lentes/lentes_propuestos', $data);

}


public function ver_refraccion(){
$id=$this->uri->segment(3);
$data['id_user']=$this->uri->segment(4);
$data['id']=$id;
$sql ="SELECT * FROM  h_c_of_refracion WHERE id=$id";
$query= $this->db->query($sql);
$data['query']=$query;
$this->load->view('optica/tecnico-de-lentes/ver-refraccion', $data);

}




public function save_refraccion_entrega(){
if($this->input->post('nuevo-refraccion')==1){
$fecha_de_entrega = date("Y-m-d H:i:s", strtotime($this->input->post('fecha-entrega')));
$where = array(
  'id_refraccion' =>$this->input->post('id-refraccion')
);
$data = array(
'enviado'  =>1,
'fecha_de_entrega'=>$fecha_de_entrega,
'entregado_hecho_por'=>$this->input->post('id-user')
);

$this->db->where($where);
$this->db->update("laboratory_lentes",$data);

redirect("tecLente/lentes_propuestos");

}
}


public function save_lentes_entregados(){
if($this->input->post('entregado')==1){
$where = array(
  'id' =>$this->input->post('idlente')
);
$data = array(
'enviado'  =>2,
'entregado_time'=>date("Y-m-d H:i:s"),
'entregado_por'=>$this->session->userdata['tec_lent_id']
);

$this->db->where($where);
$this->db->update("laboratory_lentes",$data);

$this->repuestaSolicitudLentes($this->input->post('idlente'));


redirect("tecLente/lentes_entregados");

}
}




public function repuestaSolicitudLentes($id_ref){
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


$info=$this->db->select('id_doc,id_centro,patient,fecha_de_entrega')->where('id',$id_ref)->get('laboratory_lentes')->row_array();


$doc=$this->db->select('name,area,correo')->where('id_user',$info['id_doc'])->get('users')->row_array();
$doctor=$doc['name'];
$doctor_email=$doc['correo'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$patient=$this->db->select('nombre')->where('id_p_a',$info['patient'])->get('patients_appointments')->row('nombre');
$centro=$this->db->select('name')->where('id_m_c',$info['id_centro'])->get('medical_centers')->row('name');
$entrega=date("d-m-Y H:i:s", strtotime($info['fecha_de_entrega']));
$link='href="'.base_url().'printing/ver_email_refra/'.$id_ref.'"';
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;'>
<h1>¡Gracias por elegirnos!</h1>
Doctor <strong>$doctor ($area)</strong>
Del <strong>$centro</strong>, los lentes del paciente <strong>paciente $patient</strong>, <br/>
estarán listo <strong style='color:red'>$entrega</strong><br/>
<a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;' $link >VER REFRACCION</a>

</body>
</html>";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to("$doctor_email");// change it to yours
$this->email->subject("Respuesta a solicitud de lentes (Laboratorio de lentes)");
$this->email->message($msg);
$this->email->send();


}





public function lentes_entregados(){
$data['perfil']=$this->session->userdata['tec_lent_perfil'];
$data['name']=$this->session->userdata['tec_lent_name'];
$user_id=$this->session->userdata['tec_lent_id'];
$data['user_id']=$user_id;
$this->load->view('optica/tecnico-de-lentes/header');

$id_tecnico_lentes=$this->db->select('id_tecnico_lentes')->where('id_user',$user_id)->get('user_tecnico_lentes')->row('id_tecnico_lentes');
$data["id_tecnico_lentes"] =$id_tecnico_lentes;
$sql_con ="SELECT enviado FROM  laboratory_lentes WHERE id_lab_lente=$id_tecnico_lentes && enviado=2";
$atendido_con = $this->db->query($sql_con);

 $config["base_url"] = base_url() . "tecLente/lentes_entregados";

$config["total_rows"] =$atendido_con->num_rows();

$config['full_tag_open']    = "<ul class='pagination'>";
       $config['full_tag_close']   = "</ul>";
       $config['num_tag_open']     = '<li>';
       $config['num_tag_close']    = '</li>';
       $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
       $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
       $config['next_tag_open']    = "<li>";
       $config['next_tagl_close']  = "</li>";
       $config['prev_tag_open']    = "<li>";
       $config['prev_tagl_close']  = "</li>";
       $config['first_tag_open']   = "<li>";
       $config['first_tagl_close'] = "</li>";
       $config['last_tag_open']    = "<li>";
       $config['last_tagl_close']  = "</li>";
       $config['first_link'] = 'Primero';
       $config['last_link'] = 'Último';
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
         $per_page= $config["per_page"];
        $this->pagination->initialize($config);

		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();


$sql ="SELECT *,laboratory_lentes.id AS idlente FROM h_c_of_refracion JOIN laboratory_lentes ON h_c_of_refracion.id= laboratory_lentes.id_refraccion WHERE id_lab_lente=$id_tecnico_lentes && enviado=2 LIMIT $per_page OFFSET  $page";

$query= $this->db->query($sql);
$data['query']=$query;
$data['display']='none';
$data['display2']='';
$data['title']="LENTES ENTREGADOS";
$data['enviado']=2;
$this->load->view('optica/tecnico-de-lentes/lentes_propuestos', $data);

}



public function lentes_propuestos(){
$data['perfil']=$this->session->userdata['tec_lent_perfil'];
$data['name']=$this->session->userdata['tec_lent_name'];
$user_id=$this->session->userdata['tec_lent_id'];
$data['user_id']=$user_id;
$this->load->view('optica/tecnico-de-lentes/header');

$id_tecnico_lentes=$this->db->select('id_tecnico_lentes')->where('id_user',$user_id)->get('user_tecnico_lentes')->row('id_tecnico_lentes');
$data["id_tecnico_lentes"] =$id_tecnico_lentes;

$sql_con ="SELECT enviado FROM  laboratory_lentes WHERE id_lab_lente=$id_tecnico_lentes &&  enviado=1";
$atendido_con = $this->db->query($sql_con);

 $config["base_url"] = base_url() . "tecLente/lentes_entregados";

$config["total_rows"] =$atendido_con->num_rows();

$config['full_tag_open']    = "<ul class='pagination'>";
       $config['full_tag_close']   = "</ul>";
       $config['num_tag_open']     = '<li>';
       $config['num_tag_close']    = '</li>';
       $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
       $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
       $config['next_tag_open']    = "<li>";
       $config['next_tagl_close']  = "</li>";
       $config['prev_tag_open']    = "<li>";
       $config['prev_tagl_close']  = "</li>";
       $config['first_tag_open']   = "<li>";
       $config['first_tagl_close'] = "</li>";
       $config['last_tag_open']    = "<li>";
       $config['last_tagl_close']  = "</li>";
       $config['first_link'] = 'Primero';
       $config['last_link'] = 'Último';
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
         $per_page= $config["per_page"];
        $this->pagination->initialize($config);

		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();


$sql ="SELECT *,laboratory_lentes.id AS idlente FROM h_c_of_refracion JOIN laboratory_lentes ON h_c_of_refracion.id= laboratory_lentes.id_refraccion WHERE id_lab_lente=$id_tecnico_lentes && enviado=1 LIMIT $per_page OFFSET  $page";

$data['title']="LENTES PROPUESTOS A REALIZAR";
$query= $this->db->query($sql);
$data['query']=$query;
$data['display']='';
$data['display2']='none';
$data['enviado']=1;
$this->load->view('optica/tecnico-de-lentes/lentes_propuestos', $data);

}



	
}