<?php
session_start();
include_once 'classes/bagian.php';
$d = new Bagian();
$id = $d->escape_string($_GET['id']);
$result = $d->hapus($id);
if (isset($d->pesan)) {
	echo $d->pesan;
}
?>