<style>
td,th{text-align:left}

.fa.fa-history,.fa.fa-check, em{
	
color:red;font-size:11px;text-transform:lowercase	
}
</style>

<!-- *** welcome message modal box *** -->

<?php

$this->padron_database = $this->load->database('padron',TRUE);
//$this->load->view('medico/header');

if($perfil=="Admin"){$controller="admin";}else{$controller="medico";}
$today=date('Y-m-d');
?>

<body>
<div class="col-md-12">
<div class="row">
<a href="<?php echo site_url("$controller/create_cita");?>" class="btn btn-primary btn-xs">Buscar/Crear Paciente</a>
<hr id="hr_ad"/>
</div>
</div>
<div class="col-md-12">

<div class="row">
<div style='display:<?=$displayTotInfo?>'>
<select  class="form-control select2" style="background:#E0E5E6;width:100%" id='by-doctor' >
<option value='0'><?=$countTotalCitaDocNum?></option>
<?php
foreach($countTotalCitaDoc as $rowtd){
$doctot=$this->db->select('name')->where('id_user',$rowtd->doctor )
   ->get('users')->row('name');

	echo '<option value="'.$rowtd->doctor.'">Dr '.$doctot.' : '.$rowtd->Total.' cita(s) </option>';
}
echo "</select>";
echo "<br/><br/>";
echo "</div>";

if($perfil=="Asistente Medico")
 {
?>

 <form class="form-inline" method="get"  action="<?php echo site_url("$controller/SeachCitaResultAs");?>" >
 <div class="col-md-3" > 
<select id="doctor"  name="doctor"  class="form-control select2" style="background:#E0E5E6;width:100%" >
<option value="">Seleccione un medico</option>
<?php
$sql ="SELECT id_doctor FROM centro_doc_as WHERE id_asdoc =$iduser group by id_doctor";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$name= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
	echo '<option value="'.$row->id_doctor.'">Dr '.$name.'</option>';
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
  echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>
</select>
</div>
<?php 
 }
 ?>

<div class="col-md-9" style="background:#E0E5E6;border:1px solid #38a7bb;"> 
<div class="form-group">
<label for="desde" style='font-size:10px'>Desde</label><input type="text" id="date_from" name="date_from" value="<?=date('d-m-Y');?>" class="form-control" readonly>
</div>
<div class="form-group">
<label for="hasta" style='font-size:10px'>Hasta</label><input type="text" id="date_to"  value="<?=date('d-m-Y');?>" name="date_to" class="form-control" readonly >
</div>
<button type="submit" id="click_button" class="btn btn-primary btn-xs" disabled><i class="fa fa-search"></i></button>

<?php
 if($perfil=="Asistente Medico")
 {
 } else{
 if($appointments !=NULL)
 {
?>
<a target="_blank" href="<?php echo base_url("printings/print_hoy_cita1/$iduser/$perfil")?>"   title="Imprimir Las Citas de Hoy" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
<?php }
} ?>

</div>
</form>
<span id="flash1"></span>
</div>


<hr id="hr_ad"/>


