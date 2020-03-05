<main role="main">
  <div class="jumbotron">
    <div class="container">
      Selamat Datang <?php echo $this->session->userdata('NAME');?><br> Anda sedang berada di dashboard system aplikasi bengkel
    </div>
  </div>
  
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <h3 class="text-info" style="text-align: center">Aplikasi Servis Kendaraan</h3>
    <?php if(isset($dt_contact)){
    foreach($dt_contact as $row){
    ?>
    <div align="center">
        <h4><?php echo $row->nama?></h4>
        <h5><?php echo $row->desc?></h5>
        <h6 class="muted"><?php echo $row->alamat?></h6>
        <h6 class="muted"><?php echo $row->email?> || <?php echo $row->telp?> || <?php echo $row->website?></h6>
    </div>
    <?php }
    }
    ?>

      </div>
    </div>
    <hr>
  </div>
</main>