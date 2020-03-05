<div class="container">
<br>
<form>
<div class="row">
    <div class="col-5">
    <label class="form-label">Kode Transaksi</label>
    <input name="" class="form-control" value="<?php echo $kd_transaksi; ?>" readonly>
    </div>
</div>
<br>
<div class="row">
<div class="col-12">
<table class="table table-striped table-sm">
<thead>
  <tr>
    <th>No</th>
    <th>Kode Part</th>
    <th>Nama Part</th>
    <th>Qty</th>
    <th>Harga Satuan</th>
    <th>Subtotal</th>
      <th>
       <a href="#AddPenjualanPart" class="btn btn-success btn-block" data-toggle="modal">Tambah Sparepart</a>      
      </th>
  </tr>
</thead>
<tbody>
<?php $i=1; $no=1;?>
    <?php foreach($this->cart->contents() as $items): ?>
    <?php echo form_hidden('rowid[]', $items['rowid']); ?>
          <tr class="gradeX">
            <td><?php echo $no; ?></td>
            <td><?php echo $items['id']; ?></td>
            <td><?php echo $items['name']; ?></td>
            <td><?php echo $items['qty']; ?></td>
            <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
            <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
            <td align="center"><a class="btn btn-danger delbutton" href="#" class="delbutton"
            id="<?php echo 'tambah/'.$items['rowid'].'/'.$kd_transaksi.'/'.$items['id'].'/'.$items['qty']; ?>">Cancel</a>
            </td>
          </tr>
    <?php $i++; $no++;?>
    <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</form>

<hr>

<form action="<?php echo site_url('penjualan/simpan_penjualan') ?>" method="post">
<div class="row">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-6">
            <label class="control-label"> <strong>Daftar Pelanggan</strong></label>
            <div class="controls">
            <select id="kd_pelanggan" tabindex="5" class="chz-select form-control" 
			name="kd_pelanggan" data-placeholder="Pilih Pelanggan">
            <option value=""></option>
            <?php
            if(isset($data_pelanggan)){
                foreach($data_pelanggan as $row){
                    ?>
                    <option value="<?php echo $row->kd_pelanggan?>"><?php echo $row->nm_pelanggan?></option>
                <?php
                }
            }
            ?>
            </select>
            </div><br>
			<div id="detail_pelanggan"></div>
      </div>
      <div class="col-md-6">
	  <label class="control-label"> <strong>Layanan Service</strong></label>
            <div class="controls">
            <select  id="id_servis" tabindex="5" class="chz-select form-control" name="id_servis" 
			data-placeholder="Pilih Layanan">
            <option value=""></option>
             <?php
                if(isset($data_layanan)){
                    foreach($data_layanan as $row){
                        ?>
                        <option value="<?php echo $row->id_servis?>"><?php echo $row->nm_layanan?></option>
                    <?php
                    }
                }
                ?>
            </select>
            </div><br>
			<div id="detail_servis"></div>
	  </div>
    </div>
  </div>
  <div class="col-md-4" align="center">
    <label class="form-label">Total Harga Sparepart</label><font color="red" size=5px;><b><br>
	<label class="form-label">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></b></label>
    </font><input type="hidden" name="kd_transaksi" value="<?= $kd_transaksi; ?>" readonly>
    <input type="hidden" name="biaya_part" value="<?= $this->cart->total()?>">
    <input id="tanggal_penjualan" type="hidden" name="tanggal_penjualan" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-12-2222">
    </div>
</div>

<hr>

<p></p>
<div class="row">
  <div class="col-9"></div>
  <div class="col-9 col-lg-3" align="right"> 
	<button type="submit" class="btn btn-primary">Save</button>
    <a href="<?php echo site_url('penjualan')?>" class="btn btn-danger">Cancel</a>
  </div>
</div>
</form>
<hr>
</div> 

<!-- Add Part -->
<div class="modal fade" id="AddPenjualanPart" role="dialog">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Sparepart</h3>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body form">
        <form id="frm" name="frm"  method="post" action="<?php echo site_url('penjualan/tambah_penjualan_to_cart')?>">
		
          <div class="row">
          <div class="col-md-6">
                <fieldset class="form-group">
                    <label class="form-label">Daftar Sparepart</label><br>
                    <select id="kd_part"  class="chz-select" name="kd_part">
                        <option value=""></option>
                        <?php
                        if(isset($data_barang)){
                            foreach($data_barang as $row){
                                ?>
                                <option value="<?php echo $row->kd_part?>"><?php echo $row->nm_part?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </fieldset>
          </div>
        </div>
		
		 <div id="detail_barang"></div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" disabled="disabled" id="add" name="add" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#kd_part").change(function(){
            var kd_barang = $("#kd_part").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/get_detail_barang'); ?>",
                data: "kd_part="+kd_barang,
                cache:false,
                success: function(data){
                    $('#detail_barang').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });

        $("#kd_pelanggan").change(function(){
            var kd_pelanggan = $("#kd_pelanggan").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/get_detail_pelanggan'); ?>",
                data: "kd_pelanggan="+kd_pelanggan,
                cache:false,
                success: function(data){
                    $('#detail_pelanggan').html(data);
                }
            });
        });

        $("#id_servis").change(function(){
            var id_servis = $("#id_servis").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/get_detail_layanan'); ?>",
                data: "id_servis="+id_servis,
                cache:false,
                success: function(data){
                    $('#detail_servis').html(data);
                }
            });
        });

        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan menghapus?")){
                $.ajax({
                    url: "<?php echo base_url(); ?>penjualan/hapus_barang",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });

    })
</script>