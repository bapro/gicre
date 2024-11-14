 <section class="py-3">
        <div class="container  d-flex align-items-center justify-content-center">
		  <div class="col-md-9">
		  <a class="btn btn-primary mb-3"  href="#" data-bs-toggle="modal" data-bs-target="#createuserModal" >Crear Usuario</a>
        			<div class="card">
			 <div class="card-header fs-1"> Usuarios</div>
			<div class="card-body">
     <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
               <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="medico-tab" data-bs-toggle="tab" data-bs-target="#medico-left" type="button" role="tab" aria-controls="medicoIndMed" aria-selected="true">Médico</button>
                </li>
				
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="asitMedico-tab" data-bs-toggle="tab" data-bs-target="#asitMedico-left" type="button" role="tab" aria-controls="asitMedico" aria-selected="false">Asistente Médico</button>
                </li>
				
				<li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="nurse-tab" data-bs-toggle="tab" data-bs-target="#nurse-left" type="button" role="tab" aria-controls="nurse" aria-selected="false">Enfermera</button>
                </li>
				
				<li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="internDrug-tab" data-bs-toggle="tab" data-bs-target="#internDrug-left" type="button" role="tab" aria-controls="internDrug" aria-selected="false">Farmacia Interna</button>
                </li>
			<?php if($this->session->userdata('admin_position_centro')==""){ ?>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="admin-tab"  data-bs-toggle="tab" data-bs-target="#admin-left" type="button" role="tab" aria-controls="admin" aria-selected="false">Admin</button>
                </li>
					<?php } ?>
				<li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="administrativo-tab"  data-bs-toggle="tab" data-bs-target="#administrativo-left" type="button" role="tab" aria-controls="administrativo" aria-selected="false">Administrativo</button>
                </li>
              </ul>
			  
			    <div class="tab-content pt-2" >
                <div class="tab-pane fade show active" id="medico-left" role="tabpanel" aria-labelledby="medico-tab">
                <div id="list-medicos"></div>
                 </div>
                <div class="tab-pane fade" id="asitMedico-left" role="tabpanel" aria-labelledby="asitMedico-tab">
                 <div id="list-asist-med"></div>
                </div>
				<div class="tab-pane fade" id="nurse-left" role="tabpanel" aria-labelledby="nurse-tab">
                 <div id="list-nurse"></div>
                </div>
				<div class="tab-pane fade" id="internDrug-left" role="tabpanel" aria-labelledby="internDrug-tab">
                 <div id="list-internDrug"></div>
                </div>
                <div class="tab-pane fade" id="admin-left" role="tabpanel" aria-labelledby="admin-tab">
                <div id="list-admin"></div>
                </div>
				 <div class="tab-pane fade" id="administrativo-left" role="tabpanel" aria-labelledby="administrativo-tab">
                <div id="list-administrativo"></div>
                </div>
              </div> 
			  
			  
 
			


</div>
</div>
   </div>
        </div>
		
		 <div class="modal fade" id="createuserModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title">Crear Usuario</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
       </div>
	   <input id="selected-form" value="1" type="hidden"/>
       <div class="modal-body " style="max-height: 180vh;
    overflow-y: auto;">

         <div class="card-body">
		  <div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-3">
<ul class="list-group list-group-flush">
  <li class="list-group-item">
    <input class="form-check-input me-1" type="radio" id="firstCheckbox"name="select-user-perfil" value="1" checked>
    <label class="form-check-label" for="firstCheckbox">Médico</label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="radio" id="secondCheckbox" name="select-user-perfil" value="2">
    <label class="form-check-label" for="secondCheckbox">Asistente Médico</label>
  </li>
