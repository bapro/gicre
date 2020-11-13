<div class="container">
 <div class="col-md-6" style="background:#E0E5E6">
 <h1>Crear Nuevo Usuario</h1>
 <h3 style="text-align:center;color:red"  id="errorBox2"></h3>
 <h4>Seleccionar un perfil:</h4>
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#Medico">Medico</a></li>
<li><a  data-toggle="tab" href="#AsistenteMedico">Asistente Medico</a></li>
</ul>

  <div class="tab-content">
<div  id="Medico" class="active tab-pane fade in">


<form method="post" id="form_user1" class="form-horizontal" action="<?php echo site_url("vendedor/SaveMedico");?>">

<div class="col-sm-12">

<div class="form-group" id="hide_this_nombre">
<label class="control-label col-sm-2"  >Perfil</label>
<div class="col-sm-5">

<input class="form-control savethisperfil required" name="perfil"  value="Medico" style="pointer-events:none" type="text" >
</div>
</div>



<div class="form-group ">
<label class="control-label col-sm-2">Exeq.</label>
<div class="col-sm-3">
<select class="form-control select2 required"  name="exequatur"  id="exequatur">
<option value="" hidden></option>
  <?php 

 foreach($execuatur as $row)
 { 
 echo '<option>'.$row->code.'</option>';
 }
 ?>
 </select>
 </div>
 </div>
<div class="form-group" id="show_this_nombre">
<label class="control-label col-sm-2" >Nombres</label>
<div class="col-sm-10">
<span   id="nombre"   ></span>
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-2" >Cedula</label>
<div class="col-sm-5">
<input type="text" class="form-control required"   name="cedula"   >
</div>
</div>
<div class="form-group ">
<label class="control-label col-sm-2">Area</label>
<div class="col-sm-5">
<select class="form-control select2 required"  name="especialidad"  id="especialidad">
 <option value="" hidden></option>
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
<label class="control-label col-sm-2" >Correo elec.</label>
<div class="col-sm-9">
<input type="text" class="form-control email-clear" name="email" id="email1" >
<div id="emailInfo1"></div>
</div>
</div>


<div class="form-group ">
<label class="control-label col-sm-2">Seguro médico</label>
<div class="col-sm-9">
<input type="checkbox" id="checkbox1"> Seleccionar todo
<select class="form-control select2 required" id="e1" multiple="multiple"  name="seguro_medico[]">
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>
 </div>

<div class="col-sm-12">
<button type="reset" class="btn btn-default" >Reiniciar</button>
<button type="submit"  class="btn btn-primary">Crear registro</button>
<br/><br/>
 </div>
</form>

</div>
 <div  id="AsistenteMedico" class="tab-pane fade in">
<form method="post" id="form_user2" class="form-horizontal" action="<?php echo site_url("vendedor/SaveUserAsM");?>">

<!-- left column -->
<div class="col-sm-12">

<div class="form-group" >
<label class="control-label col-sm-2" >Perfil</label>
<div class="col-sm-7">

<input class="form-control savethisperfil required"  name="perfil" value="Asistente Medico" style="pointer-events:none" type="text" >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" >Nombres Apellidos</label>
<div class="col-sm-10">
<input  type='text' class='form-control required'  name='nombre'   >
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-2" >Cedula</label>
<div class="col-sm-5">
<input type="text" class="form-control required"   name="cedula"   >
</div>
</div>
<div class="form-group ">
<label class="control-label col-sm-2">Centro médico</label>
<div class="col-sm-10">
<input type="checkbox" id="checkbox2"> Seleccionar todo
<select class="form-control select2 required" id="e2" multiple="multiple"  name="centro_medico[]">
<?php 

foreach($medical_centers as $row)
{ 
echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}
?>
</select>
</div>
</div>


 <div class="form-group">
<label class="control-label col-sm-2" >Correo elect.</label>
<div class="col-sm-10">
<input type="text" class="form-control email-clear"  name="email" id="email2"  >
<div id="emailInfo2"></div>
</div>
</div>



 </div>

<div class="col-sm-12">
<button type="reset" class="btn btn-default">Reiniciar</button>
<button type="submit"  class="btn btn-primary">Crear registro</button>
<br/><br/>
 </div>
</form>

</div>
 </div>
 </div>
 <div class="col-md-6" >
<h1>Usuarios Creados</h1>
 <div style="overflow-x:auto">
<table id="example" class="table" >
<thead>
<tr style="background:#5957F7;color:white">
<th>Nombres</th>
<th>Perfil</th>
<th>Fecha Creada</th>
<th>Ver</th>
</tr>
</thead>
<tbody>
<?php
foreach ($query->result() as $row){
$miembro_desde= date("d-m-Y H:i", strtotime($row->insert_date));
if($row->perfil=="Medico")
{
$perfil=1; 

} 
else if ($row->perfil=="Asistente Medico"){
$perfil=2; 
}

?>
<tr>
<td><?=$row->name;?></td>
<td ><?=$row->perfil;?></td>
<td ><?=$miembro_desde;?></td>
<td><a  href="<?php echo site_url("vendedor/update_user/$row->id_user/$perfil")?>">Ver</a></td>

</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="bas_footer"></div>	
<footer id="footer" >
<div class="container">
<div class="col-md-12" STYLE="text-align:center;color:red">
<p>ADMEDICAL - GICRE</p>
</div>
</div>
</footer >
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
 
 <script>
$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    } );
} );

 $.validator.setDefaults({
    errorElement: "span",
    errorClass: "help-block",
    //	validClass: 'stay',
	
    highlight: function (element, errorClass, validClass) {
        $(element).addClass(errorClass); //.removeClass(errorClass);
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass(errorClass); //.addClass(validClass);
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.hasClass('select2')) {
            error.insertAfter(element.next('span'));
        }
    
		else {
            error.insertAfter(element);
        }
    }
});
 
 

  var validator = $("#form_user1").validate(); 
 var validator = $("#form_user2").validate(); 

 
$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});	


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



var timer = null;
$("#email1").keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(check_if_email_exist, 1000)
});

function check_if_email_exist(){
var email= $("#email1").val();
if(email == "") {
$("#emailInfo1").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_email_exist?email="+email, function( data ){
$( "#emailInfo1" ).html( data ); 
$( "#emailInfo1" ).show(); 		   
});
}
};




var timer2 = null;
$("#email2").keydown(function(){
       clearTimeout(timer2); 
       timer2 = setTimeout(check_if_email_exist2, 1000)
});

function check_if_email_exist2(){
var email= $("#email2").val();
if(email == "") {
$("#emailInfo2").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_email_exist?email="+email, function( data ){
$( "#emailInfo2" ).html( data ); 
$( "#emailInfo2" ).show(); 		   
});
}
};








$("#exequatur").change(function(){
$("#nombre").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var exequatur=$(this).val();
	$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/get_medico_exequatur')?>",
data: {exequatur:exequatur},
cache: true,
success:function(data){ 
$("#nombre").html(data); 

}  
});


});

 </script>