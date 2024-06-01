<?php
	//include '../config/koneksi.php';

	//$id = $_GET['id'];

		$query = "DELETE FROM tbl_bell";
		$sql = $pdo->prepare($query);
		$sql->execute();
		
		if($sql){
			?>
			<script type="text/javascript">
				alert('Data telah direset');
				setTimeout("location.href='?page=bell&aksi=tampil_bell'", 1000);
			</script>
			<?php
		}else{
			echo $query;
			?>
			<script type="text/javascript">
				alert('Data gagal direset');
				setTimeout("location.href='?page=bell&aksi=tampil_bell'", 1000);
			</script>
			<?php
		}
		
?>