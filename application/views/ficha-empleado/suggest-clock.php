<style>
#list-data-available li {
	border-bottom:1px solid #eee;

text-align:left
}

#list-data-available{
	list-style-type: none;  background: #fff;
  border: 1px solid #eee; padding: 10px;
    font-size:17px;
	}

li.data-li:hover{
	background: #d9e7ff;
	cursor: pointer;
	font-style: italic;
	color:#070E21
	
}


</style>
<?php

if($query->result() !=NULL) {	
?>
<ul id="list-data-available">
<?php
foreach($query->result() as $row) {
if($origin==1 || $origin==2){
?>
<li class='data-li' onClick="selectThisClock<?=$origin?>('<?php echo $row->id; ?>');"><?php echo $row->national_id; ?> - <?php echo $row->employee_name; ?> - <?php echo $row->status; ?></li>
<?php 
} elseif($origin==3) {?>
<li class='data-li' onClick="<?=$onSelectedValue?>('<?php echo $row->filed_name; ?>');"><?php echo $row->filed_name; ?></li>	
<?php
}
}
 ?>
</ul>
<?php }  ?>

<script>

function <?=$onSelectedValue?>(val) {
$("#<?=$targetDiv?>-<?=$action?>").val(val);
$("#<?=$targetDiv?>-display-<?=$action?>").hide();
}

</script>

