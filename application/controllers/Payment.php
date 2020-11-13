<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller { 
public function __construct()
{
parent::__construct();


}




public function index(){

if(empty($this->session->userdata['PaymentSession']))	{
redirect('/page404');	
}

$data['payment_info']=$this->session->userdata('PaymentSession');
$this->load->view('payment/index',$data);
}

}