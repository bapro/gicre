<?php
foreach($query_paginate->result() as $row){
$user_c22=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c23=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<em style='font-size:12px'>creado por <?=$user_c22?>, <?=$inserted_time?> -- cambiado por <?=$user_c23?>, <?=$update_time?></em>
<br/><br/>
<button type='button' id='CrearTurno7-2' class="btn btn-xs btn-primary">Crear Turno 7-2</button>
<button type='button' id='_cancelTurno7-2' class="btn btn-xs btn-warning" title="Eliminar" >Eliminar</button>
<div  class="form-horizontal" >

<form method="post" id='_SaveTurno72'>
<input type='hidden' name='user_id' value="<?=$user_id?>"/>
<input type='hidden' name='id_turno72' value="<?=$row->id?>"/>
<div class="col-xs-8 "  >
<table class='table b-h '>
<tr>
<td>
<table class='table' id='_table-turno-7-2-liq'>
<tr>
<th colspan='3'>LIQUIDOS INGERIDOS</th>
</tr>
<tr>
<th>Hora</th><th>Solución</th><th>Meds</th><th>Vo</th>
</tr>

<tr>
<td>7:00 am</td><td>
<input class="form-control _turno72_sol" name="turno72_1" value='<?=$row->turno72_1?>'  />
</td>
<td><input class="form-control _turno72_med" name="turno72_2" value='<?=$row->turno72_2?>' /></td>
<td><input class="form-control _turno72_vo" name="turno72_3"  value='<?=$row->turno72_3?>'/></td>
</tr>
<tr>
<td>8:00 am</td><td><input class="form-control _turno72_sol" name="turno72_4" value='<?=$row->turno72_4?>' /></td>
<td><input class="form-control _turno72_med" name="turno72_5" value='<?=$row->turno72_5?>'/></td>
<td><input class="form-control _turno72_vo" name="turno72_6" value='<?=$row->turno72_6?>'/></td>
</tr>
<tr>
<td>9:00 am</td><td><input class="form-control _turno72_sol" name="turno72_4_" value='<?=$row->turno72_4_?>' /></td>
<td><input class="form-control _turno72_med" name="turno72_7" value='<?=$row->turno72_7?>'/></td>
<td><input class="form-control _turno72_vo" name="turno72_8" value='<?=$row->turno72_8?>'/></td>
</tr>
<tr>
<td>10:00 am</td><td><input class="form-control _turno72_sol" name="turno72_9" value='<?=$row->turno72_9?>'/></td>
<td><input class="form-control _turno72_med" name="turno72_10" value='<?=$row->turno72_10?>' /></td>
<td><input class="form-control _turno72_vo" name="turno72_11"  value='<?=$row->turno72_11?>'/></td>
</tr>
<tr>
<td>11:00 am</td><td><input class="form-control _turno72_sol" name="turno72_12" value='<?=$row->turno72_12?>' /></td>
<td><input class="form-control _turno72_med" name="turno72_13" value='<?=$row->turno72_13?>'/></td>
<td><input class="form-control _turno72_vo" name="turno72_14" value='<?=$row->turno72_14?>'/></td>
</tr>
<tr>
<td>12:00 pm</td><td><input class="form-control _turno72_sol" name="turno72_15" value='<?=$row->turno72_15?>'/></td>
<td><input class="form-control _turno72_med" name="turno72_16" value='<?=$row->turno72_16?>'/></td>
<td><input class="form-control _turno72_vo" name="turno72_17" value='<?=$row->turno72_17?>'/></td>
</tr>
<tr>
<td>1:00 pm</td><td><input class="form-control _turno72_sol" name="turno72_18" value='<?=$row->turno72_18?>' /></td>
<td><input class="form-control _turno72_med" name="turno72_19" value='<?=$row->turno72_19?>'/></td>
<td><input class="form-control _turno72_vo" name="turno72_19_" value='<?=$row->turno72_19_?>'/></td>
</tr>
<tr>
<td>2:00 pm</td><td><input class="form-control _turno72_sol" name="turno72_20" value='<?=$row->turno72_20?>' /></td>
<td><input class="form-control _turno72_med" name="turno72_21" value='<?=$row->turno72_21?>'/></td>
<td><input class="form-control _turno72_vo" name="turno72_22" value='<?=$row->turno72_22?>'/></td>
</tr>
<tr>
<th>totAL
<input name='turno72_23' id='_turno72_23' type='hidden' value='<?=$row->turno72_23?>'/>
<input name='turno72_24' id='_turno72_24' type='hidden' value='<?=$row->turno72_24?>'/>
<input name='turno72_25' id='_turno72_25' type='hidden' value='<?=$row->turno72_25?>'/>
</th>
<th class='_tot_turno72_sol _clear-turno72' ><?=$row->turno72_23?></th> 
<th  class='_tot_turno72_med _clear-turno72' ><?=$row->turno72_24?> </th>
<th  class='_tot_turno72_vo _clear-turno72' ><?=$row->turno72_25?></th>
</tr>
</table>
</td >
<td    style=' padding:5px;'>
<table class='table b-h ' id='_table-turno-7-2-el'>
<tr>
<th colspan='3'>ELIMINADOS</th>
</tr>
<tr>
<th>Diuresis</th><th>Evacuación</th>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_26' value='<?=$row->turno72_26?>' /></td> 
<td><input class="form-control _turno72_eva" name='turno72_27' value='<?=$row->turno72_27?>' /></td>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_28' value='<?=$row->turno72_28?>' /></td>
<td><input class="form-control _turno72_eva" name='turno72_29' value='<?=$row->turno72_29?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_30' value='<?=$row->turno72_30?>'/></td>
<td><input class="form-control _turno72_eva" name='turno72_31' value='<?=$row->turno72_31?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_32' value='<?=$row->turno72_32?>'/></td>
<td><input class="form-control _turno72_eva" name='turno72_33' value='<?=$row->turno72_33?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_34' value='<?=$row->turno72_34?>'/></td>
<td><input class="form-control _turno72_eva" name='turno72_35' value='<?=$row->turno72_35?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_36' value='<?=$row->turno72_36?>'/></td>
<td><input class="form-control _turno72_eva" name='turno72_37' value='<?=$row->turno72_37?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_38' value='<?=$row->turno72_38?>'/></td>
<td><input class="form-control _turno72_eva" name='turno72_39' value='<?=$row->turno72_39?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_40' value='<?=$row->turno72_40?>'/></td>
<td><input class="form-control _turno72_eva" name='turno72_41' value='<?=$row->turno72_41?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno72_di" name='turno72_42' value='<?=$row->turno72_42?>'/></td>
<td><input class="form-control _turno72_eva" name='turno72_43' value='<?=$row->turno72_43?>'/></td>
</tr>
<tr>
<td><input class="form-control _turno72_di"  name='turno72_44' value='<?=$row->turno72_44?>'/></td>
<td><input class="form-control _turno72_eva" name='turno72_45' value='<?=$row->turno72_45?>'/></td>
</tr>
<tr>

<input name='turno72_46' id='_turno72_46' type='hidden' value='<?=$row->turno72_46?>'/>
<input name='turno72_47' id='_turno72_47' type='hidden' value='<?=$row->turno72_47?>'/>
<th class='_tot_turno72_di _clear-turno72' ><?=$row->turno72_46?></th> 
<th class='_tot_turno72_eva _clear-turno72' ><?=$row->turno72_47?></th>  
</tr>
</table>
</td>
</tr>
</table>
</div>

<div class="col-xs-4"  >
  <div class="input-group">
       <span class="input-group-addon">Enfermera</span>
    <input type="text" class="form-control turno-not-disabled" id='_turno72_enfermera' name='turno72_enfermera' value='<?=$user_c23?>'  />
    </div>
 <hr/>
   <div class="input-group">
       <span class="input-group-addon">Egreso T</span>
    <input type="text" class="form-control  turno-not-disabled" id='_turno_72_egreso_t' name='turno_72_egreso_t'  value='<?=$row->turno_72_egreso_t?>' />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Ingreso T</span>
    <input type="text" class="form-control  turno-not-disabled" id='_turno_72_ingreso_t'  name='turno_72_ingreso_t'  value='<?=$row->turno_72_ingreso_t?>'/>
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Balance</span>
    <input type="text" class="form-control  turno-not-disabled" id='_turno_72_balance' name='turno_72_balance'  value='<?=$row->turno_72_balance?>'/>
    </div>
	<br/>
<hr id="hr_ad"/>
 <?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>

<button type="submit" id='_submitTurno72' class="btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar Turno 7-2</button>
<?php }?>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id/0/0/examfis")?>"  style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

