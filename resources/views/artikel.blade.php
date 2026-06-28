<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare - Artikel Kesehatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root { --primary-color: #10b981; --primary-hover: #059669; --text-main: #0f172a; }
        body { font-family: 'Poppins', sans-serif; background: #f8fcfb; }
        
        .navbar { padding: 25px 0; background: transparent; }
        .logo { display: flex; align-items: center; gap: 8px; font-size: 26px; font-weight: 700; color: var(--text-main); text-decoration: none; }
        .logo i { color: var(--primary-color); font-size: 32px; }
        .navbar-nav .nav-link { color: #334155; font-weight: 500; font-size: 15px; padding: 0 15px !important; transition: 0.3s; }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active { color: var(--primary-color); }
        .navbar-nav .nav-link.active { position: relative; font-weight: 600; }
        .navbar-nav .nav-link.active::after { content: ''; position: absolute; bottom: -6px; left: 15px; right: 15px; height: 3px; background: var(--primary-color); border-radius: 10px; }
        
        .btn-login { border: 1.5px solid #e2e8f0; background: transparent; color: var(--text-main); padding: 8px 24px; border-radius: 12px; font-weight: 600; transition: 0.3s; }
        .btn-login:hover { border-color: var(--primary-color); color: var(--primary-color); }
        .btn-daftar { background: var(--primary-color); color: white; padding: 9px 26px; border-radius: 12px; font-weight: 600; border: none; text-decoration: none; transition: 0.3s; }
        .btn-daftar:hover { background: var(--primary-hover); color: white; }

        .card-custom { border: none; border-radius: 24px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); transition: 0.3s; height: 100%; }
        .card-custom:hover { transform: translateY(-10px); }
        .card-img-top { height: 220px; object-fit: cover; border-radius: 24px 24px 0 0; }
        .btn-link-custom { color: var(--primary-color); font-weight: 600; text-decoration: none; border: none; background: none; padding: 0; }
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
            <li class="nav-item"><a class="nav-link" href="{{ url('/layanan') }}">Layanan</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ url('/artikel') }}">Artikel</a></li>
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
    <section class="py-5">
        <h2 class="text-center fw-bold mb-5">Pengetahuan Kesehatan</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom h-100">
                    <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773" class="card-img-top">
                    <div class="p-4">
                        <small class="text-success fw-bold">GAYA HIDUP</small>
                        <h4 class="fw-bold mt-2">Pentingnya Hidrasi Tubuh</h4>
                        <p class="text-muted">Air putih berperan krusial dalam menjaga metabolisme...</p>
                        <button class="btn-link-custom" data-bs-toggle="modal" data-bs-target="#modal1">Baca Selengkapnya →</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom h-100">
                    <img src="https://images.unsplash.com/photo-1599058917212-d750089bc07e" class="card-img-top">
                    <div class="p-4">
                        <small class="text-success fw-bold">KEBUGARAN</small>
                        <h4 class="fw-bold mt-2">Tips Olahraga di Rumah</h4>
                        <p class="text-muted">Tetap aktif tanpa harus pergi ke gym...</p>
                        <button class="btn-link-custom" data-bs-toggle="modal" data-bs-target="#modal2">Baca Selengkapnya →</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom h-100">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061" class="card-img-top">
                    <div class="p-4">
                        <small class="text-success fw-bold">NUTRISI</small>
                        <h4 class="fw-bold mt-2">Manfaat Sayuran Hijau</h4>
                        <p class="text-muted">Rahasia sistem imun yang kuat ada pada apa yang kita konsumsi...</p>
                        <button class="btn-link-custom" data-bs-toggle="modal" data-bs-target="#modal3">Baca Selengkapnya →</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <h3 class="text-center fw-bold mb-4">Video Edukasi</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <video width="100%" controls style="border-radius: 20px;">
                    <source src="vid1.mp4" type="video/mp4">
                </video>
            </div>
            <div class="col-md-4">
                <video width="100%" controls style="border-radius: 20px;">
                    <source src="vid2.mp4" type="video/mp4">
                </video>
            </div>
            <div class="col-md-4">
                <video width="100%" controls style="border-radius: 20px;">
                    <source src="vid3.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal1" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content p-3"><div class="modal-header"><h5 class="modal-title fw-bold">Pentingnya Hidrasi Tubuh</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p>Air putih adalah elemen paling vital bagi tubuh manusia. Tubuh kita terdiri dari sekitar 60-70% air yang berfungsi untuk mengatur suhu tubuh, melumasi sendi, dan mengangkut nutrisi ke sel-sel tubuh.</p></div></div></div></div>
<div class="modal fade" id="modal2" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content p-3"><div class="modal-header"><h5 class="modal-title fw-bold">Tips Olahraga di Rumah</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p>Olahraga di rumah kini menjadi pilihan utama bagi banyak orang. Cukup dengan memanfaatkan berat tubuh sendiri, Anda sudah bisa membakar kalori secara efektif.</p></div></div></div></div>
<div class="modal fade" id="modal3" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content p-3"><div class="modal-header"><h5 class="modal-title fw-bold">Manfaat Sayuran Hijau</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p>Sayuran hijau seperti bayam, brokoli, dan kale merupakan gudang nutrisi. Mereka kaya akan vitamin A, C, dan K, serta serat yang tinggi.</p></div></div></div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>