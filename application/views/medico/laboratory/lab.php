<section class="py-3">
<div class="container">
  <div id='show-error'></div>

   <div class="row g-2">
     <p class="text-info">LISTADO DE LABORATORIOS AGRUPADOS</p>
 <div class="col-md-3" >

   <div  style="overflow-x:auto;">
 <table class="table table-sm w-25">
 <tbody>

 <div id='list-group'></div>

 </tbody>
 </table>
 </div>
</div>
 <div class="col-md-9" >
  <h3><button id='listar-todos' type='button' class='btn btn-primary btn-sm'>Listar Todos</button></h3>
	<select  class="form-control select2-lab"   id='nuevo-groupo' style='width:100%' <?=$show_select?>>
<option value=''>Grupos (<?=$totallab?>)</option>

	<?php 
	
	 foreach ($querygl->result() as $row){
	echo "<option value='".$row->groupo."'>$row->groupo</option>
	";
     }
	?>
   </select>
   <br/>
   <div  style="overflow-x:auto;">
   
<div id='list-lab'></div>
</div>
</div>
</div>
<br/>

</div>
  </section>




        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->



<script type="text/javascript"> 
$(document).ready( function() {

function listgroup(){
$("#list-group").addClass("spinner-border").html("<span class='sr-only'>cargando...</span>");
$.ajax({
type: "POST",
url: "<?=base_url('medico_laboratory/listarGroupLab')?>",
data: {},
success:function(data){
$('#list-group').removeClass("spinner-border").html(data);

},


});	
	
}

listgroup();

function listarLab(){
	$("#list-lab").addClass("spinner-border").html("<span class='sr-only'>cargando...</span>");

	$.ajax({
type: "POST",
url: "<?=base_url('medico_laboratory/listarLab')?>",
data: {},
success:function(data){
$('#list-lab').removeClass("spinner-border").html(data);

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