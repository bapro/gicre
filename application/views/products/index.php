<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Pago de servicio</title>
<meta charset="utf-8">

<!-- Include bootstrap library -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<!-- Include custom css -->

</head>
<body>
<div class="container">
	<h2 style='text-align:center'>SERVICIO</h2>
    <div class="row">
        <div class="col-lg-12" style='text-align:center'>
		<!-- List all products -->
		<?php if($query2->result() !=NULL){ foreach($query2->result() as $row2){ ?>
			<!--<div class="col-sm-4 col-lg-4 col-md-4">-->
			<div class="center-block well" style="width: 340px">
				<div class="thumbnail">
					<div class="caption">
						<h4 class="pull-right">$<?php echo $row2->price; ?> USD</h4>
						<h4><a href="javascript:void(0);"><?php echo $row2->name; ?></a></h4>
				      </div>
					<div class="ratings">
					<a href="https://www.admedicall.com/products/buy/<?=$row2->id?>/<?=$id_apoint?>">
							<img src="https://www.admedicall.com/assets/img/boton-paypal.png" />
						</a>
						
					</div>
				</div>
			</div>
		<?php } }else{ ?>
			<p>No hay servicios...</p>
		<?php } ?>
        </div>
    </div>
</div>
</body>
</html>