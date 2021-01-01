<?php
include_once 'classes/lokasi.php';
$d = new Lokasi();
$id = $d->escape_string($_GET['id']);
$result = $d->hapus($id);
if (isset($d->pesan)) {
	echo $d->pesan;
}
?>