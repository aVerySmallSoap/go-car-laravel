document.querySelector("#form-pre-receipt").addEventListener("submit", e => {
    e.preventDefault();
    let formData = new FormData;
    document.querySelectorAll(
        "span[data-mark-important]").forEach(span => {
            formData.set(span.dataset.markLabel, span.innerText);
    });
    document.querySelectorAll(
        "#container-important>input").forEach(input => {
            formData.set(input.name, input.value);
    });
    document.querySelectorAll(
        ".pre-optionals>.optionals-gas>input").forEach(input => {
        formData.set(input.name, input.value);
    });
    document.querySelectorAll(
        ".pre-optionals>div>input[type=checkbox]").forEach(input => {
            if(input.checked){
                formData.set(input.name, input.value);
            }
    });
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/generate/pre-trip/store", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector("form>input[name='_token']").value);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(formData);
})