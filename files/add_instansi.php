<?php
include 'menu_atas.php';
include_once 'classes/instansi.php';
$d = new Instansi();
if (isset($_POST['add'])) {
	$d->add_instansi();
}
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
<div class="page-header" align="center">
	<h3>Input Data Instansi</h3>
</div>
<div class="container">
  <div class="col-md-12">
  	<?php
	if (isset($d->pesan)) {
		echo $d->pesan;
	}
	?>
	<form method="post" id="form1" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="form-group col-md-12">
				<label for="nama_instansi">Nama Instansi</label>
        		<input type="text" class="form-control" name="nama_instansi" placeholder="Nama">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="alamat">Alamat</label>
        		<input type="text" class="form-control" name="alamat" placeholder="Alamat">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="kota">Kota</label>
        		<input type="text" class="form-control" name="kota" placeholder="Kota">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="telp">Telp</label>
        		<input type="text" class="form-control" name="telp" placeholder="Telp">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="hp">HP</label>
        		<input type="text" class="form-control" name="hp" placeholder="HP">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="email">Email</label>
        		<input type="text" class="form-control" name="email" placeholder="Email">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="web">Website</label>
        		<input type="text" class="form-control" name="website" placeholder="Web">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="contact_person">Contact Person</label>
        		<input type="text" class="form-control" name="kontak_person" placeholder="Contact Person">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<button class="btn btn-info ion-checkmark-round" type="submit" name="add"> Simpan</button>
				<a href="index.php?file=instansi" class="btn btn-danger ion-close-round"> Batal</a>
			</div>
		</div>
	</form>
  </div>
</div>
</div>
</section>
</div>
<?php
include 'menu_bawah.php';
?>