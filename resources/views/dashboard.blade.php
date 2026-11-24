<x-layouts.base title="Dashboard">
    <main class="mx-auto max-w-3xl px-5 py-10">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-3xl tracking-tight">
                Halo, {{ Str::before(auth()->user()->name, ' ') }}
            </h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-ghost">Keluar</button>
            </form>
        </div>

        <p class="mt-2 text-muted">Dashboard akan dibangun di tahap berikutnya.</p>
    </main>
</x-layouts.base>
