<?php

foreach($data_cita as $row)
$medico=$this->db->select('name')->where('id_user',$row->doctor )->get('users')->row('name');
$exequatur=$this->db->select('exequatur')->where('first_name',$row->doctor )->get('doctors')->row('exequatur');
$area=$this->db->select('title_area')->where('id_ar',$row->area )->get('areas')->row('title_area');
 
$seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row->id_patient)->get('patients_appointments')->row('seguro_medico');
 $cod=$this->db->select('codigo')->where('id_seguro',$seguro_medico)->where('id_doctor',$row->doctor)
->get('codigo_contrato')->row('codigo');

$centro=$this->db->select('name')->where('id_m_c',$row->centro )->get('medical_centers')->row('name');

?>
<div class="tab-content " >
<div class="col-sm-12 tab-content showdown1 searchb" >
<div class="col-sm-6">
<h4 class="h4" >DATOS DEL MEDICO</h4> 
<br/>
<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-3"> Medico :</label>
<div class="col-sm-9">

<input  value="<?=$medico?>" class="form-control" readonly />

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Exequatur :</label>
<div class="col-sm-4">

<input  value="<?=$exequatur?>" class="form-control" readonly />

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Especialidad :</label>
<div class="col-sm-7">

<input  value="<?=$area?>" class="form-control" readonly />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Codigo Prestador :</label>
<div class="col-sm-4">

<input  value="<?=$cod?>" class="form-control" readonly />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Centro Medico :</label>
<div class="col-sm-9">

<input  value="<?=$centro?>" class="form-control" readonly title="<?=$centro?>"/>
</div>
</div>
</form>
</div>
<div class="col-sm-6">
<h4 class="h4" >ENFERMEDAD(ES) DEL PACIENTE</h4> 
<br/>
<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-5"> CIE10 :</label>
<div class="col-sm-7" style="font-size:15px">
<ol>

<?php 

foreach($show_diagno_pat as $cie)
{

echo "<li>" . $cie->code . " $cie->description </li>";	
}	
?>

</ol>

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-5"> PROCEDIMIENTO :</label>
<div class="col-sm-7" style="font-size:15px">
<ol>

<?php 

foreach($show_diagno_pro_pat as $pro)
{

echo "<li>$pro->code $pro->name </li>";	
}	
?>

</ol>
</div>
</div>
</form>
</div>
</div>

<?php

 $rnc=$this->db->select('rnc')->where('id_sm',$seguro_medico)
 ->get('seguro_medico')->row('rnc');

$num_af=$this->db->select('input_name')->where('patient_id',$row->id_patient )
 ->get('saveinput')->row('input_name');

  $fecha=date("Y-m-d");
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$createddate = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($fecha)));

?>
<div class="loadf"></div>
<script type="text/javascript" src="<?=base_url();?>assets/js/factura-table-dynamic.js" charset="UTF-8"></script>
<?php $this->load->view('admin/billing/bill/factura-table-dynamic');?>
 <script>
 

function row_data_of_numbers()
{
var id_p_a = "<?=$row->id_patient?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/row_data_of_numbers')?>",
data: {id_p_a:id_p_a},
cache: true,
success:function(data){
$("#row_data_of_numbers").html(data);
  
} 
});
}

 
 
 //---------------------------------------------------------------------------
function getSegName(dropDown) {
var doctorid ="<?=$id_doctor ?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/get_service_precio');?>',
data:{id_mssm1:dropDown.value,doctorid:doctorid},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(data);
recalc();
}
});

}



//===============save_factura==============================
$('#save_factura').on('click', function(event) {
var cant = $('input.cantidad').val();
var prec = $('input.precio').val();
var numauto = $('#numauto').val();
var autopor = $('#autopor').val();
if(numauto == "" || autopor == "" || cant == "" || prec == "" )
{
$('#required_fac').html('Los campos con bordillos rojos son obligatorios !').fadeIn('slow').delay(4000).fadeOut('slow');
$(".change-red").css("border-color", "red");
$(".change-red").find(".form-control").not(".descuento").css("border-color", "red");
}
else
{
var patient_id = "<?=$id_patient?>";

var tsubtotal = $('#sub-total').val();
var totpagseg = $('#total-pago-seguro').val();
var totsubdesc = $('#descuento1').val();
var totpagpa = $('#total-pagar-paciente').val();

var medico = "<?=$id_doctor ?>";
var area = "<?=$row->area ?>";
var exequatur = "<?=$exequatur?>";
var codigoprestado = "<?=$cod?>";
var fecha = "<?=$createddate?>";
var centro_medico = "<?=$id_centro ?>";
var seguro_medico = "<?=$seguro_medico ?>";
var rnc = "<?=$rnc?>";
var identificar="doctor";
var num_af = "<?=$num_af?>";
var comment = $('#comment').val();
var inserted_by = "<?=$name?>";
var service = [];
var cantidad = [];
var precio = [];
var total = [];
var totalpaseg = [];
var descuento = [];
var totpapat = [];
var id_apoint = "<?=$id_apoint ?>";
$('.service').each(function(){
service.push($(this).val());
});
$('input.cantidad').each(function(){
cantidad.push($(this).val());
});
$('input.precio').each(function(){
precio.push($(this).val());
});
$('input.row-total').each(function(){
total.push($(this).val());	
});

$('input.total-pag-seg').each(function(){
totalpaseg.push($(this).val());	
});

$('input.descuento').each(function(){
descuento.push($(this).val());	
});

$('input.total-pag-pa').each(function(){
totpapat.push($(this).val());	
});
$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveBill')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,centro_medico:centro_medico,num_af:num_af,
tsubtotal:tsubtotal,totpagseg:totpagseg,totsubdesc:totsubdesc,totpagpa:totpagpa,patient_id:patient_id,
subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,seguro_medico:seguro_medico,
medico:medico,codigoprestado:codigoprestado,fecha:fecha,exequatur:exequatur,id_apoint:id_apoint,
numauto:numauto,autopor:autopor,comment:comment,inserted_by:inserted_by,rnc:rnc,area:area},
cache: true,
success:function(data){
row_data_of_numbers();	
window.open("<?php echo base_url(); ?>/medico/billing_print_view?identificar="+identificar);
$(".loadf").hide();
$("#save_factura").prop("disabled",true);
//$( "html" ).load( "<?php echo base_url('admin/showBilling'); ?>" ); 

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.loadf').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});
}
return false;
});



</script>