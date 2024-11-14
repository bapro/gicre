<?php
foreach($query_paginate->result() as $row){
$user_c22=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c23=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<em style='font-size:12px'>creado por <?=$user_c22?>, <?=$inserted_time?> -- cambiado por <?=$user_c23?>, <?=$update_time?></em>
<br/><br/>
<button type='button' id='CrearTurno2-9' class="btn btn-xs btn-primary">Crear Turno 2-9</button>
<button type='button' id='_cancelTurno2-9' class="btn btn-xs btn-warning" title="Eliminar" >Eliminar</button>
<div  class="form-horizontal" >

<form method="post" id='_SaveTurno29'>
<input type='hidden' name='user_id' value="<?=$user_id?>"/>
<input type='hidden' name='id_turno29' value="<?=$row->id?>"/>
<div class="col-xs-8 "  >
<table class='table b-h '>
<tr>
<td>
<table class='table' id='_table-turno-2-9-liq'>
<tr>
<th colspan='3'>LIQUIDOS INGERIDOS</th>
</tr>
<tr>
<th>Hora</th><th>Solución</th><th>Meds</th><th>Vo</th>
</tr>

<tr>
<td>3:00 pm</td><td>
<input class="form-control _turno29_sol" name="turno29_1" value='<?=$row->turno29_1?>'  />
</td>
<td><input class="form-control _turno29_med" name="turno29_2" value='<?=$row->turno29_2?>' /></td>
<td><input class="form-control _turno29_vo" name="turno29_3"  value='<?=$row->turno29_3?>'/></td>
</tr>
<tr>
<td>4:00 pm</td><td><input class="form-control _turno29_sol" name="turno29_4" value='<?=$row->turno29_4?>' /></td>
<td><input class="form-control _turno29_med" name="turno29_5" value='<?=$row->turno29_5?>'/></td>
<td><input class="form-control _turno29_vo" name="turno29_6" value='<?=$row->turno29_6?>'/></td>
</tr>
<tr>
<td>5:00 pm</td><td><input class="form-control _turno29_sol" name="turno29_4_" value='<?=$row->turno29_4_?>' /></td>
<td><input class="form-control _turno29_med" name="turno29_7" value='<?=$row->turno29_7?>'/></td>
<td><input class="form-control _turno29_vo" name="turno29_8" value='<?=$row->turno29_8?>'/></td>
</tr>
<tr>
<td>6:00 am</td><td><input class="form-control _turno29_sol" name="turno29_9" value='<?=$row->turno29_9?>'/></td>
<td><input class="form-control _turno29_med" name="turno29_10" value='<?=$row->turno29_10?>' /></td>
<td><input class="form-control _turno29_vo" name="turno29_11"  value='<?=$row->turno29_11?>'/></td>
</tr>
<tr>
<td>7:00 am</td><td><input class="form-control _turno29_sol" name="turno29_12" value='<?=$row->turno29_12?>' /></td>
<td><input class="form-control _turno29_med" name="turno29_13" value='<?=$row->turno29_13?>'/></td>
<td><input class="form-control _turno29_vo" name="turno29_14" value='<?=$row->turno29_14?>'/></td>
</tr>
<tr>
<td>8:00 pm</td><td><input class="form-control _turno29_sol" name="turno29_15" value='<?=$row->turno29_15?>'/></td>
<td><input class="form-control _turno29_med" name="turno29_16" value='<?=$row->turno29_16?>'/></td>
<td><input class="form-control _turno29_vo" name="turno29_17" value='<?=$row->turno29_17?>'/></td>
</tr>
<tr>
<td>9:00 pm</td><td><input class="form-control _turno29_sol" name="turno29_18" value='<?=$row->turno29_18?>' /></td>
<td><input class="form-control _turno29_med" name="turno29_19" value='<?=$row->turno29_19?>'/></td>
<td><input class="form-control _turno29_vo" name="turno29_19_" value='<?=$row->turno29_19_?>'/></td>
</tr>

<tr>
<th>totAL
<input name='turno29_23' id='_turno29_23' type='hidden' value='<?=$row->turno29_23?>'/>
<input name='turno29_24' id='_turno29_24' type='hidden' value='<?=$row->turno29_24?>'/>
<input name='turno29_25' id='_turno29_25' type='hidden' value='<?=$row->turno29_25?>'/>
</th>
<th class='_tot_turno29_sol _clear-turno29' ><?=$row->turno29_23?></th> 
<th  class='_tot_turno29_med _clear-turno29' ><?=$row->turno29_24?> </th>
<th  class='_tot_turno29_vo _clear-turno29' ><?=$row->turno29_25?></th>
</tr>
</table>
</td >
<td    style=' padding:5px;'>
<table class='table b-h ' id='_table-turno-2-9-el'>
<tr>
<th colspan='3'>ELIMINADOS</th>
</tr>
<tr>
<th>Diuresis</th><th>Evacuación</th>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_26' value='<?=$row->turno29_26?>' /></td> 
<td><input class="form-control _turno29_eva" name='turno29_27' value='<?=$row->turno29_27?>' /></td>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_28' value='<?=$row->turno29_28?>' /></td>
<td><input class="form-control _turno29_eva" name='turno29_29' value='<?=$row->turno29_29?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_30' value='<?=$row->turno29_30?>'/></td>
<td><input class="form-control _turno29_eva" name='turno29_31' value='<?=$row->turno29_31?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_32' value='<?=$row->turno29_32?>'/></td>
<td><input class="form-control _turno29_eva" name='turno29_33' value='<?=$row->turno29_33?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_34' value='<?=$row->turno29_34?>'/></td>
<td><input class="form-control _turno29_eva" name='turno29_35' value='<?=$row->turno29_35?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_36' value='<?=$row->turno29_36?>'/></td>
<td><input class="form-control _turno29_eva" name='turno29_37' value='<?=$row->turno29_37?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_38' value='<?=$row->turno29_38?>'/></td>
<td><input class="form-control _turno29_eva" name='turno29_39' value='<?=$row->turno29_39?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_40' value='<?=$row->turno29_40?>'/></td>
<td><input class="form-control _turno29_eva" name='turno29_41' value='<?=$row->turno29_41?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno29_di" name='turno29_42' value='<?=$row->turno29_42?>'/></td>
<td><input class="form-control _turno29_eva" name='turno29_43' value='<?=$row->turno29_43?>'/></td>
</tr>

<tr>

<input name='turno29_46' id='_turno29_46' type='hidden' value='<?=$row->turno29_46?>'/>
<input name='turno29_47' id='_turno29_47' type='hidden' value='<?=$row->turno29_47?>'/>
<th class='_tot_turno29_di _clear-turno29' ><?=$row->turno29_46?></th> 
<th class='_tot_turno29_eva _clear-turno29' ><?=$row->turno29_47?></th>  
</tr>
</table>
</td>
</tr>
</table>
</div>

<div class="col-xs-4"  >
  <div class="input-group">
       <span class="input-group-addon">Enfermera</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno29_enfermera' name='turno29_enfermera' value='<?=$user_c23?>' />
    </div>
 <hr/>
   <div class="input-group">
       <span class="input-group-addon">Egreso T</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno_29_egreso_t' name='turno_29_egreso_t'  value='<?=$row->turno_29_egreso_t?>' />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Ingreso T</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno_29_ingreso_t'  name='turno_29_ingreso_t'  value='<?=$row->turno_29_ingreso_t?>'/>
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Balance</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno_29_balance' name='turno_29_balance'  value='<?=$row->turno_29_balance?>'/>
    </div>
	<br/>
<hr id="hr_ad"/>
 <?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>

<button type="submit" id='_submitTurno29' class="btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar Turno 2-9</button>
<?php }?>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id/0/0/examfis")?>"  style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

