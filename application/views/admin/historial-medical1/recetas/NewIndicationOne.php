<a target="_blank" href="<?php echo base_url("printings/print_recetas/$historial_id/$user_id")?>"  title="Imprimir Con Formato Vertical" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i> Vertical</a>
 <a target="_blank" href="<?php echo base_url("printings/print_recetas_horizontal/$historial_id/$user_id")?>"  title="Imprimir Con Formato Horizontal" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i> Horizontal</a>

  <br/>
<div  style="overflow-x:auto;">
<div  id="printnow"></div>
<?php if($count==6){echo "<span style='color:red'>Ha llegado el limite de registros para la impresión</span>";}?>
<?=$count?> registros
 <table class="table table-striped  flash-add-one" style="background:white" cellspacing="0">
    <thead>
    <tr style="background:#428bca;">
	 <th style="width:3px;font-size:10px;color:white">Fecha</th>
        <th style="width:5px;font-size:10px;color:white">Medicamento</th>
		 <th style="width:5px;font-size:10px;color:white">Presentacion</th>
		 <th style="width:1px;font-size:10px;color:white">Frecuencia</th>
		  <th style="width:1px;font-size:10px;color:white"><strong>Via</strong></th>
        <th style="width:5px;font-size:10px;color:white">Cantidad (dias)</th>
		 <th style="width:1px;font-size:10px;color:white">Operador</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($singularid as $row)
	  
	 {

	$op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
    $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));		 
	 ?>
        <tr>
		<td style="font-size:12px"><?=$fecha;?></td>
		<td style="font-size:12px"><?=$row->medica;?><br/><i><u><?=$row->dosis;?></u></i></td>
		<td style="font-size:12px"><?=$row->presentacion;?></td>
		<td style="font-size:12px"><?=$row->frecuencia;?></td>
		<td style="font-size:12px"><?=$row->via;?><br/><?=$row->oyo;?></td>
		<td style="font-size:12px">
		<?php
		if($row->cantidad==0){echo "uso continuo";}else{echo $row->cantidad;}
		?>
		</td>
		<td style="font-size:12px"><?=$op;?></td>
           
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>
  
</table>
</div>
<script>


if(<?$count?>==6){
printnow();	
}

function printnow()
{
var historial_id  = "<?=$historial_id?>";
var area  = "<?=$area?>";
var area  = "<?=$area?>";
alert(historial_id);
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/new_indication",
data: {historial_id:historial_id,user_id:user_id,area:area},
method:"POST",
success:function(data){
$('#printnow').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#printnow').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
</script>