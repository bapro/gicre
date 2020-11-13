<span style="color:green;" id="update_lab"><i><?=$num_count_lab?> datos</i></span>

<table  class="table table-striped table-bordered" style="background:white" cellspacing="0">
<thead>
    <tr>
	   <th style="width:1px"><strong>Fecha</strong></th>
        <th style="width:5px">Laboratorio</th>
		 <th style="width:5px">Medico</th>
		 <th style="width:5px">Eliminar</th> 
	 </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesLab as $row)
	 
	 {
	$lab=$this->db->select('name')->where('id',$row->laboratory)
  ->get('laboratories')->row('name');
	 ?>
        <tr>
		<td><?=$row->insert_time;?></td>
		<td><?=$lab;?></td>
		<td><?=$row->operator;?></td>
		<td> <a title="Eliminar laboratorio <?=$row->laboratory;?>" class="st deletelab" id="<?=$row->id_lab; ?>"  style="background:rgb(223,0,0);cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
		 </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
<script>
$(".deletelab").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteHistLab')?>',
data: {id : del_id},
success:function(response) {
$("#update_count").load(location.href + " #update_count>*", "");
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