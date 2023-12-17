document.querySelector("#form-post-receipt").addEventListener("submit", e => {
    e.preventDefault();
    let formData = new FormData;
    document.querySelectorAll(".container>.span-row>span[data-mark-important]")
        .forEach(elem => {
            formData.set(elem.dataset.markLabel, elem.dataset.value);
        });
    document.querySelectorAll("#form-post-receipt>.form-row>[data-easy-input]")
        .forEach(elem => {
            formData.set(elem.name, elem.value);
        });
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/generate/post-trip/store", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector("meta[name=csrf_token]").getAttribute('content'));
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(formData);
    xhr.onload = function (){
        let res = JSON.parse(xhr.response);
        // console.log(res.errors != null)
        if(res.type === 'success') {window.location.href = `/generate/receipt/${res.id}`}
    }
});
