<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>Reporte De Facturas Enviados ARS</title>
<noscript><meta http-equiv="refresh" content="0; url=<?php echo site_url('admin_medico/noJs');?>" /></noscript>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <style>
th{text-align:center}
td{font-size:15px}
</style>
</head>
<body>
    <div class="container">
 
<h3 class="h3 his_med_title">Reporte De Facturas Enviados ARS</h3>
<div style="height:600px;overflow-y:auto">
<table  class="table table-striped" >
<thead>
<tr style="background:#5957F7;color:white">
<th>ARS</th>
<th>
Desde
</th>
<th>
Hasta
</th>
<th>Centros</th>
<th>Area</th>
<th>Facturas</th>
<th>Cuento Por Cobra</th>
<th>Medico</th>
<th>Ver</th>
</tr>
</thead>
<tbody style='font-size:10px'>
<?php
$i=1;
$this->padron_database = $this->load->database('padron',TRUE);

$sql="SELECT *,sum(totpagseg) AS cc  FROM  invoice_ars_claims $where_report GROUP BY ncf_id  ORDER BY fecha DESC";
$query= $this->db->query($sql);
 foreach($query->result() as $row)
{
$fechadesc=$this->db->query("SELECT fecha FROM  invoice_ars_claims where ncf_id=$row->ncf_id ORDER BY fecha DESC")->row()->fecha;

$fechasc=$this->db->query("SELECT fecha FROM  invoice_ars_claims where ncf_id=$row->ncf_id  ORDER BY fecha ASC")->row()->fecha;

$qry=$this->db->query("SELECT id FROM  invoice_ars_claims where ncf_id=$row->ncf_id ");
$totfac=$qry->num_rows();
//------------------------------------------------------------------------------------------------------------------------
$centro=$this->db->select('name')->where('id_m_c',$row->center_id)->get('medical_centers')->row('name');
$med=$this->db->select('*')->where('id_user',$row->medico)->get('users')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$med['area'])->get('areas')->row('title_area');
$seguro=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$fecha= date("d-m-Y", strtotime($row->fecha));
?>
<tr>
<td><?php echo $seguro?></td>
<td><?= date("d-m-Y", strtotime($fechasc))?></td>
<td><?=date("d-m-Y", strtotime($fechadesc))?></td>
<td><?=$centro?></td>
<td><?=$area?></td>
<td><?=$totfac?></td>
<td>RD$<?=number_format($row->cc,2)?></td>
<td><?=$med['name']?></td>
<td><a  target="_blank" href="<?php echo base_url("invoice_ars_report_controller/patient_invoice_ncf/$row->ncf_id/$fechasc/$fechadesc/$row->paciente")?>"  title="Imprimir" class="btn btn-sm" >Ver</a></td>
</tr>

<?php
}
?>
</tbody>    
</table>
</div>
</div>
</body>
</html>


