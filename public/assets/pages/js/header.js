const openModalButton = document.querySelector("#open-modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");
const openModalButton2 = document.querySelector("#open-modal2");
const openModalButton3 = document.querySelector("#open-modal3");
const modal2 = document.querySelector("#modal2");
const fade2 = document.querySelector("#fade2");

const toggleModal = () => {
modal.classList.toggle("hide");
fade.classList.toggle("hide");
};

[openModalButton, fade].forEach((el) => {
el.addEventListener("click", () => toggleModal());
});

const toggleModal2 = () => {
modal2.classList.toggle("hide");
fade2.classList.toggle("hide");
};

[openModalButton2, fade2].forEach((el) => {
el.addEventListener("click", () => toggleModal2());
});