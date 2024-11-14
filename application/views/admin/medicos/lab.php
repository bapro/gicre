<div class="container">
  <div id='show-error'></div>
<div class="col-md-12">
 <div class="col-md-3" >
  <h3>Grupos (<?=$totallab?>)</h3>
   <div  style="overflow-x:auto;max-height:80vh;">
 <table class="table">
 <tbody>

 <div id='list-group'></div>

 </tbody>
 </table>
 </div>
 </div>
 <div class="col-md-9" >
  <h3><button id='listar-todos' type='button' class='btn btn-default btn-xs'>Listar Todos</button> Laboratorios</h3>
   <div  style="overflow-x:auto;">
   
<div id='list-lab'></div>
</div>
</div>
</div>
<br/>
</div>

</div>
 <?php 
 
 $this->load->view('footer');
?>



        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url();?>assets_new/js/main.js"></script>

<script type="text/javascript"> 
$(document).ready( function() {

function listgroup(){
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/listarGroupLab')?>",
data: {},
success:function(data){
$('#list-group').html(data);

},


});	
	
}

listgroup();

function listarLab(){
	$("#list-lab").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

	$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/listarLab')?>",
data: {id_user:<?=$medico_id?>},
success:function(data){
$('#list-lab').html(data);

},


});	
	
}



$("#listar-todos").click(function(){
	listarLab();
	})
listarLab();


})


	


 </script>

</html>