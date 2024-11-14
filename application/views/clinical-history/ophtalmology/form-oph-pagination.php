 <div class="col-sm-12">
  <h5 class="card-title">Oftalmología</h5>
  <div id='reload-oph-pag'>
	   <?php 
		$params = array('id_paginate' => 'paginate-ophtalmology-li', 'rows'=>$query_ophtal, 'id'=>'id', 'total'=>$ophtal_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
    </div>           
	   <div id="ophtalmology-form">
	     <?php $this->load->view('clinical-history/ophtalmology/form-oph');?>
          </div>
       </div>
   
   