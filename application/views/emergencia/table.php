<?php 
$this->padron_database = $this->load->database('padron',TRUE);


function getPatientAge($birthday) {

$age = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age = ($years < 2) ? '1 año' : "$years años";
} else {
$age = '';
if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age);
}

if($enviado_a==1){
$enviado="Triaje";$go_to="emergency_triaje";
} elseif($enviado_a==2){
$enviado="Emergencia General";
$go_to="emergency_general";
}
elseif($enviado_a==3){
$enviado="Emergencia Pediatría";
$go_to="emergency_general";
}
elseif($enviado_a==4){
$enviado="Quirofano";	
}
elseif($enviado_a==5){
$enviado="Emergencia Obstétrica Y Ginecología";	
}
elseif($enviado_a==6){
$enviado="Reanimación";	
}

?>
<i class='fa fa-redo'></i>
<table  class="table table-striped sort-me"  >
<thead>
<tr style="background:white;">
<th><strong>Foto</strong></th>
<th><strong>Nombres</strong></th>
<th><strong>Edad</strong></th>
<th><strong>NEC</strong></th>
<th><strong>Causa</strong></th>
<th><strong># de valoracion</strong></th>
<th><strong>Tiempo</strong></th>
<th><strong>Estado Del Paciente</strong></th>
<th><strong>ARS</strong></th>
<th><strong>Referido por</strong></th>
<th colspan='3'>Operator/Fecha/Horario</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($patient_admitas as $ver)
{
	
$emergency_triaje=$this->db->select('escala_triaje')->where('id_em',$ver->id_ep )
->get('emergency_triaje')->row('escala_triaje');	
	
	
	$escala=$this->db->select('color,name')->where('id',$emergency_triaje)
->get('emergency_triaje_escala')->row_array();
	
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3,seguro_medico,contacto_em_nombre,contacto_em_tel1,date_nacer')->where('id_p_a',$ver->id_pat )
->get('patients_appointments')->row_array();

$estado_de_paciente=$this->db->select('em_name')->where('id_em_c',$ver->estado_de_paciente )
->get('emergency_adm_data')->row('em_name');

$causa=$this->db->select('em_name')->where('id_em_c',$ver->causa )
->get('emergency_adm_data')->row('em_name');

$seguro=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])
->get('seguro_medico')->row('title');

$created_by=$this->db->select('name')->where('id_user',$ver->inserted_by )
->get('users')->row('name');

$updated_by=$this->db->select('name')->where('id_user',$ver->update_by )
->get('users')->row('name');
$created_date=date("d-m-Y", strtotime($ver->created_date));
$updated_date=date("d-m-Y", strtotime($ver->update_date));

$referido_por=$this->db->select('em_name')->where('id_em_c',$ver->paciente_referido_por )
->get('emergency_adm_data')->row('em_name');

$medio_llegado=$this->db->select('em_name')->where('id_em_c',$ver->medio_de_llegado )
->get('emergency_adm_data')->row('em_name');

$today=date('Y-m-d');
$sql_con ="SELECT historial_id FROM h_c_enfermedad where filter_date='$today' AND historial_id=$ver->id_pat";
$atendido_con = $this->db->query($sql_con);

if($atendido_con->num_rows() > 0){
$hist=1;
}
else 
{
$hist=0;
}
$valoracion="";
$ifTimer="";
$tiempo="";
if($escala['color']=='red'){
$valoracion=1;
$tiempo=0;
 $ifTimer='';
}
else if($escala['color']=='orange')
{
$valoracion=2;
$tiempo=10;
$ifTimer='timerTriaje';
}

$evaluation=$this->db->select('evaluation')->where('id_em',$ver->id_ep)
->get('emergency_triaje')->row('evaluation');

if($evaluation==0){
$text="emergencia";	
}else{
$text="triaje";	$tiempo='acabado';
}
?>
<tr style="background:<?=$escala['color']?>" class="border_bottom" id="<?=$ver->id_ep?>" >

<td>
<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="75" height="75"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/user.png"  />	
<?php
}
else{
	?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}

?>
</td>

<td style="text-transform: uppercase;"><a style="color:<?=$ver->td?>" href="<?php echo site_url("$controller/patient/$atendido_con->num_rows()"); ?>"><?=$patient['nombre'];?></a> </td>
<td style="color:<?=$ver->td?>"> <?=getPatientAge($patient['date_nacer'])?></td>
<td style="color:<?=$ver->td?>">NEC-<?=$ver->id_pat;?></td>
<td style="color:<?=$ver->td?>" title="<?=$escala['name']?>">Ver</td>
<td style='text-align:center;color:<?=$ver->td?>'><?=$valoracion?></td>
<td style='text-align:center;color:<?=$ver->td?>;'><div class="<?=$ifTimer?>" id="<?=$ver->id_ep?>"><?=$tiempo?></div></td>
<td style="color:<?=$ver->td?>"><?=$estado_de_paciente ?></td>
<td style="color:<?=$ver->td?>"><?=$seguro?></td>
<td style="color:<?=$ver->td?>"><?=$referido_por?></td>

<td style="font-size:12px;color:<?=$ver->td?>" >
<em>  
CREADO POR <?=$created_by?>, <?=$created_date?> : <?=$ver->create_time?>
</em>
</td>
<td style="font-size:12px;color:<?=$ver->td?>">
<?php if($ver->create_time !=$ver->update_time){?>

<em> 
CAMBIADO POR <?=$updated_by?>, <?=$updated_date?> : <?=$ver->update_time?>
</em>
<?php } ?>
</td>
<td>
<a  title="<?=$ver->title?>"  href="<?php echo site_url("$controller/$go_to/$ver->id_pat/$ver->id_ep/$ver->centro"); ?>" class="hide-me btn btn-default btn-xs  hide-emgergencia"><?=$text?></a>
</td>
</tr>

<?php
}
?>
</tbody>    
</table>
<script type="text/javascript">


var minutes=6;
var nowPlus30Seconds = moment().add(minutes, 'seconds').format('YYYY/MM/DD HH:mm:ss');


$('.timerTriaje').countdown(nowPlus30Seconds)
.on('update.countdown', function (event) {if($(this).closest("tr").find("a.hide-me").text()=='emergencia'){$(this).html(event.strftime('%M : %S'));}; })
.on('finish.countdown', function () {if($(this).closest("tr").find("a.hide-me").text()=='emergencia'){$(this).text('acabado'); $(this).closest("tr").find("a.hide-me").text('triaje');reloadAll($(this).attr('id'));}});


function reloadAll(del_id){
//alert(del_id);
	$.ajax({
		type:'POST',
		url:'<?=base_url('emergency/reloadAll')?>',
		data: {id:del_id},
		success:function(data) {
			//loadAll();
		
        }});	
}


    $('.sort-me').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );

  
   
 
 
</script>