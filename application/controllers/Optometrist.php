<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Optometrist extends CI_Controller { 
public function __construct()
{
parent::__construct();


}



public function refraccion($user,$hist,$centro,$idrefraccion){
	$data['user_id']=$user;
	$data['id_historial']=$hist;
	$data['centro']=$centro;
	$data['paciente']=$this->db->select('nombre')->where('id_p_a',$hist)->get('patients_appointments')->row('nombre'); 
	if($idrefraccion==0){
	$this->load->view('optica/optometra/crear_refraccion', $data);
	}else{
		$sql = "select * from h_c_of_refracion where  id=$idrefraccion order by id desc ";
	$data['paginate']= $this->db->query($sql);
	$data['page']=$idrefraccion;
    $this->load->view('optica/optometra/ver-refraccion',$data);
	}
}



	
}