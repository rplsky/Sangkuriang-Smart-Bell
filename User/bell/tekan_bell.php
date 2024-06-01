<?php
	//include '../config/koneksi.php';

	$username = $_SESSION['username'];
	$id_bell = rand(1, 99999999);

	date_default_timezone_set('Asia/Jakarta');
	$waktu = date("Y-m-d H:i:s");

	// mengambil data barang dengan kode paling besar
	/*
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
	*/

	//$nama_file = $id_kirim."-".$nis."-".$id_tugas_mata_pelajaran.".".$ekstensi;

		//move_uploaded_file($file_tmp, '../Assets/img/dokumen/'.$nama_file);

		$query_id = "SELECT * FROM tbl_bell WHERE username = '$username' OR id_bel = '$id_bell'";
		$sql_id = $pdo->prepare($query_id);
		$sql_id->execute();

		$jml_bell = $sql_id->rowCount();

		if ($jml_bell == 0) {
			$query = "INSERT INTO tbl_bell (id_bel, username, waktu) VALUES ('$id_bell', '$username', '$waktu')";
			$sql = $pdo->prepare($query);
			$sql->execute();
			
			if($sql){
				?>
				<script type="text/javascript">
					alert('Data telah tersimpan');
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
		} else {
			?>
			<script type="text/javascript">
				alert('Mohon maaf bell sudah ditekan. Silahkan tunggu admin reset bell. Terimakasih');
				setTimeout("location.href='?page=bell&aksi=tampil_bell'", 1000);
			</script>
			<?php
		}		
?>