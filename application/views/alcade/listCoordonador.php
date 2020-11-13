<!--<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">Listado De Los Coodinadores</h3>
 <a target="_blank" href="<?php echo base_url("alcalde/printListCoordonador")?>"  class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Ir a la pagina de Impresion</a>

</div>-->
<!--<div class="modal-body">
<div style="height:600px;overflow-y:auto">-->
<h3 class="h3 his_med_title">Listado De Los Coodinadores</h3>

 <a target="_blank" href="<?php echo base_url("alcalde/printListCoordonador")?>"  class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Ir a la pagina de Impresion</a>
<hr/>
<table id="example" class="table table-striped" >
<thead>
<tr style="background:#5957F7;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Telefonos</th>
<th>Mesa</th>
<th>Sector</th>
<th>Recinto</th>
</tr>
</thead>
<!--<tbody>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$sql="SELECT * FROM  soto_coordinador ORDER BY nombres DESC";
$query= $this->db->query($sql);
 foreach($query->result() as $row)
{
$vced1 = substr($row->cedula, 0, 3);
$vced2 = substr($row->cedula, 3, 7);
$vced3 = substr($row->cedula, -1);
?>
<tr>

<td>
 <?php
if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$vced1)
->where('SEQ_CED',$vced2)
->where('VER_CED',$vced3)
->get('fotos')->row('IMAGEN');
echo '<img style="display:inline-block; width:70%;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';

} 
else{

?>
<img  style="display:inline-block; width:70%;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
?>

</td>
<td><?=$row->nombres?></td>
<td><?=$row->cedula?></td>
<td><?=$row->telefono?></td>
<td><?=$row->mesa?></td>
<td><?=$row->sector?></td>
<td><?=$row->recinto?></td>
</tr>

<?php
}
?>
</tbody>-->    
</table>

<!--</div>
</div>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js "></script>
<script>
$("#cargando-list").text('');
$(document).ready(function(){
    $('#example').DataTable({
			 "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('alcalde/listCoord/'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});



/*
  $(document).ready(function(){
        $('#example').DataTable({
			 "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>alcalde/listCoord'
          },
          'columns': [
		     { data: 'photo' },
             { data: 'nombres' },
             { data: 'cedula' },
             { data: 'telefono' },
             { data: 'mesa' },
             { data: 'sector' },
			 { data: 'recinto' },
          ]
        });
     });

     $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );*/
</script>
