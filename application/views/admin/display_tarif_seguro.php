<?php foreach($results as $rw)
$seguro=$this->db->select('title,logo')->where('id_sm',$rw->id_seguro)
->get('seguro_medico')->row_array();


$categoria=$this->db->select('title_area')->where('id_ar',$rw->id_categoria)
->get('areas')->row('title_area');

 ?>

<div class="col-md-3" style="margin-top:30px">
<h5 style="color:green">Doctores</h5>
<?php
$i = 1;
$sql ="SELECT id_doct FROM tarif_seg_doc where id_cat='$rw->id_categoria'";
$query = $this->db->query($sql);

foreach($query->result() as $do)
{
$doctor=$this->db->select('first_name,exequatur,email')->where('id',$do->id_doct)
->get('doctors')->row_array();
?>

<p style='text-transform:uppercase;text-align:left;'><?=$i;$i++;?> -<a title="Exequatur : <?=$doctor['exequatur']?> - Email : <?=$doctor['email']?> " href="<?php echo base_url('admin/doctor/'.$do->id_doct)?>" > Dr <?=$doctor['first_name']?></a> </p>
<?php	
}
?>
</div>
<div class="col-md-9 table-responsive" style="border-left:1px solid #38a7bb">
<h4 style="color:green" ><?=$seguro['title']?> <img width="80" height="80" class="img-thumbnail" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $seguro['logo']; ?>"  /></h4>
 <hr id="hr_ad"/>
<h5 style="color:green"><?=$categoria?></h5>
<br/>
<table class="table table-striped table-bordered" id="example">
<thead>
<tr style="background:#38a7bb;color:white">
<th>CODIGO</th>
<th>SIMON</th>
<th>PROCEDIMIENTO</th>
<th>MONTO</th>
<th>Editar</th>
</tr>
</thead>
<tbody>
<?php
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
<td><?=$row->codigo?></td>
<td><?=$row->simon?></td>
<td><?=$row->procedimiento?></td>
<td><?=$row->monto?></td>
<td><a data-toggle="modal" data-target="#edit_tarifario" class="st" href="<?php echo base_url('admin/edit_tarifario/'.$row->id_tarif)?>" title="Editar un tarifario"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>

</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div class="modal fade" id="edit_tarifario" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
	
	
	    $('#edit_tarifario').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
} );
</script>