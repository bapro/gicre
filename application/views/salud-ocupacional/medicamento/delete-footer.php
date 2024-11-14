<script>

$('.remove-med-pass-left').on('click', function(event) {
if (confirm('Lo quieres quitar ?'))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url: "<?php echo site_url('salud_ocupacional_med/removeMedPassLeft');?>",
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
passLeftMedData();
 
}
});
}
})
</script>