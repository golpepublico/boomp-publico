document.querySelector('#nomeloja').addEventListener('input', function () {
    if (this.value) {
        let loja = this.value;
        let slugLoja = loja.replace(/\s/g, '-');

        document.querySelector('#urlloja').value = `https://boomp.com.br/checkout/${slugLoja}`;
    } else {
        document.querySelector('#urlloja').value = ``;
    }
});
