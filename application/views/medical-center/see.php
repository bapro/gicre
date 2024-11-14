	<section class="py-3">
	<div class="container">
	<div class="row">
	<div class="col-md-4">
 <?php $i = 1;
$cpt="";
$go_to_c=$this->session->userdata('USER_CONTROLLER');
 foreach($CENTRO_MEDICO as $centro_medico)?>
<div class="card">
	<div class="card-header">

	<img class="img-thumbnail" style="width:100%" src="<?= base_url();?>assets/img/centros_medicos/<?php echo $centro_medico->logo; ?>"  alt="...">
	
	</div>
	<div class="card-body">
<form action="<?php echo site_url('medical_center/saveCentroMedico');?>" method="post" enctype="multipart/form-data"  novalidate class="needs-validation" autocomplete="off">
     <input type="hidden" name="especialidad"  value="0"/> 
 <input type="hidden" name="seguro_medico"  value="0"/>  
 <input type="hidden" name="created_by"  value="<?php echo $centro_medico->created_by;?>"/>  
 <input type="hidden" name="updated_by"  value="<?=$this->session->userdata('user_id');?>"/>  
 <input type="hidden" name="insert_date"  value="<?php echo $centro_medico->insert_date;?>"/> 
 <input type="hidden" name="idcentro"  value="<?php echo $centro_medico->id_m_c;?>"/>   
  <input type="hidden" name="modify_date"  value="<?=date('Y-m-d H:i:s')?>"/>  
  <table class="table table-striped ">

<tr>
<th class="vtd">Nombre</th>
<td class="thh">
<span class="show-data"><?php echo $centro_medico->name;?></span> 
<input value="<?=$centro_medico->name;?>"  name="nombre" class="form-control hide-data" required>
	<div class="invalid-feedback">Por favor, introduzca el nombre.</div>
					<div id="duplicateCentro"></div>				
</td>
</tr>
<tr class="hide-data">
<th class="thh">Logo</th>
<td class="vtd">
<input type="file" name="logo" id="file_m_enf" class="file_m_enf form-control " onchange="preview_sello(event)"   accept=".png, .jpg, .jpeg"  >
					
</td>
</tr>
<tr>
<th class="thh">Tipo</th>
<td class="vtd">
<span class="show-data"><?=$centro_medico->type;?></span> 

<div class="btn-group hide-data" role="group" aria-label="Basic radio toggle button group">
					<?php
						if ($centro_medico->type == "privado") {
						$checked = "checked";
						} else {
						$checked = "";
						}
						?>
						<input type="radio" class="btn-check" name="typo" id="btnradio1" autocomplete="off" value="privado" <?=$checked?>>
						
					<label class="btn btn-outline-secondary" for="btnradio1">Privado</label>
						<?php
						if ($centro_medico->type == "publico") {
						$checked = "checked";
						} else {
						$checked = "";
						}
						?>
					<input type="radio" class="btn-check" name="typo" id="btnradio2" autocomplete="off" value="publico"  <?=$checked?>>
					<label class="btn btn-outline-secondary" for="btnradio2">Público</label>
					<?php
					if ($centro_medico->type == "salud ocupacional") {
					$checked = "checked";
					} else {
					$checked = "";
					}
					?>
					<input type="radio" class="btn-check" name="typo" id="btnradio3" autocomplete="off" value="salud ocupacional"  <?=$checked?>>
					<label class="btn btn-outline-secondary" for="btnradio3">Salud Ocupacional</label>
					</div>
</td>

</tr>

<tr>
<th class="thh">RNC</th>
<td class="vtd"><span class="show-data"><?=$centro_medico->rnc;?></span> 
<input value="<?=$centro_medico->rnc;?>" class="form-control hide-data" name="rnc"></td>

</tr>
<tr>
<th class="thh">Tel Residencial</th>
<td class="vtd"><span class="show-data"><?=$centro_medico->primer_tel;?></span> 
<input value="<?=$centro_medico->primer_tel;?>" class="form-control hide-data" name="primer_tel"></td>
</tr>

<tr>
<th class="thh">Tel Celular</th>
<td class="vtd"><span class="show-data"><?=$centro_medico->segundo_tel;?></span> 
<input value="<?=$centro_medico->segundo_tel;?>" class="form-control hide-data" name="segundo_tel"></td>
</tr>
<tr>
<th class="thh">Email</th>
<td class="vtd" ><span class="show-data"><?=$centro_medico->email;?></span> 
<input value="<?=$centro_medico->email;?>" class="form-control hide-data" name="email"></td>

