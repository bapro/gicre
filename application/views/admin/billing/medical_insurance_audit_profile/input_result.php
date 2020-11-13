<style>
.round:hover{background:rgb(219,219,219);color:green;border:1px solid gray}
</style>

<div style="overflow-x:auto;">
<table  class="table" width="100%;font-size:12px" >
<tr>
<td colspan="6" style="text-transform:uppercase;text-decoration:underline;color:green"><?=$input_val?></td>
<td>

Desde 
<select class="form-control  select2 " id="desde" >
<option value=""></option>
<?php 

foreach($date_filter  as $dr)
{ 
$hasta = date("d-m-Y", strtotime($dr->filter));
?>
<option value="<?=$dr->filter?>"><?=$hasta?></option>
<?php
}
?>
</select>

</td>

<td>
Hasta 

<select class="form-control  select2 " id="hasta" >
<option value=""></option>
<?php 

foreach ($date_filter  as $dr)
{ 

$hasta = date("d-m-Y", strtotime($dr->filter));
?>
<option value="<?=$dr->filter?>"><?=$hasta?></option>
<?php
}
?>
</select>

</td>
</tr>
<tr style="background:#38a7bb;color:white">
<th class="col-xs-2">MEDICO</th>
<th >EXEQUATUR</th>
<th >RNC</th>
<th >SERVICIO</th>
<th class="col-xs-2" >CENTRO MEDICO</th>
<th class="col-xs-2" >SEGURO MEDICO</th>
<th class="col-xs-2" >Codigo Prestador</th>
<th class="col-xs-2" >Cantidad de pacientes segun el ranco de fecha</th>
</tr>
<?php foreach($input_result as $row)

 $paciente=$this->db->select('nombre')->where('id_p_a',$row->paciente)
->get('patients_appointments')->row('nombre');

$seguron=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
$exequatur=$this->db->select('exequatur')->where('id_user',$row->id_user)->get('users')->row('exequatur');

$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');
?>
<tr>
<td><?=$row->name;?><input type="hidden" id="medico" value="<?=$row->id_user?>"/></td>
<td><?=$exequatur;?></td>
<td><?=$row->rnc;?></td>
<td><?=$area;?></td>
<td><?=$centro;?></td>
<td><?=$seguron;?></td>
<td><?=$row->codigoprestado;?></td>
<td style="text-align:center"  id="count_patients"></td>
</tr>

</tbody>    
</table>

</div>


<div id="go_down_patient_num_con"></div>
<div id="get_patient_historial"></div>

<script>
   $('.select2').select2({ 
  placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});

//===========================================================
$("#hasta").on('change', function () {
var hasta = $(this).val();
var desde = $("#desde").val();
var god_own = "no";
var id_seguro = "<?=$id_seguro?>";
var medico = $("#medico").val();
if(desde > hasta){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta").val("").trigger("change.select2");
}
else {
$("#count_patients").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.get( "<?php echo base_url();?>admin_medico/count_patient_num_contrato?desde="+desde+"&hasta="+hasta+"&god_own="+god_own+"&medico="+medico+"&id_seguro="+id_seguro, function( data ){
$( "#count_patients" ).html( data ); 
		   
});
}
});
</script>