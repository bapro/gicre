function selectProvincia(id){
	if(id!=""){
		loadData('municipio',id);
	}else{
		$("#municipio_dropdown").html("<option value=''>SELECIONE MUNICIPIO</option>");
	}
}

function loadData(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Cargando... <img src="../assets/img/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadData",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value=''>SELECIONE MUNICIPIO</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}

//link especialida y doctor

function selectDoctor(id){
	if(id!=""){
		loadDataDoctors('doctor',id);
	}else{
		$("#doctor_dropdown").html("<option value=''>Seleccionne doctor</option>");
	}
}

function loadDataDoctors(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Cargando... <img src="../assets/img/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadDataDoctors",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value=''>Selccione doctor</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}

document.getElementById('form_phoneres').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

document.getElementById('form_phonecel').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});


	
	
	
	