</tr>

<tr>
<th class="thh">Fax</th>
<td class="vtd"><span class="show-data"><?=$centro_medico->fax;?></span> 
<input value="<?=$centro_medico->fax;?>" class="form-control hide-data"  name="fax"></td>
</tr>

<tr>
<th class="thh">Página web</th>

<td class="vtd"><span class="show-data"><?=$centro_medico->pagina_web;?></span> 
<input value="<?=$centro_medico->pagina_web;?>" class="form-control hide-data" name="pagina_web"></td>
</tr>
<tr>
<th class="thh">Dirección</th>

<td class="vtd"><span class="show-data"><?=$centro_medico->barrio;?></span> 
<input value="<?=$centro_medico->barrio;?>" class="form-control hide-data" name="barrio"></td>
</tr>
<tr>
<th class="thh">Provincia</th>

<td class="vtd">
<span class="show-data">
<?=$CENTRO_PROVINCE;?>
</span> 
<span class="hide-data">
<select class="form-select " id="provincia" name="provincia" required  >
<?php
$provinces = $this->model_admin->all_provinces();
foreach ($provinces as $listElement) {

if ($centro_medico->provincia == $listElement->id) {
echo "<option value=" . $listElement->id . " selected>" . $listElement->title . "</option>";
} else {
echo "<option value=" . $listElement->id . ">" . $listElement->title . "</option>";
}
}
?>

</select>
</span> 
</td>
</tr>
<tr>
<th class="thh">Municipio</th>

<td class="vtd">
<span class="show-data"><?=$CENTRO_MUNICIPIO;?></span> 
<span class="hide-data">
<select class="form-select"  name="municipio" id="municipio" required>

<?php
$municipios= $this->model_admin->getTownships();
foreach ($municipios as $row) {

if ($centro_medico->municipio == $row->id_town) {
echo "<option value=" . $row->id_town . " class=" . $row->province_id_town . "  selected>" . $row->title_town . "</option>";
} else {
echo "<option value=" . $row->id_town . " class=" . $row->province_id_town . " >" . $row->title_town . "</option>";
}
}
?>
</select>
</span> 

</td>
</tr>

<tr>

<td colspan="2" align="center">
<?php 
if($this->session->userdata('user_perfil')=="Admin"){
?>
<button class="btn btn-primary btn-sm show-data" type="button" id="editar-centro"  ><i class="bi bi-pencil"></i> Editar</button>
<button class="btn btn-primary btn-sm hide-data" type="submit" id="editar-centro"  ><i class="bi bi-save"></i> Guardar</button>
<?php 
}
?>
</td>
</tr>

</table>
</form>


</div>
	</div>
	</div>
	
<?php
 if (empty($RESULT_DOCTOR))
{
$tot_medicos = '';
}else{
	$num_medicos = count($RESULT_DOCTOR);
	$tot_medicos ="<span class='badge bg-danger'>$num_medicos</span>";

}


 if (empty($RESULT_ASDOCTOR))
{
$tot_as_medicos = '';
}else{
	$num_as_medicos = count($RESULT_ASDOCTOR);
	$tot_as_medicos ="<span class='badge bg-danger'>$num_as_medicos</span>";

}


?>
	
	
	<div class="col-md-8">
 <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
               <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="medico-tab" data-bs-toggle="tab" data-bs-target="#medico-left" type="button" role="tab" aria-controls="medicoIndMed" aria-selected="true">Médicos <?=$tot_medicos?></button>
                </li>
              <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="seguros-tab" data-bs-toggle="tab" data-bs-target="#seguros-left" type="button" role="tab" aria-controls="seguros" aria-selected="false">Seguros Médico</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="asistente-tab"  data-bs-toggle="tab" data-bs-target="#asistente-left" type="button" role="tab" aria-controls="asistente" aria-selected="false">Asistentes Médicos <?=$tot_as_medicos?> </button>
                </li>
					<?php 
					if($this->session->userdata('user_perfil')=="Admin"){
					?>
					<li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="administrativo-tab"  data-bs-toggle="tab" data-bs-target="#administrativo-left" type="button" role="tab" aria-controls="administrativo" aria-selected="false">Usuarios Administrativos <?=$tot_as_medicos?> </button>
                </li>
				
				<li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="mapacama-tab"  data-bs-toggle="tab" data-bs-target="#mapacama-left" type="button" role="tab" aria-controls="mapacama" aria-selected="false">Mapa de Cama  </button>
                </li>
				<?php 
					}
					?>
              </ul>
              <div class="tab-content pt-2" >
                <div class="tab-pane fade show active" id="medico-left" role="tabpanel" aria-labelledby="medico-tab">
