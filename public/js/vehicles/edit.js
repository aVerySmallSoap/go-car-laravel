document.querySelector("#form-vehicle-edit").addEventListener("submit", e=> {
    e.preventDefault();
    sendRequest("form>.form-row>input:not([type='hidden'])", '/car/update');
});
