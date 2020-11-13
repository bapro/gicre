<style>

.add-row{color:#38a7bb;border-color:#38a7bb;}
#plus{
    
    text-decoration:none;
    color:#38a7bb;
	display:inline-block;
    cursor:pointer
}
.td-input{background:white;border:1px solid #38a7bb}
.totpapat,.total,.totalpaseg{background:rgb(230,230,230);border:1px solid #38a7bb}
.col-sm-5,.col-sm-7,.col-sm-9,.col-sm-3,.col-sm-8{font-size:15px;}
td,th{text-align:left;font-size:14px}

.input-group-addon{border:none}
</style>
</head>
<!-- *** welcome message modal box *** -->


<body >


<div class="container text-left" style="overflow-x:auto;">
<h1 style="color:red">ESTAMOS TRABAYANDO EN ESTA PAGINA, DISCULPA !</h1>
   <div class="col-sm-12 showdown3 searchb" >
<div id='edit_this_tarif'></div>
   
   
   <hr/>
<table class="table">
<thead>
<tr class="trback">
<th class="heading">Servicio</th>
<th class="heading">Cantidad</th>
<th class="heading">Precio Unitario</th>
<th class="heading">Sub-Total</th>
<th class="heading">Total Pagar Seguro</th>
<th class="heading">Descuento</th>
<th class="heading">Total Pagar Paciente</th>
<th colspan="2" style='text-align:center'>Acciones</th>
</tr>
</thead>
<tbody>
<?php
 foreach($billings as $rf){
$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios')->row('procedimiento');
 ?>
<tr>
<td style="width:330px;font-size:14px">
<?php
echo $service;
?>

</td>
<td class="cantidad">
<?=$rf->cantidad?>
</td>
<td class="precio">
RD$ <?=$rf->preciouni?>
</div>
</td>
<td class="row-total">
RD$ <?=$rf->subtotal?>
</div>
</td>
<td class="total-pag-seg">
RD$ <?=$rf->totalpaseg?>

</td>
<td class="descuento">
RD$ <?=$rf->descuento?>

</td>
<td class="total-pag-pa">
RD$ <?=$rf->totpapat?>
</div>
</td>
<td><?=$rf->id2?><button id="button_edit_tarifarios" type="button" id="<?=$rf->id2?>" class="btn btn-sm"><i class="fa fa-pencil"></i> </button></td>
<td><button id="button_delete_tarifarios" type="button" class="btn btn-sm" style='color:red' ><i class="fa fa-trash"></i> </button></td>
</tr>
<?php
 }
 ?>

</tbody>
</table>
  </div>



 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 <script>

function getSegName(dropDown) {
var doctorid ="<?=$row->medico ?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/get_service_precio');?>',
data:{id_mssm1:dropDown.value,doctorid:doctorid},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(data);
recalc();
}
});

}


</script>
</body>



</html>
