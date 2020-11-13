
<style>

.pter {pointer-events:none;}
td,th{text-align:left;}

.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}



</style>

<!-- *** welcome message modal box *** -->

 <?php
   
		$centro="centro";
	
 ?>

  <div class="container">
 <span class="loadf"></span>
 <div class="row">
<div class="col-md-12" >

 <h4 class="h4" align="center" style="color:#38a7bb">MANTENIMIENTO DE SERVICOS POR ARS</h4>
 <!--<a href="<?php echo site_url("admin/import_rates");?>" id="import" ><i class="fa fa-upload" style="font-size:24px"></i> Importar tarifarios </a>-->
<i class="fa fa-search" style="font-size:24px"></i> <a href="<?php echo site_url("admin/mssm/$centro");?>" id="import" >Busqueda de tarifarios por centro medico </a> 
  <hr id="hr_ad"/>
   <p align="center" class="h3">Busquador de tarifarios por medico</p> 
 </div>


 <div class="col-md-12 searchb table-responsive">

<div class="col-md-3">
<label class="control-label">Categoria</label>


<select id="categoria" class="form-control select2" onChange="getCatName(this.value);">
<option value="" hidden></option>
<?php 

//foreach($tarif_cat as $row)
foreach($especialidades as $row)
{ 
?>
<option value="<?=$row->id_ar?>"><?=$row->title_area?></option>
<?php
}
?>
</select>


</div>
<div class="col-md-3" style="border-right:1px solid #38a7bb" >

<label class="control-label"> Servicio</label>

<select  class="form-control select2"  id="id_tarif" disabled >

</select>

</div>

<div class="col-md-3">
<label class="control-label" >Medicos</label>
<select class="form-control select2" id="doct_tarif"  >
<option value=""></option>
<?php 

foreach($DOCTORS as $row)
{ 
?>
<option value="<?=$row->id_user?>" ><?=$row->name?></option>
<?php
}
?>
</select>
 <br/><br/>
</div>

<br/><br/>
</div>

</div>
 <hr id="hr_ad"/>
<div id="search_by_service_result"></div>
<div id="medico_tarif_data"></div>
</div>
<br/><br/>





        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script>

$('.select2').select2({
	 width: '100%',
 placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});	


//==================================================
function getCatName(val) {
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/get_category_name');?>',
	data:'cat='+val,
	success: function(data){
	$("#id_tarif").prop('disabled', false);
		$("#id_tarif").html(data);
	
		
	},
	});
}

//==================================================




//====================================================================
$('#doct_tarif').on('change', function () {
var doct_tarif  = $(this).val();
window.location.href="<?php echo base_url(); ?>admin/display_tarif_doc?doct_tarif="+doct_tarif;
});
/*
 $('#doct_tarif').on('change', function () {

$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var doct_tarif  = $(this).val();
$.ajax({
type: "POST",
url: '<?php echo site_url('admin/display_tarif_doc');?>',
data:{doct_tarif:doct_tarif},
success: function(data){
$(".loadf").hide();
$("#medico_tarif_data").show();
$("#medico_tarif_data").html(data);
$("html, body").animate({ scrollTop: 430 });
//$('html, body').animate({ scrollTop: $(document).height() }, 125);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#medico_tarif_data').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
});*/




</script>

</html>