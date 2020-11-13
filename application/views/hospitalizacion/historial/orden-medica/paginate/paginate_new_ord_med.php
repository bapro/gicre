<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close  close-edit-rec-all"  aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  ><?=$text?> </h3><br/>
<div class='text-center' id='done-edit-med'><strong></strong></div>
</div>
<?php
	$cantidad=1;
	$descuento=0;
	$cobert=0.8;
?>
<div class="modal-body disable-all" style=" overflow-y: auto;">
<div id="dfgdgdf"></div>
<div class="col-md-10  col-md-offset-1"  >
<?php
if($direct==1){
$presentacion= $this->model_admin->Presentacion();
$branches= $this->model_admin->branches();
$via = $this->model_admin->via();
$frecuencia = $this->model_admin->frecuencia();
?>
<form method="post" class="form-horizontal" id="paginatemed1">
<input type="hidden" name="historial_id" value="<?=$id_patient?>">
<input type="hidden" name="operator" value="<?=$user_id?>">
<input  type="hidden"   value="<?=$idsala?>" name="sala" >
<input  type="hidden"   value="0" name="descuento" >
<input  type="hidden"   value="<?=$id_hosp?>" name="id_hosp" >
<input  type="hidden"   value="0.8" name="cobert" >


<div class="form-group">
Elegir medicamentos del almacen <input id='select-medicamentos1' type="checkbox"/>
<label class="control-label  col-md-3" >Medicamento  <em id="ldm2" style='font-size:11px'></em></label>
<div class="col-md-9">
<select  class="form-control  select_edit"   name="medicamento_ord_med" id='med-load-3' >

</select>

</div>
</div>
<div class="form-group">
<label class="control-label  col-md-3" >Cantidad</label>
<div class="col-md-9">
<input class="form-control" name="cantidad"  id="cantidad1" disabled >
<input  type='hidden' id='cantAlmacen1'/>
<p><em id='result-cant1'></em></p>
<input  type="hidden"   value="2" name="printing" >
<input  type="hidden"   value="<?=$centro?>" name="centro" >
</div>
</div>


<div class="form-group">
<label class="control-label   col-md-3" >Presentacion</label>
<div class="col-md-9">
<select  class="form-control select_edit"  name="presentacion_ord_med" id="presentacion1" >

</select>
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Frecuencia</label>
<div class="col-md-9">
<select  class="form-control select_edit"   name="frecuencia_ord_med" id="frecuencia1" >
<?php

foreach($frecuencia as $row)
{

echo "<option value='$row->frecuency'>$row->frecuency</option>";
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Via</label>
<div class="col-md-9">
  <select  class="form-control select_edit"   name="via_ord_med" >
<?php

foreach($via as $row)
{

echo "<option value='$row->via' >$row->via</option>";
}
?>
</select>

<span style="display:none"  class="show-oyo">
  <select  class="form-control select_edit"   name="oyo1" id="oyo1" >
  <option hidden></option>
<option>Ojo izquiedo</option>
<option>Ojo derecho</option>
<option>Ambos ojos </option>

</select>
</span>
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Nota</label>
<div class="col-md-9">
<textarea  class="form-control" name="nota_ord_med" rows='6' ></textarea>
</div>
</div>
<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  id="save-pag-rec"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>

</form>
<?php } else if($direct==2) {
$estudios = $this->model_admin->estudios();
$cuerpo = $this->model_admin->cuerpo();
?>
<form method="post" class="form-horizontal" id="paginatest">
<input type="hidden" name="historial_ides" value="<?=$id_patient?>">
<input type="hidden" name="operatores" value="<?=$user_id?>">
<input  type="hidden"   value="<?=$idsala?>" name="sala" >
<div class="form-group">
<label class="control-label  col-md-3" >Estudios</label>
<div class="col-md-9">

<input  type="hidden"   value="2" name="printing" >
<input  type="hidden"   value="<?=$centro?>" name="centro" >


<input  type="hidden"   value="1" name="cantidad" >
<input  type="hidden"   value="0" name="descuento" >
<input  type="hidden"   value="<?=$id_hosp?>" name="id_hosp" >
<input  type="hidden"   value="0.8" name="cobert" >



<select  class="form-control  select_edit"   name="study_ord_med" >
<?php
$sql ="SELECT sub_groupo, id_c_taf FROM centros_tarifarios WHERE groupo LIKE 'Estudios radiológicos' AND centro_id = $centro GROUP BY sub_groupo ORDER BY sub_groupo ASC";
$query = $this->db->query($sql);
foreach($query->result() as $rows)
{
echo '<option value="'.$rows->id_c_taf.'">'.$rows->sub_groupo.'</option>';
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label   col-md-3" >Cuerpo</label>
<div class="col-md-9">
<select  class="form-control select_edit"  name="cuerpo_ord_med" id="" >
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
<input type="text" id="lateralidad_ord_med" name='lateralidad_ord_med'  class="form-control" />
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Observaciones</label>
<div class="col-md-9">
<textarea  class="form-control reset-est" name="observaciones_ord_med" id="observaciones_ord_med" rows='6' ></textarea>

</div>
</div>


<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  id="sub-pag-est"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>

</form>
<?php } elseif($direct==3){?>
<hr/>
<div class="col-md-6" >

<table class="table table-striped table-bordered selectedlabom" id='paginate-lab-ord-medpg' >
 <thead>
 <tr>
 <td><input id='search-ord-med-labpg' class="form-control" placeholder='BUSCAR...' /></td>
 </tr>
<tr style="background:#38a7bb;color:white">
<th style="color:white">LABORATORIOS </th>
<th style="color:white;width:20px">
<i style="font-size:24px;color:white" class="fa fa-angle-double-right" aria-hidden="true"></i>
</th>
</tr>
 </thead>
 <tbody>
<?php

$sql ="SELECT id_c_taf as id, sub_groupo as name FROM centros_tarifarios WHERE groupo LIKE 'Laboratorio' AND centro_id = 44 GROUP BY sub_groupo ORDER BY sub_groupo ASC";

$query = $this->db->query($sql);

foreach($query->result() as $row)
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
<td  style="width:2px" ><?=$row->name?></td>
<td><input type='checkbox' name='laborat' class="check-lab2 btn-dis-or-med" value="<?=$row->id?>"  /></td>
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
<form method="post" class="form-horizontal" id='saveMedGenOrdp'>
<input type="hidden" name="historial_id" value="<?=$id_patient?>">
<input type="hidden" name="user_id" value="<?=$user_id?>">
<input  type="hidden"   value="<?=$idsala?>" name="sala" />
<?php if($direction==0){?>
<input  type="hidden"   value="1" name="printing" >
<input  type="hidden"   value="0" name="centro" >
<?php } else{?>
<input  type="hidden"   value="2" name="printing" >
<input  type="hidden"   value="<?=$centro?>" name="centro" >
<?php } ?>
<div class="form-group">
<label class="control-label  col-md-3" >Medidas Generales</label>
<div class="col-md-9">
<select  class="form-control select_edit"  name="medidas_gen" >
<option>Medidas Generales</option>
<option>Dieta</option>
</select>

</div>
</div>

<div class="form-group">
<label class="control-label   col-md-3" >Descripcion</label>
<div class="col-md-9">
<textarea  class="form-control reset-est" name="descripcion_mg" rows='6' ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Intervalo De Realizacion</label>
<div class="col-md-9">
<input type="text" name="intervalo_de_real"  class="form-control" />
</div>
</div>


<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  type="submit" id="saveEg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>

</form>
<?php } ?>
</div>
</div>


<script>


$('.close-edit-rec-all').on('click', function () {
$('#newM').modal('hide');

});





$('#select-medicamentos1').on('click', function() {

if ($(this).is(":checked")) {
loadAllMedicamentos();
}else{
$("#med-load-3").html("");
allPresentation();
}
});

function loadAllMedicamentos(){
$("#ldm2").html('cargando...');
$.ajax({
url:"<?php echo base_url(); ?>emergency/loadAllMedicamentos",
data: {centro_id:<?=$centro?>},
method:"POST",
success:function(data){
$("#med-load-3").html(data);
$("#ldm2").html('');
},

});
}



$("#med-load-3").on('change', function(event) {
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
data: {centro_id:<?=$centro?>,med:med},
method:"POST",
success:function(data){
$("#cantAlmacen1").val(data);
},
});
}

allPresentation();
function allPresentation(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/allPresentation",
method:"POST",
success:function(data){
$("#presentacion1").html(data);
},
});
}


