document.querySelector("#form-leaser-edit").addEventListener("submit", e=> {
    e.preventDefault();
    let formData = new FormData();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/leaser/update", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector("form>input[name='_token']").value);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    document.querySelectorAll("form>.form-row>input:not([type='hidden'])")
        .forEach(element => {
            formData.set(element.name, element.value);
    });
    xhr.send(formData);
});
