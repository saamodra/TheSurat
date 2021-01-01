<?php
include 'menu_atas.php';
include_once 'classes/identitas.php';
$data = new Identitas();
$result = $data->getData();
foreach ($result as $res) {
    $nama_identitas = $res['nama_identitas'];
	$alamat = $res['alamat'];
	$telp = $res['telp'];
	$kota = $res['kota'];
	$website = $res['website'];
	$pemilik = $res['pemilik'];
	$keuangan = $res['keuangan'];
	$logo_kiri = $res['logo_kiri'];
	$logo_kanan = $res['logo_kanan'];
}
?>
<head>
    <style type="text/css">
            .fit {
			max-width: 200px;
			max-height: 200px;
			width: auto;
			height: auto;
		}
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
			<form method="post" id="printableArea" action="" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="control-label col-md-3">Nama</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="nama_identitas" value="<?php echo $nama_identitas; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Alamat</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Telp</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="telp" value="<?php echo $telp; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Kota</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="kota" value="<?php echo $kota; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Website</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="website" value="<?php echo $website; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Pemilik</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="pemilik" value="<?php echo $pemilik; ?>" disabled></div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-3">Keuangan</label>
				<div class="col-md-9" ><input type="text" class="form-control" name="keuangan" value="<?php echo $keuangan; ?>" disabled></div>
			</div>
			</form>
    </div>
    <div class="col-md-6">
      <div class="form-group row col-md-12">
				<fieldset class="form-group"><legend>Logo </legend></fieldset>
			</div>
			<div class="form-group">
					<div class="row">
					<div class="form-group col-lg-6">
						<form action="" method="post" enctype="multipart/form-data">
							<div align="center"><?php echo "<img src='images/".$logo_kiri."' class='fit'>"; ?><br><br></div>
						</form>
					</div>
					<div class="form-group col-6">
						<form action="" method="post" enctype="multipart/form-data">
							<div align="center"><?php echo "<img src='images/".$logo_kanan."' class='fit'>"; ?><br><br></div>
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