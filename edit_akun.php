<?php 
session_start();
include('koneksi.php');
$user_now = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT users.*, pelanggan.* FROM users 
                                 JOIN pelanggan ON users.id_pelanggan = pelanggan.id 
                                 WHERE users.username = '$user_now'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Akun</title>
    <link rel="stylesheet" href="style_umum.php">
</head>
<body>
    <div class="container" style="max-width: 500px; margin-top: 50px;">
        <div class="card" style="padding: 30px;">
            <h2 style="color: var(--primary); text-align: center;">EDIT AKUN</h2>
            <form action="proses_edit_akun.php" method="POST">
                <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>">
                
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="<?php echo $data['nama_pelanggan']; ?>" style="width:100%; padding:10px; margin:10px 0; border-radius:8px; border:1px solid #ddd;">
                
                <label>No. Telepon</label>
                <input type="text" name="telepon" value="<?php echo $data['telepon']; ?>" style="width:100%; padding:10px; margin:10px 0; border-radius:8px; border:1px solid #ddd;">
                
                <label>Alamat</label>
                <textarea name="alamat" style="width:100%; padding:10px; margin:10px 0; border-radius:8px; border:1px solid #ddd;"><?php echo $data['alamat']; ?></textarea>
                
                <button type="submit" class="btn-action" style="background: var(--secondary); color:white; width: 100%; border:none; padding:15px; cursor:pointer;">
                    SIMPAN PERUBAHAN
                </button>
                <a href="profil.php" style="display:block; text-align:center; margin-top:15px; color:#7f8c8d; text-decoration:none;">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>