<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-xl bg-slate-900 border border-slate-700 rounded-3xl p-8 text-center">

        <h1 class="text-3xl font-black">Status Pembayaran</h1>

        <p class="text-slate-400 mt-3">
            Status saat ini:
        </p>

        <div class="mt-5 text-2xl font-black">
            {{ $order->order_status }}
        </div>

        @if ($order->order_status === 'Dibayar')
            <p class="text-green-400 mt-4">
                Akun dan landing page sudah aktif.
            </p>

            <div class="mt-5 bg-slate-800 rounded-2xl p-4 text-blue-300 font-bold">
                {{ $order->store->store_username }}.affilio.store
            </div>

            <a href="{{ route('user.login') }}"
                class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-2xl font-bold">
                Login User
            </a>
        @else
            <p class="text-slate-400 mt-4">
                Jika sudah membayar, tunggu beberapa saat lalu refresh halaman ini.
            </p>
        @endif

    </div>
</div>

</body>
</html>