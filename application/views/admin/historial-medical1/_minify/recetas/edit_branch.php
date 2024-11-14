<?php
	foreach($branches as $row) {
		
		if($id==$row->drug_store_id){
		        $selected="selected";
		} else {
		       $selected="";
	    }
		
?>
<option value="<?php echo $row->id; ?>" <?=$selected?>><?php echo $row->branch_name; ?> </option>
<?php
	}