<?php
  SESSION_START();
  include "koneksi.php";
  if(empty($_SESSION['username'])){
  	$_SESSION['username'] = "";
  }else{
  	$user=$_SESSION['username'];
    $level=$_SESSION['level'];

    if ($level=="Admin") {
    	$sql="select * from tbl_akun where username='$user'";
    	$query=$pdo->prepare($sql);
    	$query->execute();
    	$data=$query->fetch();
    } elseif ($level=="User") {
      $sql="select * from tbl_akun where username='$user'";
      $query=$pdo->prepare($sql);
      $query->execute();
      $data=$query->fetch();
    }
  }
?>