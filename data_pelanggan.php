<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan - Burger Station</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        /* Memanggil file style utama */
        <?php include('style_umum.php'); ?>
        
        /* Tambahan khusus untuk tabel agar terlihat premium */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: var(--primary); color: white; padding: 15px; text-align: left; }
        td { padding: 15px; border-bottom: 1px solid #eee; }
        tr:hover { background: #fff5f5; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">🍔 MENU</a>
        <a href="data_pelanggan.php" style="background: var(--primary);">👥 PELANGGAN</a>
        <a href="data_transaksi.php">💰 TRANSAKSI</a>
    </nav>

    <div class="container">
        <div style="text-align: center; padding: 30px 0;">
            <h1 style="color: var(--dark); margin: 0;">DATABASE PELANGGAN</h1>
            <p style="color: #b2bec3;">Kelola data pelanggan setia Anda di sini.</p>
        </div>

        <a href="tambah_pelanggan.php" class="btn-action" style="background: #2ecc71; color: white; margin-bottom: 20px;">
            + TAMBAH PELANGGAN BARU
        </a>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM pelanggan ORDER BY id ASC";
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><b style="color: var(--dark);"><?php echo $row['nama_pelanggan']; ?></b></td>
                        <td><?php echo $row['telepon']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td style="text-align: center;">
                            <a href="edit_pelanggan.php?id=<?php echo $row['id']; ?>" style="color: #0984e3; text-decoration: none; font-weight: bold; margin-right: 10px;">EDIT</a>
                            <a href="proses_hapus_pelanggan.php?id=<?php echo $row['id']; ?>" style="color: var(--primary); text-decoration: none; font-weight: bold;" onclick="return confirm('Hapus data?')">HAPUS</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>