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
        <!-- ===== SIDEBAR ===== -->


        <footer>
            ©
            <script>
                document.write(new Date().getFullYear());
            </script> Inventaris Aset . Kelompok 9
        </footer>
        </div>

    </body>

    </html>
@endsection
