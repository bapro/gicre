<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
td,th{text-align:left}
.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}

</style>

</head>
<h2 class="h2" align="center">GESTION DE FACTURAS Y SEGUROS MEDICOS </h2>
<hr id="hr_ad"/>
<div class="row">
<div class="col-md-12 searchb deactivate_s"> 
<span id='where-search-is-from' style='display:none'>rendez_vous</span>
<div class="col-sm-6 form-group">
<label>Buscar Factura por Médico <input type="radio" value="select-med" name="search-fact-option" class="search-fact-option" checked></label>
<select class="form-control select2 enabled-search" id="select-medico-fac"  >
<option value="0">Seleccione</option>
<?php
 if($perfil=="Asistente Medico"){
	 $disabled='disabled';
	 $sql ="SELECT id_doctor FROM centro_doc_as WHERE id_asdoc =$id_user group by id_doctor";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$nameDoc= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
	echo '<option value="'.$row->id_doctor.'">Dr '.$nameDoc.'</option>';
}
 }elseif($perfil=="Medico"){
	  $disabled='';
	 echo '<option value="'.$id_user.'" selected>Dr '.$name.'</option>';
 }else{
	
  $disabled='disabled';
	   foreach ($queryAm as $rowAm){
	echo '<option value="'.$rowAm->id_user.'">Dr '.$rowAm->name.'</option>';
      } 
	 
 }
?>
</select>

</div>
<div class="col-sm-6 form-group">
<label>Buscar Factura por Centro Médico <input type="radio" value="select-center" name="search-fact-option" class="search-fact-option"></label>
<select class="form-control select2 enabled-search" id="select-centro-fac" disabled >
<option value="0">Seleccione</option>
<?php
 if($perfil=="Asistente Medico"){
	 $querycentro = $this->model_admin->view_as_doctor_centro($id_user);
 } elseif($perfil=="Medico"){
$querycentro = $this->model_medico->getMedicoCentro($id_user);	 
 }else{
$querycentro=$querycentro1->result();
 }

 foreach ($querycentro as $rowmc){
	echo '<option value="'.$rowmc->id_m_c.'">'.$rowmc->name.'  '.$admin_position_centro.'</option>';
}
 
?>
</select>

</div>
<div class="col-md-12"> 
<h6>BUSCADOR DE PACIENTE</h6>
<div class="col-md-3 form-group">
<label>cedula/pasaporte</label>
<input class="form-control search-patient search-patient-ced" type="text" maxlength="11" onkeypress='return onlyNumberNec(event);' <?=$disabled?> />
<div id='missing-cedula'><em></em></div>

</div>
<div class="col-md-2 form-group">
<label>NEC</label>
<input class="form-control search-patient search-patient-nec" type="text"  onkeypress='return onlyNumberNec(event);' <?=$disabled?> />

</div>
<div class="col-md-5 form-group">
<label>Nombres</label>
<input class="form-control search-patient search-patient-nombres" type="text" placeholder='Nombres Apellido1 Apellido2' <?=$disabled?> />
<div id='missing-apellido'><em></em></div>

</div>

</div>
<div class="col-md-6  col-md-offset-2">

<div class="suggesstion-box"></div>

</div>
 </div>
 <!------------------------------------------------------------------------------------>
 <div class="col-md-12">
 <form target="_blank" method='POST' action="<?php echo site_url("printings/get_seguro_date_range");?>" >
<h6>BUSCADOR POR RANGO DE FECHA </h6>
 <p>
 <label>Cual es el tipo de centro médico :</label> <input type="radio"  name="select-centro" value="privado" class="select-centro"   /> privado | <input type="radio" value="publico" class="select-centro" name="select-centro"/> público
   
 </p>
   <div class="col-sm-3 form-group">
    <label>Centro Médico</label>
   <select class="form-control select2 " id="centro-search" name='centro-search' disabled >


   </select>

</div>

<div class="col-sm-2 form-group">
<label>Médico</label>
<select class="form-control select2" name='doctor-rg'  id="doctor-rg"  >

</select>
</div>
<div class="col-md-2 form-group">
        <label>Seguro</label>
    <select class="form-control select2 " id="seguro" name="seguro" disabled >
	  <option value="" hidden></option>
	<?php 

	foreach($search_date_range_seguro_factura as $row)
	{
     $seguro= $this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');		
	?>
	<option value="<?=$row->seguro_medico?>" ><?=$seguro?></option>
	<?php
	}
	?>

   </select>
    </div>
    <div class="col-md-2 form-group">
        <label>Desde</label>
   <select class="form-control select2" id="desde-search" name="desde-search"  >
	 </select>
    </div>
	    <div class="col-md-2 form-group">
        <label>Hasta</label>
   <select class="form-control select2" id="hasta-search" name="hasta-search"  disabled >
	 </select>
	</div>
