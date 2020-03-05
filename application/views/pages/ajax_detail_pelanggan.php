<?php
if(isset($detail_pelanggan)){
    foreach($detail_pelanggan as $row){
        ?>
<fieldset class="form-group">
    <label class="form-label">Kode Pelanggan</label>
    <input type="text" value="<?php echo $row->kd_pelanggan; ?>" 
	class="form-control" readonly>
</fieldset>

<fieldset class="form-group">
    <label class="form-label">Alamat</label>
    <input name="alamat" type="text" value="<?php echo $row->alamat; ?>" 
	class="form-control" readonly>
</fieldset>

<fieldset class="form-group">
    <label class="form-label">Email</label>
    <input name="email" type="text" value="<?php echo $row->email; ?>" 
	class="form-control" readonly>
</fieldset>
    <?php
    }
}
?>