//slider
$(function () {
  $("#slider1").responsiveSlides({
	auto: true,
	pager: true,
	speed: 500,
	namespace: "centered-btns",
	fade:100
  });
});

//links downs
var $root = $('html, body');
$('#t').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});

////////////////////////
$('#t1').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
//////////////////////////
$('#tdc').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
//////////////////////
$('#t2').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});

///////////////////////
$('#t3').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
$('#td').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
$('#tm').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
$('#td').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
$('#tc').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});

$('#tcc').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
///check valididy
function validateForm() {
    var x = document.forms["myForm"]["name"].value;
	var a = document.forms["myForm"]["apellido"].value;
	var b = document.forms["myForm"]["email"].value;
    var c = document.forms["myForm"]["tel"].value;
	var d = document.forms["myForm"]["message"].value;
	
	 var atpos = b.indexOf("@");
    var dotpos = b.lastIndexOf(".");
    if (x == "" ) {
        alert("Nombre de pila debe ser llenado");
        return false;
    }
	  if (a == "" ) {
        alert("Apellido debe ser llenado");
        return false;
    }
	   if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length) {
        alert("La dirección de email no es válida");
        return false;
    }
    
	
	 if (c == "" ) {
        alert("Teléfono debe ser llenado");
        return false;
    }
	 if (d == "" ) {
        alert("Mensaye debe ser llenado");
        return false;
    }
} 

