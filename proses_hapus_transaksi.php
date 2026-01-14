<?php
include 'koneksi.php';
$id = $_GET["id"];
$query = "DELETE FROM transaksi WHERE id_transaksi='$id' ";
$hasil_query = mysqli_query($koneksi, $query);

if($hasil_query) {
    echo "<script>alert('Transaksi dihapus.');window.location='data_transaksi.php';</script>";
} else {
    die("Gagal menghapus: ".mysqli_error($koneksi));
}
?>