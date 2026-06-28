<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Konsultasi Dokter - Healthcare</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  

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

    body { 
      background: #f8fcfb; 
      color: var(--text-main);
      overflow-x: hidden;
    }

    a {
      text-decoration: none;
    }

    .container-custom { 
      width: 92%; 
      max-width: 1450px; 
      margin: auto; 
    }
    
    /* ================= NAVBAR DISAMAKAN DENGAN INDEX ================= */
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
    
    /* ================= SEARCH SECTION (SKALA DIPRESISIKAN) ================= */
    .search-section {
      background: linear-gradient(90deg, #edf9f6, #fff8f7);
      border-radius: 36px;
      padding: 45px 50px;
      margin-top: 20px;
      margin-bottom: 40px;
    }

    .search-section h2 {
      font-size: 32px;
      font-weight: 700;
      color: #0f172a;
    }

    .search-section p {
      font-size: 15px;
      color: #475569;
    }

    .search-box {
      background: white;
      border-radius: 16px;
      padding: 10px 18px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.02);
      border: 1px solid #edf9f6;
    }

    .search-box input {
      border: none;
      outline: none;
      box-shadow: none !important;
      font-size: 15px;
    }

    .btn-cari-custom {
      background: var(--primary-color);
      color: white;
      font-weight: 600;
      border-radius: 12px;
      padding: 8px 24px;
      border: none;
      transition: 0.3s;
    }

    .btn-cari-custom:hover {
      background: var(--primary-hover);
    }

    /* ================= DOCTOR CARD STYLE (PROPORSIONAL DENGAN INDEX) ================= */
    .doctor-card {
      background: white;
      border-radius: 28px;
      border: 1px solid #e2e8f0;
      padding: 30px;
      transition: 0.3s;
      height: 100%;
    }

    .doctor-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 35px rgba(0,0,0,0.06);
    }

    .doc-img-container {
      position: relative;
      width: 82px;
      height: 82px;
      flex-shrink: 0;
    }

    .doc-img {
      width: 100%;
      height: 100%;
      border-radius: 24px;
      background: #e8faf6;
      color: var(--primary-color);
    }

    .status-badge {
      position: absolute;
      bottom: -2px;
      right: -2px;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      border: 3px solid white;
    }
    .status-online { background-color: #10b981; box-shadow: 0 0 8px #10b981; }
    .status-offline { background-color: #94a3b8; }

    .spec-badge {
      background: #e8faf6;
      color: var(--primary-color);
      font-size: 13px;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: 10px;
      display: inline-block;
    }

    .btn-action-container {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .btn-chat {
      background: var(--primary-color);
      color: white;
      font-weight: 600;
      border-radius: 14px;
      padding: 12px;
      border: none;
      transition: 0.3s;
      width: 100%;
      font-size: 15px;
    }

    .btn-chat:hover {
      background: var(--primary-hover);
    }

    .btn-chat-offline {
      background: #94a3b8;
      color: white;
      font-weight: 600;
      border-radius: 14px;
      padding: 12px;
      border: none;
      transition: 0.3s;
      width: 100%;
      font-size: 15px;
    }
    .btn-chat-offline:hover {
      background: #64748b;
    }

    .btn-booking {
      background: white;
      color: var(--text-main);
      font-weight: 600;
      border-radius: 14px;
      padding: 12px;
      border: 2px solid var(--primary-color);
      transition: 0.3s;
      width: 100%;
      font-size: 15px;
    }

    .btn-booking:hover {
      background: var(--primary-color);
      color: white;
    }

    @media(max-width: 992px) {
      .search-section { padding: 35px; }
      .search-section h2 { font-size: 26px; }
    }

    .btn-lihat-semua {
    background: var(--primary-color);
    color: white;
    font-weight: 600;
    border-radius: 12px;
    padding: 12px 24px;
    border: none;
    transition: 0.3s;
    white-space: nowrap;
    min-width: 130px;

    display: flex;
    align-items: center;
    justify-content: center;
}

   .btn-lihat-semua {
    height: 41px;
}

  </style>
</head>
<body>

  <div class="container-custom">
    
    <!-- ================= NAVBAR DISAMAKAN PERSIS ================= -->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid p-0 d-flex justify-content-between align-items-center">
        <a class="logo" href="index.html">
          <i class="bi bi-heart-pulse-fill"></i>
          <span>healthcare</span>
        </a>

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
          <div class="d-flex gap-3 mt-lg-0 mt-2">
            <a href="{{ route('login') }}" class="btn-login" style="text-decoration: none; display: flex; align-items: center;">Masuk</a>
              <a href="{{ route('register') }}" class="btn-daftar">Daftar</a>
          </div>
        </div>
      </div>
    </nav>
  
   @if(session('status') == 'admin')

<div class="container mt-5">
    <h3 class="mb-4">Data Janji Konsultasi</h3>

    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Dokter ID</th>
                <th>Tanggal Janji</th>
                <th>Jam Janji</th>
                <th>Status</th>
                <th>Jenis Pasien</th>
                <th>Metode Bayar</th>
            </tr>
        </thead>

        <tbody>
@foreach($konsultasi as $item)
<tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->user_id }}</td>
    <td>{{ $item->dokter_id }}</td>
    <td>{{ $item->tanggal_janji }}</td>
    <td>{{ $item->jam_janji }}</td>
    <td>{{ $item->status }}</td>
    <td>{{ $item->jenis_pasien }}</td>
    <td>{{ $item->metode_bayar }}</td>
</tr>
@endforeach
</tbody>
    </table>
</div>

@else

    <!-- ================= SEARCH BANNER SECTION ================= -->
    <section class="search-section">
      <div class="row align-items-center g-4">
        <div class="col-lg-5">
          <h2>Cari Dokter Spesialis</h2>
          <p class="text-muted m-0">Temukan beribu dokter berpengalaman yang siap melayani Anda.</p>
        </div>
        <div class="col-lg-7">
          <div class="search-box d-flex align-items-center gap-2">
            <i class="bi bi-search text-muted fs-5"></i>
            <input type="text"  id="searchDoctor" class="form-control" placeholder="Cari berdasarkan nama dokter...">
            <button class="btn-cari-custom" type="button" onclick="caridokter();">Cari</button> <button class="btn-lihat-semua">Lihat Semua</button>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= DAFTAR REKOMENDASI DOKTER ================= -->
    <section class="mb-5">
      <div class="mb-4">
        <h4 class="fw-bold m-0" style="font-size: 24px;">Rekomendasi Dokter Aktif</h4>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-person-fill-check"></i></div>
                  <span class="status-badge status-online"></span>
                </div>
                <div>
                  <span class="spec-badge mb-1">Dokter Umum</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name">Dr. Adi Wijaya</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 5+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>4.9 <span class="text-muted">(120)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 35.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Dr. Adi Wijaya" data-status="online" data-telepon="+62 812-3456-7890">
                  <i class="bi bi-chat-dots me-2"></i>Chat Sekarang
                </button>
                <button class="btn-booking" data-id="Dr. Adi Wijaya" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Dr. Adi Wijaya" data-harga="Rp 35.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-person-badge-fill"></i></div>
                  <span class="status-badge status-online"></span>
                </div>
                <div>
                  <span class="spec-badge mb-1"  style="background:#eff6ff; color:#2563eb;">Spesialis Anak</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name">Dr. Rina Handayani, Sp.A</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 8+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>5.0 <span class="text-muted">(240)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 75.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Dr. Rina Handayani, Sp.A" data-status="online" data-telepon="+62 857-9988-1122">
                  <i class="bi bi-chat-dots me-2"></i>Chat Sekarang
                </button>
                <button class="btn-booking" data-id="Dr. Rina Handayani, Sp.A" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Dr. Rina Handayani, Sp.A" data-harga="Rp 75.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-person-bounding-box"></i></div>
                  <span class="status-badge status-offline"></span>
                </div>
                <div>
                 <span class="spec-badge mb-1" style="background:#fff7ed; color:#ea580c;">Spesialis Kulit</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name">Dr. Budi Santoso, Sp.KK</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 10+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>4.8 <span class="text-muted">(98)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 90.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat-offline" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Dr. Budi Santoso, Sp.KK" data-status="offline">
                  <i class="bi bi-chat-dots me-2"></i>Offline
                </button>
                <button class="btn-booking" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Dr. Budi Santoso, Sp.KK" data-harga="Rp 90.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-heart-pulse"></i></div>
                  <span class="status-badge status-online"></span>
                </div>
                <div>
                  <span class="spec-badge mb-1" style="background:#fdf2f8; color:#db2777;">Spesialis Jantung</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name">Dr. Hendra Utama, Sp.JP</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 12+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>4.9 <span class="text-muted">(156)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 120.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Dr. Hendra Utama, Sp.JP" data-status="online" data-telepon="+62 813-1122-3344">
                  <i class="bi bi-chat-dots me-2"></i>Chat Sekarang
                </button>
                <button class="btn-booking" data-id="Dr. Hendra Utama, Sp.JP" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Dr. Hendra Utama, Sp.JP" data-harga="Rp 120.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-eye"></i></div>
                  <span class="status-badge status-online"></span>
                </div>
                <div>
                  <span class="spec-badge mb-1" style="background:#f5f3ff; color:#7c3aed;">Spesialis Mata</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name">Dr. Citra Lestari, Sp.M</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 6+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>4.7 <span class="text-muted">(84)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 80.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Dr. Citra Lestari, Sp.M" data-status="online" data-telepon="+62 821-4455-6677">
                  <i class="bi bi-chat-dots me-2"></i>Chat Sekarang
                </button>
                <button class="btn-booking" data-id="Dr. Citra Lestari, Sp.M" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Dr. Citra Lestari, Sp.M" data-harga="Rp 80.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-activity"></i></div>
                  <span class="status-badge status-offline"></span>
                </div>
                <div>
                  <span class="spec-badge mb-1" style="background:#f0fdf4; color:#16a34a;">Spesialis Penyakit Dalam</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name">Dr. Ahmad Faisal, Sp.PD</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 15+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>5.0 <span class="text-muted">(310)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 100.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat-offline" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Dr. Ahmad Faisal, Sp.PD" data-status="offline">
                  <i class="bi bi-chat-dots me-2"></i>Offline
                </button>
                <button class="btn-booking" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Dr. Ahmad Faisal, Sp.PD" data-harga="Rp 100.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-emoji-smile"></i></div>
                  <span class="status-badge status-online"></span>
                </div>
                <div>
                  <span class="spec-badge mb-1" style="background:#fff1f2; color:#e11d48;" >Spesialis Gigi</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name">Drg. Siska Amelia</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 4+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>4.8 <span class="text-muted">(72)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 50.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Drg. Siska Amelia" data-status="online" data-telepon="+62 838-7766-5544">
                  <i class="bi bi-chat-dots me-2"></i>Chat Sekarang
                </button>
                <button class="btn-booking" data-id="Drg. Siska Amelia" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Drg. Siska Amelia" data-harga="Rp 50.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-brain"></i></div>
                  <span class="status-badge status-online"></span>
                </div>
                <div>
                  <span class="spec-badge mb-1" style="background:#faf5ff; color:#6b21a8;">Spesialis Saraf</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name">Dr. Taufik Hidayat, Sp.S</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 9+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>4.9 <span class="text-muted">(114)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 110.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Dr. Taufik Hidayat, Sp.S" data-status="online" data-telepon="+62 852-3344-5566">
                  <i class="bi bi-chat-dots me-2"></i>Chat Sekarang
                </button>
                <button class="btn-booking" data-id="Dr. Taufik Hidayat, Sp.S" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Dr. Taufik Hidayat, Sp.S" data-harga="Rp 110.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="doctor-card d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex gap-3 align-items-start mb-3">
                <div class="doc-img-container">
                  <div class="doc-img d-flex align-items-center justify-content-center fs-2"><i class="bi bi-capsule"></i></div>
                  <span class="status-badge status-offline"></span>
                </div>
                <div>
                  <span class="spec-badge mb-1" style="background:#fff1f2; color:#9f1239;">Spesialis THT</span>
                  <h5 class="fw-bold mb-1 fs-6 doctor-name" >Dr. Mega Utami, Sp.THT</h5>
                  <p class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> 7+ Tahun Pengalaman</p>
                  <p class="text-warning small mb-0"><i class="bi bi-star-fill me-1"></i>4.6 <span class="text-muted">(67)</span></p>
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-2">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Konsultasi</span>
                <span class="fw-bold text-success">Rp 85.000</span>
              </div>
              <div class="btn-action-container">
                <button class="btn-chat-offline" data-bs-toggle="modal" data-bs-target="#modalTelepon" data-nama="Dr. Mega Utami, Sp.THT" data-status="offline">
                  <i class="bi bi-chat-dots me-2"></i>Offline
                </button>
                <button class="btn-booking" data-bs-toggle="modal" data-bs-target="#modalBooking" data-nama="Dr. Mega Utami, Sp.THT" data-harga="Rp 85.000"><i class="bi bi-calendar-plus me-2"></i>Booking Jadwal</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

  <div class="modal fade" id="modalTelepon" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 24px; padding: 15px;">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fw-bold">Informasi Sesi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center pt-4 pb-4">
          <div id="modalKontenSistem"></div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light w-100 py-2 fw-semibold" style="border-radius: 12px;" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="modalBooking" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content" style="border-radius: 24px; padding: 15px;">

    <!-- HEADER -->
    <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="modalBookingTitle">
            Buat Janji Temu
        </h5>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                id="btnCloseBooking"></button>
    </div>

    <!-- STEP 1 -->
    <div id="stepJadwal">

        <form id="formBookingJadwal">
            @csrf

            <input type="hidden"
                   id="modalDokterId"
                   name="dokter_id">

            <div class="modal-body pt-3">

                <p class="text-muted small mb-3">
                    Silakan atur waktu kunjungan Anda:
                </p>

                <h4 class="fw-bold text-dark mb-4" id="bookingNamaDokter">
                    Nama Dokter
                </h4>

                <div class="mb-3">
                    <label class="form-label small fw-semibold text-secondary">
                        Pilih Tanggal
                    </label>

                    <input type="date"
                           id="inputTanggal"
                           name="tanggal"
                           class="form-control rounded-3 py-2"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold text-secondary">
                        Pilih Jam
                    </label>

                    <select id="inputJam"
                            name="jam"
                            class="form-select rounded-3 py-2"
                            required>

                        <option value="" selected disabled>
                            -- Pilih Jam Operasional --
                        </option>

                        <option value="09:00 - 11:00 WIB">
                            09:00 - 11:00 WIB
                        </option>

                        <option value="13:00 - 15:00 WIB">
                            13:00 - 15:00 WIB
                        </option>

                    </select>
                </div>

            </div>

            <div class="modal-footer border-0 pt-0">
                <button type="submit"
                        class="btn btn-success w-100">
                    Lanjut ke Pembayaran
                </button>
            </div>

        </form>

    </div>

    <!-- STEP 2 -->
    <div id="stepPembayaran" class="d-none">

        <form id="formPembayaran">
            @csrf


            <!-- DATA YANG DIKIRIM KE DATABASE -->
            <input type="hidden" name="dokter_id" id="hiddenDokterId">
            <input type="hidden" name="tanggal" id="hiddenTanggal">
            <input type="hidden" name="jam" id="hiddenJam">

            <div class="modal-body pt-3">

                <p class="text-muted small mb-3">
                    Silakan selesaikan data administrasi dan pembayaran invoice Anda:
                </p>

                <div class="p-3 bg-light rounded-4 mb-4 border">

                    <div class="d-flex justify-content-between mb-1 small text-secondary">
                        <span>Dokter</span>
                        <span class="fw-medium text-dark" id="invoiceNamaDokter">
                            -
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-1 small text-secondary">
                        <span>Jadwal</span>
                        <span class="fw-medium text-dark" id="invoiceJadwal">
                            -
                        </span>
                    </div>

                    <hr class="my-2">

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-dark small">
                            Total Bayar
                        </span>

                        <span class="fw-bold text-success fs-5"
                              id="invoiceHarga">
                            Rp 0
                        </span>
                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label small fw-semibold text-secondary">
                        Jenis Pasien / Penjaminan
                    </label>

                    <select class="form-select rounded-3 py-2"
                            id="inputJenisPasien"
                            name="jenis_pasien"
                            required>

                        <option value="Umum" selected>
                            Pasien Umum (Bayar Mandiri)
                        </option>

                        <option value="BPJS">
                            BPJS Kesehatan
                        </option>

                        <option value="Asuransi">
                            Asuransi Swasta
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label small fw-semibold text-secondary">
                        Pilih Metode Pembayaran
                    </label>

                    <select class="form-select rounded-3 py-2"
                            id="inputMetode"
                            name="metode_bayar"
                            required>

                        <option value="" selected disabled>
                            -- Pilih Bank / E-Wallet --
                        </option>

                        <optgroup label="Transfer Bank">
                            <option value="Bank BCA">Bank BCA</option>
                            <option value="Bank Mandiri">Bank Mandiri</option>
                            <option value="Bank BNI">Bank BNI</option>
                            <option value="Bank BRI">Bank BRI</option>
                        </optgroup>

                        <optgroup label="E-Wallet">
                            <option value="GOPAY">GOPAY</option>
                            <option value="OVO">OVO</option>
                            <option value="ShopeePay">ShopeePay</option>
                        </optgroup>

                    </select>

                </div>

            </div>

            <div class="modal-footer border-0 pt-0 d-flex gap-2">

                <button type="button"
                        id="btnBackToJadwal"
                        class="btn btn-light flex-grow-1">
                    Kembali
                </button>

                <button type="submit"
                        id="btnKonfirmasiPembayaran"
                        class="btn btn-success flex-grow-1">
                    Konfirmasi Pembayaran
                </button>

            </div>

        </form>

    </div>

    <!-- STEP 3 -->
    <div id="stepSukses" class="d-none">

        <div class="modal-body text-center pt-4 pb-3">

            <h4 class="fw-bold text-dark mb-2">
                Booking Berhasil!
            </h4>

            <p class="text-muted">
                Registrasi janji temu berhasil diproses menggunakan
                <strong id="suksesMetode">Umum</strong>
            </p>

            <div class="text-start p-3 bg-light rounded-4 border">

                <div>
                    <strong>Dokter:</strong>
                    <span id="suksesDokter"></span>
                </div>

                <div>
                    <strong>Waktu:</strong>
                    <span id="suksesWaktu"></span>
                </div>

                <div>
                    <strong>Status:</strong>
                    <span class="badge bg-success">
                        Lunas / Terjamin
                    </span>
                </div>

            </div>

        </div>

        <div class="modal-footer border-0">

            <button type="button"
                    class="btn btn-success"
                    data-bs-dismiss="modal">
                Selesai
            </button>

        </div>

    </div>

</div>
</div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    
  




    // Saat tombol booking diklik, ambil ID-nya KONSULTASI
document.querySelectorAll('.btn-booking').forEach(btn => {

    btn.addEventListener('click', function() {
      

        document.getElementById('modalDokterId').value =
            this.dataset.id;
            console.log("Dokter ID =", this.dataset.id);

        document.getElementById('bookingNamaDokter').textContent =
            this.dataset.nama;

        document.getElementById('invoiceNamaDokter').textContent =
            this.dataset.nama;

        document.getElementById('invoiceHarga').textContent =
            this.dataset.harga;

    });

});


document.addEventListener('DOMContentLoaded', function () {
    const formatFormPembayaran = document.getElementById('formPembayaran');
    
    if (formatFormPembayaran) {
        formatFormPembayaran.addEventListener('submit', function (e) {
            e.preventDefault(); // KUNCI UTAMA: Stop browser biar gak nembak lewat URL atas!
            
            // Bungkus pake try-catch biar kalau objek dataBooking belum lu deklarasiin di atas, kodenya gak langsung mati
            try {
                const jenisPasienVal = document.getElementById('inputJenisPasien').value;
                const metodeVal = document.getElementById('inputMetode').value;
                
                // Pastikan objek dataBooking lu aman
                if (typeof dataBooking === 'undefined') {
                    window.dataBooking = {};
                }

                if (jenisPasienVal !== "Umum") {
                    dataBooking.metode = jenisPasienVal === "BPJS" ? "BPJS Kesehatan" : "Asuransi Swasta";
                } else {
                    dataBooking.metode = metodeVal;
                }
            } catch (err) {
                console.warn("Ada warning penyiapan dataBooking:", err);
            }

            // Kirim data secara background menggunakan Fetch API ke Laravel
            console.log(new FormData(document.getElementById('formPembayaran')));
            fetch("/konsultasi/pembayaran", {
                method: "POST",
                body: new FormData(this),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update teks struk sukses di modal
                    if(document.getElementById('suksesMetode')) document.getElementById('suksesMetode').textContent = dataBooking.metode || '-';
                    if(document.getElementById('suksesDokter')) document.getElementById('suksesDokter').textContent = dataBooking.nama || '-';
                    if(document.getElementById('suksesWaktu')) document.getElementById('suksesWaktu').textContent = document.getElementById('invoiceJadwal').textContent;

                    // Ganti interface tampilan modal ke step sukses
                    if(document.getElementById('modalBookingTitle')) document.getElementById('modalBookingTitle').textContent = "Pembayaran Berhasil";
                    if(document.getElementById('btnCloseBooking')) document.getElementById('btnCloseBooking').classList.add('d-none'); 
                    if(document.getElementById('stepPembayaran')) document.getElementById('stepPembayaran').classList.add('d-none');
                    if(document.getElementById('stepSukses')) document.getElementById('stepSukses').classList.remove('d-none');
                } else {
                    alert("Gagal memproses, respon server tidak sukses.");
                }
            })
            .catch(err => {
                console.error("Fetch Error:", err);
                alert("Gagal mengirim data pembayaran ke server.");
            });
        });
    }
});




    // JS Logic Telepon
    const modalTelepon = document.getElementById('modalTelepon');
    if (modalTelepon) {
      modalTelepon.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        const namaDokter = button.getAttribute('data-nama');
        const statusDokter = button.getAttribute('data-status');
        const nomorTelepon = button.getAttribute('data-telepon');
        const wadahKonten = modalTelepon.querySelector('#modalKontenSistem');

        if(statusDokter === "online") {
          wadahKonten.innerHTML = `
            <div class="mx-auto bg-light text-success d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; border-radius: 50%; font-size: 32px;">
              <i class="bi bi-telephone-outbound-fill"></i>
            </div>
            <p class="text-muted mb-1 small">Silakan hubungi nomor di bawah untuk memulai sesi bersama</p>
            <h4 class="fw-bold text-dark mb-3">${namaDokter}</h4>
            <div class="p-3 bg-light rounded-4 border">
              <h3 class="fw-bold m-0 text-success fs-5">${nomorTelepon}</h3>
            </div>
          `;
        } else {
          wadahKonten.innerHTML = `
            <div class="mx-auto bg-light text-secondary d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; border-radius: 50%; font-size: 32px;">
              <i class="bi bi-moon-stars-fill"></i>
            </div>
            <h4 class="fw-bold text-dark mb-2">${namaDokter}</h4>
            <p class="text-muted px-3 small">Maaf, dokter saat ini sedang <strong>Offline</strong>. Silakan gunakan fitur <strong>Booking Jadwal</strong> di bawah kartu untuk membuat janji temu mendatang.</p>
          `;
        }
      });
    }

    // JS Logic Multi-step Booking
    const modalBooking = document.getElementById('modalBooking');
    const stepJadwal = document.getElementById('stepJadwal');
    const stepPembayaran = document.getElementById('stepPembayaran');
    const stepSukses = document.getElementById('stepSukses');
    const modalBookingTitle = document.getElementById('modalBookingTitle');
    const btnCloseBooking = document.getElementById('btnCloseBooking');
    const inputJenisPasien = document.getElementById('inputJenisPasien');
    const inputMetode = document.getElementById('inputMetode');
    const invoiceHarga = document.getElementById('invoiceHarga');

    let dataBooking = { nama: '', hargaAsli: '', hargaTampil: '', tanggal: '', jam: '', jenisPasien: '', metode: '' };

    if (modalBooking) {
      modalBooking.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        dataBooking.nama = button.getAttribute('data-nama');
        dataBooking.hargaAsli = button.getAttribute('data-harga') || 'Rp 50.000'; 
        dataBooking.hargaTampil = dataBooking.hargaAsli;

        resetModalSteps();
        document.getElementById('bookingNamaDokter').textContent = dataBooking.nama;
      });
    }
