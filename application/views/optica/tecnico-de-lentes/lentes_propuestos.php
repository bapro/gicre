 <style>
 td,th,label,input{font-size:13px}
 .radio{font-size:15px}
 td{text-align:left}

th{text-align:left}

.loadf {
    left: 0;
    line-height: 200px;
    margin-top: -100px;
    position: absolute;
    text-align: center;
    top: 50%;
    width: 100%;
}

 </style>
 <body>
  <section >

<div class="container">
<div class="loadf"></div>

<div class="col-md-10"><h3><i class="glyphicon glyphicon-sunglasses" style='font-size:30px'></i> <?=$title?></h3></div><br/>
<div class="col-md-2 text-right">
<a href="#"  onclick="window.location.reload()" id="refresh"  class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-refresh"></i> </a>

<br/>
</div>
<div class="col-md-3">
<select class='select2' id='search-patient'>
<option value=''>Buscar paciente</option>
 <?php
 $sql ="SELECT patient,inserted_time, laboratory_lentes.id AS idlente FROM h_c_of_refracion JOIN laboratory_lentes ON h_c_of_refracion.id= laboratory_lentes.id_refraccion WHERE  enviado=$enviado ORDER BY laboratory_lentes.id desc ";
$querysc= $this->db->query($sql);
  foreach($querysc->result() as $row){
	  $fecha=date("d-m-Y H:i:s", strtotime($row->inserted_time));
  $pat=$this->db->select('nombre,cedula')->where('id_p_a',$row->patient)->get('patients_appointments')->row_array();
  $nombre=$pat['nombre'];
 echo '<option value="'.$row->idlente.'">'.$nombre.' : '.$fecha.'</option>';
   }?>
</select>
<br/><br/>
</div>
<?php $i=1?>

<div class="col-md-12">
<div class="table-responsive">
<div id='search-resut'></div>
<table  class="table table-striped" width="100%" >

  <tbody id='myTable'>
    <?php foreach($query->result() as $row)
	 
	 {
		 $centro_name=$this->db->select('name')->where('id_m_c',$row->id_centro)->get('medical_centers')->row('name');
		 $doc=$this->db->select('name')->where('id_user',$row->id_doc)->get('users')->row('name');
		 $patient=$this->db->select('nombre,cedula,tel_resi,tel_cel,provincia,municipio,barrio,calle,seguro_medico')->where('id_p_a',$row->patient)->get('patients_appointments')->row_array();
	    $pronpat=$this->db->select('title')->where('id',$patient['provincia'])->get('provinces')->row('title');
       $munipat=$this->db->select('title_town')->where('id_town',$patient['municipio'])->get('townships')->row('title_town');
	   	$sm=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])->get('seguro_medico')->row('title');
		
		$fecha_color='';
		$fecha= date("Y-m-d", strtotime($row->fecha_de_entrega));
		if(date("Y-m-d")<=$fecha){
			$fecha_color='green';
		}
		
		if(date("Y-m-d")>=$fecha){
			$fecha_color='green';
		}
		
		if(date("Y-m-d")>=date('Y-m-d', strtotime($row->fecha_de_entrega. ' + 3 days'))){
			$fecha_color='#C4A715';
		}
		
		if(date("Y-m-d")>=date('Y-m-d', strtotime($row->fecha_de_entrega. ' + 5 days'))){
			$fecha_color='red';
		}
		
	?>
	  
	<tr style="background:#5957F7;color:white">
	 <th class="col-xs-1">#</th>
	  <th class="col-xs-3">Centros Medicos/Optica</th>
		<th class="col-xs-1">Doctor/Optometra</th>
	   <th class="col-xs-2">Paciente</th>
	   <th class="col-xs-1">Cedula</th>
        <th class="col-xs-2" >Telefono</th>
		 <th class="col-xs-3" >Direccion</th>
		  <th class="col-xs-2" >Seguro</th>
	
    </tr>
  
        <tr style='border-top:2px solid #5957F7;color:#5957F7;background:#B0E0E6' >
		<th><?php echo $i; $i++?> <i class="glyphicon glyphicon-sunglasses" style='font-size:18px'></i></th>
		<th><?=$centro_name?></th>
		<th><?=$doc?></th>
		<th class='me'><?=$patient['nombre']?></th>
		<th><?=$patient['cedula']?></th>
		<th><?=$patient['tel_cel']?> / <?=$patient['tel_resi']?></th>
		<th><?=$pronpat?>, <?=$munipat?> <?=$patient['barrio']?> <?=$patient['calle']?></th>
		<th><?=$sm?></th>
		  </tr>
		<tr >
		
		<td colspan='8' class='me' >
		<table class="table  table-bordered" >
<tr>
<th></th><th style='text-align:left'>Esfera</th><th style='text-align:left'>Cilindro</th><th style='text-align:left'>Eje</th><th style='text-align:left'>Add</th>
</tr>
<tr>
<th>OD</th>
<td>
<table>
<tr>
<td>
 <?php
if($row->od_espera_r==1){$checked="<span class='radio'>+</span>";}else{$checked="";}

echo $checked;


if($row->od_espera_r==0){$checked="<span class='radio'>-</span>";}else{$checked="";}


