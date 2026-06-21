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

            <a href="{{ route('user.logout') }}"
                class="bg-red-500/10 text-red-300 px-4 py-3 rounded-2xl">
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

    </div>

</div>

</body>
</html>