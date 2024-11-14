
  <div class="table-responsive" id="contPrenatal-form">
         <table class="table table-bordered table-striped table-sm control-prenatal-table">
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

             <?php
        
				   foreach ($query_con_pren_data as $rowid) 
				  $params2 = array('table' => 'h_c_control_prenatal', 'id' => $rowid->id);
        echo $this->user_register_info->get_operation_info($params2);
                foreach ($query_con_pren_data as $row) {
              ?>
                 <tr>
                   <td>
				    <button type="button" class="btn btn-success btn-sm" id="saveEditContPrena">Guardar Cambio </button>
                   </td>
                   <td>
                     <input class="position-cont-pren 0_id_cont_prena" type="hidden" value="<?= $row->id ?>" />
                      <input type="date" style="width:190px" class="form-control 0_cp_fecha " value="<?= $row->fecha ?>">
                   
                    <input type="hidden" class="form-control  con_pren_id_registro" value="<?= $row->id_registro ?>">

                   </td>
                   <td>

                       <input type="text" class="form-control 0_cp_semana "  value="<?= $row->semana ?>">
                     

                   </td>
                   <td>
                       <input type="text" style="width:100px" class="form-control 0_cp_peso " placeholder="Peso (lb)" value="<?= $row->peso ?>">
                     
                   </td>
                   <td>
                     <table>
                       <tr>
                         <td>
                            <input type="text" style="width:100px" class="form-control 0_cp_tension_art_max" placeholder="max (mm)" value="<?= $row->tension_art_max ?>">
                           

                         </td>
                         <td>-</td>
                         <td>
                           <input type="text" style="width:100px" class="form-control 0_cp_tension_art_min" placeholder="min (hg)" value="<?= $row->tension_art_min ?>">
                            
                         </td>
                       </tr>
                     </table>
                   </td>
                   <td>

                     <table>
                       <tr>
                         <td>
                             <input type="text" style="width:100px" class="form-control 0_cp_alt_ult" placeholder="Alt. Ulterina" value="<?= $row->alt_ult ?>">
                            

                         </td>
                         <td>-</td>
                         <td>
                            <input type="text" style="width:100px" class="form-control 0_cp_pubis_f" placeholder="Pubis.FondoCef" value="<?= $row->pubis_f ?>">
                           
                         </td>
                         <td>-</td>
                         <td>
                            <input type="text" style="width:100px" class="form-control 0_cp_pelv_tr" placeholder="Pelv.Tr" value="<?= $row->pelv_tr ?>">
                            
                         </td>
                       </tr>
                     </table>

                   </td>
                   <td>
                     <table>
                       <tr>
                         <td>
                            <input type="text" style="width:80px" class="form-control 0_cp_lat_min" placeholder="lat./min." value="<?= $row->lat_min ?>">
                            
                         </td>
                         <td>-</td>
                         <td>
                           <input type="text" style="width:100px" class="form-control 0_cp_mov_fet" placeholder="Mov.Fetal" value="<?= $row->mov_fet ?>">
                            
                         </td>
                       </tr>
                     </table>
                   </td>
                   <td>
                     <table>
                       <tr>
                         <td> 
                           <input type="text" style="width:100px" class="form-control 0_cp_edema" placeholder="Edema" value="<?= $row->edema ?>">
                             
                         </td>
                         <td>-</td>
                         <td>
                            <input type="text" style="width:100px" class="form-control 0_cp_varices" placeholder="Varices" value="<?= $row->varices ?>">
                             
                         </td>
                       </tr>
                     </table>
                   </td>
                   <td>

                      <textarea style="width:180px" class="form-control 0_cp_otro" placeholder="Otros"><?= $row->otro ?></textarea>
                      

                   </td>
                   <td>
                      <textarea style="width:240px" class="form-control 0_cp_evolution" placeholder="Evolución"><?= $row->evolution ?></textarea>
                     

                   </td>
                 </tr>
               <?php
                }
               
                ?>
