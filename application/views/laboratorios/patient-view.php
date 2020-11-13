<body>
<br/>
<div class="container"  >
<div class="col-md-12" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb"> 

<p><strong> <img style="width:120px" src="<?= base_url();?>assets/img/gicle1.png" alt="Admedicall">BUSCAR RECETA</strong></p>
<hr id="hr_ad"/>
<div class="col-md-6">

<div class="input-group">
    <span class="input-group-addon">codigo</span>
  <input  id='search-codigo'  class="form-control" >
  <span class="input-group-addon"><button id="btn-record" type='button'><i class="fa fa-search"></i></button></span>
</div>
</div>


<br/><br/><br/><br/>



 </div><!--row background_ end -->
 </div>
 </div><!--container-->


	</body>
 <br/><br/>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>


$('#btn-record').on('click', function() {
var code=$("#search-codigo").val();

$("#patientdata").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(code == "") {
$( "#patientdata" ).hide();

}else {
window.location ="<?php echo base_url(); ?>printings/search_code1?code="+code; 	

}
});
</script>

	</html>