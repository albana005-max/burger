<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi - Burger Station</title>
    <style>
        <?php include('style_umum.php'); ?>
        table { width: 100%; border-radius: 15px; margin-top: 20px; border-collapse: collapse; }
        th { background: var(--primary); color: white; padding: 18px; text-transform: uppercase; letter-spacing: 1px; }
        td { padding: 15px; text-align: left; border-bottom: 1px solid #f1f1f1; }
        tr:hover { background-color: #fff9f9; transition: 0.3s; }
        .status-badge { background: #55efc4; color: #00b894; padding: 5px 10px; border-radius: 5px; font-size: 0.8em; font-weight: bold; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">🍔 MENU</a>
        <a href="data_pelanggan.php">👥 PELANGGAN</a>
        <a href="data_transaksi.php">💰 TRANSAKSI</a>
    </nav>

    <div class="container">
        <h2 style="color: var(--dark);">📜 RIWAYAT TRANSAKSI</h2>
        <a href="tambah_transaksi.php" class="btn-action" style="background: #2ecc71; color: white;">+ BUAT PESANAN</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Pesanan</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT transaksi.*, pelanggan.nama_pelanggan, produk.nama_produk 
                          FROM transaksi 
                          JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id 
                          JOIN produk ON transaksi.id_produk = produk.id 
                          ORDER BY id_transaksi DESC";
                $result = mysqli_query($koneksi, $query);
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><b><?php echo $row['nama_pelanggan']; ?></b></td>
                    <td><?php echo $row['nama_produk']; ?> <small>(x<?php echo $row['jumlah']; ?>)</small></td>
                    <td><span style="color: var(--primary); font-weight: bold;">Rp <?php echo number_format($row['total_harga'],0,',','.'); ?></span></td>
                    <td>
                         <a href="proses_hapus_transaksi.php?id=<?php echo $row['id_transaksi']; ?>" style="text-decoration:none;">❌</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>