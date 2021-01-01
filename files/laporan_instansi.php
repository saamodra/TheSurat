<?php
#- sertakan file menu_atas
include 'menu_atas.php';
include_once 'classes/instansi.php';
write_log('Buka Halaman Laporan Instansi ('.$id_user.')');
$d = new Instansi();
$d->wlog('Instansi', "insert into log(userid, menu, ip, log) values ('$id_user','Instansi','$ip','Buka Halaman Laporan Instansi ($id_user)')");
$cari 	= (anti_injection(isset($_GET['cari']))) ? anti_injection($_GET['cari']) : '';
$cari	= str_replace('\'', '', $cari);
$where	= ($cari != '') ? "WHERE nama_instansi LIKE '%$cari%' OR alamat LIKE '%$cari%' OR kota LIKE '%$cari%' OR telp LIKE '%$cari%'" : '';
$data	= 5;
$page 	= anti_injection(isset($_GET['hal'])) ? (int)anti_injection($_GET['hal']) : 1;
$mulai 	= ($page > 1) ? ($page * $data) - $data : 0;
$result = mysqli_query($con, "SELECT * FROM instansi $where ORDER BY nama_instansi ASC");
$total 	= mysqli_num_rows($result);
$pages 	= ceil($total/$data);
$exe 	= mysqli_query($con, "SELECT * FROM instansi $where ORDER BY nama_instansi ASC LIMIT $mulai, $data")or die(mysqli_error());
$no 	= $mulai + 1;
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="navbars">Instansi	<small><small><small><small>Laporan Instansi</small></small></small></small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<form class="form-horizontal" method="get" action="index.php">
					<input type="hidden" name="file" value="laporan_instansi">
					<input type="text" name="cari" class="form-control" id="cari" placeholder="Cari data..." value="<?php echo $cari;?>">
				</form>
			</div>
			<div class="col-lg-6" align="right">
				<a href="index.php?file=excel_instansi" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden></i> Export Excel</a>
				<a href="index.php?file=pdf_instansi&cari=" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden></i> PDF</a>
				<a href="index.php?file=print_all_instansi&cari=" class="btn btn-info"><i class="fa fa-print" aria-hidden></i> Cetak</a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-12 table-responsive">
				<table class="table table-hover" id="example2">
					<thead>
						<tr>
							<th scope="col" width="75px">No</th>
							<th scope="col">Nama Instansi</th>
							<th scope="col">Alamat</th>
							<th scope="col">Kota</th>
							<th scope="col">Telp</th>
							<th scope="col">HP</th>
							<th scope="col">Email</th>
							<th scope="col">Website</th>
							<th scope="col">Kontak Person</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						while ($row = mysqli_fetch_object($exe)) {
						?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $row->nama_instansi;?></td>
							<td><?php echo $row->alamat;?></td>
							<td><?php echo $row->kota;?></td>
							<td><?php echo $row->telp;?></td>
							<td><?php echo $row->hp;?></td>
							<td><?php echo $row->email;?></td>
							<td><?php echo $row->website;?></td>
							<td><?php echo $row->kontak_person;?></td>
						</tr>
						<?php
						} #_ end while
						?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-12">
				<div>
					<ul class="pagination">
						<?php
						for ($i=1; $i<=$pages ; $i++){
							if ($i == $page) {

						?>
						<li class="page-item active">
							<a class="page-link" href="#"><?php echo $i;?></a>
						</li>
							<?php
							} else {
							?>
						<li class="page-item">
							<a class="page-link" href="index.php?file=laporan_instansi&cari=<?php echo $cari;?>&hal=<?php echo $i;?>"><?php echo $i;?></a>
						</li>
						<?php
							} #_end IF
						}
						?>
					</ul>
				</div>
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
