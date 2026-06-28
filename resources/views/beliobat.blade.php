<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beli Obat - Healthcare</title>

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

    /* Header / Nav Mini */
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
    }

    /* Kategori Tab */
    .category-badge { 
      padding: 10px 20px; 
      border-radius: 12px; 
      background: white; 
      color: var(--text-main); 
      font-weight: 500; 
      border: 1px solid #e2e8f0; 
      cursor: pointer; 
      transition: 0.3s; 
      display: inline-block; 
      margin-right: 10px; 
      margin-bottom: 10px; 
    }
    
    .category-badge.active, .category-badge:hover { 
      background: var(--primary-color); 
      color: white; 
      border-color: var(--primary-color); 
    }

    /* Card Obat */
    .medicine-card { 
      background: white; 
      border-radius: 24px; 
      border: 1px solid #e2e8f0; 
      padding: 24px; 
      transition: 0.3s; 
      height: 100%; 
      display: flex; 
      flex-direction: column; 
      justify-content: space-between; 
    }
    
    .medicine-card:hover { 
      transform: translateY(-5px); 
      box-shadow: 0 12px 30px rgba(0,0,0,0.04); 
    }
    
    .med-icon-box { 
      width: 64px; 
      height: 64px; 
      border-radius: 16px; 
      background: #e8faf6; 
      display: flex; 
      justify-content: center; 
      align-items: center; 
      font-size: 28px; 
      color: var(--primary-color); 
      margin-bottom: 16px; 
    }

    .medicine-card h5 { 
      font-size: 16px; 
      font-weight: 600; 
      margin-bottom: 6px; 
    }
    
    .medicine-card .indikas { 
      font-size: 13px; 
      color: var(--text-muted); 
      margin-bottom: 15px; 
    }
    
    .medicine-card .price { 
      font-size: 18px; 
      font-weight: 700; 
      color: var(--text-main); 
    }

    .btn-add-cart { 
      background: #edf9f6; 
      color: var(--primary-color); 
      border: none; 
      width: 40px; 
      height: 40px; 
      border-radius: 12px; 
      display: flex; 
      justify-content: center; 
      align-items: center; 
      transition: 0.3s; 
    }
    
    .btn-add-cart:hover { 
      background: var(--primary-color); 
      color: white; 
    }

    /* Cart Widget */
    .cart-widget { 
      background: white; 
      border-radius: 24px; 
      border: 1px solid #e2e8f0; 
      padding: 24px; 
      position: sticky; 
      top: 30px; 
    }
    
    .btn-checkout { 
      background: var(--primary-color); 
      color: white; 
      border: none; 
      width: 100%; 
      padding: 12px; 
      border-radius: 12px; 
      font-weight: 600; 
      transition: 0.3s; 
    }
    
    .btn-checkout:hover { 
      background: var(--primary-hover); 
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 12px;
      font-size: 14px;
    }

    .btn-remove-item {
      background: transparent;
      border: none;
      color: #ef4444;
      cursor: pointer;
      font-size: 14px;
    }

    /* Style Tambahan untuk Tampilan Admin */
    .card-table { background: white; border-radius: 24px; border: 1px solid #e2e8f0; padding: 30px; }
    .badge-status { padding: 6px 12px; border-radius: 8px; font-weight: 500; font-size: 12px; display: inline-block;}
    .status-diproses { background-color: #fef3c7; color: #d97706; }
    .status-selesai { background-color: #d1fae5; color: #059669; }
  </style>
</head>
<body>

  <div class="container-custom mb-5">
    
    <header class="shop-header">
      <a href="{{ url('/beranda') }}" class="btn-back">
        <i class="bi bi-arrow-left-short fs-4"></i> Kembali ke Beranda
      </a>
      <div>
        <span class="fw-bold text-muted">Menu / Beli Obat</span>
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

   
      
      <div class="p-4 mb-4 rounded-4 text-white" style="background: linear-gradient(135deg, #10b981, #059669);">
        <h1 class="h3 fw-bold m-0"><i class="bi bi-shield-lock"></i> Konsol Admin: Manajemen Pesanan Obat</h1>
        <p class="m-0 mt-1 small" style="opacity: 0.9;">Pantau history masuk transaksi pembelanjaan obat pasien di apotek digital.</p>
      </div>

      {{-- Tombol Tambah Obat (UI Baru) --}}
<div class="my-3 d-flex justify-content-end">
    <button type="button" class="btn btn-success fw-bold px-4 py-2" style="border-radius: 12px;" data-bs-toggle="modal" data-bs-target="#ModalTambahObat">
        <i class="bi bi-plus-circle me-2"></i>Tambah Data Obat
    </button>
</div>

{{-- Modal Tambah Obat (Taruh di paling bawah file, sebelum </body>) --}}
<div class="modal fade" id="ModalTambahObat" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('obat.store') }}" method="POST" class="modal-content" style="border-radius: 24px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            @csrf
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-success"><i class="bi bi-capsule me-2"></i>Input Obat Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-3">
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Nama Obat</label>
                    <input type="text" name="NamaObat" class="form-control rounded-3" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Indikasi/Deskripsi</label>
                    <textarea name="indikasi" class="form-control rounded-3" rows="2" required></textarea>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label small fw-semibold">Kategori</label>
                        <input type="text" name="kategori" class="form-control rounded-3" required>
                    </div>
                    <div class="col-3 mb-3">
                        <label class="form-label small fw-semibold">Stok</label>
                        <input type="number" name="stok" class="form-control rounded-3" required>
                    </div>
                    <div class="col-3 mb-3">
                        <label class="form-label small fw-semibold">Harga</label>
                        <input type="number" name="harga" class="form-control rounded-3" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="submit" class="btn btn-success w-100 py-2 fw-bold" style="border-radius: 12px;">Simpan Data Obat</button>
            </div>
        </form>
    </div>
</div>

      <div class="card-table shadow-sm mt-4">
        <h5 class="fw-bold mb-4 text-dark"><i class="bi bi-cart-check"></i> Daftar Masuk Invoice Pesanan (Riwayat Transaksi)</h5>
        <div class="table-responsive">
          <table class="table table-hover align-middle m-0">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Daftar Obat</th>
                <th>Total Tagihan</th>
                <th>Alamat & Kurir</th>
                <th>Status</th>
                <th class="text-center">Aksi Konfirmasi</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($data_pesanan) && count($data_pesanan) > 0)
                @foreach($data_pesanan as $pesanan)
                <tr>
                  <td><strong>#{{ $pesanan->id }}</strong></td>
                  <td><span class="fw-semibold text-dark">{{ $pesanan->nama_obat }}</span></td>
                  <td class="text-success fw-bold">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                  <td><small class="text-muted">{{ $pesanan->alamat }} (<strong>{{ $pesanan->kurir }}</strong>)</small></td>
                  <td>
                    @if($pesanan->status == 'Selesai')
                      <span class="badge-status status-selesai">Selesai</span>
                    @else
                      <span class="badge-status status-diproses">{{ $pesanan->status ?? 'Diproses' }}</span>
                    @endif
                  </td>
                  <td>
                    <form method="POST" action="{{ route('admin.updateStatusObat') }}" class="d-flex justify-content-center gap-2">
                      @csrf
                      <input type="hidden" name="id_data" value="{{ $pesanan->id }}">
                      <select name="status_baru" class="form-select form-select-sm" style="width: 120px;">
                        <option value="Diproses" {{ $pesanan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $pesanan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                      </select>
                      <button type="submit" class="btn btn-sm btn-success px-2">Save</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center py-5 text-muted">Belum ada invoice transaksi obat masuk di database.</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>

    {{-- ================================================================= --}}
    {{-- 👥 2. SEKSI TAMPILAN UTAMA JIKA YANG MASUK ADALAH USER/PASIEN --}}
    {{-- ================================================================= --}}
   @else
    <div class="p-4 mb-4 rounded-4" style="background: linear-gradient(90deg,#edf9f6,#fff8f7); border: 1px solid #edf9f6;">
        <h1 class="h3 fw-bold">Apotek Digital Terpercaya</h1>
        <p class="text-secondary m-0" style="font-size: 14px;">Cari obat, vitamin, atau suplemen berizin resmi. Pengiriman instan dan aman.</p>
    </div>

    <div class="mb-4">
        <div class="category-badge active">Semua</div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="row g-3">
                @foreach($obat as $o)
                <div class="col-md-6 col-xl-4">
                    <div class="medicine-card h-100">
                        <div>
                            <div class="med-icon-box"><i class="bi bi-capsule"></i></div>
                            <h5>{{ $o->NamaObat }}</h5>
                            <p class="indikas">{{ $o->indikasi }}</p>
                            <p class="small text-muted mb-2">Kategori: {{ $o->kategori }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="price">Rp {{ number_format($o->harga, 0, ',', '.') }}</span>
                            <button class="btn-add-cart" onclick="tambahKeKeranjang('{{ $o->NamaObat }}', {{ $o->harga }})">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-4">
            <div class="cart-widget">
                <h5 class="fw-bold mb-3"><i class="bi bi-cart3 text-success"></i> Keranjang Belanja</h5>
                <hr>
                <div id="wadah-list-keranjang">
                    <div class='py-4 text-center text-muted'>Belum ada obat dipilih</div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-3 fw-bold">
                    <span>Total</span>
                    <span class="text-success" id="total-harga-tampil">Rp 0</span>
                </div>
                <button class="btn-checkout" id="btn-checkout-aksi" data-bs-toggle="modal" data-bs-target="#modalBayarObat" disabled>Lanjut Pembayaran</button>
            </div>
        </div>
    </div>
@endif{{-- 👈 DISINI LOGIKA PEMBATAS UTAMA BLADE YANG SUDAH DIPERBAIKI --}}





  {{-- MODAL CHECKOUT PEMBAYARAN USER --}}
  <div class="modal fade" id="modalBayarObat" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 24px; padding: 15px;">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fw-bold" id="titleModalBayar">Checkout Obat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCloseBayar"></button>
        </div>
        <div id="stepDataBayar">
          <form id="formCheckoutObat">
            <div class="modal-body pt-3">
              <div class="p-3 bg-light rounded-4 mb-3 border border-dashed">
                <div class="d-flex justify-content-between mb-1 small text-secondary">
                  <span>Total Produk</span>
                  <span class="fw-medium text-dark" id="invoiceTotalProduk">0 Item</span>
                </div>
                <div class="d-flex justify-content-between mb-1 small text-secondary">
                  <span>Biaya Ongkir</span>
                  <span class="fw-medium text-success">Gratis Ongkir</span>
                </div>
                <hr class="my-2 text-muted">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-semibold text-dark small">Total Pembayaran</span>
                  <span class="fw-bold text-success fs-5" id="invoiceHargaTotal">Rp 0</span>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Alamat Pengiriman Lengkap</label>
                <textarea class="form-control rounded-3" rows="2" placeholder="Masukkan alamat..." required></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Pilih Opsi Kurir</label>
                <select class="form-select rounded-3 py-2" required>
                  <option value="Instant" selected>Instant (Ojek Online)</option>
                  <option value="Sameday">Same Day</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Pilih Metode Pembayaran</label>
                <select class="form-select rounded-3 py-2" id="metodeBayarPilihan" required>
                  <option value="" selected disabled>-- Pilih Pembayaran --</option>
                  <option value="BCA Virtual Account">BCA Virtual Account</option>
                  <option value="GOPAY">GOPAY</option>
                  <option value="OVO">OVO</option>
                </select>
              </div>
            </div>
            <div class="modal-footer border-0 pt-0">
              <button type="submit" class="btn btn-checkout py-2 fw-semibold w-100" style="border-radius:14px;">Konfirmasi Pembayaran</button>
            </div>
          </form>
        </div>
        <div id="stepSuksesBayar" class="d-none">
          <div class="modal-body pt-3 text-center">
            <h4 class="fw-bold text-dark mb-1">Selesaikan Pembayaran</h4>
            <div class="p-3 bg-light rounded-4 my-3 border">
              <span id="suksesPakaiMetode" class="fw-bold d-block">-</span>
              <h3 class="fw-bold text-success my-2" id="tampilNomorVA">883730821345678</h3>
              <span id="suksesTotalBayar" class="fw-bold text-danger fs-5">Rp 0</span>
            </div>
            <button type="button" class="btn btn-checkout py-2 w-100" onclick="selesaiTransaksi()">Selesai</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  {{-- LOGIKA JAVASCRIPT KERANJANG --}}
  <script>
    let keranjangBelanja = [];
    let totalHarga = 0;

    function tambahKeKeranjang(namaObat, hargaObat) {
      const indexObat = keranjangBelanja.findIndex(item => item.nama === namaObat);
      if (indexObat > -1) { keranjangBelanja[indexObat].qty += 1; } 
      else { keranjangBelanja.push({ nama: namaObat, harga: hargaObat, qty: 1 }); }
      updateTampilanKeranjang();
    }

    function hapusDariKeranjang(namaObat) {
      const indexObat = keranjangBelanja.findIndex(item => item.nama === namaObat);
      if (indexObat > -1) {
        if (keranjangBelanja[indexObat].qty > 1) { keranjangBelanja[indexObat].qty -= 1; } 
        else { keranjangBelanja.splice(indexObat, 1); }
      }
      updateTampilanKeranjang();
    }

    function updateTampilanKeranjang() {
      const wadah = document.getElementById('wadah-list-keranjang');
      const totalTampil = document.getElementById('total-harga-tampil');
      const btnCheckout = document.getElementById('btn-checkout-aksi');
      
      // Jika elemen keranjang tidak ada (karena yang login admin), hentikan script agar tidak error
      if (!wadah) return; 

      totalHarga = 0;
      if (keranjangBelanja.length === 0) {
        wadah.innerHTML = `<div class='py-4 text-center text-muted'>Belum ada obat dipilih</div>`;
        totalTampil.textContent = "Rp 0";
        btnCheckout.disabled = true;
        return;
      }

      let htmlKonten = "";
      let totalItem = 0;
      keranjangBelanja.forEach(item => {
        const subTotalItem = item.harga * item.qty;
        totalHarga += subTotalItem;
        totalItem += item.qty;
        htmlKonten += `<div class='cart-item'>
          <div><strong>${item.nama}</strong><br><small>Rp ${item.harga.toLocaleString('id-ID')} x ${item.qty}</small></div>
          <div><span class='fw-bold text-success'>Rp ${subTotalItem.toLocaleString('id-ID')}</span> <button class='btn-remove-item' onclick="hapusDariKeranjang('${item.nama}')"><i class='bi bi-dash-circle-fill'></i></button></div>
        </div>`;
      });

      wadah.innerHTML = htmlKonten;
      totalTampil.textContent = "Rp " + totalHarga.toLocaleString('id-ID');
      btnCheckout.disabled = false;
      document.getElementById('invoiceTotalProduk').textContent = totalItem + " Produk";
      document.getElementById('invoiceHargaTotal').textContent = "Rp " + totalHarga.toLocaleString('id-ID');
    }

    const formCheckout = document.getElementById('formCheckoutObat');
    if(formCheckout) {
      formCheckout.addEventListener('submit', function(e) {
        e.preventDefault();
        const metodeDipilih = document.getElementById('metodeBayarPilihan').value;
        const alamatInput = formCheckout.querySelector('textarea').value;
        const kurirInput = formCheckout.querySelector('select:nth-of-type(1)').value;
        
        const dataPesanan = {
          alamat: alamatInput,
          kurir: kurirInput,
          metode_bayar: metodeDipilih,
          total_harga: totalHarga,
          keranjang: keranjangBelanja
        };

        fetch("{{ route('obat.simpanPesanan') }}", {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          body: JSON.stringify(dataPesanan)
        })
        .then(response => response.json())
        .then(data => {
          if(data.status === 'success') {
            document.getElementById('tampilNomorVA').textContent = "88373-0821-4432-110";
            document.getElementById('suksesPakaiMetode').textContent = metodeDipilih;
            document.getElementById('suksesTotalBayar').textContent = "Rp " + totalHarga.toLocaleString('id-ID');
            document.getElementById('stepDataBayar').classList.add('d-none');
            document.getElementById('stepSuksesBayar').classList.remove('d-none');
          }
        });
      });
    }

    function selesaiTransaksi() {
      location.reload();
    }
  </script>
</body>
</html>