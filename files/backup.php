<?php
include 'menu_atas.php';
include_once 'classes/backup_restore.php';
$backup = new BackupRes();
$backup->wlog('Backup','Buka Halaman Backup');
write_log('Buka Halaman Backup ('.$id_user.')');
if(isset($_POST['backup'])){
    $backup->EXPORT_TABLES();
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Backup</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Backup</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Backup Database</h3>
        </div>
        <div class="card-body">
        <div class="row">
		</div>
			<?php
				if (isset($backup->berhasil)) {
					echo $backup->berhasil;
				}
			?>
			<div class="row" align="center">
				<div class="col-lg-12">
					<form method="post" enctype="multipart/form-data">
						<button type="submit" class="btn btn-primary" name="backup">Backup</button>
					</form>
				</div>
			</div>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<?php
include 'menu_bawah.php';
?>