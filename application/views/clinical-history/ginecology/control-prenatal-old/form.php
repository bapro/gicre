 <?php
 //--IF THERE IS ONE REGISTER WITH END = 1 THAT MEANS WE CAN SHOW FORM OR 0 REGISTER FOR THIS PATIENT
 if($con_pren_totals==0) {?>

  <div class="table-responsive" id="contPrenatal-form">
         <table class="table table-bordered table-sm control-prenatal-table">
           <thead>
             <tr>
               <th class='border-0'></th>
               <th>Fecha de la consulta</th>
               <th>Semana de amenorrea</th>
               <th>Peso (lb)</th>
               <th style="text-align:center">Tensión Alterial<br/> Sist - Diast</th>
               <th style="text-align:center">Alt. Ulterina - Pubis.FondoCef - Pelv.Tr</th>
               <th style="text-align:center">lat./min - Mov.Fetal</th>
               <th style="text-align:center">Edema - Varices</th>
               <th>Otros</th>
               <th>Evolución</th>

             </tr>
           </thead>
           <tbody id="tbodyControlPrenatal">

        <?php $this->load->view('clinical-history/ginecology/control-prenatal/td-inputs');?>
           
           </tbody>
         </table>
		 
		 
       </div>
	   <div class="text-center">
	    <button class="btn btn-md btn-success newContPrenaForm" disabled id="saveNewContPrena" type="button">
         <i class="bi bi-save"></i> Guardar Control Prenatal
       </button>
	     <span id="alert_placeholder_control_prena" style="position:absolute; " class="p-2"></span>
	  </div>
	    <?php 
		
 } else {?>
<input type="hidden" class="currentDateCp"  />
 <?php } ?>
 
    <script>
	   var field = document.querySelector('.currentDateCp');
var date = new Date();

// Set the date
field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + 
    '-' + date.getDate().toString().padStart(2, 0);
	
	   </script>
 
 

      