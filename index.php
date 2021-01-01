<?php 
#- sertakan file konfigurasi database
require_once('db.php');
function anti_injection($val){ 
    // Karakter yang sering digunakan untuk sqlInjection 
    $char = array ('/','#',';','\'','"',"'",'[',']','{','}',')','(','|','`','~','!','%','$','^','&','*','=','?','+'); 

    // Hilangkan karakter yang telah disebutkan di array $char 
    $cleanval = str_replace($char, '', trim($val)); 
    return $cleanval; 
} 
define('LOG','log/log.txt');
function write_log($log){
     $time = @date('[Y-d-m:H:i:s]');
     $op=$time.' '.$log."\n".PHP_EOL;
     $fp = @fopen(LOG, 'a');
     $write = @fwrite($fp, $op);
     @fclose($fp);
}

include 'header.php';
#- $_GET : menangkap variabel dari URL
#		   $_GET[NamaVariabel]
$file = isset($_GET['file']) ? $_GET['file'] : '';

#- str_replace : mengganti akrakter tertentu
#				 str_replace(KarakterYangAkanDiganti, KarakterPengganti, Nilai)
$file = str_replace('.', '', $file);
$file = str_replace('/', '', $file);

#- file_exists : cek apakah file yang direquest ada
#				 file_exists(NamaFile);
if (file_exists('files/' . $file . '.php')) {
	#- masukkan yang diakses
	include 'files/' . $file . '.php';
} elseif (file_exists('files/login.php')) {
	#- masukkan yang diakses
	include 'files/login.php';
} else {
	#- masukkan yang yang diakses
	echo '<h2 align="center">Halaman tidak ditemukan.</h2>';
}

#- sertakan file footer
include 'footer.php'; 
