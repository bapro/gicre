<?php

if ($query->result() != NULL) {
	if($seguro_id==11){
?>

<ul id="list-data-available" class="list-group list-group-flush" style="position:absolute;z-index:1000">
		<?php
		foreach ($query->result() as $row) {
       $centro_name=$this->db->select('name')->where('id_m_c',$row->id_centro)->get('medical_centers')->row('name');
		?>
			<li class='data-li list-group-item text-mute' onClick="selectThisValue('<?php echo $row->id_centro; ?>-<?php echo $centro_name; ?>');"><?php echo $centro_name; ?></li>
		<?php
		}
		?>
	</ul>

	<?php } else {?>
	<ul id="list-data-available" class="list-group list-group-flush" style="position:absolute;z-index:1000">
		<?php
		foreach ($query->result() as $row) {

		?>
			<li class='data-li list-group-item text-mute' onClick="selectThisValue('<?php echo $row->id; ?>-<?php echo $row->name; ?>');"><?php echo $row->name; ?></li>
		<?php
		}
		?>
	</ul>
<?php 
}
}  ?>
<script>
let incrC=0;
	function selectThisValue(thisVal) {
		$('#suggestion-planCentro-list').hide();
 const regex = /[0-9/ /]/g;
  const nums = thisVal.match(regex);
  const id = nums.join("");
  const text = thisVal.slice(thisVal.indexOf('-') + 1);
	$('#plan_id').val(id);
	$('#plan_or_centro_id').val(text);	
	
	}
</script>