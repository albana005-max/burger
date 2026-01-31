<?php
include 'koneksi.php';

$nama     = $_POST['nama_pelanggan'];
$telepon  = $_POST['telepon'];
$alamat   = $_POST['alamat'];
$username = $_POST['username'];
$password = md5($_POST['password']);

// 1. Simpan ke tabel pelanggan
$query_pelanggan = "INSERT INTO pelanggan (nama_pelanggan, telepon, alamat) VALUES ('$nama', '$telepon', '$alamat')";
mysqli_query($koneksi, $query_pelanggan);

// 2. Ambil ID pelanggan yang baru saja dibuat
$id_pelanggan = mysqli_insert_id($koneksi);

// 3. Simpan ke tabel users sebagai level 'pelanggan'
$query_user = "INSERT INTO users (username, password, level, id_pelanggan) VALUES ('$username', '$password', 'pelanggan', '$id_pelanggan')";
$result = mysqli_query($koneksi, $query_user);

if($result) {
    echo "<script>alert('Pendaftaran Berhasil! Silahkan Login.'); window.location='login.php';</script>";
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($koneksi);
}
?>