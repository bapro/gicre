<style type="text/css">

.custom_model{height: 80%;width: 40%;background-color: #fff;margin: 0 auto}
</style>

<?php

$id_rdv=$this->db->select('id_rdv')->where('paciente',$historial_id) ->where('medico',$user_id) ->where('filter_date',date('Y-m-d'))->order_by('id_rdv','desc') ->limit(1)->get('factura2')->row('id_rdv');
if($id_rdv){
	$id_rdv=$id_rdv;
}else{
	$id_rdv=0;
}


$id_apoint=$this->db->select('id_apoint')->where('id_patient',$historial_id)->where('doctor',$user_id)->order_by('id_apoint','desc')->limit(1)->get('rendez_vous')->row('id_apoint');


$id_segu=$this->db->select('seguro_medico')->where('id_p_a',$historial_id)->get('patients_appointments')->row('seguro_medico');
$type=$this->db->select('type')->where('id_m_c',$centro_medico)->get('medical_centers')->row('type');


$area1 = encrypt_url($areaid);
$historial_id1 = encrypt_url($historial_id);
$user_id1 = encrypt_url($user_id);
$centro_medico1 = encrypt_url($centro_medico);
$zero = encrypt_url(0);

?>
<div id="myModal" class="text-center custom_model modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<div class="alert alert-success">
<h2>Datos se guadan con exito  <i class="fa fa-check" style="font-size:24px"></i></h2>
</div>

</div>
<div class="modal-body">
<p>¿ Desea facturar paciente ?</p>
<button type="button" class="btn no-email">No</button>  
<a class="btn btn-primary" href="<?php echo site_url("medico/patient_billing_/$type/$id_apoint/$user_id/$centro_medico/$id_segu")?>" >Si</a>

</div>
</div>



<script>

//------------------------------------------------------------------------------------------------------
function runSpeechRecognition(output,action) {

var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
var recognition = new SpeechRecognition();

// This runs when the speech recognition service starts
recognition.onstart = function() {
action.innerHTML = "<small>escuchando, habla...</small>";
};

recognition.onspeechend = function() {
action.innerHTML = "<small>grabación terminó...</small>";
recognition.stop();
if(output.id =="enf_signopsis"){
$("#copiar-estudios-div").show();
}
}

// This runs when the speech recognition service returns result
recognition.onresult = function(event) {
var transcript = event.results[0][0].transcript;
var confidence = event.results[0][0].confidence;
//output.innerHTML = "<b>Text:</b> " + transcript + "<br/> <b>Confidence:</b> " + confidence*100+"%";
//output.classList.remove("hide");
//output.value=transcript;
output.value += transcript + " ";
};

// start recognition
recognition.start();
}
$("#enviar-email").click(function() {
if($('.correo-input').val() !=""){
var id_pat=$("#hist_id").val();
var email=$(".correo-input").val();
var user_id  = "<?=$user_id?>";
var centro_medico  = "<?=$centro_medico?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SendHistToPatient')?>",
data: {id_pat:id_pat,email:email,user_id:user_id,centro_medico:centro_medico},
success:function(data){
alert('¡La historia clínica ha sido enviado con éxito!');
location.reload(true); 
}  
});

} else{
$('.correo-input').focus();	
}
});


$("#enviar-email").click(function() {
$('.email-patient').show(); 
});




$(".no-email").click(function() {

stayInHist();

});


function stayInHist(){
var area1 = "<?=$area1?>";
var historial_id1 = "<?=$historial_id1?>";
var user_id1 = "<?=$user_id1?>";
var centro1 = "<?=$centro_medico1?>";
var zero="<?=$zero?>";

if(<?=$areaid?>==0){
 window.location.href = '<?php echo site_url('admin/historial_medical');?>/' + historial_id1 + "/" + user_id1 + "/" + area1 + "/" + centro1 + "/" + zero + "/" + user_id1;

}else{
 window.location.href = '<?php echo site_url('medico/historial_medical');?>/' + historial_id1 + "/" + user_id1 + "/" + area1 + "/" + centro1 + "/" + zero + "/" + user_id1;
		
}
	
}




$(".hide-all-btn-when-incaciones").click(function() {
  $('#save_ant_gen').hide(); 
});




$(".hide-all-btn-when-incaciones").click(function() {
  $('#save_ant_gen').hide(); 
});


$(".show-all-btn-when").click(function() {
$('#save_ant_gen').show(); 
});
function clickSingleA(a)
{
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

items = document.querySelectorAll('.left_hit.active');
if(items.length) 
{
items[0].className = 'left_hit';
}

a.className = 'left_hit active';
$("html, body").animate({ scrollTop: 0 }, 500);
}


$("body").click(function() {
$(".required-menu").fadeOut();$(".tab-enf-act").removeClass("text-danger");
})

   
	
	 $select = $("#hab_t_drug").off("change");
    // and if country then bind it
     $select.on("change", function(e) {           
         $('#hab_t_drug option[value="ninguno"]').remove();
	 });

//**************************************************************************************************************
var timerped = null;
$('.selectpedia').keydown(function(){
       clearTimeout(timerped); 
       timerped = setTimeout(getPatientMedicaPed, 1000)
});

function getPatientMedicaPed() {
	var id_pat=$("#hist_id").val();
	 var medica= $(".selectpedia").val();
	 var part= "pedia";
var user_id  = "<?=$user_id?>";
$("#search-patient-medica-pedia").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');

if(medica == "") {
$( "#search-patient-medica-pedia" ).hide();

}else {

$.get( "<?php echo base_url();?>admin_medico/showPatientMedicaPedia?medica="+medica+"&id_pat="+id_pat+"&part="+part+"&user_id="+user_id, function( data ){
$("#search-patient-medica-pedia").html(data); 
			   
});
}
}
//**************************************************************************************************************

var timer = null;
$('.selectmedic').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(getPatientMedica, 1000)
});

function getPatientMedica() {
	var id_pat=$("#hist_id").val();
	 var medica= $(".selectmedic").val();
	 var medicaTime= $(".medica-time").val();
    var part= "gnl";
	var user_id  = "<?=$user_id?>";
$("#search-patient-medica").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
if(medica == "") {
$( "#search-patient-medica" ).hide();

}else {

$.get( "<?php echo base_url();?>admin_medico/showPatientMedica?medica="+medica+"&id_pat="+id_pat+"&part="+part+"&user_id="+user_id+"&medicaTime="+medicaTime, function( data ){
$("#search-patient-medica").html(data); 
			   
});
}
}
//***********************************************************************************************************
loadPatientMedicine();
function loadPatientMedicine()
{
$("#load-patient-medicine").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var hist_id = $("#hist_id").val();
var user_id  = "<?=$user_id?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/loadPatientMedicine",
data: {hist_id:hist_id,user_id:user_id},
method:"POST",
success:function(data){
$('#load-patient-medicine').html(data);
}
});
}
//**********************************************************************************************

loadPatientMedicinePed();
function loadPatientMedicinePed()
{
$("#load-patient-medicine-pedia").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var hist_id = $("#hist_id").val();
var user_id  = "<?=$user_id?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/loadPatientMedicinePed",
data: {hist_id:hist_id,user_id:user_id},
method:"POST",
success:function(data){
$('#load-patient-medicine-pedia').html(data);
}
});
}
//**********************************************************************************************

$('#plan').keyup(function() {

var input = $(this);

if( input.val() != "" ) {

input.css( "border", "1px solid #38a7bb" );

}   
});

$('#evolucion').keyup(function() {

var input = $(this);

if( input.val() != "" ) {

input.css( "border", "1px solid #38a7bb" );

}   
});



//---------------------------------------------------------------------------------------------------------------------------
 $('.required-info').hide();
  $(".deactivate_obs :input").prop("disabled", true);
 //======fecha 1=============================


//---------------------------
$(".select-examsis").select2({
	allowClear: true,
  tags: true
});


$(".select2-ex").select2({
	allowClear: true,
  tags: true
});

$('.select2').select2({ 
allowClear: true,
tags: true,  
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	




    $('.example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );

	//----toggle intrafamilial
	$('#click_viol').click(function () {
	$('#click_viol').text($('#click_viol').text() == 'Ocultar Violencia Intafamiliar' ? 'Violencia Intafamiliar' : 'Ocultar Violencia Intafamiliar'); 
    $("#violenciaform").slideToggle("slow");
    $("#edit_datav").slideToggle("slow");	
	})
	
	
	
//----Sospecha de Abuso o Maltrato
	$('#click_sospecha_mal').click(function () {
	$('#click_sospecha_mal').text($('#click_sospecha_mal').text() == 'Ocultar Sospecha de Abuso o Maltrato' ? 'Sospecha de Abuso o Maltrato' : 'Ocultar Sospecha de Abuso o Maltrato'); 
    $("#sospecha_mal").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	//----ant gnrl
	$('#click_antg').click(function () {
	$('#click_antg').text($('#click_antg').text() == 'Ocultar Antecedentes personales, familiares y patologicos' ? 'Antecedentes personales, familiares y patologicos' : 'Ocultar Antecedentes personales, familiares y patologicos'); 
    $("#show_gnrl").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	//----ant otros_gnrl
	$('#click_otros_ant').click(function () {
	$('#click_otros_ant').text($('#click_otros_ant').text() == 'Ocultar Otros antecedentes' ? 'Otros antecedentes' : 'Ocultar Otros antecedentes'); 
    $("#show_otros_ant").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
		//----ant habitos
	$('#click_habitost').click(function () {
	$('#click_habitost').text($('#click_habitost').text() == 'Ocultar Habitos Toxicos' ? 'Habitos Toxicos' : 'Ocultar Habitos Toxicos'); 
    $("#habitost").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	
	
		//----ant habitos
	$('#click_ant_al_rec_med').click(function () {
	$('#click_ant_al_rec_med').text($('#click_ant_al_rec_med').text() == 'Antecedentes alergicos y reaccion a medicamentos' ? 'Antecedentes alergicos y reaccion a medicamentos' : 'Antecedentes alergicos y reaccion a medicamentos'); 
    $("#ant_al_rec_med").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	$('#alergicos').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})
	
	
	$('#medicaha').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})
	
	



$('#add-all').on('click', function(event) {
	event.preventDefault();
	var user_id  = "<?=$user_id?>";
	var centro  = "<?=$centro_medico?>";
var operator = $("#inserted_by").val();
var historial_id = $("#hist_id").val();
var medicamento1 = $("#medicamento1").val();	
var medicamentoDosis = $("#medicamento-dosis").val();
var presentacion = $("#presentacion").val();
var frecuencia = $("#frecuencia").val();
var cantidad = $("#cantidad").val();
var via = $("#via").val();
var oyo = $("#oyo").val();	
if(centro==0){
alert('Un admin no puede crear recetas');	
}
else if(medicamento1==""  || presentacion=="" || frecuencia=="" || via==""){
		alert("Los campos con '*' son obligatorios !");
	} else {
$("#new_indication").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$("#allRecetas").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveFormIndicaciones')?>",
data: {oyo:oyo,medicamento1:medicamento1,presentacion:presentacion,operator:operator,frecuencia:frecuencia,cantidad:cantidad,
via:via,historial_id:historial_id,user_id:user_id,medicamentoDosis:medicamentoDosis,centro:centro},


cache: true,

 
success:function(data){ 
$("#enviar-email-recetas").prop("disabled",false);
$(".show-btn-print-current").show();
recetasForm();
new_indication();
allRecetas();
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#new_indication').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
 
});
	}
return false;
});



function new_indication()
{
var user_id  = "<?=$user_id?>";
var historial_id = $("#hist_id").val();
var area  = "<?=$areaid?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/new_indication",
data: {historial_id:historial_id,area:area,user_id:user_id},
method:"POST",
success:function(data){
$('#new_indication').html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#new_indication').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}




$('#reset_recetas').on('click', function(event) {
	event.preventDefault();

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/UpdateSingularId')?>",


 
success:function(data){ 

}  
});


});





function allRecetas()
{
var historial_id = $("#hist_id").val();
var user_id  = "<?=$user_id?>";
var area  = "<?=$areaid?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/allRecetas",
data: {historial_id:historial_id,user_id:user_id,area:area},
method:"POST",
success:function(data){
$('#allRecetas').html(data);
}
});
}


function getSuc(val) {
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getSuc');?>',
	data:'id_esp='+val,
	success: function(data){
		if(val !=""){
	$("#branch").prop('disabled', false);
		$("#branch").html(data);
		$("#enviar-email").prop('disabled', false);
		}else{
		$("#enviar-email").prop('disabled', true);	
		}
	}
	});
}





$(".deletelab").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var historial_id_l = $("#historial_id_l").val();
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteHistLab')?>',
data: {id : del_id,historial_id_l:historial_id_l},
success:function(response) {
//update_lab.text($('#myTable tbody tr').length)),
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
$("#hide_c").hide();
$("#new_c").html(data);
$("#new_c").show();
 
}
});
}
})



