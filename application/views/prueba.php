<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?=base_url();?>assets/css/passwordscheck.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

<style>

td,th{text-align:left}
.rgth-crd{text-align:left}
</style>
</head>


<div class="col-md-12" style="overflow-x:auto">
<table class='table'>
<tr>
<td style='width:30%'>
TIPO DE CIRUGIA
<select class="form-control select2" id="tipo_cirugia" >
<option value="">Ningúno</option>
<option>ELECTIVAS</option>
<option>EMERGENCIA</option>
</select>
</td>
<td>
CIRUGIAS ANTERIOR
<textarea class="form-control" id="cirugia_ant"  ></textarea>
</td>
</tr>
<tr>
<td>
RIESGO QUIRURGICO<br/>
a) alto <textarea class="form-control" id="riesgo_qui_alto"  ></textarea></td>
<td><br/>b) medio <textarea class="form-control" id="riesgo_qui_medio"  ></textarea></td>
<td><br/>c) bajo <textarea class="form-control" id="riesgo_qui_bajo"  ></textarea></td>
</tr>

<tr>
<td style='text-align:right'>
ANTECEDENTE CARDIOVASCULARES<br/><br/>
A) HTA si <input type='radio'/> no <input type='radio'/><hr/>
B) CARDIOPASTICA ISQUEMICA si <input type='radio'/> no <input type='radio'/><hr/>
C) INSUFICIENCA CARDIACA CONGENITA si <input type='radio'/> no <input type='radio'/><hr/>
D) ARRITMIA DOCUMENTADA si <input type='radio'/> no <input type='radio'/><hr/>
E) ENFERMEDAD VALVULR si <input type='radio'/> no <input type='radio'/><hr/>
F) OTROS si <input type='radio'/> no <input type='radio'/><hr/>
</td>
<td><br/><br/> <textarea  rows="16" class="form-control" placeholder='Escribir...' ></textarea></td>
</tr>
</table>
</div>
<div class="form-horizontal">
<legend style='text-align:left'>CONDICION COMORBIDA</legend>
<div class="col-md-4">
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > TABAQUISMO</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > OBESIDAD</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > ANEMIA</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > HEPATOPATIA CRONICA</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > DISCRACIA SANGUINEA</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > ENFERMEDAD VASCULAR</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > PERIFERICA</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > ENFERMEDAD CRONICA</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > ACV</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > DIABETES MELLITUS</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > DISFUNCION RENAL</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > ASMA BRONQUIAL</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > ALERGIA</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > OTRAS</label>
<div class="col-md-6">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>

</div>
</div>
<div class="col-md-12">

<table class='table'>
<tr>
<td>
Sintomas cardiovasculares <input type='checkbox'/>&nbsp;&nbsp;
Dolor Toracico <input type='checkbox'/>
</td>
<td>
Disnea <input type='checkbox'/>&nbsp;&nbsp;
TOS <input type='checkbox'/>
</td>
</tr>
<tr>
<td>
Palpitaciones <input type='checkbox'/>&nbsp;&nbsp;
Ortopnea <input type='checkbox'/>
</td>
<td>
Edema <input type='checkbox'/>&nbsp;&nbsp;
Otro <input/>

</td>

</tr>
</table>
EXAMEN FISICO
<?php 
$data['edad'] ='33 años';

$this->load->view('admin/historial-medical1/examen-fisico/signo_empty',$data);?>
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > BD</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > BI</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > FC</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >IVY</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>
</tr>

<!--------------------------------------->
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Torax</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Corazon</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Pulmones</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Abdomen</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>
</tr>


<!--------------------------------------->
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Miembros</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > RHY</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Edma</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Pulsos Perifericos</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>
</tr>
</table>

LABORATORIO
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > HCTO</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > HB</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > GB</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Plaquetas</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>
<!--------------------------------------->
<tr>


<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Creatinina</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Glicemia</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TGO</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TGP</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>
</tr>

<!------------------------------------------------------------>

<tr>


<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > TS/TC</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > TP</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TPT</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Orina</label>
<div class="col-md-9">
<input  class="form-control" id="enf_signopsis" >
</div>
</div>
</td>
</tr>
</table>

RESULTADOS CARDIODIAGNOSTICO 



<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Electrocardiograma</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Radiografia De Torox</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

</tr>

<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Ecocardiograma</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Holters</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

</tr>


<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Esperimotria</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Mapa</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

</tr>
</table>
CONCLUSION DIAGNOSTICA


<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Patologia Cardiovasculares Detectadas</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Otros Patologias</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

</tr>
</table>
RIESGO CARDIOVASCULAR (PREDICTORES CLINICOS)

<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Menor</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Intermedio</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

</tr>

<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Mayor</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Recomendaciones</label>
<div class="col-md-9">
<textarea  class="form-control" id="enf_signopsis" ></textarea>
</div>
</div>
</td>

</tr>
</table>
</div>

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript">


 </script>

</html>
