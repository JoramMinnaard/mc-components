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

            
            <x-navigation.dropdown align="left" width="48">
                <x-slot name="trigger">
                    <span class="inline-flex">
                        <button type="button" class="inline-flex items-center px-3 py-2 text-white transition duration-150 ease-in-out hover:text-mc-blue-500 focus:outline-none">
                            {{ __('Componenten') }}
                            
                            <svg :class="{'rotate-0': ! dropdown, 'rotate-180': dropdown }" class="w-4 h-4 mt-1 ml-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z" />
                            </svg>
                        </button>
                    </span>

                </x-slot>

                <x-slot name="content">
                    <x-navigation.dropdown-link href="{{-- route('accordion') --}}">
                        {{ __('Accordion') }}
                    </x-navigation.dropdown-link>
                    
                    <x-navigation.dropdown-link href="{{-- route('tabs') --}}">
                        {{ __('Tabs') }}
                    </x-navigation.dropdown-link>
                </x-slot>
            </x-navigation.dropdown>
        </div>

        <div
            class="block pb-3 ease-in-out duration-50 sm:hidden"
            x-show="open"
            x-cloak
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

            <x-navigation.responsive-dropdown>
                <x-slot name="trigger">
                        <button type="button" class="flex justify-between w-full py-2 text-white hover:text-mc-blue-500 focus:text-mc-blue-500">
                            {{ __('Componenten') }}
                            
                            <svg :class="{'rotate-0': ! dropdown, 'rotate-180': dropdown }" class="w-4 h-4 mt-1 ml-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z" />
                            </svg>
                        </button>

                </x-slot>

                <x-slot name="content">
                    <x-navigation.responsive-dropdown-link href="{{-- route('accordion') --}}">
                        {{ __('Accordion') }}
                    </x-navigation.responsive-dropdown-link>
                    
                    <x-navigation.responsive-dropdown-link href="{{-- route('tabs') --}}">
                        {{ __('Tabs') }}
                    </x-navigation.responsive-dropdown-link>
                </x-slot>
            </x-navigation.responsive-dropdown>
        </div>
    </div>
</nav>