let csrf = document.querySelector("meta[name=csrf-token]").getAttribute("content");
document.querySelector("#form-extension").addEventListener("submit", e=> {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    let formData = new FormData();
    xhr.open("post", "/released/extend", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", csrf);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    document.querySelectorAll(".container>span[data-mark-important]")
        .forEach(elem => {
            formData.set(elem.dataset.markLabel, elem.dataset.value);
        });
    formData.set(
        document.querySelector("#form-extension-new-date").name,
        document.querySelector("#form-extension-new-date").value);
    console.log(formData)
    xhr.send(formData);
    xhr.onload = function (){
        let res = JSON.parse(xhr.response);
        if(res.type === 'success') {window.location.href = 'http://127.0.0.1:8000/released'}
    }
});
