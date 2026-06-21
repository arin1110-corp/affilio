<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @if (config('midtrans.is_production'))
        <script src="https://app.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
    @else
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
    @endif
</head>

<body class="bg-slate-950 text-white">

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-xl bg-slate-900 border border-slate-700 rounded-3xl p-8 text-center">

        <h1 class="text-3xl font-black">Selesaikan Pembayaran</h1>

        <p class="text-slate-400 mt-3">
            Paket: {{ $order->package->package_name }}
        </p>

        <div class="mt-6 bg-slate-800 rounded-2xl p-5">
            <p class="text-slate-400 text-sm">Total Pembayaran</p>
            <h2 class="text-4xl font-black mt-2">
                Rp {{ number_format($order->order_amount, 0, ',', '.') }}
            </h2>
        </div>

        <button id="pay-button"
            class="w-full mt-6 bg-blue-600 hover:bg-blue-700 rounded-2xl py-4 font-black">
            Bayar Sekarang
        </button>

        <p class="text-xs text-slate-500 mt-4">
            Setelah pembayaran sukses, akun akan aktif otomatis setelah notifikasi Midtrans diterima.
        </p>

    </div>
</div>

<script>
document.getElementById('pay-button').onclick = function () {
    snap.pay('{{ $order->midtrans_snap_token }}', {
        onSuccess: function(result) {
            window.location.href = "{{ route('payment.finish', $order->order_uid) }}";
        },
        onPending: function(result) {
            window.location.href = "{{ route('payment.finish', $order->order_uid) }}";
        },
        onError: function(result) {
            alert('Pembayaran gagal.');
        },
        onClose: function() {
            alert('Pembayaran belum diselesaikan.');
        }
    });
};
</script>

</body>
</html>