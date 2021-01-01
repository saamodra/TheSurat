<?php
class Identitas extends DbConfig{
	public function getData(){
		$result = $this->connection->query("SELECT * FROM identitas WHERE identitas_id = '1'");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function update(){
		$nama = anti_injection($_POST['nama_identitas']);
		$alamat = anti_injection($_POST['alamat']);
		$telp = anti_injection($_POST['telp']);
		$kota = anti_injection($_POST['kota']);
		$web = anti_injection($_POST['website']);
		$pemilik = anti_injection($_POST['pemilik']);
		$keuangan = anti_injection($_POST['keuangan']);
		$update = "UPDATE identitas SET nama_identitas = '$nama', alamat = '$alamat', telp = '$telp', kota = '$kota', website = '$web', pemilik = '$pemilik', keuangan = '$keuangan' WHERE identitas_id = '1'";
		$execute = $this->connection->query($update);
		if ($execute) {
			$this->wlog('Identitas', 'UPDATE identitas SET nama_identitas = '.$nama.', alamat = '.$alamat.', telp = '.$telp.', kota = '.$kota.', website = '.$web.', pemilik = '.$pemilik.', keuangan = '.$keuangan.' WHERE identitas_id = 1');
			write_log('UPDATE identitas SET nama_identitas = '.$nama.', alamat = '.$alamat.', telp = '.$telp.', kota = '.$kota.', website = '.$web.', pemilik = '.$pemilik.', keuangan = '.$keuangan.' WHERE identitas_id = 1');
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=identitas">Refresh</a>
         	</div>';
			return TRUE;
		} else {
			$this->pesan='<div class="alert alert-danger" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Gagal Diupdate, <a href="index.php?file=identitas">Refresh</a>
         	</div>';
			return FALSE;
		}
	}
	public function logo_kiri(){
		$logo_kiri = $_FILES['logo_kiri']['name'];
		$tmp = explode('.', $_FILES['logo_kiri']['name']);
		$valid_ext = array('jpg','jpeg','png','gif','bmp');
		$ext = strtolower(end($tmp));
		if(in_array($ext, $valid_ext)){
			move_uploaded_file($_FILES['logo_kiri']['tmp_name'], 'images/'.$logo_kiri);
			$update = "UPDATE identitas SET logo_kiri ='$logo_kiri' WHERE identitas_id = '1'";
			$execute = $this->connection->query($update);
			if ($execute) {
				$this->wlog('Identitas', 'UPDATE identitas SET logo_kiri ='.$logo_kiri.' WHERE identitas_id = 1');
				write_log('UPDATE identitas SET logo_kiri ='.$logo_kiri.' WHERE identitas_id = 1');
				$this->pesan2='<div class="alert alert-success" align="center">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Logo Kiri Berhasil Diupdate, <a href="index.php?file=identitas">Refresh</a>
	         	</div>';
				return TRUE;
			} else {
				$this->pesan2='<div class="alert alert-danger" align="center">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Logo Kiri Gagal Diupdate, <a href="index.php?file=identitas">Refresh</a>
	         	</div>';
				return FALSE;
			}
		} else {
			$this->pesan2='<div class="alert alert-danger" align="center">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Hanya gambar yang bisa diupload!
	         	</div>';
		}
	}
	public function logo_kanan(){
		$logo_kanan = $_FILES['logo_kanan']['name'];
		$tmp = explode('.', $_FILES['logo_kanan']['name']);
		$valid_ext = array('jpg','jpeg','png','gif','bmp');
		$ext = strtolower(end($tmp));
		if(in_array($ext, $valid_ext)){
			move_uploaded_file($_FILES['logo_kanan']['tmp_name'], 'images/'.$logo_kanan);
			$update = "UPDATE identitas SET logo_kanan ='$logo_kanan' WHERE identitas_id = '1'";
			$execute = $this->connection->query($update);
			if ($execute) {
				$this->wlog('Identitas', 'UPDATE identitas SET logo_kanan ='.$logo_kanan.' WHERE identitas_id = 1');
				write_log('UPDATE identitas SET logo_kanan ='.$logo_kanan.' WHERE identitas_id = 1');
				$this->pesan2='<div class="alert alert-success" align="center">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Logo Kanan Berhasil Diupdate, <a href="index.php?file=identitas">Refresh</a>
	         	</div>';
				return TRUE;
			} else {
				$this->pesan2='<div class="alert alert-danger" align="center">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Logo Kanan Gagal Diupdate, <a href="index.php?file=identitas">Refresh</a>
	         	</div>';
				return FALSE;
			}
		} else {
			$this->pesan2='<div class="alert alert-danger" align="center">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Hanya gambar yang bisa diupload!
	         	</div>';
		}
	}
}
?>