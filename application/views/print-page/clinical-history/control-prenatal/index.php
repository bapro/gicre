<div class='hr'>
<table  style="width:100%" >
<thead>
<tr class="trbgc">
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
    <tbody>
    <?php

	 foreach($query->result() as $rowData)

	 {
		
		 ?>
     <tr>
                   <td>
                    <?= $rowData->fecha ?>
                     </td>
                   <td>

                   <?= $rowData->semana ?>
                     

                   </td>
                   <td>
                    <?= $rowData->peso ?>
                     
                   </td>
                   <td>
                     <table>
                       <tr>
                         <td>
                       <?= $rowData->tension_art_max ?>
                           

                         </td>
                         <td>-</td>
                         <td>
                         <?= $rowData->tension_art_min ?>
                            
                         </td>
                       </tr>
                     </table>
                   </td>
                   <td>

                     <table>
                       <tr>
                         <td>
                  <?= $rowData->alt_ult ?>
                            

                         </td>
                         <td>-</td>
                         <td>
                       <?= $rowData->pubis_f ?>
                           
                         </td>
                         <td>-</td>
                         <td>
                     <?= $rowData->pelv_tr ?>
                            
                         </td>
                       </tr>
                     </table>

                   </td>
                   <td>
                     <table>
                       <tr>
                         <td>
              <?= $rowData->lat_min ?>
                            
                         </td>
                         <td>-</td>
                         <td>
                         <?= $rowData->mov_fet ?>
                            
                         </td>
                       </tr>
                     </table>
                   </td>
                   <td>
                     <table>
                       <tr>
                         <td> 
                       <?= $rowData->edema ?>
                             
                         </td>
                         <td>-</td>
                         <td>
                       <?= $rowData->varices ?>
                             
                         </td>
                       </tr>
                     </table>
                   </td>
                   <td>

                  <?= $rowData->otro ?>
                      

                   </td>
                   <td>
                 <?= $rowData->evolution ?>
                     

                   </td>
                 </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
</div>


<div class="footer">
<?php 
 $user_name = $this->db->select('name')->where('id_user', $this->session->userdata('user_id'))->get('users')->row('name');
 echo "Doctor(a) $user_name";
 

?>
</div>