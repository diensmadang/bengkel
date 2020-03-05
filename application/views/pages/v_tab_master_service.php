<table class="table table-striped table-sm">
<thead>
  <tr>
        <th>No</th>
        <th>Nama Layanan</th>
        <th>Biaya</th>
      <th>
       <a href="#AddServis" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">Tambah Data</a>
      </th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($data_service)){
    foreach($data_service as $row){
    ?>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->nm_layanan; ?></td>
        <td><?php echo currency_format($row->harga);?></td>
        <td align="center">
            <a class="btn btn-primary" href="#EditServis<?php echo $row->id_servis?>" data-toggle="modal"> Edit</a>
            <a class="btn btn-danger" href="<?php echo site_url('master/hapus_service/'.$row->id_servis);?>"
            onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
        </td>
        </tr>
      <?php }
  }
  ?>
</tbody>
</table>

<!-- Add Part -->
<div class="modal fade" id="AddServis" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Data Layanan Servis</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_service')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Nama Layanan</label>
                    <input name="nm_layanan" placeholder="Nama Layanan" class="form-control" type="text">
                </fieldset>
          </div>
         
          <div class="col-md-6">
                <fieldset class="form-group">
                <label class="form-label">Biaya</label>
                    <input name="harga" placeholder="Biaya" class="form-control" type="number">
                </fieldset>  
          </div>
        
        </div>
        </div>
        <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<!-- Edit Sparepart -->
<?php
if (isset($data_service)){
    foreach($data_service as $row){
        ?>
<div class="modal fade" id="EditServis<?php echo $row->id_servis?>" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Data Layanan Servis</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_service')?>">
		<input hidden name="id_servis" class="form-control" type="text" value="<?php echo $row->id_servis; ?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Nama Layanan</label>
                    <input name="nm_layanan" class="form-control" type="text" value="<?php echo $row->nm_layanan; ?>">
                </fieldset>
          </div>
         
          <div class="col-md-6">
                <fieldset class="form-group">
                <label class="form-label">Biaya</label>
                    <input name="harga" class="form-control" type="number" value="<?php echo $row->harga; ?>">
                </fieldset>  
          </div>
        
        </div>
        </div>
        <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php }
}
?>