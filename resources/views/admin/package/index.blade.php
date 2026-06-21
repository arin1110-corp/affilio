<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Master Paket Affilio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">

    @include('admin.partials.sidebar')

    <main class="flex-1 p-6">

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">Master Paket</h1>
                <p class="text-slate-400 mt-1">Kelola paket dan fitur Affilio.</p>
            </div>

            <button onclick="openModal()"
                class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-xl font-bold">
                + Tambah Paket
            </button>
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

        <div class="mt-6 bg-slate-900 border border-slate-700 rounded-3xl p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-slate-400">
                        <tr>
                            <th class="text-left py-3">Paket</th>
                            <th class="text-left">Harga</th>
                            <th class="text-left">Durasi</th>
                            <th class="text-left">Limit</th>
                            <th class="text-left">Fitur</th>
                            <th class="text-left">Status</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($packages as $package)
                            <tr class="border-t border-slate-700">
                                <td class="py-4">
                                    <div class="font-bold">{{ $package->package_name }}</div>
                                    <div class="text-xs text-slate-500">{{ $package->package_slug }}</div>
                                </td>

                                <td>
                                    Rp {{ number_format($package->package_price, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ $package->package_duration_month }} bulan
                                </td>

                                <td>
                                    {{ $package->package_limit_user ?: 'Tanpa batas' }}
                                </td>

                                <td>
                                    <div class="text-xs space-y-1">
                                        @foreach ($package->features as $feature)
                                            <div>✓ {{ $feature->feature_text }}</div>
                                        @endforeach
                                    </div>
                                </td>

                                <td>
                                    @if ($package->package_status === 'Aktif')
                                        <span class="text-green-400">Aktif</span>
                                    @else
                                        <span class="text-red-400">Nonaktif</span>
                                    @endif
                                </td>

                                <td class="text-right">
                                    <button onclick='openEditModal(@json($package))'
                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-2 rounded-xl text-xs">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-5 text-center text-slate-400">
                                    Belum ada paket.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</div>

{{-- MODAL TAMBAH --}}
<div id="packageModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4">
    <div class="bg-slate-900 border border-slate-700 rounded-3xl w-full max-w-3xl p-6 max-h-[90vh] overflow-y-auto">

        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-bold">Tambah Paket</h2>
            <button onclick="closeModal()">✕</button>
        </div>

        <form method="POST" action="{{ route('admin.package.store') }}" class="space-y-4">
            @csrf

            @include('admin.package.partials.form', ['prefix' => ''])

            <button class="bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-2xl font-bold">
                Simpan Paket
            </button>
        </form>

    </div>
</div>

{{-- MODAL EDIT --}}
<div id="editPackageModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4">
    <div class="bg-slate-900 border border-slate-700 rounded-3xl w-full max-w-3xl p-6 max-h-[90vh] overflow-y-auto">

        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-bold">Edit Paket</h2>
            <button onclick="closeEditModal()">✕</button>
        </div>

        <form method="POST" action="{{ route('admin.package.update') }}" class="space-y-4">
            @csrf

            <input type="hidden" name="package_id" id="edit_package_id">

            @include('admin.package.partials.form', ['prefix' => 'edit_'])

            <button class="bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-2xl font-bold">
                Update Paket
            </button>
        </form>

    </div>
</div>

<script>
    function openModal() {
        document.getElementById('packageModal').classList.remove('hidden');
        document.getElementById('packageModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('packageModal').classList.add('hidden');
        document.getElementById('packageModal').classList.remove('flex');
    }

    function openEditModal(item) {
        document.getElementById('edit_package_id').value = item.package_id;
        document.getElementById('edit_package_name').value = item.package_name;
        document.getElementById('edit_package_slug').value = item.package_slug;
        document.getElementById('edit_package_description').value = item.package_description ?? '';
        document.getElementById('edit_package_price').value = item.package_price;
        document.getElementById('edit_package_duration_month').value = item.package_duration_month;
        document.getElementById('edit_package_limit_user').value = item.package_limit_user ?? '';
        document.getElementById('edit_package_order').value = item.package_order;
        document.getElementById('edit_package_badge').value = item.package_badge ?? '';
        document.getElementById('edit_package_status').value = item.package_status;

        document.getElementById('edit_can_use_subdomain').checked = item.can_use_subdomain == 1;
        document.getElementById('edit_can_manage_product').checked = item.can_manage_product == 1;
        document.getElementById('edit_can_manage_category').checked = item.can_manage_category == 1;
        document.getElementById('edit_can_manage_social').checked = item.can_manage_social == 1;
        document.getElementById('edit_can_manage_theme').checked = item.can_manage_theme == 1;
        document.getElementById('edit_can_receive_order').checked = item.can_receive_order == 1;

        const box = document.getElementById('edit_feature_box');
        box.innerHTML = '';

        if (item.features && item.features.length > 0) {
            item.features.forEach(feature => {
                addFeature('edit_', feature.feature_text);
            });
        } else {
            addFeature('edit_', '');
        }

        document.getElementById('editPackageModal').classList.remove('hidden');
        document.getElementById('editPackageModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editPackageModal').classList.add('hidden');
        document.getElementById('editPackageModal').classList.remove('flex');
    }

    function addFeature(prefix = '', value = '') {
        const box = document.getElementById(prefix + 'feature_box');

        const div = document.createElement('div');
        div.className = 'flex gap-2';

        div.innerHTML = `
            <input type="text"
                name="feature_text[]"
                value="${value}"
                class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                placeholder="Fitur paket">

            <button type="button"
                onclick="this.parentElement.remove()"
                class="bg-red-600 px-4 rounded-2xl">
                ✕
            </button>
        `;

        box.appendChild(div);
    }
</script>

</body>
</html>