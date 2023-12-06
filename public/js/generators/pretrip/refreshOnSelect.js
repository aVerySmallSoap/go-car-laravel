document.querySelector("#container-customer>select").addEventListener("change", e => {
    let customer = e.currentTarget.value;
    let fillables = document.querySelectorAll(
        "#container-customer>.content-information>div>span[data-fillable='true']");
    let xhr = new XMLHttpRequest();
    xhr.open("GET", `/customer/fetch/${customer}`);
    xhr.setRequestHeader(
        'X-CSRF-TOKEN',
        document.querySelector("meta[name='csrf_token']").getAttribute('content')
    );
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send();
    xhr.onload = () => {
        let res = JSON.parse(xhr.response);
        for (let i = 0; i < fillables.length; ++i) {
            fillables[i].innerText = res.data[i];
        }
    }
});

document.querySelector("#container-vehicle>div>select[id=pre-receipt-vehicle-type]")
    .addEventListener("change", e => {
        let selection =
            document.querySelector("#container-vehicle>div>select[id=pre-receipt-vehicle]");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `/vehicle/fetch/${e.currentTarget.value}`);
        xhr.setRequestHeader(
            'X-CSRF-TOKEN',
            document.querySelector("meta[name='csrf_token']").getAttribute('content')
        );
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send();
        selection.replaceChildren();
        xhr.onload = () => {
            let res = JSON.parse(xhr.response);
            let placeholder = document.createElement('option');
            placeholder.value = "";
            placeholder.innerText = "Please select a vehicle";
            selection.appendChild(placeholder);
            res.data.forEach(elem => {
                let option = document.createElement('option');
                option.value = elem.vehicle_name;
                option.innerText = elem.vehicle_name;
                selection.appendChild(option);
            })
        }
        selection.removeAttribute('disabled');
    });

document.querySelector("#container-vehicle>div>select[id=pre-receipt-vehicle]")
    .addEventListener("change", e => {
        let type =
            document.querySelector("#container-vehicle>div>select[id=pre-receipt-vehicle-type]").value;
        let id = e.currentTarget.value;
        let fillables = document.querySelectorAll(
            "#container-vehicle>.content-information>div>span[data-fillable='true']");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `/vehicle/fetch/${type}/${id}`);
        xhr.setRequestHeader(
            'X-CSRF-TOKEN',
            document.querySelector("meta[name='csrf_token']").getAttribute('content')
        );
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send();
        xhr.onload = () => {
            let res = JSON.parse(xhr.response);
            console.log(res)
            for (let i = 0; i < fillables.length; ++i) {
                fillables[i].innerText = res.data[i];
            }
        }
    });
