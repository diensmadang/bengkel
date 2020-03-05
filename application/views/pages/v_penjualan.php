<br>
<div class="container">
    <div class="row">
      <div class="col-md-12">

<table class="table-responsive table-striped table-sm">
<thead>
  <tr>
    <th>No</th>
    <th>Tanggal Transaksi</th>
    <th>Kode Transaksi</th>
    <th>Qty Part</th>
    <th>Total Harga Sparepart</th>
      <th>
       <a href="<?php echo site_url('penjualan/pages_tambah_penjualan')?>" class="btn  btn-block btn-inverse btn-info" >Tambah Data</a>
      </th>
  </tr>
</thead>
<tbody>
<?php
    $no=1;
    if(isset($data_penjualan)){
    foreach($data_penjualan as $row){
    ?>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo date("d M Y",strtotime($row->tanggal_penjualan)); ?></td>
        <td><?php echo $row->kd_transaksi; ?></td>
        <td><?php echo $row->jumlah; ?> Items</td>
        <td><?php echo currency_format($row->biaya_part); ?></td>
              <td align="center">
                <a class="btn btn-primary" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->kd_transaksi)?>" > View</a>
                <a class="btn btn-danger" href="<?php echo site_url('penjualan/hapus/'.$row->kd_transaksi)?>"
                onclick="return confirm('Data akan dihapus ?')"> Hapus</a>
                <a class="btn btn-success" href="#">Pdf</a>
				<a class="btn btn-warning" href="#">Direct Print</a>
              </td>
          </tr>
      <?php }
  }
  ?>
</tbody>
</table>

    </div>
  </div>
  <hr>
</div>