<?php 
session_start();
include('koneksi.php');

$id_produk = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$id_produk'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pesanan</title>
    <link rel="stylesheet" href="style_umum.php">
    <style>
        .order-container { max-width: 500px; margin: 50px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .order-img { width: 100%; border-radius: 10px; margin-bottom: 20px; }
        .btn-konfirmasi { background: #27ae60; color: white; border: none; padding: 15px; width: 100%; border-radius: 10px; font-weight: bold; cursor: pointer; }
        input[type="number"], textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
    </style>
</head>
<body>
    <div class="order-container">
        <h2 style="text-align: center; color: #d63031;">Konfirmasi Pesanan</h2>
        <img src="gambar/<?php echo $row['foto']; ?>" class="order-img">
        <h3><?php echo $row['nama_produk']; ?></h3>
        <p style="color: #27ae60; font-weight: bold;">Harga: Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></p>
        
        <form action="proses_beli.php" method="POST">
            <input type="hidden" name="id_produk" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="harga_satuan" value="<?php echo $row['harga_jual']; ?>">
            
            <label>Jumlah Pesanan:</label>
            <input type="number" name="jumlah" value="1" min="1" required>
            
            <label>Catatan (Contoh: Tidak pakai sayur):</label>
            <textarea name="catatan" rows="3" placeholder="Tambahkan catatan jika ada..."></textarea>
            
            <button type="submit" class="btn-konfirmasi">MASUKKAN KE TRANSAKSI</button>
            <a href="index.php" style="display:block; text-align:center; margin-top:15px; color: #7f8c8d; text-decoration:none;">Batal</a>
        </form>
    </div>
</body>
</html>