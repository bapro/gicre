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
<div class="row tab-content showdown1 searchb" >
<strong style="float:right;font-size:12px"><i><?=date("d-m-Y H:i")?></i></strong>

<?php

//-----------------centro medico-------------------------------

$doctor=$this->db->select('name')->where('id_user',$id_doc )
->get('users')->row('name');

$title_area=$this->db->select('title_area')->where('id_ar',$area)
->get('areas')->row('title_area');


$centro=$this->db->select('name,logo,provincia,municipio,barrio,calle,rnc,primer_tel,segundo_tel,type')->where('id_m_c',$id_cm)->get('medical_centers')->row_array();
$provincia=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$muncipio=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');
?>
<h3 class="h3" align="center"><?=$centro['name']?></h3> 
<div align="center">  <img class="img "  style="width:110px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  /></div>

<div class="col-sm-12 notme" align="center">

<p><label><i class="fa fa-phone" style="font-size:24px"></i> </label> <?=$centro['primer_tel']?> <?=$centro['segundo_tel']?></p>

 <p><strong>RNC</strong> <?=$centro['rnc']?></p>
<p><label><i class="fa fa-map-marker" style="font-size:24px"></i></label> <span style="font-size:14px"><?=$centro['calle']?>, <?=$centro['barrio']?>, <?=$provincia?>, <?=$muncipio?></span> </p>

<input id="servicio" type="hidden" value="<?=$area?>"/>

</div>


</div>
<div class="row tab-content showdown searchb">
<h3 class="h3" align="center">DATOS DEL PACIENTE</h3> 
<?php
foreach($patient_data as $row)

if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
if($photo){
echo '<img  class="img-responsive" style="float:left; width:130px;" src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
echo '<img  class="img-responsive" style="float:left; width:130px;" src="'.base_url().'/assets/img/user.png"  />';	
}
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
<th>Tel.</th>
<th>Direccion</th>
<th>Email</th>
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

$seguro_ingo=$this->db->select('input_name,inputf')->where('patient_id',$id_p_a)
 ->get('saveinput')->row_array();
 

?>

<tr>
<td><?=$row->nec1 ?><input id="patient_id" type="hidden" value="<?=$id_p_a;?>"/></td>


<td id="paciente" style="text-transform:uppercase"><?=$row->nombre;?></td>
<td id="cedula"><?=$row->cedula;?></td>
<td><input id="seguro_medico" type="hidden" value="<?=$id_seguro;?> "/> <?=$seguro_name;?>  <input type="hidden" id="rnc" value="<?=$rnc;?>"/></td>
<td id="tel"><?=$row->tel_cel?> / <?=$row->tel_resi?></td>
<td><?=$row->calle?>, <?=$row->barrio?></td>
<td id="email"><?=$row->email?></td>
</tr>

</table>
</div>
</div>
