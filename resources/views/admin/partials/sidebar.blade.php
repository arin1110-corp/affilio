<aside class="w-72 min-h-screen p-5 bg-slate-950 border-r border-white/10">

    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-5 mb-6 shadow-xl">
        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center font-black text-2xl">
            A
        </div>

        <h1 class="text-2xl font-black mt-4">Affilio</h1>
        <p class="text-xs text-blue-100">Admin Control Panel</p>
    </div>

    <nav class="space-y-2 text-sm">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition
            {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'hover:bg-slate-900 text-slate-300' }}">
            <span>🏠</span>
            Dashboard
        </a>

        <a href="{{ route('admin.setting') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition
            {{ request()->routeIs('admin.setting') ? 'bg-blue-600 text-white shadow-lg' : 'hover:bg-slate-900 text-slate-300' }}">
            <span>🎨</span>
            Setting Website
        </a>

        <a href="{{ route('admin.package') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition
            {{ request()->routeIs('admin.package') ? 'bg-blue-600 text-white shadow-lg' : 'hover:bg-slate-900 text-slate-300' }}">
            <span>💎</span>
            Paket
        </a>
    </nav>

    <div class="mt-8 pt-6 border-t border-white/10">
        <a href="{{ route('admin.logout') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-red-500/10 text-red-300 hover:bg-red-500/20">
            <span>🚪</span>
            Logout
        </a>
    </div>

</aside>