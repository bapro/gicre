<?php 
foreach ($query->result() as $row)
$name=$this->db->select('nombre')->where('id',$row->name)->get('emergency_almanacen_gnrl')->row('nombre');
?>

<button id="refreshmedica" type="button" class="btn btn-primary btn-xs"><i class="fa fa-chevron-right"></i></button><br/>
<label class="control-label" >Medicamento </label>

<select  class="form-control  select2"   id="em-medicamento"  >
<option value="<?=$row->name?>"> <?=$name?>(<?=$row->tipo?>)</option>
<?php 
$sql ="SELECT nombre,id, tipo, sum(cantitad) as cant FROM  emergency_almanacen_gnrl  group by tipo,nombre order by id desc";
$query = $this->db->query($sql);
foreach ($query->result() as $rowm){

echo '<option value="'.$rowm->id.'" >'.$rowm->nombre.' ('.$rowm->tipo.') ('.$rowm->cant.')</option>';
 
}?>
</select>
<input  class="form-control clinput" type="hidden"  id="tipo"  >

<label  class="control-label" style="font-size:12px"><i> Cantidad existenciel <span  id="cantidad-exist"  ></span></i></label>
</br>
<label class="control-label" >Cantidad</label>

<input  class="form-control  clinput"   id="cantidad" value="<?=$row->cantidad?>" >


<label class="control-label" >Dosis</label>

<input type="text" class="form-control clinput" id="dosis" value="<?=$row->dosis?>">
<label class="control-label" >Via</label>

<select  class="form-control select2"   id="em-via" >
<option><?=$row->dosis?></option>
<option>intravenoso</option>
<option>instramuscular</option>
<option>oral</option>
<option>vaginal</option>
<option>respiratoria</option>
<option>rectal</option>
<option>subcutanea</option>
<option>oftalmica</option>
<option>topica</option>
<option>sublingual</option>
<option>inhalatoria</option>
<option>parenteral</option>
<option>transdermica</option>
<option>gastroenterica</option>
</select>

<label class="control-label" > Cada</label>
<select  class="form-control select2"   id="em-cada" >
<option><?=$row->cada?></option>
<option>1 dosis</option>
<option>1 hr</option>
<option>2 hrs</option>
<option>4 hrs</option>
<option>6 hrs</option>
<option>8 hrs</option>
<option>12 hrs</option>
<option>24 hrs</option>
</select>
<label class="control-label" > Nota Medica</label>
<textarea rows="3" cols="10" class="form-control clinput" id="nota-medica"  ><?=$row->nota?></textarea>


<br/>
<button type="button" id="edit-medicamento" class="btn btn-primary btn-xs">
<i class="fa fa-pencil" aria-hidden="true"> Editar</i>
</button> 
 <div id="error"></div> 
<script>
 $(".select2").select2({
  tags: true
});


$('#refreshmedica').on('click', function(event) {
medicamentoForm();
listOfMedicamentos();
listarMedicamento(<?=$op?>,"<?=$num?>",<?=$id_patient?>,"",1,<?=$id_user?>);
});






$('#em-medicamento').on('change', function(event) {
var medid =$(this).val();	
loadMedOnSelect(medid);
	   
});


function loadMedOnSelect(medid){

$("#cantidad-exist").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
$.ajax({
url:"<?php echo base_url(); ?>emergency/cantidadExis",
data: {medid:medid},
method:"POST",
success:function(data){
$("#cantidad-exist").html(data); 
var cantExist = $("#cantidad-exist").text();
if(cantExist==0){
	$("#cantidad-exist").css('color','red');
$('#edit-medicamento').prop("disabled",true);	
}else{
	$("#cantidad-exist").css('color','green');
	$('#edit-medicamento').prop("disabled",false);
	}	
},

});

$.get( "<?php echo base_url();?>emergency/medicaTipo?medid="+medid, function( data ){
$("#tipo").val(data); 
});
}

loadMedOnSelect(<?=$row->name?>);






$('#edit-medicamento').on('click', function(event) {

var nota = $("#nota-medica").val();	
var cada = $("#em-cada").val();	
var medicamento = $("#em-medicamento").val();
var cantidad = $("#cantidad").val();
var dosis = $("#dosis").val();	
var via = $("#em-via").val();
var cantExist = $("#cantidad-exist").text();
if(parseInt(cantidad) > parseInt(cantExist)) {
	alert("Cantidad existencial es "+ cantExist);
	$("#cantidad").val("");
	}
else if(medicamento =="" || via =="" || cantidad =="" ||  dosis =="" || cada ==""){
	alert("´Todos los campos son requerido");
}else{	
var idMed  = <?=$idMed?>;
var id_user  = <?=$id_user?>;
var num = "<?=$num?>";	
var op = <?=$op?>;
var id_patient="";
$.ajax({
url:"<?php echo base_url(); ?>emergency/addMedico",
data: {idMed:idMed,medicamento:medicamento,via:via,cada:cada,id_user:id_user,id_patient:id_patient,nota:nota.trim(),cantidad:cantidad,dosis:dosis},
method:"POST",
success:function(data){
medicamentoForm();
listarMedicamento(<?=$op?>,"<?=$num?>",<?=$id_patient?>,"",1,id_user);	
listOfMedicamentos();
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
	
});	









</script>
