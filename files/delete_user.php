<?php
include_once 'classes/user.php';
$d = new MUser();
$id = $d->escape_string($_GET['id']);
$result = $d->hapus($id);
if (isset($d->pesan)) {
	echo $d->pesan;
}
?>