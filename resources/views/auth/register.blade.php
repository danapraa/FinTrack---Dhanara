<x-layouts.guest title="Daftar">
    <h1 class="mt-10 font-display text-3xl tracking-tight lg:mt-0">Mulai dengan tenang</h1>
    <p class="mt-2 text-muted">Buat akun Dhanara dalam satu menit.</p>

    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
        @csrf

        <x-field name="name" label="Nama" required autofocus autocomplete="name" />
        <x-field name="email" label="Email" type="email" required autocomplete="email" />
        <x-field name="password" label="Kata sandi" type="password" required autocomplete="new-password" />
        <x-field name="password_confirmation" label="Ulangi kata sandi" type="password" required autocomplete="new-password" />

        <button class="btn-primary w-full">Daftar</button>
    </form>

    <p class="mt-6 text-center text-sm text-muted">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="font-semibold text-accent hover:underline">Masuk</a>
    </p>
</x-layouts.guest>
