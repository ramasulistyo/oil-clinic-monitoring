<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Oil Clinic — Equipment Monitoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="max-w-5xl mx-auto p-6">

        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Oil Clinic — Equipment Monitoring</h1>
            <p class="text-gray-500">Sistem monitoring kondisi equipment: operasional, downtime, maintenance, dan kalibrasi.</p>
        </header>

        {{-- RINGKASAN SANGAT DASAR --}}
        <div class="grid grid-cols-3 gap-4 mb-8">
            <div class="bg-white border rounded p-4 text-center">
                <div class="text-3xl font-bold text-gray-800">{{ $totalEquipment }}</div>
                <div class="text-sm text-gray-500">Total Equipment</div>
            </div>
            <div class="bg-white border rounded p-4 text-center">
                <div class="text-3xl font-bold text-green-600">{{ $readyCount }}</div>
                <div class="text-sm text-gray-500">Ready</div>
            </div>
            <div class="bg-white border rounded p-4 text-center">
                <div class="text-3xl font-bold text-red-600">{{ $downCount }}</div>
                <div class="text-sm text-gray-500">Down</div>
            </div>
        </div>

        {{-- NAVIGASI MODUL --}}
        <h2 class="text-lg font-semibold text-gray-700 mb-3">Menu</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <a href="/monitoring" class="block bg-white border rounded p-5 hover:border-blue-400 hover:shadow transition">
                <div class="text-2xl mb-2">📊</div>
                <div class="font-semibold text-gray-800">Dashboard Monitoring</div>
                <div class="text-sm text-gray-500">Lihat kondisi semua equipment sekaligus</div>
            </a>

            <a href="/operational" class="block bg-white border rounded p-5 hover:border-blue-400 hover:shadow transition">
                <div class="text-2xl mb-2">📝</div>
                <div class="font-semibold text-gray-800">Checklist Operasional</div>
                <div class="text-sm text-gray-500">Isi data pemakaian harian</div>
            </a>

            <a href="/equipment" class="block bg-white border rounded p-5 hover:border-blue-400 hover:shadow transition">
                <div class="text-2xl mb-2">🛠️</div>
                <div class="font-semibold text-gray-800">Data Equipment</div>
                <div class="text-sm text-gray-500">Kelola daftar & detail equipment</div>
            </a>

            <a href="/downtime-log" class="block bg-white border rounded p-5 hover:border-red-400 hover:shadow transition">
                <div class="text-2xl mb-2">⛔</div>
                <div class="font-semibold text-gray-800">Downtime Log</div>
                <div class="text-sm text-gray-500">Riwayat & input kerusakan alat</div>
            </a>

            <a href="/maintenance-log" class="block bg-white border rounded p-5 hover:border-yellow-400 hover:shadow transition">
                <div class="text-2xl mb-2">🔧</div>
                <div class="font-semibold text-gray-800">Maintenance Log</div>
                <div class="text-sm text-gray-500">Riwayat & input perawatan alat</div>
            </a>

            <a href="/calibration-log" class="block bg-white border rounded p-5 hover:border-blue-400 hover:shadow transition">
                <div class="text-2xl mb-2">📏</div>
                <div class="font-semibold text-gray-800">Calibration Log</div>
                <div class="text-sm text-gray-500">Riwayat & input kalibrasi alat</div>
            </a>

        </div>

    </div>

</body>
</html>