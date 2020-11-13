<style>
th,td{text-align:left}
#message::-webkit-input-placeholder {
  color: transparent;
  background-position: 0 50%;
   background-size: 10px 10px;
  text-indent: -9999px;
  background-image: url("../assets/img/pen.gif");
 
  background-repeat: no-repeat; 
}
#message::-moz-placeholder {
  /* Firefox 19+ */
  color: transparent;
  background-position: 0 50%;
   background-size: 40px 40px;
  text-indent: -9999px;
  background-image: url("../assets/img/pen.gif");
 
  background-repeat: no-repeat; 
}
#message:-moz-placeholder {
  /* Firefox 18- */
  color: transparent;
  text-indent: -9999px;
  background-image: url("../assets/img/pen.gif");
 
  background-repeat: no-repeat; 
}
#message:-ms-input-placeholder {
  /* IE 10- */
  color: transparent;
  text-indent: -9999px;
  background-image: url("../assets/img/pen.gif");
  
  background-repeat: no-repeat; 
}
span.test {
    width: 20em; 
   /* border: 1px solid #000000;*/
   
	margin-left:10px;
	
}
</style>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>

</button>
<?php if (empty($relatedDoctor))
{
echo"<div class='alert alert-warning'> No hay Centros medicos relacionados con <span style='font-weight:bold'>$area</span> . </div>";
?>
<a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/CreateDoctor');?>"><i class="fa fa-plus" aria-hidden="true"></i>Nuevo Doctor</a>
<?php
}
else{	
?>
<h4 class="modal-title">Doctores relacionados con <span style="color:green"><?=$area?></span>  </h4>

</div>

 <div  style="overflow-x:auto;">
<table id="example"  class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
	
    <tr style="background:#38a7bb;color:white">
	   <th class="col-xs-5">Nombre</th>
       <th class="col-xs-2" >Telefono</th>
		<th class="col-xs-3" >Correo Electronico</th>
		<th class="col-xs-1" >Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($relatedDoctor as $all_m_c)
	 
	 {
	 ?>
        <tr>
		
            <td><?=$all_m_c->first_name;?> <?=$all_m_c->last_name;?></td>
            <td><?=$all_m_c->cell_phone;?></td>
           <td><?=$all_m_c->email;?></td>
			<td style="text-align:left">
			<a href="<?php echo base_url('admin/CentroMedico/'.$all_m_c->id)?>" class="st"><i class="fa fa-eye" aria-hidden="true" title="Editar" ></i></a>
          	<a title="Eliminar" onclick="return confirm('¿ estás seguro de eliminar ?')" href="<?php echo base_url('admin/DeleteCentroMedico/'.$all_m_c->id)?>" class="st" style="background:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
			
			</td>
        </tr>
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>


<br/>
<button title="Ocultar" style="background:white;color:black;width:30%" type="button" id="bt" class="btn btn-primary btn-xs reveal">Ocultar mensajes</button>
<br/><br/>
<div  id="new_message"></div>
<div id="Ocultar" class="hide_message" style="margin-left:10px; background:#E7FEE9;">

		<!-- <a title="Eliminar" id="<?=$mes->idsm; ?>"  class="delete" style="background:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>-->
		 <table class="table table-striped table-bordered">

	<?php foreach($messages as $mes)
	 
	 {
		 $mesa=$mes->message;
		 ?>
        <tr>
          <th><?=wordwrap($mesa,10,"\n", 1)?></th>
     
           <td><?= $mes->insert_time?> <a title="Eliminar" id="<?=$mes->idsm; ?>"  class="delete" style="color:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true" ></i></a></td>
	  </tr>
	  	<?php	
	 }
	 ?>
	   </table>
	 
	 </div>
<form   class="form-horizontal" id="form_message" method="post" style="background:#E7FEE9;"  > 

<div style="margin-left:10px">
<div class="form-group ">
<input type="hidden" name="idarea" id="idarea" value="<?=$idarea?>"/>
<div class="col-sm-8">
<h5 class="h5">Enviar mensaje a los doctores de la area : <?=$area?></h5>
<p style="color:red"  id="errorBox"></p>
<textarea class="form-control" name="message" id="message" style="border:1px solid #38a7bb"  placeholder="Ingresa..." ></textarea>
</div>
</div>
     <button type="submit" id="send"  class="btn btn-primary">Enviar</button>

<br/>
</div>
<br/>
</form>
<br/>


 <?php
	 }
	 ?>
	
<script>
$(document).ready(function() {
$('#send').click(function(e) {
 var message = $("#message").val();
 
  if($("#message").val() == "" ){
   $("#message").focus();
   $('#message').css('border-color', 'red'); 
   $("#errorBox").html("Ingrese el mensaje.");
   return false;
  }
  });
  
   $('#message').keyup(function() {

                var input = $(this);
                  
                if( input.val() != "" ) {
					   $("#errorBox").hide();
                  input.css( "border", "1px solid #38a7bb" );
				   
                } 
               else	{
				   $("#errorBox").show();
				   input.css('border-color', 'red' );
			   }			
            });
});

//insert message

//hide

$(document).ready(function(){
  $('#bt').click(function(){
   id = $(this).attr('title');
   txt = $(this).text();
   if (txt == 'Ocultar mensajes'){
  
     $(this).text('Mostrar mensajes');
	
   }
   else{
      $(this).text('Ocultar mensajes');
	  
   };
   $("#"+id).toggle("fast");
   

  })

});
 $("#bt").submit(function(e){
        e.preventDefault();
    });
	
	
	//---------------------------------
	$(function() {
	
	$("#form_message").on('submit', function (e) {
    e.preventDefault();
	 var idarea=$("#idarea").val();
	var message=$("#message").val();
    $.ajax({
		url: '<?php echo site_url('admin/SaveMessage');?>',
        type: 'post',
        
		data: {idarea:idarea,message:message},
        success: function (data) {
			$(".hide_message").hide(); 
              		 $("#new_message").html(data);
					 $('#form_message')[0].reset();
         }
		
    });
});
});

//delete message
$(function() {
$(".delete").click(function(e){
	e.preventDefault();
	if (confirm("Estás seguro de eliminar ?"))
			{ 
		
		var el = this;
   var del_id = $(this).attr('id');
    $.ajax({
            type:'POST',
            url:'<?=base_url('admin/DeleteMessage')?>',
            data: {id : del_id},
            success:function(data) {
		 // Removing row from HTML Table
    $(el).closest('tr').css('background','tomato');
    $(el).closest('tr').fadeOut(800, function(){ 
     $(this).remove();
    });
          
                  
            }
    });
 };
 });
  })
</script>