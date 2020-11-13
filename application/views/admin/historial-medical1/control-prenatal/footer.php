<script>
$('.format-d-c').mask('00/00/0000', {placeholder: '--/--/----'});


   $(document).ready(function(){
    $('.editBtn').on('click',function(){
        //hide edit span
        $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
        //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        //show edit button
        $(this).closest("tr").find(".saveBtn").show();
		
		 $(".tensionshow1").show();
		 $(".tensionhide1").hide();
		 
		 
		 
		 $(".alt1-show").show();
		 $(".alt1-hide").hide();
		 
		  $(".fetal1-show").show();
		 $(".fetal1-hide").hide();
		 
		 
		 
		 $(".edema1-show").show();
		 $(".edema1-hide").hide();
		 
		 
		 
		$(".otros-cpp").show();
		 $(".otros-hide").hide();
		 
		 
		 $(".evolucion-cpp").show();
		 $(".evolucion-hide").hide();
		 
		 
		
        
    });
	
	 
  $('#saveBtn').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		var fecha   = $(".fecha-cpp").val();
		 var semana  = $(".semana-cpp").val();
		 var pesocp = $(".peso-cpp").val();
		 
		  var tension1   = $(".tension1-cpp").val();
		 var tension11  = $(".tension11-cpp").val();
		 
		 var alt1 = $(".alt1-cpp").val();
		 var alt11 = $(".alt11-cpp").val();
		 var alt111 = $(".alt111-cpp").val();
		 
		  var fetal1   = $(".fetal1-cpp").val();
		 var fetal11  = $(".fetal11-cpp").val();
		 
		 var edema1   = $(".edema1-cpp").val();
		 var edema11  = $(".edema11-cpp").val();

		 var otroscp   = $(".otros-cpp").val();
		 var evolucion  = $(".evolucion-cpp").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
			$(".editInput").hide();
            $(".saveBtn").hide();
            $(".editSpan").show();
            $(".editBtn").show();
			$(".fechacpp").text(fecha);
			$(".semanacpp").text(semana);
			$(".pesocpp").text(pesocp);
			$(".tension1cpp").text(tension1);
			$(".tension11cpp").text(tension11);
			$(".alt1cpp").text(alt1);
			$(".alt11cpp").text(alt11);
			$(".alt111cpp").text(alt111);
			$(".fetal1cpp").text(fetal1);
			$(".fetal11cpp").text(fetal11);
			$(".edema1cpp").text(edema1);
			$(".edema11cpp").text(edema11);
			$(".otroscpp").text(otroscp);
			$(".evolucioncpp").text(evolucion);
			
			
			
			
		 $(".tensionshow1").hide();
		 $(".tensionhide1").show();
		 
		 
		 
		 $(".alt1-show").hide();
		 $(".alt1-hide").show();
		 
		  $(".fetal1-show").hide();
		 $(".fetal1-hide").show();
		 
		 
		 
		 $(".edema1-show").hide();
		 $(".edema1-hide").show();
		 
		 
		 
		$(".otros-cpp").hide();
		 $(".otros-hide").show();
		 
		 
		 $(".evolucion-cpp").hide();
		 $(".evolucion-hide").show();
		}
		});
    });
	
	
	
