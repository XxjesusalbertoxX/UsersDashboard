@props(['type' => 'text', 'name', 'label', 'icon' => null])

<div class="input-box">
    @if ($icon)
        <span class="icon">
            <ion-icon name="{{ $icon }}"></ion-icon>
        </span>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        {{ $attributes->merge(['required' => true]) }}
    >
    <label for="{{ $name }}">{{ __($label) }}</label>
</div>
