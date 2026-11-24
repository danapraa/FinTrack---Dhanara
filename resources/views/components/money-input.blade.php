@props(['label', 'name', 'value' => null])

@php $initial = preg_replace('/\D/', '', (string) old($name, $value)); @endphp

<div x-data="{
        raw: @js($initial),
        get shown() { return this.raw ? Number(this.raw).toLocaleString('id-ID') : ''; },
        update(e) { this.raw = e.target.value.replace(/\D/g, '').slice(0, 12); e.target.value = this.shown; },
    }">
    <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium">{{ $label }}</label>

    <div class="relative">
        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-muted">Rp</span>
        <input id="{{ $name }}" type="text" inputmode="numeric" autocomplete="off" placeholder="0"
               :value="shown" @input="update"
               {{ $attributes->class(['field pl-12 tabular-nums', 'border-expense' => $errors->has($name)]) }}>
    </div>
    <input type="hidden" name="{{ $name }}" :value="raw">

    @error($name)
        <p class="mt-1.5 text-sm text-expense">{{ $message }}</p>
    @enderror
</div>
