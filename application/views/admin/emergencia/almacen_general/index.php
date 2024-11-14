<style>
.search-result {
  background-image: url('<?= base_url();?>assets/img/medica.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

</style>

<div class="container"> 
 <h1>ALMACEN GENERAL</h1>
<?php echo $this->session->flashdata('msg'); ?>
 <div class="row search-result" style="border-bottom:1px solid white">

<div class="col-sm-6">
<br/>

<select class="form-control select2"  id="search-centro">
<option>Seleccionar Centro Para Subir Medicamentos</option>
<?php

if($admin_centro){
$query = $this->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_centro");
}else{
$sql ="SELECT id_m_c,name FROM  medical_centers  order by name";
$query = $this->db->query($sql);
}
echo '<option value="" hidden></option>';
foreach ($query->result() as $row){

echo '<option value="'.$row->id_m_c.'">'.$row->name.' </option>';
}
 ?>

</select>
<br/><br/>


<span id="load" ></span>

</div>
<br/>
</div>


 <div class="col-md-12" > 
<br/>


 <div id="search-result">Resutado de la busqueda se monstra aqui </div>
</div>

  </div>
</div>
 <?php 


$this->load->view('footer');


?>


<div class="modal fade" id="edit_almacen"  role="dialog" >
<div class="modal-dialog lg" >
<div class="modal-content" >

</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>


<script>

 $(".date").datepicker({
dateFormat: 'dd-mm-yy',
	//maxDate: "-1d"

  });
  
$('#save-alm').on('click', function(event) {
event.preventDefault();
var nombre=$("#nombre").val();
var cantitad=$("#cantitad").val();
var costo=$("#costo").val();
var precio=$("#precio").val();
var fecha_ven=$("#fecha_ven").val();
var fecha_elab=$("#fecha_elab").val();
var tipo=$("#tipo").val();
var medica_id=$("#medica-id").val();
var tipoval=$("#tipoval").val();
var centro=$("#search-centro").val();
if(nombre=="" || cantitad=="" || costo=="" || precio=="" || fecha_ven=="" || fecha_elab==""  ){
alert('Todos los campos son obligatorios');	
}
else{
$("#save-alm").prop("disabled",true);
$("#search-result").fadeIn().html('<span > <img   src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "POST",
url: "<?=base_url('emergency/saveAlmanacenGnrl')?>",
data: {nombre:nombre,cantitad:cantitad,costo:costo,precio:precio,fecha_ven:fecha_ven,fecha_elab:fecha_elab,tipo:tipo,insertb:<?=$iduser?>,update:0,medica_id:medica_id,tipoval:tipoval,centro:centro},

success:function(data){ 
$("#save-alm").prop("disabled",false);
newInsert();
},

});

}
});



 $('.select2').select2({ 
  placeholder: "",
    tags: true,
	allowClear: true

});


$('#search-centro').change(function () {
var centro=$('#search-centro').val();
if(centro !=""){
$.ajax({
type: "GET",
url: "<?=base_url('emergency/searchMedicamentoCentro')?>",
data: {iduser:<?=$iduser?>,centro:centro},

success:function(data){ 
$("#search-result").html(data); 
},

});
}
});




 
</script>