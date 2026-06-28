<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare - Bantuan</title>
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

<div class="container" style="width: 90%; max-width: 1300px; margin: auto;">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid p-0">
            <a class="logo" href="beranda.html">
                <i class="bi bi-heart-pulse-fill"></i>
                <span>healthcare</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-4">
                    <li class="nav-item"><a class="nav-link" href="beranda.html">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="layanan.html">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link " href="artikel.html">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="riwayat.html">Riwayat</a></li>
                    <li class="nav-item"><a class="nav-link active" href="bantuan.html">Bantuan</a></li>
                </ul>
                <div class="d-flex gap-3">
                    <button class="btn-login">Masuk</button>
                    <a href="daftar.html" class="btn-daftar">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="faq-section">
        <h2 class="text-center fw-bold mb-4">Pusat Bantuan</h2>
        <p class="text-center text-muted mb-5">Punya pertanyaan? Kami siap membantu Anda.</p>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#c1">Bagaimana cara mendaftar akun?</button></h2>
                <div id="c1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">Klik tombol "Daftar" di pojok kanan atas, isi nama, email, dan nomor telepon Anda. Ikuti verifikasi melalui SMS atau WhatsApp untuk mengaktifkan akun.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#c2">Apakah konsultasi dokter berbayar?</button></h2>
                <div id="c2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">Ya, setiap sesi konsultasi memiliki tarif yang berbeda tergantung spesialisasi dokter yang Anda pilih. Detail harga akan muncul sebelum Anda melakukan pembayaran.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#c3">Bagaimana cara melacak pengiriman obat?</button></h2>
                <div id="c3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">Anda dapat memantau status pesanan di menu "Riwayat" pada aplikasi kami. Kami akan memberikan nomor resi kurir setelah pesanan Anda diproses.</div>
                </div>
            </div>
        </div>

<div class="mt-5 text-center p-4 bg-white rounded-4 shadow-sm">
            <h5>Butuh bantuan lebih lanjut?</h5>
            <p>Hubungi layanan pelanggan kami 24/7 di:</p>
            <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20butuh%20bantuan" 
               class="btn btn-success rounded-pill px-4" target="_blank">
               <i class="bi bi-whatsapp"></i> Chat WhatsApp
            </a>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>