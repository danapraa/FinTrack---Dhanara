<x-layouts.base title="Panduan Gaya">
    <main class="mx-auto max-w-3xl space-y-8 px-5 py-10" x-data="theme">

        <header class="flex items-center justify-between">
            <h1 class="font-display text-3xl tracking-tight">Dhanara</h1>

            <div class="inline-flex rounded-full bg-surface-2 p-1 text-sm" role="group" aria-label="Tema">
                <template x-for="opt in [['light','Terang'],['dark','Gelap'],['system','Sistem']]" :key="opt[0]">
                    <button type="button" @click="set(opt[0])" x-text="opt[1]"
                        :class="mode === opt[0] ? 'bg-surface text-ink shadow-soft' : 'text-muted'"
                        class="rounded-full px-3 py-1.5 font-medium transition"></button>
                </template>
            </div>
        </header>

        <section class="card p-6">
            <p class="text-sm text-muted">Total saldo</p>
            <p class="mt-1 font-display text-4xl tabular-nums">Rp 12.480.000</p>
            <div class="mt-5 grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-muted">Pemasukan</p>
                    <p class="font-semibold tabular-nums text-income">+ Rp 8.500.000</p>
                </div>
                <div>
                    <p class="text-muted">Pengeluaran</p>
                    <p class="font-semibold tabular-nums text-expense">− Rp 3.120.000</p>
                </div>
            </div>
        </section>

        <section class="card space-y-4 p-6">
            <input type="text" placeholder="Contoh: Makan siang" class="field">
            <div class="flex flex-wrap gap-3">
                <button class="btn-primary">Tambah transaksi</button>
                <button class="btn-ghost">Batal</button>
            </div>
        </section>

        <section class="grid grid-cols-3 gap-3 sm:grid-cols-5">
            @foreach (['bg-canvas' => 'canvas', 'bg-surface' => 'surface', 'bg-surface-2' => 'surface-2', 'bg-ink' => 'ink', 'bg-accent' => 'accent', 'bg-accent-soft' => 'accent-soft', 'bg-income' => 'income', 'bg-expense' => 'expense', 'bg-warn' => 'warn'] as $class => $name)
                <div class="text-xs">
                    <div class="h-14 rounded-xl border border-line {{ $class }}"></div>
                    <p class="mt-1.5 text-muted">{{ $name }}</p>
                </div>
            @endforeach
        </section>

    </main>
</x-layouts.base>
