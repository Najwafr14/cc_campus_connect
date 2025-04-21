<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --primary-dark: #0a58ca;
            --secondary-color: #6c757d;
            --dark-color: #212529;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Navbar */
        .navbar {
            transition: all 0.3s;
            padding: 15px 0;
            background-color: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand img {
            height: 36px;
        }
        
        .navbar .nav-link {
            font-weight: 500;
            color: var(--dark-color);
            padding: 0.5rem 1rem;
            transition: all 0.3s;
        }
        
        .navbar .nav-link:hover, 
        .navbar .nav-link.active {
            color: var(--primary-color);
        }
        
        .navbar .navbar-toggler {
            border: none;
            padding: 0.25rem 0.75rem;
        }
        
        .navbar .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .navbar .btn {
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 500;
        }
        
        /* Hero Section */
        #hero {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            padding: 120px 0 80px;
            color: white;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }
        
        #hero h1 {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        #hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn-get-started {
            color: white;
            border: 2px solid white;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .btn-get-started:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-watch-video {
            color: white;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
            margin-left: 1.5rem;
            text-decoration: none;
            font-weight: 500;
        }
        
        .btn-watch-video i {
            line-height: 0;
            color: white;
            font-size: 2rem;
            margin-right: 0.5rem;
            transition: all 0.3s;
        }
        
        .btn-watch-video:hover {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .btn-watch-video:hover i {
            color: rgba(255, 255, 255, 0.8);
        }
        
        /* Sections */
        section {
            padding: 60px 0;
            overflow: hidden;
        }
        
        .section-title {
            text-align: center;
            padding-bottom: 30px;
        }
        
        .section-title h2 {
            font-size: 32px;
            font-weight: bold;
            position: relative;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            display: block;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            bottom: 0;
            left: calc(50% - 25px);
        }
        
        /* Cards */
        .card {
            border-radius: 0.75rem;
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            height: 100%;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Service Icons */
        .service-icon {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        /* FAQ */
        .faq .accordion-button:not(.collapsed) {
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--primary-color);
            box-shadow: none;
        }
        
        .faq .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(13, 110, 253, 0.25);
        }
        
        /* Blog */
        .blog-item {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
            overflow: hidden;
        }
        
        .blog-item .blog-img {
            overflow: hidden;
        }
        
        .blog-item .blog-img img {
            transition: 0.5s;
        }
        
        .blog-item:hover .blog-img img {
            transform: scale(1.1);
        }
        
        .blog-item .blog-info {
            padding: 25px 15px;
        }
        
        .blog-item .blog-info h4 {
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .blog-item .blog-info .blog-meta {
            margin-bottom: 15px;
            color: #777777;
        }
        
        /* Contact */
        .contact .info {
            padding: 30px;
            background: white;
            box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
        }
        
        .contact .info i {
            font-size: 20px;
            color: var(--primary-color);
            float: left;
            width: 44px;
            height: 44px;
            background: #e7f5fb;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
            margin-right: 15px;
        }
        
        .contact .info h4 {
            padding: 0;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .contact .info p {
            padding: 0;
            margin-bottom: 0;
            font-size: 14px;
            color: #6c757d;
        }
        
        .contact .php-email-form {
            padding: 30px;
            background: white;
            box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
        }
        
        /* Footer */
        #footer {
            background: #37517e;
            color: white;
            font-size: 14px;
            padding: 50px 0 0 0;
        }
        
        #footer .footer-top {
            padding: 60px 0 30px 0;
        }
        
        #footer .footer-top h4 {
            font-size: 16px;
            font-weight: bold;
            position: relative;
            padding-bottom: 12px;
        }
        
        #footer .footer-top .footer-links {
            margin-bottom: 30px;
        }
        
        #footer .footer-top .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        #footer .footer-top .footer-links ul i {
            padding-right: 5px;
            color: #47b2e4;
            font-size: 18px;
            line-height: 1;
        }
        
        #footer .footer-top .footer-links ul li {
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        
        #footer .footer-top .footer-links ul li:first-child {
            padding-top: 0;
        }
        
        #footer .footer-top .footer-links ul a {
            color: #fff;
            transition: 0.3s;
            display: inline-block;
            line-height: 1;
            text-decoration: none;
        }
        
        #footer .footer-top .footer-links ul a:hover {
            text-decoration: underline;
            color: #47b2e4;
        }
        
        #footer .footer-top .social-links a {
            font-size: 18px;
            display: inline-block;
            background: #47b2e4;
            color: #fff;
            line-height: 1;
            padding: 8px 0;
            margin-right: 4px;
            border-radius: 50%;
            text-align: center;
            width: 36px;
            height: 36px;
            transition: 0.3s;
        }
        
        #footer .footer-top .social-links a:hover {
            background: #209dd8;
            color: #fff;
            text-decoration: none;
        }
        
        #footer .footer-bottom {
            padding-top: 30px;
            padding-bottom: 30px;
            background: #2e4361;
        }
        
        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            visibility: hidden;
            opacity: 0;
            right: 15px;
            bottom: 15px;
            z-index: 996;
            background: var(--primary-color);
            width: 40px;
            height: 40px;
            border-radius: 4px;
            transition: all 0.4s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .back-to-top i {
            font-size: 24px;
            color: #fff;
            line-height: 0;
        }
        
        .back-to-top:hover {
            background: var(--primary-dark);
            color: #fff;
        }
        
        .back-to-top.active {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
    <!-- Back to top button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Header -->
    <header id="header" class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/120x36?text=Logo'">
                </a>
                
                <!-- Hamburger Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Navigation Links -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#process">Process</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                    
                    <!-- Auth Links -->
                    <div class="d-flex">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary shadow-sm">
                                    <i class="bi bi-speedometer2 me-1"></i> Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 shadow-sm">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                                </a>
                                
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary shadow-sm">
                                        <i class="bi bi-person-plus me-1"></i> Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="display-4 fw-bold mb-4">Better Solutions For Your Business</h1>
                    <p class="lead mb-4">We are team of talented designers making websites with Bootstrap</p>
                    <div class="d-flex">
                        <a href="{{ route('register') }}" class="btn-get-started">
                            <i class="bi bi-person-plus me-2"></i> Get Started
                        </a>
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="btn-watch-video">
                            <i class="bi bi-play-circle"></i>
                            <span>Watch Video</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('images/hero-img.png') }}" class="img-fluid" alt="Hero Image" onerror="this.src='https://via.placeholder.com/600x400?text=Hero+Image'">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Tentang Sistem</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                    <p class="lead">
                        Sistem ini dirancang untuk memudahkan mahasiswa dalam melakukan pengajuan surat keterangan secara online. Prosesnya cepat, transparan, dan dapat dipantau setiap saat.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            <span>Pengajuan dapat dilakukan tanpa harus datang langsung ke kantor Tata Usaha.</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            <span>Status surat dapat dipantau secara real-time melalui akun masing-masing.</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            <span>Proses verifikasi dilakukan oleh Kaprodi sebelum diteruskan ke Tata Usaha.</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <p>
                        Sistem ini mendukung efisiensi dan akurasi dalam administrasi akademik. Dengan layanan ini, mahasiswa tidak lagi perlu menunggu lama untuk proses surat menyurat yang penting bagi studi atau aktivitas luar kampus.
                    </p>
                    <a href="#services" class="btn btn-primary mt-3">Pelajari Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Layanan Pengajuan Surat</h2>
                <p>Kami menyediakan layanan pengajuan surat untuk kebutuhan administrasi akademik mahasiswa. Semua proses dilakukan secara digital untuk kemudahan dan efisiensi.</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card h-100 p-4 text-center">
                        <div class="service-icon mx-auto">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h4 class="mb-3">Surat Keterangan Mahasiswa Aktif</h4>
                        <p>Digunakan untuk keperluan beasiswa, magang, atau pendaftaran lomba. Menyatakan bahwa mahasiswa masih aktif kuliah.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card h-100 p-4 text-center">
                        <div class="service-icon mx-auto">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <h4 class="mb-3">Surat Pengantar Tugas Kuliah</h4>
                        <p>Surat resmi dari kampus untuk kegiatan observasi, wawancara, atau pengumpulan data sebagai bagian dari tugas kuliah.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card h-100 p-4 text-center">
                        <div class="service-icon mx-auto">
                            <i class="bi bi-file-earmark-ruled"></i>
                        </div>
                        <h4 class="mb-3">Surat Keterangan Lulus</h4>
                        <p>Menyatakan bahwa mahasiswa telah menyelesaikan seluruh proses akademik dan dinyatakan lulus sebelum terbitnya ijazah resmi.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="card h-100 p-4 text-center">
                        <div class="service-icon mx-auto">
                            <i class="bi bi-file-earmark-spreadsheet"></i>
                        </div>
                        <h4 class="mb-3">Surat Laporan Hasil Studi</h4>
                        <p>Rekap nilai mahasiswa selama satu atau beberapa semester, biasanya digunakan untuk pengajuan beasiswa atau pertukaran pelajar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Work Process Section -->
    <section id="process" class="process bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Proses Pengajuan</h2>
                <p>Berikut adalah langkah-langkah pengajuan surat melalui sistem kami</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <h4 class="mb-0">1</h4>
                            </div>
                            <h4 class="mb-0">Registrasi</h4>
                        </div>
                        <p>Daftar dan buat akun di sistem kami menggunakan email kampus Anda. Verifikasi akun melalui email yang dikirimkan.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <h4 class="mb-0">2</h4>
                            </div>
                            <h4 class="mb-0">Pengajuan</h4>
                        </div>
                        <p>Pilih jenis surat yang dibutuhkan dan isi formulir pengajuan dengan data yang lengkap dan benar.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <h4 class="mb-0">3</h4>
                            </div>
                            <h4 class="mb-0">Verifikasi</h4>
                        </div>
                        <p>Kaprodi akan memverifikasi pengajuan Anda. Jika disetujui, pengajuan akan diteruskan ke Tata Usaha.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <h4 class="mb-0">4</h4>
                            </div>
                            <h4 class="mb-0">Pemrosesan</h4>
                        </div>
                        <p>Tata Usaha akan memproses surat yang telah disetujui oleh Kaprodi, termasuk penandatanganan oleh pejabat berwenang.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="card h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <h4 class="mb-0">5</h4>
                            </div>
                            <h4 class="mb-0">Notifikasi</h4>
                        </div>
                        <p>Anda akan menerima notifikasi melalui email dan dashboard ketika surat telah selesai diproses.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="card h-100 p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <h4 class="mb-0">6</h4>
                            </div>
                            <h4 class="mb-0">Pengambilan</h4>
                        </div>
                        <p>Unduh surat digital atau ambil surat fisik di kantor Tata Usaha sesuai dengan informasi yang diberikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Pertanyaan yang Sering Diajukan</h2>
                <p>Berikut ini adalah beberapa pertanyaan umum terkait proses pengajuan surat oleh mahasiswa.</p>
            </div>

            <div class="accordion" id="faqAccordion" data-aos="fade-up" data-aos-delay="100">
                <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="bi bi-question-circle-fill me-2 text-primary"></i>
                            Berapa lama waktu yang dibutuhkan untuk memproses surat?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Proses surat biasanya memakan waktu 2-3 hari kerja setelah pengajuan, tergantung persetujuan dari Kaprodi dan Tata Usaha.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="bi bi-question-circle-fill me-2 text-primary"></i>
                            Apakah saya bisa mengajukan surat di luar jam kerja kampus?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, pengajuan surat dapat dilakukan kapan saja secara online. Namun, proses persetujuan hanya dilakukan pada hari dan jam kerja.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="bi bi-question-circle-fill me-2 text-primary"></i>
                            Apakah saya bisa mengunduh surat dalam format PDF?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, setelah surat disetujui dan ditandatangani, Anda dapat mengunduh surat dalam format PDF melalui akun Anda.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <i class="bi bi-question-circle-fill me-2 text-primary"></i>
                            Bagaimana jika surat saya ditolak?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Jika surat ditolak, Anda akan menerima notifikasi beserta alasan penolakan. Anda bisa memperbaiki dan mengajukan ulang sesuai arahan.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <i class="bi bi-question-circle-fill me-2 text-primary"></i>
                            Siapa yang memverifikasi surat saya?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Surat yang Anda ajukan akan diverifikasi terlebih dahulu oleh Kaprodi, kemudian dilanjutkan ke Tata Usaha untuk ditandatangani dan diterbitkan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="blog bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Recent Blog Posts</h2>
                <p>Artikel terbaru seputar teknologi, pengembangan web, dan inspirasi dunia digital.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('images/blog-1.jpg') }}" class="img-fluid" alt="Blog Image" onerror="this.src='https://via.placeholder.com/400x250?text=Blog+Image'">
                        </div>
                        <div class="blog-info">
                            <div class="blog-meta">
                                <i class="bi bi-calendar me-1"></i> December 12
                            </div>
                            <h4><a href="#">5 Tips Efektif Menjalani Perkuliahan di Semester Awal</a></h4>
                            <p>Admin Kampus / <span>Tips Kuliah</span></p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('images/blog-2.jpg') }}" class="img-fluid" alt="Blog Image" onerror="this.src='https://via.placeholder.com/400x250?text=Blog+Image'">
                        </div>
                        <div class="blog-info">
                            <div class="blog-meta">
                                <i class="bi bi-calendar me-1"></i> July 17
                            </div>
                            <h4><a href="#">Event Pekan Kreativitas Mahasiswa 2025 Resmi Dibuka!</a></h4>
                            <p>Humas Kampus / <span>Event Kampus</span></p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('images/blog-3.jpg') }}" class="img-fluid" alt="Blog Image" onerror="this.src='https://via.placeholder.com/400x250?text=Blog+Image'">
                        </div>
                        <div class="blog-info">
                            <div class="blog-meta">
                                <i class="bi bi-calendar me-1"></i> September 05
                            </div>
                            <h4><a href="#">Pendaftaran Beasiswa Unggulan Kemendikbud 2025 Dibuka!</a></h4>
                            <p>Tim Beasiswa / <span>Beasiswa</span></p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Hubungi kami untuk pertanyaan, kerja sama, atau informasi lebih lanjut.</p>
            </div>

            <div class="row">
                <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info w-100">
                        <div class="address mb-4">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Address:</h4>
                            <p>Jl. Merdeka No.123, Bandung, Jawa Barat 40123</p>
                        </div>

                        <div class="email mb-4">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@namadomainanda.com</p>
                        </div>

                        <div class="phone mb-4">
                            <i class="bi bi-phone"></i>
                            <h4>Call Us:</h4>
                            <p>+62 812 3456 7890</p>
                        </div>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7976763804816!2d107.60870671477326!3d-6.914206695003855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8866e5%3A0x37be7ac9d575f7ed!2sJl.%20Merdeka%2C%20Babakan%20Ciamis%2C%20Kec.%20Sumur%20Bandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040117!5e0!3m2!1sid!2sid!4v1650000000000!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="php-email-form w-100">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Arsha</h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Follow Us</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-center">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Arsha</span></strong> All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Back to top button
        window.addEventListener('scroll', function() {
            const backToTop = document.querySelector('.back-to-top');
            if (window.scrollY > 100) {
                backToTop.classList.add('active');
            } else {
                backToTop.classList.remove('active');
            }
        });
        
        // Form submission
        const form = document.querySelector('.php-email-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const loading = form.querySelector('.loading');
                const errorMessage = form.querySelector('.error-message');
                const sentMessage = form.querySelector('.sent-message');
                
                loading.style.display = 'block';
                
                // Simulate form submission
                setTimeout(function() {
                    loading.style.display = 'none';
                    sentMessage.style.display = 'block';
                    
                    // Reset form
                    form.reset();
                    
                    // Hide success message after 5 seconds
                    setTimeout(function() {
                        sentMessage.style.display = 'none';
                    }, 5000);
                }, 2000);
            });
        }
    </script>
</body>
</html>