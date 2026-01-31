<!DOCTYPE html>
<html>
<head>
    <title>Login - Burger Station</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f8f9fa; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        .login-box h2 { color: #d63031; margin-bottom: 30px; }
        input { width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 10px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #d63031; color: white; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        button:hover { background: #f39c12; transform: translateY(-3px); }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>FLAVOR LOGIN</h2>
        <form method="POST" action="proses_login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">MASUK SEKARANG</button>
        </form>
        

<p style="margin-top: 20px; font-size: 14px; color: #7f8c8d;">
    Belum punya akun? <a href="register.php" style="color: #d63031; text-decoration: none; font-weight: bold;">Daftar di sini</a>
</p>
    </div>
</body>
</html>