<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Store Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <main class="flex-1 p-6">
        <h1 class="text-3xl font-black">Data Store</h1>
        <p class="text-slate-400 mt-1">Landing page milik user Affilio.</p>

        @if (session('success'))
            <div class="mt-5 bg-green-500/10 border border-green-500 text-green-300 p-4 rounded-2xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 bg-slate-900 border border-slate-700 rounded-3xl p-6 overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-slate-400">
                    <tr>
                        <th class="text-left py-3">Store</th>
                        <th class="text-left">Owner</th>
                        <th class="text-left">Paket</th>
                        <th class="text-left">Expired</th>
                        <th class="text-left">Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($stores as $store)
                        <tr class="border-t border-slate-700">
                            <td class="py-4">
                                <div class="font-bold">{{ $store->store_name }}</div>
                                <div class="text-xs text-blue-400">
                                    {{ $store->store_username }}.affilio.store
                                </div>
                            </td>
                            <td>
                                <div>{{ $store->user->user_name ?? '-' }}</div>
                                <div class="text-xs text-slate-500">{{ $store->user->user_email ?? '-' }}</div>
                            </td>
                            <td>{{ $store->package->package_name ?? '-' }}</td>
                            <td>{{ $store->store_expired_at?->format('d/m/Y') ?? '-' }}</td>
                            <td>
                                @if ($store->store_status === 'Aktif')
                                    <span class="text-green-400">Aktif</span>
                                @else
                                    <span class="text-yellow-400">{{ $store->store_status }}</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <form method="POST" action="{{ route('admin.stores.toggle', $store->store_uid) }}">
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
                                Belum ada store.
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