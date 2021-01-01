<?php
class Lokasi extends DbConfig{
	public function getData(){
		$result = $this->connection->query("SELECT * FROM lokasi ORDER BY lokasi ASC");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function add_lokasi(){
		$lokasi = anti_injection($_POST['lokasi']);
		$keterangan = anti_injection($_POST['keterangan']);
		$execute = $this->connection->query("INSERT INTO lokasi(lokasi, keterangan) VALUES ('$lokasi', '$keterangan')");
		if ($execute) {
			$this->pesan='<div class="alert alert-success" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Berhasil Disimpan, <a href="index.php?file=lokasi">Lihat Data</a>
			</div>';
			$this->wlog('Lokasi', 'INSERT INTO lokasi(lokasi, keterangan) VALUES ('.$lokasi.','.$keterangan.')');
			write_log('INSERT INTO lokasi(lokasi, keterangan) VALUES ('.$lokasi.','.$keterangan.')');
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
		$query = "DELETE FROM lokasi WHERE lokasi_id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			$this->pesan='<div class="alert alert-danger" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Gagal Dihapus, <a href=\'javascript:self.history.back();\'>Kembali</a>
			</div>';
			return false;
		} else {
			$this->wlog('Lokasi', 'DELETE FROM lokasi WHERE lokasi_id = '.$id.'');
			write_log($query);
			header('location:index.php?file=lokasi');
			return true;
		}
	}
	public function edit($id){
		$result = $this->connection->query("SELECT * FROM lokasi WHERE lokasi_id = '$id'");
		
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
		$lokasi = $_POST['lokasi'];
		$keterangan = $_POST['keterangan'];
		$execute = $this->connection->query("UPDATE lokasi SET lokasi = '$lokasi', keterangan = '$keterangan' WHERE lokasi_id='$id'");
		if ($execute) {
			$this->wlog('Lokasi', 'UPDATE lokasi SET lokasi = '.$lokasi.', keterangan = '.$keterangan.' WHERE lokasi_id='.$id.'');
			write_log('UPDATE lokasi SET lokasi = '.$lokasi.', keterangan = '.$keterangan.' WHERE lokasi_id='.$id.'');
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=lokasi">Lihat Data</a>
         	</div>';
			return TRUE;
		} else {
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Gagal Diupdate, <a href="index.php?file=lokasi">Lihat Data</a>
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