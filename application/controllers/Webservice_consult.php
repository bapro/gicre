<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Webservice_consult extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('model_medico');

}

function checkIfPatientNssIsActive(){
$doctor_ced=$this->input->post('docCedula');
$doc_webs_pass=$this->input->post('docPassword');
$proveedo=$this->input->post('proveedo');
$patientNss=$this->input->post('patientNss');


$wsdl   = "http://arssenasa2.gob.do/webservices/webservicesautorizaciones/WSAutorizacionConsulta.asmx?WSDL";
$client = new SoapClient($wsdl, array('trace' => 1));  // The trace param will show you errors stack

$auth = array(
'Cedula' =>$doctor_ced,
'Password' => $doc_webs_pass,
'Proveedo' => $proveedo
);

/*$auth = array(
'Cedula' =>"001-1087557-2",
'Password' => "7977f95",
'Proveedo' => "8605"
);*/

$header = new SoapHeader('https://arssenasa.gob.do/','AuthenticationHeader',$auth,false);     
$client->__setSoapHeaders($header);

// web service input params
$request_param = array(
'TipoDocumento' => 2,
//'NumDocumento' => "013426381"
'NumDocumento' => $patientNss
);
$responce_param = null;
try
{
$responce_param = $client->ConsultarAfiliado($request_param);
//print_r($responce_param);
$estado=$responce_param->ConsultarAfiliadoResult->IdEstado;
//echo $estado;
echo json_encode($estado);

} 
catch (Exception $e) 
{ 
echo "<h2>Exception Error!</h2>"; 
echo $e->getMessage(); 
}


}



function getNap()
{
//$nap=1778818247;
//echo json_encode($nap);	

$credentials = $this->input->post('credentials');
$decoded = json_decode($credentials, true);
//doc credentials
$doctor_ced=$decoded['docCedula'];
$doc_webs_pass=$decoded['docPassword'];
$proveedo=$decoded['proveedo'];
//pat info
$patientNss=$decoded['patientNss'];

$this->session->set_userdata('doctor_ced',$doctor_ced);
$this->session->set_userdata('doc_webs_pass',$doc_webs_pass);
$this->session->set_userdata('proveedo',$proveedo);


$wsdl   = "http://arssenasa2.gob.do/webservices/webservicesautorizaciones/WSAutorizacionConsulta.asmx?WSDL";

$client = new SoapClient($wsdl, array('trace' => 1));  // The trace param will show you errors stack

$auth = array(
'Cedula' =>$doctor_ced,
'Password' => $doc_webs_pass,
'Proveedo' => $proveedo
);


$header = new SoapHeader('https://arssenasa.gob.do/','AuthenticationHeader',$auth,false);     
$client->__setSoapHeaders($header);

// web service input params
$request_param = array(
'tipoDocumento' => 2,
'NumDocumento' => $patientNss
);
$responce_param = null;
try
{
$responce_param = $client->GenerarAutorizacionConsulta($request_param);

$nap =$responce_param->GenerarAutorizacionConsultaResult->Nap;
echo json_encode($nap);

} 
catch (Exception $e) 
{ 
echo "<h2>Exception Error!</h2>"; 
echo $e->getMessage(); 
}


}



public function get_service_precio()
{
$id=$this->input->post('id_mssm1');
$nap=$this->input->post('nap');
$nap_state=$this->input->post('nap_state');
$precio=$this->db->select('monto')->where('id_tarif',$id)->get('tarifarios')->row('monto');
//echo $precio;
if($nap_state==1){
	$this->fetchSeguroPayProced($nap,$id,$nap_state);

}else{
$arrayValues = array(
'nap_state'   => $nap_state,
'total_pag_seg' => $precio
);

echo json_encode($arrayValues);
}
}



