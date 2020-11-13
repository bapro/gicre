
<div id="result_ver"></div>
<div class="container">
<div class="row">
<a href="<?php echo site_url("medico/create_cita");?>" class="btn btn-primary btn-xs">Nueva Paciente</a>
</div>
<hr id="hr_ad"/>

<div class="row"  id="dis" >
<div  style="overflow-x:auto;">
<div  class="patients_data"></div>
</div>
</div>
<div class="row">
<a href="<?php echo site_url("medico/create_cita");?>" class="btn btn-primary btn-xs">Nueva Paciente</a>
</div>
</div>
<br/><br/><br/>

</div>
<?php
$this->load->view('footer');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

<script>
patients_data();
function patients_data()
{
var medico_id="<?=$iduser?>";
$(".patients_data").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/patients_data",
method:"POST",
data:{medico_id:medico_id},
success:function(data){
$('.patients_data').html(data);
}
});
}
//--------------------------------------------------------------------


</script>
</html>