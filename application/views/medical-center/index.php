	<section class="py-3">
	<div class="container  d-flex align-items-center justify-content-center">
	<div class="col-md-9">
		<?php if($this->session->userdata('admin_position_centro')==''){ ?>
	<a class="btn btn-primary mb-3"  href="#" data-bs-toggle="modal" data-bs-target="#createCentroMedicoModal" >Crear Centro Médico</a>
		<?php } ?>
	<div class="card">
<?php echo $this->session->flashdata('success_msg'); ?>
	<div class="card-header fs-1"> Centro Médico</div>
	<div class="card-body">

  <div id="list-medical_centers"></div>


	</div>
	</div>
	</div>

		
		 <div class="modal fade" id="createCentroMedicoModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title">Crear Centro Médico</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
       </div>
       <div class="modal-body " >
	   <div class="card">
            <div class="card-body d-flex align-items-center justify-content-center">
			<div class="col-md-7">
 <form action="<?php echo site_url('medical_center/saveCentroMedico');?>" method="post" enctype="multipart/form-data"  novalidate class="needs-validation" autocomplete="off">
                     <input type="hidden" name="created_by"  value="<?=$this->session->userdata('user_id');?>"/>  
 <input type="hidden" name="updated_by"  value="<?=$this->session->userdata('user_id');?>"/>  
 <input type="hidden" name="insert_date"  value="<?=date('Y-m-d H:i:s')?>"/> 
  <input type="hidden" name="modify_date"  value="<?=date('Y-m-d H:i:s')?>"/> 
					<div class="row mb-3">
                      <label for="centro-medico-name" class="col-sm-4">Nombres <span class="text-danger">*</span> </label>
                      <div class="col-sm-8">
                        <input name="nombre" type="text" class="form-control" id="centro-medico-name"  required>
						<div class="invalid-feedback">Por favor, introduzca el nombre.</div>
					<div id="duplicateCentro"></div>
                      </div>
                    </div>
<div class="row mb-3 medico-fields">
					<label for="exequatur" class="col-sm-4">Cargar Logo <span class="text-danger">*</span> </label>
					<div class="col-sm-8">

					<input type="file" name="logo" id="file_m_enf" class="file_m_enf form-control" onchange="preview_sello(event)"   accept=".png, .jpg, .jpeg" required >
						
					<div class="invalid-feedback">Por favor, cargue el logo.</div>
					
					</div>
					</div>
              <div class="row mb-3">
                      <label for="rnc" class="col-sm-4">RNC</label>
                       <div class="col-sm-4">
                         <input name="rnc" type="text" class="form-control" id="rnc"  >
						
                      </div>
                    </div>
					
					<div class="row mb-3">
					<label for="area" class="col-sm-4">Tipo </label>
					<div class="col-sm-8">

					<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
					<input type="radio" class="btn-check" name="typo" id="btnradio1" autocomplete="off" value="privado" checked>
					<label class="btn btn-outline-secondary" for="btnradio1">Privado</label>

					<input type="radio" class="btn-check" name="typo" id="btnradio2" autocomplete="off" value="publico">
					<label class="btn btn-outline-secondary" for="btnradio2">Público</label>

					<input type="radio" class="btn-check" name="typo" id="btnradio3" autocomplete="off" value="salud ocupacional">
					<label class="btn btn-outline-secondary" for="btnradio3">Salud Ocupacional</label>
					</div>
					</div>
					</div>
					
					
					 <div class="row mb-3">
                      <label for="userEmail" class="col-sm-4">Primer teléfono <span class="text-danger">*</span> </label>
                       <div class="col-sm-4">
                        <input name="primer_tel" type="text" class="form-control" id="primer_tel"  required>
						<div class="invalid-feedback">Por favor, introduzca el primer teléfono.</div>
						
                      </div>
                    </div>
					
					 <div class="row mb-3">
                      <label for="userEmail" class="col-sm-4">Segundo telefono  </label>
                       <div class="col-sm-4">
                      
						  <input name="segundo_tel" type="text" class="form-control" id="segundo_tel"  >
						
                      </div>
                    </div>
					 <div class="row mb-3">
                      <label for="userEmail" class="col-sm-4">Correo electronico </label>
                       <div class="col-sm-5">
                      
						  <input name="email" type="email" class="form-control" id="email"  >
						
                      </div>
                    </div>
					 <div class="row mb-3">
                      <label for="userEmail" class="col-sm-4">Fax </label>
                       <div class="col-sm-4">
                     
						  <input name="fax" type="text" class="form-control" id="fax"  >
						
                      </div>
                    </div>
					
					<div class="row mb-3">
					<label for="area" class="col-sm-4">Especialidades <span class="text-danger">*</span> </label>
					<div class="col-sm-8">
        <input type="checkbox" id="selectAllArea"> Seleccionar todos 
					 <select class="form-select" id="especialidad" name="especialidad[]" multiple="multiple" required>
						 <option value=""></option>
									<?php 
									$queryaR= $this->db->query("SELECT id_ar, title_area FROM areas ORDER BY title_area DESC ");
									$AREAS = $queryaR->result();
                                  foreach ($AREAS as $area)
									{
									echo "<option value='$area->id_ar'>$area->title_area</option>";
									}	

									?>

                            </select>
					<div class="invalid-feedback">Por favor, introduzca la area del médico.</div>
					</div>
					</div>
					
				
						<div class="row mb-3">
					<label for="area" class="col-sm-4">Provincia <span class="text-danger">*</span> </label>
					<div class="col-sm-8">

					 <select class="form-select" id="provincia" name="provincia" required  >
						 <option value=""></option>
								<?php
								$query = $this->model_admin->all_provinces();

								foreach($provinces as $listElement){
								?>
								<option  value="<?php echo $listElement->id?>"><?php echo $listElement->title?></option>
								<?php
								}
								?>

                            </select>
					<div class="invalid-feedback">Por favor, introduzca la provincia.</div>
					</div>
					</div>
					
					
						<div class="row mb-3">
					<label for="area" class="col-sm-4">Municipio <span class="text-danger">*</span> </label>
					<div class="col-sm-8">

					 <select class="form-select" id="municipio_dropdown" name="municipio" required>
						 <option value=""></option>

                            </select>
					<div class="invalid-feedback ">Por favor, introduzca el municipio.</div>
					<div class="municipio_loader"></div>
					
					</div>
					</div>
					
						 <div class="row mb-3">
                      <label for="barrio" class="col-sm-4">Barrio </label>
                       <div class="col-sm-6">
            
						  <input name="barrio" type="text" class="form-control" id="barrio"  >
						
                      </div>
                    </div>
					
						 <div class="row mb-3">
                      <label for="calle" class="col-sm-4">Calle  </label>
                       <div class="col-sm-6">
                      
						  <input name="calle" type="text" class="form-control" id="calle"  >
						
                      </div>
                    </div>
					
						 <div class="row mb-3">
                      <label for="pagina_web" class="col-sm-4">Página Web  </label>
                       <div class="col-sm-6">
                      
						  <input name="pagina_web" type="text" class="form-control" id="pagina_web"  >
						
                      </div>
                    </div>
						<div class="row mb-3 medico-fields">
					<label for="seguro_medico" class="col-sm-4">Seguros Médico <span class="text-danger">*</span>  </label>
					<div class="col-sm-8">
            <input type="checkbox" id="selectAllSeg"> Seleccionar todos
					 <select class="form-select" id="seguro_medico" name="seguro_medico[]" required multiple="multiple">
						 <option value=""></option>
									<?php 
									$queryS= $this->db->query("SELECT id_sm, title FROM seguro_medico ORDER BY title DESC ");
									$SEGUROS = $queryS->result();
                                  foreach ($SEGUROS as $seguro)
									{
									echo "<option value='$seguro->id_sm'>$seguro->title</option>";
									}	

									?>

                            </select>
					<div class="invalid-feedback">Por favor, introduzca los Seguros médico .</div>
					</div>
					</div>
					
					   <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
				   </div>
				  </div>
				  </div>
				  </div>
   </div>
       <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>-->
     </div>
   </div>
 </div>
 
    </section>
	

  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script> 
 <script src="<?= base_url();?>assets_new/js/main.js"></script> 

