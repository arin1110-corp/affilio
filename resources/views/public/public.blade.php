<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Paket {{ $setting->site_name ?? 'Affilio' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="max-w-7xl mx-auto px-6 py-16">
    <a href="/" class="text-blue-300">← Kembali</a>

    <h1 class="text-4xl font-extrabold mt-8 text-center">
        Paket Affilio
    </h1>

    <p class="text-slate-400 text-center mt-3">
        Pilih paket sesuai kebutuhan landing page dan toko digital kamu.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
        @foreach ($packages as $package)
            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                @if ($package->package_badge)
                    <div class="inline-flex bg-blue-500/10 text-blue-300 px-3 py-1 rounded-full text-xs mb-4">
                        {{ $package->package_badge }}
                    </div>
                @endif

                <h3 class="text-2xl font-bold">
                    {{ $package->package_name }}
                </h3>

                <p class="text-slate-400 mt-2">
                    {{ $package->package_description }}
                </p>

                <div class="mt-5">
                    <span class="text-4xl font-extrabold">
                        Rp {{ number_format($package->package_price, 0, ',', '.') }}
                    </span>
                    <span class="text-slate-400">
                        / {{ $package->package_duration_month }} bulan
                    </span>
                </div>

                <ul class="mt-6 space-y-3 text-slate-300">
                    @foreach ($package->features as $feature)
                        <li>✓ {{ $feature->feature_text }}</li>
                    @endforeach
                </ul>

                <button class="w-full mt-6 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 font-bold">
                    Beli Paket
                </button>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>