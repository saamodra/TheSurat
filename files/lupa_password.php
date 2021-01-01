<?php
if (isset($_POST['submit'])) {
	require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/SMTP.php';
  $email=$_POST["email"];
  $query=mysqli_query($con, "select * from user where user_id='$email'");
  $row=mysqli_fetch_array($query);
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  $mail->SMTPAuth = TRUE;
  $mail->Username = "hijikatato23@gmail.com";
  $mail->Password = "Samodra1234";
  $mail->SMTPSecure = "tls";
  $mail->Port = 587;
  $mail->From = "hijikatato23@gmail.com";
  $mail->FromName = "Samodra";
  $mail->addAddress($row["user_id"]);
  $mail->isHTML(true);
  $mail->Subject = "Password Akun Aplikasi Surat Masuk & Keluar";
  $mail->Body = "<br><br><h4>Password Anda adalah : ".$row["password"]."</h4><br><br><h5>Catatan : Password masih dalam bentuk MD5, Decrypt dulu MD5 diatas<br><br><br>";
  $mail->AltBody = "Password Anda adalah : ".$row["password"]."<br>";
  if(!$mail->send())
  {
   $berhasil = '<div class="alert alert-danger" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email Tidak Terdaftar</div>';
  }
  else
  {
  	$email = $_POST['email'];
    $berhasil = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password berhasil dikirim</div>';
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
    <a href="">Lupa<b>Password</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Password akan dikirim ke Email anda</p>
      <?php
        if (isset($berhasil)) {
          echo $berhasil;
        }
      ?>
      <form action="" method="post">
        <div class="input-group form-group has-feedback">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
          </div>
          <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Kirim Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>