// save data of indicaciones medicales

$('#saveIndicacionesEstudios').on('click', function(event) {
var estudios = $("#study").val();
var emergency_id = <?=$emergency_id?>;
var cuerpo = $("#cuerpo").val();
var lateralidad = $("#lateralidad").val();
var observaciones = $("#observaciones").val();
var operators = $("#inserted_by").val();
var historial_id_es = $("#hist_id").val();
var centro  = "<?=$centro_medico?>";
	if(estudios==""  || cuerpo=="" ){
		alert("Estudios y Parte del cuerpo son obligatorios !");
	} else {

$("#allEstudios").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveFormIndicacionesEstudios')?>",
data: {centro:centro,estudios:estudios,cuerpo:cuerpo,lateralidad:lateralidad,observaciones:observaciones,operators:operators,historial_id_es:historial_id_es,emergency_id:emergency_id},

cache: true,
success:function(data){ 
$("#enviar-email-estudios").prop("disabled",false);
allEstudios();
},
 
});
	}
return false;
});



function allEstudios()
{
var historial_id = $("#hist_id").val();
var area  = "<?=$areaid?>";
var user_id  = "<?=$user_id?>";
var emergency_id = <?=$emergency_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/allEstudios",
data: {historial_id:historial_id,area:area,user_id:user_id,emergency_id:emergency_id},
method:"POST",
success:function(data){
$('#allEstudios').html(data);
}
});
}



//allLaboratoriosInd();
function allLaboratoriosInd()
{
var emergency_id = <?=$emergency_id?>;
var hist = <?=$hist?>;
var historial_id = $("#hist_id").val();
var operator = $("#inserted_by").val();
var user_id = <?=$user_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/allLaboratoriosInd",
data: {historial_id:historial_id,operator:operator,user_id:user_id,emergency_id:emergency_id,hist:hist},
method:"POST",
success:function(data){
$('#allLaboratoriosInd').html(data);
}
});
}


function allGroupoLab()
{
var emergency_id = <?=$emergency_id?>;
var hist = <?=$hist?>;
var historial_id = $("#hist_id").val();
var operator = $("#inserted_by").val();
var user_id = <?=$user_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/listarGroupLabHist",
data: {historial_id:historial_id,operator:operator,user_id:user_id,emergency_id:emergency_id,hist:hist},
method:"POST",
success:function(data){
$('#list-group').html(data);
},

});
}



$('#reload-labs').on('click', function(event) {
	allLaboratoriosInd();
	allGroupoLab();
})

$('#reload-groupos').on('click', function(event) {
	allGroupoLab();
})




function allLaboratorios()
{
var historial_id = $("#hist_id").val();
var area  = <?=$areaid?>;
var user_id  = <?=$user_id?>;
var emergency_id = <?=$emergency_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/allLaboratorios",
data: {historial_id:historial_id,area:area,user_id:user_id,emergency_id:emergency_id},
method:"POST",
success:function(data){
$('#allLaboratorios').html(data);
}
});
}



