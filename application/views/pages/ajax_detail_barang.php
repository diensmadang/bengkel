<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){
        ?>
<div class="row">
	<div class="col-md-6">
        <fieldset class="form-group">
            <label class="form-label">Kode Sparepart</label>
            <input name="kd_part" type="text" value="<?php echo $row->kd_part; ?>" 
			class="form-control" readonly>
        </fieldset>
		
		<fieldset class="form-group">
            <label class="form-label">Nama Sparepart</label>
            <input name="nm_part" type="text" value="<?php echo $row->nm_part; ?>" 
			class="form-control" readonly>
        </fieldset>
		
		<fieldset class="form-group">
            <label class="form-label">Harga</label>
			<input type="text" value="<?php echo currency_format($row->harga); ?>" 
			class="form-control" readonly>
            <input hidden name="harga" type="text" value="<?php echo $row->harga; ?>" >
        </fieldset>
	</div>
        
	<div class="col-md-6">
        <fieldset class="form-group">
			<label class="form-label">Stok</label>
            <input id="stok" name="stok" type="text" value="<?php echo $row->stok; ?>" 
			class="form-control" readonly>
        </fieldset>  
		
		<fieldset class="form-group">
            <label class="form-label">Jumlah Beli</label>
            <input name="qty" type="text"  placeholder="Input jumlah beli" 
			class="form-control">
        </fieldset> 
	</div>
</div>
    <?php
    }
}
?>