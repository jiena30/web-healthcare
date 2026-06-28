<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthcare</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] p-6 lg:p-20 min-h-screen flex flex-col items-center">

    <header class="w-full max-w-4xl mb-12 text-center">
        <h1 class="text-4xl font-bold text-[#f53003]">Healthcare</h1>
        <p class="mt-2 text-[#706f6c]">Selamat datang di platform kesehatan terintegrasi Anda.</p>
    </header>

    <main class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <a href="{{ route('beliobat.index') }}" class="p-6 bg-white border border-[#e3e3e0] rounded-lg shadow-sm hover:border-[#f53003] transition-all">
            <h2 class="font-bold text-lg mb-2">🛒 Beli Obat</h2>
            <p class="text-sm text-[#706f6c]">Kelola stok obat dan lihat katalog medis.</p>
        </a>

        <a href="{{ route('konsultasi') }}" class="p-6 bg-white border border-[#e3e3e0] rounded-lg shadow-sm hover:border-[#f53003] transition-all">
            <h2 class="font-bold text-lg mb-2">💬 Konsultasi Dokter</h2>
            <p class="text-sm text-[#706f6c]">Terhubung dengan tenaga medis profesional.</p>
        </a>

        <a href="{{ route('janjimedis') }}" class="p-6 bg-white border border-[#e3e3e0] rounded-lg shadow-sm hover:border-[#f53003] transition-all">
            <h2 class="font-bold text-lg mb-2">🏥 Janji Medis</h2>
            <p class="text-sm text-[#706f6c]">Booking rumah sakit dan klinik terdekat.</p>
        </a>

        <a href="{{ route('teslab') }}" class="p-6 bg-white border border-[#e3e3e0] rounded-lg shadow-sm hover:border-[#f53003] transition-all">
            <h2 class="font-bold text-lg mb-2">🧪 Tes Lab</h2>
            <p class="text-sm text-[#706f6c]">Layanan pemeriksaan kesehatan & MCU.</p>
        </a>

        <a href="{{ route('asuransi') }}" class="p-6 bg-white border border-[#e3e3e0] rounded-lg shadow-sm hover:border-[#f53003] transition-all">
            <h2 class="font-bold text-lg mb-2">🛡️ Asuransi</h2>
            <p class="text-sm text-[#706f6c]">Kelola proteksi kesehatan keluarga.</p>
        </a>

    </main>

    <footer class="mt-20 text-sm text-[#706f6c]">
        &copy; {{ date('Y') }} Healthcare Ecosystem System.
    </footer>

</body>
</html>