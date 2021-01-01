<?php
include 'menu_atas.php';
include_once 'classes/instansi.php';
$data = new Instansi();
$id = $data->escape_string($_GET['id']);
$result = $data->edit($id);
foreach ($result as $res) {
    $nama_instansi = $res['nama_instansi'];
    $alamat = $res['alamat'];
    $kota = $res['kota'];
    $telp = $res['telp'];
    $hp = $res['hp'];
    $email = $res['email'];
    $website = $res['website'];
    $kontak_person = $res['kontak_person'];
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
        <h3 align="center">Form Update Instansi</h3>
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
                    <label for="nama_instansi">Nama Instansi</label>
                    <input type="text" class="form-control" name="nama_instansi" value="<?php echo $nama_instansi; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" name="kota" value="<?php echo $kota; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="telp">Telp</label>
                    <input type="text" class="form-control" name="telp" value="<?php echo $telp; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="hp">HP</label>
                    <input type="text" class="form-control" name="hp" value="<?php echo $hp; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website" value="<?php echo $website; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="kontak_person">Kontak Person</label>
                    <input type="text" class="form-control" name="kontak_person" value="<?php echo $kontak_person; ?>">
                </div>
            </div><br>
            <div class="row">
                <div class="center">
                <button class="btn btn-info ion-checkmark-round" type="submit" name="update"> Update</button>
                <a href="index.php?file=instansi" class="btn btn-danger ion-close-round"> Batal</a>
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