<?php foreach($show_enf as $row)$user_c16=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');$user_c17=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');$img=$this->db->select('image')->where('id_enfermedad',$row->id_enf)->get('saveEnfImage')->row('image');$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));$updated_time=date("d-m-Y H:i:s",strtotime($row->updated_time)); ?><style>@media (min-width:768px){.modal-inc-width1{width:900;margin:auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}}#zoomimg:hover{-ms-transform:scale(2);-webkit-transform:scale(2);transform:scale(3);transition:transform 1s linear;z-index:1000}.me-ctn{display:flex;flex-wrap:wrap;width:720px;justify-content:flex-start}.single-item{width:40%;height:40%;display:flex;align-items:center;justify-content:center;margin:20px}div.show-image{position:relative;float:left;margin:5px}div.show-image:hover button{display:block}div.show-image button{position:absolute;display:none}div.show-image button.update{top:0;left:0}div.show-image button.delete{top:0;left:79%}</style><div class="modal-header"id="background_"><button class="close"type="button"aria-hidden="true"data-dismiss="modal"title="Cierra"><i class="fa fa-times-circle"style="font-size:48px;color:red"></i></button><h5 class="modal-title">Enfermedad Actual #<?=$row->id_enf?></h5><span style="color:green"><?=$centro_name?></span><br><span>Creado por<?=$user_c16?>,<?=$inserted_time?></span><br><span style="color:red">Cambiado por<?=$user_c17?>,<?=$updated_time?></span></div><div class="modal-body"><?php if($row->inserted_by==$user||$perfil=="Admin"){ ?><button class="btn-sm btn-success show_modif_enf_act"type="button"><i class="fa fa-pencil"aria-hidden="true"></i> Editar</button><?php } ?><button class="btn-sm btn-success save_enf_act_hide"type="button"id="save_enf_act_hide"style="display:none"><i class="fa fa-floppy-o"aria-hidden="true"></i> Guardar</button> <a class="btn-sm"href="<?php echo base_url("printings/print_if_foto_/$row->id_enf/0/0/enf") ?>"style="cursor:pointer"target="_blank"title="Imprimir Antecedentes General"><i class="fa"style="font-size:24px"></i></a><hr id="hr_ad"><form class="disable-all form-horizontal"enctype="multipart/form-data"id="save-update-enf-act"><input id="id_enf"name="id_enf"type="hidden"value="<?=$row->id_enf?>"> <input id="updated_by"name="updated_by"type="hidden"value="<?=$user?>"><div class="form-group"><label class="col-md-3 control-label">Motivo de consulta</label><div class="col-md-9"><select class="form-control select2"id="enf_motivo1"name="enf_motivo1"><option hidden><?=$row->enf_motivo?></option><?php foreach($causa as $ca){echo '<option value="'.$ca->title.'">'.$ca->title.'</option>';} ?></select></div></div><div class="form-group"><label class="col-md-3 control-label">Sinopsis</label><div class="col-md-9"><textarea class="form-control"disabled id="enf_signopsis1"name="enf_signopsis1"rows="6"><?=$row->signopsis?></textarea></div></div><div class="form-group"><label class="col-md-3 control-label">Laboratorios (Resultados relevantes)</label><div class="col-md-9"><textarea class="form-control"disabled id="enf_laboratorios1"name="enf_laboratorios1"rows="6"><?=$row->laboratorios?></textarea></div></div><div class="form-group"><label class="col-md-3 control-label">Estudios (Resultados relevantes)</label><div class="col-md-9"><textarea class="form-control"disabled id="enf_estudios1"name="enf_estudios1"rows="6"><?=$row->estudios?></textarea></div></div><?php if($img!=""){ ?><div class="form-group"><label class="col-md-3 control-label">Estudio Imagen</label><div class="col-md-9"><div class="cont"><div class="container me-ctn"><?php $sql="SELECT image, id FROM  saveEnfImage WHERE id_enfermedad=$row->id_enf";$querysig=$this->db->query($sql);foreach($querysig->result()as $rf){ ?><div class="show-image single-item"id="zoomimg"><img class="img-responsive img-thumbnail"src="<?=base_url()?>/assets/update/<?php echo $rf->image; ?>"title="haga clic en la imagen para rotar"></div><?php } ?></div></div></div></div><?php } ?></form></div><script>$(".img-thumbnail").click(function(){"none"==$(this).css("transform")?$(this).css("transform","rotate(90deg)"):$(this).css("transform","")}),function(s){var n={items:{},container:null,totalPages:1,perPage:3,currentPage:0,createNavigation:function(){this.totalPages=Math.ceil(this.items.length/this.perPage),s(".pagination",this.container.parent()).remove();for(var a=s('<div class="pagination crs"></div>').append('<a  style="cursor:pointer;background:none;border:none;font-size:18px;font-weight:bold" class="nav prev disabled" data-next="false"><</a>'),t=0;t<this.totalPages;t++){var e="page";t||(e="page current");var i='<a style="cursor:pointer;background:none;border:none;font-size:18px;font-weight:bold" class="'+e+'" data-page="'+(t+1)+'">'+(t+1)+"</a>";a.append(i)}a.append('<a class="nav next" style="cursor:pointer;background:none;border:none;font-size:18px;font-weight:bold"  data-next="true">></a>'),this.container.after(a);var n=this;s(".pagination").off("click",".nav"),this.navigator=s(".pagination").on("click",".nav",function(){var a=s(this);n.navigate(a.data("next"))}),s(".pagination").off("click",".page"),this.pageNavigator=s(".pagination").on("click",".page",function(){var a=s(this);n.goToPage(a.data("page"))})},navigate:function(a){(isNaN(a)||void 0===a)&&(a=!0),s(".pagination .nav").removeClass("disabled"),a?(this.currentPage++,this.currentPage>this.totalPages-1&&(this.currentPage=this.totalPages-1),this.currentPage==this.totalPages-1&&s(".pagination .nav.next").addClass("disabled")):(this.currentPage--,this.currentPage<0&&(this.currentPage=0),0==this.currentPage&&s(".pagination .nav.prev").addClass("disabled")),this.showItems()},updateNavigation:function(){s(".pagination .page").removeClass("current"),s('.pagination .page[data-page="'+(this.currentPage+1)+'"]').addClass("current")},goToPage:function(a){this.currentPage=a-1,s(".pagination .nav").removeClass("disabled"),this.currentPage==this.totalPages-1&&s(".pagination .nav.next").addClass("disabled"),0==this.currentPage&&s(".pagination .nav.prev").addClass("disabled"),this.showItems()},showItems:function(){this.items.hide();var a=this.perPage*this.currentPage;this.items.slice(a,a+this.perPage).show(),this.updateNavigation()},init:function(a,t,e){this.container=a,this.currentPage=0,this.totalPages=1,this.perPage=e,this.items=t,this.createNavigation(),this.showItems()}};s.fn.pagify=function(a,t){var e=s(this),i=s(t,e);if((isNaN(a)||void 0===a)&&(a=3),i.length<=a)return!0;n.init(e,i,a)}}(jQuery),$(".me-ctn").pagify(4,".single-item")</script>