<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Whatsapp_api{
protected $CI;
  public function __construct(){

	$this->CI =& get_instance();

  }
  public function sendWhatsappNotificationToPatient($params){
	  
	$api=$this->CI->db->select('instance_id, token')->where('client_id',$params['client_id'])->get('api_client_integration')->row_array();  
	
	$client = new \UltraMsg\WhatsAppApi($api['token'], $api['instance_id']);
	
	$response_api = $client->sendImageMessage($params['to'], $params['centro_logo'], $params['body']); 
	
	//$response_api = $client->sendChatMessage($params['to'], $params['body']);  
	
	 //return $response_api ;
 //return "Cita Realizada. Mensaje enviado al paciente por WhatsApp";
 

  //return ($response); 
  }
 
}

?>
