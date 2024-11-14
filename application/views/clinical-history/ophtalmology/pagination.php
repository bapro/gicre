
	   <?php 
		$params = array('id_paginate' => 'paginate-ophtalmology-li', 'rows'=>$query_ophtal, 'id'=>'id', 'total'=>$ophtal_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
           
	  