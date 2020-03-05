<table class="table table-striped table-sm">
<thead>
  <tr>
    <th>No</th>
    <th>Kode Kendaraan</th>
    <th>No Plat Kendaraan</th>
    <th>Merk</th>
    <th>Tipe</th>
    <th>Tahun</th>
      <th>
       <a href="#AddKendaraan" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">Tambah Data</a>
      </th>
  </tr>
</thead>
<tbody>
<?php
  $no=1;
  if(isset($data_kendaraan)){
      foreach($data_kendaraan as $row){
          ?>
          <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->kd_kendaraan; ?></td>
              <td><?php echo $row->no_plat; ?></td>
              <td><?php echo $row->merk; ?></td>
              <td><?php echo $row->tipe; ?></td>
              <td><?php echo $row->tahun; ?></td>
              <td align="center">
                  <a class="btn btn-primary" href="#EditKendaraan<?php echo $row->kd_kendaraan?>" data-toggle="modal"> Edit</a>
                  <a class="btn btn-danger" href="<?php echo site_url('master/hapus_kendaraan/'.$row->kd_kendaraan);?>"
                     onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
              </td>
          </tr>
      <?php }
  }
  ?>
</tbody>
</table>

<!-- Add Pemasok -->
<div class="modal fade" id="AddKendaraan" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Data Kendaraan</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_kendaraan')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Kendaraan</label>
                    <input name="kd_kendaraan" type="text" value="<?php echo $kd_kendaraan; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nomor Plat Kendaraan</label>
                    <input name="no_plat" placeholder="Nomor Plat Kendaraan" class="form-control" type="text">
                </fieldset>

               <fieldset class="form-group">
                    <label class="form-label">Merk</label>
                    <input name="merk" placeholder="Merk Kendaraan" class="form-control" type="text">
                </fieldset>
          </div>
         
          <div class="col-md-6">
               <fieldset class="form-group">
                    <label class="form-label">Tipe Kendaraan</label>
                    <input name="tipe" placeholder="Tipe Kendaraan" class="form-control" type="text">
                </fieldset>

                <fieldset class="form-group">
                <label class="form-label">Tahun Produksi</label>
                    <input name="tahun" placeholder="Tahun Produksi" class="form-control" type="number">
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
if(isset($data_kendaraan)){
    foreach($data_kendaraan as $row){
        ?>
<div class="modal fade" id="EditKendaraan<?php echo $row->kd_kendaraan?>" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Data Kendaraan</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_kendaraan')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode Kendaraan</label>
                    <input name="kd_kendaraan" type="text" value="<?php echo $row->kd_kendaraan; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nomor Plat Kendaraan</label>
                    <input name="no_plat" class="form-control" type="text" value="<?php echo $row->no_plat; ?>">
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Merk Kendaraan</label>
                    <input name="merk"  class="form-control" type="text" value="<?php echo $row->merk; ?>">
                </fieldset> 
          </div>
         
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Tipe Kendaraan</label>
                    <input name="tipe" class="form-control" type="text" value="<?php echo $row->tipe; ?>">
                </fieldset>

                <fieldset class="form-group">
                <label class="form-label">Tahun Produksi</label>
                    <input name="tahun" class="form-control" type="number" value="<?php echo $row->tahun; ?>">
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