<br/>
<?php 
$where = array(
'id_user' =>$user_id,
'id_patient' =>$id_historial,
'saved' =>0
);

$this->db->where($where);
$this->db->delete($table_insumo);

    $sql = "select id, name from  emergency_medicaments where centro=$centro_id && selected=1";
	$proc= $this->db->query($sql);
	
 ?>
<h4 class="h4 his_med_title">Peticion de insumo</h4>
<div  class="col-md-4">
<div class="input-group">
<select  class="form-control  select2" id="emer-nursing1" >
<option value=''>
Seleccionar insumo (<?=$proc->num_rows();?> registros)
</option>
<?php 

foreach($proc->result() as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->name.'</option>';
}
?>
</select>
<input class="form-control" id='cantidad_insumo' placeholder='cantidad'/>
<span class="input-group-addon">
<button type='button' id='save-nursing1'><i class="fa fa-arrow-right" aria-hidden="true"></i></button></span>
</div>

</div>
<div  class="col-md-8">
<button type='button' id='guardar-insumo' style='display:none'>Guardar</button>
<div  style="top:20px;height:200px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">
	<br/>
<div id="load-Insumos"></div>
</div>

</div>
<div  class="col-md-12" style="top:20px;height:900px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);"  >
	<br/>
<div id="load-Insumos-Saved"></div>
</div>
<script>
$('.select2').select2({ 
//tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});	

loadInsumoSaved();
function loadInsumoSaved(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/loadInsumo",
data: {user_id:<?=$user_id?>,id_historial:<?=$id_historial?>,saved:1,centro:<?=$centro_id?>,showinsumoedit:'',table_insumo:"<?=$table_insumo?>",table_insumo_link:"<?=$table_insumo_link?>"},
method:"POST",
success:function(data){
$("#load-Insumos-Saved").html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-Insumos-Saved').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}


function loadInsumo(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/loadInsumo",
data: {user_id:<?=$user_id?>,id_historial:<?=$id_historial?>,saved:0,centro:<?=$centro_id?>,showinsumoedit:'none',table_insumo:"<?=$table_insumo?>",table_insumo_link:"<?=$table_insumo_link?>"},
method:"POST",
success:function(data){
$("#load-Insumos").html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-Insumos').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});
}





//---------------------------------------------------------------------------------------
$('#guardar-insumo').on('click', function(event) {
	$('#guardar-insumo').hide();
	$("#save-value").val(1);
	$.ajax({
url:"<?php echo base_url(); ?>emergency/saveInsumoSaved",
data: {user_id:<?=$user_id?>,id_historial:<?=$id_historial?>,centro:<?=$centro_id?>,table_insumo:"<?=$table_insumo?>",table_insumo_link:"<?=$table_insumo_link?>"},
method:"POST",
success:function(data){
	loadInsumo();
loadInsumoSaved();
},
});
});
//---------------------------------------------------------------------------------------



$('#save-nursing1').on('click', function(event) {
event.preventDefault();
if($('#emer-nursing1').val() !="" && $('#cantidad_insumo').val() !="" ){
$('#save-nursing1').prop('disabled',true);
$("#save-value").val(0);
$.ajax({
url:"<?php echo base_url(); ?>emergency/saveInsumo",
data: {insumo:$('#emer-nursing1').val(),cantidad_insumo:$('#cantidad_insumo').val(),user_id:<?=$user_id?>,id_historial:<?=$id_historial?>,centro:<?=$centro_id?>,idemp:<?=$idtable?>,table_insumo:"<?=$table_insumo?>"},
method:"POST",
success:function(data){
$("#emer-nursing1.select2").val('').trigger('change');
$("#guardar-insumo").show();
loadInsumo();
$('#save-nursing1').prop('disabled',false);	
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-Insumos-Saved').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}else{
	alert('Insumo y cantidad son requeridos');
}
});

</script>