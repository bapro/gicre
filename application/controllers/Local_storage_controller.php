<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Local_storage_controller extends CI_Controller { 



 function saveDatoTemporarilly()
{
$data = array(
'factura_numauto'=>$this->input->post('numauto'),
'factura_autopor' =>$this->input->post('autopor'),
'factura_fecha_fac'=>$this->input->post('fecha_fac'),
'factura_comment'=>$this->input->post('comment'),
);

$this->session->set_userdata($data);
}

}