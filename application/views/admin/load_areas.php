<table id="example" class="table table-striped table-bordered"  cellspacing="0">
    <thead>
    <tr style="background:#5957F7;color:white">
	   <th style="width:1px"><strong>#</strong></th>
        <th style="width:5px">Area</th>
		 <th style="width:1px">Acciones</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($all_areas as $all_a)
	 
	 {
	 ?>
        <tr>
		<!--<td style="width:8px"><?php echo $i;$i++;?></td>-->
		<td class="ida" style="width:1px"><?=$all_a->id_ar;?></td>
		<td class="especialidad" style="width:5px"><?=$all_a->title_area;?></td>
            <td style="width:1px" >
				<a href="#" class="myModalArea st"  title="Editar" data-toggle="modal"   data-target="#myModalArea"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				<a data-toggle="modal" data-target="#relatedDoctor" class="st linkhover"  href="<?php echo base_url('admin/relatedDoctor/'.$all_a->id_ar)?>">
				<span>Doctores conectados a <?=$all_a->title_area;?></span>
				<i class="fa fa-link" aria-hidden="true"></i>
				</a>
	 		
				<a href="<?php echo base_url('admin/delete_area/'.$all_a->id_ar)?>" class="st" style="background:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true" title="Eliminar" onclick="return confirm('¿ estás seguro de eliminar ?')"></i></a>
					 		
			</td>
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>