<style>
td,th{text-align:left;font-size:14px}
.rezise-load-image{
height: auto; 
    width: auto; 
    max-width: 250px; 
    max-height: 250px;
}


	.rezise-load-image img {
    overflow: hidden;
   width: 270px;
   height: 200px;
   

  }
  
 
  
</style>
  <div class="container" >


<?php foreach($editUser as $row)
if($row->perfil=='Asistente Medico'){
$how="style='display:none'";
$firma="none";
$show="";	
} else {
$how='';
$firma="";
$show="style='display:none'";		
}
?>
 <div class="col-md-12">
 <?php echo $this->session->flashdata('success_msg');?>
 <div class="col-md-9"><h2   class="h2">Cuenta <?=$row->perfil?></h2></div>
 <div class="col-md-3">
 <span class="hide-mes-pas"><?php echo $this->session->flashdata('msg_pass'); ?></span>
<a style="color:red" href="<?php echo site_url("admin_medico/changePassw/$id_user/$id_user");?>"data-toggle="modal"   data-target="#changepassw" ><i class="fa fa-pencil"></i>  Cambiar Contraseña</a>
 </div>
 <hr/>
</div>

<div class="col-sm-row show_centro"  id="background_" >

<form   class="form-horizontal"  method="post"  action="<?php echo site_url('medico/saveDoctorUpdate');?>" enctype="multipart/form-data" > 
<br/>

<input class="form-control" value="<?=$id_user?>" name="id_user"  id="id_user"  type="hidden">

<div class="form-group">
<label class="control-label col-sm-3" >Nombres Apellidos</label>
<div class="col-sm-5">
<input class="form-control" value="<?=$row->name?>" name="nombre" id="nombre"  type="text" >
</div>
</div>



<div class="form-group" style="display:<?=$firma?>">
<label class="control-label col-sm-3" >Firma</label>
<div class="col-sm-5">
<?php 
$firma_doc="$id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='2'><i> Quita La Firma</i></a><br/>
<img  class="img-fluid" style="border:1px solid #38a7bb;width:30%" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {
?>
<a style="color:red" href="<?php echo site_url("printings/signature/$id_user/1");?>"><i>Crear Mi Firma</i></a>
<?php
}
?>
</div>
</div>



<div class="form-group" style="display:<?=$firma?>">
<label class="control-label col-sm-3" >Sello</label>
<div class="col-sm-6">

