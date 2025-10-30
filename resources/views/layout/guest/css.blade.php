<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets-guest/css/themify-icons.css') }}" rel="stylesheet">

<style>
    /* ========== GLOBAL STYLE ========== */
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: #f9fafb;
        color: #333;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    /* ========== SIDEBAR ========== */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 240px;
        height: 100vh;
        background: #1e1e2d;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15);
        z-index: 100;
    }

    .sidebar .logo {
        text-align: center;
        padding: 25px 0 10px;
        border-bottom: 1px solid #2f2f40;
    }

    .sidebar .logo img {
        max-width: 25px;
    }
/* ====== LOGO STYLING ====== */
.sidebar .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 25px 0 10px;
    border-bottom: 1px solid #2f2f40;
}

.sidebar .logo i {
    font-size: 30px;
    color: #facc15; /* kuning agar kontras */
}

.sidebar .logo h2 {
    font-size: 20px;
    font-weight: 600;
    color: #fff;
    letter-spacing: 0.5px;
    margin: 0;
}

.sidebar .logo img {
    width: 45px;
    height: 45px;
    object-fit: contain;
    border-radius: 8px;
}


    .sidebar nav ul {
        list-style: none;
        padding: 20px 0;
        margin: 0;
    }

    .sidebar nav ul li {
        margin-bottom: 8px;
    }

    .sidebar nav ul li a {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #bdbdc7;
        padding: 12px 25px;
        border-radius: 8px;
        transition: all 0.3s;
        font-weight: 500;
    }

    .sidebar nav ul li a:hover {
        background: #35354a;
        color: #fff;
        transform: translateX(4px);
    }

    .sidebar nav ul li a i {
        font-size: 18px;
    }

    .sidebar .auth {
        padding: 20px;
        border-top: 1px solid #2f2f40;
    }

    .sidebar .auth a {
        display: block;
        text-align: center;
        background: linear-gradient(135deg, #5865f2, #4e54c8);
        color: #fff;
        padding: 10px 0;
        border-radius: 8px;
        margin-bottom: 10px;
        font-weight: 500;
        transition: 0.3s;
    }

    .sidebar .auth a:hover {
        background: linear-gradient(135deg, #4e54c8, #5865f2);
        transform: scale(1.03);
    }

    /* ========== MAIN CONTENT ========== */
    .main {
        margin-left: 240px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    header {
        background: #fff;
        padding: 15px 40px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        color: #1e1e2d;
    }

    header .user {
        font-weight: 500;
        color: #5865f2;
    }

    .content {
        flex: 1;
        padding: 50px 40px;
        background: #f9fafb;
    }

    .hero {
        background: #ffffff;
        border-radius: 16px;
        padding: 50px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .hero h2 {
        font-size: 28px;
        font-weight: 600;
        color: #1e1e2d;
    }

    .hero p {
        color: #555;
        margin-top: 10px;
        font-size: 16px;
    }

    /* tempat untuk gambar */
    .hero .image-placeholder {
        width: 100%;
        height: 250px;
        background: #e8e8ef;
        border-radius: 12px;
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #777;
        font-size: 14px;
    }

    footer {
        background: #fff;
        padding: 20px 40px;
        text-align: center;
        border-top: 1px solid #eee;
        color: #888;
        font-size: 14px;
    }

    .image-placeholder {
        width: 100%;
        max-height: 500px;
        /* bisa kamu ubah misalnya 400-600px */
        overflow: hidden;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .image-placeholder img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* ini yang bikin gambar proporsional dan keren */
        transition: transform 0.5s ease;
        border-radius: 16px;
    }

    .image-placeholder img:hover {
        transform: scale(1.03);
        /* efek zoom lembut saat hover */
    }
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 20px;
        right: 20px;
        background-color: #25D366;
        color: #fff;
        border-radius: 50%;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        z-index: 999;
        transition: all 0.3s ease;
    }

    .whatsapp-float:hover {
        background-color: #20ba5a;
        transform: scale(1.1);
    }

    .whatsapp-float i {
        margin-top: 16px;
    }
</style>
