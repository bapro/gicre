<table class="table table-striped" >
<thead>
<th>NOMBRES</th>
    <th>TELEFONO</th>
    <th>CENTRO</th>
</thead>
<tbody>
<?php
foreach($result as $r) { ?>
<tr>
<td><?=$r->name?></td>
<td><?=$r->cell_phone?></td>
<td></td>
</tr>
<?php } ?>
</tbody>
 
</table>