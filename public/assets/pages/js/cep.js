const path = "https://viacep.com.br/ws/{cep}/json/?callback=callbackEndereco"

function getUrlCEPAPI(cep) {
    let url = path.replace("{cep}", cep)
    return url
}

function clearEndereco() {
    document.getElementById('endereco').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
}

function callbackEndereco(conteudo) {
    if (("erro" in conteudo)) {
        clearEndereco();
        alert("CEP não encontrado.");
        return
    }

    document.getElementById('endereco').value = (conteudo.logradouro);
    document.getElementById('bairro').value = (conteudo.bairro);
    document.getElementById('cidade').value = (conteudo.localidade);
    document.getElementById('uf').value = (conteudo.uf);
}

function cepIsEmpty(valor) {
    var cep = valor.replace(/\D/g, '');
    if (!cep) {
        return true
    }
    return false
}

function cepIsValid(valor) {
    var validacep = /^[0-9]{8}$/;
    if (!validacep.test(valor)) {
        return false
    }
    return true
}

function addScriptSyncCallback(cep) {
    var script = document.createElement('script');
    script.src = getUrlCEPAPI(cep);
    document.body.appendChild(script);
}

function searchCEP(cep) {
    if (cepIsEmpty(cep)) {
        clearEndereco();
        return
    }

    // if (!cepIsValid(cep)) {
    //     clearEndereco();
    //     alert("Formato de CEP inválido");
    //     return
    // }

    addScriptSyncCallback(cep);
};
