<?php
        $this->load->view('admin/header_admin');
 ?>

<div class="container">


 <div class="row" id="background_">
  <div class="col-md-offset-3">
 <h3 class="h3">Nuevo Centro Medico </h3>
 <br/>
 </div>
 
<?php echo $this->session->flashdata('success_msg'); ?>
<form   class="form-horizontal" id="form-save" enctype="multipart/form-data" method="post"  action="<?php echo site_url('admin/saveCentroMedico');?>" > 
<div class="form-group">
<label class="control-label col-sm-4" ><span style="color:red">*</span> Nombre</label>
<div class="col-sm-4">
<input type="text" class="form-control name_centro" id="name"  name="name"    >
<div id='userInfo'></div>
</div>
</div>
<div class="form-group" >

<label class="control-label col-sm-4"><span style="color:red">*</span> Cargar Logo :</label>
<div class="col-sm-4">
<input type="file" class="file" name="picture" id="logo" >

</div>

</div>

	<div class="form-group">
<label class="control-label col-sm-4" ><span style="color:red">*</span> RNC</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="rnc"  name="rnc"    >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Tipo</label>
<div class="col-sm-4">
   <label class="radio-inline">
      <input type="radio" class="id_radio1" name="typo" value="publico" checked> publico
    </label>
	
	   <label class="radio-inline">
      <input type="radio" class="id_radio1" name="typo" value="privado"> privado
    </label>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Primer telefono</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="primer_tel" name="primer_tel"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Segundo telefono</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="segundo_tel" name="segundo_tel"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Correo electronico</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="email"  name="email"   >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" >Fax </label>
<div class="col-sm-4">
<input type="text" class="form-control" id="fax" name="fax"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span>  Especialidad</label>
<div class="col-sm-4">

<input type="checkbox" id="checkbox1"> Seleccionar todo
<select class="form-control select2 required" id="e1" multiple="multiple"  name="especialidad[]">
 <?php 

 foreach($especialidades as $row)
 { 
 echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
 }
 ?>
</select>

 
 </div>
 </div>	
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Provincia</label>
<div class="col-sm-4">
<select class="form-control select2"  name="provincia" id="provincia"  onchange="selectProvincia(this.options[this.selectedIndex].value)">
<option value="">Selecionne la provincia</option>
<?php
foreach($provinces as $listElement){
?>
<option  value="<?php echo $listElement->id?>"><?php echo $listElement->title?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Municipio</label>
<div class="col-sm-4">
<select class="form-control select2" style="background:#E7FEE9" name="municipio" id="municipio_dropdown"  >
<option value=""></option>
</select>
<span id="municipio_loader"></span>
</div>
</div> 

<div class="form-group">
<label class="control-label col-sm-4" >Barrio</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="barrio"   >
</div>							
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Calle </label>
<div class="col-sm-4">
<input type="text" class="form-control bfh-phone"   name="calle" >
<?php echo form_error('telc','<span class="help-block">','</span>'); ?>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Página web </label>
<div class="col-sm-4">
<input type="text" class="form-control bfh-phone"   name="pagina_web" >
</div>
</div>
<!--
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Doctor</label>
<div class="col-sm-4">
<button type="button" class="chosen-toggle select col-xs-6">Seleccionar todo</button>
<button type="button" class="chosen-toggle deselect col-xs-6">Deselecionar todo</button>

<select id="doc" class="form-control chosen-select" data-placeholder="Comienza a escribir un nombre para filtrar." multiple  name="doctor[]" required="true" >
<?php 

foreach($DOCTORS as $row)
{ 
echo "<option value='$row->first_name'>$row->name</option>";
}
?>
<!--<option value="cdoc">Registrar doctor</option>
</select>
<div class="doct"></div>
</div>
</div>-->
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Seguro médico</label>
<div class="col-sm-4">
<input type="checkbox" id="checkbox2"> Seleccionar todo
<select class="form-control select2 required" id="e2" multiple="multiple"  name="seguro_medico[]">
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>

 <input type="submit"  class="btn btn-primary btn-xs col-md-offset-4" value="Enviar" id="save" disabled>
<br/><br/>
 </form>
</div>
 </div>
 <div class="modal fade" id="doctor-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
<div class="modal-dialog modal-sm">

<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="Login">Create new doctor</h4>
</div>
<div class="modal-body">

<form name="cD" id="cD" method="post" action="<?php echo base_url();?>Admin/save_doc" > 

<div class="form-group">
<input type="text"  name="name" placeholder="first name">
</div>
<div class="form-group">
<input type="text"  name="last_name" placeholder="last name" >
</div>
<p class="text-center">
<input type="submit" name="Save" value="save"   />

</p>

</form>
</div>
</div>
</div>
</div>
</div>

 <?php
        $this->load->view('footer');
 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->


  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?=base_url();?>assets/js/links_select.js"></script> 
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
  <script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
<script>


$("#checkbox1").click(function(){
    if($("#checkbox1").is(':checked') ){
        $("#e1 > option").prop("selected","selected");
        $("#e1").trigger("change");
    }else{
        $("#e1 > option").removeAttr("selected");
         $("#e1").trigger("change");
     }
});






$("#checkbox2").click(function(){
    if($("#checkbox2").is(':checked') ){
        $("#e2 > option").prop("selected","selected");
        $("#e2").trigger("change");
    }else{
        $("#e2 > option").removeAttr("selected");
         $("#e2").trigger("change");
     }
});
$('#save').click(function() {
	
if($("#name").val() == ""){
alert("Cual es el nombre ?");
$("#name").focus();
return false;
}

if($("#rnc").val() == ""){
alert("Cual es le RNC ?");
$("#rnc").focus();
return false;
}

if($("#primer_tel").val() == ""){
alert("Cual es le primer telefono ?");
$("#primer_tel").focus();
return false;
}


if($("#provincia").val() == ""){
alert("Cual es la provincia ?");
$("#provincia").focus();
return false;
}	


if($("#municipio_dropdown").val() == ""){
alert("Cual es le municipio ?");
$("#municipio_dropdown").focus();
return false;
}



})




$("#logo").change(function(){
$("#save").prop("disabled", false);
	
})




$("#doc").change(function(){

$(this).find("option:selected").each(function(){

var optionValue = $(this).attr("value");

if(optionValue=="cdoc"){

$('#doctor-modal').modal('show');


} else{

$('#doctor-modal').modal('hide');

}

});
});




$('.select2').select2({ 
//tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	


var timer = null;
$('.name_centro').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(check_if_centro_exist, 1000)
});




function check_if_centro_exist() {
var centro= $(".name_centro").val();
if(centro == "") {
$("#Info").hide();
}else {
$.get( "<?php echo base_url();?>admin/check_if_centro_exist?name="+centro, function( data ){
$( "#userInfo" ).html( data ); 
 		   
});
}
};
</script>

</html>