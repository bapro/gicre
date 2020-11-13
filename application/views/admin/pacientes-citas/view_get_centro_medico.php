<?php
$this->padron_database = $this->load->database('padron',TRUE);
if($perfil=='Admin'){
	$controller="admin";
	$back='appointments';
}
else {
	$controller="medico";
	$back='index';
}

 if ($VER_CONFIRMADA_SOLICITUD !== null)
{
	
?>
<div class="row">
<a href="<?php echo site_url("$controller/$back"); ?>" class="btn btn-primary btn-xs">Citas de hoy </a>
<br/><br/>
<?php
if($perfil=="Asistente Medico")
 {

?>
 <form class="form-inline" method="get"  action="<?php echo site_url("$controller/SeachCitaResultAs");?>" >
 <div class="col-md-3" > 
<select id="doctor"  name="doctor"  class="form-control select2" style="background:#E0E5E6;width:100%" >
<?php
$sql ="SELECT id_doctor FROM centro_doc_as WHERE id_asdoc =$iduser group by id_doctor";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$idmed= $this->db->select('id_doctor')->where('id_doctor',$doctor)->get('centro_doc_as')->row('id_doctor');	 
  if($doctor==$row->id_doctor){
		        $selected="selected";
		} else {
		       $selected="";
	    }	 
$name= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
	echo "<option $selected value='$row->id_doctor'>Dr $name</option>";
}?>
</select>
</div>
 <?php 

 } else{
 ?>

 <form class="form-inline" method="get"  action="<?php echo site_url("$controller/SeachCitaResult");?>" >
  <div class="col-md-3" > 
<select  name="centro"  class="form-control select2" style="background:#E0E5E6;width:100%" >
 <?php 
foreach($centro_medico as $row)
 { 
 $centr= $this->db->select('id_m_c')->where('id_m_c',$row->id_m_c)->get('medical_centers')->row('id_m_c');
  
  if($centro==$centr){
		        $selected="selected";
		} else {
		       $selected="";
	    }
 echo "<option value='$row->id_m_c.' $selected>$row->name</option>"; 
}
 ?>
</select>
</div>
<?php 
 }
 ?>

<div class="col-md-9" style="background:#E0E5E6;border:1px solid #38a7bb;"> 
<div class="form-group">
<label for="desde" style='font-size:10px'>Desde</label><input type="text" id="date_from" name="date_from" value="<?=$date1?>" class="form-control" readonly>
</div>
<div class="form-group">
<label for="hasta" style='font-size:10px'>Hasta</label><input type="text" id="date_to" value="<?=$date2?>" name="date_to" class="form-control" readonly >
</div>
<button type="submit" id="click_button" class="btn btn-primary btn-xs" ><i class="fa fa-search"></i></button>
</div>
</form>

</div>
<hr id="hr_ad"/>

<div class="row">
<div  style="overflow-x:auto;">
<div id="load-citas-hoy">
<table class="table table-striped  display <?=$exam?>">
 <thead>
<tr style="background:#5957F7;color:white">
<th><strong>Foto</strong></th>
<th><strong>NEC</strong></th>
<th><strong>Paciente</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro Medico</strong></th>
<th><strong>Doctor</strong></th>
<th><strong>Historial Medical</strong></th>
</tr>
</thead>
 <tbody>
<?php
$cpt="";
foreach($VER_CONFIRMADA_SOLICITUD as $ver)
{
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();
$insert_date = date("d-m-Y H:i:s", strtotime($ver->inserted_by));
$q=$this->db->select('id_patient')->where('id_patient',$ver->id_patient)->where('doctor',$ver->doctor)->where('centro',$ver->centro)->get('rendez_vous');

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}


$sqlcita="SELECT id_rdv FROM factura2 where id_rdv=$ver->id_apoint";
$cita_con = $this->db->query($sqlcita);

if($cita_con->num_rows() > 0){
$cita='#9AFBBE';
}
else 
{
$cita="";
}

$freq="SELECT historial_id FROM h_c_enfermedad where  historial_id=$ver->id_patient group by filter_date";
$cita_freq = $this->db->query($freq);

if($cita_freq->num_rows() == 0){
	 $frecuencia_text="";
  }else if($cita_freq->num_rows() == 1){
	$frecuencia_text="$cita_freq->num_rows vista";  
  } else{
	$frecuencia_text="$cita_freq->num_rows vistas"; 
 }
?>

<tr style="background:<?=$cita?>">


<td>
<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="75" height="75"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>
</td>

<td class="id"><?=$ver->nec;?></td>

