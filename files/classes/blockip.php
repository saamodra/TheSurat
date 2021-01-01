<?php
class BlockIP extends DbConfig{
	public function getData(){
		$result = $this->connection->query("SELECT * FROM block_ip ORDER BY ip ASC");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function add_ip(){
		$block_ip = anti_injection($_POST['block_ip']);
		$keterangan = anti_injection($_POST['keterangan']);
		$execute = $this->connection->query("INSERT INTO block_ip(ip, keterangan) VALUES ('$block_ip', '$keterangan')");
		if ($execute) {
			$this->pesan='<div class="alert alert-success" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Berhasil Disimpan, <a href="index.php?file=block_ip">Lihat Data</a>
			</div>';
			$this->wlog('Block IP', 'INSERT INTO block_ip(ip, keterangan) VALUES ('.$block_ip.','.$keterangan.')');
			write_log('INSERT INTO block_ip(ip, keterangan) VALUES ('.$block_ip.','.$keterangan.')');
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
		$query = "DELETE FROM block_ip WHERE blockip_id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			$this->pesan='<div class="alert alert-danger" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Gagal Dihapus, <a href=\'javascript:self.history.back();\'>Kembali</a>
			</div>';
			return false;
		} else {
			$this->wlog('Block IP', 'DELETE FROM block_ip WHERE blockip_id = '.$id.'');
			write_log($query);
			header('location:index.php?file=block_ip');
			return true;
		}
	}
	public function edit($id){
		$result = $this->connection->query("SELECT * FROM block_ip WHERE blockip_id = '$id'");
		
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
		$block_ip = $_POST['block_ip'];
		$keterangan = $_POST['keterangan'];
		$execute = $this->connection->query("UPDATE block_ip SET ip = '$block_ip', keterangan = '$keterangan' WHERE blockip_id='$id'");
		if ($execute) {
			$this->wlog('Block IP', 'UPDATE block_ip SET ip = '.$block_ip.', keterangan = '.$keterangan.' WHERE blockip_id='.$id.'');
			write_log('UPDATE block_ip SET ip = '.$block_ip.', keterangan = '.$keterangan.' WHERE blockip_id='.$id.'');
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=block_ip">Lihat Data</a>
         	</div>';
			return TRUE;
		} else {
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Gagal Diupdate, <a href="index.php?file=block_ip">Lihat Data</a>
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