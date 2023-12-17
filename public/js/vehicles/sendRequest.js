function sendRequest(Selector, URL, callback){
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
    document.querySelectorAll("form>.form-row>select")
        .forEach(elem => {
            formData.set(elem.name, elem.value);
        });
    xhr.send(formData);
    xhr.onload = callback;
}
