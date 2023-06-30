<x-app-layout page-title="Tabs |">
    Tabs

    <x-tabs activeTabTag="{{ $warhammer_products['categories'][0]['tag'] }}">
        @foreach ($warhammer_products['categories'] as $warhammer_products_category)
        <x-tab tabTag="{{ $warhammer_products_category['tag'] }}" tabDisplayName="{{ $warhammer_products_category['displayName'] }}">
            <div class="grid grid-cols-2 gap-4 md:gap-5 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($warhammer_products_category['products'] as $product)
                    <div class="p-4 text-sm border rounded bg-neutral-100 border-neutral-200">
                        {{ $product['name'] }}
                    </div>
                @endforeach
            </div>
        </x-tab>
        @endforeach
    </x-tabs>
</x-app-layout>