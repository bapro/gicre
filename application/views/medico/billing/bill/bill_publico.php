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

</style>
  <?php foreach($billings2 as $row)


if($is_admin=="yes"){
 $controller="admin";
} else {
$controller="medico";
}   ?>

<div class="container text-left" style="overflow-x:auto;">
<?=$header?>


   <div class="col-sm-12 showdown3 searchb" >

<div id='edit_this_tarif'></div>
   
   
   <hr/>
<div id='factura_table_view'></div>
  </div>



 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script>

 factura_table_view();
 
 function factura_table_view()
{
 var id_facc = "<?=$row->idfacc?>";
 var is_admin = "<?=$is_admin?>";
  var user = "<?=$name?>";
  var identificar = "<?=$identificar?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/factura_table_view')?>",
data: {id_facc:id_facc,is_admin:is_admin,user:user,identificar:identificar},
cache: true,
success:function(data){ 
$("#factura_table_view").html(data);
}  
});

}
 
 

</script>