<div class="col-md-1 form-group">
<br/><button disabled id='btn-seg' type="submit" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></button>
    </div>
</form>
 </div>
 <!------------------------------------------------------------------------------------->
 
 <div class="col-md-12 searchb">
 <h6>REPORTE DE FACTURAS</h6>
 <p>
 <label>Seleccione el tipo de seguro :</label> <input type="radio"  name="select-seguro" value="privado" class="select-seguro"/> privado | <input type="radio" value="general" class="select-seguro" name="select-seguro"/> general
 <span class="loadf"></span>
 </p>
    <div class="col-sm-3 form-group">
    <label>Centro Médico</label>
   <select class="form-control select2 " id="centro"  onChange="getDoc(this.value);" disabled >
	  <option value="" hidden></option>
	<?php 
    foreach($centro as $row)
	{ 
    $centro= $this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');

	?>
	<option value="<?=$row->centro_medico?>" ><?=$centro?></option>
	<?php
	}
	?>

   </select>

</div>
<div class="col-sm-3 form-group">
<label>Médico</label>
<select class="form-control select2"  id="doctor" disabled >

</select>
</div>
<div class="col-sm-3 form-group">
<label>Desde</label>
<select class="form-control select2 " id="desde" disabled >


</select>
</div> 
<div class="col-sm-3 form-group" >
<label>Hasta</label>
<select class="form-control select2 " id="hasta" disabled >


</select>
</div>

 </div>
 
<br/><br/>
</div>
<div class="row"> 
<input id="clone-check-seguro" type="hidden" />

<div id="patientHintNombres"></div>
</div>

 </div>
 <!--container-->

 <br/> <br/>


<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<?php $this->load->view('search/search-patient');?>
 <script>

//-----------------------------REPORTE DE FACTURAS------------------------------------------------------------------------------


$('input[type=radio][name=search-fact-option]').change(function() {
  if($(this).val()=='select-med'){
	$("#select-medico-fac").prop("disabled",false);
	 $("#select-centro-fac").prop("disabled",true);
	 $('#select-centro-fac').val(0).trigger("change");
	 
	
}else{
	$("#select-medico-fac").prop("disabled",true);
	 $("#select-centro-fac").prop("disabled",false);
$('#select-medico-fac').val(0).trigger("change");	 
	
}
});





$('.select-seguro').click(function () {
var checkval = $('input:radio[name=select-seguro]:checked').val();
$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id_user = <?=$id_user?>;
$('#clone-check-seguro').val(checkval);
$("#centro").prop("disabled",false);
getDesde(checkval);
getHasta(checkval);
});

$('.select-centro').click(function () {
var checktype= $('input:radio[name=select-centro]:checked').val();
$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/getCentroFacDateRange');?>",
	data:{checktype:checktype,id_user:<?=$id_user?>,perfil:"<?=$perfil?>",admin_centro:<?=$admin_centro?>},
	success: function(data){
	$("#centro-search").html(data);
	$("#centro-search").prop("disabled",false);
	$("#seguro").prop("disabled",false);
	if(checktype=='publico'){
	$("#doctor-rg").val("").trigger("change.select2");	
	$("#doctor-rg").prop("disabled",true);		
	}else{
		$("#doctor-rg").prop("disabled",false);	
	}
	$(".loadf").hide();
	},
	  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$(".loadf").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
	});
});


function getDesde(checkval) {
$("#desde").prop("disabled",true);
$.ajax({
	type: "GET",
	url: "<?php echo site_url('factura/report_bill_by_desde');?>",
	data:{checkval:checkval,id_user:<?=$id_user?>},
	success: function(data){
	$("#desde").html(data);
	$("#desde").prop("disabled",false);
	$(".loadf").hide();
	},
	 
	});
}



function getHasta(checkval) {
$("#hasta").prop("disabled",true);
$.ajax({
	type: "GET",
	url: "<?php echo site_url('factura/report_bill_by_hasta');?>",
	data:{checkval:checkval,id_user:<?=$id_user?>},
	success: function(data){
	$("#hasta").html(data);
	$("#hasta").prop("disabled",false);
	$(".loadf").hide();
	},
	 
	});
}






