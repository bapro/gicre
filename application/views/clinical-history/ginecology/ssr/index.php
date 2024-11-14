<h4 class="card-title">Antecedentes De Salud Sexual Y Reproductiva</h4>
 <div class="col-md-12">
	   <?php 
		$params = array('id_paginate' => 'paginate-ssr-li', 'rows'=>$query_ssr, 'id'=>'idssr', 'total'=>$ssr_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
               
			
	   <div id="ssr-form">
	     <?php $this->load->view('clinical-history/ginecology/ssr/form'); ?>
          </div>
       </div>