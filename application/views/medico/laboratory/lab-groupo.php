
<?php

foreach ($query->result() as $row){
	if($id_user==-1){
	$qu_g=$this->clinical_history->select('*')->where('groupo',"$row->groupo")->where('rmvd',0)->get('h_c_groupo_lab');	
	}else{
	$qu_g=$this->clinical_history->select('*')->where('groupo',"$row->groupo")->where('rmvd',0)->where('id_doc',$id_user)->get('h_c_groupo_lab');		
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
$("#list-lab").addClass("spinner-border").html("<span class='sr-only'>cargando...</span>");	
$.ajax({
type:'POST',
url:'<?=base_url('medico_laboratory/groupDetailedLab')?>',
data: {groupo:groupo},
success:function(data) {
$('#list-lab').removeClass("spinner-border").html(data);

},


});	
}


//------------------------------------------------------------------------------------------------

$(".delete-groupo").click(function(){
	alert(1);


})
 </script>