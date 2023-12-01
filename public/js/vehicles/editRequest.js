function sendRequest(Selector, URL){
    let formData = new FormData();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", URL, true);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector("form>input[name='_token']").value);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    document.querySelectorAll(`${Selector}`)
        .forEach(element => {
            if(element.getAttribute('type') === 'radio' && element.checked === true){
                formData.set(element.name, element.value);
            }else if (element.getAttribute('type') !== 'radio'){
                formData.set(element.name, element.value);
            }
        });
    formData.set(
        document.querySelector('form>.form-row>select').name,
        document.querySelector('form>.form-row>select').value);
    xhr.send(formData);
}
