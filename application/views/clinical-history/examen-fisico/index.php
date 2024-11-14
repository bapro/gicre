 <div class="col-sm-12">
  <h5 class="card-title">Examenes</h5>
	   <?php 
		$params = array('id_paginate' => 'paginate-examfisico-li', 'rows'=>$query_ex_fis, 'id'=>'id', 'total'=>$ex_fis_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
               
	   <div id="examfisico-form">
	     <?php $this->load->view('clinical-history/examen-fisico/forms');?>
          </div>
       </div>
   
   