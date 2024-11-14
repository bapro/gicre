<?php 
//echo "Is pregnant end ". $is_pregnant_end_."<br/>";
if( $is_pregnant_end_ == 1 ) {?>
<em class="text-danger">Este Embarazo esta finalizado.</em>
	<?php } 

   foreach ($query_con_pren_data as $rowid) 
				  $paramscp = array('table' => 'h_c_control_prenatal', 'id' => $rowid->id);
        echo $this->user_register_info->get_operation_info($paramscp);

	?>
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
        $icp = 1;
				
                foreach ($query_con_pren_data as $row) {
              ?>
                 <tr>
                   <td>
				  # <?php echo $icp ++; ?> 
                   </td>
                   <td>
                     <input class="0_id_cont_prena" type="hidden" value="<?= $row->id ?>" />
                      <input type="date" style="width:190px" class="form-control 0_cp_fecha " value="<?= $row->fecha ?>">
                   
                    <input type="hidden" class="form-control  con_pren_id_registro" value="<?= $row->id_registro ?>">

                   </td>
                   <td>

                       <input type="text" class="form-control 0_cp_semana "  value="<?= $row->semana ?>">
                     

                   </td>
                   <td>
                       <input type="text" style="width:100px" class="form-control 0_cp_peso" placeholder="Peso (lb)" value="<?= $row->peso ?>">
                     
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
				if( $is_pregnant_end_ == 0 ) {
          $this->load->view('clinical-history/ginecology/control-prenatal/td-inputs');
				}
                ?>
               
           </tbody>
         </table>
		 
		 
       </div>
	 <div class="float-end">
	<!--<?php if( $is_pregnant_end_ == 1 ) {?>
	<button type="button" class="btn btn-primary"  <?=$disabled_new_preg?> id="newContPrenaForm">Nuevo Embarazo</button>
	<?php } ?>-->
		    <button type="button" class="btn btn-success" id="saveChangedCp">Guardar Cambio</button>
         <button type="button" class="btn btn-primary" id="endPregnancyBtn" <?=$end_preg_btn?> ><?=$end_preg_btn_text?></button>
        <span id="alert_placeholder_control_prena" style="position:absolute; " class="p-2"></span>
		 <?php  echo'<a class="btn btn-md btn-primary m-1" href="'.base_url().'print_page_historia_clinica/print_control_prenatal/'.$row->id_registro .'/'.$this->session->userdata('id_centro').'" target="_blank"><i class="fa fa-print"></i></a>';?>

         </div>
    
	   
	   <script>
	   var field = document.querySelector('.currentDateCp');
var date = new Date();

// Set the date
field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + 
    '-' + date.getDate().toString().padStart(2, 0);
	
	$("#doesContPrFomHsData").val(1);
	   </script>
      