function fetchSeguroPayProced($nap,$id,$nap_state)
{
$doctor_ced = $this->session->userdata['doctor_ced'];
$doc_webs_pass = $this->session->userdata['doc_webs_pass'];
$proveedo = $this->session->userdata['proveedo'];
//$id_p_a = $this->session->userdata['id_p_a'];

$wsdl   = "http://arssenasa2.gob.do/webservices/webservicesautorizaciones/WSAutorizacionConsulta.asmx?WSDL";

$client = new SoapClient($wsdl, array('trace' => 1));  // The trace param will show you errors stack

$auth = array(
'Cedula' =>$doctor_ced,
'Password' => $doc_webs_pass,
'Proveedo' => $proveedo
);
$header = new SoapHeader('https://arssenasa.gob.do/','AuthenticationHeader',$auth,false);     
$client->__setSoapHeaders($header);

$request_param = array('nap' => $nap);

$responce_param = null;
try
{
$responce_param = $client->ConsultarAutorizacion($request_param);
$responce_param = $client->__getLastResponse();
$responce_param = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $responce_param);
$xml = new SimpleXMLElement($responce_param);
$body = $xml->xpath('//soapBody')[0];
$array = json_decode( str_replace('@', '', json_encode((array)$body)), TRUE); 
$arrayValues = array(
'nap_state'   => $nap_state,
'precio'   => $array['ConsultarAutorizacionResponse']['ConsultarAutorizacionResult']['ProcedimientosAutorizados']['ProcedimientoAutorizado']['ValorUnitario'],
'total_pag_seg' => $array['ConsultarAutorizacionResponse']['ConsultarAutorizacionResult']['ProcedimientosAutorizados']['ProcedimientoAutorizado']['CoberturaPdss'],
'total_pag_patient' =>$array['ConsultarAutorizacionResponse']['ConsultarAutorizacionResult']['autorizacion']['ValorCopago']
);

echo json_encode($arrayValues);

} 
catch (Exception $e) 
{ 
echo "<h2>Exception Error!</h2>"; 
echo $e->getMessage(); 
}

}




function cancel_nap()
{
$doctor_ced = $this->session->userdata['doctor_ced'];
$doc_webs_pass = $this->session->userdata['doc_webs_pass'];
$proveedo = $this->session->userdata['proveedo'];
//$id_p_a = $this->session->userdata['id_p_a'];

$wsdl   = "http://arssenasa2.gob.do/webservices/webservicesautorizaciones/WSAutorizacionConsulta.asmx?WSDL";

$client = new SoapClient($wsdl, array('trace' => 1));  // The trace param will show you errors stack

$auth = array(
'Cedula' =>$doctor_ced,
'Password' => $doc_webs_pass,
'Proveedo' => $proveedo
);
$header = new SoapHeader('https://arssenasa.gob.do/','AuthenticationHeader',$auth,false);     
$client->__setSoapHeaders($header);

$request_param = array(
'Nap' => $this->input->post('nap'),
'MotivoAnulacion' => $this->input->post('MotivoAnulacion')
);

$responce_param = null;
try
{
$responce_param = $client->AnularAutorizacion($request_param);

$message =$responce_param->AnularAutorizacionResult;
echo json_encode($message);

}  
catch (Exception $e) 
{ 
echo "<h2>Exception Error!</h2>"; 
echo $e->getMessage(); 
}

}



function checkIfSimonAuth(){

$codigo_simon = $this->input->post('codigo_simon');

$credentials = $this->input->post('credentials');
$decoded = json_decode($credentials, true);

$doctor_ced=$decoded['docCedula'];
$doc_webs_pass=$decoded['docPassword'];
$proveedo=$decoded['proveedo'];

$patientNss=$decoded['patientNss'];

$wsdl = $this->input->post('wsl_centro');

$client = new SoapClient($wsdl, array('trace' => 1));  // The trace param will show you errors stack

$auth = array(
'Cedula' =>$doctor_ced,
'Password' => $doc_webs_pass,
'Proveedo' => $proveedo
);
$header = new SoapHeader('https://arssenasa.gob.do/','AuthenticationHeader',$auth,false);     
$client->__setSoapHeaders($header);

$request_param = array(
'tipoDocumento' => 2,
'NumDocumento' => $patientNss,
 'ListaProcedimientos' => array(
 'int' =>$codigo_simon
 ));

$responce_param = null;
try
{
$responce_param = $client->ValidarAutorizacion($request_param);

$message =$responce_param->ValidarAutorizacionResult->Autorizacion->Mensaje;
if($message=="AUTORIZACION NO PROCEDE ==> Este procedimiento no está parametrizado"){

$arrayValues = array(
'message'   => $message
);

echo json_encode($arrayValues);
} else{
	$this->generateLabAuth($credentials ,$codigo_simon, $wsdl);	
	
}
}  
catch (Exception $e) 
{ 
echo "<h2>Exception Error!</h2>"; 
echo $e->getMessage(); 
}


}






