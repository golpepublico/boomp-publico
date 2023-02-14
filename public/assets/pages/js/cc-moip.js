$(document).ready(function () {
    $("#btnSubmit").click(function () {
        var split = $('#validade').val().split('/');
        var month = split[0];
        var year = split[1];
        var year = year.substr(-2);
        var cc = new Moip.CreditCard({
            number: $("#credit").val(),
            cvc: $("#cvv").val(),
            expMonth: month,
            expYear: year,
            pubKey: $("#public_key").val()
        });
        if (cc.isValid()) {
            $("#encrypted_value").val(cc.hash());
        }
        else {
            $("#encrypted_value").val('');
            alert('Invalid credit card. Verify parameters: number, cvc, expiration Month, expiration Year');
        }
    });
});