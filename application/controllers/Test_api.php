<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test_api extends CI_Controller {
public function __construct()
{
parent::__construct();

$this->load->model('model_admin');

 
}

public function cardio()
	{
		$this->load->view('clinical-history/cardiovascular-evaluation/new-form');
	}
	
	}