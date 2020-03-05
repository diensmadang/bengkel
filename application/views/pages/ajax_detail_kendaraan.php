<?php
if(isset($detail_kendaraan)){
    foreach($detail_kendaraan as $row){
        ?>
<fieldset class="form-group">
    <label class="form-label">Kode Kendaraan</label>
    <input type="text" value="<?php echo $row->kd_kendaraan; ?>" 
	class="form-control" readonly>
</fieldset>

<fieldset class="form-group">
    <label class="form-label">Nomor Plat Kendaraan</label>
    <input name="no_plat" type="text" value="<?php echo $row->no_plat; ?>" 
	class="form-control" readonly>
</fieldset>

<fieldset class="form-group">
    <label class="form-label">Merk</label>
    <input name="merk" type="text" value="<?php echo $row->merk; ?>" 
	class="form-control" readonly>
</fieldset>
    <?php
    }
}
?>