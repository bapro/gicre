<?php
if($query->num_rows() > 0 )
{?>
<table id="paginate-exeq" class="table table-striped"  style='width:100%'>
<thead>
<tr>
<th>Doctores</th>
<th>Exeq.</th>
</tr>
</thead>
<tbody>
<?php
foreach ($query->result() as $rf){	     
echo  "
<tr>
<td title='Crear usuario por $rf->name'>
 <input class='is-it-that' name='nombre-result' value='$rf->name' type='radio' required> $rf->name
</td>
<td>
$rf->exeq
</td>
</tr>";
}
;
?>

</tbody>
</table>

<?php
} 
?>

<script>


$(document).ready(function() {


$('#paginate-exeq').DataTable( {
        "language": {
           
			"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
			"sSearch": "Buscar",
			"lengthMenu":  "Mostrar _MENU_ registros",
			 "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       ">>",
        "previous":   "<<"
    },
        },

    } );
	
	
	
	$('#paginate-exeq').on('page.dt', function(){
        $(".is-it-that").prop("checked", false);
});
	
	
	
	
	
   } );	
</script>
