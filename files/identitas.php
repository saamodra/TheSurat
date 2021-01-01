<?php
include 'menu_atas.php';
include_once 'classes/identitas.php';
$data = new Identitas();
$result = $data->getData();
foreach ($result as $res) {
    $nama = $res['nama_identitas'];
	$alamat = $res['alamat'];
	$telp = $res['telp'];
	$kota = $res['kota'];
	$web = $res['website'];
	$pemilik = $res['pemilik'];
	$keuangan = $res['keuangan'];
	$logo_kiri = $res['logo_kiri'];
	$logo_kanan = $res['logo_kanan'];
}
if (isset($_POST['update'])) {
	$data->update();
}
if (isset($_POST['update_logo_kiri'])) {
	$data->logo_kiri();
}
if (isset($_POST['update_logo_kanan'])) {
	$data->logo_kanan();
}

if ($_SESSION['level']=='User') {
	echo "<script>window.location.href='index.php?file=identitas_user';</script>";
}
?>
<head>
   <style type="text/css">
            .fit {max-width: 200px; max-height: 200px; width: auto; height: auto;}
    </style>
</head>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row col-md-12">
		<fieldset class="form-group"><legend>Identitas</legend></fieldset>
	  </div>
	  <?php
	  if (isset($data->pesan)) {
	  	echo $data->pesan;
	  }
	  ?>
		<form method="post" id="printableArea" action="" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group row">
			<label class="control-label col-md-3">Nama</label>
			<div class="col-md-9" ><input type="text" class="form-control" name="nama_identitas" value="<?php echo $nama; ?>"></div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">Alamat</label>
			<div class="col-md-9" ><input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>"></div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">Telp</label>
			<div class="col-md-9" ><input type="text" class="form-control" name="telp" value="<?php echo $telp; ?>"></div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">Kota</label>
			<div class="col-md-9" ><input type="text" class="form-control" name="kota" value="<?php echo $kota; ?>"></div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">Website</label>
			<div class="col-md-9" ><input type="text" class="form-control" name="website" value="<?php echo $web; ?>"></div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">Pemilik</label>
			<div class="col-md-9" ><input type="text" class="form-control" name="pemilik" value="<?php echo $pemilik; ?>"></div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">Keuangan</label>
			<div class="col-md-9" ><input type="text" class="form-control" name="keuangan" value="<?php echo $keuangan; ?>"></div>
		</div>
		<div class="form-group row">
			<div class="col-md-4"></div>
			<button id="button" class="btn btn-info ion-checkmark-round" type="submit" name="update"><i class="fa fa-send"></i> Update</button>
		</div>
		</form>
    </div>
    <div class="col-md-6">
      <div class="form-group row col-md-12">
		<fieldset class="form-group"><legend>Logo </legend></fieldset>
	  </div>
	  <?php
	  if (isset($data->pesan2)) {
	  	echo $data->pesan2;
	  }
	  ?>
		<div class="form-group">
			<div class="row">
				<div class="form-group col-lg-6">
					<form action="" method="post" enctype="multipart/form-data">
						<div align="center"><?php echo "<img src='images/".$logo_kiri."' class='fit'>"; ?><br><br></div>
						<div align="center">
							<input type="file" name="logo_kiri" accept="image/*">
							<button class="btn btn-primary button2" type="submit" style="font-size: 14px" name="update_logo_kiri"><i class="fa fa-send" aria-hidden="true"></i> Update Logo Kiri</button>
						</div>
					</form>
				</div>
				<div class="form-group col-6">
					<form action="" method="post" enctype="multipart/form-data">
						<div align="center"><?php echo "<img src='images/".$logo_kanan."' class='fit'>"; ?><br><br></div>
						<div align="center">
							<p id="file-name2"></p>
							<input type="file" size="4" name="logo_kanan" accept="image/*">
							<button class="btn btn-primary" type="submit" style="font-size: 14px;" name="update_logo_kanan"><i class="fa fa-send" aria-hidden="true"></i> Update Logo Kanan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
  </div>
</div>
</div>
</section>
</div>
<?php
include 'menu_bawah.php';
?>