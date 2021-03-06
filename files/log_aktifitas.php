<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
$db = new DbConfig();
$cari1 	= (anti_injection(isset($_GET['cari1']))) ? anti_injection($_GET['cari1']) : '';
$cari1	= str_replace('\'', '', $cari1);
$cari2 = (anti_injection(isset($_GET['cari2']))) ? anti_injection($_GET['cari2']) : '';
$cari2	= str_replace('\'', '', $cari2);
$where	= ($cari1 AND $cari2 != '') ? "WHERE menu LIKE '%$cari1%' AND userid LIKE '%$cari2%'" : '';
$data = 10000;
$page 	= anti_injection(isset($_GET['hal'])) ? (int)anti_injection($_GET['hal']) : 1;
$mulai 	= ($page > 1) ? ($page * $data) - $data : 0;
$result = $db->connection2->query("SELECT * FROM log $where ORDER BY waktu DESC");
$total 	= mysqli_num_rows($result);         
$exe 	= $db->connection2->query("SELECT * FROM log $where ORDER BY waktu DESC LIMIT $mulai, $data")or die(mysqli_error());
$no 	= $mulai + 1;
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
					<h1 id="navbars">Log Aktifitas<small><small><small><small> Master Log Aktifitas</small></small></small></small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<form class="form-horizontal" method="get" action="index.php">
					<input type="hidden" name="file" value="log_aktifitas">
					<table>
						<tr>
							<td>
								<select name="cari1" class="form-control" id="cari1">
			            			<option value="">Menu</option>
			            			<?php 
										$query = "SELECT * FROM log GROUP BY menu";
										$hasil = $db->connection2->query($query);
										while ($data = mysqli_fetch_array($hasil)) {
										?>
										<option value="<?php echo $data['menu']; ?>" <?php if($cari2 == $data['menu']){echo "selected";} ?>><?php echo $data['menu']; ?></option>
										<?php
										}
									?>
								</select>
							</td>
							<td>
								<select name="cari2" class="form-control" id="cari2">
			            			<option value="" >User ID</option>
										<?php 
											$query = "SELECT * FROM user";
											$hasil = $db->connection->query($query);
											while ($data = mysqli_fetch_array($hasil)) {
											?>
											<option value="<?php echo $data['user_id']; ?>" <?php if($cari2 == $data['user_id']){echo "selected";} ?>><?php echo $data['user_id']; ?></option>
											<?php
											}
										?>
								</select>
							</td>
							<td>
								<button class="btn btn-outline-success" type="submit"><i class="fa fa-refresh" aria-hidden></i> Refresh</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-lg-4" align="right">
				<a href="index.php?file=reset_log" class="btn btn-primary"><i class="fa fa-remove" aria-hidden></i> Reset Log</a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-12 table-responsive">				
				<table class="table table-hover" id="example1">
					<thead>
						<tr>
							<th scope="col" width="5%">No</th>
							<th scope="col" width="10%">User ID</th>
							<th scope="col" width="20%">Waktu</th>
							<th scope="col" width="10%">Menu</th>
							<th scope="col" width="45%">Log</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = mysqli_fetch_object($exe)) {
						?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $row->userid; ?></td>
							<td><?php echo $row->waktu;?></td>
							<td><?php echo $row->menu;?></td>
							<td><?php echo $row->log;?></td>
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