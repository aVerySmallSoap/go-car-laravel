let clicked  = false;
document.querySelector("li[data-dropdown=receipts]")
    .addEventListener("click", e =>{
        let dropDown = document.createElement("div");
        let container = document.createElement("div");
        let pre = document.createElement("a");
        let post = document.createElement("a");
        let receipt = document.createElement("a");
        dropDown.className = "drop-down";
        pre.innerText = "Pre-trip Receipts";
        pre.href = "/receipts/pre-trip";
        post.innerText = "Post-trip Receipts";
        post.href = "/receipts/post-trip";
        receipt.innerText = "Receipts";
        receipt.href = "/receipts";
        container.className = "drop-down-container";
        container.append(pre, post);
        dropDown.append(container);
        dropDown.addEventListener("click", e => {
            e.stopImmediatePropagation();
            console.log('click');
        });
        if(!clicked){
            clicked = true;
            e.currentTarget.classList.add('active');
            e.currentTarget.append(dropDown);
            let topOffSet = e.currentTarget.getBoundingClientRect().top + 10;
            let leftOffSet = e.currentTarget.getBoundingClientRect().left + 100;
            dropDown.style.top =  topOffSet+"px";
            dropDown.style.left =  leftOffSet+"px";
        }else{
            e.currentTarget.classList.remove('active');
            document.querySelector(".drop-down").remove();
            clicked = false;
        }
    });
