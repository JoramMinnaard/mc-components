<dialog image-slider class="w-screen h-screen max-w-full max-h-full p-0 bg-transparent backdrop:bg-neutral-600/70 backdrop:backdrop-blur-sm">
    <div class="flex flex-col w-full h-full">
        <template x-for="(slide, index) in item.images" :key="index">
            <div class="flex flex-col w-full h-full" x-show="item.activeSlideId === index">
                <div class="absolute left-0 right-0 z-10 mx-auto">
                    <div class="flex justify-center">
                        <span image-slider-image-description class="py-1.5 px-3 rounded-b backdrop-blur-sm border-x border-neutral-700/50 shadow-md shadow-neutral-700/50 border-b bg-neutral-800/40 text-white" x-text="item.name"></span>
                    </div>
                </div>

                <div class="flex items-center justify-center my-4 grow">
                    <div class="relative flex justify-center w-full h-full">
                        <div class="flex justify-center w-full h-full">
                            <div class="absolute flex items-center h-full" :class="{ 'w-full relative' : imgzoom == true }" x-data="{ imgzoom: false }">
                                <img 
                                    image-slider-image 
                                    :src="'https://cdn.millenniumcomputers.nl/warhammer/full/'+item.images[index]" 
                                    loading="lazy"
                                    tabindex="0" 
                                    role="button" 
                                    aria-pressed="false"
                                    class="max-w-full max-h-full mx-auto border-4 border-transparent rounded-sm outline-none cursor-zoom-in focus-visible:border-mc-blue-500" 
                                    :class="{ 'inset-0' : imgzoom == true }" 
                                    @click="imgzoom = !imgzoom;"
                                    @click.away="imgzoom = false;"
                                    @keydown.escape="imgzoom = false;"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <button 
            x-show="item.images.length > 1"
            type="button" 
            class="absolute left-0 z-10 h-full outline-none group drop-shadow hover:bg-neutral-700/40 focus-visible:bg-neutral-700/40" 
            previous-image-button
            @click="item.activeSlideId = item.activeSlideId === 0 ? item.images.length - 1 : item.activeSlideId - 1"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 stroke-[0.25] sm:bg-transparent bg-neutral-800/20 rounded-r-full stroke-neutral-800/70 fill-white group-focus-visible:fill-mc-blue-500 group-hover:fill-mc-blue-500">
                <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z" />
            </svg>
        </button>
        
        <button 
            x-show="item.images.length > 1"
            type="button" 
            class="absolute right-0 z-10 h-full outline-none group drop-shadow hover:bg-neutral-700/40 focus-visible:bg-neutral-700/40" 
            next-image-button
            @click="item.activeSlideId = (item.activeSlideId + 1) % item.images.length"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 stroke-[0.25] sm:bg-transparent bg-neutral-800/20 rounded-l-full stroke-neutral-800/70 fill-white group-focus-visible:fill-mc-blue-500 group-hover:fill-mc-blue-500">
                <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z" />
            </svg>
        </button>
        
        <div x-show="item.images.length > 1" image-slider-image-selection class="z-10 flex px-1 py-3 overflow-x-auto shadow-md rounded-t-md h-36 shrink-0 flex-nowrap bg-neutral-700/60 backdrop-blur">
            <template x-for="(slide, index) in item.images" :key="index">
                <button
                class="w-32 h-full mx-2 overflow-hidden border-4 rounded shrink-0"
                :class="{ 
                    'border-mc-blue-500 ': item.activeSlideId === index,
                    'border-neutral-400': item.activeSlideId !== index 
                }" 
                  @click="item.activeSlideId = index"
                  >
                  <img :src="'https://cdn.millenniumcomputers.nl/warhammer/scaled/'+item.images[index]" loading="lazy" alt="" class="object-cover w-full h-full">  
                </button>
            </template>
        </div>
    </div>
    <button type="button" image-slider-close-button class="fixed z-20 rounded-full outline-none bg-neutral-800/40 top-3 right-6 group drop-shadow">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 stroke-[0.5] stroke-neutral-800/70 fill-white group-focus-visible:fill-mc-blue-500 group-hover:fill-mc-blue-500">
            <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z" />
        </svg>
    </button>
</dialog>