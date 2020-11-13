 <style>
 #hideda input[type="text"] {
background:#DBE5E4
}
#hidedb input[type="text"] {
background:#DBE5E4
}

#hidedc input[type="text"] {
background:#DBE5E4
}
 </style>
 <div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" > <!-- required for floating -->
 <!-- required for floating -->
<!-- Nav tabs -->
<ul  class="nav nav-pills nav-stacked hide-next-data-patient">
<li class="addb" ><a href="#Datos_personales"  data-toggle="tab" >I- DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li><a class="addb" href="#Contactos_de_emergencia" data-toggle="tab">II- CONTACTOS DE EMERGENCIA</a></li>
<li><a class="addb" href="#En_case_de_menores_de_edad" data-toggle="tab">III- EN CASE DE MENORES EDAD</a></li>
<li class="active"><a class="remb" href="#Datos_citas" data-toggle="tab">IV- DATOS CITAS (<?=$number_cita?>)<i class="fa fa-arrow-left datoscitas" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
</ul>
<!--
<hr class="rem-hr" id="hr_ad"/>
<img class="img-responsive" style="" src="<?= base_url();?>assets/img/user.png">
 <br/><br/>
 --> 
</div>

<?php
foreach($patient as $row)

$infomore=$this->db->select('inserted_by,update_time,created_time,update_time,update_by')->
 where('id_patient',$row->id_p_a )
->get('rendez_vous')->row_array();
		 setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($infomore['created_time'])));	
$update_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($infomore['update_time'])));	
 
?>
<form  class="form-horizontal " method="post" action="<?php echo site_url('admin/saveUpdatePatient');?>"  > 

<div class="col-md-9" id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<span id="suc"><?php echo $this->session->flashdata('save_patient_success'); ?></span>
<h3 class="h3">Paciente <!--<span style="font-size:12px;float:right;font-weight:normal;color:green">Ingresado por <?=$infomore['inserted_by']?>, <?=$insert_date?> || Modificado por <?=$infomore['update_by']?>, <?=$update_date?></span>--></h3> 
<span class="missingc" style="display:none;color:red">La pestaña <b>DATOS CITAS</b> tiene campos obligatorios.</span>
<span class="missingdp" style="display:none;color:red">La pestaña <b>DATOS PERSONALES</b> tiene campos obligatorios.</span>

<h4 class="h4">
 Nombres : <span style="text-transform:uppercase"><?=$row->nombre?></span>  || Cedula : <?=$row->cedula?>
<span class="hide-all-but" style="display:none">
 <a  style="float:right;" class="btn btn-primary btn-sm click-editar" ><i class="fa fa-pencil" aria-hidden="true" title="Editar <?=$row->nombre?>" ></i> Editar </a>
<button type="submit" id="sendc"  style="float:right;display:none" class="btn btn-success btn-sm save-patient" ><i class="fa fa-floppy-o" aria-hidden="true" title="Guardar  <?=$row->nombre?>" ></i> Guardar</button>
</span>
</h4>

<hr id="hr_ad"/>

<input type="hidden" name="id_p_a" value="<?=$row->id_p_a?>">
<div class="tab-content" id="all_dis"  style="margin-left:6%" >
<div class="tab-pane" id="Datos_personales"> 
<div id="showd" style="display:none"> 
<div class="form-group">
<label class="control-label col-sm-3"> Nombres</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="nombre" name="nombre" value="<?=$row->nombre?>"  placeholder="Nombres Apellidos" >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$row->cedula?>" placeholder="00000000000" data-mask="00000000000"   ></div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input  type="text" class="form-control"  name="alias" value="<?=$row->alias?>"   >

</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-3'>Fecha nacimento</label>
<div class="col-sm-7" >
<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<p id="incorect_age1" style="display:none;background:white;color:red;font-size:15px"><i>Si esta nacido en este año, seleccionne : Nacimiento en este año </i></p>
<div class="input-group date form_datetime col-md-8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control" onchange="display_age()" id="date_nacer" name="date_nacer" value="<?=$row->date_nacer?>" readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

</div>
<input type="hidden" name="fecha_filter" id="mirror_field"   />

</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-3'>Edad</label>
<div class='col-sm-2'>
<input  type='text' class='form-control' id="age" name="age" value="<?=$row->edad?>" readonly >
 </div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Frecuencia</label>
<div class="col-sm-6">

