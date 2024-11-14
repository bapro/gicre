<?php
 $total_sub=0;
$total_seg=0;
$total_pat=0;
 $controller=$this->session->userdata('USER_CONTROLLER');
$fecha = date("d-m-Y");	
 foreach ($invoice as $row)

foreach ($nota_ncf as $nncf) 

 $this->padron_database = $this->load->database('padron',TRUE);
$ars=$this->db->select('logo,title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row_array();

if($ars['logo']==""){
$seguro_logo="";
} else{
$seguro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$ars['logo'].'"  />';	
}
$centro=$this->db->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle,type')->where('id_m_c',$row->center_id)->get('medical_centers')->row_array();
$centro_name=$centro['name'];
$rnc=$centro['rnc'];
$centro_logo=$centro['logo'];
$primer_tel=$centro['primer_tel'];
$segundo_tel=$centro['segundo_tel'];
$barrio=$centro['barrio'];
$calle=$centro['calle'];
$centro_prov=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$centro_muni=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');

$centro_type=$centro['type'];

if($centro_type=='privado'){
$doctor=$this->db->select('name')->where('id_user',$row->medico)
->get('users')->row('name');
$doc=$this->db->select('exequatur,area,cedula')->where('id_user',$row->medico)
->get('users')->row_array();


$area=$this->db->select('title_area')->where('id_ar',$doc['area'])
->get('areas')->row('title_area');

$segurocodigoc=$this->db->select('codigo')->where('id_seguro',$row->seguro_medico)->where('id_doctor',$row->medico)->get('codigo_contrato')->row('codigo');
$header ="	
<h3 class='text-primary text-center'>$doctor</h3>
<h5 class='text-primary text-center'>$area</h5>
<h6 class='text-primary text-center'>Exeq: ".$doc['exequatur'].", Cedula: ".$doc['cedula']."</h6>";	
	
	
}else{
 $segurocodigoc=$this->db->select('codigo')->where('id_centro',$row->center_id)->where('id_seguro',$row->seguro_medico)->get('codigo_contrato')->row('codigo');

$header ="	
<h3 class='text-primary text-center'>$centro_name</h3>
<h6 class='text-primary text-center'><strong>Tel:</strong> $primer_tel $segundo_tel <strong>RNC: </strong>$rnc <strong>Ubicación:</strong> $calle, $barrio, $centro_prov, $centro_muni </h6>";		
}
?>
  
  <section class="py-3">
        <div class="container d-flex align-items-center justify-content-center">
		 <div class="col-lg-12">
            <div class="card bg-light">
                <div class="card-body">
				<div id="show-error"></div>
                    <div class="row g-2 align-items-center" id="scroll">
                        
                       
                            <?=$header?>
<hr/>
							<form class="row g-3" method="post"  id="import_tarifarios" enctype="multipart/form-data">
							<h4 class="text-primary text-center ">Factura Valida Para Credito Fiscal</h4>
							<div class="col-md-6">
							<div class="input-group ">

							<span class="input-group-text">NCF</span>
							<input type="text" class="form-control deactivate ncf" value="<?=$nncf->value?>"  id="ncf" disabled>
							</div>

							</div>
							<div class="col-md-6">
							<div class="input-group ">

							<span class="input-group-text">Vecimiento secuencia</span>
							<input type="date" class="form-control deactivate" type="text" value="<?=$nncf->vec_fec?>"  id="vecimiento-secuencia"  name="vecimiento-secuencia"  disabled >
							</div>

							</div>


							<div class="text-center">
							<button title="Modificar el RNC" type="button" class="btn btn-sm btn-primary" id="show-ncf" style="float: none;" ><span class="bi bi-pencil"></span> Modificar</button>
							<button title="Guadar" type="button" id="save-ncf" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="bi bi-save"></span> Guardar</button>
							</div>
							</form>
							<hr/>
							<div class="col-md-7">
							<button type="button" class="btn btn-danger btn-sm" id="cancelar"><i class="bi bi-x-circle"></i>  Cancelar Reclamación de Facturas</button>
							</div>
							<div class="col-md-5 text-end">
							<!--<a class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/invoice_ars_claim")?>"> ver todo</a> -->
							<a class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/invoice_ars_claim_reports")?>"><i class="fa fa-plus"></i>  Nuevo</a> 
							<a  class="btn btn-primary btn-sm" target="_blank" href="<?php echo base_url("print_page/printInvoice/$desde/$hasta/$id_ncf/$row->center_id/$row->medico/$row->seguro_medico")?>"><i class="fa fa-print"></i>  Imprimir</a>

							</div>


						<hr/>
						<div class="col-md-9" >
						<p><?php echo $seguro_logo; ?> <?=$ars['title']?></p>
						</div> 
						<div class="col-md-3"  >
						<p>Fecha : <?=$fecha?></p>
						<p>No. Contrado : <span style="color:red"><?=$segurocodigoc?></span></p>
						</div>

			    </div>
				<div class="row g-2 align-items-center">
				<hr/>
				<div class="col-md-12" style="background:white">

<h5>Desde <?=date("d-m-Y", strtotime($desde))?> Hasta: <?=date("d-m-Y", strtotime($hasta))?></h5>
<div style="overflow-x:auto">
<table class="table table-striped table-sm">

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
 $paciente=$this->db->select('id_p_a,nombre,cedula,ced1,ced2,ced3,photo')->where('id_p_a',$fac->paciente)
 ->get('patients_appointments')->row_array();
 
  //$numautoid=$this->db->select('id2')->where('idfac',$fac->id_fac2)
 //->get('factura')->row('id2');
 
   $numauto=$this->db->select('numauto,autopor')->where('idfacc',$fac->id_f)
 ->get('factura2')->row_array();
 
 
  $num_af=$this->db->select('input_name')->where('patient_id',$fac->paciente)->where('input_name !=','')
 ->get('saveinput')->row('input_name');
 
 
 $array_values_for_photo = array(
			'id_p_a' => $paciente['id_p_a'],
			'cedula' => $paciente['cedula'],
			'image_class' => "rounded-circle",
			'style' => 'width=60'

		);
		$imgpat= $this->search_patient_photo->search_patient($array_values_for_photo);
		
$this->db->select("SUM(subtotal) as sbt");
$this->db->where("id2",$fac->idfacc);
$this->db->from('factura');
$sbt=$this->db->get()->row()->sbt;


$this->db->select("SUM(totalpaseg) as tps");
$this->db->where("id2",$fac->idfacc);
$this->db->from('factura');
$tps=$this->db->get()->row()->tps;



$this->db->select("SUM(totpapat) as tpat");
$this->db->where("id2",$fac->idfacc);
$this->db->from('factura');
$tpat=$this->db->get()->row()->tpat;


 $total_sub += $sbt;
   $total_seg += $tps;
   $total_pat += $tpat; 
$money_device = $this->db->select('money_device')->where('id_factura', $fac->idfacc)->get('factura_modalidad_pago')->row('money_device');
if($money_device){
$money_device=$money_device;	
}else{
$money_device='RD$';	
}
?>
<tr class="row-copier">
<td class="totpagseg"><?php echo $i; $i++;?></td>
<td class="fecha1"><?=$fac->fecha;?></td>
<td class="paciente"> <?=$paciente['nombre']?></td>
<td><?=$imgpat?></td>
<td class="cedula"><?=$paciente['cedula']?></td>

<td class="num_af"><?=$num_af;?></td>
<td class="numauto" style="color:red" title="Autorizado por : <?=$numauto['autopor']?>"><?=$numauto['numauto'];?></td>

<td class="tsubtotal"><?=number_format($sbt,2)?></td>
<td class="totpagpa"><?=number_format($tpat,2);?></td>
<td class="totpagseg"><?=number_format($tps,2);?></td>

</tr> 
<?php
}
$sub_total=number_format($total_sub,2);
$total_pagar_seguro=number_format($total_seg,2);
$total_pagar_patient=number_format($total_pat,2);
?>
<tr><th><?php echo $cnt?></th><th colspan="6">Subtotal </th><th><?=$money_device?> <?=$sub_total ?></th><th><?=$money_device?><?=$total_pagar_patient ?></th><th><?=$money_device?><?=$total_pagar_seguro ?></th></tr>


