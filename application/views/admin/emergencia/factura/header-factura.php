<?php

$this->padron_database = $this->load->database('padron',TRUE);


?>

<style>
table, th, td {
   font-size:14px
}
.add-row{color:#38a7bb;border-color:#38a7bb;}
#plus{
    
    text-decoration:none;
    color:#38a7bb;
	display:inline-block;
    cursor:pointer
}
.td-input{background:white;border:1px solid #38a7bb}
.totpapat,.total,.totalpaseg{background:rgb(230,230,230);border:1px solid #38a7bb}
/*.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 1px solid #38a7bb; 
}*/

.trback th{background:#A9E4EF}
.col-sm-5,.col-sm-7,.col-sm-9,.col-sm-3,.col-sm-8{font-size:15px;}

.not-pointer{pointer-events:none;}
.notme input[type="text"] {
background:#EEECEC
}
</style>
<div class="col-sm-12 tab-content showdown searchb">
<h3 class="h3" align="center">DATOS DEL PACIENTE</h3> 
<?php
foreach($patient_data as $row)

if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
echo '<img class="img-responsive" style="float:left; width:130px;"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($row->photo==""){
	
}
else{
	?>
<img  class="img-responsive" style="float:left; width:130px;"  class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>
<div style="overflow-x:auto">
<table class="table" style="font-size:12px" >
<tr  class="trback">
<th>Record</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Seguro Medico</th>
<th>No. Afiliado</th>
<th>Tipo Afiliado</th>
<th>Tel.</th>
</tr>
<?php
$cpt="";

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}

$seguro_ingo=$this->db->select('input_name,inputf')->where('patient_id',$id_p_a)->where('input_name !=','')
 ->get('saveinput')->row_array();
 $planame=$this->db->select('name')->where('id',$row->plan)->get('seguro_plan')->row('name');

?>

<tr>
<td><?=$row->nec1 ?><input id="patient_id" type="hidden" value="<?=$id_p_a;?>"/></td>
<td id="paciente" style="text-transform:uppercase"><?=$row->nombre;?></td>
<td id="cedula"><?=$row->cedula;?></td>
<td><input id="seguro_medico" type="hidden" value="<?=$id_seguro;?> "/> <?=$seguro_name;?> (<?=$planame;?>) <input type="hidden" id="rnc" value="<?=$rnc;?>"/></td>
<td id="num_af"><?php echo $seguro_ingo['input_name'];?></td>
<td id="tipoaf"><?php echo $row->afiliado;?></td>
<td id="tel"><?=$row->tel_cel?> / <?=$row->tel_resi?></td>
<!--<td><?=$row->calle?>, <?=$row->barrio?></td>
<td id="email"><?=$row->email?></td>-->
</tr>

</table>
</div>
</div>
<div class="col-sm-12 tab-content showdown1 searchb" >


<?php

$centro=$this->db->select('name')->where('id_m_c',$id_cm)->get('medical_centers')->row('name');
?>
<h3 class="h3" align="center">DATOS DEL PRESTADOR</h3> 
<br/>
<div class="col-sm-6 notme">
<div  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-4"> Centro Medico :</label>
<div class="col-sm-8">
<?=$centro?>
<input id="centro_medico" value="<?=$id_cm?>" type="hidden" />
<br/>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"> Codigo Prestador :</label>
<div class="col-sm-3">
<?=$cod?>
</div>
</div>
</div>

</div>

<div class="col-sm-6">
<div  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-4"> Fecha Ingreso :</label>
<div class="col-sm-8">
<?=date("d-m-Y", strtotime($date_ingreso));?> <?=$fecha_ingreso?>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"> Fecha Alta :</label>
<div class="col-sm-8">
<?=date("d-m-Y H:i:s", strtotime($fecha_alta));?>
</div>
</div>
</div>

</div>

</div>