<?php $this->load->view('prevent-duplicated-entry');?>
<script>

$(document).ready( function(){


listarmedical_centers();

	$("#provincia").change(function(){
		$(".municipio_loader").show().addClass('spinner-border');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getMuncipio');?>',
	data:'id_mun='+$(this).val(),
	success: function(data){
	$("#municipio_dropdown").prop("disabled",false);
	$("#municipio_dropdown").html(data);
	$(".municipio_loader").removeClass('spinner-border');
	},
	});
});
	
	function listarmedical_centers(){

	     $.ajax({
 type: "POST",
 url: "<?php echo site_url('medical_center/medicalCenterTable');?>",

 success:function(data){
 $("#list-medical_centers").html(data);
 },
 

 });	
	}
	
	
$('.form-select').select2({
	//dropdownParent: $('#createCentroMedicoModal'),
		theme: 'bootstrap-5',
		width: '100%'
		});

	
	
$("#selectAllSeg").click(function(){
if($("#selectAllSeg").is(':checked') ){
$("#seguro_medico > option").prop("selected","selected");
$("#seguro_medico").trigger("change");
}else{
$("#seguro_medico > option").prop("selected","");
$("#seguro_medico").trigger("change");
}
});
		

$("#selectAllArea").click(function(){
if($("#selectAllArea").is(':checked') ){
$("#especialidad > option").prop("selected","selected");
$("#especialidad").trigger("change");
}else{
$("#especialidad > option").prop("selected","");
$("#especialidad").trigger("change");
}
});
 


	$(document).on('click', '.action-centro', function(event){ 
event.preventDefault();
var action = $(this).attr('class').split(' ').pop();
 if (confirm("Quiere realizar esta acción ?"))
{ 
var action = $(this).attr('class').split(' ').pop();

var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('medical_center/action_centro')?>',
data: {id : del_id, action:action},
success:function(response) {
listarmedical_centers();
}
});
}
}) 


	
 });
</script>

	

	 
</body>

</html>