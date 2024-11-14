<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="<?= base_url();?>assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

 <title>ADMEDICALL</title>
	<style>
	body{padding-bottom: 90px;}
.fs-7 { font-size: .5rem!important; }
.btn-back{left:0; top: 22px;}
@media screen and (max-width: 768px) {
    .btn-back{left:auto; right:50%}
  }
  
  
  
	</style>

</head>

<select name="ddlFruits" id="ddlFruits" class="select2">
    <option value="0">Please Select</option>
    <option value="1">Mango</option>
    <option value="2">Apple</option>
    <option value="3">Banana</option>
    <option value="4">Orange</option>
</select>
<br />
<br />
<input type="button" id="btnClone" value="Clone" />
<hr />
<div class="clonehere">
</div>

<script src="<?= base_url(); ?>assets_new/js/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
	
	$('.select2').select2({
		theme: 'bootstrap-5',
		//width: '100%'
	});
	
     $("#btnClone").bind("click", function () {
 var myClone = $("#ddlFruits").clone();


$(".clonehere").append(myClone);
        });
});
   
</script>