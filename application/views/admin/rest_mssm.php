<table class="table table-striped  tabinp">
<tr><th>SIN SEGURO</th>
<th>Codigo contratado</th>
<th class="inputh"> Precio</th>
</tr>
<?php 

foreach($all_seguro_medico as $row)
{ 
?>
<tr>
<td><label><?=$row->title?></label> <label class="seguro" hidden><?=$row->id_sm?></label></td>
<td class="input codigo" contenteditable='true'></td>
<td contenteditable='true' class="input precio" onkeydown='return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46 || event.which == 190 '></td>
</tr>
<?php
}
?>
</table>


