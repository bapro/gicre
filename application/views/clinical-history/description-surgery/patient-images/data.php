<div style="overflow-x:auto;">
<?php

function formatBytes($bytes) {
    if ($bytes > 0) {
        $i = floor(log($bytes) / log(1024));
        $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        return sprintf('%.02F', round($bytes / pow(1024, $i),1)) * 1 . ' ' . @$sizes[$i];
    } else {
        return 0;
    }
}




if($query->result() ==NULL){
	echo "<em>No hay documento.</em>";
}else{
?>

<table class="table table-striped" style="width:100%;font-size:13px" id="folders-table-dq">
  <thead>
    <tr>
      <th></th>
	   <th></th>
		<th></th>
	  <th><em>Tiempo Creado</em></th>
      <th><em>Quitar</em></th>
    </tr>
  </thead>
 <tbody>
<?php
$i=1;
foreach($query->result() as $row){
?>
<tr>
<td  style="width:60px ">
<?php 
$extension =pathinfo($row->folder, PATHINFO_EXTENSION);
$imgExtArr = ['jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG'];
if(in_array($extension, $imgExtArr)){?>
 <!--<a oncontextmenu="return false" href="#" data-id="<?=$row->id?>" data-bs-target="#largeModalImageDq"   data-bs-toggle="modal" >-->
 
 <a href="<?php echo site_url("description_surgery/show_patient_image/$row->id"); ?>" target="_blank" >
 <?php  echo'<img style="width:100px" class="zoom" src="'.base_url().'/assets_new/img/description-surgery/'.$row->folder.'"  />';
  ?>
</a>
<?php } else{ ?>
 <i class="fa fa-file"></i> 
<?php }?>
</td>
<td title="<?=$row->folder?>"><em>...<?=substr($row->folder, -7);?></em> </td>

 <td><em><?=formatBytes($row->file_size)?></em><a href="<?=base_url ()?>description_surgery/downloadDocDescQ/<?=$row->id?>" style="position:absolute;float:left" title="descargar" ><i class="fa fa-download"  ></i> </a></td>
<td style="width:160px"><em><?=date('d-m-Y H:i:s', strtotime($row->inserted_date))?></em></td>
<td>
  <?php 
 
  if($row->inserted_by==$this->session->userdata('user_id')) {?>
 
  <button type="button" class="btn btn-outline-danger btn-sm remove-dq-file" id="<?=$row->id?>"><i class="bi bi-trash3-fill"></i></button>

  <?php }?>
 </td>

</tr>

<?php
}
?>
 </tbody>
</table>
<?php
}
?>
</div>



<script>


	$('#folders-table-dq').DataTable({
   
           order: [[0, 'desc']],
		   	   	   	"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },
          });



$(".remove-dq-file").on('click', function(e){ 
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:"<?php echo base_url(); ?>description_surgery/delPatDoc",
data: {id : del_id},
success:function(data) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
//$("#count-files").text(data);
});
},
});
}
})

</script>