<tr style="color:red"><th colspan="9"> </th>
<td >
<table>
<tr>
<th>DESC.: 0.00</th>
</tr>
<tr>
<th>ITBIS.: 0.00 </th>
</tr>
<tr>
<th style="color:blue">Total: <?=$money_device?><?=$total_pagar_seguro; ?></th>
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
		</div>
<input type="hidden" value="<?=$nncf->id_ncf?>" id="id_ncf"  />
    </section>
    <?php $this->load->view('footer'); ?>

   <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
     <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="<?= base_url();?>assets_new/js/main.js"></script>
<script>
var id_ncf=$("#id_ncf").val();
  $('#show-ncf').on('click',function(){
       $(this).hide();
        $("#save-ncf").show();
		$(".deactivate").prop("disabled",false);
    });
	
	
	$('html, body').animate({
        scrollTop: $('#scroll').offset().top
    }, 'slow');
	
	
	
	 $('#save-ncf').on('click', function () {
var ncf  = $("#ncf").val();
var vec_fec  = $("#vecimiento-secuencia").val();

  if(ncf==""){
	 alert("El NCF no se puede dejar vacio !");
 } else { 
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


$('#cancelar').on('click', function () {

if (confirm("Estás seguro de cancelar ?"))
        {
		$.ajax({
		type: "POST",
		url: '<?php echo site_url('invoice_ars_report_controller/cancel_ncf');?>',
		data:{id_ncf:id_ncf},
		success: function(data){
			window.location.href = "<?php echo site_url("$controller/invoice_ars_claim_reports");?>"; 
       },
		});
}
})
	
</script>
</body>

</html>