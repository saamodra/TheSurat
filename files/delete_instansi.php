<?php
session_start();
include_once 'classes/instansi.php';
$d = new Instansi();
$id = $d->escape_string($_GET['id']);
$result = $d->hapus($id);
if (isset($d->pesan)) {
	echo $d->pesan;
}
?>