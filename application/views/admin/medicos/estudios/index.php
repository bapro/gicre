<div class="container">
  <div id='show-error'></div>
<div class="col-md-12">
 <div class="col-md-3" >
  <h3>Grupos</h3>
   <div  style="overflow-x:auto;max-height:80vh;">
 <table class="table">
 <tbody>

 <div id='list-group'></div>

 </tbody>
 </table>
 </div>
 </div>
 <div class="col-md-8" >
  <h3><button id='listar-todos' type='button' class='btn btn-default btn-xs'>Listar Todos</button> Estudios</h3>
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
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript"> 
$(document).ready( function() {



function listgroup(){
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/listarGroupRect')?>",
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
url: "<?=base_url('admin_medico/Listestudios')?>",
success:function(data){
$('#list-lab').html(data);

},



});	
	
}

listarLab();
})


$("#listar-todos").click(function(){
	
	listarLab();
	})
	


 </script>

</html>