<?php foreach($show_oft as $row)$user_c26=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');$user_c27=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));$updated_time=date("d-m-Y H:i:s",strtotime($row->updated_time)); ?><style>.control-label{font-size:16px}@media (min-width:768px){.modal-inc-width6{width:800;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}}</style><div class="modal-header"id="background_"><button class="close"type="button"aria-hidden="true"data-dismiss="modal"title="Cierra"><i class="fa fa-times-circle"style="font-size:48px;color:red"></i></button><h5 class="modal-title text-left">Examen Fisico Oftalmologia #<?=$row->id_oftal?></h5>Creado por :<?=$user_c26?>,<?=$inserted_time?><br><span style="color:red">Cambiado por :<?=$user_c27?>| fecha :<?=$updated_time?></span><br><button class="btn-sm btn-success show_modif_enf_act"type="button"><i class="fa fa-pencil"aria-hidden="true"></i> Editar</button> <button class="btn-sm btn-success save_enf_act_hide"type="button"id="save_of_hide"style="display:none"><i class="fa fa-floppy-o"aria-hidden="true"></i> Guardar</button> <a class="btn-sm"href="<?php echo base_url("printings/print_if_foto_/$row->id_oftal/0/0/ofal") ?>"style="cursor:pointer"target="_blank"title="Imprimir Oftalmologia"><i class="fa"style="font-size:24px"></i></a></div><div class="modal-body"style="max-height:calc(100vh - 210px);overflow-y:auto"><form class="disable-all form-horizontal"><input id="id_oftal"value="<?=$row->id_oftal?>"type="hidden"> <input id="updated_by"value="<?=$user?>"type="hidden"><div class="col-md-12"style=""><hr class="title-highline-top"><h4>AGUDESA VISUAL</h4><table class="table"style="width:70%"><tr><th></th><th>Sin Correccion</th><th>Con Correccion</th><th>Correccion Actual</th><tr><tr><th>OD</th><td><select class="form-control select2-of"id="od_sin_cone"><option><?=$row->od_sin_con?></option><option></option><option>20</option><option>25</option><option>30</option><option>40</option><option>80</option><option>100</option><option>150</option><option>200</option><option>300</option><option>400</option><option>600</option><option>C/D</option><option>P/L</option><option>N/PL</option><option>N/M</option></select></td><td><select class="form-control select2-of"id="od_con_core"><option><?=$row->od_con_cor?></option><option></option><option>20</option><option>25</option><option>30</option><option>40</option><option>80</option><option>100</option><option>150</option><option>200</option><option>300</option><option>400</option><option>600</option><option>C/D</option><option>P/L</option><option>N/PL</option><option>N/M</option></select></td><td><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->od_mas_o_meno=="mas"){$checked="checked";}else{$checked="";}echo"<input type='radio' value='mas' name='od_mas_o_menoe' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->od_mas_o_meno=="menos"){$checked="checked";}else{$checked="";}echo"<input type='radio' value='menos' name='od_mas_o_menoe' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="od_cor_acte"><option><?=$row->od_cor_act?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr><tr><th>OS</th><td><select class="form-control select2-of"id="os_sin_cone"><option><?=$row->os_sin_con?></option><option></option><option>20</option><option>25</option><option>30</option><option>40</option><option>80</option><option>100</option><option>150</option><option>200</option><option>300</option><option>400</option><option>600</option><option>C/D</option><option>P/L</option><option>N/PL</option><option>N/M</option></select></td><td><select class="form-control select2-of"id="os_con_core"><option><?=$row->os_con_cor?></option><option></option><option>20</option><option>25</option><option>30</option><option>40</option><option>80</option><option>100</option><option>150</option><option>200</option><option>300</option><option>400</option><option>600</option><option>C/D</option><option>P/L</option><option>N/PL</option><option>N/M</option></select></td><td><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->os_mas_o_meno=="mas"){$checked="checked";}else{$checked="";}echo"<input type='radio' value='mas' name='os_mas_o_menoe' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->os_mas_o_meno=="menos"){$checked="checked";}else{$checked="";}echo"<input type='radio' value='menos' name='os_mas_o_menoe' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="os_cor_acte"><option><?=$row->os_cor_act?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr></table></div><div class="col-md-12"style=""><hr class="title-highline-top"><div class="col-md-4"><h4 class="col-md-offset-10">RETINOSCOPIA</h4><table class="table"style="width:90%"><tr><td><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->masomenos1==1){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='1' name='masomenos1e' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->masomenos1==0){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='0' name='masomenos1e' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="retine1e"><option><?=$row->retine1?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td><td style="border-left:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->masomenos2==1){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='1' name='masomenos2e' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->masomenos2==0){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='0' name='masomenos2e' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="retine2e"><option><?=$row->retine2?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr><tr><td style="border-top:2px solid #38a7bb;border-right:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->masomenos3==1){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='1' name='masomenos3e' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->masomenos3==0){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='0' name='masomenos3e' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="retine3e"><option><?=$row->retine3?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td><td style="border-top:2px solid #38a7bb;border-left:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->masomenos4==1){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='1' name='masomenos4e' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->masomenos4==0){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='0' name='masomenos4e' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="retine4e"><option><?=$row->retine4?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr></table></div><div class="col-md-4"><br><br><table class="table"style="width:90%"><tr><td><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->masomenos5==1){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='1' name='masomenos5e' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->masomenos5==0){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='0' name='masomenos5e' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="retine5e"><option><?=$row->retine5?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td><td style="border-left:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->masomenos6==1){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='1' name='masomenos6e' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->masomenos6==0){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='0' name='masomenos6e' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="retine6e"><option><?=$row->retine6?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr><tr><td style="border-top:2px solid #38a7bb;border-right:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->masomenos7==1){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='1' name='masomenos7e' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->masomenos7==0){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='0' name='masomenos7e' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="retine7e"><option><?=$row->retine7?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td><td style="border-top:2px solid #38a7bb;border-left:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><?php if($row->masomenos8==1){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='1' name='masomenos8e' $checked>"; ?><span class="mas"style="font-weight:700">+</span><br><?php if($row->masomenos8==0){$checked="checked";}else{$checked="";}echo"&nbsp;&nbsp;<input type='radio' value='0' name='masomenos8e' $checked>"; ?><span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2-of"id="retine8e"><option><?=$row->retine8?></option><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr></table></div><div class="col-md-4 table-responsive"style="border-left:1px solid #cdcdcd"><h4>BALANCE MUSCULAR</h4><table class="table"style="width:100%"><tr><td><label>PPM</label></td><td><input id="ppme"value="<?=$row->ppm?>"class="form-control"></td></tr><tr><td><label>Converg</label></td><td><input id="converge"value="<?=$row->converg?>"class="form-control"></td></tr><tr><td><label>Duc. y Vers.</label></td><td><input id="ducverse"value="<?=$row->ducvers?>"class="form-control"></td></tr><tr><td><label>Cover test.</label></td><td><input id="converteste"value="<?=$row->convertest?>"class="form-control"></td></tr></table></div></div><div class="col-md-12"style=""><hr class="title-highline-top"><div class="col-md-6"style="border-right:1px solid #cdcdcd;border-bottom:1px solid #cdcdcd"><h4 class="h4">COMPARA HENDIDURA</h4><table class="table"style="width:100%"><tr><td><label>Conjuntiva</label></td><td><input id="conj1e"value="<?=$row->conj1?>"class="form-control"></td><td><input id="conj2e"value="<?=$row->conj2?>"class="form-control"></td></tr><tr><td><label>Cornea</label></td><td><input id="cornea1e"value="<?=$row->cornea1?>"class="form-control"></td><td><input id="cornea2e"value="<?=$row->cornea2?>"class="form-control"></td></tr><tr><td><label>Pupila</label></td><td><input id="pup1e"value="<?=$row->pup1?>"class="form-control"></td><td><input id="pup2e"value="<?=$row->pup2?>"class="form-control"></td></tr><tr><td><label>Cristalino</label></td><td><input id="crist1e"value="<?=$row->crist1?>"class="form-control"></td><td><input id="crist2e"value="<?=$row->crist2?>"class="form-control"></td></tr><tr><td><label>Vitreo</label></td><td><input id="vitreo1e"value="<?=$row->vitreo1?>"class="form-control"></td><td><input id="vitreo2e"value="<?=$row->vitreo2?>"class="form-control"></td></tr><tr><td><label>Nota</label></td><td colspan="2"><textarea class="form-control"id="not-oftmed"rows="6"><?=$row->nota?></textarea></td></tr></table></div><div class="col-md-6"><canvas height="200"id="canvas3"style="cursor:crosshair"width="690"></canvas></div></div><div class="col-md-12"style=""><div class="col-md-6"><h4 class="h4">FONDOSCOPIA</h4><table class="table"style="width:100%"><tr><td><input id="fondos1e"value="<?=$row->fondos1?>"class="form-control"></td><td><input id="fondos2e"value="<?=$row->fondos2?>"class="form-control"></td></tr></table></div><div class="col-md-6"style="border-top:1px solid #cdcdcd"><canvas height="200"id="canvas4"style="cursor:context-menu"width="690"title="Haz un clic para crear punto, Doble clic para quitar el punto"></canvas></div></div></form></div><script>$("#print_ofal_foto").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$(".select2-of").select2({tags:!0})</script>