<div class="col-md-12 backg"  >
<h4 class="h4 his_med_title">KARDEX</h4>
<div id='listado-med-kardex'>
<div style='overflow-x:auto;'>
 <?php $this->load->view('hospitalizacion/historial/kardex/listado-med-kardex');?>

</div>
</div>
<hr class="prenatal-separator"/>
</div>

   <div class="col-md-5"  >
   <h4>KARDEX DE MEDICAMENTOS</h4>
   <br/> <br/>
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Liquido E.V</label>
    <div class="col-sm-8">
   <input type="text" class="form-control kardex-remove" id='liquido-ev' />
   
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Via</label>
    <div class="col-sm-4">
   <input type="text" class="form-control kardex-remove" id='kardex-via' />
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Frecuencia cada</label>
    <div class="col-sm-6">
   <input type="text" class="form-control kardex-remove" id='kardex-frecuencia'/>
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Dosis</label>
    <div class="col-sm-4">
   <input type="text" class="form-control kardex-remove" id='kardex-dosis' />
   
    </div>
  </div>
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Fecha Hora Realizada</label>
<div class="col-sm-6">
 <div class='input-group date' id='kardex-hora1'>
               <input type='text' class="form-control" id='kardex-hora'  />
               <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
               </span>
            </div>
  </div>
</div>
   <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Turno</label>
<div class="col-sm-7">
      <input type="text" class="form-control kardex-remove" id="kardex-turno" >
	  <input type="hidden" class="form-control" id="kardex-id_i_m" >
	      <br/><br/>
   <button type="button" class="btn btn-sm btn-primary disabled-btn-kardex" id='kardex-add-med' title='Agregar' ><i class="fa fa-save" aria-hidden="true"></i></button>

   <button type="button" class="btn btn-sm btn-default disabled-btn-kardex" id='kardex-cancel-med' disabled title='Cancelar'> <i class="fa fa-remove" aria-hidden="true"></i></button>
 
	  </div>
	
</div>
  
   </div>
   <div class="col-md-12"  >
   <hr class="prenatal-separator"/>
 <div id="kardex-new-med"   >
<?php $this->load->view('hospitalizacion/historial/kardex/new-kardex');?> 
 </div>
   </div>
   
   <script>


$('#kardex-cancel-med').on('click',function(e){

kardexContent();
})


function kardexContent(){
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/listadoMedKardex",
data: {id_historial:<?=$id_historial?>,user_id:<?=$user_id?>},
method:"POST",
success:function(data){
$('#listado-med-kardex').html(data);
$('.kardex-remove').val('');
$('#kardex-add-med').prop('disabled',true);
},

});

}



$('#kardex-add-med').on('click',function(e){
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/addNewKardex",
data: {id_historial:<?=$id_historial?>,user_id:<?=$user_id?>,id_i_m:$("#kardex-id_i_m").val(),turno:$("#kardex-turno").val(),fecha:$("#kardex-hora").val(),dosis:$("#kardex-dosis").val()},
method:"POST",
success:function(data){
$('.kardex-remove').val('');
$('#kardex-new-med').html(data);
	$(".disabled-btn-kardex").prop('disabled',true);
	$(".disabled-btn-kardex").prop('disabled',true);
},

});

})

	$('#kardex-hora1').datetimepicker({

})
</script>
   