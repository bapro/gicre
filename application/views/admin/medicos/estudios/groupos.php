<?php
foreach ($query->result() as $row){
	echo "<tr>
	<td style='padding: 0.5em;text-align:right;border-bottom:1px solid #DCDCDC;font-size:13px' >
	<a  style='cursor:pointer' class='see-me' id='".$row->groupo."'>$row->groupo</a>
	<a class='st delete-groupo' id='".$row->groupo."' style='color:red;background:white;'  title='Eliminar el groupo'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
   
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
url:'<?=base_url('admin_medico/groupDetailedEst')?>',
data: {groupo : groupo},
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
url:'<?=base_url('admin_medico/deleteGroupoEst')?>',
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