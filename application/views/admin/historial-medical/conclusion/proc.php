<?php if(!empty($val))  
{ ?>
<table class="table table-striped table-bordered exampleproc" >
 <thead>
<tr>
<th>Lista</th><th>Seleccione</th>


</tr>
 </thead>
 <tbody>
<?php
foreach($val as $row){
?>
<tr>
<td>
<?=$row->name;?>
</td>
<td>
<input type='checkbox' name='proc' class="check-proc" value="<?=$row->id?>"  />
</td>

</tr>
<?php
}
?>
</tbody>
</table>
<?php
} else {
?>
<span id="hide-agredo2">
<span style="font-size:10px;color:red">No hay agegalo</span>
<?=$value?> <input type='checkbox' name='proc' class="check-proc" value="<?=$value?>"  />
</span>
<?php
} 
?>
<script>
$(document).ready(function() {

    $('.exampleproc').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
} );





$('.check-proc').change(function() {
    if ($('.check-proc:checked').length) {
      $('#on_input_pro').val('');
	  $('#hide-agredo2').fadeOut("slow");
	    var proc_v="<?=$value?>";
		var id_pat2="<?=$id_pat?>"
      // $.post('<?=base_url('admin_medico/saveProc')?>', {proc_v:proc_v,id_pat2:id_pat2}, function(data){
      
      });
	 } else {
  
	}
});
</script>
