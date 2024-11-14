<div class="modal fade" id="largeModalNotasForm" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Notas</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
            <?php $this->load->view('patient/patient-info'); ?>
<hr/>
          <div id="pagination-hosp_notas">
            <?php
            $params = array('id_paginate' => 'paginate-notas-examfisico-li', 'rows' => $query_ex_notas_fis, 'id' => 'id', 'total' => $ex_notas_fis_totals);
            echo $this->user_register_info->list_patients_registers_by_date($params);
            ?>
          </div>
          <div id="examfisico-notas-form">
            <?php $this->load->view('hospitalization/clinical-history/notas/form'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>