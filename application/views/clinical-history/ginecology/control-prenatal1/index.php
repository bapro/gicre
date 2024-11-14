<h4 class="card-title">Control Prenatal</h4>

<div class="col-sm-12">
<div id="reload-control-prenatal">
    <?php
    $params = array('id_paginate' => 'paginate-control-prenatal-li', 'rows' => $query_con_pren, 'id' => 'id_registro', 'total' => $con_pren_totals);
    echo $this->user_register_info->list_patients_registers_by_date($params);
    ?>
</div>
  
    <div id="control-prenatal-form">
        <div class="table-responsive">
            <?php $this->load->view('clinical-history/ginecology/control-prenatal/form'); ?>
        </div>
    </div>
</div>