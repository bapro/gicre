<div class="row"><div class="col-md-2 col-sm-3 sidebar"style="background:#fff"><br><ul class="nav nav-sidebar"><?php foreach($patient as $row)$infomore=$this->db->select('inserted_by,update_time,created_time,update_time,update_by')->where('id_patient',$row->id_p_a)->get('rendez_vous')->row_array();if(preg_match('/GINECOLOGIA/',$area)&&($row->sexo=='Masculino'&&$row->edad>'16 año(s)')){ ?><li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li><li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">⇒ General</a></li><hr class="hr_ad"><li><a class="show-all-btn-when tab-enf-act"data-toggle="tab"href="#Enfermedad_Actual">II- Enfermedad Actual</a></li><li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Rehabilitacion">⇒ Rehabilitacion</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#examen-fisico">⇒ Fisico</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#oftalmologia">⇒ Oftalmologia</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Del_Sistema">⇒ Del Sistema</a></li><hr class="hr_ad"><li><a class="show-all-btn-when tab-con-diag"data-toggle="tab"href="#conclusion">IV- Conclusion Diagnóstica</a></li><li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li><?php }elseif(preg_match('/GINECOLOGIA/',$area)&&($row->sexo=='Masculino'&&$row->edad<='16 año(s)')){ ?><li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li><li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">⇒ General</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Pediatrico">⇒ Pediatrico</a></li><li><a class="show-all-btn-when tab-enf-act"data-toggle="tab"href="#Enfermedad_Actual">II- Enfermedad Actual</a></li><li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Rehabilitacion">⇒ Rehabilitacion</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#examen-fisico">⇒ Fisico</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#oftalmologia">⇒ Oftalmologia</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Del_Sistema">⇒ Del Sistema</a></li><li><a class="show-all-btn-when tab-con-diag"data-toggle="tab"href="#conclusion">IV- Conclusion Diagnóstica</a></li><li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li><?php }elseif(preg_match('/GINECOLOGIA/',$area)&&($row->sexo=='Feminino'||$row->sexo=='Feminina')){ ?><li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li><li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">⇒ General</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#SSR">⇒ SSR</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Obstetrico">⇒ Obstetrico</a></li><li><a class="show-all-btn-when tab-enf-act"data-toggle="tab"href="#Enfermedad_Actual">II- Enfermedad Actual</a></li><li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#examen-fisico">⇒ Fisico</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Del_Sistema">⇒ Del Sistema</a></li><li><a class="show-all-btn-when tab-con-diag"data-toggle="tab"href="#conclusion">⇒ Conclusion Diagnóstica</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#control_prenatal">⇒ Control Prenatal</a></li><li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li><?php }elseif($area=="MEDICINA FISICA Y REHABILITACION"){ ?><li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li><li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">⇒ General</a></li><li><a class="show-all-btn-when tab-enf-act"data-toggle="tab"href="#Enfermedad_Actual">II- Enfermedad Actual</a></li><li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Rehabilitacion">⇒ Rehabilitacion</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#examen-fisico">⇒ Fisico</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Del_Sistema">⇒ Del Sistema</a></li><hr class="hr_ad"><li><a class="show-all-btn-when tab-con-diag"data-toggle="tab"href="#conclusion">⇒ Conclusion Diagnóstica</a></li><li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li><?php }elseif($area=="OFTALMOLOGIA"){ ?><li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li><li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">⇒ General</a></li><li><a class="show-all-btn-when tab-enf-act"data-toggle="tab"href="#Enfermedad_Actual">II- Enfermedad Actual</a></li><li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#oftalmologia">⇒ Oftalmologia</a></li><li><a class=""data-toggle="modal"href="<?php echo base_url("admin_medico/oftalRef/$id_historial/$user_id/$centro_medico") ?>"data-target="#of-ref-mdl">⇒ Refracción</a><li><a class="show-all-btn-when tab-con-diag"data-toggle="tab"href="#conclusion">⇒ Conclusion Diagnóstica</a></li><li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li><?php }elseif($area=="PEDIATRIA"){ ?><li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li><li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">⇒ General</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Pediatrico"id="pediat_show_btn">II- Pediatrico</a></li><li><a class="show-all-btn-when tab-enf-act"data-toggle="tab"href="#Enfermedad_Actual"id="enfact_show_btn">III- Enfermedad Actual</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#examen-fisico">IV- Fisico</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Del_Sistema">V- Del Sistema</a></li><li><a class="show-all-btn-when tab-con-diag"data-toggle="tab"href="#conclusion">VI- Conclusion Diagnóstica</a></li><li><a class="this-is-a-title"><strong>VII- INDICACIONES</strong></a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li><?php }elseif($area=="DERMATOLOGO"){ ?><li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li><li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">⇒ General</a></li><li><a class="show-all-btn-when tab-enf-act"data-toggle="tab"href="#Enfermedad_Actual"id="enfact_show_btn">III- Enfermedad Actual</a></li><li><a data-toggle="tab"href="#Del_Dermatologico">V- Dermatologo</a></li><li><a class="show-all-btn-when tab-con-diag"data-toggle="tab"href="#conclusion">VI- Conclusion Diagnóstica</a></li><li><a class="this-is-a-title"><strong>VII- INDICACIONES</strong></a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li><?php }else{ ?><li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li><li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">⇒ General</a></li><li><a class="show-all-btn-when tab-enf-act"data-toggle="tab"href="#Enfermedad_Actual"><strong>II- Enfermedad Actual</strong></a></li><li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#examen-fisico">⇒ Fisico</a></li><li><a class="show-all-btn-when"data-toggle="tab"href="#Del_Sistema">⇒ Del Sistema</a></li><li><a class="show-all-btn-when tab-con-diag"data-toggle="tab"href="#conclusion"><strong>IV- Conclusion Diagnóstica</strong></a></li><li><a class="this-is-a-title"><strong>V- INDICACIONES</strong></a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li><li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li><?php } ?></ul></div></div><div class="fade modal"id="of-ref-mdl"role="dialog"tabindex="-1"><div class="modal-dialog modal-md"><div class="modal-content"></div></div></div><script>$("#of-ref-mdl").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")})</script>