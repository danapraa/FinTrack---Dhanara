<x-layouts.app title="Beranda">
    <x-page-header :title="'Halo, ' . Str::before(auth()->user()->name, ' ')"
                   subtitle="Ringkasan keuanganmu akan tampil di sini." />

    <div class="card grid place-items-center px-6 py-16 text-center">
        <p class="font-display text-xl">Dashboard sedang disiapkan</p>
        <p class="mt-1 max-w-xs text-sm text-muted">Kita isi setelah dompet dan transaksi selesai dibuat.</p>
    </div>
</x-layouts.app>
