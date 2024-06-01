<?php
	session_start();
	if (empty($_SESSION['username']) && empty($_SESSION['level'])) {
		header("location:login.php");
	}else{
		if($_SESSION['level']=='Admin'){
            ?>
            <script>window.alert('Anda masuk sebagai Admin');
            window.location='Admin/index.php?page=bell&aksi=tampil_bell'</script>
            <?php
        } else if($_SESSION['level']=='User'){
            echo "<script>window.alert('Anda masuk sebagai Peserta');
                  window.location='User/index.php?page=bell&aksi=tampil_bell'</script>";
        }
	}
?>
