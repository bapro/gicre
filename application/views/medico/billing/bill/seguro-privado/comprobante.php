 <span class="input-group-addon">
<?php

$comprobante_name= $this->db->select('name')->join('comprobante_fiscal_name', 'comprobante_fiscal_paciente.id_comprobante = comprobante_fiscal_name.id')->where('id_fac',$idfacc)->limit(1)->get('comprobante_fiscal_paciente')->row('name');
if($comprobante_name){
$comp_option=$comprobante_name;	
}else{
$comp_option='Elegir Comprobante Fiscal';		
}
?>
  <select class='form-control select2' id='comprobante-fiscal-selected' style='width:100%'>
<option value=''> <?=$comp_option?>  </option>
<?php
$sqlcf= "SELECT * FROM comprobante_fiscal_name";
$cfdata= $this->db->query($sqlcf);
foreach($cfdata->result() as $rowcf){
	if($comprobante_name !=$rowcf->name){
?>
<option value="<?=$rowcf->id?>"><?=$rowcf->name?></option>
<?php
	}
}
echo "</select>";
$comproPat=$this->db->select('comprobante,id,id_comprobante,vencimiento')
->where('id_fac',$idfacc)
->where('id_paciente',$id_p_a)
->get('comprobante_fiscal_paciente')->row_array();
if($comproPat){
$idcomp=$comproPat['id']; 
$displayeditcomp='';
$id_Comp=$comproPat['id_comprobante'];
$venval=$comproPat['vencimiento'];
}else{
$idcomp=0;
$displayeditcomp='none';
$id_Comp=0;
$venval='';
}
?>
<br/>
<span id='displayeditcomp' style="display:<?=$displayeditcomp?>">

<span id="id_comprobante" style='display:none'><?=$id_Comp?></span>



<span id='comprobante-value'  style='font-weight:bold'>
<?php

echo $comproPat['comprobante'];
?>

</span>

<a href='#' id='idcomp1'  ><i class='fa fa-pencil' aria-hidden='true'></i></a>
<span id='idcomp2' style='display:none' ><?=$idcomp?></span>
<span id='comprobante-changed' style='display:none' ></span>
<br/><br/>
 <div class="form-group row">

    <label  class="col-sm-3 col-form-label">Vencimiento</label>
    <div class="col-sm-5">
   <input type="text" class="form-control" id='fecha-vencimiento-compro' value="<?=$venval?>" />
   &nbsp;<button type='button' id='save-vencimiento-comp' class="btn btn-success btn-xs"  style='font-size:10px'> Guardar Fecha</button>
   
   <i class="fa fa-check-circle show-me-venc" style='display:none'></i>
    </div>
  </div>
</span>
 

  </span>
  
  
  <div class="modal fade" id="edit-comprobante"  role="dialog"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body2">
</div>
</div>
</div>
</div>
  <script>
  
  $(".select2").select2({

});


  $('#comprobante-fiscal-selected').on('change', function(event){
event.preventDefault();
if($(this).val() !=''){
$('#comprobante-changed').html($(this).val());
$('#displayeditcomp').show();
loadComprobante($(this).val());
}

})

function loadComprobante(idc){
$("#comprobante-value").fadeIn().html('<span style="font-size:16px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#idcomp1").hide();
$.ajax({
type: "POST",
dataType: 'JSON',
url: "<?=base_url('admin_medico/comprobanteFiscalValue')?>",
data: {id:idc,id_facc:<?=$idfacc?>,id_patient:<?=$id_p_a?>,id_user:<?=$id_user?>},
success:function(response){ 
$('#comprobante-value').html(response.comprobantevalue);
$( "#idcomp2" ).html(response.comprobanteid);
$( "#id_comprobante" ).html(response.id_comprobante);
$("#idcomp1").show();
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$( "#load-select-comprobante" ).html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
})	
	
}



$('#idcomp1').on('click', function(event) {
var idcomp= $( "#idcomp2" ).html();
var id_Comp= $( "#id_comprobante" ).html();
 // AJAX request
   $.ajax({
    url: "<?=base_url('admin_medico/edit_comprobante')?>",
    type: 'post',
    data: {idcomp: idcomp,id_user:<?=$id_user?>,id_Comp:id_Comp,id_patient:<?=$id_p_a?>},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-body2').html(response);

      // Display Modal
      $('#edit-comprobante').modal('show'); 
    }
  });



 $('#edit-comprobante').on('hidden.bs.modal', function () {
	loadComprobanteSelect();

    $('html, body').animate({
      scrollTop: $("#comprobante-fiscal-selected").offset().top
    })
	

    });


	 });
	 
	 
	  $("#fecha-vencimiento-compro").datepicker({
    dateFormat: 'dd-mm-yy'
	

  })
  
$('#fecha-vencimiento-compro').mask('00-00-0000', {placeholder: '--/--/----'});


$('#save-vencimiento-comp').on('click', function(event) {
var date= $( "#fecha-vencimiento-compro" ).val();
if(date){
$('#save-vencimiento-comp').prop('disabled',true);
  $.ajax({
   url: "<?=base_url('admin_medico/saveVencimienoComprobante')?>",
    type: 'post',
    data: {date: date,id_patient:<?=$id_p_a?>},
    success: function(data){ 
     $(".show-me-venc").show().css('color','green').delay( 1000 ).hide(0); 
	 $('#save-vencimiento-comp').prop('disabled',false);
    }
  });
}

});


  </script>