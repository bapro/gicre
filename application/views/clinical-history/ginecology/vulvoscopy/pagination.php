
<?php 
		$params = array('id_paginate' => 'paginate-vulvoscopy-li', 'rows'=>$rows->result(), 'id'=>'id', 'total'=>$num_rows);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>

    