<div class="row"  id="dis" >
<span style='text-align:center;color:red' id='mover-mouse'></span>
<div  style="overflow-x:auto;">
<div id="load-citas-hoy">
<table id="" class="table table-striped sort-me" style="margin:auto"  cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th><strong>Foto </strong></th>
<th><strong>NEC</strong></th>
<th><strong>Paciente</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro</strong></th>
<th><strong>Doctor</strong></th>
<th><strong>Historial Medica</strong></th>
<th><strong>Acciones</strong></th>
</tr>
</thead>
<tbody>
<?php
$today=date('Y-m-d');
$this->padron_database = $this->load->database('padron',TRUE);
 foreach($appointments as $ver)
{
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3,frecuencia')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();
$q=$this->db->select('id_patient')->where('id_patient',$ver->id_patient)->where('doctor',$ver->doctor)->where('centro',$ver->centro)->like('update_time',date("Y-m-d"))->get('rendez_vous');
$sql_con ="SELECT historial_id FROM h_c_enfermedad where filter_date='$today' AND historial_id=$ver->id_patient AND user_id=$ver->doctor AND centro_medico=$ver->centro";
$atendido_con = $this->db->query($sql_con);
$area_d=$this->db->select('title_area')->where('id_ar',$ver->area )
->get('areas')->row("title_area");


if($atendido_con->num_rows() > 0){
$atend="<i style='color:green' class='fa fa-check' aria-hidden='true'></i>";
$title_hist="&#013 Hay una historial medica por hoy";
$hist=1;
}
else 
{
$atend="";
$hist=0;
$title_hist="";
}

$sqlcita="SELECT id_rdv FROM factura2 where id_rdv=$ver->id_apoint";
$cita_con = $this->db->query($sqlcita);

if($cita_con->num_rows() > 0){
$cita='#B8FFD3';

$thay_fac1="<span title='cita facturada' style='color:green;font-size:11px'>RD$</span>";  
}
else 
{
$cita="";

$thay_fac1=""; 
}



$freq="SELECT historial_id FROM h_c_enfermedad WHERE  historial_id=$ver->id_patient AND user_id=$ver->doctor group by filter_date";
$cita_freq = $this->db->query($freq);

if($cita_freq->num_rows() == 0){
	 $frecuencia_text="";$frecuencia_nbr="";
  }else if($cita_freq->num_rows() == 1){
	$frecuencia_text="$cita_freq->num_rows vista"; $frecuencia_nbr="$cita_freq->num_rows";   
  } else{
	$frecuencia_text="$cita_freq->num_rows vistas"; $frecuencia_nbr="$cita_freq->num_rows";
 }

?>
<tr style="background:<?=$cita?>" title="<?=$title_hist?>">

<td>
<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
echo '<img width="75px"    src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
}else{
echo '<img  style="width:75px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($patient['photo']==""){
?>
<img  width="75px"  src="<?= base_url();?>/assets/img/user.png"  />	
<?php
}
else{
	?>
<img  width="75px"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>
</td>
<td><?=$ver->nec;?></td>

<td style="text-transform: uppercase;">
<a style='color:<?=$white?>' href="<?php echo site_url("$controller/patient/$ver->id_patient/$ver->centro/$ver->doctor"); ?>"><?=$patient['nombre'];?></a> 
</td>

<td ><?=$ver->fecha_propuesta;?></td>
<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name,type')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<a style='color:<?=$white?>' href="<?php echo site_url("$controller/centro_medico/".$ver->centro); ?>"><?=$centro['name'];?></a>
</td>
<td style="text-transform: uppercase">
<?php 
	$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
   ->get('users')->row('name');
   if($perfil=="Admin"){?> <a style='color:<?=$white?>' title="<?=$area_d?>" href="<?php echo site_url("admin/doctor/".$ver->doctor); ?>"><?=$doctor;?></a><?}else{echo $doctor;}?>
   
   </td>
<td style="text-transform: uppercase">
<?php if($perfil=="Admin") {?>
<a style='color:<?=$white?>' href="<?php echo site_url("$controller/historial_medical/$ver->id_patient/$iduser/0/$ver->centro/$hist/$iduser"); ?>"><i  class="fa fa-history" aria-hidden="true" title='ir a la historia clinica' ></i> <?=$atend?> <em  title='<?=$frecuencia_text;?>'> <?=$frecuencia_nbr;?></em></a>
<?php } else if($perfil=="Medico"){
?>
<a style='color:<?=$white?>' href="<?php echo site_url("$controller/historial_medical/$ver->id_patient/$iduser/$area_id/$ver->centro/$hist/$iduser"); ?>"><i  class="fa fa-history" aria-hidden="true" title='ir a la historia clinica' ></i> <?=$atend?> <em  title='<?=$frecuencia_text;?>'> <?=$frecuencia_nbr;?></em></a>
<?php	
}else if($perfil=="Asistente Medico" && $centro['type']=="privado"){
$areaid= $this->db->select('area')->where('id_user',$ver->doctor)->get('users')->row('area');
?>
<a href="<?php echo site_url("$controller/historial_medical_past/$ver->id_patient/$ver->doctor/$areaid/$ver->centro/4/$iduser"); ?>"><i class="fa fa-history" aria-hidden="true" title='ir a la historia clinica'></i> <?=$atend?> <em  title='<?=$frecuencia_text;?>'> <?=$frecuencia_nbr;?></em></a>
<?php
}else{
echo "<span style='color:red;font-size:15px'>No tiene acceso a la historia clinica</span>";
}?>

</td>
<td>
<?php 
if($cita_con->num_rows()== 0 && $atendido_con->num_rows()== 0){
?>	

<a style='color:red;cursor:pointer;'  class="cancelar-cita" id="<?=$ver->id_apoint; ?>" title='Cancelar la cita'><i class="fa fa-remove" ></i></a>
<a data-toggle="modal"  class='btn-programar' data-target="#EditC" href="<?php echo site_url("admin_medico/UpdateCita/$ver->id_apoint/$iduser/0")?>"    title='Reprogramar la cita' ><i class="fa fa-pencil" aria-hidden="true" ></i></a>

<?php
}
echo $thay_fac1;
?>


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
</div>

<br/><br/>
</div>

<br/>
</div>

</div>

 </body>
<?php 


$this->load->view('footer');


?>



</body>
<div class="modal fade" id="EditC"  role="dialog"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript">
//--------------------------------------------------------------------------------------------------
/*$(document).ready(function(e){
  var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
  $('#datatable').DataTable({
     "pageLength" : 10,
     "serverSide": true,
     "order": [[0, "asc" ]],
     "ajax":{
              url :  base_url+'admin_medico/getTodayCita',
              type : 'POST',
			  data:{iduser:<?=$iduser?>,perfil:"<?=$perfil?>",controller:"<?=$controller?>",area_id:<?=$area_id?>},
            },
  }); 
}); */
//---------------------------------------------------------------------------------------------------

$('#EditC').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$(".cancelar-cita").click(function(){
if (confirm("¿Estás seguro de cancelar esta cita?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/cancelCita')?>',
data: {id:del_id,iduser:<?=$iduser?>},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
})



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
});



$("#by-doctor").on('change', function () {
$('#load-citas-hoy').html('<span style="text-align:center"> <img   src="<?= base_url();?>assets/img/loading.gif" /> cargando las citas...</span>');
var id_doc=$(this).val();
if( id_doc !=0){
	$.ajax({
type: "POST",
url: "<?=base_url('admin/getConfirmSolicitudByDoc')?>",
data: {iduser:<?=$iduser?>,id_doc:id_doc},
success:function(data){ 
$("#load-citas-hoy").html(data);
}, 
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#load-citas-hoy"').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
});
}else{
	location.reload();
}
});



$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});


 
/*
$(function() {
$("#date_from").datepicker({ dateFormat: "dd-mm-yy" }).val()


$("#date_from").click(function() {

date = new Date();
date.setDate(date.getDate()-1);
$( "#date_from" ).datepicker( "setDate" , date);

}); 

});
*/
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

</html>