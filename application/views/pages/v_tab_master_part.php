<table class="table table-striped table-sm">
<thead>
  <tr>
        <th>No</th>
        <th>Kode Sparepart</th>
        <th>Nama Sparepart</th>
        <th>Stok</th>
        <th>Harga</th>
      <th>
       <a href="#AddPart" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">Tambah Data</a>
      </th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($data_barang)){
    foreach($data_barang as $row){
    ?>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->kd_part; ?></td>
        <td><?php echo $row->nm_part; ?></td>
        <td><?php echo $row->stok; ?></td>
        <td><?php echo currency_format($row->harga);?></td>
        <td align="center">
            <a class="btn btn-primary" href="#EditPart<?php echo $row->kd_part?>" data-toggle="modal"> Edit</a>
            <a class="btn btn-danger" href="<?php echo site_url('master/hapus_barang/'.$row->kd_part);?>"
            onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
        </td>
        </tr>
      <?php }
  }
  ?>
</tbody>
</table>

<!-- Add Part -->
<div class="modal fade" id="AddPart" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Data Sparepart</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_barang')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Sparepart</label>
                    <input name="kd_part" type="text" value="<?php echo $kd_part; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nama Sparepart</label>
                    <input name="nm_part" placeholder="Nama Sparepart" class="form-control" type="text">
                </fieldset>
          </div>
         
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Stok</label>
                    <input name="stok" placeholder="Jumlah Stok" class="form-control" type="number">
                </fieldset>

                <fieldset class="form-group">
                <label class="form-label">Harga</label>
                    <input name="harga" placeholder="Harga" class="form-control" type="number">
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
if (isset($data_barang)){
    foreach($data_barang as $row){
        ?>
<div class="modal fade" id="EditPart<?php echo $row->kd_part?>" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Data Sparepart</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_barang')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Sparepart</label>
                    <input name="kd_part" type="text" value="<?php echo $row->kd_part; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nama Sparepart</label>
                    <input name="nm_part" class="form-control" type="text" value="<?php echo $row->nm_part; ?>">
                </fieldset>
          </div>
         
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Stok</label>
                    <input name="stok" class="form-control" type="number" value="<?php echo $row->stok; ?>">
                </fieldset>

                <fieldset class="form-group">
                <label class="form-label">Harga</label>
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