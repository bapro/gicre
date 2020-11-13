 <?php
$this->padron_database = $this->load->database('padron',TRUE);

?>
<div class="tab-content"  style="margin-left:6%" >
<div class="col-md-12"  style="border:1px solid #38a7bb;background:linear-gradient(to right, white, #E0E5E6, white);" >

<h5 class="h5"><i><?=$number_found?> resultado(s) encuentrado(s). <span style="color:green">(<?=$now?> segundos)</span></i></h5>

<div  style="overflow-x:auto;">
<table class="table table-striped table-bordered" style="font-size:13px" id='padron-table' >
  <thead>
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>APELLIDO1</th>
<th>APELLIDO2</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
<th>Crear</th>
</tr>
  </thead>
  <tbody>
<?php
$cpt="";
foreach($patient_padron as $row)
{
$cedula="$row->MUN_CED$row->SEQ_CED$row->VER_CED";	
$member=$this->db->select('member')->where('cedula',$cedula)->get('soto_alcalde_cedula')->row('member');
	
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->MUN_CED)
->where('SEQ_CED',$row->SEQ_CED)
->where('VER_CED',$row->VER_CED)
->get('fotos')->row('IMAGEN');
	
$nacer = date("d-m-Y", strtotime($row->FECHA_NAC));
//-------------------------------------
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr>
<td>
<?php
if($photo != null){
echo '<img width="100" class="img-thumbnail" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
}
else{
echo "No hay foto por este paciente";	
}
?> 
</td>
<td><?=$row->NOMBRES?> </td>
<td><?=$row->APELLIDO1 ?> </td>
<td><?=$row->APELLIDO2 ?> </td>
<td><?=$row->MUN_CED;?><?=$row->SEQ_CED;?><?=$row->VER_CED;?></td>
<td><?=$nacer;?></td>
<td><a href="<?php echo base_url("alcalde/redirect_member_found/$row->MUN_CED/$row->SEQ_CED/$row->VER_CED/$member")?>" class="btn btn-default" > <i class="fa fa-plus" aria-hidden="true"></i> </a></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>

</div>


</div>

<script>
$('.patient-cedula').val("");

  $('#padron-table').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
</script>