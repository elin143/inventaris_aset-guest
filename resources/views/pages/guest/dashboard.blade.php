@extends('layout.guest.app')
@section('content')
    <!doctype html>
    <html lang="id">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Inventaris Aset</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- ===== FONT & ICON ===== -->

    </head>

    <body>


        <!-- ===== MAIN CONTENT ===== -->
        <div class="main">
        <div class="logo">
            <i class="fa-brands fa-font-awesome"></i>
            <header>
                <h1>Inventaris Aset</h1>
                <div class="user">Welcome, Guest</div>
            </header>

            <div class="content">
                <div class="hero">
                    <h2>Selamat Datang di Sistem Inventaris Aset</h2>
                    <p>Kelola dan pantau aset Anda dengan mudah dan efisien.</p>


                    <div class="image-placeholder">
                        <img src="{{ asset('/assets-guest/img/hero/hero3.jpg') }}" alt="Hero Image">
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- ===== SIDEBAR ===== -->

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/62895329322457?text=Halo%20Admin%20Desa%2C%20saya%20ingin%20bertanya%20tentang%20aset%20desa."
   class="whatsapp-float" target="_blank">
   <i class="bi bi-whatsapp"></i>
</a>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <footer>
            ©
            <script>
                document.write(new Date().getFullYear());
            </script> Inventaris Aset . Kelompok 9(elin)
        </footer>
        </div>

    </body>

    </html>
@endsection
