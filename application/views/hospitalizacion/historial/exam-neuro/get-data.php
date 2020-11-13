
<div id="getExamNeuro" style=''></div>

<script>

getExamNeuro();
function getExamNeuro()
{
$('#getExamNeuro').html('cargando...').css('text-align','center');
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/data_exam_neuro",
data: {historial_id:<?=$id_historial?>,user_id:<?=$user_id?>,id:<?=$id?>},
method:"POST",
success:function(data){
$('#getExamNeuro').html(data);
}
});
}
</script>