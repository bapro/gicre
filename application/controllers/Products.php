<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
	
	function  __construct(){
		parent::__construct();
		$this->load->model('model_admin');
		$this->load->library('paypal_lib');
		$this->load->model('product');
	}
	
	function index(){
		$data = array();
		
		// Get products data from the database
        $data['products'] = $this->product->getRows();
		
		// Pass products data to the view
		$this->load->view('products/index', $data);
	}
	
	
	
	
	
	function doctor_account_payment_($id_doctor,$id_plan){
		$this->session->set_userdata('id_doctor',$id_doctor);
		$this->session->set_userdata('id_plan',$id_plan);
		redirect("products/doctor_account_payment");
	}
	

	
    function doctor_account_payment(){
		$id_doctor =$this->session->userdata('id_doctor');
		$id_plan =$this->session->userdata('id_plan');
		
		if(empty($id_doctor)){
		redirect('/page404');
		}
		
		$this->load->view('navigation/header');
		$doctor=$this->db->select('name,area,plazo,cuenta_gratis,payment_plan')->where('id_user',$id_doctor)->get('users')->row_array();
		$data['doctor']=$doctor;
		$data['doctor_name']=$doctor['name'];
		 $data['title_area']=$this->db->select('title_area')->where('id_ar',$doctor['area'])->get('areas')->row('title_area');
		$data['id_doctor']=$id_doctor;
		// $sql2 ="SELECT * FROM  medico_precio_plan WHERE id=$id_plan";
         //$data['query2']= $this->db->query($sql2);
		 $data['especialidades'] = $this->model_admin->getEspecialidades();
		 $sql ="SELECT * FROM  users WHERE id_user=$id_doctor";
         $data['query']= $this->db->query($sql);
		 //---------------------------------------------------------------
		$this->load->view('products/doctor_account_payment', $data);
		$this->load->view('navigation/footer');
	 }
	
	
	


	function pay_account_for_doc($idoc,$id_plan){
		      $this->session->set_userdata('id_doc',$idoc);
		// Set variables for paypal form
		
		$returnURL = base_url().'paypal/success'; //payment success url
		$cancelURL = base_url().'paypal/cancel'; //payment cancel url
		$notifyURL = base_url().'paypal/ipn'; //ipn url
		
		$product=$this->db->select('plan,precio')->where('id',$id_plan)->get('medico_precio_plan')->row_array();
		
		// Add fields to paypal form
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $product['plan']);
		$this->paypal_lib->add_field('custom', $idoc);
		$this->paypal_lib->add_field('item_number',  $product['plan']);
		$this->paypal_lib->add_field('amount',  $product['precio']);
		
		// Render paypal form
		$this->paypal_lib->paypal_auto_form();
	}
	
	
	
	
	
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------
}