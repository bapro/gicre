<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Pago de solicitud</title>
<title>Payment - PayPal Pro Integration in CodeIgniter by CodexWorld</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- stylesheet file -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/payment/style.css'); ?>">

<!-- jQuery library -->
<script src="<?php echo base_url('assets/js/payment/jquery.min.js'); ?>"></script>

<!-- Card validation library -->
<script src="<?php echo base_url('assets/js/payment/creditCardValidator.js'); ?>"></script>
<script>
/* Credit card validation code */
function cardFormValidate(){
    var cardValid = 0;
      
    // Card number validation
    $('#card_number').validateCreditCard(function(result) {
        var cardType = (result.card_type == null)?'':result.card_type.name;
        if(cardType == 'Visa'){
            var backPosition = result.valid?'2px -163px, 260px -87px':'2px -163px, 260px -61px';
        }else if(cardType == 'MasterCard'){
            var backPosition = result.valid?'2px -247px, 260px -87px':'2px -247px, 260px -61px';
        }else if(cardType == 'Maestro'){
            var backPosition = result.valid?'2px -289px, 260px -87px':'2px -289px, 260px -61px';
        }else if(cardType == 'Discover'){
            var backPosition = result.valid?'2px -331px, 260px -87px':'2px -331px, 260px -61px';
        }else if(cardType == 'Amex'){
            var backPosition = result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
        }else{
            var backPosition = result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
        }
        $('#card_number').css("background-position", backPosition);
        if(result.valid){
            $("#card_type").val(cardType);
            $("#card_number").removeClass('required');
            cardValid = 1;
        }else{
            $("#card_type").val('');
            $("#card_number").addClass('required');
            cardValid = 0;
        }
    });
      
    // Card details validation
    var cardName = $("#name_on_card").val();
    var expMonth = $("#expiry_month").val();
    var expYear = $("#expiry_year").val();
    var cvv = $("#cvv").val();
    var regName = /^[a-z ,.'-]+$/i;
    var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var regYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
    var regCVV = /^[0-9]{3,3}$/;
    if(cardValid == 0){
        $("#card_number").addClass('required');
        $("#card_number").focus();
        return false;
    }else if(!regMonth.test(expMonth)){
        $("#card_number").removeClass('required');
        $("#expiry_month").addClass('required');
        $("#expiry_month").focus();
        return false;
    }else if(!regYear.test(expYear)){
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").addClass('required');
        $("#expiry_year").focus();
        return false;
    }else if(!regCVV.test(cvv)){
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").addClass('required');
        $("#cvv").focus();
        return false;
    }else if(!regName.test(cardName)){
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").removeClass('required');
        $("#name_on_card").addClass('required');
        $("#name_on_card").focus();
        return false;
    }else{
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").removeClass('required');
        $("#name_on_card").removeClass('required');
        $('#cardSubmitBtn').prop('disabled', false);  
        return true;
    }
}

/* Submit card details and make payment */ 
$(document).ready(function(){
    // Initiate validation on input fields
    $('#paymentForm input[type=text]').on('keyup',function(){
        cardFormValidate();
    });
    
    // Submit card form
    $("#cardSubmitBtn").on('click',function(){
        $('.status-msg').remove();
        if(cardFormValidate()){
            var formData = $('#paymentForm').serialize();
            $.ajax({
                type:'POST',
                //url:'<?php echo base_url('products/payment/'.$product['id']); ?>',
				url: "<?=base_url('navigation/payment')?>",
                dataType: "json",
                data:formData,
                beforeSend: function(){
                    $("#cardSubmitBtn").prop('disabled', true);
                    $("#cardSubmitBtn").val('Processing....');
                },
                success:function(data){
                    if(data.status == 1){
                        $('#paymentSection').html('<p class="status-msg success">The transaction was successful. Order ID: <span>'+data.orderID+'</span></p>');
                    }else{
                        $("#cardSubmitBtn").prop('disabled', false);
                        $("#cardSubmitBtn").val('Proceed');
                        $('#paymentSection').prepend('<p class="status-msg error">Transaction has been failed, please try again.</p>');
                    }
                }
            });
        }
    });
});
</script>
</head>
<body>
<div class="container">
    <div class="card-payment">
        <h3>Pago de Solicitud por PayPal Pro</h3>
        
        <!-- Card from -->
        <div id="paymentSection">
            <form method="post" id="paymentForm">
                <h4>Solicitud de cita</b></h4>
                <h4>Cantidad a pagar: <b>$RD37</b></h4>
                <ul>
                    <li>
                        <label>Número de tarjeta</label>
                        <input type="text" placeholder="1234 5678 9012 3456" maxlength="20" id="card_number" name="card_number">
                    </li>
        
                    <li class="vertical">
                        <ul>
                            <li>
                                <label>Mes de vencimiento</label>
                                <input type="text" placeholder="MM" maxlength="5" id="expiry_month" name="expiry_month">
                            </li>
                            <li>
                                <label>Año de vencimiento</label>
                                <input type="text" placeholder="YYYY" maxlength="5" id="expiry_year" name="expiry_year">
                            </li>
                            <li>
                                <label>CVV</label>
                                <input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
                            </li>
                        </ul>
                    </li>
                    <li>
                        <label>Nombre en la tarjeta</label>
                        <input type="text" placeholder="John Doe" id="name_on_card" name="name_on_card">
                    </li>
                    <li>
                        <input type="hidden" name="card_type" id="card_type" value=""/>
                        <input type="button" name="card_submit" id="cardSubmitBtn" value="Proceed" class="payment-btn" disabled="true" >
                    </li>
                </ul>
            </form>
        </div>
	
    </div>
</div>
</body>
</html>