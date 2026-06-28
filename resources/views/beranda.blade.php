<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healthcare - Sistem Informasi Medis Terpadu</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #10b981;
      --primary-hover: #059669;
      --text-main: #0f172a;
      --text-muted: #64748b;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background: #f8fcfb;
      overflow-x: hidden;
      color: var(--text-main);
    }

    a {
      text-decoration: none;
    }

    .container-custom {
      width: 92%;
      max-width: 1450px;
      margin: auto;
    }

    /* ================= NAVBAR DISESUAIKAN UNTUK PROFILE LARAVEL ================= */
    .navbar {
      padding: 25px 0;
      background: transparent;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 26px;
      font-weight: 700;
      color: var(--text-main);
      text-decoration: none;
    }

    .logo i {
      color: var(--primary-color);
      font-size: 32px;
    }

    .navbar-nav .nav-link {
      color: #334155;
      font-weight: 500;
      font-size: 15px;
      padding: 0 15px !important;
      position: relative;
      transition: 0.3s;
    }

    .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
      color: var(--primary-color);
    }

    .navbar-nav .nav-link.active {
      font-weight: 600;
    }

    .navbar-nav .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: -6px;
      left: 15px;
      right: 15px;
      height: 3px;
      background: var(--primary-color);
      border-radius: 10px;
    }

    .btn-login {
      border: 1.5px solid #e2e8f0;
      background: white;
      color: var(--text-main);
      padding: 8px 24px;
      border-radius: 12px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-login:hover {
      border-color: var(--primary-color);
      color: var(--primary-color);
    }

    .btn-daftar {
      background: var(--primary-color);
      color: white;
      padding: 9px 26px;
      border-radius: 12px;
      font-weight: 600;
      border: none;
      transition: 0.3s;
    }

    .btn-daftar:hover {
      background: var(--primary-hover);
      color: white;
    }

    /* Styling Dropdown Menu Profil User Laravel */
    .dropdown-menu-custom {
      border: none !important;
      box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08) !important;
      border-radius: 16px !important;
      padding: 8px !important;
      margin-top: 12px !important;
    }

    .dropdown-item-custom {
      padding: 10px 16px !important;
      border-radius: 10px !important;
      font-size: 14px;
      color: var(--text-main);
      transition: 0.2s;
    }

    .dropdown-item-custom:hover {
      background-color: #f1f5f9;
      color: var(--primary-color);
    }

    /* ================= HERO ================= */
    .hero {
      background: linear-gradient(90deg, #edf9f6, #fff8f7);
      border-radius: 36px;
      padding: 75px;
      position: relative;
      overflow: hidden;
      margin-top: 20px;
    }

    .hero::before {
      content: '';
      position: absolute;
      width: 700px;
      height: 700px;
      background: #dcf7f1;
      border-radius: 50%;
      right: -260px;
      top: -280px;
      opacity: 0.7;
    }

    .hero h1 {
      font-size: 82px;
      line-height: 1.05;
      font-weight: 700;
      margin-bottom: 28px;
      color: #0f172a;
    }

    .hero h1 span {
      color: var(--primary-color);
    }

    .hero p {
      font-size: 24px;
      line-height: 1.8;
      color: #475569;
      margin-bottom: 40px;
      max-width: 700px;
    }

    /* ================= BUTTON HERO ================= */
    .hero-btn {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      margin-bottom: 55px;
    }

    .btn-konsul {
      background: var(--primary-color);
      color: white;
      border: none;
      padding: 18px 32px;
      border-radius: 18px;
      font-size: 18px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-konsul:hover {
      background: var(--primary-hover);
      transform: translateY(-3px);
    }

    .btn-obat {
      background: white;
      color: var(--primary-color);
      border: 2px solid var(--primary-color);
      padding: 18px 32px;
      border-radius: 18px;
      font-size: 18px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-obat:hover {
      background: var(--primary-color);
      color: white;
      transform: translateY(-3px);
    }

    /* ================= FITUR ================= */
    .fitur {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
    }

    .fitur-item {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .fitur-icon {
      width: 62px;
      height: 62px;
      border-radius: 50%;
      background: white;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 5px 20px rgba(0,0,0,0.05);
      color: var(--primary-color);
      font-size: 24px;
    }

    .fitur-item h5 {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
    }

    .fitur-item p {
      margin: 0;
      font-size: 14px;
      color: var(--text-muted);
    }

    /* ================= RIGHT CONTENT ================= */
    .right-content {
      display: flex;
      flex-direction: column;
      gap: 24px;
      position: relative;
      z-index: 5;
    }

    .info-card {
      background: white;
      border-radius: 28px;
      padding: 30px;
      display: flex;
      align-items: center;
      gap: 22px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.06);
      transition: 0.3s;
    }

    .info-card:hover {
      transform: translateY(-6px);
    }

    .icon-box {
      width: 82px;
      height: 82px;
      border-radius: 24px;
      background: #e8faf6;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 36px;
      color: var(--primary-color);
      flex-shrink: 0;
    }

    .info-card h4 {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .info-card p {
      margin: 0;
      color: var(--text-muted);
      font-size: 16px;
    }

    .card-1 { margin-top: 20px; }
    .card-2 { margin-left: 45px; }
    .card-3 { margin-left: 90px; }

    /* ================= SECTION TENTANG KAMI ================= */
    .section-about {
      padding: 65px 0 25px 0;
    }

    .about-box {
      background: white;
      border-radius: 36px;
      padding: 60px;
      border: 1px solid #e2e8f0;
    }

    .about-badge {
      display: inline-block;
      padding: 8px 18px;
      background: #e8faf6;
      color: var(--primary-color);
      font-weight: 600;
      font-size: 14px;
      border-radius: 12px;
      margin-bottom: 20px;
    }

    .about-box h2 {
      font-size: 38px;
      font-weight: 700;
      margin-bottom: 20px;
      line-height: 1.3;
    }

    .about-box h2 span {
      color: var(--primary-color);
    }

    .about-box p {
      font-size: 16px;
      line-height: 1.8;
      color: var(--text-muted);
      margin-bottom: 25px;
    }

    .about-stat-box {
      background: #f8fcfb;
      border-radius: 24px;
      padding: 25px;
      text-align: center;
      border: 1px solid #edf9f6;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .about-stat-box h3 {
      font-size: 32px;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 5px;
    }

    .about-stat-box p {
      font-size: 14px;
      margin: 0;
      color: var(--text-main);
      font-weight: 500;
    }

    /* ================= MINI CARD ================= */
    .section-card {
      margin-top: 38px;
      margin-bottom: 50px;
    }

    .mini-card {
      background: white;
      border-radius: 26px;
      padding: 24px;
      display: flex;
      align-items: center;
      gap: 18px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.04);
      height: 100%;
      transition: 0.3s;
      cursor: pointer;
    }

    .mini-card:hover {
      transform: translateY(-5px);
    }

    .mini-icon {
      width: 72px;
      height: 72px;
      border-radius: 20px;
      background: #edf9f6;
      display: flex;
      justify-content: center;
      align-items: center;
      color: var(--primary-color);
      font-size: 30px;
      flex-shrink: 0;
    }

    .mini-card h5 {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .mini-card p {
      font-size: 14px;
      color: var(--text-muted);
      margin: 0;
    }

    @media(min-width: 1200px) {
      .col-xl-2-5 {
        flex: 0 0 20%;
        max-width: 20%;
      }
    }

    /* ================= RESPONSIVE ================= */
    @media(max-width:1200px) {
      .hero h1 { font-size: 62px; }
      .hero p { font-size: 20px; }
      .about-box h2 { font-size: 32px; }
    }

    @media(max-width:992px) {
      .hero { padding: 45px; }
      .hero h1 { font-size: 52px; }
      .right-content { margin-top: 50px; }
      .card-2, .card-3 { margin-left: 0; }
      .navbar-nav { gap: 15px; margin: 15px 0; }
      .navbar-nav .nav-link.active::after { display: none; }
      .about-box { padding: 40px; }
    }

    @media(max-width:576px) {
      .hero { padding: 28px; }
      .hero h1 { font-size: 40px; }
      .hero p { font-size: 16px; }
      .hero-btn { flex-direction: column; }
      .fitur { flex-direction: column; gap: 22px; }
      .logo { font-size: 24px; }
      .about-box h2 { font-size: 26px; }
    }


    
  </style>
</head>

<body>
 <div class="container-custom">
   <nav class="navbar navbar-expand-lg">
      <div class="container-fluid p-0 d-flex justify-content-between align-items-center">
        
        <div class="d-flex flex-column align-items-start">
          <a class="logo" href="{{ url('/beranda') }}">
            <i class="bi bi-heart-pulse-fill"></i>
            <span>healthcare</span>
          </a>
          
          @auth
            <small class="text-muted fw-medium mt-1 animate-fade" style="font-size: 11px; padding-left: 2px;">
              Welcome, <span class="text-success fw-bold">{{ Auth::user()->nama_lengkap }}</span>!
            </small>
          @endauth
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav me-4">
            <li class="nav-item"><a class="nav-link active" href="{{ url('/beranda') }}">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/layanan') }}">Layanan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/artikel') }}">Artikel</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/riwayat') }}">Riwayat</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/bantuan') }}">Bantuan</a></li>
          </ul>
          
          {{-- ✅ Tombol Masuk/Daftar hanya untuk guest, dropdown untuk yang sudah login --}}
      <div class="d-flex gap-3 mt-lg-0 mt-2 align-items-center">
        @guest
          <a href="{{ route('login') }}" class="btn-login">Masuk</a>
          <a href="{{ route('register') }}" class="btn-daftar">Daftar</a>
        @endguest

        @auth
          <div class="dropdown">
            <a class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle" 
               href="#" role="button" data-bs-toggle="dropdown">
              <img src="{{ Auth::user()->foto 
    ? (str_contains(Auth::user()->foto, 'profiles/') ? asset('storage/'.Auth::user()->foto) : asset('storage/profiles/'.Auth::user()->foto)) 
    : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->nama_lengkap) }}" 
    alt="Profil" 
    style="width: 38px; height: 38px; border-radius: 50%; object-fit: cover; border: 2px solid #10b981;">
              <span class="fw-semibold text-dark" style="font-size: 14px;">
                {{ Auth::user()->nama_lengkap }}
              </span>
            </a>
        <ul class="dropdown-menu dropdown-menu-end border-0 shadow rounded-3 p-2 mt-2">
              <li>
                <a class="dropdown-item rounded-2 py-2" href="{{ url('/profil') }}">
                  <i class="bi bi-person me-2"></i> Akun Saya
                </a>
              </li>
              <li>
                <a class="dropdown-item rounded-2 py-2" href="{{ url('/riwayat') }}">
                  <i class="bi bi-clock-history me-2"></i> Riwayat Medis
                </a>
              </li>
              <li><hr class="dropdown-divider opacity-25"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item rounded-2 py-2 text-danger w-100 text-start bg-transparent border-0">
                    <i class="bi bi-box-arrow-right me-2"></i> Keluar
                  </button>
                </form>
              </li>
            </ul>
          </div>
        @endauth
      </div>
    </div>

  </div>
