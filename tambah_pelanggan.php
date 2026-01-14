<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .form-container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { color: #e74c3c; text-align: center; margin-bottom: 20px; }
        label { font-weight: bold; color: #34495e; display: block; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #e74c3c; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        button:hover { background: #c0392b; }
        .back { display: block; text-align: center; margin-top: 15px; color: #7f8c8d; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Pelanggan</h2>
        <form method="POST" action="proses_tambah_pelanggan.php">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
            
            <label>No. Telepon</label>
            <input type="text" name="telepon" placeholder="0812xxxx">
            
            <label>Alamat</label>
            <textarea name="alamat" rows="3" placeholder="Alamat Lengkap"></textarea>
            
            <button type="submit">Simpan Data</button>
            <a href="data_pelanggan.php" class="back">← Kembali</a>
        </form>
    </div>
</body>
</html>