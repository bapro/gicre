<table  class="table table-striped" id='orden-medica-pat-lab' style="background:white" cellspacing="0">
<thead>
    <tr style="background:#428bca;">
	   <th style="width:1px;color:white"><strong>Fecha</strong></th>
        <th style="width:5px;color:white">Laboratorio</th>
		 <th style="width:5px;color:white">Medico</th>

	 </tr>
    </thead>
    <tbody>
    <?php
    $cpt="";
	foreach($IndicacionesLab->result() as $row)
	 
	 {
	$op3=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');	 
	if($printing==1){
	$lab=$this->db->select('name')->where('id',$row->laboratory)->get('laboratories')->row('name');
	}else{
	$lab=$this->db->select('sub_groupo')->where('id_c_taf',$row->laboratory)->get('centros_tarifarios')->row('sub_groupo');	
	}
  $insert_time = date("d-m-Y H:i:s", strtotime($row->insert_time));
  if ( $cpt==0 ) {
	 	$cpt=1;
		$colorBg = "#E0E5E6";
		} 
		else {
		$cpt=0;
		$colorBg = "#E0E5E6";
		}
		if($row->printing==1){$checked="checked";}else{$checked="";}
	 ?>
        <tr bgcolor="<?=$colorBg ;?>" >
		<td><?=$insert_time;?></td>
		<td><?=$lab;?></td>
		<td><?=$op3;?></td>
		
		 </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>