function generateLabAuth($credentials ,$codigo_simon, $wsdl)
{
$decoded = json_decode($credentials, true);

$doctor_ced=$decoded['docCedula'];
$doc_webs_pass=$decoded['docPassword'];
$proveedo=$decoded['proveedo'];

$patientNss=$decoded['patientNss'];

$client = new SoapClient($wsdl, array('trace' => 1));  // The trace param will show you errors stack

$auth = array(
'Cedula' =>$doctor_ced,
'Password' => $doc_webs_pass,
'Proveedo' => $proveedo
);
$header = new SoapHeader('https://arssenasa.gob.do/','AuthenticationHeader',$auth,false);     
$client->__setSoapHeaders($header);

$request_param = array(
'tipoDocumento' => 2,
'NumDocumento' => $patientNss,
 'ListaProcedimientos' => array(
 'int' =>$codigo_simon
 ));

$responce_param = null;
try
{
$responce_param = $client->GenerarAutorizacionLaboratorio($request_param);

/*$arrayValues = array(
'message'   => "ok",
'precio'   => 3,
'total_pag_seg' => $array['GenerarAutorizacionLaboratorioResponse']['GenerarAutorizacionLaboratorioResult']['Procedimientos']['Procedimiento']['MontoPdss'],
'total_pag_patient' =>$array['GenerarAutorizacionLaboratorioResponse']['GenerarAutorizacionLaboratorioResult']['Procedimientos']['Procedimiento']['MontoCopago']
);*/



$arrayValues = array(
'message'   =>$responce_param->GenerarAutorizacionLaboratorioResult->Mensaje,
'total_pag_seg' => $responce_param->GenerarAutorizacionLaboratorioResult->Procedimientos->Procedimiento->MontoPdss,
'total_pag_patient' =>$responce_param->GenerarAutorizacionLaboratorioResult->Procedimientos->Procedimiento->MontoCopago
);
echo json_encode($arrayValues);

} 
catch (Exception $e) 
{ 
echo "<h2>Exception Error!</h2>"; 
echo $e->getMessage(); 
}

}





function checkWebServicePass(){
$id_seguro=$this->input->post('id_seguro');
$id_user=$this->input->post('id_user');
$id_centro=$this->input->post('id_centro');
$perfil=$this->session->userdata('user_perfil');

if($perfil=="Medico"){
$password=$this->db->select('passwordDoc')->where('id_seguro',$id_seguro)->where('id_doctor',$id_user)->get('doctor_web_services_credentials')->row('passwordDoc');
}else{
$password=$this->db->select('passwordCentro')->where('id_seguro',$id_seguro)->where('id_centro',$id_centro)->get('doctor_web_services_credentials')->row('passwordCentro');

}
echo $password;
}


public function saveNewPassWebService(){
$perfil= $this->session->userdata('user_perfil');
$password=$this->input->post('password');
$id_seguro=$this->input->post('id_seguro');
$id_user=$this->input->post('id_user');
$id_centro=$this->input->post('id_centro');
if($perfil=="Medico"){
	$passField = "passwordDoc";
	$centro_type = "privado";
	$idUserField="id_doctor";
	$idUserValue=$id_user;
}else{
	$passField = "passwordCentro";
	$centro_type = "publico";
    $idUserField="id_centro";
    $idUserValue=$id_centro;	
}

$query = $this->db->get_where('doctor_web_services_credentials',
array(
$idUserField=>$idUserValue,
'id_seguro'=>$id_seguro,
));



if($password=='' || $id_seguro==''){
 $response['status'] =0;
$response['message'] = 'los dos campos son obligatorios!'; 
} elseif($query->num_rows() == 1){
	$where= array(
   'id_seguro' => $id_seguro,
  $idUserField => $idUserValue
);


$data = array(
  $passField => $password
 );


 
$this->db->where($where);
$this->db->update("doctor_web_services_credentials",$data);
 $response['status'] =2;
$response['message'] = 'Cambiado con éxito.'; 
}
else{	
$data = array(
  $passField => $password,
  'id_seguro' => $id_seguro,
  $idUserField => $idUserValue,
  'centro_type' =>$centro_type,
   'id_user' =>$this->input->post('id_user')   
  );	
$this->db->insert("doctor_web_services_credentials",$data);
 $response['status'] =1;
$response['message'] = 'Agregado con éxito.'; 

}
echo json_encode($response);
}





}


