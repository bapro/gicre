<?php $this->padron_database = $this->load->database('padron',TRUE); 

if($count > 0)
  {
	  ?>
	  <table class="table table-striped table-hover table-condensed sort-me">
	   <thead>
	  <tr style="background:#5957F7;color:white">
	 <th></th><th style="cursor:pointer" title="Ordenar por nombre">NOMBRE</th>
	  </tr>
	  </thead>
	  <tbody>
	  <?php
	  $i = 1; 
	foreach($getPatientsMedico as $row)
 {
	$sql ="SELECT id_p_a,nombre,photo,ced1,ced2,ced3,nec1 FROM  patients_appointments
 WHERE id_p_a=$row->id_patient ORDER BY nombre DESC";
  $query= $this->db->query($sql);
  $info_bulle=$this->db->select('fecha_propuesta,causa')->where('id_patient',$row->id_patient)->get('rendez_vous')->row_array();
 foreach ($query->result() as $rowp){
if($rowp->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$rowp->ced1)
->where('SEQ_CED',$rowp->ced2)
->where('VER_CED',$rowp->ced3)
->get('fotos')->row('IMAGEN');
$imgpat='<img  width="30" height="30"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';

} else if($rowp->photo==""){
$imgpat='<img  style="width:30px;" src="'.base_url().'/assets/img/user.png"  />';	

}else{

$imgpat='<img  style="width:30px;" src="'.base_url().'/assets/img/patients-pictures/'.$rowp->photo.'"  />';	
}
?>
<tr title="Fecha : <?=$info_bulle['fecha_propuesta']?> - <?=$info_bulle['causa']?>" >
<td>
<?=$imgpat;?> 
</td>
<td >
 <a style="color:blue;font-size:12px;text-transform:uppercase" href="<?php echo site_url("medico/patient/$row->id_patient/$row->centro/$row->doctor"); ?>"><?=$rowp->nombre;?>  <span style='color:red'>(<?=$rowp->nec1?>)</span></a>
</td>
 </tr>
 <?php
 }
  }
  ?>
  </tbody>
  </table>
  <?php
  }
  else
  {?>
<span style='color:red'>No hay pacientes</span> 
 <?php }

?>
<script>
    $('.sort-me').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );

</script>
