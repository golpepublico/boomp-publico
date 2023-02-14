$("#mobilePhone").mask("(99) 99999-9999");
$("#cep").mask("00000-000");
$("#credit").mask('9999-9999-9999-9999');
$("#validade").mask('99/9999');
$("#cvv").mask('999');

$("#cpfCnpj").keydown(function () {
    try {
        $("#cpfCnpj").unmask();
    } catch (e) { }

    var tamanho = $("#cpfCnpj").val().length;

    if (tamanho < 11) {
        $("#cpfCnpj").mask("999.999.999-99");
    } else {
        $("#cpfCnpj").mask("99.999.999/9999-99");
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

function openLoad() {
    var mobilePhone = $('#mobilePhone').val();
    var email = $('#email').val();
    var name = $('#name').val();
    var cpfCnpj = $('#cpfCnpj').val();
    var cep = $('#cep').val();
    var uf = $('#uf').val();
    var cidade = $('#cidade').val();
    var endereco = $('#endereco').val();
    var addressNumber = $('#addressNumber').val();

    if (!!email && !!name && !!cpfCnpj && !!mobilePhone && !!cep && !!uf && !!cidade && !!endereco && !!addressNumber) {
        $('.loader').show();
    }
}
