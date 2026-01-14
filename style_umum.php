/* Warna Tema */
:root {
    --primary: #d63031;    /* Merah Burger */
    --secondary: #f39c12;  /* Oranye Pizza */
    --dark: #2d3436;
    --light: #ffffff;
    --bg: #f8f9fa;
}

/* Animasi Muncul */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

body { 
    background-color: var(--bg); 
    font-family: 'Poppins', sans-serif; 
    margin: 0; 
}

.container { 
    animation: fadeInUp 0.8s ease-out; 
    max-width: 1100px; 
    margin: auto; 
    padding: 20px; 
}

/* Navbar Baru */
nav {
    background: var(--dark);
    padding: 15px;
    display: flex;
    justify-content: center;
    gap: 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    position: sticky;
    top: 0;
    z-index: 1000;
}

nav a {
    color: white;
    text-decoration: none;
    font-weight: 600;
    padding: 8px 15px;
    border-radius: 5px;
    transition: 0.3s;
}

nav a:hover {
    background: var(--primary);
    transform: scale(1.1);
}

/* Card & Table Style */
.card, table {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: none;
}

.btn-action {
    padding: 10px 20px;
    border-radius: 50px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
    display: inline-block;
}

.btn-action:hover {
    box-shadow: 0 5px 15px rgba(214, 48, 49, 0.4);
    transform: translateY(-3px);
}