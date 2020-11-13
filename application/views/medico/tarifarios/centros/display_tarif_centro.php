<span class="loadf"></span>
<?php foreach($results as $rw)
$centro=$this->db->select('id_m_c,name,logo')->where('id_m_c',$rw->centro_id)
->get('medical_centers')->row_array();


$codigo=$this->db->select('id,codigo,updated_by,updated_time')->where('id_centro',$rw->centro_id)
->get('codigo_contrato')->row_array();
$updated_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($codigo['updated_time'])));	
?>
<div class="col-md-12" style="text-align:center">
<h2 style="color:green" >CENTRO MEDICO </h2>
 <h4 style="color:green" ><?=$centro['name']?> </h4>
<p><img width="120" height="120" class="img-thumbnail" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  /></p>
 
 <h5 style="color:green" >Codigo Prestador : <input type="text"  id="show-cc" style="display:none;width:150px;text-align:center" value="<?=$codigo['codigo']?>"/>
 <span id="hide-cc"><?=$codigo['codigo']?></span> 
 <button title="Ultimo cambio hecho &#10; por <?=$codigo['updated_by']?> &#10; fecha  <?=$updated_time?>" type="button" class="btn btn-sm btn-default" id="show-s-b-cc" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
 <button type="button" id="save-b-cc" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
</h5>
 
 <hr id="hr_ad"/>

 </div>

<div class="col-md-2 table-responsive" >

<table class="table table-striped table-bordered" style="width:180px" >
<thead>
<tr id="go_up" style="background:#38a7bb;color:white" >
<th>#</th>
<th>Categoria (<?=$count?>)</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$cpt="";
foreach($results as $row)
{
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr bgcolor='<?=$colorBg?>'>
<td><?=$i;$i++;?></td>
<td><a href="" class="view-servicios" title="Ver sus servicos" id="<?=$row->groupo?>"><?=$row->groupo?></a></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div class="col-md-8 table-responsive" style='border:1px solid #38a7bb;height:850px;' >
<br/>

<div id="servicios" style="text-align:center;"><span class="alert alert-info" >Los servicios de la categoria se muestran aqui.<span></div>
</div>
 <div class="col-md-2" style="font-size:12px" >
 <h4 style="color:green">MEDICOS</h4>
<ol>
<?php
$cpt="";
foreach($RESULT_DOCTOR as $row)
{
	$doc=$this->db->select('name')->where('id_user',$row->first_name)
->get('users')->row('name');
?>	
<li style="text-transform:uppercase"><a target="_blank" title='ver este centro medico' href="<?php echo base_url('admin/doctor/'.$row->first_name)?>"><?=$doc?></a></li>
<?php
}
?>
</ol>
</div>
<div class="modal fade" id="edit_tarifario" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-body">
</div>
</div>
</div>
</div>

<script>

//=======================================================================================
$('.view-servicios').click(function(){
$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#servicios").hide();	
var categoria = $(this).attr('id');

$.ajax({
type: "POST",
url: "<?=base_url('admin/centro_categoria_servicios')?>",
data: {categoria:categoria},
cache: true,
 success:function(data){
$(".loadf").hide();	 
 $('#servicios').html(data);
$("#servicios").show();	
$("html, body").animate({ scrollTop: 130 });

/*var x = $("#go_up").position(); //gets the position of the div element...
window.scrollTo(x.left, x.top);*/
},
 
});

return false;
});


//---------------------------------------------------------------------------------------------------------
   $('#show-s-b-cc').on('click',function(){
         //hide edit button
        $("#show-cc").show();
        
        $("#hide-cc").hide();
		$(this).hide();
        $("#save-b-cc").show();
    });
	
	
//---------------------------------------------------------------------------------------------------------
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

