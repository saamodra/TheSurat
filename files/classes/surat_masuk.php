<?php
class SMasuk extends DbConfig{
	public function getData(){
		$result = $this->connection->query("SELECT s.surat_masuk_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_terima, s.tanggal_expired, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, s.tindak_lanjut, l.lokasi, l.keterangan FROM surat_masuk s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id ORDER BY nomor_surat");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function add_suratmasuk(){
		$nomor_surat = anti_injection($_POST['nomor_surat']);
		$penerima = anti_injection($_POST['penerima']);
		$sifat = anti_injection($_POST['sifat']);
		$prihal = anti_injection($_POST['prihal']);
		$tanggal_surat = anti_injection($_POST['tanggal_surat']);
		$tanggal_terima = anti_injection($_POST['tanggal_terima']);
		$tanggal_expired = anti_injection($_POST['tanggal_expired']);
		$nomor_agenda = anti_injection($_POST['nomor_agenda']);
		$disposisi = anti_injection($_POST['disposisi']);
		$tembusan = anti_injection($_POST['tembusan']);
		$ins_pengirim = anti_injection($_POST['ins_pengirim']);
		$jenis = anti_injection($_POST['jenis']);
		$tindak_lanjut = anti_injection($_POST['tindak_lanjut']);
		$lokasi_pengarsipan = anti_injection($_POST['lokasi_pengarsipan']);
		$user = $_SESSION['email'];	
		$lampiran = anti_injection($_FILES['lampiran']['name']);
		$tmp = explode('.', $_FILES['lampiran']['name']);
		$valid_ext = array('xls','xlsx','csv','docx','pdf','doc','ppt','txt');
		$ext = strtolower(end($tmp));
		if(in_array($ext, $valid_ext)){
			move_uploaded_file($_FILES['lampiran']['tmp_name'] , "lampiran/".$lampiran);
			$insert = "insert into surat_masuk(nomor_surat, bagian_id, sifat, perihal, tanggal_surat, tanggal_terima, tanggal_expired, nomor_agenda, lampiran, disposisi, tembusan, instansi_id, jenis_id, tindak_lanjut, lokasi_id, user_id) values ('$nomor_surat','$penerima', '$sifat', '$prihal', '$tanggal_surat', '$tanggal_terima', '$tanggal_expired', '$nomor_agenda', '$lampiran', '$disposisi', '$tembusan', '$ins_pengirim', '$jenis', '$tindak_lanjut', '$lokasi_pengarsipan','$user')";
			$hasil= $this->connection->query($insert);
			$this->wlog('Surat Masuk', 'INSERT INTO surat_masuk(nomor_surat, bagian_id, sifat, perihal, tanggal_surat, tanggal_terima, tanggal_expired, nomor_agenda, lampiran, disposisi, tembusan, instansi_id, jenis_id, tindak_lanjut, lokasi_id, user_id) VALUES ('.$nomor_surat.','.$penerima.', '.$sifat.', '.$prihal.', '.$tanggal_surat.', '.$tanggal_terima.', '.$tanggal_expired.', '.$nomor_agenda.', '.$lampiran.', '.$disposisi.', '.$tembusan.', '.$ins_pengirim.', '.$jenis.', '.$tindak_lanjut.', '.$lokasi_pengarsipan.','.$user.')');
			write_log('INSERT INTO surat_masuk(nomor_surat, bagian_id, sifat, perihal, tanggal_surat, tanggal_terima, tanggal_expired, nomor_agenda, lampiran, disposisi, tembusan, instansi_id, jenis_id, tindak_lanjut, lokasi_id, user_id) VALUES ('.$nomor_surat.','.$penerima.', '.$sifat.', '.$prihal.', '.$tanggal_surat.', '.$tanggal_terima.', '.$tanggal_expired.', '.$nomor_agenda.', '.$lampiran.', '.$disposisi.', '.$tembusan.', '.$ins_pengirim.', '.$jenis.', '.$tindak_lanjut.', '.$lokasi_pengarsipan.','.$user.')');
			$this->pesan='<div class="alert alert-success" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Berhasil Disimpan, <a href="index.php?file=surat_masuk">Lihat Data</a>
			</div>';
		} else {
			$this->pesan='<div class="alert alert-danger" align="center">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	            Hanya dokumen yang boleh dilampirkan diupload
	         </div>';
		}	
	}
	public function hapus($id) 
	{ 
		$query = "DELETE FROM surat_masuk WHERE surat_masuk_id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			$this->pesan='<div class="alert alert-danger" align="center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Data Gagal Dihapus, <a href=\'javascript:self.history.back();\'>Kembali</a>
			</div>';
			return false;
		} else {
			$this->wlog('Surat Masuk', 'DELETE FROM surat_masuk WHERE surat_masuk_id = '.$id.'');
			write_log($query);
			header('location:index.php?file=surat_masuk');
			return true;
		}
	}
	public function edit($id){
		$result = $this->connection->query("SELECT s.surat_masuk_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_terima, s.tanggal_expired, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, s.tindak_lanjut, l.lokasi, l.keterangan FROM surat_masuk s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id WHERE surat_masuk_id = '$id'");
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	public function update($id){$nomor_surat = anti_injection($_POST['nomor_surat']);
        $bagian_id = anti_injection($_POST['bagian_id']);
        $sifat = anti_injection($_POST['sifat']);
        $prihal = anti_injection($_POST['prihal']);
        $tanggal_surat = anti_injection($_POST['tanggal_surat']);
        $tanggal_terima = anti_injection($_POST['tanggal_terima']);
        $tanggal_expired = anti_injection($_POST['tanggal_expired']);
        $nomor_agenda = anti_injection($_POST['nomor_agenda']);
        $disposisi = anti_injection($_POST['disposisi']);
        $tembusan = anti_injection($_POST['tembusan']);
        $instansi_id = anti_injection($_POST['instansi_id']);
        $jenis_id = anti_injection($_POST['jenis_id']);
        $tindak_lanjut = anti_injection($_POST['tindak_lanjut']);
        $lokasi_id = anti_injection($_POST['lokasi_id']);
        $user = $_SESSION['email'];
        $lampiran = anti_injection($_FILES['lampiran']['name']);
        $tmp = explode('.', $_FILES['lampiran']['name']);
        $valid_ext = array('xls','xlsx','csv','docx','pdf','doc','ppt','txt');
        $ext = strtolower(end($tmp));
        if ($lampiran == "") {
            $update = "update surat_masuk set nomor_surat = '$nomor_surat', bagian_id = '$bagian_id', sifat = '$sifat', perihal = '$prihal', tanggal_surat = '$tanggal_surat', tanggal_terima = '$tanggal_terima', tanggal_expired = '$tanggal_expired', nomor_agenda = '$nomor_agenda',  disposisi = '$disposisi', tembusan = '$tembusan', instansi_id = '$instansi_id', jenis_id = '$jenis_id', tindak_lanjut = '$tindak_lanjut', lokasi_id = '$lokasi_id', user_id='$user' where surat_masuk_id = '$id'";
            $hasil= $this->connection->query($update);
            $this->wlog('Surat Masuk', 'UPDATE surat_masuk SET nomor_surat = '.$nomor_surat.', bagian_id = '.$bagian_id.', sifat = '.$sifat.', perihal = '.$prihal.', tanggal_surat = '.$tanggal_surat.', tanggal_terima = '.$tanggal_terima.', tanggal_expired = '.$tanggal_expired.', nomor_agenda = '.$nomor_agenda.',  disposisi = '.$disposisi.', tembusan = '.$tembusan.', instansi_id = '.$instansi_id.', jenis_id = '.$jenis_id.', tindak_lanjut = '.$tindak_lanjut.', lokasi_id = '.$lokasi_id.', user_id='.$user.' WHERE surat_masuk_id = '.$id.'');
			write_log($query);
            $this->pesan='<div class="alert alert-success" align="center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Data Berhasil Diupdate, <a href="index.php?file=surat_masuk">Lihat Data</a>
             </div>';
        } else {
            if(in_array($ext, $valid_ext)){
                move_uploaded_file($_FILES['lampiran']['tmp_name'] , "lampiran/".$lampiran);
            	$update = "UPDATE surat_masuk SET nomor_surat = '$nomor_surat', bagian_id = '$bagian_id', sifat = '$sifat', perihal = '$prihal', tanggal_surat = '$tanggal_surat', tanggal_terima = '$tanggal_terima', tanggal_expired = '$tanggal_expired', nomor_agenda = '$nomor_agenda', lampiran = '$lampiran', disposisi = '$disposisi', tembusan = '$tembusan', instansi_id = '$instansi_id', jenis_id = '$jenis_id', tindak_lanjut = '$tindak_lanjut', lokasi_id = '$lokasi_id', user_id='$user' WHERE surat_masuk_id = '$id'";
            	$hasil= $this->connection->query($update);
            	$this->wlog('Surat Masuk', 'UPDATE surat_masuk SET nomor_surat = '.$nomor_surat.', bagian_id = '.$bagian_id.', sifat = '.$sifat.', perihal = '.$prihal.', tanggal_surat = '.$tanggal_surat.', tanggal_terima = '.$tanggal_terima.', tanggal_expired = '.$tanggal_expired.', nomor_agenda = '.$nomor_agenda.', lampiran = '.$lampiran.', disposisi = '.$disposisi.', tembusan = '.$tembusan.', instansi_id = '.$instansi_id.', jenis_id = '.$jenis_id.', tindak_lanjut = '.$tindak_lanjut.', lokasi_id = '.$lokasi_id.', user_id='.$user.' WHERE surat_masuk_id = '.$id.'');
				write_log($query);
            	$this->pesan = '<div class="alert alert-success" align="center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Data Berhasil Diupdate, <a href="index.php?file=surat_masuk">Lihat Data</a>
             </div>';
            }   else {
                $this->pesan='<div class="alert alert-danger" align="center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Hanya dokumen yang boleh dilampirkan
                 </div>';
            } 
        }
	}
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
}
?>