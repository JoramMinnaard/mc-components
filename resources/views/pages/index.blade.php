<x-app-layout page-title="Home |">

    <div
    x-data="{ item: {} }"
>

<button 
image-slider-open-button
@click="item = {
    activeSlideId: 1, 
    slides: [
        {
            'id': 1, 
            'imageAlt': '',
            'imageDescription': 'Product one',
            'images': {
                'full': 'https://cdn.millenniumcomputers.nl/warhammer/full/60010799020_WhUnderworldsStarterSet_0.jpg',
                'scaled': 'https://cdn.millenniumcomputers.nl/warhammer/scaled/60010799020_WhUnderworldsStarterSet_0.jpg'
            }
        }, 
        {
            'id': 2, 
            'imageAlt': '',
            'imageDescription': 'Product two',
            'images': {
                'full': 'https://placekitten.com/2500/2001',
                'scaled': 'https://placekitten.com/500/334'
            }
        }, 
        {
            'id': 3, 
            'imageAlt': '',
            'imageDescription': 'Product three',
            'images': {
                'full': 'https://placekitten.com/1500/1012',
                'scaled': 'https://placekitten.com/500/339'
            }
        }, 
        {
            'id': 4, 
            'imageAlt': '',
            'imageDescription': 'Product four',
            'images': {
                'full': 'https://placekitten.com/1500/1007',
                'scaled': 'https://placekitten.com/500/336'
            }
        }, 
        {
            'id': 5, 
            'imageAlt': '',
            'imageDescription': 'Product five',
            'images': {
                'full': 'https://placekitten.com/1500/1004',
                'scaled': 'https://placekitten.com/500/332'
            }
        }
    ]
}"
>
Product
</button>