</nav>
        

    <section class="hero">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <h1>Sehatmu, <br><span>prioritas kami</span></h1>
          <p>Konsultasi dengan dokter, beli obat, dan jaga kesehatanmu kapan saja, di mana saja.</p>
          
          <div class="hero-btn">
            <button class="btn-konsul" onclick="window.location.href='{{ url('/konsultasi') }}'">
              <i class="bi bi-chat-dots-fill"></i> Konsultasi Dokter
            </button>
            <button class="btn-open-obat btn-obat" onclick="window.location.href='{{ url('/beli-obat') }}'">
              <i class="bi bi-cart3"></i> Beli Obat
            </button>
          </div>

          <div class="fitur">
            <div class="fitur-item">
              <div class="fitur-icon"><i class="bi bi-shield-check"></i></div>
              <div>
                <h5>Terpercaya</h5>
                <p>Terverifikasi & aman</p>
              </div>
            </div>
            <div class="fitur-item">
              <div class="fitur-icon"><i class="bi bi-clock"></i></div>
              <div>
                <h5>24/7</h5>
                <p>Dokter siap membantu</p>
              </div>
            </div>
            <div class="fitur-item">
              <div class="fitur-icon"><i class="bi bi-truck"></i></div>
              <div>
                <h5>Pengiriman Cepat</h5>
                <p>Obat diantar ke rumah</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="right-content">
            <div class="info-card card-1">
              <div class="icon-box"><i class="bi bi-heart-pulse-fill"></i></div>
              <div>
                <h4>Kesehatan Digital</h4>
                <p>Konsultasi mudah & cepat bersama dokter profesional.</p>
              </div>
            </div>
            <div class="info-card card-2">
              <div class="icon-box"><i class="bi bi-capsule"></i></div>
              <div>
                <h4>Obat Original</h4>
                <p>Pengiriman obat cepat dan aman langsung ke rumah.</p>
              </div>
            </div>
            <div class="info-card card-3">
              <div class="icon-box"><i class="bi bi-shield-check"></i></div>
              <div>
                <h4>Aman & Terpercaya</h4>
                <p>Data pasien terenkripsi dan terlindungi.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-about" id="tentang-kami">
      <div class="about-box">
        <div class="row align-items-center">
          <div class="col-lg-7 pe-lg-5">
            <div class="about-badge">Tentang Kami</div>
            <h2>Membawa Layanan Medis <span>ke Genggaman Anda</span></h2>
            <p>Healthcare berkomitmen menjadi ekosistem layanan kesehatan digital terdepan di Indonesia. Kami menghubungkan jutaan pasien dengan dokter spesialis terverifikasi, apotek terpercaya, serta laboratorium medis profesional secara instan, aman, dan tanpa hambatan jarak.</p>
            <p>Dengan teknologi enkripsi data tingkat tinggi, kami memastikan riwayat rekam medis Anda tetap terjaga rahasia demi kenyamanan dan perlindungan penuh keluarga Anda.</p>
          </div>
          <div class="col-lg-5">
            <div class="row g-3">
              <div class="col-sm-6">
                <div class="about-stat-box">
                  <h3>10K+</h3>
                  <p>Dokter Ahli</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="about-stat-box">
                  <h3>2M+</h3>
                  <p>Pasien Aktif</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="about-stat-box">
                  <h3>500+</h3>
                  <p>Apotek Mitra</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="about-stat-box">
                  <h3>4.9</h3>
                  <p>Rating Aplikasi</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-card">
      <div class="row g-4">
        
        <div class="col-xl-2-5 col-lg-4 col-md-6">
          <div class="mini-card" onclick="window.location.href='{{ url('/konsultasi') }}'">
            <div class="mini-icon"><i class="bi bi-person-heart"></i></div>
            <div>
              <h5>Konsultasi Dokter</h5>
              <p>Chat/video dengan dokter berpengalaman</p>
            </div>
          </div>
        </div>

        <div class="col-xl-2-5 col-lg-4 col-md-6">
          <div class="mini-card" onclick="window.location.href='{{ url('/beli-obat') }}'">
            <div class="mini-icon"><i class="bi bi-capsule"></i></div>
            <div>
              <h5>Beli Obat</h5>
              <p>Obat original dan terpercaya</p>
            </div>
          </div>
        </div>

        <div class="col-xl-2-5 col-lg-4 col-md-6">
          <div class="mini-card" onclick="window.location.href='{{ url('/janji-medis') }}'">
            <div class="mini-icon"><i class="bi bi-calendar-check"></i></div>
            <div>
              <h5>Janji Medis</h5>
              <p>Buat janji temu rumah sakit & klinik</p>
            </div>
          </div>
        </div>

        <div class="col-xl-2-5 col-lg-4 col-md-6">
          <div class="mini-card" onclick="window.location.href='{{ url('/tes-lab') }}'">
            <div class="mini-icon"><i class="bi bi-eyedropper"></i></div>
            <div>
              <h5>Tes Lab</h5>
              <p>Pemeriksaan kesehatan mudah</p>
            </div>
          </div>
        </div>

        <div class="col-xl-2-5 col-lg-4 col-md-6">
          <div class="mini-card" onclick="window.location.href='{{ url('/asuransi') }}'">
            <div class="mini-icon"><i class="bi bi-shield-plus"></i></div>
            <div>
              <h5>Asuransi</h5>
              <p>Proteksi kesehatan keluarga</p>
            </div>
          </div>
        </div>

      </div>
    </section>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>