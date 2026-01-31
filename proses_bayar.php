<?php 
include('koneksi.php');

$id = $_POST['id_transaksi'];
$nama_file = $_FILES['bukti']['name'];
$source = $_FILES['bukti']['tmp_name'];
$folder = 'gambar/';

// Pindahkan file ke folder gambar
move_uploaded_file($source, $folder.$nama_file);

// Update database
$update = mysqli_query($koneksi, "UPDATE transaksi SET bukti_bayar = '$nama_file' WHERE id_transaksi = '$id'");

if($update) {
    echo "<script>alert('Terima kasih! Bukti bayar telah dikirim.'); window.location='pesanan_saya.php';</script>";
}
?>