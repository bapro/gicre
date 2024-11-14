<?php $sexoOptions = array("Masculino", "Femenina", "Otros");

?>

<div class="col-md-6">
                            <label class="form-label" >Nombres <span class="text-danger">*</span></label>
                            <input type="text" class="form-control  required-before-leave" placeholder="Nomres Apellidos"  name="nombre" class="form-control " id="nombre" value="<?php echo $nombre; ?>" required>
                        <div class="invalid-feedback">Por favor, introduzca los nombres el paciente.</div>
						<div id="nombres_duplicado"></div>
						</div>
                        
                        <div class="col-md-6">
                            <label for="formFile" class="form-label">Subir la foto del paciente</label>
                            <input class="form-control" type="file" id="formFile" name="picture">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cédula/Pasaporte</label>
                            <input type="text" class="form-control required-before-leave" placeholder="00000000000" name="cedula" id="cedula" value="<?=$cedula?>">
							<div id="cedula_info"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fecha de nacimiento <span class="text-danger">*</span></label>
							  <input type="date" class="form-control required-before-leave"  name="date_nacer" id="date_nacer" value="<?php echo $date_nacer; ?>" required>
							  <div class="invalid-feedback">Cual es la fecha de nacimiento del paciente?</div>
                        </div>
						<div class="col-md-6">
                            <label class="form-label">Sexo <span class="text-danger">*</span></label>
                            <select class="form-select required-before-leave" id="sexo" name="sexo" required>
							<option value=""></option>
                               <?php 
								foreach($sexoOptions as $sexoOption){
								if($sexo==$sexoOption) {
								$selected="selected";
								}else{
								$selected=""; 
								}
								echo "<option $selected>$sexoOption</option>"; 
								}

								?>
                               
                            </select>
							<div class="invalid-feedback">Cual es el sexo del paciente ?</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Edad</label>
                            <input type="text" class="form-control" readonly placeholder="0 mes(es)" name="age" id="age" value="<?=$edad?>">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Teléfono celular <span class="text-danger">*</span></label>
                            <input type="text" class="form-control bfh-phone required-before-leave" id="form_phonecel" name="tel_cel" value="<?php echo $tel_cel; ?>" required>
							<div class="invalid-feedback">Cual es el Teléfono celular ?</div>
                        </div>
                       
                     
                        <div class="col-md-6">
                            <label class="form-label">Nacionalidad <span class="text-danger">*</span></label>
							<select class="form-select required select2 required-before-leave" id="nacionalidad" name="nacionalidad" style="width:100%" required>
							<option><?php echo $nacionalidad;?></option>
							<?php foreach($countries as $row) {
							echo '<option value="'.$row->short_name.'">'.$row->short_name.'</option>';
							}

							?>
							</select>
                            <div class="invalid-feedback">Cual es la nacionalidad del paciente ?</div>
                        </div>
                        <div class="col-md-6">
						
					  <label class="form-label">Provincia</label>
					  <?php 
					  
                          if($where_patient_from=='padron'){
							  echo $padron_provincia;
							  echo "<input id='provincia' name='provincia' type='hidden' value='0' />";
						  } else {
						?>
                           <select class="form-select select2 required-before-leave" id="provincia" name="provincia" style="width:100%" required>
							<?php
							foreach($provinces as $pro){

							if($provincia == $pro->id) {
							echo "<option value=".$pro->id." selected>".$pro->title."</option>";
							} else {
							echo "<option></option>";
							echo "<option value=".$pro->id.">".$pro->title."</option>";
							}
							}
							?>
							</select>
						  <?php }  ?>
							<div class="invalid-feedback">De que provincia viene el paciente?</div>
                        </div>
						 
                        <div class="col-md-6">
                            <label class="form-label">Seguro médico <span class="text-danger">*</span></label>
                            <select class="form-select required select2 required-before-leave" id="seguro_medico" name="seguro_medico" style="width:100%" required>
								<?php
								echo "<option value=''></option>";
								foreach($seguro_medico as $seg){

								if($seguro_medico_id == $seg->id_sm) {
								echo "<option value=".$seg->id_sm." selected>".$seg->title."</option>";
								} else {
									
								echo "<option value=".$seg->id_sm.">".$seg->title."</option>";
								}
								}
								?>
                            </select>
							<div class="invalid-feedback">Cual es el seguro médico del paciente, si no tiene elige PRIVADO?</div>
							 <div id="display_seguro_data"></div>
						 </div>
                       