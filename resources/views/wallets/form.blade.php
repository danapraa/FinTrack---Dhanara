@php $editing = $wallet->exists; @endphp

<x-layouts.app :title="$editing ? 'Ubah Dompet' : 'Tambah Dompet'">
    <div class="mx-auto max-w-lg">
        <a href="{{ route('wallets.index') }}" class="mb-4 inline-block text-sm text-muted hover:text-ink">← Dompet</a>
        <x-page-header :title="$editing ? 'Ubah dompet' : 'Dompet baru'" />

        <form method="POST" action="{{ $editing ? route('wallets.update', $wallet) : route('wallets.store') }}"
              class="card space-y-5 p-6">
            @csrf
            @if ($editing) @method('PUT') @endif

            <x-field name="name" label="Nama dompet" :value="$wallet->name" required autofocus
                     placeholder="Contoh: BCA, Dompet harian" />

            <div>
                <label for="type" class="mb-1.5 block text-sm font-medium">Jenis</label>
                <select id="type" name="type" class="field">
                    @foreach (\App\Models\Wallet::TYPES as $key => $label)
                        <option value="{{ $key }}" @selected(old('type', $wallet->type ?? 'cash') === $key)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('type')
                    <p class="mt-1.5 text-sm text-expense">{{ $message }}</p>
                @enderror
            </div>

            <x-money-input name="initial_balance" label="Saldo awal"
                           :value="$editing ? $wallet->initial_balance : null" />

            <x-color-picker :value="$wallet->color" />

            <div class="flex gap-3 pt-2">
                <button class="btn-primary flex-1">Simpan</button>
                <a href="{{ route('wallets.index') }}" class="btn-ghost">Batal</a>
            </div>
        </form>

        @if ($editing)
            <form method="POST" action="{{ route('wallets.destroy', $wallet) }}" class="mt-5 text-center"
                  x-data @submit="if (!confirm('Hapus dompet ini? Tindakan ini tidak bisa dibatalkan.')) $event.preventDefault()">
                @csrf
                @method('DELETE')
                <button class="text-sm font-medium text-expense hover:underline">Hapus dompet</button>
            </form>
        @endif
    </div>
</x-layouts.app>
