<div class="modal-header" id="background_">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h2 class="modal-title ">RECETAS</h2>
</div>
<table class='table'  align="left" style="width:100%;border:none"  >
<tr>
		<?=$display?>
		<td style="text-transform:uppercase;border:none"><strong><?=$nombre?></strong></td>

		<td style="text-align:center;border:none">
		<table class='table' class="r-b" style="width:40px;border:none;">
		<tr>
		<td style="border:none" >
		<?=$logoseg?>
		</td>
		<td style="text-align:center;border:none">
		<?php
		
		if($afiliado !=""){echo "$afiliado ";}
		if($plan !=""){echo "$plan";}
		?>
		</td>
		<td style="text-align:center;border:none"><?=$inputf?> <span style="color:red"><?=$input_name?></span></td><td></td>
		</tr>

		</table>
		</td>
		<?php if($desp==2){ ?>	
	   <td id="despachar-text">
		<button class="btn btn-default btn-sm" style='color:red' id="despachar" type='button' >DESPACHAR</button>
		</td>
		<?php } else{?>
		 <th style="color:green">
		receta despachada
		</th>
		<?php }?>
	</tr>

</table>
<table class='table' style="width:100%;">

<tr style="background:rgb(192,192,192);color:white">

		<td><strong>Cedula</td>
		<td><strong>Nacionalidad</strong></td>
		<td><strong>Edad</strong></td>
		<td><strong>Telefonos</strong></td>
		<td><strong>Direccion</strong></td>
	</tr>

	<tr>
		<td style="" > <?=$paciente['ced1']?>-<?=$paciente['ced2']?>-<?=$paciente['ced3']?></td>
		<td style=""><?=$paciente['nacionalidad']?></td>
		<td style=""><?=getPatientAge($paciente['date_nacer'])?></td>
		<td style=";"><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
		<td style="text-transform: lowercase;"><?=$municipio?>, <?=$paciente['calle']?></td>
	</tr>
</table>

<?php
function getPatientAge($birthday) {

$age = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age = ($years < 2) ? '1 año' : "$years años";
} else {
$age = '';
if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age);
}

?>
<?php
 foreach($query->result() as $rows)
$author=$this->db->select('name')->where('id_user',$rows->updated_by)->get('users')->row('name');
$inserted_time = date("d-m-Y H:i:s", strtotime($rows->updated_time));
$doc=$this->db->select('exequatur,area')->where('id_user',$rows->updated_by)->get('users')->row_array();
$exequatur=$doc['exequatur'];
$area=$doc['area'];
$especialidad=$this->db->select('title_area')->where('id_ar',$area)->get('areas')->row('title_area');
?>
<table class='table'  style="width:100%;" >
<tr style="background:rgb(192,192,192);color:white">
<td ><strong>Medicamento</strong></td>
<td ><strong>Presentacion</strong></td>
<td ><strong>Frecuencia</strong></td>
<td ><strong>Via</strong></td>
<td ><strong>Cantidad (dias)</strong></td>
</tr>
<?php foreach($query->result() as $row)

{
?>
<tr>
<td style='text-transform:lowercase;'>
<strong><?=$row->medica;?></strong>
<br/>
<span style="font-size:11px"><i><?=$row->dosis;?></i></span>
</td>
<td style='text-transform:lowercase;'><?=$row->presentacion;?></td>
<td style='text-transform:lowercase;'><?=$row->frecuencia;?></td>
<td style='text-transform:lowercase;'><?=$row->via;?><br/><?=$row->oyo;?></td>
<td style='text-transform:lowercase;'>
<?php
if($row->cantidad==0){echo "uso continuo";}else{echo $row->cantidad;}
?>
</td>

</tr>

<?php
}
?>

</table>  
<table class='table' style="border:none"> 
<tr>
<td style="border:none;font-size: 13px;text-align:left">
Dr <?=$author;?>, Exeq. : <?=$exequatur;?><br/>
<?=$especialidad;?><br/>
<span style="color:red"><?=$inserted_time;?></span>

</td>
<td style="border:none">
<?php 
$firma_doc="$rows->updated_by-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}

?>
</td>
<td style="border:none;text-align:left">
<?php 
$sello_doc=$this->db->select('sello')->where('doc',$rows->updated_by)->get('doctor_sello')->row('sello');

if ($sello_doc) {?>

<img  style="width:250px;" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
<?php
} else {
echo "<span style='color:red'>no hay sello del doctor</span>";
}
?>
</td>
</tr>
</table> 
<script>

$('#despachar').on('click',function(e){
$(this).prop("disabled",true);	
$.ajax({
type:'POST',
url:'<?=base_url('farmacia/despachar')?>',
data: {idfa:<?=$idf?>,id_usr:<?=$id_usr?>,id_farma:<?=$id_farma?>},
success:function(data) {
$("#despachar-text").html('receta despachada').css("color","red");
var delay = 1000; 
        var url = "<?php echo base_url(); ?>farmacia/despachadas";
        setTimeout(function(){ window.location = url; }, delay);
}
});	

})

</script>
