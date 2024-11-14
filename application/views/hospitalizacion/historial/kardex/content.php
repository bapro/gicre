<div class="col-md-12 backg"  >
<h4 class="h4 his_med_title">KARDEX</h4>
<div id='listado-med-kardex'>
<div style='overflow-x:auto;'>
 <?php $this->load->view('hospitalizacion/historial/kardex/listado-med-kardex');

 ?>

</div>
</div>
<hr class="prenatal-separator"/>
</div>

   <div class="col-md-7"  >
   <h5>KARDEX DE MEDICAMENTOS <span id='kardex-num'></span></h5>
   <br/> <br/>
     <div class="form-group row">
	 <input type="hidden" class="form-control kardex-remove" id='id_med_al' />
    <label  class="col-sm-3 col-form-label">Liquido E.V</label>
    <div class="col-sm-8">
   <input type="text" class="form-control kardex-remove" id='liquido-ev' />
   
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Via</label>
    <div class="col-sm-4">
   <input type="text" class="form-control kardex-remove" id='kardex-via' />
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Frecuencia cada</label>
    <div class="col-sm-6">
   <input type="text" class="form-control kardex-remove" id='kardex-frecuencia'/>
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Cantidad</label>
    <div class="col-sm-6">
   <input type="text" class="form-control kardex-remove" id='kardex-cantidad'/>
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Dosis</label>
    <div class="col-sm-4">
   <input type="text" class="form-control kardex-remove" id='kardex-dosis' />
   
    </div>
  </div>
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Fecha Hora Realizada</label>
<div class="col-sm-9">
  <div class="input-group date form_datetime_kardex col-md-8 "  data-date-format="dd MM yyyy HH:ii:ss" data-link-field="dtp_input1">
<input type="text" class="form-control check-input-csv" readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden"  id="kardex-hora"  value="<?=date("Y-m-d H:i:s")?>" />
 
  </div>
</div>
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Turno</label>
<div class="col-sm-7">
      <input type="text" class="form-control kardex-remove" id="kardex-turno" >
	  <input type="hidden" class="form-control" id="kardex-id_i_m" >
	      <br/><br/>
   <button type="button" class="btn btn-sm btn-primary disabled-btn-kardex" id='kardex-add-med' disabled title='Agregar' ><i class="fa fa-save" aria-hidden="true"></i></button>

   <button type="button" class="btn btn-sm btn-default disabled-btn-kardex" id='kardex-cancel-med' disabled title='Cancelar'> <i class="fa fa-remove" aria-hidden="true"></i></button>
 
	  </div>
	
</div>
  
   </div>

 
   <div class="col-md-12"  >
   <hr class="prenatal-separator"/>
 <div id="kardex-new-med" class="kardex-new-med"  >
<?php $this->load->view('hospitalizacion/historial/kardex/new-kardex');?> 
 </div>
   </div>
   
   <script>


$('#kardex-cancel-med').on('click',function(e){

kardexContent();
$('#devolucion-list').html('');
})


function kardexContent(){
	
$.ajax({
url:"<?php echo base_url(); ?>hosp_kardex/listadoMedKardex",
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
url:"<?php echo base_url(); ?>hosp_kardex/addNewKardex",
data: {id_historial:<?=$id_historial?>,user_id:<?=$user_id?>,new_cant:$("#kardex-cantidad").val(),
id_i_m:$("#kardex-id_i_m").val(),turno:$("#kardex-turno").val(),fecha:$("#kardex-hora").val(),dosis:$("#kardex-dosis").val()
},
method:"POST",
success:function(data){
$('.kardex-remove').val('');
$('.check-input-csv').val('');
$('#kardex-new-med').html(data);
	$(".disabled-btn-kardex").prop('disabled',true);
},

});

})
var date=new Date();
$('.form_datetime_kardex').datetimepicker({
format: 'dd-mm-yyyy HH:ii:ss',
linkField: "kardex-hora", 
startDate : new Date('2015-01-01'), 
endDate : date  
})
	





</script>
   