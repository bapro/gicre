<style>.reduce-height{border:none;background:0 0}</style><br><h4 class="h4 his_med_title">Examen Fisico Oftalmologia (<b><?=$count_oft?>regitros (s)</b>)</h4><?php if($count_oft>0){$i=1;foreach($oftal as $row){$user_c24=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');$user_c25=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));$updated_time=date("d-m-Y H:i:s",strtotime($row->updated_time)); ?><div class="pagination"><a data-target="#ver_oft"data-toggle="modal"href="<?php echo base_url("admin_medico/show_oftalmologia/$row->id_oftal/$user_id") ?>"title="Creado por :<?=$user_c24?>, fecha :<?=$inserted_time?>Cambiado por :<?=$user_c25?>, fecha :<?=$updated_time?>"><?php echo $i;$i++; ?></a></div><?php } ?><br><?php }else{echo "<i><b>No hay registros</b></i>";} ?><div class="col-md-12"style=""><hr class="title-highline-top"><h4>AGUDESA VISUAL</h4><table class="table"style="width:70%"><tr><th></th><th>Sin Correccion</th><th>Con Correccion</th><th>Correccion Actual</th></tr><tr><th title="Este campo debe ser lleno para guardar sus datos">OD <span style="color:red">*</span></th><td title="Este campo debe ser lleno para guardar sus datos"><select class="form-control select2"id="od_sin_con"style="width:20%"title="Este campo debe ser lleno para guardar todos"><option value="">No me dejes vacía</option><option>20</option><option>25</option><option>30</option><option>40</option><option>80</option><option>100</option><option>150</option><option>200</option><option>300</option><option>400</option><option>600</option><option>C/D</option><option>P/L</option><option>N/PL</option><option>N/M</option></select></td><td><select class="form-control select2"id="od_con_cor"><option></option><option>20</option><option>25</option><option>30</option><option>40</option><option>80</option><option>100</option><option>150</option><option>200</option><option>300</option><option>400</option><option>600</option><option>C/D</option><option>P/L</option><option>N/PL</option><option>N/M</option></select></td><td><div class="input-group"><span class="input-group-addon reduce-height"><input name="od_mas_o_meno"type="radio"value="mas"> <span class="mas"style="font-weight:700">+</span><br><input name="od_mas_o_meno"type="radio"value="menos"> <span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2"id="od_cor_act"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr><tr><th>OS</th><td><select class="form-control select2"id="os_sin_con"><option></option><option>20</option><option>25</option><option>30</option><option>40</option><option>80</option><option>100</option><option>150</option><option>200</option><option>300</option><option>400</option><option>600</option><option>C/D</option><option>P/L</option><option>N/PL</option><option>N/M</option></select></td><td><select class="form-control select2"id="os_con_cor"><option></option><option>20</option><option>25</option><option>30</option><option>40</option><option>80</option><option>100</option><option>150</option><option>200</option><option>300</option><option>400</option><option>600</option><option>C/D</option><option>P/L</option><option>N/PL</option><option>N/M</option></select></td><td><div class="input-group"><span class="input-group-addon reduce-height"><input name="os_mas_o_meno"type="radio"value="mas"> <span class="mas"style="font-weight:700">+</span><br><input name="os_mas_o_meno"type="radio"value="menos"> <span class="menos"style="font-weight:700">-</span> </span><select class="form-control select2"id="os_cor_act"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr></table></div><div class="col-md-12"style=""><hr class="title-highline-top"><div class="col-md-4"><h4 class="col-md-offset-10">RETINOSCOPIA</h4><table class="table"style="width:90%"><tr><td><div class="input-group"><span class="input-group-addon reduce-height"><input name="masomenos1"type="radio"value="1"> +<br><input name="masomenos1"type="radio"value="0"> - </span><select class="form-control select2"id="retine1"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td><td style="border-left:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><input name="masomenos2"type="radio"value="1"> +<br><input name="masomenos2"type="radio"value="0"> - </span><select class="form-control select2"id="retine2"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr><tr><td style="border-top:2px solid #38a7bb;border-right:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><input name="masomenos3"type="radio"value="1"> +<br><input name="masomenos3"type="radio"value="0"> - </span><select class="form-control select2"id="retine3"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td><td style="border-top:2px solid #38a7bb;border-left:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><input name="masomenos4"type="radio"value="1"> +<br><input name="masomenos4"type="radio"value="0"> - </span><select class="form-control select2"id="retine4"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr></table></div><div class="col-md-4"><br><br><table class="table"style="width:90%"><tr><td><div class="input-group"><span class="input-group-addon reduce-height"><input name="masomenos5"type="radio"value="1"> +<br><input name="masomenos5"type="radio"value="0"> - </span><select class="form-control select2"id="retine5"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td><td style="border-left:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><input name="masomenos6"type="radio"value="1"> +<br><input name="masomenos6"type="radio"value="0"> - </span><select class="form-control select2"id="retine6"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr><tr><td style="border-top:2px solid #38a7bb;border-right:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><input name="masomenos7"type="radio"value="1"> +<br><input name="masomenos7"type="radio"value="0"> - </span><select class="form-control select2"id="retine7"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td><td style="border-top:2px solid #38a7bb;border-left:2px solid #38a7bb"><div class="input-group"><span class="input-group-addon reduce-height"><input name="masomenos8"type="radio"value="1"> +<br><input name="masomenos8"type="radio"value="0"> - </span><select class="form-control select2"id="retine8"><option></option><option>0.50</option><option>1.00</option><option>1.50</option><option>2.00</option><option>2.50</option><option>3.00</option><option>3.50</option><option>4.00</option><option>4.50</option><option>5.00</option><option>5.50</option><option>6.00</option><option>6.50</option><option>7.00</option><option>7.50</option><option>8.00</option><option>8.50</option><option>9.00</option><option>9.50</option><option>10.00</option><option>10.50</option><option>11.00</option><option>11.50</option><option>12.00</option><option>12.50</option><option>13.00</option><option>13.50</option><option>14.00</option><option>15.00</option><option>15.50</option><option>16.00</option><option>16.50</option><option>17.00</option><option>17.50</option><option>18.00</option><option>18.50</option><option>19.00</option><option>19.50</option><option>20.00</option></select></div></td></tr></table></div><div class="col-md-4 table-responsive"style="border-left:1px solid #cdcdcd"><h4>BALANCE MUSCULAR</h4><table class="table"style="width:100%"><tr><td><label>PPM</label></td><td><input class="form-control"id="ppm"></td></tr><tr><td><label>Converg</label></td><td><input class="form-control"id="converg"></td></tr><tr><td><label>Duc. y Vers.</label></td><td><input class="form-control"id="ducvers"></td></tr><tr><td><label>Cover test.</label></td><td><input class="form-control"id="convertest"></td></tr></table></div></div><div class="col-md-12"style=""><hr class="title-highline-top"><div class="col-md-7"style="border-right:1px solid #cdcdcd;border-bottom:1px solid #cdcdcd"><h4 class="h4">LAMPARA DE HENDIDURA</h4><table class="table"style="width:100%"><tr><td><label>Conjuntiva</label></td><td><input class="form-control"id="conj1"></td><td><input class="form-control"id="conj2"></td></tr><tr><td><label>Cornea</label></td><td><input class="form-control"id="cornea1"></td><td><input class="form-control"id="cornea2"></td></tr><tr><td><label>Pupila</label></td><td><input class="form-control"id="pup1"></td><td><input class="form-control"id="pup2"></td></tr><tr><td><label>Cristalino</label></td><td><input class="form-control"id="crist1"></td><td><input class="form-control"id="crist2"></td></tr><tr><td><label>Vitreo</label></td><td><input class="form-control"id="vitreo1"></td><td><input class="form-control"id="vitreo2"></td></tr><tr><td><label>Nota</label></td><td colspan="2"><button class="btn btn-primary btn-sm"id="btnSpeechOftal1"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechOftal1"></span> <textarea class="form-control"id="not-oftm"rows="8"></textarea></td></tr></table></div><div class="col-md-5"id="div-ojo"><canvas height="200"id="canvas2"style="cursor:context-menu"title="Haz un clic para crear punto, Doble clic para quitar el punto"width="690"></div></div><div class="col-md-12"style=""><div class="col-md-7"><h4 class="h4">FONDOSCOPIA</h4><table class="table"style="width:100%"><tr><td><input class="form-control"id="fondos1"></td><td><input class="form-control"id="fondos2"></td></tr></table></div><div class="col-md-5"style="border-top:1px solid #cdcdcd"id="frame-fondo1"><canvas height="200"id="canvas"style="cursor:context-menu"title="Haz un clic para crear punto, Doble clic para quitar el punto"width="690"></canvas></div></div><div class="fade modal"id="ver_oft"role="dialog"tabindex="-1"><div class="modal-dialog"style="width:100%"><div class="modal-content"></div></div></div><div class="fade modal"id="of-ref-mdl"role="dialog"tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>

var btnSpeechOftal1=document.getElementById("btnSpeechOftal1");btnSpeechOftal1.onclick=function(){var t=document.getElementById("not-oftm"),o=document.getElementById("actionSpeechOftal1");runSpeechRecognition(t,o)},$("#of-ref-mdl").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")});let pointSizeOjo=3;var points2Ojo=[],timeout2Ojo=300,clicks2Ojo=0;const canvas2Ojo=document.getElementById("canvas2"),ctx2Ojo=canvas2Ojo.getContext("2d");let cw2Ojo=canvas2Ojo.width=400,ch2Ojo=canvas2Ojo.height=200;function getPosition2Ojo(t){var o=canvas2Ojo.getBoundingClientRect();return{x:t.clientX-o.left,y:t.clientY-o.top}}function drawCoordinates2Ojo(t,o){ctx2Ojo.fillStyle="#ff2626",ctx2Ojo.beginPath(),ctx2Ojo.arc(t.x,t.y,o,0,2*Math.PI,!0),ctx2Ojo.fill()}canvas2Ojo.addEventListener("click",function(t){clicks2Ojo++;var o=getPosition2Ojo(t);drawCoordinates2Ojo(o,pointSizeOjo),1==clicks2Ojo&&setTimeout(function(){if(1==clicks2Ojo)points2Ojo.push(o);else{for(let t=0;t<points2Ojo.length;t++)if(ctx2Ojo.beginPath(),ctx2Ojo.arc(points2Ojo[t].x,points2Ojo[t].y,pointSizeOjo,0,2*Math.PI,!0),ctx2Ojo.isPointInPath(o.x,o.y)){points2Ojo.splice(t,1);break}ctx2Ojo.clearRect(0,0,cw2Ojo,ch2Ojo)}ctx2Ojo.drawImage(base_imageOjo,0,0),points2Ojo.map(t=>{drawCoordinates2Ojo(t,pointSizeOjo)}),clicks2Ojo=0},timeout2Ojo)});var canvasLojo=document.getElementById("canvas2"),contextL=canvasLojo.getContext("2d");function ojo1(){base_imageOjo=new Image,base_imageOjo.src="<?= base_url();?>assets/img/historial_medical/output-onlinepngtools.png",base_imageOjo.onload=function(){contextL.drawImage(base_imageOjo,0,0)}}ojo1();var canvas21=document.getElementById("canvas");let pointSize=3;var points=[],timeout=300,clicks=0;const canvas=document.getElementById("canvas"),ctx=canvas.getContext("2d");let cw=canvas.width=400,ch=canvas.height=160;function getPosition(t){var o=canvas.getBoundingClientRect();return{x:t.clientX-o.left,y:t.clientY-o.top}}function drawCoordinates(t,o){ctx.fillStyle="#ff2626",ctx.beginPath(),ctx.arc(t.x,t.y,o,0,2*Math.PI,!0),ctx.fill()}canvas.addEventListener("click",function(t){clicks++;var o=getPosition(t);drawCoordinates(o,pointSize),1==clicks&&setTimeout(function(){if(1==clicks)points.push(o);else{for(let t=0;t<points.length;t++)if(ctx.beginPath(),ctx.arc(points[t].x,points[t].y,pointSize,0,2*Math.PI,!0),ctx.isPointInPath(o.x,o.y)){points.splice(t,1);break}ctx.clearRect(0,0,cw,ch)}ctx.drawImage(base_image1,0,0),points.map(t=>{drawCoordinates(t,pointSize)}),clicks=0},timeout)});var canvasOjo1=document.getElementById("canvas"),context1=canvasOjo1.getContext("2d");function fondo1(){base_image1=new Image,base_image1.src="<?= base_url();?>assets/img/historial_medical/fodoscopia111.png",base_image1.onload=function(){context1.drawImage(base_image1,0,0)}}fondo1();
</script>