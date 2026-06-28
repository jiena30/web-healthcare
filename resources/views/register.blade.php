<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healthcare - Pendaftaran Akun</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #10b981;
      --primary-hover: #059669;
      --bg-gradient: linear-gradient(135deg, #edf9f6 0%, #fff8f7 100%);
      --card-bg: #ffffff;
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
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 50px 0;
      overflow-x: hidden;
    }

    @keyframes cubicFadeUp {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .register-container {
      background: var(--card-bg);
      border-radius: 32px;
      box-shadow: 0 30px 60px rgba(16, 185, 129, 0.06);
      padding: 50px;
      width: 100%;
      max-width: 850px;
      border: 1px solid rgba(16, 185, 129, 0.08);
      animation: cubicFadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .form-title {
      font-weight: 700;
      color: var(--text-main);
      font-size: 34px;
      margin-bottom: 8px;
    }

    .form-title span {
      color: var(--primary-color);
    }

    .form-subtitle {
      color: var(--text-muted);
      margin-bottom: 45px;
      font-size: 15px;
    }

    /* STANDARISASI MUTLAK: Semua Kotak Input Di-set Sama Tinggi Semuanya */
    .form-floating > .form-control,
    .form-floating > .form-select {
      border-radius: 16px;
      border: 1.5px solid #e2e8f0;
      height: 62px;
      transition: all 0.25s ease-in-out;
    }

    .form-floating > .form-control:focus,
    .form-floating > .form-select:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.12);
      background-color: #ffffff;
    }

    /* Menghilangkan Tanda Panah Naik-Turun di Kolom NIK Angka */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type=number] {
      -moz-appearance: textfield;
    }

    /* Group Container untuk Label Atas */
    .field-group-container {
      display: flex;
      flex-direction: column;
    }

    .field-label-top {
      font-size: 13px;
      font-weight: 500;
      color: var(--text-muted);
      margin-bottom: 6px;
      padding-left: 2px;
    }

    /* Kotak Radio Button Jenis Kelamin */
    .gender-box-row {
      border: 1.5px solid #e2e8f0;
      border-radius: 16px;
      height: 62px;
      padding: 0 25px;
      display: flex;
      align-items: center;
      gap: 40px;
      background: #ffffff;
      transition: all 0.25s ease-in-out;
    }

    .gender-box-row:focus-within {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.12);
    }

    .form-check-input {
      cursor: pointer;
      width: 1.3em;
      height: 1.3em;
      border: 1.5px solid #cbd5e1;
      transition: all 0.2s ease-in-out;
      margin-top: 0;
    }

    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      transform: scale(1.1);
    }

    .form-check-label {
      cursor: pointer;
      font-size: 15px;
      color: var(--text-main);
      font-weight: 500;
      padding-left: 6px;
      white-space: nowrap;
    }

    /* Upload Box */
    .upload-box {
      border: 1.5px dashed #cbd5e1;
      border-radius: 16px;
      padding: 16px;
      background: #f8fafc;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      height: 62px;
    }

    .upload-box:hover {
      border-color: var(--primary-color);
      background: #edf9f6;
    }

    .upload-box i {
      font-size: 22px;
      color: var(--primary-color);
      transition: transform 0.3s ease;
    }

    .upload-box:hover i {
      transform: translateY(-4px);
    }

    .upload-text {
      font-size: 14px;
      color: var(--text-muted);
    }

    /* Textarea */
    .form-floating > textarea.form-control {
      height: 110px;
    }

    /* Tombol Submit */
    .btn-register {
      background: var(--primary-color);
      color: white;
      border: none;
      padding: 16px;
      border-radius: 18px;
      font-weight: 600;
      font-size: 16px;
      width: 100%;
      margin-top: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
    }

    .btn-register:hover {
      background: var(--primary-hover);
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(16, 185, 129, 0.25);
    }

    .login-link {
      text-align: center;
      margin-top: 25px;
      font-size: 14px;
      color: var(--text-muted);
    }

    .login-link a {
      color: var(--primary-color);
      font-weight: 600;
    }
  </style>
