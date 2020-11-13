<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>
<noscript><meta http-equiv="refresh" content="0; url=<?php echo site_url('admin_medico/noJs');?>" /></noscript>
    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">  
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
	
<style>
td,th{text-align:left}

.fa.fa-history,.fa.fa-check, em{
	
color:red;font-size:11px;text-transform:lowercase	
}

li{
	list-style: none;
	float: left;
	margin-right: 16px;
	padding:5px;
	point-events:none
	
}

.load {
 position: fixed; /* or absolute */
  top: 50%;
  left: 50%;
}
</style>
</head>
<body>
<!-- *** welcome message modal box *** -->
<div class="container">
<div class="load"></div>
<h3>Citas de hoy</h3>
<div class="row">
<?php
if($perfil=="Asistente Medico")
 {
?>
 <form class="form-inline" method="get"  action="<?php echo site_url("$controller/SeachCitaResultAs");?>" >
 <div class="col-md-3" > 
<select id="doctor"  name="doctor"  class="form-control select2" style="background:#E0E5E6;width:100%" >
<option value="">Seleccione un medico</option>
<?php
$sql ="SELECT id_doctor FROM centro_doc_as WHERE id_asdoc =$iduser group by id_doctor";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$name= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
	echo '<option value="'.$row->id_doctor.'">Dr '.$name.'</option>';
}?>
</select>
</div>
 <?php 

 } else{
 ?>

 <form class="form-inline" method="get"  action="<?php echo site_url("$controller/SeachCitaResult");?>" >
  <div class="col-md-3" > 
<select  name="centro"  class="form-control select2" style="background:#E0E5E6;width:100%" >
 <?php 
foreach($centro_medico as $row)
 { 
  echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>
</select>
</div>
<?php 
 }
 ?>

<div class="col-md-9" style="background:#E0E5E6;border:1px solid #38a7bb;"> 
<div class="form-group">
<label for="desde" style='font-size:10px'>Desde</label><input type="text" id="date_from" name="date_from" value="<?=date('d-m-Y');?>" class="form-control" readonly>
</div>
<div class="form-group">
<label for="hasta" style='font-size:10px'>Hasta</label><input type="text" id="date_to"  value="<?=date('d-m-Y');?>" name="date_to" class="form-control" readonly >
</div>
<button type="submit" id="click_button" class="btn btn-primary btn-xs" disabled><i class="fa fa-search"></i></button>

<?php
 if($perfil=="Asistente Medico")
 {
 } else{
 if($appointments !=NULL)
 {
?>
<a target="_blank" href="<?php echo base_url("printings/print_hoy_cita1/$iduser/$perfil")?>"   title="Imprimir Las Citas de Hoy" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
<?php }
} ?>

</div>
</form>
<span id="flash1"></span>
</div>




<?php
$per_page = 10;
//Calculating no of pages
$hoy=date("d-m-Y");

//$count = $result->num_rows();
$pages = ceil($count/$per_page);
?>
<div id="load-citas-hoy"></div>
<div id="pagination">
<ul class="pagination">
<?php
//Pagination Numbers
for($i=1; $i<=$pages; $i++)
{
echo '<li id="'.$i.'">'.$i.'</li>';
}
?>
</ul>
</div>

</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript">
$(document).ready(function(e){

//Hide Loading Image
//Hide Loading Image
$(".load").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
function Hide_Load() {
$(".load").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
};
//Default Starting Page Results
$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
//$("#load-citas-hoy").load("pagination_data.php?page=1", Hide_Load());
$("#load-citas-hoy").load("<?php echo base_url(); ?>/testSpeed/paginate_data_cita_hoy?page="+1);


//Pagination Click
$("#pagination li").click(function(){
	$(".load").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
//CSS Styles
$("#pagination li").css({'border' : 'solid #dddddd 1px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
//$("#load-citas-hoy").load("pagination_data.php?page=" + pageNum, Hide_Load());
$("#load-citas-hoy").load("<?php echo base_url(); ?>/testSpeed/paginate_data_cita_hoy?page=" + pageNum);
});



  })
  
</script>
</body>
</html>