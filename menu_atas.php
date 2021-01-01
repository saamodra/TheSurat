<?php
session_start();
include_once 'files/classes/login.php';
$user = new User();
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='index.php';</script>"; // jika belum login, maka dikembalikan ke file form_login.php
  }
if ($id_user=$_SESSION['user_id']) {
    $result = $user->getProfil($id_user);
    foreach ($result as $profil) {
    }
}
?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?file=home" class="nav-link">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        IP Address : <?php echo $_SERVER['REMOTE_ADDR']; ?>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><?php echo $profil['nama']; ?>[<?php echo $_SESSION['level']; ?>]<span class="caret"></span></a>
        <div class="dropdown-menu" aria-labelledby="user">
          <a class="dropdown-item" href="index.php?file=ubah_profil">Ubah Profil</a>
          <a class="dropdown-item" href="index.php?file=ubah_password">Ubah Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?file=logout">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/email.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">The Surat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo 'images/'.$profil['profil']; ?>" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $profil['nama']; ?></a>
        </div>
        <div class="dropdown-menu" aria-labelledby="user">
          <a class="dropdown-item" href="index.php?file=ubah_profil">Ubah Profil</a>
          <a class="dropdown-item" href="index.php?file=ubah_password">Ubah Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?file=logout">Logout</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php?file=home" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Database
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?file=backup" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Backup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=restore" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Restore</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Utilitas
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?file=identitas" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Identitas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=user" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                Master
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?file=instansi" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Instansi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=jenis" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Jenis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=bagian" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=lokasi" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Lokasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=block_ip" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Block IP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=log_aktifitas" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Log Aktifitas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-exchange"></i>
              <p>
                Transaksi
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="index.php?file=surat_masuk" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=surat_keluar" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-area-chart"></i>
              <p>
                Laporan
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?file=laporan_instansi" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Instansi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=laporan_jenis" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Jenis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=laporan_bagian" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=laporan_lokasi" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Lokasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=laporan_block_ip" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Block IP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=laporan_surat_masuk" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?file=laporan_surat_keluar" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>