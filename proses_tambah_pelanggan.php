<?php
include 'koneksi.php';

$nama    = $_POST['nama_pelanggan'];
$telepon = $_POST['telepon'];
$alamat  = $_POST['alamat'];

$query = "INSERT INTO pelanggan (nama_pelanggan, telepon, alamat) VALUES ('$nama', '$telepon', '$alamat')";
$result = mysqli_query($koneksi, $query);

if(!$result) {
    die ("Query gagal: ".mysqli_error($koneksi));
} else {
    echo "<script>alert('Pelanggan berhasil ditambahkan!');window.location='data_pelanggan.php';</script>";
}
?>