<div class="radio">
<?php
if($row->frecuencia=="Primera vez"){
	$checked="checked";
}
else{
	$checked="";
}
?>
<label>
<input type="radio" name="frecuencia" value="Primera vez" <?=$checked?>>
Primera vez
</label>
</div>
<div class="radio">
<?php
if($row->frecuencia=="Subsecuente"){
	$checked1="checked";
}
else{
	$checked1="";
}
?>
<label>
<input type="radio" name="frecuencia" value="Subsecuente" <?=$checked1?>>
Subsecuente
</label>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Teléfono celular </label>
<div class="col-sm-6">						
<input  type="text" id="form_phonecel" class="form-control bfh-phone" name="tel_cel" value="<?=$row->tel_cel?>"   >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="tel_resi" value="<?=$row->tel_resi?>"   >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="emailtest" name="email" value="<?=$row->email?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Sexo</label>
<div class="col-sm-3">
<select class="form-control select2" name="sexo" id="sexo" >
<option hidden><?=$row->sexo?></option>
<option >Masculino</option>
<option >Femenino</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Estado Civil</label>
<div class="col-sm-3">
<select class="form-control select2" name="estado_civil" id="estado_civil">
<option hidden><?=$row->estado_civil?></option>
<option>Soltero</option>
<option>Casado</option>
<option>Divorciado</option>
<option>Union libre</option>
<option>Viudo</option>
<option>Menor</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Nacianalidad</label>
<div class="col-sm-6 na">
<select class="form-control select2"  id="nacionalidad" name="nacionalidad">
<?php
foreach($countries as $co){
	
	if($row->nacionalidad == $co->id) {
		echo "<option value=".$co->short_name." selected >".$co->short_name."</option>";
	} else {
		echo "<option value=".$co->short_name.">".$co->short_name."</option>";
	}
}
?>
 </select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Seguro médico</label>
<div class="col-sm-5 seg">
<select class="form-control select2"  id="seguro_medico" name="seguro_medico">
<?php
foreach($seguro_medico as $seg){
	
	if($row->seguro_medico == $seg->id_sm) {
		echo "<option value=".$seg->id_sm." selected>".$seg->title."</option>";
	} else {
		echo "<option value=".$seg->id_sm.">".$seg->title."</option>";
	}
}
?>
 </select>

<span id="flash1"></span>

</div>

</div>
<div class="seguro_input"></div>
<div id="seguro_input"></div>
<div class="form-group">
<label  class="control-label col-sm-3">Tipo de afiliado</label>
<div class="col-sm-3">
<select class="form-control select2" name="afiliado" id="afiliado">
<option hidden><?=$row->afiliado?></option>
<option>Titular</option>
<option>Depediente</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5 pro">
<select class="form-control select2"  id="provincia" name="provincia" >
<?php
foreach($provinces as $pro){
	
	if($row->provincia == $pro->id) {
		echo "<option value=".$pro->id." selected>".$pro->title."</option>";
	} else {
		echo "<option value=".$pro->id.">".$pro->title."</option>";
	}
}
?>
 </select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Municipio</label>
<div class="col-sm-4">

<select class="form-control select2" name="municipio" id="municipio_dropdown"  >

<?php
foreach($municipios as $mun){
	
	if($row->municipio == $mun->id_town) {
		echo "<option value=".$mun->id_town." class=".$mun->province_id_town." selected>".$mun->title_town."</option>";
	} else {
		echo "<option value=".$mun->id_town." class=".$mun->province_id_town.">".$mun->title_town."</option>";
	}
}
?>
 </select>
</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Barrio </label>
<div class="col-sm-5">
<input  type="text" class="form-control" name="barrio" value="<?=$row->barrio?>"  >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Calle</label>
<div class="col-sm-4">
<input  type="text" class="form-control" name="calle" value="<?=$row->calle?>"  >
</div>
		
</div>

</div>
<!-------------show----------------------->
<div id="hideda" >
<div class="form-group">
<label class="control-label col-sm-3"> Nombres</label>
<div class="col-sm-6">
<input type="text" class="form-control"  value="<?=$row->nombre?>" disabled  >

</div>
</div>


<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->cedula?>"   ></div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->alias?>"   >

</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha nacimiento </label>
<div class="col-sm-7" >
<input disabled type="text" class="form-control" value="<?=$row->date_nacer?>">

</div>

</div>



<div class="form-group">
<label class="control-label col-sm-3" >Frecuencia</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"   value="<?=$row->frecuencia?>"  >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->tel_resi?>"   >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Teléfono celular </label>
<div class="col-sm-6">						
<input disabled type="text" class="form-control bfh-phone" value="<?=$row->tel_cel?>"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->email?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Sexo</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control" value="<?=$row->sexo?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Estado Civil</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control" value="<?=$row->estado_civil?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Nacianalidad</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->nacionalidad?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Seguro médico</label>
<div class="col-sm-5">
<?php 
$seguro_medico=$this->db->select('id_sm, title')->where('id_sm',$row->seguro_medico )
 ->get('seguro_medico')->row_array();
 ?>
<input disabled type="text" class="form-control" value="<?=$seguro_medico['title']?>">

<input id="seguro_medico" type="hidden" class="form-control" value="<?=$row->seguro_medico?>">

</div>
</div>
<div class="seguro_input"></div>
<div class="form-group">
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5">
<?php 
$provincia=$this->db->select('title')->where('id',$row->provincia )
 ->get('provinces')->row('title');
 ?>
<input disabled type="text" class="form-control" value="<?=$provincia?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Municipio</label>
<div class="col-sm-4">

<?php 
$municipio=$this->db->select('title_town')->where('id_town',$row->municipio )
 ->get('townships')->row('title_town');
 ?>
<input disabled type="text" class="form-control" value="<?=$municipio?>">

