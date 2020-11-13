<?php 
 $this->load->view('admin/header_patient');
?>
<div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" > <!-- required for floating -->
 <!-- required for floating -->
<!-- Nav tabs -->
<ul  class="nav nav-pills nav-stacked hide-next-data-patient">
<li class="active" ><a href="#Datos_personales"  data-toggle="tab" class="">I- DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li><a href="#Contactos_de_emergencia" data-toggle="tab">II- CONTACTOS DE EMERGENCIA</a></li>
<li><a href="#En_case_de_menores_de_edad" data-toggle="tab">III- EN CASE DE MENORES EDAD</a></li>
<li><a id="datoscitas" href="#Datos_citas" data-toggle="tab">IV- DOTOS CITAS <i class="fa fa-arrow-left datoscitas" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>

</ul>
<!--
<hr class="rem-hr" id="hr_ad"/>
<img class="img-responsive" style="" src="<?= base_url();?>assets/img/user.png">
 <br/><br/>
 --> 
</div>
<?php
foreach($patient as $row)
	 
	 {
		 setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->insert_date)));	
$update_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->update_date)));	

		?>
<div class="col-md-9" id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<div class="row">
<div class="col-xs-5">
<h3 class="h3">Editar Patiente (# <?=$row->id_p_a?>)</h3>
</div>
<div class="col-xs-4">
<br/>
<i style="color:green">Admision  : <?=$insert_date ;?></i> <br/>  <i style="color:green">Modificacion  : <?=$update_date ;?></i>
</div>

</div>
<hr id="hr_ad"/>
<form  class="form-horizontal"  method="post"  action="<?php echo site_url('admin/saveUpdatePatient');?>" > 
<br/>

<button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
<div class="tab-content"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 
<div class="form-group">
<label class="control-label col-sm-3"> Nombre</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="nombre" name="nombre" value="<?=$row->nombre?>"   >
<input type="hidden" class="form-control" name="idcp" value="<?=$row->id_p_a?>"   >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Apellido </label>
<div class="col-sm-6">

<input type="text" class="form-control" id="apellido" name="apellido" value="<?=$row->apellido?>"  >

</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$row->cedula?>"   ></div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input  type="text" class="form-control"  name="alias" value="<?=$row->alias?>"   >

</div>
</div>
<?php
if($row->date_nacer=="")
{
?>
	<div class='form-group'>
<label class='control-label col-sm-3'>Edad</label>
<div class='col-sm-2'>
<select class="form-control"  name="meses" id="meses" >
<option  hidden><?=$row->edad?></option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
</select>
</div>
 

</div>

<?php
}
else
{
	?>

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
<?php
}
?>
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
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="tel_resi" value="<?=$row->tel_resi?>"   >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Teléfono celular </label>
<div class="col-sm-6">						
<input  type="text" class="form-control bfh-phone" name="tel_cel" value="<?=$row->tel_cel?>"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="email" value="<?=$row->email?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Sexo</label>
<div class="col-sm-3">
<select class="form-control" name="sexo"  >
<option hidden><?=$row->sexo?></option>
<option >Masculino</option>
<option >Femenino</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Estado Civil</label>
<div class="col-sm-3">
<select class="form-control" name="estado_civil" >
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
<div class="col-sm-6">
<select class="form-control selectpicker"  data-show-subtext="true" data-live-search="true" id="nacionalidad" name="nacionalidad">
<?php
foreach($countries as $co){
	
	if($row->nacionalidad == $co->id) {
		echo "<option value=".$co->id." selected>".$co->short_name."</option>";
	} else {
		echo "<option value=".$co->id.">".$co->short_name."</option>";
	}
}
?>
 </select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Seguro médico</label>
<div class="col-sm-5">
<select class="form-control selectpicker"  data-show-subtext="true" data-live-search="true" id="seguro_medico" name="seguro_medico">
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
<div id="seguro_input"></div>
<div class="form-group">
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5">
<select class="form-control selectpicker"  data-show-subtext="true" data-live-search="true" id="provincia" name="provincia">
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

<select class="form-control " name="municipio" id="municipio_dropdown"  >

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
<a href="#anchor" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

</div>
 
<div class="tab-pane" id="Contactos_de_emergencia">

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
<div class="tab-pane" id="En_case_de_menores_de_edad">

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
</div>
 </form>
</div>
<?php
}
?>
</div>
 </div>
 </div>
 <br/> <br/>
 <?php
        $this->load->view('footer');
 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->


  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
 <script src="<?=base_url();?>assets/js/links_select.js"></script> 
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
  
<script>
 $(window).on( "load", function() {
	 var idpatient=<?=$patient_id?>; 
	var seguro_medico = $("#seguro_medico").val();
      $.ajax({
		url: '<?php echo site_url('admin/get_input_view_edit');?>',
        type: 'post',
        
		data:{idpatient:idpatient,seguro_medico:seguro_medico},
        success: function (data) {
              		 $("#seguro_input").html(data);
        }
		
    });
    });
	
	
		$("#seguro_medico").on('change', function (e) {
    e.preventDefault();
	$("#flash1").fadeIn(400).html('<span class="load">Cargando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');
   var seguro_medico = $("#seguro_medico").val();
    $.ajax({
		url: '<?php echo site_url('admin/get_input');?>',
        type: 'post',
        
		data:{seguro_medico:seguro_medico},
        success: function (data) {
			$("#flash1").hide();
			 $("#seguro_input").html(data);
        }
		
    });
});
</script>

</html>