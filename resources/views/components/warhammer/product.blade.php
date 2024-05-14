@php
    $cdnavailable = true;
@endphp
<button image-slider-open-button @click="item = {{ json_encode($product) }}"
    class="border-2 border-transparent rounded-md focus-visible:border-mc-blue-500 group focus-visible:outline-none focus-visible:border-double @if ($product['images'] == [] || !$cdnavailable) cursor-default @endif">
    <div class="relative overflow-hidden bg-white border rounded-lg shadow max-h-56 border-neutral-200 group-focus:border-mc-blue-500/50 group-hover:delay-[350ms] group-hover:border-mc-blue-500/50">
        <div class="absolute inset-0 flex flex-col items-center justify-between transition-all duration-150 ease-in-out bg-transparent group-focus:backdrop-blur-sm group-focus:bg-white/50 group-hover:delay-[350ms] group-hover:backdrop-blur-sm group-hover:bg-white/50">
            <div class="flex items-center justify-center h-full">
                @if ($product['images'] !== [])
                    @if ($cdnavailable)
                        <svg class="h-20 transition-all duration-150 ease-in-out group-focus:fill-neutral-900/100 group-hover:delay-[350ms] group-hover:fill-neutral-900/100 fill-transparent"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M11 6H9v3H6v2h3v3h2v-3h3V9h-3z" />
                            <path d="M10 2c-4.411 0-8 3.589-8 8s3.589 8 8 8a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8zm0 14c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z" />
                        </svg>
                    @endif
                @endif
            </div>
            <div class="w-full px-4 py-2 text-sm transition-all translate-y-full border-t group-focus:translate-y-0 group-hover:delay-[350ms] group-hover:translate-y-0 bg-neutral-100 border-mc-blue-500/50">
                <p>
                    <b class="text-xs">{{ $product['name'] }}</b>
                    <hr class="my-1 border-neutral-300">
                    <b>Model:</b> <span>{{ $product['ss_code'] }}</span>
                </p>
            </div>
            <div class="absolute top-0 right-0 w-32 h-6 mt-6 text-base font-bold text-center text-white rotate-45 shadow blur-none -mr-7 bg-mc-blue-500 shadow-black/50">
                € {{ number_format(($product['retail_price'] / 100), 2, ',', '.') }}
            </div>
        </div>
        <div class="flex items-center justify-center w-full h-40 p-2">
            @if ($product['images'] == [] || !$cdnavailable)
                POOP
            @else
                <img class="max-w-full max-h-full" src="https://cdn.millenniumcomputers.nl/warhammer/scaled/{{ $product['images'][0] }}" alt="" loading="lazy">
            @endif
        </div>
        <div class="flex items-center justify-center h-16 px-2 border-t">
            <div class="text-xs text-center uppercase">
                {{ $product['name'] }}
            </div>
        </div>
    </div>
</button>