<?php if (empty($RESULT_DOCTOR))
{
echo"<div class='alert alert-warning'> No hay doctores para este centro medicos. </div>";

}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped example" width="100%"  >
<thead>
<tr>
<th>Nombres</th>
<th>Area</th>
<th>Correo Elect.</th>
<th>Celular</th>
<th>Extension</th>
<th>Exequatur</th>

</tr>
</thead>
<tbody>
<?php 
$var="Medico";
foreach($RESULT_DOCTOR as $result_doctor)

{

$area=$this->db->select('title_area')->where('id_ar',$result_doctor->area)
->get('areas')->row('title_area');

?>

<tr>
<td  style="text-align:left;text-transform:uppercase">
<?php 
if($this->session->userdata('user_perfil')=="Asistente Medico"){
echo $result_doctor->name;
}else{
?>
<a href="<?php echo base_url("$go_to_c/doctor_account/$result_doctor->id_user")?>"  ><?=$result_doctor->name;?></a>
<?php }  ?>
</td>
<td  ><?=$area;?></td>
<td  ><?=$result_doctor->correo;?></td>
<td  ><?=$result_doctor->cell_phone;?></td>
<td  ><?=$result_doctor->extension;?></td>
<td  ><?=$result_doctor->exequatur;?></td>
<!--<td  >
<?php if($hide==0){?>
<a href="<?php echo base_url("admin/update_user/$result_doctor->id_user/1")?>"  title="Ver" ><i class="fa fa-eye" aria-hidden="true"></i></a>
<?php } ?> </td>-->
</tr>

<?php
}
?>
</tbody>
</table>
</div>
<?php
}

?>
</div>
<div class="tab-pane fade" id="seguros-left" role="tabpanel" aria-labelledby="seguros-tab">
  <form action="<?php echo site_url('medical_center/updateCentroSeguroMed');?>" method="post" novalidate class="needs-validation">
  <input name="id_centro" type="hidden" value="<?=$centro_medico->id_m_c?>" />
<input type="checkbox" id="checkbox2"> Seleccionar todo
<select class="form-select select2 required" id="e2" multiple="multiple" name="seguro_medico_[]" required>

<?php
foreach ($CentroSeguroRowEdit as $row) {

$centro_medicof = $this->db->select('id_medical_center')->where('id_medical_center', $centro_medico->id_m_c)->where('seguro_id', $row->id_sm)
->get('medical_centro_seguro')->row('id_medical_center');

if ($centro_medico->id_m_c == $centro_medicof) {
$selected = "selected";
} else {
$selected = "";
}

echo "<option value='$row->id_sm.' $selected>$row->title</option>";
}
?>
</select>
	<div class="invalid-feedback">Por favor, seleccione.</div>
<br/>
 <button type="submit" class="btn btn-primary" >Guardar </button>
 </form>
</div>
<div class="tab-pane fade" id="asistente-left" role="tabpanel" aria-labelledby="asistente-tab">
<?php if (empty($RESULT_ASDOCTOR))
{
echo"<div class='alert alert-warning'> No hay asistentes para este centro medicos. </div>";

}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped example" width="100%"  >
<thead>
<tr>
<th>Nombre</th>
<th>Correo Elect.</th>

</tr>
</thead>
<tbody>
<?php 
$var="Medico";
foreach($RESULT_ASDOCTOR as $ram)

{

?>

<tr>
<td><?=$ram->name;?></td>
<td ><?=$ram->correo;?></td>
</tr>

<?php
}
?>
</tbody>
</table>
</div>
<?php 
}	
?>
</div>



