<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  ><?=$text?> </h3><br/>

</div>

<div class="modal-body disable-all" style=" overflow-y: auto;">
<div id="dfgdgdf"></div>
<div class="col-md-6  col-md-offset-3"  >
<?php
if($direct==1){
$medicamentos= $this->model_admin->medicamentos();
$presentacion= $this->model_admin->Presentacion();
$branches= $this->model_admin->branches();
$via = $this->model_admin->via();
$frecuencia = $this->model_admin->frecuencia();
?>
Elegir medicamentos del almacen <input id='select-medicamentos1' type="checkbox"/> 
<form method='post' id='paginatemed'>
<label class="control-label" ><span style="color:red">*</span> Medicamento <em id="ldm1" style='font-size:11px'></em></label>

<select  class="form-control  select2" name="medicamento_ord_med"  id="medicamento1"  >
<option></option>

</select>
<input  type='hidden' id='cantAlmacen1'/>

<label class="control-label" ><span style="color:red">*</span> Cantidad </label>

<input class="form-control" name="cantidad"  id="cantidad1" disabled >
<p><em id='result-cant1'></em></p>
<input  type="hidden" name="operator" value="<?=$user_id?>" >
<input  type="hidden" name="idem" value="<?=$idem?>" >
<input  type="hidden" name="historial_id" value="<?=$id_patient?>" >
<input  type="hidden"   value="" name="sala" >
<input  type="hidden"   value="<?=$centro_id?>" name="centro" >
<input  type="hidden"   value="2" name="printing" >
<label class="control-label" ><span style="color:red">*</span> Presentacion</label>

<select  class="form-control select2" id="presentacion1" name="presentacion_ord_med" >


</select>


<label class="control-label" ><span style="color:red">*</span> Frecuencia</label>

<select  class="form-control select2"   name="frecuencia_ord_med"  >
<?php 

foreach($frecuencia as $row)
{ 
echo '<option value="'.$row->frecuency.'">'.$row->frecuency.'</option>';
}
?>
</select>


<label class="control-label" ><span style="color:red">*</span> Via</label>

<select  class="form-control select2" id="via_ord_med"  name="via_ord_med"  >
<?php 

foreach($via as $row)
{ 
echo '<option value="'.$row->via.'">'.$row->via.'</option>';
}
?>
</select>

<span style="display:none" class="show-oyo">
  <select  class="form-control select2"   name="oyo_ord_med" >
  <option value="" hidden></option>
<option>Ojo izquiedo</option>
<option>Ojo derecho</option>
<option>Ambos ojos </option>

</select>
</span>

<label class="control-label" >Nota</label>
<textarea  class="form-control reset-est" name="nota_ord_med" rows='6' ></textarea>

<br/>
<button type="submit" id='save1' class="btn btn-primary btn-xs">
<i class="fa fa-plus" aria-hidden="true"> Indicar</i>
</button>
</form> 
<?php } else if($direct==2) {

$cuerpo = $this->model_admin->cuerpo();	

?>
<form method="post" class="form-horizontal" id="paginatest">
<input type="hidden" name="historial_ides" value="<?=$id_patient?>">
<input type="hidden" name="operatores" value="<?=$user_id?>">
<input  type="hidden" name="idem" value="<?=$idem?>" >
<input  type="hidden"   value="<?=$centro_id?>" name="centro" >
<input type="hidden" name="sala" value="0" >
<input  type="hidden"   value="2" name="printing" >
<div class="form-group">
<label class="control-label  col-md-3" >Estudios</label>
<div class="col-md-9">
<select  class="form-control  select2"   name="study_ord_med" >
<?php 
$sql ="SELECT sub_groupo FROM centros_tarifarios WHERE groupo LIKE 'Estudios radiológicos' AND centro_id = $centro_id GROUP BY sub_groupo ORDER BY sub_groupo ASC";
$query = $this->db->query($sql);
foreach($query->result() as $row)
{ 
echo '<option value="'.$row->sub_groupo.'">'.$row->sub_groupo.'</option>';
}
?>
</select>

</div>
</div>

<div class="form-group">
<label class="control-label   col-md-3" >Cuerpo</label>
<div class="col-md-9">
<select  class="form-control select2"  name="cuerpo_ord_med" id="" >
<?php 

foreach($cuerpo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Lateralidad</label>
<div class="col-md-9">
<input type="text" name="lateralidad_ord_med"  class="form-control" />
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Observaciones</label>
<div class="col-md-9">
<textarea  class="form-control reset-est" name="observaciones_ord_med" rows='6' ></textarea>

</div>
</div>


<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  id="sub-pag-est"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>

</form>
<?php } elseif($direct==3){?>
<input id='search-ord-med-labpg' class="form-control" placeholder='BUSCAR...' />
<hr/>
<div class="col-md-6" >

<table class="table table-striped table-bordered selectedlabom" id='paginate-lab-ord-medpg' >
 <thead>
<tr style="background:#38a7bb;color:white">
<th style="color:white">LABORATORIOS </th>
<th style="color:white;width:20px">
<i style="font-size:24px;color:white" class="fa fa-angle-double-right" aria-hidden="true"></i>
</th>
</tr>
 </thead>
 <tbody>
<?php 
$sql ="SELECT id_c_taf, sub_groupo FROM centros_tarifarios WHERE groupo LIKE 'Laboratorio' AND centro_id = $centro_id GROUP BY sub_groupo ORDER BY sub_groupo ASC";
$querylab = $this->db->query($sql);

foreach($querylab->result() as $row)
{
$cpt="";
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>	
<tr bgcolor="<?=$colorBg ;?>">
<td  style="width:2px" ><?=$row->sub_groupo?></td>
<td><input type='checkbox' name='laborat' class="check-lab2 btn-dis-or-med" value="<?=$row->id_c_taf?>"  /></td>
</tr>
<?php 
}
?>
</tbody>
</table>
</div>
<div class="col-md-6">
Seleccionado: <span class='show-selected'>0</span>
</div>
<?php } else{ ?>
<form method="post" class="form-horizontal">
<div class="form-group">
<label class="control-label  col-md-3" >Medidas Generales</label>
<div class="col-md-9">
<input  type="hidden" name="idem" value="<?=$idem?>" >
<input  type="hidden"   value="<?=$centro_id?>" name="centro" >
<input type="hidden" name="sala" value="0" >
<input  type="hidden"   value="2" name="printing" >
<select  class="form-control select2"   id="medidas_genp" >
<option>Medidas Generales</option>
<option>Dieta</option>
</select>

</div>
</div>

<div class="form-group">
<label class="control-label   col-md-3" >Descripcion</label>
<div class="col-md-9">
<textarea  class="form-control reset-est" id="descripcion_mgp" rows='6' ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Intervalo De Realizacion</label>
<div class="col-md-9">
<input type="text" id="intervalo_de_realp"  class="form-control" />
</div>
</div>


<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  type="button" id="saveMedGenOrdp"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>

</form>
<?php } ?>
</div>
</div>


<script>
$('#select-medicamentos1').on('click', function() {
if ($(this).is(":checked")) {
	alert(7);
loadAllMedicamentos();
}else{
$("#medicamento1").html("");	
allPresentation();
}
});

function loadAllMedicamentos(){
$("#ldm").html('cargando...');
$.ajax({
url:"<?php echo base_url(); ?>emergency/loadAllMedicamentos",
data: {centro_id:<?=$centro_id?>},
method:"POST",
success:function(data){
$("#medicamento1").html(data);
$("#ldm1").html('');
},

});
}


(function($) {
  $.fn.donetyping = function(callback) {
    var _this = $(this);
    var x_timer;
    _this.keyup(function() {
      clearTimeout(x_timer);
      x_timer = setTimeout(clear_timer, 1000);
    });

    function clear_timer() {
      clearTimeout(x_timer);
      callback.call(_this);
    }
  }
})(jQuery);

$('#cantidad1').donetyping(function(callback) {
var cantidad=parseFloat($("#cantidad1").val());
var cantAlmacen=parseFloat($("#cantAlmacen1").val());
var text;
if(cantidad > cantAlmacen){
text='Hay solamente ' + cantAlmacen + ' disponible';
$("#cantidad1").val('');
}else{
text='';	
}
  $('#result-cant1').text(text).css('color','red');
});




$("#medicamento1").on('change', function(event) {	
getCantidad($(this).val());
$('#cantidad1').prop('disabled',false);
$.ajax({
url:"<?php echo base_url(); ?>emergency/getMedPresentation",
data: {idmed:$(this).val()},
method:"POST",
success:function(data){
$("#presentacion1").html(data);
},

});	
});


function getCantidad(med){
$.ajax({
url:"<?php echo base_url(); ?>emergency/getCantidad",
data: {centro_id:<?=$centro_id?>,med:med},
method:"POST",
success:function(data){
$("#cantAlmacen1").val(data);
},
});	
}

function allPresentation(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/allPresentation",
method:"POST",
success:function(data){
$("#presentacion1").html(data);
},
});	
}



