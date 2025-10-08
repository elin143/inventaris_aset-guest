<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dulu Yaaa</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(270deg, #f8cdda, #1d2b64);
            background-size: 400% 400%;
            animation: gradientMove 8s ease infinite;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
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
        }

        .login-box {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            width: 350px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            background-color: #1d2b64;
            color: white;
            padding: 10px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        button:hover {
            background: #f8cdda;
            color: #1d2b64;
            box-shadow: 0 0 10px rgba(248,205,218,0.8);
        }

        .error {
            background: #ffdede;
            padding: 10px;
            border-radius: 10px;
            color: #a00;
            margin-bottom: 15px;
        }
        footer {
            text-align: center;
            color: #fff;
            font-size: 0.9rem;
            padding: 10px;
            background: rgba(0,0,0,0.2);
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
        <div class="login-box">
            <h2>Isi Form Dulu Yaa!!</h2>

            @if ($errors->any())
                <div class="error">
                    <ul style="list-style:none; padding:0;">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <input type="text" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                <input type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                <textarea name="pertanyaan" placeholder="Masukkan Pertanyaan..." rows="3">{{ old('pertanyaan') }}</textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </div>

    <footer>
        © Inventaris Aset -guest | Kelompok 9
    </footer>
</body>
</html>
