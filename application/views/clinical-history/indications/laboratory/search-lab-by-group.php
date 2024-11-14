
<?php

if($query->result() !=NULL) {	
?>
<ul id="list-data-available" class="list-data-available  list-group list-group-flush" style="position:absolute;z-index:1000">
<?php
foreach($query->result() as $row) {

?>
<li class='data-li list-group-item text-mute ' onClick="selectThisValue('<?php echo $row->groupo; ?>');"><?php echo $row->groupo; ?></li>
<?php
}
 ?>
</ul>
<?php }  ?>
<script>

function selectThisValue(selected) {
    $("#suggestion-grup-lab-list").hide();
    $("#suggestion-grup-lab-list-selected").show();
	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>h_c_indication_lab/labGroupResult",
data:{groupo: selected},

success: function(data){
$("#suggestion-grup-lab-list-selected").html(data);

},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

        $("#suggestion-grup-lab-list-selected").html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
});
}

</script>



