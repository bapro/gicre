<div class="container">


 <div class="row" id="background_">
  <div class="col-md-offset-3">
 <h3 class="h3">Crear Laboratorio De Lentes</h3>
 <br/>
 </div>
 
<?php echo $this->session->flashdata('success_msg'); ?>
<form   class="form-horizontal" id="form-save" enctype="multipart/form-data" method="post"  action="<?php echo site_url('admin/saveLaboLentes');?>" > 
<div class="form-group">
<label class="control-label col-sm-4" ><span style="color:red">*</span> NOMBRE COMERCIAL</label>
<div class="col-sm-4">
<input type="text" class="form-control name_centro" id="name"  name="name"    >
<div id='userInfo'></div>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4" ><span style="color:red">*</span> RNC</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="rnc"  name="rnc"    >
</div>
</div>
<div class="form-group" >

<label class="control-label col-sm-4"><span style="color:red">*</span> Cargar Logo :</label>
<div class="col-sm-4">
<input type="file" class="file" name="picture" id="logo" >

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-4"> DIRECCION</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="direccion" name="direccion"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >PAIS </label>
<div class="col-sm-4">
<input type="text" class="form-control" id="pais" name="pais"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >PROVINCIA </label>
<div class="col-sm-4">
<input type="text" class="form-control" id="provincia" name="provincia"   >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" >CIUDAD </label>
<div class="col-sm-4">
<input type="text" class="form-control" id="ciudad" name="ciudad"   >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> TELEFONO</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="primer_tel" name="primer_tel"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >CORREO ELECTRONICO</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="email"  name="email"   >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" >PAGINA WEB</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="web"  name="web"   >
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-4" >OFTALMOLOGOS AFECTADOS</label>
<div class="col-sm-7">
<select class="form-control select2 required"  multiple="multiple"  id='lab_user' name="lab_user[]">
<?php 
$sql = "select id_user, name FROM users WHERE area=32 ORDER BY name DESC";
 $querylb= $this->db->query($sql);
 foreach($querylb->result()  as $afec){
		
echo "<option value='$afec->id_user' $selected>$afec->name</option>";
}
?>
</select>
</div>
</div>

 <input type="submit"  class="btn btn-primary btn-xs col-md-offset-4" value="Gaurdar" id="save" disabled>
<br/><br/>
 </form>
</div>
 </div>
</div>

 <?php
        $this->load->view('footer');
 ?>
   </body>


  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?=base_url();?>assets/js/links_select.js"></script> 
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
  <script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
<script>

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

if($("#lab_user").val() == ""){
alert("Seleccione un oftalmologo ?");
$("#lab_user").focus();
return false;
}

})





$("#lab_user").change(function(){
	if($(this).val()){
$("#save").prop("disabled", false);
	}else{
		$("#save").prop("disabled", true);
	}
})




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