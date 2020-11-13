<hr id="hr_ad"/>
<div style="overflow-x:auto;">
<table  class="table table-striped table-bordered" width="100%;" cellspacing="0">

<tr style="background:rgb(219,219,219);">
<th class="col-xs-2">Paciente</th>
<th >Cedula</th>
<th >NSS</th>
<th >Plan</th>
<th class="col-xs-2" >Tipo de Afiliado</th>
<th class="col-xs-2" >No. Autorizacion</th>
<th class="col-xs-2" >Autorizado Por</th>
<th class="col-xs-2" >Monto Autorizado</th>
<th class="col-xs-2" >Categoria </th>
</tr>
<?php foreach($go_down_centro_medico as $row)
{
//$pat_id=$this->db->select('paciente')->where('codigoprestado',$row->codigoprestado)
//->get('factura2')->row_array();
 $paciente=$this->db->select('nombre,cedula,afiliado')->where('id_p_a',$row->paciente)
->get('patients_appointments')->row_array();

 $nss=$this->db->select('inputf')->where('patient_id',$row->paciente)
->get('saveinput')->row('inputf');

$seguron=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$area=$this->db->select('title_area')->where('id_ar',$row->servicio)->get('areas')->row('title_area');

$cat=$this->db->select('categoria')->where('doctorid',$row->medico)->get('mssn1')->row('categoria');

?>
<tr>
<td style="text-transform:uppercase"><?=$paciente['nombre'];?></td>
<td><?=$paciente['cedula'];?></td>
<td><?=$nss?></td>
<td></td>
<td><?=$paciente['afiliado'];?></td>
<td style="color:red"><?=$row->numauto;?></td>
<td><?=$row->autopor;?></td>
<td>RD$ <?=number_format("$row->totpagseg",2)?></td>
<td>
<?php
if($cat==""){
echo "<div class='alert alert-warning'>No hay historia clinica por este doctor.</div>";
}
else{

?>
<input class="get_id_patient" type="hidden" value="<?=$row->paciente?>"/><span id="loadit2"></span> <a class="get-this-one" id="<?=$row->paciente?>"  style="cursor:pointer"><?=$cat;?></a>
<?php } ?>
</td>
</tr>
<?php
}

?>
   
</table>

<input type="hidden" id="dess" value="<?=$desde?>"/>  <input id="hass" type="hidden" value="<?=$hasta?>"/>
</div>


<script>
$('.get-this-one').click(function() {
$("#loadit2").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var get_id_patient = $(this).attr('id');
var dess =$('#dess').val();
var hass =$('#hass').val();
$.get( "<?php echo base_url();?>admin/get_patient_historial?get_id_patient="+get_id_patient+"&dess="+dess+"&hass="+hass, function( data ){
$("#loadit2").hide();
$("#get_patient_historial").html( data ); 
}); 
 
});

</script>