<?php
class Bagian extends DbConfig{
	public function getData(){
		$result = $this->connection->query("SELECT * FROM bagian ORDER BY bagian ASC");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function add_bagian(){
		$bagian = anti_injection($_POST['bagian']);
		$keterangan = anti_injection($_POST['keterangan']);
		$execute = $this->connection->query("INSERT INTO bagian(bagian, keterangan) VALUES ('$bagian', '$keterangan')");
		if ($execute) {
			$this->pesan='<div class="alert alert-success" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Berhasil Disimpan, <a href="index.php?file=bagian">Lihat Data</a>
			</div>';
			$this->wlog('Bagian', 'INSERT INTO bagian(bagian, keterangan) VALUES ('.$bagian.','.$keterangan.')');
			write_log('INSERT INTO bagian(bagian, keterangan) VALUES ('.$bagian.','.$keterangan.')');
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
		$query = "DELETE FROM bagian WHERE bagian_id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			$this->pesan='<div class="alert alert-danger" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Gagal Dihapus, <a href=\'javascript:self.history.back();\'>Kembali</a>
			</div>';
			return false;
		} else {
			$this->wlog('Bagian', 'DELETE FROM bagian WHERE bagian_id = '.$id.'');
			write_log($query);
			header('location:index.php?file=bagian');
			return true;
		}
	}
	public function edit($id){
		$result = $this->connection->query("SELECT * FROM bagian WHERE bagian_id = '$id'");
		
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
		$bagian = anti_injection($_POST['bagian']);
		$keterangan = anti_injection($_POST['keterangan']);
		$execute = $this->connection->query("UPDATE bagian SET bagian = '$bagian', keterangan = '$keterangan' WHERE bagian_id='$id'");
		if ($execute) {
			$this->wlog('Bagian', 'UPDATE bagian SET bagian = '.$bagian.', keterangan = '.$keterangan.' WHERE bagian_id='.$id.'');
			write_log('UPDATE bagian SET bagian = '.$bagian.', keterangan = '.$keterangan.' WHERE bagian_id='.$id.'');
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=bagian">Lihat Data</a>
         	</div>';
			return TRUE;
		} else {
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Gagal Diupdate, <a href="index.php?file=bagian">Lihat Data</a>
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