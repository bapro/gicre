<div class="col-lg-12">
<?=$return_payment_id?>
    <h4 class="success">¡Gracias! Su pago fue exitoso.</h4>
    <p>SERVICIO : <span><?php echo $item_name; ?></span></p>
    <p>TRANSACCION ID : <span><?php echo $txn_id; ?></span></p>
    <p>CANTIDAD PAGADA : <span>$<?php echo $payment_amt.' '.$currency_code; ?></span></p>
   <!--<a href="<?php echo base_url('products'); ?>">Back to Products</a>-->
</div>