(function($) {
  $.fn.donetyping1 = function(callback) {
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

$('#cantidad1').donetyping1(function(callback) {
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
//----------------------------------------------


$('#saveMedGenOrdp').submit(function(e){
e.preventDefault();
$("#saveEg").prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>hospitalizacion/saveMedGenOrd',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
 $("#saveEg").prop('disabled',false);
  $("#done-edit-med").html(data).addClass("alert alert-success");
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
		url:'<?=base_url('hospitalizacion/saveOrdMedLab')?>',
		data: {lab:lab,historial_id_l:<?=$id_patient?>,user_id:<?=$user_id?>,sala:<?=$idsala?>,centro:0,printing:1,
		cantidad:<?=$cantidad?>,cobert:<?=$cobert?>,descuento:<?=$descuento?>,id_hosp:<?=$id_hosp?>},
		success:function(data) {
		paginateLab();

      },

	});
} else {
	 var lab=labCheckded;
	$.ajax({
		type:'POST',
		url:'<?=base_url('hospitalizacion/DeleteOrdMedLab')?>',
		data: {lab:lab,historial_id_l:<?=$id_patient?>,user_id:<?=$user_id?>,printing:1},
		success:function(data) {
		paginateLab();
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
$(".select_edit").select2({
  tags: true
});
//--------------------------------------------------------------------------------
$('#paginatemed1').submit(function(e){
e.preventDefault();
$("#save-pag-rec").prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>hospitalizacion/saveOrdenMedicaRecetas',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
 $("#save-pag-rec").prop('disabled',false);
 $("#done-edit-med").html(data).addClass("alert alert-success");
 allRecetasOrdMed();

},
});

});

//--------------------------------------------------------------------------------
$('#paginatest').submit(function(e){
e.preventDefault();
$("#sub-pag-est").prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>hospitalizacion/saveOrdenMedicaEst',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
$("#sub-pag-est").prop('disabled',false);
$("#done-edit-med").html(data).addClass("alert alert-success");
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
