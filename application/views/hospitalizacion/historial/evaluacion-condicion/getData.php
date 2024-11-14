<div id="getEvaCon" style=''></div>

<script>

getConEg();
function getConEg()
{
$('#getEvaCon').html('cargando...').css('text-align','center');
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/dataEvCon",
data: {historial_id:<?=$id_historial?>,user_id:<?=$user_id?>,id:<?=$id?>,id_hosp:<?=$id_hosp?>},
method:"POST",
success:function(data){
$('#getEvaCon').html(data);
}
});
}
</script>