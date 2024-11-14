 <section class="py-3">
        <div class="container d-flex align-items-center justify-content-center">
		 <div class="col-lg-9">
		 	<div class="pagetitle">
						<h1>Tarifarios</h1>
						<nav>
						<ol class="breadcrumb">

						<li class="breadcrumb-item active"><a href="<?php echo site_url("$controller/tariffs");?>">Buscar</a></li>
						</ol>
						</nav>
						</div>
            <div class="card bg-light">
                <div class="card-body">
				<div id="show-error"></div>
                    <div class="row g-2 align-items-center">
                        
                       
                            <h3 class="text-primary text-center text-md-start">IMPORTACION DE TARIFARIOS</h3>
                            <div class="bg-th p-4 my-1">
                                El archivo excel debe tener los siguientes
                                columnas:
                                codigo, simon, categoria, procedimiento, monto
                            </div>
                        
                  
			
			  
			     <form class="row g-3" method="post"  id="import_form_centro"  enctype="multipart/form-data">
				 
                <div class="col-md-9">
                   <input  class="form-control form-control-sm"  type="file" name="file" class="file required" required id="file">
                </div>
                <div class="col-md-3">
				<div class="input-group input-group-sm">
                  
              <span class="input-group-text">Codigo prestador</span>
			   <input type="text" class="form-control form-control-sm" id="codigo_centro" name="codigo_centro" required>
                    </div>
                 
                </div>
                
			  <div class="col-md-7">
				    <label class="form-label">Centro Médico</label>
                 <input class="form-control"  value="<?=$centro_name?>" disabled> 
				 <input class="form-control" type="hidden" id="centro" name="centro" value="<?=$centro?>" > 
                </div>
                
               
				  <div class="col-md-5">
				    <label class="form-label">Seguro Médicos</label>
                 <!--<select class="form-select" id="seguro_id" name="seguro_id" required>
				 	<?=$all_seguro?>
                  </select>-->
				  <input class="form-control"  value="<?=$seguroTitle?>" disabled> 
				 <input class="form-control" type="hidden" id="seguro_id" name="seguro_id" value="<?=$seguroId?>" > 
                </div>
                
				
                <div class="text-center">
                  <button type="submit" id="import-btn-centro" class="btn btn-primary">Guardar</button>
                 
                </div>
              </form>
			   
                </div>
            </div>
        </div>
		</div>
		</div>
<div id="show-error-up"></div>

    </section>
	  <input id="seguroLinkSegment" type="hidden" value="<?=$seguroId?>" > 
	    <input id="centroLinkSegment" type="hidden" value="<?=$centro?>" > 
		 <input id="controllerLing" type="hidden" value="<?=$controller?>" > 
		 <input id="where_to_go_centro" type="hidden" value="<?=$where_to_go_centro?>" > 
		 <?php
		 if($where_to_go_centro==1){
		  $this->load->view('footer-footerJs');
		 }
		  ?>
		 <script>
		  $(document).ready( function(){

seguroLinkSegment = $('#seguroLinkSegment').val();
centroLinkSegment =$('#centroLinkSegment').val();
controllerLing = $('#controllerLing').val();
where_to_go_centro = $('#where_to_go_centro').val();





$('#import_form_centro').on('submit', function(event){
  event.preventDefault();
  
  if($("#file").val()=="" || $("#codigo_centro").val()==""){
alert("El Codigo Prestador es Obligatorio");
}
else{
  
  $('#import-btn-centro').text('Guardando...').prop("disabled", true);	
  
$.ajax({
url:"<?php echo base_url(); ?>tarifarios_centro/import_exel_centro",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
Swal.fire({
	allowOutsideClick: false,
  icon: 'success',
  title: 'Tarifarios importados con éxito!',
  //text: 'Tarifarios importados con éxito!',
  //footer: '<a href="'+INVOICE_LINK+'">Facturar</a>'
}).then((result) => {
  if (result.isConfirmed) {
	  if(where_to_go_centro==0){
location.reload(true);
	  }else{
		history.go(-1);
	  }
  }
})

},

})
}
});
	
	});
	</script>
		
	
		
	
