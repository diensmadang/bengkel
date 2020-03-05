<table class="table table-striped table-sm">
<thead>
  <tr>
    <th>No</th>
    <th>Kode Pelanggan</th>
    <th>Nama Pelanggan</th>
    <th>Alamat</th>
    <th>Email</th>
      <th>
       <a href="#AddPelanggan" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">Tambah Data</a>
      </th>
  </tr>
</thead>
<tbody>
<?php
  $no=1;
  if(isset($data_pelanggan)){
      foreach($data_pelanggan as $row){
          ?>
          <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->kd_pelanggan; ?></td>
              <td><?php echo $row->nm_pelanggan; ?></td>
              <td><?php echo $row->alamat; ?></td>
              <td><?php echo $row->email; ?></td>
              <td align="center">
                  <a class="btn btn-primary" href="#EditPelanggan<?php echo $row->kd_pelanggan?>" data-toggle="modal"> Edit</a>
                  <a class="btn btn-danger" href="<?php echo site_url('master/hapus_pelanggan/'.$row->kd_pelanggan);?>"
                     onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
              </td>
          </tr>
      <?php }
  }
  ?>
</tbody>
</table>

<!-- Add Pelanggan -->
<div class="modal fade" id="AddPelanggan" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Data Pelanggan</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_pelanggan')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Pelanggan</label>
                    <input name="kd_pelanggan" type="text" value="<?php echo $kd_pelanggan; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nama Pelanggan</label>
                    <input name="nm_pelanggan" placeholder="Nama Pelanggan" class="form-control" type="text">
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat"  class="form-control" type="text"></textarea>
                </fieldset> 
          </div>
         
          <div class="col-md-6">
                <!-- <fieldset class="form-group">
                    <label class="form-label">Tanggal Lahir</label>
                    <input name="" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                </fieldset> -->

                <fieldset class="form-group">
                    <label class="form-label">Nomor Telp</label>
                    <input name="telp" placeholder="Telp" class="form-control" type="number">
                </fieldset>

                <fieldset class="form-group">
                <label class="form-label">Email</label>
                    <input name="email" placeholder="Email" class="form-control" type="email">
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

<!-- Edit Pelanggan -->
<?php
if(isset($data_pelanggan)){
    foreach($data_pelanggan as $row){
        ?>
<div class="modal fade" id="EditPelanggan<?php echo $row->kd_pelanggan?>" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Data Pelanggan</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_pelanggan')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Pelanggan</label>
                    <input name="kd_pelanggan" type="text" value="<?php echo $row->kd_pelanggan; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nama Pelanggan</label>
                    <input name="nm_pelanggan" class="form-control" type="text" value="<?php echo $row->nm_pelanggan; ?>">
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Alamat</label>
                    <input name="alamat"  class="form-control" type="text" value="<?php echo $row->alamat; ?>">
                </fieldset> 
          </div>
         
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Nomor Telp</label>
                    <input name="telp" class="form-control" type="number" value="<?php echo $row->telp; ?>">
                </fieldset>

                <fieldset class="form-group">
                <label class="form-label">Email</label>
                    <input name="email" class="form-control" type="email" value="<?php echo $row->email; ?>">
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