function getDoc(val) {
$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$('#doctor_dropdown').val(null).trigger('change');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/get_doc_centro');?>",
	data:{id_centro:val,id_user:<?=$id_user?>},
	success: function(data){
	$("#doctor").prop("disabled",false);
	$("#doctor").html(data);
	$(".loadf").hide();
	},
	  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$(".loadf").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
	});
}




$('#doctor').change(function () {
$("#hasta").val("").trigger("change.select2");

});

$('#centro').change(function () {
$("#hasta").val("").trigger("change.select2");

});


$('#desde').change(function () {
$("#hasta").val("").trigger("change.select2");

});



$("#hasta").change(function(){
var centro = $("#centro").val();
var doctor = $("#doctor").val();
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var checkval= $('#clone-check-seguro').val();
var perfil="<?=$perfil?>";
var id_user="<?=$id_user?>";
if(centro=="")
{
alert("Elige un centro medico.");	
}
else if(desde > hasta ){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta").val("").trigger("change.select2");
} else {
$("#patientHintNombres").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "GET",
url: "<?=base_url('factura/get_fac_date_report')?>",
data: {desde:desde,hasta:hasta,checkval:checkval,perfil:perfil,id_user:id_user,centro:centro,doctor:doctor},
cache: true,
success:function(data){
$( "#patientHintNombres" ).html( data ); 
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#patientHintNombres').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});
}
})

//=--------------SEARCH BY SEGURO DATE RANGE------------------------------

$('#desde-search').change(function () {
$("#hasta-search").prop('disabled',false);
$("#hasta-search").val("").trigger("change.select2");

});

$('#doctor-rg').change(function () {
$("#seguro").prop('disabled',false);
$("#seguro").val("").trigger("change.select2");
$("#hasta-search").val("").trigger("change.select2");
$("#desde-search").val("").trigger("change.select2");

});



$('#centro-search').change(function () {
	if($(this).val()){
	$("#btn-seg").prop("disabled",true);
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	//$("#doctor-rg").prop("disabled",true);
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/get_doc_centro');?>",
	data:{id_centro:$(this).val(),id_user:<?=$id_user?>},
	success: function(data){
	//$("#doctor-rg").prop("disabled",false);
	$("#seguro").prop("disabled",false);
	$("#doctor-rg").html(data);
	$("#hasta-search").val("").trigger("change.select2");
     $("#desde-search").val("").trigger("change.select2");
	$(".loadf").hide();
	},
	 
	});
	}
});

function loadMedico(){
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/loadMedicoFac');?>",
	data:{id_user:<?=$id_user?>},
	success: function(data){
	$("#doctor-rg").html(data);
	$(".loadf").hide();
	},
	 
	});	
}

loadMedico();


$("#seguro").change(function(){
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	$("#desde-search").prop('disabled',true);
	getDateRanch1($(this).val());
	getDateRanch2($(this).val());
	});
	
   function getDateRanch1(id){
	$.ajax({
	type: "GET",
	url: "<?php echo site_url('factura/get_date_range_seguro_patient');?>",
	data:{seguro:id,id_doc:$('#doctor-rg').val(),id_centro:$('#centro-search').val(),sort:1},
	success: function(data){
	$("#desde-search").html(data);
	$("#desde-search").prop('disabled',false);
	$(".loadf").hide();
	},
	 
	}); 
}

   function getDateRanch2(id){
	$.ajax({
	type: "GET",
	url: "<?php echo site_url('factura/get_date_range_seguro_patient');?>",
	data:{seguro:id,id_doc:$('#doctor-rg').val(),id_centro:$('#centro-search').val(),sort:0},
	success: function(data){
	$("#hasta-search").html(data);
	$("#desde-search").prop('disabled',false);
	$(".loadf").hide();
	},
	 
	}); 
}



$("#hasta-search").change(function(){
var seguro = $("#seguro").val();
var centro = $("#centro-search").val();
var hasta = $(this).val();
var desde = $("#desde-search").val();
if(centro=="" && seguro=="")
{
alert("Elige centro y seguro.");
$("#btn-seg").prop('disabled',true);	
}
else if(desde > hasta ){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta-search").val("").trigger("change.select2");
$("#btn-seg").prop('disabled',true);
} else{
$("#btn-seg").prop('disabled',false);	
	
}
})





</script>
