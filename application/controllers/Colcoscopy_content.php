<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Colcoscopy_content extends CI_Controller {
public function __construct()
{
parent::__construct();

}




 function paginationData()
	{
	$page= $this->input->get('page');
	$idUser= $this->input->get('idUser');
	$data['user_id']=$idUser;
	$data['id_emp']=$page;
	$per_page = 1;
	$start = ($page-1)*$per_page;
	$sql = "select * from h_c_colposcopy_dh WHERE id=$page";
	$data['query_col']=$this->db->query($sql);
	$data['action_id']=1;
	$data['idpatient']=$this->input->get('id_patient');
	$data['id_centro']= $this->input->get('id_centro');
	$this->load->view('admin/historial-medical1/colposcopia/datos-personales/form', $data);
	$this->load->view('admin/historial-medical1/colposcopia/datos-personales/footer', $data); 
	}



 function paginateColcoscopy()
	{
		$idpatient= $this->input->post('id_patient');
		$data['idpatient']=$idpatient;
		$data['user_id']= $this->input->post('id_user');
		$data['id_centro']= $this->input->post('id_centro');
	   $sql ="SELECT *  FROM  h_c_colposcopy_dh WHERE id_patient=$idpatient ORDER BY id DESC";
	  $query=$this->db->query($sql);
	  $data['query_co']=$query;
	  $data['nb_co'] =$query->num_rows();
	  $this->load->view('admin/historial-medical1/colposcopia/datos-personales/paginate-number', $data);
	}


	
	function colcoscopyContentDatosPersonales()
	{
	$user_id= $this->input->post('id_user');
	$idpatient= $this->input->post('id_patient');
	$data['user_id']=$user_id;
	$data['idpatient']=$idpatient;
	$data['action_id']=0;
	$data['id_centro']= $this->input->post('id_centro');
   $sql_co ="SELECT *  FROM  h_c_colposcopy_dh WHERE id_patient=0";
   $query_co=$this->db->query($sql_co);
   $data['query_col']=$query_co;
  $this->load->view('admin/historial-medical1/colposcopia/datos-personales/form', $data);
  $this->load->view('admin/historial-medical1/colposcopia/datos-personales/footer', $data); 
	}
	

//----------------------VULVOSCOPIA------------------------------------

	function vulvoscopiaContent()
	{
	$user_id= $this->input->post('id_user');
	$idpatient= $this->input->post('id_patient');
	$data['user_id']=$user_id;
	$data['idpatient']=$idpatient;
	$data['action_id']=0;
	$data['id_centro']= $this->input->post('id_centro');
   $sql_vu ="SELECT *  FROM  h_c_vulvoscopia WHERE id_patient=0";
   $query_vu=$this->db->query($sql_vu);
   $data['query_vu']=$query_vu;
  $this->load->view('admin/historial-medical1/vulvoscopia/form', $data);
  $this->load->view('admin/historial-medical1/vulvoscopia/footer', $data); 
	}

 function paginateVulvoscopia()
	{
		$idpatient= $this->input->post('id_patient');
		$data['idpatient']=$idpatient;
		$data['user_id']= $this->input->post('id_user');
		$data['id_centro']= $this->input->post('id_centro');
	   $sql ="SELECT *  FROM  h_c_vulvoscopia WHERE id_patient=$idpatient ORDER BY id DESC";
	  $query=$this->db->query($sql);
	  $data['query_co']=$query;
	  $data['nb_co'] =$query->num_rows();
	  $this->load->view('admin/historial-medical1/vulvoscopia/paginate-number', $data);
	}


 function paginationDataVulvoscopia()
	{
	$page= $this->input->get('page');
	$idUser= $this->input->get('idUser');
	$data['user_id']=$idUser;
	$data['id_emp']=$page;
	$per_page = 1;
	$start = ($page-1)*$per_page;
	$sql = "select * from h_c_vulvoscopia WHERE id=$page";
	$data['query_vu']=$this->db->query($sql);
	$data['action_id']=1;
	$data['idpatient']=$this->input->get('id_patient');
	$data['id_centro']= $this->input->get('id_centro');
	$this->load->view('admin/historial-medical1/vulvoscopia/form', $data);
	$this->load->view('admin/historial-medical1/vulvoscopia/footer', $data); 
	}


}