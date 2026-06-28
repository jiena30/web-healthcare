<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asuransi Premium - Healthcare</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #10b981;
      --primary-hover: #059669;
      --bg-gradient: linear-gradient(135deg, #f0fdf4 0%, #e0f2fe 100%);
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
      background: var(--bg-gradient);
      color: var(--text-main); 
      min-height: 100vh;
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

    /* ================= SUB HEADER (NAVBAR DIHAPUS, BERI JARAK ATASNYA) ================= */
    .shop-header { 
      padding-top: 45px; /* Menurunkan bagian atas agar seimbang dan tidak nempel browser */
      padding-bottom: 35px; 
      display: flex; 
      align-items: center; 
      justify-content: space-between; 
    }
    
    .btn-back-mewah {
      color: var(--text-main);
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .btn-back-mewah:hover {
      color: var(--primary-color);
      transform: translateX(-5px);
    }

    /* ================= DASHBOARD PANEL LAYOUT ================= */
    .dashboard-panel {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.5);
      border-radius: 36px;
      padding: 40px;
      box-shadow: 0 30px 60px rgba(15, 23, 42, 0.05);
      animation: pageReveal 1s cubic-bezier(0.16, 1, 0.3, 1) both;
    }

    @keyframes pageReveal {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .title-area h1 {
      font-size: 36px;
      font-weight: 700;
      letter-spacing: -1px;
    }

    .package-selector-card {
      background: white;
      border: 1.5px solid #e2e8f0;
      border-radius: 20px;
      padding: 20px;
      margin-bottom: 16px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 16px;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .package-selector-card:hover {
      border-color: var(--primary-color);
      transform: scale(1.01) translateX(5px);
    }

    .package-selector-card.active {
      border-color: var(--primary-color);
      background: linear-gradient(90deg, #f0fdf4, #ffffff);
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.08);
    }

    .radio-indicator {
      width: 22px;
      height: 22px;
      border-radius: 50%;
      border: 2px solid #cbd5e1;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: 0.3s;
      flex-shrink: 0;
    }

    .package-selector-card.active .radio-indicator {
      border-color: var(--primary-color);
      background: var(--primary-color);
    }

    .package-selector-card.active .radio-indicator::after {
      content: '';
      width: 8px;
      height: 8px;
      background: white;
      border-radius: 50%;
    }

    /* Right Side Showcase */
    .showcase-display {
      background: #0f172a;
      color: white;
      border-radius: 28px;
      padding: 40px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 0 20px 50px rgba(15, 23, 42, 0.3);
      position: relative;
      overflow: hidden;
    }

    .showcase-display::before {
      content: '';
      position: absolute;
      top: -20%;
      right: -20%;
      width: 250px;
      height: 250px;
      background: radial-gradient(circle, rgba(16, 185, 129, 0.4) 0%, rgba(16, 185, 129, 0) 70%);
      pointer-events: none;
    }

    .content-fluid-animate {
      animation: contentSwitch 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
    }

    @keyframes contentSwitch {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .luxury-badge {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
      padding: 6px 16px;
      border-radius: 30px;
      font-size: 12px;
      font-weight: 500;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--primary-color);
      border: 1px solid rgba(255,255,255,0.05);
      display: inline-block;
    }

    .benefit-line {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 14px;
      font-size: 15px;
      color: #cbd5e1;
    }

    .benefit-line i {
      color: var(--primary-color);
      font-size: 18px;
    }

    .big-price-tag {
      font-size: 38px;
      font-weight: 700;
      color: white;
    }

    .btn-luxury-action {
      background: var(--primary-color);
      color: white;
      border: none;
      padding: 15px;
      width: 100%;
      border-radius: 16px;
      font-weight: 600;
      font-size: 16px;
      transition: all 0.3s;
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
    }

    .btn-luxury-action:hover {
      background: var(--primary-hover);
      transform: translateY(-2px);
      box-shadow: 0 15px 30px rgba(5, 150, 105, 0.4);
    }
  </style>
</head>
<body>

  <div class="container-custom">
    
    <!-- BREADCRUMB / SUB HEADER -->
    <header class="shop-header">
      <a href="{{ url('/beranda') }}"  class="btn-back-mewah">
        <i class="bi bi-arrow-left"></i> Kembali ke Beranda
      </a>
      <div>
        <span class="fw-bold text-muted">Menu / Asuransi Kesehatan</span>
      </div>
    </header>
    
@if (Auth::check() && Auth::user()->status == 'admin')
<div class="dashboard-panel mb-5 p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark m-0">
            <i class="bi bi-shield-lock text-primary me-2"></i>Konsol Admin: Verifikasi Data
        </h4>
        <span class="badge bg-light text-dark border px-3 py-2">
            Total Data: {{ count($dataAsuransi ?? []) }}
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle border-top">
            <thead class="table-light">
                <tr>
                    <th class="py-3">ID Proposal</th>
                    <th class="py-3">Nama Paket</th>
                    <th class="py-3">Nama Lengkap</th>
                    <th class="py-3">Status</th>
                    <th class="py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataAsuransi ?? [] as $item)
                <tr>
                    <td><strong class="text-dark">#{{ $item->id_proposal }}</strong></td>
                    <td class="fw-medium text-primary">{{ $item->nama_poli }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>
                        <span class="badge rounded-pill px-3 py-2 {{ $item->status_verifikasi == 'Selesai' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
                            {{ $item->status_verifikasi }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('update.status', $item->id_asuransi) }}" method="POST" class="d-flex gap-2 justify-content-center">
                            @csrf
                            <select name="status_verifikasi" class="form-select form-select-sm" style="width: 130px; border-radius: 8px;">
                                <option value="Pending" {{ $item->status_verifikasi == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Selesai" {{ $item->status_verifikasi == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary px-3 shadow-sm" style="border-radius: 8px;">
                                <i class="bi bi-check2-circle"></i> Save
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
  @else
      
 
 

    <!-- MAIN DASHBOARD CORE PANEL -->
    <main class="dashboard-panel mb-5">
      <div class="row g-5">
    
        <!-- SISI KIRI: PANEL INTERAKTIF -->
        <div class="col-lg-6 d-flex flex-column justify-content-between">
          <div>
            <div class="title-area mb-4">
              <span class="text-success fw-bold small text-uppercase tracking-wider">Smart Protection</span>
              <h1 class="text-dark">Pilih Model Proteksi <br>Kesehatan Anda</h1>
              <p class="text-muted m-0 mt-2">Klik pada kartu paket di bawah untuk mensimulasikan cakupan perlindungan finansial medis secara instan.</p>
            </div>

            <div class="selector-container">
              
              <!-- Card 1 -->
              <div class="package-selector-card active" onclick="gantiPaketDisplay('Personal', 'Healthcare Basic Personal', 'Proteksi kesehatan komprehensif yang dirancang khusus untuk memenuhi kebutuhan individu aktif.', ['Kamar Rawat Inap Rp 500rb/hari', 'Penggantian Biaya Operasi 100%', 'Limit Klaim Rp 500 Juta/Tahun', 'Fasilitas Cashless di 800+ RS'], 150000)" id="card-Personal">
                <div class="radio-indicator"></div>
                <div>
                  <h6 class="fw-bold m-0 text-dark">Healthcare Basic Personal</h6>
                  <span class="text-muted small">Proteksi Individu / Mandiri</span>
                </div>
                <span class="ms-auto fw-bold text-success" style="font-size:15px;">Rp 150rb<span class="text-muted small fw-normal">/bln</span></span>
              </div>

              <!-- Card 2 -->
              <div class="package-selector-card" onclick="gantiPaketDisplay('Family', 'Healthcare Family Ultimate', 'Satu polis praktis untuk melindungi seluruh anggota keluarga inti (Ayah, Ibu, dan Anak) sekaligus.', ['Kamar Rawat Inap Rp 1.5 Juta/hari', 'Termasuk Rawat Jalan & Perawatan Gigi', 'Limit Klaim Rp 2 Miliar/Tahun', 'Tanggungan Penuh Kamar ICU'], 450000)" id="card-Family">
                <div class="radio-indicator"></div>
                <div>
                  <h6 class="fw-bold m-0 text-dark">Healthcare Family Ultimate</h6>
                  <span class="text-muted small">Proteksi Keluarga Besar (Max 4 Anggota)</span>
                </div>
                <span class="ms-auto fw-bold text-success" style="font-size:15px;">Rp 450rb<span class="text-muted small fw-normal">/bln</span></span>
              </div>

              <!-- Card 3 -->
              <div class="package-selector-card" onclick="gantiPaketDisplay('Senior', 'Healthcare Senior Care', 'Perlindungan kesehatan optimal masa tua untuk mengantisipasi risiko penyakit kritis lansia.', ['Kamar ICU & Isolasi Full-Covered', 'Biaya Obat Tubuh & Laboratorium Lengkap', 'Limit Klaim Rp 1 Miliar/Tahun', 'Konsultasi Dokter Spesialis Tanpa Batas'], 350000)" id="card-Senior">
                <div class="radio-indicator"></div>
                <div>
                  <h6 class="fw-bold m-0 text-dark">Healthcare Senior Care</h6>
                  <span class="text-muted small">Proteksi Khusus Lansia (Usia 55+)</span>
                </div>
                <span class="ms-auto fw-bold text-success" style="font-size:15px;">Rp 350rb<span class="text-muted small fw-normal">/bln</span></span>
              </div>

            </div>
          </div>

          <div class="p-3 bg-white border rounded-4 d-flex align-items-center gap-3 mt-4" style="box-shadow: 0 10px 25px rgba(0,0,0,0.01);">
            <div class="bg-success-subtle text-success p-2 rounded-3 fs-4"><i class="bi bi-shield-fill-check"></i></div>
            <div class="small">
              <strong class="text-dark d-block">Terdaftar & Diawasi OJK</strong>
              <span class="text-muted">Seluruh produk proteksi dijamin aman regulasi hukum.</span>
            </div>
          </div>
        </div>

        <!-- SISI KANAN: PREVIEW PREMI -->
        <div class="col-lg-6">
          <div class="showcase-display">
            <div id="fluid-animation-container" class="content-fluid-animate">
              
              <div class="mb-4">
                <div class="luxury-badge" id="previewBadge">Individu</div>
              </div>

              <h2 class="fw-bold mb-3 fs-3" id="previewJudul">Healthcare Basic Personal</h2>
              <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;" id="previewDeskripsi">
                Proteksi kesehatan komprehensif yang dirancang khusus untuk memenuhi kebutuhan individu aktif.
              </p>

              <hr style="border-color: rgba(255,255,255,0.1);" class="my-4">

              <h6 class="text-white fw-bold mb-3 small tracking-widest text-uppercase">Benefit Ringkasan Cakupan:</h6>
              <div id="previewBenefits">
                <div class="benefit-line"><i class="bi bi-check-circle-fill"></i> <span>Kamar Rawat Inap Rp 500rb/hari</span></div>
                <div class="benefit-line"><i class="bi bi-check-circle-fill"></i> <span>Penggantian Biaya Operasi 100%</span></div>
                <div class="benefit-line"><i class="bi bi-check-circle-fill"></i> <span>Limit Klaim Rp 500 Juta/Tahun</span></div>
                <div class="benefit-line"><i class="bi bi-check-circle-fill"></i> <span>Fasilitas Cashless di 800+ RS</span></div>
              </div>

            </div>

            <div class="mt-5 pt-3 border-top" style="border-color: rgba(255,255,255,0.1) !important;">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <span class="text-muted d-block small text-uppercase tracking-wider">Iuran Bulanan</span>
                  <div class="big-price-tag" id="previewHarga">Rp 150.000</div>
                </div>
                <span class="badge bg-success text-white px-3 py-2 rounded-pill small fw-semibold"><i class="bi bi-lightning-charge-fill me-1"></i>Instan Approval</span>
              </div>
              <button class="btn-luxury-action" data-bs-toggle="modal" data-bs-target="#modalDaftarAsuransi" id="btnAksiBeli">
                <i class="bi bi-file-earmark-medical me-2"></i>Mulai Ajukan Proteksi Online
              </button>
            </div>

          </div>
        </div>

      </div>
    </main>
  </div>

  <!-- ================= MODAL REGISTRASI ================= -->
  <div class="modal fade" id="modalDaftarAsuransi" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 28px; padding: 15px; border: none; box-shadow: 0 30px 60px rgba(0,0,0,0.2);">
        
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fw-bold" id="titleModalAsuransi">Formulir Pengajuan Berkas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCloseAsuransi"></button>
        </div>

        <div id="stepFormAsuransi">
  <form id="formSubmitAsuransi">
    @csrf
    <input type="hidden" name="nama_poli" id="inputNamaPoli">
    
    <div class="modal-body pt-3">
      <span class="text-muted small d-block mb-1">Paket Proteksi Terpilih:</span>
      <h5 class="fw-bold text-success mb-4" id="namaModalPaket">-</h5>

      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="inputNamaLengkap" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label small fw-semibold text-secondary">Nomor Handphone Aktif</label>
        <input type="tel" name="nomor_hp" id="inputNomorHp" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Metode Autodebet</label>
        <select name="metode_autodebet" id="inputMetode" class="form-select" required>
          <option value="Autodebet BCA">BCA Autodebet Rekening</option>
          <option value="Autodebet Mandiri">Mandiri Virtual Autodebet</option>
          <option value="Manual Transaksi">E-Wallet</option>
        </select>
      </div>
      
      <button type="submit" class="btn btn-luxury-action py-3 w-100">Kirim Berkas Underwriting</button>
    </div>
  </form>
</div>

        <div id="stepSuksesAsuransi" class="d-none">
          <div class="modal-body text-center pt-4 pb-3">
            <div class="mx-auto bg-success-subtle text-success d-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px; border-radius: 50%; font-size: 40px;">
              <i class="bi bi-shield-fill-check"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">Pengajuan Diterima!</h4>
            <p class="text-muted px-3 small mb-4">Proposal data e-polis kontrak Anda sedang diverifikasi otomatis oleh sistem AI underwriting.</p>
            
            <div class="text-start p-3 bg-light rounded-4 border small mb-2 text-secondary">
              <div class="mb-1"><strong>ID PROPOSAL:</strong> <span class="text-dark fw-medium" id="ProposalID">POLIS-784920</span></div>
              <div class="mb-1"><strong>Produk Proteksi:</strong> <span id="suksesNamaPaket" class="text-dark fw-medium">-</span></div>
              <div class="mb-1"><strong>Status Aktif:</strong> <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-2">Review 1x24 Jam</span></div>
            </div>
            <p class="text-muted mt-3 mb-0" style="font-size:11px;"><i class="bi bi-info-circle me-1"></i>Dokumen lengkap polis klaim (.pdf) dikirim ke email terdaftar Anda.</p>
          </div>
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-luxury-action py-2 w-100" style="border-radius:14px;" onclick="tutupModalAsuransiAkhir()">Selesai & Simpan Polis</button>
          </div>
        </div>

      </div>
    </div>
  </div>
 @endif
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    let globalNamaPaket = "Healthcare Basic Personal";
    let globalHargaPaket = 150000;

    function gantiPaketDisplay(tipeKey, nama, deskripsi, arrayBenefit, harga) {
      document.querySelectorAll('.package-selector-card').forEach(card => {
        card.classList.remove('active');
      });
      document.getElementById('card-' + tipeKey).classList.add('active');

      const containerKanan = document.getElementById('fluid-animation-container');
      containerKanan.classList.remove('content-fluid-animate');
      void containerKanan.offsetWidth; 
      containerKanan.classList.add('content-fluid-animate');

      document.getElementById('previewBadge').textContent = tipeKey === 'Personal' ? 'Individu' : (tipeKey === 'Family' ? 'Keluarga Maksimal' : 'Senior');
      document.getElementById('previewJudul').textContent = nama;
      document.getElementById('previewDeskripsi').textContent = deskripsi;
      
      // Update harga di tampilan utama (kanan)
      document.getElementById('previewHarga').textContent = "Rp " + harga.toLocaleString('id-ID');

      // --- TAMBAHKAN INI UNTUK UPDATE HARGA DI MODAL ---
      document.getElementById('hargaModalPremi').textContent = "Rp " + harga.toLocaleString('id-ID');

      let htmlBenefit = "";
      arrayBenefit.forEach(b => {
        htmlBenefit += `<div class="benefit-line"><i class="bi bi-check-circle-fill"></i> <span>${b}</span></div>`;
      });
      document.getElementById('previewBenefits').innerHTML = htmlBenefit;

      // Update variabel global
      globalNamaPaket = nama;
      globalHargaPaket = harga;
    }

    const modalAsuransi = document.getElementById('modalDaftarAsuransi');
    const formAsuransi = document.getElementById('formSubmitAsuransi');
    const stepFormAsuransi = document.getElementById('stepFormAsuransi');
    const stepSuksesAsuransi = document.getElementById('stepSuksesAsuransi');
    const titleModalAsuransi = document.getElementById('titleModalAsuransi');
    const btnCloseAsuransi = document.getElementById('btnCloseAsuransi');

    if (modalAsuransi) {
      modalAsuransi.addEventListener('show.bs.modal', () => {
        document.getElementById('namaModalPaket').textContent = globalNamaPaket;

        // Tambahan: Mengisi nilai ke input tersembunyi agar terbaca di Controller
        document.getElementById('inputNamaPoli').value = globalNamaPaket; 

        document.getElementById('hargaModalPremi').textContent = "Rp " + globalHargaPaket.toLocaleString('id-ID');
      });
    }

    formAsuransi.addEventListener('submit', function(e) {
    e.preventDefault();

    const dataAsuransi = {
        nama_poli: globalNamaPaket, // Menggunakan variabel global
        nama_lengkap: document.getElementById('inputNamaLengkap').value,
        nomor_hp: document.getElementById('inputNomorHp').value, // Mengambil dari input
        metode_autodebet: document.getElementById('inputMetode').value
    };

    fetch("{{ route('simpan.asuransi') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(dataAsuransi)
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            // Update tampilan sukses
            document.getElementById('stepFormAsuransi').classList.add('d-none');
            document.getElementById('stepSuksesAsuransi').classList.remove('d-none');
            document.getElementById('titleModalAsuransi').textContent = "Pengajuan Berhasil";
            
            // Isi data ke tampilan sukses
            document.getElementById('ProposalID').textContent = data.id_proposal;
            document.getElementById('suksesNamaPaket').textContent = globalNamaPaket;
        }
    })
    .catch(error => console.error('Error:', error));
});

    function tutupModalAsuransiAkhir() {
      const modalInstance = bootstrap.Modal.getInstance(modalAsuransi);
      modalInstance.hide();

      titleModalAsuransi.textContent = "Formulir Pengajuan Berkas";
      btnCloseAsuransi.classList.remove('d-none');
      stepFormAsuransi.classList.remove('d-none');
      stepSuksesAsuransi.classList.add('d-none');
      formAsuransi.reset();
    }
    
     // Hapus semua fungsi tutupModalAsuransiAkhir yang lama dan ganti dengan ini:
    function tutupModalAsuransiAkhir() {
        // Cukup reload halaman setelah user menekan tombol "Selesai"
        window.location.reload();
    }
  </script>
</body>


</html>