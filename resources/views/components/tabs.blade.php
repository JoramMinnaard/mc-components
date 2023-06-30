<div 
    class="flex flex-col mt-12 overflow-hidden rounded"
    x-data="{
        activeTab: '{{ $activeTabTag }}',
        tabHeadings: [],
    }"
    x-init="() => {
        tabs = [...$refs.tabs.children];
        tabHeading = tabs.map(tab => [tab.getAttribute('data-tab-tag'), tab.getAttribute('data-tab-display-name')]);
    }"
>
    <ul class="hidden sm:flex">
        <template x-for="(tab, index) in tabHeading" :key="index">
            <li class="z-10 -mb-px border-t border-x" :class="{ 'bg-white rounded-t border-mc-blue-500' : activeTab == tab[0], 'border-transparent' : activeTab != tab[0] }">
                <a href="" class="block px-6 py-2 text-lg font-semibold hover:underline focus:underline focus-visible:outline-none decoration-mc-blue-500 decoration-2 underline-offset-2" @click.prevent="activeTab = tab[0]" x-text="tab[1]"></a>
            </li>
        </template>
    </ul>

    <select name="tabs" class="z-10 block px-6 py-2 -mb-px text-lg bg-white border-t border-b rounded-t sm:hidden border-x border-mc-blue-500 border-b-neutral-200" id="warhammer_tabs">
        <template x-for="(tab, index) in tabHeading" :key="index">
            <option @click.prevent="activeTab = tab[0]" x-text="tab[1]"></option>
        </template>
    </select>

    <div class="bg-white border rounded-b md:rounded-tr border-mc-blue-500" :class="{ 'md:rounded-tl': activeTab != tabs[0].getAttribute('data-tab-tag')}">
        <div class="max-h-[45rem] overflow-y-auto m-3" x-ref="tabs">
            {{$slot}}
        </div>
    </div>
</div>