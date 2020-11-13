<span class="loadf"></span>
<?php foreach($results as $rw)
$centro=$this->db->select('id_m_c,name,logo')->where('id_m_c',$rw->centro_id)
->get('medical_centers')->row_array();

$codigo=$this->db->select('*')->where('id_centro',$rw->centro_id)->where('id_seguro',$rw->seguro_id)
->get('codigo_contrato')->row_array();



$u1=$this->db->select('name')->where('id_user',$codigo['inserted_by'])->get('users')->row('name');
$u2=$this->db->select('name')->where('id_user',$codigo['updated_by'])->get('users')->row('name');

$seguromedico=$this->db->select('title')->where('id_sm',$rw->seguro_id)->get('seguro_medico')->row('title');

$updated_time  = date("d-m-Y H:i:s", strtotime($codigo['updated_time']));	
$inserted_time  = date("d-m-Y H:i:s", strtotime($codigo['inserted_time']));	
?>
<div class="col-md-12" style="text-align:center">
<h2 style="color:green" >CENTRO MEDICO </h2>
 <h4 style="color:green" ><?=$centro['name']?> </h4>
<p><img width="120" height="120" class="img-thumbnail" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  /></p>
 <ul style='color:black;list-style:none'>
<li>Creado por <?=$u1?> fecha <?=$inserted_time?></li>
<li>Editado por <?=$u2?> fecha <?=$updated_time?> </li>
</ul>
 <h5 style="color:green" >Codigo Prestador : <input type="text"  id="show-cc" style="display:none;width:150px;text-align:center" value="<?=$codigo['codigo']?>"/>
 <span id="hide-cc"><?=$codigo['codigo']?></span>
 <button  type="button" class="btn btn-sm btn-default" id="show-s-b-cc" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
 <button type="button" id="save-b-cc" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
 <?=$seguromedico?>
 </h5>
  <hr id="hr_ad"/>
<table class="table table-striped" id='list-of-n-cat' >
<thead>
<tr>
<th colspan='2'>CREAR TARIFARIOS</th>
</tr>
<tr>
<td colspan='2'><input class="form-control rmv-red" id='new-cat-name' placeholder='Nombre de la categoría'/></td>
<td><em id='result-grp'></em></td>
</tr>
<tr style="background:#38a7bb;color:white">
<th style="width:9%">CUPS</th>
<th style="width:9%">SIMON</th>
<th>SERVICO</th>
<th style="width:9%">MONTO</th>
<th></th>
</tr>
 <tr> 
<td><input id="new-cups2" class="form-control rmv-red" type="text"/> </td>
<td><input id="new-simon2" class="form-control rmv-red" type="text"/> </td>
<td><input id="new-consulta2" style="width:100%"  class="form-control  rmv-red" type="text"/> </td>
<td><input id="new-monto2" class="form-control  rmv-red" type="text"/> </td>
<td> <button type="button" id="NewsaveBtn2" class="btn btn-sm btn-success" style="float: none;"><i class="fa fa-save"> Guardar</i></button></td>
</tr> 
</thead>
<tbody >

</tbody>
</table>
 <hr id="hr_ad"/>

 </div>

<div class="col-md-12 table-responsive" style="max-height:120vh;overflow: auto;" >
<div id='display_centro_tarif_cat'></div>
</div>
<div class="col-md-12 table-responsive" style='border:1px solid #38a7bb;height:850px;' >
<br/>

<div id="servicios" style="text-align:center;"><span class="alert alert-info" >Los servicios de la categoria se muestran aqui.<span></div>
</div>


<script>

(function($) {
  $.fn.donetyping = function(callback) {
    var _this = $(this);
    var x_timer;
    _this.keyup(function() {
      clearTimeout(x_timer);
      x_timer = setTimeout(clear_timer, 1000);
    });

    function clear_timer() {
      clearTimeout(x_timer);
      callback.call(_this);
    }
  }
})(jQuery);

$('#new-cat-name').donetyping(function(callback) {
$.ajax({
type: "POST", 
dataType: 'JSON',
url: '<?php echo site_url('admin/check_if_group_exist');?>',
data:{groupo:$(this).val(),id_centro:<?=$id_centro?>,id_seguro:<?=$id_seguro?>},
success: function(msg){
	if(msg > 0){
	$("#result-grp").html('ya existe en el listado abajo').css('color','red');	
	$('#new-cat-name').val('');
	}else{
	$("#result-grp").html('');	
	}
},

});
});





//--------------------------------------------------------------------------------------------------------------
display_centro_tarif_cat();
function display_centro_tarif_cat(){
$.ajax({
url:"<?php echo base_url(); ?>admin/display_centro_tarif_cat",
data: {id_seguro:<?=$id_seguro?>,id_centro:<?=$id_centro?>},
method:"POST",
success:function(data){
$("#display_centro_tarif_cat").html(data);
},
});
}
//---------------------------------------------------------------------------------------------------------
 $('#NewsaveBtn2').on('click', function () {

 var name  = $("#new-cat-name").val();
  var servicio  = $("#new-consulta2").val();
  var monto  = $("#new-monto2").val();
 if(name==""){
	 $("#new-cat-name").css("border",'1px solid red');
 } else if(servicio=="") {
	  $("#new-consulta2").css("border",'1px solid red');
 } else if(monto=="") {
	  $("#new-monto2").css("border",'1px solid red');
 }else{
 $(".rmv-red").css("border",'1px solid #38a7bb');
 $('#NewsaveBtn2').prop('disabled',true);
$.ajax({
type: "POST", 
url: '<?php echo site_url('admin/saveNewTarifCentro');?>',
data:{cups:$("#new-cups2").val(),simons:$("#new-simon2").val(),consulta:servicio,monto:monto,categoria:name,id_centro:<?=$id_centro?>,id_seguro:<?=$id_seguro?>},
success: function(data){
	$(".rmv-red").val('');
$('#NewsaveBtn2').prop('disabled',false);
display_centro_tarif_cat();
},


});
 }
});

//---------------------------------------------------------------------------------------------------------
   $('#show-s-b-cc').on('click',function(){
         //hide edit button
        $("#show-cc").show();
        
        $("#hide-cc").hide();
		$(this).hide();
        $("#save-b-cc").show();
    });
	
	
//-----------------------------CHANGE CODIGO----------------------------------------------------------------------------
 $('#save-b-cc').on('click', function () {
 var codigo  = $("#show-cc").val();
 if(codigo==""){
	 alert("El codigo no se puede dejar vacio !");
 } else {
var codigo_id  = "<?=$codigo['id']?>";
var user_name  = "<?=$user_name?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin/save_edit_c_c');?>',
data:{codigo_id:codigo_id,codigo:codigo,user_name:user_name},
success: function(data){
$("#show-cc").hide();
$("#hide-cc").show();
$("#hide-cc").text(codigo);	
 $("#save-b-cc").hide();
  $("#show-s-b-cc").show();
},
});
 }
});


</script>