<?php } ?>
<span id='_successTurno29'></span>
</div>
</form>

</div>
 

<script>

$("#_SaveTurno29 :input:not(#_submitTurno29)").prop("disabled", true);

$('.turno-not-disabled').keypress(function(e) {
    return false
});

$('#CrearTurno2-9').on('click', function(event) {
	$("#SaveTurno29").show();
	$("#content-turno-paginate-29").hide();
	paginateTurno29();

});
	

//turno 2-9
 $("#_table-turno-2-9-liq").on('input', '._turno29_sol', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-2-9-liq ._turno29_sol").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno29_sol").text(calculated_total_sum);
			  
			_total29LiqIngEgBal();
			       
			   
       });
	   
	  
	     $("#_table-turno-2-9-liq").on('input', '._turno29_med', function () {
       var calculated_total_sum = 0;

       $("#_table-turno-2-9-liq ._turno29_med").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno29_med").text(calculated_total_sum);
			  _total29LiqIngEgBal();
			  
       });
	   
	   
 
	      $("#_table-turno-2-9-liq").on('input', '._turno29_vo', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-2-9-liq ._turno29_vo").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno29_vo").text(calculated_total_sum);
			 	  _total29LiqIngEgBal();
			 
       });
  
  
  
  	   
	     function _total29LiqIngEgBal(){
		  //total ingreso
			  var tot=parseFloat($("._tot_turno29_sol").text()) + parseFloat($("._tot_turno29_med").text()) + parseFloat($("._tot_turno29_vo").text());
			  
			  $("#_turno_29_ingreso_t").val(tot);
			  
			  
			  //balance
			  
			  var bal= $("#_turno_29_egreso_t").val() - $("#_turno_29_ingreso_t").val();
			  
			   $("#_turno_29_balance").val(abs(bal)); 
            			   
		  
	  }
	   
  
  
 //---------------------------turno 2-9 eliminado di
        
    $("#_table-turno-2-9-el").on('input', '._turno29_di', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-2-9-el ._turno29_di").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno29_di").text(calculated_total_sum);
			  
			_total29ElIngEgBal();
		 
			  
       });
	   
	   
	   //turno 2-9 eliminado eva
	   
	    $("#_table-turno-2-9-el").on('input', '._turno29_eva', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-2-9-el ._turno29_eva").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno29_eva").text(calculated_total_sum);
			  _total29ElIngEgBal();
			   
			  
       });
	   
	    function _total29ElIngEgBal(){
	  
	   var tot=parseFloat($("._tot_turno29_eva").text()) + parseFloat($("._tot_turno29_di").text());
			  
			  
			  $("#_turno_29_egreso_t").val(tot);
			   //balance
			  
			  var bal= $("#_turno_29_egreso_t").val() - $("#_turno_29_ingreso_t").val();
			  
			  
			$("#_turno_29_balance").val(abs(bal));
			
	  
  }
	
