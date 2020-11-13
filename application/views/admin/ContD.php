<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	

	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
     <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url();?>assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url();?>assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url();?>assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url();?>assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url();?>assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url();?>assets/img/apple-touch-icon-152x152.png" />

    <!-- owl carousel css -->

</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>
<body >
 <hr id="hr_ad"/>
   <div class="container" >
  <div class="row">
<div class="col-md-12" >
<a class="btn btn-primary btn-xs" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
 </div>
</div>
<br/>
 <div class="row" id="background_"  >
 <div class="col-md-12 col-md-offset-3">
 <h3 class="h3">Continuar a llenar datos del <?php foreach($UserDoctor as $row) {  echo $row->perfil; } ?> (# <?=$id_doc;?>) </h3>
 </div>
 <br/><br/>
<?php echo $this->session->flashdata('success_msg'); ?>
<br/><br/>
<form   class="form-horizontal"  method="post"  action="<?php echo site_url('admin/saveDoctorUpdate');?>" > 
<input type="hidden" class="form-control"  name="continuation" value="yes"   >
<input type="hidden" class="form-control" id="id_doc"  name="id_doc"  value="<?=$id_doc;?>"   >
<div class="col-xs-12" >
<?php foreach($UserDoctor as $row)
 
 {
 ?>
<div class="form-group">
<label class="control-label col-sm-4" >Nombres</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="name"  name="name" value="<?=$row->name?>"   >
</div>
</div>
 <?php
 }
 ?>
<div class="form-group">
<label class="control-label col-sm-4" >Exequatur</label>
<div class="col-sm-4">
<select  class="form-control select-examsis"   name="exequatur" id="exequatur" >
<option value="" hidden></option>
<?php 

foreach($execuatur as $row)
{ 
?>
<option><?=$row->code?> <?=$row->name?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Especialidad</label>
<div class="col-sm-4">
<select class="form-control select-examsis"    name="especialidad">
  <option></option>
  <?php 

 foreach($especialidades as $row)
 { 
 echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
 }
 ?>
 </select>
 
 </div>
 </div>	
 <div class="form-group">
<label class="control-label col-sm-4" >Correo electronico</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="email"  name="email"   >
</div>
</div>



<div class="form-group">
<label class="control-label col-sm-4">Telefono celular</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="primer_tel" name="primer_tel"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Extension</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="extension" name="extension"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Codigo </label>
<div class="col-sm-4">
<input type="text" class="form-control" id="codigo" name="codigo"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Centro médico</label>
<div class="col-sm-4">
<button type="button" class="chosen-toggle select col-xs-6">Seleccionar todo</button>
<button type="button" class="chosen-toggle deselect col-xs-6">Deselecionar todo</button>

<select  class="form-control chosen-select" data-placeholder="Selecionnar o escribir" multiple  name="centro_medico[]" >
<?php 
foreach($centro_medico as $rowc)
{ 

$iduser=$this->db->select('iduser')->where('iduser',$id_user )
->where('idcentro',$rowc->id_m_c)
->get('asistent_medico_centro')->row('iduser');

if($iduser==$id_user){
$selected="selected";
} else {
$selected="";
}

echo "<option value='$rowc->id_m_c.' $selected>$rowc->name</option>";
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Seguro médico</label>
<div class="col-sm-4">
<button type="button" class="chosen-toggle select col-xs-6">Seleccionar todo</button>
<button type="button" class="chosen-toggle deselect col-xs-6">Deselecionar todo</button>

<select  class="form-control chosen-select" data-placeholder="Selecionnar o escribir" multiple  name="seguro_medico[]" >

<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Agendas</label>
<div class="col-sm-4">
<button type="button" class="chosen-toggle select col-xs-6">Seleccionar todo</button>
<button type="button" class="chosen-toggle deselect col-xs-6">Deselecionar todo</button>

<select  class="form-control chosen-select" data-placeholder="Selecionnar o escribir" multiple  name="agenda[]" >

<?php 

foreach($diaries as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>
</div>


 </div>
   <div class="row  col-md-offset-4">
 <div class="col-md-12">
 <input type="submit"  class="btn btn-primary btn-xs" value="Enviar">
 </div>
 </form>

</div>
 </div>
 <br/><br/>
 <?php
        $this->load->view('footer');
 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->


  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="<?=base_url();?>assets/js/links_select.js"></script> 
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script>

$(".chosen-select").chosen({
no_results_text: "Oops, nada encontrado por : "
})
$('.chosen-toggle').each(function(index) {
console.log(index);
    $(this).on('click', function(){
    console.log($(this).parent().find('option').text());
         $(this).parent().find('option').prop('selected', $(this).hasClass('select')).parent().trigger('chosen:updated');
    });
});
$('.select-examsis').select2({ 
//tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	
</script>

</html>