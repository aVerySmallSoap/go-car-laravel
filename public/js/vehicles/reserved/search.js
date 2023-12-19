let table = document.querySelector(".container-table>table[data-table]");
let delayedSearch = null;
document.querySelector("#search-bar").addEventListener("keyup", evt => {
    evt.preventDefault();
    let tbody = document.querySelector("table[data-table]>tbody")
    if(delayedSearch != null){
        clearTimeout(delayedSearch)
    }
    delayedSearch = setTimeout(() => {
        let formData = new FormData;
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/search");
        xhr.setRequestHeader("X-CSRF-TOKEN",
            document.querySelector("meta[name=csrf_token]").getAttribute('content'));
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        formData.set("table", table.dataset.table);
        formData.set("query", document.querySelector("#search-bar").value);
        xhr.send(formData);
        xhr.onload = function () {
            let res = JSON.parse(xhr.response);
            if(res.type === 'success'){
                tbody.replaceChildren();
                res.data.forEach(element => {
                    console.log(element);
                    let tr = document.createElement("tr");
                    element.forEach(data => {
                        let td = document.createElement("td");
                        td.innerHTML = data;
                        tr.append(td);
                    });
                    tr.append(createActions(element))
                    tbody.append(tr);
                });
            }
        }
    }, 500);
});

function createActions(data){
    let icon = document.querySelector("#deliver-icon");
    let td = document.createElement("td");
    let form = document.createElement("form");
    let button = document.createElement("button");
    button.type = "submit";
    button.formMethod = "get";
    button.formAction = `/reserved/release/${data[0]}/${data[1]}/${data[2]}}`;
    button.append(icon.content.cloneNode(true).childNodes[1]);
    form.append(button);
    button = document.createElement("button");
    icon = document.querySelector("#bin-icon");
    button.type = "submit";
    button.formMethod = "get";
    button.formAction = `/reserved/delete/${data[0]}/${data[2]}`;
    button.append(icon.content.cloneNode(true).childNodes[1]);
    form.append(button);
    td.append(form);
    return td;
}
