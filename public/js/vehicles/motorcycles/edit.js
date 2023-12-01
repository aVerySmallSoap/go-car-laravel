document.querySelector("#form-motorcycle-edit").addEventListener("submit", e=> {
    e.preventDefault();
    sendRequest("form>.form-row>input:not([type='hidden'])", '/motorcycle/update');
});
