<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
?>
<?php
    if ($update_profil=$_SESSION['user_id']) {
        $update = "select * from user where user_id = '$update_profil'";
        $hasil =mysqli_query($con, $update) or die (mysqli_error());
        $baris = mysqli_fetch_array($hasil);
        $level = $baris['level'];
        $nama = $baris['nama'];
        $username = $baris['user_id'];
    }
    if (isset($_POST['update'])) {
    	$user_id = $_SESSION['user_id'];
        $nama = anti_injection($_POST['nama']);
        $update = "update user set nama = '$nama' where user_id = '$user_id'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
        mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Ubah Profil","'.$ip.'","'.$update.'")');
        write_log($update);
        $berhasil='<div class="alert alert-success" align="center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Profil Berhasil diupdate, <a href="index.php?file=ubah_profil">Refresh</a>
          </div>';
    }
    if (isset($_POST['edit_profil'])) {
    $user_id = $_SESSION['user_id'];
    $profil = $_FILES['profil']['name'];
    $tmp = explode('.', $_FILES['profil']['name']);
    $valid_ext = array('jpg','jpeg','png','gif','bmp');
    $ext = strtolower(end($tmp));
    if(in_array($ext, $valid_ext)){
        move_uploaded_file($_FILES['profil']['tmp_name'], 'images/'.$profil);
        $update = "update user set profil ='$profil' where user_id = '$user_id'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
        mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Identitas","'.$ip.'","'.$update.'")');
        write_log($update);
        echo "<script>window.location.href='index.php?file=ubah_profil';</script>";
    }else{
        ?><div class="alert alert-danger" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Hanya gambar yang boleh diupload
         </div><?php
    }   
    }
?>
<head>
    <style type="text/css">
        .fit {max-width: 200px; max-height: 200px; width: auto; height: auto;}
        .center {width: 100%; margin: 0 auto;}
    </style>
</head>
<div class="content-wrapper">
    <section class="content"><br>
        <div class="card"><br>
            <div class="card-header">
          <h1 class="card-title">Profil</h1>
        </div>
<div class="mainbody container">
    <div class="row">
        <div style="padding-top:50px;"> </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php
            if (isset($berhasil)) {
                echo $berhasil;
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group center">
                        <div align="center"><br><br><?php echo "<img src='images/".$baris['profil']."' class='fit'>"; ?></div>
                        <div align="center"><br><br>
                            <input type="file" name="profil" accept="image/*">
                            <button class="btn btn-primary button2" type="submit" style="font-size: 14px" name="edit_profil"><i class="fa fa-send" aria-hidden="true"></i> Update Profil</button>
                        </div>
                    </div>
                </div>
            </form>
        	<form method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        
                       <div class="row col-md-12">
                            <label for="Level">Level</label>
                            <select name="level" class="form-control" disabled="">
                                <option value="Administrator" <?php if($level=='Administrator'){echo 'selected';}?>>Administrator</option>
                                <option value="User" <?php if($level=='User'){echo 'selected';}?>>User</option>
                                
                            </select>
                        </div><br>
                        <div class="row col-md-12">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama; ?>">
                    	</div><br>
                    	<div class="row col-md-12 form-group">
                    		<button class="btn btn-default"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
                    		<button class="btn btn-primary" type="submit" name="update"><i class="fa fa-fw fa fa-send-o" aria-hidden="true"></i> Update Profile</button>
                    	</div>
                </div>
            </div>
        	</form>
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
