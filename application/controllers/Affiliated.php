<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Affiliated extends CI_Controller {
public function __construct()
{
parent::__construct();
 $this->load->library('email');
 $this->load->helper('email');
}



function saveAffiliated(){
$codigo=$this->input->post('codigo');
$correo=$this->input->post('correo');
$nombres=$this->input->post('nombres');
//$especialidad=$this->input->post('especialidad');
$phone=$this->input->post('phone');
$query1 = $this->db->get_where('users',array('correo'=>$correo));
$query2 = $this->db->get_where('users',array('cell_phone'=>$phone));
if($correo=='' || $nombres==''  || $phone==''){
 $response['status'] =0;
$response['message'] = '* Todos los campos son obligatorios!'; 
}
elseif (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $correo)){
 $response['status'] =  1;
$response['message'] = 'correo incorrecto!';
}
elseif($query1->num_rows() > 0 )
{
$response['status'] =  2;
$response['message'] = 'Ya existe Ese correo!';	

} 
elseif($query2->num_rows() > 0 )
{
$response['status'] =  21;
$response['message'] = 'Ya existe número de teléfono!';	
}
else{
$save= array(
'name'=>$this->input->post('nombres'),
'username'=>$correo,
//'area'=>$this->input->post('especialidad'),
'password'=>md5($codigo),
'perfil'=>'Medico',
'inserted_by'=>$this->input->post('id_user'),
'updated_by'=> $this->input->post('id_user'),
'insert_date'=>date("Y-m-d H:i:s"),
'update_date'=>date("Y-m-d H:i:s"),
'correo'=>$correo,
'cell_phone'=>$phone,
'status'=>1,
'payment_plan'=>3,
'plazo'=>date("Y-m-d"),
'cuenta_gratis'=>1,
'affiliated'=>1
);
$this->db->insert("users",$save);

if($this->db->affected_rows() > 0){
$response['status'] =  3;	
$response['message'] = "Codigo enviado al correo electrónico($correo) del doctor para crear su usuario!";
$this->send_email_to_doctor($correo,$codigo,$this->input->post('nombres'));
}else{
   $response['status'] =  4;
 $response['message'] = 'lo siento, no se ha guadado!'; 
}		
}

echo json_encode($response);
}



public function send_email_to_doctor($correo,$codigo,$nombres){
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
$link='href="https://www.admedicall.com/"';	

$msg ="
<html>
BIENVENIDO A GICRE <br/>
Querido doctor $nombres, les eviamos los datos de su cuenta para entrar a GICRE: <a $link>Loguearse</a>.<br/><br/>
<hr/>
Usuario: $correo <br/>
Contraseña: $codigo 
<hr/>
Su cuenta se renueva anualmente.
Atentamente,<br/>
GICRE
</body>
</html>";

$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($correo);// change it to yours
$this->email->subject('CODIGO DE AFILIACION');
$this->email->message($msg);
$this->email->send();

}



public function listadoDeCodigosGenerados(){
$id_user=$this->input->post('id_user');
$sql ="SELECT id_user, name, correo, inserted_by, insert_date FROM  users WHERE  affiliated=1 ORDER BY id_user DESC";
$query= $this->db->query($sql);

 echo "<div style='overflow-x:auto;'>
 <table  class='table table-striped' id='myTable'>
 <thead>
<tr>
<th style='display:none'>CODIGO</th>
<th>NOMBRES</th><th>CORREO DEL DOCTOR</th><th>CREADO POR</th><th>FECHA DE CREACION</th>
</tr> </thead> <tbody> ";

foreach ($query->result() as $row){
$created_by= $this->db->select('name')->where('inserted_by',$id_user)->get('users')->row('name');
  $created_time = date('d-m-Y H:i:s', strtotime($row->insert_date));
 echo "
<tr>
<td style='display:none'>$row->id_user</td><td>$row->name</td><td>$row->correo</td><td>$created_by</td><td>$created_time</td>
</tr>
";
}
 echo "
</tbody>
 </table>
  </div>
";
echo '<script>
	$("#myTable").DataTable( {
"language": {
"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
},
"aaSorting": [ [0,"desc"] ],

} );
</script>

';
}




}