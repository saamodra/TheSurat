<?php
include 'menu_atas.php';
include_once 'classes/user.php';
$d = new MUser();
if ((isset($_POST['add']))) {
		$d->add_user();
}
?>
<div class="content-wrapper">
	<section class="content"><br>
		<div class="card"><br>
<div class="page-header" align="center">
	<h3>Input Data User</h3>
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
	                    <label for="user">Email</label>
	                    <input type="text" class="form-control" name="email">
	                </div>
	            </div>
	            <div class="row">
	                <div class="form-group col-md-12">
	                    <label for="level">Level</label>
	                    <select name="level" class="form-control" >
	                            <option value="Level" hidden="">Level</option>
	                            <?php 
									$query = "SHOW COLUMNS FROM user WHERE field='level'";
									$hasil = $d->connection->query($query);
									while ($data = mysqli_fetch_row($hasil)) {
										foreach (explode("','", substr($data[1], 6, -2)) as $option) {
											echo "<option value='$option'>$option</option>";
										}
								
									}
								?>
	                    </select>
	                </div>
	            </div>
	            <div class="row">
	                <div class="form-group col-md-12">
	                    <label for="user">Nama</label>
	                    <input type="text" class="form-control" name="nama">
	                </div>
	            </div>
	            <div class="row">
	                <div class="form-group col-md-12">
	                    <label for="Password">Password</label>
	                    <input type="password" class="form-control" name="password">
	                </div>
	            </div><br>
	            <div class="row">
	                <div class="center">
	                <button class="btn btn-info ion-checkmark-round" type="submit" name="add"> Simpan</button>
	                <a href="index.php?file=user" class="btn btn-danger ion-close-round"> Batal</a>
	                </div>
	            </div>
			</form>
		</div><br>
</div>
</div>
</section>
</div>
<?php
include 'menu_bawah.php';
?>