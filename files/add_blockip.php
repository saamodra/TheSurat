<?php
include 'menu_atas.php';
include_once 'classes/blockip.php';
$d = new BlockIP();
if (isset($_POST['add'])) {
	$exe = $d->add_ip();
}
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
<div class="page-header" align="center">
	<h3>Input Data Block IP</h3>
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
						<label for="Block IP">Block IP</label>
	            		<input type="text" class="form-control" name="block_ip" placeholder="Block IP">
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
						<a href="index.php?file=block_ip" class="btn btn-danger ion-close-round"> Batal</a>
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