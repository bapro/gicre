  <?php
$name=($this->session->userdata['staff_name']);
$id_admin=($this->session->userdata['staff_id']);

?>
<header>
<div class="b4" id="top">
<div class="container">
<div class="row">

<div class="col-xs-12">
<div class="social" >
<a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
<a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
<a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
<a href="#" class="external youtube" data-animate-hover="pulse"><i class="fa fa-youtube"></i></a>
<a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
</div>

<form class="login1" role="search" style="float:right" >
<div class="input-group add-on">
<input class="form-control" placeholder="Buscar" name="srch-term" id="srch-term" type="text">
<div class="input-group-btn">
<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
</div>
</div>
</form> 

<!--  <a href="customer-register.html"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Registrarse</span></a>-->


</div>
</div>
</div>
</div>

<!-- *** TOP END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

<div class="navbar navbar-default yamm" role="navigation" id="navbar">

<div class="container">
<div class="navbar-header">

<a class="navbar-brand home">

<span style="position:absolute;z-index:3000px;top:3px"><img src="<?=base_url();?>assets/img/aaaadd.png" width="80" alt="Universal logo" class="hidden-xs hidden-sm" ></span>
<img src="<?= base_url();?>assets/img/adms.png" alt="Admedicall" class="visible-xs visible-sm"><span class="sr-only">Admedicall</span>
</a>
<div class="navbar-buttons">
<button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-align-justify"></i>
</button>
</div>
</div>
<!--/.navbar-header -->

<div class="navbar-collapse collapse" id="navigation">

<ul class="nav navbar-nav navbar-right" >



<li class="dropdown" style="font-size:13px" >

  <a title=" <?= $name; ?> <?= $last_name; ?> : admin de Admedicall " class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
  <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/>  <?= $name; ?> <?= $last_name; ?> : Asistente 



   <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
   <li><a  ><img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?= $name; ?> <?= $last_name; ?> </a></li>
 <li><a href="<?php echo base_url('login/staff_logout')?>" ><i class="fa fa-sign-out"></i>  Cerrar Session</a></li>
    </ul>

</li>



</ul>

</div>
<!--/.nav-collapse -->



<div class="collapse clearfix" id="search">

<form class="navbar-form" role="search">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search">
<span class="input-group-btn">

<button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

</span>
</div>
</form>

</div>
<!--/.nav-collapse -->

</div>


</div>
<!-- /#navbar -->

</div>

<!-- *** NAVBAR END *** -->

</header>

<div class="modal fade" id="CreateUser" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
