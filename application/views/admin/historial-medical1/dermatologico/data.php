<?php foreach($show_derma_by_id as $rows)$user_c34=$this->db->select('name')->where('id_user',$rows->inserted_by)->get('users')->row('name');$user_c35=$this->db->select('name')->where('id_user',$rows->updated_by)->get('users')->row('name');$updated_time=date("d-m-Y H:i:s",strtotime($rows->updated_time));$inserted_time=date("d-m-Y H:i:s",strtotime($rows->inserted_time)); ?><div class="modal-header"id="background_"><button class="close"type="button"aria-hidden="true"data-dismiss="modal"title="Cierra"><i class="fa fa-times-circle"style="font-size:48px;color:red"></i></button><h3 class="modal-title">Dermatologo #<?=$rows->id_derma?></h3><br><h5 class="modal-title">Creado por :<?=$user_c34?>| fecha :<?=$inserted_time?>| <span style="color:red">Cambiado por :<?=$user_c35?>| fecha :<?=$updated_time?></span></h5><?php if($rows->user_id==$id_user||$perfil=="Admin"){ ?><button class="btn-sm btn-success show_modif_derma"type="button"><i class="fa fa-pencil"aria-hidden="true"></i> Editar</button><?php } ?><button class="btn-sm btn-success save_derma_hide"type="button"id="save_derma_hide"style="display:none"><i class="fa fa-floppy-o"aria-hidden="true"></i> Guardar</button> <a class="btn-sm"href="<?php echo base_url('printings/dermatologo/'.$rows->id_derma) ?>"style="cursor:pointer"target="_blank"title="Imprimir Antecedentes General"><i class="fa"style="font-size:24px"></i></a></div><input id="id_derma"type="hidden"value="<?=$rows->id_derma?>"> <input id="updated_by"type="hidden"value="<?=$id_user?>"><div class="disable-all modal-body"style="max-height:calc(120vh - 210px);overflow-y:auto"><table cellspacing="0"class="table"><tr><td class="ida"><div class="form-group"><label class="col-md-2 control-label">Tipografía</label><div class="col-md-9"><select class="form-control select-derma"id="derma_tipoe"style="width:100%"><option><?=$rows->derma_tipo?></option><?php foreach($derma_tipo as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select> <textarea class="form-control"id="derma_tipo_texte"><?=$rows->derma_tipo_text?></textarea></div></div></td></tr><tr><td class="ida"><div class="form-group"><label class="col-md-2 control-label">Morfología</label><div class="col-md-9"><select class="form-control select-derma"id="derma_morfologiae"style="width:100%"><option><?=$rows->derma_morfologia?></option><option>aspecto mono o polimoris</option><optgroup label="enumeracíon de los elementos"><option>numero</option><option>tamaño</option><option>forma</option><option>modo de agrupacíon</option><option>color</option><option>borde</option><option>aspecto</option><option>huellas</option></optgroup></select> <textarea class="form-control"id="derma_morfologia_texte"><?=$rows->derma_morfologia_text?></textarea></div></div></td></tr><tr><td class="ida"><div class="form-group"><label class="col-md-2 control-label">Resto de la piel y anexos</label><div class="col-md-9"><select class="form-control select-derma"id="derma_restoe"style="width:100%"><option><?=$rows->derma_resto?></option><option>Pelo</option><option>Cejas</option><option>Pestañas</option><option>Uñas</option><option>Mucosas</option><option>Ganglios</option></select> <textarea class="form-control"id="derma_resto_texte"><?=$rows->derma_resto_text?></textarea></div></div></td></tr><tr><td class="ida"><div class="form-group"><label class="col-md-2 control-label">Interrogatorio</label><div class="col-md-9"><select class="form-control select-derma"id="derma_interoe"style="width:100%"><option><?=$rows->derma_intero?></option><?php foreach($derma_interog as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select> <textarea class="form-control"id="derma_intero_texte"><?=$rows->derma_intero_text?></textarea></div></div></td></tr><tr><td class="ida"><div class="form-group"><label class="col-md-2 control-label">Otros Datos</label><div class="col-md-9"><select class="form-control select-derma"id="derma_otros_datose"style="width:100%"><option><?=$rows->derma_otros_datos?></option><option>Comprobación por el primer consultante de enfermedades</option><option>Resultados de laboratorio y circunstancias importantes</option></select> <textarea class="form-control"id="derma_otros_datos_texte"><?=$rows->derma_otros_datos_text?></textarea></div></div></td></tr><tr><td class="ida"><div class="form-group"><label class="col-md-2 control-label">Diagnostico Dermatologico Inicial</label><div class="col-md-9"><select class="form-control select-derma"id="derma_diagno_der_inie"style="width:100%"><option><?=$rows->derma_diagno_der_ini?></option></select></div></div></td></tr></table></div>

