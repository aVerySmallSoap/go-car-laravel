document.querySelector("#form-login").addEventListener("submit", e => {
    e.preventDefault();
    let formData = new FormData;
    document.querySelectorAll("#form-login>.form-row>input")
        .forEach(input => {
            formData.set(input.name, input.value);
        });
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/login/verify", true);
    xhr.setRequestHeader("X-CSRF-TOKEN",
        document.querySelector("meta[name=csrf_token]").getAttribute('content'));
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(formData);
    xhr.onload = function (){
        let res = JSON.parse(xhr.response);
        if(res.type === 'success'){
            window.location.href = "/"
        }else if(res.errors !== null){
            validate_input(res.errors);
        }
    }
});

document.querySelector(".register").addEventListener("click", ()=> {
    window.location.href = "/register";
})
