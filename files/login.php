<?php
include_once 'classes/login.php';
$user = new User();
if (isset($_POST['login'])) {
  $login = $user->check_login($_POST['username'], md5($_POST['password']));
    if ($login)
    {
        // Login Success
        header('location:index.php?file=home');
    }
    else
    {
        // Login Failed
       ?>
        <div class="alert alert-danger" align="center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Login Gagal, Username atau Password Salah!
        </div>
        <?php
    }
}
?>
<head>
  <style type="text/css">
    body {background-color: #D3D3D3}
  </style>
</head>
<div class="login-box">
  <div class="login-logo">
    The<b>Surat</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login Terlebih dahulu!</p>

      <form action="" method="post">
        <div class="input-group form-group has-feedback">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
          </div>
          <input type="email" class="form-control" placeholder="Email" name="username">
        </div>
        <div class="input-group form-group has-feedback">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
          </div>
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <p class="mb-1">
        <a href="index.php?file=lupa_password">Lupa Password ?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>