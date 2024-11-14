<?php
if ($ex_notas_fis_data == 0) {
    $noteName = '';
    $noteDesc = '';
    $idExf = 0;
	 $userExf=$this->session->userdata('user_id');
} else {
    foreach ($query_ex_notas_fis as $row) {
        $noteName = $row->nombre_nota;
        $noteDesc = $row->description_nota;
    }
    $idExf = $row->idSearch;
    $params2 = array('table' => 'hosp_exam_fis_nota', 'id' => $row->idSearch);
    echo $this->user_register_info_hospitalization->get_operation_info($params2);
	 $userExf=$row->inserted_by;
}

?>

<div id="examfisico-form-notas">
    <div class="row" id="exam-HospExf-form-notas">
        <div class="card-body">
            <div class="accordion " id="accordionHospExfNotas">
                <div class="accordion-item ">
                    <h2 class="accordion-header" id="headingTwelveHospExfNotas">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwelveHospExfNotas" aria-expanded="false"
                            aria-controls="collapseTwelveHospExfNotas">
                            Signos Vitales
                        </button>
                    </h2>
                    <div id="collapseTwelveHospExfNotas" class="accordion-collapse collapse"
                        aria-labelledby="headingTwelveHospExf" data-bs-parent="#accordionHospExf">
                        <div class="accordion-body">
                            <div class="col-md-12">
                                <?php $this->load->view('hospitalization/clinical-history/notas/vital-signals'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3">
                <div class="input-group mb-2">
                    <span class="input-group-text">Nombre de nota <span class="text-danger fs-4">*</span></span>
                    <input class="form-control required-input-form-exf" id="<?= $idExf ?>_hallazgo_exf_name_notas"
                        value="<?= $noteName ?>">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">Descripcion de nota <span class="text-danger fs-4">*</span></span>
                    <textarea class="form-control required-input-form-exf" id="<?= $idExf ?>_hallazgo_exf_desc_notas"
                        style="height: 200px;"><?= $noteDesc ?></textarea>
                </div>
            </div>


        </div>

        <div class="float-end text-end">
            <?php if ($idExf > 0) {
 echo '<a class="btn btn-md btn-primary" target="_blank" href="'.base_url().'print_page_hospitalization/print_notas/'.$idExf.'" target="_blank"><i class="fa fa-print"></i></a>';
			?>
                <button type="button" class="btn btn-primary" id="resetFormFormExFNotas">Nuevo</button>
            <?php
           } 	if($this->session->userdata('user_id')==$userExf || $this->session->userdata('user_perfil') =='Auditoria Medico'){?>
					<button type="button" class="btn btn-success" id="btnSaveExamenFisicoNotas">Guardar </button>
					<?php  }?>
            <input type="hidden" value="<?= $idExf ?>" id="id_exf_notas">
      
            <span id="alert_placeholder_exf_notas" style="position:absolute; " class="p-2"></span>

        </div>

        <input type="hidden" id="ex_vitales_up_time_notas" value="<?= date("Y-m-d H:i:s") ?>" />
        <input type="hidden" id="ex_vitales_in_time_notas" value="<?= date("Y-m-d H:i:s") ?>" />
        <input type="hidden" id="ex_vitales_in_by_notas" value="<?= $this->session->userdata('user_id') ?>" />
        <input type="hidden" id="ex_vitales_up_by_notas" value="<?= $this->session->userdata('user_id') ?>" />

    </div>
</div>