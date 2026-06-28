<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk Akun - Healthcare</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #10b981;
      --primary-hover: #059669;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
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
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-container {
      background: #ffffff;
      border-radius: 32px;
      width: 100%;
      max-width: 1050px;
      overflow: hidden;
      box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.08);
      animation: formReveal 0.6s cubic-bezier(0.16, 1, 0.3, 1) both;
    }

    @keyframes formReveal {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login-banner {
      background: #0b1329;
      color: white;
      padding: 55px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
      min-height: 560px;
      position: relative;
    }

    .login-banner::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 60%;
      background: linear-gradient(to top, rgba(16, 185, 129, 0.15), rgba(16, 185, 129, 0));
      pointer-events: none;
    }

    .logo-login {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 26px;
      font-weight: 700;
      color: white;
      text-decoration: none;
    }

    .logo-login i {
      color: var(--primary-color);
      font-size: 32px;
    }

    .banner-text-content h2 {
      font-size: 32px;
      font-weight: 700;
      line-height: 1.3;
      letter-spacing: -0.5px;
    }

    .login-form-area {
      padding: 55px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-title-block h3 {
      font-size: 28px;
      font-weight: 700;
    }

    .form-group-custom {
      position: relative;
      margin-bottom: 18px;
    }

    .form-control-custom {
      width: 100%;
      padding: 14px 16px 14px 48px;
      border-radius: 14px;
      border: 1.5px solid #e2e8f0;
      background: #f8fafc;
      font-size: 15px;
      color: var(--text-main);
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
      outline: none;
    }

    .form-control-custom:focus {
      border-color: var(--primary-color);
      background: #ffffff;
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.05);
    }

    .form-group-custom i.input-icon {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #94a3b8;
      font-size: 18px;
      transition: 0.3s;
    }

    .form-control-custom:focus ~ i.input-icon {
      color: var(--primary-color);
    }

    .btn-toggle-password {
      position: absolute;
      right: 18px;
      top: 50%;
      transform: translateY(-50%);
      background: transparent;
      border: none;
      color: #94a3b8;
      cursor: pointer;
      padding: 0;
    }

    .btn-submit-mewah {
      background: var(--primary-color);
      color: white;
      border: none;
      padding: 16px;
      width: 100%;
      border-radius: 14px;
      font-weight: 700;
      font-size: 16px;
      transition: all 0.3s;
      margin-bottom: 24px;
    }

    .btn-submit-mewah:hover {
      background: var(--primary-hover);
      transform: translateY(-1px);
      box-shadow: 0 10px 20px rgba(5, 150, 105, 0.2);
    }

    .oauth-btn {
      background: #ffffff;
      border: 1.5px solid #e2e8f0;
      padding: 12px;
      border-radius: 14px;
      width: 100%;
      font-weight: 600;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      transition: all 0.2s ease;
      color: #334155;
    }

    .oauth-btn:hover {
      background: #f8fafc;
      border-color: #cbd5e1;
      transform: translateY(-1px);
    }

    @media (max-width: 991px) {
      .login-banner { min-height: auto; padding: 40px; }
      .login-form-area { padding: 40px; }
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="row g-0">
      
      <div class="col-lg-5 d-none d-lg-block">
        <div class="login-banner">
          <a class="logo-login" href="#">
            <i class="bi bi-heart-pulse-fill"></i>
            <span>healthcare</span>
          </a>

          <div class="banner-text-content">
            <h2 class="text-white mb-3">Satu Akun Untuk <br>Semua Layanan Medis</h2>
            <p class="m-0" style="font-size: 14px; line-height: 1.6; color: #94a3b8;">
              Masuk untuk mengelola janji temu dokter, memantau pengiriman obat, memeriksa e-polis asuransi, serta mengunduh berkas rekam medis laboratorium secara instan.
            </p>
          </div>

          <div class="d-flex align-items-center gap-2 text-muted small" style="color: #64748b !important;">
            <i class="bi bi-shield-lock-fill text-success fs-6"></i>
            <span>Data Anda terenkripsi dengan aman</span>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="login-form-area">
          
          <div class="form-title-block mb-4">
            <h3 class="fw-bold text-dark mb-1">Selamat Datang Kembali</h3>
            <p class="text-muted small m-0">Silakan masukkan kredensial akun terdaftar Anda untuk melanjutkan.</p>
          </div>

          @if(session('error'))
            <div class="alert alert-danger rounded-4 small mb-3">
              <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            </div>
          @endif

          <form action="{{ route('login.perform') }}" method="POST" class="w-100">
            @csrf

            <div class="form-group-custom">
              <input type="text" name="email" class="form-control-custom" placeholder="Masukkan email atau root..." required>
              <i class="bi bi-envelope input-icon"></i>
            </div>

            <div class="form-group-custom">
              <input type="password" name="password" id="inputPassword" class="form-control-custom" placeholder="••••••••••" required>
              <i class="bi bi-lock input-icon"></i>
              <button type="button" class="btn-toggle-password" onclick="togglePasswordAksi()">
                <i class="bi bi-eye" id="iconMata"></i>
              </button>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4 small">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label text-secondary" for="rememberMe" style="cursor:pointer;">Ingat saya</label>
              </div>
              <a href="#" class="text-success fw-semibold text-decoration-none">Lupa password?</a>
            </div>

            <button type="submit" class="btn-submit-mewah">
              Masuk ke Dashboard
            </button>

            <div class="position-relative text-center mb-4">
              <hr style="color: #cbd5e1; opacity: 1;">
              <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">atau masuk dengan</span>
            </div>

            <div class="row g-3 mb-4">
              <div class="col-6">
                <button type="button" class="oauth-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google text-danger" viewBox="0 0 16 16">
                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0c2.158 0 4 .799 5.49 2.21l-2.214 2.214C10.223 3.394 9.207 3 8 3c-2.42 0-4.444 1.647-5.176 3.857C2.65 7.175 2.5 7.58 2.5 8c0 .42.15.825.324 1.143-.732 2.21 1.294 3.857 5.176 3.857 1.396 0 2.572-.371 3.426-1.013 1.002-.749 1.667-1.876 1.815-3.384H8.11v-2.9h7.435z"/>
                  </svg>
                  Google
                </button>
              </div>
              <div class="col-6">
                <button type="button" class="oauth-btn">
                  <i class="bi bi-facebook text-primary fs-5" style="line-height:1;"></i>
                  Facebook
                </button>
              </div>
            </div>

           <p class="text-center text-muted small m-0">
  Belum memiliki akun? <a href="{{ route('register') }}" class="text-success fw-bold text-decoration-none">Daftar Sekarang</a>
</p>
          </form>

        </div>
      </div>

    </div>
  </div>

  <script>
    function togglePasswordAksi() {
      const inputPass = document.getElementById('inputPassword');
      const iconMata = document.getElementById('iconMata');

      if (inputPass.type === "password") {
        inputPass.type = "text";
        iconMata.className = "bi bi-eye-slash";
      } else {
        inputPass.type = "password";
        iconMata.className = "bi bi-eye";
      }
    }
  </script>
</body>
</html>