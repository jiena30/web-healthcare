
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Healthcare - Layanan</title>

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

    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:'Poppins',sans-serif;
    }

    body{
      background:#f8fcfb;
      overflow-x:hidden;
      color: var(--text-main);
    }

    a{
      text-decoration:none;
    }

    .container-custom{
      width:92%;
      max-width:1450px;
      margin:auto;
    }

    /* ================= NAVBAR DISAMAKAN ================= */
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

    /* Garis bawah hijau minimalis presisi di bawah menu aktif */
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

    /* ================= SECTION LAYANAN ================= */

    .section-layanan {
      padding: 20px 0 90px 0; 
    }

    .title-area {
      text-align: center;
      margin-bottom: 60px;
    }

    .title-area h2 {
      font-size: 42px;
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 16px;
    }

    .title-area h2 span {
      color: var(--primary-color);
    }

    .title-area p {
      font-size: 18px;
      color: var(--text-muted);
      max-width: 650px;
      margin: auto;
      line-height: 1.6;
    }

    /* Card Item Layanan */
    .layanan-card {
      background: white;
      border-radius: 32px;
      padding: 40px;
      border: 1px solid #e2e8f0;
      transition: all 0.4s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .layanan-card:hover {
      border-color: transparent;
      box-shadow: 0 20px 40px rgba(16, 185, 129, 0.08);
      transform: translateY(-8px);
    }

    .layanan-icon-box {
      width: 76px;
      height: 76px;
      border-radius: 22px;
      background: #edf9f6;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      color: var(--primary-color);
      margin-bottom: 30px;
      transition: 0.3s;
    }

    .layanan-card:hover .layanan-icon-box {
      background: var(--primary-color);
      color: white;
    }

    .layanan-card h4 {
      font-size: 22px;
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 14px;
    }

    .layanan-card p {
      font-size: 15px;
      color: var(--text-muted);
      line-height: 1.7;
      margin-bottom: 25px;
    }

    .btn-layanan-link {
      font-size: 15px;
      font-weight: 600;
      color: var(--primary-color);
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: 0.3s;
      padding: 0;
      background: transparent;
      border: none;
    }

    .btn-layanan-link:hover {
      color: var(--primary-hover);
      gap: 14px;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:1200px){
      .title-area h2 {
        font-size: 36px;
      }
    }

    @media(max-width:992px){
      .navbar-nav{
        gap: 15px;
        margin: 15px 0;
      }
      .navbar-nav .nav-link.active::after {
        display: none;
      }
      .section-layanan {
        padding: 20px 0 60px 0;
      }
    }

    @media(max-width:576px){
      .logo{
        font-size:24px;
      }
      .title-area h2 {
        font-size: 28px;
      }
      .title-area p {
        font-size: 15px;
      }
    }
  </style>
</head>

<body>

   <div class="container">
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
            <li class="nav-item"><a class="nav-link" href="{{ url('/beranda') }}">Beranda</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ url('/layanan') }}">Layanan</a></li>
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

    <section class="section-layanan" id="layanan">
      
      <div class="title-area">
        <h2>Layanan <span>Unggulan Kami</span></h2>
        <p>Nikmati kemudahan akses kesehatan terpadu dan profesional yang dirancang khusus untuk memenuhi segala kebutuhan medis Anda.</p>
      </div>

      <div class="row g-4">
        
        <div class="col-lg-4 col-md-6">
          <div class="layanan-card">
            <div>
              <div class="layanan-icon-box">
                <i class="bi bi-person-heart"></i>
              </div>
              <h4>Konsultasi Dokter</h4>
              <p>Hubungi dokter spesialis atau dokter umum pilihan Anda secara instan lewat fitur chat interaktif atau video call beresolusi tinggi, kapan pun Anda butuh.</p>
            </div>
            <a href="{{ url('/konsultasi') }}" class="btn-layanan-link">Mulai Konsultasi <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="layanan-card">
            <div>
              <div class="layanan-icon-box">
                <i class="bi bi-capsule"></i>
              </div>
              <h4>Toko Obat Online</h4>
              <p>Beli obat-obatan rutin, vitamin, hingga tebus resep dokter secara online. Produk dijamin 100% original dan diantar cepat langsung ke depan pintu rumah Anda.</p>
            </div>
            <a href="{{ url('/beli-obat') }}" class="btn-layanan-link">Cari Obat <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="layanan-card">
            <div>
              <div class="layanan-icon-box">
                <i class="bi bi-calendar-check"></i>
              </div>
              <h4>Janji Medis</h4>
              <p>Jangan antre lagi di rumah sakit. Cari jadwal dokter favorit Anda, pesan tempat secara instan, dan dapatkan kepastian jam temu di klinik terdekat tanpa ribet.</p>
            </div>
            <a href="{{ url('/janji-medis') }}" class="btn-layanan-link">Buat Janji <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="layanan-card">
            <div>
              <div class="layanan-icon-box">
                <i class="bi bi-eyedropper"></i>
              </div>
              <h4>Pemeriksaan Tes Lab</h4>
              <p>Lakukan cek darah, medical check-up, atau tes laboratorium lainnya. Petugas medis profesional kami siap datang langsung ke rumah Anda untuk mengambil sampel.</p>
            </div>
            <a href="{{ url('/tes-lab') }}" class="btn-layanan-link">Pesan Tes Lab <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="layanan-card">
            <div>
              <div class="layanan-icon-box">
                <i class="bi bi-shield-plus"></i>
              </div>
              <h4>Asuransi Kesehatan</h4>
              <p>Dapatkan proteksi finansial medis maksimal bagi seluruh anggota keluarga Anda dengan klaim yang mudah, transparan, serta jaringan rumah sakit yang luas.</p>
            </div>
            <a href="{{ url('/asuransi') }}" class="btn-layanan-link">Lihat Proteksi <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="layanan-card">
            <div>
              <div class="layanan-icon-box">
                <i class="bi bi-heart-pulse"></i>
              </div>
              <h4>Kesehatan Preventif</h4>
              <p>Pantau kebugaran jantung, kalkulator BMI, serta program diet sehat terpandu yang dirancang langsung oleh ahli gizi bersertifikat kami demi gaya hidup sehat.</p>
            </div>
            <a href="{{ url('/artikel') }}" class="btn-layanan-link">Pelajari Selengkapnya <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

      </div>

    </section>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

