<?php
include 'menu_atas.php';
include_once 'classes/home.php';
$data = new Home();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Instansi</span>
                <span class="info-box-number">
                  <?php 
                    $data->getData("SELECT * FROM instansi");
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-newspaper-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jenis Surat</span>
                <span class="info-box-number">
                  <?php 
                    $data->getData("SELECT * FROM jenis");
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-th-large"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bagian</span>
                <span class="info-box-number">
                  <?php 
                    $data->getData("SELECT * FROM bagian");
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-map-marker"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lokasi Pengarsipan</span>
                <span class="info-box-number">
                  <?php 
                    $data->getData("SELECT * FROM lokasi");
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-6 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php 
                    $data->getData("SELECT * FROM surat_masuk");
                  ?>
                </h3>
                <p>Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="fa fa-envelope-open"></i>
              </div>
              <a href="index.php?file=laporan_surat_masuk" class="small-box-footer">
                Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php 
                    $data->getData("SELECT * FROM surat_keluar");
                  ?>
                </h3>
                <p>Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="fa fa-envelope"></i>
              </div>
              <a href="index.php?file=laporan_surat_keluar" class="small-box-footer">
                Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div></section></div>
<?php
include 'menu_bawah.php';
?>