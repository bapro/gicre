<?php if ($tasa) { ?>
<div class="form-check form-check-inline">
<input class="form-check-input select-device" type="radio" id="inlineCheckbox1" name="select-device" value="RD$" checked>
<input type="hidden" class="tasa" id="tasa-peso" value="0">
<label class="form-check-label" for="inlineCheckbox1"><img width="28" src="<?= base_url() ?>/assets_new/img/flag-dom-vec.png" /></label>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input select-device" type="radio" id="inlineCheckbox2" name="select-device" value="USD$">
<input type="hidden" class="tasa" id="tasa-dolar" value="<?= $tasa['tasa_dolar'] ?>">
<label class="form-check-label" for="inlineCheckbox2"><img width="20" src="<?= base_url() ?>/assets_new/img/206626.png" /></label>
<small><?= $tasa['tasa_dolar'] ?></small>
</div>

<div class="form-check form-check-inline">
<input class="form-check-input select-device" type="radio" id="inlineCheckbox3" name="select-device" value="&euro;">
<input type="hidden" class="tasa" id="tasa-euro" value="<?= $tasa['tasa_euro'] ?>">
<label class="form-check-label" for="inlineCheckbox3"><img width="20" src="<?= base_url() ?>/assets_new/img/5111601.png" /></label>
<small><?= $tasa['tasa_euro'] ?></small>
</div>


<?php } else {
?>
<div class="form-check form-check-inline">
<input class="form-check-input select-device" type="radio" id="inlineCheckbox1" name="select-device" value="RD$" checked>
<input type="hidden" class="tasa" id="tasa-peso" value="0">
<label class="form-check-label" for="inlineCheckbox1"><img width="28" src="<?= base_url() ?>/assets_new/img/flag-dom-vec.png" /></label>
</div>
<a href="<?php echo base_url("$controller/exchange_rate/") ?>" class="btn btn-sm btn-outline-primary">Crear su tasa de cambio</a>

<?php } ?>