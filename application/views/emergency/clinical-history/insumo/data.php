<input id="insumo-pass-to-right-amount" value="<?=$countInsumoVal;?>" type="hidden" />

<?php
if($table_insumo_link=='hosp_peticion_link'){
	$print_page='print_page_hospitalization';
}else{
$print_page='print_page_emergency';	
}
echo "<input value='$print_page' class='insumo-print-page' type='hidden' />";
$insum=$totorden + 1;

if($showinsumoedit=='none'){
 if($querydata->result() !=NULL)
{?>
<strong>Listado de insumos seleccionados</strong>
<table class="table table-striped"  id='tab-sum' >
<thead>
<tr style="background:#428bca;"  >
<th style=";color:white">Insumo</th>
<th style="color:white">Cantidad</th>
<th style="color:white">Fecha</th>
<th style="color:white">usuario</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($querydata->result() as $row)
{
$time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$user=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');

if(is_numeric($row->insumo)){
$med_name=$this->db->select('sub_groupo')->where('id_c_taf',$row->insumo)->get('centros_tarifarios_test')->row('sub_groupo');
}else{
$med_name=$row->insumo;	
}
?>
<tr>
<td><?=$med_name?></td>
<td><?=$row->cantidad?></td>
<td><?=$time?></td>
<td><?=$user?></td>
<td>
<?php if($row->id_user==$user_id) {?>
<!--<a title="Eliminar" style="cursor:pointer" class="delete-insumo" id="<?=$row->id; ?>" ><i class="fa fa-trash" style="color:red"></i></a>-->
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td>
</tr>
<?php } ?>

</tbody>
</table>

<?php }else{
echo "<em>no hay insumos seleccionados...</em> ";
}
}else{
	
$insumo_patient=$this->session->userdata('id_patient');
$insumo_centro=$this->session->userdata('id_centro');

if($querydatasave->num_rows() > 0){
echo'<strong>Listado de insumos creados</strong>


<div class="d-flex flex-row mb-3" style="margin-left:87%">
  <div class="p-2">
  
  <div class="form-check">
  <input class="form-check-input" type="checkbox"  id="copy-all-insumo">
  <label class="form-check-label" for="copy-all-insumo">
   Imprimir todo
  </label>
</div>
 
  
  </div>
  <div class="p-2"><button type="button" id="btnPrintInumsoMed" style="display:none;position:absolute" class="btn btn-md btn-primary" ><i class="fa fa-print"></i></button></div>
</div>

 ';

}
echo '
<div style="height:600px;overflow-y:auto;"  id="tab-insumo" >
';
foreach($querydatasave->result() as $rowds){
	
$sqlrs = "SELECT $table_insumo.id AS idp,
 $table_insumo.cantidad AS cant, 
$table_insumo.updated_time AS upt,
$table_insumo.centro AS cent,
$table_insumo.insumo AS medId,
$table_insumo.id_user AS idus FROM $table_insumo 

WHERE link=$rowds->id";
$queryresult= $this->hospitalization_emgergency->query($sqlrs);

?>
<div class='id_insumo' style="display:none"><?php echo $rowds->id?></div>
<div class='text-danger'  style='text-align:center'><strong>Orden: <?php echo $rowds->id?></strong></div>
<div  class="float-end">

<div class="form-check">
  <input class="form-check-input copy-one-insumo" type="checkbox" value="<?php echo $rowds->id?>" >
 
</div>

</div>
<table class="table table-striped"  >
<thead>
<tr style="background:#428bca;"  >
<th style=";color:white">Insumo</th>
<th style="color:white">Cantidad</th>
<th style="color:white">Fecha</th>
<th style="color:white">usuario</th>
<th></th>
</tr>
</thead>
<tbody>
<?php
foreach($queryresult->result() as $rowrs){
$time = date("d-m-Y H:i:s", strtotime($rowrs->upt));
$user=$this->db->select('name')->where('id_user',$rowrs->idus)->get('users')->row('name');
if(is_numeric($rowrs->medId)){
$med_name2=$this->db->select('sub_groupo')->where('id_c_taf',$rowrs->medId)->get('centros_tarifarios_test')->row('sub_groupo');
}else{
$med_name2=$rowrs->medId;	
}
?>
<tr>
<td><?=$med_name2?></td>
<td><?=$rowrs->cant?></td>
<td><?=$time?></td>
<td><?=$user?></td>
<td>
<?php if($rowrs->idus==$user_id  || $this->session->userdata('user_perfil')=="Admin") {?>
<a title="Eliminar <?=$rowrs->idp; ?>" style="cursor:pointer" class="delete-insumo" id="<?=$rowrs->idp; ?>"><i class="fa fa-trash" style="color:red"></i></a>
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td>
</tr>
<?php } ?>
</tbody>
</table>

<?php	
}
echo "</div>";
}

?>



<script>

if($('#insumo-pass-to-right-amount').val() > 0) {
$('#guardar-insumo').show();	
}else{
$('#guardar-insumo').hide();	
}


$('#editInsumo1').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
loadInsumoSaved();
});


/* $('#tab-sum').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );*/
	
	
$(".delete-insumo").click(function(){
if (confirm("Lo quieres borrar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/deleteInsumo')?>',
data: {id : del_id,table_insumo:"<?=$table_insumo?>", id_patient:<?=$id_patient?>, id_centro:<?=$id_centro?>},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
loadInsumoSaved("<?=$table_insumo?>", "<?=$table_insumo_link?>", <?=$id_patient?>, <?=$id_centro?>, '');
 
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
});


</script>