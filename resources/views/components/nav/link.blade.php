@props(['href' => '#', 'icon' => 'fa-solid fa-code', 'text' => 'Link'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'logo flex items-center gap-2 text-white hover:text-blue-400 transition']) }}>
    <span class="icon">
        <i class="{{ $icon }}"></i>
    </span>
    <span class="text">{{ $text }}</span>
</a>

