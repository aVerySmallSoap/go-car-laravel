document.querySelector("#form-vehicle-create").addEventListener("submit", e=> {
    e.preventDefault();
    sendRequest(
        "form>.form-row>input:not([type='hidden'])",
        '/leaser/store',
        function (){
            window.location.href = '/leasers';
        });
});
