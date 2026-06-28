<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { background: #f8fafc; font-family: 'Segoe UI', sans-serif; }
        .card-profil { border-radius: 24px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .btn-green { background: #10b981; color: white; border-radius: 12px; }
        .btn-green:hover { background: #059669; color: white; }
        .profil-input { border-radius: 12px; border: 1px solid #e2e8f0; padding: 12px; }
    </style>
</head>
<body class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-profil p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ url('/beranda') }}" class="text-decoration-none text-muted"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
                    <h5 class="fw-bold m-0 text-success">Profil Saya</h5>
                </div>

             <div class="text-center mb-4">
    <div class="position-relative d-inline-block">
<img src="{{ !empty($user->foto) ? (str_contains($user->foto, 'profiles/') ? asset('storage/'.$user->foto) : asset('storage/profiles/'.$user->foto)) : 'https://ui-avatars.com/api/?name='.urlencode($user->nama_lengkap).'&background=10b981&color=fff' }}" 
     class="rounded-circle border border-4 border-white shadow" 
     width="130" height="130" 
     style="object-fit: cover; background-color: #e2e8f0;"
     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($user->nama_lengkap) }}&background=10b981&color=fff'">
    </div>

   <form action="{{ route('profil.updateFoto') }}" method="POST" enctype="multipart/form-data" class="mt-3 mb-4">
    @csrf
    <div class="d-flex justify-content-center align-items-center">
        <input type="file" name="foto" class="form-control form-control-sm w-50 me-2" required accept="image/*">
        <button type="submit" class="btn btn-sm btn-outline-success">Ganti</button>
    </div>
</form>

                <form action="{{ route('profil.update') }}" method="POST" onsubmit="enableInputs()">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="small text-muted fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control profil-input" value="{{ $user->nama_lengkap }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted fw-bold">NIK</label>
                            <input type="text" name="nik" class="form-control profil-input" value="{{ $user->nik }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted fw-bold">Email</label>
                            <input type="email" name="email" class="form-control profil-input" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted fw-bold">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control profil-input" value="{{ $user->tempat_lahir }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted fw-bold">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control profil-input" value="{{ $user->tanggal_lahir }}" disabled>
                        </div>
                        <div class="col-12">
                            <label class="small text-muted fw-bold">Alamat</label>
                            <textarea name="alamat_lengkap" class="form-control profil-input" disabled>{{ $user->alamat_lengkap }}</textarea>
                        </div>
                        <div class="col-md-6">
    <label class="small text-muted fw-bold">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-select profil-input" disabled>
        <option value="Laki-laki" {{ trim($user->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ trim($user->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="col-md-6">
    <label class="small text-muted fw-bold">Jaminan Kesehatan</label>
    <input type="text" name="jaminan_kesehatan" class="form-control profil-input" 
           value="{{ $user->jaminan_kesehatan ?? '-' }}" disabled>
</div>
                    
                    <div class="mt-4">
                        <button type="button" id="btnEdit" class="btn btn-green w-100 py-2 fw-bold" onclick="toggleEdit()">Edit Profil</button>
                        <button type="submit" id="btnSimpan" class="btn btn-success w-100 py-2 fw-bold" style="display:none;">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function toggleEdit() {
    document.querySelectorAll('.profil-input').forEach(i => i.disabled = false);
    document.getElementById('btnEdit').style.display = 'none';
    document.getElementById('btnSimpan').style.display = 'block';
}

function enableInputs() {
    // Memastikan semua input aktif agar data terbaca oleh controller
    document.querySelectorAll('.profil-input').forEach(i => i.disabled = false);
}
</script>
</body>
</html>