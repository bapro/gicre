<br/>
<style>
.box-tooltip2 {
    color: black;
   background:white;
   border-radius:20px;
   padding:6px;
  border: 1px solid red;
   z-index:100000
}

.pagination2 {
    display: inline-block;
}


.btn-select-file {
  border-radius: 20px;
}

.thumb{
  margin: 24px 5px 20px 0;
  width: 150px;
  float: left;
}
#blah {
  border: 2px solid;
  display: block;
  background-color: white;
  border-radius: 5px;
}
</style>
<h4 class="h4 his_med_title">
Historia de la enfermedad actual (<b><?=$count_enf?> regitros (s)</b>)
</h4>
<br/>
<?php if ($count_enf > 0)
{
$i = 1;
 foreach($enfermedad as $row)
{
	
if($row->laboratorios==""){
$lab="";	
}else{
$lab="<li><strong>Laboratorios (Resultados relevantes)</strong> : $row->laboratorios</li>";	
}

if($row->estudios==""){
$est="";	
}else{
$est="<li><strong>Estudios (Resultados relevantes)</strong> : $row->estudios</li>";	
}

$img=$this->db->select('image')->where('id_enfermedad',$row->id_enf)->get('saveEnfImage')->row('image');
if($img==""){
$enimg="";	
}else{
$enimg='<li style="color:red">Hay imagen</li>';		
}


$user_c14=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c15=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');	
?>
<div class="pagination" >
<a  data-toggle="modal" data-target="#ver_enf_act" href="<?php echo base_url("admin_medico/show_enfermedad/$row->id_enf/$user_id/$row->centro_medico")?>">
<?php echo $i; $i++;  ?>
</a>
<br/><br/>
<div class="box-tooltip" style="display: none;position:absolute">
<h4 style='color:green'><?=$centro?></h4>
<ul style='list-style:none'>
<li>Creado por <?=$user_c14?>, <?=$inserted_time?></li>
<li>Cambiado por <?=$user_c15?>, <?=$updated_time?></li>
<hr/>
<li><strong>Motivo de consulta</strong> : <?=$row->enf_motivo?></li>
<li><strong>Sinopsis</strong> : <?=$row->signopsis?></li>
<?=$lab?>
<?=$est?>
<?=$enimg?>
</ul>
</div>

</div>
<?php
}


$sql1 ="SELECT  historial_id FROM  h_c_enfermedad WHERE historial_id=$id_historial AND id_triaje !=0 GROUP BY historial_id";
$triaje_sig1= $this->db->query($sql1);
foreach ($triaje_sig1->result() as $rowTriage1)
{
?>
<div class="pagination2" >
<i class="fa fa-asterisk" style="color:red;cursor:"> Emergencia </i> 
<div class="box-tooltip2" style="display: none;position:absolute">
<h4 style='color:red'>EMERGENCIA</h4>
<?php
$sql ="SELECT signopsis, inserted_by, inserted_time, id_triaje FROM  h_c_enfermedad WHERE id_triaje !=0";
$triaje_sig= $this->db->query($sql);

?>
<span><strong>Sinopsis</strong></span>
<ul>

<?php
foreach ($triaje_sig->result() as $rowTriage)
{
$user_triaje=$this->db->select('name')->where('id_user',$rowTriage->inserted_by)->get('users')->row('name');
$perf=$this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');

if($perf=="Admin"){
$contlr="admin";	
}else{
$contlr="medico";	
}
$time_triaje = date("d-m-Y H:i:s", strtotime($rowTriage->inserted_time));
?>
<li><a class="not-triaje" title="Ir a la emergencia para ver mas" style="font-size:15px" href="<?php echo base_url("$contlr/emergency_triaje/$id_historial/$rowTriage->id_triaje#enf")?>"><?=$rowTriage->signopsis?> -> Creado por <?=$user_triaje?>, <?=$time_triaje?> </a></li>
<?php
}
?>
</ul>
</div>
</div>
<?php	
}


}
else{
	echo "<i><b>No hay registros</b></i>";
}

?>
<div  id="flashe" class="col-md-12 form-horizontal">
<hr class="prenatal-separator"/>
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Motivo de consulta</label>
<div class="col-md-10">

<select class="form-control select2 causa"  name="enf_motivo" id="enf_motivo" >


</select>

</div>

</div>
<div class="form-group">
<?php
if($area==90){
	$trastorno = "Clacificacion de mallampati I-II-III-IV, Escala somnolencia Epworth  xx/24 <br/>
Cuestoniario apnea Stop Bang  xx/8";
}else{
	$trastorno ="";	
}
?>
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Sinopsis</label>
<div class="col-md-10">
 <button type="button" id="btnSpeechEnfSig" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechEnfSig"></span>
 
<textarea rows="6"  class="form-control required-patient-inputs" id="enf_signopsis" ><?=$trastorno?></textarea>
 <span id='copiar-estudios-div' style='display:none'>
<input type='checkbox' id='copiar-estudios'> Repetir En Estudios
</span>
</div>

</div>
 
