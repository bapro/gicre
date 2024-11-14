<style>

.add-row{color:#38a7bb;border-color:#38a7bb;}
#plus{
    
    text-decoration:none;
    color:#38a7bb;
	display:inline-block;
    cursor:pointer
}
.td-input{background:white;border:1px solid #38a7bb}
.totpapat,.total,.totalpaseg{background:rgb(230,230,230);border:1px solid #38a7bb}
.col-sm-5,.col-sm-7,.col-sm-9,.col-sm-3,.col-sm-8{font-size:15px;}
td,th{text-align:left;font-size:14px}
.bono-comp {
float:right;
  color: #0A58A5;
  text-decoration: none;
  font-weight: bold;
}

</style>
  <?php foreach($billings2 as $row)


if($is_admin=="yes"){
 $controller="admin";
} else {
$controller="medico";
}   ?>


<?=$header?>
<div class="col-sm-12 showdown3 searchb" >
<br/>
 <form class="form-inline">
	  <div class="form-group">
    <textarea class="form-control change-red" rows="2" cols="60" placeholder="Comentario" id="comment" ><?php echo $row->comment;?></textarea>
     <br/>  <br/>
    </div>
	<div class="form-group">
      <label>Fecha </label>
      <input  class="form-control change-red" id='fecha-edit' style="width:130px" value="<?=$row->fecha?>"  >
    </div>
	 <div class="form-group" style="float:right">
	 <button class="btn btn-sm btn-success" type="button" id="change-header-fac" ><i class="fa fa-save"></i>Guardar</button>
   </div>
	</form>
	<!--<a class="btn btn-sm btn-primary" style="float:right" id='view-fac-after-save'  href="<?php echo base_url("admin_medico/billing_print_view1/$idfacc/$is_admin")?>" ><i class="fa fa-eye"></i>Ver Factura </a>-->
</div>
    
<div class="col-sm-12 showdown3 searchb" >
<div class="col-sm-7" ></div>
<div class="col-sm-5" >
<br/>
<div class="input-group" id='load-select-comprobante'>

 </div>

<a  class='bono-comp show-bono-comp' data-toggle="modal" href="" data-target="#abono" >Abono</a>
</div>
   <div style='display: table;margin: 0 auto;' id='load_factura_table_view'></div>
<div id='edit_this_tarif'></div>
   
   
   <hr/>

<div id='factura_table_view'></div>

<br/><br/><br/>
  </div>
<div class="modal fade" id="abono"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title"  >AGREGAR ABONO A LA FACTURA </h3><br/>
</div>
<div class="modal-body">
 <div class="form-group row">

    <label  class="col-sm-2 col-form-label">Fecha</label>
    <div class="col-sm-4">
   <input type="text" class="form-control bono-remove" id='fecha-bono' />
   
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Abono</label>
    <div class="col-sm-8">
	<div class="input-group">
  <span class="input-group-addon">  RD$</span>
	 <input type="text" class="form-control bono-remove " id='monto-bono' onkeypress='return onlyfloat(event);' />
    </div>
     <br/>
   <button type="button" class="btn btn-sm btn-default" id='save-bono' > <i class="fa fa-save" aria-hidden="true"></i></button>
   <span id="bono-result"></span>
   </div>
  </div>
<div id='listarFacturaAbono'></div>

</div>
</div>
</div>
</div>




<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
 <script>



$('.show-bono-comp').on('click', function () {
 listarFacturaAbono();
});



 listarFacturaAbono();
  function listarFacturaAbono()
{
$("#list-abono").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
url: "<?=base_url('factura/listarFacturaAbono')?>",
data: {id_facc:<?=$row->idfacc?>},
success:function(data){ 
$("#listarFacturaAbono").html(data);
}  
});

}
 
function onlyfloat(event) {
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.float').val().indexOf('.') != -1)) {
        return false;
    }
    return true;
    };
 
  $('#save-bono').on('click', function(event) {
	var bonoResta= $('#bonoResta').html();
	
if(bonoResta=='RD$0.00'){
 $("#bono-result").fadeIn().html('la resta es 0.00').css('font-style','italic').css('color','red');	
}else{
var fecha = $('#fecha-bono').val();
var bono = $('#monto-bono').val();
if(fecha != ""  &&  bono !="")
{
 $("#bono-result").fadeIn().html('guardando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST",
url: "<?=base_url('factura/saveFacturaBono')?>",
data: {fecha:fecha,bono:bono,id_facc:<?=$row->idfacc?>,id_user:<?=$name?>,bonoResta:bonoResta},
success:function(data){
$("#bono-result").html(data);
if($("#bono-result").text()==1){
	$(".bono-remove").val('');	
	 $("#bono-result").html('hecho').css('color','green').delay( 1000 ).hide(0);
	 listarFacturaAbono();
 }
 else if($("#bono-result").text()==2){
	 $("#monto-bono").val('');	
$("#bono-result").html('abono mas grande que resta: '+bono).css('color','red'); 	 
 }
else{
	$("#bono-result").html('fracaso, intenta otra vez.').css('color','red');  
 }
	
},
 
});
}
  }
 })
 
 
 
 
  $("#fecha-bono").datepicker({
    dateFormat: 'dd-mm-yy'

  });
 
 $("#fecha-edit").datepicker({
    dateFormat: 'dd-mm-yy',
	maxDate: "-1d"

  });
 factura_table_view();
 
 function factura_table_view()
{

$("#load_factura_table_view").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

 var id_facc = <?=$row->idfacc?>;
 var is_admin = "<?=$is_admin?>";
  var user = <?=$name?>;
  var identificar = "<?=$identificar?>";
  var id_patient = <?=$id_p_a?>;
$.ajax({
type: "POST",
url: "<?=base_url('factura/factura_table_view_privado')?>",
data: {id_facc:id_facc,is_admin:is_admin,user:user,identificar:identificar,id_patient:id_patient},
cache: true,
success:function(data){ 
$("#load_factura_table_view").hide();
$("#factura_table_view").html(data);
$('#change-header-fac').prop("disabled",false);
}  
});

}
 
 $('#change-header-fac').on('click', function(event) {
var fechaEdit = $('#fecha-edit').val();
var comment = $('#comment').val();
var user = "<?=$name?>";
 var id_facc = "<?=$row->idfacc?>";
if(comment == ""  &&  fechaEdit=="")
{
$(".change-red").css("border-color", "red");
}
else
{

$('#change-header-fac').prop("disabled",true);
	$.ajax({
type: "POST",
url: "<?=base_url('factura/UpdateBillHead')?>",
data: {user:user,id_facc:id_facc,comment:comment,fechaEdit:fechaEdit},
cache: true,
success:function(data){
$(".change-red").css("border-color", "");
alert("Hecho !");
//factura_table_view(); 
$('#change-header-fac').prop("disabled",false);
},
 
});
}
return false;
 })



 
	 

function loadComprobanteSelect(){
$.ajax({
type: "POST",
url: "<?=base_url('factura/loadComprobanteSelect')?>",
data: {id_p_a:<?=$id_p_a?>,idfacc:<?=$row->idfacc?>,id_user:<?=$name?>},
success:function(data){ 
$('#load-select-comprobante').html(data);

},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-select-comprobante').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
})	
	
}
loadComprobanteSelect();

</script>