<tr id="R${++rowIdx}">
                 <td>
				       
                 </td>
                 <td>
                   <input class="position-cont-pren" type="hidden" id="id_cont_prena" value="1" />
                    <input type="date" style="width:190px" class="form-control inputContPrenC currentDateCpEd" placeholder="Fecha de la consulta" id="cp_fecha">
                     <input type="hidden" class="form-control  con_pren_id_registro" value="0">


                 </td>
                 <td>

                    <input type="text" class="form-control 0_cp_semana inputContPrenC" id="cp_semana" >
                    
                   

                 </td>
                 <td>
                     <input type="text" style="width:100px" class="form-control 0_cp_peso inputContPrenC" id="cp_peso" >
                   
                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                          <input type="text" style="width:100px" class="form-control 0_cp_tension_art_max inputContPrenC" placeholder="max (mm)" id="cp_tension_art_max" >
                          

                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control 0_cp_tension_art_min inputContPrenC" placeholder="min (hg)" id="cp_tension_art_min">
                          
                       </td>
                     </tr>
                   </table>
                 </td>
                 <td>

                   <table>
                     <tr>
                       <td>
                       </td>
                       <td>
                         <input type="text" style="width:100px" class="form-control 0_cp_alt_ult inputContPrenC" placeholder="Alt. Ulterina" id="cp_alt_ult">
                         

                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control 0_cp_pubis_f inputContPrenC" placeholder="Pubis.FondoCef" id="cp_pubis_f">
                         
                       </td>
                       <td>-</td>
                       <td>
                         <input type="text" style="width:100px" class="form-control 0_cp_pelv_tr inputContPrenC" placeholder="Pelv.Tr" id="cp_pelv_tr">
                          
                       </td>
                     </tr>
                   </table>

                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                         
                         <input type="text" style="width:80px" class="form-control 0_cp_lat_min inputContPrenC" placeholder="lat./min." id="cp_lat_min">
                          
                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control 0_cp_mov_fet inputContPrenC"  placeholder="Mov.Fetal" id="cp_mov_fet">
                           
                       </td>
                     </tr>
                   </table>
                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                         <input type="text"  style="width:100px" class="form-control 0_cp_edema inputContPrenC" placeholder="Edema" id="cp_edema">
                          
                       </td>
                       <td>-</td>
                       <td>
                         <input type="text"  style="width:100px" class="form-control 0_cp_varices inputContPrenC" placeholder="Varices" id="cp_varices">
                         
                       </td>
                     </tr>
                   </table>
                 </td>
                 <td>

                   <textarea style="width:180px" class="form-control 0_cp_otro txArContPrenC" placeholder="Otros" id="cp_otro"></textarea>
                    

                 </td>
                 <td>
                    <textarea style="width:240px" class="form-control 0_cp_evolution txArContPrenC" placeholder="Evolución" id="cp_evolution"></textarea>
                   

                 </td>
               </tr>
           </tbody>
         </table>
		 
		 
       </div>
	    <?php if ($con_pren_data == 0) { ?>
       <button class="btn btn-md btn-primary" id="addBtn" type="button">
         <i class="bi bi-plus-circle"></i>
       </button>
	    <?php } ?>
	 <?php 
	
	 $this->session->set_userdata('isSeenToday', $isSeenToday);
	  $this->session->set_userdata('isBtnHsit', $isBtnHsit);
	  $this->session->set_userdata('number_of_view', $number_of_view);
	 if ($con_pren_data == 0) {

if($number_of_view > 0){

		 ?>
	 <div class="text-center">
	    <button class="btn btn-md btn-success " id="saveContPrenatal" type="button">
         <i class="bi bi-save"></i> Guardar Control Prenatal
       </button>
	  </div>
	 <?php }} if ($con_pren_data == 1) { ?>
         <div class="float-end">

         <!--  <button type="button" class="btn btn-primary" id="resetFormContPrena">Nuevo</button>-->
           <button type="button" class="btn btn-success  btn-sm" id="saveNewContPrena">Agregar </button>
           <span id="alert_placeholder_control_prena" style="position:absolute; " class="p-2"></span>
		 <?php  echo'<a class="btn btn-md btn-primary m-1" href="'.base_url().'print_page_historia_clinica/print_control_prenatal/'.$row->id_registro .'/'.$this->session->userdata('id_centro').'" target="_blank"><i class="fa fa-print"></i></a>';?>

         </div>
       <?php } ?>
	   
	   <script>
	   var field = document.querySelector('.currentDateCpEd');
var date = new Date();

// Set the date
field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + 
    '-' + date.getDate().toString().padStart(2, 0);
	   </script>
      