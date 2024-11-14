		 <div class="row g-3">
													<div class="col-md-6">
						<label class="form-label">Apodo</label>
						<input type="text" class="form-control" placeholder="Apodo" name="apodo" class="form-control" value="<?php echo $apodo; ?>">
						</div>
						
						
						 <div class="col-md-6">
                            <label class="form-label">Teléfono residencial</label>
                            <input type="text" class="form-control" name="tel_resi"  id="form_phoneres" value="<?php echo $tel_resi; ?>">
                        </div>
						
						
				
						   <div class="col-md-6">
                            <label class="form-label">Estado Civil</label>
                            <select class="form-select"  id="estado_civil" name="estado_civil" >
                                <option><?php echo $estado_civil;?></option>
                                <option>Soltero</option>
                                <option>Casado</option>
                                <option>Divorciado</option>
                                <option>Union libre</option>
                                <option>Viudo</option>
                                <option>No aplicado</option>
                            </select>
							<div class="invalid-feedback">Cual es el Estado civil del paciente ?</div>
                        </div>
						
						
						<div class="col-md-6">
                            <label class="form-label">Barrio</label>
                            <input type="text" class="form-control" id="barrio" name="barrio" value="<?=$barrio?>">
                        </div>
                      
                       
                        <div class="col-md-6">
                            <label class="form-label">Calle</label>
                            <input type="text" class="form-control" id="calle" name="calle" value="<?=$calle?>">
                        </div>
						
						
						  <div class="col-md-6">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="email"  id="emailtest" value="<?=$email?>">
							<div class="invalid-feedback">Correo electrónico no está válido</div>
                        </div>
						</div>
                   

                    <div class="row g-3 mt-3">
						 <h2 class="title-header" style="font-weight: 600;">Contactos de emergencia</h2>
					 <div class="col-md-6">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="contacto_em_nombre" name="contacto_em_nombre" value="<?=$contacto_em_nombre?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Parentesco</label>
                            <input type="text" class="form-control" id="contacto_em_cel" name="contacto_em_cel" value="<?=$contacto_em_cel?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telefono 1</label>
                            <input type="text" class="form-control" id="contacto_em_tel1" name="contacto_em_tel1" value="<?=$contacto_em_tel1?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telefono 2</label>
                            <input type="text" class="form-control" name="contacto_em_tel2" id="contacto_em_tel2" value="<?=$contacto_em_tel2?>">
                        </div>
                    </div>