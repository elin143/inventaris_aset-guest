<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih ✨</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8cdda, #1d2b64);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }
        header {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(6px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 30px;
            color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 98%;
            position: fixed;
            top: 0;
            left: 0;
        }

        header h1 {
            font-size: 1.3rem;
            letter-spacing: 1px;
            font-family: "Belanosima", cursive;
        }

        .kategori-btn {
            background-color: #fff;
            color: #1d2b64;
            border: none;
            padding: 8px 18px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .kategori-btn:hover {
            background-color: #f8cdda;
            color: #1d2b64;
            box-shadow: 0 0 10px rgba(255,255,255,0.4);
        }

        .main-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-top: 80px; /* supaya tidak ketutupan header */
            margin-bottom: 50px; /* beri ruang untuk footer */
        }

        .thankyou-box {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            width: 350px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            margin-bottom: 15px;
            color: #1d2b64;
            font-weight: 700;
        }

        p {
            font-size: 15px;
            margin-bottom: 10px;
            color: #555;
        }

        blockquote {
            background: #f8f9fa;
            border-left: 4px solid #1d2b64;
            padding: 10px 15px;
            margin: 20px 0;
            border-radius: 8px;
            font-style: italic;
            color: #333;
        }

        strong {
            color: #1d2b64;
        }

        .btn-back {
            display: inline-block;
            background-color: #1d2b64;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 10px;
            transition: 0.3s;
            font-weight: 600;
        }

        .btn-back:hover {
            background-color: #f8cdda;
            color: #1d2b64;
        }

        footer {
            text-align: center;
            color: #fff;
            font-size: 0.9rem;
            padding: 10px;
            background: rgba(0,0,0,0.2);
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Inventaris Aset</h1>
        <a href="{{ route('kategori') }}">
            <button class="kategori-btn">Kategori</button>
        </a>
    </header>

    <div class="main-container">
        <div class="thankyou-box">
            <h2>Thankyou, {{ $nama }}! 🎉</h2>
            <p>Pertanyaanmu sudah berhasil dikirim 💌</p>

            <blockquote>
                <strong>Pertanyaanmu:</strong><br>
                {{ $pertanyaan }}
            </blockquote>

            <p>
                Kami akan segera menghubungimu melalui email:
                <strong>{{ $email }}</strong>
            </p>

            <a href="{{ url('/auth') }}" class="btn-back">Kembali ke Form</a>
        </div>
    </div>

    <footer>
        © Inventaris Aset -guest | Kelompok 9
    </footer>
</body>
</html>