<td style="text-transform: uppercase;"><a href="<?php echo site_url("$controller/patient/$ver->id_patient/$ver->centro/$ver->doctor"); ?>"><?=$patient['nombre'];?>  </a> </td>

<td class="fecha_propuesta"><?=$ver->fecha_propuesta;?></td>

<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name,type')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<a href="<?php echo site_url("$controller/centro_medico/".$ver->centro); ?>"><?=$centro['name'];?></a>
</td>

<td style="text-transform: uppercase">
<?php 
$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
->get('users')->row('name');
if($perfil=='Admin'){
?>
<a href="<?php echo site_url("admin/doctor/".$ver->doctor); ?>"><?=$doctor;?></a>
<?php 
}
else {
	echo $doctor;
	
	}
?>
</td>
<!--<td style="font-size:11px;">
<?php if($perfil=="Medico" || $perfil=="Admin") {?>
<a  href="<?php echo site_url("$controller/historial_medical/$ver->id_patient/$iduser/$area_id/$ver->centro/2"); ?>"><i class="fa fa-history" aria-hidden="true"></i> <em style="color:red"> <?=$frecuencia_text;?></em></a>
<?php } else {echo "<span style='color:red;font-size:15px'>No tiene acceso a la historia clinica</span>";}?>
</td>-->
<td style="text-transform: uppercase">
<?php if($perfil=="Admin") {?>
<a href="<?php echo site_url("$controller/historial_medical_past/$ver->id_patient/$iduser/0/$ver->centro/1/$iduser"); ?>"><i style="font-size:11px;" class="fa fa-history" aria-hidden="true" ></i>  <em style="font-size:11px;text-transform:lowercase;color:red"> <?=$frecuencia_text;?></em></a>
<?php } else if($perfil=="Medico"){
?>
<a href="<?php echo site_url("$controller/historial_medical_past/$ver->id_patient/$iduser/$area_id/$ver->centro/1/$iduser"); ?>"><i style="font-size:11px;" class="fa fa-history" aria-hidden="true" ></i>  <em style="font-size:11px;text-transform:lowercase;color:red"> <?=$frecuencia_text;?></em></a>
<?php	
}else if($perfil=="Asistente Medico" && $centro['type']=="privado"){
$areaid= $this->db->select('area')->where('id_user',$ver->doctor)->get('users')->row('area');
?>
<a href="<?php echo site_url("$controller/historial_medical_past/$ver->id_patient/$ver->doctor/$areaid/$ver->centro/4/$iduser"); ?>"><i style="font-size:11px;" class="fa fa-history" aria-hidden="true" ></i>  <em style="font-size:11px;text-transform:lowercase;color:red"> <?=$frecuencia_text;?></em></a>
<?php
}else{
echo "<span style='color:red;font-size:15px'>No tiene acceso a la historia clinica</span>";
}?>
</td>
</tr>  

<?php
}

?>
 </tbody>
</table>
</div>
<br/>
<?php 
$sqlcita="SELECT medico FROM factura2 where medico=$iduser";
$cita = $this->db->query($sqlcita);
if($perfil=="Medico"){
$wid="width:20%";
$countcit=$cita->num_rows();
if($countcit==0){$disp="none";}else{$disp="";}	
} else{
$wid="width:18%";
$countcit="";	
$disp="";
}

?>

<br/><br/>
</div>
	</div>
<?php
}
else
{
	echo"<div class='alert alert-info'><center><strong>No hay citas que coincidan con el rango de fecha desde $date1 hasta $date2.</strong></center></div>";
}
?>
</div>
<?php 
$this->load->view('footer');
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 

<script>
/*
$("#doctor").on('change', function () {
$('#load-citas-hoy').html('<span style="text-align:center"> <img   src="<?= base_url();?>assets/img/loading.gif" /> cargando las citas...</span>');
var id_doc=$(this).val();
	$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/get_centro_cita_doc')?>",
data: {iduser:<?=$iduser?>,id_doc:id_doc},
success:function(data){ 
$("#load-citas-hoy").html(data);
},  
});
});*/





$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});


$(document).ready(function() {

    $('.<?=$exam?>').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
} );

function disabledserach(){
var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output =((''+day).length<2 ? '0' : '') + day+ '-'  +
((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();


if($("#date_from").val()==output && $("#date_to").val()==output){
$("#click_button").prop('disabled',true);
}else{
$("#click_button").prop('disabled',false);   
}
}
	
	
	
 $("#date_from").datepicker({
    dateFormat: 'dd-mm-yy',
	//maxDate: "-1d"

  });
  

  
  $("#date_to").datepicker({
	   onSelect: function() {
	disabledserach()
    },
    dateFormat: 'dd-mm-yy',
	//maxDate: "-1d"

  })

</script>