document.querySelector(".header-menu").addEventListener("click", () => {
    document.querySelector(".nav").classList.remove("nav-hidden");
    document.querySelector(".nav-container").classList.remove("nav-hidden");
});

document.querySelector(".arrow-back").addEventListener("click", () => {
    document.querySelector(".nav").classList.add("nav-hidden");
    document.querySelector(".nav-container").classList.add("nav-hidden");
});

const menuOpitions = document.querySelectorAll(".item-nav");

menuOpitions.forEach((elem, index) => {
    elem.addEventListener("click", (e) => {
        e.preventDefault();
        const container = document.querySelector(`.sub-category-${index}`);
        const otherContainers = document.querySelectorAll(
            `.sub-category:not(.sub-category-${index})`
        );
        const otherElements = Array.from(menuOpitions).filter(
            (el) => el !== elem
        );

        switch (index) {
            case 3:
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-two")
                );
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-tree")
                );
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-four")
                );
                container.classList.toggle("sub-category-open-two");
                otherElements.forEach((el) => el.classList.remove("active"));
                elem.classList.toggle("active");
                break;
            case 4:
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-two")
                );
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-three")
                );
                container.classList.toggle("sub-category-open-four");
                otherElements.forEach((el) => el.classList.remove("active"));
                elem.classList.toggle("active");
                break;
            case 5:
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-two")
                );
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-three")
                );
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-four")
                );
                container.classList.toggle("sub-category-open-four");
                otherElements.forEach((el) => el.classList.remove("active"));
                elem.classList.toggle("active");
                break;
            case 6:
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-two")
                );
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-three")
                );
                otherContainers.forEach((c) =>
                    c.classList.remove("sub-category-open-four")
                );
                container.classList.toggle("sub-category-open-two");
                otherElements.forEach((el) => el.classList.remove("active"));
                elem.classList.toggle("active");
                break;
            case 7:
                    otherContainers.forEach((c) =>
                        c.classList.remove("sub-category-open-two")
                    );
                    otherContainers.forEach((c) =>
                        c.classList.remove("sub-category-open-three")
                    );
                    otherContainers.forEach((c) =>
                        c.classList.remove("sub-category-open-four")
                    );
                    container.classList.toggle("sub-category-open-three");
                    otherElements.forEach((el) => el.classList.remove("active"));
                    elem.classList.toggle("active");
                    break;
            default:
                window.location.href = elem.children[1].href;
                break;
        }

        /*     case 8:
            otherContainers.forEach((c) =>
                c.classList.remove("sub-category-open-two")
            );
            otherContainers.forEach((c) =>
                c.classList.remove("sub-category-open-three")
            );
            otherContainers.forEach((c) =>
                c.classList.remove("sub-category-open-four")
            );
            container.classList.toggle("sub-category-open-two");
            otherElements.forEach((el) => el.classList.remove("active"));
            elem.classList.toggle("active");
            break;
        */
    });
});
