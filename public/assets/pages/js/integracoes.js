
const openModalButtonInte = document.querySelector("#open-modalInte");
const closeModalButtonInte = document.querySelector("#close-modalInte");
const modalToken = document.querySelector("#modalToken");
const fadeInte = document.querySelector("#fadeInte");

const toggleModalInte = () => {
  modalToken.classList.toggle("hideInte");
  fadeInte.classList.toggle("hideInte");
};

[openModalButtonInte, closeModalButtonInte, fadeInte].forEach((el) => {
  el.addEventListener("click", () => toggleModalInte());
});

const openModalButtonInte2 = document.querySelector("#open-modalInte2");
const closeModalButtonInte2 = document.querySelector("#close-modalInte2");
const modalConfig = document.querySelector("#modalConfig");
const fadeInte2 = document.querySelector("#fadeInte2");

const toggleModalInte2 = () => {
  clearForm();
  modalConfig.classList.toggle("hideInte2");
  fadeInte2.classList.toggle("hideInte2");
};

const clearForm = () => {
    $('#urlConfig').val("")
    $('#product').val("")
    $('input[name^="events"]').attr('checked', false)
    $('#active').attr('checked', false)
    $('#form-modal-config').attr('action', "/app/integrations/0");
}

[openModalButtonInte2, closeModalButtonInte2, fadeInte2].forEach((t) => {
  t.addEventListener("click", () => toggleModalInte2());
});

$('body').on('click','#open-modalInteEdit',function (e) {
    e.preventDefault();

    let id = $(this).data('postbackid')
    axios.get("/app/integrations/" + id)
        .then(function (response) {
            let data = response.data
            $('#urlConfig').val(data.callbackurl)
            $('#product').val(data.product_id)

            Object.keys(data.events).forEach(key => {
                if (key) {
                    $('#ev_'+key).attr('checked', true)
                }
            })

            $('#active').attr('checked', !!data.active)
        })
        .catch(function (error) {
            console.log(error);
        })
    toggleModalInte2()
    $('#form-modal-config').attr('action', "/app/integrations/" + id);
})
