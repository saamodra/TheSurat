<?php
include 'menu_atas.php';
include_once 'classes/jenis.php';
$data = new Jenis();
$id = $data->escape_string($_GET['id']);
$result = $data->edit($id);
foreach ($result as $res) {
    $jenis = $res['jenis'];
    $keterangan = $res['keterangan'];
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
        <h3 align="center">Form Update Jenis Surat</h3>
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
                    <label for="grup">Jenis Surat</label>
                    <input type="text" class="form-control" name="jenis" value="<?php echo $jenis;?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="<?php echo $keterangan;?>">
                </div>
            </div><br>
            <div class="row">
                <div class="center">
                <button class="btn btn-info ion-checkmark-round" type="submit" name="update"> Update</button>
                <a href="index.php?file=jenis" class="btn btn-danger ion-close-round"> Batal</a>
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