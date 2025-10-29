<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Inventaris Desa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #e8f5e9, #ffffff);
            margin: 0;
            padding: 0;
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-card {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 360px;
        }
        h2 {
            text-align: center;
            color: #004d25;
            margin-bottom: 25px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            background: #004d25;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }
        button:hover {
            background: #007f3d;
        }
        .alert {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .alert-danger {
            background-color: #ffdddd;
            color: #a70000;
        }
        .alert-success {
            background-color: #ddffdd;
            color: #007a00;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="register-card">
            <h2>Register</h2>

            {{-- Pesan sukses / error --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.process') }}">
                @csrf

                <label for="name">Nama</label>
                <input type="text" name="name" placeholder="Masukkan nama" required>

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>

                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password" required>

                <button type="submit">Daftar</button>
            </form>
        </div>
    </div>

</body>
</html>
