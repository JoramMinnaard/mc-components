@props(['active'])

@php
$classes = ($active ?? false)
            ? 'py-2 hover:text-mc-blue-500 focus:text-mc-blue-500 block text-mc-blue-500'
            : 'py-2 hover:text-mc-blue-500 focus:text-mc-blue-500 block text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>