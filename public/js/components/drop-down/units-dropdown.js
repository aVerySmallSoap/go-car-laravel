let clickedUnit  = false;
document.querySelector("li[data-dropdown=units]")
    .addEventListener("click", e =>{
        let dropDown = document.createElement("div");
        let container = document.createElement("div");
        let vehicles = document.createElement("a");
        let reserved = document.createElement("a");
        let released = document.createElement("a");
        dropDown.className = "drop-down";
        vehicles.innerText = "Vehicles";
        vehicles.href = "/vehicles";
        reserved.innerText = "Reserved";
        reserved.href = "/reserved";
        released.innerText = "Released";
        released.href = "/released";
        container.className = "drop-down-container";
        container.append(vehicles, reserved, released);
        dropDown.append(container);
        dropDown.addEventListener("click", e => {
            e.stopImmediatePropagation();
        });
        if(!clickedUnit){
            clickedUnit = true;
            e.currentTarget.classList.add('active');
            e.currentTarget.append(dropDown);
            let topOffSet = e.currentTarget.getBoundingClientRect().top + 10;
            let leftOffSet = e.currentTarget.getBoundingClientRect().left + 100;
            dropDown.style.top =  topOffSet+"px";
            dropDown.style.left =  leftOffSet+"px";
        }else{
            e.currentTarget.classList.remove('active');
            document.querySelector(".drop-down").remove();
            clickedUnit = false;
        }
    });
