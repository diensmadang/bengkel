<footer class="container">
      <p>&copy; diensmadang || Bootstrap 4.0 2018-2019</p>
    </footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url(); ?>assets/select/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $(".chz-select").select2({
            placeholder: "Please Select"
        });
    });
</script>

  </body>
</html>