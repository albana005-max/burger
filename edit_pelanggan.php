<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = "SELECT * FROM pelanggan WHERE id='$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .form-container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { color: #3498db; text-align: center; }
        input, textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #3498db; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Pelanggan</h2>
        <form method="POST" action="proses_edit_pelanggan.php">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan']; ?>" required>
            
            <label>No. Telepon</label>
            <input type="text" name="telepon" value="<?php echo $data['telepon']; ?>">
            
            <label>Alamat</label>
            <textarea name="alamat" rows="3"><?php echo $data['alamat']; ?></textarea>
            
            <button type="submit">Update Data</button>
            <a href="data_pelanggan.php" style="display:block; text-align:center; margin-top:15px; color:#7f8c8d; text-decoration:none;">Batal</a>
        </form>
    </div>
</body>
</html>