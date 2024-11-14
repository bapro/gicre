    <h3 class="card-title py-3">Reporte de Factura General</h3>
 <form class="row g-3">
                <div class="col-md-12">
              
				<label>Seleccione el tipo de moneda:</label>
				<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox1" name="select-device" value="RD$" checked>
				<input  type="hidden" class="tasa" id="tasa-peso"  value="0" >
				<label class="form-check-label" for="inlineCheckbox1"><img  width="20"  src="<?=base_url()?>/assets_new/img/300164.png"  /></label>
				</div>
				
				<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox2" name="select-device" value="USD$">
				
				<label class="form-check-label" for="inlineCheckbox2"><img  width="20"  src="<?=base_url()?>/assets_new/img/206626.png"  /></label>
				
				</div>
				
				<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox3" name="select-device" value="&euro;" >
				
				<label class="form-check-label" for="inlineCheckbox3"><img  width="20"  src="<?=base_url()?>/assets_new/img/5111601.png"  /></label>
					
				</div>
				
			
                </div>
                <div class="col">
                  <label for="centro" class="form-label">Centro médico</label>
                  <select id="centro" class="form-select" >
				  <option value=""></option>
					<?php 
					echo $result_centro_medicos;
					?>
					</select>
                </div>
                <div class="col">
                  <label for="doctor" class="form-label">Médico</label>
                  <select id="doctor" class="form-select" disabled>
                  </select>
                </div>
                <div class="col">
                  <label for="desde" class="form-label">Desde</label>
                  <select id="desde" class="form-select date-range" disabled>
                   
                  </select>
                </div>
                <div class="col">
                  <label for="hasta" class="form-label ">Hasta</label>
                  <select id="hasta" class="form-select date-range" disabled>
                    
                  </select>
				 
                </div>
                
              </form><!-- End Multi Columns Form -->
 <div class="text-end py-2">
                  <button type="button" id="ver-reporte" class="btn btn-primary">Ver</button>
                  <input id="clone-check-seguro" type="hidden" />
                </div>