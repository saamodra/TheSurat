<?php
include 'menu_atas.php';
include_once 'classes/jenis.php';
$d = new Jenis();
if (isset($_POST['add'])) {
	$exe = $d->add_jenis();
}
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
<div class="page-header" align="center">
	<h3>Input Data Jenis Surat</h3>
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
						<label for="exampleInputID">Jenis</label>
	            		<input type="text" class="form-control" name="jenis" placeholder="Jenis">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputPass1">Keterangan</label>
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