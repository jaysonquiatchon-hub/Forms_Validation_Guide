<div>
    <label for="{{ $name }}">{{ $label }}</label>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        @if ($attributes->has('required')) required @endif
        {{ $attributes->except(['required']) }}
    >

    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>