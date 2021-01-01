<?php
include 'menu_atas.php';
include_once 'classes/user.php';
$data = new MUser();
$id = $data->escape_string($_GET['id']);
$result = $data->edit($id);
foreach ($result as $res) {
    $email = $res['email'];
    $level = $res['level'];
    $nama = $res['nama'];
}
if (isset($_POST['update'])) {
        $data->update($id);
}
?>
<head>
    <style type="text/css">
            .center {
      width: 50%;
      margin: 0 auto;
    }
    
    </style>
</head>
<div class="content-wrapper">
    <section class="content"><br>
        <div class="card"><br>
<div class="page-header">
        <h3 align="center">Form Update User</h3>
</div>
 <div class="container">
    <?php
    if (isset($data->pesan)) {
        echo $data->pesan;
    }
    ?>
        <form action="" method="post">
            <div class="row">
                <div class="form-group center">
                    <label for="lengkap">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="level">Level</label>
                    <select name="level" class="form-control" >
                            <option value="Admin" <?php if($level=='Admin'){echo 'selected';}?>>Admin</option>
                            <option value="User" <?php if($level=='User'){echo 'selected';}?>>User</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="lengkap">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>">
                </div>
            </div><br>
            <div class="row">
                <div class="center">
                <button class="btn btn-info ion-checkmark-round" type="submit" name="update"> Update</button>
                <a href="index.php?file=user" class="btn btn-danger ion-close-round"> Batal</a>
                </div>
            </div>
        </form><br><br>
</div>
</div>
</section>
</div>
<?php
include 'menu_bawah.php';
?>