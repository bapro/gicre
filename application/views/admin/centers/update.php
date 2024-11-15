<script>
	$(function() {
		$("#municipio").chained("#provincia");
	});
</script>

<!-- *** welcome message modal box *** -->

<?php
$this->load->view('admin/header_admin');
foreach ($EDIT_ID as $edit_id)
?>

<div class="container">

	<div class="row">

		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#centro_data">
						<h4><?= $edit_id->name; ?></h4>
					</a></li>
				<li><a data-toggle="tab" href="#ad_user_created">
						<h4>Crear Usuario Administrativo</h4>
					</a></li>

			</ul>
			<div class="tab-content grand-total-turno">

				<div id="centro_data" class="active tab-pane fade in">

					<div class="row" id="background_">

						<div class="col-md-5">
							<?php echo $this->session->flashdata('success_msg');  ?>
							<h3 class="h3 col-md-offset-3">Editar Centro Medico # <span class="round"><?= $id_centro ?></span>

							</h3>
						</div>
						<div class="col-md-7">
							<?php $user_c18 = $this->db->select('name')->where('id_user', $edit_id->created_by)->get('users')->row('name');
							$user_c19 = $this->db->select('name')->where('id_user', $edit_id->updated_by)->get('users')->row('name');

							$inserted_time = date("d-m-Y H:i:s", strtotime($edit_id->insert_date));
							$updated_time = date("d-m-Y H:i:s", strtotime($edit_id->modify_date));
							echo "Creado por : $user_c18 ($inserted_time) <br/> Modificado por $user_c19 ($updated_time)"; ?>


						</div>


						<div class="row">

							<div class="col-xs-9">
								<form class="form-horizontal" id="form-save" method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/saveEditCentroMedico'); ?>">

									<br /><br />
									<input name="id_m_c" type="hidden" value="<?= $id_centro; ?>" />

									<div class="form-group">
										<label class="control-label col-sm-5">Nombre</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="name" name="name" value="<?= $edit_id->name; ?>">
										</div>
									</div>

									<div class="form-group">

										<label class="control-label col-sm-5">Cargar Logo :</label>
										<div class="col-sm-6">
											<input type="file" class="file" name="picture">

										</div>

									</div>

									<div class="form-group">
										<label class="control-label col-sm-5">RNC</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="rnc" name="rnc" value="<?= $edit_id->rnc; ?>">
										</div>
									</div>

									<div class="form-group">

										<label class="control-label col-sm-5">Tipo</label>
										<div class="col-sm-4">
											<label class="radio-inline">
												<?php
												if ($edit_id->type == "privado") {
													$checked = "checked";
												} else {
													$checked = "";
												}
												echo "<input type='radio' name='typo' value='privado' $checked> privado";

												?>
											</label>
											<label class="radio-inline">
												<?php
												if ($edit_id->type == "publico") {
													$checked = "checked";
												} else {
													$checked = "";
												}
												echo "<input type='radio'  name='typo' value='publico' $checked> publico";

												?>
											</label>
											<label class="radio-inline">
												<?php
												if ($edit_id->type == "Salud ocupacional") {
													$checked1 = "checked";
												} else {
													$checked1 = "";
												}
												echo "<input type='radio'  name='typo' value='Salud ocupacional' $checked1> Salud ocupacional";

												?>
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5">Primer telefono</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="primer_tel" name="primer_tel" value="<?= $edit_id->primer_tel; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5">Segundo telefono</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="segundo_tel" name="segundo_tel" value="<?= $edit_id->segundo_tel; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5">Correo electronico</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="email" name="email" value="<?= $edit_id->email; ?>">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-5">Fax </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="fax" name="fax" value="<?= $edit_id->fax; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5">Especialidad</label>
										<div class="col-sm-6">
											<input type="checkbox" id="checkbox1"> Seleccionar todo

											<select id="e1" class="form-control select2 required" multiple="multiple" name="especialidad[]">

												<?php
												foreach ($CentroAreaRowEdit as $row) {

													$centro_medico = $this->db->select('id_medical_center')->where('id_medical_center', $id_centro)
														->where('especialidad', $row->id_ar)
														->get('medial_center_esp')->row('id_medical_center');

													if ($id_centro == $centro_medico) {
														$selected = "selected";
													} else {
														$selected = "";
													}

													echo "<option value='$row->id_ar.' $selected>$row->title_area</option>";
												}
												?>
											</select>

										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5">Provincia</label>
										<div class="col-sm-6">
											<select class="form-control select2" name="provincia" id="provincia" onchange="selectProvincia(this.options[this.selectedIndex].value)">

												<?php
												foreach ($provinces as $listElement) {

													if ($edit_id->provincia == $listElement->id) {
														echo "<option value=" . $listElement->id . " selected>" . $listElement->title . "</option>";
													} else {
														echo "<option value=" . $listElement->id . ">" . $listElement->title . "</option>";
													}
												}
												?>

											</select>
											<span id="municipio_loader"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5">Municipio</label>
										<div class="col-sm-6">
											<select class="form-control select2" style="background:#E7FEE9" name="municipio" id="municipio_dropdown">

												<?php
												foreach ($municipios as $row) {

													if ($edit_id->municipio == $row->id_town) {
														echo "<option value=" . $row->id_town . " class=" . $row->province_id_town . "  selected>" . $row->title_town . "</option>";
													} else {
														echo "<option value=" . $row->id_town . " class=" . $row->province_id_town . " >" . $row->title_town . "</option>";
													}
												}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-5">Barrio <span class="req">*</span></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="barrio" value="<?= $edit_id->barrio; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5">Calle </label>
										<div class="col-sm-6">
											<input type="text" class="form-control bfh-phone" name="calle" value="<?= $edit_id->calle; ?>">
											<?php echo form_error('telc', '<span class="help-block">', '</span>'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5">Página web </label>
										<div class="col-sm-6">
											<input type="text" class="form-control bfh-phone" name="pagina_web" value="<?= $edit_id->pagina_web; ?>">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-5">Seguro médico</label>
										<div class="col-sm-6">

											<input type="checkbox" id="checkbox2"> Seleccionar todo
											<select class="form-control select2 required" id="e2" multiple="multiple" name="seguro_medico[]">

												<?php
												foreach ($CentroSeguroRowEdit as $row) {

													$centro_medico = $this->db->select('id_medical_center')->where('id_medical_center', $id_centro)
														->where('seguro_id', $row->id_sm)
														->get('medical_centro_seguro')->row('id_medical_center');

													if ($id_centro == $centro_medico) {
														$selected = "selected";
													} else {
														$selected = "";
													}

													echo "<option value='$row->id_sm.' $selected>$row->title</option>";
												}
												?>
											</select>

										</div>
									</div>
									<?php
									$hay_cama = $this->db->select('centro')->where('centro', $id_centro)->get('mapa_de_cama')->row('centro');
									if (empty($hay_cama)) { ?>
										<div class="form-group">
											<label class="control-label col-sm-5">Mapa De Cama</label>

											<div class="col-sm-6">

												<input type="file" name="mapacama" class="file" id="mapacama" accept=".xls, .xlsx" />
											</div>

										</div>
									<?php
									}
									?>

									<div class="row  col-md-offset-5">
										<div class="col-md-12">
											<input type="submit" class="btn btn-primary btn-xs" value="Enviar">
											<br />
											<br />
										</div>


									</div>

									<hr />
									<?php
									$hay_cama = $this->db->select('centro')->where('centro', $id_centro)->get('mapa_de_cama')->row('centro');
									if ($hay_cama) { ?>

										<div class="col-sm-12 col-md-offset-2">
											<h4>MAPA DE CAMA - <?= $edit_id->name; ?></h4>
											<table class="table table-striped" id="mapa">
												<thead>
													<tr>
														<td><input id="new-sala" placeholder='sala' class="form-control" type="text" /> </td>
														<td><input id="new-cama" placeholder='# cama' class="form-control" type="text" /> </td>
														<td><input style="width:100%" id="new-servicio" placeholder='servicio' class="form-control" type="text" /> </td>
														<td> <button type="button" id="NewsaveBtn" class="btn btn-primary btn-xs" style="float: none;"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button></td>
													</tr>
													<thead>
											</table>
											<div id="mapa-de-cama"></div>
										</div>

									<?php } ?>
								</form>
							</div>
							<div class="col-xs-3">
								<?php if ($edit_id->logo == "") {
									echo "<div class='alert alert-info'>
  No hay logo.
</div>";
								} else {
								?>
									<img class="img-responsive" width="100" src="<?= base_url(); ?>/assets/img/centros_medicos/<?php echo $edit_id->logo; ?>" />
								<?php
								}

								?>
							</div>
						</div>
					</div>

				</div>
				<div id="ad_user_created" class="tab-pane fade in">
					<div class="row" id="background_">
						<div class="col-md-5 col-md-offset-1">
							<form class="form-horizontal" role="form">
								<h3>Usuario Nuevo</h3>
								<div class="form-group">
									<label><span style="color:red">*</span> Nombres Del Usuario</label>
									<select class="form-control select-users" id="ad_names">
										<option value=''>Seleccionar</option>
										<?php
										if($admin_centro){
										$sql_medicos ="SELECT id_user, name, perfil FROM users 
										RIGHT JOIN doctor_agenda_test ON users.id_user=doctor_agenda_test.id_doctor 
										WHERE id_centro =$admin_centro  GROUP BY id_doctor ORDER BY name ASC";
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
									<div class="form-group">
										<label><span style="color:red">*</span> Correo Electronico</label>
										<input type="email" class="form-control clear-n-u" id="email_ad">
									</div>
									<div class="form-group">
										<label><span style="color:red">*</span> Contraseña</label>
										<input type="password" class="form-control clear-n-u" id="pass1">
									</div>
									<div class="form-group">
										<label><span style="color:red">*</span> Confirmar Contraseña</label>
										<input type="password" class="form-control clear-n-u" id="pass2">

									</div>
								</div>
								<button type="button" id="createAdministrador" class="btn btn-success">Crear</button>
								<br /><br />

							</form>
							
							<div id="display-result"></div>
						</div>
						<div class="col-md-6">
							<h3>Listado De Usuarios Administrativo</h3>
							<input class="form-control" placeholder='Buscar un usuario' id="searchAuser"/>
							
							<div id="centro-users"></div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
</div>
<?php $this->load->view('footer'); ?>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="<?= base_url(); ?>assets/js/links_select.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/validation-jq.js" charset="UTF-8"></script>
<script>


$('#searchAuser').on('keyup', function() {
  // Search text
  var text = $(this).val();
 
  // Hide all content class element
  $('.filter-user').hide();

  // Search and show
  $('.filter-user:contains("'+text+'")').show();
 
 });
 
 $.expr[":"].contains = $.expr.createPseudo(function(arg) {
  return function( elem ) {
   return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
  };
  })

 

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
				id_centro: <?= $id_centro; ?>,
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
	});

	function centroUser1() {
		$.ajax({
			url: "<?php echo base_url(); ?>administrativo_functions/centroUsers",
			data: {
				id_centro: <?= $id_centro; ?>
			},
			method: "POST",
			success: function(data) {

				$('#centro-users').html(data);

			},
	
		});

	}



	$("#checkbox1").click(function() {
		if ($("#checkbox1").is(':checked')) {
			$("#e1 > option").prop("selected", "selected");
			$("#e1").trigger("change");
		} else {
			$("#e1 > option").removeAttr("selected");
			$("#e1").trigger("change");
		}
	});






	$("#checkbox2").click(function() {
		if ($("#checkbox2").is(':checked')) {
			$("#e2 > option").prop("selected", "selected");
			$("#e2").trigger("change");
		} else {
			$("#e2 > option").removeAttr("selected");
			$("#e2").trigger("change");
		}
	});


	$('#save').click(function() {

		if ($("#name").val() == "") {
			alert("Cual es el nombre ?");
			return false;
		}


		if ($("#primer_tel").val() == "") {
			alert("Cual es le primer telefono ?");
			return false;
		}


		if ($("#provincia").val() == "") {
			alert("Cual es la provincia ?");
			return false;
		}


		if ($("#municipio").val() == "") {
			alert("Cual es le municipio ?");
			return false;
		}



	})




	$('.select2').select2({
		//tags: true,   
		language: {

			noResults: function() {

				return "No hay resultado";
			},
			searching: function() {

				return "Buscando..";
			}
		}
	});


	$('.select-users').select2({
		tags: true,

	});

	load_mapa_cama();



	function load_mapa_cama() {
		//$('#mapa-de-cama').text('Cargando la mapa de cama...').css('font-style','italic');

		$.ajax({
			type: "POST",
			url: "<?= base_url('admin_medico/load_mapa_cama') ?>",
			data: {
				id_centro: <?= $id_centro ?>
			},
			success: function(data) {
				$('#mapa-de-cama').html(data);
			},


		});
	}



	$('#NewsaveBtn').on('click', function() {
		var sala = $("#new-sala").val();
		var cama = $("#new-cama").val();
		var servicio = $("#new-servicio").val();
		if (sala == '' && cama == '' && servicio == '') {
			alert('Todos son obligatorios');
		} else {
			$('#NewsaveBtn').prop("disabled", true);
			$.ajax({
				type: 'POST',
				url: "<?= base_url('admin_medico/saveNewMapaCama') ?>",
				data: {
					sala: sala,
					cama: cama,
					servicio: servicio,
					centro: <?= $id_centro ?>
				},
				cache: true,
				success: function(data) {
					load_mapa_cama();
					$('#NewsaveBtn').prop("disabled", false);
				},

			});
		}
	})
</script>