<input id="id_sig_vit" value="<?=$id_sig_vit?>" type="hidden" />
<?php echo $check = ($id_sig_vit == 0) ? "" : "<strong>Registro #$id_sig_vit</strong>"; ?>
              <h5 class="card-title">CONTROL DE SIGNOS VITALES</h5>

              <!-- General Form Elements -->
              <form id="form-sig-vita">
                <div class="row">
                  <label for="" class="col-sm-3 col-form-label">Sat o2(%)</label>
                  <div class="col-sm-7">
                     <input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_sat' value="<?=$csv_sat?>" />
                  </div>
                </div>
                <div class="row mb-2">
                  <label for="" class="col-sm-3 col-form-label">Tensión arterial</label>
                  <div class="col-sm-9">
				  <div class="d-flex">
				  <div class="flex-fill p-1">
				mm: 
				<input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_ta1' value="<?=$csv_ta1?>"  />
				</div>
				 <div class="flex-fill p-1">
				hg: 
				<input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_ta2' value="<?=$csv_ta2?>" />
				</div>
				</div>
				  </div>
                </div>
                <div class="row mb-2">
                  <label for="inputPassword" class="col-sm-3 col-form-label">F.C</label>
                  <div class="col-sm-7">
                       <input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_fc' value="<?=$csv_fc?>" />
                  </div>
                </div>
                <div class="row mb-2">
                  <label for="" class="col-sm-3 col-form-label">F.R.</label>
                  <div class="col-sm-7">
                        <input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_fr' value="<?=$csv_fr?>" />
                  </div>
                </div>
                <div class="row mb-2">
                  <label for="" class="col-sm-3 col-form-label">Glicemia</label>
                  <div class="col-sm-7">
                   <input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_glicemia' value="<?=$csv_glicemia?>" />
                  </div>
                </div>
                <div class="row mb-2">
                  <label for="" class="col-sm-3 col-form-label">Pulso</label>
                  <div class="col-sm-7">
                    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_pulso' value="<?=$csv_pulso?>" />
                  </div>
                </div>
                <div class="row mb-2">
                  <label for="" class="col-sm-3 col-form-label">℃</label>
                  <div class="col-sm-7">
                    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_temperatura'  value="<?=$csv_temperatura?>"/>
                  </div>
                </div>

                <div class="row mb-2">
                  <label for="" class="col-sm-3 col-form-label">Diuresis-Dep</label>
					<div class="col-sm-7">
					<div class="input-group">
					<input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_diuresis' value="<?=$csv_diuresis?>"/>
					<span class="input-group-addon">-</span>
					<input type="number" min="5" max="25" step="5" class="form-control check-input-csv clear-cs" id='csv_dep' value="<?=$csv_dep?>" />
					</div>
					</div>
                </div>
				 <div class="row mb-2">
                  <label for="" class="col-sm-3 col-form-label">Hora realizada</label>
                  <div class="col-sm-7">
                    <input type="datetime-local" class="form-control clear-cs" id="mirror_field_cont_sig" value="<?=date('Y-m-d H:i:s')?>">
                  </div>
                </div>
          
 <?php if($this->session->userdata('user_perfil') =='Enfermera' || $this->session->userdata('user_perfil') =='Medico' ){?>
                <div class="row mb-2">
                  <div class="col-sm-7">
                    <button type="button" id="csv-add-btn" class="btn btn-primary">Agregar </button>
						 <?=$cancel?>
					<div class="saveResult"></div>
				
                  </div>
                </div>
 <?php } ?>
              </form><!-- End General Form Elements -->
 <input type="hidden" class="form-control" id="isCsVempty" value="1" >
		</div>
		
		
		
		 <script>




   </script>