<?php
include 'menu_atas.php';
include_once 'classes/surat_masuk.php';
$data = new SMasuk();
$id = $data->escape_string($_GET['id']);
$result = $data->edit($id);
foreach ($result as $res) {
    $nomor_surat = $res['nomor_surat'];
    $bagian = $res['bagian'];
    $sifat = $res['sifat'];
    $perihal = $res['perihal'];
    $tanggal_surat = $res['tanggal_surat'];
    $tanggal_terima = $res['tanggal_terima'];
    $tanggal_expired = $res['tanggal_expired'];
    $nomor_agenda = $res['nomor_agenda'];
    $disposisi = $res['disposisi'];
    $tembusan = $res['tembusan'];
    $nama_instansi = $res['nama_instansi'];
    $jenis = $res['jenis'];
    $tindak_lanjut = $res['tindak_lanjut'];
    $lokasi = $res['lokasi'];
}
if (isset($_POST['update']) && ($id=anti_injection($_REQUEST['id']))) {
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
        <h3 align="center">Form Update Surat Masuk</h3>
</div>
 <div class="container">
    <?php
    if (isset($berhasil)) {
        echo $berhasil;
    }
    ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nomor_surat">Nomor Surat</label>
                        <input type="text" value="<?php echo $nomor_surat; ?>" class="form-control" name="nomor_surat">
                    </div>
            </div>
            <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputBagian">Bagian Penerima</label>
                        <select name="bagian_id" class="form-control">
                                <?php 
                                    $query = "SELECT * FROM bagian";
                                    $hasil = $this->connection->query($query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        ?>
                                        <option value="<?php echo $data['bagian_id']; ?>" <?php if ($bagian==$data['bagian']) {
                                            echo "selected";
                                        }?>>
                                            <?php echo $data['bagian']; ?>
                                        </option>
                                        <?php
                                        
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputSifat">Sifat</label>
                        <select name="sifat" class="form-control" >
                            <option value="BIASA" <?php if($sifat=='BIASA'){echo 'selected';}?>>BIASA</option>
                            <option value="RAHASIA" <?php if($sifat=='RAHASIA'){echo 'selected';}?>>RAHASIA</option>
                            <option value="SANGAT RAHASIA" <?php if($sifat=='SANGAT BIASA'){echo 'selected';}?>>SANGAT RAHASIA</option>
                            <option value="KONFIDENSIAL" <?php if($sifat=='KONFIDENSIAL'){echo 'selected';}?>>KONFIDENSIAL</option>
                            <option value="LAIN-LAIN" <?php if($sifat=='LAIN-LAIN'){echo 'selected';}?>>LAIN-LAIN</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputPrihal">Perihal</label>
                        <input type="text" value="<?php echo $perihal; ?>" class="form-control" name="prihal" placeholder="Prihal" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputTglSurat">Tanggal Surat</label>
                        <input type="date" value="<?php echo $tanggal_surat; ?>" class="form-control" name="tanggal_surat" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputTglTerima">Tanggal Terima</label>
                        <input type="date" value="<?php echo $tanggal_terima; ?>" class="form-control" name="tanggal_terima" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputTglExpired">Tanggal Expired</label>
                        <input type="date" value="<?php echo $tanggal_expired; ?>" class="form-control" name="tanggal_expired" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputNoAg">Nomor Agenda</label>
                        <input type="text" value="<?php echo $nomor_agenda; ?>" class="form-control" name="nomor_agenda" placeholder="Nomor Agenda" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputLampiran">Lampiran</label>
                        <input type="file" class="form-control" name="lampiran" placeholder="Lampiran" accept=".xls, .xlsx, .csv, .docx, .pdf, .doc, .ppt, .txt">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputDisposisi">Disposisi</label>
                        <input type="text" value="<?php echo $disposisi; ?>" class="form-control" name="disposisi" placeholder="Disposisi" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputTembusan">Tembusan</label>
                        <input type="text" value="<?php echo $tembusan; ?>" class="form-control" name="tembusan" placeholder="Tembusan" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputJenis">Instansi Pengirim</label>
                        <select name="instansi_id" class="form-control" >
                                <?php 
                                    $query = "SELECT * FROM instansi";
                                    $hasil = $this->connection->query($query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        ?>
                                        <option value="<?php echo $data['instansi_id']; ?>" <?php if ($nama_instansi==$data['nama_instansi']) {
                                            echo "selected";
                                        }?>>
                                            <?php echo $data['nama_instansi']; ?>
                                        </option>
                                        <?php
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputJenis">Jenis Surat</label>
                        <select name="jenis_id" class="form-control" >
                                <?php 
                                    $query = "SELECT * FROM jenis";
                                    $hasil = $this->connection->query($query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        ?>
                                        <option value="<?php echo $data['jenis_id']; ?>" <?php if ($jenis==$data['jenis']) {
                                            echo "selected";
                                        }?>>
                                            <?php echo $data['jenis']; ?>
                                        </option>
                                        <?php
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputSifat">Tindak Lanjut</label>
                        <select name="tindak_lanjut" class="form-control" >
                            <option value="TIDAK PERLU TINDAK LANJUT" <?php if($tindak_lanjut=='TIDAK PERLU TINDAK LANJUT'){echo 'selected';}?>>TIDAK PERLU TINDAK LANJUT</option>
                            <option value="PERLU TINDAK LANJUT" <?php if($tindak_lanjut=='PERLU TINDAK LANJUT'){echo 'selected';}?>>PERLU TINDAK LANJUT</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputJenis">Lokasi Pengarsipan</label>
                        <select name="lokasi_id" class="form-control" >
                                <?php 
                                    $query = "SELECT * FROM lokasi";
                                    $hasil = $this->connection->query($query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        echo "<option value='".$data['lokasi_id']."'"; if ($lokasi==$data['lokasi']) {
                                            echo "selected";
                                        } echo ">".$data['lokasi']. " " .$data['keterangan']. "</option>";
                                        
                                        }
                                    
                                ?>
                        </select>
                    </div>
                </div><br>
            <div class="row">
                <div class="center">
                <button class="btn btn-info ion-checkmark-round" type="submit" name="update"> Update</button>
                <a href="index.php?file=surat_masuk" class="btn btn-danger ion-close-round"> Batal</a>
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