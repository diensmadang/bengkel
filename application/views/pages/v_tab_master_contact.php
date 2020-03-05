<?php if(isset($data_contact)){
foreach ($data_contact as $row){
?>
<form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_contact')?>">
<div class="row">
<div class="col-md-6">
      <fieldset class="form-group">
          <label class="form-label">Nama Perusahaan</label>
          <input name="nama" type="text" value="<?php echo $row->nama?>" class="form-control" required>
      </fieldset>
      <fieldset class="form-group">
          <label class="form-label">Deskripsi</label>
          <textarea name="desc" rows="2" class="form-control" required><?php echo $row->desc?></textarea>
      </fieldset>
      <fieldset class="form-group">
          <label class="form-label">Owner</label>
          <input name="owner" value="<?php echo $row->owner?>" required maxlength="30" class="form-control" type="text">
      </fieldset>
      <fieldset class="form-group">
          <label class="form-label">Telp</label>
          <input name="telp" value="<?php echo $row->telp?>" class="form-control" type="number">
      </fieldset>
</div>

<div class="col-md-6">
      <fieldset class="form-group">
      <label class="form-label">Email</label>
          <input name="email" value="<?php echo $row->email?>" class="form-control" type="email">
      </fieldset>
      <fieldset class="form-group">
      <label class="form-label">Website</label>
          <input name="website" value="<?php echo $row->website?>" class="form-control" type="text">
      </fieldset>
      <fieldset class="form-group">
      <label class="form-label">Alamat</label>
        <textarea name="alamat" rows="2" class="form-control" required><?php echo $row->alamat?></textarea>
      </fieldset>
</div> 
</div>

<input name="id" type="hidden" value="1">
<div class="modal-footer">
<button class="btn btn-primary" type="submit">Update</button>
</div>
</form>
<?php }
}
?>