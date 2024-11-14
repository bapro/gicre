<?php
foreach($query_paginate->result() as $row){
$user_c22=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c23=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<em style='font-size:12px'>creado por <?=$user_c22?>, <?=$inserted_time?> -- cambiado por <?=$user_c23?>, <?=$update_time?></em>
<br/><br/>
<button type='button' id='CrearTurno9-7' class="btn btn-xs btn-primary">Crear Turno 9-7</button>
<button type='button' id='_cancelTurno9-7' class="btn btn-xs btn-warning" title="Eliminar" >Eliminar</button>
<div  class="form-horizontal" >

<form method="post" id='_SaveTurno97'>
<input type='hidden' name='user_id' value="<?=$user_id?>"/>
<input type='hidden' name='id_turno97' value="<?=$row->id?>"/>
<div class="col-xs-8 "  >
<table class='table b-h '>
<tr>
<td>
<table class='table' id='_table-turno-9-7-liq'>
<tr>
<th colspan='3'>LIQUIDOS INGERIDOS</th>
</tr>
<tr>
<th>Hora</th><th>Solución</th><th>Meds</th><th>Vo</th>
</tr>

<tr>
<td>10:00 pm</td><td>
<input class="form-control _turno97_sol" name="turno97_1" value='<?=$row->turno97_1?>'  />
</td>
<td><input class="form-control _turno97_med" name="turno97_2" value='<?=$row->turno97_2?>' /></td>
<td><input class="form-control _turno97_vo" name="turno97_3"  value='<?=$row->turno97_3?>'/></td>
</tr>
<tr>
<td>11:00 pm</td><td><input class="form-control _turno97_sol" name="turno97_4" value='<?=$row->turno97_4?>' /></td>
<td><input class="form-control _turno97_med" name="turno97_5" value='<?=$row->turno97_5?>'/></td>
<td><input class="form-control _turno97_vo" name="turno97_6" value='<?=$row->turno97_6?>'/></td>
</tr>
<tr>
<td>12:00 pm</td><td><input class="form-control _turno97_sol" name="turno97_4_" value='<?=$row->turno97_4_?>' /></td>
<td><input class="form-control _turno97_med" name="turno97_7" value='<?=$row->turno97_7?>'/></td>
<td><input class="form-control _turno97_vo" name="turno97_8" value='<?=$row->turno97_8?>'/></td>
</tr>
<tr>
<td>1:00 am</td><td><input class="form-control _turno97_sol" name="turno97_9" value='<?=$row->turno97_9?>'/></td>
<td><input class="form-control _turno97_med" name="turno97_10" value='<?=$row->turno97_10?>' /></td>
<td><input class="form-control _turno97_vo" name="turno97_11"  value='<?=$row->turno97_11?>'/></td>
</tr>
<tr>
<td>2:00 am</td><td><input class="form-control _turno97_sol" name="turno97_12" value='<?=$row->turno97_12?>' /></td>
<td><input class="form-control _turno97_med" name="turno97_13" value='<?=$row->turno97_13?>'/></td>
<td><input class="form-control _turno97_vo" name="turno97_14" value='<?=$row->turno97_14?>'/></td>
</tr>
<tr>
<td>3:00 pm</td><td><input class="form-control _turno97_sol" name="turno97_15" value='<?=$row->turno97_15?>'/></td>
<td><input class="form-control _turno97_med" name="turno97_16" value='<?=$row->turno97_16?>'/></td>
<td><input class="form-control _turno97_vo" name="turno97_17" value='<?=$row->turno97_17?>'/></td>
</tr>
<tr>
<td>4:00 pm</td><td><input class="form-control _turno97_sol" name="turno97_18" value='<?=$row->turno97_18?>' /></td>
<td><input class="form-control _turno97_med" name="turno97_19" value='<?=$row->turno97_19?>'/></td>
<td><input class="form-control _turno97_vo" name="turno97_19_" value='<?=$row->turno97_19_?>'/></td>
</tr>
<tr>
<td>5:00 pm</td><td><input class="form-control _turno97_sol" name="turno97_20" value='<?=$row->turno97_20?>' /></td>
<td><input class="form-control _turno97_med" name="turno97_21" value='<?=$row->turno97_21?>'/></td>
<td><input class="form-control _turno97_vo" name="turno97_22" value='<?=$row->turno97_22?>'/></td>
</tr>

<tr>
<td>6:00 pm</td><td><input class="form-control _turno97_sol" name="turno97_23_" value='<?=$row->turno97_23_?>' /></td>
<td><input class="form-control _turno97_med" name="turno97_24_" value='<?=$row->turno97_24_?>'/></td>
<td><input class="form-control _turno97_vo" name="turno97_25_" value='<?=$row->turno97_25_?>'/></td>
</tr>




<tr>
<th>totAL
<input name='turno97_23' id='_turno97_23' type='hidden' value='<?=$row->turno97_23?>'/>
<input name='turno97_24' id='_turno97_24' type='hidden' value='<?=$row->turno97_24?>'/>
<input name='turno97_25' id='_turno97_25' type='hidden' value='<?=$row->turno97_25?>'/>
</th>
<th class='_tot_turno97_sol _clear-turno97' ><?=$row->turno97_23?></th> 
<th  class='_tot_turno97_med _clear-turno97' ><?=$row->turno97_24?> </th>
<th  class='_tot_turno97_vo _clear-turno97' ><?=$row->turno97_25?></th>
</tr>
</table>
</td >
<td    style=' padding:5px;'>
<table class='table b-h ' id='_table-turno-9-7-el'>
<tr>
<th colspan='3'>ELIMINADOS</th>
</tr>
<tr>
<th>Diuresis</th><th>Evacuación</th>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_26' value='<?=$row->turno97_26?>' /></td> 
<td><input class="form-control _turno97_eva" name='turno97_27' value='<?=$row->turno97_27?>' /></td>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_28' value='<?=$row->turno97_28?>' /></td>
<td><input class="form-control _turno97_eva" name='turno97_97' value='<?=$row->turno97_97?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_30' value='<?=$row->turno97_30?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_31' value='<?=$row->turno97_31?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_32' value='<?=$row->turno97_32?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_33' value='<?=$row->turno97_33?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_34' value='<?=$row->turno97_34?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_35' value='<?=$row->turno97_35?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_36' value='<?=$row->turno97_36?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_37' value='<?=$row->turno97_37?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_38' value='<?=$row->turno97_38?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_39' value='<?=$row->turno97_39?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_40' value='<?=$row->turno97_40?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_41' value='<?=$row->turno97_41?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno97_di" name='turno97_42' value='<?=$row->turno97_42?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_43' value='<?=$row->turno97_43?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno97_di"  name='turno97_44' value='<?=$row->turno97_44?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_45' value='<?=$row->turno97_45?>'/></td>
</tr>

<tr>
<td><input class="form-control _turno97_di"  name='turno97_46_' value='<?=$row->turno97_46_?>'/></td>
<td><input class="form-control _turno97_eva" name='turno97_47_' value='<?=$row->turno97_47_?>'/></td>
</tr>


<tr>

<input name='turno97_46' id='_turno97_46' type='hidden' value='<?=$row->turno97_46?>'/>
<input name='turno97_47' id='_turno97_47' type='hidden' value='<?=$row->turno97_47?>'/>
<th class='_tot_turno97_di _clear-turno97' ><br/><?=$row->turno97_46?></th> 
<th class='_tot_turno97_eva _clear-turno97' ><br/><?=$row->turno97_47?></th>  
</tr>
</table>
</td>
</tr>
</table>
</div>

<div class="col-xs-4"  >
  <div class="input-group">
       <span class="input-group-addon">Enfermera</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno97_enfermera' name='turno97_enfermera' value='<?=$user_c23?>' />
    </div>
 <hr/>
   <div class="input-group">
       <span class="input-group-addon">Egreso T</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno_97_egreso_t' name='turno_97_egreso_t'  value='<?=$row->turno_97_egreso_t?>' />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Ingreso T</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno_97_ingreso_t'  name='turno_97_ingreso_t'  value='<?=$row->turno_97_ingreso_t?>'/>
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Balance</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno_97_balance' name='turno_97_balance'  value='<?=$row->turno_97_balance?>'/>
    </div>
	<br/>
<hr id="hr_ad"/>
 <?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>

<button type="submit" id='_submitTurno97' class="btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar Turno 9-7</button>
<?php }?>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id/0/0/examfis")?>"  style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

