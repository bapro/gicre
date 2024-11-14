 <tr class="table-primary">
                 <td>
				           <button <?=$showCpBtnA?> type="button" class="btn btn-success  btn-md" id="saveNewContPrenaAgain">Agregar </button>    
                 </td>
                 <td>
                   <input class="position-cont-pren" type="hidden" id="id_cont_prena" value="1" />
                    <input type="date" style="width:190px" class="form-control inputContPrenC currentDateCp" placeholder="Fecha de la consulta" id="cp_fecha">
                     <input type="hidden" class="form-control  con_pren_id_registro" value="0">


                 </td>
                 <td>

                    <input type="text" class="form-control  inputContPrenC 0_cp_semana" id="cp_semana" value="<?=$semana_amorea?>">
                    
                   

                 </td>
                 <td>
                     <input type="text" style="width:100px" class="form-control  inputContPrenC 0_cp_peso" id="cp_peso" >
                   
                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                          <input type="text" style="width:100px" class="form-control  inputContPrenC 0_cp_tension_art_max" placeholder="max (mm)" id="cp_tension_art_max" >
                          

                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control  inputContPrenC 0_cp_tension_art_min" placeholder="min (hg)" id="cp_tension_art_min">
                          
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
                         <input type="text" style="width:100px" class="form-control  inputContPrenC" placeholder="Alt. Ulterina" id="cp_alt_ult">
                         

                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control  inputContPrenC" placeholder="Pubis.FondoCef" id="cp_pubis_f">
                         
                       </td>
                       <td>-</td>
                       <td>
                         <input type="text" style="width:100px" class="form-control  inputContPrenC" placeholder="Pelv.Tr" id="cp_pelv_tr">
                          
                       </td>
                     </tr>
                   </table>

                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                         
                         <input type="text" style="width:80px" class="form-control  inputContPrenC" placeholder="lat./min." id="cp_lat_min">
                          
                       </td>
                       <td>-</td>
                       <td>
                          <input type="text" style="width:100px" class="form-control  inputContPrenC"  placeholder="Mov.Fetal" id="cp_mov_fet">
                           
                       </td>
                     </tr>
                   </table>
                 </td>
                 <td>
                   <table>
                     <tr>
                       <td>
                         <input type="text"  style="width:100px" class="form-control  inputContPrenC" placeholder="Edema" id="cp_edema">
                          
                       </td>
                       <td>-</td>
                       <td>
                         <input type="text"  style="width:100px" class="form-control  inputContPrenC" placeholder="Varices" id="cp_varices">
                         
                       </td>
                     </tr>
                   </table>
                 </td>
                 <td>

                   <textarea style="width:180px" class="form-control  txArContPrenC" placeholder="Otros" id="cp_otro"></textarea>
                    

                 </td>
                 <td>
                    <textarea style="width:240px" class="form-control  txArContPrenC" placeholder="Evolución" id="cp_evolution"></textarea>
                   

                 </td>
               </tr>