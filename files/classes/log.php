<?php
class Log extends DbConfig{
	public function getData(){
		$result = $this->connection2->query("SELECT * FROM log ORDER BY waktu DESC");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function resetLog(){
		$query = "DELETE FROM log";
		
		$result = $this->connection2->query($query);
	
		if ($result == false) {
			return false;
		} else {
			$this->wlog('Log', 'DELETE FROM log');
			write_log($query);
			header('location:index.php?file=log_aktifitas');
			return true;
		}
	}
}
?>