<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
   <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    

<style>
th{text-align:center}
td{font-size:17px}

label{color:black}
	img.img-responsive{max-width : 18%;
heigth: auto;
display: block;}

a.active   
{
    outline: 0;
}
.req{color:red}
</style>
    <!-- Favicon and apple touch icons-->
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <!-- owl carousel css -->

</head>
<!-- *** welcome message modal box *** -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
 <?php
 $total_sub=0;
$total_seg=0;
$total_pat=0;
$fecha = date("d-m-Y");	
 foreach ($invoice as $row)
 
foreach ($nota_ncf as $nncf) 
if($is_admin=="yes"){$controller="admin";}else{$controller="medico";}
 ?>


<!-- Modal content-->
<div class="modal-content">

<div class="modal-header" >
<div id='show-back-button' style='display:none'>

<h4>reclamación cancelada con éxito</h4>
<a  class="btn btn-primary btn-xs" href="<?php echo base_url("$controller/create_invoice_ars_claim")?>">Volver</a>
<br/><br/>

</div>
<div id='hide-me-cancel'>
<?php
 $this->padron_database = $this->load->database('padron',TRUE);
$ars=$this->db->select('logo,title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row_array();

if($ars['logo']==""){
$seguro_logo="";
} else{
$seguro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$ars['logo'].'"  />';	
}
$centro=$this->db->select('type,name,logo')->where('id_m_c',$row->center_id)->get('medical_centers')->row_array();
$centro_type=$centro['type'];

if($centro_type=='privado'){
$doctor=$this->db->select('name')->where('id_user',$row->medico)
->get('users')->row('name');
$doc=$this->db->select('exequatur,area,cedula')->where('id_user',$row->medico)
->get('users')->row_array();


$area=$this->db->select('title_area')->where('id_ar',$doc['area'])
->get('areas')->row('title_area');

$segurocodigoc=$this->db->select('codigo')->where('id_seguro',$row->seguro_medico)->where('id_doctor',$row->medico)->get('codigo_contrato')->row('codigo');
	

?>
<h2 style="text-align:center"><?=$doctor?> </h2>
<h5 style="text-align:center"><?=$area?></h5>
<p style="text-align:center"><strong>Exeq: <?=$doc['exequatur']?> </strong></p>
<p style="text-align:center"><strong>Cedula: <?=$doc['cedula']?> </strong></p>
<?php } else {
$centro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';	
$segurocodigoc=$this->db->select('codigo')->where('id_seguro',$row->seguro_medico)->where('id_centro',$row->center_id)->get('codigo_contrato')->row('codigo');
	
?>
<h2 style="text-align:center"><?=$centro['name']?> </h2>
<h5 style="text-align:center"><?=$centro_logo?></h5>
<?php } ?>
<hr/>
<div style="text-align:center" class="form-horizontal">
<h3>Factura Valida Para Credito Fiscal</h3>

<div class="form-group">
<label class="control-label col-sm-6" >NCF</label>
<div class="col-sm-3">
<input type="text"  class='deactivate ncf'  id="ncf"  value="<?=$nncf->value?>" disabled />
<div class="ncf_result"></div>
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-6" >Vecimiento Secuencia</label>
<div class="col-sm-3">
<input type="text" class='deactivate' value="<?=$nncf->vec_fec?>"  id="vecimiento-secuencia"  name="vecimiento-secuencia"  disabled />
</div>
</div>

<div class="col-md-11 col-md-offset-1">
<button title="Modificar el RNC" type="button" class="btn btn-sm btn-default" id="show-ncf" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
<button title="Guadar" type="button" id="save-ncf" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
 <hr/>
 </div>
 </div>
<?php 

$name=$this->db->select('name')->where('id_user',$nncf->canceled_by)->get('users')->row('name');
//echo $id_user;
?>
<div class="col-md-7" style='border-right:1px solid #DCDCDC' >
<button type="button" class="btn btn-danger btn-xs" id="cancelar"> Cancelar la factura</button>
</div>
<div class="col-md-5 text-right" >
<a class="btn btn-primary btn-xs" href="<?php echo base_url("$controller/invoice_ars_claim")?>"> ver todo</a> 
<a class="btn btn-primary btn-xs" href="<?php echo base_url("$controller/create_invoice_ars_claim")?>"><i class="fa fa-plus"></i>  Nuevo</a> 
<a  class="btn btn-primary btn-xs" href="<?php echo base_url("printings/print_ars_fac_found/$id_ncf/$row->center_id/$desde/$hasta/$id_patient")?>"><i class="fa fa-print"></i>  Imprimir</a>
</div>

<div class="col-md-12" style="font-weight:bold;background:white" >
<hr/>
 <div class="col-md-9" >
<p><?php echo $seguro_logo; ?> <?=$ars['title']?></p>
</div> 
<div class="col-md-3"  >
<p>Fecha : <?=$fecha?></p>
<p>No. Contrado : <span style="color:red"><?=$segurocodigoc?></span></p>
</div>
</div>


<div class="col-md-12" style="background:white">
<div style="overflow-x:auto">
<p><label>Desde <?=$desde?> Hasta: <?=$hasta?></label></p>
<table class="table table-striped">

<tr>
<th><strong>#</strong></th>
<th><strong>Fecha</strong></th>
<th><strong>Paciente</strong></th>
<th><strong>Foto</strong></th>
<th><strong>Cedula</strong></th>
<th><strong>NSS</strong></th>
<th><strong>No Autorizacion</strong></th>
<th><strong>Total Reclamado</strong></th>
<th><strong>Paciente Pagara</strong></th>
<th><strong>Aseguradora Pagara</strong></th>

</tr>
<?php 
$i = 1;
foreach($invoice as $fac)
{
 $paciente=$this->db->select('nombre,cedula,ced1,ced2,ced3,photo')->where('id_p_a',$fac->paciente)
 ->get('patients_appointments')->row_array();
 
  $numautoid=$this->db->select('id2')->where('idfac',$fac->id_fac2)
 ->get('factura')->row('id2');
 
   $numauto=$this->db->select('numauto,autopor')->where('idfacc',$numautoid)
 ->get('factura2')->row_array();
 
 
  $num_af=$this->db->select('input_name')->where('patient_id',$fac->paciente)->where('input_name !=','')
 ->get('saveinput')->row('input_name');
 
  $total_sub += $fac->t1;
   $total_seg += $fac->t3;
   $total_pat += $fac->t2; 
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:60px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
$imgpat='<img  style="width:60px;" src="'.base_url().'/assets/img/user.png"  />';	
}	
} else if($paciente['photo']==""){
$imgpat='<img  style="width:60px;" src="'.base_url().'/assets/img/user.png"  />';	
}
else{
$imgpat='<img  style="width:60px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}
?>
<tr class="row-copier">
<td class="totpagseg"><?php echo $i; $i++;?></td>
<td class="fecha1"><?=$fac->fecha;?></td>
<td class="paciente"><a target="_blank"  href="<?php echo base_url("$controller/patient/$fac->paciente")?>"> <?=$paciente['nombre']?></a></td>
<td><?=$imgpat?></td>
<td class="cedula"><?=$paciente['cedula']?></td>

<td class="num_af"><?=$num_af;?></td>
<td class="numauto" style="color:red" title="Autorizado por : <?=$numauto['autopor']?>"><?=$numauto['numauto'];?></td>

<td class="tsubtotal"><?=$fac->t1;?></td>
<td class="totpagpa"><?=$fac->t3;?></td>
<td class="totpagseg"><?=$fac->t2;?></td>

</tr> 
<?php
}
$sub_total=number_format($total_sub,2);
$total_pagar_seguro=number_format($total_seg,2);
$total_pagar_patient=number_format($total_pat,2);
?>
<tr><th><?php echo $cnt?></th><th colspan="5">Subtotal </th><th>RD$<?=$sub_total ?></th><th>RD$<?=$total_pagar_seguro ?></th><th>RD$<?=$total_pagar_patient ?></th></tr>


