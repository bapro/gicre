
<div id="getConEg" style=''></div>

<script>

getConEg();
function getConEg()
{
$('#getConEg').html('cargando...').css('text-align','center');
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/dataConEg",
data: {historial_id:<?=$id_historial?>,user_id:<?=$user_id?>,id:<?=$id?>,id_hosp:<?=$id_hosp?>},
method:"POST",
success:function(data){
$('#getConEg').html(data);
}
});
}
</script>