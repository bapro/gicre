<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

<style>

td,th{text-align:center}

</style>
</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>
<body >
 <hr id="hr_ad"/>
  <div class="container">


 <?php echo $this->session->flashdata('success_msg'); ?>

 <div class="row">
 <div class="col-md-12">

 <a href="#" class="btn btn-primary btn-xs st"  title="Crear nueva area" data-toggle="modal"   data-target="#NewDisease"  ><i class="fa fa-plus" aria-hidden="true"></i>Nueva Causa</a>
				
 </div>
</div>
<br/><br/>
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
 $this->load->view('admin/modal');

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

<script type="text/javascript"> 
 $(document).ready( function() {
 $('#deletesuccess').delay(3000).fadeOut();
 });
 
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


//---------------------------------------------------------------------------------------
 
	$('.saveBtn').on('click',function(){
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
url: "<?=base_url('admin/edit_causa')?>",
dataType: "json",
data:'ida='+ID+'&'+inputData,
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
url:'<?=base_url('admin/delete_causa')?>',
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