//============Ant general======================================
$('#save_ant_gen').on('click', function(event) {
event.preventDefault();
var ant_fam = $("#ant_fam").val();
var ant_prenatales = $("#ant_prenatales").val();
var factories_ambiente = $("#factories_ambiente").val();
var inserted_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();
var user_id  = "<?=$user_id?>";
var centro_medico  = "<?=$centro_medico?>";

var todo_check = [];
 $("input[name='todo']:checked").each(function(){
            todo_check.push(this.value);
 });
 
 var car_nin_check = [];
 $("input[name='car_nin']:checked").each(function(){
            car_nin_check.push(this.value);
 });
var madre_check = [];
 $("input[name='car_m']:checked").each(function(){
            madre_check.push(this.value);
 });
		
var padre_check = [];
 $("input[name='car_p']:checked").each(function(){
            padre_check.push(this.value);
 });
 
var car_h_check = [];
 $("input[name='car_h']:checked").each(function(){
            car_h_check.push(this.value);
 });
 
 var car_pe_check = [];
 $("input[name='car_pe']:checked").each(function(){
            car_pe_check.push(this.value);
 });
 
 var car_text = $("#car_text").val();
 //===============================Hipertension==================
  var nin_check2 = [];
 $("input[name='hip_nin']:checked").each(function(){
            nin_check2.push(this.value);
 });
var madre_check2 = [];
 $("input[name='hip_m']:checked").each(function(){
            madre_check2.push(this.value);
 });
		
var padre_check2 = [];
 $("input[name='hip_p']:checked").each(function(){
            padre_check2.push(this.value);
 });
 
var h_check2 = [];
 $("input[name='hip_h']:checked").each(function(){
            h_check2.push(this.value);
 });
 
 var pe_check2 = [];
 $("input[name='hip_pe']:checked").each(function(){
            pe_check2.push(this.value);
 });
 
 var hip_text = $("#hip_text").val();
 
  //===============================Enf. Cerebrovascular==================
  
    var nin_check3 = [];
 $("input[name='ec_nin']:checked").each(function(){
            nin_check3.push(this.value);
 });
var madre_check3 = [];
 $("input[name='ec_m']:checked").each(function(){
            madre_check3.push(this.value);
 });
		
var padre_check3 = [];
 $("input[name='ec_p']:checked").each(function(){
            padre_check3.push(this.value);
 });
 
var h_check3 = [];
 $("input[name='ec_h']:checked").each(function(){
            h_check3.push(this.value);
 });
 
 var pe_check3 = [];
 $("input[name='ec_pe']:checked").each(function(){
            pe_check3.push(this.value);
 });
 
 var ec_text = $("#ec_text").val();
 
 
//============Epilepsie=============================
var nin_check4 = [];
$("input[name='ep_nin']:checked").each(function(){
nin_check4.push(this.value);
});
var madre_check4 = [];
$("input[name='ep_m']:checked").each(function(){
madre_check4.push(this.value);
});

var padre_check4 = [];
$("input[name='ep_p']:checked").each(function(){
padre_check4.push(this.value);
});

var h_check4 = [];
$("input[name='ep_h']:checked").each(function(){
h_check4.push(this.value);
});

var pe_check4 = [];
$("input[name='ep_pe']:checked").each(function(){
pe_check4.push(this.value);
});

var ep_text = $("#ep_text").val();
 //===============================Asma Bronquial==================
  
var nin_check5 = [];
$("input[name='as_nin']:checked").each(function(){
nin_check5.push(this.value);
});
var madre_check5 = [];
$("input[name='as_m']:checked").each(function(){
madre_check5.push(this.value);
});

var padre_check5 = [];
$("input[name='as_p']:checked").each(function(){
padre_check5.push(this.value);
});

var h_check5 = [];
$("input[name='as_h']:checked").each(function(){
h_check5.push(this.value);
});

var pe_check5 = [];
$("input[name='as_pe']:checked").each(function(){
pe_check5.push(this.value);
});

var as_text = $("#as_text").val();




 //===============================Enf. Repiratoria==================
  
var nin_check05 = []; 
$("input[name='enre_nin']:checked").each(function(){
nin_check05.push(this.value);
});
var madre_check05 = [];
$("input[name='enre_m']:checked").each(function(){
madre_check05.push(this.value);
});

var padre_check05 = [];
$("input[name='enre_p']:checked").each(function(){
padre_check05.push(this.value);
});

var h_check05 = [];
$("input[name='enre_h']:checked").each(function(){
h_check05.push(this.value);
});

var pe_check05 = [];
$("input[name='enre_pe']:checked").each(function(){
pe_check05.push(this.value);
});

var enre_text = $("#enre_text").val();



 //===============================Tuberculosis==================
  
var nin_check6 = [];
$("input[name='tub_nin']:checked").each(function(){
nin_check6.push(this.value);
});
var madre_check6 = [];
$("input[name='tub_m']:checked").each(function(){
madre_check6.push(this.value);
});

var padre_check6 = [];
$("input[name='tub_p']:checked").each(function(){
padre_check6.push(this.value);
});

var h_check6 = [];
$("input[name='tub_h']:checked").each(function(){
h_check6.push(this.value);
});

var pe_check6 = [];
$("input[name='tub_pe']:checked").each(function(){
pe_check6.push(this.value);
});

var tub_text = $("#tub_text").val();

 //===============================Diabetes==================
  
var nin_check7 = [];
$("input[name='dia_nin']:checked").each(function(){
nin_check7.push(this.value);
});
var madre_check7 = [];
$("input[name='dia_m']:checked").each(function(){
madre_check7.push(this.value);
});

var padre_check7 = [];
$("input[name='dia_p']:checked").each(function(){
padre_check7.push(this.value);
});

var h_check7 = [];
$("input[name='dia_h']:checked").each(function(){
h_check7.push(this.value);
});

var pe_check7 = [];
$("input[name='dia_pe']:checked").each(function(){
pe_check7.push(this.value);
});

var dia_text = $("#dia_text").val();
 //===============================Tiroides==================
  
var nin_check8 = [];
$("input[name='tir_nin']:checked").each(function(){
nin_check8.push(this.value);
});
var madre_check8 = [];
$("input[name='tir_m']:checked").each(function(){
madre_check8.push(this.value);
});

var padre_check8 = [];
$("input[name='tir_p']:checked").each(function(){
padre_check8.push(this.value);
});

var h_check8 = [];
$("input[name='tir_h']:checked").each(function(){
h_check8.push(this.value);
});

var pe_check8 = [];
$("input[name='tir_pe']:checked").each(function(){
pe_check8.push(this.value);
});

var tir_text = $("#tir_text").val();
 //===============================Hepatitis==================
  var hep_tipo = $("#hep_tipo").val();
var nin_check9 = [];
$("input[name='hep_nin']:checked").each(function(){
nin_check9.push(this.value);
});
var madre_check9 = [];
$("input[name='hep_m']:checked").each(function(){
madre_check9.push(this.value);
});

var padre_check9 = [];
$("input[name='hep_p']:checked").each(function(){
padre_check9.push(this.value);
});

var h_check9 = [];
$("input[name='hep_h']:checked").each(function(){
h_check9.push(this.value);
});

var pe_check9 = [];
$("input[name='hep_pe']:checked").each(function(){
pe_check9.push(this.value);
});

var hep_text = $("#hep_text").val();
 //===============================Enfermedades Renales==================
var nin_check10 = [];
$("input[name='enfr_nin']:checked").each(function(){
nin_check10.push(this.value);
});
var madre_check10 = [];
$("input[name='enfr_m']:checked").each(function(){
madre_check10.push(this.value);
});

var padre_check10 = [];
$("input[name='enfr_p']:checked").each(function(){
padre_check10.push(this.value);
});

var h_check10 = [];
$("input[name='enfr_h']:checked").each(function(){
h_check10.push(this.value);
});

var pe_check10 = [];
$("input[name='enfr_pe']:checked").each(function(){
pe_check10.push(this.value);
});

var enfr_text = $("#enfr_text").val();
 //===============================Falcemia==================
var nin_check11 = [];
$("input[name='falc_nin']:checked").each(function(){
nin_check11.push(this.value);
});
var madre_check11 = [];
$("input[name='falc_m']:checked").each(function(){
madre_check11.push(this.value);
});

var padre_check11 = [];
$("input[name='falc_p']:checked").each(function(){
padre_check11.push(this.value);
});

var h_check11 = [];
$("input[name='falc_h']:checked").each(function(){
h_check11.push(this.value);
});

var pe_check11 = [];
$("input[name='falc_pe']:checked").each(function(){
pe_check11.push(this.value);
});
var falc_text = $("#falc_text").val();
 //===============================Neoplasias==================
var neop_check12 = [];
$("input[name='neop_nin']:checked").each(function(){
neop_check12.push(this.value);
});
var madre_check12 = [];
$("input[name='neop_m']:checked").each(function(){
madre_check12.push(this.value);
});

var padre_check12 = [];
$("input[name='neop_p']:checked").each(function(){
padre_check12.push(this.value);
});

var h_check12 = [];
$("input[name='neop_h']:checked").each(function(){
h_check12.push(this.value);
});

var pe_check12 = [];
$("input[name='neop_pe']:checked").each(function(){
pe_check12.push(this.value);
});

var neop_text = $("#neop_text").val();
 //===============================ENf. Psiquiatricas==================
var psi_check13 = [];
$("input[name='psi_nin']:checked").each(function(){
psi_check13.push(this.value);
});
var madre_check13 = [];
$("input[name='psi_m']:checked").each(function(){
madre_check13.push(this.value);
});

var padre_check13 = [];
$("input[name='psi_p']:checked").each(function(){
padre_check13.push(this.value);
});

var h_check13 = [];
$("input[name='psi_h']:checked").each(function(){
h_check13.push(this.value);
});

var pe_check13 = [];
$("input[name='psi_pe']:checked").each(function(){
pe_check13.push(this.value);
});

var psi_text = $("#psi_text").val();
 //===============================Obesidad==================
var obs_check14 = [];
$("input[name='obs_nin']:checked").each(function(){
obs_check14.push(this.value);
});
var madre_check14 = [];
$("input[name='obs_m']:checked").each(function(){
madre_check14.push(this.value);
});

var padre_check14 = [];
$("input[name='obs_p']:checked").each(function(){
padre_check14.push(this.value);
});

var h_check14 = [];
$("input[name='obs_h']:checked").each(function(){
h_check14.push(this.value);
});

var pe_check14 = [];
$("input[name='obs_pe']:checked").each(function(){
pe_check14.push(this.value);
});

var obs_text = $("#obs_text").val();
 //===============================Ulcera Peptica==================
var ulp_check15 = [];
$("input[name='ulp_nin']:checked").each(function(){
ulp_check15.push(this.value);
});
var madre_check15 = [];
$("input[name='ulp_m']:checked").each(function(){
madre_check15.push(this.value);
});

var padre_check15 = [];
$("input[name='ulp_p']:checked").each(function(){
padre_check15.push(this.value);
});

var h_check15 = [];
$("input[name='ulp_h']:checked").each(function(){
h_check15.push(this.value);
});

var pe_check15 = [];
$("input[name='ulp_pe']:checked").each(function(){
pe_check15.push(this.value);
});

var ulp_text = $("#ulp_text").val();
 //===============================Artritis, Gota==================
var art_check16 = [];
$("input[name='art_nin']:checked").each(function(){
art_check16.push(this.value);
});
var madre_check16 = [];
$("input[name='art_m']:checked").each(function(){
madre_check16.push(this.value);
});

var padre_check16 = [];
$("input[name='art_p']:checked").each(function(){
padre_check16.push(this.value);
});

var h_check16 = [];
$("input[name='art_h']:checked").each(function(){
h_check16.push(this.value);
});

var pe_check16 = [];
$("input[name='art_pe']:checked").each(function(){
pe_check16.push(this.value);
});

var art_text = $("#art_text").val();


//===============================Enf. Hematológicas (Esp.)==================
var art_check016 = []; 
$("input[name='hem_nin']:checked").each(function(){
art_check016.push(this.value);
});
var madre_check016 = [];
$("input[name='hem_m']:checked").each(function(){
madre_check016.push(this.value);
});

var padre_check016 = [];
$("input[name='hem_p']:checked").each(function(){
padre_check016.push(this.value);
});

var h_check016 = [];
$("input[name='hem_h']:checked").each(function(){
h_check016.push(this.value);
});

var pe_check016 = [];
$("input[name='hem_pe']:checked").each(function(){
pe_check016.push(this.value);
});

var hem_text = $("#hem_text").val();


 //===============================Zika==================
var zika_check17 = [];
$("input[name='zika_nin']:checked").each(function(){
zika_check17.push(this.value);
});
var madre_check17 = [];
$("input[name='zika_m']:checked").each(function(){
madre_check17.push(this.value);
});

var padre_check17 = [];
$("input[name='zika_p']:checked").each(function(){
padre_check17.push(this.value);
});

var h_check17 = [];
$("input[name='zika_h']:checked").each(function(){
h_check17.push(this.value);
});

var pe_check17 = [];
$("input[name='zika_pe']:checked").each(function(){
pe_check17.push(this.value);
});

var zika_text = $("#zika_text").val();
var otros = $("#otros").val();
//=============================Desarollos==========================================
//var textgrueso = $("#text-grueso").val();
//var textfino = $("#text-fino").val();
//var textlenguage = $("#text-lenguage").val();
//var textsocial = $("#text-social").val();
var textmaltrato_g = $("#text-maltrato").val();
var textabuso_g = $("#text-abuso").val();
var textneg_g = $("#text-neg").val(); 
var maltratoemo_g = $("#maltrato-emo").val();
//====================Antecedentes alergicos y reaccion a medicamentos=========================================
var alimentos_al = $("#alimentos_al").val();
var medicamentos_al = $("#medicamentos_al").val();
var otros_al = $("#otros_al").val();
//=============================Otros antecedantes========================================
  var quirurgicos = $("#quirurgicos").val();
var gineco = $("#gineco").val();
var abdominal = $("#abdominal").val();
var toracica = $("#toracica").val();
var transfusion = $("#transfusion").val();
var otros1_g = $("#otros1").val();

//var otros2 = $("#otros2").val();
var grouposang = $("#grouposang").val();
var hepatis = $('input:radio[name=hepatis]:checked').val();
var hpv = $('input:radio[name=hpv]:checked').val();
var toxoide = $('input:radio[name=toxoide]:checked').val();
var tipificacion = $("#tipificacion").val();
var rhoa = $('input:radio[name=rhoa]:checked').val();
//=============Violencia======================================
var violencia1 = $("#violencia1").val();
var violencia2 = $("#violencia2").val();
var violencia3 = $("#violencia3").val();
var violencia4 = $("#violencia4").val();
//=============Habitos toxicos======================================
var hab_c_caf = $("#hab_c_caf").val();
var hab_f_caf = $("#hab_f_caf").val();
var hab_c_pip = $("#hab_c_pip").val();
var hab_f_pip = $("#hab_f_pip").val();
var hab_c_ciga = $("#hab_c_ciga").val();
var hab_f_ciga = $("#hab_f_ciga").val();
var hab_c_al = $("#hab_c_al").val();
var hab_f_al = $("#hab_f_al").val();
var hab_c_tab = $("#hab_c_tab").val();
var hab_f_tab = $("#hab_f_tab").val();
var hookah = $("#hookah").val();
var hab_f_hookah = $("#hab_f_hookah").val();
var hab_t_drug = $("#hab_t_drug").val();
var hab_c_drug = $("#hab_c_drug").val();
var hab_f_drug = $("#hab_f_drug").val();
    
//AnT SSR---------------------------------------------------------------


var optradio = $('input:radio[name=optradio]:checked').val();
var edad = $("#edad").val();

var numero = $("#numero").val();
var sexual = $('input:radio[name=sexual]:checked').val();
var pareja = $("#pareja").val();
var califica_text = $("#califica_text").val();
var menarquia = $("#menarquia").val();
var planif_text = $("#planif_text").val();
var fecha_ul_m = $("#fecha_ul_m").val();
var fechaOvulacion = $("#fecha-ovulacion").text();
var semanaFertil = $("#semana-fertil").text();
var amenoreaText = $("#amenorea-text").text();
var amenoreaTiempo = $("#amenorea-tiempo").text();
var fecha_ul_m_info = $("#fecha_ul_m_info").text();
var amenorea_text = $("#amenorea-text").text();
var cliclo_text = $("#cliclo_text").val();
var dura_sang = $("#dura_sang").val();
var ant_pap_re_text = $("#ant_pap_re_text").val();
var realiza_auto_text = $("#realiza_auto_text").val();
var planif = $('input:radio[name=planif]:checked').val();
var embara = $('input:radio[name=embara]:checked').val();
var menaop = $('input:radio[name=menaop]:checked').val();
var cliclo = $('input:radio[name=cliclo]:checked').val();
var dismeno = $('input:radio[name=dismeno]:checked').val();
var ant_pap_re = $('input:radio[name=ant_pap_re]:checked').val();
var realiza_auto = $('input:radio[name=realiza_auto]:checked').val();
var fecha_ul_mama = $('input:radio[name=fecha_ul_mama]:checked').val();
var cant_sang = $('input:radio[name=cant_sang]:checked').val();
var nuligesta = $('input:radio[name=nuligesta]:checked').val();
var complica = $('input:radio[name=complica]:checked').val();
var complica_dur = $('input:radio[name=complica_dur]:checked').val();
var infec_tran = $('input:radio[name=infec_tran]:checked').val();
var califica = $('input:radio[name=califica]:checked').val();
var utilizo = $('input:radio[name=utilizo]:checked').val();
var sexual2 = $('input:radio[name=sexual2]:checked').val();
var fecha_ul_pap = $('input:radio[name=fecha_ul_pap]:checked').val();
var totalGest = $("#totalGest").val();
var e = $("#e").val();
var p = $("#p").val();
var a = $("#a").val();
var c = $("#c").val();
var complica_text = $("#complica_text").val();
var otro_infeccion1 = $("#otro_infeccion1").val();
var complica_dur_text = $("#complica_dur_text").val();
var sifilisc = [];
$("input[name='sifilis']:checked").each(function(){
sifilisc.push(this.value);
});

var gonorreac = [];
$("input[name='gonorrea']:checked").each(function(){
gonorreac.push(this.value);
});


var clamidiac = [];
$("input[name='clamidia']:checked").each(function(){
clamidiac.push(this.value);
});


/*----------------------------obstetrico-----------------------------------------	*/
var operationobs = $("#operationobs").val();


//if($(".required-input").val() == ""){
//$('.required-info').fadeIn();
//return false;
//};

var dia1  = $('input:radio[name=dia1]:checked').val();

var tbc1 = $('input:radio[name=tbc1]:checked').val();
var hip1 = $('input:radio[name=hip1]:checked').val();
var pelv = $('input:radio[name=pelv]:checked').val();
var inf = $('input:radio[name=inf]:checked').val();
var otros1 = $('input:radio[name=otros1]:checked').val();
var otros1_text = $("#otros1_text").val();

var otros2_text = $("#otros2_text").val();
var gem  = $('input:radio[name=gem]:checked').val();
var otros2 = $('input:radio[name=otros2]:checked').val();
var dia2   = $('input:radio[name=dia2]:checked').val();
var tbc2 = $('input:radio[name=tbc2]:checked').val();
var hip2 = $('input:radio[name=hip2]:checked').val();

var fiebre1 = [];
$("input[name='fiebre']:checked").each(function(){
fiebre1.push(this.value);
});
var artra1 = [];
$("input[name='artra']:checked").each(function(){
artra1.push(this.value);
});
var mia1 = [];
$("input[name='mia']:checked").each(function(){
mia1.push(this.value);
});
var exa1 = [];
$("input[name='exa']:checked").each(function(){
exa1.push(this.value);
});
var con1 = [];
$("input[name='con']:checked").each(function(){
con1.push(this.value);
});

var nig11 = [];
$("input[name='nig1']:checked").each(function(){
nig11.push(this.value);
});

var nig22 = [];
$("input[name='nig2']:checked").each(function(){
nig22.push(this.value);
});

var nig33 = [];
$("input[name='nig3']:checked").each(function(){
nig33.push(this.value);
});

var partos = $("#partos").val();
var arbotos = $("#arbotos").val();
var vaginales = $("#vaginales").val();
var viven = $("#viven").val();
var gestas = $("#gestas").val();
var cesareas = $("#cesareas").val();
var muertos1 = $("#muertos1").val();
var nacidov1 = $("#nacidov1").val();
var nacidom1 = $("#nacidom1").val();
var despues1s = $("#despues1s").val();
var otrosc = $("#otrosc").val();
var fin = $("#fin").val();
var rn = $("#rn").val();
var fecha1 = $("#fecha1").val();
var fecha2 = $("#fecha2").val();
var fecha3 = $("#fecha3").val();
var fecha4 = $("#fecha4").val();
var sono1 = $("#sono1").val();
var sono2 = $("#sono2").val();
var sono3 = $("#sono3").val();
var sono4 = $("#sono4").val();
var sonodia1 = $("#sonodia1").val();
var sonodia2 = $("#sonodia2").val();
var sonodia3 = $("#sonodia3").val();
var sonodia4 = $("#sonodia4").val();
var fpp1 = $("#fpp1").val();
var fpp2 = $("#fpp2").val();
var fpp3 = $("#fpp3").val();
var fpp4 = $("#fpp4").val();
var rest1 = $("#rest1").val();
var rest2 = $("#rest2").val();
var rest3 = $("#rest3").val();
var rest4 = $("#rest4").val();
var diarest1 = $("#dia-rest1").val();
var diarest2 = $("#dia-rest2").val();
var diarest3 = $("#dia-rest3").val();
var diarest4 = $("#dia-rest4").val();
var peso1 = $("#peso_obs").val();
var talla1 = $("#talla_obs").val(); 
var fum_cal_ges = $("#fum_cal_ges_obs").val();
var fpp_cal_ges = $("#fpp_cal_ges_obs").val();
var sem_act_a = $("#sem_act_a_obs").val();
var prev_act = $('input:radio[name=prev_act]:checked').val();  
var prev_act_mes = $("#prev_act_mes").val();
 var r2 = $("#2r").val();
 var sencibil = $('input:radio[name=sencibil]:checked').val(); 
var rh = $('input:radio[name=rh]:checked').val();  
var rh_option = $("#rh_option").val();   
var odont = $('input:radio[name=odont]:checked').val();   
var pelvis = $('input:radio[name=pelvis]:checked').val();    
var papani = $('input:radio[name=papani]:checked').val();
var colp = $('input:radio[name=colp]:checked').val(); 
var cevix = $('input:radio[name=cevix]:checked').val();
var vdrl11 = [];
$("input[name='vdrl1']:checked").each(function(){
vdrl11.push(this.value);
});	

var vdrl22 = [];
$("input[name='vdrl2']:checked").each(function(){
vdrl22.push(this.value);
});
var diasmes = $("#diasmes").val();
 
var pu_fecha1 = $("#pu_fecha1").val();
var pu_fecha2 = $("#pu_fecha2").val();
var pu_fecha3 = $("#pu_fecha3").val();
var pu_t1 = $("#pu_t1").val();
var pu_t2 = $("#pu_t2").val();
var pu_t3 = $("#pu_t3").val();
var pu_pul1 = $("#pu_pul1").val();
var pu_pul11 = $("#pu_pul11").val();
var pu_pul2 = $("#pu_pul2").val();
var pu_pul22 = $("#pu_pul22").val();
var pu_pul3 = $("#pu_pul3").val();
var pu_pul33 = $("#pu_pul33").val();
var pu_ten1 = $("#pu_ten1").val();
var pu_ten11 = $("#pu_ten11").val();
var pu_ten2 = $("#pu_ten2").val();
var pu_ten22 = $("#pu_ten22").val();  
var pu_ten3 = $("#pu_ten3").val();
var pu_ten33 = $("#pu_ten33").val(); 
var pu_inv1 = $("#pu_inv1").val();
var pu_inv2 = $("#pu_inv2").val();
var pu_inv3 = $("#pu_inv3").val();
var loquios1 = $("#loquios1").val();  
var loquios2 = $("#loquios2").val();
var loquios3 = $("#loquios3").val(); 
var getidobs = $("#getidobs").val();	

/*save pediatrico*/


//--------------------------------------------------------------------
var evo = $('input:radio[name=evo]:checked').val();  
var evol_text = $("#evol_text").val();
var med = $("#med").val();
var dosis = $("#dosis").val();
var tiempo = $("#tiempo").val();
var edad = $("#edad").val();
var via = $("#via").val();
var tnaci = $('input:radio[name=tnaci]:checked').val();
var describa = $("#describa").val(); 
var edad_gest = $("#edad_gest").val(); 
var pesopd = $("#pesopd").val(); 
var descoa = [];
$("input[name='desco1']:checked").each(function(){
descoa.push(this.value);
});
var talla = $("#talla").val(); 

var descob = [];
$("input[name='desco2']:checked").each(function(){
descob.push(this.value);
});

var lactamat1 = [];
$("input[name='lactamat']:checked").each(function(){
lactamat1.push(this.value);
});

var leche1 = [];
$("input[name='leche']:checked").each(function(){
leche1.push(this.value);
});
var otrosinfo = $("#otrosinfo").val(); 
var traum = $('input:radio[name=traum]:checked').val();
var traum_text = $("#traum_text").val();
var trans = $('input:radio[name=trans]:checked').val(); 
var trans_text = $("#trans_text").val(); 
//---------------------------------------------------------------
var textmaltrato = $("#textmaltrato").val();
var textabuso = $("#textabuso").val();
var textneg = $("#textneg").val();
var maltratoemo = $("#maltratoemo").val();
//--------------------------------------------
var textgrueso = $("#text-grueso").val();
var textfino = $("#text-fino").val();
var textlenguage = $("#text-lenguage").val();
var textsocial = $("#text-social").val();

//--------------------------------------------
var ale1 = [];
$("input[name='ale']:checked").each(function(){
ale1.push(this.value);
});
var hep1 = [];
$("input[name='hep']:checked").each(function(){
hep1.push(this.value);
});
var amig1 = [];
$("input[name='amig']:checked").each(function(){
amig1.push(this.value);
});
var infv1 = [];
$("input[name='infv']:checked").each(function(){
infv1.push(this.value);
});
var asm1 = [];
$("input[name='asm']:checked").each(function(){
asm1.push(this.value);
});

var neum1 = [];
$("input[name='neum']:checked").each(function(){
neum1.push(this.value);
});

var cirug1 = [];
$("input[name='cirug']:checked").each(function(){
cirug1.push(this.value);
});

var otot1 = [];
$("input[name='otot']:checked").each(function(){
otot1.push(this.value);
});

var deng1 = [];
$("input[name='deng']:checked").each(function(){
deng1.push(this.value);
});


var pape1 = [];
$("input[name='pape']:checked").each(function(){
pape1.push(this.value);
});

var diar1 = [];
$("input[name='diar']:checked").each(function(){
diar1.push(this.value);
});

var paras1 = [];
$("input[name='paras']:checked").each(function(){
paras1.push(this.value);
});

var zika1 = [];
$("input[name='zika']:checked").each(function(){
 zika1.push(this.value);
});

var saram1 = [];
$("input[name='saram']:checked").each(function(){
 saram1.push(this.value);
});

var chicun1 = [];
$("input[name='chicun']:checked").each(function(){
 chicun1.push(this.value);
});


var varicela1 = [];
$("input[name='varicela']:checked").each(function(){
 varicela1.push(this.value);
});


var falc1 = [];
$("input[name='falc']:checked").each(function(){
 falc1.push(this.value);
});

var otros_t_text = $("#otros_t_text").val();

//===VACUNACION=========================================

var insert_d = $("#insert_d").val();

var no_ap1 = $("#no_ap11").val();
var bcg1 = $("#bcg1").val();
var resf1 = $("#resf1").val();

var no_ap2 = $("#no_ap22").val();
var bcg2 = $("#bcg2").val();
var resf2 = $("#resf2").val();

var no_ap3 = $("#no_ap33").val();
var  yel3 = $("#yel3").val();
var resf3 = $("#resf3").val();

var no_ap4 = $("#no_ap44").val();
var  bl4 = $("#bl4").val();
var resf4 = $("#resf4").val();

var  no_ap5 = $("#no_ap55").val();
var  yel5 = $("#yel5").val();
var resf5 = $("#resf5").val();

var no_ap6 = $("#no_ap66").val();
var  bl6 = $("#bl6").val();
var resf6 = $("#resf6").val();

var  no_ap7 = $("#no_ap77").val();
var  gr7 = $("#gr7").val();
var resf7 = $("#resf7").val();

var  no_ap8 = $("#no_ap88").val();
var  bll8 = $("#bll8").val();
var resf8 = $("#resf8").val();

var  no_ap9 = $("#no_ap99").val(); 
var  grr9 = $("#grr9").val();
var resf9 = $("#resf9").val();

var  no_ap10 = $("#no_ap1010").val();
var  yel10 = $("#yel10").val();
var resf10 = $("#resf10").val();

var  no_ap11 = $("#no_ap1111").val();
 var bl11 = $("#bl11").val();
 var resf11 = $("#resf11").val();
 
var  no_ap12 = $("#no_ap1212").val();
var gr12 = $("#gr12").val();
var resf12 = $("#resf12").val();

var no_ap13 = $("#no_ap1313").val();
var yel13 = $("#yel13").val();
var resf13 = $("#resf13").val();

var  no_ap14 = $("#no_ap1414").val();
var  bl14 = $("#bl14").val();
var resf14 = $("#resf14").val();

var no_ap15 = $("#no_ap1515").val();
var  bll15 = $("#bll15").val();
var resf15 = $("#resf15").val();

 var no_ap16 = $("#no_ap1616").val();
var  srp16 = $("#bcg16").val();
var resf16 = $("#resf16").val();

var  no_ap17 = $("#no_ap1717").val();
var  bll17 = $("#bll17").val();
var resf17 = $("#resf17").val();

var  no_ap18 = $("#no_ap1818").val();
 var grr18 = $("#grr18").val();
 var resf18 = $("#resf18").val();
 var editpedia = "new_pedia";

/*enfermedad actual*/

var enf_motivo = $("#enf_motivo").val();
var enf_signopsis = $("#enf_signopsis").val();
var enf_laboratorios = $("#enf_laboratorios").val();
var enf_estudios = $("#enf_estudios").val();

/*rehabilitacion*/

var marcha_inicio   = $("#marcha_inicio").val();
 var long_mov_der  = $("#long_mov_der").val();
 var  long_mov_izq  = $("#long_mov_izq").val();
 var long_simetria = $("#long_simetria").val();
var long_fluidez   = $("#long_fluidez").val();
 var long_traject   = $("#long_traject ").val();
 var  long_tronco  = $("#long_tronco").val();
 var long_postura = $("#long_postura").val();
 var equi_sentado   = $("#equi_sentado").val();
 var equi_levantarse  = $("#equi_levantarse").val();
 var  equi_intentos  = $("#equi_intentos").val();
 var equi_biped1 = $("#equi_biped1").val();
var equi_biped2   = $("#equi_biped2").val();
 var equi_emp  = $("#equi_emp").val();
 var equi_ojos  = $("#equi_ojos").val();
 var equi_vuelta = $("#equi_vuelta").val();
 var equi_sentarse   = $("#equi_sentarse").val();
 var eval_balsys  = $("#eval_balsys").val();
 var  eval_movim   = $("#eval_movim").val();
 var eval_monop = $("#eval_monop").val();
var criteria_intens   = $("#criteria_intens").val();
 var criteria_cuidado1  = $("#criteria_cuidado1").val();
 var levantar_peso  = $("#levantar_peso").val();
 var criteria_caminar = $("#criteria_caminar").val();
 var criteria_estar_sent   = $("#criteria_estar_sent").val();
 var criteria_dormir  = $("#criteria_dormir").val();
 var criteria_sexual  = $("#criteria_sexual").val();
 var criteria_vida = $("#criteria_vida").val();
 
  //------examen fis otorino--------------------------
var oido1 = $("#oido1").val();
var oido2 = $("#oido2").val();
var nariz = $("#nariz").val();
var boca = $("#boca").val();
var otorrino_cuello1 = $("#otorrino-cuello1").val();
var otorrino_cuello2 = $("#otorrino-cuello2").val();
var observaciones_ot = $("#observaciones-ot").val();

 //save examen fisico
 
 //------Signos vitales--------------------------
var peso = $("#peso").val();
var kg = $("#kg").val();
var talla = $("#talla-ef").val();
var pulgada = $("#pulgada-exf").val();
var imc = $("#imc").val();
var ta = $("#ta").val();
var fr = $("#fr").val();
var fc = $("#fc").val();
var hg = $("#hg").val();
var tempo = $("#tempo").val();
var pulso = $("#pulso").val();
var glicemia = $("#glicemia").val();
var radio_signo= $("input[name='radio_signo']:checked").val();

//------------------------------Neurologico---------------------
var neuro_text = $("#neuro_text").val();
var cabeza = $("#cabeza").val();
var cuello = $("#cuello").val();
var cabeza_text = $("#cabeza_text").val();
var cuello_text = $("#cuello_text").val();
var abd_insp = $("#abd_insp").val();
var ausc = $("#ausc").val();
var perc = $("#perc").val();
var palpa = $("#palpa").val();
var ext_sup_text = $("#ext_sup_text").val();
var ext_sup = $("#ext_sup").val();
var ext_inf = $("#ext_inf").val();
var ext_inft = $("#ext_inft").val();
var rectal = $("#rectal").val();
var rectal_text = $("#rectal_text").val();
var genitalm = $("#genitalm").val();
var vagina = $("#vagina").val();
var vagina_text = $("#vagina_text").val();
var genitalm_text = $("#genitalm_text").val();
var genitalf = $("#genitalf").val();
var genitalf_text = $("#genitalf_text").val();
var torax = $("#torax").val();
var torax_text = $("#torax_text").val();
var corazon_text = $("#corazon_text").val();
var pulmones_text = $("#pulmones_text").val();
var abdomen_text = $("#abdomen_text").val(); 

//------------------------------Examen de Ambas Mamas--------------------- 
//--------------------left------
var cuad_inf_ext1 = $("#cuad_inf_ext1").val(); 
var mama_izq1 = $("#mama_izq1").val();
var cuad_sup_ext1 = $("#cuad_sup_ext1").val();
var cuad_inf_ext11 = $("#cuad_inf_ext11").val();
var region_retro1 = $("#region_retro1").val();
var region_areola_pezon1 = $("#region_areola_pezon1").val();
var region_ax1 = $("#region_ax1").val();

//-------------------right--------------
var cuad_inf_ext2 = $("#cuad_inf_ext2").val(); 
var mama_izq2 = $("#mama_izq2").val();
var cuad_sup_ext2 = $("#cuad_sup_ext2").val();
var cuad_inf_ext22 = $("#cuad_inf_ext22").val();
var region_retro2 = $("#region_retro2").val();
var region_areola_pezon2 = $("#region_areola_pezon2").val();
var region_ax2 = $("#region_ax2").val();
        
//--------------------Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual---------------------------

var especuloscopia= $("input[name='especuloscopia']:checked").val();
var tacto_bima= $("input[name='tacto_bima']:checked").val();
var cervix  = $("#cervix").val();
var cervix_text  = $("#cervix_text").val();
var utero_text  = $("#utero_text").val();
var anexo_derecho_text  = $("#anexo_derecho_text").val();
var anexo_iz_text  = $("#anexo_iz_text").val();
var inspection_vulval  = $("#inspection_vulval").val();
var inspection_vulval_text  = $("#inspection_vulval_text").val();
var extremidades_inf  = $("#extremidades_inf").val();
var extremidades_inf_text  = $("#extremidades_inf_text").val();
var neuro_s  = $("#neuro_s").val(); 


//--------------------examen sistema--------------------------
var sisneuro  = $("#sisneuro").val();
var neurologico  = $("#neurologico").val();
var siscardio  = $("#siscardio").val();
var cardiova  = $("#cardiova").val();
var sist_uro  = $("#sist_uro").val();
var urogenital  = $("#urogenital").val();
var sis_mu_e  = $("#sis_mu_e").val();
var musculoes  = $("#musculoes").val();
var sist_resp  = $("#sist_resp").val();
var nervioso = $("#nervioso").val();
var linfatico = $("#linfatico").val();
var digestivo = $("#digestivo").val();
var respiratorio = $("#respiratorio").val();
var genitourinario = $("#genitourinario").val();
var sist_diges = $("#sist_diges").val();
var sist_endo = $("#sist_endo").val();
var endocrino = $("#endocrino").val();
var sist_rela = $("#sist_rela").val();
var otros_ex_sis = $("#otros_ex_sis").val();
var dorsales = $("#dorsales").val();

//save conclusion diagnostic
  var plan   = $("#plan").val();
var cied = [];
//$.each($("input[name='cied']:checked"), function(){            
$('.inserted-cied').each(function(){
cied.push($(this).val());
;
});
//alert(cied);
var newMpat = [];
$.each($("input[name='new-med-pat']:checked"), function(){            
newMpat.push($(this).val());
;
});
var proced = $("#proced").val();
 var evolucion = $("#evolucion").val();
var conclusion_radio = $('input:radio[name=conclusion_radio]:checked').val();
var otros_diagnos = $("#otros_diagnos").val();
//Examen Dermatologia-----------------------------------------------------------------------
var derma_tipo = $("#derma_tipo").val();
var derma_tipo_text  = $("#derma_tipo_text").val();
var derma_morfologia = $("#derma_morfologia").val();
var derma_morfologia_text = $("#derma_morfologia_text").val();
var derma_resto = $("#derma_resto").val();
var derma_resto_text = $("#derma_resto_text").val();
var derma_intero = $("#derma_intero").val();
var derma_intero_text = $("#derma_intero_text").val();
var derma_otros_datos = $("#derma_otros_datos").val();
var derma_otros_datos_text = $("#derma_otros_datos_text").val();
var derma_diagno_der_ini = $("#derma_diagno_der_ini").val();

//control prenatal----------------------------------------------------------------------------


 var fecha   = $("#fecha").val();
 var semana  = $("#semana").val();
 var pesocp = $("#pesocp").val();
 
  var tension1   = $("#tension1").val();
 var tension11  = $("#tension11").val();
 
 var alt1 = $("#alt1").val();
 var alt11 = $("#alt11").val();
 var alt111 = $("#alt111").val();
 
  var fetal1   = $("#fetal1").val();
 var fetal11  = $("#fetal11").val();
 
 var edema1   = $("#edema1").val();
 var edema11  = $("#edema11").val();

 var otroscp   = $("#otroscp").val();
 var evolucion  = $("#evolucion").val();

var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();

//-----------------------------control prenatal2 --------------------------

 var fecha2cp   = $("#fecha2cp").val();
 var semana2  = $("#semana2").val();
 var peso2 = $("#peso2").val();
 
  var tension2   = $("#tension2").val();
 var tension22  = $("#tension22").val();
 
 var alt2 = $("#alt2").val();
 var alt22 = $("#alt22").val();
 var alt222 = $("#alt222").val();
 
  var fetal2   = $("#fetal2").val();
 var fetal22  = $("#fetal22").val();
 
 var edema2   = $("#edema2").val();
 var edema22  = $("#edema22").val();
 var otros2cp   = $("#otros2cp").val();
 var evolucion2  = $("#evolucion2").val();

 //---------------------------control prenatal3------------------------------
  var fecha3cp   = $("#fecha3cp").val();
 var semana3  = $("#semana3").val();
 var peso3 = $("#peso3").val();
 
  var tension3   = $("#tension3").val();
 var tension33  = $("#tension33").val();
 
 var alt3 = $("#alt3").val();
 var alt33 = $("#alt33").val();
 var alt333 = $("#alt333").val();
 
  var fetal3   = $("#fetal3").val();
 var fetal33  = $("#fetal33").val();
 
 var edema3   = $("#edema3").val();
 var edema33  = $("#edema33").val();
  var otros3   = $("#otros3").val();
 var evolucion3  = $("#evolucion3").val();
 
 //----------------------control prenatal4-----------------------------------
  var fecha4cp   = $("#fecha4cp").val();
 var semana4  = $("#semana4").val();
 var peso4 = $("#peso4").val();
 
  var tension4   = $("#tension4").val();
 var tension44  = $("#tension44").val();
 
 var alt4 = $("#alt4").val();
 var alt44 = $("#alt44").val();
 var alt444 = $("#alt444").val();
 
  var fetal4   = $("#fetal4").val();
 var fetal44  = $("#fetal44").val();
 
 var edema4   = $("#edema4").val();
 var edema44  = $("#edema44").val();
  var otros4   = $("#otros4").val();
 var evolucion4  = $("#evolucion4").val();
 
 //-------------------------contro prenatal5--------------------------------
 
  var fecha5   = $("#fecha5").val();
 var semana5  = $("#semana5").val();
 var peso5 = $("#peso5").val();
 
  var tension5   = $("#tension5").val();
 var tension55  = $("#tension55").val();
 
 var alt5 = $("#alt5").val();
 var alt55 = $("#alt55").val();
 var alt555 = $("#alt555").val();
 
  var fetal5   = $("#fetal5").val();
 var fetal55  = $("#fetal55").val();
 
 var edema5   = $("#edema5").val();
 var edema55  = $("#edema55").val();
  var otros5   = $("#otros5").val();
 var evolucion5  = $("#evolucion5").val();
 
 //-----------------------------contro prenatal6-----------------------------
 
  var fecha6   = $("#fecha6").val();
 var semana6  = $("#semana6").val();
 var peso6 = $("#peso6").val();
 
  var tension6   = $("#tension6").val();
 var tension66  = $("#tension66").val();
 
 var alt6 = $("#alt6").val();
 var alt66 = $("#alt66").val();
 var alt666 = $("#alt666").val();
 
  var fetal6   = $("#fetal6").val();
 var fetal66  = $("#fetal66").val();
 
 var edema6   = $("#edema6").val();
 var edema66  = $("#edema66").val();
  var otros6   = $("#otros6").val();
 var evolucion6  = $("#evolucion6").val();
 
 //--------------------contro prenatal7-------------------------------------
 
 var fecha7   = $("#fecha7").val();
 var semana7  = $("#semana7").val();
 var peso7 = $("#peso7").val();
 
  var tension7   = $("#tension7").val();
 var tension77  = $("#tension77").val();
 
 var alt7 = $("#alt7").val();
 var alt77 = $("#alt77").val();
 var alt777 = $("#alt777").val();
 
  var fetal7   = $("#fetal7").val();
 var fetal77  = $("#fetal77").val();
 
 var edema7   = $("#edema7").val();
 var edema77  = $("#edema77").val();
  var otros7   = $("#otros7").val();
 var evolucion7  = $("#evolucion7").val();
 
 //----------------------contro prenatal8------------------------------
  var fecha8   = $("#fecha8").val();
 var semana8  = $("#semana8").val();
 var peso8 = $("#peso8").val();
 
  var tension8   = $("#tension8").val();
 var tension88  = $("#tension88").val();
 
 var alt8 = $("#alt8").val();
 var alt88 = $("#alt88").val();
 var alt888 = $("#alt888").val();
 
  var fetal8   = $("#fetal8").val();
 var fetal88  = $("#fetal88").val();
 
 var edema8   = $("#edema8").val();
 var edema88  = $("#edema88").val();
  var otros8   = $("#otros8").val();
 var evolucion8  = $("#evolucion8").val();
 
 //------------------------------control prenal9---------------------------
 
  var fecha9   = $("#fecha9").val();
 var semana9  = $("#semana9").val();
 var peso9 = $("#peso9").val();
 
  var tension9   = $("#tension9").val();
 var tension99  = $("#tension99").val();
 
 var alt9 = $("#alt9").val();
 var alt99 = $("#alt99").val();
 var alt999 = $("#alt999").val();
 
  var fetal9   = $("#fetal9").val();
 var fetal99  = $("#fetal99").val();
 
 var edema9   = $("#edema9").val();
 var edema99  = $("#edema99").val();
  var otros9   = $("#otros9").val();
 var evolucion9  = $("#evolucion9").val();
var centro_medico="<?=$centro_medico?>";

//**************************************************
var od_con_cor  = $("#od_con_cor").val();
var od_sin_con  = $("#od_sin_con").val();
var od_mas_o_meno= $("input[name='od_mas_o_meno']:checked").val();
var od_cor_act  = $("#od_cor_act").val();
var os_sin_con  = $("#os_sin_con").val();
var os_con_cor  = $("#os_con_cor").val();
var os_mas_o_meno= $("input[name='os_mas_o_meno']:checked").val();
var os_cor_act  = $("#os_cor_act").val();

 var  retine1  = $("#retine1").val();
 var retine2 = $("#retine2").val();
var retine3   = $("#retine3").val();
 var retine4  = $("#retine4").val();
 var retine5  = $("#retine5").val();
 var retine6 = $("#retine6").val();
 var retine7   = $("#retine7").val();
 var retine8  = $("#retine8").val();
 

var masomenos1= $("input[name='masomenos1']:checked").val();
var masomenos2= $("input[name='masomenos2']:checked").val();
var masomenos3= $("input[name='masomenos3']:checked").val();
var masomenos4= $("input[name='masomenos4']:checked").val();
var masomenos5= $("input[name='masomenos5']:checked").val();
var masomenos6= $("input[name='masomenos6']:checked").val();
var masomenos7= $("input[name='masomenos7']:checked").val();
var masomenos8= $("input[name='masomenos8']:checked").val();

var ppm  = $("#ppm").val();
var converg  = $("#converg").val();
var ducvers  = $("#ducvers").val();
var convertest  = $("#convertest").val();

var conj1  = $("#conj1").val();
var conj2  = $("#conj2").val();
var cornea1  = $("#cornea1").val();
var cornea2  = $("#cornea2").val();
var pup1  = $("#pup1").val();
var pup2  = $("#pup2").val();
var crist1  = $("#crist1").val();
var crist2  = $("#crist2").val();
var vitreo1  = $("#vitreo1").val();
var vitreo2  = $("#vitreo2").val();
var not_oftm  = $("#not-oftm").val();
var fondos1  = $("#fondos1").val();
var fondos2  = $("#fondos2").val();
var canvasOj = canvas2.toDataURL("image/png");
var canvasFo = canvas21.toDataURL("image/png");
//***************************************************

//--------------------------VALIDATION RULES------------------------------------------------
if(enf_motivo==""){
$("#loadf").hide();
$(".required-menu").slideDown();
$(".tab-enf-act").addClass( "text-danger" );
$("#menu-name-req").html("Enfermdeda Actual." + " <br/> " + "El Motivo de consulta es obligatorio");
for(i=0;i<6;i++) {
$('.tab-enf-act').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
return false;
};
}

if(enf_signopsis==""){
$("#loadf").hide();
$(".required-menu").slideDown();
$(".tab-enf-act").addClass( "text-danger" );
$("#menu-name-req").html("Enfermdeda Actual." + " <br/> " + " El Signopsis es obligatorio");
for(i=0;i<6;i++) {
$('.tab-enf-act').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
return false;
};
}



if(otros_diagnos=="" && !$("input[name='cied']:checked").val())
{
$("#loadf").hide();
$(".required-menu").slideDown();
$("#menu-name-req").html("Conclusion Diagnostica." + " <br/> " + " Marque una en la lista del CE10 o crear nueva");
$(".tab-con-diag").addClass( "text-danger" );
for(i=0;i<6;i++) {
$('.tab-con-diag').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
return false;
};	
}
 else if(plan=="")
{
$("#loadf").hide();
$(".required-menu").slideDown();
$("#menu-name-req").html("Conclusion Diagnostic." + " <br/> " + "  El plan es obligatorio");

$(".tab-con-diag").addClass( "text-danger" );
for(i=0;i<6;i++) {
$('.tab-con-diag').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
return false;
};	
}

else {
$('#save_ant_gen').prop("disabled",true);
$("#save_ant_gen").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

//--------------------------------------------------------------------------
if(user_id !=344){
 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/saveAntecedentes')?>",
data: {todo_check:todo_check,car_nin_check:car_nin_check,madre_check:madre_check,padre_check:padre_check,car_h_check:car_h_check,car_pe_check:car_pe_check,car_text:car_text,
/*hipertencion*/nin_check2:nin_check2,madre_check2:madre_check2,padre_check2:padre_check2,h_check2:h_check2,pe_check2:pe_check2,hip_text:hip_text,
/*Enf. Cerebrovascular*/nin_check3:nin_check3,madre_check3:madre_check3,padre_check3:padre_check3,h_check3:h_check3,pe_check3:pe_check3,ec_text:ec_text,
/*Epilepsie*/nin_check4:nin_check4,madre_check4:madre_check4,padre_check4:padre_check4,h_check4:h_check4,pe_check4:pe_check4,ep_text:ep_text,
/*Asma Bronquial*/nin_check5:nin_check5,madre_check5:madre_check5,padre_check5:padre_check5,h_check5:h_check5,pe_check5:pe_check5,as_text:as_text,
/*Enf. Repiratoria (Esp.)*/nin_check05:nin_check05, madre_check05:madre_check05, padre_check05:padre_check05, h_check05:h_check05, pe_check05:pe_check05,enre_text:enre_text,
/*Tuberculosis*/nin_check6:nin_check6,madre_check6:madre_check6,padre_check6:padre_check6,h_check6:h_check6,pe_check6:pe_check6,tub_text:tub_text,
/*Diabetes*/nin_check7:nin_check7,madre_check7:madre_check7,padre_check7:padre_check7,h_check7:h_check7,pe_check7:pe_check7,dia_text:dia_text,
/*Tiroides*/nin_check8:nin_check8,madre_check8:madre_check8,padre_check8:padre_check8,h_check8:h_check8,pe_check8:pe_check8,tir_text:tir_text,
/*Hepatitis*/hep_tipo:hep_tipo,nin_check9:nin_check9,madre_check9:madre_check9,padre_check9:padre_check9,h_check9:h_check9,pe_check9:pe_check9,hep_text:hep_text,			
/*Enfermedades Renales*/nin_check10:nin_check10,madre_check10:madre_check10,padre_check10:padre_check10,h_check10:h_check10,pe_check10:pe_check10,enfr_text:enfr_text,			
/*Falcemia*/nin_check11:nin_check11,madre_check11:madre_check11,padre_check11:padre_check11,h_check11:h_check11,pe_check11:pe_check11,falc_text:falc_text,			
/*Neoplasias*/neop_check12:neop_check12,madre_check12:madre_check12,padre_check12:padre_check12,h_check12:h_check12,pe_check12:pe_check12,neop_text:neop_text,			
/*ENf. Psiquiatricas*/psi_check13:psi_check13,madre_check13:madre_check13,padre_check13:padre_check13,h_check13:h_check13,pe_check13:pe_check13,psi_text:psi_text,			
/*Obesidad*/obs_check14:obs_check14,madre_check14:madre_check14,padre_check14:padre_check14,h_check14:h_check14,pe_check14:pe_check14,obs_text:obs_text,			
/*Ulcera Peptica*/ulp_check15:ulp_check15,madre_check15:madre_check15,padre_check15:padre_check15,h_check15:h_check15,pe_check15:pe_check15,ulp_text:ulp_text,			
/*Artritis, Gota*/art_check16:art_check16,madre_check16:madre_check16,padre_check16:padre_check16,h_check16:h_check16,pe_check16:pe_check16,art_text:art_text,			
/*Enf. Hematológicas (Esp.)*/art_check016:art_check016, madre_check016:madre_check016, padre_check016:padre_check016, h_check016:h_check016, pe_check016:pe_check016, hem_text:hem_text,
/*Zika*/zika_check17:zika_check17,madre_check17:madre_check17,padre_check17:padre_check17,h_check17:h_check17,pe_check17:pe_check17,zika_text:zika_text,otros:otros,
textmaltrato_g:textmaltrato_g,textabuso_g:textabuso_g,textneg_g:textneg_g,maltratoemo_g:maltratoemo_g,
/*Antecedentes alergicos*/alimentos_al:alimentos_al,medicamentos_al:medicamentos_al,otros_al:otros_al,/*violencia*/violencia1:violencia1,violencia2:violencia2,violencia3:violencia3,violencia4:violencia4,
/*Otros antecedentes*/quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1_g:otros1_g,hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,rhoa:rhoa,
/*Habitos toxicos */hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,hab_t_drug:hab_t_drug,hab_c_drug:hab_c_drug,hab_f_drug:hab_f_drug,
hookah:hookah,hab_f_hookah:hab_f_hookah,
/*antssr */fechaOvulacion:fechaOvulacion, semanaFertil:semanaFertil, amenoreaText:amenoreaText, amenoreaTiempo:amenoreaTiempo,
optradio:optradio,edad:edad,numero:numero,sexual:sexual,pareja:pareja,
califica:califica,califica_text:califica_text,utilizo:utilizo,sexual2:sexual2,
planif:planif,planif_text:planif_text,embara:embara,menarquia:menarquia,
fecha_ul_m:fecha_ul_m,menaop:menaop,cliclo:cliclo,cliclo_text:cliclo_text,
dura_sang:dura_sang,dismeno:dismeno,fecha_ul_pap:fecha_ul_pap,ant_pap_re:ant_pap_re,
ant_pap_re_text:ant_pap_re_text,realiza_auto:realiza_auto,realiza_auto_text:realiza_auto_text,
fecha_ul_mama:fecha_ul_mama,p:p,a:a,c:c,e:e,totalGest:totalGest,
otro_infeccion1:otro_infeccion1,cant_sang:cant_sang,nuligesta:nuligesta,complica:complica,
complica_text:complica_text,complica_dur:complica_dur,complica_dur_text:complica_dur_text,
sifilisc:sifilisc,gonorreac:gonorreac,clamidiac:clamidiac,infec_tran:infec_tran,

/*obstetrico*/

getidobs:getidobs,operationobs:operationobs,hist_id:hist_id,inserted_by:inserted_by,dia1:dia1,tbc1:tbc1,hip1:hip1,pelv:pelv,inf:inf,otros1:otros1,otros1_text:otros1_text,
dia2:dia2,tbc2:tbc2,hip2:hip2,gem:gem,otros2:otros2,otros2_text:otros2_text,fiebre1:fiebre1,artra1:artra1,mia1:mia1,exa1:exa1,con1:con1,
nig11:nig11,nig22:nig22,nig33:nig33,partos:partos,arbotos:arbotos,vaginales:vaginales,viven:viven,gestas:gestas,cesareas:cesareas,
muertos1:muertos1,nacidov1:nacidov1,nacidom1:nacidom1,despues1s:despues1s,otrosc:otrosc,fin:fin,rn:rn,fecha1:fecha1,fecha2:fecha2,fecha3:fecha3,
fecha4:fecha4,sono1:sono1,sono2:sono2,sono3:sono3,sono4:sono4,fpp1:fpp1,fpp2:fpp2,fpp3:fpp3,fpp4:fpp4,rest1:rest1,rest2:rest2,rest3:rest3,rest4:rest4,
sonodia1:sonodia1,sonodia2:sonodia2,sonodia3:sonodia3,sonodia4:sonodia4,diarest1:diarest1,diarest2:diarest2,diarest3:diarest3,diarest4:diarest4,
peso1:peso1,talla1:talla1,fum_cal_ges:fum_cal_ges,fpp_cal_ges:fpp_cal_ges,sem_act_a:sem_act_a,prev_act:prev_act,prev_act_mes:prev_act_mes,r2:r2,
rh:rh,sencibil:sencibil,rh_option:rh_option,odont:odont,pelvis:pelvis,papani:papani,colp:colp,cevix:cevix,vdrl11:vdrl11,vdrl22:vdrl22,diasmes:diasmes,
pu_fecha1:pu_fecha1,pu_fecha2:pu_fecha2,pu_fecha3:pu_fecha3,pu_t1:pu_t1,pu_t2:pu_t2,pu_t3:pu_t3,pu_pul1:pu_pul1,pu_pul11:pu_pul11,pu_pul2:pu_pul2,
pu_pul22:pu_pul22,pu_pul3:pu_pul3,pu_pul33:pu_pul33,pu_ten1:pu_ten1,pu_ten11:pu_ten11,pu_ten2:pu_ten2,pu_ten22:pu_ten22,pu_ten3:pu_ten3,pu_ten33:pu_ten33,
pu_inv1:pu_inv1,pu_inv2:pu_inv2,pu_inv3:pu_inv3,loquios1:loquios1,loquios2:loquios2,loquios3:loquios3,editpedia:editpedia,


/*pediatrico*/


ale1:ale1,otros_t_text:otros_t_text,hep1:hep1,amig1:amig1,infv1:infv1,asm1:asm1,neum1:neum1,cirug1:cirug1,otot1:otot1,deng1:deng1,pape1:pape1,diar1:diar1,paras1:paras1,zika1:zika1,saram1:saram1,chicun1:chicun1,varicela1:varicela1,falc1:falc1,
textmaltrato:textmaltrato,textabuso:textabuso,textneg:textneg,maltratoemo:maltratoemo,textsocial:textsocial,textlenguage:textlenguage,textfino:textfino,textgrueso:textgrueso,
evo:evo,evol_text:evol_text,med:med,/*dosis:dosis,tiempo:tiempo,edad:edad,via:via,*/tnaci:tnaci,describa:describa,edad_gest:edad_gest,pesopd:pesopd,talla:talla,descoa:descoa,descob:descob,lactamat1:lactamat1,leche1:leche1,otrosinfo:otrosinfo,traum_text:traum_text,trans_text:trans_text,
insert_d:insert_d, no_ap1:no_ap1, bcg1:bcg1,resf1:resf1,no_ap2:no_ap2,bcg2:bcg2,resf2:resf2,no_ap3:no_ap3,yel3:yel3,resf3:resf3, no_ap4:no_ap4, bl4:bl4, resf4:resf4,no_ap5:no_ap5,yel5:yel5,resf5:resf5,no_ap6:no_ap6, bl6:bl6,resf6:resf6,
no_ap7:no_ap7,gr7:gr7,resf7:resf7,no_ap8:no_ap8,bll8:bll8,resf8:resf8,no_ap9:no_ap9,grr9:grr9,resf9:resf9,no_ap10:no_ap10,yel10:yel10,resf10:resf10,no_ap11:no_ap11,bl11:bl11,resf11:resf11,no_ap12:no_ap12,gr12:gr12,resf12:resf12,no_ap13:no_ap13,yel13:yel13,resf13:resf13,
no_ap14:no_ap14,bl14:bl14,resf14:resf14,no_ap15:no_ap15,bll15:bll15,resf15:resf15,no_ap16:no_ap16,srp16:srp16,resf16:resf16,no_ap17:no_ap17,bll17:bll17,resf17:resf17,no_ap18:no_ap18,grr18:grr18,resf18:resf18,


/*enfermedad actual*/

enf_motivo:enf_motivo,enf_signopsis:enf_signopsis,enf_laboratorios:enf_laboratorios,enf_estudios:enf_estudios,

/*rehabilitacion*/

marcha_inicio:marcha_inicio,long_mov_der:long_mov_der,long_mov_izq:long_mov_izq,long_simetria:long_simetria,
long_fluidez:long_fluidez,long_traject:long_traject,long_tronco:long_tronco,long_postura:long_postura,
equi_sentado:equi_sentado,equi_levantarse:equi_levantarse,equi_intentos:equi_intentos,equi_biped1:equi_biped1,
equi_biped2:equi_biped2,equi_emp:equi_emp,equi_ojos:equi_ojos,equi_vuelta:equi_vuelta,equi_sentarse:equi_sentarse,
eval_balsys:eval_balsys,eval_movim:eval_movim,eval_monop:eval_monop,criteria_intens:criteria_intens,criteria_cuidado1:criteria_cuidado1,
levantar_peso:levantar_peso,criteria_caminar:criteria_caminar,criteria_estar_sent:criteria_estar_sent,criteria_dormir:criteria_dormir,
criteria_sexual:criteria_sexual,criteria_vida:criteria_vida,


/*save examen fisico */


peso:peso,kg:kg,talla:talla, imc:imc, ta:ta,pulgada:pulgada, fr:fr, fc:fc, hg:hg,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemia:glicemia,//signo end
//begin neurologia
neuro_s:neuro_s,neuro_text:neuro_text, cabeza:cabeza, cabeza_text:cabeza_text, cuello:cuello, 
cuello_text:cuello_text,abd_insp:abd_insp, ausc:ausc,perc:perc,palpa:palpa,ext_sup:ext_sup, ext_sup_text:ext_sup_text,
torax:torax, torax_text:torax_text,ext_inf:ext_inf,ext_inft:ext_inft,rectal:rectal,rectal_text:rectal_text,
genitalm_text:genitalm_text,genitalm:genitalm,genitalf_text:genitalf_text,genitalf:genitalf,
corazon_text:corazon_text, pulmones_text:pulmones_text,abdomen_text:abdomen_text,vagina:vagina,vagina_text:vagina_text,
//begin Examen de Ambas Mamas
/*-left */cuad_inf_ext1:cuad_inf_ext1, mama_izq1:mama_izq1, cuad_sup_ext1:cuad_sup_ext1,
cuad_inf_ext11:cuad_inf_ext11, region_retro1:region_retro1, 
region_areola_pezon1:region_areola_pezon1,region_ax1:region_ax1,//left end
/*-right */cuad_inf_ext2:cuad_inf_ext2, mama_izq2:mama_izq2, 
cuad_sup_ext2:cuad_sup_ext2,cuad_inf_ext22:cuad_inf_ext22, region_retro2:region_retro2, 
region_areola_pezon2:region_areola_pezon2,region_ax2:region_ax2,//end Examen de Ambas Mamas
//begin Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual
especuloscopia:especuloscopia, tacto_bima:tacto_bima, cervix:cervix, cervix_text:cervix_text, utero_text:utero_text,
anexo_derecho_text:anexo_derecho_text, anexo_iz_text:anexo_iz_text,
 inspection_vulval:inspection_vulval,
inspection_vulval_text:inspection_vulval_text, extremidades_inf:extremidades_inf,
extremidades_inf_text:extremidades_inf_text, 
//examen-otorrino
oido1:oido1,oido2:oido2,nariz:nariz,boca:boca,otorrino_cuello1:otorrino_cuello1,otorrino_cuello2:otorrino_cuello2,observaciones_ot:observaciones_ot,

//examen sistema--------------------------
sisneuro:sisneuro,neurologico:neurologico,siscardio:siscardio,cardiova:cardiova,
sist_uro:sist_uro,urogenital:urogenital,sis_mu_e:sis_mu_e,musculoes:musculoes,
sist_resp:sist_resp,nervioso:nervioso,linfatico:linfatico,digestivo:digestivo,
respiratorio:respiratorio,genitourinario:genitourinario,sist_diges:sist_diges,
sist_endo:sist_endo,endocrino:endocrino,sist_rela:sist_rela,otros_ex_sis:otros_ex_sis,
dorsales:dorsales,

//examen dermatologia--------------------------
derma_tipo:derma_tipo,derma_tipo_text:derma_tipo_text ,derma_morfologia:derma_morfologia,
derma_morfologia_text:derma_morfologia_text ,derma_resto:derma_resto,derma_resto_text:derma_resto_text,
derma_intero:derma_intero,derma_intero_text:derma_intero_text,derma_otros_datos:derma_otros_datos,
derma_otros_datos_text:derma_otros_datos_text,derma_diagno_der_ini:derma_diagno_der_ini,

//conclusion diagnostic--------------------------
plan:plan,evolucion:evolucion,conclusion_radio:conclusion_radio,proced:proced,cied:cied,newMpat:newMpat,otros_diagnos:otros_diagnos,

 //control prenatal----------------------------------------------------------------------------
 
 fecha:fecha, semana:semana,pesocp:pesocp,
tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
otroscp:otroscp,evolucion:evolucion,
//2
 fecha2cp:fecha2cp, semana2:semana2,peso2:peso2,
tension2:tension2,tension22:tension22,alt2:alt2,alt22:alt22,alt222:alt222,
fetal2:fetal2,fetal22:fetal22, edema2:edema2,edema22:edema22,
otros2cp:otros2cp,evolucion2:evolucion2,
//3
 fecha3cp:fecha3cp, semana3:semana3,peso3:peso3,
tension3:tension3,tension33:tension33,alt3:alt3,alt33:alt33,alt333:alt333,
fetal3:fetal3,fetal33:fetal33, edema3:edema3,edema33:edema33,
otros3:otros3,evolucion3:evolucion3,
//4
 fecha4cp:fecha4cp, semana4:semana4,peso4:peso4,
tension4:tension4,tension44:tension44,alt4:alt4,alt44:alt44,alt444:alt444,
fetal4:fetal4,fetal44:fetal44, edema4:edema4,edema44:edema44,
otros4:otros4,evolucion4:evolucion4,
//5
 fecha5:fecha5, semana5:semana5,peso5:peso5,
tension5:tension5,tension55:tension55,alt5:alt5,alt55:alt55,alt555:alt555,
fetal5:fetal5,fetal55:fetal55, edema5:edema5,edema55:edema55,
otros5:otros5,evolucion5:evolucion5,
//6
 fecha6:fecha6, semana6:semana6,peso6:peso6,
tension6:tension6,tension66:tension66,alt6:alt6,alt66:alt66,alt666:alt666,
fetal6:fetal6,fetal66:fetal66, edema6:edema6,edema66:edema66,
otros6:otros6,evolucion6:evolucion6,
//7
 fecha7:fecha7, semana7:semana7,peso7:peso7,
tension7:tension7,tension77:tension77,alt7:alt7,alt77:alt77,alt777:alt777,
fetal7:fetal7,fetal77:fetal77, edema7:edema7,edema77:edema77,
otros7:otros7,evolucion7:evolucion7,
//8
 fecha8:fecha8, semana8:semana8,peso8:peso8,
tension8:tension8,tension88:tension88,alt8:alt8,alt88:alt88,alt888:alt888,
fetal8:fetal8,fetal88:fetal88, edema8:edema8,edema88:edema88,
otros8:otros8,evolucion8:evolucion8,
//9
 fecha9:fecha9, semana9:semana9,peso9:peso9,
tension9:tension9,tension99:tension99,alt9:alt9,alt99:alt99,alt999:alt999,
fetal9:fetal9,fetal99:fetal99, edema9:edema9,edema99:edema99,
otros9:otros9,evolucion9:evolucion9,

//OFTAMOLOGIA
od_sin_con:od_sin_con,od_con_cor:od_con_cor,od_mas_o_meno:od_mas_o_meno,od_cor_act:od_cor_act,
os_sin_con:os_sin_con,os_con_cor:os_con_cor,os_mas_o_meno:os_mas_o_meno,os_cor_act:os_cor_act,


retine1:retine1,retine2:retine2,retine3:retine3,retine4:retine4,retine5:retine5,
retine6:retine6,retine7:retine7,retine8:retine8,
ppm:ppm,converg:converg,ducvers:ducvers,convertest:convertest,

masomenos1:masomenos1,masomenos2:masomenos2,masomenos3:masomenos3,masomenos4:masomenos4,
masomenos5:masomenos5,masomenos6:masomenos6,masomenos7:masomenos7,masomenos8:masomenos8,

conj1:conj1,conj2:conj2,cornea1:cornea1,cornea2:cornea2,
pup1:pup1,pup2:pup2,crist1:crist1,crist2:crist2,
vitreo1:vitreo1,vitreo2:vitreo2,not_oftm:not_oftm,fondos1:fondos1,fondos2:fondos2,canvasOj:canvasOj,


canvasFo:canvasFo,hist_id:hist_id,inserted_by:inserted_by,user_id:user_id,centro_medico:centro_medico},

cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#result').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  

success:function(data){
if(<?=$id_rdv?>==0){
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})
} else{	
	stayInHist();
} 
}  
});
}else{
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/saveHistorialAlergica')?>",
data: {
ant_fam:ant_fam,ant_prenatales:ant_prenatales,factories_ambiente:factories_ambiente,user_id:user_id,hist_id:hist_id,	
enf_motivo:enf_motivo,enf_signopsis:enf_signopsis,enf_laboratorios:enf_laboratorios,enf_estudios:enf_estudios,centro_medico:centro_medico,
plan:plan,evolucion:evolucion,conclusion_radio:conclusion_radio,proced:proced,cied:cied,newMpat:newMpat,otros_diagnos:otros_diagnos
},
success:function(data){
if(<?=$id_rdv?>==0){
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})
} else{	
	stayInHist();
}

}	
});	
	
}

}
return false;
});