<div class="tab-pane fade" id="administrativo-left" role="tabpanel" aria-labelledby="administrativo-tab">
<div class="row" id="background_">
<div class="col-md-5 col-md-offset-1">
<form class="form-horizontal" >
<h3>Usuario Nuevo</h3>
<div class="mb-3">
<label><span style="color:red">*</span> Nombres del Usuario</label>
<select class="form-select select-users" id="ad_names">
<option value=''></option>
<?php
$is_ativo = $this->session->userdata('admin_position_centro');
if($is_ativo){
$sql_medicos ="SELECT id_user, name, perfil FROM users 
RIGHT JOIN doctor_agenda_test ON users.id_user=doctor_agenda_test.id_doctor 
WHERE id_centro =$is_ativo   GROUP BY id_doctor ORDER BY name ASC";
$query=$this->db->query($sql_medicos);
}else{
$sql = "SElECT id_user, name, perfil FROM users WHERE perfil !='Admin' && perfil !='Administrativo' ORDER BY name ASC";
$query = $this->db->query($sql);
}

foreach ($query->result() as $rowuser) {

	echo "<option value='$rowuser->id_user'>$rowuser->name (Perfil: $rowuser->perfil)</option>";
}
?>
</select>

</div>

<div id="is-user-new">
<div class="mb-3">
<label><span style="color:red">*</span> Correo Electronico</label>
<input type="email" class="form-control clear-n-u" id="email_ad">
</div>
<div class="mb-3">
<label><span style="color:red">*</span> Contraseña</label>
<input type="password" class="form-control clear-n-u" id="pass1">
</div>
<div class="mb-3">
<label><span style="color:red">*</span> Confirmar Contraseña</label>
<input type="password" class="form-control clear-n-u" id="pass2">

</div>
</div>
<br />
<button type="button" id="createAdministrador" class="btn btn-success">Crear</button>


</form>

<div id="display-result"></div>
</div>
<div class="col-md-6">
<div id="centro-users"></div>

</div>
</div>
</div>

<div class="tab-pane fade" id="mapacama-left" role="tabpanel" aria-labelledby="mapacama-tab">
<div class="card">
<div class="card-header">Mapa De Cama</div>
<div class="card-body">
<?php
$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
$hay_cama = $this->hospitalization_emgergency->select('centro')->where('centro', $centro_medico->id_m_c)->get('mapa_de_cama')->row('centro');
if ($hay_cama) { ?>
<table class="table table-striped" id="mapa">
<thead>
<tr>
<td><input id="new-sala" placeholder='sala' class="form-control" type="text" /> </td>
<td><input id="new-cama" placeholder='# cama' class="form-control" type="text" /> </td>
<td><input style="width:100%" id="new-servicio" placeholder='servicio' class="form-control" type="text" /> </td>
<td> <button type="button" id="newSaveBtn" class="btn btn-primary btn-xs" style="float: none;"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button></td>
</tr>
<thead>
</table>
<div id="mapa-de-cama"></div>

<?php } else{?>
<form method="POST" id="import_mapadecama"  enctype="multipart/form-data"  >
<input type="file" name="mapacama" class="file" id="mapacama" accept=".xls, .xlsx" />
 <input type="hidden" name="idcentromapa"  value="<?php echo $centro_medico->id_m_c;?>"/>   
<button class="btn btn-primary btn-sm " type="submit" id="btnUpMapa" ><i class="bi bi-cloud-arrow-up"></i> Subir</button>
</form>
<?php
 } ?>
</div>
</div>



</div>
</div>
	
</div>
</div>
	</div>	
	
    </section>
	
	
  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script> 
 <script src="<?= base_url();?>assets_new/js/main.js"></script> 

<?php $this->load->view('prevent-duplicated-entry');?>
<script>