<tr style="color:red"><th colspan="8"> </th>
<td >
<table>
<tr>
<th>DESC.: 0.00</th>
</tr>
<tr>
<th>ITBIS.: 0.00 </th>
</tr>
<tr>
<th style="color:blue">Total: RD$<?=$total_pagar_patient; ?></th>
</tr>
</table>
</td>
</tr>



</table>
</div>

</div>
<div class="col-md-12" align="center" style="background:white">
<br/><br/><br/>
<p><hr style="background:black;height:1px;width:40%"/></p>
<p><strong>FIRMA DEL PROVEEDOR DEL SERVICIO</strong></p>
</div>
</div>
</div>
</div>
</div>

<!-- #### JAVASCRIPT FILES ### -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript">


 /* var timer = null;
$('.ncf').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff1, 1000);
	   $("#saveTransfer").prop("disabled",true);
});

function doStuff1() {
	 var str= $(".ncf").val();
$(".ncf_result").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
//$("#saveTransfer").prop("disabled",false);
if(str == "") {
$( ".ncf_result" ).hide();
//$("#saveTransfer").prop("disabled",false);
}else {
$.get( "<?php echo base_url();?>admin_medico/ncf?value="+str, function( data ){
$(".ncf_result").html(data); 
			   
});
}
}*/






 $('#cancelar').on('click', function () {

		if (confirm("Estás seguro de cancelar ?"))
        {
		//var id_user = <?=$id_user?>;
		$.ajax({
		type: "POST",
		url: '<?php echo site_url('admin_medico/cancel_ncf');?>',
		data:{id_ncf:<?=$nncf->id_ncf?>},
		success: function(data){
			$('#hide-me-cancel').hide();
			$('#show-back-button').show(); 
       },
		});	
		}
})

$('input[name="vecimiento-secuencia"]').mask('00/00/0000', {placeholder: '--/--/----'});
$(window).on('load',function(){
$('#myModal').modal('show');
});
//prevent modal from closing on click
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})
  $('#show-ncf').on('click',function(){
       $(this).hide();
        $("#save-ncf").show();
		$(".deactivate").prop("disabled",false);
    });



 $('#save-ncf').on('click', function () {
var ncf  = $("#ncf").val();
var vec_fec  = $("#vecimiento-secuencia").val();

  if(ncf==""){
	 alert("El NCF no se puede dejar vacio !");
 } else { 
var id_ncf = <?=$nncf->id_ncf?>;
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/update_ncf');?>',
data:{id_ncf:id_ncf,ncf:ncf,vec_fec:vec_fec},
success: function(data){
$('#save-ncf').hide();
$("#show-ncf").show();
$(".deactivate").prop("disabled",true);
},
});
 }
});


</script>

</body>

</html>