$('.control-prenatal-fecha').mask('00/00/0000', {placeholder: '--/--/----'});
$('input[name="date_fum"]').mask('00/00/0000', {placeholder: '--/--/----'});
$('.totgen').bind('keyup paste', function(){
this.value = this.value.replace(/[^0-9]/g, '');
});




$("#grouposang").on('change', function (e) {

//$("#loadf").fadeIn().fadeOut().html('<span class="load"> <img  width="180px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var grouposang = $(this).val();
$("#tipificacion").val(grouposang);

});


//=======================tipification===========================
jQuery("input[name='tipificacion']").on('click', function(e) {
if($('.ck').is(':checked')) {
$("#mas").show();
$("#menos").hide();
}
else{
$("#menos").show();
$("#mas").hide();
}
});


//=======================tipification===========================
jQuery("input[name='rhoa']").on('click', function(e) {
if($('.ck').is(':checked')) {
$("#mas").show();
$("#menos").hide();
}
else{
$("#menos").show();
$("#mas").hide();
}
});

jQuery("input[name='rhch']").on('click', function(e) {
$("#tip-hide").hide();
$("#tip-show").show();
if($('.ck').is(':checked')) {
$("#mas").show();
$("#menos").hide();
}
else{
$("#menos").show();
$("#mas").hide();
}
});




