<table class="table table-striped table-sm">
<thead>
  <tr>
        <th>No</th>
        <th>Kode User</th>
        <th>User ID</th>
        <th>Nama User</th>
        <th>Level</th>
      <th>
       <a href="#AddUser" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">Tambah Data</a>
      </th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($data_pegawai)){
    foreach($data_pegawai as $row){
    ?>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->kd_user; ?></td>
        <td><?php echo $row->username; ?></td>
        <td><?php echo $row->nama; ?></td>
        <td><?php echo $row->level; ?></td>
        <td align="center">
            <a class="btn btn-primary" href="#EditUser<?php echo $row->kd_user?>" data-toggle="modal"> Edit</a>
            <a class="btn btn-danger" href="<?php echo site_url('master/hapus_user/'.$row->kd_user);?>"
            onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
        </td>
        </tr>
      <?php }
  }
  ?>
</tbody>
</table>

<!-- Add User -->
<div class="modal fade" id="AddUser" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Data User</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_user')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode User</label>
                    <input name="kd_user" type="text" value="<?php echo $kd_user; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nama User</label>
                    <input name="username" placeholder="Nick Name" class="form-control" type="text" required>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Password</label>
                    <input name="password" placeholder="Password" class="form-control" type="password" required>
                </fieldset>
          </div>
         
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input name="nama" placeholder="Nama Lengkap" class="form-control" type="number" required>
                </fieldset>

                <fieldset class="form-group">
                <label class="form-label">Level Pengguna</label>
                <select name="level" id="level" class="form-control" required>
                    <option value=""> Pilih Level Akses </option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
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

<!-- Edit User -->
<?php
if (isset($data_pegawai)){
    foreach($data_pegawai as $row){
        ?>
<div class="modal fade" id="EditUser<?php echo $row->kd_user?>" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Edit Data User</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_user')?>">
          <div class="row">

          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Kode User</label>
                    <input name="kd_user" type="text" value="<?php echo $row->kd_user; ?>" class="form-control" readonly>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nama User</label>
                    <input name="username" class="form-control" type="text" value="<?php echo $row->username; ?>">
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Password</label>
                    <input name="password" class="form-control" type="password" required>
                </fieldset>
          </div>
         
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input name="nama" class="form-control" type="text" value="<?php echo $row->nama; ?>">
                </fieldset>

                <fieldset class="form-group">
                <label class="form-label">Level</label>
                <select name="level" id="level" class="form-control">
                    <?php if($row->level == 'admin'){?>
                        <option value="admin" selected="selected">Admin</option>
                    <?php }else{ ?>
                        <option value="user">User</option>
                    <?php }?>
                </select>
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