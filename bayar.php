<?php 
include('koneksi.php');

// Cek apakah ada ID di URL, jika tidak ada, kembalikan ke riwayat pesanan
if(!isset($_GET['id'])){
    echo "<script>window.location='pesanan_saya.php';</script>";
    exit;
}

$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <style>
        .box { max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; text-align: center; }
    </style>
</head>
<body>
    <div class="box">
        <h3>Instruksi Pembayaran</h3>
        <p>Silakan transfer ke rekening berikut:</p>
        <p><b>Bank BCA: 123-456-7890</b><br>a/n Burger Station Admin</p>
        <hr>
        <form action="proses_bayar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_transaksi" value="<?php echo $id; ?>">
            <p>Upload Foto Bukti Transfer:</p>
            <input type="file" name="bukti" required>
            <br><br>
            <button type="submit" style="background: green; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Kirim Bukti</button>
        </form>
    </div>
</body>
</html>