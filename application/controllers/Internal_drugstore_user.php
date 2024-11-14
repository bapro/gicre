<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Internal_drugstore_user extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
  /*session checks */ 
if($this->session->userdata('farm_int_is_logged_in')=='')
{
$this->session->set_flashdata('msg','Please Login to Continue');
redirect('login');
}
}


public function index()
{

	$data['id_user']=$this->session->userdata['farm_int_id'];
	$data['iduser']=$this->session->userdata['farm_int_id'];
	$data['perfil']=$this->session->userdata['farm_int_perfil'];
	$data['name']=$this->session->userdata['farm_int_name'];
	$id_centro=$this->db->select('id_centro')->where('id_user',$this->session->userdata['farm_int_id'])->get('internal_drugstores_center')->row('id_centro');
	$data['centro_name'] = $this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
    $this->load->view('internal-drugstore/header',$data);
	$data['id_centro']=$id_centro;
	$this->load->view('internal-drugstore/index',$data);
	
}

public function account()
{

	$data['id_user']=$this->session->userdata['farm_int_id'];
	$data['id_cu_us']=$this->session->userdata['farm_int_id'];
	$data['perfil']=$this->session->userdata['farm_int_perfil'];
	$data['updated_password']    = base_url().'password_processing/updated_password';
	$data['name']=$this->session->userdata['farm_int_name'];
	$id_centro=$this->db->select('id_centro')->where('id_user',$this->session->userdata['farm_int_id'])->get('internal_drugstores_center')->row('id_centro');
	$data['id_centro'] = $id_centro;
	$data['centro_name'] = $this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
	$this->load->view('internal-drugstore/header',$data);
	$editUser = $this->model_admin->editUser($this->session->userdata['farm_int_id']);
	$data['editUser']=$editUser;
		$data['centro_medico'] = $this->model_admin->edit_centro_medico($id_centro);
	$this->load->view('internal-drugstore/account',$data);
	
}


}