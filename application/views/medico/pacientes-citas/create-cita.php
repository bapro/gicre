<div class="col-md-12">
    <div id="patientHint"></div>
</div>
<div class="col-md-12" id="hide_patientf">
    <div class="col-md-12" id="hide_form" style="background:linear-gradient(to right,#fff,#e0e5e6,#fff);border:1px solid #38a7bb">
        <h1 class="h1 hide_crear_nueva_cita">Crear Nueva Cita</h1><?=$this->session->flashdata('error_messages')?><?php echo validation_errors();
?>
        <hr id="hr_ad">
        <div id="show_patient_by_cedula"></div><span id="hide_form1"><?php if($is_admin=="yes") {
    $controller="admin";
}

else {
    $controller="medico";
}

?><form action="<?php echo site_url("$controller/create_cita_"); ?>" class="form-horizontal" enctype="multipart/form-data" id="sendcita" method="post"><input name="controllername" value="<?=$controller?>" type="hidden"><input name="creadted_by" value="<?=$name?>" type="hidden"><input name="id_user" id="id_user" value="<?=$id_user?>" type="hidden">
                <div class="tab-content" style="margin-left:6%">
                    <div class="cita-border" id="Datos_personales">
                        <h4 class="cita-title">I- DATOS PERSONALES</h4>
                        <div class="form-group"><label class="col-sm-3 control-label"><span class="req">* </span>Nombres</label>
                            <div class="col-sm-6 nom"><input name="nombre" class="form-control required" id="nombre" value="<?php echo set_value('nombre'); ?>" placeholder="Nomres Apellidos"></div>
                            <div class="col-sm-12 table-responsive" id="nombre_info"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Apodo</label>
                            <div class="col-sm-6 nom"><input name="apodo" class="form-control" value="<?php echo set_value('apodo'); ?>" placeholder="Apodo"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Subir la foto del paciente</label>
                            <div class="col-sm-6"><input name="picture" class="file" id="picture" onchange="get_detail()" type="file"><span id="divFiles" style="color:red"></span><input name="photo_location" class="photo_location" value="0" type="hidden"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Cedula/Pasaporte</label>
                            <div class="col-sm-3"><input name="cedula" id="cedula" class="form-control" id="cedula" placeholder="00000000000" data-mask="00000000000"></div>
                            <div id="cedula_info"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label"><span class="req">*</span>Fecha nacimiento</label>
                            <div class="col-sm-3">
                                <p id="incorect_age" style="display:none;background:#fff;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
                                <div class="date input-group" id="dateOfBirth"><input name="date_nacer" class="form-control required" id="date_nacer" value="<?php echo set_value('date_nacer'); ?>"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div><input name="date_nacer_format" id="mirror_field" value="2010-01-01" type="hidden">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Edad</label>
                            <div class="col-sm-3"><input name="age" class="form-control" id="age" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label"><span class="req">*</span>Sexo</label>
                            <div class="col-sm-3"><select class="form-control required select2" id="sexo" name="sexo">
                                    <option><?php echo set_value('sexo');
?></option>
                                    <option>Masculino</option>
                                    <option>Femenina</option>
                                </select></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label"><span class="req">*</span>Teléfono celular</label>
                            <div class="col-sm-3"><input name="tel_cel" class="form-control required bfh-phone" id="form_phonecel" value="<?php echo set_value('tel_cel'); ?>"></div>
                            <div id="phone_info"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Teléfono residencial</label>
                            <div class="col-sm-3"><input name="tel_resi" class="form-control" id="form_phoneres"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label"><span class="req">*</span>Estado Civil</label>
                            <div class="col-sm-3"><select class="form-control required select2" id="estado_civil" name="estado_civil">
                                    <option><?php echo set_value('estado_civil');
?></option>
                                    <option>Soltero</option>
                                    <option>Casado</option>
                                    <option>Divorciado</option>
                                    <option>Union libre</option>
                                    <option>Viudo</option>
                                    <option>No aplicado</option>
                                </select></div>
                        </div>
                        <div class="form-group nat"><label class="col-sm-3 control-label"><span class="req">*</span>Nacianalidad</label>
                            <div class="col-sm-4 na"><select class="form-control required select2" id="nacionalidad" name="nacionalidad" style="width:100%">
                                    <option><?php echo set_value('nacionalidad');
