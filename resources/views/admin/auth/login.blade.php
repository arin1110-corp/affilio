<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="min-h-screen flex items-center justify-center px-6">
    <div class="w-full max-w-md bg-slate-900 border border-slate-700 rounded-3xl p-8">

        <h1 class="text-3xl font-bold">Admin Affilio</h1>
        <p class="text-slate-400 mt-2">Login untuk mengelola website dan paket.</p>

        @if (session('error'))
            <div class="mt-5 bg-red-500/10 border border-red-500 text-red-300 p-4 rounded-2xl">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="mt-6 space-y-4">
            @csrf

            <input type="email"
                name="email"
                class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                placeholder="Email"
                required>

            <input type="password"
                name="password"
                class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                placeholder="Password"
                required>

            <button class="w-full bg-blue-600 hover:bg-blue-700 rounded-2xl py-3 font-bold">
                Login
            </button>
        </form>

        <p class="text-xs text-slate-500 mt-5">
            Default: admin@affilio.store / admin12345
        </p>

    </div>
</div>

</body>
</html>