<?php 
$sello_doc=$this->db->select('sello')->where('doc',$id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {?>
<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='0'><i> Quita El Sello</i></a><br/>
<img  style="width:150px;" class="" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
<?php
} else {?>

<input type="file" name="selloimage" id="file_m_enf" class="file_m_enf form-control" onchange="preview_sello(event)"   accept=".png, .jpg, .jpeg"  >
  <img id="output_image" class='rezise-load-image' />
 
<?php
}
?>
</div>
</div>



<div class="form-group" style="display:<?=$firma?>">
<label class="control-label col-sm-3" >Logo Tipo</label>
<div class="col-sm-6">

<?php 
$logo_tipo=$this->db->select('sello')->where('doc',$id_user)->where('dist',1)->get('doctor_sello')->row('sello');

if ($logo_tipo) {?>
<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='1'><i> Quita El Logo Tipoo</i></a><br/>
<div class="rezise-load-image">
<img  class='log-tip'  src="<?= base_url();?>/assets/update/<?php echo $logo_tipo; ?>"  />
</div>
<?php
} else {?>

<input type="file" name="logo-tipo" id="logo-tipo" class="logo-tipo form-control" onchange="preview_logo_tipo(event)"   accept=".png, .jpg, .jpeg"  >
  <img id="output_logo_tipo" />
 
<?php
}
?>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Nombre usuario</label>
<div class="col-sm-8">
<input class="form-control" name="user" id="user" type="text" value="<?=$row->username?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Cedula</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="cedula"  name="cedula" value="<?=$row->cedula?>"  >
</div>
</div>
<div class="form-group" <?=$how?>>
<label class="control-label col-sm-3" >Exequatur</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="exequatur"  name="exequatur" value="<?=$row->exequatur?>"  >
</div>
</div>

<div class="form-group" <?=$how?>>
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-4">
<?php
$esp=$this->db->select('title_area')->where('id_ar',$row->area)
->get('areas')->row('title_area');
echo $esp;
?>
<!--<select class="form-control select2"    name="especialidad">
<?php
foreach($especialidades as $esp){
	
	if($row->area == $esp->id_ar) {
		echo "<option value=".$esp->id_ar." selected>".$esp->title_area."</option>";
	} else {
		echo "<option value=".$esp->id_ar.">".$esp->title_area."</option>";
	}
}
?>
 </select>-->
 
 </div>
 </div>	
 <div class="form-group" >
<label class="control-label col-sm-3" >Correo electronico</label>
<div class="col-sm-7">
<input  class="form-control" name="email" id="email"  value="<?=$row->correo?>" type="email" autocomplete="off">

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Telefono celular</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="primer_tel" name="primer_tel" value="<?=$row->cell_phone?>" >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Extension</label>
<div class="col-sm-2">
<input type="text" class="form-control" id="extension" name="extension"  value="<?=$row->extension?>"  >
</div>
</div>

<div class="form-group"  <?=$how?>>
<label class="control-label col-sm-3">Seguro médico</label>
<div class="col-sm-9">
<ol>
<?php 
$sql ="SELECT seguro_medico FROM doctor_seguro where id_doctor=$id_user";
$query = $this->db->query($sql);
foreach ($query->result() as $rs)
{
$seguro=$this->db->select('title')->where('id_sm',$rs->seguro_medico)
 ->get('seguro_medico')->row('title');
?>
<li><a style="color:#696969" data-toggle="modal" data-target="#EditSeguroMedico"  title="Ver" href="<?php echo base_url("medico/EditSeguroMedico/$rs->seguro_medico")?>"><?=$seguro?></a> </li>

<?php
}
?>
</ol>

</div>
</div>
<div class="form-group">

<div class="col-sm-5 col-md-offset-2">

<button type="submit" id="save"  class="btn btn-primary">Guardar</button>
<br/><br/>
</div>
</div>

</form>
</div>
<?php if($perfil=="Medico") {?>
<div class="col-md-12 table-responsive"   id="background_">
 <hr id="hr_ad"/>
 <h3   class="h3">Agenda</h3>
<table style="width:100%" class="table table-bordered table-striped">
<tr>
<th>Centro Medico</th><th>Fecha Inicio</th><th>Fecha Final</th><th>Dias</th><th>Citas</th>
</tr>
<?php
$sql ="SELECT * FROM  doctor_agenda_test WHERE id_doctor=$id_user group by id_centro";
$query= $this->db->query($sql);

foreach ($query->result() as $row){
$centro= $this->db->select('name')->where('id_m_c',$row->id_centro)->get('medical_centers')->row('name');
  $fecha_inicio = date("d-m-Y", strtotime($row->fecha_inicio));
$fecha_final = date("d-m-Y", strtotime($row->fecha_final)); 
?>
<tr>
<td><?=$centro?></td>
<td><?=$fecha_inicio?></td>
<td><?=$fecha_final?></td>
<td>
<?php
$sqld ="SELECT day FROM  doctor_agenda_test WHERE id_doctor=$id_user AND id_centro=$row->id_centro order by day asc";
$queryd= $this->db->query($sqld);
foreach ($queryd->result() as $rowd){
$day=$this->db->select('title')->where('id',$rowd->day)->get('diaries')->row('title');
echo "<p>$day</p>";
}
?>

</td>
<td><?=$row->cita?></td>
</tr>
<?php
}?>
</table>
</div>
<?php
}
?>

</div>
</div>
<div class="modal fade" id="changepassw" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
 <?php 
 
 
        $this->load->view('footer');


 ?>
  
<div class="modal fade" id="EditSeguroMedico"  tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>







  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript"> 
$('#EditSeguroMedico').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});