<div class="form-group">
<label class="control-label col-md-2" > Laboratorios (Resultados relevantes)</label>
<div class="col-md-10">
 <button type="button" id="btnSpeechEnfLab"  class="btn btn-primary btn-sm" title='soporte solo para el navegador Chrome'><i class="fa fa-microphone" aria-hidden="true"></i></button>
 &nbsp; <span id="actionSpeechEnfLab"></span>
<textarea rows="6"  class="form-control required-patient-inputs" id="enf_laboratorios" ></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2" > Estudios (Resultados relevantes)</label>
<div class="col-md-10">
 <button type="button" id="btnSpeechEnfEst"  class="btn btn-primary btn-sm" title='soporte solo para el navegador Chrome'><i class="fa fa-microphone" aria-hidden="true"></i></button>
 &nbsp; <span id="actionSpeechEnfEst"></span>
<textarea rows="6"  class="form-control required-patient-inputs" id="enf_estudios" ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" >Estudio Imagen</label>
<div  class="col-md-10">

  <div id="divMsg" class="alert alert-success" style="display: none">
   <strong>Guardados con exito</strong>
  </div>
  <br><br>
   <div class="row" id="blah">
    <form method="post" id="uploadimgenf" enctype="multipart/form-data">  
    <div class="form-control col-md-12">
	
         <input type="file" name="file_m_enf" id="file_m_enf" class="file_m_enf"  accept=".png, .jpg, .jpeg"  >
		 <br/><br/>
		  <button type="submit" id="btn-send-ac"  class="btn btn-primary btn-sm" style='display:none'>Guardar la imagen</button>
		  <em id='guardando'></em>
    <input type="hidden" name="pat-enf-img" value="<?=$id_historial?>"  >
	  <input type="hidden" name="user-enf-img" value="<?=$user_id?>"  >
      <br>
      <div id="uploadPreview"></div>
	  
   </div>
  
  </form>
   </div>
   </div>
</div>

</div>
<div id='resultimg'></div>
<script>
loadMotivoConsulta();

function loadMotivoConsulta(){
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/loadMotivoConsulta",
data: {enf_motivo:"<?=$enf_motivo?>"},
method:"POST",
success:function(data){
$('#enf_motivo').html(data);
}
});

};

	
	/* SAVE SPEECH FOR SINOPSIS */
			
					var btnSpeechEnfSig = document.getElementById('btnSpeechEnfSig');
					
					btnSpeechEnfSig.onclick = function() {
					var output = document.getElementById("enf_signopsis");
					// get action element reference
					var action = document.getElementById("actionSpeechEnfSig");
					runSpeechRecognition(output,action);
					}
			
			//-----------------------------------------------------------------------------------------------------
			/* SAVE SPEECH FOR LABORATORIOS */
			   var btnSpeechEnfLab = document.getElementById('btnSpeechEnfLab');
					
					btnSpeechEnfLab.onclick = function() {
					var output = document.getElementById("enf_laboratorios");
					// get action element reference
					var action = document.getElementById("actionSpeechEnfLab");
					runSpeechRecognition(output,action);
					}
					
					/* SAVE SPEECH FOR ESTUDIOS */
			   var btnSpeechEnfEst = document.getElementById('btnSpeechEnfEst');
					
					btnSpeechEnfEst.onclick = function() {
					var output = document.getElementById("enf_estudios");
					// get action element reference
					var action = document.getElementById("actionSpeechEnfEst");
					runSpeechRecognition(output,action);
					}	
	
	
	
	
	
	
$('#uploadimgenf').on('submit',function(e){
e.preventDefault(); 
$.ajax({
url:'<?php echo base_url();?>admin_medico/saveEnfImage',
type:"post",
data:new FormData(this), //this is formData
processData:false,
contentType:false,
cache:false,
async:false,
success: function(data){
$('#divMsg').show();
setTimeout(function(){
$('#divMsg').hide(); 
}, 3000);
$("#file_m_enf").val('');
$("#btn-send-ac").hide();
$("#guardando").text('');
},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#resultimg').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

}); 
	



$(document).on('click','.thumb',function(e) {
   // $(this).prev().remove();
    $(this).remove();   
     $('#file_m_enf').prop('disabled',false);        
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
      $('#uploadPreview').append('<img src="' + this.src + '" class="thumb">');
    };

    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
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



$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
	  
$(".pagination2").hover(function () {
    $(this).find('.box-tooltip2').show();
      },
 function () {
        $(this).find('.box-tooltip2').hide();
      });	  
	  
$(".select2").select2({
	
  tags: true
});



$('#enf_signopsis').keyup(function(event) { 
if($('#enf_signopsis').val() !=""){
 $('#copiar-estudios-div').slideDown();
}else{
 $('#copiar-estudios-div').slideUp();
$('#observaciones').val(""); 
}


 if($('#copiar-estudios').prop("checked") == true){
        $('#observaciones').val($('#enf_signopsis').val()); 
            }
            else if($('#copiar-estudios').prop("checked") == false){
            $('#observaciones').val(''); 
            }




    });
	



  $('#copiar-estudios').click(function(){
            if($(this).prop("checked") == true){
        $('#observaciones').val($('#enf_signopsis').val()); 
            }
            else if($(this).prop("checked") == false){
            $('#observaciones').val(''); 
            }
        });



</script>