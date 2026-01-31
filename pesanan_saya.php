<?php 
session_start();
include('koneksi.php');

$username = $_SESSION['username'];
// Ambil ID Pelanggan
$u_query = mysqli_query($koneksi, "SELECT id_pelanggan FROM users WHERE username = '$username'");
$u_data = mysqli_fetch_assoc($u_query);
$id_p = $u_data['id_pelanggan'];

// Ambil riwayat transaksi pelanggan tersebut
$query = mysqli_query($koneksi, "SELECT transaksi.*, produk.nama_produk FROM transaksi 
                                 JOIN produk ON transaksi.id_produk = produk.id 
                                 WHERE id_pelanggan = '$id_p' ORDER BY id_transaksi DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Saya</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; }
        .card { background: white; padding: 20px; border-radius: 10px; margin-bottom: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .status-pending { color: orange; font-weight: bold; }
        .status-lunas { color: green; font-weight: bold; }
        .btn-bayar { background: #d63031; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Riwayat Pesanan Anda</h2>
    <a href="index.php">⬅ Kembali ke Menu</a>
    <hr>

    <?php while($row = mysqli_fetch_assoc($query)) { ?>
        <div class="card">
            <h4><?php echo $row['nama_produk']; ?> (<?php echo $row['jumlah']; ?> pcs)</h4>
            <p>Total: <b>Rp <?php echo number_format($row['total_harga']); ?></b></p>
            <p>Status: <span class="status-<?php echo strtolower($row['status']); ?>"><?php echo $row['status']; ?></span></p>
            
            <?php if($row['status'] == 'Pending' && empty($row['bukti_bayar'])) { ?>
                <a href="bayar.php?id=<?php echo $row['id_transaksi']; ?>" class="btn-bayar">Upload Bukti Bayar</a>
            <?php } elseif(!empty($row['bukti_bayar'])) { ?>
                <p style="font-size: 12px; color: grey;">✅ Bukti sudah diunggah, menunggu verifikasi Admin.</p>
            <?php } ?>
        </div>
    <?php } ?>
</body>
</html>