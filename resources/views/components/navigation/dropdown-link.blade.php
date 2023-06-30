<a 
    {{ $attributes->merge([
        'class' => 'block px-4 py-2 text-sm leading-5 text-white transition hover:text-mc-blue-500 focus:outline-none'
    ]) }}
>
    {{ $slot }}
</a>