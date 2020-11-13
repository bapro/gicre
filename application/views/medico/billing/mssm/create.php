
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
<h3 class="h3" align="center" style="color:#38a7bb">MANTENIMIENTO DE SERVICOS POR ARS</h3>
  <!--<a href="<?php echo site_url("medico/import_rates");?>" id="import" ><i class="fa fa-upload" style="font-size:24px"></i> Importar tarifarios </a>
 <i class="fa fa-search" style="font-size:24px"></i> <a href="<?php echo site_url("medico/mssm/$centro");?>" id="import" >Busqueda de tarifarios por centro medico </a>--> 
  <hr id="hr_ad"/>

  <h3 align="center" class="h3">Busqueda de tarifarios </h3> 
<br/><br/>
 </div>

 <div class="col-md-12 searchb table-responsive">
<!--
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


</div>-->



<div class="col-md-6">
<label class="control-label" >Centros</label>
<select class="form-control select2" id="centro_tarif"  >
<option value=""></option>
<?php 

foreach($all_medical_centers as $row)
{ 
?>
<option value="<?=$row->id_m_c?>" ><?=$row->name?></option>
<?php
}
?>
</select>
  <br/><br/>
</div>

<div class="col-md-6" style="border-right:1px solid #38a7bb" >

<label class="control-label"> Medicos</label>

<select  class="form-control select2"  id="id_medico" disabled >

</select>

</div>
<br/><br/>
</div>

</div>
 <hr id="hr_ad"/>
<div id="search_by_service_result"></div>
<div id="medico_tarif_data"></div>
<div id="seguro_tarif_data"></div>
</div>
<br/><br/>
</div>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script>


$('#id_medico').on('change', function () {
var doct_tarif  = $(this).val();
window.location.href="<?php echo base_url(); ?>medico/display_tarif_doc?doct_tarif="+doct_tarif;
});



$('#centro_tarif').on('change', function () {
var id_medical_center  = $(this).val();
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('medico/get_doc_centro');?>',
	data:'id_medical_center='+id_medical_center,
	success: function(data){
	$("#id_medico").prop('disabled', false);
		$("#id_medico").html(data);
	
		
	},
	});
});





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
	url: '<?php echo site_url('admin_medico/get_category_name');?>',
	data:'cat='+val,
	success: function(data){
	$("#id_tarif").prop('disabled', false);
		$("#id_tarif").html(data);
	
		
	},
	});
}

//==================================================
$('#id_tarif').on('change', function() {

$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id_tarif= $(this).val();
$.get( "<?php echo base_url();?>medico/mssm_service_data?id_tarif="+id_tarif, function( data ){
$(".loadf").hide();
$('#search_by_service_result').html(data); 
});
})


//====================================================================
/*
 $('#seguro_id').on('change', function () {
$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var seguro_id  = $(this).val();
$.ajax({
type: "POST",
url: '<?php echo site_url('medico/display_tarif_seguro');?>',
data:{seguro_id:seguro_id},
success: function(data){
$("#medico_tarif_data").hide();
$(".loadf").hide();
$("#seguro_tarif_data").show();
$("#seguro_tarif_data").html(data);
$("html, body").animate({ scrollTop: 430 });

},
});
});*/

</script>

</html>