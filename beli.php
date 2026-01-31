<?php 
session_start();
include('koneksi.php');

if(!isset($_SESSION['username'])){
    echo "<script>alert('Silakan Login dulu!'); window.location='login.php';</script>";
    exit;
}

$id_produk = $_GET['id'];
$username  = $_SESSION['username'];

// 1. Cari ID Pelanggan berdasarkan Username yang login
$user_query = mysqli_query($koneksi, "SELECT id_pelanggan FROM users WHERE username = '$username'");
$user_data  = mysqli_fetch_assoc($user_query);
$id_pelanggan = $user_data['id_pelanggan'];

// 2. Cari Harga Produk
$produk_query = mysqli_query($koneksi, "SELECT harga_jual FROM produk WHERE id = '$id_produk'");
$produk_data  = mysqli_fetch_assoc($produk_query);
$total_harga  = $produk_data['harga_jual'];

$tgl = date('Y-m-d');

// 3. Simpan ke tabel sesuai kolom di phpMyAdmin Anda
$insert = mysqli_query($koneksi, "INSERT INTO transaksi (id_pelanggan, id_produk, tgl_transaksi, jumlah, total_harga) 
                                  VALUES ('$id_pelanggan', '$id_produk', '$tgl', 1, '$total_harga')");

if($insert) {
    echo "<script>alert('Pesanan Berhasil Disimpan!'); window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>