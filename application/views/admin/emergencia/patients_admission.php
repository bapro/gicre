<style>
td,th{text-align:left}
#mi-pacientes {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  margin: 10px 0;
  padding: 0 10px;
  max-height: 260px;
  overflow-y: auto;
  overflow-x: hidden;
}

.border_bottom td {
  border-bottom:1px solid white;
}
</style>

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

$hide="display:none";
} elseif($enviado_a==2){

$hide="";
}
elseif($enviado_a==3){

$hide="";
}
elseif($enviado_a==4){
	
$hide="";
}
elseif($enviado_a==5){

$hide="";
}
elseif($enviado_a==6){

$hide="";
}

 ?>
<div class="col-md-12">
<div class="row">
<h1 class="h1"  style="color:red"><i class="fa fa-ambulance" style="font-size:48px;"></i> EMERGENCIA</h1>
<a href="<?php echo site_url("$controller/create_cita");?>" class="btn btn-primary btn-xs">Nuevo Paciente</a>
<hr id="hr_ad"/>
</div>
</div>

<h2 class="h2">Pacientes Admitidas <span class="h3" style="color:red"><?=$enviado?></span></h2>

<div class="row">
<div  style="overflow-x:auto;">
<table  class="table table-striped " id="sort-me-emerg" >
<thead>
<tr style="background:white;">
<th><strong>Foto</strong></th>
<th><strong>Nombres</strong></th>
<th><strong>Edad</strong></th>
<th><strong>NEC</strong></th>
<th style='<?=$hide?>'><strong>Causa</strong></th>
<th style='<?=$hide?>'><strong># de valoracion</strong></th>
<!--<th style='<?=$hide?>'><strong>Tiempo</strong></th>-->
<th><strong>Estado Del Paciente</strong></th>
<th><strong>ARS</strong></th>
<th><strong>Referido por</strong></th>
<th colspan='3'>Operator/Fecha/Horario</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($patient_admitas->result() as $ver)
{
	
$emergency_triaje=$this->db->select('sintomatologia')->where('id_em',$ver->id_ep )
->get('emergency_triaje')->row('sintomatologia');	
	
	
	$escala=$this->db->select('color,name')->where('id',$emergency_triaje)
->get('emergency_sintomatologia')->row_array();
	
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


?>
<tr style="background:<?=$escala['color']?>" class="border_bottom"  >

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

<td style="text-transform: uppercase;"><a style="color:<?=$ver->td?>" href="<?php echo site_url("$controller/patient/$ver->id_pat"); ?>"><?=$patient['nombre'];?></a> </td>
<td style="color:<?=$ver->td?>"> <?=getPatientAge($patient['date_nacer'])?></td>
<td style="color:<?=$ver->td?>">NEC-<?=$ver->id_pat;?></td>
<td style="color:<?=$ver->td?>;<?=$hide?>" title="<?=$escala['name']?>">Ver</td>
<td style='text-align:center;color:<?=$ver->td?>;<?=$hide?>'><?=$valoracion?></td>
<!--<td style='text-align:center;color:<?=$ver->td?>;<?=$hide?>'><div class="<?=$ifTimer?>" id="<?=$ver->id_ep?>"><?=$tiempo?></div></td>-->
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
<?php
if($enviado_a==1){
	$go_to='triaje';
}else if($enviado_a==2 || $enviado_a==5 || $enviado_a==3 ){
$go_to='emergency_general';	
}
?>
<a  title="<?=$ver->title?>"  href="<?php echo site_url("emergency/$go_to/$ver->id_ep/$id_user"); ?>" class="hide-me btn btn-default btn-xs  hide-emgergencia"><?=$ver->enviado_name?></a>
</td>
</tr>

<?php
}
?>
</tbody>    
</table>
</div>
<!--<div id='test'></div>-->
<?php
$startTime = date("Y-m-d H:i:s");
echo $startTime;
echo '<br/>';
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+ 1 minutes',strtotime($startTime)));
echo $cenvertedTime;
?>
<br/>

</div>

</div>
<div class="bas_footer"></div>	
<footer id="footer" >
<div class="container">
<div class="col-md-12" STYLE="text-align:center;color:red">
<p>EMERGENCIA - TRIAJE</p>
</div>
</div>
</footer >
 </body>



<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 

<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js"></script>

<script type="text/javascript">
var minutes=60;
var nowPlus30Seconds = moment().add(minutes, 'seconds').format('YYYY/MM/DD HH:mm:ss');


$('.timerTriaje').countdown(nowPlus30Seconds)
.on('update.countdown', function (event) {$(this).html(event.strftime('%M : %S'));saveCounter($(this).attr('id')); });
//.on('finish.countdown', function () {if($(this).closest("tr").find("a.hide-me").text()=='ver'){$(this).text('acabado'); $(this).closest("tr").find("a.hide-me").text('triaje');reloadAll($(this).attr('id'));}});


function saveCounter(id){
var minutes =$('#' + id).text();
$('#test').text(minutes);
	$.ajax({
		type:'POST',
		url:'<?=base_url('emergency/reloadAll')?>',
		data: {id:id,minutes:minutes},
		success:function(data) {
			//loadAll();
		
        }});	
}





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


    $('#sort-me-emerg').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ]

    } );
 
</script>

</html>