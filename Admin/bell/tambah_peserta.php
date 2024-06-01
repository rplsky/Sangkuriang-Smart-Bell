<?php
	//include '../config/koneksi.php';

	$password = "ssbskr76";
	$pass = sha1($password);
	$hak_akses = "User";
	$tgl_kirim = date("Y-m-d h:i:s");

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT max(angka) as AngkaTerbesar FROM tbl_akun";
	$sql_id = $pdo->prepare($query_id);
	$sql_id->execute();
	$data = $sql_id->fetch();
	$angka = $data['AngkaTerbesar'];
	 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	//$urutan = (int) substr($kode, 3, 3);
	 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$angka++;
	 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	//$huruf = "TK-";
	//$id_kirim = $huruf . sprintf("%03s", $urutan);
	$abjad = number_to_alphabet($angka);

	//$nama_file = $id_kirim."-".$nis."-".$id_tugas_mata_pelajaran.".".$ekstensi;

		//move_uploaded_file($file_tmp, '../Assets/img/dokumen/'.$nama_file);
		$query = "INSERT INTO tbl_akun (username, angka, password, hak_akses) VALUES ('$abjad', '$angka', '$pass', '$hak_akses')";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah tersimpan\n Username : <?php echo $abjad; ?>\n Password : <?php echo $password; ?>');
				setTimeout("location.href='?page=bell&aksi=tampil_bell'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal tersimpan');
				setTimeout("location.href='?page=bell&aksi=tampil_bell'", 1000);
			</script>
			<?php
		}		
?>