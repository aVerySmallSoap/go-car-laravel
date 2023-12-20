document.querySelector("#form-leaser-edit").addEventListener("submit", e=> {
    e.preventDefault();
    let formData = new FormData();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/leaser/update", true);
    xhr.setRequestHeader("X-CSRF-TOKEN",
        document.querySelector("meta[name=csrf_token]").getAttribute('content'));
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    document.querySelectorAll("form>.form-row>input:not([type='hidden'])")
        .forEach(element => {
            formData.set(element.name, element.value);
    });
    xhr.send(formData);
    xhr.onload = function (){
        let res = JSON.parse(xhr.response)
        if(res.type === 'success'){window.location.href = '/leasers'}
        if(res.errors !== null){
            validate_input(res.errors);
        }
    }
});
