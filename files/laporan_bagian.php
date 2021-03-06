<?php
#- sertakan file menu_atas
include 'menu_atas.php';
include_once 'classes/instansi.php';
write_log('Buka Halaman Laporan Bagian ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Bagian','$ip','Buka Halaman Laporan Bagian ($id_user)')");
$cari 	= (anti_injection(isset($_GET['cari']))) ? anti_injection($_GET['cari']) : '';
$cari	= str_replace('\'', '', $cari);
$where	= ($cari != '') ? "WHERE bagian LIKE '%$cari%' OR keterangan LIKE '%$cari%'" : '';
$data	= 5;
$page 	= anti_injection(isset($_GET['hal'])) ? (int)anti_injection($_GET['hal']) : 1;
$mulai 	= ($page > 1) ? ($page * $data) - $data : 0;
$result = mysqli_query($con, "SELECT bagian_id, bagian, keterangan FROM bagian $where ORDER BY bagian ASC");
$total 	= mysqli_num_rows($result);
$pages 	= ceil($total/$data);
$exe 	= mysqli_query($con, "SELECT bagian_id, bagian, keterangan FROM bagian $where ORDER BY bagian ASC LIMIT $mulai, $data")or die(mysqli_error());
$no 	= $mulai + 1;
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="navbars">Bagian	<small><small><small><small>Laporan Bagian</small></small></small></small></h1>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-6">
				<form class="form-horizontal" method="get" action="index.php">
					<input type="hidden" name="file" value="laporan_bagian">
					<input type="text" name="cari" class="form-control" id="cari" placeholder="Cari data..." value="<?php echo $cari;?>">
				</form>
			</div>
			<div class="col-lg-6" align="right">
				<a href="index.php?file=excel_bagian" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden></i> Export Excel</a>
				<a href="index.php?file=pdf_bagian&cari=" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden></i> PDF</a>
				<a href="index.php?file=print_all_bagian&cari=" class="btn btn-info"><i class="fa fa-print" aria-hidden></i> Cetak</a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-12 table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col" width="75px">No</th>
							<th scope="col">Bagian</th>
							<th scope="col">Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						while ($row = mysqli_fetch_object($exe)) {
						?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $row->bagian;?></td>
							<td><?php echo $row->keterangan;?></td>
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
							<a class="page-link" href="index.php?file=laporan_bagian&cari=<?php echo $cari;?>&hal=<?php echo $i;?>"><?php echo $i;?></a>
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