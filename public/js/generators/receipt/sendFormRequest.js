document.querySelector("#form-receipt").addEventListener("submit", e => {
    e.preventDefault();
    let formData = new FormData();
    document.querySelectorAll("span[data-mark-important]")
        .forEach(elem => {
            formData.set(elem.dataset.markLabel, elem.dataset.value);
        });
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/generate/receipt/store", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector("meta[name=csrf_token]").getAttribute('content'));
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(formData);
    xhr.onload = function () {
        let res = JSON.parse(xhr.response)
        if(res.type === 'success') { window.location.href = '/receipts'}
    }
});
