<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <input type="text" id="{{ $prefix }}package_name" name="package_name"
        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
        placeholder="Nama Paket" required>

    <input type="text" id="{{ $prefix }}package_slug" name="package_slug"
        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
        placeholder="Slug Paket" required>
</div>

<textarea id="{{ $prefix }}package_description" name="package_description" rows="3"
    class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
    placeholder="Deskripsi Paket"></textarea>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <input type="number" id="{{ $prefix }}package_price" name="package_price"
        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
        placeholder="Harga" required>

    <input type="number" id="{{ $prefix }}package_duration_month" name="package_duration_month"
        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
        placeholder="Durasi Bulan" required>

    <input type="number" id="{{ $prefix }}package_limit_user" name="package_limit_user"
        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
        placeholder="Limit User">
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <input type="number" id="{{ $prefix }}package_order" name="package_order"
        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
        placeholder="Urutan" required>

    <input type="text" id="{{ $prefix }}package_badge" name="package_badge"
        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
        placeholder="Badge">

    <select id="{{ $prefix }}package_status" name="package_status"
        class="bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3" required>
        <option value="Aktif">Aktif</option>
        <option value="Nonaktif">Nonaktif</option>
    </select>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
    <label><input id="{{ $prefix }}can_use_subdomain" type="checkbox" name="can_use_subdomain" checked> Subdomain</label>
    <label><input id="{{ $prefix }}can_manage_product" type="checkbox" name="can_manage_product" checked> Produk</label>
    <label><input id="{{ $prefix }}can_manage_category" type="checkbox" name="can_manage_category" checked> Kategori</label>
    <label><input id="{{ $prefix }}can_manage_social" type="checkbox" name="can_manage_social" checked> Sosial Media</label>
    <label><input id="{{ $prefix }}can_manage_theme" type="checkbox" name="can_manage_theme" checked> Tema</label>
    <label><input id="{{ $prefix }}can_receive_order" type="checkbox" name="can_receive_order"> Terima Order Langsung</label>
</div>

<div>
    <div class="flex justify-between items-center mb-3">
        <label class="font-semibold">Fitur Paket</label>
        <button type="button" onclick="addFeature('{{ $prefix }}')" class="text-blue-400">
            + Tambah Fitur
        </button>
    </div>

    <div id="{{ $prefix }}feature_box" class="space-y-2">
        <div class="flex gap-2">
            <input type="text" name="feature_text[]"
                class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-4 py-3"
                placeholder="Fitur paket">

            <button type="button"
                onclick="this.parentElement.remove()"
                class="bg-red-600 px-4 rounded-2xl">
                ✕
            </button>
        </div>
    </div>
</div>