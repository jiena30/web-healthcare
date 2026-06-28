<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tes Lab & MCU - Healthcare</title>

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
    
    body { 
      background: #f8fcfb; 
      color: var(--text-main); 
      overflow-x: hidden;
    }
    
    .container-custom { 
      width: 92%; 
      max-width: 1450px; 
      margin: auto; 
    }

    /* ================= CINEMATIC ENTRANCE ANIMATION ================= */
    @keyframes slideInFromRight {
      from {
        opacity: 0;
        transform: translateX(40px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes popIn {
      0% { opacity: 0; transform: scale(0.9); }
      100% { opacity: 1; transform: scale(1); }
    }

    .animate-slide-in {
      animation: slideInFromRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
    }
    
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }

    /* Header Nav Mini */
    .shop-header { 
      padding: 30px 0; 
      display: flex; 
      align-items: center; 
      justify-content: space-between; 
    }
    
    .btn-back { 
      color: var(--text-main); 
      font-weight: 600; 
      text-decoration: none; 
      display: inline-flex; 
      align-items: center; 
      gap: 8px; 
      transition: 0.3s; 
    }
    
    .btn-back:hover { 
      color: var(--primary-color);
      transform: translateX(-4px);
    }

    /* Kategori Badges */
    .category-badge { 
      padding: 10px 22px; 
      border-radius: 14px; 
      background: white; 
      color: var(--text-main); 
      font-weight: 500; 
      border: 1px solid #e2e8f0; 
      cursor: pointer; 
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      display: inline-block; 
      margin-right: 10px; 
      margin-bottom: 10px; 
    }
    
    .category-badge.active, .category-badge:hover { 
      background: var(--primary-color); 
      color: white; 
      border-color: var(--primary-color);
      box-shadow: 0 8px 20px rgba(16, 185, 129, 0.25);
      transform: translateY(-2px);
    }

    /* ================= PREMIUM LAB CARD DESIGN ================= */
    .lab-card {
      background: white;
      border-radius: 28px;
      border: 1px solid #e2e8f0;
      padding: 30px;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
    }

    .lab-icon-box {
      width: 60px;
      height: 60px;
      border-radius: 18px;
      background: #e8faf6;
      color: var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      margin-bottom: 20px;
      transition: all 0.4s;
    }

    .lab-card:hover {
      transform: translateY(-6px);
      border-color: var(--primary-color);
      box-shadow: 0 15px 35px rgba(16, 185, 129, 0.06);
    }

    .lab-card:hover .lab-icon-box {
      background: var(--primary-color);
      color: white;
      transform: scale(1.05) rotate(-5deg);
    }

    .parameter-item {
      font-size: 13px;
      color: var(--text-muted);
      margin-bottom: 6px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .parameter-item i {
      color: var(--primary-color);
    }

    .btn-book-lab {
      background: var(--primary-color);
      color: white;
      border: none;
      width: 100%;
      padding: 12px;
      border-radius: 14px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-book-lab:hover {
      background: var(--primary-hover);
      box-shadow: 0 8px 22px rgba(5, 150, 105, 0.25);
    }

    /* Style Panel Tabel Admin */
    .card-table { background: white; border-radius: 24px; border: 1px solid #e2e8f0; padding: 30px; }
    .badge-status { padding: 6px 12px; border-radius: 8px; font-weight: 500; font-size: 12px; display: inline-block;}
    .status-diproses { background-color: #fef3c7; color: #d97706; }
    .status-selesai { background-color: #d1fae5; color: #059669; }
  </style>
</head>
<body>

  <div class="container-custom mb-5">
    
    <header class="shop-header animate-slide-in">
      <a href="{{ url('/beranda') }}" class="btn-back">
        <i class="bi bi-arrow-left-short fs-4"></i> Kembali ke Beranda
      </a>
      <div>
        <span class="fw-bold text-muted">Menu / Tes Lab</span>
      </div>
    </header>

    @if(session('success'))
      <div class="alert alert-success rounded-4 mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
      </div>
    @endif

    {{-- ================================================================= --}}
    {{-- 👑 1. SEKSI TAMPILAN JIKA YANG MASUK ADALAH ADMIN --}}
    {{-- ================================================================= --}}
    @if (Auth::check() && Auth::user()->status == 'admin')
      
      <div class="p-4 p-md-5 mb-4 rounded-4 text-white" style="background: linear-gradient(135deg, #d1fae5, #059669);">
        <h1 class="h3 fw-bold m-0"><i class="bi bi-shield-lock"></i> Konsol Admin: Manajemen Pemeriksaan Laboratorium</h1>
        <p class="m-0 mt-1 small" style="opacity: 0.9;">Pantau dan kelola status booking antrean tes laboratorium medis pasien dari tabel database.</p>
      </div>

      <div class="card-table shadow-sm mt-4">
        <h5 class="fw-bold mb-4 text-dark"><i class="bi bi-clipboard2-pulse"></i> Daftar Masuk Booking Tes Lab</h5>
        <div class="table-responsive">
          <table class="table table-hover align-middle m-0">
            <thead class="table-light">
              <tr>
                <th>ID Lab</th>
                <th>Nama Paket Pemeriksaan</th>
                <th>Tanggal Tes</th>
                <th>Metode Sampel</th>
                <th>Kode Referensi</th>
                <th>Status</th>
                <th class="text-center">Aksi Konfirmasi</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($data_lab) && count($data_lab) > 0)
                @foreach($data_lab as $lab)
                <tr>
                  <td><strong>#{{ $lab->id_lab }}</strong></td>
                  {{-- 🔥 FIXED: paket_name diganti menjadi paket_nama sesuai kolom asli phpMyAdmin --}}
                  <td><span class="fw-semibold text-dark">{{ $lab->paket_nama }}</span></td>
                  <td class="text-muted fw-medium">{{ $lab->tanggal }}</td>
                  <td><span class="badge bg-light text-dark border">{{ $lab->metode }}</span></td>
                  <td><code class="text-primary fw-bold fs-6">{{ $lab->kode_referensi }}</code></td>
                  <td>
                    @if(($lab->status ?? 'Diproses') == 'Selesai')
                      <span class="badge-status status-selesai">Selesai</span>
                    @else
                      <span class="badge-status status-diproses">{{ $lab->status ?? 'Diproses' }}</span>
                    @endif
                  </td>
                  <td>
                    <form method="POST" action="{{ route('admin.updateStatusLab') }}" class="d-flex justify-content-center gap-2">
                      @csrf
                      <input type="hidden" name="id_data" value="{{ $lab->id_lab }}">
                      <select name="status_baru" class="form-select form-select-sm" style="width: 120px;">
                        <option value="Diproses" {{ ($lab->status ?? 'Diproses') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ ($lab->status ?? 'Diproses') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                      </select>
                      <button type="submit" class="btn btn-sm btn-success px-2">Save</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="7" class="text-center py-5 text-muted">Belum ada pasien yang melakukan booking tes laboratorium.</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>

    {{-- ================================================================= --}}
    {{-- 👥 2. SEKSI TAMPILAN UTAMA JIKA YANG MASUK ADALAH USER BISA BOOKING --}}
    {{-- ================================================================= --}}
    @else

      <div class="p-4 p-md-5 mb-4 rounded-4 animate-slide-in delay-1" style="background: linear-gradient(90deg,#edf9f6,#fff8f7); border: 1px solid #edf9f6;">
        <h1 class="display-6 fw-bold">Pemeriksaan Laboratorium Akurat</h1>
        <p class="lead my-3 text-secondary" style="font-size: 16px;">Pilih jenis tes laboratorium atau paket Medical Check-Up resmi. Hasil lab valid dikirim langsung ke aplikasi Anda dalam bentuk PDF digital.</p>
      </div>

      <div class="mb-4 animate-slide-in delay-2">
        <div class="category-badge active">Semua Pemeriksaan</div>
      </div>

      <div class="row g-4 animate-slide-in delay-3">
        
        <div class="col-md-6 col-lg-4">
          <div class="lab-card">
            <div>
              <div class="lab-icon-box"><i class="bi bi-droplet-fill"></i></div>
              <span class="badge bg-danger-subtle text-danger mb-2 rounded-2">Populer</span>
              <h5 class="fw-bold text-dark mb-2">Cek Lab Diabetes Dasar</h5>
              <p class="text-muted small mb-3">Pemeriksaan mendasar untuk memantau kadar glukosa dan risiko kencing manis.</p>
              
              <div class="mb-4">
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> Gula Darah Puasa (GDP)</div>
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> Gula Darah 2 Jam PP</div>
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> HbA1c (Kontrol 3 Bulan)</div>
              </div>
            </div>
            
            <div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Total:</span>
                <span class="fw-bold text-success fs-4">Rp 145.000</span>
              </div>
              <button class="btn-book-lab" data-bs-toggle="modal" data-bs-target="#modalBookingLab" onclick="setPaketMurni('Cek Lab Diabetes Dasar', 'Rp 145.000')">
                  <i class="bi bi-cart-plus-fill me-2"></i>Booking Tes
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="lab-card">
            <div>
              <div class="lab-icon-box" style="background:#eef2ff; color:#4f46e5;"><i class="bi bi-heart-pulse-fill"></i></div>
              <span class="badge bg-primary-subtle text-primary mb-2 rounded-2">Lengkap</span>
              <h5 class="fw-bold text-dark mb-2">Profil Kolesterol & Jantung</h5>
              <p class="text-muted small mb-3">Skrining menyeluruh lemak darah untuk mencegah stroke dan penyumbatan jantung.</p>
              
              <div class="mb-4">
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> Kolesterol Total</div>
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> Kolesterol LDL & HDL</div>
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> Trigliserida</div>
              </div>
            </div>
            
            <div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Total:</span>
                <span class="fw-bold text-success fs-4">Rp 190.000</span>
              </div>
              <button class="btn-book-lab" style="background:#4f46e5;" data-bs-toggle="modal" data-bs-target="#modalBookingLab" onclick="setPaketMurni('Profil Kolesterol & Jantung', 'Rp 190.000')">
                  <i class="bi bi-cart-plus-fill me-2"></i>Booking Tes
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="lab-card">
            <div>
              <div class="lab-icon-box" style="background:#fff7ed; color:#ea580c;"><i class="bi bi-shield-plus"></i></div>
              <span class="badge bg-warning-subtle text-warning mb-2 rounded-2">Premium Gold</span>
              <h5 class="fw-bold text-dark mb-2">Executive Medical Check-Up</h5>
              <p class="text-muted small mb-3">Paket MCU komplit pelindung kesehatan organ vital dalam seluruh tubuh.</p>
              
              <div class="mb-4">
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> Fungsi Hati (SGOT / SGPT)</div>
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> Fungsi Ginjal (Ureum / Kreatinin)</div>
                <div class="parameter-item"><i class="bi bi-check2-circle"></i> Asam Urat & Darah Lengkap</div>
              </div>
            </div>
            
            <div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Biaya Total:</span>
                <span class="fw-bold text-success fs-4">Rp 480.000</span>
              </div>
            <button class="btn-book-lab" style="background:#ea580c;" data-bs-toggle="modal" data-bs-target="#modalBookingLab" onclick="setPaketMurni('Executive Medical Check-Up', 'Rp 480.000')">
                <i class="bi bi-cart-plus-fill me-2"></i>Booking Tes
            </button>
            </div>
          </div>
        </div>

      </div>

    @endif

  </div>

  <div class="modal fade" id="modalBookingLab" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 24px; padding: 15px; animation: popIn 0.4s ease-out both;">
        
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fw-bold" id="titleModalLab">Reservasi Laboratorium</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCloseLab"></button>
        </div>

        <div id="stepFormLab">
          <form id="formSubmitLab">
            <div class="modal-body pt-3">
              <span class="text-muted small d-block mb-1">Paket Pemeriksaan:</span>
              <h4 class="fw-bold text-dark mb-4" id="namaPaketLabTampil">-</h4>
              
              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Metode Pengambilan Sampel</label>
                <select class="form-select rounded-3 py-2" id="metodeSampel" required>
                  <option value="Walk-In" selected>Walk-In (Datang Sendiri ke Klinik Mitra Lab)</option>
                  <option value="Home Service">Home Service (Petugas Lab Datang ke Rumah)</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Tanggal Pelaksanaan Tes</label>
                <input type="date" class="form-control rounded-3 py-2" id="tglTesLab" required>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Pilih Jam Kedatangan</label>
                <select class="form-select rounded-3 py-2" id="jamTesLab" required>
                  <option value="07:00 - 09:00 WIB (Sangat Disarankan)">07:00 - 09:00 WIB (Sangat Disarankan - Kondisi Puasa)</option>
                  <option value="09:00 - 11:00 WIB">09:00 - 11:00 WIB</option>
                  <option value="13:00 - 15:00 WIB">13:00 - 15:00 WIB</option>
                </select>
              </div>
              
              <div class="p-3 bg-light rounded-4 border border-dashed">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="small text-secondary fw-semibold">Total Biaya Layanan</span>
                  <strong class="text-success fs-5" id="hargaPaketLabTampil">Rp 0</strong>
                </div>
              </div>
            </div>
            
            <div class="modal-footer border-0 pt-0">
              <button type="submit" class="btn btn-book-lab py-2 fw-semibold w-100" style="border-radius:14px;">Konfirmasi & Ambil Kode Lab</button>
            </div>
          </form>
        </div>

        <div id="stepSuksesLab" class="d-none">
          <div class="modal-body text-center pt-4 pb-3">
            <div class="mx-auto bg-light text-success d-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px; border-radius: 50%; font-size: 40px; box-shadow: 0 0 15px rgba(16, 185, 129, 0.2)">
              <i class="bi bi-qr-code-scan"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">Pemesanan Sukses!</h4>
            <p class="text-muted px-3 small mb-4">Kode barcode klaim pemeriksaan laboratorium digital Anda resmi diterbitkan.</p>
            
            <div class="bg-light p-3 rounded-4 border text-center mb-3">
              <span class="text-muted d-block small mb-1 fw-medium">KODE REKAM MEDIS LAB</span>
              <h2 class="fw-bold text-success tracking-widest m-0" id="kodeLabAcak">LAB-99238</h2>
              <span class="text-muted d-block mt-2" style="font-size:12px;">Paket: <strong id="suksesNamaPaket" class="text-dark">-</strong></span>
              <span class="text-muted d-block" style="font-size:12px;">Tanggal Aksi: <strong id="suksesTglLab" class="text-dark">-</strong></span>
            </div>
            
            <p class="text-muted mb-0" style="font-size:11px;"><i class="bi bi-exclamation-circle me-1"></i>Catatan: Jika memilih tes diabetes/lemak, harap berpuasa 10-12 jam sebelum petugas mengambil sampel.</p>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-book-lab py-2 fw-semibold w-100" style="border-radius:14px;" onclick="tutupModalSuksesLab()">Selesai & Simpan Kode</button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const modalLab = document.getElementById('modalBookingLab');
    const formLab = document.getElementById('formSubmitLab');
    const stepFormLab = document.getElementById('stepFormLab');
    const stepSuksesLab = document.getElementById('stepSuksesLab');
    const titleModalLab = document.getElementById('titleModalLab');
    const btnCloseLab = document.getElementById('btnCloseLab');

    let namaPaketAktif = "";
    let hargaPaketAktif = "";

    function setPaketMurni(nama, harga) {
      namaPaketAktif = nama;
      hargaPaketAktif = harga;
      
      document.getElementById('namaPaketLabTampil').textContent = nama;
      document.getElementById('hargaPaketLabTampil').textContent = harga;
      console.log("Paket Terkunci:", namaPaketAktif);
    }

    if (modalLab) {
      modalLab.addEventListener('hidden.bs.modal', function () {
        if(formLab) formLab.reset();
        titleModalLab.textContent = "Reservasi Laboratorium";
        if(btnCloseLab) btnCloseLab.classList.remove('d-none');
        stepFormLab.classList.remove('d-none');
        stepSuksesLab.classList.add('d-none');
      });
    }

    if (formLab) {
      formLab.addEventListener('submit', function(e) {
        e.preventDefault();

        namaPaketAktif = document.getElementById('namaPaketLabTampil').textContent;
        hargaPaketAktif = document.getElementById('hargaPaketLabTampil').textContent;

        if (!namaPaketAktif || namaPaketAktif === "-" || namaPaketAktif === "") {
          alert("Gagal memproses: Judul paket pemeriksaan kosong. Silakan tutup modal dan klik ulang tombol Booking Tes.");
          return;
        }

        const nomorAcak = Math.floor(10000 + Math.random() * 90000);
        const kodeGenerated = "LAB-" + nomorAcak;
        
        const tanggalInput = document.getElementById('tglTesLab').value;
        const metodeInput = document.getElementById('metodeSampel').value; 
        const biayaClean = parseInt(hargaPaketAktif.replace(/[^0-9]/g, '')) || 0;

        // 🔥 FIXED: Payload pengiriman JSON diganti dari paket_name menjadi paket_nama agar klop dengan Controller
        const dataBooking = {
          paket_nama: namaPaketAktif,
          tanggal: tanggalInput,
          metode: metodeInput,
          kode_referensi: kodeGenerated,
          total_biaya: biayaClean
        };

        fetch("/tes-lab/simpan-booking", {
          method: 'POST',
          headers: { 
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: JSON.stringify(dataBooking)
        })
        .then(response => response.json())
        .then(data => {
          let serverStatus = data.status ? data.status.toLowerCase() : '';

          if(serverStatus === 'success' || data.success === true) {
            document.getElementById('kodeLabAcak').textContent = kodeGenerated;
            document.getElementById('suksesNamaPaket').textContent = namaPaketAktif;
            document.getElementById('suksesTglLab').textContent = tanggalInput;

            titleModalLab.textContent = "Barcode Pemesanan";
            if(btnCloseLab) btnCloseLab.classList.add('d-none');
            stepFormLab.classList.add('d-none');
            stepSuksesLab.classList.remove('d-none');
          } else {
            alert("Gagal memproses pendaftaran: " + (data.message || "Data ditolak oleh server."));
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert("Terjadi kendala saat menghubungkan ke server.");
        });
      });
    }

    function tutupModalSuksesLab() {
      window.location.reload();
    }
  </script>
</body>
</html>