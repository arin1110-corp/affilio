<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <main class="flex-1 p-6">
        <h1 class="text-3xl font-black">Data User</h1>
        <p class="text-slate-400 mt-1">Kelola user yang membeli paket Affilio.</p>

        @if (session('success'))
            <div class="mt-5 bg-green-500/10 border border-green-500 text-green-300 p-4 rounded-2xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 bg-slate-900 border border-slate-700 rounded-3xl p-6 overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-slate-400">
                    <tr>
                        <th class="text-left py-3">User</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">WhatsApp</th>
                        <th class="text-left">Store</th>
                        <th class="text-left">Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-t border-slate-700">
                            <td class="py-4 font-bold">{{ $user->user_name }}</td>
                            <td>{{ $user->user_email }}</td>
                            <td>{{ $user->user_whatsapp ?? '-' }}</td>
                            <td>
                                @if ($user->store)
                                    <div class="font-bold">{{ $user->store->store_name }}</div>
                                    <div class="text-xs text-blue-400">
                                        {{ $user->store->store_username }}.affilio.store
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($user->user_status === 'Aktif')
                                    <span class="text-green-400">Aktif</span>
                                @else
                                    <span class="text-yellow-400">{{ $user->user_status }}</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <form method="POST" action="{{ route('admin.users.toggle', $user->user_uid) }}">
                                    @csrf
                                    <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-xl">
                                        Ubah Status
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">
                                Belum ada user.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>