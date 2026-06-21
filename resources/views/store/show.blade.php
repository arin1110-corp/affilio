<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $store->store_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background: {{ $store->store_background_color }}; color: {{ $store->store_text_color }};">

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-lg bg-white/10 border border-white/10 rounded-3xl p-8 text-center backdrop-blur-xl">

        <div class="w-24 h-24 mx-auto rounded-full flex items-center justify-center text-4xl font-black"
            style="background: {{ $store->store_primary_color }}">
            {{ strtoupper(substr($store->store_name, 0, 1)) }}
        </div>

        <h1 class="text-3xl font-black mt-6">
            {{ $store->store_name }}
        </h1>

        <p class="opacity-70 mt-3">
            {{ $store->store_description }}
        </p>

        <div class="mt-8 space-y-3">
            <a href="#"
                class="block rounded-2xl py-4 font-bold"
                style="background: {{ $store->store_primary_color }}">
                Produk Marketplace
            </a>

            <a href="#"
                class="block rounded-2xl py-4 font-bold bg-white/10">
                Instagram
            </a>

            <a href="#"
                class="block rounded-2xl py-4 font-bold bg-white/10">
                WhatsApp
            </a>
        </div>

        <p class="text-xs opacity-50 mt-8">
            Powered by Affilio
        </p>

    </div>
</div>

</body>
</html>