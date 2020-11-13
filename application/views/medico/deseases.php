
<!-- *** welcome message modal box *** -->
 
 
 <div class="container">


 <?php echo $this->session->flashdata('success_msg'); ?>


 <div class="row">
 <div class="col-md-12">
 <a href="#" class="btn btn-primary btn-xs st"  title="Crear nueva area" data-toggle="modal"   data-target="#NewDisease"  ><i class="fa fa-plus" aria-hidden="true"></i>Nueva Causa</a>
				
 </div>
</div>
 <hr id="hr_ad"/>
 

 <div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" style="margin:auto" width="70%" cellspacing="0">
    <thead>
    <tr style="background:#5957F7;color:white">
	   <th style="width:5px">Causas</th>
		 <th style="width:1px">Acciones</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($all_reasons as $all_a)
	 
	 {
		 $updated_time = date("d-m-Y H:i:s", strtotime($all_a->updated_time));			
	 ?>
        <tr id="<?=$all_a->id; ?>">
		<td>
		<span class="editSpan title-n"><?=$all_a->title?></span>
		 <input style="display: none;width:200px" class="editInput  form-control input-sm title" name="title"  type="text"   value="<?=$all_a->title?>"  />
		</td>
      <td>
		<div class="btn-group btn-group-sm">
		<button type="button" class="btn btn-sm btn-default editBtn " title="Ultimo cambio hecho &#10; por <?=$all_a->updated_by?> &#10; fecha  <?=$updated_time?>" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
		</div>
		<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
		<a class="st delete-deseases" id="<?=$all_a->id; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

		</td>
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>

</div>
<hr/>
 <div class="row">
 <div class="col-md-12">

 <a href="#" class="btn btn-primary btn-xs st"  title="Crear nueva area" data-toggle="modal"   data-target="#NewDisease"  ><i class="fa fa-plus" aria-hidden="true"></i>Nueva Causa</a>
				
 </div>
</div>
<br/>
</div>
</div>
 <?php 
 
 
        $this->load->view('footer');


 ?>
   </body>

<div class="modal fade" id="NewDisease" tabindex="-1" role="dialog" >
<div class="modal-dialog "  >

<div class="modal-content" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Nueva Causa </h4>

</div>

<div class="modal-body" style=" " >
<form method="post"  class="form-horizontal" action="<?php echo site_url('medico/save_disease');?>" >

<div class="form-group">
<label for="disease" class="control-label col-sm-2">Causa :</label>
<div class="col-sm-7">
<input type="text" class="form-control" id="disease" name="disease" placeholder="ingrese el nombre del disease" >
<span id="blanckd"></span><br/>
<span id="p1"></span>

</div>

</div>

<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<!--<button id="edit_area" class="btn btn-primary btn-xs"> Enviar</button>-->
<input id="save_disease" class="btn btn-primary btn-xs" type="submit"  value="Enviar" /> 

</div>
<br/>
</div>

</form>


</div>
</div>
</div>
</div>
        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
 <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script type="text/javascript"> 
//---------------------------------------------------------------------------------------
   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        $(this).closest("tr").find(".saveBtn").show();
		
		  $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
    });

//---------------------------------------------------------------------------------------
 
	$('.saveBtn').on('click',function(){
var updated_by ="<?=$name?>";
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();
//-------------------------------------------------------------------------------
  var title = $(this).closest("tr").find(".title").val();
  if(title=="" ){
	   alert("Todos los campos son requerido !")
   } else {
  $(this).closest("tr").find(".editBtn").show();
$(this).hide(); 
 $(this).closest("tr").find(".editBtn").show();  
   
   $(this).closest("tr").find(".editInput").hide(); 
   	  $(this).closest("tr").find(".editSpan").show();
	  
   //--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".title-n").text(title);

//---------------------------------------------------------------------------------

$.ajax({
type:'POST',
url: "<?=base_url('medico/edit_causa')?>",
dataType: "json",
data:'ida='+ID+'&'+inputData+"&updated_by="+updated_by,
cache: true,
success:function(data){

}
});
   }
});






$(".delete-deseases").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('medico/delete_causa')?>',
data: {id:del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
})
 </script>

</html>