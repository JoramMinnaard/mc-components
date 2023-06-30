@props(['active'])

@php
$classes = ($active ?? false)
            ? 'py-2 px-3 hover:text-mc-blue-500 focus:text-mc-blue-500 block flex-shrink-0 text-mc-blue-500'
            : 'py-2 px-3 hover:text-mc-blue-500 focus:text-mc-blue-500 block flex-shrink-0 text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>