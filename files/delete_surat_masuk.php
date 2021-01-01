<?php
session_start();
include_once 'classes/surat_masuk.php';
$d = new SMasuk();
$id = $d->escape_string($_GET['id']);
$result = $d->hapus($id);
if (isset($d->pesan)) {
	echo $d->pesan;
}
?>