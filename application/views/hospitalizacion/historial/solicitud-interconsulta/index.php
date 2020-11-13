<style>
.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width8 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>


<div class="modal-header text-center"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<h2 class="modal-title">SOLICITUD DE INTERCONSULTAS</h2>
</div>

<div class="modal-body" style="max-height: calc(150vh - 210px); overflow-y: auto;" id='background_'>

<div class="col-md-12"  >
<?php
$this->load->view('hospitalizacion/historial/header-patient-data');
  ?>
<br/>
  <div id='paginateSolInterCons'></div>
<br/>


  <div  id='hideSolInterCons' >  

<div class="form-group">
<label class="control-label" ><span style='color:red'>*</span> Descripcion de solicitud</label>
<textarea rows="6" cols="15" class="form-control" id="hosp_desc_sol_inter" ></textarea>
</div>
<div class="col-md-3"  >
<select class="form-control select-n" style="width:100%" id="hosp_sol_int_cent" >
<option value="">Centro</option>
<?php 
$sql1 ="SELECT id_m_c, name FROM   medical_centers ORDER BY name DESC ";
$query1= $this->db->query($sql1);
foreach($query1->result() as $row)
{ 
echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}
?>
</select>

</div>
<div class="col-md-3"  >
<select class="form-control select-n" style="width:100%" id="hosp_sol_int_esp" onChange="getDoc(this.value);"  >
<option value="">Especialidad</option>
</select>

</div>
<div class="col-md-3"  >
<select class="form-control select-n" style="width:100%" id="hosp_sol_int_doc1" >  
<option value="">Doctor</option>

</select>

</div>

<div class="col-md-3"  ><button id="hosp-save-inter-con-sol" class="btn btn-md btn-success" type="button" >Guardar Y Enviar </button> <span  class='resultSolInt'></span></div>


</div>
  <div id="contentSolInterCons"></div>
</div>

</div>


<script type="text/javascript">
$(".select-n").select2({
tags: true
});



//-----------paginate-------------------------
function paginateSolInterCons(){
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/paginateSolInterCons",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>},
method:"POST",
success:function(data){

$('#paginateSolInterCons').html(data);
},

});
}

paginateSolInterCons();



$("#hosp_sol_int_cent").change(function(){
var id= $("#hosp_sol_int_cent").val();

//$('#hosp_sol_int_esp').val(null).trigger('change');

 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
	$("#hosp_sol_int_esp").html(data);
	
	},

	}); 

});




function getDoc(val) {
var id_centro= $("#hosp_sol_int_cent").val();
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:{id_esp:val,id_centro:id_centro},
	success: function(data){
	//$("#hosp_sol_int_doc").prop("disabled",false);
	$("#hosp_sol_int_doc1").html(data);

	},
	});
}




$('#hosp-save-inter-con-sol').on('click', function(event) {
event.preventDefault();   
var result; 
var hosp_desc_sol_inter = $("#hosp_desc_sol_inter").val().trim();
var hosp_sol_int_cent = $("#hosp_sol_int_cent").val();
var hosp_sol_int_esp = $("#hosp_sol_int_esp").val();
var hosp_sol_int_doc = $("#hosp_sol_int_doc1").val();
if(hosp_sol_int_doc !="" && hosp_desc_sol_inter !="" ){
$('#hosp-save-inter-con-sol').prop("disabled",true);
$(".resultSolInt").fadeIn().html('guardando...').css('font-style','italic').css('color','gray');
 $.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/saveSolInter')?>",
data: {id_user:<?=$user_id?>,patient_id:<?=$patient_id?>,hosp_sol_int_cent:hosp_sol_int_cent,who:0,id_hosp:<?=$id_hosp?>,
hosp_sol_int_esp:hosp_sol_int_esp,hosp_sol_int_doc:hosp_sol_int_doc,hosp_desc_sol_inter:hosp_desc_sol_inter},
success:function(data){
 result=$(".resultSolInt").html(data);
 if(result !=0){
	 $(".resultSolInt").html('hecho').css('color','green').delay( 1000 ).hide(0);
	
 }else{
	$(".resultSolInt").html('fracaso, intenta otra vez.').css('color','red');  
 }

paginateSolInterCons();
$('#hosp-save-inter-con-sol').prop("disabled",false);
	
},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#paginateSolInterCons').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },
});
}else{
$("#resultSolInt").html('falta info...').css('color','red');	
}
});


	</script>