<br/>
<style>
.checked {
    background: #FEC7C7;
}
</style>
<!--<div class="col-md-4" style='float:right' >
<input type="text" id="myInput" onkeyup="myFunction()" class="form-control"  placeholder="Buscar"/>
</div>
<br/><br/>-->
<table class="table" id='paginate-intercon' style="background:white" cellspacing="0">
<thead>
<tr style="background:#428bca;" class="tr-header">
<th style="font-size:10px;color:white">Medico</th>
<th style="font-size:10px;color:white">Area</th>
<th style="font-size:10px;color:white">Causa</th>
<th style="font-size:10px;color:white">operator</th>
<th style="font-size:10px;color:white">Fecha</th>
<th style="font-size:10px;color:white">Elegir</th>
<th style="width:10px;color:white"> </th>
<th style="font-size:10px;color:white"></th>

</tr>
</thead>
<tbody>
<?php foreach($nota->result() as $row)
{
$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');

$area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
$fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$medico=$this->db->select('name')->where('id_user',$row->doc)->get('users')->row('name');

$response_time = date("d-m-Y H:i:s", strtotime($row->response_time));
$user_response=$this->db->select('name')->where('id_user',$row->user_response)->get('users')->row('name');
if($row->user_response !=0){
$response_text="respondida por doctor(a) $user_response,   $response_time";
}else{
$response_text="no hay respuesta";	
}		 
?>
<tr class="crimeOption">
<td style="font-size:12px"><?=$medico;?></td>
<td style="font-size:12px"><?=$area?></td>
<td style="font-size:12px"><?=$row->causa;?></td>
<td style="font-size:12px"><?=$op;?></td>
<td style="font-size:12px"><?=$fecha;?></td>
<td style="font-size:12px"><input name="choose-this" class="choose-this" value="<?=$row->id;?>" type="radio"></td>
<td style="display:none" class="response"><?=$row->response;?></td>
<td style="display:none" class="response-text"><?=$response_text;?></td>
<td>
<?php if($row->id_user==$id_user  || $perfil=="Admin") {?>

<a  target="_blank"  href="<?php echo base_url("printings/print_if_foto_em/$row->id/$id_patient/$id_user/$row->area/ni/$enviado_a")?>" style="cursor:pointer;color:black" class="btn-sm" ><i class="fa fa-print" style="font-size:20px;color:blue"></i></a>

       
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td> 



<td>
<?php if($row->id_user==$id_user  || $perfil=="Admin") {?>
<a title="Eliminar" style="cursor:pointer" class="delete-evaluacion-nota" id="<?=$row->id; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td>
</tr>

<?php
}
?>
</tbody>

</table>

<script>

$('[name=choose-this]').on('click', function() {
 $(".checked").removeClass("checked");
    if($(this).is(':checked')) {
        $(this).closest('.crimeOption').addClass('checked');
		 var response= $(this).closest('tr').find('.response').text();
		 var response_text= $(this).closest('tr').find('.response-text').text();
	     var val=$("input:radio[name=choose-this]:checked").val();
		$('.active-me').prop("disabled",false);
		 $("#show-selected").text(val);
		 $('#responder-text').val(response);
		 $('.text-response').text(response_text);
    }
});	

$(".delete-evaluacion-nota").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/deleteResponseInterconsulta')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
//newEvaNota();
 
}
});
}
})
</script>