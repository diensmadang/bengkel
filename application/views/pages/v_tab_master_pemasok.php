<table class="table table-striped table-sm">
<thead>
  <tr>
    <th>No</th>
    <th>Kode Pemasok</th>
    <th>Nama Pemasok</th>
    <th>Alamat</th>
    <th>Email</th>
      <th>
       <a href="#AddPemasok" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">Tambah Data</a>
      </th>
  </tr>
</thead>
<tbody>
<?php
  $no=1;
  if(isset($data_pemasok)){
      foreach($data_pemasok as $row){
          ?>
          <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->kd_pemasok; ?></td>
              <td><?php echo $row->nm_pemasok; ?></td>
              <td><?php echo $row->alamat; ?></td>
              <td><?php echo $row->email; ?></td>
              <td align="center">
                  <a class="btn btn-primary" href="#EditPemasok<?php echo $row->kd_pemasok?>" data-toggle="modal"> Edit</a>
                  <a class="btn btn-danger" href="<?php echo site_url('master/hapus_pemasok/'.$row->kd_pemasok);?>"
                     onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
              </td>
          </tr>
      <?php }
  }
  ?>
</tbody>
</table>

<!-- Add Pemasok -->
<div class="modal fade" id="AddPemasok" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Data Pemasok</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_pemasok')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Pemasok</label>
                    <input name="kd_pemasok" type="text" value="<?php echo $kd_pemasok; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nama Pemasok</label>
                    <input name="nm_pemasok" placeholder="Nama Pemasok" class="form-control" type="text">
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

<!-- Edit Pemasok -->
<?php
if(isset($data_pemasok)){
    foreach($data_pemasok as $row){
        ?>
<div class="modal fade" id="EditPemasok<?php echo $row->kd_pemasok?>" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Data Pemasok</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_pemasok')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Pemasok</label>
                    <input name="kd_pemasok" type="text" value="<?php echo $row->kd_pemasok; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nama Pemasok</label>
                    <input name="nm_pemasok" class="form-control" type="text" value="<?php echo $row->nm_pemasok; ?>">
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