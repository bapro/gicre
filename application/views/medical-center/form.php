<form action="<?php echo site_url('medical_center/saveCentroMedico');?>" method="post" enctype="multipart/form-data"  novalidate class="needs-validation" autocomplete="off">
                     <div class="row mb-3">
                      <label for="centro-medico-name" class="col-sm-4">Nombres <span class="text-danger">*</span> </label>
                      <div class="col-sm-8">
                        <input name="nombre" type="text" class="form-control" id="centro-medico-name"  required>
						<div class="invalid-feedback">Por favor, introduzca el nombre.</div>
					<div id="duplicateCentro"></div>
                      </div>
                    </div>
<div class="row mb-3 medico-fields">
					<label for="exequatur" class="col-sm-4">Cargar Logo <span class="text-danger">*</span> </label>
					<div class="col-sm-8">

					<input type="file" name="logo" id="file_m_enf" class="file_m_enf form-control"   accept=".png, .jpg, .jpeg" required >
						
					<div class="invalid-feedback">Por favor, cargue el logo.</div>
					
					</div>
					</div>
              <div class="row mb-3">
                      <label for="rnc" class="col-sm-4">RNC</label>
                       <div class="col-sm-4">
                         <input name="rnc" type="text" class="form-control" id="rnc"  >
						
                      </div>
                    </div>
					
					<div class="row mb-3">
					<label for="area" class="col-sm-4">Tipo </label>
					<div class="col-sm-8">

					<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
					<input type="radio" class="btn-check" name="typo" id="btnradio1" autocomplete="off" value="privado" checked>
					<label class="btn btn-outline-secondary" for="btnradio1">Privado</label>

					<input type="radio" class="btn-check" name="typo" id="btnradio2" autocomplete="off" value="publico">
					<label class="btn btn-outline-secondary" for="btnradio2">Público</label>

					<input type="radio" class="btn-check" name="typo" id="btnradio3" autocomplete="off" value="salud ocupacional">
					<label class="btn btn-outline-secondary" for="btnradio3">Salud Ocupacional</label>
					</div>
					</div>
					</div>
					
					
					 <div class="row mb-3">
                      <label for="userEmail" class="col-sm-4">Primer teléfono <span class="text-danger">*</span> </label>
                       <div class="col-sm-4">
                        <input name="primer_tel" type="text" class="form-control" id="primer_tel"  required>
						<div class="invalid-feedback">Por favor, introduzca el primer teléfono.</div>
						
                      </div>
                    </div>
					
					 <div class="row mb-3">
                      <label for="userEmail" class="col-sm-4">Segundo telefono  </label>
                       <div class="col-sm-4">
                      
						  <input name="segundo_tel" type="text" class="form-control" id="segundo_tel"  >
						
                      </div>
                    </div>
					 <div class="row mb-3">
                      <label for="userEmail" class="col-sm-4">Correo electronico </label>
                       <div class="col-sm-5">
                      
						  <input name="email" type="email" class="form-control" id="email"  >
						
                      </div>
                    </div>
					 <div class="row mb-3">
                      <label for="userEmail" class="col-sm-4">Fax </label>
                       <div class="col-sm-4">
                     
						  <input name="fax" type="text" class="form-control" id="fax"  >
						
                      </div>
                    </div>
					
					<div class="row mb-3">
					<label for="area" class="col-sm-4">Especialidades <span class="text-danger">*</span> </label>
					<div class="col-sm-8">
        <input type="checkbox" id="selectAllArea"> Seleccionar todos 
					 <select class="form-select" id="especialidad" name="especialidad[]" multiple="multiple" required>
						 <option value=""></option>
									<?php 
									$queryaR= $this->db->query("SELECT id_ar, title_area FROM areas ORDER BY title_area DESC ");
									$AREAS = $queryaR->result();
                                  foreach ($AREAS as $area)
									{
									echo "<option value='$area->id_ar'>$area->title_area</option>";
									}	

									?>

                            </select>
					<div class="invalid-feedback">Por favor, introduzca la area del médico.</div>
					</div>
					</div>
					
				
						<div class="row mb-3">
					<label for="area" class="col-sm-4">Provincia <span class="text-danger">*</span> </label>
					<div class="col-sm-8">

					 <select class="form-select" id="provincia" name="provincia" required  >
						 <option value=""></option>
								<?php
								$query = $this->model_admin->all_provinces();

								foreach($provinces as $listElement){
								?>
								<option  value="<?php echo $listElement->id?>"><?php echo $listElement->title?></option>
								<?php
								}
								?>

                            </select>
					<div class="invalid-feedback">Por favor, introduzca la provincia.</div>
					</div>
					</div>
					
					
						<div class="row mb-3">
					<label for="area" class="col-sm-4">Municipio <span class="text-danger">*</span> </label>
					<div class="col-sm-8">

					 <select class="form-select" id="municipio_dropdown" name="municipio" required>
						 <option value=""></option>

                            </select>
					<div class="invalid-feedback ">Por favor, introduzca el municipio.</div>
					<div class="municipio_loader"></div>
					
					</div>
					</div>
					
						 <div class="row mb-3">
                      <label for="barrio" class="col-sm-4">Barrio </label>
                       <div class="col-sm-6">
            
						  <input name="barrio" type="text" class="form-control" id="barrio"  >
						
                      </div>
                    </div>
					
						 <div class="row mb-3">
                      <label for="calle" class="col-sm-4">Calle  </label>
                       <div class="col-sm-6">
                      
						  <input name="calle" type="text" class="form-control" id="calle"  >
						
                      </div>
                    </div>
					
						 <div class="row mb-3">
                      <label for="pagina_web" class="col-sm-4">Página Web  </label>
                       <div class="col-sm-6">
                      
						  <input name="pagina_web" type="text" class="form-control" id="pagina_web"  >
						
                      </div>
                    </div>
						<div class="row mb-3 medico-fields">
					<label for="seguro_medico" class="col-sm-4">Seguros Médico <span class="text-danger">*</span>  </label>
					<div class="col-sm-8">
            <input type="checkbox" id="selectAllSeg"> Seleccionar todos
					 <select class="form-select" id="seguro_medico" name="seguro_medico[]" required multiple="multiple">
						 <option value=""></option>
									<?php 
									$queryS= $this->db->query("SELECT id_sm, title FROM seguro_medico ORDER BY title DESC ");
									$SEGUROS = $queryS->result();
                                  foreach ($SEGUROS as $seguro)
									{
									echo "<option value='$seguro->id_sm'>$seguro->title</option>";
									}	

									?>

                            </select>
					<div class="invalid-feedback">Por favor, introduzca los Seguros médico .</div>
					</div>
					</div>
					
					   <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>