//------------control prenatal 2--------------------------------	
	
	
 $('.editBtn2').on('click',function(){
			 
 	$(".editInput2").show();
	$(".editSpan2").hide();
	
	 $(".editBtn2").hide();
		 $(".saveBtn2").show();

   });
	
	
	
	
	 $('#saveBtn2').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		var fecha   = $(".fecha-cpp2").val();
		 var semana  = $(".semana-cpp2").val();
		 var pesocp = $(".peso-cpp2").val();
		 
		  var tension1   = $(".tension1-cpp2").val();
		 var tension11  = $(".tension11-cpp2").val();
		 
		 var alt1 = $(".alt1-cpp2").val();
		 var alt11 = $(".alt11-cpp2").val();
		 var alt111 = $(".alt111-cpp2").val();
		 
		  var fetal1   = $(".fetal1-cpp2").val();
		 var fetal11  = $(".fetal11-cpp2").val();
		 
		 var edema1   = $(".edema1-cpp2").val();
		 var edema11  = $(".edema11-cpp2").val();

		 var otroscp   = $(".otros-cpp2").val();
		 var evolucion  = $(".evolucion-cpp2").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren2')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
			 $(".saveBtn2").hide();
            $(".editBtn2").show();
			$(".editInput2").hide();
			$(".editSpan2").show();
			$(".fechacpp2").text(fecha);
			$(".semanacpp2").text(semana);
			$(".pesocpp2").text(pesocp);
			$(".tension1cpp2").text(tension1);
			$(".tension11cpp2").text(tension11);
			$(".alt1cpp2").text(alt1);
			$(".alt11cpp2").text(alt11);
			$(".alt111cpp2").text(alt111);
			$(".fetal1cpp2").text(fetal1);
			$(".fetal11cpp2").text(fetal11);
			$(".edema1cpp2").text(edema1);
			$(".edema11cpp2").text(edema11);
			$(".otroscpp2").text(otroscp);
			$(".evolucioncpp2").text(evolucion);
		}
		});
    });
	
	
	
	
	//-------control prenatal 3-------------------------------------------------
	 $('.editBtn3').on('click',function(){
			 
 	$(".editInput3").show();
	$(".editSpan3").hide();
	
	 $(".editBtn3").hide();
		 $(".saveBtn3").show();

   });
   
   
   
  	 $('#saveBtn3').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		  var fecha   = $(".fecha-cpp3").val();
		 var semana  = $(".semana-cpp3").val();
		 var pesocp = $(".peso-cpp3").val();
		 
		  var tension1   = $(".tension1-cpp3").val();
		 var tension11  = $(".tension11-cpp3").val();
		 
		 var alt1 = $(".alt1-cpp3").val();
		 var alt11 = $(".alt11-cpp3").val();
		 var alt111 = $(".alt111-cpp3").val();
		 
		  var fetal1   = $(".fetal1-cpp3").val();
		 var fetal11  = $(".fetal11-cpp3").val();
		 
		 var edema1   = $(".edema1-cpp3").val();
		 var edema11  = $(".edema11-cpp3").val();

		 var otroscp   = $(".otros-cpp3").val();
		 var evolucion  = $(".evolucion-cpp3").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren3')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
			 $(".saveBtn3").hide();
            $(".editBtn3").show();
			$(".editInput3").hide();
			$(".editSpan3").show();
			$(".fechacpp3").text(fecha);
			$(".semanacpp3").text(semana);
			$(".pesocpp3").text(pesocp);
			$(".tension1cpp3").text(tension1);
			$(".tension11cpp3").text(tension11);
			$(".alt1cpp3").text(alt1);
			$(".alt11cpp3").text(alt11);
			$(".alt111cpp3").text(alt111);
			$(".fetal1cpp3").text(fetal1);
			$(".fetal11cpp3").text(fetal11);
			$(".edema1cpp3").text(edema1);
			$(".edema11cpp3").text(edema11);
			$(".otroscpp3").text(otroscp);
			$(".evolucioncpp3").text(evolucion);
		}
		});
    }); 
   
   //fourth--------------------------
   
   	 $('.editBtn4').on('click',function(){
			 
 	$(".editInput4").show();
	$(".editSpan4").hide();
	
	 $(".editBtn4").hide();
		 $(".saveBtn4").show();

   });
   
    	 $('#saveBtn4').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		var fecha   = $(".fecha-cpp4").val();
		 var semana  = $(".semana-cpp4").val();
		 var pesocp = $(".peso-cpp4").val();
		 
		  var tension1   = $(".tension1-cpp4").val();
		 var tension11  = $(".tension11-cpp4").val();
		 
		 var alt1 = $(".alt1-cpp4").val();
		 var alt11 = $(".alt11-cpp4").val();
		 var alt111 = $(".alt111-cpp4").val();
		 
		  var fetal1   = $(".fetal1-cpp4").val();
		 var fetal11  = $(".fetal11-cpp4").val();
		 
		 var edema1   = $(".edema1-cpp4").val();
		 var edema11  = $(".edema11-cpp4").val();

		 var otroscp   = $(".otros-cpp4").val();
		 var evolucion  = $(".evolucion-cpp4").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren4')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
		    $(".saveBtn4").hide();
            $(".editBtn4").show();
			$(".editInput4").hide();
			$(".editSpan4").show();
			$(".fechacpp4").text(fecha);
			$(".semanacpp4").text(semana);
			$(".pesocpp4").text(pesocp);
			$(".tension1cpp4").text(tension1);
			$(".tension11cpp4").text(tension11);
			$(".alt1cpp4").text(alt1);
			$(".alt11cpp4").text(alt11);
			$(".alt111cpp4").text(alt111);
			$(".fetal1cpp4").text(fetal1);
			$(".fetal11cpp4").text(fetal11);
			$(".edema1cpp4").text(edema1);
			$(".edema11cpp4").text(edema11);
			$(".otroscpp4").text(otroscp);
			$(".evolucioncpp4").text(evolucion);
		}
		});
    });  
   
   
   
   //fith
   
   
      	 $('.editBtn5').on('click',function(){
			 
 	$(".editInput5").show();
	$(".editSpan5").hide();
	
	 $(".editBtn5").hide();
		 $(".saveBtn5").show();

   });
   
   
   
       	 $('#saveBtn5').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		var fecha   = $(".fecha-cpp5").val();
		 var semana  = $(".semana-cpp5").val();
		 var pesocp = $(".peso-cpp5").val();
		 
		  var tension1   = $(".tension1-cpp5").val();
		 var tension11  = $(".tension11-cpp5").val();
		 
		 var alt1 = $(".alt1-cpp5").val();
		 var alt11 = $(".alt11-cpp5").val();
		 var alt111 = $(".alt111-cpp5").val();
		 
		  var fetal1   = $(".fetal1-cpp5").val();
		 var fetal11  = $(".fetal11-cpp5").val();
		 
		 var edema1   = $(".edema1-cpp5").val();
		 var edema11  = $(".edema11-cpp5").val();

		 var otroscp   = $(".otros-cpp5").val();
		 var evolucion  = $(".evolucion-cpp5").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren5')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
		    $(".saveBtn5").hide();
            $(".editBtn5").show();
			$(".editInput5").hide();
			$(".editSpan5").show();
			$(".fechacpp5").text(fecha);
			$(".semanacpp5").text(semana);
			$(".pesocpp5").text(pesocp);
			$(".tension1cpp5").text(tension1);
			$(".tension11cpp5").text(tension11);
			$(".alt1cpp5").text(alt1);
			$(".alt11cpp5").text(alt11);
			$(".alt111cpp5").text(alt111);
			$(".fetal1cpp5").text(fetal1);
			$(".fetal11cpp5").text(fetal11);
			$(".edema1cpp5").text(edema1);
			$(".edema11cpp5").text(edema11);
			$(".otroscpp5").text(otroscp);
			$(".evolucioncpp5").text(evolucion);
		}
		});
    });
   
   
  //sith

 	 $('.editBtn6').on('click',function(){
			 
 	$(".editInput6").show();
	$(".editSpan6").hide();
	
	 $(".editBtn6").hide();
		 $(".saveBtn6").show();

   });  
   
   
       	 $('#saveBtn6').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		var fecha   = $(".fecha-cpp6").val();
		 var semana  = $(".semana-cpp6").val();
		 var pesocp = $(".peso-cpp6").val();
		 
		  var tension1   = $(".tension1-cpp6").val();
		 var tension11  = $(".tension11-cpp6").val();
		 
		 var alt1 = $(".alt1-cpp6").val();
		 var alt11 = $(".alt11-cpp6").val();
		 var alt111 = $(".alt111-cpp6").val();
		 
		  var fetal1   = $(".fetal1-cpp6").val();
		 var fetal11  = $(".fetal11-cpp6").val();
		 
		 var edema1   = $(".edema1-cpp6").val();
		 var edema11  = $(".edema11-cpp6").val();

		 var otroscp   = $(".otros-cpp6").val();
		 var evolucion  = $(".evolucion-cpp6").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren6')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
		    $(".saveBtn6").hide();
            $(".editBtn6").show();
			$(".editInput6").hide();
			$(".editSpan6").show();
			$(".fechacpp6").text(fecha);
			$(".semanacpp6").text(semana);
			$(".pesocpp6").text(pesocp);
			$(".tension1cpp6").text(tension1);
			$(".tension11cpp6").text(tension11);
			$(".alt1cpp6").text(alt1);
			$(".alt11cpp6").text(alt11);
			$(".alt111cpp6").text(alt111);
			$(".fetal1cpp6").text(fetal1);
			$(".fetal11cpp6").text(fetal11);
			$(".edema1cpp6").text(edema1);
			$(".edema11cpp6").text(edema11);
			$(".otroscpp6").text(otroscp);
			$(".evolucioncpp6").text(evolucion);
		}
		});
    });
   
   
   
   //seventh
   
      	 $('.editBtn7').on('click',function(){
			 
 	$(".editInput7").show();
	$(".editSpan7").hide();
	
	 $(".editBtn7").hide();
		 $(".saveBtn7").show();

   });
   
    	 $('#saveBtn7').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		var fecha   = $(".fecha-cpp7").val();
		 var semana  = $(".semana-cpp7").val();
		 var pesocp = $(".peso-cpp7").val();
		 
		  var tension1   = $(".tension1-cpp7").val();
		 var tension11  = $(".tension11-cpp7").val();
		 
		 var alt1 = $(".alt1-cpp7").val();
		 var alt11 = $(".alt11-cpp7").val();
		 var alt111 = $(".alt111-cpp7").val();
		 
		  var fetal1   = $(".fetal1-cpp7").val();
		 var fetal11  = $(".fetal11-cpp7").val();
		 
		 var edema1   = $(".edema1-cpp7").val();
		 var edema11  = $(".edema11-cpp7").val();

		 var otroscp   = $(".otros-cpp7").val();
		 var evolucion  = $(".evolucion-cpp7").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren7')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
		    $(".saveBtn7").hide();
            $(".editBtn7").show();
			$(".editInput7").hide();
			$(".editSpan7").show();
			$(".fechacpp7").text(fecha);
			$(".semanacpp7").text(semana);
			$(".pesocpp7").text(pesocp);
			$(".tension1cpp7").text(tension1);
			$(".tension11cpp7").text(tension11);
			$(".alt1cpp7").text(alt1);
			$(".alt11cpp7").text(alt11);
			$(".alt111cpp7").text(alt111);
			$(".fetal1cpp7").text(fetal1);
			$(".fetal11cpp7").text(fetal11);
			$(".edema1cpp7").text(edema1);
			$(".edema11cpp7").text(edema11);
			$(".otroscpp7").text(otroscp);
			$(".evolucioncpp7").text(evolucion);
		}
		});
    });
   
   
   
   
      	 $('.editBtn8').on('click',function(){
			 
 	$(".editInput8").show();
	$(".editSpan8").hide();
	
	 $(".editBtn8").hide();
		 $(".saveBtn8").show();

   });
   
    	 $('#saveBtn8').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		var fecha   = $(".fecha-cpp8").val();
		 var semana  = $(".semana-cpp8").val();
		 var pesocp = $(".peso-cpp8").val();
		 
		  var tension1   = $(".tension1-cpp8").val();
		 var tension11  = $(".tension11-cpp8").val();
		 
		 var alt1 = $(".alt1-cpp8").val();
		 var alt11 = $(".alt11-cpp8").val();
		 var alt111 = $(".alt111-cpp8").val();
		 
		  var fetal1   = $(".fetal1-cpp8").val();
		 var fetal11  = $(".fetal11-cpp8").val();
		 
		 var edema1   = $(".edema1-cpp8").val();
		 var edema11  = $(".edema11-cpp8").val();

		 var otroscp   = $(".otros-cpp8").val();
		 var evolucion  = $(".evolucion-cpp8").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren8')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
		    $(".saveBtn8").hide();
            $(".editBtn8").show();
			$(".editInput8").hide();
			$(".editSpan8").show();
			$(".fechacpp8").text(fecha);
			$(".semanacpp8").text(semana);
			$(".pesocpp8").text(pesocp);
			$(".tension1cpp8").text(tension1);
			$(".tension11cpp8").text(tension11);
			$(".alt1cpp8").text(alt1);
			$(".alt11cpp8").text(alt11);
			$(".alt111cpp8").text(alt111);
			$(".fetal1cpp8").text(fetal1);
			$(".fetal11cpp8").text(fetal11);
			$(".edema1cpp8").text(edema1);
			$(".edema11cpp8").text(edema11);
			$(".otroscpp8").text(otroscp);
			$(".evolucioncpp8").text(evolucion);
		}
		});
    });
		
   
   
      	 $('.editBtn9').on('click',function(){
			 
 	$(".editInput9").show();
	$(".editSpan9").hide();
	
	 $(".editBtn9").hide();
		 $(".saveBtn9").show();

   });
   
    	 $('#saveBtn9').on('click',function(){
			var id_c1   = $("#id_c1").val();
		 var updated_by  = $("#updated_by").val();
		 
		var fecha   = $(".fecha-cpp9").val();
		 var semana  = $(".semana-cpp9").val();
		 var pesocp = $(".peso-cpp9").val();
		 
		  var tension1   = $(".tension1-cpp9").val();
		 var tension11  = $(".tension11-cpp9").val();
		 
		 var alt1 = $(".alt1-cpp9").val();
		 var alt11 = $(".alt11-cpp9").val();
		 var alt111 = $(".alt111-cpp9").val();
		 
		  var fetal1   = $(".fetal1-cpp9").val();
		 var fetal11  = $(".fetal11-cpp9").val();
		 
		 var edema1   = $(".edema1-cpp9").val();
		 var edema11  = $(".edema11-cpp9").val();

		 var otroscp   = $(".otros-cpp9").val();
		 var evolucion  = $(".evolucion-cpp9").val();
			
			$.ajax({
            type:'POST',
            url: "<?=base_url('admin_medico/SaveUpContPren9')?>",
            cache: true,
           data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
			tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
			fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
			otroscp:otroscp,evolucion:evolucion},
           success:function(data){
			alert("Cambiado ha sido hecho !");
		    $(".saveBtn9").hide();
            $(".editBtn9").show();
			$(".editInput9").hide();
			$(".editSpan9").show();
			$(".fechacpp9").text(fecha);
			$(".semanacpp9").text(semana);
			$(".pesocpp9").text(pesocp);
			$(".tension1cpp9").text(tension1);
			$(".tension11cpp9").text(tension11);
			$(".alt1cpp9").text(alt1);
			$(".alt11cpp9").text(alt11);
			$(".alt111cpp9").text(alt111);
			$(".fetal1cpp9").text(fetal1);
			$(".fetal11cpp9").text(fetal11);
			$(".edema1cpp9").text(edema1);
			$(".edema11cpp9").text(edema11);
			$(".otroscpp9").text(otroscp);
			$(".evolucioncpp9").text(evolucion);
		}
		});
    });
	
	
	
	 });
</script>