<?php 
session_start();
include('koneksi.php');

// Proteksi: Jika belum login, lempar ke login.php
if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit;
}

$user_now = $_SESSION['username'];

// Ambil data profil (Pastikan id_pelanggan di tabel users sudah terisi)
$query = mysqli_query($koneksi, "SELECT users.*, pelanggan.* FROM users 
                                 INNER JOIN pelanggan ON users.id_pelanggan = pelanggan.id 
                                 WHERE users.username = '$user_now'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya - Burger Station</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #d63031; --secondary: #f39c12; }
        body { font-family: 'Poppins', sans-serif; background: #f8f9fa; margin: 0; padding: 0; }
        
        /* Gaya Navigasi agar tidak teks biru saja */
        <?php include('style_umum.php'); ?>

        .container { display: flex; justify-content: center; padding: 50px 20px; }
        .card { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 500px; 
            text-align: center; 
        }
        .card h1 { color: var(--primary); margin-bottom: 20px; text-transform: uppercase; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .info-group { text-align: left; margin-top: 20px; }
        .info-item { margin-bottom: 15px; border-bottom: 1px solid #f1f1f1; padding-bottom: 10px; }
        .info-item label { display: block; font-size: 12px; color: #7f8c8d; font-weight: bold; }
        .info-item span { font-size: 16px; color: #2d3436; font-weight: 600; }
        
        .btn-edit { 
            display: inline-block; 
            margin-top: 25px; 
            padding: 12px 30px; 
            background: var(--secondary); 
            color: white; 
            text-decoration: none; 
            border-radius: 10px; 
            font-weight: bold; 
            transition: 0.3s; 
        }
        .btn-edit:hover { background: var(--primary); transform: translateY(-3px); }
    </style>
</head>
<body>

    <nav>
    <a href="index.php">🍔 MENU</a>
    <?php if($_SESSION['level'] == 'admin') { ?>
        <a href="data_pelanggan.php">👥 PELANGGAN</a>
        <a href="data_transaksi.php">💰 TRANSAKSI</a>
    <?php } ?>
    <a href="profil.php" class="active">👤 PROFIL</a>
    <a href="logout.php">🚪 LOGOUT</a>
</nav>

    <div class="container">
        <div class="card">
            <h1>Profil Saya</h1>
            
            <div class="info-group">
                <div class="info-item">
                    <label>NAMA LENGKAP</label>
                    <span><?php echo $data['nama_pelanggan'] ?? 'Data tidak ditemukan'; ?></span>
                </div>
                <div class="info-item">
                    <label>NOMOR TELEPON</label>
                    <span><?php echo $data['telepon'] ?? '-'; ?></span>
                </div>
                <div class="info-item">
                    <label>ALAMAT PENGIRIMAN</label>
                    <span><?php echo $data['alamat'] ?? '-'; ?></span>
                </div>
            </div>

            <a href="edit_akun.php" class="btn-edit">✎ EDIT PROFIL</a>
        </div>
    </div>

</body>
</html>