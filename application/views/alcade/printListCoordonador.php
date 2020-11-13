<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>FRANK SOTO ALCALDE Y ANA MARIA DIPUTADA</title>
<noscript><meta http-equiv="refresh" content="0; url=<?php echo site_url('admin_medico/noJs');?>" /></noscript>
    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">

<style>


td,th{text-align:left;font-size:10px}

@media print {
  #printPageButton {
    display: none;
  }
}
 .line{
width: 80px;
height: 9px;
border-bottom: 1px solid black;

}
</style>






</head>
<!-- *** welcome message modal box *** -->
 



<header>




<!-- *** NAVBAR END *** -->
</header>
<div class='container'>
 <h2 class="h2 center" style='text-align:center'>FRANK SOTO ALCALDE Y ANA MARIA DIPUTADA</h2>



<h3 style='text-align:center'>Listado De Los Coordinadores</h3>
<?php
$queryc = $this->db->query('SELECT * FROM  soto_coordinador group by cedula'); 
$cont= $queryc->num_rows() ;
echo "$cont registros";
?>
 <a  onClick="window.print()" id="printPageButton"  class="btn btn-primary btn-md"><i class="fa fa-print"></i> Imprimir</a>
<br/>
<br/>
<table  class="table table-striped sortable" style='font-size:10px' >
<thead>
<tr bgcolor="#5957F7" style="color:white">
<th>#</th>
<th  style='width:16%'>FOTO</th>
<th   style='width:26%;display:block'>NOMBRES</th>
<th>CEDULA</th>
<th>TEL</th>
<th>MESA</th>
<th>SECTOR</th>
<th>RECINTO</th>
<th style='width:10%'></th>
</tr>
</thead>
<tbody>
<?php
$color=1;
$i = 1;
$this->padron_database = $this->load->database('padron',TRUE);
$sql="SELECT * FROM  soto_coordinador group by cedula ORDER BY nombres DESC";
//$sql="SELECT * FROM  soto_coordinador limit 2";
$query= $this->db->query($sql);
 foreach($query->result() as $row)
{
$vced1 = substr($row->cedula, 0, 3);
$vced2 = substr($row->cedula, 3, 7);
$vced3 = substr($row->cedula, -1);
 if($color==1){
    echo '<tr bgcolor="">';
    $color="2";
  } else { 
    echo '<tr bgcolor="#dcdcdc">';
    $color="1";
  }?>
<td>
<?php
echo $i;
$i++;
?>

</td>
<td>
 <?php
if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$vced1)
->where('SEQ_CED',$vced2)
->where('VER_CED',$vced3)
->get('fotos')->row('IMAGEN');
echo '<img style="display:inline-block; width:70%;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';

} 
else{

?>
<img  style="display:inline-block; width:70%;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
?>

</td>
<td><?=$row->nombres?></td>
<td><?=$row->cedula?></td>
<td><?=$row->telefono?></td>
<td><?=$row->mesa?></td>
<td><?=$row->sector?></td>
<td><?=$row->recinto?></td>
<td><div class="line"></div></td>
</tr>

<?php
}
?>
</tbody>    
</table>
<hr/>
</div>




<script src="<?=base_url();?>assets/js/sortable.js"></script>

