/**
* Template Name: NiceAdmin - v2.3.1
* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/



(function() {
  "use strict";
  
  
var pathArray = window.location.pathname.split('/');
var secondLevelLocation = pathArray[2];

console.log(secondLevelLocation);


	$(document).on("input", ".patient-nec-entry", function() {
    this.value = this.value.replace(/\D/g,'');
});  

 
  
var keyupTimerName;
  $(document).on('keyup', '#patient-nombres', function(event) {
  	var keyword = $(this).val();
            clearTimeout(keyupTimerName);
            keyupTimerName = setTimeout(function () {
               autoCompleteInputNames(keyword);
            }, 300);
        });



function autoCompleteInputNames(keyword){

if(keyword==""){
	$("#search-resut-nombres-padron").hide();
}else{
	$("#search-resut-nombres-padron").text('buscando');
	$.ajax({
type: "POST",
url: $("#base_url_1").val()+"patient_search/autoCompleteInputNames",
data:{keyword:keyword},

success: function(data){
$("#search-resut-nombres-padron").show();
$("#search-resut-nombres-padron").html(data);

},

});
}
}


  

$('input[type=radio][name=patient-entry-radio]').change(function() {
  if(this.value=='nombres'){
	  $('.hide-cedula').hide();
	   $('.hide-nec').hide();
	  $('.hide-nombres').show();
	   $('#search-patient-btn').show();
	   $('.hide-all-nav').hide();
	   $('.hide-cedula').val("");
  }else if(this.value=='cedula'){
	 $('.hide-cedula').show();
	  $('.hide-nombres').hide();
$('#search-patient-btn').hide();
$('.hide-nombres').val("");	 
$('.hide-nec').hide(); 
 $('.hide-all-nav').show();
  }else{
	$('.hide-nec').show();  
	  $('.hide-cedula').hide();
	  
	  $('.hide-nombres').hide();
	   $('#search-patient-btn').hide();
	 $('.hide-all-nav').show();
  }
  $("#missing-cedula").html("");	
});


 /* $('#search-patient-btn').click(function() {
	  
	 	var url=$("#url-to-search-nombres").val();
     var nombres=$("#patient-nombres").val();
	 var apellidos=$("#patient-apellidos").val();
	if(nombres =="" || apellidos ==""){
		return false;
	window.location.href = url+ "/" + nombres+ "/"+apellidos;
     
	}else{
	$("#missing-cedula").html("<em>nombres y apellidos son obligatorios</em>").addClass("text-danger");	
	}
  });*/
  
  
  
  	$('#patient-cedula').keyup(function() {
			var url=$("#url-to-search-patient").val();
		var radio_type = 'cedula';
		let isNum = $.isNumeric($(this).val());
	if(radio_type=='cedula' && $(this).val() !="" && isNum==true){
			
 searchPatientByCedula($(this).val(),radio_type, isNum);
} else if(radio_type=='cedula' && $(this).val() !="" && isNum==false){
$("#missing-cedula").html("<em>La cedula no debe tener texto</em>").addClass("text-danger");	
}

});



var timer = null;
$("#patient-nec").keydown(function(){
       clearTimeout(timer);
       timer = setTimeout(searchBynec, 1000)
});
function searchBynec (){
var str=  $("#patient-nec").val();
var url=$("#url-to-search-nec").val();
$("#missing-cedula").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(str) {
window.location.href = url+ "/" + str;
}
};


function searchPatientByCedula(cedula, radio_type, isNum){
		
		let digit=11- cedula.length;
let info;
let falta;
	//convert cedula to array
	let cedArray = cedula.split("");
	cedArray.splice(3, 0, "-"); //add - after position 3
    cedArray.splice(11, 0, "-");//add - after position 10
	if(digit==1){
		info='cifra';
		falta=' falta';
	}else{
	info='cifras';
falta=' faltan';	
	}
$("#missing-cedula").text(cedArray.join('') + falta + " " + digit + " " +info ).css('font-style','italic').css('color','#001340');
if(digit==0){
	$("#missing-cedula").text('espere...').css('font-style','italic').css('color','#001340');
typingPatientSearch(cedula);

}

}





function typingPatientSearch(seach_content){
	var url=$("#url-to-search-patient").val();
     
	if(seach_content){
$.ajax({
		type: "POST",
	url:url,
		data:{seach_content:seach_content},
   // beforeSend: function(){
			//$(".search-patient").css("background","#DCDCDC");
			//$(".suggesstion-box").html('buscando...').css('font-style','italic').css('color','#001340');
		//},
	success: function(data){
			window.location.href = url+ "/" + seach_content;
     
		},
		 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#missing-cedula").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
		});
	}
};

/*
$('.dropdown').on("mouseenter", () => {
    $(".dropdown > a").addClass('show')
    $(".dropdown > a").attr("aria-expanded","true");
    $(".dropdown > div").attr("data-bs-popper","none");
    $(".dropdown > div").addClass('show')
  })

$('.dropdown').on("mouseleave", () => {
    $(".dropdown > a").removeClass('show')
    $(".dropdown > a").attr("aria-expanded","false");
    $(".dropdown > div").removeAttr("data-bs-popper","none");
    $(".dropdown > div").removeClass('show')
  })*/



  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Sidebar toggle
   */
  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function(e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }

  /**
   * Search bar toggle
   */
  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function(e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  /**
   * Initiate quill editors
   */


  

 

  /**
   * Initiate Bootstrap validation check
   */
  var needsValidation = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(needsValidation)
    .forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })

  /**
   * Initiate Datatables
   */
  const datatables = select('.datatable', true)
  datatables.forEach(datatable => {
    new simpleDatatables.DataTable(datatable);
  })

  /**
   * Autoresize echart charts
   */
  const mainContainer = select('#main');
  if (mainContainer) {
    setTimeout(() => {
      new ResizeObserver(function() {
        select('.echart', true).forEach(getEchart => {
          echarts.getInstanceByDom(getEchart).resize();
        })
      }).observe(mainContainer);
    }, 200);
  }

})();