allPresentation();






$('#saveMedGenOrdp').click(function(e){
e.preventDefault();

$("#saveMedGenOrdp").prop('disabled',true);

$.ajax({
url:"<?php echo base_url(); ?>admin_medico/saveMedGenOrd",
data: {medidas_gen:$("#medidas_genp").val(),descripcion_mg:$("#descripcion_mgp").val(),sala:0,
intervalo_de_real:$("#intervalo_de_realp").val(),user_id:<?=$user_id?>,historial_id:<?=$id_patient?>},
method:"POST",
success:function(data){
$("#saveMedGenOrdp").prop('disabled',false);
paginaMedGen();
},
 
});

});




$('.check-lab2').change(function() {
	var labCheckded= $(this).val();
   if ($(this).is(':checked')) {
     var lab= $(this).val();
	$.ajax({
		type:'POST',
		url:'<?=base_url('emergency/saveOrdMedLab')?>',
		data: {lab:lab,historial_id_l:<?=$id_patient?>,user_id:<?=$user_id?>,sala:0,centro:<?=$centro_id?>,idem:<?=$idem?>,printing:2},
		success:function(data) {
		allLaboratoriosOrdMed();
		
      },

	});
} else {
	 var lab=labCheckded;
	$.ajax({
		type:'POST',
		url:'<?=base_url('emergency/DeleteOrdMedLab')?>',
		data: {lab:lab,historial_id_l:<?=$id_patient?>,user_id:<?=$user_id?>,sala:0,centro:<?=$centro_id?>,idem:<?=$idem?>,printing:2},
		success:function(data) {
		allLaboratoriosOrdMed();
	  },

	});
	
} 
 })


	 var $checkboxes = $('.selectedlabom td input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
		$('.show-selected').text(countCheckedCheckboxes);
        if(countCheckedCheckboxes==12){
			$('.selectedlabom td input[type="checkbox"]:not(:checked)').prop("disabled",true);
		}else{
		$('.selectedlabom td input[type="checkbox"]:not(:checked)').prop("disabled",false);	
		}
    });
//--------------------------------------------------------------------------------
$("#via1").change(function() {
  var via = $(this).val();
if(via=="OFTALMICA")
{
	$(".show-oyo").show();
}else
{
	$(".show-oyo").hide();
}
});
$(".select2").select2({
  tags: true
});
//--------------------------------------------------------------------------------
$('#paginatemed').submit(function(e){
e.preventDefault();	
$("#save1").prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>emergency/saveOrdenMedicaRecetas',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
 $("#save1").prop('disabled',false);
 allRecetasOrdMed();
},
});

});

//--------------------------------------------------------------------------------
$('#paginatest').submit(function(e){
e.preventDefault();	
$("#sub-pag-est").prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>emergency/saveOrdenMedicaEst',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
$("#sub-pag-est").prop('disabled',false);
 
paginateEst();
},

});

});

 $("#search-ord-med-labpg").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#paginate-lab-ord-medpg tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>