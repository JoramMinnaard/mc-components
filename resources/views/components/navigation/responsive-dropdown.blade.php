<div class="bg-inherit" x-data="{ dropdown: false }" @click.away="dropdown = false" @close.stop="dropdown = false">
    <div @click="dropdown = ! dropdown">
        {{ $trigger }}
    </div>

    <div 
        x-show="dropdown"
        x-transition:enter="transition duration-100"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition duration-100"
        x-transition:leave-end="opacity-0 -translate-y-3"
        class="bg-inherit"
        x-cloak
        @click="dropdown = false">
        <div class="py-0.5 my-0.5 border-y border-white/20">
            {{ $content }}
        </div>
    </div>
</div>