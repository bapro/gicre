<?php if($querykardex->result() !=NULL){ ?>

 <div class="col-md-12"  >
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#homekardex">  <strong>KARDEX REALIZADOS</strong> (<i><?=$nb_kardex?></i>)</a></li>
  <li><a data-toggle="tab" href="#listreturn"><strong>LISTADO DE DEVOLUCIONES</strong> (<i id="count_kar_dev"></i>)</a></li>

</ul>
<div class="tab-content">
<br/>
  <div id="homekardex" class="tab-pane fade in active">
<button type="button" class="btn btn-sm btn-default" id='imprimir-kardex' title='Imprimir' style="float:right"> <i class="fa fa-print" aria-hidden="true"></i></button>
<br/><br/>
<div style='overflow-x:auto;'>
<table  class="table table-striped" style="width:100%"  id='new-kardex-table'>

	<thead>
    <tr style="background:#428bca;">
	<th style="color:white"><strong># KARDEX</strong></th>
	   <th style="color:white"><strong>Medicamento</strong></th>
	   <th style="color:white"><strong>Cantidad</strong></th>
	   <th style="color:white">Dosis</th>
	    <th style="color:white">Via</th> 
		<th style="color:white">Usuario</th> 
		<th style="color:white">Fecha</th> 
		<th style="color:white">Accion</th> 
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($querykardex->result() as $row)
     {
	$op=$this->db->select('name')->where('id_user',$row->kardex_user)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->kardex_fecha));
	$med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
	if($row->new_cant){
	$cant=$row->new_cant;	
	}else{
	$cant=$row->cantidad;	
	}
	 ?>
	<tr id="<?=$row->id_i_m; ?>" >
	<td><?=$row->id_i_m;?></td>
	<td><?=$med;?></td>
    <td>
	<span class="editSpanKardex lab-n"><?=$cant;?></span>
	
	<input style="display: none;" class="editInputKardex  form-control input-sm edit-cant-k" name="edit-lab"  type="text"   value="<?=$cant?>"  />
	</td>
     <td><?=$row->dosis;?></td>
	<td><?=$row->via?></td>
	<td><?=$op?></td>
	<td><?=$fecha?></td>
		<td>
		
		<a  style="cursor:pointer" class="return-kardex btn btn-primary btn-success" id="<?=$row->id_i_m; ?>"  >Devolucionar</a>
		
		<button type="button" title="guardar" class="btn btn-sm btn-success saveReturnKardex" style="float: none; display: none;"><i class="fa fa-save" aria-hidden="true"></i> </button>
		<button type="button" title="cancelar" class="btn btn-sm btn-default cancel-kardex" style="float: none; display:none ;"><i class="fa fa-remove" aria-hidden="true"></i></button>
		
		 </td>
       </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
</div>
</div>


 <div id="listreturn" class="tab-pane fade">

  <div class="devolucion-list-pat"></div>

 </div>
</div>
 <?php
	 }
	 ?>

<script>


   $('.return-kardex').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".return-kardex").hide();

        $(this).closest("tr").find(".saveReturnKardex").show();

		  $(this).closest("tr").find(".editSpanKardex").hide();

        //show edit input
        $(this).closest("tr").find(".editInputKardex").show();
		 $(this).closest("tr").find(".cancel-kardex").show();

    });	

  $('.cancel-kardex').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".return-kardex").show();

        $(this).closest("tr").find(".saveReturnKardex").hide();

		  $(this).closest("tr").find(".editSpanKardex").show();

        //show edit input
        $(this).closest("tr").find(".editInputKardex").hide();
		 $(this).closest("tr").find(".cancel-kardex").hide();

    });


	$('.saveReturnKardex').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var cant = parseFloat($(this).closest("tr").find(".editInputKardex").val());
 var cantInit=parseFloat($(this).closest("tr").find(".editSpanKardex").text());
 if(cant > cantInit){
	 alert("No puede devolucionar mas que la cantidad inicial: "+ cantInit);
	return false; 
 }
   if(cant !=""){
  $(this).closest("tr").find(".editBtnKardex").show();
$(this).hide();
 $(this).closest("tr").find(".return-kardex").show();

   $(this).closest("tr").find(".editInputKardex").hide();
   	  $(this).closest("tr").find(".editSpanKardex").show();
$(this).closest("tr").find(".cancel-kardex").hide();
//---------------------------------------------------------------------------------
//--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".editSpanKardex").text(cantInit - cant);

//------------------------------------------------------------------------------------
$.ajax({
url:"<?php echo base_url(); ?>hosp_kardex/devolucionAlmacenMed",
data: {user_id:<?=$user_id?>,id_i_m: ID, id_patient: <?=$id_historial?>,dev: cant, cantInit: cantInit},
method:"POST",
success:function(data){

devolucionMedicamentos(<?=$id_historial?>,2);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.devolucion-list-pat').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});
   }
});


let nb_kardex=<?=$nb_kardex?>;
$(".quitar-kardex").click(function(){
if (confirm("Lo quieres quitar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
nb_kardex --;
$.ajax({
type:'POST',
url:'<?=base_url('hosp_kardex/quitarNewCardex')?>',
data: {id : del_id,kardex_user:<?=$user_id?>},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
$("#nb_kardex").html(nb_kardex);
 kardexContent();
}
});
}
});

function devolucionMedicamentos(id,where){
$.ajax({
url:"<?php echo base_url(); ?>hosp_kardex/devolucionMedicamentos",
data: {id:id,where:where},
method:"POST",
success:function(data){
$('.devolucion-list-pat').html(data);

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.devolucion-list-pat').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

}
devolucionMedicamentos(<?=$id_historial?>,2);



/*
function devolucionMedicamentos(id,where){
$.ajax({
url:"<?php echo base_url(); ?>hosp_kardex/devolucionMedicamentos",
data: {id:id,where:where},
method:"POST",
success:function(data){
$('.devolucion-list').html(data);

},

});

}*/





</script>