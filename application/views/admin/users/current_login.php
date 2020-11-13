<h4>Usuario(s) Conectado(s) Ahora : <?=$ctoday?></h4>
 <ol>
 <?php
 foreach ($today as $rw) {
	 	if($rw->perfil=="Medico")
		 {	
			$insert_date= $this->db->select('insert_date')->where('id_user',$rw->id_user)->get('users')->row('insert_date');
			$title_area= $this->db->select('title_area')->where('id_ar',$rw->area)->get('areas')->row('title_area');
		 } else {$title_area="";}
	   $login_time= date("H:i:s", strtotime($rw->login_time));
 ?>
 <li style='color:green;'><i  class='fa fa-check' aria-hidden='true'></i> <?=$rw->perfil?> <?=$rw->name?> <?=$title_area?>  (<?=$login_time?>)</li>
 
  <?php
   }
 ?>
 </ol>