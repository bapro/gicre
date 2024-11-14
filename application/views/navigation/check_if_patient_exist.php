<style>
td,th{font-size:13px;text-aling:left}
</style>
<?php $this->padron_database = $this->load->database('padron',TRUE);?>
<br/>
<table class="table table-striped table-hover"  style="width:90%;margin-left:10%" cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th style="background:white;color:red">Tenemos ya un paciente con este nombre</th><th>Nombre</th><th>Cedula</th><th>NEC</th><th>Fecha nac.</th><th>Sexo</th><th>Tel.</th>
</tr>
</thead>
<tbody>
<?php foreach($query->result() as $row)
{

if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
$imgpat='<img  width="60"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
} else if($row->photo==""){

$imgpat='<img  width="60" src="'.base_url().'/assets/img/user.png"  />';		

}
else{

$imgpat='<img  width="60" src="'.base_url().'/assets/img/patients-pictures/'.$row->photo.'"  />';		


}

?>
<tr>
<td >
<?=$imgpat?>

</td>
<td ><?=$row->nombre;?></td>
<td style="color:red"><?=$row->ced1;?>-<?=$row->ced2;?>-<?=$row->ced3;?></td>
<th style="color:red"><?=$row->nec1;?></th>
<td><?=$row->date_nacer;?></td>
<td><?=$row->sexo;?></td>
<td id="formatdate"><?=$row->tel_cel;?></td>
</tr>
<?php
}
?>
</tbody> 
<tr>
<th>
Eres tu ? <a class="btn btn-primary btn-sm" href="<?php echo site_url("navigation/patient_found/$row->id_p_a");?>">Si</a>   <a class="btn btn-default btn-sm" id='not-me'>No</a>
</th>
</tr>   
</table>

<script>

$('#hide-down').hide();

$("#not-me").click(function(){
$('#hide-down').show();
$('#nombre_info').hide();
});
</script>