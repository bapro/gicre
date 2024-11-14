			<div class="card my-3">
						<?php

						$array_values_for_photo = array(
						'id_p_a' =>$get_patient_info_by_id['id_p_a'],
						'cedula' =>$get_patient_info_by_id['cedula'],
						'image_class' => "",
						'style'=>'width=75'

						);
						?>
                <div class="card-body">
				<input value="<?=$get_patient_info_by_id['id_p_a']?>" id="id_patient_to_save" type="hidden" />
					<button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Datos del Paciente y del Prestador</button>
  <div class="collapse" id="collapseExample">
                    <div class="table-responsive">
                        <table class="table table-sm  table-striped mb-0">
                            <thead>
                                <tr class="bg-th">
                                    <th></th>
                                    <th>Record</th>
                                    <th>Nombres</th>
                                    <th>Cedula</th>
                                    <th>Seguro Medico</th>
                                    <th>Tel</th>
                                    <th>Direccion</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>
                                     <?php echo $this->search_patient_photo->search_patient($array_values_for_photo);?>
                                    </td>
                                    <td><?=$get_patient_info_by_id['id_p_a']?></td>
                                    <td><?=$get_patient_info_by_id['nombre']?></td>
                                    <td><?=$get_patient_info_by_id['cedula']?></td>
                                    <td><?=$get_patient_seguro_info_by_id['title']?></td>
                                    <td><?=$get_patient_info_by_id['tel_cel']?></td>
                                    <td><?=$patient_adress?></td>
                                    <td><?=$get_patient_info_by_id['email']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
				
                  <div class=" px-3 py-3">
					  <div><i class="fa fa-hospital"></i> <b><?=$get_centro_info_by_id['name']?></b></div>
				  
				    <?php 
	if($centro_type_get =='privado') { 
					$is_privado = "";
					?>
				 <div><b>Dr(a)</b> <?=$get_doctor_info_by_id['name']?></div>
				  <div><b>Exequatur </b> <?=$get_doctor_info_by_id['exequatur']?></div>
				   <div><b>Especialidad </b> <?=$doctor_area?></div>
				    <div><b>Codigo contrato </b> <?=$codigo_contrato?></div>
					<?php }  else {
						$is_privado = "style='display:none'";
						
						?>
				
                    <div> <i class="fa fa-phone"></i> <?=$get_centro_info_by_id['primer_tel']?> |
                   <b>RNC</b> <?=$get_centro_info_by_id['rnc']?> |
                    <i class="fa fa-map-marker-alt"></i> <small>  <?php echo $centro_adress ?> </small></div>
					<?php }  ?>
					</div>
					 </div>
					
                </div>
            </div>