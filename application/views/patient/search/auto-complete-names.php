   <div class="col-4">
<input type="text" class="form-control" />
</div>
<?php

if ($query->result() != NULL) {
?>

	<ul id="list-data-available" class="list-group" style="position:absolute;z-index:1000">
		<?php
		foreach ($query->result() as $row) {

		?>
			<li class='data-li list-group-item text-mute' onClick="selectThisValueNames('<?=$row->nombres?> <?=$row->apellido1?>  <?=$row->apellido2?>');"><?=$row->nombres?> <?=$row->apellido1?>  <?=$row->apellido2?></li>
		<?php
		}
		?>
	</ul>
<?php 
}
  ?>

<script>
function selectThisValueNames(thisVal) {
		$('#search-resut-nombres-padron').hide();

	$('#patient-nombres').val(thisVal);	
	
	}
</script>