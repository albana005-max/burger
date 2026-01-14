<?php
include 'koneksi.php';

$id      = $_POST['id'];
$nama    = $_POST['nama_pelanggan'];
$telepon = $_POST['telepon'];
$alamat  = $_POST['alamat'];

$query = "UPDATE pelanggan SET nama_pelanggan = '$nama', telepon = '$telepon', alamat = '$alamat' WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if(!$result) {
    die ("Query gagal: ".mysqli_error($koneksi));
} else {
    echo "<script>alert('Data pelanggan berhasil diupdate.');window.location='data_pelanggan.php';</script>";
}
?>