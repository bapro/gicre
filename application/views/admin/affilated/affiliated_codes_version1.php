<h2>GENERAR CODIGOS PARA LOS AFILIADOS</h2>
<table class="table table-striped table-bordered table-condensed tab_logic turf" id="turf" style='width:100%'>
<thead>
<tr>
<td colspan='4' id='send-succed'></td>
</tr>
<tr>
<th></th>
<th style="text-align:left">Codigo</th>
<th style="text-align:left">Correo Del Doctor</th>
<th style="text-align:left"></th>

</tr>
</thead>
<tfoot >
<tr>
<th colspan='1'></th>
<th><em  style="font-size:13px;color:red" id='duplicated-codigo'></em></th>
<th><em  style="font-size:13px;color:red" id='incorrect-email'></em></th>
<th></th>
<td >
<button type="button" disabled title="Añadir fila" id="add_row" style="cursor:pointer;font-size:13px;color:blue;background:white;"><span  class="glyphicon glyphicon-plus-sign"></span></button>

</td>
</tr>

</tfoot>
<tbody>
<tr id='addr1' class="calculation visible">

<td style="">
<button type="button"   class="btn btn-primary generar-codigo">Generar</button>

</td>
<td>
<input type="text" class="codigo-generado form-control "  />
</td>
<td>
<input type="email" class="doc-email form-control "  />
</td>
<td>
<button type="button"  class="btn btn-success enviar-codigo">Enviar</button>
</td>
</tr>
<tr id='addr2' class="calculation visible">
</tbody>

</table>

</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script>
$(document).ready(function() {
function uuidv4() {
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    return v.toString(16);
  });
}


$(document).on('click', '.generar-codigo', function() {
 $(this).closest("tr").find("input.codigo-generado").val(uuidv4());
 $("#add_row").prop('disabled',false);
});




var numRows = 2, ti = 1;
$("#add_row").on("click",function() {addRow()});



function addRow() {
$("#add_row").prop("disabled",true);
$('#addr' + numRows).html("<td><button type='button'  class='btn btn-primary generar-codigo'>Generar</button></td><td><input  name='codigo-generado" + numRows + "' type='text' class='codigo-generado  form-control'  tabindex='" + (ti++) + "' /></td><td><input  name='doc-email" + numRows + "' type='text' class='doc-email form-control'  tabindex='" + (ti++) + "' /></td><td class='enviar-codigo'><button type='button'  class='btn btn-success'>Enviar</button></td><td><span class='glyphicon glyphicon-minus-sign remove-fila' title='quitar esa fila' style='cursor:pointer;color:red'></span></td>");
$('#turf tr:last').after('<tr id="addr' + (numRows + 1) + '" class="calculation visible"></tr>');
numRows++;
}
});


$(document).on('click', '.remove-fila', function() {

$(this).parents("tr").remove();

});




function validateEmail(emailAdress) {
   let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (emailAdress.match(regexEmail)) {
    $("#incorrect-email").text('');
  } else {
    $("#incorrect-email").text('correo incorecto!');
  }
}


$(document).on('click', '.enviar-codigo', function(event) {
event.preventDefault();
var codigo =$(this).closest("tr").find("input.codigo-generado").val();
var correo =$(this).closest("tr").find("input.doc-email").val();
	$.ajax({
url:"<?php echo base_url(); ?>affiliated/saveAffiliated",
data: {codigo:codigo,correo:correo,id_user:<?=$id_user?>},
method:"POST",
 dataType: 'json',
success:function(response){
 if(response.status == 4){
$('#send-succed').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
else if(response.status == 0){
$('#incorrect-email').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
else if(response.status == 1){
$('#incorrect-email').html('<p class="alert alert-warning ">'+response.message+'</p>');
} else if(response.status==2){
$('#duplicated-codigo').html('<p class="alert alert-warning ">'+response.message+'</p>');
} else if(response.status==3){
$('#send-succed').html('<p class="alert alert-success ">'+response.message+'</p>');
$('#incorrect-email').html('');
$('#duplicated-codigo').html('');
}else{
	$('#send-succed').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
},
 
});

});
</script>
