<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya
					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$query = "SELECT * FROM tbl_bell";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
	$jml = $sql->rowCount();

	if ($jml == 0) {
		$aktif = "0";
		$waktu = "0";
	} else {
		$aktif = $data['username'];
		$waktu = $data['waktu'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bell</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>Bell</strong>
		</h3>
	</div>
	<div class="panel-body">
		<div align="center">
			<div class="row">
				<div class="col-md-12" >
					<h1><?php echo $aktif." -> ".$waktu; ?></h1>	
				</div>
				<div class="col-md-12" >
					<a href="?page=bell&aksi=reset_bell" onclick="return confirm('Anda yakin akan reset data ini?')">
						<img src="../Assets/dist/img/reset.png" width="150" height="100">
					</a>
				</div>
				<div class="col-md-12" >
					<div class="panel panel-default">
						<div class="panel-heading">
									<h3>
										<strong>Data Poin Peserta</strong>
									</h3>
								</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12" >
												<div class="table-responsive">
												<table id="cari" class="table table-bordered table-striped">
											<thead>
												<tr>
													<?php
														$query_peserta = "SELECT * FROM tbl_akun WHERE hak_akses = 'User'";
														$sql_peserta = $pdo->prepare($query_peserta);
														$sql_peserta->execute();
														$data_peserta = $sql_peserta->fetch();
														$jml_peserta = $sql_peserta->rowCount();
													?>
													<th colspan="<?php echo $jml_peserta; ?>"><div align="center"><a class="btn btn-danger" href="?page=bell&aksi=reset_poin" onclick="return confirm('Anda yakin akan reset data poin semua peserta?')">Reset Poin</a></div></th>
												</tr>
											</thead>
											<thead>
												<tr>
													<?php
														$query_peserta = "SELECT * FROM tbl_akun WHERE hak_akses = 'User'";
														$sql_peserta = $pdo->prepare($query_peserta);
														$sql_peserta->execute();
														$jml_peserta = $sql_peserta->rowCount();

														while ($data_peserta = $sql_peserta->fetch()) {
													?>
															<th><div align="center"><?php echo $data_peserta['username']; ?></div></th>
													<?php
														}
													?>
												</tr>
											</thead>
													<tbody>
														<tr>
															<?php
																$query_peserta = "SELECT * FROM tbl_akun WHERE hak_akses = 'User'";
																$sql_peserta = $pdo->prepare($query_peserta);
																$sql_peserta->execute();
																$jml_peserta = $sql_peserta->rowCount();

																while ($data_peserta = $sql_peserta->fetch()) {
																	$peserta = $data_peserta['username'];

																	$query_poin = "SELECT SUM(poin) AS jml_poin FROM tbl_poin WHERE username = '$peserta'";
																	$sql_poin = $pdo->prepare($query_poin);
																	$sql_poin->execute();
																	$data_poin = $sql_poin->fetch();
																	$jml_poin = $sql_poin->rowCount();

																	if ($data_poin['jml_poin']==0) {
																		?>
																		<td><div align="center">0</div></td>
																		<?php
																	} else {
																		?>
																		<td><div align="center"><?php echo $data_poin['jml_poin']; ?></div></td>
																		<?php
																	}		
																}
															?>
														</tr>
														<tr>
															<?php
																$query_peserta = "SELECT * FROM tbl_akun WHERE hak_akses = 'User'";
																$sql_peserta = $pdo->prepare($query_peserta);
																$sql_peserta->execute();
																$jml_peserta = $sql_peserta->rowCount();

																while ($data_peserta = $sql_peserta->fetch()) {
																	$peserta = $data_peserta['username'];
															?>
																	<td><div align="center"><a class="btn btn-primary" href="?page=bell&aksi=tambahpoin_peserta&peserta=<?php echo $peserta; ?>">Tambah Poin</a></div></td>
															<?php
																}
															?>
														</tr>
													</tbody>
													<?php
												//}
											?>	

											</table>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	setTimeout(function(){
   		window.location.reload(1);
	}, 5000);
</script>