<?php } ?>
<span id='_successTurno97'></span>
</div>
</form>

</div>
 

<script>

$("#_SaveTurno97 :input:not(#_submitTurno97)").prop("disabled", true);

$('.turno-not-disabled').keypress(function(e) {
    return false
});

$('#CrearTurno9-7').on('click', function(event) {
	$("#SaveTurno97").show();
	$("#content-turno-paginate-97").hide();
	paginateTurno97();

});
	

//turno 9-7
 $("#_table-turno-9-7-liq").on('input', '._turno97_sol', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-9-7-liq ._turno97_sol").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno97_sol").text(calculated_total_sum);
			  
			_total97LiqIngEgBal();
			       
			   
       });
	   
	  
	     $("#_table-turno-9-7-liq").on('input', '._turno97_med', function () {
       var calculated_total_sum = 0;

       $("#_table-turno-9-7-liq ._turno97_med").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno97_med").text(calculated_total_sum);
			  _total97LiqIngEgBal();
			  
       });
	   
	   
 
	      $("#_table-turno-9-7-liq").on('input', '._turno97_vo', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-9-7-liq ._turno97_vo").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno97_vo").text(calculated_total_sum);
			 	  _total97LiqIngEgBal();
			 
       });
  
  
  
  	   
	     function _total97LiqIngEgBal(){
		  //total ingreso
			  var tot=parseFloat($("._tot_turno97_sol").text()) + parseFloat($("._tot_turno97_med").text()) + parseFloat($("._tot_turno97_vo").text());
			  
			  $("#_turno_97_ingreso_t").val(tot);
			  
			  
			  //balance
			  
			  var bal= $("#_turno_97_egreso_t").val() - $("#_turno_97_ingreso_t").val();
			  
			   $("#_turno_97_balance").val(abs(bal)); 
            			   
		  
	  }
	   
  
  
 //---------------------------turno 9-7 eliminado di
        
    $("#_table-turno-9-7-el").on('input', '._turno97_di', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-9-7-el ._turno97_di").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno97_di").text(calculated_total_sum);
			  
			_total97ElIngEgBal();
		 
			  
       });
	   
	   
	   //turno 9-7 eliminado eva
	   
	    $("#_table-turno-9-7-el").on('input', '._turno97_eva', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-9-7-el ._turno97_eva").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno97_eva").text(calculated_total_sum);
			  _total97ElIngEgBal();
			   
			  
       });
	   
	    function _total97ElIngEgBal(){
	  
	   var tot=parseFloat($("._tot_turno97_eva").text()) + parseFloat($("._tot_turno97_di").text());
			  
			  
			  $("#_turno_97_egreso_t").val(tot);
			   //balance
			  
			  var bal= $("#_turno_97_egreso_t").val() - $("#_turno_97_ingreso_t").val();
			  
			  
			$("#_turno_97_balance").val(abs(bal));
			
	  
  }
	
