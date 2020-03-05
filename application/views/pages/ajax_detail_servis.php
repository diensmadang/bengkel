<?php
if(isset($detail_layanan)){
    foreach($detail_layanan as $row){
        ?>
<fieldset class="form-group">
    <label class="form-label">Nama Layanan</label>
    <input name="nm_layanan" type="text" value="<?php echo $row->nm_layanan; ?>" 
	class="form-control" readonly>
</fieldset>

<fieldset class="form-group">
    <label class="form-label">Biaya</label>
    <input name="harga" type="text" value="<?php echo currency_format($row->harga); ?>" 
	class="form-control" readonly>
</fieldset>
    <?php
    }
}
?>