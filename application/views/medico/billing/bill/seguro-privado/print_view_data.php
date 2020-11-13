<div class="col-md-12">
<hr id="hr_ad"/>
</div>
<?php

 foreach($billing1 as $row1)
$logoc=$this->db->select('logo,name')->where('id_m_c',$row1->centro_medico)->get('medical_centers')->row_array();
 
 $paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula')->where('id_p_a',$row1->paciente)->get('patients_appointments')->row_array();

 $seguron=$this->db->select('title,logo')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();

 $doctor=$this->db->select('id_user, name')->where('id_user',$row1->medico )
->get('users')->row_array();

$area=$this->db->select('title_area')->where('id_ar',$row1->area )->get('areas')->row('title_area');

$centro=$this->db->select('name,logo')->where('id_m_c',$row1->centro_medico )
->get('medical_centers')->row_array();

$numafiliado=$this->db->select('input_name')
->where('patient_id',$row1->paciente)
->where('inputf',"No. DE AFILIADO")
->get('saveinput')->row("input_name");

 ?>


<div class="col-md-12" >

<table class="table hide-bottom" >

<tr>
<th>ASEGURADORA</th>
<td>
<?=$seguron['title']?>  
</td>
</tr>
<tr>
<th>CODIGO PRESTADOR</th><td>NEC-<?=$idfacc?></td>
</tr>
<tr>
<th>NOMBRE AFILIADO</th><td style="text-transform:uppercase"><?=$paciente['nombre']?></td>
</tr>
<tr>
<th>TELEFONO</th><td><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
</tr>

<tr>
<th>TIPO DE SERVICIO</th>
<td>

<?php 

$i=1;
foreach($billing2 as $row2) {
if($centro_type=="privado"){
 $service=$this->db->select('procedimiento')->where('id_tarif',$row2->service)->get('tarifarios')->row('procedimiento');
} else {
$service=$this->db->select('sub_groupo')->where('id_c_taf',$row2->service)->get('centros_tarifarios')->row('sub_groupo');
}
echo $i;$i++;
?>) <?=$service?><br/>
<?php
} ?>

</td>
</tr>


</table>

</div>
<div class="col-md-12" >
<?php
$this->db->select("SUM(subtotal) as sbt");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$sbt=$this->db->get()->row()->sbt;
$sbt=number_format($sbt,2);
//---------------------------------

$this->db->select("SUM(totpapat) as tpat");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$tpat=$this->db->get()->row()->tpat;
$tpat=number_format($tpat,2);
?>
TOTAL RECLAMADO : <b><u><?=$sbt?></u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
EL PACIENTE PAGARA : <b><u><?=$tpat?></u></b> <br/><br/><br/>
 <div class="col-md-6" >
 <hr style="border:1px solid black;"/>
 <b>FIRMA AUTORIZADA Y SELLO DEL RECLAMENTE</b>
 </div>
<div class="col-md-6" >
 <hr style="border:1px solid black;"/>
 <b>NOMBRE Y CEDULA DEL AFILIADO O FAMILIAR RESPONSABLE</b>
 </div>
</div>
<div class="col-md-12" >
<br/>
<p style="font-size:13px"><b>Por este medio autorizo a cualquier prestador de servicios de salud, asi como organizaciones, empleador, entre otros, a suministrar toda informacion que sea solicitada por la administradora de riesgos de salud, correspondiente a todo tratamiento, servicio estudio, laboratorio, diagnostico o beneficios prestados a mi favor.</b></p>
</div>
</div>
<br/><br/><br/><br/>
</body>



</html>