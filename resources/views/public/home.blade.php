<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $setting->site_name ?? 'Affilio' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @if ($setting->site_favicon)
        <link rel="icon" type="image/png" href="{{ asset($setting->site_favicon) }}?v={{ time() }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset($setting->site_favicon) }}?v={{ time() }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    @endif

    <style>
        :root {
            --primary: {{ $setting->primary_color ?? '#2563eb' }};
            --secondary: {{ $setting->secondary_color ?? '#4f46e5' }};
            --base: {{ $setting->base_color ?? '#020617' }};
            --surface: {{ $setting->surface_color ?? '#0f172a' }};
            --card: {{ $setting->card_color ?? '#111827' }};
            --text: {{ $setting->text_color ?? '#ffffff' }};
            --muted: {{ $setting->muted_text_color ?? '#94a3b8' }};
        }

        body {
            background:
                radial-gradient(circle at top left, color-mix(in srgb, var(--primary) 35%, transparent), transparent 35%),
                radial-gradient(circle at top right, color-mix(in srgb, var(--secondary) 30%, transparent), transparent 30%),
                var(--base);
            color: var(--text);
        }

        .glass {
            background: color-mix(in srgb, var(--surface) 82%, transparent);
            backdrop-filter: blur(18px);
            border: 1px solid color-mix(in srgb, var(--primary) 25%, transparent);
        }

        .card-theme {
            background: color-mix(in srgb, var(--card) 92%, transparent);
            border: 1px solid rgba(255, 255, 255, .08);
        }

        .muted {
            color: var(--muted);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
    </style>
</head>

<body>

    <nav class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            @if ($setting->site_logo)
                <img src="{{ asset($setting->site_logo) }}"
                    class="w-12 h-12 rounded-2xl object-contain bg-white p-2 shadow-lg">
            @else
                <div class="w-12 h-12 rounded-2xl btn-primary flex items-center justify-center font-black shadow-lg">
                    A
                </div>
            @endif
            <div>
                <div class="font-extrabold text-2xl">
                    {{ $setting->site_name ?? 'Affilio' }}
                </div>
                <div class="text-xs muted">
                    {{ $setting->site_tagline ?? 'Create. Promote. Convert.' }}
                </div>
            </div>
        </div>

        <div class="hidden md:flex gap-6 text-sm">
            <a href="#tentang" class="muted hover:text-white">Tentang</a>
            <a href="#fitur" class="muted hover:text-white">Fitur</a>
            <a href="#paket" class="muted hover:text-white">Paket</a>
            <a href="#kontak" class="muted hover:text-white">Kontak</a>
        </div>
    </nav>

    <section class="min-h-[82vh] flex items-center relative overflow-hidden">
        <div class="absolute left-10 top-20 w-72 h-72 rounded-full blur-3xl opacity-20"
            style="background: var(--primary)"></div>
        <div class="absolute right-10 bottom-20 w-96 h-96 rounded-full blur-3xl opacity-20"
            style="background: var(--secondary)"></div>

        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">

            <div>
                <div class="inline-flex glass px-4 py-2 rounded-full text-sm mb-6">
                    🚀 {{ $setting->site_tagline ?? 'Create. Promote. Convert.' }}
                </div>

                <h1 class="text-5xl md:text-7xl font-black leading-tight tracking-tight">
                    {{ $setting->hero_title ?? 'Buat Landing Page Affiliate Dalam Hitungan Menit' }}
                </h1>

                <p class="muted mt-6 text-lg leading-relaxed max-w-xl">
                    {{ $setting->hero_subtitle ?? 'Affilio membantu kamu membuat halaman promosi, menaruh produk marketplace, link affiliate, sosial media, dan branding toko dalam satu link.' }}
                </p>

                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <a href="{{ $setting->hero_button_link ?? '#paket' }}"
                        class="btn-primary px-7 py-4 rounded-2xl font-bold shadow-xl text-center">
                        {{ $setting->hero_button_text ?? 'Mulai Sekarang' }}
                    </a>

                    <a href="#paket" class="glass px-7 py-4 rounded-2xl font-bold text-center">
                        Lihat Paket
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-10 max-w-lg">
                    <div>
                        <div class="text-2xl font-black">1K+</div>
                        <div class="text-xs muted">Early Access</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black">3 Bulan</div>
                        <div class="text-xs muted">Paket awal</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black">Subdomain</div>
                        <div class="text-xs muted">username.affilio.store</div>
                    </div>
                </div>
            </div>

            <div class="glass rounded-[2rem] p-5 shadow-2xl">
                <div class="card-theme rounded-[1.5rem] p-5">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <p class="text-sm" style="color: var(--primary)">demo.affilio.store</p>
                            <h2 class="text-2xl font-black mt-1">Toko Affiliate Kamu</h2>
                        </div>

                        <div class="w-12 h-12 rounded-2xl btn-primary flex items-center justify-center">
                            🛍️
                        </div>
                    </div>

                    <div class="rounded-3xl p-5 mb-4"
                        style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                        <p class="text-sm opacity-80">Promo Hari Ini</p>
                        <h3 class="text-2xl font-black mt-1">Produk Pilihan Creator</h3>
                    </div>

                    <div class="space-y-3">
                        <div class="card-theme rounded-2xl p-4 flex items-center justify-between">
                            <div>
                                <div class="font-bold">Produk Marketplace</div>
                                <div class="text-xs muted">Link Shopee, Tokopedia, TikTok</div>
                            </div>
                            <span>→</span>
                        </div>

                        <div class="card-theme rounded-2xl p-4 flex items-center justify-between">
                            <div>
                                <div class="font-bold">Kategori Produk</div>
                                <div class="text-xs muted">Fashion, Gadget, Skincare</div>
                            </div>
                            <span>→</span>
                        </div>

                        <div class="card-theme rounded-2xl p-4 flex items-center justify-between">
                            <div>
                                <div class="font-bold">Sosial Media</div>
                                <div class="text-xs muted">Instagram, TikTok, WhatsApp</div>
                            </div>
                            <span>→</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="tentang" class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="glass rounded-[2rem] p-8 md:p-12 text-center">
                <h2 class="text-4xl font-black">
                    {{ $setting->about_title ?? 'Apa itu Affilio?' }}
                </h2>

                <p class="muted mt-5 leading-relaxed max-w-3xl mx-auto">
                    {{ $setting->about_description ?? 'Affilio adalah platform digital untuk membuat landing page promosi dan toko affiliate sederhana.' }}
                </p>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-black text-center mb-10">Fitur Utama</h2>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                @foreach ([['🎨', 'Atur Tampilan', 'Logo, warna, nama toko, dan konten sederhana.'], ['📦', 'Kelola Produk', 'Tambah produk dan arahkan ke marketplace.'], ['🔗', 'Link Sendiri', 'Dapat username.affilio.store setelah aktif.'], ['💬', 'Chat Admin', 'Bantuan manual, nanti bisa dikembangkan AI.']] as $fitur)
                    <div class="card-theme rounded-3xl p-6">
                        <div class="text-4xl">{{ $fitur[0] }}</div>
                        <h3 class="font-black text-xl mt-4">{{ $fitur[1] }}</h3>
                        <p class="muted text-sm mt-2">{{ $fitur[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="paket" class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-black">Pilih Paket Affilio</h2>
                <p class="muted mt-3">Mulai dari landing page marketplace sampai website resmi brand.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($packages as $package)
                    <div class="glass rounded-[2rem] p-6 relative overflow-hidden">
                        <div class="absolute right-0 top-0 w-40 h-40 blur-3xl opacity-20"
                            style="background: var(--primary)"></div>

                        @if ($package->package_badge)
                            <div class="inline-flex px-3 py-1 rounded-full text-xs mb-4"
                                style="background: color-mix(in srgb, var(--primary) 20%, transparent); color: var(--text);">
                                {{ $package->package_badge }}
                            </div>
                        @endif

                        <h3 class="text-3xl font-black">{{ $package->package_name }}</h3>

                        <p class="muted mt-2">{{ $package->package_description }}</p>

                        <div class="mt-6">
                            <span class="text-5xl font-black">
                                Rp {{ number_format($package->package_price, 0, ',', '.') }}
                            </span>
                            <span class="muted">/ {{ $package->package_duration_month }} bulan</span>
                        </div>

                        <ul class="mt-6 space-y-3">
                            @foreach ($package->features as $feature)
                                <li class="flex gap-2">
                                    <span style="color: var(--primary)">✓</span>
                                    <span>{{ $feature->feature_text }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('register.form', $package->package_uid) }}"
                            class="btn-primary block text-center mt-7 py-4 rounded-2xl font-bold">
                            Pilih Paket
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="kontak" class="py-20">
        <div class="max-w-5xl mx-auto px-6">
            <div class="glass rounded-[2rem] p-8 text-center">
                <h2 class="text-3xl font-black">Kontak Affilio</h2>
                <p class="muted mt-3">
                    Email: {{ $setting->contact_email ?? '-' }} |
                    WhatsApp: {{ $setting->contact_whatsapp ?? '-' }}
                </p>
            </div>
        </div>
    </section>

    <footer class="py-8 border-t border-white/10 text-center muted">
        {{ $setting->footer_text ?? '© Affilio. All rights reserved.' }}
    </footer>

</body>

</html>
