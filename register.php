<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun - Burger Station</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f8f9fa; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; /* Memberikan ruang scroll jika layar kecil */
            margin: 0; 
            padding: 20px;
        }
        .register-box { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 400px; 
            text-align: center;
        }
        .register-box h2 { color: #d63031; margin-bottom: 25px; text-transform: uppercase; }
        input, textarea { 
            width: 100%; 
            padding: 12px; 
            margin-bottom: 15px; 
            border: 1px solid #ddd; 
            border-radius: 10px; 
            box-sizing: border-box; /* Mencegah input melebar keluar kotak */
        }
        button { 
            width: 100%; 
            padding: 14px; 
            background: #d63031; /* Warna merah sesuai tema Login Anda */
            color: white; 
            border: none; 
            border-radius: 10px; 
            font-weight: bold; 
            cursor: pointer; 
            transition: 0.3s;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover { background: #f39c12; transform: translateY(-2px); }
        .footer-text { margin-top: 20px; font-size: 14px; color: #7f8c8d; }
        .footer-text a { color: #d63031; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Daftar Akun</h2>
        <form method="POST" action="proses_register.php">
            <input type="text" name="nama_pelanggan" placeholder="Nama Lengkap" required>
            <input type="text" name="telepon" placeholder="No. Telepon" required>
            <textarea name="alamat" placeholder="Alamat Lengkap" rows="3" required></textarea>
            
            <div style="border-top: 1px solid #eee; margin: 15px 0; padding-top: 15px;">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit">DAFTAR SEKARANG</button>
        </form>
        
        <div class="footer-text">
            Sudah punya akun? <a href="login.php">Login</a>
        </div>
    </div>
</body>
</html>