<?php } ?>
<span id='_successTurno72'></span>
</div>
</form>

</div>
 

<script>

$("#_SaveTurno72 :input:not(#_submitTurno72)").prop("disabled", true);
	 
$('.turno-not-disabled').keypress(function(e) {
    return false
});
	 

$('#CrearTurno7-2').on('click', function(event) {
	$("#SaveTurno72").show();
	$("#content-turno-paginate-72").hide();
	paginateTurno72();

});
	

//turno 7-2
 $("#_table-turno-7-2-liq").on('input', '._turno72_sol', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-7-2-liq ._turno72_sol").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno72_sol").text(calculated_total_sum);
			  
			_total72LiqIngEgBal();
			       
			   
       });
	   
	  
	     $("#_table-turno-7-2-liq").on('input', '._turno72_med', function () {
       var calculated_total_sum = 0;

       $("#_table-turno-7-2-liq ._turno72_med").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno72_med").text(calculated_total_sum);
			  _total72LiqIngEgBal();
			  
       });
	   
	   
 
	      $("#_table-turno-7-2-liq").on('input', '._turno72_vo', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-7-2-liq ._turno72_vo").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno72_vo").text(calculated_total_sum);
			 	  _total72LiqIngEgBal();
			 
       });
  
  
  
  	   
	     function _total72LiqIngEgBal(){
		  //total ingreso
			  var tot=parseFloat($("._tot_turno72_sol").text()) + parseFloat($("._tot_turno72_med").text()) + parseFloat($("._tot_turno72_vo").text());
			  
			  $("#_turno_72_ingreso_t").val(tot);
			  
			  
			  //balance
			  
			  var bal= $("#_turno_72_egreso_t").val() - $("#_turno_72_ingreso_t").val();
			  
			   $("#_turno_72_balance").val(abs(bal)); 
            			   
		  
	  }
	   
  
  
 //---------------------------turno 7-2 eliminado di
        
    $("#_table-turno-7-2-el").on('input', '._turno72_di', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-7-2-el ._turno72_di").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno72_di").text(calculated_total_sum);
			  
			_total72ElIngEgBal();
		 
			  
       });
	   
	   
	   //turno 7-2 eliminado eva
	   
	    $("#_table-turno-7-2-el").on('input', '._turno72_eva', function () {
       var calculated_total_sum = 0;
     
       $("#_table-turno-7-2-el ._turno72_eva").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("._tot_turno72_eva").text(calculated_total_sum);
			  _total72ElIngEgBal();
			   
			  
       });
	   
	    function _total72ElIngEgBal(){
	  
	   var tot=parseFloat($("._tot_turno72_eva").text()) + parseFloat($("._tot_turno72_di").text());
			  
			  
			  $("#_turno_72_egreso_t").val(tot);
			   //balance
			  
			  var bal= $("#_turno_72_egreso_t").val() - $("#_turno_72_ingreso_t").val();
			  
			  
			$("#_turno_72_balance").val(abs(bal));
			
	  
  }
	