<li class="list-group-item">
    <input class="form-check-input me-1" type="radio" id="fourCheckbox" name="select-user-perfil" value="4">
    <label class="form-check-label" for="fourCheckbox">Enfermera</label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="radio" id="fithCheckbox" name="select-user-perfil" value="5">
    <label class="form-check-label" for="fithCheckbox">Farmacia Interna</label>
  </li>
  <?php if($this->session->userdata('admin_position_centro')==""){ ?>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="radio" id="thirdCheckbox" name="select-user-perfil" value="3">
    <label class="form-check-label" for="thirdCheckbox">Admin</label>
  </li>
    <li class="list-group-item">
    <input class="form-check-input me-1" type="radio" id="fourthCheckbox" name="select-user-perfil" value="6">
    <label class="form-check-label" for="fourthCheckbox">Administrativo</label>
  </li>
  
    <li class="list-group-item">
    <input class="form-check-input me-1" type="radio" id="seventhCheckbox" name="select-user-perfil" value="7">
    <label class="form-check-label" for="seventhCheckbox">Auditoria Médico</label>
  </li>
 
  <?php } ?>
</ul>
</div>
<div class="col-md-9 border-start">
  <form action="<?php echo site_url('users/saveUser');?>" method="post" enctype="multipart/form-data"  novalidate class="needs-validation" autocomplete="off">
                    <div class="row mb-3 ">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Perfil</label>
                      <div class="col-md-2 col-lg-3">
                      <input name="perfil" type="text" class="form-control" id="perfil"   readonly>
                      </div>
                    </div>
					
                    <div class="row mb-3">
                      <label for="userName" class="col-md-4 col-lg-3 col-form-label">Nombres <span class="text-danger">*</span> </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userName" type="text" class="form-control" id="userName"  required>
						<div class="invalid-feedback">Por favor, introduzca los nombres.</div>
						<div id="search-by-nombres"></div>
                      </div>
                    </div>
<div class="row mb-3 medico-fields">
					<label for="exequatur" class="col-md-4 col-lg-3 col-form-label">Exequatur <span class="text-danger">*</span> </label>
					<div class="col-md-1 col-lg-2">

					<input name="exequatur" type="text" class="form-control" id="exequatur"  required>
					<div class="invalid-feedback">Por favor, introduzca el exequatur.</div>
					<div id="exequatur-options"></div>
					</div>
					</div>
              <div class="row mb-3">
                      <label for="userEmail" class="col-md-4 col-lg-3 col-form-label">Correo Electrónico <span class="text-danger">*</span> </label>
                      <div class="col-md-5 col-lg-6">
                        <input name="id_user" type="hidden" class="form-control" id="id_user" >
						  <input name="userEmail" type="email" class="form-control" id="userEmail"  required>
						<div class="invalid-feedback">Por favor, introduzca el correo electrónico.</div>
						<div id="emailInfo"></div>
                      </div>
                    </div>
					
					
					
						<div class="row mb-3 centro-fields" style="display:none">
					<label for="area" class="col-md-4 col-lg-3 col-form-label">Centro Médico</label>
					<div class="col-md-4 col-lg-5">

					 <select class="form-select" id="centro" name="centro">
						<?php 
									$queryCm= $this->db->query("SELECT id_m_c, name FROM  medical_centers ORDER BY name DESC");
									$CENTROS = $queryCm->result();
                                  foreach ($CENTROS as $centro)
									{
									echo "<option value='$centro->id_m_c'>$centro->name</option>";
									}	

									?>

                            </select>
					<div class="invalid-feedback">Por favor, introduzca la area del médico.</div>
					</div>
					</div>
					
					
					
					<!--MEDICO FIELDS------->
					
					
					<div class="row mb-3 medico-fields">
					<label for="area" class="col-md-4 col-lg-3 col-form-label">Area <span class="text-danger">*</span> </label>
					<div class="col-md-4 col-lg-5">

					 <select class="form-select" id="especialidad" name="especialidad" required>
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
					
					
					<div class="row mb-3 medico-fields">
					<label for="area" class="col-md-4 col-lg-3 col-form-label">Plan de pago </label>
					<div class="col-md-4 col-lg-5">
					<div class="form-check">
					<input class="form-check-input" type="radio" id="payment-plan1"  name="payment-plan" value="0" checked >
					<label class="form-check-label" for="payment-plan1">
					Gratis
					</label>
					</div>
                 <?php 
						$sqlot="SELECT * FROM medico_precio_plan ORDER BY id ASC";
						$querysqlot=$this->db->query($sqlot);
						foreach($querysqlot->result() as $rowot)
						{
						
						?>
                   <div class="form-check">
					<input class="form-check-input" type="radio" id="payment-plan-<?=$rowot->id?>"  name="payment-plan" value='<?=$rowot->id?>'>
					<label class="form-check-label" for="payment-plan1">
					<?=$rowot->plan?> $<?=$rowot->precio?>USD
					</label>
					</div>
					
						<?php }  ?>
						
					
					<div class="invalid-feedback">Por favor, eliga el plan de pago.</div>
					</div>
					</div>	
					
					
						<div class="row mb-3 medico-fields">
					<label for="seguro_medico" class="col-md-4 col-lg-3 col-form-label">Seguros Médico  </label>
					<div class="col-md-8 col-lg-9">
            <input type="checkbox" id="selectAllSeg"> Seleccionar todo
					 <select class="form-select select-seguros" id="seguro_medico" name="seguro_medico[]" required multiple="multiple">
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
					<div class="invalid-feedback">Por favor, introduzca la area del médico.</div>
					</div>
					</div>
					
					
					
					
					
				<!----MEDICO FIELDS END --------->
				  <div class="row  mb-3">
                   <label for="userCedula" class="col-md-4 col-lg-3 col-form-label">Cédula</label>
                    <div class="col-md-3 col-lg-4"><input name="userCedula" type="text" class="form-control" id="userCedula" ></div>
                  </div>

                    <div class="row mb-3">
                      <label for="userPhone" class="col-md-4 col-lg-3 col-form-label">Teléfono </label>
                      <div class="col-md-3 col-lg-4">
                        <input name="userPhone" type="text" class="form-control" id="userPhone"  required>
						<div class="invalid-feedback">Por favor, introduzca el numero de celular.</div>
                      </div>
                    </div>

             <div class="row mb-3">
                      <label for="whatsapp_link" class="col-md-4 col-lg-3 col-form-label">WhatsApp Link </label>
                      <div class="col-md-8 col-lg-9">
                        <div class="input-group">
				<span class="input-group-text" id="basic-addon1">https://wa.me/+1</span>
				 <input name="whatsapp_link" type="text" class="form-control" id="whatsapp_link"  placeholder="0000000000" maxlength="10" >
				</div>
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
       </div>
       <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>-->
     </div>
   </div>
 </div>
    </section>
	<input type="hidden" id="current-div"  />

  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script> 
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
<?php $this->load->view('prevent-duplicated-entry');?>
<script>

