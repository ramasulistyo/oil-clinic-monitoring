<div
    x-data="{ open: true }"
    class="flex"
>
    {{-- TOMBOL TOGGLE (muncul saat sidebar collapse) --}}
    <button
        x-show="!open"
        @click="open = true"
        x-cloak
        class="fixed top-4 left-4 z-40 bg-white border rounded p-2 shadow"
    >
        ☰
    </button>

    {{-- SIDEBAR --}}
    <aside
        x-show="open"
        x-transition
        class="bg-white border-r h-screen sticky top-0 flex flex-col w-64 shrink-0"
    >
        {{-- LOGO --}}
        <div class="flex items-center justify-between p-4 border-b">
            <img src="{{ asset('images/logo.png') }}" alt="Pertamina Lubricants" class="h-10">
            <button @click="open = false" class="text-gray-400 hover:text-gray-700">✕</button>
        </div>

        {{-- NAVIGASI --}}
        <nav class="flex-1 overflow-y-auto p-3 space-y-1 text-sm">

            <a href="{{ url('/') }}"
               class="flex items-center gap-2 px-3 py-2 rounded {{ request()->is('/') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                🏠 <span>Beranda</span>
            </a>

            <a href="{{ url('/monitoring') }}"
               class="flex items-center gap-2 px-3 py-2 rounded {{ request()->is('monitoring') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                📊 <span>Dashboard Monitoring</span>
            </a>

            <a href="{{ url('/operational') }}"
               class="flex items-center gap-2 px-3 py-2 rounded {{ request()->is('operational') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                📝 <span>Checklist Operasional</span>
            </a>

            <a href="{{ url('/equipment') }}"
               class="flex items-center gap-2 px-3 py-2 rounded {{ request()->is('equipment*') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                🛠️ <span>Data Equipment</span>
            </a>

            <a href="{{ url('/downtime-log') }}"
               class="flex items-center gap-2 px-3 py-2 rounded {{ request()->is('downtime-log*') ? 'bg-red-50 text-red-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                ⛔ <span>Downtime Log</span>
            </a>

            <a href="{{ url('/maintenance-log') }}"
               class="flex items-center gap-2 px-3 py-2 rounded {{ request()->is('maintenance-log*') ? 'bg-yellow-50 text-yellow-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                🔧 <span>Maintenance Log</span>
            </a>

            <a href="{{ url('/calibration-log') }}"
               class="flex items-center gap-2 px-3 py-2 rounded {{ request()->is('calibration-log*') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                📏 <span>Calibration Log</span>
            </a>

        </nav>

        {{-- USER INFO / LOGOUT --}}
        <div class="p-3 border-t text-sm">
            @auth
                <div class="text-gray-600 mb-2">👤 {{ Auth::user()->name }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline block mb-1">Login</a>
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline block">Register</a>
            @endauth
        </div>
    </aside>
</div>