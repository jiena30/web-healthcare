<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Janji Medis - Healthcare</title>

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

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes scaleIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    .animate-fade-up {
      animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
    }
    
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }

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
      transform: translateX(-3px);
    }

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
      box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
      transform: translateY(-2px);
    }

    /* Card RS & Tabel Admin Layout */
    .hospital-card {
      background: white;
      border-radius: 28px;
      border: 1px solid #e2e8f0;
      overflow: hidden;
      transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .img-hover-container {
      position: relative;
      overflow: hidden;
      height: 200px;
      background: #edf9f6;
    }

    .img-hover-container i {
      font-size: 64px;
      color: var(--primary-color);
      transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .hospital-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
      border-color: var(--primary-color);
    }

    .hospital-card:hover .img-hover-container i {
      transform: scale(1.15) rotate(5deg);
    }

    .card-body-custom {
      padding: 26px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .facility-tag {
      font-size: 11px;
      background: #f1f5f9;
      color: #475569;
      padding: 4px 10px;
      border-radius: 8px;
      font-weight: 500;
      display: inline-block;
      margin-right: 6px;
      margin-bottom: 6px;
    }

    .btn-make-appointment {
      background: var(--primary-color);
      color: white;
      border: none;
      width: 100%;
      padding: 12px;
      border-radius: 14px;
      font-weight: 600;
      transition: all 0.3s;
      margin-top: auto;
    }

    .btn-make-appointment:hover {
      background: var(--primary-hover);
      box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
    }

    .card-table { background: white; border-radius: 24px; border: 1px solid #e2e8f0; padding: 30px; }
  </style>
</head>
<body>

  <div class="container-custom mb-5">
    
    <header class="shop-header animate-fade-up">
      <a href="{{ url('/beranda') }}" class="btn-back">
        <i class="bi bi-arrow-left-short fs-4"></i> Kembali ke Beranda
      </a>
      <div>
        <span class="fw-bold text-muted">Menu / Janji Medis</span>
      </div>
    </header>

    @if(session('success_update'))
      <div class="alert alert-success rounded-4 mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success_update') }}
      </div>
    @endif

    {{-- ================================================================= --}}
    {{-- 👑 1. TAMPILAN DASHBOARD RIWAYAT (KHUSUS ADMIN) --}}
    {{-- ================================================================= --}}
   @if (Auth::check() && Auth::user()->status == 'admin')
      
      <div class="p-4 p-md-5 mb-4 rounded-4 text-white animate-fade-up delay-1" style="background: linear-gradient(135deg, #10b981, #059669);">
        <h1 class="display-6 fw-bold m-0"><i class="bi bi-shield-lock me-2"></i> Konsol Admin: Antrean Janji Medis</h1>
        <p class="lead my-2" style="font-size: 16px; opacity: 0.9;">Pantau rekam masuk booking faskes poliklinik dan ubah status kedatangan pasien.</p>
      </div>

      <div class="card-table shadow-sm mt-4 animate-fade-up delay-2">
        <h5 class="fw-bold mb-4 text-dark"><i class="bi bi-calendar2-heart"></i> Daftar Reservasi Antrean Masuk</h5>
        <div class="table-responsive">
          <table class="table table-hover align-middle m-0">
            <thead class="table-light">
              <tr>
                <th>No Antrean</th>
                <th>Fasilitas Kesehatan</th>
                <th>Poliklinik</th>
                <th>Tanggal Kunjungan</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($data) && count($data) > 0)
                @foreach($data as $row)
                <tr>
                  <td><span class="badge bg-success px-3 py-2 fw-bold fs-6" style="border-radius:10px;">{{ $row->nomor_antrean }}</span></td>
                  <td><span class="fw-bold text-dark">{{ $row->nama_faskes }}</span></td>
                  <td><span class="text-secondary fw-medium">{{ $row->poli }}</span></td>
                  <td><i class="bi bi-calendar3 text-muted me-1"></i> {{ date('d M Y', strtotime($row->tanggal)) }}</td>
                  <td>
                    @if($row->status == 'Selesai')
                      <span class="badge bg-success-subtle text-success border border-success px-2 py-1.5 rounded-2">Selesai</span>
                    @else
                      <span class="badge bg-warning-subtle text-warning border border-warning px-2 py-1.5 rounded-2">{{ $row->status ?? 'Diproses' }}</span>
                    @endif
                  </td>
                  <td>
                    <form method="POST" action="{{ route('admin.updateStatusJanji') }}" class="d-flex justify-content-center gap-2">
                      @csrf
                      <input type="hidden" name="id_data" value="{{ $row->id_antrean }}">
                      <select name="status_baru" class="form-select form-select-sm" style="width: 110px;">
                        <option value="Diproses" {{ $row->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $row->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                      </select>
                      <button type="submit" class="btn btn-sm btn-success px-2">Save</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center py-5 text-muted">Belum ada data antrean kunjungan medis di database.</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>

    {{-- ================================================================= --}}
    {{-- 👥 2. TAMPILAN PILIHAN AMBIL ANTREAN (KHUSUS USER) --}}
    {{-- ================================================================= --}}
    @else

      <div class="p-4 p-md-5 mb-4 rounded-4 animate-fade-up delay-1" style="background: linear-gradient(90deg,#edf9f6,#fff8f7); border: 1px solid #edf9f6;">
        <div class="col-md-8 px-0">
          <h1 class="display-6 fw-bold">Buat Janji Temu Faskes Mudah</h1>
          <p class="lead my-3 text-secondary" style="font-size: 16px;">Lewati antrean panjang loket administrasi. Ambil nomor antrean poliklinik rumah sakit dan klinik pilihan Anda secara online dan aman.</p>
        </div>
      </div>

      <div class="mb-4 animate-fade-up delay-2">
        <div class="category-badge active">Semua Faskes</div>
      </div>

      <div class="row g-4 animate-fade-up delay-3">
        
        <div class="col-md-6 col-lg-4">
          <div class="hospital-card">
            <div class="img-hover-container d-flex align-items-center justify-content-center">
              <i class="bi bi-hospital"></i>
            </div>
            <div class="card-body-custom">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-2" style="font-size:11px;">Buka 24 Jam</span>
                <span class="text-warning small fw-bold"><i class="bi bi-star-fill me-1"></i>4.8</span>
              </div>
              <h5 class="fw-bold text-dark mb-2">Rumah Sakit Sehat Sejahtera</h5>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> Jakarta Pusat (2.4 km)</p>
              
              <div class="mb-4">
                <span class="facility-tag">IGD 24 Jam</span>
                <span class="facility-tag">Poli Anak</span>
                <span class="facility-tag">Poli Jantung</span>
                <span class="facility-tag">BPJS Checked</span>
              </div>

              <button class="btn-make-appointment" data-bs-toggle="modal" data-bs-target="#modalJanjiMedis" data-faskes="Rumah Sakit Sehat Sejahtera">
                <i class="bi bi-calendar-check-fill me-2"></i>Ambil Antrean
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="hospital-card">
            <div class="img-hover-container d-flex align-items-center justify-content-center" style="background:#f0f7ff;">
              <i class="bi bi-building-plus" style="color:#2563eb;"></i>
            </div>
            <div class="card-body-custom">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-2" style="font-size:11px;">Buka Hari Ini</span>
                <span class="text-warning small fw-bold"><i class="bi bi-star-fill me-1"></i>4.7</span>
              </div>
              <h5 class="fw-bold text-dark mb-2">Klinik Utama Medika Prima</h5>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> Jakarta Selatan (4.1 km)</p>
              
              <div class="mb-4">
                <span class="facility-tag">Poli Gigi</span>
                <span class="facility-tag">Dokter Umum</span>
                <span class="facility-tag">Apotek Internal</span>
              </div>

              <button class="btn-make-appointment" style="background:#2563eb;" data-bs-toggle="modal" data-bs-target="#modalJanjiMedis" data-faskes="Klinik Utama Medika Prima">
                <i class="bi bi-calendar-check-fill me-2"></i>Ambil Antrean
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="hospital-card">
            <div class="img-hover-container d-flex align-items-center justify-content-center" style="background:#fff7ed;">
              <i class="bi bi-clipboard2-pulse" style="color:#ea580c;"></i>
            </div>
            <div class="card-body-custom">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-2" style="font-size:11px;">Buka Hari Ini</span>
                <span class="text-warning small fw-bold"><i class="bi bi-star-fill me-1"></i>4.9</span>
              </div>
              <h5 class="fw-bold text-dark mb-2">Laboratorium Medis BioTest</h5>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> Jakarta Barat (5.0 km)</p>
              
              <div class="mb-4">
                <span class="facility-tag">Medical Check Up</span>
                <span class="facility-tag">Tes Darah</span>
                <span class="facility-tag">Drive-Thru Ready</span>
              </div>

              <button class="btn-make-appointment" style="background:#ea580c;" data-bs-toggle="modal" data-bs-target="#modalJanjiMedis" data-faskes="Laboratorium Medis BioTest">
                <i class="bi bi-calendar-check-fill me-2"></i>Ambil Antrean
              </button>
            </div>
          </div>
        </div>

      </div>

    @endif

  </div>

  <div class="modal fade" id="modalJanjiMedis" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 24px; padding: 15px; animation: scaleIn 0.4s ease-out both;">
        
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fw-bold" id="titleModalJanji">Registrasi Kunjungan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCloseJanji"></button>
        </div>

        <div id="stepFormJanji">
          <form action="{{ route('janji.simpan') }}" method="POST" id="formSubmitJanji">
            @csrf
            <input type="hidden" name="nama_dokter" id="inputNamaDokter" value="">

            <div class="modal-body pt-3">
              <span class="text-muted small d-block mb-1">Fasilitas Kesehatan Terpilih:</span>
              <h4 class="fw-bold text-success mb-4" id="namaFaskesTampil">-</h4>
              
              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Pilih Poliklinik / Layanan Spesialis</label>
                <select name="spesialisasi" class="form-select rounded-3 py-2" required>
                  <option value="" selected disabled>-- Pilih Poliklinik --</option>
                  <option value="Poliklinik Anak">Poliklinik Anak</option>
                  <option value="Poliklinik Penyakit Dalam">Poliklinik Penyakit Dalam</option>
                  <option value="Poliklinik Gigi & Mulut">Poliklinik Gigi & Mulut</option>
                  <option value="Laboratorium MCU">Laboratorium MCU (Medical Check Up)</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Metode Penjaminan / Pembiayaan</label>
                <select name="jam_janji" class="form-select rounded-3 py-2" id="penjaminanPasien" required>
                  <option value="Umum / Mandiri" selected>Umum (Bayar Mandiri di RS)</option>
                  <option value="BPJS Kesehatan">BPJS Kesehatan (Rujukan Faskes 1)</option>
                  <option value="Asuransi Swasta">Asuransi Swasta</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Tanggal Rencana Kunjungan</label>
                <input type="date" name="tanggal_janji" class="form-control rounded-3 py-2" id="tglKunjungan" required>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Keluhan Utama Singkat</label>
                <input type="text" name="keluhan" class="form-control rounded-3 py-2" placeholder="Contoh: Demam naik turun 3 hari" required>
              </div>
            </div>
            
            <div class="modal-footer border-0 pt-0">
              <button type="submit" class="btn btn-make-appointment py-2 fw-semibold w-100" style="border-radius:14px;">Konfirmasi & Ambil Tiket</button>
            </div>
          </form>
        </div>

        <div id="stepSuksesJanji" class="d-none">
          <div class="modal-body text-center pt-4 pb-3">
            <div class="mx-auto bg-light text-success d-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px; border-radius: 50%; font-size: 40px; box-shadow: 0 0 15px rgba(16, 185, 129, 0.2);">
              <i class="bi bi-ticket-perforated-fill"></i>
            </div>
            <h4 class="fw-bold text-dark mb-2">Registrasi Berhasil!</h4>
            <p class="text-muted px-2 small mb-4">Nomor antrean digital Anda telah berhasil diterbitkan oleh sistem.</p>
            
            <div class="bg-light p-3 rounded-4 border text-center mb-3">
              <span class="text-muted d-block small mb-1 fw-medium">NOMOR ANTRIAN DIGITAL</span>
              <h1 class="display-5 fw-bold text-success m-0" id="nomorAntreanAcak">A-042</h1>
              <span class="text-muted d-block mt-2" style="font-size:12px;">Lokasi: <strong id="suksesRS" class="text-dark">-</strong></span>
              <span class="text-muted d-block" style="font-size:12px;">Tanggal: <strong id="suksesTgl" class="text-dark">-</strong></span>
            </div>
            
            <p class="text-muted mb-0" style="font-size:11px;"><i class="bi bi-info-circle me-1"></i>Tunjukkan barcode tiket digital di aplikasi/halaman ini ke loket pendaftaran faskes.</p>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-make-appointment py-2 fw-semibold w-100" style="border-radius:14px;" onclick="tutupModalSukses()">Selesai & Simpan Tiket</button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const modalJanji = document.getElementById('modalJanjiMedis');
    const formJanji = document.getElementById('formSubmitJanji');
    const stepFormJanji = document.getElementById('stepFormJanji');
    const stepSuksesJanji = document.getElementById('stepSuksesJanji');
    const titleModalJanji = document.getElementById('titleModalJanji');
    const btnCloseJanji = document.getElementById('btnCloseJanji');

    let namaFaskesAktif = "";

    if (modalJanji) {
      modalJanji.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        namaFaskesAktif = button.getAttribute('data-faskes');
        document.getElementById('namaFaskesTampil').textContent = namaFaskesAktif;
        document.getElementById('inputNamaDokter').value = namaFaskesAktif;
      });
    }

    @if(session('success'))
      document.addEventListener("DOMContentLoaded", function() {
        const modalInstance = new bootstrap.Modal(modalJanji);
        
        document.getElementById('nomorAntreanAcak').textContent = "{{ session('nomor_tiket') }}";
        document.getElementById('suksesRS').textContent = "{{ session('rs_nama') ?? 'Fasilitas Kesehatan' }}";
        document.getElementById('suksesTgl').textContent = "{{ session('tgl_nama') ?? date('Y-m-d') }}";

        titleModalJanji.textContent = "Antrean Diterbitkan";
        btnCloseJanji.classList.add('d-none');
        stepFormJanji.classList.add('d-none');
        stepSuksesJanji.classList.remove('d-none');
        
        modalInstance.show();
      });
    @endif

    function tutupModalSukses() {
      window.location.reload();
    }
  </script>
</body>
</html>