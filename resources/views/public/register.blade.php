<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-2xl bg-slate-900 border border-slate-700 rounded-3xl p-8">

        <a href="/" class="text-blue-400">← Kembali</a>

        <h1 class="text-3xl font-black mt-6">
            Daftar {{ $package->package_name }}
        </h1>

        <p class="text-slate-400 mt-2">
            Harga Rp {{ number_format($package->package_price, 0, ',', '.') }}
            untuk {{ $package->package_duration_month }} bulan.
        </p>

        @if ($errors->any())
            <div class="mt-5 bg-red-500/10 border border-red-500 text-red-300 p-4 rounded-2xl">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store', $package->package_uid) }}" class="mt-6 space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="user_name"
                    class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Nama Lengkap"
                    required>

                <input type="email" name="user_email"
                    class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Email"
                    required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="password" name="user_password"
                    class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Password"
                    required>

                <input type="text" name="user_whatsapp"
                    class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="WhatsApp">
            </div>

            <div class="border-t border-slate-700 pt-5">
                <h2 class="font-bold text-xl mb-3">Data Landing Page</h2>

                <input type="text" name="store_name"
                    class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3 mb-4"
                    placeholder="Nama Toko / Landing Page"
                    required>

                <input type="text" name="store_username"
                    class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Username, contoh: indra"
                    required>

                <p class="text-xs text-slate-500 mt-2">
                    Link kamu nanti: username.affilio.store
                </p>
            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 rounded-2xl py-4 font-black">
                Lanjut Pembayaran
            </button>
        </form>

    </div>
</div>

</body>
</html>