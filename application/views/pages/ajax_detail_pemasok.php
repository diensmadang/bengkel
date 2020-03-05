<?php
if(isset($detail_pemasok)){
    foreach($detail_pemasok as $row){
        ?>
<fieldset class="form-group">
    <label class="form-label">Kode Pemasok</label>
    <input type="text" value="<?php echo $row->kd_pemasok; ?>" 
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