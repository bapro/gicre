<!doctypehtml><html lang="en"><head><meta charset="utf-8"><title>HISTORIAL CLINICA</title><link href="<?=base_url()?>assets/img/adms.png"rel="shortcut icon"type="image/x-icon"><link href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral"rel="stylesheet"><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"rel="stylesheet"><link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"rel="stylesheet"><link href="<?=base_url()?>assets/css/custom.css"rel="stylesheet"><link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"rel="stylesheet"><link href="<?=base_url()?>assets/css/historial_clinical.css"rel="stylesheet"><link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"rel="stylesheet"><link href="<?=base_url()?>assets/css/bootstrap-datetimepicker.min.css"rel="stylesheet"><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script><script src="https://momentjs.com/downloads/moment-with-locales.js"></script><script>moment.locale("es")</script><style>@media (min-width:992px){.modal-lg{width:auto}}.modal-lg{width:1200px;height:900px}.im-bg{background-image:url(<?=base_url()?>assets/img/historial_medical/hist-fondo.png);background-repeat:no-repeat;background-size:cover}#remove-btn{background:0 0!important;border:none;padding:0!important;color:#069;font-size:11px;cursor:pointer}.paginationh{display:flex}#paginationh{overflow-x:auto;width:100%}ul.paginationh{list-style:none;text-align:center;font-size:12px}li.paninate-li{list-style:none;float:left;margin-right:16px;padding:5px;border:2px solid #0063dc;background:#dcdcdc;color:#0063dc}li.paninate-li:hover{color:#ff0084;cursor:pointer}</style><script>var interval;function hidePopAfterOnlineInternetConnection(){$("#myModalConnection").modal("hide"),$("#myModalConnectionBack").modal({backdrop:"static",keyboard:!1}),$("#time").text()<=0?window.location.href="<?php echo base_url(); ?>/login/admin_logout":(clearInterval(interval),setTimeout(function(){$("#myModalConnectionBack").modal("hide")},2e3))}function showPopForOfflineConnection(){$("#myModalConnection").modal({backdrop:"static",keyboard:!1}),TimeDecrement()}function TimeDecrement(){var n=60;interval=setInterval(function(){if(--n<=0)return clearInterval(interval),void $("#timer").html("Vuelve a Loguearse cuanda la conexión se restablesca.");$("#time").text(n),console.log("Timer --\x3e "+n)},1e3)}window.addEventListener("offline",function(n){showPopForOfflineConnection()}),window.addEventListener("online",function(n){hidePopAfterOnlineInternetConnection()})</script></head><body><?php foreach($patient as $row) ?><nav class="im-bg navbar navbar-default navbar-fixed-top"><div style="margin-left:3%"><div class="navbar-header"><button class="collapsed navbar-toggle"type="button"aria-controls="navbar"aria-expanded="false"data-target="#navbar"data-toggle="collapse"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button><?php if($areaid==0){$controller="admin";$page="appointments";$go_back_cita="<a style='color:#B22222;' href='".base_url()."admin/appointments/' >Citas</a>";}else{$controller="medico";$go_back_cita=" <a style='color:#B22222;' href='".base_url()."medico/' >Citas</a>";$page="";}$this->padron_database=$this->load->database('padron',TRUE);foreach($HISTORIAL_MEDICAL as $row)if($row->photo=="padron"){$photo=$this->padron_database->select('IMAGEN')->where('MUN_CED',$row->ced1)->where('SEQ_CED',$row->ced2)->where('VER_CED',$row->ced3)->get('fotos')->row('IMAGEN');if($photo){ ?><a href="<?php echo base_url("admin_medico/zoom_image/$row->ced1/$row->ced2/$row->ced3") ?>"data-toggle="modal"data-target="#zoomimage"title="Haga un clic para agrandar."><?php $imgpat='<img  style="width:75px;"  src="data:image/jpeg;base64,'.base64_encode($photo).'"  />';echo $imgpat;echo "</a>";}else{echo "<a>";$imgpat='<img  style="width:75px;" src="'.base_url().'/assets/img/user.png"  />';echo $imgpat; ?></a><?php }$sexo="";}else if($row->photo==""){$sex=substr($row->sexo,0,3);$sexo="<li><a style='color:#209BD8;' title='$row->sexo'>$sex.</a></li>";echo '<img  style="width:75px;" src="'.base_url().'/assets/img/user.png"  />';}else{$sexo=""; ?><a href="<?php echo base_url("admin_medico/zoom_image_ad/$row->id_p_a") ?>"data-toggle="modal"data-target="#zoomimagead"><img src="<?=base_url()?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"style="width:75px;height:75px"> </a><?php } ?></div><div class="collapse navbar-collapse"id="navbar"><?php foreach($HISTORIAL_MEDICAL as $historial_medical)$dato_citas=$this->db->select('nec,fecha_propuesta')->where('id_patient',$historial_medical->id_p_a)->get('rendez_vous')->row_array();$seguro_medico_name=$this->db->select('title')->where('id_sm',$historial_medical->seguro_medico)->get('seguro_medico')->row('title'); ?><ul class="nav navbar-nav"style="background:#fff;opacity:.8"><li><a style="color:#209bd8;text-transform:uppercase"><?=$historial_medical->nombre?></a></li><?=$sexo?><li><a style="color:#209bd8"><?=getPatientAge($historial_medical->date_nacer)?></a></li><li class="dropdown"><a style="color:#209bd8"href="#"data-toggle="dropdown"aria-expanded="false"aria-haspopup="true"class="dropdown-toggle"role="button">Mas <span class="caret"></span></a><ul class="dropdown-menu not-me"><li><a style="color:#209bd8"><?=$historial_medical->nacionalidad?></a></li><li><a style="color:#209bd8"><b>CEDULA :</b><?=$historial_medical->cedula?></a></li><li><a style="color:#209bd8"><b>NEC : </b><?=$historial_medical->nec1?></a></li><li><a style="color:#209bd8"><b>FRECUENCIA :</b><?=$historial_medical->frecuencia?></a></li><li style><a style="color:#209bd8"><b>ARS :</b><?=$seguro_medico_name?></a></li><li><a style="color:navy;outline:0"href="<?php echo base_url('admin_medico/showMedicine/'.$id_historial) ?>"data-toggle="modal"data-target="#medicaha">Medicamentos Habituales</a></li><li><a style="color:navy;outline:0"href="<?php echo base_url('admin_medico/showAlegicos/'.$id_historial) ?>"data-toggle="modal"data-target="#alergicos">Alergicos</a></li><li><a style="color:red;font-weight:700"href="<?php echo base_url("admin_medico/reportHistorialMenu/$user_id/$id_historial/$centro_medico/1") ?>"data-toggle="modal"data-target="#cirugia_general">REPORTE GENERAL<?=$count_gnl?></a></li><li><a style="color:red;font-weight:700"href="<?php echo base_url("$controller/orden_medica/$user_id/$id_historial") ?>">ORDEN MEDICA<?=$count_ord?></a></li><?php if($areaid==0||$areaid==30){ ?><li><a style="color:red;font-weight:700"href="<?php echo base_url("admin_medico/reportHistorialMenu/$user_id/$id_historial/$centro_medico/2") ?>"data-toggle="modal"data-target="#cirugia_toracico">REPORTE FIBROBRONCOSCOPIA<?=$count_fib?></a></li><?php }if($areaid==0||$areaid==33){ ?><li><a style="color:red;font-weight:700"href="<?php echo base_url("admin_medico/reportHistorialMenu/$user_id/$id_historial/$centro_medico/4") ?>"data-toggle="modal"data-target="#ipss2">IPSS<?=$count_ipps?></a></li><?php } ?><li><a style="color:red;font-weight:700"href="<?php echo base_url("admin_medico/reportHistorialMenu/$user_id/$id_historial/$centro_medico/3") ?>"data-toggle="modal"data-target="#quirurgia">DESCRIPCION QUIRURGICA<?=$count_qui?></a></li><li><a style="color:red;font-weight:700"href="<?php echo base_url("admin_medico/reportHistorialMenu/$user_id/$id_historial/$centro_medico/5") ?>"data-toggle="modal"data-target="#cardiologia">EVALUACION CARDIOVASCULAR<?=$count_card?></a></li><?php foreach($tutor as $tut){$patient=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$tut->id_tutor)->get('patients_appointments')->row_array();$id_tutor_h=encrypt_url($tut->id_tutor);$user_id_h=encrypt_url($user_id);$areaid_h=encrypt_url($areaid);$centro_medico_h=encrypt_url($centro_medico);$hist_h=encrypt_url($hist);$trueuser_h=encrypt_url($trueuser); ?><li style="border-top:1px solid #a3adba"><?php if($patient['photo']=="padron"){$photo=$this->padron_database->select('IMAGEN')->where('MUN_CED',$patient['ced1'])->where('SEQ_CED',$patient['ced2'])->where('VER_CED',$patient['ced3'])->get('fotos')->row('IMAGEN');echo '<img style="width:50px;"   src="data:image/jpeg;base64,'.base64_encode($photo).'" />';}else if($patient['photo']==""){}else{ ?><img src="<?=base_url()?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"style="float:left;width:50px"><?php } ?><a href="<?php echo site_url("$controller/historial_medical_past/$id_tutor_h/$user_id_h/$areaid_h/$centro_medico_h/$hist_h/$trueuser_h"); ?>"target="_blank"><strong><?=$tut->relacion?></strong>:<?=$tut->name_tutor?></a></li><?php } ?></ul></li><li><?=$go_back_cita?></li><li><a>en modo vista</a></li></ul><ul class="nav navbar-nav navbar-right"style="margin-right:3%"><li id="working-doc"></li><li><a><button class="btn btn-md btn-success"type="submit"disabled><i aria-hidden="true"class="fa fa-floppy-o"></i> Guardar</button></a></li></ul></div><span class="alert alert-danger required-menu"style="margin-left:35%;margin-top:-4%;position:absolute;display:none;opacity:.9">! Tiene campos requeridos en el menú <strong id="menu-name-req"></strong> !</span></div></nav><?php function getPatientAge($birthday){$age='';$diff=date_diff(date_create(),date_create($birthday));$years=$diff->format("%y");$months=$diff->format("%m");$days=$diff->format("%d");if($years){$age=($years<2)?'1 año':"$years años";}else{$age='';if($months)$age.=($months<2)?'1 mes ':"$months meses ";if($days)$age.=($days<2)?'1 día':"$days días";}return trim($age);}$option=''; ?><div class="fade modal"id="myModalConnection"role="dialog"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><div class="alert text-center alert-danger"><h4>Parece que su conexión a Internet está fuera de línea.</h4></div><div class="alert text-center alert-warning"><i><span id="timer"><span id="time">60</span> segundos</span></i></div></div></div></div></div><div class="fade modal"id="myModalConnectionBack"role="dialog"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><div class="alert text-center alert-success"><h4>Esta connectado.</h4></div></div></div></div></div><div class="fade modal"id="cirugia_general"role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div><div class="fade modal"id="cirugia_toracico"role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div><div class="fade modal"id="quirurgia"role="dialog"><div class="modal-dialog  modal-lg"><div class="modal-content"></div></div></div><div class="fade modal"id="ipss2"role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div><div class="fade modal"id="cardiologia"role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div><div class="fade modal"id="orden_medica"role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div><script>$("#orden_medica").on("hidden.bs.modal",function(){}),$("#cardiologia").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ipss2").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#cirugia_general").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#cirugia_toracico").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#quirurgia").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")})</script><style>@media (min-width:768px){.hd-re{width:990;margin:auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}}</style><?php  ?>