$(document).ready(function(){
	
		$("#checkbox2").click(function() {
		if ($("#checkbox2").is(':checked')) {
			$("#e2 > option").prop("selected", "selected");
			$("#e2").trigger("change");
		} else {
			$("#e2 > option").prop("selected","");
			$("#e2").trigger("change");
		}
	});
	
	$('#import_mapadecama').on('submit', function(event){
event.preventDefault();

var show_plan=$('#show_plan').val();

	if($("#mapacama").val()==""){
alert("Sube el archivo excel.");
}
else{
$("#import-btn").prop("disabled", true).text('Guardando...');
$.ajax({
url:"<?php echo base_url(); ?>medical_center/uploadMapaDeCama",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
	alert("Subido.");
location.reload(true);
},

});
};
});
	
	
	
	
	
	
	
	
	
	
	
	$('#newSaveBtn').on('click', function() {
		var sala = $("#new-sala").val();
		var cama = $("#new-cama").val();
		var servicio = $("#new-servicio").val();
		if (sala == '' && cama == '' && servicio == '') {
			alert('Todos los campos son obligatorios');
		} else {
			$('#newSaveBtn').prop("disabled", true);
			$.ajax({
				type: 'POST',
				url: "<?= base_url('medical_center/saveNewMapaCama') ?>",
				data: {
					sala: sala,
					cama: cama,
					servicio: servicio,
					centro: <?= $centro_medico->id_m_c; ?>
				},
				cache: true,
				success: function(data) {
					load_mapa_cama();
					$('#newSaveBtn').prop("disabled", false);
				},

			});
		}
	})
	
	
	
	
	
	
	

	load_mapa_cama();
function load_mapa_cama() {
		//$('#mapa-de-cama').text('Cargando la mapa de cama...').css('font-style','italic');

		$.ajax({
			type: "POST",
			url: "<?= base_url('medical_center/load_mapa_cama') ?>",
			data: {
				id_centro: <?= $centro_medico->id_m_c; ?>
			},
			success: function(data) {
				$('#mapa-de-cama').html(data);
			},


		});
	}



	
$('.form-select').select2({
	tags: true,
		theme: 'bootstrap-5',
		width: '100%'
		
		
	});	
	
		$('#ad_names').on('change', function() {

	if ($.isNumeric($(this).val())) {
			$('#is-user-new').hide();
			var email = $("#email_ad").val("");
			var pass1 = $("#pass1").val("");
			var pass2 = $("#pass2").val("");
		} else {
			$('#is-user-new').show();
		}
});
	
	centroUser1();
	
	
	$("#createAdministrador").on('click', function(event) {
		event.preventDefault();
		var ad_names = $("#ad_names").val();
		var email = $("#email_ad").val();
		var pass1 = $("#pass1").val();
		var pass2 = $("#pass2").val();
		$("#createAdministrador").prop("disabled", true);
		$.ajax({
			url: "<?php echo base_url(); ?>administrativo_functions/createPasswordForAd",
			data: {
				pass1: pass1,
				pass2: pass2,
				email: email,
				id_centro: <?= $centro_medico->id_m_c; ?>,
				ad_names: ad_names
			},
			method: "POST",
			dataType: 'json',
			success: function(response) {
				if (response.status == 0) {
					$('#display-result').html('<p class="alert alert-danger ">' + response.message + '</p>');
				} else if (response.status == 2) {
					$('#display-result').html('<p class="alert alert-danger ">' + response.message + '</p>');
				} else {
					$('#display-result').html('<p class="alert alert-success">' + response.message + '</p>');
					$('.clear-n-u').val("");
					$('#ad_names').val("").trigger('change');
					centroUser1();
				}
				$("#createAdministrador").prop("disabled", false);
			},

		});
	})	
	
	function centroUser1() {
		
		$.ajax({
			url: "<?php echo base_url(); ?>administrativo_functions/centroUsers",
			data: {
				id_centro: <?= $centro_medico->id_m_c; ?>
			},
			method: "POST",
			success: function(data) {

				$('#centro-users').html(data);

			},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
	$('#centro-users').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
		});

	}
	
	
	
    $('.hide-data').hide();
	$('#municipio').hide();
$("#editar-centro").on('click', function(event){
event.preventDefault();
	$('.hide-data').show();
	$('.show-data').hide();
});


	
	
$("#selectAllSeg").click(function(){
if($("#selectAllSeg").is(':checked') ){
$("#seguro_medico > option").prop("selected","selected");
$("#seguro_medico").trigger("change");
}else{
$("#seguro_medico > option").prop("selected","");
$("#seguro_medico").trigger("change");
}
});
		

$("#selectAllArea").click(function(){
if($("#selectAllArea").is(':checked') ){
$("#especialidad > option").prop("selected","selected");
$("#especialidad").trigger("change");
}else{
$("#especialidad > option").prop("selected","");
$("#especialidad").trigger("change");
}
});
  
	 
	 
	 
	 
	 
});






</script>

	

	 
</body>

</html>