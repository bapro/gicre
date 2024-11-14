<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Factura de Venta</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 12px;
			margin: 0;
			padding: 0;
			width: 90%;
		}

		.ticket {
			width: 80mm;
			/* Ancho del ticket */
		}

		.header {
			text-align: center;
			font-size: 16px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.address {
			margin-bottom: 10px;
		}

		.address p {
			margin: 0;
		}

		.details {
			border-bottom: 1px dotted #000;
			padding: 5px 0;
		}

		.details-prip {
			border-bottom: 1px dotted #000;
			padding: 5px 0;
			padding-bottom: 17px;
		}

		.details p {
			margin: 0;
			padding: 2px 0;
		}

		.details-prip p {
			margin: 0;
			padding: 2px 0;
			text-align: center;
		}

		.total {
			margin-top: 5px;
			text-align: right;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			font-size: 12px;
			margin-top: 10.7px;
		}

		th,
		td {
			padding: 8px;
			text-align: left;
		}


		th {
			background-color: #f2f2f2;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tr:hover {
			background-color: #ddd;
		}

		.center-text {
			text-align: center;
		}

		.currency {
			font-weight: bold;
			color: green;
		}

		#Firma {
			text-align: center;
		}

		#Separarador_firma {
			border-top: 1px dotted #000;
			margin-top: 50px;
			margin-bottom: -10px;
		}

		#info-pro {
			font-size: 13px;
		}
	</style>
</head>