echo $checked;
?>
	
</td>
<td>
<label><?=$row->od_espera?></label>

</td>
</tr>
</table>

</td>
<td>

<table>
<tr>
<td>

 <?php
if($row->od_cilindro_r==1){$checked="<span class='radio'>+</span>";}else{$checked="";}

echo $checked;


if($row->od_cilindro_r==0){$checked="<span class='radio'>-</span>";}else{$checked="";}


echo $checked;
?>

</td>
<td>
<label><?=$row->od_cilindro?></label>

</td>
</tr>
</table>

</td>
<td>
<?=$row->eje_od?>
</td>
<td>
<?=$row->add_od?>
</td>

</tr>
<tr>
<th>OS</th>
<td>

<table>
<tr>
<td>
 <?php
 
 if($row->os_espera_r==1){$checked="<span class='radio'>+</span>";}else{$checked="";}

echo $checked;


if($row->os_espera_r==0){$checked="<span class='radio'>-</span>";}else{$checked="";}


echo $checked;
 ?>
</td>
<td>
<label><?=$row->espera_os?></label>

</td>
</tr>
</table>


</td>
<td>

<table>
<tr>

<td>
  <?php
  
  if($row->os_cilindro_r==1){$checked="<span class='radio'>+</span>";}else{$checked="";}

echo $checked;


if($row->os_cilindro_r==0){$checked="<span class='radio'>-</span>";}else{$checked="";}


echo $checked;
 ?>
</td>
<td>
<label><?=$row->cilindro_os?></label>

</td>
</tr>
</table>


</td>
<td>
<label><?=$row->eje_os?></label>

</td>

<td>
<label><?=$row->add_os?></label>
</td>

</tr>
<tr>
<td>
<label>DP <?=$row->d_prf?> Mm</label> 
  <div class="checkbox">
   <?php
   if ($row->vision_sencilla ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="vision-sencilla2" <?=$selected?> >Visión Sencilla</label>
  </div>
  <div class="checkbox">
  <?php
   if ($row->flat_top ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="flat-top2" <?=$selected?> >Flat Top</label>
</div>

<div class="checkbox ">
 <?php
   if ($row->invisibles ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="invisibles2" <?=$selected?> >Invisibles</label>
</div>
<div class="checkbox ">
 <?php
   if ($row->progresivos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="progresivos2" <?=$selected?> > Progresivos</label>
</div>
</td>
<td>
 <label>Altura <?=$row->altura_mm?> Mm</label> 
   <div class="checkbox">
   <?php
   if ($row->antirreflejos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="antirreflejos2" <?=$selected?>  > Antirreflejos</label>
</div>
<div class="checkbox">
 <?php
   if ($row->policarbonatos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="policarbonatos2" <?=$selected?>  > Policarbonatos</label>
</div>
<div class="checkbox ">
 <?php
   if ($row->transitions ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="transitions2" <?=$selected?>  > Transitions</label>
</div>


<div class="checkbox ">
 <?php
   if ($row->foto_croma ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="transitions2" <?=$selected?>  > Fotocromatico</label>
</div>



</td>
<td>
<?php if($row->ref_observaciones){
echo "<label>Observación</label> <br/>$row->ref_observaciones";
}?>
</td>
<td style='background:<?=$fecha_color?>;color:#FFFFFF;width:15%;border-radius:9px;text-align:center;font-size:15px;display:<?=$display?>' colspan=2>
 <form method="post" action="<?php echo site_url("tecLente/save_lentes_entregados");?>" >
Fecha de entrega <br/>
<?=date("d-m-Y H:i", strtotime($row->fecha_de_entrega));?>
<input type="hidden" name="idlente"  value="<?=$row->idlente?>"  >
<br/><br/>
<button type='submit' class="btn btn-sm btn-default" name='entregado' value='1' >Entregar <i class="fa fa-check-circle"></i></button>
 </form>
</td>
<th style='display:<?=$display2?>;color:green;text-align:center' colspan='2'>
<i style='font-size:24px' class='fa fa-check' aria-hidden='true' ></i> Entregado <?=date("d-m-Y H:i", strtotime($row->entregado_time));?>
</th>


</tr>

</table>
</td>
</tr>
	 <?php
	 }
	 ?>
    </tbody> 
 	
</table>
 <div class="pagination" style='float:right'>
       <?php echo $links;?>
   </div>
</div>

</div>
<div id='content-refraccion'></div>
</div>
</div>

<?php $this->load->view('footer');?>
  </section > 
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



  <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
$('input[type="checkbox"]').on('click', function(ev){
    ev.preventDefault();
})
 $(".select2").select2({
tags: true
});
 
   $("#search-patient").on("change", function() {
$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
  $.ajax({
url:"<?php echo base_url(); ?>tecLente/search_patient",
data: {id:$(this).val(),display:"<?=$display?>",display2:"<?=$display2?>"},
method:"POST",
success:function(data){

var url2 = "<?php echo base_url(); ?>tecLente/lentes_entregados_";
window.location.replace(url2);
},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#content-refraccion').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },
});
 });
 
 
})
 
    </script>  
 </body>
</html>