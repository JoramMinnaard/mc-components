<li class="relative">
    <button
        type="button"
        class="w-full px-6 py-4 text-left"
        :class="{'border-b border-neutral-300 bg-neutral-100': selected == '{{ $accordionTag }}'}"
        @click="selected !== '{{ $accordionTag }}' ? selected = '{{ $accordionTag }}' : selected = null"
    >
        <div class="flex items-center justify-between">
            <span>{{ $accordionDisplayName }}</span>
            <svg
                class="w-5 h-5 text-gray-500 transition duration-300 stroke-current stroke-2 fill-transparent"
                :class="{'rotate-180': selected == '{{ $accordionTag }}'}"
                viewBox="0 0 24 24"
            >
                <path d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </button>

    <div
        class="overflow-hidden transition-all duration-300 max-h-0"
        x-ref="{{ $accordionTag }}"
        x-bind:style="selected == '{{ $accordionTag }}' ? 'max-height: ' + $refs.{{ $accordionTag }}.scrollHeight + 'px' : ''"
    >
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</li>