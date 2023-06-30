@props(['align' => 'left', 'width' => '48'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'none':
    case 'false':
        $alignmentClasses = '';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<div class="relative bg-inherit" x-data="{ dropdown: false }" @click.away="dropdown = false" @close.stop="dropdown = false">
    <div @click="dropdown = ! dropdown">
        {{ $trigger }}
    </div>

    <div x-show="dropdown"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-50 mt-0.5 bg-inherit {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
            style="display: none;"
            @click="dropdown = false">
        <div class="overflow-hidden border rounded-md border-neutral-800 bg-inherit ring-1 ring-black ring-opacity-5">
            {{ $content }}
        </div>
    </div>
</div>