<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healthcare - Sehatmu, Prioritas Kami</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #10b981;
      --primary-hover: #059669;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --bg-light: #f8fafc;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #ffffff;
      color: var(--text-main);
      overflow-x: hidden;
    }

    .container-custom {
      width: 90%;
      max-width: 1300px;
      margin: auto;
    }

    /* ================= ANIMASI UTAMA ================= */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes floatHero {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-15px); }
      100% { transform: translateY(0px); }
    }

    @keyframes leafFloatOne {
      0% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-10px) rotate(5deg); }
      100% { transform: translateY(0px) rotate(0deg); }
    }

    @keyframes leafFloatTwo {
      0% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(12px) rotate(-8px); }
      100% { transform: translateY(0px) rotate(0deg); }
    }

    /* ================= NAVBAR ================= */
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
      transition: 0.3s;
    }

    .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
      color: var(--primary-color);
    }

    .navbar-nav .nav-link.active {
      position: relative;
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
      background: transparent;
      color: var(--text-main);
      padding: 8px 24px;
      border-radius: 12px;
      font-weight: 600;
      transition: 0.3s;
      text-decoration: none;
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
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-daftar:hover {
      background: var(--primary-hover);
      color: white;
    }

    /* ================= HERO SECTION ================= */
    .hero-section {
      padding: 40px 0 60px 0;
      position: relative;
    }

    .bg-circle-blob {
      position: absolute;
      width: 500px;
      height: 500px;
      background: rgba(16, 185, 129, 0.04);
      border-radius: 50%;
      right: -5%;
      top: 15%;
      z-index: -1;
    }

    .leaf-deco-1 {
      position: absolute;
      width: 45px;
      right: 42%;
      top: 45%;
      opacity: 0.7;
      animation: leafFloatOne 4s ease-in-out infinite;
      z-index: -1;
    }

    .leaf-deco-2 {
      position: absolute;
      width: 60px;
      right: 2%;
      top: 25%;
      opacity: 0.6;
      animation: leafFloatTwo 5s ease-in-out infinite;
      z-index: -1;
    }

    .hero-text-container {
      animation: fadeInUp 0.8s ease forwards;
    }

    .hero-headline {
      font-size: 58px;
      font-weight: 700;
      line-height: 1.15;
      color: var(--text-main);
      margin-bottom: 20px;
    }

    .hero-headline span {
      color: var(--primary-color);
    }

    .hero-sub {
      font-size: 16px;
      color: var(--text-muted);
      line-height: 1.7;
      max-width: 480px;
      margin-bottom: 35px;
    }

    .hero-features-list {
      display: flex;
      flex-direction: column;
      gap: 24px;
      margin-bottom: 40px;
    }

    .feature-item-mini {
      display: flex;
      align-items: center;
      gap: 18px;
    }

    .feature-mini-icon {
      width: 46px;
      height: 46px;
      border-radius: 12px;
      background: #edf9f6;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-color);
      font-size: 20px;
    }

    .feature-mini-info h5 {
      font-size: 15px;
      font-weight: 700;
      margin-bottom: 2px;
      color: var(--text-main);
    }

    .feature-mini-info p {
      font-size: 13px;
      color: var(--text-muted);
      margin: 0;
    }

    .btn-cta-start {
      background: var(--primary-color);
      color: white;
      padding: 14px 32px;
      border-radius: 14px;
      font-weight: 600;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
      transition: 0.3s;
    }

    .btn-cta-start:hover {
      background: var(--primary-hover);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 15px 30px rgba(16, 185, 129, 0.25);
    }

    .hero-image-container {
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      animation: fadeInUp 1s ease forwards;
    }

    .phone-mockup-frame {
      width: 310px;
      height: 630px;
      background: #ffffff;
      border: 11px solid #1e293b;
      border-radius: 42px;
      box-shadow: 0 40px 80px rgba(15, 23, 42, 0.12);
      overflow: hidden;
      position: relative;
      animation: floatHero 5s ease-in-out infinite;
    }

    .phone-mockup-frame::before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 110px;
      height: 22px;
      background: #1e293b;
      border-bottom-left-radius: 16px;
      border-bottom-right-radius: 16px;
      z-index: 10;
    }

    .phone-app-screen {
      padding: 30px 16px 16px 16px;
      height: 100%;
      overflow-y: auto;
      background: #ffffff;
    }

    .phone-app-screen::-webkit-scrollbar {
      width: 3px;
    }
    .phone-app-screen::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 10px;
    }

    .app-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
      margin-bottom: 20px;
    }

    .app-logo {
      font-size: 14px;
      font-weight: 700;
      color: var(--text-main);
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .app-logo i { color: var(--primary-color); }

    .app-search-bar {
      background: #f1f5f9;
      border-radius: 12px;
      padding: 8px 14px;
      font-size: 12px;
      color: #94a3b8;
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 20px;
    }

    .app-banner-card {
      background: #edf9f6;
      border-radius: 16px;
      padding: 14px;
      position: relative;
      overflow: hidden;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
    }

    .app-banner-info { max-width: 60%; }
    .app-banner-info h6 { font-size: 13px; font-weight: 700; margin-bottom: 4px; }
    .app-banner-info p { font-size: 10px; color: var(--text-muted); margin-bottom: 10px; }
    .app-banner-btn { background: var(--primary-color); color: white; border: none; font-size: 9px; padding: 5px 10px; border-radius: 6px; font-weight: 600; }
    .app-banner-img { width: 65px; height: 65px; border-radius: 50%; object-fit: cover; background: #e2e8f0; }

    .app-grid-title { font-size: 13px; font-weight: 700; margin-bottom: 14px; }
    
    .app-menu-grid {
      display: grid;
      grid-template-columns: repeat(3, 11fr);
      gap: 12px;
      margin-bottom: 24px;
    }

    .app-grid-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .app-grid-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: #f8fafc;
      color: var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      margin-bottom: 6px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    }

    .app-grid-item span { font-size: 10px; font-weight: 500; color: #475569; }

    .app-promo-card {
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 12px;
      background: #ffffff;
    }
    .app-promo-badge { background: #fee2e2; color: #ef4444; font-size: 10px; padding: 2px 8px; border-radius: 6px; font-weight: 600; display: inline-block; margin-bottom: 6px; }
    .app-promo-title { font-size: 12px; font-weight: 700; margin-bottom: 2px; }
    .app-promo-sub { font-size: 10px; color: var(--text-muted); }

    /* ================= STATISTIK BAR BAWAH ================= */
    .stats-footer-bar {
      background: #ffffff;
      border-radius: 24px;
      padding: 30px;
      box-shadow: 0 15px 45px rgba(16, 185, 129, 0.04);
      border: 1px solid rgba(16, 185, 129, 0.06);
      margin-top: 20px;
      animation: fadeInUp 1.2s ease forwards;
    }

    .stat-box-item {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .stat-icon-circle {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: #edf9f6;
      color: var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
    }

    .stat-number {
      font-size: 24px;
      font-weight: 700;
      color: var(--text-main);
      line-height: 1.2;
    }

    .stat-desc {
      font-size: 13px;
      color: var(--text-muted);
      margin: 0;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 992px) {
      .navbar-nav { gap: 10px; margin: 15px 0; }
      .navbar-nav .nav-link.active::after { display: none; }
      .hero-headline { font-size: 42px; }
      .hero-image-container { margin-top: 50px; }
      .bg-circle-blob, .leaf-deco-1, .leaf-deco-2 { display: none; }
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
    ? asset('uploads/' . Auth::user()->foto) 
    : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->nama_lengkap) }}" 
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


    <section class="hero-section">
      <div class="bg-circle-blob"></div>
      <svg class="leaf-deco-1" viewBox="0 0 24 24" fill="#10b981"><path d="M17,8C8,10 5.9,16.1 5.1,18C6.9,17.2 13,15.1 15,6.2C15.5,4 15.7,2 15.7,2C15.7,2 13.7,2.2 11.5,2.7C2.6,4.7 0.5,10.8 -0.3,12.6C1.5,11.8 7.6,9.7 9.6,18.5C9.9,19.7 10.1,20.9 10.2,22C10.5,22 10.9,21.9 11.2,21.7C13.2,20.5 15.2,16.2 16.2,13.5C17,11.2 17.2,9.1 17,8Z"/></svg>
      <svg class="leaf-deco-2" viewBox="0 0 24 24" fill="#a7f3d0"><path d="M17,8C8,10 5.9,16.1 5.1,18C6.9,17.2 13,15.1 15,6.2C15.5,4 15.7,2 15.7,2C15.7,2 13.7,2.2 11.5,2.7C2.6,4.7 0.5,10.8 -0.3,12.6C1.5,11.8 7.6,9.7 9.6,18.5C9.9,19.7 10.1,20.9 10.2,22C10.5,22 10.9,21.9 11.2,21.7C13.2,20.5 15.2,16.2 16.2,13.5C17,11.2 17.2,9.1 17,8Z"/></svg>

      <div class="row align-items-center">
        
        <div class="col-lg-6 hero-text-container">
          <h1 class="hero-headline">Sehatmu,<br><span>Prioritas Kami</span></h1>
          <p class="hero-sub">Healthcare hadir untuk memudahkan kamu mengakses layanan kesehatan berkualitas kapan saja, di mana saja tanpa antre.</p>
          
          <div class="hero-features-list">
            <div class="feature-item-mini">
              <div class="feature-mini-icon"><i class="bi bi-chat-square-heart-fill"></i></div>
              <div class="feature-mini-info">
                <h5>Konsultasi Dokter</h5>
                <p>Tanya dokter umum & spesialis kapan saja</p>
              </div>
            </div>
            <div class="feature-item-mini">
              <div class="feature-mini-icon"><i class="bi bi-capsule"></i></div>
              <div class="feature-mini-info">
                <h5>Beli Obat</h5>
                <p>Obat asli, harga terjangkau, diantar ke rumah</p>
              </div>
            </div>
            <div class="feature-item-mini">
              <div class="feature-mini-icon"><i class="bi bi-droplet-fill"></i></div>
              <div class="feature-mini-info">
                <h5>Cek Lab & Booking</h5>
                <p>Periksa lab & booking dokter dengan mudah</p>
              </div>
            </div>
          </div>

          <a href="{{ url('/beranda') }}" class="btn-cta-start">Mulai Sekarang <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="col-lg-6 hero-image-container">
          <div class="phone-mockup-frame">
            <div class="phone-app-screen">
              
              <div class="app-header">
                <div class="app-logo"><i class="bi bi-heart-pulse-fill"></i> healthcare</div>
                <i class="bi bi-bell" style="font-size: 16px;"></i>
              </div>

              <div class="app-search-bar">
                <i class="bi bi-search"></i> Cari layanan, dokter, atau artikel
              </div>

              <div class="app-banner-card">
                <div class="app-banner-info">
                  <h6>Konsultasi Dokter</h6>
                  <p>Tanya dokter kapan saja</p>
                  <button class="app-banner-btn">Mulai Konsultasi</button>
                </div>
                <div class="app-banner-img d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-badge text-muted" style="font-size: 32px;"></i>
                </div>
              </div>

              <div class="app-menu-grid">
                <div class="app-grid-item">
                  <div class="app-grid-icon"><i class="bi bi-chat-text-fill"></i></div>
                  <span>Konsultasi</span>
                </div>
                <div class="app-grid-item">
                  <div class="app-grid-icon"><i class="bi bi-capsule"></i></div>
                  <span>Beli Obat</span>
                </div>
                <div class="app-grid-item">
                  <div class="app-grid-icon"><i class="bi bi-eyedropper"></i></div>
                  <span>Cek Lab</span>
                </div>
                <div class="app-grid-item">
                  <div class="app-grid-icon"><i class="bi bi-calendar2-check-fill"></i></div>
                  <span>Booking Dokter</span>
                </div>
                <div class="app-grid-item">
                  <div class="app-grid-icon"><i class="bi bi-building-fill-add"></i></div>
                  <span>Cari RS</span>
                </div>
                <div class="app-grid-item">
                  <div class="app-grid-icon"><i class="bi bi-journal-text"></i></div>
                  <span>Artikel</span>
                </div>
              </div>

              <div class="app-grid-title">Promo Menarik <span class="float-end text-success" style="font-size: 10px;">Lihat semua</span></div>
              <div class="app-promo-card">
                <span class="app-promo-badge">Diskon Obat s.d. 20%</span>
                <div class="app-promo-title">Voucher Kesehatan Keluarga</div>
                <div class="app-promo-sub">Beli sekarang -></div>
              </div>

            </div>
          </div>
        </div>

      </div>

      <div class="stats-footer-bar">
        <div class="row g-4 justify-content-between">
          <div class="col-md-3 col-sm-6">
            <div class="stat-box-item">
              <div class="stat-icon-circle"><i class="bi bi-people-fill"></i></div>
              <div>
                <div class="stat-number">10M+</div>
                <p class="stat-desc">Pengguna Terpercaya</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="stat-box-item">
              <div class="stat-icon-circle"><i class="bi bi-patch-check-fill"></i></div>
              <div>
                <div class="stat-number">1000+</div>
                <p class="stat-desc">Dokter Tersertifikasi</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="stat-box-item">
              <div class="stat-icon-circle"><i class="bi bi-bag-plus-fill"></i></div>
              <div>
                <div class="stat-number">20K+</div>
                <p class="stat-desc">Produk Obat</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="stat-box-item">
              <div class="stat-icon-circle"><i class="bi bi-star-fill"></i></div>
              <div>
                <div class="stat-number">4.9/5</div>
                <p class="stat-desc">Rating Pengguna</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>