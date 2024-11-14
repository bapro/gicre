<?php

if ($query->result() != NULL) {
?>
	<ul id="list-data-available" class="list-group list-group-flush" style="position:absolute;z-index:1000">
		<?php
		foreach ($query->result() as $row) {

		?>
			<li class='data-li list-group-item text-mute <?php echo $row->idd; ?>' onClick="selectThisCie10('<?php echo $row->idd; ?>-<?php echo $row->code; ?>-<?php echo $row->description; ?>');"><?php echo $row->code; ?>-<?php echo $row->description; ?></li>
		<?php
		}
		?>
	</ul>
	<script>
	$('.show-con-ot').slideUp();
	$('.info-when-ce10-not-found').slideUp().text('');
	</script>
<?php } else { ?>
	<script>
		$("#search-cie10").css("background", "");
		$('.show-con-ot').slideDown();
		$('.info-when-ce10-not-found').slideDown().text("Haga clic para agregar CIE10 no encontrado");
		//$('.floatingDiagOtros').val($('.floatingDiagOtros').val() + "<?= $keyword ?>" + ', \n');
	</script>
<?php } ?>
<script>
var incrC=0;
	function selectThisCie10(cie10val) {
 const regex = /[0-9/ /]/g;
  const nums = cie10val.match(regex);
  //const cie10Id = nums.join("");
  const cie10Id = cie10val.substring(0, cie10val.indexOf('-'));
  const cie10Text = cie10val.slice(cie10val.indexOf('-') + 1);
  incrC ++ ;
	$('.floatingDiagPrDef').val($('.floatingDiagPrDef').val() + '-'+ cie10Text + ', \n')
		$("#cie10-results").hide();
		$("#search-cie10").css("background", "");
		$("#search-cie10").val("");
		
		
		 var html = '';
        html += '<input type="hidden"  value="'+cie10Id+'" class="cie10Id" id="cie10Id" >';
    $('#list-of-cie10').append(html);
		
		
		
	}
</script>