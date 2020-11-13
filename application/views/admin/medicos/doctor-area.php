

<div id="background_">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Ver area </h4>

</div>
 <table class="table table-striped table-bordered">

	 <?php foreach($VER_AREA as $ver_area)
	 
	 {
	 ?>
	  <tr id="ac" style="text-align:right">
  <th class="thh"></th>
  <td class="dropdown vtd">
  <div class="dropdown" >
  <button class="btn btn-primary btn-xs dropdown-toggle st" type="button" data-toggle="dropdown">Editor
    <span class="caret"></span></button>
    <ul role="menu" class="dropdown-menu" style="border:none;">
                    <li ><a href="#" style="color:rgb(0,64,128)" id="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Editar</a></li>
                    <li ><a style="color:rgb(0,64,128)" id="new" href="#" ><i class="fa fa-plus" aria-hidden="true" title="Nueva" ></i> Nueva</a></li>
                    <li ><a  style="color:rgb(223,0,0);" href="<?php echo base_url('admin/delete_area/'.$ver_area->id_ar)?>"  ><i class="fa fa-trash-o" aria-hidden="true" title="Eliminar" onclick="return confirm('¿ estás seguro de eliminar ?')"></i> Eliminar</a></li>
                    
                </ul>
				</div>
            
		</td>

  </tr>
        <tr id="hide_id">
          <th class="thh">#</th>
           <td class="vtd"><?=$ver_area->id_ar;?></td>
	  </tr>
	  <tr id="show" style="display:none">
		 <th class="thh">Nombre</th>
		 <td class="vtd">
		 <form method="post" action="<?php echo site_url('admin/edit_area');?>">
         <input type="hidden" class="form-control" name="ida" value="<?=$ver_area->id_ar;?>">
		 <div class="col-sm-8">
		<input type="text" class="form-control" name="especialidad" value="<?=$ver_area->title_area;?>"><br/>
		</div>
		<input type="submit" class="btn btn-primary btn-xs" value="Enviar">
		</form>
		</td>
        </tr>
		<tr id="showNew" style="display:none">
		 <th class="thh">Nombre</th>
        <td class="vtd">
		<form method="post" action="<?php echo site_url('admin/save_area');?>">
		<div class="col-sm-8">
        <input type="text" class="form-control" name="title_area" placeholder="Entra nueva area"><br/>
		</div>
		<input type="submit"  class="btn btn-primary btn-xs" value="Enviar">
		  </form>
		</td>
       
        </tr>
	   <tr id="hide">
          <th class="thh">Nombre</th>
     <td class="vtd" ><?=$ver_area->title_area;?></td>

        </tr >
         
       
		 <?php
	 }
	 ?>
 
	
</table>

<span class="text-left">
<h3>Datos Relaccionados</h3>
</span>
<div class="tab-content tab-content-inverse" style="overflow-x:auto;">
<table class="table table-striped table-bordered" width="50%" style="font-size:15px;border:none" cellspacing="0">
<thead>

<tr style=""><th  style="color:#38a7bb">Doctores</th></tr>
<tr style="background:#38a7bb;color:white">
<th>#</th>
<th>Nombre</th>
<th>Apellidos</th>

<th>Acciones</th>

</tr>
</thead>
<tbody>
<?php 
foreach($RESULT_DOCTOR as $result_doctor)

{
?>
<tr>
<td  style="text-align:left"><?=$result_doctor->id;?></td>
<td  style="text-align:left"><?=$result_doctor->first_name;?></td>
<td  style="text-align:left"><?=$result_doctor->last_name;?></td>
<td  style="text-align:left">
<a href="<?php echo base_url('admin/Doctor/'.$result_doctor->id)?>"  title="Ver" ><i class="fa fa-eye" aria-hidden="true"></i></a>
<a href="<?php echo base_url('admin/UpdateDoctor/'.$result_doctor->id)?>" title="Editar" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<a href="<?php echo base_url('admin/DeleteDoctor/'.$result_doctor->id)?>" title="Eliminar" class="st" style="color:rgb(223,0,0);background:none;border:none"><i class="fa fa-trash-o" aria-hidden="true" title="Eliminar" onclick="return confirm('¿ estás seguro de eliminar ?')"></i></a>
</td>
</tr>

<?php
}
?>
</tbody>
</table>
</div>
<script>
$(document).ready(function(){
    $("#edit").click(function(){
        $("#hide").hide();
		$("#show").show();
		$("#new").show();
		$("#edit").hide();
		$("#showNew").hide();
		$("#hide_id").hide();
		$("#ac").css("background", "white");
    });
   
});




$(document).ready(function(){
    $("#new").click(function(){
        $("#hide").hide();
		$("#show").hide();
		$("#new").hide();
		$("#hide_id").hide();
		$("#edit").show();
		$("#showNew").show();
		$("#ac").css("background", "#E0E5E6");
		$("#showNew").css("background", "white");
    });
   
});



</script>