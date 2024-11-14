<div id="scroll_to_ind_drug"></div>
<input class="is-indications-lab-has-been-duplicated" value="0" type="hidden"/>
 <h4 class="font-italic mb-4"> Indicación laboratorios</h4>
 <form class="row g-3 clearOutOFresult">
<?php 
if($this->session->userdata('user_perfil') !="Admin"){
?>
                <div class="col-md-4">
				
       <div class="input-group mb-3">
  <div class="form-floating flex-grow-1">
        <input type="text" class="form-control" id="laboratoriosAgrupados" placeholder="Buscar aboratorios agrupados">
      <label for="laboratoriosAgrupados"> Buscar laboratorios agrupados</label>
  </div>

  <span class="input-group-text"><em style="cursor:pointer" class="bi bi-x-lg  clearInputs"  onclick="clearInputField('laboratoriosAgrupados');"> </em></span>
</div>
 <div id="suggestion-grup-lab-list" class="clear-lab-list"></div>
         <div id="suggestion-grup-lab-list-selected" class="clear-lab-list"></div>
	     </div>
		 
		 
                <div class="col-md-4">
                 <div class="input-group mb-3">
				   <div class="form-floating flex-grow-1">
		  
         <input type="text" class="form-control" id="searchLabByName" placeholder="Buscar laboratorio por nombre">
         <label for="searchLabByName"> Buscar laboratorio por nombre</label>
		  </div>
		    <span class="input-group-text"><span style="cursor:pointer"  class="bi bi-x-lg   clearInputs"  onclick="clearInputField('searchLabByName');"> </span></span>
		 </div>
		 
         <div id="suggestion-lab-list" class="clear-lab-list"></div>
       </div>

       <?php }  ?>
               
                
      </form>
	  <div class="row">
			<?php 
			if($this->session->userdata('user_perfil') =="Medico"){
			?>
	  <div class="col-md-3 mb-2">
         <a  class="btn btn-sm btn-outline-primary openCanvasCrearLab" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrollingLab" aria-controls="offcanvasScrollingLab"  >
            Crear laboratorios
        </a>
		</div>
		 <?php }  ?>
           <div class="col-md-12   border-default border-top ">
		  
   <div class="card" >
     <div class="card-body">
       <h5 class="card-title">Indicaciónes previas</h5>
	   <button style="display:none" type="button" class="btn btn-danger show-eliminar-duplicado-lab">Elimiar duplicato</button>
          
        <div class="row">
		    
           <div style="overflow-x:auto;">
           <div id="patient-labs-content"></div>
         </div>
       </div>
       
       
     </div>
   </div>
   
 </div>
		<div class="offcanvas offcanvas-start " style="width:100%" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrollingLab" aria-labelledby="offcanvasScrollingLabLabel">
          <div class="offcanvas-header border-bottom m-0">
            <button type="button" class="btn" data-bs-dismiss="offcanvas"><i class="bi bi-x fs-2"></i></button>
          </div>
          <div class="offcanvas-body small">
	 <div id="listado-lab"></div>
    </div>
        </div>
 </div>





       

