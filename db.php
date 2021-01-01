<?php
class DbConfig
{
	private $_host = 'localhost';
	private $_username = 'root';
	private $_password = '';
	private $_database = 'db_surat2';
	private $_database2 = 'db_surat2_log';

	public $connection;
	public $connection2;

	public function __construct()
	{
		$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
		$this->connection2 = new mysqli($this->_host, $this->_username, $this->_password, $this->_database2);
	}
	public function wlog($menu, $log){
	    $ip = $_SERVER['REMOTE_ADDR'];
	    $id_user = $_SESSION['user_id'];
	    $execute = $this->connection2->query("INSERT INTO log(userid, menu, ip, log) VALUES ('$id_user','$menu','$ip','$log')");
	}
}