let  count = 0;	
   $("#_SaveTurno97").on('submit', function(e){
	   e.preventDefault();
	   count ++;
	   if(count==1){
		$("#_SaveTurno97 :input:not(#_submitTurno72)").prop("disabled", false); 
      $("#_submitTurno97").html('Guardar Turno 9-7');  
	   }else{
		 	$('#_turno97_23').val($('._tot_turno97_sol').text());
	$('#_turno97_24').val($('._tot_turno97_med').text());
	$('#_turno97_25').val($('._tot_turno97_vo').text());
	
	$('#_turno97_46').val($('._tot_turno97_di').text());
	$('#_turno97_47').val($('._tot_turno97_eva').text()); 
        $.ajax({
            type: 'POST',
            url:'<?php echo base_url();?>hosp_balance_hidrico/saveTurno97',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#_submitTurno97').attr("disabled","disabled");
                $('#_SaveTurno97').css("opacity",".5");
				$('.successfull_saving').html('guardando... ').addClass('fa fa-spinner');
            },
            success: function(response){ //console.log(response);
                $('#_successTurno97').html('');
                if(response.status == 1){
                $('#_successTurno97').html('<p class="alert alert-success">'+response.message+'</p>');
					turnoGrandToal();
                } else if(response.status == 2){
				       $('#_successTurno97').html('<p class="alert alert-warning">'+response.message+'</p>');	
				}else{
                    $('#_successTurno97').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#_SaveTurno97').css("opacity","");
                $("#_submitTurno97").removeAttr("disabled");
				$('.successfull_saving').html('').removeClass('fa fa-spinner');
            },
	   });  
		   
	   }
	});
</script>