<body>


	<?php

	if ($display_report != NULL) {
		foreach ($display_report as $row1) {
			$paciente = $this->db->select('id_p_a,nombre,tel_resi, nec1, tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,plan')->where('id_p_a', $row1->paciente)
				->get('patients_appointments')->row_array();

			$pm = $this->db->select('paciente,medico,centro_medico,id_rdv')->where('idfacc', $row1->idfacc)->get('factura2')->row_array();

			$lastPatConDiag = $this->clinical_history->select('id, procedimiento, otros_diagnos')->where('historial_id', $row1->paciente)->where('inserted_by', $row1->medico)->order_by('id', 'DESC')->get('h_c_conclusion_diagno')->row_array();
			if ($lastPatConDiag) {
				$procedimiento = $lastPatConDiag['procedimiento'];

				$otros_diagnos = $lastPatConDiag['otros_diagnos'];
				$con_id_link = $lastPatConDiag['id'];
				$show_diagno_pat = $this->model_admin->show_diagno_pat($con_id_link);
			} else {
				$procedimiento = '';
				$otros_diagnos = '';
				$show_diagno_pat = NULL;
			}

			$numafiliado = $this->db->select('input_name')->where('patient_id', $row1->paciente)->where('input_name !=', '')
				->get('saveinput')->row('input_name');

			$centroName = $this->db->select('name')->where('id_m_c', $row1->centro_medico)->get('medical_centers')->row('name');
			$seguron = $this->db->select('title,logo,id_sm,rnc')->where('id_sm', $row1->seguro_medico)->get('seguro_medico')->row_array();
			$doctorInfo = $this->db->select('name, exequatur, area')->where('id_user', $row1->medico)->get('users')->row_array();
			$area = $this->db->select('title_area')->where('id_ar', $doctorInfo['area'])->get('areas')->row('title_area');
			$exequatur = $doctorInfo['exequatur'];
			$doctor = $doctorInfo['name'];
			if ($seguron['logo'] == "") {
				$logoseg = "";
			} else {
				$logoseg = '<img  style="width:60px;" src="' . base_url() . '/assets/img/seguros_medicos/' . $seguron['logo'] . '"  />';
			}
			$seguroCodDoc = $this->db->select('codigo')->where('id_seguro', $row1->seguro_medico)->where('id_doctor', $row1->medico)->get('codigo_contrato')->row('codigo');

			$seguroCodCentro = $this->db->select('codigo')->where('id_centro', $row1->centro_medico)->where('id_seguro', $row1->seguro_medico)->get('codigo_contrato')->row('codigo');

			$segt = substr($seguron['title'], 0, 6);
			if ($segt == 'SENASA') {
				$numseg = 'NSS';
			} else {
				$numseg = 'NO. AFILIADO';
			}

			if ($print == 'medico') {
				$headInfo = "$doctor";
				$headInfo_ = "<span style='text-align:center;'>$area</span>
	<span style='text-align:center;font-size:10px'>Exeq :$exequatur</span><br/>";
				$seguroContrato = $seguroCodDoc;
				$numFac = $row1->numfac;
			} else {
				$seguroContrato = $seguroCodCentro;
				$headInfo = $centroName;
				$headInfo_ = "";
				$numFac = $row1->numfac2;
			}
		}

	?>

		<div class="ticket">

			<div class="address">
				<div class="details-prip ">
					<p style="font-weight: bold; text-transform:uppercase;"><?= $get_centro_info_by_id['name'] ?></p>
					<p>RNC: <?= $get_centro_info_by_id['rnc'] ?></p>

					<p>Dirección: <?= $centro_adress ?></p>
					<p>Teléfono: <?= $get_centro_info_by_id['primer_tel'] ?> <?= $get_centro_info_by_id['segundo_tel'] ?> </p>

					<p>Fecha: <?= date("d-m-Y H:i"); ?></p>

					<p> <strong> Nro. FACTURA:</strong> <?= $numFac ?></p>
				</div>

				
				<div class="details">
					<p>Doctor : <?= $doctor ?> </p>
					<p>Especialidad : <?= $area ?></p>

				</div>

			</div>
			<div style="padding-top: -5px;" class="details">

				<p>Aseguradora: <?= $seguron['title'] ?></p>
				<p>Paciente: <?= $paciente['nombre'] ?></p>
				<p>RNC/Cédula: <?= $paciente['cedula'] ?></p>
				<p>Teléfono: <?= $paciente['tel_cel'] ?></p>
				<p>NEC: <?= $paciente['id_p_a'] ?></p>

				<?php
				if ($row1->seguro_medico != 11) { ?>
					<p>NRO AUTORIZACIÓN: <?= $row1->numauto ?></p>
					<p>AUTORIZADO POR: <?= $row1->autopor ?></p>
				<?php } ?>

			</div>
			<p style="text-align: center;  margin-top: 7px; margin-bottom: -5px;">Factura de seguro médico</p>

			<table>
				<thead>

					<tr id="info-hed">

						<th style="text-align: center;">Servicio</th>

					</tr>
				</thead>
				<tbody>


					<?php
					$queryServices = $this->db->query("SELECT idfac, grupo_area, service FROM factura WHERE id2=$row1->idfacc GROUP BY service");
					if ($print == 'medico') {
						echo "<tr id='info-hed'>";
						foreach ($queryServices->result() as $row2) {
							$service = $this->db->select('procedimiento')->where('id_tarif', $row2->service)->get('tarifarios_test')->row('procedimiento');
							echo "<td style='text-align: center; font-size:10.4px; ' >" . $service . "</td>";
						}
						echo "</tr>";
					} else {
						if ($row1->seguro_medico != 11) {
							$area_public_centro_asegurado = $this->db->select('area_public_centro_asegurado')->where('idfacc', $row1->idfacc)->get('factura2')->row('area_public_centro_asegurado');
							echo $area_public_centro_asegurado;
						} else {
							foreach ($queryServices->result() as $row) {
								echo $row->grupo_area . " - ";
							}
						}
						//$service=$this->db->query("Select DISTINCT groupo FROM centros_tarifarios_test WHERE id_c_taf=$row2->service GROUP BY groupo")->row()->groupo;
					}

					?>

				</tbody>
			</table>

			<?php
			$this->db->select("SUM(subtotal) as sbt");
			$this->db->where("id2", $row1->idfacc);
			$this->db->from('factura');
			$sbt = $this->db->get()->row()->sbt;
			$sbt = number_format($sbt, 2);
			//---------------------------------
			$this->db->select("SUM(totalpaseg) as tps");
			$this->db->where("id2", $row1->idfacc);
			$this->db->from('factura');
			$tps = $this->db->get()->row()->tps;
			$tps = number_format($tps, 2);
			//-------------------------------------------

			$this->db->select("SUM(totpapat) as tpat");
			$this->db->where("id2", $row1->idfacc);
			$this->db->from('factura');
			$tpat = $this->db->get()->row()->tpat;
			$tpat = number_format($tpat, 2);

			?>

			<div class="total">
				<p style="font-size: 11px;">TOTAL RECLAMADO : RD$ <?= $sbt ?></p>
				<p style="font-size: 11px;">ASEGURADORA PAGARA: RD$ <?= $tps ?></p>
				
				<p style="font-size: 11px;">EL PACIENTE PAGARA: RD$ <?= $tpat ?></p>
			</div>

			<p id="Separarador_firma"></p>
			<p id="Firma">FIRMA DEL CLIENTE</p>
		</div>
</body>

<?php


	} else {
		echo "No hay datos";
	}


?>

</html>