<button 
            image-slider-open-button
            @click="item = {
                activeSlideId: 1, 
                slides: [
                    {
                        'id': 1, 
                        'imageAlt': '',
                        'imageDescription': 'Item one',
                        'images': {
                            'full': 'https://cdn.millenniumcomputers.nl/warhammer/full/60010799020_WhUnderworldsStarterSet_0.jpg',
                            'scaled': 'https://cdn.millenniumcomputers.nl/warhammer/scaled/60010799020_WhUnderworldsStarterSet_0.jpg'
                        }
                    }, 
                    {
                        'id': 2, 
                        'imageAlt': '',
                        'imageDescription': 'Item two',
                        'images': {
                            'full': 'https://placekitten.com/2500/2001',
                            'scaled': 'https://placekitten.com/500/334'
                        }
                    }, 
                    {
                        'id': 3, 
                        'imageAlt': '',
                        'imageDescription': 'Item three',
                        'images': {
                            'full': 'https://placekitten.com/1500/1012',
                            'scaled': 'https://placekitten.com/500/339'
                        }
                    }, 
                    {
                        'id': 4, 
                        'imageAlt': '',
                        'imageDescription': 'Item four',
                        'images': {
                            'full': 'https://placekitten.com/1500/1007',
                            'scaled': 'https://placekitten.com/500/336'
                        }
                    }, 
                    {
                        'id': 5, 
                        'imageAlt': '',
                        'imageDescription': 'Item five',
                        'images': {
                            'full': 'https://placekitten.com/1500/1004',
                            'scaled': 'https://placekitten.com/500/332'
                        }
                    }
                ]
            }"
        >
            Item
        </button>


    
        <dialog image-slider class="w-screen h-screen max-w-full max-h-full p-0 bg-transparent backdrop:bg-neutral-600/70 backdrop:backdrop-blur-sm">
            <div class="flex flex-col w-full h-full">
                <template x-for="slide in item.slides" :key="slide.id">
                    <div class="flex flex-col w-full h-full" x-show="item.activeSlideId === slide.id">
                        <div class="absolute left-0 right-0 z-10 mx-auto">
                            <div class="flex justify-center">
                                <span image-slider-image-description class="py-1.5 px-3 rounded-b backdrop-blur-sm border-x border-neutral-700/50 shadow-md shadow-neutral-700/50 border-b bg-neutral-800/40 text-white" x-text="slide.imageDescription"></span>
                            </div>
                        </div>
    
                        <div class="flex items-center justify-center my-4 grow">
                            <div class="relative flex justify-center w-full h-full">
                                <div class="flex justify-center w-full h-full">
                                    <div class="absolute flex items-center justify-center h-full" :class="{ 'w-full' : imgzoom == true }" x-data="{ imgzoom: false }">
                                        <img 
                                            image-slider-image 
                                            :src="slide.images.full" 
                                            alt="slide['imageDescription']" 
                                            loading="lazy"
                                            tabindex="0" 
                                            class="max-w-full max-h-full border-4 border-transparent rounded-sm outline-none cursor-zoom-in focus-visible:border-mc-blue-500" 
                                            :class="{ 'absolute mx-auto inset-0 cursor-zoom-out' : imgzoom == true }" 
                                            @click="imgzoom = !imgzoom; zoomFunctionality(imgzoom, $el)"
                                            @click.away="imgzoom = false; zoomFunctionality(imgzoom, $el)"
                                            @keyup.enter="imgzoom = !imgzoom; zoomFunctionality(imgzoom, $el)"
                                            @keydown.escape="imgzoom = false; zoomFunctionality(imgzoom, $el)"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
    
                <button 
                    type="button" 
                    class="absolute left-0 z-10 h-full outline-none group drop-shadow hover:bg-neutral-700/40 focus-visible:bg-neutral-700/40" 
                    previous-image-button
                    @click="item.activeSlideId = item.activeSlideId === 1 ? item.slides.length : item.activeSlideId - 1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 stroke-[0.25] sm:bg-transparent bg-neutral-800/20 rounded-r-full stroke-neutral-800/70 fill-white group-focus-visible:fill-mc-blue-500 group-hover:fill-mc-blue-500">
                        <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z" />
                    </svg>
                </button>
                
                <button 
                    type="button" 
                    class="absolute right-0 z-10 h-full outline-none group drop-shadow hover:bg-neutral-700/40 focus-visible:bg-neutral-700/40" 
                    next-image-button
                    @click="item.activeSlideId = item.activeSlideId === item.slides.length ? 1 : item.activeSlideId + 1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 stroke-[0.25] sm:bg-transparent bg-neutral-800/20 rounded-l-full stroke-neutral-800/70 fill-white group-focus-visible:fill-mc-blue-500 group-hover:fill-mc-blue-500">
                        <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z" />
                    </svg>
                </button>
                
                <div image-slider-image-selection class="z-10 flex px-1 py-3 overflow-x-auto shadow-md rounded-t-md h-36 shrink-0 flex-nowrap bg-neutral-700/60 backdrop-blur">
                    <template x-for="slide in item.slides" :key="slide.id">
                        <button
                        class="w-32 h-full mx-2 overflow-hidden border-4 rounded shrink-0"
                        :class="{ 
                            'border-mc-blue-500 ': item.activeSlideId === slide.id,
                            'border-neutral-400': item.activeSlideId !== slide.id 
                        }" 
                          @click="item.activeSlideId = slide.id"
                          >
                          <img :src="slide.images.scaled" loading="lazy" alt="" class="object-cover w-full h-full">  
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
    
        <script defer>
            function zoomFunctionality(zoom, imageElement) {
                const { naturalWidth: width, naturalHeight: height } = imageElement;

                const qs = (selector) => document.querySelector(selector);
                const qsa = (selector) => document.querySelectorAll(selector);
                const toggleClass = (element, className, condition) =>
                    condition ? element.classList.add(className) : element.classList.remove(className);

                const elements = {
                    descriptions: qsa("[image-slider-image-description]"),
                    selection: qs("[image-slider-image-selection]"),
                    prevButton: qs("[previous-image-button]"),
                    nextButton: qs("[next-image-button]"),
                };

                imageElement.classList.toggle(`w-[${width}px]`, zoom);
                imageElement.classList.toggle(`h-[${height}px]`, zoom);
                imageElement.classList.toggle(`!max-w-[${width}px]`, zoom);
                imageElement.classList.toggle(`!max-h-[${height}px]`, zoom);
                imageElement.classList.toggle("max-w-full", !zoom);
                imageElement.classList.toggle("max-h-full", !zoom);
                imageElement.style.maxWidth = zoom ? `${width}px` : "100%";

                elements.descriptions?.forEach((description) => {
                    toggleClass(description, "hidden", zoom);
                });

                toggleClass(elements.selection, "hidden", zoom);
                toggleClass(elements.prevButton, "hidden", zoom);
                toggleClass(elements.nextButton, "hidden", zoom);
            }
            
            document.addEventListener("DOMContentLoaded", function() {
                const qs = (selector) => document.querySelector(selector);
                const qsa = (selector) => document.querySelectorAll(selector);

                const slider = qs("[image-slider]");
                const openButtons = qsa("[image-slider-open-button]");
                const closeButton = qs("[image-slider-close-button]");
                const imageSelection = qs("[image-slider-image-selection]");
                const prevButton = qs("[previous-image-button]");
                const nextButton = qs("[next-image-button]");

                let images;
                let description;

                const closeModal = () => {
                    slider.close();
                    document.body.classList.remove("overflow-y-hidden");
                };

                openButtons.forEach((button) => {
                    button.addEventListener("click", () => {
                        images = qsa("[image-slider-image]");
                        description = qs("[image-slider-image-description]");
                        slider.showModal();
                        document.body.classList.add("overflow-y-hidden");
                    });
                });

                closeButton.addEventListener("click", closeModal);

                slider.addEventListener("click", (event) => {
                    const shouldCloseModal =
                        !Array.from(images).some((image) => image?.contains(event.target)) &&
                        !description?.contains(event.target) &&
                        !imageSelection?.contains(event.target) &&
                        !closeButton?.contains(event.target) &&
                        !nextButton?.contains(event.target) &&
                        !prevButton?.contains(event.target);

                    if (shouldCloseModal) {
                        closeModal();
                    }
                });
            });
        </script>
    
    </div>
    
</x-app-layout>
