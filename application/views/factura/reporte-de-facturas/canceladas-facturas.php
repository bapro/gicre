   <h3 class="card-title py-3">Reporte de facturas anuladas</h3>
  <form class="row g-3" id="report-can" target="_blank" METHOD="GET" ACTION="<?php echo site_url("report_general/canceledInvoices"); ?>">
               
			  
                <div class="col">
                  <label for="centro-can" class="form-label">Centro médico</label>
                  <select id="centro-can" class="form-select diabled-all-inputs" name='centro-search-can' >
				  <option value=""></option>
					<?php 
					echo $result_centro_medicos;
					?>
					</select>
                </div>
                <div class="col">
                  <label for="doctor-can" class="form-label">Médico</label>
                  <select id="doctor-can" class="form-select diabled-all-inputs" name='doctor-rg-can' >
                     <option value=""></option>
                  <?=$result_doctors?>
                  </select>
                </div>
				  
                <div class="col">
                  <label for="desde-can" class="form-label">Desde</label>
                  <select id="desde-can" class="form-select date-range-can" name="desde-search-can" disabled>
                   
                  </select>
                </div>
                <div class="col">
                  <label for="hasta-can" class="form-label">Hasta</label>
                  <select id="hasta-can" class="form-select date-range-can" name="hasta-search-can"  disabled>
                    
                  </select>
				 
                </div>
                
              <!-- End Multi Columns Form -->
 <div class="text-end py-2">
                  <button type="submit" class="btn btn-primary">Ver</button>
                  <input id="clone-check-seguro" type="hidden" />
                </div>
				</form>