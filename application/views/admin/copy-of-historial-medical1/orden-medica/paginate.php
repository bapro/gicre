<?php
foreach ($paginate_oreden_medica->result() as $rowp) {
$inserted_time = date("d-m-Y H:i:s", strtotime($rowp->inserted_time));
 $doc=$this->db->select('name')->where('id_user',$rowp->id_user)
 ->get('users')->row('name');
$cent=$this->db->select('name')->where('id_m_c',$rowp->centro)->get('medical_centers')->row('name'); 
?>
<div class="col-md-12">
<table class='table alert alert-info' >
<tr>
<td><strong><?=$cent?></strong></td>
<td><strong>SALA :</strong> <?=$rowp->name?></td>
<td><strong>CREADO POR :</strong> <?=$doc?>, <?=date("d-m-Y H:i:s", strtotime($rowp->inserted_time));?></td>
</tr>
<tr>
<?php if($rowp->fecha_ingreso){?>
<td>
<strong>Fecha De Ingreso :</strong> 
<?php
echo date("d-m-Y H:i:s", strtotime($rowp->fecha_ingreso));
}
?>
</td>
<?php } if($rowp->diagno_ing !=""){?>
<td><strong>Diagnostico De Ingreso :</strong> <?=$rowp->diagno_ing?></td>
<?php } ?>
</tr>
<tr>
<td  colspan='3'><button class="btn btn-xs btn-warning" id="repetir">REPETIR ORDEN MEDICA #<?=$rowp->idsala?></button></td>
</tr>
</table>
<div style='overflow-x:auto;'>
<h4 class="h4 his_med_title">I- Indicaciones Medicamentos</h4>
<a data-toggle="modal"   data-target="#newM" style="float:left" href="<?php echo site_url("admin_medico/paginate_new_ord_med/$user_id/$id_patient/$rowp->idsala/$centro_id/$direction/1/$id_em")?>" class="btn btn-default btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Agregar nuevo medicamento"  ></i> Crear</a>
<br/><br/>

<div id='new-paginate-med'></div>

<hr id='hr_ad'/>
<h4 class="h4 his_med_title">II-Indicaciones Estudios</h4>
<a data-toggle="modal"   data-target="#newM" style="float:left" href="<?php echo site_url("admin_medico/paginate_new_ord_med/$user_id/$id_patient/$rowp->idsala/$centro_id/$direction/2/$id_em")?>" class="btn btn-default btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Agregar nuevo esutudios"  ></i> Crear</a>
<br/><br/>
<div id='new-paginate-est'></div>


<hr id='hr_ad'/>
<h4 class="h4 his_med_title">III- Indicaciones Laboratorios</h4>
<a data-toggle="modal"   data-target="#newM" style="float:left" href="<?php echo site_url("admin_medico/paginate_new_ord_med/$user_id/$id_patient/$rowp->idsala/$centro_id/$direction/3/$id_em")?>" class="btn btn-default btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Agregar nuevo laboratorios"  ></i> Crear </a>
<br/><br/>
<div id='new-paginate-lab'></div>

<hr id='hr_ad'/>
<h4 class="h4 his_med_title">IV- MEDIDAS GENERALES</h4>

<a data-toggle="modal"   data-target="#newM" style="float:left" href="<?php echo site_url("admin_medico/paginate_new_ord_med/$user_id/$id_patient/$rowp->idsala/$centro_id/$direction/4/$id_em")?>" class="btn btn-default btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Agregar nuevos medidas generales"  ></i> Crear</a>
<br/><br/>
<div id="new-paginate-med-gen"></div>

</div>
</div>
<hr id='hr_ad'/>
<div class="col-md-12">
<a  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/orden_medica/$rowp->id_user/$rowp->id_historial/$rowp->idsala")?>"  ><i class="fa fa-print"></i> Imprimir</a>
<hr id='hr_ad'/>
</div>
<!----------------------------------------------------->
<div class="modal fade" id="newM"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<!----------------------------------------------------->

<div class="modal fade" id="edit_recetas_or_med"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<!------------------------------------------------------------>
<div class="modal fade" id="edit_estudios_or_med2"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<!------------------------------------------------------------>
<div class="modal fade" id="edit_medida_gnl"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>

<script>

allRecetasOrdMed();

function allRecetasOrdMed()
{

var idsala  = <?=$rowp->idsala?>;
var perfil  = "<?=$perfil?>";
var id_user  = <?=$user_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/paginateMed",
data: {idsala:idsala,perfil:perfil,id_user:id_user,direction:<?=$direction?>},
method:"POST",
success:function(data){
$('#new-paginate-med').html(data);
}
});
}
//-------------------------------------------------------------------------------------


paginateEst();

function paginateEst()
{

var idsala  = <?=$rowp->idsala?>;
var perfil  = "<?=$perfil?>";
var id_user  = <?=$user_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/paginateEst",
data: {idsala:idsala,perfil:perfil,id_user:id_user,direction:<?=$direction?>},
method:"POST",
success:function(data){
$('#new-paginate-est').html(data);
}
});
}

//----------------------------------------------------------------------------------------------

paginateLab();

function paginateLab()
{

var idsala  = <?=$rowp->idsala?>;
var perfil  = "<?=$perfil?>";
var id_user  = <?=$user_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/paginateLab",
data: {idsala:idsala,perfil:perfil,id_user:id_user,direction:<?=$direction?>},
method:"POST",
success:function(data){
$('#new-paginate-lab').html(data);
}
});
}


//----------------------------------------------------------------------------------------------

paginaMedGen();

function paginaMedGen()
{

var idsala  = <?=$rowp->idsala?>;
var perfil  = "<?=$perfil?>";
var id_user  = <?=$user_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/paginaMedGen",
data: {idsala:idsala,perfil:perfil,id_user:id_user},
method:"POST",
success:function(data){
$('#new-paginate-med-gen').html(data);
}
});
}




//---------------------------------------------------------------------------------------------
$('#newM').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
allRecetasOrdMed();
});


$('#edit_recetas_or_med').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
allRecetasOrdMed();
});



//-----------------------------------------------------------------------------------------
$('#edit_estudios_or_med2').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
paginateEst();
});



//-----------------------------------------------------------------------------
$('#edit_medida_gnl').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
paginaMedGen();
});

//----------------------------------------------------------------------------

$('#repetir').on('click', function () {
	$.ajax({
url:"<?php echo base_url(); ?>admin_medico/repetirOrdenMedica",
data: {idsala:<?=$rowp->idsala?>,id_user:<?=$rowp->id_user?>},
method:"POST",
success:function(data){
paginationNumberOrdenMedica();
$(".repetion-done").text('repetido ->').css('color','red');
$('#repetir').prop('disabled', true);
}
});
	});
</script>

<?php
}

?>




