<?php
class Instansi extends DbConfig{
	public function getData(){
		$result = $this->connection->query("SELECT * FROM instansi ORDER BY nama_instansi ASC");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function add_instansi(){
		$nama_instansi = anti_injection($_POST['nama_instansi']);
		$alamat = anti_injection($_POST['alamat']);
		$kota = anti_injection($_POST['kota']);
		$telp = anti_injection($_POST['telp']);
		$hp = anti_injection($_POST['hp']);
		$email = anti_injection($_POST['email']);
		$website = anti_injection($_POST['website']);
		$kontak_person = anti_injection($_POST['kontak_person']);
		$execute = $this->connection->query("INSERT INTO instansi(nama_instansi, alamat, kota, telp, hp, email, website, kontak_person) VALUES ('$nama_instansi', '$alamat', '$kota', '$telp', '$hp', '$email', '$website', '$kontak_person')");
		if ($execute) {
			$this->pesan='<div class="alert alert-success" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Berhasil Disimpan, <a href="index.php?file=instansi">Lihat Data</a>
			</div>';
			$this->wlog('Instansi', 'INSERT INTO instansi(nama_instansi, alamat, kota, telp, hp, email, website, kontak_person) VALUES ('.$nama_instansi.', '.$alamat.', '.$kota.', '.$telp.', '.$hp.', '.$email.', '.$website.', '.$kontak_person.')');
			write_log('INSERT INTO instansi(nama_instansi, alamat, kota, telp, hp, email, website, kontak_person) VALUES ('.$nama_instansi.', '.$alamat.', '.$kota.', '.$telp.', '.$hp.', '.$email.', '.$website.', '.$kontak_person.')');
			return TRUE;
		} else {
			$this->pesan='<div class="alert alert-danger" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Gagal Disimpan
			</div>';
			return FALSE;
		}
	}
	public function hapus($id) 
	{ 
		$query = "DELETE FROM instansi WHERE instansi_id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			$this->pesan='<div class="alert alert-danger" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Gagal Dihapus, <a href=\'javascript:self.history.back();\'>Kembali</a>
			</div>';
			return false;
		} else {
			$this->wlog('Instansi', 'DELETE FROM instansi WHERE instansi_id = '.$id.'');
			write_log($query);
			header('location:index.php?file=instansi');
			return true;
		}
	}
	public function edit($id){
		$result = $this->connection->query("SELECT * FROM instansi WHERE instansi_id = '$id'");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function update($id){
		$nama_instansi = anti_injection($_POST['nama_instansi']);
		$alamat = anti_injection($_POST['alamat']);
		$kota = anti_injection($_POST['kota']);
		$telp = anti_injection($_POST['telp']);
		$hp = anti_injection($_POST['hp']);
		$email = anti_injection($_POST['email']);
		$website = anti_injection($_POST['website']);
		$kontak_person = anti_injection($_POST['kontak_person']);
		$execute = $this->connection->query("UPDATE instansi SET nama_instansi = '$nama_instansi', alamat = '$alamat', kota = '$kota', telp = '$telp', email = '$email', website = '$website', kontak_person = '$kontak_person' WHERE instansi_id = '$id'");
		if ($execute) {
			$this->wlog('Instansi', 'UPDATE instansi SET nama_instansi = '.$nama_instansi.', alamat = '.$alamat.', kota = '.$kota.', telp = '.$telp.', email = '.$email.', website = '.$website.', kontak_person = '.$kontak_person.' WHERE instansi_id = '.$id.'');
			write_log('UPDATE instansi SET nama_instansi = '.$nama_instansi.', alamat = '.$alamat.', kota = '.$kota.', telp = '.$telp.', email = '.$email.', website = '.$website.', kontak_person = '.$kontak_person.' WHERE instansi_id = '.$id.'');
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=instansi">Lihat Data</a>
         	</div>';
			return TRUE;
		} else {
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Gagal Diupdate, <a href="index.php?file=instansi">Lihat Data</a>
         	</div>';
			return FALSE;
		}
	}
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
}
?>