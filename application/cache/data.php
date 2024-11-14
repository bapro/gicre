<div style="overflow-x:auto;">
<?php

if($table_name=="patients_folders"){
$link="downloadDoc";
}else{
$link="downloadDocEmp";	
}


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

<table class="table table-striped" style="width:100%;font-size:13px">
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
	
	if($row->file_ext=='pdf'){
$show_ac='<i class="fa fa-file-pdf-o" aria-hidden="true" style="color:red"></i>';
}elseif($row->file_ext=='docx'){
$show_ac='<i class="fa fa-file-word-o" aria-hidden="true"></i>';	
}elseif($row->file_type=='img'){
$show_ac='<i class="fa fa-picture-o" aria-hidden="true"></i>';
}
else{
$show_ac='<i class="fa fa-file-zip-o"></i>';
}

if($user_perfil=='Admin'){
	$method_name='admin';
}else{
$method_name='medico';
}	
?>
<tr  title="<?=$row->folder?>">
<td  style="width:60px">
<?php 

$image_type_check = @exif_imagetype($image_url);//Get image type + check if exists
if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
    echo "403/404/302/301<br>";
} else {
    echo "image exists<br>";
}


if($row->file_type=='img') {?>
<a oncontextmenu="return false" data-toggle="modal" title="Haga un click para agrandar <?=$row->folder?>" data-target="#zoomimagead" href="<?php echo base_url("patient/zoom_image_pat/$row->id")?>">
<img  style="width:100px" src="<?= base_url();?>/<?=$folder_name?><?=$row->folder?>"  />
</a>
<?php } else{ 
echo '<i class="fa fa-file" aria-hidden="true" ></i>'; 
 }?>
</td>
<td><em>...<?=substr($row->folder, -7);?></em> </td>

 <td><em><?=formatBytes($row->file_size)?></em><a href="<?=base_url ()?><?=$method_name?>/<?=$link?>/<?=$row->id?>" target ="_blank"   > <?=$show_ac;?> </a></td>
<td><em><?=date('d-m-Y H:i:s', strtotime($row->inserted_date))?></em></td>
<td>
  <?php if($from==1) {?>
  <i class="fa fa-remove remove-doc" id="<?=$row->id?>" title="eliminar este archivo" style='color:red;cursor:pointer;'></i>
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


<div class="modal fade" id="zoomimagead"  role="dialog" oncontextmenu="return false">
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<script>

 $('#zoomimagead').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
 //location.reload();
});
$(".remove-doc").on('click', function(e){ 
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:"<?php echo base_url(); ?>patient/delPatDoc",
data: {id : del_id, table_name:"<?=$table_name?>", folder_name:"<?=$folder_name?>", id_patient:<?=$id_patient?>},
success:function(data) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
$("#count-files").text(data);
});
},
});
}
})

</script>