<?php 
include('koneksi.php');

$id = $_POST['id_transaksi'];
$status = $_POST['status'];

// Update kolom status berdasarkan id_transaksi
$update = mysqli_query($koneksi, "UPDATE transaksi SET status = '$status' WHERE id_transaksi = '$id'");

if($update) {
    echo "<script>alert('Status transaksi berhasil diperbarui!'); window.location='data_transaksi.php';</script>";
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
?>