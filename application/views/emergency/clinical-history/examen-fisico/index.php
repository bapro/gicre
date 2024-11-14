 <div class="col-sm-12">
  <h5 class="card-title">Examene Físico</h5>
  <div id="pagination-emerg_exam_fisico">
	   <?php 
		$params = array('id_paginate' => 'paginate-examfisico-li', 'rows'=>$query_ex_fis, 'id'=>'id', 'total'=>$ex_fis_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
         </div>      
	   <div id="examfisico-form">
	     <?php $this->load->view('emergency/clinical-history/examen-fisico/form');?>
          </div>
       </div>
   
   