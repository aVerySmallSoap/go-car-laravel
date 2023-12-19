document.querySelector("#form-customer-create").addEventListener("submit", e=> {
    e.preventDefault();
    sendRequest(
        "form>.form-row>input:not([type='hidden'])",
        '/customer/store',
        function (){
            window.location.href = '/customers';
        });
});
