<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
include_once 'classes/jenis.php';
$d = new Jenis();
$d->wlog('Jenis','Buka Halaman Jenis');
write_log('Buka Halaman Jenis ('.$id_user.')');
#cek user
if ($_SESSION['level']=='User') {
	echo "<script>
	window.location.href='index.php?file=home';
	alert('User tidak diperbolehkan mengakses halaman ini!');</script>";
}
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="navbars">Jenis	<small><small><small><small>Master Jenis Surat</small></small></small></small></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12" align="right">
			<a href="index.php?file=add_jns_surat" class="btn btn-primary"><i class="fa fa-plus" aria-hidden></i> Tambah Data</a>
			<a href="index.php?file=import_jenis&cari=" class="btn btn-success"><i class="fa fa-upload" aria-hidden></i> Import</a>
		</div>
	</div><br>
	<div class="row">
		<div class="col-lg-12 table-responsive">				
			<table class="table table-hover" id="example1">
				<thead>
					<tr>
						<th scope="col" width="75px">No</th>
						<th scope="col">Jenis</th>
						<th scope="col">Keterangan</th>
						<th scope="col" width="200px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($data = $d->getData() as $row){
					?>
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $row['jenis'];?></td>
						<td><?php echo $row['keterangan'];?></td>
						<td>
							<a href="index.php?file=update_jns_surat&id=<?php echo $row['jenis_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
							<a href="index.php?file=delete_jns_surat&id=<?php echo $row['jenis_id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
						</td>
					</tr>
					<?php
					} #_ end while
					?>
				</tbody>
			</table>
		</div>
	</div><br>
</div>
</div>
</section>
</div>
<?php
#- sertakan file menu_bawah
include 'menu_bawah.php'; 
?>
