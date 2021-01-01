<?php
include 'menu_atas.php';
include_once 'classes/surat_masuk.php';
$d = new SMasuk();
if (isset($_POST['add'])) {
	$d->add_suratmasuk();
}
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
<div class="page-header" align="center">
	<h3>Input Data Surat Masuk</h3>
</div>
<div class="container">
<div class="col-md-12">
	<?php
	if (isset($pesan)) {
		echo $pesan;
	}
	?>
			<form method="post" id="form1" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-md-12">
						<label for="no_surat">Nomor Surat</label>
	            		<input type="text" class="form-control" name="nomor_surat" placeholder="Nomor Surat">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputBagian">Bagian Penerima</label>
	            		<select name="penerima" class="form-control">
	            			<option value="Bagian Penerima" hidden="">Bagian Penerima</option>
								<?php 
									$query = "SELECT * FROM bagian";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_array($hasil)) {
										echo "<option value='".$data['bagian_id']."'>".$data['bagian']."</option>";
									}
								?>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputSifat">Sifat</label>
	            		<select name="sifat" class="form-control">
	            			<option value="Sifat" hidden="">Sifat</option>
	            			<option value="BIASA">BIASA</option>
	            			<option value="RAHASIA">RAHASIA</option>
	            			<option value="SANGAT RAHASIA">SANGAT RAHASIA</option>
	            			<option value="KONFIDENSIAL">KONFIDENSIAL</option>
	            			<option value="LAIN-LAIN">LAIN-LAIN</option>
	            		</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputPrihal">Prihal</label>
	            		<input type="text" class="form-control" name="prihal" placeholder="Prihal">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputTglSurat">Tanggal Surat</label>
	            		<input type="date" class="form-control" name="tanggal_surat">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputTglTerima">Tanggal Terima</label>
	            		<input type="date" class="form-control" name="tanggal_terima">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputTglExpired">Tanggal Expired</label>
	            		<input type="date" class="form-control" name="tanggal_expired">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputNoAg">Nomor Agenda</label>
	            		<input type="text" class="form-control" name="nomor_agenda" placeholder="Nomor Agenda">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputLampiran">Lampiran</label>
	            		<input type="file" class="form-control" name="lampiran" placeholder="Lampiran">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputDisposisi">Disposisi</label>
	            		<input type="text" class="form-control" name="disposisi" placeholder="Disposisi">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputTembusan">Tembusan</label>
	            		<input type="text" class="form-control" name="tembusan" placeholder="Tembusan">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputJenis">Instansi Pengirim</label>
	            		<select name="ins_pengirim" class="form-control">
	            			<option value="Instansi Pengirim" hidden="">Instansi Pengirim</option>
								<?php 
									$query = "SELECT * FROM instansi";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_array($hasil)) {
										echo "<option value='".$data['instansi_id']."'>".$data['nama_instansi']."</option>";
									}
								?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputJenis">Jenis Surat</label>
	            		<select name="jenis" class="form-control">
	            			<option value="Jenis Surat" hidden="">Jenis Surat</option>
								<?php 
									$query = "SELECT * FROM jenis";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_array($hasil)) {
										echo "<option value='".$data['jenis_id']."'>".$data['jenis']."</option>";
									}
								?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputSifat">Tindak Lanjut</label>
	            		<select name="tindak_lanjut" class="form-control">
	            			<option value="Tindak Lanjut" hidden="">Tindak Lanjut</option>
	            			<option value="TIDAK PERLU TINDAK LANJUT">TIDAK PERLU TINDAK LANJUT</option>
	            			<option value="PERLU TINDAK LANJUT">PERLU TINDAK LANJUT</option>
	            		</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputJenis">Lokasi Pengarsipan</label>
	            		<select name="lokasi_pengarsipan" class="form-control">
	            				<option value="Lokasi Pengarsipan" hidden="">Lokasi Pengarsipan</option>
								<?php 
									$query = "SELECT * FROM lokasi";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_array($hasil)) {
										echo "<option value='".$data['lokasi_id']."'>".$data['lokasi']. " " .$data['keterangan']. "</option>";
									}
								?>
						</select>
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