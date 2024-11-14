<?php
echo '<option value="" ></option>';
foreach ($query->result() as $row){
echo '<option value="'.$row->groupo.'">'.$row->groupo.'</option>';

}?>
 <script>
 $("#list-group").change(function(){

loadGroupo($(this).val());
});


function loadGroupo(groupo){
$("#allLaboratoriosInd").show();
 $("#allLaboratoriosInd").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type:'POST',
url:'<?=base_url('saveHistorial/groupDetailedLabHist')?>',
data: {groupo : groupo,historial_id:<?=$id_historial?>,operator:<?=$operator?>,user_id:<?=$user_id?>,emergency_id:<?=$emergency_id?>,hist:<?=$hist?>,centro_medico:<?=$centro_medico?>},
success:function(data) {
$('#allLaboratoriosInd').html(data);

},


});	
}


 </script>