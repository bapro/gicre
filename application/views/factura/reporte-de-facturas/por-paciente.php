   <h3 class="card-title py-3">Reporte de facturas por centro medico</h3>
  <form class="row g-3" id="report1" target="_blank" METHOD="GET" ACTION="<?php echo site_url("print_page/patients_invoice_report"); ?>">
               
			   <div class="col-md-12">
                 <label>El tipo de centro médico :</label> 
				 <input type="radio"  name="select-centro" value="privado" class="select-centro" checked /> privado
				 <?php if($this->session->userdata('user_perfil')!="Medico") {?>
				 | <input type="radio" value="publico" class="select-centro" name="select-centro"/> público
				 <?php } ?>
                </div>
                <div class="col">
                  <label for="centro1" class="form-label">Centro médico</label>
                  <select id="centro1" class="form-select diabled-all-inputs" name='centro-search' >
				  
					</select>
                </div>
                <div class="col">
                  <label for="doctor1" class="form-label">Médico</label>
                  <select id="doctor1" class="form-select diabled-all-inputs" name='doctor-rg' >
                     <option value=""></option>
                  <?=$result_doctors?>
                  </select>
                </div>
				    <div class="col">
                  <label for="seguro" class="form-label">Seguro médico</label>
                  <select id="seguro" class="form-select" name="seguro" disabled>
				  <option></option>
							<?php 

							foreach($search_date_range_seguro_factura as $row)
							{
							$seguro= $this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');		
							?>
							<option value="<?=$row->seguro_medico?>" ><?=$seguro?></option>
							<?php
							}
							?>
                  </select>
                </div>
                <div class="col">
                  <label for="desde1" class="form-label">Desde</label>
                  <select id="desde1" class="form-select" name="desde-search" disabled>
                   
                  </select>
                </div>
                <div class="col">
                  <label for="hasta1" class="form-label">Hasta</label>
                  <select id="hasta1" class="form-select" name="hasta-search"  disabled>
                    
                  </select>
				 
                </div>
                
              <!-- End Multi Columns Form -->
 <div class="text-end py-2">
                  <button type="submit" class="btn btn-primary">Ver</button>
                  <input id="clone-check-seguro1" type="hidden" />
                </div>
				</form>