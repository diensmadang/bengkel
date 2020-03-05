<!--========================= Content Wrapper ==============================-->
<div class="container">
<br>
    <div class="">
        <h4 class="alert alert-info" style="text-align: center">Faktur Penjualan & Service Kendaraan</h4>
        <div class="">
 <?php if(isset($dt_penjualan)){
    foreach($dt_penjualan as $row){
        ?>
	<div class="row">
       <div class="col-4">
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Nomor Faktur</h6></div>
         <span class="text-muted"><?php echo $row->kd_transaksi?></span>
        </li>
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Tanggal Penjualan</h6></div>
         <span class="text-muted"><?php echo date("d M Y",strtotime($row->tanggal_penjualan));?></span>
        </li><br>
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Biaya Sparepart</h6></div>
         <span class="text-muted"><?php echo currency_format($row->biaya_part)?></span>
        </li>
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Biaya Jasa Service</h6></div>
         <span class="text-muted"><?php echo currency_format($row->harga)?></span>
        </li>
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Total Biaya</h6></div>
         <span class="text-muted"><b><?= currency_format($row->biaya_part+$row->harga); ?></b></span>
        </li><br>
	   </div>
	   
	 <div class="col-4"></div>
	 
     <div class="col-4">
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Customer</h6></div>
         <span class="text-muted"><?php echo $row->nm_pelanggan?></span>
        </li>
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Alamat</h6></div>
         <span class="text-muted"><?php echo $row->alamat?></span>
        </li>
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Email</h6></div>
         <span class="text-muted"><?php echo $row->email?></span>
        </li><br>
		<li class="d-flex justify-content-between ">
         <div><h6 class="my-0">Pramuniaga</h6></div>
         <span class="text-muted"><?php echo $row->nama?></span>
        </li>
	   </div>
     </div>
     <?php }
 }
?>
        </div>
    </div>


    <div class="">
        <h4 class="alert alert-info" style="text-align: center"> Daftar Pembelian Sparepart</h4>
        <div class="">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Sparepart</th>
                    <th>Nama Sparepart</th>
                    <th>Qty</th>
                    <th>Harga Satuan</th>
                    <th >SubTotal Harga Sparepart</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row ){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->kd_part?></td>
                            <td><?php echo $row->nm_part?></td>
                            <td><?php echo $row->qty?></td>
                            <td><?php echo currency_format($row->harga)?></td>
                            <td><?php echo currency_format($row->qty*$row->harga)?></td>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>

            <div class="form-actions">
                <a href="<?php echo site_url('penjualan')?>" class="btn btn-primary">Back
                </a>
            </div>
        </div>
    </div>
<hr>
</div>