<?php
include_once 'classes/blockip.php';
$d = new BlockIP();
$id = $d->escape_string($_GET['id']);
$result = $d->hapus($id);
if (isset($d->pesan)) {
	echo $d->pesan;
}
?>