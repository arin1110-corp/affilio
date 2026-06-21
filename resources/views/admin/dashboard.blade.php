<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">

    @include('admin.partials.sidebar')

    <main class="flex-1 p-6">

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black">Dashboard</h1>
                <p class="text-slate-400 mt-1">Ringkasan master Affilio.</p>
            </div>

            <a href="/" target="_blank"
                class="bg-white/10 hover:bg-white/20 px-4 py-3 rounded-2xl font-bold">
                Lihat Website
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-6 shadow-xl">
                <p class="text-blue-100">Total Paket</p>
                <h2 class="text-5xl font-black mt-4">{{ $totalPackage }}</h2>
            </div>

            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <p class="text-slate-400">Paket Aktif</p>
                <h2 class="text-5xl font-black mt-4 text-green-400">{{ $activePackage }}</h2>
            </div>

            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <p class="text-slate-400">Status Website</p>
                <h2 class="text-3xl font-black mt-4 text-blue-400">Online</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <h2 class="text-xl font-black">Tahapan Pengembangan</h2>

                <div class="mt-5 space-y-4">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-2xl bg-green-500/20 text-green-300 flex items-center justify-center">✓</div>
                        <div>
                            <div class="font-bold">Master Website</div>
                            <div class="text-sm text-slate-400">Homepage, warna, konten, dan paket.</div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-2xl bg-blue-500/20 text-blue-300 flex items-center justify-center">2</div>
                        <div>
                            <div class="font-bold">Pendaftaran User</div>
                            <div class="text-sm text-slate-400">User pilih paket, username, email, password.</div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-2xl bg-purple-500/20 text-purple-300 flex items-center justify-center">3</div>
                        <div>
                            <div class="font-bold">Midtrans</div>
                            <div class="text-sm text-slate-400">Setelah sukses bayar, akun aktif otomatis.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-slate-900 to-slate-800 border border-slate-700 rounded-3xl p-6">
                <h2 class="text-xl font-black">Affilio Concept</h2>

                <p class="text-slate-400 mt-4 leading-relaxed">
                    Platform landing page untuk affiliate, creator, UMKM, dan pemilik toko marketplace.
                    User dapat link toko seperti username.affilio.store dan mengelola produk, kategori,
                    sosial media, logo, warna, serta konten sederhana.
                </p>

                <a href="{{ route('admin.setting') }}"
                    class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-2xl font-bold">
                    Atur Tampilan
                </a>
            </div>
        </div>

    </main>

</div>

</body>
</html>