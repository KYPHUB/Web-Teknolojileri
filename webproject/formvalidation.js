document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const jsValidationBtn = document.querySelector('#js-validation-btn');
    const vueValidationBtn = document.querySelector('#vue-validation-btn');
    const resetBtn = document.querySelector('#reset-btn');

    jsValidationBtn.addEventListener('click', validateFormWithJS);
    vueValidationBtn.addEventListener('click', validateFormWithVue);
    resetBtn.addEventListener('click', resetForm);

    function validateFormWithJS() {
        const name = form.querySelector('input[name="name"]').value;
        const email = form.querySelector('input[name="email"]').value;
        const age = form.querySelector('select[name="age"]').value;
        const gender = form.querySelector('select[name="gender"]').value;
        const message = form.querySelector('textarea[name="message"]').value;

        if (!name) {
            alert("İsim alanı boş olamaz");
            return false;
        }
        if (!email || !validateEmail(email)) {
            alert("Geçerli bir e-mail adresi girin");
            return false;
        }
        if (!age) {
            alert("Yaş aralığı seçin");
            return false;
        }
        if (!gender) {
            alert("Cinsiyet seçin");
            return false;
        }
        if (!message) {
            alert("Mesaj alanı boş olamaz");
            return false;
        }

        alert("JS ile form doğrulandı");
        return true;
    }

    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()[\]\.,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,})$/i;
        return re.test(String(email).toLowerCase());
    }

    function resetForm() {
        form.reset();
    }
});

    