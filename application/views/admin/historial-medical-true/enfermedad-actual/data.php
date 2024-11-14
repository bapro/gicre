<?php
foreach($show_enf as $row)
$user_c16=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c17=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$img=$this->db->select('image')->where('id_enfermedad',$row->id_enf)->get('saveEnfImage')->row('image');
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));

?>
<style>
@media (min-width: 768px) {
  .modal-inc-width1 {
    width: 900;
    margin:  auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

#zoomimg:hover {
  -ms-transform: scale(2); /* IE 9 */
  -webkit-transform: scale(2); /* Safari 3-8 */
  transform: scale(3);
transition: transform 1s linear;  
  z-index:1000
}


.me-ctn{
  display:flex;
  flex-wrap:wrap;
  width:720px;
  justify-content:flex-start;
}
.single-item{
  width:40%;
  height:40%;
  display:flex;
  align-items:center;
  justify-content:center;
  margin: 20px;

}

div.show-image {
    position: relative;
    float:left;
    margin:5px;
}
div.show-image:hover img{
   /* opacity:0.5;*/
}
div.show-image:hover button {
    display: block;
}
div.show-image button {
    position:absolute;
    display:none;
}
div.show-image button.update {
    top:0;
    left:0;
}
div.show-image button.delete {
    top:0;
    left:79%;
}
</style>
<div class="modal-header "  id="background_">
<button  type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i style="font-size:48px;color:red" class="fa fa-times-circle" ></i></button>

<h5 class="modal-title"  >Enfermedad Actual # <?=$row->id_enf?></h5>
<span style='color:green'><?=$centro_name?></span><br/>
<span>Creado por <?=$user_c16?>, <?=$inserted_time?></span><br/> 
 <span style="color:red"> Cambiado por <?=$user_c17?>, <?=$updated_time?></span> 
</div>
<div class="modal-body" >
<?php if($row->inserted_by==$user || $perfil=="Admin") {?>
<button type="button" class="show_modif_enf_act btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="save_enf_act_hide" class="save_enf_act_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 <a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id_enf/0/0/enf")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
<hr id="hr_ad"/>
<form  id="save-update-enf-act" class="form-horizontal disable-all" enctype="multipart/form-data" >
<input type="hidden" name="id_enf" id="id_enf" value="<?=$row->id_enf?>">
<input type="hidden" name="updated_by" id="updated_by" value="<?=$user?>">
<div class="form-group">
<label class="control-label col-md-3" >Motivo de consulta</label>
<div class="col-md-9">
<select class="form-control select2" name="enf_motivo1" id="enf_motivo1" >
<option hidden><?=$row->enf_motivo; ?></option>
<?php 

foreach($causa as $ca)
{ 
echo '<option value="'.$ca->title.'">'.$ca->title.'</option>';
}
?>

</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-3" >Sinopsis</label>
<div class="col-md-9">
<textarea class="form-control" rows="6"  name="enf_signopsis1" id="enf_signopsis1" disabled><?=$row->signopsis; ?></textarea>
</div>

</div>
 
<div class="form-group">
<label class="control-label col-md-3" >Laboratorios (Resultados relevantes)</label>
<div class="col-md-9">
<textarea class="form-control" rows="6"  name="enf_laboratorios1" id="enf_laboratorios1" disabled><?=$row->laboratorios; ?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Estudios (Resultados relevantes)</label>
<div class="col-md-9">
<textarea class="form-control"  rows="6"  name="enf_estudios1" id="enf_estudios1" disabled><?=$row->estudios; ?></textarea>
</div>
</div>
<?php if($img !=""){ ?>
<div class="form-group">
<label class="control-label col-md-3" >Estudio Imagen</label>

<div class="col-md-9">
<div class="cont">
<div class="container me-ctn">
<?php 

$sql ="SELECT image, id FROM  saveEnfImage WHERE id_enfermedad=$row->id_enf";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){

?>
<div id='zoomimg' class="single-item show-image">
<img   title='haga clic en la imagen para rotar' class="img-responsive img-thumbnail" src="<?= base_url();?>/assets/update/<?php echo $rf->image; ?>"  />
   <!-- <button class="update" type="button" id='<?=$rf->id?>' ><i class="fa fa-pencil" aria-hidden="true"></i></button>
    <button class="delete delete-image" type="button" id='<?=$rf->id?>' style='color:red'><i class="fa fa-trash" aria-hidden="true"></i></button>-->
</div>

<?php
}
?>

</div>

</div>

</div>

</div>

<?php } ?>




</form>
</div>
<script>
 /*var delta =0;
    function rotateBy10Deg(ele){
        ele.style.webkitTransform="rotate("+delta+"deg)";
        delta+=90;
    }*/
$( ".img-thumbnail" ).click(function() {
    if (  $( this ).css( "transform" ) == 'none' ){
		
        $(this).css("transform","rotate(90deg)");
		
    } else {
        $(this).css("transform","" );
    }
});



(function($) {
	var pagify = {
		items: {},
		container: null,
		totalPages: 1,
		perPage: 3,
		currentPage: 0,
		createNavigation: function() {
			this.totalPages = Math.ceil(this.items.length / this.perPage);

			$('.pagination', this.container.parent()).remove();
			var pagination = $('<div class="pagination crs"></div>').append('<a  style="cursor:pointer;background:none;border:none;font-size:18px;font-weight:bold" class="nav prev disabled" data-next="false"><</a>');

			for (var i = 0; i < this.totalPages; i++) {
				var pageElClass = "page";
				if (!i)
					pageElClass = "page current";
				var pageEl = '<a style="cursor:pointer;background:none;border:none;font-size:18px;font-weight:bold" class="' + pageElClass + '" data-page="' + (
				i + 1) + '">' + (
				i + 1) + "</a>";
				pagination.append(pageEl);
			}
			pagination.append('<a class="nav next" style="cursor:pointer;background:none;border:none;font-size:18px;font-weight:bold"  data-next="true">></a>');

			this.container.after(pagination);

			var that = this;
			$(".pagination").off("click", ".nav");
			this.navigator = $(".pagination").on("click", ".nav", function() {
				var el = $(this);
				that.navigate(el.data("next"));
			});

			$(".pagination").off("click", ".page");
			this.pageNavigator = $(".pagination").on("click", ".page", function() {
				var el = $(this);
				
				that.goToPage(el.data("page"));
			});
		},
		navigate: function(next) {
			// default perPage to 5
			if (isNaN(next) || next === undefined) {
				next = true;
			}
			$(".pagination .nav").removeClass("disabled");
			if (next) {
				this.currentPage++;
				if (this.currentPage > (this.totalPages - 1))
					this.currentPage = (this.totalPages - 1);
				if (this.currentPage == (this.totalPages - 1))
					$(".pagination .nav.next").addClass("disabled");
				}
			else {
				this.currentPage--;
				if (this.currentPage < 0)
					this.currentPage = 0;
				if (this.currentPage == 0)
					$(".pagination .nav.prev").addClass("disabled");
				}

			this.showItems();
		},
		updateNavigation: function() {

			var pages = $(".pagination .page");
			pages.removeClass("current");
			$('.pagination .page[data-page="' + (
			this.currentPage + 1) + '"]').addClass("current");
		},
		goToPage: function(page) {

			this.currentPage = page - 1;

			$(".pagination .nav").removeClass("disabled");
			if (this.currentPage == (this.totalPages - 1))
				$(".pagination .nav.next").addClass("disabled");

			if (this.currentPage == 0)
				$(".pagination .nav.prev").addClass("disabled");
			this.showItems();
		},
		showItems: function() {
			this.items.hide();
			var base = this.perPage * this.currentPage;
			this.items.slice(base, base + this.perPage).show();

			this.updateNavigation();
		},
		init: function(container, items, perPage) {
			this.container = container;
			this.currentPage = 0;
			this.totalPages = 1;
			this.perPage = perPage;
			this.items = items;
			this.createNavigation();
			this.showItems();
		}
	};

	// stuff it all into a jQuery method!
	$.fn.pagify = function(perPage, itemSelector) {
		var el = $(this);
		var items = $(itemSelector, el);

		// default perPage to 5
		if (isNaN(perPage) || perPage === undefined) {
			perPage = 3;
		}

		// don't fire if fewer items than perPage
		if (items.length <= perPage) {
			return true;
		}

		pagify.init(el, items, perPage);
	};
})(jQuery);

$(".me-ctn").pagify(4, ".single-item");
</script>