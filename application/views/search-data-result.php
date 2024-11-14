<?php if(!empty($result)) { ?>
<ul id="country-list"  style="list-style: none;border:1px solid">

<?php foreach ($result->result() as $row){?>
<li style="cursor:pointer" onClick="selectNumFac('<?php echo $row->numfac; ?>')"><?php echo $row->numfac; ?> </li>
<?php } ?>
 </ul>
<?php }?>

<script>

function selectNumFac(val) {
$("#numFac").val(val);
$("#suggesstion-box").hide();
}

</script>

