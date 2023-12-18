document.querySelector("#form-agent-edit").addEventListener("submit", e=> {
    e.preventDefault();
    let formData = new FormData();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/agent/update", true);
    xhr.setRequestHeader("X-CSRF-TOKEN",
        document.querySelector("meta[name=csrf_token]").getAttribute('content'));
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    document.querySelectorAll("form>.form-row>input")
        .forEach(element => {
            formData.set(element.name, element.value);
        });
    xhr.send(formData);
    xhr.onload = () => {
        let res = JSON.parse(xhr.response);
        if(res.type === 'success'){ window.location.href = "/agents"}
    }
});
