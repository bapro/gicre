<br/>
<style>
.checked {
    background: #FEC7C7;
}
</style>

<div class="col-md-4">
<select  class="form-control  select2" id="search-num">
<option value=""># de orden</option>
<?php 
 
foreach($sqlgb->result() as $rowgb){

 echo "<option value=".$rowgb->orden.">orden # ".$rowgb->id."</option>";
}
?>
</select>
</div>
<div class="col-md-6">
<select  class="form-control  select2 select22" id="search-op"   >
<option value="">Seleccionar el operador</option>
<?php 
$i=1; 
foreach($sqlop->result() as $rowop){
$name=$this->db->select('name')->where('id_user',$rowop->user)->get('users')->row('name');
    echo "<option value=".$rowop->user.">".$name."</option>";

}
?>
</select>

</div>
<div class="col-md-2">
<button id="search-btn" type="button" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></button>
</div>
<hr/>

<div id="medicamentos-data"></div>


<script>

 $(".select2").select2({

});




function medicamentoHoy(){
var op  = <?=$id_user?>;
var id_user  = <?=$id_user?>;
var num = "<?=date('Y-m-d')?>";
var id_patient  = <?=$id_patient?>;
var empty = "No hay medicamentos por hoy.";
var where = 1;
listarMedicamento(op,num,id_patient,empty,where,id_user);
}

function listarMedicamento(op,num,id_patient,empty,where,id_user){
$.ajax({
url:"<?php echo base_url(); ?>emergency/medicamentosData",
data: {op:op,num:num,where:where,empty:empty,id_patient:id_patient,id_user:id_user},
method:"POST",
success:function(data){
$('#medicamentos-data').html(data);
	
},

});

}

//medicamentoHoy();



$('#search-btn').on('click', function () {
var num = $("#search-num").val();	
var op = parseInt($("#search-op").val());
var id_patient  = <?=$id_patient?>;
var id_user  = <?=$id_user?>;
var where = 1;
var empty = "No hay medicamentos segun la busqueda.";
if(num==""){
alert('Seleccionar el numero de order');
}else{
$("#medicamentos-data").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
listarMedicamento(op,num,id_patient,empty,where,id_user);	
}
});


</script>