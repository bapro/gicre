<?php
	 $sql = "select * from  hosp_orden_medcia_lab where id_sala=$idsala order by id_lab desc";
	$data3= $this->db->query($sql);
if($data3->result() !=NULL){
?>
<table  class="table table-striped"  style="background:white" cellspacing="0">
<thead>
    <tr style="background:#428bca;">
	   <th style="width:1px;color:white"><strong>Fecha</strong></th>
        <th style="width:5px;color:white">Laboratorio</th>
		 <th style="width:5px;color:white">Operator</th>
		 <th style="width:5px;color:white">Elim.</th>
	 </tr>
    </thead>
    <tbody>
    <?php
    $cpt="";
	foreach($data3->result() as $row)

	 {
	$op3=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');

    $lab=$this->db->select('sub_groupo')->where('id_c_taf',$row->laboratory)
  ->get('centros_tarifarios')->row('sub_groupo');

  $insert_time = date("d-m-Y H:i:s", strtotime($row->insert_time));
  if ( $cpt==0 ) {
	 	$cpt=1;
		$colorBg = "#E0E5E6";
		}
		else {
		$cpt=0;
		$colorBg = "#E0E5E6";
		}
		if($row->printing==1){$checked="checked";}else{$checked="";}
	 ?>
        <tr bgcolor="<?=$colorBg ;?>" >
		<td><?=$insert_time;?></td>
		<td><?=$lab;?></td>
		<td><?=$op3;?></td>
		<td>
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
		<a title="Eliminar laboratorio <?=$row->laboratory;?>" class="deletelabom" id="<?=$row->id_lab; ?>"  style="color:red;cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>

		 </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
 <?php
	 }
else{
       echo "<span style='color:red'>no hay</span>";
     }
	 ?>
	 <script>
	 $(".deletelabom").click(function(){
if (confirm("Sure to delete ?"))
{
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('hospitalizacion/deleteLabsOM')?>',
data: {id : del_id},
success:function(response) {
//update_lab.text($('#myTable tbody tr').length)),
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){
$(this).remove();
});

}
});
}
})
	 </script>
