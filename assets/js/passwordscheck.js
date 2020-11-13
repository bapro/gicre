$(document).ready(function() {
$('#pass1').keyup(function() {
$('#result').html(checkStrength($('#pass1').val()))
})
function checkStrength(password) {
var strength = 0
if (password.length < 6) {
$('#send').prop('disabled',true)
$('#result').removeClass()
$('#result').addClass('short')
return 'Demasiado corto'
}
if (password.length > 7) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2
if (strength < 2) {
$('#result').removeClass()
$('#result').addClass('weak')
$('#send').prop('disabled',true)
return 'Débiles'
} else if (strength == 2) {
$('#result').removeClass()
$('#result').addClass('good')
$('#send').prop('disabled',true)
$('#send').prop('disabled',false)
return 'Bueno'
} else {
$('#result').removeClass()
$('#result').addClass('strong')
$('#send').prop('disabled',false)
return 'Fuerte'
}
}
});