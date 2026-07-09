<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Operational Checklist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 p-6" x-data="{ openId: null }">

    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">
            Checklist Operasional — {{ \Carbon\Carbon::parse($today)->translatedFormat('d F Y') }}
        </h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 border border-green-300 rounded p-2 mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-800 border border-red-300 rounded p-2 mb-4 text-sm">
            <ul class="list-disc pl-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p class="text-sm text-gray-500 mb-3">
        {{ count($filledToday) }} dari {{ $equipment->count() }} equipment sudah diisi hari ini.
    </p>

    <div class="bg-white border rounded divide-y">
        @forelse($equipment as $item)
            @php $isFilled = in_array($item->id, $filledToday); @endphp
            <div class="p-3 flex items-center justify-between">
                <div>
                    <div class="font-medium">
                        {{ $item->equipment_code }} — {{ $item->equipment_name }}
                    </div>
                    <div class="text-xs">
                        @if($isFilled)
                            <span class="text-green-600">✔ Sudah diisi hari ini</span>
                        @else
                            <span class="text-red-600">✘ Belum diisi</span>
                        @endif
                    </div>
                </div>

                <button
                    @click="openId = openId === {{ $item->id }} ? null : {{ $item->id }}"
                    class="text-sm px-3 py-1.5 rounded {{ $isFilled ? 'bg-gray-200 text-gray-600' : 'bg-blue-600 text-white' }}">
                    {{ $isFilled ? 'Isi Lagi' : 'Isi Sekarang' }}
                </button>
            </div>

            <div x-show="openId === {{ $item->id }}" x-cloak class="p-3 bg-gray-50">
                <form action="/operating-log" method="POST" class="grid grid-cols-2 gap-2">
                    @csrf
                    <input type="hidden" name="equipment_id" value="{{ $item->id }}">
                    <input type="hidden" name="operating_date" value="{{ $today }}">

                    <div>
                        <label class="text-xs">Jam Mulai</label>
                        <input type="time" name="start_time" class="w-full border rounded p-1.5 text-sm" required>
                    </div>
                    <div>
                        <label class="text-xs">Jam Selesai</label>
                        <input type="time" name="end_time" class="w-full border rounded p-1.5 text-sm" required>
                    </div>
                    <div>
                        <label class="text-xs">Jumlah Sampel</label>
                        <input type="number" name="sample_count" value="0" class="w-full border rounded p-1.5 text-sm">
                    </div>
                    <div>
                        <label class="text-xs">PIC</label>
                        <input type="text" name="pic" class="w-full border rounded p-1.5 text-sm" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-xs">Catatan</label>
                        <input type="text" name="remarks" class="w-full border rounded p-1.5 text-sm">
                    </div>
                    <div class="col-span-2 flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white text-sm px-3 py-1.5 rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        @empty
            <p class="p-3 text-sm text-gray-500">Tidak ada equipment dengan status Ready/In Use.</p>
        @endforelse
    </div>

</body>
</html>