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
      font-size: 14px;
    }
  </style>
</head>

<body>

  <?php

  $this->padron_database = $this->load->database('padron', TRUE);


  foreach ($billing1 as $row1)


    $numafiliado = $this->db->select('input_name')->where('patient_id', $row1->paciente)->where('input_name !=', '')
      ->get('saveinput')->row('input_name');


  $seguron = $this->db->select('title,logo')->where('id_sm', $row1->seguro_medico)->get('seguro_medico')->row_array();
  $centro = $this->db->select('name,logo,provincia,municipio,barrio,calle,rnc,primer_tel,segundo_tel,type')->where('id_m_c', $row1->centro_medico)
    ->get('medical_centers')->row_array();
  $provincia = $this->db->select('title')->where('id', $centro['provincia'])->get('provinces')->row('title');
  $muncipio = $this->db->select('title_town')->where('id_town', $centro['municipio'])->get('townships')->row('title_town');

  $area = $this->db->select('title_area')->where('id_ar', $row1->area)->get('areas')->row('title_area');
  $paciente = $this->db->select('nombre,tel_resi,nec1, tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,barrio,calle')->where('id_p_a', $row1->paciente)
    ->get('patients_appointments')->row_array();
  $doctor = $this->db->select('id_user, name')->where('id_user', $row1->medico)
    ->get('users')->row('name');





  //----------------------------get patient abono----------------------------------------
  $total_bono = 0;
  $sqlabono = "select * from factura_privado_bono where id_fac=$last_bill_id order by fecha DESC";
  $abonodata = $this->db->query($sqlabono);
  foreach ($abonodata->result() as $row) {

    $total_bono += $row->bono;
  }

  foreach ($billing2 as $rf) {

    $fecha_fac = date('d-m-Y', strtotime($rf->filter));
  }

  ?>

  <div class="ticket">

    <div class="address">
      <div class="details-prip ">
        <p style="font-weight: bold; text-transform:uppercase;"><?= $centro['name'] ?></p>
        <p>Teléfonos: <?= $centro['primer_tel'] ?> <?= $centro['segundo_tel'] ?></p>
        <p>RNC: <?= $centro['rnc'] ?></p>
        <p>Ubicación: <?= $centro['calle'] ?>, <?= $centro['barrio'] ?>, <?= $provincia ?>, <?= $muncipio ?> </p>
        <p>Fecha: <?= $fecha_fac; ?></p>

        <p> <strong> Nro. FACTURA:</strong> <?= $row1->numfac2 ?></p>

      </div>


      <div class="details">
        <p>Doctor : <?= $get_doctor_info_by_id['name']; ?> </p>
        <p>Especialidad : <?= $doctor_area; ?> </p>
      </div>

    </div>
    <div style="padding-top: -5px;" class="details">
      <p>Aseguradora: <?= $seguron['title'] ?></p>
      <p>Paciente: <?= $paciente['nombre'] ?></p>
      <p>RNC/Cédula: <?= $paciente['cedula'] ?></p>
      <p>Teléfono: <?= $paciente['tel_cel'] ?> / <?= $paciente['tel_resi'] ?></p>
      <p>NEC: <?= $paciente['nec1'] ?></p>
    </div>
    <p style="text-align: center;  margin-top: 7px; margin-bottom: -5px;">Factura privada</p>
    <table>
      <thead>
        <tr id="info-hed">
          <th>Servicio</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>SubTotal</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($billing2 as $rf) {

          if ($print == "medico") {
            $service = $this->db->select('procedimiento')->where('id_tarif', $rf->service)->get('tarifarios_test')->row('procedimiento');
          } else {
            $service = $this->db->select('sub_groupo')->where('id_c_taf', $rf->service)->get('centros_tarifarios_test')->row('sub_groupo');
          }

        ?>

          <tr id="info-pro">
            <td><?php echo $service ?> </td>
            <td><?= $rf->cantidad ?></td>
            <td><?= $money_device ?><?= number_format($rf->preciouni, 2); ?></td>
            <td><?= $money_device ?><?= number_format($rf->subtotal, 2); ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>


    <?php
    $this->db->select("SUM(cantidad) as cant");
    $this->db->where("id2", $last_bill_id);
    $this->db->from('factura');
    $cant = $this->db->get()->row()->cant;
    //----------------------------------------------
    $this->db->select("SUM(preciouni) as pu");
    $this->db->where("id2", $last_bill_id);
    $this->db->from('factura');
    $pu = $this->db->get()->row()->pu;
    $pun = number_format($pu, 2);
    //-----------------------------------------------------
    $this->db->select("SUM(subtotal) as sbt");
    $this->db->where("id2", $last_bill_id);
    $this->db->from('factura');
    $sbt1 = $this->db->get()->row()->sbt;

    //-----------------------------------------
    $sbt = number_format($sbt1, 2);
    //---------------------------------
    $this->db->select("SUM(descuento) as descu");
    $this->db->where("id2", $last_bill_id);
    $this->db->from('factura');
    $descu1 = $this->db->get()->row()->descu;
    $descu = number_format($descu1, 2);
    //-------------------------------------------

    $this->db->select("SUM(totpapat) as tpat");
    $this->db->where("id2", $last_bill_id);
    $this->db->from('factura');
    $tpat = $this->db->get()->row()->tpat;
    $tpat = number_format($tpat, 2);

    //$itbs1 = $sbt1 * 0.18;
	$itbs1 = 0;
    $totgeneral1 = $sbt1 - $itbs1;

    $totgeneral = number_format($totgeneral1, 2);

    $itbs = number_format($itbs1, 2);

    $totpagpat = 0;
    $totpagpat1 = $sbt1 - ($total_bono + $descu1);
    $totpagpat = number_format($totpagpat1, 2);
    ?>


    <div class="total">
      <p>SUBTOTAL: <?= $money_device ?><?= $sbt; ?></p>
      <p>TOTAL ITBIS: <?= $money_device ?><?= $itbs1 ?></p>
	   <p>TOTAL GENERAL: <?= $money_device ?><?= $totgeneral ?></p>
      <p>DESCUENTO: <?= $money_device ?><?= $descu; ?></p>
      <p>ABONO: <?= $money_device ?><?= number_format($total_bono, 2); ?></p>

      <p>TOTAL A PAGAR: <?= $money_device ?><?= $totpagpat; ?></p>

    </div>

    <p id="Separarador_firma"></p>
    <p id="Firma">FIRMA DEL CLIENTE</p>
  </div>
</body>

</html>