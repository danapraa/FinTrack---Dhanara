@props(['label', 'name', 'type' => 'text', 'value' => null])

<div>
    <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium">{{ $label }}</label>

    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        value="{{ $type === 'password' ? '' : old($name, $value) }}"
        {{ $attributes->class(['field', 'border-expense' => $errors->has($name)]) }}>

    @error($name)
        <p class="mt-1.5 text-sm text-expense">{{ $message }}</p>
    @enderror
</div>
