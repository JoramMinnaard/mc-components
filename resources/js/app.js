import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    function zoomFunctionality(zoom, imageElement) {
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

        imageElement.classList.toggle(`w-[${width}px]`, zoom);
        imageElement.classList.toggle(`h-[${height}px]`, zoom);
        imageElement.classList.toggle(`!max-w-[${width}px]`, zoom);
        imageElement.classList.toggle(`!max-h-[${height}px]`, zoom);
        imageElement.classList.toggle("max-w-full", !zoom);
        imageElement.classList.toggle("max-h-full", !zoom);
        imageElement.style.maxWidth = zoom ? `${width}px` : "100%";
        imageElement.style.cursor = zoom ? "zoom-out" : "zoom-in";

        imageElement.parentElement.style.position = zoom
            ? "relative"
            : "absolute";

        elements.descriptions?.forEach((description) => {
            toggleClass(description, "hidden", zoom);
        });

        toggleClass(elements.selection, "hidden", zoom);
        toggleClass(elements.prevButton, "hidden", zoom);
        toggleClass(elements.nextButton, "hidden", zoom);
    }

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

            if (slider.open) {
                let currentZoomState = false;
                images.forEach((image) => {
                    image.addEventListener("click", (imageElement) => {
                        zoomFunctionality(
                            !currentZoomState,
                            imageElement.target
                        );
                        currentZoomState = !currentZoomState;
                    });

                    image.addEventListener("keyup", (event) => {
                        let focusedElement = document.activeElement;
                        if (
                            event.key === "Enter" &&
                            focusedElement.hasAttribute("image-slider-image")
                        ) {
                            zoomFunctionality(!currentZoomState, event.target);
                            currentZoomState = !currentZoomState;
                            zoomFunctionality(!currentZoomState, event.target);
                        }
                    });
                });
            }
        });
    });

    closeButton.addEventListener("click", closeModal);

    slider.addEventListener("close", () => {
        console.log("Closes");
        images.forEach((image) => {
            zoomFunctionality(false, image);
        });
    });

    slider.addEventListener("click", (event) => {
        const shouldCloseModal =
            !Array.from(images).some((image) =>
                image?.contains(event.target)
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
