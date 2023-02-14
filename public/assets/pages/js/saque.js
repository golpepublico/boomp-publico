const part1 = $('#part-saque-1');
const part2 = $('#part-saque-2');
const part3 = $('#part-saque-3');
const itemEtapa = document.querySelectorAll('.item-etapa');

$('.avancar-to-2').on('click', function () {
    event.preventDefault();
    //    $(part1).toggleClass('.invisivel');
    preWithdraw(2, { bank_account_id: $('#bank_account_id').val() });

});

$('.retornar-to-1').on('click', function () {
    event.preventDefault();
    $(part2).hide();
    $(part1).fadeIn();
    $(itemEtapa[0]).toggleClass('etapa-ativa');
    $(itemEtapa[1]).toggleClass('etapa-ativa');


});

$('.avancar-to-3').on('click', function () {
    event.preventDefault();
    preWithdraw(3, { value_withdraw: $('#value_withdraw').val() });

});

$('.retornar-to-2').on('click', function () {
    event.preventDefault();
    $(part3).hide();
    $(part2).fadeIn();
    $(itemEtapa[1]).toggleClass('etapa-ativa');
    $(itemEtapa[2]).toggleClass('etapa-ativa');
});

//axios
function preWithdraw(step, params = []) {
    axios.post('/app/wallet/prewithdraw', {
        step: step,
        params: params,
    })
        .then(function (response) {
            if (!response.data.status) {
                $('.error').css('border-color', 'red');
            }

            if (response.data.status && response.data.step === 2) {
                $(part1).hide();
                $(part2).fadeIn()
                $(itemEtapa[0]).toggleClass('etapa-ativa');
                $(itemEtapa[1]).toggleClass('etapa-ativa');
            }

            if (response.data.status && response.data.step === 3) {
                $(part2).hide();
                $(part3).fadeIn();
                $(itemEtapa[1]).toggleClass('etapa-ativa');
                $(itemEtapa[2]).toggleClass('etapa-ativa');
                let bank = $('#bank_account_id option:selected').text();
                $('#retBank').text(bank);
                $('#retAgencia').text(response.data.params.agency);
                $('#retAccount').text(response.data.params.account);
                $('#retWithdraw').text(response.data.params.value_withdraw);
                $('#retCpfCnpj').text(response.data.params.cpfCnpj);
            }
        })
        .catch(function (error) {

        });;
}

const buttonBank = $('#button-bank button');
const openMode = $('#open-mode');

buttonBank.on("click", function () {
    event.preventDefault();
    openMode.fadeIn();
    document.querySelector('#open-mode').style.display = 'flex';
})

$('#nova-cancelar').on('click', function () {
    event.preventDefault();
    openMode.fadeOut();
})

$('.valor-saque').mask('#.##0,00', { reverse: true });

const cpfCnpj = $('.cpf-cnpj');


$(cpfCnpj).keydown(function () {
    try {
        $(cpfCnpj).unmask();
    } catch (e) { }

    var tamanho = $(cpfCnpj).val().length;

    if (tamanho < 11) {
        $(cpfCnpj).mask("999.999.999-99");
    } else {
        $(cpfCnpj).mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function () {
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});
