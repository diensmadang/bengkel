<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/ci-icon.png') ?>">
    <title>Login</title>

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" >
	<link href="<?php echo base_url('assets/css/signin.css') ?>" rel="stylesheet" >
  </head>

  <body class="text-center">

    <form class="form-signin" action="<?= site_url('login/cek_login')?>" method="post">

	<!-- NOTIF -->
    <?php
    $message = $this->session->flashdata('notif');
    if($message){
    echo '<p class="alert alert-danger text-center">'.$message .'</p>';
    }?>
	
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>