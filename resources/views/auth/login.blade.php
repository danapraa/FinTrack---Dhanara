<x-layouts.guest title="Masuk">
    <h1 class="mt-10 font-display text-3xl tracking-tight lg:mt-0">Selamat datang kembali</h1>
    <p class="mt-2 text-muted">Masuk untuk melihat keuanganmu hari ini.</p>

    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
        @csrf

        <x-field name="email" label="Email" type="email" required autofocus autocomplete="email" />
        <x-field name="password" label="Kata sandi" type="password" required autocomplete="current-password" />

        <label class="flex items-center gap-2 text-sm text-muted">
            <input type="checkbox" name="remember" class="size-4 rounded accent-accent">
            Ingat saya di perangkat ini
        </label>

        <button class="btn-primary w-full">Masuk</button>
    </form>

    <p class="mt-6 text-center text-sm text-muted">
        Belum punya akun?
        <a href="{{ route('register') }}" class="font-semibold text-accent hover:underline">Daftar</a>
    </p>
</x-layouts.guest>
