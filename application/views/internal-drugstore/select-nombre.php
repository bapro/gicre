<?php if(!empty($result)) { ?>
<ul id="country-list"  style="list-style: none">

<?php foreach ($result->result() as $row){?>
<li style="cursor:pointer" onClick='searchBynec(<?php echo $row->id_p_a; ?>)'><?php echo $row->nombre; ?> </li>
<?php } ?>
 </ul>
<?php }?>

<script>

function selectThisName(nombre, id) {
	alert( $(this).text());
$("#<?=$signo_id?>searchNombreNotaEd").val(nombre);
$("#suggesstion-box-").hide();
if(<?=$signo_id?>==10){
searchBynec(id);	
}
}

</script>