<x-layouts.base :title="$title ?? null">
    <div class="min-h-dvh lg:grid lg:grid-cols-2">

        <aside class="hidden flex-col justify-between bg-accent-soft p-12 lg:flex">
            <a href="/" class="font-display text-2xl tracking-tight">Dhanara</a>

            <div>
                <p class="font-display text-4xl leading-tight">
                    Uang yang tertata,<br>pikiran yang tenang.
                </p>
                <p class="mt-4 max-w-sm text-muted">
                    Catat, rencanakan, dan pahami arus keuanganmu tanpa ribet.
                </p>
            </div>

            <p class="text-sm text-muted">© {{ date('Y') }} Dhanara</p>
        </aside>

        <main class="relative flex min-h-dvh items-center justify-center px-5 py-16 lg:min-h-0" x-data="theme">
            <button type="button" class="btn-ghost absolute right-4 top-4"
                @click="set(mode === 'dark' ? 'light' : 'dark')"
                x-text="mode === 'dark' ? 'Terang' : 'Gelap'"></button>

            <div class="w-full max-w-sm">
                <a href="/" class="font-display text-2xl tracking-tight lg:hidden">Dhanara</a>
                {{ $slot }}
            </div>
        </main>

    </div>
</x-layouts.base>