let  count = 0;	
   $("#_SaveTurno29").on('submit', function(e){
	   e.preventDefault();
	   count ++;
	   if(count==1){
		$("#_SaveTurno29 :input:not(#_submitTurno72)").prop("disabled", false); 
      $("#_submitTurno29").html('Guardar Turno 2-9');  
	   }else{
		 	$('#_turno29_23').val($('._tot_turno29_sol').text());
	$('#_turno29_24').val($('._tot_turno29_med').text());
	$('#_turno29_25').val($('._tot_turno29_vo').text());
	
	$('#_turno29_46').val($('._tot_turno29_di').text());
	$('#_turno29_47').val($('._tot_turno29_eva').text()); 
        $.ajax({
            type: 'POST',
            url:'<?php echo base_url();?>hosp_balance_hidrico/saveTurno29',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#_submitTurno29').attr("disabled","disabled");
                $('#_SaveTurno29').css("opacity",".5");
				$('.successfull_saving').html('guardando... ').addClass('fa fa-spinner');
            },
            success: function(response){ //console.log(response);
                $('#_successTurno29').html('');
                if(response.status == 1){
                $('#_successTurno29').html('<p class="alert alert-success">'+response.message+'</p>');
					turnoGrandToal();
                } else if(response.status == 2){
				       $('#_successTurno29').html('<p class="alert alert-warning">'+response.message+'</p>');	
				}else{
                    $('#_successTurno29').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#_SaveTurno29').css("opacity","");
                $("#_submitTurno29").removeAttr("disabled");
				$('.successfull_saving').html('').removeClass('fa fa-spinner');
            },
			
        });  
		   
	   }
	});
</script>