$(document).ready( function(){


	
	$(document).on('click', '.action-user', function(event){ 
event.preventDefault();
 if (confirm("Quiere realizar esta acción ?"))
{ 
var action = $(this).attr('class').split(' ').pop();

var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('users/action_user')?>',
data: {id : del_id, action:action},
success:function(response) {
if($("#current-div").val()==1){
	listarUsers("Medico", 'list-medicos', 1);
}else if($("#current-div").val()==2){
	listarUsers("Asistente Medico", 'list-asist-med', 2);
}else if($("#current-div").val()==3){
listarUsers("Admin", 'list-admin', 3);	
}
else if($("#current-div").val()==6){
listarUsers("Farmacia Interna", 'list-internDrug', 6);	
}

else{
listarUsers("Admin", 'list-admin', 4);	
}
}
});
}
}) 








$("#selectAllSeg").click(function(){
if($("#selectAllSeg").is(':checked') ){
$("#seguro_medico > option").prop("selected","selected");
$("#seguro_medico").trigger("change");
}else{
$("#seguro_medico > option").prop("selected","");
$("#seguro_medico").trigger("change");
}
});
	
$(document).on('change', '.is-it-that', function(event){
	
$("#userName").val(this.value);
var ex= $(this).parent().next('td').text();;
$("#exequatur").val(ex);

$("#exequatur-options").html("");
$("#search-by-nombres").html("");
});
	
$('#especialidad').select2({
	dropdownParent: $('#createuserModal'),
		theme: 'bootstrap-5',
		width: '100%'
		});


$('#centro').select2({
	dropdownParent: $('#createuserModal'),
		theme: 'bootstrap-5',
		width: '100%'
		});


$('#seguro_medico').select2({
	dropdownParent: $('#createuserModal'),
		theme: 'bootstrap-5',
		width: '100%'
		});

	
