<?php
include 'menu_atas.php';
include_once 'classes/blockip.php';
$data = new BlockIP();
$id = $data->escape_string($_GET['id']);
$result = $data->edit($id);
foreach ($result as $res) {
    $ip = $res['ip'];
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
        <h3 align="center">Form Update Block IP</h3>
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
                    <label for="block_ip">IP Address</label>
                    <input type="text" class="form-control" name="block_ip" value="<?php echo $ip;?>">
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
                <a href="index.php?file=block_ip" class="btn btn-danger ion-close-round"> Batal</a>
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