?></option><?php foreach($countries as $row) {
    echo '<option value="'.$row->short_name.'">'.$row->short_name.'</option>';
}

?>
                                </select></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Provincia</label>
                            <div class="col-sm-4 pro"><select class="form-control select2" id="provincia" name="provincia" style="width:100%" onchange="getMun(this.value)">
                                    <option></option><?php foreach($provinces as $listElement) {
    ?><option value="<?php echo $listElement->id ?>"><?php echo $listElement->title ?></option><?php
}

?>
                                </select>
                                <div id="load-time-provincia"></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Municipio</label>
                            <div class="col-sm-4"><select class="form-control select2" id="municipio_dropdown" name="municipio" disabled></select></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Barrio</label>
                            <div class="col-sm-4"><input id="barrio" name="barrio" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Calle</label>
                            <div class="col-sm-4"><input id="calle" name="calle" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label"><span class="req">*</span>Seguro médico</label>
                            <div class="col-sm-3 seg"><select class="form-control required select2" id="seguro_medico" name="seguro_medico" style="width:100%">
                                    <option></option><?php foreach($seguro_medico as $row) {
    echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}

?>
                                </select>
                                <div id="load-time-seguro"></div>
                            </div>
                        </div>
                        <div id="seguro_input"></div>
                        <div class="form-group"><label class="col-sm-3 control-label">Frecuencia</label>
                            <div class="col-sm-6"><label class="radio-inline"><input name="frecuencia" value="Primera vez" type="radio" checked>Primera vez</label></div>
                        </div>
                        <div class="form-group"><span id="incorectemail" style="color:red;font-style:italic;font-size:15px"></span><label class="col-sm-3 control-label">Correo electrónico</label>
                            <div class="col-sm-6"><input name="email" class="form-control" id="emailtest"></div>
                        </div>
                    </div>
                    <div class="cita-border" id="Contactos_de_emergencia"><br>
                        <h4>II- CONTACTOS DE EMERGENCIA</h4>
                        <div class="form-group"><label class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-6"><input id="contacto_em_nombre" name="contacto_em_nombre" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Parentesco</label>
                            <div class="col-sm-6"><input id="contacto_em_cel" name="contacto_em_cel" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Telefono 1</label>
                            <div class="col-sm-3"><input id="contacto_em_tel1" name="contacto_em_tel1" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Telefono 2</label>
                            <div class="col-sm-3"><input name="contacto_em_tel2" id="contacto_em_tel2" class="form-control"></div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" class="show-btn-cita" data-toggle="tab">CREAR CITA</a></li>
                        <li title="Si desea facturar sin realizar citas use esta opción"><a href="#menu1" class="show-btn-fac-amb" data-toggle="tab">CREAR FACTURA AMBULATORIA</a></li>
                        <li><a href="#emergencia" class="show-btn-emergencia" data-toggle="tab" style="color:red">EMERGENCIA</a></li>
                        <li><a class="show-btn-hospitalizacion" data-toggle="tab" href="#hospitalizacion">HOSPITALIZACION</a></li>
                    </ul><br>
                    <div class="cita-border fade in tab-pane active" id="home">
                        <h4>III- DATOS CITAS</h4>
                        <div class="form-group"><label class="col-sm-3 control-label">Causa</label>
                            <div class="col-sm-6 cau"><input class="form-control  required" name="causa" id="causa-title0" /></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Centro medico</label>
                            <div class="centrom col-sm-5"><select class="form-control select2" id="centro_medico" name="centro_medico" style="width:100%">
                                    <option value="" hidden></option><?php foreach($centro_medico as $row) {
    echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}

