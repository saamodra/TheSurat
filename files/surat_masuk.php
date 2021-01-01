<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
include_once 'classes/surat_masuk.php';
$d = new SMasuk();
$d->wlog('Surat Masuk','Buka Halaman Surat Masuk');
write_log('Buka Halaman Surat Masuk ('.$_SESSION['email'].')');
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="navbars">Surat Masuk	<small><small><small><small>Master Surat Masuk</small></small></small></small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12" align="right">
				<a href="index.php?file=add_srt_masuk" class="btn btn-primary"><i class="fa fa-plus" aria-hidden></i> Tambah Data</a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-12 table-responsive">				
				<table class="table table-hover" id="example1">
					<thead>
						<tr>
							<th scope="col">No.</th>
							<th scope="col">Nomor Surat</th>
							<th scope="col">Bagian Penerima</th>
							<th scope="col">Sifat</th>
							<th scope="col">Perihal</th>
							<th scope="col">Tanggal Surat</th>
							<th scope="col">Tanggal Terima</th>
							<th scope="col">Tanggal Expired</th>
							<th scope="col">Lampiran</th>
							<th scope="col">Instansi Pengirim</th>
							<th scope="col">Jenis Surat</th>
							<th scope="col">Tindak Lanjut</th>
							<th scope="col">Lokasi Pengarsipan</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data = $d->getData() as $row){
						?>
						<tr>
							<td><?php echo $no++;?></td>
							<?php echo  '<td>'.$row['nomor_surat'].'</td>
							<td>'.$row['bagian'].'</td>
							<td>'.$row['sifat'].'</td>
							<td>'.$row['perihal'].'</td>
							<td>'.$row['tanggal_surat'].'</td>
							<td>'.$row['tanggal_terima'].'</td>
							<td>'.$row['tanggal_expired'].'</td>
							<td><a href="lampiran/'.$row['lampiran'].'" target="blank">'.$row['lampiran'].'</a></td>
							<td>'.$row['nama_instansi'].'</td>
							<td>'.$row['jenis'].'</td>
							<td>'.$row['tindak_lanjut'].'</td>
							<td>'.$row['lokasi']." ".$row['keterangan'].'</td>'
							?>
							<td>
								<a href="index.php?file=update_surat_masuk&id=<?php echo $row['surat_masuk_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
								<a href="index.php?file=delete_surat_masuk&id=<?php echo $row['surat_masuk_id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
								<a href="index.php?file=print_srt_masuk&id=<?php echo $row['surat_masuk_id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Print</a>
							</td>
						</tr>
						<?php
						} #_ end while
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</section>
</div>
<?php
#- sertakan file menu_bawah
include 'menu_bawah.php'; 
?>
