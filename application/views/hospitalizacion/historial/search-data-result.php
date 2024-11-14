<?php if(!empty($result)) { ?>
<ul id="country-list"  style="list-style: none">

<?php foreach ($result->result() as $row){?>
<li style="cursor:pointer" onClick="selectCountry('<?php echo $row->nombre; ?>')"><?php echo $row->nombre; ?> </li>
<?php } ?>
 </ul>
<?php }?>

<script>

function selectCountry(val) {
$("#<?=$signo_id?>searchNombreNotaEd").val(val);
$("#suggesstion-box-").hide();
}

</script>