?>
                                </select>
                                <div id="load-time"></div>
                            </div>
                        </div><?php if($perfil=="Medico") {
    $area=$this->db->select('area')->where('id_user', $id_user)->get('users')->row('area');
    echo"<input name='especialidad' type='hidden' value='$area'/>";
    echo"<input name='doctor' id='doctor_dropdown' type='hidden' value='$id_user'/>";
}

else {
    ?><div class="form-group"><label class="col-sm-3 control-label">Especialidad</label>
                            <div class="col-sm-4 esp"><select class="form-control required select2" id="especialidad" name="especialidad" style="width:100%" disabled onchange="getDoc(this.value)"></select></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Doctor</label>
                            <div class="col-sm-6"><select class="form-control required select2" id="doctor_dropdown" name="doctor" style="width:100%" disabled></select></div>
                        </div><?php
}

?><div class="form-group"><label class="col-sm-3 control-label"><span class="req">*</span>Fecha Propuesta</label>
                            <div class="col-sm-3">
                                <div class="date input-group" id="fechaPro"><input name="fecha_propuesta" class="form-control required" id="fecha_propuesta1" disabled><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div><input name="fecha_filter" id="weekday" type="hidden">
                            </div>
                            <div class="col-md-offset-3 col-sm-7">
                                <p id="horario-info"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><button class="btn btn-primary btn-sm enable-send btnSendCita" style="float:right" type="submit" id="sendc" disabled><i aria-hidden="true" class="fa fa-floppy-o"></i>Guardar</button></div>
                        </div>
                    </div>
                    <div class="cita-border fade in tab-pane" id="menu1">
                        <h4>IV- DATOS FACTURA</h4>
                        <div class="form-group"><label class="col-sm-3 control-label">Centro medico</label>
                            <div class="centrom col-sm-5"><select class="form-control required select2" id="factura-centro" name="factura-centro" style="width:100%">
                                    <option value="" hidden></option><?php foreach($centro_medico as $row) {
    echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}

?>
                                </select>
                                <div id="load-time"></div>
                            </div>
                        </div><?php if($perfil=="Medico") {
    $area=$this->db->select('area')->where('id_user', $id_user)->get('users')->row('area');
    echo"<input name='factura-esp' type='hidden' value='$area'/>";
    echo"<input name='facturar-doc'  type='hidden' value='$id_user'/>";
}

else {
    ?><div class="form-group"><label class="col-sm-3 control-label">Especialidad</label>
                            <div class="col-sm-4 esp"><select class="form-control required select2" id="factura-esp" name="factura-esp" style="width:100%" disabled onchange="getDocFac(this.value)"></select></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Doctor</label>
                            <div class="col-sm-6"><select class="form-control required select2" id="facturar-doc" name="facturar-doc" style="width:100%" disabled></select></div>
                            <div id="load-fac-div"></div>
                        </div><?php
}

?><div class="form-group">
                            <div class="col-sm-3"><button class="btn btn-primary btn-sm enable-send" style="float:right" type="submit"><i aria-hidden="true" class="fa fa-floppy-o"></i>Guardar</button></div>
                        </div>
                    </div>
                    <div class="cita-border fade in tab-pane" id="emergencia">
                        <h4>III- DATOS DE LA ADMISION</h4>
                        <div class="form-group"><label class="col-sm-3 control-label">Centro medico</label>
                            <div class="centrom col-sm-5"><select class="form-control required select2" id="emergencia-centro" name="emergencia-centro" style="width:100%">
                                    <option value="" hidden></option><?php foreach($centro_medico as $row) {
    echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}

?>
                                </select>
                                <div id="load-time"></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Causa</label>
                            <div class="col-sm-6 cau"><input class="form-control  required" name="em_name" id="causa-title2" /></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Paciente Referido Por</label>
                            <div class="col-sm-4 centrom"><select class="form-control required emergencia" id="paciente_referido" name="paciente_referido">
                                    <option value=""></option><?php foreach($queryrp->result()as $row) {
    echo"<option  value='$row->id_em_c'>$row->em_name</option>";
}

