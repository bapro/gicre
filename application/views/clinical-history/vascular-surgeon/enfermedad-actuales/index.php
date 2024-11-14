<div class="col-sm-12">
  <h5 class="card-title">Cirujano vascular</h5>
  <?php
  $params = array('id_paginate' => 'paginate-vascular_surgeon-li', 'rows' => $enfermedad, 'id' => 'id', 'total' => $enfermedad_follow_up);
  echo $this->user_register_info->list_patients_registers_by_date($params);
  ?>

  <div id="vascular_surgeon-form">
    <?php $this->load->view('clinical-history/vascular-surgeon/enfermedad-actuales/form'); ?>
  </div>
</div>