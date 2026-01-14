<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $nama_db = "db_burger"; // Nama database diubah jadi 'db_burger'
  $koneksi = mysqli_connect($host, $user, $pass, $nama_db); 

  if(!$koneksi){ 
    die ("Koneksi dengan database gagal: ".mysqli_connect_error());
  }
?>