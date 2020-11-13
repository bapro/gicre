<br/>
<?php 

 foreach ($data_result->result() as $row)
?>

<table style="width:100%;font-size:13px;" >

<tr >
<td><strong>I- Antecedentes Familiares </strong><br/><br/><?=nl2br($row->ant_fam)?></td>
</tr>

<tr >
<td><strong>II- Antecedentes Prenatales </strong><br/><br/><?=nl2br($row->ant_prenatales)?></td>
</tr>

<tr >
<td><strong>III- Factores De Ambiente </strong><br/><br/><?=nl2br($row->factories_ambiente)?></td>
</tr>


</table>
</html>