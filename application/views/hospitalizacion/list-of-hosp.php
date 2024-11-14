<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
td,th{text-align:left}
td{font-size:13px}
.box-tooltip {
    color: black;
   background:white;
   border-radius:4px;
   padding:9px;
  border: 1px solid #C0C0C0;
   z-index:100000
}


</style>

</head>
<h2 class="h2" align="center">HOSPITALIZACION</h2>
<div class="col-md-12">

 <form class="form-inline"  >

<div class="form-group">
<label for="hasta" style='font-size:10px'>Buscar</label> <input type="text" id="record"  value="" name="record" class="form-control"  >
</div>

<div class="form-group">
<label for="desde" style='font-size:10px'>Desde</label> <input type="text" id="date_from" name="date_from" value="<?=date('d-m-Y');?>" class="form-control" readonly>
</div>
<div class="form-group">
<label for="hasta" style='font-size:10px'>Hasta</label> <input type="text" id="date_to"  value="<?=date('d-m-Y');?>" name="date_to" class="form-control" readonly >
</div>
<button type="button" id="click_button" class="btn btn-primary btn-xs" disabled><i class="fa fa-search"></i></button>

</form>
</div>

<div class="col-md-12">

<hr id="hr_ad"/>
<h3 class="h3" align="center">Listado de pacientes ingresados <button type='button' id='refresh'><i class="fa fa-refresh" aria-hidden="true"></i></button></h3>
<div class="row">
<div id="date-range-result">
<?php $this->load->view('hospitalizacion/list-data');?>
 </div>
 </div>
 </div>
  </div>
 <!--container-->

 <br/> <br/>


<?php $this->load->view('footer'); ?>


<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

 <script>
$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
	  
	 $('#hospitol').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
 //location.reload();
}); 
	   $("#record").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });



$(".cancelar-data").click(function(){
if (confirm("¿Estás seguro de cancelar?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('hospitalizacion/cancelHospData')?>',
data: {id:del_id,id_user:<?=$id_user?>},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
})



function disabledserach(){
var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output =((''+day).length<2 ? '0' : '') + day+ '-'  +
((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();


if($("#date_from").val()==output && $("#date_to").val()==output){
$("#click_button").prop('disabled',true);
}else{
$("#click_button").prop('disabled',false);   
}
}
	
	
	
 $("#date_from").datepicker({
dateFormat: 'dd-mm-yy',
	//maxDate: "-1d"

  });
  

  
  $("#date_to").datepicker({
	   onSelect: function() {
	disabledserach()
    },
    dateFormat: 'dd-mm-yy',
	//maxDate: "-1d"

  })
  
  
  
  $("#click_button").on('click', function() {
	$("#date-range-result").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	var date_from=$("#date_from").val();
    var date_to=$("#date_to").val();
	var id_user=<?=$id_user?>;
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('hospitalizacion/listDateRange');?>',
	data:{date_from:date_from,date_to:date_to,id_user:id_user},
	success: function(data){
	$("#date-range-result").html(data);
	},
 
	});
});
$("#refresh").on('click', function() {
		$("#date-range-result").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	  location.reload(true);
//$("#date-range-result").load(location.href + " #date-range-result");*/
});
</script>
