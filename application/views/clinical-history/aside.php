<aside id="sidebar" class="sidebar" >
<input id="id_eva_card" type="hidden" value="0" />
<input id="number_of_view" type="hidden" value="<?=$number_of_view?>" />
<?php
$aside = $this->session->userdata('doctorEspecialidad');

?>
    <ul class="nav flex-column nav-pills sidebar-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <!-- <li class="nav-item">
            <a class="nav-link  collapsed" id="v-pills-resumenHistCli-tab" data-bs-toggle="pill" data-bs-target="#v-pills-resumenHistCli" href="#" role="tab" aria-controls="v-pills-resumenHistCli" aria-selected="false">
                <i class="bi bi-card-checklist"></i> Resumen Historia Clinica</span>
            </a>
        </li> -->
		
		
		<li class="nav-item">
            <a class="nav-link  collapsed text-danger" href="#" data-bs-toggle="modal" data-bs-target="#largeModalResumenHist">
                <i class="bi bi-card-checklist"></i> Resumen Historia Clinica</span>
            </a>
        </li>
		
		
   <li class="nav-item">
            <a class="nav-link active collapsed" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">
                <i class="material-symbols-outlined">rate_review </i> <span> Antecedentes Generales</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed launch-quill-required-forms" id="v-pills-currentDisease-tab" data-bs-toggle="pill" data-bs-target="#v-pills-currentDisease" href="#" role="tab" aria-controls="v-pills-currentDisease" aria-selected="false">
                <i class="material-symbols-outlined">
                    sick
                </i>
                <span>Enfermedad Actual </span> &nbsp;<small class="enfermedad-menu fa fa-asterisk text-danger"> </small></a>
        </li>

       

        <?php

        if ($aside == 'ophthalmology') { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" id="v-pills-ophtalmology-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ophtalmology" href="#" role="tab" aria-controls="v-pills-ophtalmology" aria-selected="false">
                    <i class="bi bi-eyeglasses fs-4"></i><span> Oftalmología</span></a>
            </li>
        
            <?php } else {

            if ($aside == 'pediatry') { ?>

                       <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="material-symbols-outlined">
                            science
                        </i><span>Examenes</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li class="nav-item">
                            <a class="nav-link collapsed" id="v-pills-sigVital-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sigVital" href="#" role="tab" aria-controls="v-pills-sigVital" aria-selected="false">
                                <i class="material-symbols-outlined">monitor_heart</i><span> Signos Vitales</span></a>
                        </li>
                      <li class="nav-item">
                                <a class="nav-link collapsed" id="v-pills-physic-tab" data-bs-toggle="pill" data-bs-target="#v-pills-physic" href="#" role="tab" aria-controls="v-pills-physic" aria-selected="false">
                                    <i class="material-symbols-outlined">monitor_heart</i><span> Físico </span></a>
                            </li>
                        

                    </ul>
                </li>
				
				 <li class="nav-item">
                    <a class="nav-link collapsed" id="v-pills-vacunas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-vacunas" href="#" role="tab" aria-controls="v-pills-vacunas" aria-selected="false">
                        <i class="material-symbols-outlined">syringe</i><span> Vacunas</span></a>
                </li>
            <?php } else {

                  if($aside != 'vascular_urgeon'){
				?>
                
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="material-symbols-outlined">
                            science
                        </i><span>Examenes</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li class="nav-item">
                            <a class="nav-link collapsed" id="v-pills-sigVital-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sigVital" href="#" role="tab" aria-controls="v-pills-sigVital" aria-selected="false">
                                <i class="material-symbols-outlined">monitor_heart</i><span> Signos Vitales</span></a>
                        </li>
                        <?php if ($aside == 'urology') { ?>
                            <li class="nav-item">
                                <a class="nav-link collapsed" id="v-pills-physicUro-tab" data-bs-toggle="pill" data-bs-target="#v-pills-physicUro" href="#" role="tab" aria-controls="v-pills-physicUro" aria-selected="false">
                                    <i class="material-symbols-outlined">monitor_heart</i><span> Físico urología</span></a>
                            </li>
                        <?php } else { ?>

                            <li class="nav-item">
                                <a class="nav-link collapsed" id="v-pills-physic-tab" data-bs-toggle="pill" data-bs-target="#v-pills-physic" href="#" role="tab" aria-controls="v-pills-physic" aria-selected="false">
                                    <i class="material-symbols-outlined">monitor_heart</i><span> Físico </span></a>
                            </li>
                            <?php if ($aside != 'ginecology' && $aside !='evaluacion-dardiovascular') { ?>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" id="v-pills-system-tab" data-bs-toggle="pill" data-bs-target="#v-pills-system" href="#" role="tab" aria-controls="v-pills-system" aria-selected="false">
                                        <i class="material-symbols-outlined">monitor_heart</i><span> Sistema </span></a>
                                </li>
                        <?php }
                        } ?>

                    </ul>
                </li>
            <?php } else{?>
			<li class="nav-item">
                            <a class="nav-link collapsed" id="v-pills-sigVital-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sigVital" href="#" role="tab" aria-controls="v-pills-sigVital" aria-selected="false">
                                <i class="material-symbols-outlined">monitor_heart</i><span> Signos Vitales</span></a>
                        </li>
			<?php } 
			}
        }?>
		 <li class="nav-item">
            <a class="nav-link collapsed launch-quill-required-forms" id="v-pills-condiag-tab" data-bs-toggle="pill" data-bs-target="#v-pills-condiag" href="#" role="tab" aria-controls="v-pills-condiag" aria-selected="false">
                <i class="material-symbols-outlined">
                    summarize
                </i>
                <span>Conclusión Diagnóstica </span> <small class="conclusion-menu fa fa-asterisk text-danger"> </small></a>
        </li>
		<?php
        if ($aside == 'ginecology') { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" id="v-pills-controlPrena-tab" data-bs-toggle="pill" data-bs-target="#v-pills-controlPrena" href="#" role="tab" aria-controls="v-pills-controlPrena" aria-selected="false">
                    <span class="material-symbols-outlined">
                        pregnant_woman
                    </span>
                    <span>Control Prenatal</span>
                </a>
            </li>

        <?php }  ?>
        <li class="nav-item">
          <a class="nav-link collapsed" id="v-pills-recetas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-recetas" href="#" role="tab" aria-controls="v-pills-recetas" aria-selected="false">
                        <i class="fas fa-prescription"></i> Indicaciones</span>
                    </a>
           <!-- <ul id="indications-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link collapsed" id="v-pills-recetas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-recetas" href="#" role="tab" aria-controls="v-pills-recetas" aria-selected="false">
                        <i class="bi bi-circle"></i><span>Recetas</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link collapsed" id="v-pills-estudios-tab" data-bs-toggle="pill" data-bs-target="#v-pills-estudios" href="#" role="tab" aria-controls="v-pills-estudios" aria-selected="false">
                        <i class="bi bi-circle"></i><span>Estudios</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link collapsed" id="v-pills-labs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-labs" href="#" role="tab" aria-controls="v-pills-labs" aria-selected="false">
                        <i class="bi bi-circle"></i><span>Laboratorios</span>
                    </a>
                </li>
            </ul>-->

        </li>




        <li>
            <a class="nav-link collapsed" id="v-pills-patDocumentos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-patDocumentos" href="#" role="tab" aria-controls="v-pills-patDocumentos" aria-selected="false">
                <i class="bi bi-folder"></i>
                <span>Documentos</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->

 <div class="modal fade" id="largeModalImage" tabindex="-1"  data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Imagen</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
       </div>
       <div class="modal-body" style="max-height: 180vh;
    overflow-y: auto;">

         <div class="card-body">

           <div id="load-this-patient-image"></div>
           
         </div>

       </div>
       
     </div>
   </div>
 </div>