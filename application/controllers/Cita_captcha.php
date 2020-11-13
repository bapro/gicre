<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cita_captcha extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
	$this->load->model('navigation/account_demand_model');
	 $this->load->helper('captcha');
  }

  public function index() 
    {
    	$data['message']="";
           //Checks to see if the user is logged in
        if ($this->session->userdata('logged_in') == false)
        {
      			$this->load->library('recaptcha');
				$recaptcha = $this->input->post('g-recaptcha-response');
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$phone = $this->input->post('phone');
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				
       			 if (!empty($recaptcha)) 
       			 {
            		$response = $this->recaptcha->verifyResponse($recaptcha);
            		if (isset($response['success']) && $response['success'] === true && $fname!='' && $lname!='' && $phone!='' && $username!='' && $password!='') 
            		{
                			//Register User
            			$data_ins = array(
            					'fname' => $fname ,
            					'lname' => $lname ,
            					'phone' => $phone,
            					'username' => $username,
            					'password' => $password
            			);
            			
            			$status = $this->db->save('user', $data_ins);
            			if($status==1)
            			{
            				$msg=array('message'=>'Inserted Successfully');
            				$this->session->set_userdata($msg);
            			}
            		}
        		}
 
		        $data = array(
		            'widget' => $this->recaptcha->getWidget(),
		            'script' => $this->recaptcha->getScriptTag(),
		        );
                  $this->load->view('navigation/view_cita',$data); 
         }
     }


}