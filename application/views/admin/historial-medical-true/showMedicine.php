<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>

<h4 class="modal-title his_med_title">Medicamentos habituales del paciente</h4>
<span id="info_campo"></span>
</div>
<div  id="background_" >
<ol>
<?php
	foreach($patient_med as $row) {
?>
<li><?php echo $row->medicine; ?> </li>

<?php
	}
	?>
</ol>
</div>