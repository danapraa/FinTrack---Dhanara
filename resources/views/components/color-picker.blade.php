@props(['name' => 'color', 'value' => null])

@php $current = old($name, $value ?: \App\Support\Palette::COLORS[0]); @endphp

<fieldset>
    <legend class="mb-2 text-sm font-medium">Warna</legend>

    <div class="flex flex-wrap gap-3">
        @foreach (\App\Support\Palette::COLORS as $color)
            <label class="cursor-pointer">
                <input type="radio" name="{{ $name }}" value="{{ $color }}" class="peer sr-only" @checked($current === $color)>
                <span class="block size-9 rounded-full ring-offset-2 ring-offset-surface transition peer-checked:ring-2 peer-checked:ring-ink peer-focus-visible:ring-2 peer-focus-visible:ring-accent"
                      style="background: {{ $color }}"></span>
            </label>
        @endforeach
    </div>

    @error($name)
        <p class="mt-1.5 text-sm text-expense">{{ $message }}</p>
    @enderror
</fieldset>