loadCreationUserForm(1);	
$('input[type=radio][name=select-user-perfil]').change(function(){

loadCreationUserForm(this.value);
$("#selected-form").val(this.value);

});


 var keyupEx;
		$(document).on('keyup', '#exequatur', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupEx);
            keyupEx = setTimeout(function () {
               searchExequatur(keyword);
            }, 300);
        });


 var keyupName;
		$(document).on('keyup', '#userName', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupName);
            keyupName = setTimeout(function () {
               searchDocByName(keyword);
            }, 300);
        });

function searchExequatur(exequatur){ 
if(exequatur ==""){
	$("#exequatur-options").hide();
}else{
	$.ajax({
type: "POST",
url: "<?=base_url('users/get_medico_exequatur')?>",
data: {exequatur:exequatur},
cache: true,
success:function(data){ 
$("#exequatur-options").show();
$("#exequatur-options").html(data); 

}  
});
}

};

function searchDocByName(nombres){ 
if(nombres ==""){
	$("#search-by-nombres").hide();
}else if($("#selected-form").val()==1){
	$.ajax({
type: "POST",
url: "<?=base_url('users/get_medico_name')?>",
data: {nombres:nombres},
cache: true,
success:function(data){ 
$("#search-by-nombres").show();
$("#search-by-nombres").html(data); 

}  
});
}

};


function loadCreationUserForm(form){
	var perfil;
	if(form==2){
		perfil="Asistente Médico";
	}else if(form==5){
		perfil="Farmacia Interna";
	}else if(form==4){
		perfil="Enfermera";
	}else if(form==3){
	perfil="Admin";	
	} else if(form==6){
		perfil="Administrativo";
	}
	else if(form==7){
		perfil="Auditoria Médico";
	}
	if(form==2 || form==4 || form==5 || form==3  || form==7){
	$(".medico-fields").hide();
	$("#perfil").val(perfil);
	$("#exequatur").val("");
	$("#userName").val("");
	$("#exequatur-options").hide();
	$("#search-by-nombres").hide();
	$(".centro-fields").hide();
$("#especialidad").attr('required', false); 
$('#exequatur').attr('required', false);
$('#seguro_medico').attr('required', false);
}else if(form==1){
$(".medico-fields").show();	
$("#perfil").val("Médico");
$("#especialidad").attr('required', true); 
$('#exequatur').attr('required', true); 
$('#seguro_medico').attr('required', true);
$(".centro-fields").hide();
}
 else if(form==6){
	 $(".medico-fields").hide();
	$("#perfil").val(perfil);
	$("#exequatur").val("");
	$("#exequatur-options").hide();
	$("#search-by-nombres").hide();
	$(".centro-fields").show(); 
 }

}


	  $("#current-div").val(1);
listarUsers("Medico", 'list-medicos', 1);

$('#medico-tab').on('click',  function(event){ 
   event.preventDefault();
$("#current-div").val(1);
   
	});


	
	$('#asitMedico-tab').on('click',  function(event){ 
   event.preventDefault();
listarUsers("Asistente Medico", 'list-asist-med', 2);
$("#current-div").val(2);
   
	});
	$('#admin-tab').on('click',  function(event){ 
   event.preventDefault();
listarUsers("Admin", 'list-admin', 3);
   $("#current-div").val(3);
	});
	
	$('#administrativo-tab').on('click',  function(event){ 
   event.preventDefault();
   listarUsers("Admin", 'list-administrativo', 4);
$("#current-div").val(4);
   
	});
	
	
	
	$('#nurse-tab').on('click',  function(event){ 
   event.preventDefault();
   listarUsers("Enfermera", 'list-nurse', 5);
$("#current-div").val(5);
   
	});
	
	
	$('#internDrug-tab').on('click',  function(event){ 
   event.preventDefault();
   listarUsers("Farmacia Interna", 'list-internDrug', 6);
$("#current-div").val(6);
   
	});
	
	
	
	function listarUsers(perfil, div, id){

	     $.ajax({
 type: "POST",
 url: "<?php echo site_url('users/userTable');?>",
 data: {
perfil:perfil, id:id
 },
 success:function(data){
 $("#"+div).html(data);
 },
 

 });	
	}
	
	

	
	

		
	
 });
</script>

	

	 
</body>

</html>