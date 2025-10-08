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
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .thankyou-box {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
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

    </style>
</head>
<body>

    <div class="thankyou-box">
        <h2>Terima Kasih, {{ $nama }}! 🎉</h2>
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

</body>
</html>
