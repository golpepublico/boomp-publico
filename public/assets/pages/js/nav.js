document.querySelector('.header-menu').addEventListener('click', () => {
    document.querySelector('.nav').classList.remove('nav-hidden');
    document.querySelector('.nav-container').classList.remove('nav-hidden');
});

document.querySelector('.arrow-back').addEventListener('click', () => {
    document.querySelector('.nav').classList.add('nav-hidden');
    document.querySelector('.nav-container').classList.add('nav-hidden');
});