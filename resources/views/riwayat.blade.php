<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare - Riwayat Janji Medis</title>
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
        
        .btn-login { border: 1.5px solid #e2e8f0; background: transparent; color: var(--text-main); padding: 8px 24px; border-radius: 12px; font-weight: 600; transition: 0.3s; text-decoration: none; display: flex; align-items: center; }
        .btn-login:hover { border-color: var(--primary-color); color: var(--primary-color); }
        .btn-daftar { background: var(--primary-color); color: white; padding: 9px 26px; border-radius: 12px; font-weight: 600; border: none; text-decoration: none; transition: 0.3s; }
        .btn-daftar:hover { background: var(--primary-hover); color: white; }

        .badge-status { padding: 6px 14px; border-radius: 10px; font-weight: 600; font-size: 13px; display: inline-block; }
        .status-selesai { background-color: #d1fae5; color: #059669; }
        .status-proses { background-color: #fef3c7; color: #d97706; }
        .status-batal { background-color: #fee2e2; color: #dc2626; }
        
        .table-container { background: white; border-radius: 24px; padding: 25px; border: 1px solid #e2e8f0; box-shadow: 0 10px 20px rgba(0,0,0,0.02); }
        .table th { color: #64748b; font-weight: 600; border-bottom: 2px solid #e2e8f0; padding: 15px 10px; }
        .table td { padding: 20px 10px; border-bottom: 1px solid #f1f5f9; }
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
            <li class="nav-item"><a class="nav-link" href="{{ url('/artikel') }}">Artikel</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ url('/riwayat') }}">Riwayat</a></li>
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
        <h2 class="fw-bold mb-4"><i class="bi bi-clock-history text-success"></i> Riwayat Layanan Anda</h2>
        
        <div class="table-container">
            <div class="table-responsive">
                <table class="table align-middle m-0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Layanan</th>
                            <th>Fasilitas Kesehatan / Poliklinik</th>
                            <th class="text-center">No. Antrean</th>
                            <th>Status Proses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data_janji as $janji)
                        <tr>
                            <td class="fw-medium text-secondary">{{ $janji->tanggal }}</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary rounded-3 px-2 py-1">
                                    <i class="bi bi-calendar-event"></i> Janji Medis
                                </span>
                            </td>
                            <td>
                                <strong class="text-dark d-block">{{ $janji->nama_faskes }}</strong>
                                <small class="text-muted">Poliklinik: {{ $janji->poli }}</small>
                            </td>
                            <td class="text-center">
                                <span class="fw-bold text-primary bg-light border px-3 py-1 rounded-3">
                                    {{ $janji->nomor_antrean }}
                                </span>
                            </td>
                            <td>
                                @if($janji->status == 'Selesai')
                                    <span class="badge-status status-selesai">Selesai</span>
                                @elseif($janji->status == 'Batal' || $janji->status == 'Dibatalkan')
                                    <span class="badge-status status-batal">Batal</span>
                                @else
                                    <span class="badge-status status-proses">{{ $janji->status ?? 'Diproses' }}</span>
                                @endif
                            </td>
                            <td><button class="btn btn-sm btn-outline-secondary rounded-3 px-3">Detail</button></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-calendar-x fs-1 d-block mb-2 text-secondary"></i> Anda belum memiliki riwayat antrean janji medis.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>