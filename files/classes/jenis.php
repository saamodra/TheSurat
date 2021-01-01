<?php
class Jenis extends DbConfig{
	public function getData(){
		$result = $this->connection->query("SELECT * FROM jenis ORDER BY jenis ASC");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function add_jenis(){
		$jenis = anti_injection($_POST['jenis']);
		$keterangan = anti_injection($_POST['keterangan']);
		$execute = $this->connection->query("INSERT INTO jenis(jenis, keterangan) VALUES ('$jenis', '$keterangan')");
		if ($execute) {
			$this->pesan='<div class="alert alert-success" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Berhasil Disimpan, <a href="index.php?file=jenis">Lihat Data</a>
			</div>';
			$this->wlog('Jenis', 'INSERT INTO jenis(jenis, keterangan) VALUES ('.$jenis.','.$keterangan.')');
			write_log('INSERT INTO jenis(jenis, keterangan) VALUES ('.$jenis.','.$keterangan.')');
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
		$query = "DELETE FROM jenis WHERE jenis_id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			$this->pesan='<div class="alert alert-danger" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Gagal Dihapus, <a href=\'javascript:self.history.back();\'>Kembali</a>
			</div>';
			return false;
		} else {
			$this->wlog('Jenis', 'DELETE FROM jenis WHERE jenis_id = '.$id.'');
			write_log($query);
			header('location:index.php?file=jenis');
			return true;
		}
	}
	public function edit($id){
		$result = $this->connection->query("SELECT * FROM jenis WHERE jenis_id = '$id'");
		
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
		$jenis = $_POST['jenis'];
		$keterangan = $_POST['keterangan'];
		$execute = $this->connection->query("UPDATE jenis SET jenis = '$jenis', keterangan = '$keterangan' WHERE jenis_id='$id'");
		if ($execute) {
			$this->wlog('Jenis', 'UPDATE jenis SET jenis = '.$jenis.', keterangan = '.$keterangan.' WHERE jenis_id='.$id.'');
			write_log('UPDATE jenis SET jenis = '.$jenis.', keterangan = '.$keterangan.' WHERE jenis_id='.$id.'');
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=jenis">Lihat Data</a>
         	</div>';
			return TRUE;
		} else {
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Gagal Diupdate, <a href="index.php?file=jenis">Lihat Data</a>
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