//=======infeccion transmision sexual
function show1(){
$("#display_ifts").show('slow');
//$("#display_ifts").css("visibility", "visible");
}
function show2(){
$("#display_ifts").hide('slow');
//$("#display_ifts").css("visibility", "hidden");
}
//-----------------------------------------
function show3(){
$("#complica_dur_text").show('slow');
//$("#complica_dur_text").css("visibility", "visible");
}
function show4(){
$("#complica_dur_text").hide('slow');
//$("#complica_dur_text").css("visibility", "hidden");
}
//------------------------------------------------
function show5(){
$("#complica_text").show('slow');
//$("#complica_text").css("visibility", "visible");
}
function show6(){
$("#complica_text").hide('slow');
//$("#complica_text").css("visibility", "hidden");
}

//-----------------------------------------------------
function show7(){
$("#realiza_auto_text").show('slow');
//$("#realiza_auto_text").css("visibility", "visible");
}
function show8(){
$("#realiza_auto_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}


function show9(){
$("#otros_t_text").slideToggle();
//$("#realiza_auto_text").css("visibility", "hidden");
}


function show8(){
$("#realiza_auto_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}


function show18(){
$("#ant_pap_re_text").slideToggle();
//$("#realiza_auto_text").css("visibility", "hidden");
}



function show17(){
$("#ant_pap_re_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}



function show19(){
$("#cliclo_text").slideToggle();
//$("#realiza_auto_text").css("visibility", "hidden");
}



function show20(){
$("#cliclo_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}


$(document).ready(function() {
	
	  $.fn.modal.Constructor.prototype.enforceFocus = function () {
        $(document)
        .off('focusin.bs.modal') // guard against infinite focus loop
        .on('focusin.bs.modal', $.proxy(function (e) {
            if (this.$element[0] !== e.target && !this.$element.has(e.target).length && !$(e.target).closest('.select2-dropdown').length) {
                this.$element.trigger('focus')
            }
        }, this))
    };
})




jQuery("input[name='mf']").on('click', function(e) {
		if($('.chkYes5').is(':checked')) {
		
			  $('.text-maltrato').prop('disabled', false);
		}
		else{
			$('.text-maltrato').prop('disabled', true);
			$('.text-maltrato').val('');
			
		}
});





jQuery("input[name='abss']").on('click', function(e) {
		if($('.chkYes6').is(':checked')) {
		
			  $('.text-abuso').prop('disabled', false);
		}
		else{
			$('.text-abuso').prop('disabled', true);
			$('.text-abuso').val('');
			
		}
});


jQuery("input[name='negs']").on('click', function(e) {
		if($('.chkYes7').is(':checked')) {
		
			  $('.text-neg').prop('disabled', false);
		}
		else{
			$('.text-neg').prop('disabled', true);
			$('.text-neg').val('');
			
		}
});


jQuery("input[name='mems']").on('click', function(e) {
if($('.chkYes8').is(':checked')) {

$('.maltrato-emo').prop('disabled', false);
}
else{
$('.maltrato-emo').prop('disabled', true);
$('.maltrato-emo').val('');

}
});

//--------------------------------------------------------------------------------------------------------------


//Alimentos

$('.checkin_ala').change(function() {
    if ($('.checkin_ala:checked').length) {
        $('#alimentos_al').prop('disabled', true);
		$('#alimentos_al').val('');
	} else {
        $('#alimentos_al').prop('disabled', false);
	}
});

//medicamentos

$('.checkin_meda').change(function() {
    if ($('.checkin_meda:checked').length) {
        $('#medicamentos_al').prop('disabled', true);
		  $('#medicamentos_al').val('');
	 } else {
        $('#medicamentos_al').prop('disabled', false);
	}
});


//otros
$('.checkin_otrosa').change(function() {
	if ($('.checkin_otrosa:checked').length) {
        $('#otros_al').prop('disabled', true);
		$('#otros_al').val('');
		
     } else {
        $('#otros_al').prop('disabled', false);
	 }
});




//Quirurgicos
$('.checkin_qui').change(function() {
    if ($('.checkin_qui:checked').length) {
        $('#quirurgicos').prop('disabled', true);
		$('#quirurgicos').val('');
	 } else {
        $('#quirurgicos').prop('disabled', false);
	 }
});


//Abdominal
$('.checkin_abd').change(function() {
    if ($('.checkin_abd:checked').length) {
        $('#abdominal').prop('disabled', true);
		$('#abdominal').val('');
	 } else {
        $('#abdominal').prop('disabled', false);
	}
});

//Transfusión
$('.checkin_trans').change(function() {
    if ($('.checkin_trans:checked').length) {
        $('#transfusion').prop('disabled', true);
		$('#transfusion').val('');
    } else {
        $('#transfusion').prop('disabled', false);
		
    }
});


//gine obstetrico

$('.checkin_gine').change(function() {
    if ($('.checkin_gine:checked').length) {
        $('#gineco').prop('disabled', true);
		 $('#gineco').val('');
    } else {
        $('#gineco').prop('disabled', false);
		
    }
});

$('.checkin_tora').change(function() {
    if ($('.checkin_tora:checked').length) {
        $('#toracica').prop('disabled', true);
		 $('#toracica').val('');
		
    } else {
        $('#toracica').prop('disabled', false);
		
    }
});





$('.checkin_otros').change(function() {
	 if ($('.checkin_otros:checked').length) {
          $("#otros1").val('');
        $('#otros1').prop('disabled', true);
		 $('#otros1').val('');
		
   } else {
        $('#otros1').prop('disabled', false);
		 
		
    }
});


jQuery("input[name='radiomedi']").on('click', function(e) {
if($('.chM').is(':checked')) {

$('.selectmedic').prop('disabled', false);

}
else{
$('.selectmedic').prop('disabled', true);
$(".selectmedic").val(null).trigger("change");
}
});


$(".right-otro :input").prop("disabled", true);

$('.checkin-right-otro').change(function() {
    if ($('.checkin-right-otro:checked').length) {
        $('.right-otro :input').prop('disabled', true);
		
    } else {
        $('.right-otro :input').prop('disabled', false);
		
    }
});





//violencia infantil
$('.checkin_v1').change(function() {
    if ($('.checkin_v1:checked').length) {
        $('#violencia1').prop('disabled', true);
		  $('#violencia1').val('');
		
    } else {
        $('#violencia1').prop('disabled', false);
		
    }
});

$('.checkin_v2').change(function() {
    if ($('.checkin_v2:checked').length) {
        $('#violencia2').prop('disabled', true);
		  $('#violencia2').val('');
		
    } else {
        $('#violencia2').prop('disabled', false);
		
    }
});

$('.checkin_v3').change(function() {
    if ($('.checkin_v3:checked').length) {
        $('#violencia3').prop('disabled', true);
		 $('#violencia3').val('');
		
    } else {
        $('#violencia3').prop('disabled', false);
		
    }
});

$('.checkin_v4').change(function() {
    if ($('.checkin_v4:checked').length) {
        $('#violencia4').prop('disabled', true);
		 $('#violencia4').val('');
		
    } else {
        $('#violencia4').prop('disabled', false);
		
    }
});


$('#ver_ex_ot').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});




$('#ver_ssr').on('hidden.bs.modal', function () {
	ssrForm();
$(this).removeData('bs.modal');
});


$('#ver_pedia').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#ver_obs').on('hidden.bs.modal', function () {
obsForm();
$(this).removeData('bs.modal');
});

$('#ver_enf_act').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#ver_rehab').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$('#ver_exafisico').on('hidden.bs.modal', function () {
	exaFisiForm();
$(this).removeData('bs.modal');

});


$('#ver_exasis').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$('#ver_derma').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#ver_con_d').on('hidden.bs.modal', function () {
	$(".con-pop-load").hide();
$(this).removeData('bs.modal');

});

$('#ver_con_pren').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});



$('#ver_oft').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});



$('#ver_alergia').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

//--------------------------------------------------------------
$(".peso-in").keyup(function() {
  var peso = $(this).val();
  var talla =$(".talla-in").val();
if(peso==""){
$(".talla-in").prop("disabled", true);
$(".talla-in").val("");
}
else{
$(".talla-in").prop("disabled", false);
};
var ma = peso * 0.45;
$(".kg-in").val(ma);
/*var talla_result= talla * talla;
//calcul imc

var imc_result = ma / talla_result;
$(".imc-in").val(imc_result);*/
});

//------------------------

$(".talla-in").keyup(function() {
  var talla = $(this).val();
  var talla_result= talla * talla;
  var kg =$(".kg-in").val();

//alert(kg);
var imc_result = kg / talla_result;
$(".imc-in").val(imc_result);
});

$('.imc-in').number( true, 2 );



//------------------------

	</script>