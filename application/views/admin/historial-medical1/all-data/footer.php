<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/historial.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script  src="<?=base_url();?>assets/js/pediatrico_footer.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/validationjs.js" charset="UTF-8"></script>
<script src="<?=base_url();?>assets/js/jquery.number.js"></script>
<script type="text/javascript" src="https://www.solodev.com/assets/pagination/jquery.twbsPagination.js"></script>
<script>

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
$('#pagination-obstetrico').twbsPagination({
totalPages: "<?=$count_obs?>",
// the current page that show on start
startPage: 1,

// maximum visible pages
visiblePages: 5,

initiateStartPageClick: true,

// template for pagination links
href: false,

// variable name in href template for page number
hrefVariable: '{{number}}',

// Text labels
first: 'First',
prev: 'Previous',
next: 'Next',
last: 'Last',

// carousel-style pagination
loop: false,

// callback function
onPageClick: function (event, page) {
   $('.page-active').removeClass('page-active');
  $('#page'+page).addClass('page-active');
},

// pagination Classes
paginationClass: 'pagination',
nextClass: 'next',
prevClass: 'prev',
lastClass: 'last',
firstClass: 'first',
pageClass: 'page',
activeClass: 'active',
disabledClass: 'disabled'

});
//pagination obs------------------------------------------------------------------------------
$('#pagination-obs').twbsPagination({
totalPages: "<?=$count_obs?>",
// the current page that show on start
startPage: 1,

// maximum visible pages
visiblePages: 5,

initiateStartPageClick: true,

// template for pagination links
//href: false,

// variable name in href template for page number
//hrefVariable: '{{number}}',

// Text labels
first: 'First',
prev: 'Previous',
next: 'Next',
last: 'Last',

// carousel-style pagination
loop: false,

// callback function
onPageClick: function (event, page) {
   $('.page-active').removeClass('page-active');
  $('#page'+page).addClass('page-active');
 $("#pagination-obs").attr('data-toggle', 'modal')
    .attr('data-target', '#ver_obs');
},

// pagination Classes
paginationClass: 'pagination',
nextClass: 'next',
prevClass: 'prev',
lastClass: 'last',
firstClass: 'first',
pageClass: 'page',
activeClass: 'active',
disabledClass: 'disabled'

});


});


//------------------------------------------------------------------------------------------------------------------------------



//isertion of indications laboratories

$(function() {

$('#saveIndicacioneLab').on('click', function(event) {
	
	
	var operatorl = $("#inserted_by").val();
var historial_id_l = $("#hist_id").val();
	

var lab = [];
$("input[name='laborat']:checked").each(function(){
lab.push(this.value);
});
  
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveFormIndicacionesLab')?>",
data: {laboratorios:lab,operatorl:operatorl,historial_id_l:historial_id_l},

cache: true,
success:function(data){
$("input[name='laborat']").removeAttr('checked');
$('#saveIndicacioneLab').prop("disabled",true);
$("#new_indication_lab").html(data);
$(".hide-expo").slideDown();
$("#tablab").hide();

}  
});

return false;
});
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

$('.select2').select2({ 
placeholder: "SELECCIONE", 
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



//---------------------------------------------------------------------------------------------







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


//====navegador SSR=========================

$("#id_ssr").on('change', function (e) {
e.preventDefault();
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$(".backg").css("background-color", "rgb(207,207,207)");

var hist_id = "<?php echo $id_historial?>";
var id_ssr = $(this).val();

$.ajax({
url: '<?php echo site_url('admin/data_ssr_by_id');?>',
type: 'post',
data:{id_ssr:id_ssr,hist_id:hist_id},
success: function (data) {
//$("#ssr-new").show();
$(".save_ant_ssr_hide").hide();
$("#loadf").hide();
$(".show_modif_ant_ssr").slideDown();
$(".backg").hide();
$("#hide_ssr").hide();
$("#show_ss_data").html(data);

},

});
});




$("#send_name").on('click', function (e) {
e.preventDefault();
var new_name  = $("#new_name").val();
var location  = $("#location").val();
$.ajax({
url: '<?php echo site_url('admin/save_new_name');?>',
type: 'post',
data:{new_name:new_name,location:location},
success: function (data) {
	$('#info_campo').text("éxito de inserción !");
	$('#form_name')[0].reset();
}

});
});






//=================================================================

  $('#bthide').click(function(){
   id = $(this).attr('title');
   txt = $(this).text();
   if (txt == 'Ocultar'){
  
     $(this).text('Mostrar');
	 $(".not-stuck").css("margin-top", "100px");
	 $(".stuck").css("margin-top", "-45px");
	
   }
   else{
      $(this).text('Ocultar');
	  $(".not-stuck").css("margin-top", "180px");
	  $(".stuck").css("margin-top", "-4px");
	  
	  
   }
   $("#"+id).slideToggle(200);
   

  });
  



$('#add-all').on('click', function(event) {
	event.preventDefault();
	
var operator = $("#inserted_by").val();
var historial_id = $("#hist_id").val();
	
var medicamento1 = $("#medicamento1").val();
var presentacion = $("#presentacion").val();
var frecuencia = $("#frecuencia").val();
var cantidad = $("#cantidad").val();
var via = $("#via").val();
var farmacia = $("#farmacia").val();
var branch = $("#branch").val();	
	if(medicamento1==""  || presentacion=="" || frecuencia=="" || via=="" || cantidad==""  || farmacia==""){
		alert("todos los campos son obligatorios !");
	} else {

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveFormIndicaciones')?>",
data: {medicamento1:medicamento1,presentacion:presentacion,operator:operator,frecuencia:frecuencia,cantidad:cantidad,via:via,farmacia:farmacia,branch:branch,historial_id:historial_id},


cache: true,

 
success:function(data){ 

$('#formRecetas')[0].reset();
$(".select-examsis").val("").trigger("change");
$("#new_indication").html(data);
}  
});
	}
return false;
});





function getSuc(val) {
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/getSuc');?>',
	data:'id_esp='+val,
	success: function(data){
		//alert(data);
	$("#branch").prop('disabled', false);
		$("#branch").html(data);
	}
	});
}




//--------------------------------------------------------------

/*
//------------------------

$("#talla").keyup(function() {
  var talla = $(this).val();
  var peso =$("#peso").val();

//calcul imc
//$('.number').number( myNumber, 2 )
var imc_result = peso * talla * talla;
$("#imc").val(imc_result);
});

$('#imc').number( true, 2 );*/
//----------------------------------

$('#ver_ssr').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$('#ver_pedia').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#ver_obs').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#ver_enf_act').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#ver_rehab').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$('#ver_exafisico').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$('#ver_exasis').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$('#ver_con_d').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#ver_con_pren').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});









$('.totgen1').bind('keyup paste', function(){
this.value = this.value.replace(/[^0-9]/g, '');
});

$('.load_pedia').on('click', function(event) {
	$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

});





  
</script>