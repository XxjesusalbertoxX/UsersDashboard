@props(['type' => 'button'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition']) }}>
    {{ $slot }}
</button>
