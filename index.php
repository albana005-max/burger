<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Burger & Pizza Station</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Masukkan CSS dari poin 1 di sini */
        <?php include('style_umum.php'); ?> /* Jika dipisah */
        
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; margin-top: 30px; }
        .card-menu { position: relative; transition: 0.4s; }
        .card-menu:hover { transform: scale(1.03); }
        .card-menu img { width: 100%; height: 230px; object-fit: cover; transition: 0.5s; }
        .card-menu:hover img { filter: brightness(80%); }
        .badge-price { position: absolute; top: 15px; right: 15px; background: var(--primary); color: white; padding: 5px 15px; border-radius: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">🍔 MENU</a>
        <a href="data_pelanggan.php">👥 PELANGGAN</a>
        <a href="data_transaksi.php">💰 TRANSAKSI</a>
    </nav>

    <div class="container">
        <div style="text-align: center; padding: 40px 0;">
            <h1 style="color: var(--dark); font-size: 2.5em; margin-bottom: 10px;">FLAVOR STATION</h1>
            <p style="color: #636e72;">Nikmati Makanan Tepat Saji terbaik dengan kualitas premium.</p>
            <a href="tambah_produk.php" class="btn-action" style="background: var(--secondary); color: white; margin-top: 20px;">+ TAMBAH MENU BARU</a>
        </div>

        <div class="menu-grid">
            <?php
            $query = "SELECT * FROM produk ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card card-menu">
                <div class="badge-price">Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?></div>
                <img src="gambar/<?php echo $row['gambar_produk']; ?>">
                <div style="padding: 20px;">
                    <h3 style="margin: 0; color: var(--dark);"><?php echo $row['nama_produk']; ?></h3>
                    <p style="color: #b2bec3; font-size: 0.9em; height: 40px;"><?php echo $row['deskripsi']; ?></p>
                    <hr style="border: 0.5px solid #eee;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="edit_produk.php?id=<?php echo $row['id']; ?>" style="color: #0984e3; text-decoration: none; font-size: 0.8em;">✎ EDIT</a>
                        <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" style="color: var(--primary); text-decoration: none; font-size: 0.8em;" onclick="return confirm('Hapus menu?')">🗑 HAPUS</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>