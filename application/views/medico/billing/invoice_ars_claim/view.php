<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.0/css/bootstrap-select.min.css" />-->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
 
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
     <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
		
    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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
$fecha = date("d-m-Y");	
 foreach ($invoice as $row)
 foreach ($nota_ncf as $nncf) 
 $ars=$this->db->select('logo,title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row_array();
$doctor=$this->db->select('name')->where('id_user',$row->medico)
->get('users')->row('name');
$doc=$this->db->select('exequatur,area')->where('first_name',$row->medico)
->get('doctors')->row_array();


$area=$this->db->select('title_area')->where('id_ar',$doc['area'])
->get('areas')->row('title_area');

if($ars['logo']==""){
$seguro_logo="";
} else{
$seguro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$ars['logo'].'"  />';	
}

 ?>


<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h2 style="text-align:center"><?=$doctor?> </h2>
<h5 style="text-align:center"><?=$area?></h5>
<p style="text-align:center"><strong>Exeq: <?=$doc['exequatur']?> </strong></p>
<h3 style="text-align:center">Relacion de Facturas</h3>
<p style="text-align:center"><strong>RNC: <?=$nncf->value?></strong></p>
    <div class="col-xs-12 text-right" >
	<?php if($is_admin=="yes"){$controller="admin";}else{$controller="medico";}?>
<a class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/invoice_ars_claim")?>"> ver todo</a> 
<a class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/create_invoice_ars_claim")?>"><i class="fa fa-plus"></i>  Nuevo</a> 

<a  class="btn btn-primary btn-sm" href="<?php echo base_url("admin_medico/print_ars_fac_found_pat/$patient/$medico/$print")?>"><i class="fa fa-print"></i>  Imprimir</a>


 </div>
</div>
<div class="col-md-12" style="font-weight:bold;background:white" >
 <div class="col-md-9" >
<p><?php echo $seguro_logo; ?></p>
<p>ARS : <?=$ars['title']?></p>
<p>Nota : <?=$nncf->nota?></p>
</div> 
<div class="col-md-3"  >
<p>NCF : <?=$nncf->value?></p>
<p>Fecha : <?=$fecha?></p>
<p>No. Contrado : <span style="color:red"><?=$row->codigoprestado?></span></p>
</div>
</div>


<div class="col-md-12" style="background:white">
<div style="overflow-x:auto">
<table class="table table-striped table-bordered">

<tr>
<th><strong>#</strong></th>
<th><strong>Fecha</strong></th>
<th><strong>Paciente</strong></th>
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
 $paciente=$this->db->select('nombre,cedula')->where('id_p_a',$fac->paciente)
 ->get('patients_appointments')->row_array();
 $autopor=$this->db->select('autopor')->where('numauto',$fac->numauto)->get('factura2')->row_array();
?>
<tr class="row-copier">
<td class="totpagseg"><?php echo $i; $i++;?></td>
<td class="fecha1"><?=$fac->fecha;?></td>
<td class="paciente"><a target="_blank"  href="<?php echo base_url("$controller/patient/$fac->paciente")?>"> <?=$paciente['nombre']?></a></td>

<td class="cedula"><?=$paciente['cedula']?></td>

<td class="num_af"><?=$fac->num_af;?></td>
<td class="numauto" style="color:red" title="Autorizado por : <?=$autopor['autopor']?>"><?=$fac->numauto;?></td>

<td class="tsubtotal"><?=$fac->tsubtotal;?></td>
<td class="totpagpa"><?=$fac->totpagpa;?></td>
<td class="totpagseg"><?=$fac->totpagseg;?></td>

</tr> 
<?php
}
$this->db->select("SUM(tsubtotal) as tot");
$this->db->where("ncf_id",$last_id);
$this->db->from('invoice_ars_claims');
$r0=$this->db->get()->row()->tot;
$r0f=number_format($r0,2);
//------------------------------------------
$this->db->select("SUM(totpagpa) as total");
$this->db->where("ncf_id",$last_id);
$this->db->from('invoice_ars_claims');
$r1=$this->db->get()->row()->total;
$r1f=number_format($r1,2);
//------------------------------------------
$this->db->select("SUM(totpagseg) as total1");
$this->db->where("ncf_id",$last_id);
$this->db->from('invoice_ars_claims');
$r2=$this->db->get()->row()->total1;
$r2f=number_format($r2,2);
?>
<tr><th colspan="6">Total </th><th>RD$ <?php echo $r0f ; ?></th><th>RD$ <?php echo $r1f ; ?></th><th>RD$ <?php echo $r2f ; ?></th></tr>
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

<!-- *** LOGIN MODAL END *** -->



<!-- /#copyright -->

<!-- *** COPYRIGHT END *** -->




<!-- /#all -->

<!-- #### JAVASCRIPT FILES ### -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(window).on('load',function(){
$('#myModal').modal('show');
});
//prevent modal from closing on click
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})
</script>

</body>

</html>