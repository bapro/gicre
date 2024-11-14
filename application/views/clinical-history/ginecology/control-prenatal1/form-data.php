<div class="table-responsive ">
    <table class="table table-borderless control-prenatal-table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align:center">Tensión Alterial</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query_con_pren_data as $row) {
            ?>
                <tr>
                    <td>
                        <input class="position-cont-pren" type="hidden" value="<?= $row->id ?>" />
                        <div class="form-floating">
                            <input type="date" style="width:190px" class="form-control <?= $con_pren_data ?>_cp_fecha" placeholder="Fecha de la consulta" value="<?= $row->fecha ?>">
                            <label>Fecha de la consulta</label>
                        </div>


                    </td>
                    <td>

                        <div class="form-floating">
                            <input type="text" style="width:180px" class="form-control <?= $con_pren_data ?>_cp_semana" placeholder="Semana de amenorrea" value="<?= $row->semana ?>">
                            <label>Semana de amenorrea</label>
                        </div>

                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" style="width:100px" class="form-control <?= $con_pren_data ?>_cp_peso" placeholder="Peso (lb)" value="<?= $row->peso ?>">
                            <label>Peso (lb)</label>
                        </div>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:100px" class="form-control <?= $con_pren_data ?>_cp_tension_art_max" placeholder="max (mm)" value="<?= $row->tension_art_max ?>">
                                        <label>max (mm)</label>
                                    </div>

                                </td>
                                <td>-</td>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:100px" class="form-control <?= $con_pren_data ?>_cp_tension_art_min" placeholder="min (hg)" value="<?= $row->tension_art_min ?>">
                                        <label>min (hg)</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>

                        <table>
                            <tr>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:120px" class="form-control <?= $con_pren_data ?>_cp_alt_ult" placeholder="Alt. Ulterina" value="<?= $row->alt_ult ?>">
                                        <label>Alt. Ulterina</label>
                                    </div>

                                </td>
                                <td>-</td>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:150px" class="form-control <?= $con_pren_data ?>_cp_pubis_f" placeholder="Pubis.FondoCef" value="<?= $row->pubis_f ?>">
                                        <label>Pubis.FondoCef</label>
                                    </div>
                                </td>
                                <td>-</td>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:80px" class="form-control <?= $con_pren_data ?>_cp_pelv_tr" placeholder="Pelv.Tr" value="<?= $row->pelv_tr ?>">
                                        <label>Pubis.FondoCef</label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:80px" class="form-control <?= $con_pren_data ?>_cp_lat_min" placeholder="lat./min." value="<?= $row->lat_min ?>">
                                        <label>lat./min.</label>
                                    </div>
                                </td>
                                <td>-</td>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:100px" class="form-control <?= $con_pren_data ?>_cp_mov_fet" placeholder="Mov.Fetal" value="<?= $row->mov_fet ?>">
                                        <label>Mov.Fetal</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:100px" class="form-control <?= $con_pren_data ?>_cp_edema" placeholder="Edema" value="<?= $row->edema ?>">
                                        <label>Edema</label>
                                    </div>
                                </td>
                                <td>-</td>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" style="width:100px" class="form-control <?= $con_pren_data ?>_cp_varices" placeholder="Varices" value="<?= $row->varices ?>">
                                        <label>Varices</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>

                        <div class="form-floating">
                            <textarea style="width:180px" class="form-control <?= $con_pren_data ?>_cp_otro" placeholder="Otros"><?= $row->otro ?></textarea>
                            <label>Otros</label>
                        </div>

                    </td>
                    <td>
                        <div class="form-floating">
                            <textarea style="width:240px" class="form-control <?= $con_pren_data ?>_cp_evolution" placeholder="Evolución"><?= $row->evolution ?></textarea>
                            <label>Evolución</label>
                        </div>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align:center">Tensión Alterial</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
        </tfoot>
    </table>
    <?php $this->load->view('clinical-history/ginecology/control-prenatal/form'); ?>
</div>
<div class="float-end">

    <button type="button" class="btn btn-primary" id="resetFormContPrena">Nuevo</button>
    <button type="button" class="btn btn-success" id="saveEditContPrena">Guardar </button>
    <span id="alert_placeholder_control_prena" style="position:absolute; " class="p-2"></span>

</div>
<input id="con_pren_data" value="<?= $con_pren_data ?>" type="hidden" />
<?php $this->load->view('clinical-history/ginecology/control-prenatal/footer'); ?>