const formBookingJadwal = document.getElementById('formBookingJadwal');

if(formBookingJadwal){
  console.log('FORM DITEMUKAN');

    formBookingJadwal.addEventListener('submit', function(e){
        e.preventDefault();
        const tanggal =
        document.getElementById('inputTanggal').value;

        const jam =
        document.getElementById('inputJam').value;

        document.getElementById('hiddenTanggal').value = tanggal;
        document.getElementById('hiddenJam').value = jam;

        const dokterId =
        document.getElementById('modalDokterId').value;


        document.getElementById('invoiceJadwal').innerText =
                `${tanggal} (${jam})`;

            document.getElementById('stepJadwal')
                .classList.add('d-none');

            document.getElementById('stepPembayaran')

        document.getElementById('hiddenDokterId').value =
    dokterId;

        document.getElementById('modalDokterId').value;


        document.getElementById('invoiceNamaDokter').textContent = dataBooking.nama;
       

        modalBookingTitle.textContent = "Metode Pembayaran";
        stepJadwal.classList.add('d-none');
        stepPembayaran.classList.remove('d-none');
      });

      inputJenisPasien.addEventListener('change', function() {
        if (this.value === "BPJS" || this.value === "Asuransi") {
          dataBooking.hargaTampil = "Rp 0";
          invoiceHarga.textContent = "Rp 0";
          inputMetode.disabled = true;
          inputMetode.removeAttribute('required');
          inputMetode.value = ""; 
        } else {
          dataBooking.hargaTampil = dataBooking.hargaAsli;
          invoiceHarga.textContent = dataBooking.hargaAsli;
          inputMetode.disabled = false;
          inputMetode.setAttribute('required', 'required');
        }
      });

      document.getElementById('btnBackToJadwal').addEventListener('click', function() {
        modalBookingTitle.textContent = "Buat Janji Temu";
        stepPembayaran.classList.add('d-none');
        stepJadwal.classList.remove('d-none');
      });

    function resetModalSteps() {
      modalBookingTitle.textContent = "Buat Janji Temu";
      btnCloseBooking.classList.remove('d-none');
      stepJadwal.classList.remove('d-none');
      stepPembayaran.classList.add('d-none');
      stepSukses.classList.add('d-none');
      inputMetode.disabled = false;
      inputMetode.setAttribute('required', 'required');
      document.getElementById('formBookingJadwal').reset();
      document.getElementById('formPembayaran').reset();
    }
}


document.querySelector('.btn-cari-custom').addEventListener('click', function() {

    let keyword = document.getElementById('searchDoctor')
                          .value
                          .toLowerCase()
                          .trim();

    let cards = document.querySelectorAll('.doctor-card');

    cards.forEach(function(card) {

        let namaDokter = card.querySelector('.doctor-name')
                             .textContent
                             .toLowerCase();

        if (namaDokter.includes(keyword)) {
            card.closest('.col-lg-4').style.display = 'block';
        } else {
            card.closest('.col-lg-4').style.display = 'none';
        }

    });

});

document.querySelector('.btn-lihat-semua').addEventListener('click', function(){

    document.getElementById('searchDoctor').value = '';

    document.querySelectorAll('.doctor-card').forEach(function(card){

        card.closest('.col-lg-4').style.display = '';

    });

});
  </script>

@endif





</body>
</html>