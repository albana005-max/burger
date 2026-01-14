<?php
include 'koneksi.php';

$id_pelanggan  = $_POST['id_pelanggan'];
$id_produk     = $_POST['id_produk'];
$jumlah        = $_POST['jumlah'];
$tgl_transaksi = $_POST['tgl_transaksi'];

// 1. Ambil harga produk dari database
$query_produk = mysqli_query($koneksi, "SELECT harga_jual FROM produk WHERE id = '$id_produk'");
$data_produk  = mysqli_fetch_assoc($query_produk);
$harga_jual   = $data_produk['harga_jual'];

// 2. Hitung total harga
$total_harga = $harga_jual * $jumlah;

// 3. Simpan ke tabel transaksi
$query = "INSERT INTO transaksi (id_pelanggan, id_produk, tgl_transaksi, jumlah, total_harga) 
          VALUES ('$id_pelanggan', '$id_produk', '$tgl_transaksi', '$jumlah', '$total_harga')";
$result = mysqli_query($koneksi, $query);

if($result) {
    echo "<script>alert('Transaksi Berhasil!');window.location='data_transaksi.php';</script>";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>