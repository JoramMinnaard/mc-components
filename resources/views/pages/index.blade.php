<x-app-layout page-title="Home |">

    <div>

        <button id="imageSliderOpenButton">test</button>
    
        <dialog id="imageSlider" class="w-screen h-screen max-w-full max-h-full p-0 bg-transparent backdrop:bg-neutral-600/70 backdrop:backdrop-blur-sm">
            <div 
                class="flex flex-col w-full h-full"
                x-data="
                    { 
                        activeSlideId: 1, 
                        slides: [
                            {
                                'id': 1, 
                                'imageAlt': '',
                                'imageDescription': 'number one',
                                'images': {
                                    'full': 'https://cdn.millenniumcomputers.nl/warhammer/full/60010799020_WhUnderworldsStarterSet_0.jpg',
                                    'scaled': 'https://cdn.millenniumcomputers.nl/warhammer/scaled/60010799020_WhUnderworldsStarterSet_0.jpg'
                                }
                            }, 
                            {
                                'id': 2, 
                                'imageAlt': '',
                                'imageDescription': 'number two',
                                'images': {
                                    'full': 'https://placekitten.com/2500/2001',
                                    'scaled': 'https://placekitten.com/500/334'
                                }
                            }, 
                            {
                                'id': 3, 
                                'imageAlt': '',
                                'imageDescription': 'number three',
                                'images': {
                                    'full': 'https://placekitten.com/1500/1012',
                                    'scaled': 'https://placekitten.com/500/339'
                                }
                            }, 
                            {
                                'id': 4, 
                                'imageAlt': '',
                                'imageDescription': 'number four',
                                'images': {
                                    'full': 'https://placekitten.com/1500/1007',
                                    'scaled': 'https://placekitten.com/500/336'
                                }
                            }, 
                            {
                                'id': 5, 
                                'imageAlt': '',
                                'imageDescription': 'number five',
                                'images': {
                                    'full': 'https://placekitten.com/1500/1004',
                                    'scaled': 'https://placekitten.com/500/332'
                                }
                            }
                        ] 
                    }
                "
            >
                <template x-for="slide in slides" :key="slide.id">
                    <div class="flex flex-col w-full h-full" x-show="activeSlideId === slide.id">
                        <div class="absolute left-0 right-0 z-10 mx-auto">
                            <div class="flex justify-center">
                                <span id="imageSliderImageDescription" class="py-1.5 px-3 rounded-b backdrop-blur-sm border-x border-neutral-700/50 shadow-md shadow-neutral-700/50 border-b bg-neutral-800/40 text-white" x-text="slide.imageDescription"></span>
                            </div>
                        </div>
    
                        <div class="flex items-center justify-center my-4 grow">
                            <div class="relative flex justify-center w-full h-full">
                                <div class="flex justify-center w-full h-full">
                                    <div class="absolute flex items-center justify-center h-full" :class="{ 'w-full' : imgzoom == true }" x-data="{ imgzoom: false }">
                                        <img 
                                            id="imageSliderImage" 
                                            :src="slide.images.full" 
                                            alt="slide['imageDescription']" 
                                            loading="lazy"
                                            tabindex="0" 
                                            class="max-w-full max-h-full border-4 border-transparent rounded-sm outline-none cursor-zoom-in focus-visible:border-custom-secondary" 
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
                    id="previousImageButton" 
                    @click="activeSlideId = activeSlideId === 1 ? slides.length : activeSlideId - 1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 stroke-[0.25] sm:bg-transparent bg-neutral-800/20 rounded-r-full stroke-neutral-800/70 fill-white group-focus-visible:fill-custom-secondary group-hover:fill-custom-secondary">
                        <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z" />
                    </svg>
                </button>
                
                <button 
                    type="button" 
                    class="absolute right-0 z-10 h-full outline-none group drop-shadow hover:bg-neutral-700/40 focus-visible:bg-neutral-700/40" 
                    id="nextImageButton" 
                    @click="activeSlideId = activeSlideId === slides.length ? 1 : activeSlideId + 1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 stroke-[0.25] sm:bg-transparent bg-neutral-800/20 rounded-l-full stroke-neutral-800/70 fill-white group-focus-visible:fill-custom-secondary group-hover:fill-custom-secondary">
                        <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z" />
                    </svg>
                </button>
    
                <button type="button" id="imageSliderCloseButton" class="absolute z-20 rounded-full outline-none bg-neutral-800/40 top-1 right-2 group drop-shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 stroke-[0.5] stroke-neutral-800/70 fill-white group-focus-visible:fill-custom-secondary group-hover:fill-custom-secondary">
                        <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z" />
                    </svg>
                </button>
                
                <div id="imageSliderImageSelection" class="z-10 flex px-1 py-3 overflow-x-auto shadow-md rounded-t-md h-36 shrink-0 flex-nowrap bg-neutral-700/60 backdrop-blur">
                    <template x-for="slide in slides" :key="slide.id">
                        <button
                        class="w-32 h-full mx-2 overflow-hidden border-4 rounded shrink-0"
                        :class="{ 
                            'border-custom-secondary ': activeSlideId === slide.id,
                            'border-neutral-400': activeSlideId !== slide.id 
                        }" 
                          @click="activeSlideId = slide.id"
                          >
                          <img :src="slide.images.scaled" loading="lazy" alt="" class="object-cover w-full h-full">  
                        </button>
                    </template>
                </div>
            </div>
        </dialog>
    
        <script>
            function zoomFunctionality(zoom, imageElement) {
                const { naturalWidth: width, naturalHeight: height } = imageElement;
    
                const getElement = (selector) => document.querySelector(selector);
                const getElements = (selector) => document.querySelectorAll(selector);
                const toggleClass = (element, className, condition) =>
                    condition ? element.classList.add(className) : element.classList.remove(className);
    
                const elements = {
                    sliderImageDescriptions: getElements("#imageSliderImageDescription"),
                    sliderImageSelection: getElement("#imageSliderImageSelection"),
                    previousImageButton: getElement("#previousImageButton"),
                    nextImageButton: getElement("#nextImageButton"),
                };
    
                imageElement.classList.toggle(`w-[${width}px]`, zoom);
                imageElement.classList.toggle(`h-[${height}px]`, zoom);
                imageElement.classList.toggle(`!max-w-[${width}px]`, zoom);
                imageElement.classList.toggle(`!max-h-[${height}px]`, zoom);
                imageElement.classList.toggle("max-w-full", !zoom);
                imageElement.classList.toggle("max-h-full", !zoom);
                imageElement.style.maxWidth = zoom ? `${width}px` : "100%";
    
                elements.sliderImageDescriptions?.forEach(description => {
                    toggleClass(description, "hidden", zoom);
                });
    
                toggleClass(elements.sliderImageSelection, "hidden", zoom);
                toggleClass(elements.previousImageButton, "hidden", zoom);
                toggleClass(elements.nextImageButton, "hidden", zoom);
            }
            
            document.addEventListener("DOMContentLoaded", function() {
                const imageSlider = document.querySelector("#imageSlider");
                const imageOpenButton = document.querySelector("#imageSliderOpenButton");
                const imageCloseButton = document.querySelector("#imageSliderCloseButton");
                const images = document.querySelectorAll("#imageSliderImage");
                const imageDescription = document.querySelector("#imageSliderImageDescription");
                const imageSelection = document.querySelector("#imageSliderImageSelection");
                const imagePreviousButton = document.querySelector("#previousImageButton");
                const imageNextButton = document.querySelector("#nextImageButton");
    
                const closeModal = () => {
                    imageSlider.close();
                    document.body.classList.remove("overflow-y-hidden");
                };
    
                imageOpenButton.addEventListener("click", () => {
                    imageSlider.showModal();
                    document.body.classList.add("overflow-y-hidden");
                });
    
                imageCloseButton.addEventListener("click", closeModal);
    
                imageSlider.addEventListener("click", (event) => {
                    const shouldCloseModal =
                        !Array.from(images).some(image => image?.contains(event.target)) &&
                        !imageDescription?.contains(event.target) &&
                        !imageSelection?.contains(event.target) &&
                        !imageCloseButton?.contains(event.target) &&
                        !imageNextButton?.contains(event.target) &&
                        !imagePreviousButton?.contains(event.target);
    
                    if (shouldCloseModal) {
                        closeModal();
                    }
                });
            });
        </script>
    
    </div>
    
</x-app-layout>
