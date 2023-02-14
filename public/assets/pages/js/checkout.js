window.onload = function (e) {


    $(".customer").change(function () {
        var mobilePhone = $('#mobilePhone').val();
        var email = $('#email').val();
        var name = $('#name').val();
        var cpfCnpj = $('#cpfCnpj').val();
        var idproduto = $('#product_id').val();
        var store_id = $('#store_id').val();

        if (!!email && !!name && !!cpfCnpj && !!mobilePhone) {
            axios.post('/checkout/precart', {
                name: name,
                email: email,
                cpfCnpj: cpfCnpj,
                mobilePhone: mobilePhone,
                product_id: idproduto,
                store_id: store_id,
            });
        }
    });
}
