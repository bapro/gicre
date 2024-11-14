<div class='hr'>
<table  style="width:100%" cellspacing="0" >

	<thead>
   <tr class="trbgc">
    <td style="width:4px"><strong>#</strong></td>
	   <td style="width:4px"><strong>Fecha</strong></td>
        <td style="width:3px"><strong>Medica.</strong></td>
		 <td style="width:5px"><strong>Present.</strong></td>
		 <td style="width:1px"><strong>Frec.</strong></td>
		 <td style="width:1px"><strong>Turno</strong></td>
		  <td style="width:1px"><strong>Via</strong></td>
      <td style="width:1px"><strong>Usuario</strong></td>
     </tr>
    </thead>
    <tbody>
    <?php
    if($query->result() !=NULL){
	foreach($query->result() as $row)
	 
	 {
	 $fecha = date("d-m-Y H:i:s", strtotime($row->kardex_fecha));			 
		 $user = $this
            ->db
            ->select('name')
            ->where('id_user', $row->kardex_user)->get('users')
            ->row('name');
		 ?>
       <tr>
	   <td><?=$row->id;?></td>
		<td><?=$fecha;?></td>
		<td><?=$row->new_cant;?> <?=$row->medica;?><br/><i><u><?=$row->dosis;?></u></i></td>
		<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->kardex_turno;?></td>
		<td><?=$row->via;?><br/><?=$row->oyo;?></td>
		<td><?=$user;?></td>
      </tr>
		
	 <?php
	 }
	}
	 ?>
    </tbody>    
</table>
</div>

 <div class="footer">
<?php echo "Enfermera  $doctor, Página {PAGENO} de {nb}";?>
</div>