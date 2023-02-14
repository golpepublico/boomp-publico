document.querySelector('#form-step-1').addEventListener('submit', e => {
    e.preventDefault();
    document.querySelector('#step-1').classList.add('hidden');
    document.querySelector('#step-icone-1').classList.add('step-finalizado');
    document.querySelector('#step-2').classList.remove('hidden');
});

document.querySelector('#form-step-2').addEventListener('submit', e => {
    e.preventDefault();
    document.querySelector('#step-2').classList.add('hidden');
    document.querySelector('#step-icone-2').classList.add('step-finalizado');
    document.querySelector('#step-3').classList.remove('hidden');
});