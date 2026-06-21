<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard User Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

    <div class="min-h-screen p-6">

        <div class="max-w-6xl mx-auto">

            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-black">Dashboard User</h1>
                    <p class="text-slate-400 mt-1">
                        Selamat datang, {{ session('user_name') }}
                    </p>
                </div>

                <a href="{{ route('user.logout') }}" class="bg-red-500/10 text-red-300 px-4 py-3 rounded-2xl">
                    Logout
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6">
                <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                    <p class="text-slate-400">Nama Landing Page</p>
                    <h2 class="text-2xl font-black mt-2">{{ $store->store_name }}</h2>
                </div>

                <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                    <p class="text-slate-400">Paket</p>
                    <h2 class="text-2xl font-black mt-2">{{ $store->package->package_name ?? '-' }}</h2>
                </div>

                <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                    <p class="text-slate-400">Expired</p>
                    <h2 class="text-2xl font-black mt-2">
                        {{ $store->store_expired_at?->format('d/m/Y') ?? '-' }}
                    </h2>
                </div>
            </div>

            <div class="mt-6 bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <p class="text-slate-400">Link Landing Page</p>

                <div class="mt-3 bg-slate-800 rounded-2xl p-4 text-blue-300 font-bold">
                    {{ $store->store_username }}.affilio.store
                </div>

                <p class="text-sm text-slate-500 mt-4">
                    Tahap berikutnya: menu kategori, produk, sosial media, setting tampilan, dan chat admin.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">

                <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                    <h2 class="text-xl font-black">Benefit Paket</h2>

                    <div class="mt-4 space-y-3 text-slate-300">
                        @foreach ($store->package->features as $feature)
                            <div class="flex gap-2">
                                <span class="text-green-400">✓</span>
                                <span>{{ $feature->feature_text }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-6">
                    <h2 class="text-xl font-black">Akses Aktif</h2>

                    <p class="text-blue-100 mt-3">
                        Akun kamu sudah aktif dan dapat menggunakan landing page Affilio.
                    </p>

                    <div class="mt-5 space-y-2 text-sm">
                        <div>✅ Kelola kategori</div>
                        <div>✅ Kelola produk marketplace</div>
                        <div>✅ Kelola sosial media</div>
                        <div>✅ Setting warna dan konten sederhana</div>
                        <div>✅ Chat manual ke admin</div>
                    </div>
                </div>

            </div>

            <div class="mt-6 bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <h2 class="text-xl font-black">Menu Pengelolaan</h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-5">
                    <div class="bg-slate-800 rounded-2xl p-5">
                        <div class="text-3xl">📂</div>
                        <div class="font-bold mt-3">Kategori</div>
                        <div class="text-xs text-slate-500 mt-1">Segera dibuat</div>
                    </div>

                    <div class="bg-slate-800 rounded-2xl p-5">
                        <div class="text-3xl">📦</div>
                        <div class="font-bold mt-3">Produk</div>
                        <div class="text-xs text-slate-500 mt-1">Segera dibuat</div>
                    </div>

                    <div class="bg-slate-800 rounded-2xl p-5">
                        <div class="text-3xl">🎨</div>
                        <div class="font-bold mt-3">Setting Web</div>
                        <div class="text-xs text-slate-500 mt-1">Segera dibuat</div>
                    </div>

                    <div class="bg-slate-800 rounded-2xl p-5">
                        <div class="text-3xl">💬</div>
                        <div class="font-bold mt-3">Chat Admin</div>
                        <div class="text-xs text-slate-500 mt-1">Segera dibuat</div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>
