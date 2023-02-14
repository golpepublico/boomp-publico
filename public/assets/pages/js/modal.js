function abrirModal(id) {
    document.querySelector(`#${id}`).classList.remove('modal-fechado');
}

function fecharModal(id) {
    document.querySelector(`#${id}`).classList.add('modal-fechado');
}

document.querySelector('#modal-button').addEventListener('click', () => {
    abrirModal('modal');
});

document.querySelector('#modal-close').addEventListener('click', () => {
    fecharModal('modal');
});