?>
                                </select>
                                <div id="load-time"></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Medio De Llegado</label>
                            <div class="col-sm-4"><select class="form-control required emergencia" id="medio_llegado" name="medio_llegado">
                                    <option value=""></option><?php foreach($queryml->result()as $row) {
    echo"<option  value='$row->id_em_c'>$row->em_name</option>";
}

?>
                                </select></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Enviado A</label>
                            <div class="col-sm-4"><select class="form-control required select2" id="enviado_a" name="enviado_a">
                                    <option value=""></option>
                                    <option value="1">Triaje</option>
                                    <option value="2">Emergencia General</option>
                                    <option value="3">Emergencia Pediatría</option>
                                    <option value="4">Quirofano</option>
                                    <option value="5">Emergencia Obstétrica Y Ginecología</option>
                                    <option value="6">Reanimación</option>
                                </select></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Estado De Paciente</label>
                            <div class="col-sm-4"><select class="form-control required emergencia" id="estado_paciente" name="estado_paciente">
                                    <option value=""></option><?php foreach($queryep->result()as $row) {
    echo"<option  value='$row->id_em_c'>$row->em_name</option>";
}

?>
                                </select></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><button class="btn btn-primary btn-sm enable-send" style="float:right" type="submit"><i aria-hidden="true" class="fa fa-floppy-o"></i>Guardar</button></div>
                        </div>
                    </div>
                    <div class="cita-border fade in tab-pane" id="hospitalizacion">
                        <h4>IV- DATOS DE LA HOSPITALIZACION</h4>
                        <div id="loadHospForm"></div>
                        <div class="form-group">
                            <div class="col-sm-3"><button class="btn btn-primary btn-sm enable-send" style="float:right" type="submit"><i aria-hidden="true" class="fa fa-floppy-o"></i>Guardar</button></div>
                        </div>
                    </div><a href="#" id=""><i aria-hidden="true" class="fa fa-arrow-up"></i></a><br><br><br><br><input name="controller" value="<?=$controller?>" type="hidden"><input name="orientation" id="orientation" value="0" type="hidden">
            </form></span>
    </div>
</div>
</div>
</div><br><br><?php $this->load->view('footer');
?><script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="<?=base_url()?>assets/js/links_select.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?=base_url()?>assets/js/validation-jq.js" charset="UTF-8" type="text/javascript"></script>
<script src="<?=base_url();?>assets/js/autocomplete.js"></script>
<script>
    function loadHospForm() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('searchAutoComplete/loadHospForm');?>",
            data: {
                required: $("#isSeguroTitle").val(),
                id_user: "<?=$id_user?>",
                titleId: 3
            },
            success: function(o) {
                $("#loadHospForm").html(o)
            }
        })
    }

    loadHospForm();
    moment.locale("es");
    var timerc = null;

    function usuario_ced() {
        var e = $("#cedula").val();
        "" == e ? $("#cedula_info").hide() : $.get("<?php echo base_url(); ?>admin_medico/check_if_cedula_exist?cedula=" + e, function(e) {
            $("#cedula_info").html(e), $("#cedula_info").show()
        })
    }

    $("#cedula").keyup(function() {
                clearTimeout(timerc), timerc = setTimeout(usuario_ced, 2e3)
            }

        ),
        $("#nombre").keyup(function() {
                var e = $(this).val();
                "" == e ? $("#nombre_info").hide() : $.get("<?php echo base_url(); ?>admin_medico/check_if_patient_exist?nombre=" + e, function(e) {
                    $("#nombre_info").html(e), $("#nombre_info").show()
                })
            }

        );
    var timer = null;

    function usuario_terco(e) {
        var i = $("#nombre").val(),
            n = $("#date_nacer").val();
        "" == e ? $("#phone_info").hide() : $.get("<?php echo base_url(); ?>admin_medico/usuario_terco?tel_cel=" + e + "&nombre=" + i + "&date_nacer=" + n, function(e) {
            $("#phone_info").html(e), $("#phone_info").show()
        })
    }

    $("#form_phonecel").keyup(function() {
            var e = $(this).val();
            clearTimeout(timer), timer = setTimeout(usuario_terco(e), 2e3)
        }

    )
</script>