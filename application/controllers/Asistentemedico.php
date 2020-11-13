
<?php

class Asistentemedico extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

$this->load->model('model_assistentemedico');
        
          /*session checks */ 

    if($this->session->userdata('staff_is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
   }

    }

    Public function index()
    {  
	$iduser=($this->session->userdata['staff_id']);
		$data['centro_medico'] = $this->model_assistentemedico->getAsistenteCentro($iduser);
$data['appointments']= $this->model_assistentemedico->getAsistenteAp($iduser);

		$this->load->view('asistente_medico/index',$data);
    }
}