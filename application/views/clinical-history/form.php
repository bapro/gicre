   <?php
	if ($conclusion_data == 0) {
		$diagnosticos = "";
		$otros_diagnos = "";
		$con_dia_plan = "";
		$con_dia_procedimiento = "";
		$con_dia_evolucion = "";
		$id_con_diag = 0;
	} else {
		foreach ($show_con_by_id as $row)
			$diagnosticos = $row->diagnostico;
		$con_dia_plan = $row->plan;
		$con_dia_procedimiento = $row->procedimiento;
		$con_dia_evolucion = $row->evolucion;
		$otros_diagnos = $row->otros_diagnos;
		$id_con_diag = $row->id;
		$params2 = array('table' => 'h_c_conclusion_diagno', 'id' => $id_con_diag);
		echo $this->user_register_info->get_operation_info($params2);
	}
	?>
   <div class="col-sm-12">
   	<div class="input-group mb-3">
   		<input type="text" class="form-control search-cie10" placeholder="Buscar CIE10" id="search-cie10-<?= $id_con_diag ?>">
   		<span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
   	</div>
   	<div id="cie10-results-<?= $id_con_diag ?>"></div>
   	<div class="form-floating mb-3">
   		<textarea class="form-control" id="floatingDiagPrDef-<?= $id_con_diag ?>" placeholder="Diagnostico(s) Presuntivo o Definitivo (CIE10)" style="height: 300px">
		<?php
		if ($conclusion_data == 0) {
		} else {
			$values = explode(",", $diagnosticos);

			foreach ($values as $key => $val) {
				echo $val;
			}
		} ?>
		</textarea>
   		<label for="floatingDiagPrDef-<?= $id_con_diag ?>"><span class="fa fa-asterisk" style="color:red"></span> Diagnostico(s) presuntivo o definitivo (CIE10)</label>
   	</div>

   	<div class="form-floating mb-3">
   		<textarea class="form-control" id="floatingDiagOtros-<?= $id_con_diag ?>" placeholder="Otro Diagnostico" style="height: 100px"><?= $otros_diagnos; ?></textarea>
   		<label for="floatingDiagOtros-<?= $id_con_diag ?>">Otro diagnostico</label>
   	</div>

   	<div class="form-floating mb-3">
   		<textarea class="form-control" id="con_dia_plan-<?= $id_con_diag ?>" placeholder="Niguno" style="height: 200px"><?= $con_dia_plan ?></textarea>
   		<label for="con_dia_plan-<?= $id_con_diag ?>"><span class="fa fa-asterisk" style="color:red"></span> Plan</label>
   	</div>
   	<div class="input-group mb-3">
   		<input type="text" class="form-control search-procedimientos" placeholder="Buscar procedimientos" id="search-procedimientos-<?= $id_con_diag ?>">
   		<span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
   	</div>
   	<div id="procedimientos-results-<?= $id_con_diag ?>"></div>
   	<div class="form-floating mb-3">
   		<textarea class="form-control" id="floatingProcedimiento-<?= $id_con_diag ?>" placeholder="Niguno" style="height: 200px"><?= $con_dia_procedimiento ?></textarea>
   		<label for="floatingProcedimiento-<?= $id_con_diag ?>">Procedimientos</label>
   	</div>

   </div>

   <?php if ($conclusion_data == 1) { ?>
   	<div class="float-end">

   		<input type="hidden" value="<?= $id_con_diag ?>" id="id_con_diag">
   		<button type="button" class="btn btn-primary" id="resetFormConDiag">Nuevo</button>
   		<button type="button" class="btn btn-success" id="saveEditConDiag">Guardar </button>
   		<span id="alert_placeholder_cond" style="position:absolute; " class="p-2"></span>

   	</div>

   <?php } ?>
   <script>
   	$(".spinner-border").hide();





   	function searchAuToComplete(keyword) {

   		$.ajax({
   			type: "POST",
   			url: "<?php echo base_url(); ?>conclusion_diagno/searchCie10",
   			data: {
   				keyword: keyword,
   				id_con_diag: <?= $id_con_diag ?>
   			},
   			beforeSend: function() {
   				$("#search-cie10-<?= $id_con_diag ?>").css("background", "#DCDCDC");
   			},
   			success: function(data) {
   				$("#cie10-results-<?= $id_con_diag ?>").show();

   				$("#cie10-results-<?= $id_con_diag ?>").html(data);

   			},

   		});

   	}

   	$("#search-cie10-<?= $id_con_diag ?>").keyup(function() {
   		var keyword = $(this).val();

   		searchAuToComplete(keyword);

   	});


   	$("#search-procedimientos-<?= $id_con_diag ?>").keyup(function() {
   		var keyword = $(this).val();

   		$.ajax({
   			type: "POST",
   			url: "<?php echo base_url(); ?>conclusion_diagno/searchProcedimientos",
   			data: {
   				keyword: keyword,
   				id_con_diag: <?= $id_con_diag ?>
   			},
   			beforeSend: function() {
   				$("#search-procedimientos-<?= $id_con_diag ?>").css("background", "#DCDCDC");
   			},
   			success: function(data) {
   				$("#procedimientos-results-<?= $id_con_diag ?>").show();

   				$("#procedimientos-results-<?= $id_con_diag ?>").html(data);

   			},
   			error: function(jqXHR, textStatus, errorThrown) {
   				alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

   				$('#result-error').html('<p>status code: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
   				console.log('jqXHR:');
   				console.log(jqXHR);
   				console.log('textStatus:');
   				console.log(textStatus);
   				console.log('errorThrown:');
   				console.log(errorThrown);
   			},
   		});

   	});



   	$("#resetFormConDiag").click(function(event) {
   		event.preventDefault();
   		var li = "paginate-condiag-li";
   		var controller = "conclusion_diagno";
   		var div = "conclusion-diag-form";
   		resetForm(li, controller, div);
   	});

   	$('#saveEditConDiag').on('click', function(event) {

   		updateConDiag($("#id_con_diag").val());

   	});






   	//-------------------------------------
   </script>