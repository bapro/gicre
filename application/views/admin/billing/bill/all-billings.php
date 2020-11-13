<style>
tr:nth-child(even){background-color: #E0E5E6}
td{text-align:left}
</style>

<div class="container">
<div class="row">
<div class="col-md-12">

<a href="<?php echo base_url("$controller/billing_medicos")?>" class="btn btn-primary btn-xs st"     ><i class="fa fa-plus" aria-hidden="true"></i>Crear Factura  </a>
<hr id="hr_ad"/>
</div>
</div>
<div class="row">
<div class="col-md-10">
<h3>Lista de las facturas</h3>
</div>

<!--
<div class="col-md-1 text-right">

<?php //$this->load->view('admin/view_acciones');?>

</div>-->
</div>
<hr id="hr_ad"/>

</div>
<div class="row">

<div class="col-md-12">

<?php echo $this->session->flashdata('success_msg'); ?>
</div>
</div>
<div class="container" style="overflow-x:auto;">
<div class="bills"></div>
<hr id="hr_ad"/>
<div class="row">
<div class="col-md-12">

<a href="<?php echo base_url("$controller/billing_medicos")?>" class="btn btn-primary btn-xs st"   ><i class="fa fa-plus" aria-hidden="true"></i>Crear Factura</a>
</div>
</div>

</div>
</div>
<br/><br/>
<?php
$this->load->view('footer');
?>
</body>


<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

<script src="<?=base_url();?>assets/js/custom.js"></script> 

<script>
bills();
function bills()
{
$(".bills").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var user_id ="<?=$user_id?>";
var controller ="<?=$controller?>";
$.ajax({
method:"POST",
url: "<?=base_url('admin_medico/bills_data')?>",
data: {user_id:user_id,controller:controller},
success:function(data){
$('.bills').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.bills').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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
</html>



