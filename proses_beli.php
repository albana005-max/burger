<?php 
session_start();
include('koneksi.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username     = $_SESSION['username'];
    $id_produk    = $_POST['id_produk'];
    $jumlah       = $_POST['jumlah'];
    $catatan      = mysqli_real_escape_string($koneksi, $_POST['catatan']); // Menangkap input catatan
    $harga_satuan = $_POST['harga_satuan'];
    $total_harga  = $jumlah * $harga_satuan;
    $tgl          = date('Y-m-d');

    // Ambil id_pelanggan
    $u_query = mysqli_query($koneksi, "SELECT id_pelanggan FROM users WHERE username = '$username'");
    $u_data  = mysqli_fetch_assoc($u_query);
    $id_pelanggan = $u_data['id_pelanggan'];

    // Simpan ke tabel transaksi (Sekarang menyertakan kolom catatan)
    $query = "INSERT INTO transaksi (id_pelanggan, id_produk, tgl_transaksi, jumlah, total_harga, catatan) 
              VALUES ('$id_pelanggan', '$id_produk', '$tgl', '$jumlah', '$total_harga', '$catatan')";
    
  if(mysqli_query($koneksi, $query)) {
    // 1. Ambil ID transaksi yang baru saja tersimpan di database
    $id_terakhir = mysqli_insert_id($koneksi); 
    
    // 2. Arahkan langsung ke bayar.php dengan membawa ID tersebut
    echo "<script>alert('Pesanan berhasil! Silakan upload bukti pembayaran.'); window.location='bayar.php?id=$id_terakhir';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
}
?>