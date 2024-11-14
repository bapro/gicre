
       <h4 class="card-title">Presupuestos</h4>
	    
       <div class="col-sm-10">
	   <?php 
		$params = array('id_paginate' => 'paginate-presupuesto-li', 'rows'=>$rows->result(), 'id'=>'id', 'total'=>$rows->num_rows());
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
               
	   <div id="patientPresupuestosListato">
	     
          </div>
       </div>