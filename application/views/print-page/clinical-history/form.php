  <input id='doesContPrFomHsData' type="hidden" value="<?=$con_pren_data?>" />
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

             <?php
              if ($con_pren_data == 1) {
                foreach ($query_con_pren_data as $row) {
              ?>
                 <tr id="R${++rowIdx}">
                   <td>
                   </td>
                   <td>
                     <input class="position-cont-pren" type="hidden" id="id_cont_prena" value="<?= $row->id ?>" />
                      <input type="date" style="width:190px" class="form-control 0_cp_fecha inputContPrenC" value="<?= $row->fecha ?>">
                   


                   </td>
                   <td>

                       <input type="text" class="form-control 0_cp_semana inputContPrenC"  value="<?= $row->semana ?>">
                     

                   </td>
                   <td>
                       <input type="text" style="width:100px" class="form-control 0_cp_peso inputContPrenC" placeholder="Peso (lb)" value="<?= $row->peso ?>">
                     
                   </td>
                   <td>
                     <table>
                       <tr>
                         <td>
                            <input type="text" style="width:100px" class="form-control 0_cp_tension_art_max inputContPrenC" placeholder="max (mm)" value="<?= $row->tension_art_max ?>">
                           

                         </td>
                         <td>-</td>
                         <td>
                           <input type="text" style="width:100px" class="form-control 0_cp_tension_art_min inputContPrenC" placeholder="min (hg)" value="<?= $row->tension_art_min ?>">
                            
                         </td>
                       </tr>
                     </table>
                   </td>
                   <td>

                     <table>
                       <tr>
                         <td>
                             <input type="text" style="width:100px" class="form-control 0_cp_alt_ult inputContPrenC" placeholder="Alt. Ulterina" value="<?= $row->alt_ult ?>">
                            

                         </td>
                         <td>-</td>
                         <td>
                            <input type="text" style="width:100px" class="form-control 0_cp_pubis_f inputContPrenC" placeholder="Pubis.FondoCef" value="<?= $row->pubis_f ?>">
                           
                         </td>
                         <td>-</td>
                         <td>
                            <input type="text" style="width:100px" class="form-control 0_cp_pelv_tr inputContPrenC" placeholder="Pelv.Tr" value="<?= $row->pelv_tr ?>">
                            
                         </td>
                       </tr>
                     </table>

                   </td>
                   <td>
                     <table>
                       <tr>
                         <td>
                            <input type="text" style="width:80px" class="form-control 0_cp_lat_min inputContPrenC" placeholder="lat./min." value="<?= $row->lat_min ?>">
                            
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
                           <input type="text" style="width:100px" class="form-control 0_cp_edema inputContPrenC" placeholder="Edema" value="<?= $row->edema ?>">
                             
                         </td>
                         <td>-</td>
                         <td>
                            <input type="text" style="width:100px" class="form-control 0_cp_varices inputContPrenC" placeholder="Varices" value="<?= $row->varices ?>">
                             
                         </td>
                       </tr>
                     </table>
                   </td>
                   <td>

                      <textarea style="width:180px" class="form-control 0_cp_otro txArContPrenC" placeholder="Otros"><?= $row->otro ?></textarea>
                      

                   </td>
                   <td>
                      <textarea style="width:240px" class="form-control 0_cp_evolution txArContPrenC" placeholder="Evolución"><?= $row->evolution ?></textarea>
                     

                   </td>
                 </tr>
               <?php
                }
              } else {
                ?>


               <tr id="R${++rowIdx}">
                 <td>
                 </td>
                 <td>
                   <input class="position-cont-pren" type="hidden" id="id_cont_prena" value="1" />
                    <input type="date" style="width:190px" class="form-control 0_cp_fecha inputContPrenC" placeholder="Fecha de la consulta">
                   


                 </td>
                 <td>

                    <input type="text" class="form-control 0_cp_semana inputContPrenC" placeholder="Semana">
                    
                   

                 </td>
                 <td>
                     <input type="text" style="width:100px" class="form-control 0_cp_peso inputContPrenC" placeholder="Peso (lb)">
                   
                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                          <input type="text" style="width:100px" class="form-control 0_cp_tension_art_max inputContPrenC" placeholder="max (mm)">
                          

                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control 0_cp_tension_art_min inputContPrenC" placeholder="min (hg)">
                          
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
                         <input type="text" style="width:100px" class="form-control 0_cp_alt_ult inputContPrenC" placeholder="Alt. Ulterina">
                         

                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control 0_cp_pubis_f inputContPrenC" placeholder="Pubis.FondoCef">
                         
                       </td>
                       <td>-</td>
                       <td>
                         <input type="text" style="width:100px" class="form-control 0_cp_pelv_tr inputContPrenC" placeholder="Pelv.Tr">
                          
                       </td>
                     </tr>
                   </table>

                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                         
                         <input type="text" style="width:80px" class="form-control 0_cp_lat_min inputContPrenC" placeholder="lat./min.">
                          
                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control 0_cp_mov_fet inputContPrenC"  placeholder="Mov.Fetal">
                           
                       </td>
                     </tr>
                   </table>
                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                         <input type="text"  style="width:100px" class="form-control 0_cp_edema inputContPrenC" placeholder="Edema">
                          
                       </td>
                       <td>-</td>
                       <td>
                         <input type="text"  style="width:100px" class="form-control 0_cp_varices inputContPrenC" placeholder="Varices">
                         
                       </td>
                     </tr>
                   </table>
                 </td>
                 <td>

                   <textarea style="width:180px" class="form-control 0_cp_otro txArContPrenC" placeholder="Otros"></textarea>
                    

                 </td>
                 <td>
                    <textarea style="width:240px" class="form-control 0_cp_evolution txArContPrenC" placeholder="Evolución"></textarea>
                   

                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
       </div>
       <button class="btn btn-md btn-primary" id="addBtn" type="button">
         <i class="bi bi-plus-circle"></i>
       </button>
       <?php if ($con_pren_data == 1) { ?>
         <div class="float-end">

           <button type="button" class="btn btn-primary" id="resetFormContPrena">Nuevo</button>
           <button type="button" class="btn btn-success" id="saveEditContPrena">Guardar </button>
           <span id="alert_placeholder_control_prena" style="position:absolute; " class="p-2"></span>
 <?php  echo'<a class="btn btn-md btn-primary m-1" href="'.base_url().'print_page_historia_clinica/print_control_prenatal/'.$row->id_registro .'/'.$this->session->userdata('id_centro').'" target="_blank"><i class="fa fa-print"></i></a>';?>

         </div>
       <?php } ?>
      