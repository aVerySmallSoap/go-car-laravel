function validate_input(errors){
    for (const [key, value] of Object.entries(errors)) {
        setTimeout(() => {
            if(document.querySelectorAll(".text-error") !== null){
                document.querySelectorAll(".text-error").forEach(e => e.remove());
            }
        }, 100);
        setTimeout(() => {
            let span = document.createElement("span");
            span.className = "text-error";
            span.innerText = value;
            span.style.animation = "fade-in 800ms";
            document.querySelector(`[name=${key}]`).parentNode.append(span);
            setTimeout(() =>
                document.querySelector(`[name=${key}]`).parentNode.removeChild(span), 5000);
        }, 200);
    }
}
