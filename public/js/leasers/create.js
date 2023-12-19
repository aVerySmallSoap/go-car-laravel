document.querySelector("#form-vehicle-create").addEventListener("submit", e=> {
    e.preventDefault();
    sendRequest(
        "form>.form-row>input:not([type='hidden'])",
        '/vehicle/store',
        function (){
            window.location.href = '/vehicles';
        });
});
