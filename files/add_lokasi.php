<?php
include 'menu_atas.php';
include_once 'classes/lokasi.php';
$d = new Lokasi();
if (isset($_POST['add'])) {
	$exe = $d->add_lokasi();
}
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
<div class="page-header" align="center">
	<h3>Input Data Lokasi</h3>
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
						<label for="Lokasi">Lokasi</label>
	            		<input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-12">
						<label for="keterangan">Keterangan</label>
	            		<textarea class="form-control" rows="10" name="keterangan" placeholder="Keterangan"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<button class="btn btn-info ion-checkmark-round" type="submit" name="add"> Simpan</button>
						<button class="btn btn-danger ion-close-round" type="reset"> Batal</button>
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