let  count = 0;	
   $("#_SaveTurno72").on('submit', function(e){
	   e.preventDefault();
	   count ++;
	   if(count==1){
		$("#_SaveTurno72 :input:not(#_submitTurno72)").prop("disabled", false); 
      $("#_submitTurno72").html('Guardar Turno 7-2');  
	   }else{
		 	$('#_turno72_23').val($('._tot_turno72_sol').text());
	$('#_turno72_24').val($('._tot_turno72_med').text());
	$('#_turno72_25').val($('._tot_turno72_vo').text());
	
	$('#_turno72_46').val($('._tot_turno72_di').text());
	$('#_turno72_47').val($('._tot_turno72_eva').text()); 
        $.ajax({
            type: 'POST',
            url:'<?php echo base_url();?>hosp_balance_hidrico/saveTurno72',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#_submitTurno72').attr("disabled","disabled");
                $('#_SaveTurno72').css("opacity",".5");
				$('.successfull_saving').html('guardando... ').addClass('fa fa-spinner');
            },
            success: function(response){ //console.log(response);
                $('#_successTurno72').html('');
                if(response.status == 1){
                $('#_successTurno72').html('<p class="alert alert-success">'+response.message+'</p>');
					turnoGrandToal();
                } else if(response.status == 2){
				       $('#_successTurno72').html('<p class="alert alert-warning">'+response.message+'</p>');	
				}else{
                    $('#_successTurno72').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#_SaveTurno72').css("opacity","");
                $("#_submitTurno72").removeAttr("disabled");
			  $('.successfull_saving').html('').removeClass('fa fa-spinner');
            }
        });  
		   
	   }
	});
</script>