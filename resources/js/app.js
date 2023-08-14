import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

function zoomFunctionality(zoom, imageElement) {
    if (imageElement.getAttribute("image-slider-image") == null) {
        imageElement = imageElement.children[0];
    }
    const { naturalWidth: width, naturalHeight: height } = imageElement;

    const qs = (selector) => document.querySelector(selector);
    const qsa = (selector) => document.querySelectorAll(selector);
    const toggleClass = (element, className, condition) =>
        condition
            ? element.classList.add(className)
            : element.classList.remove(className);

    const elements = {
        descriptions: qsa("[image-slider-image-description]"),
        selection: qs("[image-slider-image-selection]"),
        prevButton: qs("[previous-image-button]"),
        nextButton: qs("[next-image-button]"),
    };

    // imageElement.classList.toggle(`!w-[${width}px]`, zoom);
    // imageElement.classList.toggle(`!h-[${height}px]`, zoom);
    // imageElement.classList.toggle(`!max-w-[${width}px]`, zoom);
    // imageElement.classList.toggle(`!max-h-[${height}px]`, zoom);
    imageElement.classList.toggle("max-w-full", !zoom);
    imageElement.classList.toggle("max-h-full", !zoom);
    imageElement.style.maxWidth = zoom ? `${width}px` : "100%";
    imageElement.style.width = zoom ? `${width}px` : "100%";
    imageElement.style.maxHeight = zoom ? `${height}px` : "100%";
    imageElement.style.height = zoom ? `${height}px` : "100%";

    elements.descriptions?.forEach((description) => {
        toggleClass(description, "hidden", zoom);
    });

    toggleClass(elements.selection, "hidden", zoom);
    toggleClass(elements.prevButton, "hidden", zoom);
    toggleClass(elements.nextButton, "hidden", zoom);
}

document.addEventListener("DOMContentLoaded", function () {
    const qs = (selector) => document.querySelector(selector);
    const qsa = (selector) => document.querySelectorAll(selector);

    const slider = qs("[image-slider]");
    const openButtons = qsa("[image-slider-open-button]");
    const closeButton = qs("[image-slider-close-button]");
    const imageSelection = qs("[image-slider-image-selection]");
    const prevButton = qs("[previous-image-button]");
    const nextButton = qs("[next-image-button]");

    let images;
    let imageZoomButtons;
    let description;

    const closeModal = () => {
        slider.close();
        document.body.classList.remove("overflow-y-hidden");
    };

    openButtons.forEach((button) => {
        button.addEventListener("click", () => {
            images = qsa("[image-slider-image]");
            imageZoomButtons = qsa("[image-slider-zoom-button]");
            description = qs("[image-slider-image-description]");
            slider.showModal();
            document.body.classList.add("overflow-y-hidden");

            // console.log(imageZoomButtons);

            let currentZoomState = false;
            imageZoomButtons.forEach((imageZoomButton) => {
                imageZoomButton.addEventListener("click", (imageElement) => {
                    zoomFunctionality(!currentZoomState, imageElement.target);
                    currentZoomState = !currentZoomState;
                });

                imageZoomButton.addEventListener("keyup", (event) => {
                    let focusedElement = document.activeElement;
                    // console.log(focusedElement.children[0]);
                    if (
                        event.key === "Enter" &&
                        focusedElement.children[0].getAttribute(
                            "image-slider-image"
                        ) == null
                    ) {
                        zoomFunctionality(
                            !currentZoomState,
                            event.target.children[0]
                        );
                        currentZoomState = !currentZoomState;
                    }
                });
            });
        });
    });

    closeButton.addEventListener("click", closeModal);

    slider.addEventListener("close", () => {
        images.forEach((image) => {
            zoomFunctionality(false, image);
        });
    });

    slider.addEventListener("click", (event) => {
        const shouldCloseModal =
            !Array.from(images).some((image) =>
                image?.contains(event.target)
            ) &&
            !Array.from(imageZoomButtons).some((imageZoomButton) =>
                imageZoomButton?.contains(event.target)
            ) &&
            !description?.contains(event.target) &&
            !imageSelection?.contains(event.target) &&
            !closeButton?.contains(event.target) &&
            !nextButton?.contains(event.target) &&
            !prevButton?.contains(event.target);

        if (shouldCloseModal) {
            closeModal();
            images.forEach((image) => {
                zoomFunctionality(false, image);
            });
        }
    });
});
