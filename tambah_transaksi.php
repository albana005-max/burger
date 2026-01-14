<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Buat Pesanan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .form-container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 450px; }
        select, input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; }
        button { width: 100%; padding: 15px; background: #2ecc71; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 style="text-align:center; color:#2ecc71;">🍕 Pesanan Baru</h2>
        <form method="POST" action="proses_tambah_transaksi.php">
            <label>Pilih Pelanggan</label>
            <select name="id_pelanggan" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php
                $p = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                while($rp = mysqli_fetch_array($p)){
                    echo "<option value='$rp[id]'>$rp[nama_pelanggan]</option>";
                }
                ?>
            </select>

            <label>Pilih Menu</label>
            <select name="id_produk" required>
                <option value="">-- Pilih Burger/Pizza --</option>
                <?php
                $pr = mysqli_query($koneksi, "SELECT * FROM produk");
                while($rpr = mysqli_fetch_array($pr)){
                    echo "<option value='$rpr[id]'>$rpr[nama_produk] (Rp ".number_format($rpr['harga_jual']).")</option>";
                }
                ?>
            </select>

            <label>Jumlah Beli</label>
            <input type="number" name="jumlah" min="1" value="1" required>

            <label>Tanggal Transaksi</label>
            <input type="date" name="tgl_transaksi" value="<?php echo date('Y-m-d'); ?>" required>

            <button type="submit">Konfirmasi Pesanan</button>
            <a href="data_transaksi.php" style="display:block; text-align:center; margin-top:15px; color:#7f8c8d; text-decoration:none;">Batal</a>
        </form>
    </div>
</body>
</html>