<x-layouts.app title="Dompet">
    <x-page-header title="Dompet" subtitle="Tempat uangmu disimpan.">
        <x-slot:actions>
            <a href="{{ route('wallets.create') }}" class="btn-primary">
                <x-icon name="plus" size="size-4" /> Tambah
            </a>
        </x-slot:actions>
    </x-page-header>

    @if ($wallets->isEmpty())
        <div class="card grid place-items-center px-6 py-16 text-center">
            <p class="font-display text-xl">Belum ada dompet</p>
            <p class="mt-1 max-w-xs text-sm text-muted">
                Mulai dari dompet tunai, rekening bank, atau e-wallet yang kamu pakai sehari-hari.
            </p>
            <a href="{{ route('wallets.create') }}" class="btn-primary mt-6">Tambah dompet pertama</a>
        </div>
    @else
        <section class="card mb-6 p-6">
            <p class="text-sm text-muted">Total semua dompet</p>
            <p class="mt-1 font-display text-4xl tabular-nums">{{ rupiah($total) }}</p>
        </section>

        <ul class="grid gap-3 sm:grid-cols-2">
            @foreach ($wallets as $wallet)
                <li>
                    <a href="{{ route('wallets.edit', $wallet) }}"
                       class="card flex items-center gap-4 p-4 transition hover:border-accent/50">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl"
                              style="background: color-mix(in srgb, {{ $wallet->color }} 18%, transparent); color: {{ $wallet->color }}">
                            <x-icon name="wallet" size="size-6" />
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block truncate font-semibold">{{ $wallet->name }}</span>
                            <span class="block text-xs text-muted">{{ $wallet->type_label }}</span>
                        </span>
                        <span class="font-semibold tabular-nums">{{ rupiah($wallet->balance) }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</x-layouts.app>
