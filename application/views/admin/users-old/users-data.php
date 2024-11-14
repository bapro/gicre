 <table id="" class="table table-striped example" style="margin:auto" cellspacing="0">
    <thead>
    <tr style="background:#5957F7;color:white">
	<th  style="width:1px">#</th>
	   <th  style="width:6px">Nombres</th>
	  <th style="width:2px">Perfil</th>
		<th style="width:2px">Status</th>
		 <th style="width:1px">Acciones</th>
     </tr>
    </thead>
    <tbody>
    <?php

foreach($queries->result() as $row)
	 {
		 //<a  data-toggle="modal" href="'.base_url().'/admin/userLocation/'.$row->id_user.'"  data-target="#verLocation"  title="Ubicación del usuario"><i style="color:red" class="fa fa-map-marker"></i></a>

	$miembro_desde= date("d-m-Y", strtotime($row->insert_date));
	if($row->is_log_in==1){
 $login_t= date("H:i:s", strtotime($row->login_time));
$userlogin=
'
<img title="conectado desde '.$login_t.'" style="width:20px;color:green" src="'.base_url().'/assets/img/eligibility-jump.png"  />
';
}
else{
	$login_ot= date("d-m-Y H:i:s", strtotime($row->last_login_time));
	if($row->last_login_time=="0000-00-00 00:00:00"){$login_ot="";}else{$login_ot="$login_ot";}
$userlogin='<img title="desconectado desde '.$login_ot.'"  style="width:20px;" src="'.base_url().'/assets/img/user-off-line.png"  />';
}

	 if($row->status==0)
		 {
			 $status="Desactivado";
			 }
	if($row->status==1){
		 $status="Activado";
		 }
		
		if($row->perfil=="Medico")
		 {
			$perfil=1;
			 $title_area= $this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');

		 }
		 else if ($row->perfil=="Asistente Medico"){
			  $title_area= "";
		$perfil=2;
		 }

         else if ($row->perfil=="Técnico de lentes"){
		$perfil=4;
		$title_area= "";
		 }
		 
		 else if ($row->perfil=="Farmacia Interna"){
		$perfil=3;
		$title_area= "";
		 } else {
		$vence="";$title_area="";$perfil=3;
		 }

	 ?>
        <tr>
		<td><?=$row->id_user;?></td>
		<td style="text-transform:uppercase" title="Miembro desde <?=$miembro_desde?>">
		<?=$row->name;?> <i style="font-size:12px;color:blue" class="fa fa-info"></i>
		<span style="visibility:hidden"><?=$row->is_log_in?></span><?=$userlogin;?>
		</td>
		<td><?=$user_perf;?> <em><?=$title_area;?></em></td>
		<td><?=$status;?></td>
           <td style="text-align:left">
		 <a  class="btn btn-primary btn-xs"  href="<?php echo site_url("admin/update_user/$row->id_user/$perfil")?>">Editar</a>
		<?php if($row->status==0)
			{
			?>
			<a class href="<?php echo site_url("admin/ActivarUser/".$row->id_user); ?>">Activar<a>

			<?php
			}

			else {
				?>

		<a class="btn btn-danger btn-xs"  href="<?php echo site_url("admin/DeactivarUser/".$row->id_user); ?>">Desactivar</a>

			<?php
			}
			?>

	</td>
        </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>