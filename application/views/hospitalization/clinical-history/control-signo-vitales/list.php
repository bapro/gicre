<?php if($query->result() !=NULL){
echo "<em id='total-signos-vital'>Total:". $query->num_rows(). "</em>";
$insumo_patient=$this->session->userdata('id_patient');
$insumo_centro=$this->session->userdata('id_centro');
echo'<div class="float-end">
Elegir todo <input type="checkbox" id="copy-all-csv"  />
<button type="button" id="btnPrintCsv"  class="btn btn-md btn-primary show-kardex-print-csv ms-2" style="display:none;position:fixed"><i class="fa fa-print"></i></button>
</div>
';

	?>
<br/><br/>
<table  class="table table-striped table-sm" id="csc-table" style="width:100%"  >
<thead>
    <tr style="background:#428bca;">
	  <th style="color:white">#</th>
	   <th style="color:white"><strong>Fecha / Operador</strong></th>
	   <th style="color:white">Sat</th>
	    <th style="color:white">TA</th> 
		<th style="color:white">FC</th> 
		  <th style="color:white">FR</th>
       <th style="color:white">Glicemia</th>
	   <th style="color:white">Pulso.</th>
		<th style="color:white">Temp.</th>
		<th style="color:white">Diuresis/Dep</th>
		<th style="color:white">Accion</th>
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($query->result() as $row)

	 {
		$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
        $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
			$upd=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
		$fechaup = date("d-m-Y H:i:s", strtotime($row->updated_time));
		 ?>
       <tr>
	   <td class="id_csv"><?=$row->id?></td>
		<td>
		
		 	<div class="dropdown-center" style="z-index:30000">
	
   <button class="btn btn-default btn-sm dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   
  </button>
			<ul class="dropdown-menu">

<?php
 if($this->session->userdata('user_perfil') !='Auditoria Medico' && $row->id_user !=$row->updated_by){
                 echo" <li class='data-li'><a  class='dropdown-item' href='#'  >creado por $op $fecha;</a></li>";
		      }else{
		      	echo" <li class='data-li'><a  class='dropdown-item' href='#'  >creado por $op $fecha;</a></li>";
                echo "<li class='data-li'><a  class='dropdown-item' href='#'  >cambiado por $upd $fechaup</a></li>";
              }
	  ?>
		</ul>
		
		</div>
		</td>
		<td><?=$row->csv_sat;?></td>
		<td><?=$row->csv_ta1?>/<?=$row->csv_ta2?></td>
		<td><?=$row->csv_fc?></td>
		<td><?=$row->csv_fr;?></td>
		<td><?=$row->csv_glicemia;?></td>
		<td><?=$row->csv_pulso;?></td>
		<td><?=$row->csv_temperatura;?></td>
		<td>
		<?=$row->csv_diuresis;?>/<?=$row->csv_dep;?> 
		</td>
		<td title="Registro # <?=$row->id;?>">
	<div class="dropdown-center " style="z-index:30000;">
	
  <button class="btn btn-default btn-sm dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   </button>
  <ul class="dropdown-menu">
    <li ><a class="dropdown-item edit-control-signo-vitale" href="#" id="<?=$row->id; ?>"><i class="bi bi-pencil" ></i> Editar</a></li>
    <li><a class="dropdown-item delete-control-signo-vitale" href="#" id="<?=$row->id; ?>"><i class="bi bi-trash" style="color:red"></i> Elimiar</a></li>
  </ul>
  	<input class="float-end copy-one-csv" type="checkbox" value="<?=$row->id; ?>"  />
</div>
		
		
       </td>
	   </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
<input id="saveCheckBoxIdCsv" type="hidden" />
 <?php
	 }else{
		echo "<em>No hay resgistros...</em>"; 
	 }
	 ?>
