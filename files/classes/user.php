<?php
class MUser extends DbConfig{
	public function getData(){
		$result = $this->connection->query("SELECT * FROM user ORDER BY email ASC");

		if ($result == false) {
			return false;
		}

		$rows = array();

		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}

		return $rows;
	}
	public function add_user(){
		$email = anti_injection($_POST['email']);
		$level = anti_injection($_POST['level']);
		$nama = anti_injection($_POST['nama']);
		$password = md5(anti_injection($_POST['password']));
		$execute = $this->connection->query("INSERT INTO user(user_id, level, nama, password) VALUES ('$email','$level','$nama','$password')");
		if ($execute) {
			$this->pesan='<div class="alert alert-success" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Berhasil Disimpan, <a href="index.php?file=user">Lihat Data</a>
			</div>';
			$this->wlog('User', 'INSERT INTO user(user_id, level, nama, password) VALUES ('.$email.','.$level.','.$nama.','.$password.')');
			write_log('INSERT INTO user(user_id, level, nama, password) VALUES ('.$email.','.$level.','.$nama.','.$password.')');
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
		$query = "DELETE FROM user WHERE user_id = $id";

		$result = $this->connection->query($query);

		if ($result == false) {
			$this->pesan='<div class="alert alert-danger" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Gagal Dihapus, <a href=\'javascript:self.history.back();\'>Kembali</a>
			</div>';
			return false;
		} else {
			$this->wlog('User', 'DELETE FROM user WHERE user_id = '.$id.'');
			write_log($query);
			header('location:index.php?file=user');
			return true;
		}
	}
	public function edit($id){
		$result = $this->connection->query("SELECT * FROM user WHERE user_id = '$id'");

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
		$email = anti_injection($_POST['email']);
		$level = anti_injection($_POST['level']);
		$nama = anti_injection($_POST['nama']);
		$execute = $this->connection->query("UPDATE user SET user_id = '$email', level = '$level', nama = '$nama', password = '$password' WHERE user_id='$id'");
		if ($execute) {
			$this->wlog('User', 'UPDATE user SET user_id = '.$email.', level = '.$level.', nama = '.$nama.', password = '.$password.' WHERE user_id='.$id.'');
			write_log('UPDATE user SET user_id = '.$email.', level = '.$level.', nama = '.$nama.', password = '.$password.' WHERE user_id='.$id.'');
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Berhasil Diupdate, <a href="index.php?file=user">Lihat Data</a>
         	</div>';
			return TRUE;
		} else {
			$this->pesan='<div class="alert alert-success" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Data Gagal Diupdate, <a href="index.php?file=user">Lihat Data</a>
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