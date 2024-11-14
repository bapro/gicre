
       <h4 class="card-title">Urología</h4>
	  <?php
	  $get_number_only=40;
  //$get_number_only=preg_replace('/\D/','',$edad);
 //if($get_number_only >=40)  {
 //echo '<div class="alert alert-danger hide-tacto-rectal text-center" role="alert">
 // ALERTA: El paciente tiene 40 años de edad o más, debe realizarle un tacto rectal.
//</div>';
 //}
 
 $edad=$this->session->userdata['sessionPatientAge'];?>
       <div class="col-sm-10">
	   <?php 
		$params = array('id_paginate' => 'paginate-uro-exam-fis-li', 'rows'=>$query_ex_uro, 'id'=>'id', 'total'=>$ex_uro_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
               
			  <div class="spinner-border text-primary" role="status" style="display:none">
			<span class="visually-hidden">Loading...</span>
			</div>
	   <div id="uro-exam-fis-form">
	     <?php $this->load->view('clinical-history/urology/examen-fisico'); ?>
          </div>
       </div>