$(".remove-logo-tipo-o-sello").click(function(){
if (confirm("Lo quire quitar ?"))
{ 
var answerid = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/removeSello')?>',
data: {id : <?=$id_user?>,answerid:answerid},
success:function(response) {

window.location ="<?php echo base_url(); ?>medico/update_user";
 
}
});
}
})


$('#uploadimgenf').on('submit',function(e){
e.preventDefault();

$('.hide-btn-sello').prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>admin_medico/saveSello',
type:"post",
data:new FormData(this), //this is formData
processData:false,
contentType:false,
cache:false,
async:false,
success: function(data){
//window.location ="<?php echo base_url(); ?>medico/update_user";
$('#show-errorse').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#show-errorse').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});

});

//---------------------------------------SELLO--------------------------------------------------


/*$(document).on('click','.thumb',function(e) {
   // $(this).prev().remove();
    $(this).remove();   
     $('#file_m_enf').val(''); 
$('#btn-send-ac').hide();	 
});

function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();

  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result; // url.createObjectURL(file);
    image.onload = function() {
      var w = this.width,
          h = this.height,
          t = file.type, // ext only: // file.type.split('/')[1],
          n = file.name,
          s = ~~(file.size/1024) +'KB';
      $('#uploadPreview').append('<img style="width:250px" src="' + this.src + '" class="thumb">');
	 // alert(s);
    };

    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
	  $('#btn-send-ac').hide();
    };      
  };

}
$("#file_m_enf").change(function (e) {
  if(this.disabled) {
    return alert('File upload not supported!');
  }

  var F = this.files;
  if (F && F[0]) {
    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
	  $('#btn-send-ac').show();
	  // $('#file_m_enf').prop('disabled',true);
    }
  }
});



var loadFile = function(event) {
	var image = document.getElementById('uploadPreview');
	image.src = URL.createObjectURL(event.target.files[0]);
};

*/



function preview_sello(event) 
{
 var reader = new FileReader();
  var size=$('#file_m_enf')[0].files[0].size;
 //alert(size);
 if(size < 3000000){
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
  $('#output_image').show();	
 }
 reader.readAsDataURL(event.target.files[0]);
 output.style.width = (50) + "px";
}else{
  $('#file_m_enf').val('');
 $('#output_image').hide();	  
	alert('demasiado grande '+ size/1024/1024 + " MB");
}
}


function preview_logo_tipo(event) 
{
 var reader = new FileReader();
  var size=$('#logo-tipo')[0].files[0].size;
 //alert(size);
 if(size < 3000000){
 reader.onload = function()
 {
  var output = document.getElementById('output_logo_tipo');
  output.src = reader.result;
  $('#output_logo_tipo').show();	
 }
 reader.readAsDataURL(event.target.files[0]);
 output.style.width = (50) + "px";
}else{
  $('#logo-tipo').val('');
 $('#output_logo_tipo').hide();	  
	alert('demasiado grande '+ size/1024/1024 + " MB");
}
}





const fileBlocks = document.querySelectorAll('.file-block')
const buttons = document.querySelectorAll('.btn-select-file')

;[...buttons].forEach(function (btn) {
  btn.onclick = function () {
    btn.parentElement.querySelector('input[type="file"]').click()
  }
})

;[...fileBlocks].forEach(function (block) {
  block.querySelector('input[type="file"]').onchange = function () {
    const filename = this.files[0].name
$('#btn-send-ac').show();
    block.querySelector('.btn-select-file').textContent = filename
	
 var size=$('#file-enf-img')[0].files[0].size;
 var extension=$('#file-enf-img').val().replace(/^.*\./, '');
 switch (extension) {
        case 'php': case 'html': case 'htm': case 'asp': case 'js': case 'css': case 'htaccess':
		block.querySelector('.btn-select-file').textContent = "Seleccionar la foto"
            alert('Esta extension es prohibida : ' + extension );
			  break;
		  }
	
  }
})

 </script>
 </body>
</html>