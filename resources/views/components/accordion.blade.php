<div 
    class="mx-auto bg-white border border-gray-200"
    x-data="{selected: '{{ $selected }}'}"
>
    <ul class="divide-y divide-neutral-300 shadow-box">
        {{ $slot }}
    </ul>
</div>