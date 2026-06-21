<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Order Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <main class="flex-1 p-6">
        <h1 class="text-3xl font-black">Data Order</h1>
        <p class="text-slate-400 mt-1">Riwayat pembelian paket Affilio.</p>

        <div class="mt-6 bg-slate-900 border border-slate-700 rounded-3xl p-6 overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-slate-400">
                    <tr>
                        <th class="text-left py-3">Kode</th>
                        <th class="text-left">User</th>
                        <th class="text-left">Store</th>
                        <th class="text-left">Paket</th>
                        <th class="text-right">Nominal</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Paid At</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $order)
                        <tr class="border-t border-slate-700">
                            <td class="py-4 font-bold">{{ $order->order_code }}</td>
                            <td>{{ $order->user->user_name ?? '-' }}</td>
                            <td>{{ $order->store->store_username ?? '-' }}.affilio.store</td>
                            <td>{{ $order->package->package_name ?? '-' }}</td>
                            <td class="text-right">
                                Rp {{ number_format($order->order_amount, 0, ',', '.') }}
                            </td>
                            <td>
                                @if ($order->order_status === 'Dibayar')
                                    <span class="text-green-400">Dibayar</span>
                                @else
                                    <span class="text-yellow-400">{{ $order->order_status }}</span>
                                @endif
                            </td>
                            <td>{{ $order->paid_at?->format('d/m/Y H:i') ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400">
                                Belum ada order.
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