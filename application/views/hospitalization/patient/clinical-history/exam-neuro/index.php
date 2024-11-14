<h4 class="card-title">Examen neurología</h4>
 <div class="col-sm-12">
  <div id="pagination-hosp_exam_neuro">
	   <?php 
		$params = array('id_paginate' => 'paginate-exam-neruo-li', 'rows'=>$query_exn, 'id'=>'id', 'total'=>$exn_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
    </div>       
			
	   <div id="exam-neruo-form">
	     <?php $this->load->view('hospitalization/clinical-history/exam-neuro/form'); ?>
          </div>
       </div>