<nav class="bg-custom-navandfooter">
    <div class="container max-w-screen-xl py-2 bg-inherit" x-data="{ open: false }">
        <div class="flex justify-between py-2 sm:hidden">
            <h3 class="flex text-2xl select-none font-verdana drop-shadow-[1px_1px_1.5px_#0009]">
                <span class="font-bold text-transparent bg-clip-text bg-gradient-to-b from-[#fcfcfc] to-[#bcbcbc]">
                    Millennium
                </span>
                <span class="text-mc-blue-500">
                    Computers
                </span>
            </h3>
            <button class="text-neutral-300 hover:text-mc-blue-500 focus:border-none" @click="open = true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 24 24">
                    <path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z"/>
                </svg>
            </button>
        </div>

        <div class="hidden sm:flex sm:flex-wrap bg-inherit">
            <x-navigation.link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Home
            </x-navigation.link>
        </div>

        <div
            class="block pb-3 ease-in-out duration-50 sm:hidden"
            x-show="open"
            @click.away="open = false"
            x-transition:enter="transition duration-100"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition duration-100"
            x-transition:leave-end="opacity-0 -translate-y-3"
        >
            <x-navigation.responsive-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Home
            </x-navigation.responsive-link>
        </div>
    </div>
</nav>