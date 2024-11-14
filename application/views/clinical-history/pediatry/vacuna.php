 <?php
 if ($ant_vacunation == 0) {
  $social_text = "";
  $motor1_text = "";
  $motor2_text = "";
  $lenguaje_text = "";
  $trans = "";
  $traum = "";
  $evo = "";
  $evol_text = "";
  $edad_gest = "";
  $leche = "";
  $lactamat = "";
  $otrosinfo = "";
  $traum_text = "";
  $trans_text = "";
  $motor1 = "";
  $motor2 = "";
  $lenguaje = "";
  $social = "";
  $tnaci = "";
  $describa = "";
  $peso = "";
  $talla = "";
  $ale = "";
  $hep = "";
  $asm = "";
  $cirug = "";
  $deng = "";
  $diar = "";
  $zika = "";
  $chicun = "";
  $falc = "";
  $hep = "";
  $infv = "";
  $neum = "";
  $otot = "";
  $pape = "";
  $paras = "";
  $saram = "";
  $varicela = "";
  $otros_t_text = "";
  $id_pedia = 0;

  $nacer_fecha1 ="";

  $nacer_fecha2 = "";

  $nacer_chk1 ="";

  $nacer_chk2 = "";

  $mes2_fecha1 ="";

  $mes2_fecha2 = "";

  $mes2_fecha3 = "";

  $mes2_fecha4 = "";

  $mes2_chk1 = "";

  $mes2_chk2 = "";
  
$mes2_chk3 = "";
$mes2_chk4 = "";
$mes4_fecha1 = "";
$mes4_fecha2 = "";
$mes4_fecha3 = "";
$mes4_fecha4 = "";
$mes4_chk1 = "";
$mes4_chk2='';
$mes4_chk3 = "";
$mes4_chk4 = "";
$mes6_fecha1 = "";
$mes6_fecha2 = "";
$mes6_chk1 = "";
$mes6_chk2 = "";
$mes12_fecha1 ="";
$mes12_fecha2 ="";
$mes12_chk1 ="";
$mes12_chk2 = "";
$year9_14_mas_fecha1="";
$mes18_fecha1 = "";
$mes18_fecha2 = "";
$mes18_chk1 = "";
$mes18_chk2 = "";
$mes18_chk3 = "";
$mes18_fecha3 = "";
$year4_fecha1 = "";
$year4_fecha2 = "";
$year4_chk1 ="";
$year4_chk2 ="";
$year9_14_fecha1 ="";
$year9_14_chk1 = "";
$year9_14_mas_chk1 = "";
 	 $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
 }else{
   foreach ($query_vacunation->result() as $row)
   $in_by = $row->inserted_by;
			$up_by = $this->session->userdata('user_id');
			$in_time = $row->inserted_time;
			$up_time = date("Y-m-d H:i:s");
   
   
 $id_pedia = $row->id;
     $params2 = array('table' => 'h_c_vacunation_new', 'id' => $id_pedia);
    echo $this->user_register_info->get_operation_info($params2);
  //------vacunacion--------------------

  $nacer_fecha1 = $row->nacer_fecha1;


  $nacer_fecha2 = $row->nacer_fecha2;



  $nacer_chk1 = $row->nacer_chk1;



  $nacer_chk2 = $row->nacer_chk2;

  $mes2_fecha1 = $row->mes2_fecha1;



  $mes2_fecha2 = $row->mes2_fecha2;
  $year9_14_mas_fecha1=$row->year9_14_mas_fecha1;

  $mes2_fecha3 = $row->mes2_fecha3;


  $mes2_fecha4 = $row->mes2_fecha4;

  $mes2_chk1 = $row->mes2_chk1;

  $mes2_chk2 = $row->mes2_chk2;
  
$mes2_chk3 = $row->mes2_chk3;
$mes2_chk4 = $row->mes2_chk4;
$mes4_fecha1 = $row->mes4_fecha1;
$mes4_fecha2 = $row->mes4_fecha2;
$mes4_fecha3 = $row->mes4_fecha3;
$mes4_fecha4 = $row->mes4_fecha4;
$mes4_chk1 = $row->mes4_chk1;
$mes4_chk2=$row->mes4_chk2;
$mes4_chk3 = $row->mes4_chk3;
$mes4_chk4 = $row->mes4_chk4;
$mes6_fecha1 = $row->mes6_fecha1;
$mes6_fecha2 = $row->mes6_fecha2;
$mes6_chk1 = $row->mes6_chk1;
$mes6_chk2 = $row->mes6_chk2;
$mes12_fecha1 = $row->mes12_fecha1;
$mes12_fecha2 = $row->mes12_fecha2;
$mes12_chk1 = $row->mes12_chk1;
$mes12_chk2 = $row->mes12_chk2;

$mes18_fecha1 = $row->mes18_fecha1;
$mes18_fecha2 = $row->mes18_fecha2;
$mes18_chk1 = $row->mes18_chk1;
$mes18_chk2 = $row->mes18_chk2;
$mes18_chk3 = $row->mes18_chk3;
$mes18_fecha3 = $row->mes18_fecha3;
$year4_fecha1 = $row->year4_fecha1;
$year4_fecha2 = $row->year4_fecha2;
$year4_chk1 = $row->year4_chk1;
$year4_chk2 = $row->year4_chk2;
$year9_14_fecha1 = $row->year9_14_fecha1;
$year9_14_chk1 = $row->year9_14_chk1;
$year9_14_mas_chk1 = $row->year9_14_mas_chk1;
 } 
 
 
 
 
 
 
 
 ?>
 
 <div class="col-lg-12" id="vaccination-form">
    <h5 class="h5">Esquema básico de inmunización</h5>
    <div class="table-responsive">
      <table class="table table-borderless">
        <thead>
          <tr class='vacuan-dosis-checked'>
            <th scope="col"></th>
            <th scope="col" style="width:30px"><span class="material-symbols-outlined">syringe</span> VACUNA</th>
            <th scope="col">DOSIS</th>
            <th scope="col">ENFERMEDAD QUE PREVIENE</th>
			<th scope="col">FECHA APLICADA</th>
            <th scope="col">FUE INYECTAD@</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($nacer_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
          <tr class='vacuan-dosis-checked <?= $dosis ?> table-active'>
            <th scope="row">AL NACER</th>
            <td>
			BCG
			</td>
            <td>Dosis única</td>
			<td>Formas graves de tuberculosis</td>
			 <td> <input type="date"  class="form-control  vacunation-input format-date" value="<?=$nacer_fecha1?>" id="<?= $id_pedia ?>_nacer_fecha1" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_nacer_chk1" <?= $checked ?>>
			   </td>
			  
          </tr>
        
		  <?php
          if ($nacer_chk2 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" ></th>
            <td>
			 HEPATITIS B
			</td>
            <td></td>
			<td>Infección por hepatitis B en el recién nacido</td>
			 <td> <input type="date" class="form-control vacunation-input" value="<?=$nacer_fecha2?>" id="<?= $id_pedia ?>_nacer_fecha2" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_nacer_chk2" <?= $checked ?>>
			   </td>
			  
          </tr>
		    <?php
          if ($mes2_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th>2 MESES</th>
            <td>
			 ROTAVIRUS 
			</td>
            <td>1.ª dosis</td>
			<td>Diarreas graves producidas por rotavirus Poliomielitis</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes2_fecha1" value="<?=$mes2_fecha1?>"  /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes2_chk1"  <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		  	    <?php
          if ($mes2_chk2 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th scope="row" ></th>
            <td>
			 IPV 
			</td>
            <td></td>
			<td>Enfermedades graves producidas por el neumococo en menores de 5 años</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes2_fecha2" value="<?=$mes2_fecha2?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes2_chk2" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		  
		   	    <?php
          if ($mes2_chk3 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th scope="row" ></th>
            <td>
			 NEUMOCOCO 
			</td>
            <td></td>
			<td>Difeteria, tétanos, tosferina, hepatitis B y enfermedades</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes2_fecha3"  value="<?=$mes2_fecha3?>"/></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes2_chk3" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		   <?php
          if ($mes2_chk4 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th scope="row" ></th>
            <td>
			 PENTAVALENTE
			</td>
            <td></td>
			<td>graves producidas por Haemophilus influenzae Bo</td>
			 <td> <input type="date" class="form-control vacunation-input"id="<?= $id_pedia ?>_mes2_fecha4"  value="<?=$mes2_fecha4?>"/></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes2_chk4" <?= $checked ?>>
			   </td>
			  
          </tr>
		
		  <?php
          if ($mes4_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		
		  <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" >4 MESES</th>
            <td>
			 ROTAVIRUS 
			</td>
            <td>2.ª dosis</td>
			<td>Diarreas graves producidas por rotavirus Poliomielitis</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes4_fecha1"  value="<?=$mes4_fecha1?>"/></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes4_chk1" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		  
		   <?php
          if ($mes4_chk2 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" ></th>
            <td>
			 IPV 
			</td>
            <td></td>
			<td>Enfermedades graves producidas por el neumococo en menores de 5 años</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes4_fecha2" value="<?=$mes4_fecha2?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes4_chk2" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		  
		     <?php
          if ($mes4_chk3 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" ></th>
            <td>
			 NEUMOCOCO 
			</td>
            <td></td>
			<td>Difeteria, tétanos, tosferina, hepatitis B y enfermedades</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes4_fecha3"  value="<?=$mes4_fecha3?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes4_chk3" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		  
		      <?php
          if ($mes4_chk4 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" ></th>
            <td>
			 PENTAVALENTE
			</td>
            <td></td>
			<td>graves producidas por Haemophilus influenzae Bo</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes4_fecha4"  value="<?=$mes4_fecha4?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes4_chk4" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		        <?php
          if ($mes6_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th>6 MESES</th>
            <td>
			 IPV  
			</td>
            <td>1.ª dosis (refuerzo anual)</td>
			<td>Poliomielitis</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes6_fecha1"  value="<?=$mes6_fecha1?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes6_chk1" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		          <?php
          if ($mes6_chk2 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		    <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th></th>
            <td>
			 PENTAVALENTE INFLUENZA  
			</td>
            <td></td>
			<td>Gripe estacional o flu</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes6_fecha2"  value="<?=$mes6_fecha2?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes6_chk2" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		            <?php
          if ($mes12_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		    <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" >12 MESES<?=$mes12_fecha1?></th>
            <td>
			 SRP
			</td>
            <td>Refuerzo 1.ª dosis</td>
			<td>Sarampión, rubéola y paperas</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes12_fecha1"  value="<?=$mes12_fecha1?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes12_chk1" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		             <?php
          if ($mes12_chk2 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		  
		     <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" ></th>
            <td>
			 NEUMOCOCO
			</td>
            <td></td>
			<td>Enfermedades graves producidas por el neumococo en menores de 5 años</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes12_fecha2"  value="<?=$mes12_fecha2?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes12_chk2" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		     <?php
          if ($mes18_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th scope="row" >18 MESES</th>
            <td>
			 SRP
			</td>
            <td>dosis 2.ª dosis (1. refuerzo)</td>
			<td>Sarampión, rubéola y paperas</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes18_fecha1" value="<?=$mes18_fecha1?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes18_chk1" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		     <?php
          if ($mes18_chk2 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		      <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th scope="row" ></th>
            <td>
			 bOPV 
			</td>
            <td></td>
			<td>Poliomielitis</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes18_fecha2" value="<?=$mes18_fecha2?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes18_chk2" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		      <?php
          if ($mes18_chk3 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		    <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th scope="row" ></th>
            <td>
			 DPT 
			</td>
            <td></td>
			<td>Difteria, tétanos y tosferina</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_mes18_fecha3" value="<?=$mes18_fecha3?>"/></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_mes18_chk3" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		        <?php
          if ($year4_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		  	    <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" >4 AÑOS</th>
            <td>
			 bOPV
			</td>
            <td>2.º refuerzo</td>
			<td>Poliomielitis</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_year4_fecha1" value="<?=$year4_fecha1?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_year4_chk1" <?= $checked ?>>
			   </td>
			  
          </tr>
		        <?php
          if ($year4_chk2 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		     <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" ></th>
            <td>
			 DPT
			</td>
            <td></td>
			<td>Difteria, tétanos y tosferina</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_year4_fecha2" value="<?=$year4_fecha2?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_year4_chk2" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		        <?php
          if ($year9_14_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		      <tr class='vacuan-dosis-checked <?= $dosis ?> ' >
            <th scope="row" >9-14 AÑOS</th>
            <td>
			 VPH (Solo para niñas)
			</td>
            <td>1.ª y 2.ª dosis</td>
			<td>Virus del papiloma humano</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_year9_14_fecha1" value="<?=$year9_14_fecha1?>" /></td>
			  
             <td>
			   <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_year9_14_chk1" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		        <?php
          if ($year9_14_mas_chk1 == 0) {
            $checked = "";
            $dosis = "";
          } else {
            $checked = "checked";
            $dosis = "bg-success text-white";
          }
          ?>
		  
		      <tr class='vacuan-dosis-checked <?= $dosis ?> table-active' >
            <th scope="row" >9-14 AÑOS +</th>
            <td>
			 dt
			</td>
            <td>3.ª refuerzo</td>
			<td>Ifteria y tétanos</td>
			 <td> <input type="date" class="form-control vacunation-input" id="<?= $id_pedia ?>_year9_14_mas_fecha1" value="<?=$year9_14_mas_fecha1?>" /></td>
			 
             <td>
			
			   <input class="form-check-input " type="checkbox" name="<?= $id_pedia ?>_year9_14_mas_chk1" <?= $checked ?>>
			   </td>
			  
          </tr>
		  
		  
		  
        </tbody>
      </table>
    </div>
	 <input type="hidden" id="id_pedia_vacuacion" value="<?= $id_pedia ?>">
	  <input type="hidden" id="vacunation-form-checkbox" value="<?= $id_pedia ?>">
	  <input type="hidden" id="vacunation-form-inputs" value="<?= $id_pedia ?>">
	
	 <?php if ($id_pedia > 0) { ?>
    <div style="text-align:right">
      <br />

      <button type="button" class="btn btn-success" id="saveEditVacuation">Guardar </button>
      <span id="successEditVacunation" class="p-2"></span>
    </div>
  <?php  } 
  
    	$datapv= array(
'va_up_time'=>$up_time,
'va_in_time' =>$in_time,
'va_in_by'=>$in_by,
'va_up_by' => $up_by
);

$this->session->set_userdata($datapv);
  
  
  ?>
  </div>