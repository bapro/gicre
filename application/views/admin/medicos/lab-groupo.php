<?php

foreach ($query->result() as $row){
	if($id_user==-1){
	$qu_g=$this->db->select('*')->where('groupo',"$row->groupo")->where('rmvd',0)->get('h_c_groupo_lab');	
	}else{
	$qu_g=$this->db->select('*')->where('groupo',"$row->groupo")->where('rmvd',0)->where('id_doc',$id_user)->get('h_c_groupo_lab');		
	}
	$countg=$qu_g->num_rows();
	echo "<tr>
	<td style='padding: 0.5em;text-align:right;border-bottom:1px solid #DCDCDC;font-size:13px' >
	<a  style='cursor:pointer' class='see-me' id='".$row->groupo."'>$row->groupo ($countg)</a>
	<a class='st delete-groupo' id='".$row->groupo."' style='color:red;background:white;font-size:12px;cursor:pointer'  title='Eliminar el groupo'><i class='fa fa-trash-o'  aria-hidden='true'></i></a>
   </td>
	</tr>";
 }?>
 <script>
 $(".see-me").click(function(){

var groupo = $(this).attr('id');
loadGroupo(groupo);

});


function loadGroupo(groupo){
$("#list-lab").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');	
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/groupDetailedLab')?>',
data: {groupo:groupo,id_user:<?=$id_user?>},
success:function(data) {
$('#list-lab').html(data);

},


});	
}


//------------------------------------------------------------------------------------------------

$(".delete-groupo").click(function(){
if (confirm("Estás seguro de borrar ?"))
{
var el = this;
var groupo = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deleteGroupo')?>',
data: {groupo : groupo},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){
$(this).remove();
});
listarLab();
},


});
}

})
 </script>