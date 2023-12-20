document.querySelector("#form-agent-create").addEventListener("submit", e=> {
    e.preventDefault();
    sendRequest(
        "form>.form-row>input:not([type='hidden'])",
        '/agent/store',
        '/agents');
});
