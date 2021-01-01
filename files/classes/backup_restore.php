<?php
class BackupRes extends DbConfig{
	public function EXPORT_TABLES(){
		$drive = 'C:/xampp/htdocs/TheSurat/backup';
		$_host = 'localhost';
		$_username = 'root';
		$_password = '';
		$_database = 'db_surat2';
		$null = null; $hitung = time();
		if (isset($_database)) {
			exec("c:/xampp/mysql/bin/mysqldump  -u $_username --password=$_password $_database -c>{$drive}/$_database"."_(".date("H-i-s")."_".date("d-m-Y").").sql 2>&1", $null, $hasil);
		}
		$this->berhasil = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Backup Data Berhasil<br>Backup <a href="backup/'.$_database.'_('.date('H-i-s').'_'.date('d-m-Y').').sql">'.$_database.'_('.date('H-i-s').'_'.date('d-m-Y').')</a> Disimpan di folder backup</div>';
	}
	public function IMPORT_TABLES($sql_file_OR_content){
		set_time_limit(3000);
		$SQL_CONTENT = (strlen($sql_file_OR_content) > 300 ?  $sql_file_OR_content : file_get_contents($sql_file_OR_content)  );  
		$allLines = explode("\n",$SQL_CONTENT); 
			$zzzzzz = $this->connection->query('SET foreign_key_checks = 0');	        preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n". $SQL_CONTENT, $target_tables); foreach ($target_tables[2] as $table){$this->connection->query('DROP TABLE IF EXISTS '.$table);}         $zzzzzz = $this->connection->query('SET foreign_key_checks = 1');    $this->connection->query("SET NAMES 'utf8'");	
		$templine = '';	// Temporary variable, used to store current query
		foreach ($allLines as $line)	{											// Loop through each line
			if (substr($line, 0, 2) != '--' && $line != '') {$templine .= $line; 	// (if it is not a comment..) Add this line to the current segment
				if (substr(trim($line), -1, 1) == ';') {		// If it has a semicolon at the end, it's the end of the query
					if(!$this->connection->query($templine)){ print('Error performing query \'<strong>' . $templine . '\': ' . $this->connection->error . '<br /><br />');  }  $templine = ''; // set variable to empty, to start picking up the lines after ";"
				}
			}
		}	return 'Importing finished. Now, Delete the import file.';
	}
	public function restore(){
		$sql_file_OR_content = $_FILES['restore']['tmp_name'];
		$tmp = explode('.', $_FILES['restore']['name']);
		$valid_ext = array('sql');
		$ext = strtolower(end($tmp));
		if(in_array($ext, $valid_ext)){
			$this->IMPORT_TABLES($sql_file_OR_content);
		    
	    	$this->pesan = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Restore Data Berhasil</div>';
		} else {
			$this->pesan='<div class="alert alert-danger" align="center">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Hanya file sql yang boleh dipilih
	         </div>';
		}
	}
}
?>