</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Barrio </label>
<div class="col-sm-5">
<input disabled type="text" class="form-control"  value="<?=$row->barrio?>"  >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Calle</label>
<div class="col-sm-4">
<input disabled type="text" class="form-control"  value="<?=$row->calle?>"  >
</div>
		
</div>
</div><!--show patient end-->
<a href="#anchor" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

</div><!--datos personal end-->
 <div class="tab-pane" id="Contactos_de_emergencia">
 <div  id="showecont" style="display:none">

<div class="form-group">
<label  class="control-label col-sm-3">Nombre</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_nombre" value="<?=$row->contacto_em_nombre?>">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_alias" value="<?=$row->contacto_em_alias?>">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Celular</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_cel" value="<?=$row->contacto_em_cel?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Telefono 1</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_tel1" value="<?=$row->contacto_em_tel1?>">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Telefono 2</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_tel2" value="<?=$row->contacto_em_tel2?>">

 </div>
</div>
 </div>
 <!--show contacto-->
 <div id="hidedb" >
 <div class="form-group">
<label  class="control-label col-sm-3">Nombres</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_nombre?>">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_alias?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Celular</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->contacto_em_cel?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Telefono 1</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_tel1?>">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Telefono 2</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_tel2?>">

 </div>
</div>
</div>
 </div>
<div class="tab-pane" id="En_case_de_menores_de_edad">
<div style="display:none" id="showdc">

<div class="form-group">
<br/>
<label class="control-label col-sm-3"  >Responsable legal</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="responsable_legal"  value="<?=$row->responsable_legal?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Cedula ó Pasaporte</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="cedula_o_pass_menos_edad" value="<?=$row->cedula_o_pass_menos_edad?>"  >
</div>
</div>
</div>
 <div id="hidedc" >
<div class="form-group">
<br/>
<label class="control-label col-sm-3"  >Responsable legal</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->responsable_legal?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Cedula ó Pasaporte</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->responsable_legal?>"  >
</div>
</div>
</div>
</div>
</form>
<div class="tab-pane active" id="Datos_citas">
<a data-toggle="modal"   data-target="#NewC" style="float:right"  class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Nueva Cita"  ></i> nueva cita </a>
<i><?=$number_cita?> citas</i>
<table class="table table-striped table-bordered" style="font-size:14px">
<tr style="background:#38a7bb;color:white"><th>NEC</th><th>Causa</th><th>Centro medico</th><th>Area</th><th>Doctor</th><th>Fecha</th><th>Editar</th></tr>
<?php
foreach($rendez_vous as $row_rd)
{
//-----------causa--------------------
$caus=$this->db->select('title')->where('id',$row_rd->causa )
->get('type_reasons')->row_array();
//---------centro medico-------------------
$centro=$this->db->select('name')->where('id_m_c',$row_rd->centro )
->get(' medical_centers')->row_array();
//---------centro medico-------------------
$area=$this->db->select('title_area')->where('id_ar',$row_rd->area )
->get(' areas')->row_array();
//------------doctor--------------------
$doctor=$this->db->select('first_name,last_name')->where('id',$row_rd->doctor )
   ->get('doctors')->row_array();
?>
<tr>
<td><?=$row_rd->nec?></td>
<td><?=$caus['title']?></td>
<td><?=$centro['name']?></td>
<td><?=$area['title_area']?></td>
<td><?=$doctor['first_name'];?> <?=$doctor['last_name'];?></td>
<td><?=$row_rd->fecha_propuesta?></td>
<td><a style="cursor:pointer" title="Editar cita : <?=$row_rd->nec?> " data-toggle="modal" data-target="#EditC"  data-target="#EditC" href="<?php echo site_url("admin/UpdateCita/".$row_rd->id_apoint)?>" ><i class="fa fa-pencil" aria-hidden="true" ></i> </a></td>

</tr>
<?php
}
?>
</table>


</div><!--div datos citas ends-->

 </div>
 


</div>

 </div><!--container-->
 </div>

   </body>

 <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
 $(window).on( "load", function() {
	 var idpatient=<?=$row->id_p_a?>; 
	var seguro_medico = $("#seguro_medico").val();
      $.ajax({
		url: '<?php echo site_url('admin/view_input');?>',
        type: 'post',
        
		data:{idpatient:idpatient,seguro_medico:seguro_medico},
        success: function (data) {
              		 $(".seguro_input").html(data);
        }
		
    });
    });


function getDoc(val) {
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown1").prop('disabled', false);
		$("#doctor_dropdown1").html(data);
	}
	});
}

$('.click-editar').on('click', function() {
$(".click-editar").hide();
$(".save-patient").slideDown(1000);
$("#all_dis").find('input').prop('disabled', false);
$("#showd").show(1000);
$("#hideda").hide(1000);
$("#showecont").show(1000);
$("#hidedb").hide(1000);
$("#showdc").show(1000);
$("#hidedc").hide(1000);
});
$('.addb').on('click', function() {
$(".hide-all-but").show();
});
$('.remb').on('click', function() {
$(".hide-all-but").hide();
});

 

	 setTimeout(function() {
    $('#suc').fadeOut('slow');
}, 5000);
</script>
</html>