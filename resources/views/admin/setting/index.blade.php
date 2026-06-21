<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Setting Website Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">

    @include('admin.partials.sidebar')

    <main class="flex-1 p-6">

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black">Setting Website</h1>
                <p class="text-slate-400 mt-1">Kelola konten dan warna tampilan utama Affilio.</p>
            </div>

            <a href="/" target="_blank"
                class="bg-white/10 hover:bg-white/20 px-4 py-3 rounded-2xl font-bold">
                Lihat Website
            </a>
        </div>

        @if (session('success'))
            <div class="mt-5 bg-green-500/10 border border-green-500 text-green-300 p-4 rounded-2xl">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mt-5 bg-red-500/10 border border-red-500 text-red-300 p-4 rounded-2xl">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.setting.update') }}"
            class="mt-6 space-y-6">
            @csrf

            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <h2 class="text-xl font-black mb-4">Identitas Website</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="site_name" value="{{ $setting->site_name ?? '' }}"
                        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                        placeholder="Nama Website" required>

                    <input type="text" name="site_tagline" value="{{ $setting->site_tagline ?? '' }}"
                        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                        placeholder="Tagline">
                </div>

                <textarea name="site_description" rows="3"
                    class="w-full mt-4 bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Deskripsi Website">{{ $setting->site_description ?? '' }}</textarea>
            </div>

            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <h2 class="text-xl font-black mb-4">Warna Tampilan</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    @foreach ([
                        ['primary_color', 'Primary / Tombol Utama', '#2563eb'],
                        ['secondary_color', 'Secondary / Gradasi', '#4f46e5'],
                        ['base_color', 'Base Background', '#020617'],
                        ['surface_color', 'Surface / Glass', '#0f172a'],
                        ['card_color', 'Card Background', '#111827'],
                        ['text_color', 'Text Utama', '#ffffff'],
                        ['muted_text_color', 'Text Abu-Abu', '#94a3b8'],
                    ] as $color)
                        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-4">
                            <label class="block text-sm text-slate-400 mb-2">
                                {{ $color[1] }}
                            </label>

                            <div class="flex gap-3">
                                <input type="color"
                                    name="{{ $color[0] }}"
                                    value="{{ $setting->{$color[0]} ?? $color[2] }}"
                                    class="h-12 w-16 bg-slate-700 border border-slate-600 rounded-xl">

                                <input type="text"
                                    value="{{ $setting->{$color[0]} ?? $color[2] }}"
                                    readonly
                                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3 text-sm text-slate-300">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <h2 class="text-xl font-black mb-4">Hero Section</h2>

                <input type="text" name="hero_title" value="{{ $setting->hero_title ?? '' }}"
                    class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Judul Hero">

                <textarea name="hero_subtitle" rows="4"
                    class="w-full mt-4 bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Subjudul Hero">{{ $setting->hero_subtitle ?? '' }}</textarea>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <input type="text" name="hero_button_text" value="{{ $setting->hero_button_text ?? '' }}"
                        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                        placeholder="Teks Tombol">

                    <input type="text" name="hero_button_link" value="{{ $setting->hero_button_link ?? '' }}"
                        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                        placeholder="Link Tombol">
                </div>
            </div>

            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <h2 class="text-xl font-black mb-4">Tentang Affilio</h2>

                <input type="text" name="about_title" value="{{ $setting->about_title ?? '' }}"
                    class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Judul Tentang">

                <textarea name="about_description" rows="4"
                    class="w-full mt-4 bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Deskripsi Tentang">{{ $setting->about_description ?? '' }}</textarea>
            </div>

            <div class="bg-slate-900 border border-slate-700 rounded-3xl p-6">
                <h2 class="text-xl font-black mb-4">Kontak & Footer</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="email" name="contact_email" value="{{ $setting->contact_email ?? '' }}"
                        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                        placeholder="Email Kontak">

                    <input type="text" name="contact_whatsapp" value="{{ $setting->contact_whatsapp ?? '' }}"
                        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                        placeholder="WhatsApp Kontak">
                </div>

                <textarea name="footer_text" rows="2"
                    class="w-full mt-4 bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                    placeholder="Footer">{{ $setting->footer_text ?? '' }}</textarea>
            </div>

            <button class="bg-blue-600 hover:bg-blue-700 px-6 py-4 rounded-2xl font-black">
                Simpan Perubahan
            </button>

        </form>

    </main>

</div>

</body>
</html>