</head>
<body>

   <div class="container d-flex justify-content-center px-3">
    <div class="register-container">
      
      <div class="text-center">
        <h2 class="form-title">Daftar Akun <span>Healthcare</span></h2>
        <p class="form-subtitle">Lengkapi data pribadi dan penjamin medis Anda di bawah ini.</p>
      </div>

      @if(session('success'))
          <div class="alert alert-success border-0 rounded-4 shadow-sm mb-4">
              <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
          </div>
      @endif

      @if(session('error'))
          <div class="alert alert-danger border-0 rounded-4 shadow-sm mb-4">
              <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
          </div>
      @endif

      <form action="{{ route('daftar.proses') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row g-4">
          
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingNama" name="nama_lengkap" placeholder="Nama Lengkap" required>
              <label for="floatingNama"><i class="bi bi-person me-2"></i>Nama Lengkap</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="number" class="form-control" id="floatingNIK" name="nik" placeholder="NIK" required>
              <label for="floatingNIK"><i class="bi bi-card-text me-2"></i>NIK (Sesuai KTP)</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingTempat" name="tempat_lahir" placeholder="Tempat Lahir" required>
              <label for="floatingTempat"><i class="bi bi-geo-alt me-2"></i>Tempat Lahir</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="date" class="form-control" id="floatingTanggal" name="tanggal_lahir" required>
              <label for="floatingTanggal"><i class="bi bi-calendar-event me-2"></i>Tanggal Lahir</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="field-group-container">
              <div class="field-label-top">
                <i class="bi bi-gender-ambiguous me-1"></i> Jenis Kelamin
              </div>
              <div class="gender-box-row">
                <div class="form-check d-flex align-items-center m-0">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioLaki" value="Laki-laki" checked required>
                  <label class="form-check-label" for="radioLaki">Laki-laki</label>
                </div>
                <div class="form-check d-flex align-items-center m-0">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioPerempuan" value="Perempuan">
                  <label class="form-check-label" for="radioPerempuan">Perempuan</label>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="field-group-container">
              <div class="field-label-top">
                <i class="bi bi-credit-card me-1"></i> Metode Pembayaran / Penjamin
              </div>
              <div class="form-floating">
                <select class="form-select" id="floatingMetode" name="jaminan_kesehatan" required>
                  <option value="" disabled selected>Pilih Jaminan Kesehatan</option>
                  <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                  <option value="Asuransi Swasta">Asuransi Swasta</option>
                  <option value="Umum / Mandiri">Mandiri / Umum (Bayar Sendiri)</option>
                </select>
                <label for="floatingMetode">Pilih Opsi Jaminan</label>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <label class="upload-box" for="fileBpjs">
              <i class="bi bi-cloud-arrow-up-fill"></i>
              <span class="upload-text" id="fileNameText">Upload berkas / foto kartu jaminan kesehatan (KTP/BPJS/Asuransi)</span>
              <input type="file" id="fileBpjs" name="foto_berkas" accept="image/*,.pdf" style="display: none;" onchange="updateFileName(this)" required>
            </label>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
              <label for="floatingEmail"><i class="bi bi-envelope me-2"></i>Alamat Email</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
              <label for="floatingPassword"><i class="bi bi-lock me-2"></i>Bikin Password Baru</label>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Alamat Rumah" id="floatingAlamat" name="alamat_lengkap" required></textarea>
              <label for="floatingAlamat"><i class="bi bi-house-door me-2"></i>Alamat Rumah Lengkap</label>
            </div>
          </div>

        </div>

        <button type="submit" name="register" class="btn-register">
            Selesaikan Pendaftaran
        </button>

        <div class="login-link">
          Sudah terdaftar? <a href="/login">Masuk akun</a>
        </div>
      </form>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function updateFileName(input) {
      const textSpan = document.getElementById('fileNameText');
      if (input.files && input.files.length > 0) {
        textSpan.textContent = "✓ Berhasil dipilih: " + input.files[0].name;
        textSpan.style.color = "#10b981";
        textSpan.style.fontWeight = "600";
      }
    }
  </script>

</body>
</html>