
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
      <label>Fecha </label><br/>
      <input  class="form-control change-red" name='fecha-edit' id='fecha-edit' style="width:130px" value="<?=$row->fecha?>"  >
    </div>
    <div class="form-group">
      <label>Num Autorizacion</label><br/>
     <input  type="text" value="<?=$row->numauto?>" style="width:130px" id="numauto" class="form-control change-red"/>
    </div>
    <div class="form-group">
      <label>Autorizado por</label><br/>
     <input  type="text" id="autopor"  value="<?=$row->autopor?>" class="form-control change-red"/>
    </div>
	  <div class="form-group">
    <textarea class="form-control" rows="2" cols="60" placeholder="Comentario" id="comment" ><?php echo $row->comment;?></textarea>
     <br/>  <br/>
    </div>
	
	 <div class="form-group" style="float:right">
	 <button class="btn btn-sm btn-success" type="button" id="change-header-fac" ><i class="fa fa-save"></i>Guardar</button>
   </div>
	</form>
	<!--<a class="btn btn-sm btn-primary" style="float:right" id='view-fac-after-save'  href="<?php echo base_url("admin_medico/billing_print_view1/$idfacc/$is_admin")?>" ><i class="fa fa-eye"></i>Ver Factura </a>-->
</div>
    
<div class="col-sm-12 showdown3 searchb" >
   <div style='display: table;margin: 0 auto;' id='load_factura_table_view'></div>
<div id='edit_this_tarif'></div>
   
   
   <hr/>

<div id='factura_table_view'></div>

<br/><br/><br/>
  </div>



 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
 <script>
 $("#fecha-edit").datepicker({
    dateFormat: 'dd-mm-yy',
	maxDate: "-1d"

  });
 factura_table_view();
 
 function factura_table_view()
{

$("#load_factura_table_view").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

 var id_facc = "<?=$row->idfacc?>";
 var is_admin = "<?=$is_admin?>";
  var user = "<?=$name?>";
  var identificar = "<?=$identificar?>";
  var id_patient = "<?=$id_p_a?>";
$.ajax({
type: "POST",
url: "<?=base_url('factura/factura_table_view')?>",
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
var numauto = $('#numauto').val();
var autopor = $('#autopor').val();
var comment = $('#comment').val();
var fechaEdit = $('#fecha-edit').val();
var user = "<?=$name?>";
 var id_facc = "<?=$row->idfacc?>";
if(numauto == "" || autopor == "" || fechaEdit =="")
{
$(".change-red").css("border-color", "red");
}
else
{

$('#change-header-fac').prop("disabled",true);
	$.ajax({
type: "POST",
url: "<?=base_url('factura/UpdateBillHead')?>",
data: {fechaEdit:fechaEdit,numauto:numauto,autopor:autopor,user:user,id_facc:id_facc,comment:comment},
cache: true,
success:function(data){
$(".change-red").css("border-color", "");
alert("Hecho !");
$('#change-header-fac').prop("disabled",false);
},
 
});
}
return false;
 })

</script>

