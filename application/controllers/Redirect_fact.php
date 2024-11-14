<?php
class Redirect_fact extends CI_Controller {
 public function __construct()
    {
        parent::__construct();
		
    }
	
public function billing_process()
{
$id = encrypt_url($this->uri->segment(3));
$identificar = encrypt_url($this->uri->segment(4));	
$is_admin = $this->uri->segment(5);	
if($is_admin=="no"){			
redirect("medico/billView/$id/$identificar");		
}else{
redirect("admin/billView/$id/$identificar");
}
}
	
}