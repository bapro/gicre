<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>

<h4 class="modal-title his_med_title">Alergicos</h4>
<span id="info_campo"></span>
</div>
<div  id="background_" >
<ol>
<?php
	foreach($patient_alergicos as $row) 
?>
<li>ALIMENTOS : <span style="color:red"><?php echo $row->alimentos; ?></span> </li>
<li>MEDICAMENTOS :<span style="color:red"> <?php echo $row->medicamentos; ?></span> </li>
<li>OTROS : <span style="color:red"><?php echo $row->otros;?></span> </li>

</ol>
</div>