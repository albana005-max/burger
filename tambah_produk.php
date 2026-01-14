<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .form-container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); width: 100%; max-width: 450px; }
        h2 { color: #e74c3c; text-align: center; margin-bottom: 30px; }
        .input-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; }
        input[type="text"], input[type="file"], textarea { width: 100%; padding: 12px; border: 2px solid #eee; border-radius: 8px; box-sizing: border-box; transition: 0.3s; }
        input:focus { border-color: #e74c3c; outline: none; }
        button { width: 100%; padding: 15px; background: #e74c3c; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        button:hover { background: #c0392b; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #7f8c8d; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Menu Baru</h2>
        <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nama Menu</label>
                <input type="text" name="nama_produk" placeholder="Contoh: Double Cheese Burger" required>
            </div>
            <div class="input-group">
                <label>Deskripsi Singkat</label>
                <input type="text" name="deskripsi" placeholder="Rasa pedas manis dengan keju...">
            </div>
            <div class="input-group">
                <label>Harga Modal (Rp)</label>
                <input type="text" name="harga_beli" required>
            </div>
            <div class="input-group">
                <label>Harga Jual (Rp)</label>
                <input type="text" name="harga_jual" required>
            </div>
            <div class="input-group">
                <label>Foto Produk</label>
                <input type="file" name="gambar_produk" required>
            </div>
            <button type="submit">Publish Menu</button>
            <a href="index.php" class="back-link">← Kembali ke Katalog</a>
        </form>
    </div>
</body>
</html>